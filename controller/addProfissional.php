<?php

include_once '../model/Conexao.class.php';
include_once '../model/Profissional.class.php';

$profissional = new Profissional();

$dados = $_POST;

if(isset($dados) && !empty($dados)) {
	$profissional->incluirProfissional("tb_profissional", $dados);
	header("Location: ../sistema/profissionais.php?cadastrado_sucesso");
}

?>