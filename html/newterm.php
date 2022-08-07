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
  <a type='button' class="btn btn-primary" href="mark2.php">Back</a>
  </div>
</div>
<br><br>
<form action="termnew.php" method="get">

  <div class="row">
  <div class="col-md-12 mr-auto ml-auto">
  <table style="width:100%">




    <tr>
    <th>Name</th>
    <th>Start Period</th>
    <th>Finish Period</th>
    </tr>
    <tr>
  <td><input class='form-control' aria-label='name' id="name" name="name"></td>
  <td><input type='date'class='form-control'aria-label='start'id="start" name="start"></td>
  <td><input type='date' class='form-control'aria-label='finish'id="finish" name="finish"></td>
</tr>
    




</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-success">Create term</button>
</div>
</form>



  </div>
  </div>
</div>
</body>

