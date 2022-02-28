<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: cocherafinal/index.php');
    }else{
        header('location: loginmaster/login.php');
    }


?>