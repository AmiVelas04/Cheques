<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-collection-text zmdi-hc-fw"></i>Generacion de cheques <small><?php echo $_SESSION['usuario'];
																													$usu = $_SESSION['usuario'];  ?></small></h1>
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
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CHEQUE </h3>
		</div>

		<div class="panel-body">

			<form data-form="save" id="FormularioAjax" name="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/chequesAjax.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data">
				<fieldset>
					<legend><i class="zmdi zmdi-collection-text"></i> &nbsp; Información del cheque</legend>
					<div class="container-fluid">
						<div class="row">

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<?php require_once "./Controladores/chequeControlador.php";
									$gen = new chequeControlador(); ?>
									<label class="control-label">Banco</label>
									<select class="form-control" onchange="mostrar_cuenta(this.value)" id="banco" name="banco">
										<?php echo $gen->mostrar_banco_controlador(); ?>
									</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label" ">Cuenta</label>
										<select class=" form-control" onchange="mostrar_chequera(this.value,banco.value)" id="cuent" name="cuent">

										</select>

								</div>
							</div>

							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label" ">Chequera</label>
										<select class=" form-control" onchange="" id="chequer" name="chequer">
										</select>
								</div>
							</div>

							<div class="col-xs-12 col-sm-6">

								<div class="form-group label-floating">
									<label class="control-label">Fecha *</label>
									<?php $fcha = date("Y-m-d"); ?>
									<input class="form-control" type="date" name="fecha-reg" required="" value="<?php echo $fcha; ?>" min="<?php echo $fcha; ?>" max="2030-12-31">
								</div>
							</div>


							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Monto *</label>
									<input pattern="[0-9]{1,7}" class="form-control" type="text" name="monto-reg" required="" maxlength="30">
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Extendido A: *</label>
									<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,60}" class="form-control" type="text" name="nombre-reg" required="" maxlength="50">
								</div>
							</div>



						</div>
					</div>
				</fieldset>

				<p class="text-center" style="margin-top: 20px;">
					<button type="save" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Generar</button>
				</p>
				<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,60}" class="form-control" type="text" name="usu-reg" style="display:none" value="<?php echo $usu; ?>" maxlength="50">
				<div class="RespuestaAjax"></div>
			</form>
		</div>
	</div>
</div>