<?php

include_once '../model/Conexao.class.php';
include_once '../model/Crud.class.php';

$crud = new Crud();

$dados = $_POST;

if(isset($dados) && !empty($dados)) {
	$crud->incluir("tb_profissional_especialidade", $dados);
	header("Location: ../sistema/especialidades.php?cadastrado_sucesso");
}

?>