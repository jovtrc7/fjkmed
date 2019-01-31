<?php 
require '../controller/verLogado.php'; 

include_once '../model/Conexao.class.php';
include_once '../model/Crud.class.php';

$crud = new Crud();

$id = $_POST['id'];

?>

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
								Editar Especialidade
								<a href="especialidades.php" class="btn btn-danger btn-sm float-right">Cancelar</a>
							</h3>
						</div>
						
						<div class="card-body">
							<form method="POST" action="../controller/editEspecialidade.php">
								<?php foreach($crud->pegarInfos("tb_profissional_especialidade", $id) as $pro): ?>
									
								<div class="row">
									<div class="col-12">
										<label for="nm_profissional">Nome</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-stethoscope"></i></span></div>
											<input required type="text" class="form-control" id="ds_profissional_especialidade" name="ds_profissional_especialidade" placeholder="Nome da especialidade" value="<?=$pro['ds_profissional_especialidade']?>">
										</div>
									</div>

									<div class="col-12 pt-2">
										<button class="btn btn-success mb-3">Editar</button>
									</div>
								</div>
								
								<input type="hidden" name="id" value="<?=$pro['id']?>">
								<?php endforeach; ?>
							</form>
						</div>
					</div>
				</div>
			</div>

			<?php include_once 'estatico/rodape.php'; ?>
		</div>
	</body>
</html>