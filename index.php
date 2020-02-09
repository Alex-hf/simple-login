<?php
include_once 'brain/main.php';
if(isset($_SESSION['user'])){
    header("Location: /home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicia sesión</title>
</head>
<body>
    <h3>Inicio de sesión</h3>
    <form action="actions/login.php" method="post">

        <input type="text" name="user" placeholder="Usuario"><br><br>
        <input type="password" name="passw" placeholder="********"><br><br>
        <input type="submit" value="Entrar">

    </form>

    <h3>Registro</h3>
    <form action="actions/register.php" method="post">

        <input type="text" name="user" placeholder="Usuario"><br><br>
        <input type="text" name="nombre" placeholder="Nombre"><br><br>
        <input type="password" name="passw" placeholder="********"><br><br>
        <input type="text" name="descr" placeholder="Descripción"><br><br>
        <input type="submit" value="Entrar">

    </form>

</body>
</html>