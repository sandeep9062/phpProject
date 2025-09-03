<?php
$ip =$_GET["ip"]; // Replace with the IP address you want to look up

$access_token = "ea36fa3c05fb6c"; // Sign up for a free API token at https://ipinfo.io/signup

// Construct the API URL
if($ip){
    $api_url = "http://ipinfo.io/{$ip}/json?token={$access_token}";
}
// Initialize cURL session
$ch = curl_init($api_url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Parse the JSON response
$ip_info = json_decode($response);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP Location Lookup</title>
    <style>
        /* Reset some default styles to ensure consistency across browsers */
        body, h1, h2, p, ul, li {
            margin: 0;
            padding: 0;
        }

        /* Style for the entire page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        /* Header styles */
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            font-size: 36px;
        }

        /* Content section styles */
        .content {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .location-info {
            font-size: 25px;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Location Information</h1>
    </header>

    <div class="content">
        <div class="location-info">
            <p><strong>IP Address:</strong> <?php echo $ip_info->ip; ?></p>
            <p><strong>City:</strong> <?php echo $ip_info->city; ?></p>
            <p><strong>Region:</strong> <?php echo $ip_info->region; ?></p>
            <p><strong>Country:</strong> <?php echo $ip_info->country; ?></p>
            <p><strong>Location:</strong> <?php echo $ip_info->loc; ?></p>
            <p><strong>Organization:</strong> <?php echo $ip_info->org; ?></p>
        </div>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> All rights reserved.
    </footer>
</body>
</html>
