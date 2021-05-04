<?php 

if($peticionajax) {

require_once "../Modelos/chequeModelo.php";
require_once "../vistas/modulos/script.php";
	
}
else
{
require_once "./Modelos/chequeModelo.php";
require_once "./vistas/modulos/script.php";

}
//controlador para agregar alumno

class chequeControlador extends chequeModelo
{
	public function agregar_cheque_controlador()
	{
		$cod=modeloMain::limpiar_cadena($_POST['cod-reg']);
		$fech= modeloMain::limpiar_cadena($_POST['fecha-reg']);
        $monto= modeloMain::limpiar_cadena($_POST['monto-reg']);
        $nombre= modeloMain::limpiar_cadena($_POST['nombre-reg']);

	
  

            $consulta1=modeloMain::ejecutar_consulta_simple("select id from alumno where cod_al=$cod");

			if ($consulta1->rowCount()>=1) 
			{
				$alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"El alumno ya se encuentra resitrado","tipo"=>"error"];	
            } 
            

            return alumnoModelo::Sweet_alert($alerta);
            
   }

   //Mostrar los bancos ingresado

   public function mostrar_banco_controlador(){
    $sql=chequeModelo::mostrar_banco_modelo();
    $conte="";
    $num=0;
    if ($sql->rowcount()>=1)
    {
    $datos=$sql->fetchall();
    $conte.="<option value='0'>Seleccione un banco</option>";
    foreach($datos as $row)
    {
        $num++;
        $conte.="<option value='".$row['id']."'>". $row['banco'] . "</option>";
    }
    }               
    
    return $conte;
}


//Mostrar las cuentas asignadas al banco seleccionado
public function mostrar_cuenta_controlador($idbanco){
    $sql=chequeModelo::mostrar_cuenta_modelo($idbanco);
    $conte="";
    $num=0;
    if ($sql->rowcount()>=1)
    {
    $datos=$sql->fetchall();
    $conte.="<h2><label class=''>Chequera *</label></h2>
    <div class='btn-group'>
    <div class='btn-group'>
    <option value='0'> Seleccione una cuenta</option>";
    foreach($datos as $row)
    {
        $num++;
        $conte.="<option value='".$row['id']."'>". $row['cuenta'] . "</option>";
    }
    }               
    return $conte;
}

//mostrar las chequeras disponibles
public function mostrar_chequera_controlador($idcuenta){
    $sql=chequeModelo::mostrar_chequera_modelo($idcuenta);
    $conte="";
    $num=0;
    if ($sql->rowcount()>=1)
    {
    $datos=$sql->fetchall();
    $conte.="<h2><label class=''>Chequera *</label></h2>
    <div class='btn-group'>
    <div class='btn-group'> 
    <option value='0'>Seleccione la chequera</option>";
    foreach($datos as $row)
    {
        $num++;
        $conte.="<option value='".$row['id']."'>". $row['id'] . "</option>";
    }
    }               
    
    return $conte;
}


}


        

