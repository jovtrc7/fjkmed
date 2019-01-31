<!-- Menu -->
<nav class="menu bg-white border-left" id="menu-principal">
	<a class="logo-menu d-block px-3 mb-4" href="index.php">
		<img src="assets/img/logo/logo.png" class="img-fluid" alt="FJKMED">
	</a>

	<div class="itens-menu">
		<div class="navbar-collapse-header d-md-none">
			<div class="row">
				<div class="col-6 collapse-brand">
					<a class="logo-menu d-block px-3 mb-4" href="index.php">
						<img src="assets/img/logo/logo.png" class="img-fluid" alt="FJKMED">
					</a>
				</div>
				<div class="col-6 collapse-close">
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu-principal-collapse" aria-controls="menu-principal" aria-expanded="false" aria-label="Toggle sidenav"><span></span><span></span></button>
				</div>
			</div>
		</div>
		
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="index.php"><i class="fa fa-home"></i> Início</a>
			</li>

			<li class="nav-item submenu-toggle" onclick="$(this).toggleClass('aberto')">
				<a class="nav-link submenu-toggle" href="#" id="pacientessubmenu"><i class="fa fa-user"></i> Pacientes</a>
				
				<div class="submenu-menu" aria-labelledby="agendamentossubmenu">
					<a class="submenu-item" href="pacientes.php">Pacientes</a>
					<a class="submenu-item" href="pacientesAdd.php">Cadastrar paciente</a>
				</div>
			</li>

			<?php if(isset($_SESSION['FJK_tipo']) && $_SESSION['FJK_tipo'] == "1" || $_SESSION['FJK_tipo'] == "2" || $_SESSION['FJK_tipo'] == "3") { ?>
				<li class="nav-item submenu" onclick="$(this).toggleClass('aberto')">
					<a class="nav-link submenu-toggle" href="#" id="consultassubmenu"><i class="fa fa-stethoscope"></i> Consultas</a>
					
					<div class="submenu-menu" aria-labelledby="consultassubmenu">
						<a class="submenu-item" href="consultas.php">Minhas Consultas</a>
					</div>
				</li>
			<?php } ?>

			<?php if(isset($_SESSION['FJK_tipo']) && $_SESSION['FJK_tipo'] == "1" || $_SESSION['FJK_tipo'] == "4") { ?>
				<li class="nav-item submenu" onclick="$(this).toggleClass('aberto')">
					<a class="nav-link submenu-toggle" href="#" id="agendamentossubmenu"><i class="fa fa-calendar"></i> Agendamentos</a>
					
					<div class="submenu-menu" aria-labelledby="agendamentossubmenu">
						<a class="submenu-item" href="agendamentos.php">Agendamentos</a>
						<a class="submenu-item" href="agendamentosAdd.php">Agendar consulta</a>
					</div>
				</li>
			<?php } ?>

			<?php if(isset($_SESSION['FJK_tipo']) && $_SESSION['FJK_tipo'] == "1") { ?>
				<li class="nav-item submenu" onclick="$(this).toggleClass('aberto')">
					<a class="nav-link submenu-toggle" href="#" id="profissionaissubmenu"><i class="fa fa-users"></i> Profissionais</a>

					<div class="submenu-menu" aria-labelledby="profissionaissubmenu" >
						<a class="submenu-item" href="profissionais.php">Profissionais</a>
						<a class="submenu-item" href="profissionaisAdd.php">Adicionar profissional</a>
						<a class="submenu-item" href="especialidades.php">Especialidades</a>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</nav>


