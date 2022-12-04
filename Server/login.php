<?php
include 'conectarse.php';
session_start();

$usuario = $_POST['usuario_login'];
$contrasena = $_POST['contrasena_login'];
if (true) {
  $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario' AND contrasena = '$contrasena'");
  
  if ($MyBBDD->numero_filas() > 0) {
   

    $fila = $MyBBDD->extraer_registro();
    $_SESSION["username"] = $fila['usuario'];
    header("location: ../HTML/index.php");
  } else {
    // echo "<script> alert('la contraseña o el usuario son incorrectos')</script>";
    // echo json_encode("no existe");
  }
} else {
  header("location: ../HTML/acceder.php");
}
