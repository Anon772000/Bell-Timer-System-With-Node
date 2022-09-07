<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");

$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);
$id = $_GET['id'];
$name = $arr1[$id]['name'];
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
  <a type='button' class="btn btn-primary" href="settings.php">Back</a>
    </div>
</div>
<br><br>
<div class='row'>
  <div class="col-md-4 mr-auto ml-auto text-center">
<form action = "NameChangeTemp.php" method="get">
<input type="hidden" id="id" name="id" value = "<?=$id?>">
    <h4>Template Name</h4>
    <input class='form-control' aria-label='bell' id='name' name='name' value="<?=$name?>">

</div>
</div>
</form>
<br><br>
  <div class="row">
  <div class="col-md-12 mr-auto ml-auto">
  <table id="myTable" style="width:100%">
  <?php

foreach ($arr1[$id]['bells'] as $key => $value){
  $days = "";
  if(isset($value['monday'])){
    if($value['monday'] == "on"){
      $days.="Mon ";
    }
  }
  if(isset($value['tuesday'] )){
    if($value['tuesday'] == "on"){
      $days.="Tue ";
    }
  }
  if(isset($value['wednesday'] )){
    if($value['wednesday'] == "on"){
      $days.="Wed ";
    }
  }
  if(isset($value['thursday'] )){
    if($value['thursday'] == "on"){
      $days.="Thu ";
    }
  }
  if(isset($value['friday'])){
    if($value['friday'] == "on"){
      $days.="Fri ";
    }
  }
  if(isset($value['saturday'])){
    if($value['saturday'] == "on"){
      $days.="Sat ";
    }
  }
  if(isset($value['sunday'] )){
    if($value['sunday'] == "on"){
      $days.="Sun ";
    }
  }
  if(isset($value['weekdays'] )){
    if($value['weekdays'] == "on"){
     $days ="Mon, Tue, Wed, Thu, Fri";
    }
  }
  
  if(isset($value['weekends'] )){
    if($value['weekends'] == "on"){
     $days .="Sat, Sun";
    }
  }
  echo("
  <form action='write.php' method='get'>
    <tr id='".$key."'>
    <th class='text-center'><div class='input-group'>
    <div class='input-group-prepend'>
      <span class='input-group-text'>bell</span>
    </div>
    
   
    <input class='form-control' aria-label='bell' value='".$value['name']."'disabled>
  </div></th>
  <td class='text-center' style='padding-left:10px;padding-right:10px;'>Current set time</td>
    <td class='text-center'><input class='form-control' id='time' name ='time' type='time' value='".$value['time']."' disabled></td>
    <td class='text-center'>
    <div class='input-group '>
    <div class='input-group-prepend'>
    <label class='input-group-text' for='inputGroupSelect01'>Day(s)</label>
    </div>
    <select class='custom-select' id='inputGroupSelect01' disabled>

    <option selected value='0'>".$days."</option>
    </select>
    </div>
    </td>
    <td class='text-center'>
    <div class='input-group '>
    <div class='input-group-prepend'>
    <label class='input-group-text' for='inputGroupSelect01'>Zone(s)</label>
    </div>
    <select class='custom-select' id='inputGroupSelect01' disabled>

    <option selected value='0'>".$value['zone']."</option>
    </select>
    </div>
    </td>
    
    <td class='text-center'><a type='button' href='change.php?bellid=".$key."&id=".$id."' class='btn btn-success'>Change</a></td>
    <td class='text-center'><a type='button' href='delete.php?bellid=".$key."&id=".$id."' class='btn btn-danger'>X</a></td>
    </tr>
    </form>
  ");
  
}


?>




</table>



<div class="text-center" style='margin: 20px;'>
<a type='button' class="btn btn-primary" href="newbell.php?id=<?=$id?>">New Bell</a>
</div>

  </div>
  </div>
</div>
</body>

