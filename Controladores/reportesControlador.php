<?php 

if($peticionajax) {

require_once "../Modelos/reportesModelo.php";
require_once "../vistas/modulos/script.php";
}
else
{
require_once "./Modelos/reportesModelo.php";
require_once "./vistas/modulos/script.php";
}
//controlador para agregar alumno

class reportesControlador extends reportesModelo
{
    //para reporte 1
    public function mostrar_cuenta_controlador()
    {
        $respo= self::mostrar_cuenta_modelo();
        $valores=$respo->fetchAll();
        $conte="<div class='row'>";
        $conte.="<div class='col-xs-6 col-sm-6'>";
        $conte.="<div class='form-group label-floating'>";
        $conte.="<label class='control-label'>No. de Cuenta </label>";
        $conte.="<select class='form-control'  id='Cuentas' name='Cuentas'>";
        foreach($valores as $elem)
        {
            $conte.="<option value='".$elem['id']."'>".$elem['cuenta']."</option>";
        }
        $conte.="</select>";
        $conte.="</div>";
        $conte.="</div>";
        $conte.="</div>";
        return $conte;

    }
//para reporte 2

    public function mostrar_usuario_controlador()
    {
        $conte="<div class='row'>";
        $conte.="<div class='col-xs-12 col-sm-12'>";
        $conte.="<div class='form-group label-floating'>";
        $conte.="<label class='control-label'>Usuario </label>";
        $conte.="<select class='form-control'  id='usuario' name='usuario'>";
        $conte.="<option value='1'>Gerencia</option>";
        $conte.="<option value='2'>Auditoria</option>";
        $conte.="<option value='3'>Operador</option>";
        $conte.="</select>";
        $conte.="</div>";
        $conte.="</div>";
        $conte.="</div>";
        return $conte;
    }

    //para reporte 2

    public function mostrar_inforep5_controlador()
    {
        $conte=self::mostrar_cuenta_controlador();
        $conte.="<div class='row'>";
        $conte.="<div class='col-xs-6 col-sm-6'>";
        $conte.="<div class='form-group label-floating'>";
        $conte.="<label class='control-label'>Rango Minimo Q. </label>";
        $conte.="<input pattern='[0-9]{1,7}' class='form-control' type='text' name='rangoMin' required='' maxlength='30'>";
        $conte.="</div>";
        $conte.="</div>";
        $conte.="<div class='col-xs-6 col-sm-6'>";
        $conte.="<div class='form-group label-floating'>";
        $conte.="<label class='control-label'>Rango Maximo Q. </label>";
        $conte.="<input pattern='[0-9]{1,7}' class='form-control' type='text' name='rangoMax' required='' maxlength='30'>";
        $conte.="</div>";
        $conte.="</div>";
        $conte.="</div>";
        $conte.="<div class='row'>";
        $conte.="<div class='col-xs-6 col-sm-6'>";
        $conte.="<div class='form-group label-floating'>";
        $conte.="<label class='control-label'>Estado de cheque </label>";
        $conte.="<select class='form-control'  id='CheEstado' name='CheEstado'>";
        $conte.="<option value='1'>Generado</option>";
        $conte.="<option value='2'>Pendiente</option>";
        $conte.="<option value='3'>Anulado</option>";
        $conte.="</select>";
        $conte.="</div>";
        $conte.="</div>";
        $conte.="</div>";

        return $conte;
    }



    

    

}