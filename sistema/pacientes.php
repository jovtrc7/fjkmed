<?php 
require '../controller/verLogado.php'; 

include_once '../model/Conexao.class.php';
include_once '../model/Crud.class.php';

$crud = new Crud();
?>

<!DOCTYPE html>

<html lang="pt-br">
	<?php include_once 'estatico/head.php'; ?>

	<body class="painel">
		<?php include_once 'estatico/menu.php'; ?>
		
		<div class="conteudo">
			<?php include_once 'estatico/breadcrumbs.php'; ?>


			<!-- AREA LISTAGEM -->
			<div class="container-fluid">
				<div class="listagem py-3">
					<div class="card shadow">
						<div class="card-header border-0">
							<h3 class="mb-0">
								Pacientes
								<a href="pacientesAdd.php" class="btn btn-success btn-sm float-right">Cadastrar paciente</a>
							</h3>
						</div>

						<div class="table-responsive">
							<table class="table table-hover align-items-center table-flush">
								<thead class="thead-light">
									<tr>
									<th scope="col">#</th>
									<th scope="col">Nome</th>
									<th scope="col">Endereço</th>
									<th scope="col">Ações</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach($crud->listarTudo("tb_paciente") as $pro): ?>
									<tr>
										<th style="width: 50px;" scope="row"><b><?php echo $pro['id']; ?></b></th>
										<td><?php echo $pro['nm_paciente']; ?></td>
										<td><?php echo $pro['end_paciente']; ?></td>
										<td style="width: 210px;">
											<form class="d-inline" method="POST" action="pacientesEdit.php">
												<input type="hidden" name="id" value="<?=$pro['id']?>">
												<button class="btn btn-success btn-sm mr-2"><i class="fa fa-pencil"></i></button>
											</form>


											<form class="d-inline" method="POST" action="pacientesSame.php">
												<input type="hidden" name="id" value="<?=$pro['id']?>">
												<button class="btn btn-primary btn-sm""><i class="fa fa-stethoscope"></i> SAME</button>
											</form>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<?php include_once 'estatico/rodape.php'; ?>
		</div>
	</body>
</html>