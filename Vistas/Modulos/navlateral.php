<!-- SideBar -->
<section class="full-box cover dashboard-sideBar">
	<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
	<div class="full-box dashboard-sideBar-ct">
		<!--SideBar Title -->
		<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
			<?php echo 'Nueva Verapaz'; //proy; 
			?><i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
		</div>
		<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
			<i class="zmdi zmdi-close btn-menu-dashboard visible-xs"> </i>
		</div>
		<!-- SideBar User info -->
		<div class="full-box dashboard-sideBar-UserInfo">
			<figure class="full-box">
				<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/TeacherMaleAvatar.png" alt="UserIcon">
				<figcaption class="text-center text-titles"><?php
															echo $_SESSION['usuario']; ?></figcaption>
			</figure>
			<ul class="full-box list-unstyled text-center">
				<li>
					<a href="#" title="Salir del sistema" class="btn-exit-system">
						<i class="zmdi zmdi-power"></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- SideBar Menu -->
		<ul class="list-unstyled full-box dashboard-sideBar-Menu">
			<li>
				<a href="<?php echo SERVERURL; ?>main"" class="">
						<i class=" zmdi zmdi-store zmdi-hc-fw"></i> Página Principal <i class=""></i>
				</a>

			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-case zmdi-hc-fw"></i> Cheques <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href=" <?php echo SERVERURL; ?>cheques"><i class="zmdi zmdi-plus-square zmdi-hc-fw"></i> Generar Cheque</a>
					</li>

					<li>
						<a href=" <?php echo SERVERURL; ?>liberarch"><i class="zmdi zmdi-money zmdi-hc-fw"></i>Liberar Cheque</a>
					</li>
				</ul>
			</li>
			<li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href=" <?php echo SERVERURL; ?>usuario"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Usuarios</a>
					</li>
					<li>
						<a href=" <?php echo SERVERURL; ?>ingresoch"><i class="zmdi zmdi-card zmdi-hc-fw"></i>Crear Chequeras</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="<?php echo SERVERURL; ?>reportes">
					<i class="zmdi zmdi-book-image zmdi-hc-fw"></i> Reportes
				</a>
			</li>

		</ul>
	</div>
</section>