<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");

$id = $_GET['id'];
$bellid = $_GET['bellid'];

$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);
$mon = "";
$tue = "";
$wed = "";
$thu = "";
$fri = "";
$sat = "";
$sun = "";
$weekdays = "";
$weekends = "";



$name = $arr1[$id]['bells'][$bellid]['name'];
$time = $arr1[$id]['bells'][$bellid]['time'];
$zone = $arr1[$id]['bells'][$bellid]['zone'];
if (isset($arr1[$id]['bells'][$bellid]['monday'])){
  $mon = "checked";
}
if (isset($arr1[$id]['bells'][$bellid]['tuesday'])){
  $tue = "checked";
}
if (isset($arr1[$id]['bells'][$bellid]['wednesday'])){
  $wed = "checked";
}
if (isset($arr1[$id]['bells'][$bellid]['thursday'])){
  $thu = "checked";
}
if (isset($arr1[$id]['bells'][$bellid]['friday'])){
  $fri = "checked";
}
if (isset($arr1[$id]['bells'][$bellid]['saturday'])){
  $sat = "checked";
}
if (isset($arr1[$id]['bells'][$bellid]['sunday'])){
  $sun = "checked";
}
if (isset($arr1[$id]['bells'][$bellid]['weekdays'])){
  $weekdays = "checked";
}
if (isset($arr1[$id]['bells'][$bellid]['weekends'])){
  $weekends = "checked";
}




?>
</head>
<body>
<div class="container">
<div class="col-md-5 mr-auto ml-auto text-center">
<img src="assets/img/logo/sixt5.png" style="height:10em;" alt="">
</div>
<div class="row">
  <div class="col-md-8 mr-auto ml-auto text-center">
  The set bell time is currently <?=$time?> <br><br>
  <a type='button' class="btn btn-primary" href="EditTemplate.php?id=<?=$id?>">Back</a>
  </div>
</div>
<br><br>
<form action="changing.php" method="get">

  <div class="row">
  <div class="col-md-12 mr-auto ml-auto">
  <table style="width:100%">




    <tr>
    <th class='text-center'><div class='input-group'>
    <div class='input-group-prepend'>
      <span class='input-group-text'>bell</span>
    </div>
    <input type="hidden" id='id' name='id'value="<?=$id?>">
<input type="hidden" id='bellid' name='bellid'value="<?=$bellid?>">
    <input class='form-control' aria-label='bell' id='name' name='name'value="<?=$name?>" >
  </div></th>
  <td class='text-center'>set time</td>
    <td class='text-center'><input class='form-control' id='time' name='time' type='time' value="<?=$time?>"></td>
    

</tr>
<tr>
<td>
<div class="input-group mb-3" >
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="monday" name="monday" <?=$mon?>>
</div>
</div>
<input type="text" class="form-control" value="Monday" disabled>
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="tuesday" name="tuesday"<?=$tue?>>
</div>
</div>
<input type="text" class="form-control" value="Tuesday" disabled>
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="wednesday" name="wednesday"<?=$wed?>>
</div>
</div>
<input type="text" class="form-control" value="Wednesday" disabled>
</div>
</td>
<td>
<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="thursday" name="thursday"<?=$thu?>>
</div>
</div>
<input type="text" class="form-control" value="Thursday" disabled>
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="friday" name="friday"<?=$fri?>>
</div>
</div>
<input type="text" class="form-control" value="Friday" disabled>
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="weekdays" name="weekdays"<?=$weekdays?>>
</div>
</div>
<input type="text" class="form-control" value="Weekdays" disabled>
</div>

</td>
<td>
<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="saturday" name="saturday"<?=$sat?>>
</div>
</div>
<input type="text" class="form-control" value="Saturday" disabled>
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="sunday" name="sunday"<?=$sun?>>
</div>
</div>
<input type="text" class="form-control" value="Sunday" disabled>
</div>
<div class="input-group mb-3">
<div class="input-group-prepend">
<div class="input-group-text">
  <input type="checkbox" id="weekends" name="weekends"<?=$weekends?>>
</div>
</div>
<input type="text" class="form-control" value="Weekends" disabled>
</div>
</td>

</tr>
<tr>
<td class='text-center'>
    <div class='input-group '>
    <div class='input-group-prepend'>
    <label class='input-group-text' for='belltype'>Bell Type</label>
    </div>                                                                                                  <select class='custom-select' id='belltype' name='belltype'>

    <?php
$selectkey = $arr1[$id]['bells'][$bellid]['belltype'];
$arr5 = json_decode(file_get_contents('assets/json/sounds.json'), true);
if($selectkey != '0'){
echo("<option selected value ='".$selectkey."'>".$arr5[$selectkey]['name']."</option>");
}else{
echo("<option selected value ='".$selectkey."'>Default Bell</option>");
}
    foreach ($arr5 as $key => $value){
    echo("<option value ='".$key."'>".$value['name']."</option>");
}
?>
    </select>
    </div>
    </td>
    <td>
<div class="input-group ">
  <div class="input-group-prepend">
    <label class="input-group-text" for="zone">Zone</label>
  </div>
  <select class="custom-select" id="zone" name="zone">
    <option value="<?=$zone?>" selected><?=$zone?> </option>
    <option value="ALL">All</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="1-2">1 & 2</option>
    <option value="2-3">2 & 3</option>
    <option value="3-4">3 & 4</option>
    <option value="1-4">3 & 4</option>
  </select>
</div>

</td>
</tr>

</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-success">Change</button>
</div>
</form>



  </div>
  </div>
</div>
</body>
