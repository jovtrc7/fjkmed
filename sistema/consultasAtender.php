<?php 
require '../controller/verLogado.php'; 

include_once '../model/Conexao.class.php';
include_once '../model/Crud.class.php';
include_once '../model/Agendamento.class.php';
include_once '../model/Paciente.class.php';

$crud = new Crud();
$agendamento = new Agendamento();
$paciente = new Paciente();

$id = $_POST['id'];
$idPaci = $_POST['idPaci'];

$idProf = $_SESSION['FJK_id'];

?>

<!DOCTYPE html>

<html lang="pt-br">
	
	<?php include_once 'estatico/head.php'; ?>

	<body class="painel">
		<?php include_once 'estatico/menu.php'; ?>
		
		<div class="conteudo">
			<?php include_once 'estatico/breadcrumbs.php'; ?>


			<!-- AREA CONSULTA -->
			<div class="container-fluid">
				<div class="cadastrar py-3">
					<div class="card shadow">
						<div class="card-header">
							<h3 class="mb-0">
								Realizando consulta
								<a href="consultas.php" class="btn btn-danger btn-sm float-right">Voltar</a>
							</h3>
						</div>
						
						<div class="card-body">
							<div class="card mb-4">
								<div class="card-header bg-light px-3 py-2"><i class="fa fa-user"></i> Informações do paciente</div>
								<div class="card-body text-sm">
									<div class="row mb-4">
										<?php foreach($crud->listarEspecifico("tb_paciente", $idPaci) as $r):
											$dataNascimento = date('d/m/Y', strtotime($r['nasc_paciente'])); ?>

											<div class="col-4"><b>Nome: </b> <?=$r['nm_paciente']?></div>
											<div class="col-4"><b>Data de nascimento: </b> <?php echo $dataNascimento; ?></div>
											<div class="col-4"><b>Endereço: </b> <?=$r['end_paciente']?></div>
										<?php endforeach; ?>
									</div>

									<hr>

									<div class="accordion" id="accordionSAME">
										<?php foreach($paciente->listarProntuario($idPaci) as $pro): ?>
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
															<div class="col-12 col-md-3">
																<div class="card mb-4">
																	<div class="card-header px-3 py-2">Prescrição</div>
																	<div class="card-body text-sm">
																		<ul class="list-unstyled">
																			<li>Descrição: <?=$pro['ds_prescricao']?></li>
																			<li>Posologia: <?=$pro['pos_prescricao']?></li>
																			<li>Dosagem: <?=$pro['dos_prescricao']?></li>
																		</ul>
																	</div>
																</div>
															</div>

															<div class="col-12 col-md-3">
																<div class="card mb-4">
																	<div class="card-header px-3 py-2">Solicitações de exames</div>
																	<div class="card-body text-sm">
																		<ul class="list-unstyled">
																			<li>Descrição: <?=$pro['ds_exame_solic']?></li>
																		</ul>
																	</div>
																</div>
															</div>

															<div class="col-12 col-md-3">
																<div class="card mb-4">
																	<div class="card-header px-3 py-2">Transferência</div>
																	<div class="card-body text-sm">
																		<ul class="list-unstyled">
																			<li>Data: <?=$pro['dt_transferencia']?></li>
																			<li>Descrição: <?=$pro['ds_transferencia']?></li>
																		</ul>
																	</div>
																</div>
															</div>

															<div class="col-12 col-md-3">
																<div class="card mb-4">
																	<div class="card-header px-3 py-2">Alta</div>
																	<div class="card-body text-sm">
																		<ul class="list-unstyled">
																			<li>Data: <?=$pro['dt_alta']?></li>
																			<li>Descrição: <?=$pro['ds_alta']?></li>
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


							<div class="card mb-4">
								<div class="card-header bg-light px-3 py-2"><i class="fa fa-plus"></i> Registrar novo prontuário</div>
								<div class="card-body text-sm">
									<form method="POST" action="../controller/finalizarConsulta.php">
										<div class="card mb-4">
											<div class="card-header px-3 py-2">Observações do prontuário</div>
											<div class="card-body text-sm">
												<label for="ds_prontuario">Observações</label>
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-pencil"></i></span></div>
													<textarea id="ds_prontuario" name="ds_prontuario" placeholder="Observações" class="form-control" rows="7">Dor nas costas</textarea>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-12 col-md-6">
												<div class="card mb-4">
													<div class="card-header px-3 py-2">Prescrição</div>
													<div class="card-body text-sm">
														<label for="pos_prescricao">Posologia</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-plus"></i></span></div>
															<input type="text" id="pos_prescricao" name="pos_prescricao" placeholder="Posologia" class="form-control">
														</div>

														<label for="dos_prescricao">Dosagem</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-plus"></i></span></div>
															<input type="text" id="dos_prescricao" name="dos_prescricao" placeholder="Dosagem" class="form-control">
														</div>

														<label for="ds_prescricao">Observações</label>
														<div class="input-group">
															<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-plus"></i></span></div>
															<input type="text" id="ds_prescricao" name="ds_prescricao" placeholder="Observações" class="form-control">
														</div>
													</div>
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="card mb-4">
													<div class="card-header px-3 py-2">Solicitações de exames</div>
													<div class="card-body text-sm">
														<label for="ds_exame_solic">Detalhes</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-stethoscope"></i></span></div>
															<textarea id="ds_exame_solic" name="ds_exame_solic" placeholder="Detalhes da solicitação de exame" class="form-control" maxlength="255"></textarea>
														</div>
													</div>
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="card mb-4">
													<div class="card-header px-3 py-2">Transferência</div>
													<div class="card-body text-sm">
														<label for="ds_transferencia">Detalhes</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-truck"></i></span></div>
															<textarea id="ds_transferencia" name="ds_transferencia" placeholder="Detalhes da solicitação de transferência" class="form-control" maxlength="255"></textarea>
														</div>
													</div>
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="card mb-4">
													<div class="card-header px-3 py-2">Alta</div>
													<div class="card-body text-sm">
														<label for="ds_alta">Detalhes</label>
														<div class="input-group mb-3">
															<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-check"></i></span></div>
															<textarea id="ds_alta" name="ds_alta" placeholder="Detalhes da solicitação de alta" class="form-control" maxlength="255"></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>

										<input type="hidden" name="idAgendamento" value="<?php echo $id; ?>">
										<input type="hidden" name="idPaciente" value="<?php echo $idPaci; ?>">
										<input type="hidden" name="idProfissional" value="<?php echo $idProf; ?>">
										<button class="btn btn-success btn-lg"><i class="fa fa-check"></i> Salvar prontuário e finalizar consulta</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php include_once 'estatico/rodape.php'; ?>
		</div>
	</body>
</html>