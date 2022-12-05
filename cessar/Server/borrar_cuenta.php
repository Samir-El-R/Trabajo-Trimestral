<?php
session_start();
include 'conectarse.php';
$MyBBDD->consulta("DELETE FROM registro ");
header("location: ../HTML/index.php");
?>
 