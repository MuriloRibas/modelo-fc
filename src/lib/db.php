<?php 

namespace src\lib;

use Exception;

use PDO;
use PDOException;

class Db {

    private $name;
    private $host;
    private $user;
    private $pass;
    private $pdo;
    private $driver;
    private $error;

    public function __construct() {
        $this->name     =   DB_NAME;
        $this->host     =   DB_HOST;
        $this->user     =   DB_USER;
        $this->pass     =   DB_PASS;
        $this->driver   =   DB_DRIVER;

        $this->pdo = $this->connect();
    }

    private function connect() {
        $config = $this->driver . ":". "host=" . $this->host . ";dbName=".$this->name.";";
        try {
            echo 'Ok';
            return new PDO($config, $this->user, $this->pass);
        } catch(PDOException $err) {
            throw new Exception("Erro durante conexão com banco.");
        }
    }

    public function query($sql, $data_array = null ) {

        $query  = $this->pdo->prepare( $sql );
        $exec   = $query->execute( $data_array );

        if ( $exec ) {
            return $query;
        } else {
            $error       = $query->errorInfo();
            $this->error = $error[2];

            throw new Exception($this->error);
        }
    }

    public function update($table, $values, $condition) {
        $stmt = "UPDATE $table SET $values WHERE $condition";
        echo $stmt;
        $insert = $this->query( $stmt );
        
        return;
    }

}