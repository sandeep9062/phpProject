<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["adloggedin"]) || $_SESSION["adloggedin"] !== true){
    header("location: adlogin");
    exit;
}
require_once "config.php";
  $ticket=$_GET['ticket'];
 
  $note=$_GET['note'];
  
$addwin00="UPDATE complaint SET Status='Closed',Resolution='$note' WHERE Ticket='$ticket'";
$conn->query($addwin00);
if($conn->query($addwin00)===true){
        header("location: complaints");
}else{
    echo"FAILED";
}
?>