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
                    echo $encryPass;
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
        $this->m->update("teste_fc.horarios", "teste_fc.horarios.horario_agendado = 0", "teste_fc.horarios.id = $id");
        $data = $this->m->list();
        return require_once('../src/view/layout.php');
    }

}

