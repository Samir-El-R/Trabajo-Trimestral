<?php
session_start();
include 'conectarse.php';

$variable = $_GET['variable'];
$MyBBDD->consulta("SELECT * FROM posts where post_id = '$variable'");
$cantidad = 0;
$fila = $MyBBDD->extraer_registro();


echo '<div class="columna">';
echo "<div class='titulo_autor'>";
echo "<div class='titulo'>" . $fila['post_titulo'] . '</div>';

echo "<div class='tema'>Tema : " . $fila['post_tema'] . '</div>';
echo "<div class='autor'> <div class='foto'> 
                <img class='imagen' src='../imagen/img_publicacion/"
    . $fila['post_imagen'] . "'></div>";
echo $fila['post_autor'];
echo '</div>';
echo '</div>';
