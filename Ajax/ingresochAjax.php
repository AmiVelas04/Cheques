<?php
$peticionajax=true;
require_once "../core/configeneral.php";
include_once "../Controladores/ingresochControlador.php";

$ing= new ingresochControlador();


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
else*/ if (isset($_POST['optnewB']) &&  isset($_POST['optcuenta']) && isset($_POST['optcheq']))
{
$listaban=$_POST['optnewB'];
$listacuent=$_POST['optcuenta'];
$listachequ=$_POST['optcheq'];

// ingresar banco nuevo, cuenta nuea y chequera nueva
    if ($listaban==0 && $listacuent==0 && $listachequ==0)
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
    // ingresar  cuenta nuea y chequera nueva
    else if ($listaban==1 && $listacuent==0 && $listacheq==0)
    {
      
        $datos=[
            'IdBanc'=>$_POST['banco'],
            'NumCue'=>$_POST['num_cue-reg'],
            'Saldo'=>$_POST['saldo-reg'],
            'Tipo'=>$_POST['tipo-reg'],
            'Cant'=>$_POST['CantCheq-reg']
        ];
    }
    // chequera nueva
    else if ($listaban==1 && $listacuent==1 && $listacheq==0)
    {
    
        $datos=[
            'IdBanc'=>$_POST['banco'],
            'IdCuen'=>$_POST['cuenta'],
             'Cant'=>$_POST['CantCheq-reg']
        ];
    }
    else if ($listaban==1 && $listacuent==1 && $listacheq==1)
    {
     
        $datos=[
            'IdBanc'=>$_POST['banco'],
            'IdCuen'=>$_POST['cuenta'],
            'IdCheq'=>$_POST['chequera'],
            'Cant'=>$_POST['CantCheq-reg']
        ];
    }

}
