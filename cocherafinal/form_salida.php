<?php
date_default_timezone_set("America/Lima");

include('db.php');
if (isset($_GET['id'])) {
     $id_vehiculo=$_GET['id'];
    
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap-theme.min.css" crossorigin="anonymous">
<script src="bootstrap-5.1.3-dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>Document</title>

    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
  
        text-align: center;
       

    }
    #clt:hover {
        background-color: #00b8eb;
    }

    #clt {
        padding: 12px;
        color: #fff;
        font-weight: bold;
        background: #2596be;
        width: 220px;
        margin: 20px auto;
        margin-top: 0;
        border: 0;
        border-radius: 20px;
        cursor: pointer;
      
    }

    label {
        text-align: right
    }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/cochera/">Servicio de Cochera</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-1 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/cochera/"><i class="fas fa-home"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="form_reportes.php"><i class="fas fa-file-excel"></i> Reportes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php"><i class="fas fa-user"></i>
                        Usuarios</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

<?php


 

$hora_actual=new DateTime();
 $hora_format=$hora_actual->format('H:i:s');

$sql="SELECT id_vehiculo,num_placa,hora_ingreso FROM tbl_vehiculos where id_vehiculo=:id_vehiculo";

$stmt=$conn->prepare($sql);
$stmt->bindparam('id_vehiculo',$id_vehiculo);
$stmt->execute();

if($stmt->rowCount()>0)

            {
                while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
                 {
                    extract($row);
                    $hora_ingreso=$row['hora_ingreso'];
                   
                    $date_ingreso=new DateTime($hora_ingreso);
                    $hora_final=new DateTime($hora_format);

                  $calculo_horas=date_diff($date_ingreso,$hora_final);
                  $total_horas=$calculo_horas->format('%H:%I');
                  $convertir_hora=$total_horas;
                  $v_HorasPartes = explode(":", $convertir_hora);

                  $minutosTotales= ($v_HorasPartes[0] * 60) + $v_HorasPartes[1];
                  $cobroTotal=$minutosTotales*0.05;
                  $redondeo=round($cobroTotal,1);

?>
    <div class="position-absolute top-50 start-50 translate-middle">
    <form method="POST" action="update_ingreso.php">
        <div class="container p-1">

            <label style="color:#0c8c8c;font-weight:bold"> Número de Placa: </label>

            <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">
                <div class="col-sm-12">
                    <input type="text" class="form-control" style="text-transform:uppercase" required name="inpt_placa" maxlength="8" value="<?= $row['num_placa']?>"readonly>
                    
                    
                    <label style="color:#0c8c8c;font-weight:bold"> Hora de Ingreso: </label>
                    <input type="text" class="form-control" name="inpt_horaing" value="<?= $row['hora_ingreso']?>" readonly >

                    <label style="color:#0c8c8c;font-weight:bold"> Hora de Salida: </label>
                    <input type="text" class="form-control" name="inpt_hsalida" value="<?= date('H:i:s ');?>" readonly >

                    <label style="color:#0c8c8c;font-weight:bold"> Horas Usadas: </label>
                    <input type="text" class="form-control" name="inpt_husadas" value="<?= $total_horas;?>" readonly >

                    <label style="color:#0c8c8c;font-weight:bold"> Total a Pagar S/. </label>
                    <input type="text" class="form-control" name="inpt_hpagar" value="<?= $redondeo;?>" readonly >
                    <input type="hidden" name="id_vehiculo" value="<?=$row['id_vehiculo'];?>">
                </div>
            </div>
        </div>

        <div class="container p-1">

            <input name="reg_veh" id="clt" type="submit" value=">> REGISTRAR SALIDA">

        </div>


</div>
    </form>

<?php
                 }
                }

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>