<?php
$id = $_GET['id'];


$arr1 = json_decode(file_get_contents('assets/json/exclude.json'), true);

unset($arr1[$id]);
file_put_contents("assets/json/exclude.json",json_encode($arr1));
if ($_SERVER['HTTP_HOST'] == "bellone1.local"){
    $send = http_build_query($_GET);
    header("location: http://BellOne2.Local/deleteexclude.php?".$send);
}else{
    header("location: http://BellOne1.Local/BellTimings.php");
}

















?>
