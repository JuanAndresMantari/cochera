<?php
include('db.php');
session_start();
date_default_timezone_set("America/Lima");
if(isset($_POST['reg_veh']))
{

    $placa=$_POST['inpt_placa'];
    $horaing=$_POST['inpt_horaing'];
    $dia=$_POST['inp_dia'];
   
}

$dia=date('d/m/Y');


$sql="INSERT INtO tbl_vehiculos(num_placa,hora_ingreso,dia) values (:num_placa,:hora_ingreso,:dia) ";
$stmt=$conn->prepare($sql);
$stmt->bindParam(':num_placa',$placa);
$stmt->bindParam(':hora_ingreso',$horaing);
$stmt->bindParam(':dia',$dia);

if($stmt->execute())
{

    $_SESSION['mensaje_registro_vehiculo']='Vehiculo Registrado Correctamente';
         $_SESSION['message_type']='success';
         header("Location: index.php");
       
}
else
{
    echo "No se registro nada";
}


?>