<?php

include 'conectarse.php';
if (isset($_POST['publicar'])) {
    $autor = $_SESSION["username"];
    $post = $_POST['post'];
    $tema = $_POST['temas'];
    $titulo = $_POST['post_titulo'];
    $fecha = date('Y-m-d H:i:s');
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $nombre_imagen = 'imagen-' . substr(str_shuffle($permitted_chars), 0, 10) . '.';
    $nombre_imagen .= $extension;

    if (!empty($post) && strlen($titulo) > 10) {
        if (!empty($titulo) && strlen($titulo) > 5) {
            if ($fileType == "image/jpeg" || $fileType == "image/png") {

                move_uploaded_file($_FILES['file']['tmp_name'], "../imagen/img_publicacion/$nombre_imagen");

                $MyBBDD->consulta("INSERT INTO posts (post_contenido,post_fecha,post_autor,post_tema,post_titulo,post_imagen) values ('$post','$fecha','$autor','$tema','$titulo','$nombre_imagen')");
            } else {

                echo "Formato no valido";
            }
        } else {
            echo '<script>alert("titulo corto")</script>';
        }
    } else {
        echo '<script>alert("En post deben ser minimo 10 caracteres")</script>';
    }
}