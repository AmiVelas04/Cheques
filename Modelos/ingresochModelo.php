<?php

if ($peticionajax) {
    require_once "../core/modeloMain.php";
} else {
    require_once "./core/modeloMain.php";
}

class ingresoModelo extends modeloMain
{
    protected function ingreso_banco_modelo($datos)
    {
        $sql = modeloMain::conectar()->prepare("Insert into banco(id_banco,nombre,direccion) values(:id,:nombre,:dir)");
        $sql->bindparam(":id", $datos['id']);
        $sql->bindparam(":nombre", $datos['nombre']);
        $sql->bindparam(":dir", $datos['dir']);
        try {
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo "El error al agregar el banco es: " . $e;
        }
    }

    protected function ingreso_cuenta_modelo($datos)
    {
        //echo "<script>console.log('lelga al modelo')</script>";
        $sql = modeloMain::conectar()->prepare("Insert into cuenta(id_cuenta,num_cuenta,saldo,tipo,estado) values(:id,:cuenta,:saldo,:tipo,:estado)");
        $sql->bindparam(":id", $datos['id']);
        $sql->bindparam(":cuenta", $datos['cuenta']);
        $sql->bindparam(":saldo", $datos['saldo']);
        $sql->bindparam(":tipo", $datos['tipo']);
        $sql->bindparam(":estado", $datos['estado']);
        try {
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo "El error al agregar la cuenta es: " . $e;
        }
    }

    protected function ingreso_chequera_modelo($datos)
    {
        echo "<script>console.log('al modelo')</script>";
        $sql = modeloMain::conectar()->prepare("Insert into chequera(id_chequera,Estado,Cantidad) values(:id,:estado,:cant)");
        $sql->bindparam(":id", $datos['id']);
        $sql->bindparam(":estado", $datos['estado']);
        $sql->bindparam(":cant", $datos['cant']);
        try {
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo "El error al agregar el chequera es: " . $e;
        }
    }

    protected function asigna_banco_cuenta_modelo($datos)
    {
        $sql = modeloMain::conectar()->prepare("Insert into banco_cuenta(id_cuenta,id_banco) values(:idc,:idb)");
        $sql->bindparam(":idc", $datos['idc']);
        $sql->bindparam(":idb", $datos['idb']);

        try {
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo "El error al asignar banco  cuenta es: " . $e;
        }
    }
    protected function asigna_cuenta_cheq_modelo($datos)
    {
        $sql = modeloMain::conectar()->prepare("Insert into cuenta_chequ(id_cuenta,id_chequera) values(:idc,:idch)");
        $sql->bindparam(":idc", $datos['idc']);
        $sql->bindparam(":idch", $datos['idch']);

        try {
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {

            echo "El error al asignar cuenta y chequera es: " . $e;
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

    protected function codigo_banco($banco)
    {
        $sql = modeloMain::ejecutar_consulta_simple("Select id_banco from banco where nombre='" . $banco . "'");
        foreach ($sql as $rows) {
            $id = $rows['id_banco'];
        }
        return $id;
    }
    protected function new_codigo_banco()
    {
        $sql = modeloMain::ejecutar_consulta_simple("Select max(id_banco) as id from banco");
        foreach ($sql as $rows) {
            $id = $rows['id'];
            if ($id == null) {
                $id = 1;
            } else {
                $id++;
            }
        }
        return $id;
    }

    protected function codigo_cuenta($cuenta)
    {
        $sql = modeloMain::ejecutar_consulta_simple("Select id_cuenta from cuenta where num_cuenta='" . $cuenta . "'");
        foreach ($sql as $rows) {
            $id = $rows['id_cuenta'];
        }
        return $id;
    }

    protected function new_codigo_cuenta()
    {
        $sql = modeloMain::ejecutar_consulta_simple("Select max(id_cuenta) as id from cuenta");
        foreach ($sql as $rows) {
            $id = $rows['id'];
            if ($id == null) {
                $id = 1;
            } else {
                $id++;
            }
        }
        return $id;
    }

    protected function codigo_chequera($chequera)
    {
        $sql = modeloMain::ejecutar_consulta_simple("Select id_chequera from chequera where ='" . $chequera . "'");
        foreach ($sql as $rows) {
            $id = $rows['id_chequera'];
        }
        return $id;
    }

    protected function new_codigo_chequera()
    {
        $sql = modeloMain::ejecutar_consulta_simple("Select max(id_chequera) as id from chequera");
        foreach ($sql as $rows) {
            $id = $rows['id'];
            if ($id == null) {
                $id = 1;
            } else {
                $id++;
            }
        }
        return $id;
    }

    protected function aceptar_cheque_modelo($datos)
    {

        $id = $datos['num'];
        $nombre = $datos['nom'];
        $canti = $datos['monto'];
        $estado = $datos['estado'];
        $opero = $datos['opero'];
        echo "<script>console.log('" . $id . "," . $nombre . "," . $canti . "," . $estado . "," . $opero . "')</script>";
        $sql = modeloMain::conectar()->prepare("update cheque set monto=:monto, beneficiario=:benef,estado=:est, libero=:lib where id_cheque=:id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":monto", $canti);
        $sql->bindParam(":benef", $nombre);
        $sql->bindParam(":lib", $opero);
        $sql->bindParam(":est", $estado);

        try {
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo "El error al aceptar el cheque es: " . $e;
        }
    }
}
