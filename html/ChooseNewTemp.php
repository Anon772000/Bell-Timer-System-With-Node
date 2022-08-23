<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");
if($_GET['id'] == null){
	$id = uniqid();
}else{
	$id = $_GET['id'];
}
$arr2 = json_decode(file_get_contents('assets/json/Templates.json'), true);
$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);
if(isset($arr1)){
$name = $arr1[$id]['name'];
}else{
$name = "";
}

?>
</head>
<body>
    <div class="fixed-top">
        <a style="z-index:99;float:right;margin-right:5em;Margin-top:1em;"type='button' class="btn btn-primary" href="settings.php">Back</a>
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
        <br>
        <br>
        <div class='row'>
        <div class="col-md-4 mr-auto ml-auto text-center">
        <a type='button' class="btn btn-primary" href="NewTemplate.php?id=<?=$id?>">New Template From Scratch</a>
        <br>
        
        <br>
        <p>Or</p>
        <form action="Exist.php" method="get">
        <select class="form-control" id="exampleFormControlSelect1" name='Template'>
  <?php
foreach($arr2 as $key => $value){

  echo"  <option value='".$key."'>".$value['name']."</option>";
}
?>
</select>
<br>
         <button type="submit" class="btn btn-primary">New Template from existing</button>
        </form>
       
        
        
        
        </div>
        
    </div>
</body>

