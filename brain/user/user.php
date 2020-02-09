<?php

class user {

    public $id;
    public $user;
    public $nombre;
    private $password;
    public $descripcion;

    public function __construct($id, $user, $nombre, $password, $descripcion){
        $this->id = $id;
        $this->user = $user;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->descripcion = $descripcion;
    }

    public function register($dbconn){

        $stmt = $dbconn->prepare('INSERT INTO usuarios (usuario, nombre, password, descripcion) VALUES (?, ?, ?, ?)');
        $stmt->execute([$this->user, $this->nombre, $this->password, $this->descripcion]);

        $getId = $dbconn->prepare("SELECT * FROM usuarios WHERE usuario = ? LIMIT 1");
        $getId->execute([$this->user]);

        $row = $getId->fetch(PDO::FETCH_ASSOC);

        if($stmt){
            return [true, $row['id']];
        } else {
            return [false, 0];
        }

    }

    public static function login($dbconn, $user, $pass){
        $stmt = $dbconn->prepare('SELECT * FROM usuarios WHERE usuario = ? AND password = ? LIMIT 1');
        $stmt->execute([$user, $pass]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['usuario'] == $user && $row['password'] == $pass){
            return [true, $row['id']];
        } else {
            return [false, 0];
        }
    }

    public static function createUserById($dbconn, $id){
        $stmt = $dbconn->prepare("SELECT * FROM usuarios WHERE id = ? LIMIT 1");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt){
            return new user($row['id'], $row['usuario'], $row['nombre'], $row['password'], $row['descripcion']);
        } else {
            return NULL;
        }

    }


}