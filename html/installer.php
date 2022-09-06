<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");

$arr1 = json_decode(file_get_contents('assets/json/termDates.json'), true);


?>
</head>
<body>
<div class="fixed-top">
<a style="z-index:99;float:right;margin-right:5em;Margin-top:1em;"type='button' class="btn btn-primary" href="newbell.php">Settings</a>
</div>
<div class="container">
<div class="col-md-5 mr-auto ml-auto text-center">
<img src="assets/img/logo/sixt5.png" style="height:10em;" alt="">
</div>
<div class="row">
  <div class="col-md-8 mr-auto ml-auto text-center">
  The Current time is <?=$time?> <br><br>
    </div>
</div>
<br><br>

  <div class="row">
  <div class="col-md-5 mr-auto ml-auto">
<h4>ip Address</h4>
<input class="form-control" aria-label="bell" value="192.168.15.2" disabled>




  </div>
  <div class="col-md-6 mr-auto ml-auto">

<h4>Volume prioity</h4>
<input class="form-control" aria-label="bell" value="100%" disabled>

<h4>Volume Bells</h4>
<input class="form-control" aria-label="bell" value="100%" disabled>

  </div>
  </div>
</div>
</body>

