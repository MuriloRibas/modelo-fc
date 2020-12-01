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
            $q = $this->db->query("SELECT a.id id_medico, a.nome, (SELECT GROUP_CONCAT(CONCAT(b.id, ',', DATE_FORMAT(b.data_horario, '%d-%m-%Y %H:%i'), ',', b.horario_agendado) SEPARATOR ';') AS data_horarios FROM teste_fc.horarios b WHERE b.id_medico = a.id) AS data_horarios FROM teste_fc.medico a;");
            
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

    public function queryOneJoin($id) {
        try {
            $q = $this->db->query("SELECT teste_fc.medico.id, teste_fc.medico.nome, GROUP_CONCAT(CONCAT(teste_fc.horarios.id, ',', DATE_FORMAT(teste_fc.horarios.data_horario, '%d-%m-%Y %H:%i'), ',', teste_fc.horarios.horario_agendado) SEPARATOR ';') data_horarios FROM teste_fc.horarios INNER JOIN teste_fc.medico ON teste_fc.horarios.id_medico = teste_fc.medico.id WHERE teste_fc.medico.id = $id;");
            
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

    public function delete($table, $condition) {
        try {
            $q = $this->db->delete($table, $condition);
        } catch(Exception $e) {
            echo $e."<br/>";
        }
    }

    public function insert($table, $values) {
        try {
            $q = $this->db->insert($table, $values);
        } catch(Exception $e) {
            echo $e."<br/>";
        }
    }

}