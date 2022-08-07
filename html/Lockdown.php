<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
?>
</head>
<body>
    <div class="container">
        <div class="col-md-5 mr-auto ml-auto text-center">
            <img src="assets/img/logo/sixt5.png" style="height:10em;" alt="">
        </div>
        <div class="row">
            <div class="col-md-8 mr-auto ml-auto text-center">
                The Current time is <?=$time?> <br><br>
                <a type='button' class="btn btn-primary" href="index.php">Back</a>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12 mr-auto ml-auto text-center">
                <h1>ARE YOU SURE YOU WANT TO RING A LOCKDOWN?</h2>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col text-center">
                <a type='button' class="btn btn-danger" href="LockdownRinging.php">RING LOCKDOWN</a>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col text-center">
                <a type='button' class="btn btn-primary" href="index.php">Go Back</a>
            </div>
        </div>
    </div>
</body>

