<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");

$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);
$arr2 = json_decode(file_get_contents('assets/json/sounds.json'), true);



?>
</head>
<body>
<div class="fixed-top">
<a style="z-index:99;float:right;margin-right:5em;Margin-top:1em;"type='button' class="btn btn-primary" href="index.php">Back</a>
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





  </div>
  <div class="col-md-6 mr-auto ml-auto">
<h4>Templates</h4>
  <table id="myTable" style="width:100%">
  <tr>

  <th>Name</th>
<th></th>
</tr>
<?php
foreach ($arr1 as $key => $value){

echo("<tr>
  <td><input class='form-control' aria-label='bell' value='".$value['name']."' disabled ></td>

  <td><a style='float:right;' type='button' class='btn btn-success' href='EditTemplate.php?id=".$key."'>Edit</a></td>
 <td><a style='float:right;' type='button' class='btn btn-danger' href='DeleteTemplate.php?id=".$key."'>DELETE</a></td>
</tr>
");
}
?>


</table>
<div class="text-center" >
</br>
<a type='button' class="btn btn-primary" href="ChooseNewTemp.php">New Template</a>
</div>
<h4>Songs</h4>
  <table id="myTable" style="width:100%">
  <tr>
  <th>Name</th>
  <th>file</th>
</tr>
<?php
foreach ($arr2 as $key => $value){

echo("<tr>
  <td><input class='form-control' aria-label='bell' value='".$value['name']."' disabled ></td>
  <td><input class='form-control' value='".$value['dir']."' aria-label='bell' disabled ></td>
  </tr>
");
}
?>


</table>
<div class="text-center" >
</br>
<a type='button' class="btn btn-primary" href="songs.php">New Song</a>
</div>



  </div>
  </div>
</div>
</body>
