<?php
if ($peticionajax) {

    require_once "../Modelos/ingresochModelo.php";
    require_once "../vistas/modulos/script.php";
} else {
    require_once "./Modelos/ingresochModelo.php";
    require_once "./vistas/modulos/script.php";
}
//controlador para agregar  chequeras
class ingresochControlador extends ingresoModelo
{

    public function ingreso_banco_controlador($datos)
    {
        $idBanc = ingresoModelo::new_codigo_banco();
        $nombreban = ($datos['NomBanc']);
        $direccion = ($datos['DirBanc']);

        $datosban = [
            'id' => $idBanc,
            'nombre' => $nombreban,
            'dir' => $direccion
        ];
        $res1 = ingresoModelo::ingreso_banco_modelo($datosban);
        if ($res1->rowCount() >= 1) {
            $codcu = ingresoModelo::new_codigo_cuenta();

            $num_cue = ($datos['NumCue']);
            $saldo = ($datos['Saldo']);
            $tipo = ($datos['Tipo']);
            $est = 'Activo';
            $datoscue = [
                'id' => $codcu,
                'cuenta' => $num_cue,
                'saldo' => $saldo,
                'tipo' => $tipo,
                'estado' => $est
            ];

            $res2 = ingresoModelo::ingreso_cuenta_modelo($datoscue);
            if ($res2->RowCount() >= 1) {
                $cant = ($datos['Cant']);
                $datosAsignaBC = [
                    'idb' => $idBanc,
                    'idc' => $codcu
                ];

                $res3 = ingresomodelo::asigna_banco_cuenta_modelo($datosAsignaBC);
                if ($res3->RowCount() >= 1) {
                    $idch = ingresomodelo::new_codigo_chequera();
                    $estch = "Activo";
                    $datoschequ = [
                        'id' => $idch,
                        'cant' => $cant,
                        'estado' => $estch
                    ];
                    $res4 = ingresomodelo::ingreso_chequera_modelo($datoschequ);
                    if ($res4->RowCount() >= 1) {
                        $datosasignaCCh = [
                            "idc" => $codcu,
                            'idch' => $idch
                        ];
                        $res5 = ingresomodelo::asigna_cuenta_cheq_modelo($datosasignaCCh);
                        if ($res5->RowCount() >= 1) {
                            $alerta = ["Alerta" => "limpiar", "titulo" => "Exito", "texto" => "Datos ingresados con exito", "tipo" => "success"];
                        } else {
                            $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo asignar la chequera", "tipo" => "error"];
                        }
                    } else {
                        $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo ingresar la chequera", "tipo" => "error"];
                    }
                } else {
                    $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo asignar la cuenta", "tipo" => "error"];
                }
            } else {
                $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo ingresar la cuenta", "tipo" => "error"];
            }
        } else {
            $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo ingresar el banco", "tipo" => "error"];
        }
        return ingresoModelo::Sweet_alert($alerta);
    }

    public function ingreso_cuenta_controlador($datos)
    {
        echo "<script>console.log('" . $datos['IdBanc'] . $datos['NumCue'] . $datos['NumCue'] . $datos['Tipo'] . $datos['Cant'] . "')</script>";
        $idBanc = $datos['IdBanc'];
        $cod = ingresomodelo::new_codigo_cuenta();
        $num = $datos['NumCue'];
        $saldo = $datos['Saldo'];
        $tipo = $datos['Tipo'];
        $cant = $datos['Cant'];
        $datoscu = [
            "id" => $cod,
            "cuenta" => $num,
            "saldo" => $saldo,
            "tipo" => $tipo,
            "estado" => "Activa"
        ];
        $res1 = ingresomodelo::ingreso_cuenta_modelo($datoscu);
        if ($res1->RowCount() >= 1) {
            $datosAsignaBC = [
                'idb' => $idBanc,
                'idc' => $cod
            ];
            $res2 = ingresomodelo::asigna_banco_cuenta_modelo($datosAsignaBC);
            if ($res2->RowCount() >= 1) {
                $idch = ingresomodelo::new_codigo_chequera();
                $datoschequ = [
                    'id' => $idch,
                    'cant' => $cant
                ];
                $res3 = ingresomodelo::ingreso_chequera_modelo($datoschequ);
                if ($res3->RowCount() >= 1) {
                    $datosasignaCCh = [
                        "idc" => $cod,
                        'idch' => $idch
                    ];
                    $res4 = ingresomodelo::asigna_cuenta_cheq_modelo($datosasignaCCh);
                    if ($res4->RowCount() >= 1) {
                        $alerta = ["Alerta" => "limpiar", "titulo" => "Exito", "texto" => "Datos ingresados con exito", "tipo" => "success"];
                    } else {
                        $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo asignar la chequera", "tipo" => "error"];
                    }
                } else {
                    $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo ingresar la chequera", "tipo" => "error"];
                }
            } else {
                $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo asignar la cuenta", "tipo" => "error"];
            }
        } else {
            $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo ingresar la cuenta", "tipo" => "error"];
        }
        return ingresoModelo::Sweet_alert($alerta);
    }


    public function ingreso_chequera_controlador($datos)
    {
        echo "<script>console.log('lelga al controlador')</script>";
        $cant = $datos['Cant'];
        $cod = $datos['IdCuen'];
        $estado = $datos['Est'];
        $idch = ingresomodelo::new_codigo_chequera();
        $datoschequ = [
            'id' => $idch,
            'cant' => $cant,
            'estado' => $estado
        ];
        $res3 = ingresomodelo::ingreso_chequera_modelo($datoschequ);
        if ($res3->RowCount() >= 1) {
            $datosasignaCCh = [
                "idc" => $cod,
                'idch' => $idch
            ];
            $res4 = ingresomodelo::asigna_cuenta_cheq_modelo($datosasignaCCh);
            if ($res4->RowCount() >= 1) {
                $alerta = ["Alerta" => "limpiar", "titulo" => "Exito", "texto" => "Datos ingresados con exito", "tipo" => "success"];
            } else {
                $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo asignar la chequera", "tipo" => "error"];
            }
        } else {
            $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo ingresar la chequera", "tipo" => "error"];
        }
        return ingresoModelo::Sweet_alert($alerta);
    }

    public function asigna_chequera_controlador()
    {
    }

    public function aceptar_cheque_controlador($datos)
    {
        $estado = "Generado";

        $envio = [
            'num' => $datos['num'],
            'nom' => $datos['nom'],
            'monto' => $datos['monto'],
            'estado' => 'Generado',
            'opero' => $datos['usuario']
        ];
        $res = ingresoModelo::aceptar_cheque_modelo($envio);
        if ($res->rowCount() >= 1) {
            $alerta = ["Alerta" => "limpiar", "titulo" => "Exito", "texto" => "Cheque liberado con exito", "tipo" => "success"];
        } else {
            $alerta = ["Alerta" => "simple", "titulo" => "Ocurrio un error", "texto" => "No se pudo liberar el cheque", "tipo" => "error"];
        }
        echo "<script>console.log('llega a controlador')</script>";
        return ingresoModelo::Sweet_alert($alerta);
    }
}
