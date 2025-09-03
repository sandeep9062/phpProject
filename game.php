v


<?php
// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'jhar703_flw');
define('DB_PASSWORD', 'jhar703_flw');
define('DB_NAME', 'jhar703_flw');

// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die('Error: Cannot connect - ' . $conn->connect_error);
}

$current = strtotime(date("Y-m-d 00:00:00"));
$now = strtotime(date("Y-m-d H:i:s"));
$firstperiodid = date('Ymd', strtotime("+1 day")) . sprintf("%03d", 480);
$lastperiodid = date('Ymd') . sprintf("%03d", 1);

// Fetch period and next values
$sql3 = "SELECT period, nxt FROM period WHERE id='1'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$period = $row3['period'];
$next = $row3['nxt'];
echo "$next <br>";

// Countdown logic
$countdownDuration = 60;
$timeLeft = $countdownDuration - (time() % $countdownDuration);

// Bet placement logic
if ($timeLeft > 5) {
    $betColor = $_POST['betColor']; // Assuming input validation is handled elsewhere

    $insertBetSQL = $conn->prepare("INSERT INTO betting (username, period, ans, status) VALUES (?, ?, ?, 'pending')");
    $insertBetSQL->bind_param("sis", $username, $period, $betColor);

    if ($insertBetSQL->execute()) {
        echo "Bet placed successfully!";
        echo json_encode(['status' => 'success', 'betColor' => $betColor]);
    } else {
        echo "Error: " . $insertBetSQL->error;
    }

    $insertBetSQL->close();
} else {
    echo "Bets are closed! Please wait for the next round.";
}

// Result calculation after countdown
if ($timeLeft == 0) {
    $opt1 = "SELECT SUM(amount) as total1 FROM betting WHERE ans='green' AND status='pending'";
    $opt0 = "SELECT SUM(amount) as total0 FROM betting WHERE ans='red' AND status='pending'";

    $sum1 = $conn->query($opt1)->fetch_assoc();
    $sum0 = $conn->query($opt0)->fetch_assoc();

    if (empty($sum1['total1']) && empty($sum0['total0'])) {
        $num = rand(40000, 50000);
    } else {
        $x = rand(40000, 50000);
        $y = $x % 10;

        if ($sum1['total1'] > $sum0['total0']) {
            $a = ["0", "2", "4", "6", "8"];
        } elseif ($sum1['total1'] < $sum0['total0']) {
            $a = ["1", "3", "5", "7", "9"];
        } else {
            $num = rand(40000, 50000);
        }

        if (isset($a)) {
            $t = $a[array_rand($a)];
            $num = ($x - $y) + $t;
        }
    }

    $prices = $num % 10;
    $ans = $prices;

    echo "Selected number: $num, Prices: $prices";

    // Update betting results
    $suc = $conn->prepare("UPDATE betting SET status='successful', price=?, number=?, color=?, color2=? WHERE status='pending'");
    $suc->bind_param("iiss", $num, $prices, $res, $res1);

    if (!$suc->execute()) {
        echo "Error updating betting status: " . $suc->error;
    } else {
        $price = $num;
        $prices = $num % 10;
        $ans = $prices;

        $res1 = ($prices == 0 || $prices == 5) ? "violet" : "";
        $e = $ans % 2;
        $res = ($e == 0) ? 'red' : 'green';
    }

    $suc->close();
}

// Fetch and process pending bets
$exist = "SELECT COUNT(*) as betnum FROM betting WHERE status='pending'";
$exists = $conn->query($exist)->fetch_assoc();

