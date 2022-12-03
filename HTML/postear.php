<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postear</title>

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
                <form method="post" action="../Server/postear.php" enctype="multipart/form-data">
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
   
</body>

</html>