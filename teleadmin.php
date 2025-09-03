<?php
// Database connection details
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'jhar703_flw');
define('DB_PASSWORD', 'jhar703_flw');
define('DB_NAME', 'jhar703_flw');

// Connect to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Function to retrieve chat details
function getAllChatDetails($conn) {
    $query = "SELECT chat_id, username, message, created_at FROM chat_details";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Function to retrieve file uploads
function getAllFileUploads($conn) {
    $query = "SELECT chat_id, file_id, step, created_at FROM file_uploads";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Function to retrieve file path from Telegram
function getFileUrl($fileId) {
    $botToken = '6763070720:AAENS_pC9JxkQxv1kgokU8djl4tLYo7sVF4';
    $fileInfo = file_get_contents("https://api.telegram.org/bot$botToken/getFile?file_id=$fileId");
    $fileInfoArray = json_decode($fileInfo, true);

    if (isset($fileInfoArray['result']['file_path'])) {
        $filePath = $fileInfoArray['result']['file_path'];
        return "https://api.telegram.org/file/bot$botToken/$filePath";
    } else {
        return null;
    }
}

// Retrieve data
$chatDetails = getAllChatDetails($conn);
$fileUploads = getAllFileUploads($conn);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TeleAdmin Panel</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>TeleAdmin Panel</h1>

    <h2>Chat Details</h2>
    <table>
        <tr>
            <th>Chat ID</th>
            <th>Username</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        <?php if (count($chatDetails) > 0): ?>
            <?php foreach ($chatDetails as $chat): ?>
                <tr>
                    <td><?php echo htmlspecialchars($chat['chat_id']); ?></td>
                    <td><?php echo htmlspecialchars($chat['username']); ?></td>
                    <td><?php echo htmlspecialchars($chat['message']); ?></td>
                    <td><?php echo htmlspecialchars($chat['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No chat details found.</td>
            </tr>
        <?php endif; ?>
    </table>

    <h2>File Uploads</h2>
    <table>
        <tr>
            <th>Chat ID</th>
            <th>File ID</th>
            <th>Step</th>
            <th>Date</th>
        </tr>
        <?php if (count($fileUploads) > 0): ?>
            <?php foreach ($fileUploads as $file): ?>
                <tr>
                    <td><?php echo htmlspecialchars($file['chat_id']); ?></td>
                    <td><?php echo htmlspecialchars($file['file_id']); ?></td>
                     <td><?php echo htmlspecialchars($file['step']); ?></td>
                    <td><?php echo htmlspecialchars($file['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No file uploads found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
