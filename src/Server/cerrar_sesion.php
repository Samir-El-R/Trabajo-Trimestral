<?php
session_start();

// Finalizamos la sesion para cerrar sesión

session_destroy();

// Redirección a pagina principal

header("location: ../HTML/index.php");
?>