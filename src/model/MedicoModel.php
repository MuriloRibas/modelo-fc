<?php
namespace src\model;
use Exception;
use src\lib\db;


class MedicoModel {
    
    private $db;

    public function __construct() {
        $this->db = new db();
    }

    public function list() {
        try {
            $q = $this->db->query("SELECT teste_fc.horarios.id id_horario, teste_fc.medico.id id_medico, teste_fc.medico.nome, GROUP_CONCAT(CONCAT(teste_fc.horarios.id, ',', teste_fc.horarios.data_horario, ',', teste_fc.horarios.horario_agendado) SEPARATOR ';') data_horarios FROM teste_fc.horarios INNER JOIN teste_fc.medico ON teste_fc.horarios.id_medico = teste_fc.medico.id GROUP BY teste_fc.medico.id;");
            
            return $q->fetchAll();
        } catch(Exception $e) {
            echo $e."<br/>";
        }
    }

    public function queryOne($id) {
        try {
            $q = $this->db->query("SELECT teste_fc.medico.id, teste_fc.medico.nome, teste_fc.medico.senha FROM teste_fc.medico WHERE teste_fc.medico.id = $id");
            
            return $q->fetch();
        } catch(Exception $e) {
            echo $e."<br/>";
        }
    }

    public function update($table, $values, $condition) {
        try {
            $q = $this->db->update($table, $values, $condition);
        } catch(Exception $e) {
            echo $e."<br/>";
        }
    }

}