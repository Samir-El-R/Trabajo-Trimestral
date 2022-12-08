<?php
  session_start();
include 'conectarse.php';

$_SESSION["username"] = array();


// recoger datos de inicio sesión
$usuario = $_POST['usuario_login'];
$contrasena = $_POST['contrasena_login'];

if (true) {
  $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario' AND contrasena = '$contrasena'");
  
  if ($MyBBDD->numero_filas() > 0) {
    
    // Se asigna el nombre de usuario como un valor a la $_SESSION["username"]
    
    $fila = $MyBBDD->extraer_registro();
    $_SESSION["username"]["usuario"] = $fila['usuario'];
    $_SESSION["username"]["imagen"] = $fila['imagen_perfil'];
    $_SESSION["username"]["nombre"] = $fila['nombre'];
    $_SESSION["username"]["apellido"] = $fila['apellido'];
    $_SESSION["username"]["fecha"] = $fila['fecha_creacion'];
    $_SESSION["username"]["correo"] = $fila['email'];
    

    // Redirección a página principal
    header("location: ../HTML/index.php");
  } else {

    // Si no existe el usuario introducido se mantiene en la pagina de inicio sesión
    

    header("location: ../HTML/acceder.php");
  }
} else {
  header("location: ../HTML/acceder.php");
}
