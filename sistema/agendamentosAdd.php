<?php 
require '../controller/verLogado.php'; 

include_once '../model/Conexao.class.php';
include_once '../model/Crud.class.php';
include_once '../model/Agendamento.class.php';

$crud = new Crud();
$agendamento = new Agendamento();
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
								Agendar Consulta
								<a href="agendamentos.php" class="btn btn-danger btn-sm float-right">Cancelar</a>
							</h3>
						</div>
						
						<div class="card-body">
							<form method="POST" action="../controller/addAgendamento.php">
								<div class="row">
									<div class="col-12 col-md-6">
										<label for="id_paciente">Paciente</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
											<select required class="form-control" id="id_paciente" name="id_paciente">
												<option value="">Selecione</option>
												<?php foreach($crud->listarTudo("tb_paciente") as $pro): ?>
													<option value="<?php echo $pro['id']; ?>"><?php echo $pro['nm_paciente']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>

									<div class="col-12 col-md-6">
										<label for="id_profissional">Profissional</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-stethoscope"></i></span></div>
											<select required class="form-control" id="id_profissional" name="id_profissional">
												<option value="">Selecione</option>
												<?php foreach($agendamento->listarProfissionais() as $pro): ?>
													<option value="<?php echo $pro['id']; ?>"><?php echo $pro['nm_profissional']; ?> - <?php echo $pro['ds_profissional_tipo']; ?> <?php echo $pro['ds_profissional_especialidade']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>

									<div class="col-12 col-md-6">
										<label for="ds_agendamento">Observações</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-pencil"></i></span></div>
											<input required type="text" class="form-control" id="ds_agendamento" name="ds_agendamento" placeholder="Observações" value="Dor nas costas">
										</div>
									</div>

									<div class="col-12 col-md-6">
										<label for="dt_agendamento">Data</label>
										<div class="input-group mb-4">
											<div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
											<input required type="text" class="form-control" id="dt_agendamento" name="dt_agendamento" placeholder="Data do agendamento" value="">
										</div>
									</div>
											
									<input type="hidden" name="id_agendamento_status" value="1">
									<div class="col-12 pt-2">
										<button class="btn btn-success mb-3">Cadastrar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<link href="assets/css/jquery-ui.structure.min.css" rel="stylesheet">
			<link href="assets/css/jquery-ui-timepicker-addon.css" rel="stylesheet">
			
			<?php include_once 'estatico/rodape.php'; ?>
			<script src="assets/js/jquery-ui.min.js"></script>
			<script src="assets/js/jquery-ui-timepicker-addon.js"></script>

			<script>
				$('#dt_agendamento').datetimepicker({
					numberOfMonths: 2,
				    minDate: 0,
				    hourMin: +1,
				    minuteMin: +15,
				    hourMax: 22,
				    addSliderAccess: true,
					stepMinute: 10,
					minuteGrid: 10,
				    sliderAccessArgs: {
				        touchonly: false
				    }
				});
			</script>
		</div>
	</body>
</html>