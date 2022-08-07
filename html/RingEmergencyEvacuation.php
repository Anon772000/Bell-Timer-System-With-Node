<?php


exec("sudo python /var/www/html/RingEmergenceyEvacuation.py");
header("location: index.php");
