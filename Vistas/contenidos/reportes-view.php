<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles"><i class="zmdi zmdi-card zmdi-hc-fw"></i>Generacion de reportes <small><?php echo $_SESSION['usuario'];  ?></small></h1>
    </div>
    <p class="lead"></p>
</div>

<div class="container-fluid">
    <ul class="breadcrumb breadcrumb-tabs">

    </ul>
</div>

<!-- Panel nuevo CHEQUES -->
<div class="container-fluid">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; GENERACIÓN DE REPORTES </h3>
        </div>

        <div class="panel-body">

            <form data-form="ver" id="FormularioReporte" name="FormularioReporte" action="<?php echo SERVERURL; ?>ajax/mostrarepoAjax.php" method="POST" class="FormularioReporte" autocomplete="on" enctype="multipart/form-data">
                <fieldset>
                    <legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Seleccionar el reporte </legend>
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-xs-12 col-sm-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Reporte </label>
                                    <select class="form-control" onchange="MostrarDatos(this.value)" id="reportes" name="reportes">
                                        <option value='1'>Reporte de cuentas</option>
                                        <option value='2'>Reporte de liberacion</option>
                                        <option value='3'>Bitacora</option>
                                        <option value='4'>Reporte de moviemientos de cuentas</option>
                                        <option value='5'>Reporte de cheques</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class=" row" id="fechas">
                            <div class="col-xs-12 col-sm-6" id="fecha1">
                                <div class="form-group label-floating">
                                    <label class="control-label">Fecha desde*</label>
                                    <?php $fcha = date("Y-m-d"); ?>
                                    <input class="form-control" type="date" name="fechaini-reg" required="" value="<?php echo $fcha; ?>" min="2021-01-01" max="2030-12-31">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6" id="fecha2">
                                <div class="form-group label-floating">
                                    <label class="control-label">Fecha hasta*</label>
                                    <?php $fcha = date("Y-m-d"); ?>
                                    <input class="form-control" type="date" id="fechafin" name="fechafin-reg" required="" value="<?php echo $fcha; ?>" min="2021-01-01" max="2030-12-31">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12" id="mostrar1">

                            </div>
                        </div>
                </fieldset>

                <p class="text-center" style="margin-top: 20px;">
                    <button type="ver" id="operar" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Mostrar reporte</button>
                </p>
                <div class="RespuestaAjax"></div>
            </form>
        </div>
    </div>
</div>

<script>
    // funciones de reportes
    function MostrarDatos(IdReporte) {
        var reporte = IdReporte;

        if (reporte == 1) {
            //Mostrar datos por fecha y cuenta

            $.ajax({
                type: "POST",
                url: "ajax/reportesAjax.php",
                data: {
                    rep: reporte
                },
                success: function(datos1) {
                    $('#mostrar1').html(datos1);
                    addfechas();
                },
                error: function() {
                    $('datosB').html("")
                }
            });


        } else if (reporte == 2) {
            //Mostrar datos por usuarios 
            var d = document.getElementById("fechas");
            d.style.visibility = "visible";
            $.ajax({
                type: "POST",
                url: "ajax/reportesAjax.php",
                data: {
                    rep: reporte
                },
                success: function(datos1) {
                    $('#mostrar1').html(datos1)
                    addfechas();
                },
                error: function() {
                    $('datosB').html("")
                }
            });

        } else if (reporte == 3) {
            addfechas();
            //no mostrar por ser para bitacora
            /* $(function() {
	$("#modi").prop("disabled",true);
	$("#operar").css('visibility', 'hidden'); 
});*/
        } else if (reporte == 4) {
            //Mostrar moviemientos de cuentas
            var d = document.getElementById("fechas");
            d.style.visibility = "visible";
            $.ajax({
                type: "POST",
                url: "ajax/reportesAjax.php",
                data: {
                    rep: reporte
                },
                success: function(datos1) {
                    addfechas();
                    $('#mostrar1').html(datos1)

                },
                error: function() {
                    $('datosB').html("")
                }
            });
        } else if (reporte == 5) {
            //Mostrar datos por rangos y cuentas
            /* var d= document.getElementById("fechas");
d.style.visibility="hidden";*/
            var div = document.getElementById('fechas');
            while (div.firstChild) {
                div.removeChild(div.firstChild);
            }

            $.ajax({
                type: "POST",
                url: "ajax/reportesAjax.php",
                data: {
                    rep: reporte
                },
                success: function(datos1) {
                    $('#mostrar1').html(datos1)
                },
                error: function() {
                    $('datosB').html("")
                }
            });
        }
    }

    function addfechas() {
        var contenido = "<div class='col-xs-12 col-sm-6' id ='fecha1'> " +
            "<div class='form-group label-floating'>" +
            "<label class='control-label'>Fecha desde*</label>" +
            "<?php $fcha = date('Y-m-d'); ?>" +
            "<input  class='form-control' type='date' id='fechaini' name='fechaini-reg' required='' value='<?php echo $fcha; ?>' min='2021-01-01' max='2030-12-31'> " +
            "</div>" +
            "</div>" +
            "<div class='col-xs-12 col-sm-6' id ='fecha2'>" +
            "<div class='form-group label-floating'>" +
            "<label class='control-label'>Fecha hasta*</label>" +
            "<?php $fcha = date('Y-m-d'); ?>" +
            "<input  class='form-control' type='date' id='fechafin' name='fechafin-reg' required='' value='<?php echo $fcha; ?>' min='2021-01-01' max='2030-12-31'> " +
            "</div>" +
            "</div>";
        $(function() {
            $('#fechas').html(contenido);
        });

    }
</script>