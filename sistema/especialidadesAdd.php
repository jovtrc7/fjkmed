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
								Cadastrar Especialidade
								<a href="especialidades.php" class="btn btn-danger btn-sm float-right">Cancelar</a>
							</h3>
						</div>
						
						<div class="card-body">
							<form method="POST" action="../controller/addEspecialidade.php">
								<div class="row">
									<div class="col-12">
										<label for="ds_profissional_especialidade">Nome</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-stethoscope"></i></span></div>
											<input required type="text" class="form-control" id="ds_profissional_especialidade" name="ds_profissional_especialidade" placeholder="Nome da especialidade" value="Ortopedia">
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