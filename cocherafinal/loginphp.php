<?php
session_start();
if(isset($_POST['btn_user']))
{

    $usuario=$_POST['intp_user'];


}

if($usuario=="cochera23")

{
    header("Location: index.php");
}

else
{
    header("Location: login.php");
    $_SESSION['mensaje_registro_usuario']='Usuario Incorrecto';
    $_SESSION['message_type']='success';
}

?>