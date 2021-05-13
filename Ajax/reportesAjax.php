<?php 
 $peticionajax=true;
require_once "../Controladores/reportesControlador.php";
if (isset($_POST['rep']))
{
    $repor= new reportesControlador();
    $repo= $_POST['rep'];
    if ($repo==1)
    {
        echo $repor->mostrar_cuenta_controlador();
    }
    if ($repo==2)
    {
        echo $repor->mostrar_usuario_controlador();
    }
    if ($repo==3)
    {
        echo $repor->mostrar_cuenta_controlador();
    }
    if ($repo==4)
    {
        echo $repor->mostrar_cuenta_controlador();
    }
    if ($repo==5)
    {
        echo $repor->mostrar_inforep5_controlador();
    }

}
      