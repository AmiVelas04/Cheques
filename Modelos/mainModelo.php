<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}


class mainModelo extends modeloMain
{
    protected function mostrar_cheques_pen_modelo()
    {
        $consul="Select count(*) as todo from cheque where estado='Pendiente'";
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
    }


    protected function mostrar_cheques_hech_modelo()
    {
        $consul="Select count(*) as todo from cheque";
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
    }

    protected function buscar_actividades_modelo($pos)
    {
        $consul="SELECT id_cheque as id, date_format(ch.FECHA,'%d/%m/%Y') as fecha, Monto, Beneficiario,Estado FROM cheque ch   GROUP BY ch.ID_CHEQUE desc  LIMIT ".$pos;
        $sql=modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
    }

    }


