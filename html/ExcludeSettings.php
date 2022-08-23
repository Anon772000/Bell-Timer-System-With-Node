<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
$arr1 = json_decode(file_get_contents('assets/json/exclude.json'), true);

$id = $_GET['id'];

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
  <a type='button' class="btn btn-primary" href="BellTimings.php">Back</a>
  </div>
</div>
<br><br>
<form action="Excludenew.php" method="get">

  <div class="row">
  <div class="col-md-12 mr-auto ml-auto">
  <table style="width:100%">




    <tr>
    <th>Name</th>
    <th>date</th>
    </tr>
    <tr>
<input type='hidden' name='id' name='id' value='<?=$id?>'>
  <td><input class='form-control' aria-label='name' id="name" name="name" value="<?=$arr1[$id]['name']?>"></td>
  <td><input type='date'class='form-control'aria-label='start'id="start" name="start" value="<?=$arr1[$id]['date']?>"></td>
</tr>
    




</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-success">Save Edit</button>
</form>
<a class="btn btn-danger" href="deleteexclude.php?id=<?=$id?>">DELETE</a>
</div>




  </div>
  </div>
</div>
</body>

