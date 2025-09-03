<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="/favicon.ico">
    <title>Jhargames</title>
    <!-- API Interceptor script to handle external API calls -->
    <script src="/js/api-interceptor.js"></script>
    <script defer="defer" src="/js/chunk-vendors.2e18015e.js"></script>
    
    <script defer="defer" src="/js/app.2d5db97c.js"></script>
    <link href="/css/app.68a3b23d.css" rel="stylesheet" id="theme-style">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon" href="/img/icon.png">
    <style>
        /* Style for the pop-up menu */
        .theme-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.5); /* Transparent background */
            z-index: 1000;
            visibility: visible;
            opacity: 1;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .theme-popup.hidden {
            visibility: hidden;
            opacity: 0;
        }
        .theme-popup-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .theme-popup-content select {
            border: none;
            outline: none;
            background: #fff;
            font-size: 16px;
            margin-top: 10px;
        }
        .close-btn {
            background: #d9534f;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .label {
    color: black; /* Sets the font color to black */
    font-size: 16px; /* Optional: Adjust the font size if needed */
    font-weight: bold; /* Optional: Make the text bold */
    margin-bottom: .5rem; /* Adjusts the spacing below the label */
    display: inline-block; /* Keeps the label inline while allowing margin and padding */
}

        
    </style>
</head>
<body>
    <noscript>
        <strong>Jhargames is a safe way to make money by playing colour Prediction game. Login. OTP. Remember Me. Login. Create an account.</strong>
    </noscript>

    <div class="theme-popup" id="theme-popup">
        <div class="theme-popup-content">
            <label for="theme-select" class="label">Select Theme:</label>
            <select id="theme-select">
                <option value="/css/app.68a3b23d.css" selected>Default</option>
                <option value="/css/theme1.css">Theme 1</option>
                <option value="/css/theme2.css">Theme 2</option>
            </select>
            <button class="close-btn" onclick="closePopup()">Close</button>
        </div>
    </div>

    <div id="app"></div>

    <script>
        function closePopup() {
            document.getElementById('theme-popup').classList.add('hidden');
        }
    </script>
    <script src="/js/theme-switcher.js"></script>

        // Optionally, you can open the popup automatically on page load
        window.onload = function() {
            document.getElementById('theme-popup').classList.remove('hidden');
        };
        
        
    </script>
</body>
</html>
