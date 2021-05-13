<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}


class reportesModelo extends modeloMain
{
    protected function mostrar_cuenta_modelo()
    {
        $consul="select cu.id_cuenta as id,cu.num_cuenta as cuenta 
        from cuenta cu ";
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
   }


    
}