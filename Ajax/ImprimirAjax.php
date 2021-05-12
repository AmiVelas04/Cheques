 <?php 
 $peticionajax=true;
        include "../Core/fpdf/fpdf.php";     
       // require_once "../Modelos/imprimirModelo.php";
        if (isset($_POST['chequeimp']))
        {
            $idche=$_POST['chequeimp'];
        }
        else
        {
            $idche=22;
        }
       include "../Controladores/imprimirControlador.php";
      $texto= new imprimirControlador();
       $datos= $texto->modelar_cheque_controlador($idche);
       /* $pdf = new FPDF('P','mm','Letter');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(200,60,$datos,1,0,'C',0);*/
/*------------------------------------------------------------------------------------------------------*/
class PDF extends FPDF
{
// Cargar los datos

// Una tabla más completa
function ImprovedTable($header, $data)
{
    // Anchuras de las columnas
    $w = array(195);
    // Cabeceras
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Datos
    for($cont=1;$cont<=6;$cont++){
    foreach($data as $row)
    {
        $cuenta= $row['num'];
        $numche= $row['cheq'];
        $monto= $row['mon'];
        $nombre= $row['ben'];
        $fecha=  $row['fech'];
        $banco=$row['nom'];
        $tFecha="                                                                                                                                      Fecha:".$fecha;
        $tBanco="                                                                               ".$banco;
        $tCuenta="                                                                    Cuenta No. ".$cuenta;
        $tNombre="Paguese a:       ".$nombre;
        $tMonto="Monto:          Q.   ".$monto;
        $linea="                  ______________________________________________________________________";
        $tNumche="   Cheche No.   ".$numche;
        $lineap="                   ________";
        $lineaf=" ______________________________________________________________________________";

      


            if ($cont==1)
            {
                $this->Cell($w[0],6,$tFecha,'LR');
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
            
                
            }
            elseif($cont==2)
            {
                $this->Cell($w[0],6,$tBanco,'LR');
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
                
            }
            elseif($cont==3)
            {
                $this->Cell($w[0],6,$tCuenta,'LR');
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
            }
            elseif($cont==4)
            {
                $this->Cell($w[0],6,$tNombre,'LR');
                $this->Ln();
                $this->Cell($w[0],6,$linea,'LR');
                $this->Ln();
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
            }
            elseif($cont==5)
            {
                $this->Cell($w[0],6,$tMonto,'LR');
                $this->Ln();
                $this->Cell($w[0],6,$linea,'LR');
                $this->Ln();
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
            }
            elseif($cont==6)
            {
                $this->Cell($w[0],6,$tNumche,'LR');
                $this->Ln();
                $this->Cell($w[0],6,$lineap,'LR');
                $this->Ln();
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
                $this->Cell($w[0],6,'','LR');
                $this->Ln();
            }

 
    }
}
    // Línea de cierre
    $this->Cell(195,1,'','T');
}

// Tabla coloreada

}

$pdf = new PDF();
// Títulos de las columnas
$header = array('');
// Carga de datos

$pdf->SetFont('Arial','',12);

$pdf->AddPage();
$pdf->ImprovedTable($header,$datos);

$pdf->Output();
?>