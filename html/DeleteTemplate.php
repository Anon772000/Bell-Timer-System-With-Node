<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
$error="";
$id = $_GET['id'];
if(isset($_GET['error'])){
$error = $_GET['error'];
}
$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);




$name = $arr1[$id]['name'];




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
<form action="deletingTemp.php" method="get">

  <div class="row">
  <div class="col-md-12 mr-auto ml-auto text-center">
<h2>ARE YOU SURE YOU WANT TO DELETE THIS TEMPLATE?</h2>
<H4>ONCE DELETED IT CAN NOT BE RECOVERED</H4>
<h1 style="color:red"><?=$error?><h1>
  <table style="width:100%">




    <tr>
    <th class='text-center'><div class='input-group'>
    <div class='input-group-prepend'>
      <span class='input-group-text'>Template</span>
    </div>
    <input type="hidden" id='id' name='id'value="<?=$id?>">
    <input class='form-control' aria-label='bell' id='name' name='name'value="<?=$name?>" disabled>
  </div></th>
    

    </tr>




</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-danger">DELETE</button>
</div>
</form>



  </div>
  </div>
</div>
</body>

