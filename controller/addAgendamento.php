<?php

include_once '../model/Conexao.class.php';
include_once '../model/Agendamento.class.php';

$agendamento = new Agendamento();

// $dados = $_POST;

$paciente = $_POST["id_paciente"];
$profissional = $_POST["id_profissional"];
$descricao = $_POST["ds_agendamento"];
$data = $_POST["dt_agendamento"];

	$agendamento->incluir($paciente, $profissional, $descricao, $data);
	header("Location: ../sistema/agendamentos.php?cadastrado_sucesso");


?>