<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['adusername']))
{
    header("location: admin");
    exit;
}
?>
<!DOCTYPE html>
<!-- saved from url=(0048)https://colorlib.com/etc/lf/Login_v20/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login V20</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v20/images/icons/favicon.ico">

<link rel="stylesheet" type="text/css" href="./Login V20_files/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="./Login V20_files/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="./Login V20_files/icon-font.min.css">

<link rel="stylesheet" type="text/css" href="./Login V20_files/animate.css">

<link rel="stylesheet" type="text/css" href="./Login V20_files/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="./Login V20_files/animsition.min.css">

<link rel="stylesheet" type="text/css" href="./Login V20_files/select2.min.css">

<link rel="stylesheet" type="text/css" href="./Login V20_files/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="./Login V20_files/util.css">
<link rel="stylesheet" type="text/css" href="./Login V20_files/main.css">

<meta name="robots" content="noindex, follow">
<script type="text/javascript" async="" src="./Login V20_files/analytics.js.download" nonce="d2a6ed5f-80c8-4f7f-8df7-e8d0b99320c7"></script><script defer="" referrerpolicy="origin" src="./Login V20_files/s.js.download"></script><script nonce="d2a6ed5f-80c8-4f7f-8df7-e8d0b99320c7">(function(w,d){!function(bb,bc,bd,be){bb[bd]=bb[bd]||{};bb[bd].executed=[];bb.zaraz={deferred:[],listeners:[]};bb.zaraz.q=[];bb.zaraz._f=function(bf){return async function(){var bg=Array.prototype.slice.call(arguments);bb.zaraz.q.push({m:bf,a:bg})}};for(const bh of["track","set","debug"])bb.zaraz[bh]=bb.zaraz._f(bh);bb.zaraz.init=()=>{var bi=bc.getElementsByTagName(be)[0],bj=bc.createElement(be),bk=bc.getElementsByTagName("title")[0];bk&&(bb[bd].t=bc.getElementsByTagName("title")[0].text);bb[bd].x=Math.random();bb[bd].w=bb.screen.width;bb[bd].h=bb.screen.height;bb[bd].j=bb.innerHeight;bb[bd].e=bb.innerWidth;bb[bd].l=bb.location.href;bb[bd].r=bc.referrer;bb[bd].k=bb.screen.colorDepth;bb[bd].n=bc.characterSet;bb[bd].o=(new Date).getTimezoneOffset();if(bb.dataLayer)for(const bo of Object.entries(Object.entries(dataLayer).reduce(((bp,bq)=>({...bp[1],...bq[1]})),{})))zaraz.set(bo[0],bo[1],{scope:"page"});bb[bd].q=[];for(;bb.zaraz.q.length;){const br=bb.zaraz.q.shift();bb[bd].q.push(br)}bj.defer=!0;for(const bs of[localStorage,sessionStorage])Object.keys(bs||{}).filter((bu=>bu.startsWith("_zaraz_"))).forEach((bt=>{try{bb[bd]["z_"+bt.slice(7)]=JSON.parse(bs.getItem(bt))}catch{bb[bd]["z_"+bt.slice(7)]=bs.getItem(bt)}}));bj.referrerPolicy="origin";bj.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bb[bd])));bi.parentNode.insertBefore(bj,bi)};["complete","interactive"].includes(bc.readyState)?zaraz.init():bb.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-b-160 p-t-50">
<form action="adminverify" id="adminverify" method="POST" class="login100-form validate-form">
<span class="login100-form-title p-b-43">
Account Login
</span>
<div class="wrap-input100 rs1 validate-input" data-validate="Username is required">
<input class="input100" type="text" id="Username"name="username" >
<span class="label-input100">Username</span>
</div>
<div class="wrap-input100 rs2 validate-input" data-validate="Password is required">
<input class="input100" type="password"  id="inputPassword"  name ="password" >
<span class="label-input100">Password</span>
</div>
<div class="container-login100-form-btn">
<button class="login100-form-btn">
Sign in
</button>
</div>
<div class="text-center w-full p-t-23">
<a href="https://t.me/SoumyaGamers" class="txt1">
Contact Developer?
</a>
</div>
</form>
</div>
</div>
</div>

<script src="./Login V20_files/jquery-3.2.1.min.js.download"></script>

<script src="./Login V20_files/animsition.min.js.download"></script>

<script src="./Login V20_files/popper.js.download"></script>
<script src="./Login V20_files/bootstrap.min.js.download"></script>

<script src="./Login V20_files/select2.min.js.download"></script>

<script src="./Login V20_files/moment.min.js.download"></script>
<script src="./Login V20_files/daterangepicker.js.download"></script>

<script src="./Login V20_files/countdowntime.js.download"></script>

<script src="./Login V20_files/main.js.download"></script>

<script async="" src="./Login V20_files/js"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer="" src="./Login V20_files/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon="{&quot;rayId&quot;:&quot;81e31e9a9f7a4aba&quot;,&quot;version&quot;:&quot;2023.10.0&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;}" crossorigin="anonymous"></script>


</body></html>