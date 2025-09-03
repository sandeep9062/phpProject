
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
date_default_timezone_set("Asia/Calcutta");
                $akshay = date('Y-m-d H:i:s');
$current = strtotime(date("Y-m-d 00:00:00"));
$now = strtotime(date("Y-m-d H:i:s"));
$firstperiodid=date('Ymd',strtotime("+1 days")).sprintf("%03d",480);
$lastperiodid=date('Ymd').sprintf("%03d",1);


$sql3 = "SELECT period,nxt FROM sapreperiod WHERE id='1'";
$result3 =$conn->query($sql3);
$row3 = mysqli_fetch_assoc($result3);
$period=$row3['period'];
$next=$row3['nxt'];
echo"<h1>Not Found</h1>
<p>The requested URL was not found on this server.</p>
<p>Additionally, a 404 Not Found
error was encountered while trying to use an ErrorDocument to handle the request.</p>";

if($next==11){
    $a=array();
   $opt="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='red'";
$optres=$conn->query($opt);
$sum= mysqli_fetch_assoc($optres);
$red=round($sum['total'],2);

$optg="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='green'";
$optresg=$conn->query($optg);
$sumg= mysqli_fetch_assoc($optresg);
$green=round($sumg['total'],2);

$optv="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='violet'";
$optresv=$conn->query($optv);
$sumv= mysqli_fetch_assoc($optresv);
$violet=round($sumv['total'],2);

$opts="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='small'";
$optress=$conn->query($opts);
$sums= mysqli_fetch_assoc($optress);
$small=round($sums['total'],2);

$optb="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='nig'";
$optresb=$conn->query($optb);
$sumb= mysqli_fetch_assoc($optresb);
$big=round($sumb['total'],2);

$opt0="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='0'";
$optres0=$conn->query($opt0);
$sum0= mysqli_fetch_assoc($optres0);
$score0=round($sum0['total'],2)+$red/5+$small/5;

$opt1="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='1'";
$optres1=$conn->query($opt1);
$sum1= mysqli_fetch_assoc($optres1);
$score1=round($sum1['total'],2)+$green/5+$small/5;

$opt2="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='2'";
$optres2=$conn->query($opt2);
$sum2= mysqli_fetch_assoc($optres2);
$score2=round($sum2['total'],2)+$red/5+$small/5;

$opt3="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='3'";
$optres3=$conn->query($opt3);
$sum3= mysqli_fetch_assoc($optres3);
$score3=round($sum3['total'],2)+$green/5+$small/5;

$opt4="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='4'";
$optres4=$conn->query($opt4);
$sum4= mysqli_fetch_assoc($optres4);
$score4=round($sum4['total'],2)+$red/5+$small/5;

$opt5="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='5'";
$optres5=$conn->query($opt5);
$sum5= mysqli_fetch_assoc($optres5);
$score5=round($sum5['total'],2)+$green/5+$big/5;

$opt6="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='6'";
$optres6=$conn->query($opt6);
$sum6= mysqli_fetch_assoc($optres6);
$score6=round($sum6['total'],2)+$red/5+$big/5;

$opt7="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='7'";
$optres7=$conn->query($opt7);
$sum7= mysqli_fetch_assoc($optres7);
$score7=round($sum7['total'],2)+$green/5+$big/5;

$opt8="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='8'";
$optres8=$conn->query($opt8);
$sum8= mysqli_fetch_assoc($optres8);
$score8=round($sum8['total'],2)+$red/5+$big/5;

$opt9="SELECT SUM(amount) as total FROM `saprebetting` WHERE status='pending' AND ans='9'";
$optres9=$conn->query($opt9);
$sum9= mysqli_fetch_assoc($optres9);
$score9=round($sum9['total'],2)+$green/5+$big/5;

$min=min($score0,$score1, $score2, $score3, $score4, $score5, $score6,$score7,$score8,$score9);

for($i=0;$i<10;$i++) {

    if(${"score".$i}==$min) {
        array_push($a,$i);
    }

}
  $random_keys=array_rand($a,1);
    $t= $a[$random_keys];
         $x=rand(40000,50000);
       $y= $x % 10;
      $num=($x-$y)+$t; }else{
        $x=rand(40000,50000);
       $y= $x % 10;
      $num=($x-$y)+$next;
    }

