<?php
session_start([
    'cookie_lifetime' => 600,
  ]);



if($_POST['pass'] == '605605'){
    $_SESSION['pass'] = '605605';
    if($_SESSION['pass'] == '605605'){
        header('location:index.php');
    }
    
}else{
    header('location: login.php?error=Wrong Password');
}