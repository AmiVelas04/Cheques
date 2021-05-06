<?php 

if($peticionajax) {

require_once "../Modelos/usuarioModelo.php";
require_once "../vistas/modulos/script.php";
}
else
{
require_once "./Modelos/usuarioModelo.php";
require_once "./vistas/modulos/script.php";
}

class usuarioControlador extends usuarioModelo
{
public function ingreso_usuario_controlador($datos)
{
		$nombre=$datos['nombre'];
        $usuario=$datos['usu'];
        $pass1=$datos['pass1'];
        $pass2=$datos['pass2'];
		$nivel=$datos['nivel'];
        $id= usuarioModelo::id_usuario_modelo();


        if ($pass1!=$pass2)
        {
            $alerta=["Alerta"=>"simple","titulo"=>"La contraseña ingresada debe ser la misma","texto"=>"Error al ingresar contraseña","tipo"=>"error"];	
        }
        else
        {
            $datos=[
                'codigo'=>$id,
                'nombre'=>$nombre,
                'usuario'=>$usuario,
                'pass'=>$pass2,    
                'nivel'=>$nivel
            ];
           
    
            $res1= usuarioModelo::ingreso_usuario_modelo($datos);
            if ($res1->RowCount()>=1)
            {
                $alerta=["Alerta"=>"limpiar","titulo"=>"Exito","texto"=>"Usuario ingresado correctamente","tipo"=>"success"];	
                
            }
            else
            {
                $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo registrar el usuario","tipo"=>"error"];	
            }
            $resp=usuarioModelo::Sweet_alert($alerta);
            echo $resp;//"<script>console.log('".$resp."')</script>";
            //return $resp;
        }
        
}
    
    
}