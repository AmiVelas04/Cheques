<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Liberacion de Cheques <small><?php 
	 if (!isset($_SESSION['usuario']))
		{
		session_destroy();
		}
	else
	{
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
	   $usu= $_SESSION['usuario'];?>
<!-- Panel nuevo CHEQUES -->
<div class="container-fluid">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-check-circle"></i> &nbsp; Autorizar cheques</h3>
		</div>

		<div class="panel-body">
			<button type="editar" id="modi" class="btn btn-secondary btn-raised btn-sm" onclick="hola();">
				<h6><i class="zmdi zmdi-edit"></i></h6>
				<h6> Editar Cheque</h6>
			</button>
			<form data-form="save" name="Formulario" id ="Formulario" action="<?php echo SERVERURL; ?>Ajax/ingresochAjax.php" method="POST" class="Formulario" autocomplete="on" enctype="multipart/form-data">
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
											echo $ch->mostrar_chequespen_controlador(); ?>
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

				<button type="save" id="lib" class="btn btn-success btn-raised btn-sm">
					<h4><i class="zmdi zmdi-check-circle"></i></h4>
					<h5> Liberar cheque</h5>
				</button>
				<button type="cancel" id="cancel" class="btn btn-warning btn-raised btn-sm">
					<h4><i class="zmdi zmdi-close-circle"></i></h4>
					<h5> Cancelar Cheque</h5>
				</button>
			</p>
		</div>
		</form>
		<div class="Respuesta1" name="Respuesta1" id="Respuesta1"></div>

		<!-- Boton imprimir -->
		<form action="<?php echo SERVERURL; ?>Ajax/imprimirAjax.php" method="POST" method="GET">
			<input type="text" name="chequeimp" id="chequeimp" style="display:none;"><br>
			<div>
				<input type="submit" value="Imprimir" class="btn btn-info btn-raised btn-sm">

			</div>

		</form>

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

<script>
	function hola() {
		$(function() {
			/*$("#txtmonto").prop('disabled', false);
			$("#txtnombre").prop('disabled', false);*/
			$("#txtmonto").hide();
			$("#txtnombre").hide();
			$("#txtmonto1").show();
			$("#txtnombre1").show();
				});
	}

	$('.Formulario').submit(function(e) {

		e.preventDefault();
		var form = $(this);
		var tipo = form.attr('data-form');
		var accion = form.attr('action');
		var metodo = form.attr('method');
		var respuesta = form.children('#Respuesta1');
		var MsjError = swal('Ocurrio un error');
		var formdata = new FormData(this);
		var textoAlerta;
		if (tipo === 'save') {
			textoAlerta = "¿Desea cambiar el estado del cheque?";
		} else if (tipo === 'delete') {
			textoAlerta = "los datos seran eliminados";
		} else if (tipo === 'update') {
			textoAlerta = "los datos se actualizaran";
		} else {
			textoAlerta = "¿Desear realizar esta operacion?";
		}
		swal({
			title: "¿Seguro?",
			text: textoAlerta,
			type: "question",
			showCancelButton: true,
			confirmButtonText: "Aceptar",
			cancelButtonText: "Cancelar"
		}).then(function() {
			$.ajax({
				type: metodo,
				url: accion,
				data: formdata ? formdata : form.serialize(),
				cache: false,
				contentType: false,
				processData: false,
				xhr: function() {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener("progress", function(evt) {
						if (evt.lengthComputable) {
							var percentComplete = evt.loaded / evt.total;
							percentComplete = parseInt(percentComplete * 100);
							if (percentComplete < 100) {
								respuesta.append('<p class"text-center">Procesando...</p>');
							} else {
								respuesta.html('<p class"text-center"></p>');
							}
						}
					}, false);
					return xhr;
				},
				success: function(data) {
					//alert(data);
					console.log(data);
					respuesta.html(data);
				},
				error: function() {
					//alert("No se pudo");
					respuesta.html(MsjError);
				}
			});
			$("#Formulario")[0].reset();
			return false;
		});
	});
</script>