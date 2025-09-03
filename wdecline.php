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
  $id=$_GET['id'];
  $note=$_GET['note'];
  $type=$_GET['type'];
  if($type=='invite'){
       $refund=$amount;
  }else{
      $refund=$amount*(100/98);
  }
$addwin00="UPDATE record SET status='Failed',note='$note' WHERE username='$username' AND withdraw='$amount' AND id='$id'";
$conn->query($addwin00);
if($conn->query($addwin00)){
     $addwin0="UPDATE users SET balance= balance +$refund WHERE username='$username'";
   $transquery="INSERT INTO trans (username,reason,amount,type) VALUES ('$username', 'Withdraw Refund', $refund,'add')";
	$conn->query($transquery);
    if($conn->query($addwin0)){
        header("location: adwith");
    }

        
    
}else{
    echo"FAILED";
}
?>