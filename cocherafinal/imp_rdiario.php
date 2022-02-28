<?php
error_reporting(0);
date_default_timezone_set("America/Lima");
include('db.php');
include "fpdf/fpdf.php";
 $dia=date('d/m/Y');
 $total=0;
$sql="SELECT * FROM tbl_vehiculos where dia Between :dia and :dia ";
$stmt=$conn->prepare($sql);
$stmt->bindparam('dia',$dia);
$stmt->execute();
if($stmt->rowCount()>0)

            {
                
                 
                


$pdf = new FPDF($orientation='P',$unit='mm', array(210,297));
$pdf->AddPage();
$pdf->SetFont('Arial','B',25);    //Letra Arial, negrita (Bold), tam. 20
$textypos = 5;
$pdf->setY(16);
$pdf->setX(61);
$pdf->Cell(5,$textypos,"Servicio de Cochera");


$pdf->SetFont('Arial','B',13);    //Letra Arial, negrita (Bold), tam. 20
$textypos+=30;
$pdf->setX(8);
$pdf->Cell(5,$textypos,utf8_decode('  N°        N° Placa        Hora Ingreso        Hora Salida        Horas Usadas        Total a Pagar'));



$textypos+=8;
$pdf->setX(7);
$pdf->Cell(5,$textypos,utf8_decode(' ------------------------------------------------------------------------------------------------------------------------------'));

while ($row=$stmt->fetch(PDO::FETCH_ASSOC))
                 {
                     extract($row);
                     $pdf->SetFont('Arial','',12); 
                     $off = $textypos+15;
                     $textypos+=10;
$pdf->setX(10);
$pdf->Cell(5,$off,$row['id_vehiculo']);
$pdf->setX(26);
$pdf->Cell(35,$off,$row['num_placa']);
$pdf->setX(60);
$pdf->Cell(45,$off,$row['hora_ingreso']);
$pdf->setX(97);
$pdf->Cell(55,$off,$row['hora_salida']);
$pdf->setX(135);
$pdf->Cell(65,$off,$row['horas_usadas'].' h');
$pdf->setX(177);
$pdf->Cell(35,$off,'S/ '.$row['total_pagar']);

$total=$total+$row['total_pagar'];
















            }
            $textypos+=16;
$pdf->setX(7);
$pdf->Cell(5,$textypos,utf8_decode(' -----------------------------------------------------------------------------------------------------------------------------------------'));


$textypos+=16;
$pdf->setX(158);
$pdf->Cell(5,$textypos,'Ingreso Total S/. '.$total);


$pdf->setX(11);
$pdf->Cell(5,$textypos,'Dia. '.date('d/m/Y'));
        }

        
$pdf->output();



                


//https://evilnapsis.com/2018/04/26/php-formato-de-ticket-basico-para-impresoras-de-tickets-con-fpdf/

?>