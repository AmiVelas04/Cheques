<?php 

if($peticionajax) {

require_once "../Modelos/usuarioModelo.php";
require_once "../vistas/modulos/script.php";
}
else
{
require_once "./Modelos/usuarioModelo.php";
require_once "./vistas/modulos/script.php";
}

Class usuarioControlador extends usuarioModelo
{
public function ingreso_usuario_controlador()
{
$cod=usuarioModelo::id_usuario_modelo();
$datos=[
'id'=>$cod,
'nombre'=>$_POST['nombe-reg'],
'usu'=>$_POST['usu-reg'],
'pass'=>$_POST['pass1-reg'],
'nivel'=>$_POST['nivel'],
];
$Respuesta="";
$res1=usuarioModelo::ingreso_usuario_modelo($datos);

    if($res1->rowCount()>=1)
    {
        $Respuesta="Se ingreso el usuario";
    }
    else
    {
        $respuesta="No se ingreso el usuario";
    }

    return $Repuesta;

}
    
}