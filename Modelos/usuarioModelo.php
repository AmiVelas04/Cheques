<?php

if ($peticionajax) {

    require_once "../core/modeloMain.php";
} else {
    require_once "./core/modeloMain.php";
}

class usuarioModelo extends modeloMain
{
    protected function ingreso_usuario_modelo($datos)
    {
        //echo"<script>console.log('codigo de nuevo cheque: ".$datos[0]."')</script>";
        $sql = modeloMain::conectar()->prepare("Insert into usuario(id_usu,nombre,usuario,pass,nivel,monto) values(:id,:nombre,:usu,:pass,:nivel,:monto)");
        $sql->bindparam(":id", $datos['codigo']);
        $sql->bindparam(":nombre", $datos['nombre']);
        $sql->bindparam(":usu", $datos['usuario']);
        $sql->bindparam(":pass", $datos['pass']);
        $sql->bindparam(":nivel", $datos['nivel']);
        $sql->bindParam(":monto", $datos['monto']);

        try {
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo "El error al ingresar usuariol banco es: " . $e;
        }
    }

    protected function id_usuario_modelo()
    {
        $sql = modeloMain::ejecutar_consulta_simple("Select max(id_usu) as id from usuario");
        $cod = 0;
        $id = 0;
        foreach ($sql as $rows) {
            $id = $rows['id'];
        }
        if ($id == null) {
            $cod = 1;
        } else {
            $cod = $id + 1;
        }

        return $cod;
    }
}
