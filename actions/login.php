<?php
include_once '../brain/main.php';

if(isset($_POST['user']) && isset($_POST['passw'])){

    $res = user::login($conexion, $_POST['user'], $_POST['passw']);

    if($res[0]){
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['userid'] = $res[1];
        header("Location: ../home.php");
    } else {
        header("Location: ../");
    }

}