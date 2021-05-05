<?php

$peticionajax=true;
require_once "../core/configeneral.php";
require_once "../Controladores/ingresochControlador.php";
$ingreso = new ingesochControlador();


if(isset($_POST['nombreBanc-reg']) && isset($_POST['direcBanc-reg']) && isset($_POST['num_cue-reg']) && isset($_POST['saldo-reg']) && isset($_POST['tipo-reg']) && isset($_POST['CantCheq-reg']))
{
$datos=[
    'NomBanc'=>$_POST['nombreBanc-reg'],
    'DirBanc'=>$_POST['direcBanc-reg'],
    'NumCue'=>$_POST['num_cue-reg'],
    'Saldo'=>$_POST['saldo-reg'],
    'Tipo'=>$_POST['tipo-reg'],
    'Cant'=>$_POST['CantCheq-reg']
];
echo $ingreso->ingreso_banco_controlador($datos);

}
else
{
    


}