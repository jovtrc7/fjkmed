<?php require '../controller/verLogado.php'; ?>

<!DOCTYPE html>

<html lang="pt-br">
	
	<?php include_once 'estatico/head.php'; ?>

	<body class="painel">
		<?php include_once 'estatico/menu.php'; ?>
		
		<div class="conteudo">
			<?php include_once 'estatico/breadcrumbs.php'; ?>


			<!-- AREA CADASTRAR -->
			<div class="container-fluid">
				<div class="cadastrar py-3">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="mb-0">
								Cadastrar Paciente
								<a href="pacientes.php" class="btn btn-danger btn-sm float-right">Cancelar</a>
							</h3>
						</div>
						
						<div class="card-body">
							<form method="POST" action="../controller/addPaciente.php">
								<div class="row">
									<div class="col-6">
										<label for="nm_paciente">Nome</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
											<input required type="text" class="form-control" id="nm_paciente" name="nm_paciente" placeholder="Nome do paciente" value="">
										</div>
									</div>

									<div class="col-6">
										<label for="end_paciente">Endereço</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
											<input required type="text" class="form-control" id="end_paciente" name="end_paciente" placeholder="Endereço" value="">
										</div>
									</div>

									<div class="col-6">
										<label for="gen_paciente">Gênero</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
											<select required class="form-control" id="gen_paciente" name="gen_paciente">
												<option value="">Selecione</option>
												<option value="Masculino">Masculino</option>
												<option value="Feminino">Feminino</option>
											</select>
										</div>
									</div>

									<div class="col-6">
										<label for="nasc_paciente">Data de nascimento</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
											<input required type="date" class="form-control" id="nasc_paciente" name="nasc_paciente" placeholder="Data de nascimento">
										</div>
									</div>

									<div class="col-12 pt-2">
										<button class="btn btn-success mb-3">Cadastrar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<?php include_once 'estatico/rodape.php'; ?>
		</div>
	</body>
</html>