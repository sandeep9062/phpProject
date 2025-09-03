<?php
/**
 * Router script to handle routing similar to vercel.json configuration
 * This script routes all requests to /api/index.php unless the file exists directly
 */

// Get the requested URI
$uri = $_SERVER['REQUEST_URI'];

// Parse the URI to handle query strings
$request_path = parse_url($uri, PHP_URL_PATH);

// Debug: Log the request path
file_put_contents('router_debug.log', date('Y-m-d H:i:s') . " - Request: {$request_path}\n", FILE_APPEND);

// Check for API proxy requests (jhargames.com domain requests)
if (strpos($request_path, '/9987/src/api/') !== false || strpos($uri, 'jhargames.com') !== false) {
    include_once __DIR__ . '/api/proxy.php';
    exit;
}

// Check for static assets (js, css, images, etc.)
$file_path = __DIR__ . $request_path;

// If the file exists, serve it directly
if (file_exists($file_path) && !is_dir($file_path)) {
    // Set the correct content type based on file extension
    $extension = pathinfo($file_path, PATHINFO_EXTENSION);
    
    // Debug: Log the file being served
    file_put_contents('router_debug.log', date('Y-m-d H:i:s') . " - Serving file: {$file_path} with extension {$extension}\n", FILE_APPEND);
    
    // Add cache control headers to prevent caching
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache');
    
    switch ($extension) {
        case 'css':
            header('Content-Type: text/css');
            break;
        case 'js':
            header('Content-Type: application/javascript');
            break;
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
        case 'ico':
            header('Content-Type: image/x-icon');
            break;
        default:
            // For unknown types, try to detect the MIME type
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $file_path);
            finfo_close($finfo);
            header("Content-Type: {$mime_type}");
            break;
    }
    
    readfile($file_path);
    exit;
}

// Route all other requests to api/index.php
include_once __DIR__ . '/api/index.php';