<?php
// Comenzamos la sesion 

session_start();
include '../Server/conectarse.php';

// Creamos las variables oportunas 
// La variable llamada "variable" la usamos para saber que post abrir y hacer las consultas oportunas
$variable = $_GET['variable'];

$usuario = $_SESSION["username"]["usuario"];
// $info_fecha = $_SESSION["username"]["fecha"];
// $info_imagen = $_SESSION["username"]["imagen"];
// $info_correo = $_SESSION["username"]["correo"];


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
                    <img src="http://www.jptwellnesscircle.com/vbulletin/images/statusicon/user_offline.gif" alt="Is Offline"> <a href="#">


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
                <!-- <div class="post__message__options">
                                        <a href="#">
                                            <img src="http://www.jptwellnesscircle.com/vbulletin/images/buttons/quote.gif" alt="Quote">
                                        </a>
                                    </div> -->

            </div>
        </section>











        <!-- Esta parte del codigo sirve por si ponemos las respuestas al post , si lo descomentais veis como queda , si lo hacemos cambiamos el estilo -->





        <!-- <section class="post post__last">
        <section class="post__info">
            <div class="post__info__date">21-08-2018, 11:03 AM</div>
            <div class="post__info__post-id">
                #<a href="#">2</a> |
                <a href="#">
                    <img src="https://st.forocoches.com/foro/images/buttons/report.png"
                        style="position:relative;top: 4px;" alt="Report this post">
                </a>
            </div>
        </section>

        <section class="post__author">
            <div class="post__author__username">
                <img src="http://www.jptwellnesscircle.com/vbulletin/images/statusicon/user_offline.gif"
                    alt="Is Offline"> <a href="#">Another User</a>
            </div>
            <div class="post__author__rank">
                Member
            </div>
            <div class="post__author__avatar">
                <img src="https://kooledge.com/assets/default_medium_avatar-57d58da4fc778fbd688dcbc4cbc47e14ac79839a9801187e42a796cbd6569847.png"
                    alt="User Avatar">
            </div>
            <div class="post__author__join">
                Join date: Feb 2015
            </div>
            <div class="post__author__posts">
                Posts: 2.364
            </div>
        </section>

        <div class="post__message">
            Etiam dignissim enim vel augue volutpat viverra. Pellentesque vestibulum dolor ac nibh rutrum sodales. Etiam
            mollis euismod venenatis. Nunc vitae elit in metus sagittis mollis sit amet at magna. Nulla placerat nisi
            nunc, at iaculis augue accumsan venenatis. Curabitur tincidunt nisi vel ligula dapibus imperdiet. Donec
            ultricies mi sed leo posuere convallis. <img
                src="https://st.forocoches.com/foro/images/smilies/thumbsup.gif" alt="thumbs-up">
            <p>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/1dH7BO6pqlQ?rel=0" frameborder="0"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </p>

            <div class="post__message__options">
                <a href="#">
                    <img src="http://www.jptwellnesscircle.com/vbulletin/images/buttons/quote.gif" alt="Quote">
                </a>
            </div>
        </div>
    </section> -->

        <!-- <section class="thread__options">
        <div class="thread__options__reply">
            <a href="#"><img src="http://www.jptwellnesscircle.com/vbulletin/images/buttons/reply.gif"
                    alt="Post Reply"></a>
        </div>
        <div class="thread__options__pages-nav">
            <div class="thread__options__pages-nav__info">Page 1 of 3</div>
            <div class="thread__options__pages-nav__current">1</div>
            <div class="thread__options__pages-nav__next-page"><a href="#">2</a></div>
            <div class="thread__options__pages-nav__next-page"><a href="#">3</a></div>
            <div class="thread__options__pages-nav__go-to">
                <a href="# "><img src="https://st.forocoches.com/foro/images/misc/menu_open.gif" alt="Go To Page"></a>
            </div>
        </div>
    </section> -->

        <!-- <section class="thread__quick-reply">
        <div class="thread__quick-reply__title">
            Quick Reply
        </div>
        <div class="thread__quick-reply__editor">
            <label for="message">Message:</label>
            <textarea name="message" width="100%"></textarea>
        </div>
        <div class="thread__quick-reply__options">
            <button>Send Reply</button>
            <button>Advanced Mode</button>
        </div>
    </section>

    </section> -->
    </div>
    <div class="enviar_cometarios">
        <section id="app">
            <div class="container">

                <form id="miFormulario" action="" method="post">
                    <div class="col-6">
                        <textarea type="text" name='comentario' placeholder="Escribe un comentario"></textarea>
                        <input type="submit" class='primaryContained' id="comentario" name="comentar" onclick="miFuncion()" value="comentar">

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
            echo("<meta http-equiv='refresh' content='1'>");
        } else {
            echo '<script>alert("En comentario deben ser minimo 5 caracteres")</script>';
        }
    }

    ?>
</body>

</html>