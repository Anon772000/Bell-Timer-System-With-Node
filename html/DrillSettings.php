<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
$arr1 = json_decode(file_get_contents('assets/json/drills.json'), true);

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
  <a type='button' class="btn btn-primary" href="drills.php">Back</a>
  </div>
</div>
<br><br>
<form action="Drillnew.php" method="get">

  <div class="row">
  <div class="col-md-12 mr-auto ml-auto">
  <table style="width:100%">




    <tr>
    <th>Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Type</th>
    </tr>
    <tr>
<input type='hidden' name='id' name='id' value='<?=$id?>'>
  <td><input class='form-control' aria-label='name' id="name" name="name" value="<?=$arr1[$id]['name']?>"></td>
  <td><input type='date'class='form-control'aria-label='date'id="date" name="date" value="<?=$arr1[$id]['date']?>"></td>
  <td><input type='time' class='form-control'aria-label='time'id="time" name="time" value="<?=$arr1[$id]['time']?>"></td>
  <td> 
    <select class="form-control" id="exampleFormControlSelect1" name='type'>
    <option selected value="<?=$arr1[$id]['type']?>"><?=$arr1[$id]['type']?></option>

<option value='evac'>Evacuation</option>
<option value='alert'>Alert</option>
<option value='lockdown'>Lockdown</option>
<option value='lockout'>Lockout</option>


</select>


</td>
</tr>
    




</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-success">Save Edit</button>
</form>
<a class="btn btn-danger" href="deletedrills.php?id=<?=$id?>">DELETE</a>
</div>




  </div>
  </div>
</div>
</body>

