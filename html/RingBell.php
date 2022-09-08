<?php
$type = $_GET['id'];
$arr1 = json_decode(file_get_contents('assets/json/global.json'), true);
$arr1['EVAC']['EVAC'] = $type;
file_put_contents("assets/json/global.json",json_encode($arr1))
?>
