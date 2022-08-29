
<?php

require("../../db.php");

$ruta2index = "../../../";

require('FPDF/fpdf.php');


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $hoy = date("Y-m-d");

        $titulo = "SALIDAS OPTICA";
        $tituloFolio = "FOLIO";
        $idFolio = "SAOP6462208261234";
        // Logo
        $this->Image('static/img/anlLogo.jpg', 5, 7);

        $this->Image("static/img/selloISO.jpg", 158, 5);


        // Arial bold 15
        $this->SetFont('Arial', '', '10');
        $this->SetX(70);
        $this->Cell(80, 7, $titulo, 0, 0, 'C');

        $this->SetFont('Arial', '', '8');
        $this->Ln();
        $this->SetX(70);
        $this->Cell(80, 4, utf8_decode('Cuvier 77, Colonia Anzures'), 0, 0, 'C');
        $this->Ln();
        $this->SetX(70);
        $this->Cell(80, 4, utf8_decode('Del. Miguel Hidalgo'), 0, 0, 'C');

        $this->Ln();
        $this->SetX(70);
        $this->Cell(80, 4, utf8_decode('C.P. 11590 Ciudad de México'), 0, 0, 'C');
        $this->SetY(29);
        $this->SetX(150);
        $this->Cell(52, 5, $tituloFolio, 1, 0, 'C');

        $this->SetFont('Arial', '', '8');
        $this->Ln();

        $this->SetX(150);


        $this->Cell(52, 5, $idFolio, 1, 0, 'C');
        $this->SetY(10);



        $this->SetY(50);
        $quer = "SELECT  * FROM tbl_SalidasOptica WHERE st_FolioSalida='SAOP16032208261234'";
        $res = mssql_query($quer);
        $row = mssql_fetch_object($res);


        $this->SetX(150);
        $this->Cell(25, 5, 'MOVIMIENTO: Salida de Optica', 0, 0, 'L');

        $this->Ln();

        $this->Cell(15, 5, 'FECHA: ' . $hoy, 0, 0, 'L');



        $this->SetX(150);
        $this->Cell(25, 5, 'USUARIO: ' . $row->id_Operador, 0, 0, 'L');

        $this->Ln();
        $this->Ln();
    }
    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}



$pdf = new PDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$y_axis_initial = 25;
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(40, 6, '', 0, 0, 'C');
$pdf->Cell(100, 6, 'DETALLE DE SALIDA ', 1, 0, 'C');

$pdf->Ln(10);

$pdf->SetFillColor(232, 232, 232);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25, 6, 'ID SALIDA', 1, 0, 'C', 1);
$pdf->Cell(90, 6, 'FOLIOS OPTICA ', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'SUCURSAL', 1, 0, 'C', 1);

$pdf->Ln();

$pdf->SetFont('Arial', 'B', 10);
$quer1 = "SELECT  * FROM tbl_SalidasOptica WHERE st_FolioSalida='SAOP16032208261234'";
$res = mssql_query($quer1);
while($row1=mssql_fetch_array($res)){
    
$pdf->Cell(25, 6,$row1['id_SalidaOptica'], 1, 0, 'C', 1);
$pdf->Cell(90, 6, $row1['st_FoliosPedidos'], 1, 0, 'C', 1);
$pdf->Cell(70, 6, $row1['id_Operador'], 1, 0, 'C', 1);





}

$pdf->Ln(10);

$pdf->Ln();














$pdf->Ln();



$pdf->SetTextColor(0, 0, 0);

$pdf->SetFillColor(255, 255, 255);

$pdf->SetFont('Arial', 'B', '7');
$pdf->Line(20, 247, 80, 247);
$pdf->SetY(242);
$pdf->SetX(40);
$pdf->Cell(20, 20, "AUTORIZA (NOMBRE Y FIRMA)", 0, 0, 'C');

$pdf->SetY(225);
$pdf->SetX(108);
$pdf->Cell(20, 20, "NOMBRE Y FIRMA QUIEN RECIBE:", 0, 0, 'R');
$pdf->Line(130, 237, 195, 237);

$pdf->SetY(230);
$pdf->SetX(108);
$pdf->Cell(20, 20, "FECHA RECIBIDO:", 0, 0, 'R');
$pdf->Line(130, 242, 195, 242);

$pdf->SetY(240);
$pdf->SetX(108);
$pdf->Cell(20, 20, "OBSERVACIONES:", 0, 0, 'R');
$pdf->Line(130, 252, 195, 252);

$pdf->SetY(250);
$pdf->SetX(108);
$pdf->Cell(20, 20, "SELLO RECIBIDO:", 0, 0, 'R');





$pdf->Output();
?>


