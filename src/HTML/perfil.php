<?php
// Iniciamos la sesion
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/perfil.css">
  <title>Perfil</title>
</head>

<body>


  <!-- Apartado donde ira toda la informacion del usuario con sus respectivas variables etc -->
  <main>
    <div class="main">

      <?php
      require 'header.php';
      include '../Server/conectarse.php';
      echo '
    <style>
    #boton_acceder{
        display:none;
    }
    </style>
    ';

      $usuario = $_SESSION['username']['usuario'];

      $info_apellido = $_SESSION['username']['apellido'];
      $info_nombre = $_SESSION['username']['nombre'];
      $info_usuario = $_SESSION['username']['usuario'];
      $info_fecha = $_SESSION['username']['fecha'];
      $info_imagen = $_SESSION['username']['imagen'];
      echo ' <div class="container">
      <div class="perfil">
        <img class="perfil-foto" src="../imagen/img_perfil/' . $info_imagen . '" alt="futura foto de usuario" />
        <div class="titulo"> ';
      echo "<h1>";
      echo "Nombre " . $info_nombre;
      echo "</h1>";
      echo "<h1>";
      echo " Apellido " . $info_apellido;
      echo "</h1>";
      echo '<h3 class="h3">';
      echo "Usuario : " . $info_usuario;
      echo "</h3>";
      echo '</div>
      </div>
      <div class="titulo"> ';
      echo '<h1>';
      echo 'Descripción de ' . $info_usuario;
      echo '</h1>';
      echo '
      </div>
    <div class="contenedor_tabla">
