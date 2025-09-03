<?php
/* Database configuration */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'jhar703_flw');
define('DB_PASSWORD', 'jhar703_flw');
define('DB_NAME', 'jhar703_flw');

// Connect to the Database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Error: Cannot connect to the database. " . $conn->connect_error);
}

$current = strtotime(date("Y-m-d 00:00:00"));
$now = strtotime(date("Y-m-d H:i:s"));
$firstperiodid = date('Ymd', strtotime("+1 days")) . sprintf("%03d", 480);
$lastperiodid = date('Ymd') . sprintf("%03d", 1);

$sql3 = "SELECT period, nxt FROM vipperiod WHERE id='1'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$period = $row3['period'];
$next = $row3['nxt'];

function generateRes($fres) {
    if ($fres == "redlion") {
        $even = [28];
    } elseif ($fres == "redelephant") {
        $even = [9];
    } elseif ($fres == "yellowlion") {
        $odd = [26, 29, 31, 33, 35];
    } elseif ($fres == "yellowking") {
        $odd = [37];
    } elseif ($fres == "yellowelephant") {
        $odd = [1, 3, 5, 7, 10, 12];
    } elseif ($fres == "yellowcow") {
        $odd = [14, 16, 18, 20, 22, 24];
    } elseif ($fres == "greenlion") {
        $odd = [25, 27, 30, 32, 34, 36];
    }

    if (isset($even)) {
        $random_keys = array_rand($even, 1);
        $master = $even[$random_keys];
    } elseif (isset($odd)) {
        $random_keys = array_rand($odd, 1);
        $master = $odd[$random_keys];
    }

    return $master;
}

function placeBet($userId, $betAmount, $betType) {
    global $conn, $period;

    $stmt = $conn->prepare("INSERT INTO bets (user_id, amount, type, period) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $userId, $betAmount, $betType, $period);
    $stmt->execute();
    $stmt->close();
}

function getBets() {
    global $conn, $period;

    $stmt = $conn->prepare("SELECT user_id, amount, type FROM bets WHERE period = ?");
    $stmt->bind_param("i", $period);
    $stmt->execute();
    $result = $stmt->get_result();
    $bets = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    return $bets;
}

function displayResults() {
    $bets = getBets();

    foreach ($bets as $bet) {
        echo "User: " . $bet['user_id'] . " Bet Amount: " . $bet['amount'] . " Bet Type: " . $bet['type'] . "<br>";
    }
}

// Example usage
$userId = 1; // Example user ID
$betAmount = 100; // Example bet amount
$betType = "redlion"; // Example bet type

placeBet($userId, $betAmount, $betType);
displayResults();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game5</title>
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div id="game">
        <!-- Game UI goes here -->
    </div>

    <script src="/js/app.js"></script>
</body>
</html>
