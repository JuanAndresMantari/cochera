<?php

include('db.php');

if(isset($_GET['id']))
{
$id_vehiculo=$_GET['id'];
    
}

$sql="SELECT * FROM tbl_vehiculos where id_vehiculo=:id_vehiculo";
$stmt=$conn->prepare($sql);
$stmt->bindparam('id_vehiculo',$id_vehiculo);
$stmt->execute();
if($stmt->rowCount()>0)

            {
                while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
                 {
                     extract($row);
                 
                
include "fpdf/fpdf.php";

$pdf = new FPDF($orientation='P',$unit='mm', array(75,350));
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 5;
$pdf->setY(8);
$pdf->setX(19);
$pdf->Cell(5,$textypos,"Servicio de Cochera");


$pdf->SetFont('Arial','',8);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=12;
$pdf->setX(4);
$pdf->Cell(5,$textypos,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -');

$textypos+=8;
$pdf->setX(8);
$pdf->Cell(5,$textypos,utf8_decode('N° Placa:              ').$row['num_placa']);

$textypos+=9;
$pdf->setX(8);
$pdf->Cell(5,$textypos,'Hora de Ingreso:  '. $row['hora_ingreso'] );

$textypos+=9;
$pdf->setX(8);
$pdf->Cell(5,$textypos,'Hora de Salida:    '. $row['hora_salida']);

$textypos+=9;
$pdf->setX(8);
$pdf->Cell(5,$textypos,utf8_decode('Duración:              '). $row['horas_usadas'].' h');

$textypos+=9;
$pdf->setX(4);

$pdf->Cell(5,$textypos,'- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -');

$textypos+=10;
$pdf->setX(38);
$pdf->SetFont('Arial','B',9); 
$pdf->Cell(5,$textypos,'Importe Total: S/ '. $row['total_pagar']);

$pdf->setX(8);
$pdf->SetFont('Arial','',8); 
$pdf->Cell(5,$textypos,'Dia: '.date('d/m/Y'));




$off = $textypos+6;



$pdf->output();
                 }

}
//https://evilnapsis.com/2018/04/26/php-formato-de-ticket-basico-para-impresoras-de-tickets-con-fpdf/

?>