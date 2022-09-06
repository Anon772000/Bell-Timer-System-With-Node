<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
$arr1 = json_decode(file_get_contents('assets/json/termDates.json'), true);
$arr2 = json_decode(file_get_contents('assets/json/Templates.json'), true);
$id = $_GET['id'];
$temp = $arr1[$id]['Template'];
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
<form action="termnew.php" method="get">

  <div class="row">
  <div class="col-md-12 mr-auto ml-auto">
  <table style="width:100%">




    <tr>
    <th>Name</th>
    <th>Start Period</th>
    <th>Finish Period</th>
    <th>Template</th>
    </tr>
    <tr>
<input type='hidden' name='id' name='id' value='<?=$id?>'>
  <td><input class='form-control' aria-label='name' id="name" name="name" value="<?=$arr1[$id]['name']?>"></td>
  <td><input type='date'class='form-control'aria-label='start'id="start" name="start" value="<?=$arr1[$id]['start']?>"></td>
  <td><input type='date' class='form-control'aria-label='finish'id="finish" name="finish" value="<?=$arr1[$id]['finish']?>"></td>
  <td> 
    <select class="form-control" id="exampleFormControlSelect1" name='Template'>
    <option selected value="<?=$arr1[$id]['Template']?>"><?=$arr2[$temp]['name']?></option>
  <?php
foreach($arr2 as $key => $value){

  echo"  <option value='".$key."'>".$value['name']."</option>";
}
?>

</select>


</td>
</tr>
    




</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-success">Save</button>
</form>
<a class="btn btn-danger" href="deleteterm.php?id=<?=$id?>">DELETE</a>
</div>




  </div>
  </div>
</div>
</body>

