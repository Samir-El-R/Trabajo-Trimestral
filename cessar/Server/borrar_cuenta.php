<?php
session_start();
include 'conectarse.php';
$MyBBDD->consulta("DELETE FROM registro where usuario = '{$_SESSION['username']}'");
header("location: ../HTML/index.php");
?>
 