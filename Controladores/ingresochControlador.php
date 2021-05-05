<?
if($peticionajax) {

require_once "../Modelos/ingresochModelo.php";
require_once "../vistas/modulos/script.php";
	
}
else
{
require_once "./Modelos/ingresochModelo.php";
require_once "./vistas/modulos/script.php";

}
//controlador para agregar  chequeras
class ingresochControlador extends ingresochModelo
{
    
public function ingreso_banco_controlador($datos)
{
    $cod=ingresochModelo::new_codigo_banco();
    $nombreban=modeloMain::limpiar_cadena($datos['NomBanc']);
    $direccion=modeloMain::limpiar_cadena($datos['DirBanc']);

$datosban=['id'=>$cod,
            'nombre'=>$nombreban,
            'dir'=>$direccion];
            $res1=ingresochModelo::ingreso_banco_modelo($datosban);
            if ($res1->rowCount()>=1)
            {
                $codcu=ingresochModelo::new_codigo_cuenta();
                
                $num_cue=modeloMain::limpiar_cadena($datos['NumCue']);
                $saldo=modeloMain::limpiar_cadena($datos['Saldo']);
                $tipo=modeloMain::limpiar_cadena($datos['Tipo']);
                $datoscue=[
                    'codcue'=>$codcu,
                    'numcue'=>$num_cue,
                    'saldo'=>$saldo,
                    'tipo'=>$tipo
                ];
                $res2=ingresochModelo::ingreso_cuenta_modelo($datoscue);
                if($res2->rowCount()>=1)
                {
                    $id_chequera= ingresoModelo::new_codigo_chequera();
                    $estado= modeloMain::limpiar_cadena($datos['Estado']);
                    $cantidad= modeloMain::limpiar_cadena($datos['Cant']);
                    $datoscheq=[
                    'idcheq'=>$id_chequera,
                    'estado'=>$estado,
                    'cant'=>$cantidad
                    ];
                    $res3=ingresoModelo::ingreso_chequera_modelo($datoscheq);
                    if ($res3->rowCount()>=1)
                    {
                        $alerta=["Alerta"=>"limpiar","titulo"=>"Exito","texto"=>"Chequera registrada con exito","tipo"=>"success"];	
                    }
                    else
                    {
                        $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo ingresar la chequera","tipo"=>"error"];	
                    }
                }
                else
                {
                    $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo ingresar la cuenta","tipo"=>"error"];	
                }

            }
            else
            {
                $alerta=["Alerta"=>"simple","titulo"=>"Ocurrio un error","texto"=>"No se pudo ingresar el banco","tipo"=>"error"];	
            }
            
          return ingresochModelo::Sweet_alert($alerta);
    }




}