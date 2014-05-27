<?php
session_start();
require('../../config/fpdf/fpdf.php');
require('../../config/db/CRUD/Actas.Class.php');
$actas = new Actas;
$actas->consIn = $_SESSION['nickActa'];
$actas->findActa();

class PDF extends FPDF{
   //Cabecera de página
   function Header()
   {

      $this->Image('../../img/1.jpg',15,8,20);
      $this->SetFont('Arial','B',10);
      $this->Cell(180,5,'REPUBLICA DE COLOMBIA',0,1,'C');
      $this->Cell(180,5,'SUPERINTENDECIA DE NOTARIADO Y REGISTRO',0,1,'C');
      $this->Cell(180,5,'NOTARIA UNICA DE JAMUNDI-VALLE',0,1,'C');
   }
}

//Creación del objeto de la clase heredada
$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','I',10);
// Cabezera del Documento
$pdf->Cell(180,15,'ACTA DE DEPOSITO # '.$actas->consIn.' ',0,1,'C');
$pdf->Cell(40,5,'En cumplimiento de los articulos 18 y 19 de la ley 29 de 1.973; el articulo 46 del Decreto 2948 de 1.983',0,1);
$pdf->Cell(40,5,'y de la Instruccion Administrativa No. 01-28 de Junio 8 de 2001;',0,1);
$pdf->Cell(40,10, '',0,1); 
//Contenido dinamico del documento en una sola celda con boleta y registro
if (!empty($actas->variables['valorBoleta']) && !empty($actas->variables['valorRegistro'])) {

  $pdf->MultiCell(0,5,'Siendo el dia '.$actas->fechaDepo.', se recibe del '.utf8_decode("señor").' (a) '.utf8_decode($actas->nomUser).', identificada(o) con la cedula de ciudadania '.number_format($actas->documUser, 0, '', '.').', para que se efectue el pago de la BOLETA de $'.number_format($actas->valorBoleta, 0, '', '.').' pesos, y el REGISTRO de $'.number_format($actas->valorRegistro, 0, '', '.').' pesos, Para un valor total de $'.number_format($actas->valorTotal, 0, '', '.').' - '.$actas->valorLetra.' Pesos, de la Escritura Publica # '.$actas->numberEscrit.', de fecha '.$actas->fechaEscrit.', por el ACTO: Boleta Fiscal Y Registro. ELABORO: '.$actas->elaboroAdmin.'',0,1);
}
else{
//contenido dinamico del documento en una sola celda sin boleta y registro
$pdf->MultiCell(0,5,'Siendo el dia '.$actas->fechaDepo.', se recibe del '.utf8_decode("señor").' (a) '.utf8_decode($actas->nomUser).', identificada(o) con la cedula de ciudadania '.number_format($actas->documUser, 0, '', '.').', la suma de $'.number_format($actas->valorNumber, 0, '', '.').' - '.$actas->valorLetra.' Pesos , de la Escritura publica # '.$actas->numberEscrit.', de fecha '.$actas->fechaEscrit.', por el siguiente ACTO: '.$actas->tipoActo.'. ELABORO: '.$actas->elaboroAdmin.'',0,1);  
}
$pdf->Cell(50,20,'FIRMA DEL DEPOSITANTE:',0,1);
$pdf->Cell(40,10,'______________________________',0,1);
$pdf->Cell(40,5,'C.c del Depositante :'.number_format($actas->documUser, 0, '', '.').'',0,1);
if (empty($actas->variables['notaEncargada'])) {
  $pdf->Cell(40,19, '',0,1);
	$pdf->Cell(40,5,'MARTHA FERRER RIVADENERIRA',0,1);
	$pdf->Cell(40,5,'NOTARIA UNICA DE JAMUNDI (VALLE)',0,2);
            $pdf->Cell(170,10,'Carrera 7 No. 9-54, Barrio Angel Maria Camacho, TELEFONOS: 516 49 95 FAX: 516 116 8 Jamundi-Valle.',0,1,'C');
            $pdf->Cell(170,0,'E-Mail: notariaunicajamundi@hotmail.com.',0,1,'C');
            $pdf->Output('Acta-'.$actas->consIn.'-'.$actas->nomUser.'.pdf','I');
}
else{
  $pdf->Cell(40,19, '',0,1);
	$pdf->Cell(40,10,''.$actas->notaEncargada.'',0,1);
	$pdf->Cell(40,5,'NOTARIA ENCARGADA DE JAMUNDI (VALLE)',0,2);
           $pdf->Cell(170,10,'Carrera 7 No. 9-34, Barrio Angel Maria Camacho, TELEFONOS: 516 49 95 FAX: 516 11 68 Jamundi-Valle.',0,1,'C');
           $pdf->Cell(170,0,'E-Mail: notariaunicajamundi@hotmail.com.',0,1,'C');
           $pdf->Output('Acta-'.$actas->consIn.'-'.$actas->nomUser.'.pdf','I');
}
 ?>