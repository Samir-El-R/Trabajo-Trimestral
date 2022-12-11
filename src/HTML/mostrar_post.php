<?php
// Comenzamos la sesion 

session_start();
include '../Server/conectarse.php';

// Creamos las variables oportunas 
// La variable llamada "variable" la usamos para saber que post abrir y hacer las consultas oportunas
$variable = $_GET['variable'];
if (isset($_SESSION["username"])) {

    $usuario = $_SESSION["username"]["usuario"];
}


$MyBBDD->consulta("SELECT * FROM posts where post_id = '$variable'");
$fila = $MyBBDD->extraer_registro();
$post_autor = $fila['post_autor'];
$post_contenido = $fila['post_contenido'];
$post_imagen = $fila['post_imagen'];
$post_fecha = $fila['post_fecha'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/mostrar_post.css">
    <title>Post usuario
        <?php echo $post_autor; ?>
    </title>


</head>

<body>
    <!-- Incluimos el header -->
    <?php
    include('header.php');
    ?>
    <div class="general">
        <section class="post post__first">
            <section class="post__info">
                <div class="post__info__date">
                    <?php


                    // LLamamos a las variables, aqui se ve la fecha de cuando se creo el post
                    

                    echo $post_fecha ?>
                </div>
                <div class="post__info__post-id">
                    #<a href="#">1</a>
                </div>
            </section>

            <section class="post__author">
                <div class="post__author__username">
                    <img src="http://www.jptwellnesscircle.com/vbulletin/images/statusicon/user_offline.gif"
                        alt="Is Offline"> <a href="#">


                        <!-- Aqui se ve el autor del post -->


                        <?php echo $post_autor ?>
                    </a>
                </div>
                <div class="post__author__avatar">
                    <?php


                    // Aqui mostramos con una consulta la img de perfil del autor del post
                    

                    $MyBBDD->consulta("SELECT posts.post_autor, registro.usuario ,registro.imagen_perfil FROM posts INNER JOIN registro ON posts.post_autor = registro.usuario WHERE posts.post_id='$variable';");
                    $fila = $MyBBDD->extraer_registro();
                    echo " <img src='../imagen/img_perfil/" . $fila['imagen_perfil'] . "'>  "; ?>


                </div>
                <div class="post__author__join">
                    Fecha de incorporación : <br>
                    <?php


                    // Aqui mostramos la fecha de creacion del usuario que ha creado el post
                    

                    $MyBBDD->consulta("SELECT posts.post_autor, registro.usuario ,registro.fecha_creacion FROM posts INNER JOIN registro ON posts.post_autor = registro.usuario WHERE posts.post_id='$variable';");
                    $fila = $MyBBDD->extraer_registro();
                    echo $fila['fecha_creacion']; ?>
                </div>
                <div class="post__author__posts">
                    Posts :
                    <?php

                    // El numero de posts que tiene el usuario que ha creado el post
                    
                    $MyBBDD->consulta("SELECT posts.post_autor FROM posts WHERE posts.post_autor = '$post_autor'");
                    echo $MyBBDD->numero_filas(); ?>


                </div>
            </section>

            <div class="post__message">

                <!-- El contenido del post  -->

                <?php
                echo ($post_contenido);

                echo " <img src='../imagen/img_publicacion/" . $post_imagen . "'>  ";


                ?>

            </div>
        </section>

    </div>
    <div class="enviar_cometarios">

        <section id="app" <?php if (!isset($_SESSION["username"])) { echo 'style="display: none;"'; } ?>>>
            <div class="container">

                <form id="miFormulario" action="" method="post">
                    <div class="col-6">
                        <textarea type="text" name='comentario' placeholder="Escribe un comentario"></textarea>
                        <input type="submit" class='primaryContained' id="comentario" name="comentar"
                            onclick="miFuncion()" value="comentar">

                    </div>
                </form>
                <!--End Row -->
            </div>
            <!--End Container -->
        </section><!-- end App -->
        <section class="comentarios">
            <?php

            $MyBBDD->consulta("SELECT * FROM comentarios WHERE post_ref	 = '$variable'");
            if ($MyBBDD->numero_filas() > 0) {
            ?>

            <section class="numero_comentarios">
                <div class="cantidad_comentarios">
                    <h2>
                        hay
                        <span class="numero">
                            <?php echo ' ' . $MyBBDD->numero_filas() . ' '; ?>
                        </span>
                        comentarios
                    </h2>
                </div>
            </section>
            <br>
            <?php
                while ($fila = $MyBBDD->extraer_registro()) {


            ?>
            <div class="general">
                <section class="post post__first">
                    <section class="post__info">
                        <div class="post__info__date">
                            <?php echo $fila['fecha']; ?>
                        </div>
                    </section>

                    <section class="post__author">
                        <div class="post__author__username">


                            <!-- Aqui se ve el autor del post -->
                            <?php
                    $usuario_autor = $fila['coment_autor'];
                    echo $usuario_autor ?>
                            </a>
                        </div>

                    </section>

                    <div class="post__message">

                        <!-- El contenido del post  -->

                        <?php


                    echo $fila['contenido'];




                        ?>


                    </div>

            </div>
            <br>
            <?php
                }
            } else {
            ?>

            <section class="numero_comentarios">
                <div class="cantidad_comentarios">
                    <h2>no hay comentarios, sé el primero en comentar </h2>
                </div>
            </section>
            <br>
            <?php
            }


            ?>

        </section>
    </div>

    <style>
        .numero_comentarios {
            max-width: 640px;
            margin: 30px auto;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
        }

        .cantidad_comentarios {
            text-transform: uppercase;
            text-align: center;
            letter-spacing: 2px;
        }

        .numero {
            color: crimson;
        }

        .container {
            max-width: 640px;
            margin: 30px auto;
            background: #fff;
            border-radius: 8px;
            padding: 20px;
        }

        .container textarea {
            width: 100%;
            border: none;
            background: #E8E8E8;
            padding: 5px 10px;
            height: 50%;
            border-radius: 5px 5px 0px 0px;
            border-bottom: 2px solid #016BA8;
            transition: all 0.5s;
            margin-top: 15px;
        }

        .primaryContained {
            background: #016ba8;
            color: #fff;
            padding: 10px 10px;
            border: none;
            margin-top: 0px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 4px;
            box-shadow: 0px 2px 6px 0px rgba(0, 0, 0, 0.25);
            transition: 1s all;
            font-size: 10px;
            border-radius: 5px;
        }

        .primaryContained:hover {
            background: #9201A8;
        }
    </style>
    <?php


    if (isset($_POST['comentar'])) {

        // Recogida de datos al darle a comentar
    
        $variable;
        $usuario;
        $comentario = $_POST['comentario'];
        $fecha = date('Y-m-d H:i:s');

        // Pequeña validación para publicar(por longitud del comentario)
    
        if (!empty($comentario) && strlen($comentario) > 5) {

            $MyBBDD->consulta("INSERT INTO comentarios (contenido, fecha, post_ref, coment_autor) values ('$comentario','$fecha','$variable','$usuario')");
            echo ("<meta http-equiv='refresh' content='1'>");
        } else {
            echo '<script>alert("En comentario deben ser minimo 5 caracteres")</script>';
        }
    }

    ?>
</body>

</html>