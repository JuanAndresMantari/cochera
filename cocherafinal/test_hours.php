<?php
date_default_timezone_set("America/Lima");
include('db.php');
// $sql="SELECT hora_ingreso,hora_salida FROM tbl_vehiculos where id_vehiculo=17";

// $stmt=$conn->prepare($sql);
// $stmt->execute();
//             if($stmt->rowCount()>0)
//             {

//                 while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
//                  {
//                     extract($row);
//                echo      $hora_ingreso=$row['hora_ingreso'];
//                     echo '</br>';
//           echo  $hora_salida=$row['hora_salida'];
//                  }
//             }

           
//              $date_ingreso=new DateTime($hora_ingreso);
//             $date_salida=new DateTime($hora_salida);
 
//         $calculo_horas=date_diff($date_ingreso,$date_salida);
//         echo '</br>';
//            echo  $total_horas=$calculo_horas->format('%H:%I');
            
//            $convertir_hora=$total_horas;

//            $v_HorasPartes = explode(":", $convertir_hora);

//            $minutosTotales= ($v_HorasPartes[0] * 60) + $v_HorasPartes[1];
//            echo '</br>';
//            echo $minutosTotales;
//            echo '</br>';
//           echo  $cobroTotal=$minutosTotales*0.05;
//           echo '</br>';
//              echo   $redondeo=round($cobroTotal,1);

// //          //hora a convertir a minutos
// // $horaEntrada = '10:00';	
 
// // //realizamos una partición que separe la parte de la hora y la parte de los minutos
// // $v_HorasPartes = explode(":", $horaEntrada);
 
// // //la parte de la hora la multiplicamos por 60 para pasarla a minutos y así realizar la suma de los minutos totales
// // $minutosTotales= ($v_HorasPartes[0] * 60) + $v_HorasPartes[1];
 
// // echo $minutosTotales;
// // //devolverá 600 que serán los minutos totales.

// echo '</br>';

 $dia=date('d/m/Y');

$sql="SELECT * FROM tbl_vehiculos where dia Between :dia and :dia  ORDER BY id_vehiculo DESC";
$stmt=$conn->prepare($sql);
$stmt->bindparam('dia',$dia);
$stmt->execute();
$total=0;
// $total = $stmt->fetch(PDO::FETCH_NUM);
// echo $total_income = $total[0];   
if($stmt->rowCount()>0)

            {
                while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
                 {
                     extract($row);
                    echo $row['id_vehiculo'];
                     echo $row['num_placa'];
                    echo '</br>';
                  
                 }
                 
               

                
}
















            
               

?>