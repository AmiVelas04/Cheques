<?php
$peticionajax=true;
require_once "../core/configeneral.php";
require_once "../Controladores/chequeControlador.php";


if (isset($_POST['banco']) && !isset($_POST['cuenta']) && !isset($_POST['chequer']))
{
    $banc= $_POST['banco'];
    $Mbanc= new chequeControlador();
   echo  $Mbanc->mostrar_cuenta_controlador($banc);
}
else if(isset($_POST['banco']) && isset($_POST['cuenta']) && !isset($_POST['chequer'])) 
{
    $banc= $_POST['banco'];
    $cuent= $_POST['cuenta'];
    $Mbanc= new chequeControlador();
    echo  $Mbanc->mostrar_chequera_controlador($cuent);
}
else if(isset($_POST['banco']) && isset($_POST['cuent']) && isset($_POST['chequer']) && isset($_POST['fecha-reg']) && isset($_POST['monto-reg']) && isset($_POST['nombre-reg']))
{
    
    $datos=[
    'banco'=>$_POST['banco'],
    'cuenta'=>$_POST['cuent'],
    'chequera'=>$_POST['chequer'],
    'fecha'=>$_POST['fecha-reg'],
    'monto'=>$_POST['monto-reg'],
    'nombre'=>$_POST['nombre-reg']
    ];
    //echo "<script>alert('".($_POST['banco'])." - ".($_POST['cuent'])." - ". ($_POST['chequer'])." - ".($_POST['fecha-reg'])." - ".($_POST['monto-reg'])." - ".($_POST['nombre-reg'])."')</script>";
$Mbanc= new chequeControlador();
echo $Mbanc->agregar_cheque_controlador($datos);
}
