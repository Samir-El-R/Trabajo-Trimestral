<?php
session_start();
session_start();
include 'conectarse.php';
$usuario = $_SESSION["username"]['usuario'];
$MyBBDD->consulta("UPDATE posts SET post_autor='admin' where post_autor='$usuario'");

// Query para borrar la fila de el usuario en la BBDD

$MyBBDD->consulta("DELETE FROM registro where usuario='$usuario'");


// Redirección a pagina principal

header("location: ../HTML/index.php");
