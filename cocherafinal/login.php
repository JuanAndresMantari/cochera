<?php 
date_default_timezone_set("America/Lima");

include('db.php');
session_start();

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
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

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
                        <a class="nav-link active" aria-current="page" href="/cochera/"><i class="fas fa-home"></i>
                            Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="form_reportes.php"><i class="fas fa-file-excel"></i>
                            Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php"><i class="fas fa-user"></i>
                        Usuarios</a>
                    </li>
                    
                </ul>

            </div>
        </div>
    </nav>

    <div class="container p-2">
        <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">


            <?php 
        if (isset($_SESSION['mensaje_registro_usuario'])) 
{?>
            <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show " role="alert">
                <?= $_SESSION['mensaje_registro_usuario'] ?>

                <button type="button" class="btn-close  " data-bs-dismiss="alert" aria-label="Close"></button>

                </button>
            </div>
            <?php
        unset($_SESSION["mensaje_registro_usuario"]);
} ?>



        </div>
    </div>
    <div class="position-absolute top-50 start-50 translate-middle">
    <form method="POST" action="loginphp.php">
        <div class="container p-1">

            <label style="color:#0c8c8c;font-weight:bold"> Contraseña de Usuario: </label>

            <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center w-100">
                <div class="col-sm-12">
                    <input type="password" class="form-control"  required name="intp_user">
                    
                    
                  
                   




                </div>
            </div>
        </div>

        <div class="container p-1">

            <input name="btn_user" id="clt" type="submit" value=">> INGRESAR">

        </div>


</div>

    


    <script src="js/jquery-3.6.0.min.js">

    </script>

    <script src="js/buscar.js">

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>