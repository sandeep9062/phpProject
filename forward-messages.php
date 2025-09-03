<?php
// Your bot token
$botToken = "6763070720:AAENS_pC9JxkQxv1kgokU8djl4tLYo7sVF4";

// Your chat ID where the messages will be forwarded
$chatId = "5471608664";

// Get the incoming update from Telegram
$content = file_get_contents("php://input");
$update = json_decode($content, true);

// Check if the update contains a message
if (isset($update["message"])) {
    // Extract message details
    $messageText = $update["message"]["text"];
    $fromUser = $update["message"]["from"]["first_name"];
    
    // Prepare the text to forward
    $forwardText = "Message from $fromUser:\n\n" . $messageText;

    // Send the message to your chat ID
    $sendMessageUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($forwardText);
    file_get_contents($sendMessageUrl);
}
?>
