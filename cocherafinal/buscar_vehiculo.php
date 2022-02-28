<?php
date_default_timezone_set("America/Lima");
include('db.php');

$salida = "";
$dia=date('d/m/Y');
$sql = "SELECT * FROM tbl_vehiculos WHERE dia BETWEEN :dia and :dia ORDER BY id_vehiculo DESC ";

if(!empty($_POST['vehiculos'])) {
    $consulta = filter_var($_POST['vehiculos']) ;
    $sql = "SELECT * FROM tbl_vehiculos WHERE dia between :dia and :dia and num_placa LIKE '%".$consulta."%'";
    
}
$query = $conn->prepare($sql);
    $query->bindParam('dia',$dia);
    $query->execute();
if( $query->rowCount() > 0)
 {
  echo " <table class='table table-striped'>
  <thead>
      <tr>
          <th scope='col'>ID</th>
          <th>N° Placa</th>
          <th>Hora de Ingreso</th>
          <th>Hora de Salida</th>
          <th>Horas Usadas</th>
          <th>Total a Pagar</th>
          <th>Imp. Ingreso</th>
          <th>Reg. Salida</th>
          <th> Imp. Salida</th>
      </tr>
  </thead>

  <tbody>";
  while ($row=$query->fetch(PDO::FETCH_ASSOC))
        {
                    extract($row);

                echo"    <td>".$row['id_vehiculo']."</td>
                <td>".$row['num_placa']."</td>

                <td>".$row['hora_ingreso']."</td>";

                 if($row['hora_salida']=="")
                 {
                     echo "<td>- - - -</td>";
                 }
                
                 else
                 {
                     echo "<td>".$row['hora_salida']."</td>";
                 }
                
                echo "
                <td>".$row['horas_usadas'].' h'."</td>
                <td>S/." .' '.$row['total_pagar']."</td>";


                if($row['total_pagar']=='0')
                {
                    echo "<th><a href='imp_ticket_inn.php?id=". $row['id_vehiculo']."' aria-disabled target='_blank'> <input type='submit'
                    name='btn_imp_ingr' class='btn btn-warning' value='Imp.Ingreso'></a></th>";
                }
               
                else
                {
                    echo " <th> <input type='submit' name='btn_imp_ingr' class='btn btn-warning' value='Imp.Ingreso'
                    disabled='disabled'></th>";
                }




                 if($row['total_pagar']=='0')
                 {
                     echo "<th><a href='form_salida.php?id=". $row['id_vehiculo']."' aria-disabled> <input type='submit'
                     name='btn_hsalida' class='btn btn-info' value='Registrar Salida'></a></th>";
                 }
                
                 else
                 {
                     echo " <th> <input type='submit' name='btn_hsalida' class='btn btn-info' value='Registrar Salida'
                     disabled='disabled'></th>";
                 }
               
               
            echo "    <th> <a href='imp_ticket.php?id=". $row['id_vehiculo']."' target='_blank' aria-disabled><input type='submit' name='subt_imp'class='btn btn-primary' value='Imprimir'></a> </th>
            </tr>";
        }
       echo " </tbody>
        </table>";
    
 }

else
 {
    echo " <table class='table table-striped'>
    <thead>
        <tr>
            <th scope='col'>ID</th>
            <th>N° Placa</th>
            <th>Hora de Ingreso</th>
            <th>Hora de Salida</th>
            <th>Horas Usadas</th>
            <th>Total a Pagar</th>
            <th>Imp. Ingreso</th>
            <th>Reg. Salida</th>
            <th> Imp. Salida</th>
  
        </tr>
    </thead>
  
    <tbody>";
}
echo $salida;
?>