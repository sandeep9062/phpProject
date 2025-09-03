<?php
session_start();


require_once "conn.php";
$sql = "SELECT  upi FROM notice WHERE id='1'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
$upi1 = $row['upi'];
$a = array("$upi1");
$random_keys = array_rand($a, 1);
$upiid = $a[$random_keys];
$am = $_GET['am'];
$user= $_GET['user'];

 $conn->close();

?>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
    <meta http-equiv="expires" content="1">
    <meta name="google" value="notranslate">
    <meta name="msapplication-TileColor" content="#0093ff">
    <meta name="theme-color" content="#0093ff">
    <meta name="msapplication-navbutton-color" content="#0093ff">
    <meta name="apple-mobile-web-app-status-bar-style" content="#0093ff">
    <meta name="description" content="Make money with fiewin">
    <link rel="shortcut icon" href="fevicon.png" type="image/x-icon">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="fiewin">
    <meta name="twitter:site" content="fiewin">
    <meta name="twitter:description" content="Make money with fiewin">
    <meta name="twitter:image" content="logo.jpg">
    <meta property="og:title" content="fiewin">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="fiewin">
    <meta property="og:url" content="">
    <meta name="msapplication-TileImage" content="logo.jpg">
    <meta property="og:image" content="logo.jpg">
    <meta property="og:description" content="Make money with fiewin">
    <meta property="url" content="">
    <meta property="type" content="website">
    <meta property="title" content="fiewin">
    <meta property="description" content="Make money with fiewin">
    <meta property="image" content="logo.jpg">
    <meta itemprop="image" content="logo.jpg">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="light.css?23.2.21.6">
    <link rel="stylesheet" href="dropzone.css?23.2.21.6">



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap');
    </style>
    <title>fiewin</title>
    <script>
             function upiPay(mode) {
            var inputc = document.body.appendChild(document.createElement("input"));
            inputc.value = document.getElementById("upiid").innerHTML.trim();
            inputc.focus();
            inputc.select();
            document.execCommand('copy');
            inputc.parentNode.removeChild(inputc);
            setTimeout(function() {
               window.location.replace("https://fiewin20.com/payment/confirmpayment?am=<?php echo $am; ?>&user=<?php echo $user; ?>&mode="+mode); 
            },100);}
        </script>
</head>

<body>
    <section class="container-fluid">
        <div class="row mcas">
            <div class="col-md-6 col-lg-4 main">
                <div class="row" id="warea">
                    <div class="col-12 m-record">
                        <div class="row nav-top auto">
                            <div class="col-3 xtl tf-14"><span class="nav-back wt" onclick="window.location.href='/#/recharge'"></span></div>
                            <div class="col-6 tfw-7 tf-18">Recharge</div>
                            <div class="col-3 xtr tf-14"><span onclick="rchl()">Help</span></div>
                            <div class="col-12 xtl tf-16 pt-2">Recharge Amount</div>
                            <div class="col-12 xtl tf-18 pb-2">₹ <span class="tf-36 tfw-7" id="rmt"><?php echo $am; ?></span></div>
                        </div>
                        <div class="row">
                            <div class="col-12 xtl tfw-6 tf-16 mt-4 tfcdb">Select Payment Method</div>
                            <div class="col-12 mt-4">
                                <div class="row mr-0">
                                    <div class="col-12 rcalbx" id="dtaod">
                                        <div class="row rowvac h56 tfwr mcpl"
                                            onclick="upiPay('PhonePe')">
                                            <div class="col-10 xtl tf-12">
                                                <span class="phonepe-logo"></span>
                                                <span class="tfw-5 tf-16">PhonePe</span>
                                                <span class="ml-2 dipn" id="upiid"><?php echo $upiid; ?></span>
                                            </div>
                                            <div class="col-2 pt-1 xtc">
                                                <input type="radio" id="ppc">
                                            </div>
                                        </div>
                                        <div class="row rowvac h56 mcpl"
                                            onclick="upiPay('Paytm')">
                                            <div class="col-10 xtl tf-12">
                                                <span class="paytm-logo"></span>
                                                <span class="tfw-5 tf-16">Paytm</span>
                                                <span class="ml-2 dipn" id="upx2"></span>
                                            </div>
                                            <div class="col-2 pt-1 xtc">
                                                <input type="radio" id="payc">
                                            </div>
                                        </div>
                                        <div class="row rowvac h56 mcpl"
                                            onclick="upiPay('GPay')">
                                            <div class="col-10 xtl tf-12">
                                                <span class="gpay-logo"></span>
                                                <span class="tfw-5 tf-16">GPay</span>
                                                <span class="ml-2 dipn" id="upx3"></span>
                                            </div>
                                            <div class="col-2 pt-1 xtc">
                                                <input type="radio" id="gpc">
                                            </div>
                                        </div>
                                        <div class="row rowvac h56 mcpl"
                                            onclick="return upiPay('upi')">
                                            <div class="col-10 xtl tf-12 rcaupi">
                                                <span class="upi nxl"></span>
                                                <span class="tfw-5 tf-20">Apps</span>
                                                <span class="ml-2 dipn" id="upx4"></span>
                                            </div>
                                            <div class="col-2 pt-1 xtc">
                                                <input type="radio" id="upc">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-4 justify mt-3 tfcdg">
                                <div class="tfcdb pb-2 tf-16">Tips</div>
                                <p>Welcome to use the quick recharge mode, please use APP to complete the payment of
                                    ₹<span id="rcmtl">450</span></p>
                                <p>The transaction funds are guaranteed by the fiewin platform throughout the process,
                                    which is very safe.</p>
                                <p>Please do not include any words in remarks.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="odrea"></div>
                <div class="row" id="opffp"></div>
                <div class="row" id="anof">

                </div>
                <div class="row" id="dta_ref"></div>
            </div>
        </div>
    </section>
    <input type="file" class="dz-hidden-input" accept=".png,.PNG,.jpg,.jpeg,.JPG,.JPEG"
        style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
       
</body>

</html>