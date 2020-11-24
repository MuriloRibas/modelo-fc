<?php 
    require_once("../vendor/autoload.php");
    require_once("./config.php");
    require_once("./model/config-banco-dados.php");
    
    (new \src\core\RouterCore());
?>