<?php
if (true) {
    require_once "../core/modeloMain.php";
} else {
    require_once "./core/modeloMain.php";
}

class mostrarepoModelo extends modeloMain
{

    protected function repor1($datos)
    {
        $fechai = $datos['fechai'];
        $fechaf = $datos['fechaf'];
        $cuenta = $datos['cuenta'];
        $consul = "SELECT ch.ID_CHEQUE as id,date_format(ch.FECHA,'%d/%M/%Y') as fecha,ch.MONTO as monto,ch.BENEFICIARIO as benef FROM cheque ch
    INNER JOIN cheque_cheq chc ON chc.ID_CHEQUE=ch.ID_CHEQUE
    INNER JOIN chequera cheq ON cheq.ID_CHEQUERA= chc.ID_CHEQUERA
    INNER JOIN cuenta_chequ cch ON cch.ID_CHEQUERA=cheq.ID_CHEQUERA
    INNER JOIN cuenta cu ON cu.ID_CUENTA = cch.ID_CUENTA
    WHERE cu.ID_CUENTA='" . $cuenta . "' AND ch.FECHA>='" . $fechai . "' AND ch.FECHA<='" . $fechaf . "'";
        //  echo "<script>alert('" . $consul . "')</script>";
        $sql = modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
    }

    protected function repor2($datos)
    {
        $fechai = $datos['fechai'];
        $fechaf = $datos['fechaf'];
        $usu = $datos['usuario'];
        $liber = "";
        if ($usu == 1) {
            $liber = "Gerencia";
        } elseif ($usu == 2) {
            $liber = "Auditoria";
        } elseif ($usu == 3) {
            $liber = "Sin liberacion";
        }
        $consul = "SELECT ch.ID_CHEQUE,date_format(ch.FECHA,'%d/%M/%Y'),ch.MONTO,ch.BENEFICIARIO FROM cheque ch
    WHERE  ch.FECHA>='" . $fechai . "' AND ch.FECHA<='" . $fechaf . "' and ch.LIBERO='" . $liber . "'";
        $sql = modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
    }

    protected function repor3($datos)
    {
    }

    protected function repor4($cuenta)
    {
        $consul = "SELECT cu.ID_CUENTA AS id,cu.NUM_CUENTA AS num,cu.TIPO AS tipo from   cheque ch
    INNER JOIN cheque_cheq che ON che.ID_CHEQUE=ch.ID_CHEQUE
    INNER JOIN chequera cheq ON cheq.ID_CHEQUERA=che.ID_CHEQUERA
    INNER JOIN cuenta_chequ cch ON cch.ID_CHEQUERA=cheq.ID_CHEQUERA
    INNER JOIN cuenta cu ON cu.ID_CUENTA= cch.ID_CUENTA
    WHERE cu.ID_CUENTA=" . $cuenta;
        $sql = modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
    }

    protected function repor5($datos)
    {
        $Min = $datos['Mini'];
        $Max = $datos['Maxi'];
        $cuenta = $datos['cuenta'];
        $consul = "SELECT ch.ID_CHEQUE,ch.FECHA,ch.MONTO,ch.MONTO,ch.BENEFICIARIO FROM cheque ch
    INNER JOIN cheque_cheq chc ON chc.ID_CHEQUE=ch.ID_CHEQUE
    INNER JOIN chequera cheq ON cheq.ID_CHEQUERA= chc.ID_CHEQUERA
    INNER JOIN cuenta_chequ cch ON cch.ID_CHEQUERA=cheq.ID_CHEQUERA
    INNER JOIN cuenta cu ON cu.ID_CUENTA = cch.ID_CUENTA
    WHERE cu.ID_CUENTA=" . $cuenta . " AND ch.MONTO>=" . $Min . " AND ch.MONTO<=" . $Max;
        $sql = modeloMain::ejecutar_consulta_simple($consul);
        return $sql;
    }
}
