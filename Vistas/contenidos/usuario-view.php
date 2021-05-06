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

					<form data-form="save" id="FormularioAjax" name="FormularioAjax" action="<?php echo SERVERURL;?>ajax/usuarioAjax.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data">
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
										<label class="control-label">Nivel *</label>
										  	<select class="form-control"  onchange ="" id="lstnivel" name="nivel">
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
						<div class="RespuestaAjax"></div>
				    </form>
				</div>
			</div>
		</div>
