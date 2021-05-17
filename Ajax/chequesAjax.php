<?php
$peticionajax = true;
require_once "../core/configeneral.php";
require_once "../Controladores/chequeControlador.php";

session_start();
if (isset($_POST['banco']) && !isset($_POST['cuenta']) && !isset($_POST['chequer'])) {

    $banc = $_POST['banco'];
    $Mbanc = new chequeControlador();
    echo  $Mbanc->mostrar_cuenta_controlador($banc);
} else if (isset($_POST['banco']) && isset($_POST['cuenta']) && !isset($_POST['chequer'])) {
    $banc = $_POST['banco'];
    $cuent = $_POST['cuenta'];
    $Mbanc = new chequeControlador();
    // echo "<script>console.log('llega al archivo ajax')</script>";
    echo  $Mbanc->mostrar_chequera_controlador($cuent);
} else if (isset($_POST['banco']) && isset($_POST['cuent']) && isset($_POST['chequer']) && isset($_POST['fecha-reg']) && isset($_POST['monto-reg']) && isset($_POST['nombre-reg'])) {
    //echo "<script>console.log('tercer if')</script>";

    if (isset($_SESSION['monto'])) {
        $montoest = $_SESSION['monto'];
    } else {
        $montoest = 0;
    }
    echo "<script>console.log('monto reg: " . $_SESSION['monto'] . $_SESSION['nivel'] . "')</script>";

    $Mbanc = new chequeControlador();
    if ($montoest >= $_POST['monto-reg']) {
        $datos = [
            'banco' => $_POST['banco'],
            'cuenta' => $_POST['cuent'],
            'chequera' => $_POST['chequer'],
            'fecha' => $_POST['fecha-reg'],
            'monto' => $_POST['monto-reg'],
            'nombre' => $_POST['nombre-reg'],
            'chequera' => $_POST['chequer'],
            'estado' => 'Generado',
            'usuario' => $_POST['usu-reg']
        ];
    } else {
        $datos = [
            'banco' => $_POST['banco'],
            'cuenta' => $_POST['cuent'],
            'chequera' => $_POST['chequer'],
            'fecha' => $_POST['fecha-reg'],
            'monto' => $_POST['monto-reg'],
            'nombre' => $_POST['nombre-reg'],
            'chequera' => $_POST['chequer'],
            'estado' => 'Pendiente',
            'usuario' => $_POST['usu-reg']
        ];
    }
    echo $Mbanc->agregar_cheque_controlador($datos);
} else {
}

if (isset($_POST['cheque']) && isset($_POST['dato'])) {
    $id = $_POST['cheque'];
    $dato = $_POST['dato'];
    $mostrar = new chequeControlador();
    echo $mostrar->mostrar_datosch_controlador($id, $dato);
}
