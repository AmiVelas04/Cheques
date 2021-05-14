<?php 
 $peticionajax=true;
        
        include "../Core/fpdf/fpdf.php";     
      $datos;
     global $titulo;
     $titulo="";
        if (isset($_POST['reportes']))
        {
            include "../Controladores/mostrarepoControlador.php";
            $datosrep=new mostrarepoControlador();
            $repornum=$_POST['reportes'];
            if ($repornum==1)
            {
                if(isset($_POST['fechaini-reg']) && isset($_POST['fechafin-reg']) && isset($_POST['Cuentas']))
                { 
                    $fechai=$_POST['fechaini-reg'];
                    $fechaf=$_POST['fechafin-reg'];
                    $cuenta=$_POST['Cuentas'];
                    $datosr1=[
                    'fechai'=>$fechai,
                    'fechaf'=>$fechaf,
                    'cuenta'=>$cuenta
                    ];
                 //  echo "<script>console.log('primer opcion llega hasta aqui')</script>";
                    $datos= $datosrep->reporte1_controlador($datosr1);
                }
                else{
                   // echo "<script>console.log('error en opcion 1')</script>";
                }
            }
            else if($repornum==2)
            { 
                if(isset($_POST['fechaini-reg']) && isset($_POST['fechafin-reg']) && isset($_POST['usuario']))
                { 
                    $fechai=$_POST['fechaini-reg'];
                    $fechaf=$_POST['fechafin-reg'];
                    $usuario=$_POST['usuario'];
                    $datosr2=[
                    'fechai'=>$fechai,
                    'fechaf'=>$fechaf,
                    'usuario'=>$usuario
                    ];
                    $datos= $datosrep->reporte2_controlador($datosr2);
                    //echo "<script>alert('".$datos."')</script>";
                }
                else
                {
                   // echo "<script>console.log('error en opcion 2')</script>";
                }
            }
            else if($repornum==3)
            {
                if(isset($_POST['fechaini-reg']) && isset($_POST['fechafin-reg']) && isset($_POST['Cuentas']))
                { 
                    $fechai=$_POST['fechaini-reg'];
                    $fechaf=$_POST['fechafin-reg'];
                    $cuenta=$_POST['Cuentas'];
                    $datosr3=[
                    'fechai'=>$fechai,
                    'fechaf'=>$fechaf,
                    'cuenta'=>$cuenta
                    ];
              //      echo "<script>console.log('tercera opcion llega hasta aqui')</script>";
                $datos= $datosrep->reporte3_controlador($datosr3);
                }
                else
                {
                   // echo "<script>console.log('error en opcion 3')</script>";
                }
            }
            else if($repornum==4)
            {
                if(isset($_POST['Cuentas']))
                { 
                    $cuenta=$_POST['Cuentas'];
                    $datos= $datosrep->reporte4_controlador($cuenta);
                 //echo "<script>console.log('".$datos."')</script>";
                }
                else
                {
               //     echo "<script>console.log('error en opcion 4')</script>";
                }
            }
            else if($repornum==5)
            {
               // echo "<script>console.log('".$repornum."')</script>";
                if(isset($_POST['rangoMin']) && isset($_POST['rangoMax']) && isset($_POST['Cuentas']))
                { 
                    $Min=$_POST['rangoMin'];
                    $Max=$_POST['rangoMax'];
                    $cuenta=$_POST['Cuentas'];
                    $datosr5=[
                    'Mini'=>$Min,
                    'Maxi'=>$Max,
                    'cuenta'=>$cuenta
                    ];
                $datos= $datosrep->reporte5_controlador($datosr5);
                // echo "<script>console.log('".$datos."')</script>";
                }
                else
                {
                 // echo "<script>console.log('error en opcion 5')</script>";
                }
            }
            else
            {
               // echo "<script>console.log('no se setearon variables enviados')</script>";
            }
            
        }

 class PDF extends FPDF
{
   
    function Header()
{
    // Logo
   // $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,"",0,1,'C',0);
    // Salto de línea
   
    $this->Cell(30,10,'Fecha inicio',1,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(30,10,'Fecha de fin',1,0,'C');
    // Salto de línea
    $this->Ln(20);


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

function FancyTable($header, $data)
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Cabecera
    $w = array(35, 35, 45, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre
    $this->Cell(array_sum($w),0,'','T');
}
}
$pdf = new PDF();

// Títulos de las columnas
$header = array('Cod. Cheque', 'Fecha', 'Monto', 'Recibio');
// Carga de datos

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$datos);
$pdf->Output();
        