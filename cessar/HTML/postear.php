<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="postear.css">
    <title>Postear</title>

    <style>

/* Style de pagina post */

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
    session_start();
    require 'header.php';
    ?>
    <main>

        <!-- Formulario para rellenar informacion relevante de cada post -->

        <div class="formulario">
            <div class="post_formulario">
                <form method="post" enctype="multipart/form-data">

                    <!-- Select para seleccionar tema de post -->

                    <label for="tema">Escoge Tema:</label>
                    <select name="temas" id="temas" require>
                        <option value="general">General</option>
                        <option value="rutinas">Rutinas</option>
                        <option value="culturismo">Culturismo</option>
                        <option value="dietas">Dietas</option>
                        <option value="ciclos">Ciclos</option>
                    </select>
                    <br>

                    <!-- Selección de titulo para el post -->

                    <label for="post_titulo">Titulo del Post</label>
                    <input type="text" name="post_titulo" id="post_titulo">
                    <br>

                    <!-- Selección de imagen para el post -->

                    <label for="file">seleccion img </label>
                    <input type="file" name="file" id="file" accept="image/png, image/jpeg"><br>

                    <!-- Selección de contenido para el post -->

                    <label for="post_contenido">Contenido post:</label>
                    <textarea name="post" id="contenido" cols="30" rows="10"></textarea>

                    <!-- Botón para mandar la información -->

                    <input type="submit" value="Publicar" id="publicar" name="publicar">
                </form>
            </div>
        </div>
    </main>
   <?php
    require '../Server/postear.php';
    ?>
</body>

</html>