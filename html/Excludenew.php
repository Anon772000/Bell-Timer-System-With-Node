<?php

$arry2 = $_GET;
$arr1 = json_decode(file_get_contents('assets/json/exclude.json'), true);
if(isset($_GET['id'])){
$arr1[$_GET['id']] = $arry2;

}elseif($_GET['id'] == 'new'){
$uuid = uniqid();


$arr1[$uuid] = $arry2;

}


if(file_put_contents("assets/json/exclude.json",json_encode($arr1))){
header("location: BellTimings.php");

}