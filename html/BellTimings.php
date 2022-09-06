<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
$usd  = uniqid();
$arr1 = json_decode(file_get_contents('assets/json/termDates.json'), true);

$arr2 = json_decode(file_get_contents('assets/json/special.json'), true);

$arr3 = json_decode(file_get_contents('assets/json/exclude.json'), true);
?>
</head>
<body>
<div class="fixed-top">
<a style="z-index:99;float:right;margin-right:5em;Margin-top:1em;"type='button' class="btn btn-primary" href="settings.php">Settings</a>
</div>
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
<div class="col-md-9 mr-auto ml-auto">
<h5>Terms</h5>
  <table id="myTable" style="width:100%">

  <tr>
  <th>Name</th>
  <th>Start Period</th>
  <th>Finish Period</th>
</tr>
<?php
foreach ($arr1 as $key => $value){

echo("<tr>
  <td><input class='form-control' aria-label='bell' value='".$value['name']."'disabled ></td>
  <td><input type='date'class='form-control' value='".$value['start']."' aria-label='bell' disabled ></td>
  <td><input type='date' class='form-control'value='".$value['finish']."' aria-label='bell' disabled ></td>
<td><a type='button' class='btn btn-success' href='TermSettings.php?id=".$key."'>Edit</a></td>
</tr>
");
}
?>
</table>


<div class='text-center' style='margin-top:20px;'>
<a type='button' class="btn btn-primary" href="TermSettings.php?id=<?=$usd?>">New Term</a>
</div>
  </div>
<div class="col-md-9 mr-auto ml-auto">
<h5>Special Dates</h5>
  <table id="myTable" style="width:100%">

  <tr>
  <th>Name</th>
  <th>Date</th>
</tr>
<?php
foreach ($arr2 as $key => $value){

echo("<tr>
  <td><input class='form-control' aria-label='bell' value='".$value['name']."'disabled ></td>
  <td><input type='date'class='form-control' value='".$value['date']."' aria-label='bell' disabled ></td>
<td><a type='button' class='btn btn-success' href='SpSettings.php?id=".$key."'>Edit</a></td>
</tr>
");
}
?>
</table>


<div class='text-center' style='margin-top:20px;'>
<a type='button' class="btn btn-primary" href="SpSettings.php?id=<?=$usd?>">New Special Date</a>
</div>
  </div>
<div class="col-md-9 mr-auto ml-auto">
<h5>Excluded Dates</h5>
  <table id="myTable" style="width:100%">

  <tr>
  <th>Name</th>
  <th>Date</th>
</tr>
<?php
foreach ($arr3 as $key => $value){

echo("<tr>
  <td><input class='form-control' aria-label='bell' value='".$value['name']."'disabled ></td>
  <td><input type='date'class='form-control' value='".$value['date']."' aria-label='bell' disabled ></td>
<td><a type='button' class='btn btn-success' href='ExcludeSettings.php?id=".$key."'>Edit</a></td>
</tr>
");
}
?>
</table>


<div class='text-center' style='margin-top:20px;'>
<a type='button' class="btn btn-primary" href="ExcludeSettings.php?id=<?=$usd?>">New Excluded Date</a>
</div>
  </div>


  </div>
</div>
<br>
<br>
<br>
<br>
<br>
</body>

