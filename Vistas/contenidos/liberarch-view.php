<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Liberacion de Cheques <small><?php echo $_SESSION['usuario'] ?></small></h1>
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
					<h3 class="panel-title"><i class="zmdi zmdi-check-circle"></i> &nbsp; Autorizar cheques</h3>
				</div>
				
				<div class="panel-body">
					<form data-form="save" name="FormularioAjax" action="<?php echo SERVERURL;?>Ajax/ingresochAjax.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Selecionar Cheque</legend>
				    		<div class="container-fluid">
				    			
								<div class="row">
                                	<div class="col-xs-6 col-sm-6">
										<div class="form-group label-floating">
								    		<legend><i class="zmdi zmdi-view-list"></i> &nbsp; Lista de cheques</legend>
                                          
								    	        <div class="form-group label-floating">
                                                    <select class="form-control"  onchange ="MostrarDatosB(this.value);" id="lstcuenta" name="cuenta">
											<?php require_once "./Controladores/chequeControlador.php";
                                                  $ch= new chequeControlador();
                                                  echo $ch->mostrar_chequespen_controlador(); ?>
											        </select>
                                                </div>
										</div>
				    				</div>
				    		
                            	                         
                                   <div class="col-xs-6 col-sm-6">
								    	<div class="form-group label-floating">
											<legend><i class="zmdi zmdi-balance"></i> &nbsp; Banco</legend>
												<div class="radio radio-primary" id ="datosB" name="datosB">
												</div>
										</div>
									</div>
                                </div>

                                <div class="row">
                                   <div class="col-xs-6 col-sm-6">
								    	<div class="form-group label-floating">
											<legend><i class="zmdi zmdi-money-box"></i> &nbsp; Cuenta</legend>
											<div class="radio radio-primary" id ="datosC" name="datosC">
											</div>
										</div>
									</div>
                                
                                   <div class="col-xs-6 col-sm-6">
								    	<div class="form-group label-floating">
											<legend><i class="zmdi zmdi-card"></i> &nbsp; Chequera</legend>
											<div class="radio radio-primary" id ="datosCh" name="datosCh">
											</div>
										</div>
									</div>
                                </div>

                                <div class="row">
                                   <div class="col-xs-6 col-sm-6">
								    	<div class="form-group label-floating">
											<legend><i class="zmdi zmdi-money"></i> &nbsp; Monto</legend>
											<div class="radio radio-primary" id ="datosM" name="datosM">
											</div>
										</div>
									</div>
                               
                                   <div class="col-xs-6 col-sm-6">
								    	<div class="form-group label-floating">
											<legend><i class="zmdi zmdi-account-box-mail"></i> &nbsp; Cheque a nombre de</legend>
											<div class="radio radio-primary" id ="datosBe" name="datosBe">
											</div>
										</div>
									</div>
                                </div>
				    			</div>
				    		
						</fieldset>
						</div>
					   <!-- Boton de liberar -->
					   <div>
					    <p class="text-center" style="margin-top: 20px;">
					    	
							<button type="save" class="btn btn-info btn-raised btn-sm"><h4><i class="zmdi zmdi-check-circle"></i></h4><h5> Liberar cheque</h5></button>
							<button type="cancel" class="btn btn-warning btn-raised btn-sm"><h4><i class="zmdi zmdi-close-circle"></i></h4><h5> Cancelar cheque</h5></button>
							
						</p>
						</div>


					</form>
				</div>
						<div class="RespuestaAjax" name="RespuestaAjax" id="RespuestaAjax"></div>
			
		</div>
 
