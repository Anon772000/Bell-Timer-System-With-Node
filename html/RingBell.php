<?php
$type = $_GET['id'];
if(exec("sudo python /etc/Bell-Timer-System/Tones.py "+$type)){
    print("hello");
};

?>
