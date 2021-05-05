<?php 

 if($peticionajax) {

require_once "../core/modeloMain.php";
	
}
else
{
require_once "./core/modeloMain.php";

}

public class ingresochModelo extends modeloMain
{
    protected function ingreso_banco_modelo($datos)
    {
		$sql=modeloMain::conectar()->prepare("Insert into banco(id_banco,nombre,direccion) values(:id,:nombre,:dir)");
		$sql->bindparam(":id",$datos['id']);
        $sql->bindparam(":nombre",$datos['nombre']);
		$sql->bindparam(":dir",$datos['dir']);
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

    protected function ingreso_cuenta_modelo($datos)
    {
        $sql=modeloMain::conectar()->prepare("Insert into cuenta(id_cuenta,num_cuenta,saldo,tipo,estado) values(:id,:cuenta,:saldo,:tipo,:estado)");
		$sql->bindparam(":id",$datos['id']);
        $sql->bindparam(":cuenta",$datos['cuenta']);
		$sql->bindparam(":saldo",$datos['saldo']);
        $sql->bindparam(":tipo",$datos['tipo']);
		$sql->bindparam(":estado",$datos['estado']);
        try
        {
		    $sql->execute();
		    return $sql;
	    }
	    catch (PDOException $e)
	    {
		    echo "El error al agregar la cuenta es: " .$e;
	    }  

    }

    protected function ingreso_chequera_modelo($datos)
    {
        $sql=modeloMain::conectar()->prepare("Insert into chequera(id_chequera,Estado,Cantidad) values(:id,:cheq,:cant)");
		$sql->bindparam(":id",$datos['id']);
        $sql->bindparam(":nombre",$datos['cheq']);
		$sql->bindparam(":dir",$datos['cant']);
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

    protected function asigna_banco_cuenta_modelo()
    {
        $sql=modeloMain::conectar()->prepare("Insert into banco_cuenta(id_cuenta,id_banco) values(:idc,:idb)");
		$sql->bindparam(":idc",$datos['idc']);
        $sql->bindparam(":idb",$datos['idb']);
		
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
    protected function asigna_cuenta_cheq_modelo()
    {
        $sql=modeloMain::conectar()->prepare("Insert into cuenta_cheq(id_cuenta,id_cheque) values(:idc,:idb)");
		$sql->bindparam(":idc",$datos['idc']);
        $sql->bindparam(":idb",$datos['idb']);
		
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

    protected function asigna_cheque_cheq_modelo()
    {
        $sql=modeloMain::conectar()->prepare("Insert into cheq_cheq(id_chequera,id_cheque) values(:idc,:idb)");
		$sql->bindparam(":idc",$datos['idc']);
        $sql->bindparam(":idb",$datos['idb']);
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

    protected function codigo_banco($banco){
        $sql=modeloMain::ejecutar_consulta_simple("Select id_banco from banco where nombre='" . $banco . "'");
        foreach($sql as $rows)
        {
            $id=$rows['id_banco'];
        }
        return $id;
    }
    protected function new_codigo_banco(){
        $sql=modeloMain::ejecutar_consulta_simple("Select max(id_banco) from banco");
        foreach($sql as $rows)
        {
            $id=$rows['id_banco'];
            if($id==null)
            {
                $id=1;
            }
            else
            {
                $id++;
            }
        }
        return $id;
    }

    protected function codigo_cuenta($cuenta){
        $sql=modeloMain::ejecutar_consulta_simple("Select id_cuenta from cuenta where num_cuenta='" . $cuenta . "'");
        foreach($sql as $rows)
        {
            $id=$rows['id_cuenta'];
        }
        return $id;
    }

    protected function new_codigo_cuenta(){
        $sql=modeloMain::ejecutar_consulta_simple("Select max(id_cuenta) from cuenta");
        foreach($sql as $rows)
        {
            $id=$rows['id_cuenta'];
            if($id==null)
            {
                $id=1;
            }
            else
            {
                $id++;
            }
        }
        return $id;
    }

    protected function codigo_chequera($chequera){
        $sql=modeloMain::ejecutar_consulta_simple("Select id_chequera from chequera where ='" . $chequera . "'");
        foreach($sql as $rows)
        {
            $id=$rows['id_chequera'];
        }
        return $id;
    }
    
    protected function new_codigo_chequera($chequera){
        $sql=modeloMain::ejecutar_consulta_simple("Select max(id_chequera) from chequera");
        foreach($sql as $rows)
        {
            $id=$rows['id_chequera'];
            if($id==null)
            {
                $id=1;
            }
            else
            {
                $id++;
            }
        }
        return $id;
    }


}