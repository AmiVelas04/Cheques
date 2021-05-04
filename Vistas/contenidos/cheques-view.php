<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i>Generacion de cheques <small><?php echo $_SESSION['usuario'] ?></small></h1>
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
					<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO CHEQUE</h3>
				</div>
				<div class="panel-body">
					<form data-form="save" name="FormularioAjax" action="<?php echo SERVERURL;?>ajax/chequesAjax.php" method="POST" class="FormularioAjax" autocomplete="on" enctype="multipart/form-data">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Información del cheque</legend>
				    		<div class="container-fluid">
				    			<div class="row">
                                <div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										<?php require_once "./Controladores/chequeControlador.php";
												$gen = new chequeControlador();?>
										  	<label class="control-label">Banco</label>
											  <select class="form-control"  onchange ="" id="banco" name="banco">
											 <?php echo $gen->mostrar_banco_controlador();?>
											  </select>
										</div>
									</div>

                                    <div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  
										</div>
									</div>


                                    <div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										
										</div>
									</div>


								<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Fecha *</label>
										  	<input  class="form-control" type="date" name="fecha-reg" required="" value="2021/01/01" min="2021/01/01" max="2030/12/31">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Monto *</label>
										  	<input pattern="[0-9]{7}" class="form-control" type="text" name="monto-reg" required="" maxlength="30">
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
						<div class="RespuestaAjax"></div>
				    </form>
				</div>
			</div>
		</div>
<?echo ?>
		<script>
		
$('.FormularioAjax').submit(function(e)
{
	e.preventDefault();
	var form=$(this);
	var tipo = form.attr('data-form');
	var accion = form.attr('action');
	var metodo = form.attr('method');
	var respuesta = form.children('.RespuestaAjax');
	var MsjError=  swal('Ocurrio un error'); 
	var formdata= new FormData(this);

	var textoAlerta;
	if (tipo=='save') 
	{
		textoAlerta="los datos seran almacenados" ;
	}
	else if(tipo=='delete')
	{
	textoAlerta="los datos seran eliminados";	
	}
	else if(tipo=='update')
	{
	textoAlerta="los datos se actualizaran";	
	}
	else
	{
	textoAlerta="Desear realizar esta operacion?";		
	}

	swal({

		title:"¿Seguro?",
		text:  textoAlerta,
		type: "question",
		showCancelButton:true,
		confirmButtonText:"Aceptar",
		cancelButtonText:"Cancelar"
	}).then(function ()
	{
		$.ajax({
			type: metodo,
			url: accion,
			data: formdata ? formdata: form.serialize(),
			cache:false,
			contentType:false,
			processData:false,
			xhr: function()
			{
				var xhr= new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress",function(evt)
				{
					if (evt.lengthComputable)
					{
						var percentComplete=evt.loaded /evt.total;
						percentComplete=parseInt(percentComplete*100);
						if (percentComplete<100) 
						{
							respuesta.append('<p class"text-center">Procesando...</p>');
						}
						else
						{
							respuesta.html('<p class"text-center"></p>');
						}
					}
				},false);
				return xhr;
			},
			success:function(data)
			{
				respuesta.html(data);
			},
			error:function () 
			{
				respuesta.html(MsjError);
				
			}
			});
		return false;
	}
		   );
});

</script>