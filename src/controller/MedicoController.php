<?php
namespace src\controller;
use src\model\MedicoModel;

class MedicoController {

    public function __construct() {
        $this->m = new MedicoModel();
    }

    public function index() {
        $data = $this->m->list();
        return require_once('../src/view/layout.php');
    }

    public function editar($id) {
        $data = $this->m->queryOne($id);
        return require_once('../src/view/edit.php');
    }

    public function edit($id) {
        $data = $this->m->queryOne($id);

        if ( (isset($_POST["new_pass"]) && ($_POST["new_pass"] != "" ) ) ) {
            if ( (isset($_POST["last_pass"]) && (password_verify($_POST["last_pass"], $data["senha"])) && (preg_match('/\w{6,}/', $_POST["new_pass"]))) ) {
                try {

                    $name = $_POST["name"];
                    $encryPass = password_hash($_POST["new_pass"], PASSWORD_DEFAULT); 
                    $this->m->update("teste_fc.medico", "teste_fc.medico.senha = '$encryPass', teste_fc.medico.nome = '$name'", "teste_fc.medico.id = $id");
                    
                    $data = $this->m->list();
                    return require_once('../src/view/layout.php'); 

                } catch (Exception $e) {
                    $err = $e; 
                    return require_once('../src/view/edit.php');
                }
            } else {
                $err = "Senha incorreta.";
                return require_once('../src/view/edit.php');
            }
        } else {
            try {
                $name = strval($_POST["name"]);
                $this->m->update("teste_fc.medico", "teste_fc.medico.nome = '$name'", "teste_fc.medico.id = $id");
                
                $data = $this->m->list();
                return require_once('../src/view/layout.php'); 
            } catch (Exception $e) {
                $err = $e; 
                return require_once('../src/view/edit.php');
            }
        }
    }

    public function agendar($id) {
        echo "ok";
        $this->m->update("teste_fc.horarios", "teste_fc.horarios.horario_agendado = 1", "teste_fc.horarios.id = $id");
        $data = $this->m->list();
        return require_once('../src/view/layout.php');
    }

    public function horarios($id) {
        $data = $this->m->queryOneJoin($id);
        return require_once('../src/view/horaries.php');
    }

    public function horary($id) {
        if ( (isset($_POST["datepicker"]) && isset($_POST["hour"]) ) ) {
            $dateArr = explode("-", $_POST["datepicker"]);
            $year = $dateArr[2];
            $dateArr[2] = $dateArr[0];
            $dateArr[0] = $year;
            $date = implode("/", $dateArr);
            $dateAndHour = $date.' '.$_POST["hour"];

            $this->m->insert("teste_fc.horarios(id_medico, data_horario, horario_agendado)", "$id, '$dateAndHour', 0");

            $data = $this->m->queryOneJoin($id);
            return require_once('../src/view/horaries.php');
        } else {
            $err = "Forneça uma data.";
            $data = $this->m->queryOneJoin($id);
            return require_once('../src/view/horaries.php');
        }
    }

    public function horary_delete($id) {
        $this->m->delete("teste_fc.horarios", "teste_fc.horarios.id = $id");

        $data = $this->m->list();
        return require_once('../src/view/layout.php');
    }

    public function criar() {
        return require_once('../src/view/create.php');
    }

    public function create() {
        
        if ( (isset($_POST["name"])) && (isset($_POST["email"])) && (isset($_POST["new_pass"]))) {
            if (preg_match('/\w{6,}/', $_POST["new_pass"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $encryPass = password_hash($_POST["new_pass"], PASSWORD_DEFAULT); 
                
                $this->m->insert("teste_fc.medico(email, nome, senha)", "'$email', '$name', '$encryPass'");
    
                return require_once('../src/view/create.php');
            } else {
                $e = "Senha inválida";
                return require_once('../src/view/create.php');
            }
        } else {
            $e = "Preencha todos os campos";
            return require_once('../src/view/create.php');
        }
    }
}

