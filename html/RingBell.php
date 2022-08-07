<?php
if(exec("sudo python /var/www/html/RingBell.py")){
    header('location: index.php');
}
header('location: index.php');
?>
