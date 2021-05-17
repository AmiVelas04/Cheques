        <div class="container-fluid">
        	<div class="page-header">
        		<h1 class="text-titles">Página Principal <small>Información</small></h1>
        	</div>
        </div>
        <div class="full-box text-center" style="padding: 30px 10px;">
        	<article class="full-box tile">
        		<div class="full-box tile-title text-center text-titles text-uppercase">
        			Usuarios
        		</div>
        		<div class="full-box tile-icon text-center">
        			<i class="zmdi zmdi-account"></i>
        		</div>
        		<div class="full-box tile-number text-titles">
        			<p class="full-box">1</p>
        			<small><a href="<?php echo SERVERURL; ?>./usuario">Nuevo</a></small>
        		</div>
        	</article>
        	<article class="full-box tile">
        		<div class="full-box tile-title text-center text-titles text-uppercase">
        			Cheques pendientes de liberacion
        		</div>
        		<div class="full-box tile-icon text-center">
        			<i class="zmdi zmdi-balance-wallet"></i>
        		</div>
        		<div class="full-box tile-number text-titles">
        			<p class="full-box"><?php require_once "./Controladores/mainControlador.php";
										$gen = new mainControlador();
										echo $gen->mostrar_pendientes_controlador();;
										?></p>
        			<small><a href="<?php echo SERVERURL; ?>./cheques">Revisar</a></small>
        		</div>
        	</article>
        	<article class="full-box tile">
        		<div class="full-box tile-title text-center text-titles text-uppercase">
        			Cheques Generados
        		</div>
        		<div class="full-box tile-icon text-center">
        			<i class="zmdi zmdi-card"></i>
        		</div>
        		<div class="full-box tile-number text-titles">
        			<p class="full-box"><?php echo $gen->mostrar_cheque_controlador(); ?></p>
        			<a href="<?php echo SERVERURL; ?>./cheques"><small>Generar</small></a>
        		</div>
        	</article>
        </div>
        <div class="container-fluid">
        	<div class="page-header">
        		<h1 class="text-titles">Control <small>Actividades</small></h1>
        	</div>


        	<section id="cd-timeline" class="cd-container">

        		<div class="cd-timeline-block">
        			<div class="cd-timeline-img">
        				<img src="  <?php echo SERVERURL; ?>Vistas/assets/avatars/StudetMaleAvatar.png" alt="user-picture">
        			</div>
        			<?php $gen->mostrar_actividades(1); ?>
        		</div>

        		<div class="cd-timeline-block">
        			<div class="cd-timeline-img">
        				<img src=" <?php echo SERVERURL; ?>Vistas/assets/avatars/StudetMaleAvatar.png" alt="user-picture">
        			</div>
        			<?php echo $gen->mostrar_actividades(2); ?>
        		</div>

        		<div class="cd-timeline-block">
        			<div class="cd-timeline-img">
        				<img src=" <?php echo SERVERURL; ?>Vistas/assets/avatars/StudetMaleAvatar.png" alt="user-picture">
        			</div>
        			<?php echo $gen->mostrar_actividades(3); ?>
        		</div>


        		<div class="cd-timeline-block">
        			<div class="cd-timeline-img">
        				<img src=" <?php echo SERVERURL; ?>Vistas/assets/avatars/StudetMaleAvatar.png" alt="user-picture">
        			</div>
        			<?php echo $gen->mostrar_actividades(4); ?>
        		</div>

        	</section>