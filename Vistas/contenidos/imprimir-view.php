<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Impresion de Cheques <small><?php
                                                                                                        if (!isset($_SESSION['usuario'])) {
                                                                                                            session_destroy();
                                                                                                        } else {
                                                                                                            echo $_SESSION['usuario'];
                                                                                                        }
                                                                                                        ?></small></h1>
    </div>
    <p class="lead"></p>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">

    </ul>
</div>
<?php $niv = $_SESSION['nivel'];
$usu = $_SESSION['usuario']; ?>
<!-- Panel nuevo CHEQUES -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-check-circle"></i> &nbsp; Imprimir cheques</h3>
        </div>

        <div class="panel-body">
            <form data-form="impri" name="Formu" id="Formu" action="<?php echo SERVERURL; ?>Ajax/imprimirAjax.php" method="POST" class="Formu" autocomplete="on" enctype="multipart/form-data">
                <fieldset>
                    <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Selecionar Cheque</legend>
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group label-floating">
                                    <legend><i class="zmdi zmdi-view-list"></i> &nbsp; Lista de cheques</legend>

                                    <div class="form-group label-floating">
                                        <select class="form-control" onchange="MostrarDatosB(this.value);" id="lstcuenta" name="chequenum">
                                            <?php require_once "./Controladores/chequeControlador.php";
                                            $ch = new chequeControlador();
                                            echo $ch->mostrar_chequesgen_controlador(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group label-floating">
                                    <legend><i class="zmdi zmdi-balance"></i> &nbsp; Banco</legend>
                                    <div class="radio radio-primary" id="datosB" name="datosB">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group label-floating">
                                    <legend><i class="zmdi zmdi-money-box"></i> &nbsp; Cuenta</legend>
                                    <div class="radio radio-primary" id="datosC" name="datosC">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group label-floating">
                                    <legend><i class="zmdi zmdi-card"></i> &nbsp; Chequera</legend>
                                    <div class="radio radio-primary" id="datosCh" name="datosCh">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group label-floating">
                                    <legend><i class="zmdi zmdi-money"></i> &nbsp; Monto</legend>
                                    <div class="radio radio-primary" id="datosM" name="datosM">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6">
                                <div class="form-group label-floating">
                                    <legend><i class="zmdi zmdi-account-box-mail"></i> &nbsp; Cheque a nombre de</legend>
                                    <div class="radio radio-primary" id="datosBe" name="datosBe">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="text" name="usuario" id="usuario" value="<?php echo $usu; ?>" style="display:none;"><br>
                    </div>
                </fieldset>
        </div>
        <!-- Boton de liberar -->
        <div>
            <p class="text-center" style="margin-top: 20px;">

                <button type="impri" id="lib" class="btn btn-info btn-raised btn-sm">
                    <h4><i class="zmdi zmdi-check-circle"></i></h4>
                    <h5> Imprimir cheque</h5>
                </button>

            </p>
        </div>
        <input type="text" name="chequeimp" id="chequeimp" style="display:none;"><br>
        </form>
        <div class="Respuestas" name="Respuestas" id="Respuestas"></div>

        <!-- Boton imprimir -->


    </div>

</div>

<?php
// Si esta definida la variable
if (isset($niv) && $niv > 1) {
?>
    <script>
        // En el onload
        $(function() {
            //$("#modi").prop("disabled",true);
            $("#modi").css('visibility', 'hidden');
        });
    </script>
<?php
} else {
    //echo "<script>console.log('".$niv."')</script>";

}
?>