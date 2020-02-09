<?php
include_once '../brain/main.php';

if(isset($_POST['user']) && isset($_POST['nombre']) && isset($_POST['passw']) && isset($_POST['descr'])){

    if(!empty($_POST['user']) && !empty($_POST['nombre']) && !empty($_POST['passw']) && !empty($_POST['descr'])){
        
        $user = new user(NULL, $_POST['user'], $_POST['nombre'], $_POST['passw'], $_POST['descr']);
        $reg = $user->register($conexion);
        if($reg[0]){
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['userid'] = $reg[1];
            header("Location: ../home.php");
        } else {
            echo "Ocurrió un error: Usuario no disponible o introduciste un caracter indebido";
        }

    } else {
        echo "No dejes campos vacios";
    }

} else {
    echo "Algun dato no se envió correctamente";
}