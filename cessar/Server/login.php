<?php
include 'conectarse.php';
session_start();

// recoger datos de inicio sesión

$usuario = $_POST['usuario_login'];
$contrasena = $_POST['contrasena_login'];

if (true) {
  $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario' AND contrasena = '$contrasena'");
  
  if ($MyBBDD->numero_filas() > 0) {
   
// Se asigna el nombre de usuario como un valor a la $_SESSION["username"]

    $fila = $MyBBDD->extraer_registro();
    $_SESSION["username"] = $fila['usuario'];

    // Redirección a página principal

    header("location: ../HTML/index.php");

  } else {
    
    // Si no existe el usuario introducido se mantiene en la pagina de inicio sesión

    header("location: ../HTML/acceder.php");
  }
} else {
  header("location: ../HTML/acceder.php");
}
