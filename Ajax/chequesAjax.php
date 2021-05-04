<?php

$peticionajax=true;
require_once "../core/configeneral.php";
require_once "../Controladores/chequeControlador.php";


if (isset($_POST['banco']) && !isset($_POST['cuenta']) && !isset($_POST['chequera'])  )
{
session_start();
    $banc= $_POST['banco'];
    $Mbanc= new chequeControlador();
    echo -> $Mbanc.mostrar_cuenta_controlador($banc);

}
else if($_POST['banco']) && isset($_POST['cuenta']) && !isset($_POST['chequera']) )
{
    session_start();
    $banc= $_POST['banco'];
    $cuent= $_POST['cuenta'];
    $Mbanc= new chequeControlador();
    echo -> $Mbanc.mostrar_chequera_controlador($banc,$cuent);
}
