<?php
if (isset($_POST['posts'])) {
 $usuario = $_SESSION['username']['usuario'];
 $MyBBDD->consulta("SELECT * from posts where post_autor = '$usuario'");
 while($fila = $MyBBDD->extraer_registro()){
   echo $fila['post_titulo'];
   echo $fila['post_tema'];
 }
}
