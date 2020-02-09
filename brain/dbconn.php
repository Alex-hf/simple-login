<?php
/* Objeto de la conexión de base de datos */

class dbConn {

    private $host;
    private $user;
    private $pass;
    private $dbname;

    public $conn = [0, "", NULL]; // Almacenaje de un estado, mensaje y conexión (Estado 0 => Error, Estado 1 => Conectado)

    public function __construct($host, $user, $pass, $dbname){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
    }

    public function createConn(){
        try {

            $connect = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = [1, "Conectado a la base de datos", $connect];


        } catch(PDOException $e){
            $this->conn = [0, $e->getMessage(), NULL];
        }
    }

}