<table >
  <tr>
    <td >Fecha de creacion:</td>';
      echo '<td>';
      echo $info_fecha;
      echo '</td>';
      echo '  </tr>
    <tr>';
      // Consulta donde mostramos los numeros de los posts que ha hecho el usuario de forma numérica
      $MyBBDD->consulta("SELECT * FROM posts where post_autor='$usuario'");

      echo '<td >Cantidad de posts:</td>';
      echo '<td>';
      echo $MyBBDD->numero_filas();
      ;
      echo '</td> ';
      echo '  </tr>
    </table>';
      echo '</div>';
      ?>

      <body>
        <div class="descripcion_lista">
          <!-- Apartado donde ira el cambio de contraseña -->
          <div class="box">
            <a class="button" href="#popup1">Cambiar Contraseña</a>
          </div>
          <div id="popup1" class="overlay">
            <div class="popup">
              <h2>Cambiar Contraseña</h2>
              <a class="close" href="#">&times;</a>
              <div class="content">


                <form class="form form-login" id="form-login" method="POST">

                  <p type="Contraseña nueva:" class="parrafo">
                    <br>
                    <input type="password" name="contrasena" id="contrasena1"
                      placeholder="Introduce las nueva contraseña">
                  </p>



                  <p type="Confirmar nueva contraseña:" class="parrafo">
                    <br>
                    <input type="password" name="contrasena2" id="contrasena2"
                      placeholder="Confirma tu nueva contraseña">
                  </p>

                  <div class="botones">
                    <div>
                      <button type="submit" name="enviar" id="enviar_cambio_contrasena"
                        class="btn-signup">Enviar</button>
                    </div>
                    <div>
                      <button type="reset" class="btn-signup">Limpiar</button>
                    </div>
                  </div>
                  <?php

                  // PHP que valida y cambia el cambio de contraseña una vez enviados
                  
                  if (isset($_POST['enviar'])) {
                    $contrasena_nueva = $_POST['contrasena'];
                    $contrasena_nueva_confirmacion = $_POST['contrasena2'];
                    $usuario = $_SESSION['username']['usuario'];
                    $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

                    if ($contrasena_nueva == $contrasena_nueva_confirmacion) {
                      $fila = $MyBBDD->extraer_registro();
                      $contrasena_BBDD = $fila['contrasena'];
                      if ($contrasena_nueva != $contrasena_BBDD) {
                        $MyBBDD->consulta("UPDATE registro SET contrasena = '$contrasena_nueva' where usuario = '$usuario'");
                        echo '<script>alert("La contraseña ha cambiado")</script>';
                      } else {
                        echo '<script>alert("La contraseña es igual a la que tienes")</script>';
                      }
                    } else {
                      echo '<script>alert("Las contraseñas no valen");</script>';
                    }
                  }
                  ?>
                </form>
              </div>
            </div>
          </div>

          <!-- Boton que muestra todos tus posts -->
          <div id="todos_mis_posts">
            <span class="button"> Todos mis posts</span>
          </div>

          <!-- Cambiar imagen de perfil  -->

          <div class="box_img">
            <a class="button" href="#popup_img">Cambiar imagen de perfil </a>
          </div>
          <div id="popup_img" class="overlay_img">
            <div class="popup_img">
              <h2>Cambiar Imagen</h2>
              <a class="close" href="#">&times;</a>
              <div class="content">


                <form action="" method="POST" enctype="multipart/form-data">

                  <p type="Selecciona la imagen:" class="parrafo">
                    <br>

                  <div onclick="getFile()" class="button__img">
                    Subir imagen Perfil
                  </div>
                  <span style='display: none;'>

                    <input type="file" name="file" id="file" value="upload" accept="image/png, image/jpeg">
                  </span>

                  </p>
                  <div class="botones_img">
                    <div>
                      <button type="submit" name="cambiar_img" id="enviar_img" class="btn-signup">Cambiar</button>
                    </div>
                    <div>
                      <button type="reset" class="btn-signup">Cancelar</button>
                    </div>
                  </div>
                  <?php
                  // PHP que lo que hace es cambiar la img de perfil que tenias por una nueva
                  if (isset($_POST['cambiar_img'])) {

                    $fileName = $_FILES['file']['name'];
                    $fileType = $_FILES['file']['type'];
                    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                    $nombre_imagen_perfil = 'perfil-' . substr(str_shuffle($permitted_chars), 0, 12) . '.';
                    $nombre_imagen_perfil .= $extension;
                    if ($fileType == "image/jpeg" || $fileType == "image/png") {
                      move_uploaded_file($_FILES['file']['tmp_name'], "../imagen/img_perfil/$nombre_imagen_perfil");

                      $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");
                      $fila = $MyBBDD->extraer_registro();
                      $borrar_imagen = $fila['imagen_perfil'];
                      if ($borrar_imagen != "perfil-por-defecto.png") {
                        unlink('../imagen/img_perfil/' . $borrar_imagen);
                        $MyBBDD->consulta("UPDATE registro SET imagen_perfil='$nombre_imagen_perfil' where usuario='$usuario'");
                        $_SESSION['username']['imagen'] = $nombre_imagen_perfil;
                        echo ("<meta http-equiv='refresh' content='1'>");
                      } else {
                        $MyBBDD->consulta("UPDATE registro SET imagen_perfil='$nombre_imagen_perfil' where usuario='$usuario'");
                        $_SESSION['username']['imagen'] = $nombre_imagen_perfil;
                        echo ("<meta http-equiv='refresh' content='1'>");
                      }
                    } else {

                      echo "Formato no valido";
                    }
                  }

                  ?>
                </form>
              </div>
            </div>
          </div>

          <!-- Boton de borrar cuenta que te llevara a otro archivo que ejecutara la accion -->
          <div class="borrar_cuenta"> <span><a class="button" href="../Server/borrar_cuenta.php">Borrar
                cuenta</a></span></div>






        </div>

        <!-- Contenedor donde saldran los posts si pulsas el anterior boton -->
        <div id="contenedor_posts">
          <div class="contenedor_posts">

            <a class="cerrar_posts" id="cerrar_post" href="#">&times;</a>

            <?php
            $usuario = $_SESSION['username']['usuario'];
            $MyBBDD->consulta("SELECT * from posts where post_autor = '$usuario'");
            if ($MyBBDD->numero_filas() > 0) {
              $x = 1;
              $numero_filas = $MyBBDD->numero_filas();
              for ($i = 0; $i < $numero_filas; $i++) {
                $fila = $MyBBDD->extraer_registro();
                if ($i == $numero_filas) {
                  break;
                } else {
                  echo '<div class="columna">';
                  echo "<div class='titulo_autor'>";
                  echo "<div class='titulo'>Titulo del Post " . $x . "   " . $fila['post_titulo'] . '</div>';

                  echo "<div class='tema'>Tema del post : " . $fila['post_tema'] . '</div>';
                  echo "<div class='autor'> <div class='foto'> 
              <img class='imagen' src='../imagen/img_publicacion/"
                    . $fila['post_imagen'] . "'></div>";
                  echo $fila['post_autor'];
                  echo '</div>';
                  echo '</div>';
                  $x++;
                }
              }
            } else {

              echo "<h2>Todavia no has posteado </h2>";
            }




            ?>
          </div>
        </div>
        <!-- Script que muestra u oculta el div de mostrar los posts del usuario -->
        <script>
          let boton_posts = document.getElementById('todos_mis_posts');
          let contenedor_posts = document.getElementById('contenedor_posts');
          let main = document.getElementsByTagName("body");
          let cerrar_post = document.getElementById("cerrar_post");

          boton_posts.addEventListener("click", function () {
            contenedor_posts.style.visibility = "visible";
            document.documentElement.setAttribute("style", "overflow-Y: scroll;");
          })

          cerrar_post.addEventListener("click", function () {
            contenedor_posts.style.visibility = "hidden";
            document.documentElement.setAttribute("style", "overflow-Y: hidden;");
          })

          function getFile() {
            document.getElementById("file").click();
          }
        </script>

  </main>

</body>

</html>