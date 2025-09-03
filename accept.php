<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";
  $username=$_GET['un'];
  $amount=$_GET['am'];
  $utr=$_GET['utr'];
  $first=0;


$opt="SELECT COUNT(*) as total FROM `recharge` WHERE username='$username' AND status='Success'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
$bonb="SELECT bonus FROM `settings` id=1";
$getbon=$conn->query($bonb);
$getb= mysqli_fetch_assoc($getbon);
if($sum['total']=="" or $sum['total']<3){
   
         if($sum['total']==0){
         $bonus=20/100* $amount;
         $first=15/100*$amount;
         }else if($sum['total']==1){
         $bonus=15/100* $amount;
         }else if($sum['total']==2){
         $bonus=10/100* $amount;
         }
                  
            
        
   
     
          
    $win="select refcode FROM `users` WHERE  username='$username' ";
$result3 =$conn->query($win);
$row3 = mysqli_fetch_assoc($result3);
$refcode=$row3['refcode'];
$adb="UPDATE users SET bonus= bonus +$bonus WHERE usercode='$refcode'";
$conn->query($adb);
 //$transquery="INSERT INTO trans (username,reason,amount,type) VALUES ('$refcode' ,'Recharge refer Bonus',$bonus,'add')";
	//$conn->query($transquery);
$addbrec="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$username','$refcode','$bonus','4')";
$conn->query($addbrec);
    
}
$addwin00="UPDATE recharge SET status='Success' WHERE username='$username' AND recharge='$amount' AND utr='$utr'";
$conn->query($addwin00);
$wagquery="UPDATE users SET waggering= waggering+($amount+$first) WHERE username='$username'";
$conn->query($wagquery);
 $transquery="INSERT INTO trans (username,reason,amount,type) VALUES ('$username', 'Recharge',($amount+$first),'add')";
	$conn->query($transquery);

if($conn->query($addwin00)){
    $addwin0="UPDATE users SET balance= balance +($amount+$first) WHERE username='$username'";
   
    if($conn->query($addwin0)){
        header("location: rechargeRequests");
    }
}else{
    echo"FAILED";
}
?>