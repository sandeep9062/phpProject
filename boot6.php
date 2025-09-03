
<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'jhar703_flw');
define('DB_PASSWORD', 'jhar703_flw');
define('DB_NAME', 'jhar703_flw');
// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}
$current = strtotime(date("Y-m-d 00:00:00"));
$now = strtotime(date("Y-m-d H:i:s"));
$firstperiodid=date('Ymd',strtotime("+1 days")).sprintf("%03d",480);
$lastperiodid=date('Ymd').sprintf("%03d",1);


$sql3 = "SELECT period,nxt FROM wheelperiod WHERE id='1'";
$result3 =$conn->query($sql3);
$row3 = mysqli_fetch_assoc($result3);
$period=$row3['period'];
$next=$row3['nxt'];



function generateRes($fres){
    echo"overresult";
   if($fres=="black"){
     $even=array(0,2,4,6,8,10,12,14,16,18,20,22,14,26,28,30,32,34,36,38,40,42,44,46,48,50);
       $random_keys=array_rand($even,1);
       $master=$even[$random_keys];
    
        return $master;
   }elseif($fres=="red"){
     $even=array(1,5,7,11,13,17,19,23,25,29,31,35,37,41,43,47,51);
       $random_keys=array_rand($even,1);
       $master=$even[$random_keys];
    
        return $master;
   }elseif($fres=="blue"){
         $odd=array(3,9,15,21,27,33,39,45,49,52);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }elseif($fres=="green"){
         $odd=array(53);
       $random_keys=array_rand($odd,1);
        $master=$odd[$random_keys];
       
        return $master;
   }
}

if($next==0){
    echo"start";
     $opt1="SELECT SUM(amount) as total1 FROM wheelbetting WHERE ans='red' AND status='pending'";
    $opt1res=$conn->query($opt1);
    $sum1 = mysqli_fetch_assoc($opt1res);
    if($sum1['total1']==null){
       $red=0;
    }else{
      $red=$sum1['total1']*3;  
    }
    
    
    $opt0="SELECT SUM(amount) as total0 FROM wheelbetting WHERE ans='black' AND status='pending'";
    $opt0res=$conn->query($opt0);
    $sum0 = mysqli_fetch_assoc($opt0res);
    
    if($sum0['total0']==null){
       $black=0;
    }else{
      $black=$sum0['total0']*2;  
    }
    
    $opt2="SELECT SUM(amount) as total2 FROM wheelbetting WHERE ans='green' AND status='pending'";
    $opt2res=$conn->query($opt2);
    $sum2 = mysqli_fetch_assoc($opt2res);
    
    if($sum2['total2']==null){
       $green=0;
    }else{
      $green=$sum2['total2']*50;  
    }
    
    
    $opt3="SELECT SUM(amount) as total3 FROM wheelbetting WHERE ans='blue' AND status='pending'";
    $opt3res=$conn->query($opt3);
    $sum3 = mysqli_fetch_assoc($opt3res);
    
    if($sum3['total3']==null){
       $blue=0;
    }else{
      $blue=$sum3['total3']*5;  
    }
    
    
    
    $a = [];
$a[0] = $black;
$a[1] = $red;
$a[2] = $blue;
$a[3] = $green;






$colors=array('black','red','blue','green');

$min_val = min($a);

$min_indexes = [];
foreach($a as $i => $val){
    if($val == $min_val) $min_indexes[] = $i;
}


$index= $min_indexes[rand(0,count($min_indexes)-1)];
       
    

  
      
 $nextres=$colors[$index];
$nclo=generateRes($nextres);
 $clo=$nextres;
  echo $clo;
  
    $num=rand(40000,50000);
    $ans=3.33+($nclo*6.66);
       
        
    }else{
        
     
if($next==1){
    $nextres='black';
}elseif($next==2){
     $nextres='red';
}elseif($next==3){
     $nextres='blue';
}elseif($next==4){
     $nextres='green';
}
     
echo $nextres;
$nclo=generateRes($nextres);
 $clo=$nextres;
  echo $clo;
  
    $num=rand(40000,50000);
    $ans=3.33+($nclo*6.66);    
    }



   




$exist="SELECT COUNT(*) as betnum FROM wheelbetting WHERE status='pending'";
$existres=$conn->query($exist);
$exists= mysqli_fetch_assoc($existres);


