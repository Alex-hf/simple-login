<?php
include_once 'brain/main.php';

if(!isset($_SESSION['user'])){
    header("Location: /");
} 
?>
<br>
Bienvenido <?=$usuario->nombre?>, has iniciado sesion correctamente.<br>
usuario: <?=$usuario->user?><br>
nombre: <?=$usuario->nombre?><br>
descripcion: <?=$usuario->descripcion?><br>
<a href="logout.php">Salir</a>
