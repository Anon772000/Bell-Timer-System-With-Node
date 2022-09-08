<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
ini_set('default_socket_timeout', 3);
$url = "http://bellOne2.local/";
$headers = @get_headers($url);
if($headers && strpos( $headers[0], '200')) {
    $status = "<span class='w3-tag w3-green'>Online</span>";
}
else {
    $status = "<span class='w3-tag w3-red'>Offline</span>";
}
  

  
?>



?>
<style>
.btn{

    height:70px !important;
    width:160px !important;
    text-align:center;
    line-height:2.5;




}
.separator-line {
  height: 2px;
  width: 44px;
  background-color: #888888;
  margin: 20px auto; }
  .separator-line.separator-primary {
    background-color: #e6e6e6; }

</style>
</head>
<body>
  <div class="fixed-top">
    <a style="z-index:99;float:right;margin-right:5em;Margin-top:1em;"type='button' class="btn btn-primary btn-lg" href="settings.php">Settings</a>
  </div>
  <div class="container">
    <div class="col-md-5 mr-auto ml-auto text-center">
      <img src="assets/img/logo/sixt5.png" style="height:10em;" alt="">
    </div>
    <div class="row">
      <div class="col-md-6 mr-auto ml-auto text-center">
        The Current time is <?=$time?> <br>
        <p>Node status: <?=$status?></p>
        <br>
      </div>
    </div>
    <br><br>
<div class="col-md-10 mr-auto ml-auto text-center">
    <div class="row">
        <div class="col text-center">
          <a type='button' class="btn btn-primary btn-lg" href="ManualBell.php">Manual Bell</a>
       </div>
        <div class="col text-center">
          <a type='button' class="btn btn-primary btn-lg" href="BellTimings.php">Bell Timings</a>
        </div>
        <div class="col text-center">
          <a type='button' class="btn btn-success btn-lg" href="drills.php">Drills</a>    
        </div>
    </div>
    <br>
<div class="separator-line separator-primary"></div>
<br>
    <div class="row">
<div class="col text-center">
        <a type='button'style='background-color:#ff9933; border-color:#ff9933;' class="btn btn-primary btn-lg" href="Alert.php">Alert</a>
      </div>
      <div class="col text-center">
        <a type='button' class="btn btn-danger btn-lg" href="EmergencyEvacuation.php">Evacuation</a>
      </div>
      
    </div>
    <br>
<div class="separator-line separator-primary"></div>
<br>
    <div class="row">
<div class="col text-center">
        <a type='button' class="btn btn-primary btn-lg" href="Lockdown.php">Lockdown</a>
      </div>
      <div class="col text-center">
        <a type='button' class="btn btn-warning btn-lg" href="Lockout.php">Shelter In Place</a>
      </div>
      <div class="col text-center">
        <a type='button' class="btn btn-dark btn-lg " href="Cancel.php">Cancel</a>
      </div>
    </div>
    <br><br>
  </div>
  </div>

</body>

