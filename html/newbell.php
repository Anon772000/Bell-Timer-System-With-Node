<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
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
  <a type='button' class="btn btn-primary" href="EditTemplate.php?id=<?=$id?>">Back</a>
  </div>
</div>
<br><br>
<form action="create.php" method="get">
<input type='hidden' value='<?=$id?>' id="id" name="id">
  <div class="row">
  <div class="col-md-12 mr-auto ml-auto">
  <table style="width:100%">




    <tr>
    <th class='text-center'><div class='input-group'>
    <div class='input-group-prepend'>
      <span class='input-group-text'>bell</span>
    </div>
    <input class='form-control' aria-label='bell' id='name' name='name'>
  </div></th>
  <td class='text-center'>set time</td>
    <td class='text-center'><input class='form-control' id='time' name='time' type='time' ></td>
    <td class='text-center'>

    
  
  

    </td>

    </tr>
<tr>
<td>
<div class="input-group mb-3" >
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="monday" name="monday">
    </div>
  </div>
  <input type="text" class="form-control" value="Monday" disabled>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="tuesday" name="tuesday">
    </div>
  </div>
  <input type="text" class="form-control" value="Tuesday" disabled>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="wednesday" name="wednesday">
    </div>
  </div>
  <input type="text" class="form-control" value="Wednesday" disabled>
</div>
</td>
<td>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="thursday" name="thursday">
    </div>
  </div>
<input type="text" class="form-control" value="Thursday" disabled>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="friday" name="friday">
    </div>
  </div>
  <input type="text" class="form-control" value="Friday" disabled>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="weekdays" name="weekdays">
    </div>
  </div>
  <input type="text" class="form-control" value="Weekdays" disabled>
</div>

</td>
<td>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="saturday" name="saturday">
    </div>
  </div>
<input type="text" class="form-control" value="Saturday" disabled>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="sunday" name="sunday">
    </div>
  </div>
  <input type="text" class="form-control" value="Sunday" disabled>
</div>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
      <input type="checkbox" id="weekends" name="weekends">
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
    </div>
    <select class='custom-select' id='belltype' name='belltype'>

    <option selected value ='0'>Default Bell</option>
<?php
$arr1 = json_decode(file_get_contents('assets/json/sounds.json'), true);
    foreach ($arr1 as $key => $value){
    echo("<option value ='".$key."'>".$value['name']."</option>");
}
?>
    </select>
    </div>
    </td>

</tr>
<tr>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="zone">Zone</label>
  </div>
  <select class="custom-select" id="zone" name="zone">
    <option value="ALL" selected>All</option>
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <option value="4">Four</option>
    <option value="1-2">One & Two</option>
    <option value="2-3">Two & Three</option>
    <option value="3-4">Three & Four</option>
    <option value="1-4">Three & Four</option>
  </select>
</div>

</tr>


</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-success">Create new Bell</button>
</div>
</form>



  </div>
  </div>
</div>
</body>
