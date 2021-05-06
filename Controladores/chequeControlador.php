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
	public function agregar_cheque_controlador($datos)
	{
       
        $idch= chequeModelo::new_id_cheque_modelo();
        
        $datoscheq=[
        'id'=> $idch,  
        'fecha'=>$datos['fecha'],
        'monto'=>$datos['monto'],
        'beneficiario'=>$datos['nombre']
        ];
       

        $res1=chequeModelo::ingresar_cheque_modelo($datoscheq);
        if ($res1->rowCount()>=1)
        {
            $alerta=["Alerta"=>"limpiar","titulo"=>"Exito","texto"=>"Cheque registrado con exito","tipo"=>"success"];	
        }
        else
        {
            $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo registrar el cheque","tipo"=>"error"];	
        }
        return chequeModelo::Sweet_alert($alerta);
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
    $conte.="
    
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
    $conte.="   
    <option value='0'>Seleccione la chequera</option>";
    foreach($datos as $row)
    {
        $num++;
        $conte.="<option value='".$row['id']."'>". $row['id'] . "</option>";
    }
    }               
    return $conte;
}

public function mostrar_chequespen_controlador()
{
    $sql=chequeModelo::mostrar_pendiente_modelo();
    $conte="";
    $num=0;
    if ($sql->rowcount()>=1)
    {
    $datos=$sql->fetchall();
    $conte.="   
    <option value='0'>Seleccione el número de cheque</option>";
    foreach($datos as $row)
    {
        $num++;
        $conte.="<option value='".$row['id']."'>". $row['id'] . "</option>";
    }
    }               
    return $conte;
}

public function mostrar_datosch_controlador($id,$dato)
{
    $sql=chequeModelo::mostrar_datospen_modelo($id);
  
    if ($sql->rowcount()>=1)
    {
    $datos=$sql->fetchall();
    foreach($datos as $row)
    {
        if($dato==1)
        {
            $conte='<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtbanc" type="text" name="txtbanc" value="'.$row['nom'].'" disabled required="" maxlength="100" style="display:flex">';	
        }
        else if($dato==2)
        {
            $conte='<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtcuenta" type="text" name="txtcuenta" value="'.$row['num'].'"disabled required="" maxlength="100" style="display:flex">';
        }
        else if ($dato==3)
        {
            $conte='<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtchequera" type="text" name="txtchequera" value="'.$row['che'].'"disabled required="" maxlength="100" style="display:flex">';
        }
        else if($dato==4)
        {
            $conte='<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtmonto" type="text" name="txtmonto" value="'.$row['mon'].'"required=""  disabled maxlength="100" style="display:flex">';
        }
        else if($dato==5)
        {
            $conte='<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtnombre" type="text" name="txtnombre" value="'.$row['ben'].'" required="" disabled maxlength="100" style="display:flex">';
        }       
    }
    }
    else
    {
        $conte='No existe este dato';
    }
    return $conte;
}

}


        

