<?php 

if($peticionajax) {

require_once "../Modelos/chequeModelo.php";
require_once "../vistas/modulos/script.php";
}
else
{
require_once "./Modelos/chequeModelo.php";
require_once "./vistas/modulos/script.php";
}
//controlador para agregar alumno

class reportesControlador extends reportesModelo
{
}