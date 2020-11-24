<?php
namespace src\controller;
use src\model\MedicoModel;

class ExController {

    public function __construct() {
        $this->m = new MedicoModel();
    }

    public function index() {
        $data = $this->m->list();
        return require_once('../src/view/layout.php');
    }

    public function none() {
        return require_once('../src/view/none.php');
    }
}