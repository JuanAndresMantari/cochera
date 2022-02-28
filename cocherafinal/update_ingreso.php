<?php 
include('db.php');
session_start();
if(isset($_POST['reg_veh']))
{
 $id_vehiculos=$_POST['id_vehiculo'];
   $hora_salida=$_POST['inpt_hsalida'];
     $hora_usadas=$_POST['inpt_husadas'];
     $total_pago=$_POST['inpt_hpagar'];

}

$sql="UPDATE tbl_vehiculos set hora_salida=:hora_salida,horas_usadas=:horas_usadas,total_pagar=:total_pagar where id_vehiculo=:id_vehiculo" ;
$stmt=$conn->prepare($sql);
$stmt->bindParam(':id_vehiculo', $id_vehiculos);
$stmt->bindParam(':hora_salida', $hora_salida);
$stmt->bindParam(':horas_usadas', $hora_usadas);
$stmt->bindParam(':total_pagar', $total_pago);



if ($stmt->execute()) 
        {
          $_SESSION['mensaje_update_vehiculo']='Salida de Vehículo Registrado Correctamente';
          $_SESSION['message_type']='success';
          header("Location: index.php");
        }
        else
        {
            echo "Error al acualizar";
        }








?>