if ($exists['betnum'] == 0) {
    $rec = $conn->prepare("INSERT INTO betrec (period, ans, num, clo, res1) VALUES (?, ?, ?, ?, ?)");
    $rec->bind_param("iisss", $period, $ans, $num, $res, $res1);
    $rec->execute();
    $rec->close();
} else {
    $addwin00 = $conn->prepare("UPDATE betting SET res='fail', price=?, number=?, color=?, color2=? WHERE period=?");
    $addwin00->bind_param("iissi", $num, $prices, $res, $res1, $period);
    $addwin00->execute();
    $addwin00->close();

    $bet0q = "SELECT username, amount FROM betting WHERE status='pending'";
    $betres0q = $conn->query($bet0q);

    while ($row0 = $betres0q->fetch_assoc()) {
        $winner0 = $row0['username'];
        $fbets0 = $row0['amount'];

        $b1 = 0.3 * 0.02 * $fbets0;
        $b2 = 0.2 * 0.02 * $fbets0;
        $b3 = 0.1 * 0.02 * $fbets0;

        $uc = $conn->prepare("SELECT refcode, refcode1, refcode2 FROM users WHERE username=?");
        $uc->bind_param("s", $winner0);
        $uc->execute();
        $getuc = $uc->get_result()->fetch_assoc();

        if ($getuc['refcode']) {
            $conn->query("UPDATE users SET balance = balance + $b1 WHERE usercode='{$getuc['refcode']}'");
            $conn->query("INSERT INTO bonus (giver, usercode, amount, level) VALUES ('$winner0', '{$getuc['refcode']}', '$b1', '1')");

            if ($getuc['refcode1']) {
                $conn->query("UPDATE users SET balance = balance + $b2 WHERE usercode='{$getuc['refcode1']}'");
                $conn->query("INSERT INTO bonus (giver, usercode, amount, level) VALUES ('$winner0', '{$getuc['refcode1']}', '$b2', '2')");

                if ($getuc['refcode2']) {
                    $conn->query("UPDATE users SET balance = balance + $b3 WHERE usercode='{$getuc['refcode2']}'");
                    $conn->query("INSERT INTO bonus (giver, usercode, amount, level) VALUES ('$winner0', '{$getuc['refcode2']}', '$b3', '3')");
                }
            }
        }
    }
}


switch ($prices) {

  case "1":
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=1";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
   
 
    }
    
    break;
  case "3":
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=3";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
   
 
    }
      break;
  case "2":
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=2";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    
    }
    break;
  case "4":
   $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=4";
     $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
   
 
    }
    break;
  case "5":
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=5";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    
 
    }
    break;
  case "6":
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=6";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    
 
    }
    break;
  case "7":
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=7";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
   
    }
    break;
  case "8":
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=8";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
   
 
    }
    break;
  case "9":
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans=9";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    echo $winner0;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
   
    }
    break;
  case "0":
    echo"zero";
    $bet0="SELECT username,amount FROM betting WHERE status='pending' AND ans='0'";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    $addwin0="UPDATE users SET balance= balance+$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
    $addwin0="UPDATE betting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
    
   }
    break;
  default:
    echo "ERROR NO NUMBER FOUND";
}




if( $res=="red" && $res1=="" ){
    
echo "red";
$bet2="SELECT username,amount FROM betting WHERE status='pending' AND ans='$res'";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*2;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$addwin12="UPDATE betting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner2 AND period=$period AND ans='$res'";
$conn->query($addwin12);
   
}



}elseif( $res=="green" && $res1=="" ){

echo "green"; 
$bet3="SELECT username,amount FROM betting WHERE status='pending' AND ans='$res'";
$betres3=$conn->query($bet3);
while($row3 = mysqli_fetch_array($betres3)){
    
$winner3=$row3['username'];
$fbets3=$row3['amount']; 
$winamount3= ($fbets3-(2/100)*$fbets3)*2;
$addwin3="UPDATE users SET balance= balance+$winamount3 WHERE username=$winner3";
$conn->query($addwin3);
$addwin13="UPDATE betting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner3 AND period=$period AND ans='$res'";
$conn->query($addwin13);
    

}

    }
