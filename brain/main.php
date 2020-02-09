<?php
/* Este es el lugar donde todo se conecta, aquí importamos todos los archivos de php
   para que empiecen a trabajar juntos
*/

session_start();

//Importación de archivos
include_once 'dbconn.php';
include_once 'user/user.php';

// Variables de conexión a la base de datos
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "simple-login";
$conexion = NULL; // Conexión

// Realizar la conexión
$Conn = new dbConn($db_host, $db_user, $db_pass, $db_name);
$Conn->createConn();
if($Conn->conn[0] == 0){
    echo $Conn->conn[1];
    die();
} else {
    $conexion = $Conn->conn[2];
}


if(isset($_SESSION['userid'])){
    $usuario = user::createUserById($conexion, $_SESSION['userid']);
}