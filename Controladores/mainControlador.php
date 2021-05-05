<?php 

if($peticionajax) {

require_once "../Modelos/mainModelo.php";
require_once "../vistas/modulos/script.php";
	
}
else
{
require_once "./Modelos/mainModelo.php";
require_once "./vistas/modulos/script.php";
}

class mainControlador extends mainModelo
{
    public function mostrar_cheque_controlador()
	{
        $cheques=mainModelo::mostrar_cheques_hech_modelo();
        $resp="";
     if ($cheques->rowcount()>=1)
    {
    $datos=$cheques->fetchall();
    
    foreach($datos as $row)
    {
           $resp.=$row['todo'];
    }
        return $resp;
    }
}


    public function mostrar_pendientes_controlador()
    {
        $cheques=mainModelo::mostrar_cheques_pen_modelo();
        $resp="";
        if ($cheques->rowcount()>=1)
       {
       $datos=$cheques->fetchall();
       
       foreach($datos as $row)
       {
              $resp.=$row['todo'];
       }
           return $resp;
       
    }

}

public function mostrar_actividades($orden)
{
$activi= mainModelo::buscar_actividades_modelo($orden);

    $datos=$activi->fetchall();
    $num=0;
    $conte="";
    foreach($datos as $row)
    {
        $num++;
        $conte="<div class='cd-timeline-content'>
                <h4 class='text-center text-titles'> ".$row['Beneficiario']."</h4>
                <p class='text-center'>
                <i class='zmdi zmdi-money-box zmdi-hc-fw'></i> Monto: Q.".$row['Monto']." &nbsp;&nbsp;&nbsp; 
                <i class='zmdi zmdi-shield-check zmdi-hc-fw'></i> Estado: ".$row['Estado']." &nbsp;&nbsp;&nbsp; 
                </p>
                <span class='cd-date'><i class='zmdi zmdi-calendar-note zmdi-hc-fw'></i> Fecha de Emisión: ".$row['fecha']."</span>
                </div>";
                if ($orden ==1)
                {
                    echo $conte;

                }
        if ($num==$orden)
        {
        return $conte;            
        }
  
    
}
$conte="LOL";
return $conte;

}
}