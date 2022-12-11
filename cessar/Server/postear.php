<?php

include 'conectarse.php';
if (isset($_POST['publicar'])) {

// Recogida de datos al darle a publicar

    $autor = $_SESSION["username"]["usuario"];
    $post = $_POST['post'];
    $tema = $_POST['temas'];
    $titulo = $_POST['post_titulo'];
    $fecha = date('Y-m-d H:i:s');
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
    $nombre_imagen = 'post-img-' . substr(str_shuffle($permitted_chars), 0, 12) . '.';
    $nombre_imagen .= $extension;


// Pequeña validación para publicar(por longitud de tema y post)

    if (!empty($post) && strlen($post) > 10) {
        if (!empty($titulo) && strlen($titulo) > 5) {

            // Validación por tipo de imagen

            if ($fileType == "image/jpeg" || $fileType == "image/png") {

                // Mover la imagen a la carpeta de imagen y query para introducir los datos en la BBDD

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