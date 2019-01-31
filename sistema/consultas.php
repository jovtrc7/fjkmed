<?php 
require '../controller/verLogado.php'; 

include_once '../model/Conexao.class.php';
include_once '../model/Agendamento.class.php';
include_once '../model/Crud.class.php';

$agendamento = new Agendamento();
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
								Consultas marcadas para você
							</h3>
						</div>

						<div class="table-responsive">
							<table class="table table-hover align-items-center table-flush">
								<thead class="thead-light">
									<tr>
									<th scope="col">#</th>
									<th scope="col">Paciente</th>
									<th scope="col">Observações</th>
									<th scope="col">Status</th>
									<th scope="col">Data</th>
									<th scope="col">Ações</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach($agendamento->listarAgendamentoProf($_SESSION['FJK_id']) as $pro): ?>
									<?php $dataAgendamento = date('d/m/Y H:i', strtotime($pro['dt_agendamento'])); ?>

									<tr class="<?php if($dataAgendamento <= $dataHoje){ echo ' agendamento-passou'; if($pro['id_agendamento_status'] != '3') { echo ' agendamento-incompleto'; } } if ($pro['ds_agendamento_status'] == "Finalizado") { echo ' agendamento-realizado'; } ?>">
										<th style="width: 50px;" scope="row"><b><?php echo $pro['id']; ?></b></th>
										<td>
											
											<form class="d-inline" method="POST" action="pacientesSAME.php">
												<input type="hidden" name="id" value="<?=$pro['id']?>">
												<button class="btn btn-link btn-sm"><?php echo $pro['nm_paciente']; ?></button>
											</form>
										</td>
										<td><?php echo $pro['ds_agendamento']; ?></td>
										<td><?php echo $pro['ds_agendamento_status']; ?></td>
										<td>
											<b><?php echo $dataAgendamento; ?></b>
										</td>
										<td style="width: 150px;">
											<?php if($dataAgendamento <= $dataHoje){ ?>
												<a href="#" class="btn btn-info hint--left" aria-label="Agende uma nova consulta para realizar este atendimento"><i class="fa fa-info"></i></a>
											<?php } else if ($pro['ds_agendamento_status'] == "Finalizado") { ?>
												<a href="#" class="btn btn-success hint--left" aria-label="Consulta realizada"><i class="fa fa-info"></i></a>
											<?php } else { ?>
												<form class="d-inline" method="POST" action="consultasAtender.php">
													<input type="hidden" name="id" value="<?=$pro['id']?>">
													<input type="hidden" name="idPaci" value="<?=$pro['idPaci']?>">
													<button class="btn btn-success btn-sm mr-2"><i class="fa fa-check"></i> Atender</button>
												</form>
											<?php } ?>
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