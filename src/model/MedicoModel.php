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
            $q = $this->db->query("SELECT teste_fc.horarios.id id_horario, teste_fc.medico.id id_medico, teste_fc.medico.nome, GROUP_CONCAT(teste_fc.horarios.data_horario) data_horarios FROM teste_fc.horarios INNER JOIN teste_fc.medico ON teste_fc.horarios.id_medico = teste_fc.medico.id GROUP BY id_medico;");

            return $q->fetchAll();
        } catch(Exception $e) {
            echo $e."<br/>";
        }
    }

}