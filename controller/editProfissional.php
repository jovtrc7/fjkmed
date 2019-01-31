<?php

include_once '../model/Conexao.class.php';
include_once '../model/Profissional.class.php';

$profissional = new Profissional();

$dados_edit = $_POST;
$id = $_POST["id"];


$nome 			= $_POST["nm_profissional"];
$tipo 			= $_POST["id_profissional_tipo"];
$especialidade 	= $_POST["id_profissional_especialidade"];
$endereco	 	= $_POST["end_profissional"];
$salario	 	= $_POST["sal_profissional"];
$email 			= $_POST["email_profissional"];
$crm 			= $_POST["crm_profissional"];
$uf 			= $_POST["uf_profissional"];
$senha 			= $_POST["pass_profissional"];


if(isset($dados_edit) && !empty($dados_edit)) {
	$profissional->editarProfissional("tb_profissional", $dados_edit, $id);
	header("Location: ../sistema/profissionais.php?editado_sucesso");
}

?>