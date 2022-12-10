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
   
</body>
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
    
            echo " <img src='../imagen/img_publicacion/" .$post_imagen. "'>  "; 
            

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

</html>