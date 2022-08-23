<?php


$temp = $_GET['Template'];

$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);
$uuid = uniqid();


$arr1[$uuid] = $arr1[$temp];
$arr1[$uuid]['name'] = 'New Template';



if(file_put_contents("assets/json/Templates.json",json_encode($arr1))){
  header("location: EditTemplate.php?id=".$uuid);
};