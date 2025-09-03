<?php

require_once "conn.php";
  $username=$_POST['username'];
  $amount=$_POST['amount'];
  $utr=$_POST['utr'];
  $upi=$_POST['upi'];
  $first=0;
$sqlwin = "SELECT COUNT(utr) AS uc FROM recharge WHERE utr='$utr'";
$resultwin =$conn->query($sqlwin);
$rowwin = mysqli_fetch_assoc($resultwin);
$sameutr=$rowwin['uc']; 

if($sameutr==0){
    $opt="SELECT SUM(recharge) as total FROM `recharge` WHERE username='$username' AND status='Success'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
if($sum['total']=="" or $sum['total']=="0"){
   
         
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

$addbrec="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$username','$refcode','$bonus','1')";
$conn->query($addbrec);
    
}

$sql1 = "INSERT INTO recharge (username, recharge,status,utr,upi) VALUES ('$username', '$amount','Success','$utr','$upi')";
                
$conn->query($sql1);
$wagquery="UPDATE users SET waggering= waggering+($amount+$first) WHERE username='$username'";
$conn->query($wagquery);
 $transquery="INSERT INTO trans (username,reason,amount,type) VALUES ('$username', 'Recharge',($amount+$first),'add')";
	$conn->query($transquery);
$addwin0="UPDATE users SET balance= balance +($amount) WHERE username='$username'";
   
$conn->query($addwin0);
}


?>