if( $res=="green" && $res1=="violet"){

echo "green vio";
$bet4="SELECT username,amount FROM betting WHERE status='pending' AND ans='$res'";
$betres4=$conn->query($bet4);
while($row4 = mysqli_fetch_array($betres4)){
    $winner4=$row4['username'];

$fbets4=$row4['amount']; 
$winamount4= ($fbets4-(2/100)*$fbets4)*1.5;
$addwin4="UPDATE users SET balance= balance +$winamount4 WHERE username=$winner4";
$conn->query($addwin4);
$addwin14="UPDATE betting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner4 AND period=$period AND ans='$res'";
$conn->query($addwin14);
   

}


$bet1="SELECT username,amount FROM betting WHERE status='pending' AND ans='violet'";
$betres1=$conn->query($bet1);
while($row1 = mysqli_fetch_array($betres1)){
    $winner1=$row1['username'];

$fbets1= $row1['amount'];
$winamount1= ($fbets1-(2/100)*$fbets1)*4.5;


$addwin1="UPDATE users SET balance= balance +$winamount1 WHERE username=$winner1";
$conn->query($addwin1);
$addwin11="UPDATE betting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner1 AND period=$period AND ans='violet'";
$conn->query($addwin11);
   

    
}

}elseif($res=="red" && $res1=="violet"){
 
echo"red vio";
$bet5="SELECT username,amount FROM betting WHERE status='pending' AND ans='$res'";
$betres5=$conn->query($bet5);
while($row5 = mysqli_fetch_array($betres5)){
  $winner5=$row5['username'];

$fbets5=$row5['amount'] ;
$winamount5= ($fbets5-((2/100)*$fbets5))*1.5;
$addwin5="UPDATE users SET balance= balance+$winamount5 WHERE username='$winner5'";
$conn->query($addwin5);
$addwin15="UPDATE betting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner5 AND period=$period AND ans='$res'";
$conn->query($addwin15);
   
      
}

$bet12="SELECT username,amount FROM betting WHERE status='pending' AND ans='violet'";
$betres12=$conn->query($bet12);
while($row12 = mysqli_fetch_array($betres12)){
$winner12=$row12['username'];

$fbets12=$row12['amount'] ;
$winamount12= ($fbets12-(2/100)*$fbets12)*4.5;

$addwin12="UPDATE users SET balance= balance+$winamount12 WHERE username=$winner12";
$conn->query($addwin12);
$addwin112="UPDATE betting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner12 AND period=$period AND ans='violet'";
$conn->query($addwin112);
    

}

    }










$rec="INSERT INTO betrec (period,ans,num,clo,res1) VALUES ($period,$ans,$num,'$res','$res1')";
$conn->query($rec);

}

 





















$suc="UPDATE betting SET status='sucessful' WHERE status='pending'";
$conn->query($suc);

$checkperiod_Query=mysqli_query($conn,"select * from `period` order by id desc limit 1");
$periodRow=mysqli_num_rows($checkperiod_Query);
$periodidRow=mysqli_fetch_array($checkperiod_Query);


if($lastperiodid==$periodidRow['period'])
{
  $truncateQuery=mysqli_query($conn,"TRUNCATE TABLE `period`");
  $truncateResultQuery=mysqli_query($conn,"TRUNCATE TABLE `period`");
    $sql19=mysqli_query($conn,"INSERT INTO `period` (`period`,`nxt`) VALUES ('".$firstperiodid."','11')");  
}elseif($periodRow=='' OR $periodRow=='0')
{
$sql19=mysqli_query($conn,"INSERT INTO `period` (`period`,`nxt`) VALUES ('".$firstperiodid."','11')");
	

}else 
{
$sql4 = "UPDATE period SET period= period + 1 ,nxt='11' WHERE id='1'";
$conn->query($sql4);
	}

$sql1="DELETE FROM bet WHERE id='1'";
$sql = "INSERT INTO bet (id) VALUES ('1')";
                
$conn->query($sql1);
 
                
$conn->query($sql);



$conn->close();
?>