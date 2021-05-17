<?php

if ($peticionajax) {

	require_once "../core/modeloMain.php";
} else {
	require_once "./core/modeloMain.php";
}


class chequeModelo extends modeloMain
{

	protected function new_id_cheque_modelo()
	{
		$sql = modeloMain::ejecutar_consulta_simple("Select max(id_cheque) as id from cheque");

		foreach ($sql as $row) {
			$id = $row['id'];
			if ($id == null) {
				$id = 1;
			} else {
				$id++;
			}
		}
		return $id;
	}

	protected function mostrar_banco_modelo()
	{
		$consul = "Select id_banco as id, nombre as banco from banco";
		$sql = modeloMain::ejecutar_consulta_simple($consul);

		return $sql;
	}

	protected function mostrar_cuenta_modelo($id_banco)
	{
		$consul = "select cu.id_cuenta as id,cu.num_cuenta as cuenta 
    from cuenta cu 
    inner JOIN banco_cuenta b_c ON b_c.ID_CUENTA=cu.ID_CUENTA AND b_c.ID_BANCO=" . $id_banco;
		$sql = modeloMain::ejecutar_consulta_simple($consul);

		return $sql;
	}

	protected function mostrar_chequera_modelo($id_cuenta)
	{
		$consul = "select cheq.ID_CHEQUERA AS id
    from chequera cheq
    inner JOIN cuenta_chequ c_cheq ON c_cheq.ID_CHEQUERA=cheq.ID_CHEQUERA AND c_cheq.ID_CUENTA=" . $id_cuenta;
		$sql = modeloMain::ejecutar_consulta_simple($consul);
		echo "<script>console.log('" . $consul  . "')</script>";
		return $sql;
	}

	protected function ingresar_cheque_modelo($datos)
	{
		$lib = "";
		if ($datos['estado'] == "Generado") {
			$lib = $datos['usuario'];
		}


		$sql = modeloMain::conectar()->prepare("Insert into cheque(id_cheque,fecha,monto,beneficiario,estado,Libero) values(:id,:fecha,:monto,:nombre,:estado,:lib)");
		$sql->bindparam(":id", $datos['id']);
		$sql->bindparam(":fecha", $datos['fecha']);
		$sql->bindparam(":monto", $datos['monto']);
		$sql->bindparam(":nombre", $datos['beneficiario']);
		$sql->bindparam(":estado", $datos['estado']);
		$sql->bindparam(":lib", $lib);
		echo "<script>console.log('" . $datos['id'] . "," . $datos['fecha'] . "," . $datos['beneficiario'] . "," . $datos['estado'] . "')</script>";
		try {
			$sql->execute();
			return $sql;
		} catch (PDOException $e) {

			echo "El error al agregar el cheque es: " . $e->getMessage();
		}
	}

	protected function asigna_cheque_cheq_modelo($datos)
	{
		$sql = modeloMain::conectar()->prepare("Insert into cheque_cheq(id_chequera,id_cheque) values(:idc,:idch)");
		$sql->bindparam(":idc", $datos['idc']);
		$sql->bindparam(":idch", $datos['idch']);
		try {
			$sql->execute();
			return $sql;
		} catch (PDOException $e) {
			echo "El error al agregar el banco es: " . $e;
		}
	}

	protected function mostrar_pendiente_modelo()
	{
		$consul = "SELECT ch.ID_CHEQUE as id  FROM cheque ch WHERE ch.ESTADO= 'Pendiente'";
		$sql = modeloMain::ejecutar_consulta_simple($consul);
		return $sql;
	}

	protected function mostrar_datospen_modelo($idch)
	{
		$consul = "SELECT ban.NOMBRE as nom,cu.NUM_CUENTA as num,che.ID_CHEQUERA as che,ch.MONTO as mon,ch.BENEFICIARIO as ben  FROM cheque ch
INNER JOIN cheque_cheq chc ON ch.ID_CHEQUE = chc.ID_CHEQUE
INNER JOIN chequera che ON che.ID_CHEQUERA=chc.ID_CHEQUERA
INNER JOIN cuenta_chequ cuc ON che.ID_CHEQUERA=cuc.ID_CHEQUERA
INNER JOIN cuenta cu ON cu.ID_CUENTA= cuc.ID_CUENTA
INNER JOIN banco_cuenta bac ON bac.ID_CUENTA=cu.ID_CUENTA
INNER JOIN banco ban ON ban.ID_BANCO= bac.ID_BANCO
WHERE ch.ESTADO='Pendiente' AND ch.ID_CHEQUE=" . $idch;

		$sql = modeloMain::ejecutar_consulta_simple($consul);
		return $sql;
	}

	protected function cant_cheque_modelo($chequera)
	{
		$consul = 'SELECT che.CANTIDAD as cant, COUNT(*) AS hechos  FROM chequera che
	INNER JOIN cheque_cheq chq ON chq.ID_CHEQUERA=che.ID_CHEQUERA
	INNER JOIN cheque ch ON ch.ID_CHEQUE= chq.ID_CHEQUE
	WHERE che.ID_CHEQUERA=' . $chequera;
		$sql = modeloMain::ejecutar_consulta_simple($consul);
		return $sql;
	}




	//-----------------------------------------------------------------------------------------------------------------------------------------------------
}
