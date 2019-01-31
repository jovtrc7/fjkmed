<?php 
require '../controller/verLogado.php'; 

include_once '../model/Conexao.class.php';
include_once '../model/Crud.class.php';
include_once '../model/Paciente.class.php';

$crud = new Crud();
$paciente = new Paciente();

$id = $_POST['id'];

?>

<!DOCTYPE html>

<html lang="pt-br">
	
	<?php include_once 'estatico/head.php'; ?>

	<body class="painel">
		<?php include_once 'estatico/menu.php'; ?>
		
		<div class="conteudo">
			<?php include_once 'estatico/breadcrumbs.php'; ?>


			<!-- AREA SAME -->
			<div class="container-fluid">
				<div class="listagem py-3">
					<div class="card shadow">
						<div class="card-header">
							<?php foreach($crud->pegarInfos("tb_paciente", $id) as $pro): ?>
								<h3 class="mb-0">
									Histórico do paciente <?=$pro['nm_paciente']?>
									<a href="pacientes.php" class="btn btn-danger btn-sm float-right">Voltar</a>
								</h3>
							<?php endforeach; ?>
						</div>
						
						<div class="card-body">
							<div class="accordion" id="accordionSAME">
								<?php foreach($paciente->listarProntuario($id) as $pro): ; ?>
									<div class="card">
										<div class="card-header p-2" id="tituloitem<?=$pro['idp']?>">
											<h5 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#item<?=$pro['idp']?>" aria-expanded="false" aria-controls="item<?=$pro['idp']?>">
													Prontuário #<?=$pro['idp']?>
												</button>
											</h5>
										</div>

										<div id="item<?=$pro['idp']?>" class="collapse" aria-labelledby="tituloitem<?=$pro['idp']?>" data-parent="#accordionSAME">
											<div class="card-body">
												<div class="card mb-4">
													<div class="card-header px-3 py-2">Prontuário - Consulta #<?=$pro['id_agendamento']?></div>
													<div class="card-body text-sm">
														<div class="row mb-4">
															<div class="col-6"><b>Profissional: </b> <?=$pro['nm_profissional']?></div>
															<div class="col-6"><b>Especialidade: </b> <?=$pro['ds_profissional_tipo']?> <?=$pro['ds_profissional_especialidade']?></div>
														</div>

														<b>Descrição do prontuário: </b> <?=$pro['ds_prontuario']?>
													</div>
												</div>

												<div class="row">
													<div class="col-12 col-md-6">
														<div class="card mb-4">
															<div class="card-header px-3 py-2">Prescrição</div>
															<div class="card-body text-sm">
																<ul class="list-unstyled">
																	<li><b>Descrição:</b> <?=$pro['ds_prescricao']?></li>
																	<li><b>Posologia:</b> <?=$pro['pos_prescricao']?></li>
																	<li><b>Dosagem:</b> <?=$pro['dos_prescricao']?></li>
																</ul>
															</div>
														</div>
													</div>

													<div class="col-12 col-md-6">
														<div class="card mb-4">
															<div class="card-header px-3 py-2">Solicitações de exames</div>
															<div class="card-body text-sm">
																<ul class="list-unstyled">
																	<li><b>Descrição:</b> <?=$pro['ds_exame_solic']?></li>
																</ul>
															</div>
														</div>
													</div>

													<div class="col-12 col-md-6">
														<div class="card mb-4">
															<div class="card-header px-3 py-2">Transferência</div>
															<div class="card-body text-sm">
																<ul class="list-unstyled">
																	<li><b>Data:</b> <?=$pro['dt_transferencia']?></li>
																	<li><b>Descrição:</b> <?=$pro['ds_transferencia']?></li>
																</ul>
															</div>
														</div>
													</div>

													<div class="col-12 col-md-6">
														<div class="card mb-4">
															<div class="card-header px-3 py-2">Alta</div>
															<div class="card-body text-sm">
																<ul class="list-unstyled">
																	<li><b>Data:</b> <?=$pro['dt_alta']?></li>
																	<li><b>Descrição:</b> <?=$pro['ds_alta']?></li>
																</ul>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php include_once 'estatico/rodape.php'; ?>
		</div>
	</body>
</html>