<?php

if ($peticionajax) {

    require_once "../Modelos/calificacionModelo.php";
} else {
    require_once "./Modelos/calificacionModelo.php";
}

class calificacionControlador extends calificacionModelo
{

    public function mostrar_carrera()
    {
        $sql = calificacionControlador::mostrar_carrera_catedratico();
        $cont = "";
        if ($sql->rowCount() >= 1) {
            $datos = $sql->fetchall();
            $cont .= "<option value='0'>Seleccione una Carrera</option>";
            foreach ($datos as $row) {
                $cont .= "<option value='" . $row['id'] . "'>" . $row['carrera'] . "</option>";
            }
        }

        return $cont;
    }


    public function mostrar_grado($carr, $user)
    {


        $sql = calificacionModelo::mostrar_grado_catedratico($carr, $user);
        $val = '"' . $user . '"';
        $cont = "<select class='form-control' id='gradoc'" . trim(" onchange='mostrar_curso(" . $val . ")'>");

        if ($sql->rowCount() >= 1) {
            $cont .= "<option value='0'>Seleccione un Grado</option>";
            $datos = $sql->fetchall();

            foreach ($datos as $row) {
                $cont .= "<option value='" . $row['id'] . "'>" . $row['grado'] . "</option> " . $carr;
            }
            $cont .= "</select>";
            return $cont;
        } else {
            $cont .= "<option value='0'>No tiene grados asignados</option> </select>";
            return $cont;
        }
    }


    public function mostrar_curso($carr, $grad, $usu)
    {

        $sql = calificacionModelo::mostrar_curso_catedratico($carr, $grad, 14);
        $val = '14';

        $cont = "<select class='form-control' id='cursos'" . trim(" onchange='alumnos(" . $val . ")'>");

        if ($sql->rowCount() >= 1) {
            $cont .= "<option value='0'>Seleccione un Curso</option>";
            $datos = $sql->fetchall();

            foreach ($datos as $row) {
                $cont .= "<option value='" . $row['id'] . "'>" . $row['curso'] . "</option>";
            }
        } else {
            $cont .= "<option value='0'>No tiene cursos asignados asignados</option>";
        }
        $cont .= " </select>";
        return $cont;
    }

    public function mostrar_alumnos_curso($carr, $grad, $cur, $usu)
    {
        $sql = calificacionModelo::mostrar_alumnos($carr, $grad, $cur, $usu);
        $cont = "  <div class='table-respon|sive'>
        <table class='table table-hover text-center'>
    <thead>
        <tr>
            <th class='text-center'>Clave</th>
            <th class='text-center'>Nombre Completo</th>
            <th class='text-center'>Fotografia</th>
            <th class='text-center'>Ingresar calificacion</th>
            <th class='text-center'>Agregar Comentario</th>
    
        </tr>
    </thead>
    <tbody>
        <div class='row'>";



        if ($sql->rowCount() >= 1) {
            $datos = $sql->fetchAll();

            foreach ($datos as $row) {
                $ruta = trim(SERVERURL . "addcali/" . $row['codigo'] . "/" . $cur);
                $cont .= "<tr>";
                $cont .= "<td> <i>" . $row['codigo'] . "</i></td>";
                $cont .= "<td> <i class='zmdi zmdi-account'>" . $row['nombre'] . "</i></td>";
                $cont .= "<td> <i>" . $row['edad'] . "</i></td>";
                $cont .= " <td> <a class='btn btn-success estado' name='ingresarcali' id='ingresarcali' href='" . $ruta . "'><i class='zmdi zmdi-plus'>Ingresar</i></a></td>";
                $cont .= "  <td> <a class='btn btn-info' name=''><i class='zmdi zmdi-comment-text'>" . $ruta . "</i></a></td>";
                $cont .= "</tr>";
            }
        } else {
            $cont .= "<tr>";
            $cont .= "<td> <i>No hay datos para mostrar</i></td>";
            $cont .= "<td> <i>No hay datos para mostrar</i></td>";
            $cont .= "<td> <i>No hay datos para mostrar</i></td>";
            $cont .= "<td> <i>No hay datos para mostrar</i></td>";
            $cont .= "<td> <i>No hay datos para mostrar</i></td>";
            $cont .= "</tr>";
        }
        $cont .= "	</div>
        </tbody>
        </table>
        </div>";
        return $cont;
    }

    public function Ingreso_cali_Controlador()
    {
        $curso =  $_POST['curso'];
        $idalum =  $_POST['alumn'];
        $tar1 = $_POST['t1'];
        $tar2 = $_POST['t2'];
        $tar3 = $_POST['t3'];
        $par1 = $_POST['p1'];
        $par2 = $_POST['p2'];
        $ex1 = $_POST['x1'];
        $nota = $_POST['not'];
        $bim = $_POST['bim'];
        $datoscal = [
            'idal' => $idalum,
            'bim' => $bim,
            'ta1' => $tar1,
            'ta2' => $tar2,
            'ta3' => $tar3,
            'p1' => $par1,
            'p2' => $par2,
            'x1' => $ex1,
            'not' => $nota
        ];
        $res = calificacionModelo::Guardar_cali_Modelo($datoscal);

        if ($res->rowCount() >= 1) {
            $alerta = ["Alerta" => "limpiar", "titulo" => "Registro exitoso", "texto" => "La calificacion se registro con exito", "tipo" => "success"];
        } else {

            $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo ingresar la calificacion", "tipo" => "error"];
        }
        return calificacionModelo::Sweet_alert($alerta);
    }
}
