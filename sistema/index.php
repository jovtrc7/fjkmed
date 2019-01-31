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

			<!-- AREA DESTAQUES -->
			<div class="container-fluid">
				<div class="destaques py-4">
					<div class="row">
						<div class="col-6 col-md-3">
							<div class="card shadow">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted font-weight-normal mb-0">Total de Pacientes</h5>
											<span class="h2 font-weight-bold mb-0">
												<?php 
													foreach($crud->contarTudo("tb_paciente") as $ce): 
														echo $ce['total'];
													endforeach; 
												?>	
											</span>
										</div>

										<div class="col-auto text-right">
											<div class="icone-container bg-primary text-white rounded-circle float-right">
												<i class="fa fa-home"></i>
											</div>
										</div>
									</div>

									<a href="pacientes.php" class="mt-3 text-muted text-sm d-block">Ver todos os pacientes</a>
								</div>
							</div>
						</div>

						<div class="col-6 col-md-3">
							<div class="card shadow">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted font-weight-normal mb-0">Próximas Consultas</h5>
											<span class="h2 font-weight-bold mb-0">
												<?php 
													foreach($crud->contarTudo("tb_agendamento") as $ce): 
														echo $ce['total'];
													endforeach; 
												?>	
											</span>
										</div>

										<div class="col-auto text-right">
											<div class="icone-container bg-primary text-white rounded-circle float-right">
												<i class="fa fa-calendar"></i>
											</div>
										</div>
									</div>

									<a href="agendamentos.php" class="mt-3 text-muted text-sm d-block">Ver todos os agendamentos</a>
								</div>
							</div>
						</div>

						<div class="col-6 col-md-3">
							<div class="card shadow">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted font-weight-normal mb-0">Total de Profissionais</h5>
											<span class="h2 font-weight-bold mb-0">
												<?php 
													foreach($crud->contarTudo("tb_profissional") as $ce): 
														echo $ce['total'];
													endforeach; 
												?>	
											</span>
										</div>

										<div class="col-auto text-right">
											<div class="icone-container bg-primary text-white rounded-circle float-right">
												<i class="fa fa-users"></i>
											</div>
										</div>
									</div>

									<a href="profissionais.php" class="mt-3 text-muted text-sm d-block">Ver todos os profissionais</a>
								</div>
							</div>
						</div>

						<div class="col-6 col-md-3">
							<div class="card shadow">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted font-weight-normal mb-0">Especialidades atendidas</h5>
											<span class="h2 font-weight-bold mb-0">
												<?php 
													foreach($crud->contarTudo("tb_profissional_especialidade") as $ce): 
														echo $ce['total'];
													endforeach; 
												?>	
											</span>
										</div>

										<div class="col-auto text-right">
											<div class="icone-container bg-primary text-white rounded-circle float-right">
												<i class="fa fa-stethoscope"></i>
											</div>
										</div>
									</div>

									<a href="especialidades.php" class="mt-3 text-muted text-sm d-block">Ver todas as especialidades</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- AREA PROXIMAS CONSULTAS -->
			<div class="container-fluid">
				<div class="proximas-consultas py-3">
					<div class="card shadow">
						<div class="card-header border-0"><h3 class="mb-0">Próximas consultas</h3></div>
						
						<div class="table-responsive">
							<table class="table table-hover align-items-center table-flush">
								<thead class="thead-light">
									<tr>
									<th scope="col">#</th>
									<th scope="col">Paciente</th>
									<th scope="col">Especialidade</th>
									<th scope="col">Profissional</th>
									<th scope="col">Status</th>
									<th scope="col">Data</th>
									</tr>
								</thead>

								<tbody>
									<?php if($_SESSION['FJK_tipo'] == "1" || $_SESSION['FJK_tipo'] == "4") { ?>
										<?php foreach($agendamento->listarAgendamentoGeral() as $pro): ?>
											<?php $dataAgendamento = date('d/m/Y H:i', strtotime($pro['dt_agendamento'])); ?>

											<tr class="
												<?php 
													if($dataAgendamento <= $dataHoje){
														echo 'agendamento-passou';
														if($pro['id_agendamento_status'] != "3") {
															echo ' agendamento-incompleto';
														}
													}
													?>">
												<th style="width: 50px;" scope="row"><b><?php echo $pro['id']; ?></b></th>
												<td><?php echo $pro['nm_paciente']; ?></td>
												<td><?php echo $pro['ds_profissional_tipo']; ?> <?php echo $pro['ds_profissional_especialidade']; ?></td>
												<td><?php echo $pro['nm_profissional']; ?></td>
												<td><?php echo $pro['ds_agendamento_status']; ?></td>
												<td>
													<b><?php echo $dataAgendamento; ?></b>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php } else if($_SESSION['FJK_tipo'] == "2") { ?>
										<?php foreach($agendamento->listarAgendamentoProf($_SESSION['FJK_tipo']) as $pro): ?>
											<?php $dataAgendamento = date('d/m/Y H:i', strtotime($pro['dt_agendamento'])); ?>

											<tr class="<?php if($dataAgendamento <= $dataHoje){ echo 'agendamento-passou'; } ?>">
												<th style="width: 50px;" scope="row"><b><?php echo $pro['id']; ?></b></th>
												<td><?php echo $pro['nm_paciente']; ?></td>
												<td><?php echo $pro['ds_profissional_especialidade']; ?></td>
												<td><?php echo $pro['nm_profissional']; ?></td>
												<td><?php echo $pro['ds_agendamento_status']; ?></td>
												<td>
													<b><?php echo $dataAgendamento; ?></b>
												</td>
											</tr>
										<?php endforeach; ?>
									<?php } ?>
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