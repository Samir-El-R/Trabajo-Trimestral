<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postear</title>
    <script src="../JavaScript/postear.js"></script>

    <style>
        body {
            background-color: #212121;
            color: white;
            height: 100%;
        }
        main{
            display: flex;
        }

        
        .post_formulario{
            display: flex;
            justify-content: center;
            border: 1px solid white;
        }

    </style>
</head>

<body>
    <?php


    include '../Server/conectarse.php';
    session_start();

    require 'header.php';
    ?>
    <main>
        <div class="formulario">
            <div class="post_formulario">
                <form method="post" enctype="multipart/form-data">
                    <label for="tema">Escoge Tema:</label>
                    <select name="temas" id="temas" require>
                        <option value="general">General</option>
                        <option value="rutinas">Rutinas</option>
                        <option value="culturismo">Culturismo</option>
                        <option value="dietas">Dietas</option>
                        <option value="ciclos">Ciclos</option>
                    </select>
                    <br>
                    <label for="post_titulo">Titulo del Post</label>
                    <input type="text" name="post_titulo" id="post_titulo">
                    <br>
                    <label for="file">seleccion img </label>
                    <input type="file" name="file" id="file" accept="image/png, image/jpeg"><br>
                    <textarea name="post" id="contenido" cols="30" rows="10"></textarea>
                    <input type="submit" value="Publicar" id="publicar" name="publicar">
                </form>
            </div>


        </div>
    </main>
    <?php
    if (isset($_POST['publicar'])) {
        $autor = $_SESSION["username"];
        $post = $_POST['post'];
        $tema = $_POST['temas'];
        $titulo = $_POST['post_titulo'];
        $fecha = date('Y-m-d H:i:s');
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];

        if (!empty($post) && strlen($titulo) > 10) {
            if (!empty($titulo) && strlen($titulo) > 5) {
                if ($fileType == "image/jpeg" || $fileType == "image/png") {
                    move_uploaded_file($_FILES['file']['tmp_name'], "../imagen/img_publicacion/$fileName");
                    $MyBBDD->consulta("INSERT INTO posts (post_contenido,post_fecha,post_autor,post_tema,post_titulo,post_imagen) values ('$post','$fecha','$autor','$tema','$titulo','$fileName')");
                } else {
                    echo '<script>alert("Formato no valido")</script>';
                }
            } else {
                echo '<script>alert("titulo corto")</script>';
            }
        } else {
            echo '<script>alert("En post deben ser minimo 10 caracteres")</script>';
        }
    }

    ?>
</body>

</html>