<?php
// Database connection details
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'jhar703_flw');
define('DB_PASSWORD', 'jhar703_flw');
define('DB_NAME', 'jhar703_flw');

// Your bot token
$botToken = "6763070720:AAENS_pC9JxkQxv1kgokU8djl4tLYo7sVF4";

// Your chat ID where the messages will be forwarded
$forwardChatId = "5471608664";

// Connect to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Retrieve the JSON data from the request
$update = file_get_contents("php://input");
$updateArray = json_decode($update, true);

if (isset($updateArray['message'])) {
    $chatId = $updateArray['message']['chat']['id'];

    // Handle text messages
    if (isset($updateArray['message']['text'])) {
        $messageText = $updateArray['message']['text'];
        $forwardText = "Message from Chat ID $chatId:\n\n$messageText";
        sendForwardedMessage($forwardText);
        handleUserText($chatId, $messageText);
    }

    // Handle photos and documents
    if (isset($updateArray['message']['photo']) || isset($updateArray['message']['document'])) {
        $fileId = isset($updateArray['message']['photo']) ? $updateArray['message']['photo'][count($updateArray['message']['photo']) - 1]['file_id'] : $updateArray['message']['document']['file_id'];
        $fileType = isset($updateArray['message']['photo']) ? 'photo' : 'document';

        // Forward the file to your chat ID
        $fileUrl = "https://api.telegram.org/bot$botToken/getFile?file_id=$fileId";
        $fileContent = json_decode(file_get_contents($fileUrl), true);
        $filePath = $fileContent['result']['file_path'];
        $forwardFileUrl = "https://api.telegram.org/file/bot$botToken/$filePath";

        sendForwardedMessage("File forwarded from Chat ID $chatId. File type: $fileType\n\nFile URL: $forwardFileUrl");

        // Handle the uploaded photo/document
        $userStep = getUserStep($chatId);
        $step = $userStep['step'];
        $token = $userStep['token'];

        if ($step === 'money_issue_proof' || $step === 'withdrawal_issue_proof' || $step === 'bank_change_proof') {
            sendMessage($chatId, "Please keep patience, We are investigating your account. Your token number is " . $token);
            setUserStep($chatId, '');
        }
    }
}

function sendForwardedMessage($message) {
    global $botToken, $forwardChatId;
    $sendMessageUrl = "https://api.telegram.org/bot$botToken/sendMessage?" . http_build_query([
        'chat_id' => $forwardChatId,
        'text' => $message
    ]);
    file_get_contents($sendMessageUrl);
}

function sendMessage($chatId, $message) {
    global $botToken;
    $sendMessageUrl = "https://api.telegram.org/bot$botToken/sendMessage?" . http_build_query([
        'chat_id' => $chatId,
        'text' => $message
    ]);
    file_get_contents($sendMessageUrl);
}

function setUserStep($chatId, $step, $token = null) {
    global $conn;
    $stmt = $conn->prepare("REPLACE INTO user_steps (chat_id, step, token) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $chatId, $step, $token);
    $stmt->execute();
    $stmt->close();
}

function getUserStep($chatId) {
    global $conn;
    $stmt = $conn->prepare("SELECT step, token FROM user_steps WHERE chat_id = ?");
    $stmt->bind_param("i", $chatId);
    $stmt->execute();
    $stmt->bind_result($step, $token);
    $stmt->fetch();
    $stmt->close();
    return ['step' => $step, 'token' => $token];
}

function handleUserText($chatId, $messageText) {
    $userStep = getUserStep($chatId);
    $step = $userStep['step'];
    $token = $userStep['token'];

    switch ($messageText) {
        case 'a':
            $token = generateUniqueToken();
            sendMessage($chatId, "Sorry for the inconvenience. Please provide the following details:\n1. Your Id:");
            setUserStep($chatId, 'money_issue_id', $token);
            break;

        case 'b':
            $token = generateUniqueToken();
            sendMessage($chatId, "Please provide the following details:\n1. Your Id:");
            setUserStep($chatId, 'withdrawal_issue_id', $token);
            break;

        case 'c':
            $token = generateUniqueToken();
            sendMessage($chatId, "Please provide the following details:\n1. Your Id:");
            setUserStep($chatId, 'bank_change_id', $token);
            break;

        default:
            if ($step) {
                handleUserStepsDetails($chatId, $messageText, $step, $token);
            } else {
                sendMessage($chatId, "Welcome to Support line, Greetings!. Please Select your problem:");
                sendOptions($chatId);
            }
            break;
    }
}

function handleUserStepsDetails($chatId, $messageText, $step, $token) {
    switch ($step) {
        case 'money_issue_id':
            sendMessage($chatId, "2. Amount Deposit:");
            setUserStep($chatId, 'money_issue_amount', $token);
            break;

        case 'money_issue_amount':
            sendMessage($chatId, "3. UTR No.:");
            setUserStep($chatId, 'money_issue_utr', $token);
            break;

        case 'money_issue_utr':
            sendMessage($chatId, "4. Deposit Proof Receipt Detail:");
            setUserStep($chatId, 'money_issue_proof', $token);
            break;

        case 'withdrawal_issue_id':
            sendMessage($chatId, "2. Withdrawal Amount:");
            setUserStep($chatId, 'withdrawal_issue_amount', $token);
            break;

        case 'withdrawal_issue_amount':
            sendMessage($chatId, "3. Upload PDF of Bank Statement:");
            setUserStep($chatId, 'withdrawal_issue_proof', $token);
            break;

        case 'bank_change_id':
            sendMessage($chatId, "2. Correct bank name:");
            setUserStep($chatId, 'bank_change_name', $token);
            break;

        case 'bank_change_name':
            sendMessage($chatId, "3. IFSC Code:");
            setUserStep($chatId, 'bank_change_ifsc', $token);
            break;

        case 'bank_change_ifsc':
            sendMessage($chatId, "4. Bank Passbook Pic Upload:");
            setUserStep($chatId, 'bank_change_proof', $token);
            break;

        default:
            sendMessage($chatId, "Sorry, I didn't understand that. Please choose an option:");
            sendOptions($chatId);
            break;
    }
}

function generateUniqueToken() {
    return uniqid('token_', true);
}

function sendOptions($chatId) {
    $options = "Please choose an option:\n" .
               "A. Money is deposited but didn't credit in wallet.\n" .
               "B. Withdrawal Problem.\n" .
               "C. Change Bank Details.";
    sendMessage($chatId, $options);
}

// Close the database connection
mysqli_close($conn);
?>
