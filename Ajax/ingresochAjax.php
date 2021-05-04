<?php

$peticionajax=true;
require_once "../core/configeneral.php";
require_once "../Controladores/ingresochControlador.php";
echo "Muestra de modelo en estado laskfhalsdkhflaskdfhlahfehfpuahwfpuhwpfeuhpufh pa pfah pfoahofi óihaoisfhásioh íah áoi ´fioha´fh áish fiash´fa´iásifh ´ah áisfóiyeá ásifíasfd´eíuásidf´aisufías ´ffiaus fáuf íausf";

if(isset($_POST['nombreBanc-reg']) && isset($_POST['direcBanc-reg']) && isset($_POST['num_cue-reg']) && isset($_POST['saldo-reg']) && isset($_POST['tipo-reg']) && isset($_POST['estado-reg']) && isset($_POST['CantCheq-reg']))
{
    echo "Muestra de modelo en estado";
$datos=[
    'NomBanc'=>$_POST['nombreBanc-reg'],
    'DirBanc'=>$_POST['direcBanc-reg'],
    'NumCue'=>$_POST['num_cue-reg'],
    'Saldo'=>$_POST['saldo-reg'],
    'Tipo'=>$_POST['tipo-reg'],
    'Estado'=>$_POST['estado-reg']
    'Cant'=>$_POST['CantCheq-reg']
];
$ingre= new ingresochControlador();
echo $ingre->ingreso_banco_controlador($datos);

}
else
{


}