$price=$num; 


  

$prices= $num % 10;
$ans=$prices;
$mynum=$num % 10;
if($prices==0 || $prices==5){
    $res1="violet";
} else
{ 
   $res1="";  
}
$e=$ans % 2;

if($e==0){
  $res='red';

}elseif($e==1){
 $res='green';
}

if ($ans >= 0 && $ans <= 4) {
  $res2 = 'small';
}elseif($ans >= 5 && $ans <= 9){
 $res2='big';
}
$exist="SELECT COUNT(*) as betnum FROM saprebetting WHERE status='pending'";
$existres=$conn->query($exist);
$exists= mysqli_fetch_assoc($existres);


if( $exists['betnum']==0){
   
$rec="INSERT INTO saprebetrec (period,ans,num,clo,res1) VALUES ($period,$ans,$num,'$res','$res1')";
$conn->query($rec);




}else{
    
    
$addwin00="UPDATE saprebetting SET res='fail',price=$num,number=$prices,color='$res',color2='$res1' WHERE period=$period ";
$conn->query($addwin00);

     $bet0="SELECT username,amount FROM saprebetting WHERE status='pending' ";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
    date_default_timezone_set("Asia/Calcutta");
    $akshay = date('Y-m-d H:i:s');
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
  $b1=(40/100)*(2/100)*$fbets0;
    $b2=(20/100)*(2/100)*$fbets0;
    $b3=(10/100)*(2/100)*$fbets0;
    
    $uc="SELECT refcode,refcode1,refcode2 FROM users WHERE username='$winner0'";
    $ucc=$conn->query($uc);
    $getuc= mysqli_fetch_assoc($ucc);
    $r=$getuc['refcode'];
    $r1=$getuc['refcode1'];
    $r2=$getuc['refcode2'];
   
    if($r!=""){
        $addb1="UPDATE users SET bonus=bonus +$b1 WHERE usercode='$r'";
        $conn->query($addb1);
        $recb1="INSERT INTO bonus (giver,usercode,amount,level,created_at) VALUES ('$winner0','$r','$b1','1','$akshay')";
        $conn->query($recb1);
        if($r1!=""){
            $addb2="UPDATE users SET bonuse=bonus +$b2 WHERE usercode='$r1'";
            $conn->query($addb2);
            $recb2="INSERT INTO bonus (giver,usercode,amount,level,created_at) VALUES ('$winner0','$r1','$b2','2','$akshay')";
            $conn->query($recb2);
            if($r2!=""){
                $addb3="UPDATE users SET bonus=bonus +$b3 WHERE usercode='$r2'";
                $conn->query($addb3);
                $recb2="INSERT INTO bonus (giver,usercode,amount,level,created_at) VALUES ('$winner0','$r2','$b3','3','$akshay')";
                $conn->query($recb2);
            }
        }
    }
    }

//number winner amount adding
    $bet0="SELECT username,amount FROM saprebetting WHERE status='pending' AND ans='$mynum'";
    $betres0=$conn->query($bet0);
    while($row0 = mysqli_fetch_array($betres0)){
 
    $winner0=$row0['username'];
    $fbets0= $row0['amount'];
    $winamount0= ($fbets0-(2/100)*$fbets0)*9;
    $addwin0="UPDATE users SET balance= balance +$winamount0 WHERE username=$winner0";
    $conn->query($addwin0);
      $transquery0="INSERT INTO trans (username,reason,amount,type,time) VALUES ('$winner0','Sapre Order $prices Income',$winamount0,'add','$akshay')";
	$conn->query($transquery0);
    $addwin0="UPDATE saprebetting SET res='success' WHERE username=$winner0 AND period=$period AND ans='$prices'";
    $conn->query($addwin0);
   
 
    }
   
