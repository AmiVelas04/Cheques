<?php
$peticionajax=true;
require_once "../core/configeneral.php";
require_once "../Controladores/usuarioControlador.php";


if(isset($_POST['nombre-reg']) && isset($_POST['usu-reg']) && isset($_POST['pass1-reg']) && isset($_POST['pass2-reg']) && isset($_POST['nivel']))
{
    $datos=[
        'nombre'=>$_POST['nombre-reg'],
        'usu'=>$_POST['usu-reg'],
        'pass1'=>$_POST['pass1-reg'],
        'pass2'=>$_POST['pass2-reg'],
        'nivel'=>$_POST['nivel']
    ];
    $iniciar = new usuarioControlador();
    echo $iniciar->ingreso_usuario_controlador($datos);
    
}

