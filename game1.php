<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'jhar703_flw');
define('DB_PASSWORD', 'jhar703_flw');
define('DB_NAME', 'jhar703_flw');

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("Error: Cannot connect - " . $conn->connect_error);
}

session_start();
$user = $_SESSION['username'];

function getPeriod($conn) {
    $stmt = $conn->prepare("SELECT period, nxt FROM period WHERE id = ?");
    $id = 1;
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($period, $next);
    $stmt->fetch();
    $stmt->close();
    return [$period, $next];
}

function getTotalBets($conn, $ans) {
    $stmt = $conn->prepare("SELECT SUM(amount) AS total FROM betting WHERE ans = ? AND status = 'pending'");
    $stmt->bind_param("s", $ans);
    $stmt->execute();
    $stmt->bind_result($total);
    $stmt->fetch();
    $stmt->close();
    return $total ?: 0;
}

function calculateResult($sum1, $sum0, $next) {
    if ($next == 11) {
        if ($sum1 == 0 && $sum0 == 0) {
            return rand(40000, 50000);
        } elseif ($sum1 > $sum0) {
            $a = ["0", "2", "4", "6", "8"];
            $t = $a[array_rand($a)];
            $x = rand(40000, 50000);
            return ($x - $x % 10) + $t;
        } elseif ($sum1 < $sum0) {
            $a = ["1", "3", "5", "7", "9"];
            $t = $a[array_rand($a)];
            $x = rand(40000, 50000);
            return ($x - $x % 10) + $t;
        } else {
            return rand(40000, 50000);
        }
    } else {
        $x = rand(40000, 50000);
        return ($x - $x % 10) + $next;
    }
}

function updateUserBalance($conn, $username, $winamount) {
    $stmt = $conn->prepare("UPDATE users SET balance = balance + ? WHERE username = ?");
    $stmt->bind_param("ds", $winamount, $username);
    $stmt->execute();
    $stmt->close();
}

function updateBettingResult($conn, $username, $period, $num, $prices, $res, $res1) {
    $stmt = $conn->prepare("UPDATE betting SET res = 'success', price = ?, number = ?, color = ?, color2 = ? WHERE username = ? AND period = ? AND ans = 'violet'");
    $stmt->bind_param("disssi", $num, $prices, $res, $res1, $username, $period);
    $stmt->execute();
    $stmt->close();
}

list($period, $next) = getPeriod($conn);

$sum1 = getTotalBets($conn, 'green');
$sum0 = getTotalBets($conn, 'red');

$num = calculateResult($sum1, $sum0, $next);

// Process betting results for 'violet'
$bet_query = $conn->prepare("SELECT username, amount FROM betting WHERE status = 'pending' AND ans = 'violet'");
$bet_query->execute();
$bet_query->bind_result($username, $amount);

while ($bet_query->fetch()) {
    $winamount = ($amount - (2 / 100) * $amount) * 4.5;
    updateUserBalance($conn, $username, $winamount);
    updateBettingResult($conn, $username, $period, $num, $prices, $res, $res1);
}

$bet_query->close();

// Insert record into betrec
$rec_stmt = $conn->prepare("INSERT INTO betrec (period, ans, num, clo, res1) VALUES (?, ?, ?, ?, ?)");
$rec_stmt->bind_param("isiss", $period, $ans, $num, $res, $res1);
$rec_stmt->execute();
$rec_stmt->close();

// Mark pending bets as successful
$suc_stmt = $conn->prepare("UPDATE betting SET status = 'successful' WHERE status = 'pending'");
$suc_stmt->execute();
$suc_stmt->close();

// Check and update period table
$period_query = $conn->query("SELECT * FROM `period` ORDER BY id DESC LIMIT 1");
$periodRow = $period_query->num_rows;
$periodidRow = $period_query->fetch_assoc();

$firstperiodid = date('Ymd', strtotime("+1 days")) . sprintf("%03d", 480);
$lastperiodid = date('Ymd') . sprintf("%03d", 1);

if ($lastperiodid == $periodidRow['period']) {
    $conn->query("TRUNCATE TABLE `period`");
    $conn->query("INSERT INTO `period` (`period`, `nxt`) VALUES ('$firstperiodid', '11')");
} elseif ($periodRow == 0) {
    $conn->query("INSERT INTO `period` (`period`, `nxt`) VALUES ('$firstperiodid', '11')");
} else {
    $conn->query("UPDATE period SET period = period + 1, nxt = '11' WHERE id = '1'");
}

$conn->query("DELETE FROM bet WHERE id = '1'");
$conn->query("INSERT INTO bet (id) VALUES ('1')");

$conn->close();
?>
