<?php


$id = $_GET['id'];
$name = $_GET['name'];



$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);

$arr1[$id]['name'] = $name;




file_put_contents("assets/json/Templates.json",json_encode($arr1));
if ($_SERVER['HTTP_HOST'] == "bellone1.local"){
    $send = http_build_query($_GET);
    header("location: http://BellOne2.Local/NameChangeTempNewBell.php?".$send);
}else{
    header("location: http://BellOne1.Local/newbell.php?id=".$id);
}

