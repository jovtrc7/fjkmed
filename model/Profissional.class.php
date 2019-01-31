<?php

// Classe com as funções para os profissionais
class Profissional extends Conexao {

    // Função de cadastrar
    public function incluirProfissional($tabela, $dados) { 
        $pdo = parent::get_instance();

        foreach($dados as $key => $value) {
            $value = trim($value);
            if (empty($value)) {
                $dados[$key] = NULL;
            }
        }

        $campos = implode(", ", array_keys($dados));
        $valores = ":".implode(", :", array_keys($dados));
        $sql = "INSERT INTO $tabela($campos) VALUES ($valores)";
        $statement = $pdo->prepare($sql);

        foreach($dados as $key => $valor) {
            $statement->bindValue(":$key", $valor, PDO::PARAM_STR);
        }

        $statement->execute();
    }


    // Função de buscar todos os registros de um profissional
    public function listarUmProfissional($id) {
        $pdo = parent::get_instance();
        $sql = "SELECT p.*, e.ds_profissional_especialidade, t.ds_profissional_tipo FROM tb_profissional p
                LEFT JOIN tb_profissional_especialidade e ON p.id_profissional_especialidade = e.id
                INNER JOIN tb_profissional_tipo t ON p.id_profissional_tipo = t.id
                WHERE p.id = $id";
        $statement = $pdo->query($sql);
        $statement->execute();

        if($statement->rowCount() > 0) {
            return $statement->fetchAll();
        } else {
            echo "<p style='color:#333; font-size:26px;'><b>Não encontramos registros.</b></p>";  
            return $statement->fetchAll();   
        }
    }


    // Função de listar todos os profissionais
    public function listarProfissionais() {
        $pdo = parent::get_instance();
        $sql = "SELECT p.*, e.ds_profissional_especialidade, t.ds_profissional_tipo FROM tb_profissional p
                LEFT JOIN tb_profissional_especialidade e ON p.id_profissional_especialidade = e.id
                INNER JOIN tb_profissional_tipo t ON p.id_profissional_tipo = t.id
                ORDER BY p.id ASC";
        $statement = $pdo->query($sql);
        $statement->execute();

        if($statement->rowCount() > 0) {
            return $statement->fetchAll();
        } else {
            echo "<p style='color:#333; font-size:26px;'><b>Não encontramos registros.</b></p>";  
            return $statement->fetchAll();   
        }
    }


    // Função de editar todos os campos
    public function editarProfissional($tabela, $dados, $id) {
        $pdo = parent::get_instance();
        $novos_valores = "";

        $filtro = array_filter($dados);

        foreach ($filtro as $key => $valor) {
            $novos_valores .= "$key = :$key, ";
        }

        $novos_valores = substr($novos_valores, 0, -2);

        $sql = "UPDATE $tabela SET $novos_valores WHERE id = :id";
        $statement = $pdo->prepare($sql);

        foreach ($filtro as $key => $valor) {
            $statement->bindValue(":$key",  $valor);
        }

        $statement->execute();
    }

}