if( $exists['betnum']==0){
   echo"working";
$rec="INSERT INTO wheelbetrec (period,ans,num,clo) VALUES ($period,$ans,$num,'$clo')";
$conn->query($rec);




}else{
     
      echo"start";  
    
$addwin00="UPDATE wheelbetting SET res='fail',fres='$clo' WHERE period=$period ";
$conn->query($addwin00);

     $bet0="SELECT username,amount FROM wheelbetting WHERE status='pending' ";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
 $b1=(40/100)*((2/100)*$fbets0);
    $b2=(20/100)*((2/100)*$fbets0);
    $b3=(10/100)*((2/100)*$fbets0);
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
    if($r!=""){
        $addb1="UPDATE users SET bonus=bonus +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$winner0','$r','$b1','1')";
        $conn->query($recb1);
       
        if($r1!=""){
            $addb2="UPDATE users SET bonus=bonus +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$winner0','$r1','$b2','2')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET bonus=bonus +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount,level) VALUES ('$winner0','$r2','$b3','3')";
                $conn->query($recb2);
            }
           
        }
    }
    }








    if($clo=="black" ){
        $bet2="SELECT username,amount,ans FROM wheelbetting WHERE status='pending' AND ans='black' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*2;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$transquery="INSERT INTO trans (username,reason,amount,type) VALUES ('$winner2','WheeloCity Order Income',$winamount2,'add')";
	$conn->query($transquery);
$addfairwin2="UPDATE wheelbetting SET res='success' WHERE ans='black'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}}else  if($clo=="red" ){
        $bet2="SELECT username,amount,ans FROM wheelbetting WHERE status='pending' AND ans='red' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*3;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$transquery="INSERT INTO trans (username,reason,amount,type) VALUES ('$winner2','WheeloCity Order Income',$winamount2,'add')";
	$conn->query($transquery);
$addfairwin2="UPDATE wheelbetting SET res='success' WHERE ans='red'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
} }else  if($clo=="blue" ){
        $bet2="SELECT username,amount,ans FROM wheelbetting WHERE status='pending' AND ans='blue' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*5;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$transquery="INSERT INTO trans (username,reason,amount,type) VALUES ('$winner2','WheeloCity Order Income',$winamount2,'add')";
	$conn->query($transquery);
$addfairwin2="UPDATE wheelbetting SET res='success' WHERE ans='blue'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
}}else if($clo=="green" ){
        $bet2="SELECT username,amount,ans FROM wheelbetting WHERE status='pending' AND ans='green' ";
$betres2=$conn->query($bet2);
while($row2 = mysqli_fetch_array($betres2)){
     echo"end";
$winner2=$row2['username'];   
$fbets2= $row2['amount'];
$winamount2= ($fbets2-(2/100)*$fbets2)*50;
$addwin2="UPDATE users SET balance= balance+$winamount2 WHERE username=$winner2";
$conn->query($addwin2);
$transquery="INSERT INTO trans (username,reason,amount,type) VALUES ('$winner2','WheeloCity Order Income',$winamount2,'add')";
	$conn->query($transquery);
$addfairwin2="UPDATE wheelbetting SET res='success' WHERE ans='green'  AND username=$winner2 AND period=$period  ";
$conn->query($addfairwin2);
   
} }







$rec="INSERT INTO wheelbetrec (period,ans,num,clo) VALUES ($period,$ans,$num,'$clo')";
$conn->query($rec);

}

 





$suc="UPDATE wheelbetting SET status='sucessful' WHERE status='pending'";
$conn->query($suc);

$checkperiod_Query=mysqli_query($conn,"select * from `period` order by id desc limit 1");
$periodRow=mysqli_num_rows($checkperiod_Query);
$periodidRow=mysqli_fetch_array($checkperiod_Query);


if($lastperiodid==$periodidRow['period'])
{
  $truncateQuery=mysqli_query($conn,"TRUNCATE TABLE `period`");
  $truncateResultQuery=mysqli_query($conn,"TRUNCATE TABLE `period`");
    $sql19=mysqli_query($conn,"INSERT INTO `period` (`period`,`nxt`) VALUES ('".$firstperiodid."','0')");  
}elseif($periodRow=='' OR $periodRow=='0')
{
$sql19=mysqli_query($conn,"INSERT INTO `period` (`period`,`nxt`) VALUES ('".$firstperiodid."','0')");
	

}else 
{
$sql4 = "UPDATE wheelperiod SET period= period + 1 ,nxt='0' WHERE id='1'";
$conn->query($sql4);
	}





$conn->close();
?>