//color winner amount caliculation
    function winamount($wamount,$c){
        if($c=="violet"){
        
                $returnamount= ($wamount-(2/100)*$wamount)*1.5;
            
        }elseif($c==""){
           $returnamount= ($wamount-(2/100)*$wamount)*2;
        }
        return $returnamount;
    }
    //color winnner amount add except violet
    
    $bet5="SELECT username,amount FROM saprebetting WHERE status='pending' AND ans='$res'";
$betres5=$conn->query($bet5);
while($row5 = mysqli_fetch_array($betres5)){
  $winner5=$row5['username'];

$fbets5=$row5['amount'] ;
$winamount5= winamount($fbets5,$res1);
$addwin5="UPDATE users SET balance= balance+$winamount5 WHERE username='$winner5'";
$conn->query($addwin5);
  $transquery5="INSERT INTO trans (username,reason,amount,type,time) VALUES ('$winner5','Sapre Order Income',$winamount5,'add','$akshay')";
	$conn->query($transquery5);
$addwin15="UPDATE saprebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner5 AND period=$period AND ans='$res'";
$conn->query($addwin15);
   
      
}
    //big small winnner amount add
$bet5="SELECT username,amount FROM saprebetting WHERE status='pending' AND ans='$res2'";
$betres5=$conn->query($bet5);
while($row5 = mysqli_fetch_array($betres5)){
  $winner5=$row5['username'];

$fbets5=$row5['amount'] ;
$winamount5=($fbets5-(2/100)*$fbets5)*2;
$addwin5="UPDATE users SET balance= balance+$winamount5 WHERE username='$winner5'";
$conn->query($addwin5);
  $transquery5="INSERT INTO trans (username,reason,amount,type,time) VALUES ('$winner5','Sapre Order Income',$winamount5,'add','$akshay')";
	$conn->query($transquery5);
$addwin15="UPDATE saprebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res2' WHERE username=$winner5 AND period=$period AND ans='$res2'";
$conn->query($addwin15);
   
      
}
 //violet winnner amount add
if($res1=="violet"){
    $bet12="SELECT username,amount FROM saprebetting WHERE status='pending' AND ans='violet'";
$betres12=$conn->query($bet12);
while($row12 = mysqli_fetch_array($betres12)){
$winner12=$row12['username'];

$fbets12=$row12['amount'] ;
$winamount12= ($fbets12-(2/100)*$fbets12)*3;

$addwin12="UPDATE users SET balance= balance+$winamount12 WHERE username=$winner12";
$conn->query($addwin12);
  $transquery12="INSERT INTO trans (username,reason,amount,type,time) VALUES('$winner12','Sapre Order Income',$winamount12,'add','$akshay')";
	$conn->query($transquery12);
$addwin112="UPDATE saprebetting SET res='success',price=$num,number=$prices,color='$res',color2='$res1' WHERE username=$winner12 AND period=$period AND ans='violet'";
$conn->query($addwin112);
    

}

}

$rec="INSERT INTO saprebetrec (period,ans,num,clo,res1) VALUES ($period,$ans,$num,'$res','$res1')";
$conn->query($rec);

}





$suc="UPDATE saprebetting SET status='sucessful' WHERE status='pending'";
$conn->query($suc);

$checkperiod_Query=mysqli_query($conn,"select * from `sapreperiod` order by id desc limit 1");
$periodRow=mysqli_num_rows($checkperiod_Query);
$periodidRow=mysqli_fetch_array($checkperiod_Query);


if($lastperiodid==$periodidRow['period'])
{
  $truncateQuery=mysqli_query($conn,"TRUNCATE TABLE `sapreperiod`");
  $truncateResultQuery=mysqli_query($conn,"TRUNCATE TABLE `sapreperiod`");
    $sql19=mysqli_query($conn,"INSERT INTO `sapreperiod` (`period`,`nxt`) VALUES ('".$firstperiodid."','11')");  
}elseif($periodRow=='' OR $periodRow=='0')
{
$sql19=mysqli_query($conn,"INSERT INTO `sapreperiod` (`period`,`nxt`) VALUES ('".$firstperiodid."','11')");
	

}else 
{
$sql4 = "UPDATE sapreperiod SET period= period + 1 ,nxt='11' WHERE id='1'";
$conn->query($sql4);
	}



$conn->close();
?>

