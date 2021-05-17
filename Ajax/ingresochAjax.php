<?php
$peticionajax = true;
require_once "../core/configeneral.php";
include_once "../Controladores/ingresochControlador.php";

$ing = new ingresochControlador();


/*if(isset($_POST['nombreBanc-reg']) && isset($_POST['direcBanc-reg']) && isset($_POST['num_cue-reg']) && isset($_POST['saldo-reg']) && isset($_POST['tipo-reg']) && isset($_POST['CantCheq-reg']))
{
$datos=[
    'NomBanc'=>$_POST['nombreBanc-reg'],
    'DirBanc'=>$_POST['direcBanc-reg'],
    'NumCue'=>$_POST['num_cue-reg'],
    'Saldo'=>$_POST['saldo-reg'],
    'Tipo'=>$_POST['tipo-reg'],
    'Cant'=>$_POST['CantCheq-reg']
];

echo $ing->ingreso_banco_controlador($datos);

}
else*/
//echo "<script>console.log('".($_POST['chequenum']) .",". ($_POST['txtmonto1']) .",". ($_POST['txtnombre1'])."')</script>";
if (isset($_POST['optnewB']) &&  isset($_POST['optcuenta']) && isset($_POST['optcheq'])) {
    $listaban = $_POST['optnewB'];
    $listacuent = $_POST['optcuenta'];
    $listachequ = 0; // $_POST['optcheq'];

    // ingresar banco nuevo, cuenta nuea y chequera nueva
    if ($listaban == 0 && $listacuent == 0 && $listachequ == 0) {
        $datos = [
            'NomBanc' => $_POST['nombreBanc-reg'],
            'DirBanc' => $_POST['direcBanc-reg'],
            'NumCue' => $_POST['num_cue-reg'],
            'Saldo' => $_POST['saldo-reg'],
            'Tipo' => $_POST['tipo-reg'],
            'Cant' => $_POST['CantCheq-reg']
        ];
        echo $ing->ingreso_banco_controlador($datos);
    }
    // ingresar  cuenta nuea y chequera nueva
    else if ($listaban == 1 && $listacuent == 0 && $listachequ == 0) {

        $datos = [
            'IdBanc' => $_POST['banco'],
            'NumCue' => $_POST['num_cue-reg'],
            'Saldo' => $_POST['saldo-reg'],
            'Tipo' => $_POST['tipo-reg'],
            'Cant' => $_POST['CantCheq-reg']
        ];
        echo $ing->ingreso_cuenta_controlador($datos);
    }
    // chequera nueva
    else if ($listaban == 1 && $listacuent == 1 && $listachequ == 0) {

        $datos = [
            'IdBanc' => $_POST['banco'],
            'IdCuen' => $_POST['cuenta'],
            'Cant' => $_POST['CantCheq-reg'],
            'Est' => 'Activo'
        ];
        echo $ing->ingreso_chequera_controlador($datos);
    } /*else if ($listaban == 1 && $listacuent == 1 && $listacheq == 1) {

        $datos = [
            'IdBanc' => $_POST['banco'],
            'IdCuen' => $_POST['cuenta'],
            'IdCheq' => $_POST['chequera'],
            'Cant' => $_POST['CantCheq-reg']
        ];
    }*/
} else if (isset($_POST['chequenum']) && isset($_POST['txtmonto1']) && isset($_POST['txtnombre1']) && isset($_POST['usuario'])) {
    //echo "<script>console.log('LLEga a Ajax')</script>";
    $Nochequ = $_POST['chequenum'];
    $monto = $_POST['txtmonto1'];
    $nom = $_POST['txtnombre1'];
    $usu = $_POST['usuario'];
    $datos =
        [
            'num' => $Nochequ,
            'monto' => $monto,
            'nom' => $nom,
            'usuario' => $usu
        ];
    echo $ing->aceptar_cheque_controlador($datos);
}
