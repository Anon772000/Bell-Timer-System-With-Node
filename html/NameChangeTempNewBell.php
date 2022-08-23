<?php


$id = $_GET['id'];
$name = $_GET['name'];



$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);

$arr1[$id]['name'] = $name;




file_put_contents("assets/json/Templates.json",json_encode($arr1));
header("location: newbell.php?id=".$id);

