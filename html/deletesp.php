<?php
$id = $_GET['id'];


$arr1 = json_decode(file_get_contents('assets/json/special.json'), true);

unset($arr1[$id]);
file_put_contents("assets/json/special.json",json_encode($arr1));
header('location: BellTimings.php');

















?>
