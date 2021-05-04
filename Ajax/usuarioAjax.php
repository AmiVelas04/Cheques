<?php
$peticionajax=true;
include "../core/configeneral.php";
require_once "../Controladores/usuarioControlador.php";

session_start();
$datos=[
    'id'=>$_POST['nombre-reg'],
    'nombre'=>$_POST['nombre-reg'],
    'usu'=>$_POST['usu-reg'],
    'pass'=>$_POST['pass1-reg'],
    'nivel'=>$_POST['nivel-reg']
];