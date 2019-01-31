<?php

// Classe com as funções referentes ao paciente, SAME, etc
class Paciente extends Conexao {

     // Função de buscar todos os registros de um paciente específico
    public function pegarInfos($tabela, $id) {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $tabela WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();

        if($statement->rowCount() > 0) {
            return $statement->fetchAll();
        } else {
            echo "<p style='color:#333; font-size:26px;'><b>Não encontramos registros.</b></p>";  
            return $statement->fetchAll();   
        }
    }


    // Função de listar o prontuário do paciente específico
    public function listarProntuario($id) {
        $pdo = parent::get_instance();
        $sql = "SELECT pro.*, pre.*, exa.*, alt.*, tra.*, esp.ds_profissional_especialidade, tipo.ds_profissional_tipo, prof.nm_profissional, prof.id_profissional_especialidade, age.dt_agendamento AS dataAgendamento, age.ds_agendamento FROM tb_prontuario pro
                LEFT JOIN tb_prescricao pre ON pro.idp = pre.id_prontuario
                LEFT JOIN tb_exame_solic exa ON pro.idp = exa.id_prontuario
                LEFT JOIN tb_alta alt ON pro.idp = alt.id_prontuario
                LEFT JOIN tb_transferencia tra ON pro.idp = tra.id_prontuario
                LEFT JOIN tb_profissional prof ON pro.id_profissional = prof.id
                LEFT JOIN tb_profissional_especialidade esp ON prof.id_profissional_especialidade = esp.id
                LEFT JOIN tb_profissional_tipo tipo ON prof.id_profissional_tipo = tipo.id
                LEFT JOIN tb_agendamento age ON pro.idp = age.id
                WHERE pro.id_paciente = $id
                ORDER BY idp DESC";
        $statement = $pdo->query($sql);
        $statement->execute();

        if($statement->rowCount() > 0) {
            return $statement->fetchAll();
        } else {
            echo "<p style='color:#333; font-size:26px;'><b>Não encontramos prontuários no SAME do paciente.</b></p>";  
            return $statement->fetchAll();   
        }
    }


    // Função finalizar consulta e salvar prontuário
    public function finalizarConsulta($idAgendamento, $idProfissional, $idPaciente, $prontuario, $dataAgora, $prescricao, $pos, $dos, $exame, $transferencia, $alta) {
        $pdo = parent::get_instance();
        $sql = "
                INSERT INTO tb_prontuario(id_agendamento, id_profissional, id_paciente, ds_prontuario)
                VALUES ($idAgendamento, :idProfissional, :idPaciente, :prontuario);

                SET @idProntuario = LAST_INSERT_ID();

                INSERT INTO tb_prescricao(id_prontuario, ds_prescricao, pos_prescricao, dos_prescricao)
                VALUES (@idProntuario, :prescricao, :pos, :dos);

                INSERT INTO tb_exame_solic(id_prontuario, ds_exame_solic)
                VALUES (@idProntuario, :exame);

                INSERT INTO tb_transferencia(id_prontuario, dt_transferencia, ds_transferencia)
                VALUES (@idProntuario, :dataAgora, :transferencia);

                INSERT INTO tb_alta(id_prontuario, dt_alta, ds_alta)
                VALUES (@idProntuario, :dataAgora, :alta);

                UPDATE tb_agendamento SET id_agendamento_status = '3'
                WHERE id = :idAgendamento
        ";
        $statement = $pdo->prepare($sql);

        $statement->bindValue(":idAgendamento",  $idAgendamento);
        $statement->bindValue(":idProfissional",  $idProfissional);
        $statement->bindValue(":idPaciente",  $idPaciente);
        $statement->bindValue(":prontuario",  $prontuario);
        $statement->bindValue(":prescricao",  $prescricao);
        $statement->bindValue(":pos",  $pos);
        $statement->bindValue(":dos",  $dos);
        $statement->bindValue(":exame",  $exame);
        $statement->bindValue(":dataAgora",  $dataAgora);
        $statement->bindValue(":transferencia",  $transferencia);
        $statement->bindValue(":alta",  $alta);

        $statement->execute();
    }
}