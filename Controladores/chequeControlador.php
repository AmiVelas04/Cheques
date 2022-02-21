<?php

if ($peticionajax) {

    require_once "../Modelos/chequeModelo.php";
    require_once "../vistas/modulos/script.php";
} else {
    require_once "./Modelos/chequeModelo.php";
    require_once "./vistas/modulos/script.php";
}
//controlador para agregar alumno

class chequeControlador extends chequeModelo
{
    public function agregar_cheque_controlador($datos)
    {
        $idbita = chequeModelo::new_id_bitacora_modelo();
        $detalle = "Intento de generacion de cheque por " . $datos['usuario'];
        $fecha = date("Y/m/d H:m:s");
        $valores =
            [
                'idbita' => $idbita,
                'deta' => $detalle,
                'fecha' => $fecha
            ];
        echo "<script>console.log('" . $idbita . "," . $detalle . "," . $fecha . "')</script>";
        $bita = chequeModelo::ingreso_bitacora($valores);

        $idch = chequeModelo::new_id_cheque_modelo();
        $idchequera = $datos['chequera'];
        $stado = $datos['estado'];
        $monto = $datos['monto'];

        $datoscheq = [
            'id' => $idch,
            'fecha' => $datos['fecha'],
            'monto' => $datos['monto'],
            'beneficiario' => $datos['nombre'],
            'estado' => $stado,
            'usuario'  => $datos['usuario'],
        ];
        // echo "<script>console.log('" . $idch . $datos['fecha'] . "," . $datos['monto'] . "," . $datos['nombre'] . "')</script>";
        $conteo = chequeModelo::cant_cheque_modelo($idchequera);
        $chdispo = $conteo->fetchAll();
        foreach ($chdispo as $lista) {
            $chpermi = $lista['cant'];
            $chhecho = $lista['hechos'];
        }

        if ($chpermi <= $chhecho) {
            $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No existen cheques disponibles para esta chequera", "tipo" => "error"];
            //echo"<script>console.log('".$chpermi.".".$chhecho."')</script>";
        } else {

            $res1 = chequeModelo::ingresar_cheque_modelo($datoscheq);

            if ($res1->RowCount() >= 1) {
                $datosasignachequ =
                    [
                        'idch' => $idch,
                        'idc' => $idchequera
                    ];
                $res2 = chequeModelo::asigna_cheque_cheq_modelo($datosasignachequ);

                if ($res2->RowCount() >= 1) {
                    if ($stado == 'Pendiente' && $monto >= 25000) {
                        $alerta = ["Alerta" => "limpiar", "titulo" => "Exito", "texto" => "Cheque registrado con exito, pero pendiente de liberacion de Gerencia ", "tipo" => "success"];
                    } elseif ($stado == 'Pendiente' && $monto >= 5000) {
                        $alerta = ["Alerta" => "limpiar", "titulo" => "Exito", "texto" => "Cheque registrado con exito, pero pendiente de liberacion de Auditorria ", "tipo" => "success"];
                    } else {
                        $alerta = ["Alerta" => "limpiar", "titulo" => "Exito", "texto" => "Cheque registrado con exito, listo para impresión ", "tipo" => "success"];
                    }
                } else {
                    $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo registrar/asignar el cheque", "tipo" => "error"];
                }
            } else {
                $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo registrar el cheque", "tipo" => "error"];
            }
        }
        return chequeModelo::Sweet_alert($alerta);
    }

    //Mostrar los bancos ingresado

    public function mostrar_banco_controlador()
    {
        $sql = chequeModelo::mostrar_banco_modelo();
        $conte = "";
        $num = 0;
        if ($sql->rowcount() >= 1) {
            $datos = $sql->fetchall();
            $conte .= "<option value='0'>Seleccione un banco</option>";
            foreach ($datos as $row) {
                $num++;
                $conte .= "<option value='" . $row['id'] . "'>" . $row['banco'] . "</option>";
            }
        }
        return $conte;
    }


