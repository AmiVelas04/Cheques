<?php 
if($peticionajax) {
require_once "../Modelos/mostrarepoModelo.php";
}
else
{
require_once "./Modelos/mostrarepoModelo.php";
}
//controlador para agregar alumno

class mostrarepoControlador extends mostrarepoModelo
{
   public function reporte1_controlador($datos)
   {
    $repordata=mostrarepoModelo::repor1($datos);
    $result=$repordata->fetchAll();
    return $result;

   }
   public function reporte2_controlador($datos)
   {
    $repordata=mostrarepoModelo::repor2($datos);
    $result=$repordata->fetchAll();
    return $result;
   }
   public function reporte3_controlador($datos)
   {
   /* $repordata=mostrarepoModelo::repor3($datos);
    $result=$repordata->fetchAll();
    return $result;*/

   }
   public function reporte4_controlador($cuenta)
   {
    $repordata=mostrarepoModelo::repor4($cuenta);
    $result=$repordata->fetchAll();
    return $result;

   }
   public function reporte5_controlador($datos)
   {
    $repordata=mostrarepoModelo::repor5($datos);
    $result=$repordata->fetchAll();
    return $result;
   }


}