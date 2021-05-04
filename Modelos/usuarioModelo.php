<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
}
else
{
require_once "./core/modeloMain.php";
}

Class usuarioModelo extends modeloMain
{
    protected function ingreso_usuario_modelo($datos)
    {
        $sql=modeloMain::conectar()->prepare("Insert into usuario(id_usu,nombre,usuario,pass,nivel) values(:id,:nombre,:usu,:pass,:nivel)");
		$sql->bindparam(":id",$datos['id']);
        $sql->bindparam(":nombre",$datos['nombre']);
		$sql->bindparam(":usu",$datos['usu']);
        $sql->bindparam(":pass",$datos['pass']);
        $sql->bindparam(":nivel",$datos['nivel']);

        try
        {
		    $sql->execute();
		    return $sql;
	    }
	    catch (PDOException $e)
	    {
		    echo "El error al agregar el banco es: " .$e;
	    }   

    }

    protected function id_usuario_modelo()
    {
        $sql=modeloMain::ejecutar_consulta_simple("Select max(id_usu) from usuario'");
        foreach($sql as $rows)
        {
            $id=$rows['id_tel'];
        }
        if ($id==null)
        {
            $id=1;
        }
        else
        {
            $id++;
        }
        return $id;

    }
}