    //Mostrar las cuentas asignadas al banco seleccionado
    public function mostrar_cuenta_controlador($idbanco)
    {
        //echo "<script>console.log('llga al controlador')</script>";
        $sql = chequeModelo::mostrar_cuenta_modelo($idbanco);
        $conte = "";
        $num = 0;
        if ($sql->rowcount() >= 1) {
            $datos = $sql->fetchall();
            $conte .= "
        <option value='0'> Seleccione una cuenta</option>";
            foreach ($datos as $row) {
                $num++;
                $conte .= "<option value='" . $row['id'] . "'>" . $row['cuenta'] . "</option>";
            }
        }
        return $conte;
    }

    //mostrar las chequeras disponibles
    public function mostrar_chequera_controlador($idcuenta)
    {
        echo "<script>console.log('llega al archivo acontrolador')</script>";
        $sql = chequeModelo::mostrar_chequera_modelo($idcuenta);
        $conte = "";
        $num = 0;
        if ($sql->rowcount() >= 1) {
            $datos = $sql->fetchall();
            $conte .= "   
    <option value='0'>Seleccione la chequera</option>";
            foreach ($datos as $row) {
                $num++;
                $conte .= "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
            }
        }
        return $conte;
    }

    public function mostrar_chequespen_controlador()
    {
        $sql = chequeModelo::mostrar_pendiente_modelo();
        $conte = "";
        $num = 0;
        if ($sql->rowcount() >= 1) {
            $datos = $sql->fetchall();
            $conte .= "   
    <option value='0'>Seleccione el número de cheque</option>";
            foreach ($datos as $row) {
                $num++;
                $conte .= "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
            }
        }
        return $conte;
    }

    public function mostrar_chequesgen_controlador()
    {
        $sql = chequeModelo::mostrar_generado_modelo();
        $conte = "";
        $num = 0;
        if ($sql->rowcount() >= 1) {
            $datos = $sql->fetchall();
            $conte .= "   
    <option value='0'>Seleccione el número de cheque</option>";
            foreach ($datos as $row) {
                $num++;
                $conte .= "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
            }
        }
        return $conte;
    }

    public function mostrar_datosch_controlador($id, $dato)
    {
        $sql = chequeModelo::mostrar_datospen_modelo($id);
        if ($sql->rowcount() >= 1) {
            $datos = $sql->fetchall();
            foreach ($datos as $row) {
                if ($dato == 1) {
                    $conte = '<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtbanc" type="text" name="txtbanc" value="' . $row['nom'] . '" disabled="false" required="" maxlength="100" style="display:flex">';
                } else if ($dato == 2) {
                    $conte = '<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtcuenta" type="text" name="txtcuenta" value="' . $row['num'] . '" disabled required="false" maxlength="100" style="display:flex">';
                } else if ($dato == 3) {
                    $conte = '<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtchequera" type="text" name="txtchequera" value="' . $row['che'] . '"disabled required="false" maxlength="100" style="display:flex">';
                } else if ($dato == 4) {
                    $conte = '<input pattern="[0-9,.]{1,60}" class="form-control" id ="txtmonto" type="text" name="txtmonto" value="' . $row['mon'] . '"required=""  disabled="false" maxlength="100" style="display:flex">';
                    $conte .= '<input pattern="[0-9,.]{1,60}" class="form-control" id ="txtmonto1" type="text" name="txtmonto1" value="' . $row['mon'] . '"required="" maxlength="100" style="display:none">';
                } else if ($dato == 5) {
                    $conte = '<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtnombre" type="text" name="txtnombre" value="' . $row['ben'] . '" required="" disabled="false" maxlength="100" style="display:flex">';
                    $conte .= '<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id ="txtnombre1" type="text" name="txtnombre1" value="' . $row['ben'] . '" required=""  maxlength="100" style="display:none">';
                }
            }
        } else {
            $conte = 'No existe este dato';
        }
        return $conte;
    }
}
