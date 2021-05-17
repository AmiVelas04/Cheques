<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-card zmdi-hc-fw"></i>Generacion de chequeras <small><?php echo $_SESSION['usuario'] ?></small></h1>
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
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA CHEQUERA</h3>
		</div>

		<div class="panel-body">

			<form data-form="save" id="Formulario" name="Formulario" action="<?php echo SERVERURL; ?>ajax/ingresochAjax.php" method="POST" class="Formulario" autocomplete="on" enctype="multipart/form-data">
				<fieldset>
					<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Información del cheque</legend>
					<div class="container-fluid">
						<div class="row">

							<div class="col-xs-12 col-sm-12">
								<div class="form-group label-floating">
									<legend><i class="zmdi zmdi-balance"></i> &nbsp; Seleccionar Banco</legend>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optnewB" id="Banco1" value="0" onchange="mostrarBanco(this.value);">
											<i class="zmdi zmdi-file-plus"></i> &nbsp; Nuevo
										</label>
										<label>
											<input type="radio" name="optnewB" id="Banco2" value="1" onchange="mostrarBanco(this.value);">
											<i class="zmdi zmdi-filter-list"></i> &nbsp; Existente
										</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-6">
								<div class="form-group label-floating">
									<?php require_once "./Controladores/chequeControlador.php";
									$gen = new chequeControlador(); ?>
									<div class="col-xs-12 col-sm-12">
										<label class="control-label">Banco *</label>
										<select class="form-control" onchange="mostrardatosC(this.value);" id="lstbanco" name="banco" style="display:none">
											<?php echo $gen->mostrar_banco_controlador();
											?>
										</select>
									</div>
									<div class=" col-xs-12 col-sm-12"">
                                             <input class=" form-control" id="txtbanco" type="text" name="nombreBanc-reg" maxlength="100" style="display:flex">
									</div>
									<br>
									<br>
									<br>
									<div class=" col-xs-12 col-sm-12"">
											 <label class=" control-label" name="lbldirec" style="display:none">Direccion *</label>
										<input class="form-control" id="txtdirec" type="text" name="direcBanc-reg" maxlength="100" style="display:flex">
									</div>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-6">
								<div class="form-group label-floating">
									<legend><i class="zmdi zmdi-balance-wallet"></i> &nbsp; Seleccionar Cuenta</legend>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optcuenta" id="cuenta1" value="0" onchange="mostrarCuenta(this.value)">
											<i class="zmdi zmdi-file-plus"></i> &nbsp; Nuevo
										</label>
										<label>
											<input type="radio" name="optcuenta" id="cuenta2" value="1" onchange="mostrarCuenta(this.value)">
											<i class="zmdi zmdi-filter-list"></i> &nbsp; Existente
										</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6 col-sm-6">
								<div class="form-group label-floating">

									<div class="col-xs-12 col-sm-12">
										<label class="control-label">Cuenta *</label>
										<select class="form-control" onchange="" id="lstcuenta" name="cuenta" style="display:none">
										</select>
									</div>
									<div class="col-xs-12 col-sm-12">
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,60}" class="form-control" id="txtcuenta" type="text" name="num_cue-reg" maxlength="100" style="display:flex">
									</div>
									<br>
									<br>
									<br>
									<div class="col-xs-12 col-sm-12">
										<label class="control-label" id="lblsaldo">Saldo *</label>
										<input pattern="[-+,0-9.]{1,10}" step=".01" class="form-control" id="txtsaldo" type="text" name="saldo-reg" maxlength="100" style="display:flex">
									</div>
									<br>
									<br>
									<br>

									<div class="col-xs-12 col-sm-12">
										<label class="control-label" id="lbltipo">Tipo *</label>
										<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,60}" class="form-control" id="txttipo" type="text" name="tipo-reg" maxlength="100" style="display:flex">
									</div>

								</div>
							</div>
						</div>


						<div class="col-xs-12 col-sm-12">
							<div class="form-group label-floating">
								<legend><i class="zmdi zmdi-card"></i> &nbsp; Seleccionar Chequera</legend>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="optcheq" id="optnewC" value="0" onchange="mostrarChequera(this.value)">
										<i class="zmdi zmdi-file-plus"></i> &nbsp; Nueva
									</label>
									<label>
										<input type="radio" name="optcheq" id="opttextC" value="1" onchange="mostrarChequera(this.value)">
										<i class="zmdi zmdi-filter-list"></i> &nbsp; Existente
									</label>
								</div>
							</div>
						</div>


						<div class="col-xs-6 col-sm-6 " hidden="true">
							<div class="form-group label-floating">
								<label class="control-label">Chequera *</label>
								<select class="form-control" onchange="" id="lstcheq" name="chequera" style="display:none">
									<?php echo ""; // echo $gen->mostrar_banco_controlador();
									?>
								</select>
								<input class="form-control" id="txtcheq" type="text" name="numCheq-reg" maxlength="100" style="display:none">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6">
							<div class="form-group label-floating">
								<label class="control-label">Cantidad de cheques: *</label>
								<input class="form-control" type="text" id="txtCantCheq" name="CantCheq-reg" maxlength="3">
							</div>
						</div>

					</div>


				</fieldset>
				<p class="text-center" style="margin-top: 20px;">
					<button type="save" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Generar</button>
				</p>
				<div class="Respuesta"></div>
			</form>
		</div>
	</div>
</div>

<script>
	$('.Formulario').submit(function(e) {
		e.preventDefault();
		var form = $(this);
		var tipo = form.attr('data-form');
		var accion = form.attr('action');
		var metodo = form.attr('method');
		var respuesta = form.children('.Respuesta');
		var MsjError = swal('Ocurrio un error');
		var formdata = new FormData(this);

		var textoAlerta;
		if (tipo === 'save') {
			textoAlerta = "los datos serán almacenados";
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
					//	alert(data);

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