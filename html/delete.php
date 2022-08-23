<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");

$id = $_GET['bellid'];
$temp = $_GET['id'];
$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);




$name = $arr1[$temp]['bells'][$id]['name'];
$time = $arr1[$temp]['bells'][$id]['time'];




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
<form action="deleting.php" method="get">

  <div class="row">
  <div class="col-md-12 mr-auto ml-auto text-center">
<h2>ARE YOU SURE YOU WANT TO DELETE THIS BELL</h2>
<H4>ONCE DELETED IT CAN NOT BE RECOVERED</H4>

  <table style="width:100%">




    <tr>
    <th class='text-center'><div class='input-group'>
    <div class='input-group-prepend'>
      <span class='input-group-text'>bell</span>
    </div>
    <input type="hidden" id='id' name='id'value="<?=$temp?>">
    <input type="hidden" id='bellid' name='bellid'value="<?=$id?>">
    <input class='form-control' aria-label='bell' id='name' name='name'value="<?=$name?>" disabled>
  </div></th>
  <td class='text-center'>set time</td>
    <td class='text-center'><input class='form-control' id='time' name='time' type='time' value="<?=$time?>"disabled></td>
    

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
