<?php

include_once '../model/Conexao.class.php';
include_once '../model/Crud.class.php';

$profissional = new Crud();

$dados_edit = $_POST;
$id = $_POST["id"];

if(isset($id) && !empty($id)) {
	$profissional->editar("tb_profissional_especialidade", $dados_edit, $id);

	header("Location: ../sistema/especialidades.php?editado_sucesso");
}

?>