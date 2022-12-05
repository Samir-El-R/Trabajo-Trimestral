<?php
session_start();
include 'conectarse.php';

// query para borrar la fila de el usuario en la BBDD

$MyBBDD->consulta("DELETE FROM registro ");

// Redirección a pagina principal

header("location: ../HTML/index.php");
?>
 