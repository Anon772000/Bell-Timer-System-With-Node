<?php


$id = $_GET['bellid'];
$temp = $_GET['id'];
$arr1 = json_decode(file_get_contents('assets/json/Templates.json'), true);
unset($arr1[$temp]['bells'][$id]);

function cmp($a, $b){
    $key = 'time';
    if($a[$key] > $b[$key]){
        return 1;
    }else if($a[$key] < $b[$key]){
	    return -1;
    }
    return 0;
}
usort($arr1[$temp]['bells'], "cmp");

$arr1[$temp]['bells'] = str_replace(array('[',']'), '',$arr1[$temp]['bells']);


file_put_contents("assets/json/Templates.json",json_encode($arr1));
if ($_SERVER['HTTP_HOST'] == "bellone1.local"){
    $send = http_build_query($_GET);
    header("location: http://BellOne2.Local/deleting.php?".$send);
}else{
    header("location: http://BellOne1.Local/EditTemplate.php?id=".$temp);
}


