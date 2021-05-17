<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Creacion de Usuarios <small><?php echo $_SESSION['usuario'] ?></small></h1>
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
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO USUARIO</h3>
		</div>

		<div class="panel-body">

			<form data-form="save" id="Formulario" name="Formulario" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" class="Formulario" autocomplete="on" enctype="multipart/form-data">
				<fieldset>
					<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp;Información del usuario</legend>
					<div class="container-fluid">
						<div class="row">

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombre *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,60}" class="form-control" type="text" name="nombre-reg" required="" maxlength="50">
								</div>
							</div>


							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Usuario *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,60}" class="form-control" type="text" name="usu-reg" required="" maxlength="50">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Contraseña *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ,0-9 ]{8,60}" class="form-control" type="password" name="pass1-reg" required="" maxlength="50">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Contraseña *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ,0-9 ]{8,60}" class="form-control" type="password" name="pass2-reg" required="" maxlength="50">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Monto Máximo *</label>
									<input pattern="[0-9]{1,8}" class="form-control" type="text" name="monto-reg" required="" maxlength="50">
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Nivel *</label>
									<select class="form-control" onchange="" id="lstnivel" name="nivel">
										<option value="1">Auditoria </option>
										<option value="2">Gerencia </option>
										<option value="3">Cajero </option>
									</select>
								</div>
							</div>


						</div>
					</div>
				</fieldset>

				<p class="text-center" style="margin-top: 20px;">
					<button type="save" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
				</p>
				<div class="Respuesta"></div>
			</form>
		</div>
	</div>
</div>

<script>
	$('.Formulario').submit(function(e) {
		console.log("inicar la funcion ajax");
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
			console.log("Ingreso a la funcion");
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
					alert("No se pudo");
					respuesta.html(MsjError);
				}
			});
			$("#Formulario")[0].reset();
			return false;
		});
	});
</script>