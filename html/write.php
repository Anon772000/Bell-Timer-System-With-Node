<?php
 $arr1 = array();
// foreach ($_GET as $key => $value){
   
    $arr1= array (
        array("Volvo",22,18),
        array("BMW",15,13),
        array("Saab",5,2),
        array("Land Rover",17,15)
      );

// }
asort($arr1);
file_put_contents("array.json",json_encode($arr1));
header("location: index.php");