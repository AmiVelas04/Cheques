<?php 
 if(true) {
require_once "../core/modeloMain.php";
	}
else
{
require_once "./core/modeloMain.php";
}

class imprimirModelo extends modeloMain
{

protected function datos_cheque_modelo($idch)
{
    $consul="SELECT ban.NOMBRE as nom,cu.NUM_CUENTA as num,che.ID_CHEQUERA as che,ch.MONTO as mon,ch.BENEFICIARIO as ben,DATE_FORMAT(ch.FECHA,'%d/%m/%Y') AS fech,ch.ID_CHEQUE AS cheq
    FROM cheque ch
    INNER JOIN cheque_cheq chc ON ch.ID_CHEQUE = chc.ID_CHEQUE
    INNER JOIN chequera che ON che.ID_CHEQUERA=chc.ID_CHEQUERA
    INNER JOIN cuenta_chequ cuc ON che.ID_CHEQUERA=cuc.ID_CHEQUERA
    INNER JOIN cuenta cu ON cu.ID_CUENTA= cuc.ID_CUENTA
    INNER JOIN banco_cuenta bac ON bac.ID_CUENTA=cu.ID_CUENTA
    INNER JOIN banco ban ON ban.ID_BANCO= bac.ID_BANCO
    WHERE ch.ESTADO='Pendiente' AND ch.ID_CHEQUE=".$idch;
	$sql=modeloMain::ejecutar_consulta_simple($consul);
	return $sql;
}
}