<?php
/**
 * API Proxy Script
 * This script handles API requests that would normally go to jhargames.com
 */

// Get the requested endpoint from the URL
$request_uri = $_SERVER['REQUEST_URI'];
$query_string = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';

// Log the request for debugging
file_put_contents('proxy_log.txt', date('Y-m-d H:i:s') . " - Request: {$request_uri}?{$query_string}\n", FILE_APPEND);

// Extract the path from the URL
$path = parse_url($request_uri, PHP_URL_PATH);

// Check if this is an image request
if (strpos($path, '/img/') !== false) {
    // Extract the image filename
    $img_path = preg_replace('/.*\/img\//', '', $path);
    $local_img_path = __DIR__ . '/../img/' . $img_path;
    
    // Check if the image exists locally
    if (file_exists($local_img_path)) {
        // Determine content type
        $extension = pathinfo($local_img_path, PATHINFO_EXTENSION);
        switch ($extension) {
            case 'png':
                header('Content-Type: image/png');
                break;
            case 'jpg':
            case 'jpeg':
                header('Content-Type: image/jpeg');
                break;
            case 'svg':
                header('Content-Type: image/svg+xml');
                break;
            case 'gif':
                header('Content-Type: image/gif');
                break;
            default:
                header('Content-Type: application/octet-stream');
        }
        
        // Output the image
        readfile($local_img_path);
        exit;
    }
}

// Check if this is a request to the bet.php API
if (strpos($path, '/9987/src/api/bet.php') !== false) {
    // Handle API requests
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $user = isset($_GET['user']) ? $_GET['user'] : 'null';
    
    // Create a mock response based on the action
    $response = [];
    
    if ($action == 'verifytoken') {
        $response = [
            'status' => 'success',
            'verified' => true,
            'user' => $user != 'null' ? $user : 'guest123'
        ];
    } else if ($action == 'getuserinfo') {
        $response = [
            'status' => 'success',
            'user' => $user != 'null' ? $user : 'guest123',
            'balance' => 1000,
            'name' => 'Demo User',
            'phone' => '1234567890',
            'email' => 'demo@example.com'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Unknown action'
        ];
    }
    
    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}

// For other requests, return a 404
header("HTTP/1.0 404 Not Found");
echo "Resource not found";