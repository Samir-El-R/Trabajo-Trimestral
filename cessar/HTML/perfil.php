<?php
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

      $usuario = $_SESSION['username'];
      $MyBBDD->consulta("SELECT * FROM registro where usuario='$usuario'");
      $fila = $MyBBDD->extraer_registro();
      $info_apellido = $fila['apellido'];
      $info_nombre = $fila['nombre'];
      $info_usuario = $fila['usuario'];
      $info_fecha = $fila['fecha_creacion'];

      echo ' <div class="container">
      <div class="perfil">
        <img class="perfil-foto" src="#" alt="futura foto de usuario" />
        <div class="titulo"> ';
      echo "<h1>";
      echo "Nombre ".$info_nombre . "  Apellido " . $info_apellido;
      echo "</h1>";
      echo '<h3 class="h3">';
      echo "Usuario : ".$info_usuario;
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
      // }
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
                  if (isset($_POST['enviar'])) {
                    $contrasena_nueva = $_POST['contrasena'];
                    $contrasena_nueva_confirmacion = $_POST['contrasena2'];
                    $usuario = $_SESSION['username'];
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


          <div id="todos_mis_posts">
            <span class="button" > Todos mis posts</span>
          </div>


          <div> <a class="button" href="">Cambiar imagen de perfil</a></div>
          <div> <a class="button" href="../Server/borrar_cuenta.php">Borrar cuenta</a></div>
          </ul>

        </div>



    </div>

    <div id="contenedor_posts">
      <div class="contenedor_posts" >

      <a class="cerrar_posts" id="cerrar_post" href="#">&times;</a>

      <?php
      $usuario = $_SESSION['username'];
      $MyBBDD->consulta("SELECT * from posts where post_autor = '$usuario'");
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



      ?>
</div >
    </div>

    <script>

      let boton_posts = document.getElementById('todos_mis_posts');
      let contenedor_posts = document.getElementById('contenedor_posts');
      let main = document.getElementsByTagName("body");
let cerrar_post = document.getElementById("cerrar_post");

      boton_posts.addEventListener("click",function () {
        contenedor_posts.style.visibility = "visible";
          document.documentElement.setAttribute("style", "overflow-Y: scroll;");
      })
  
      cerrar_post.addEventListener("click",function () {
        contenedor_posts.style.visibility = "hidden";
          document.documentElement.setAttribute("style", "overflow-Y: hidden;");
      })

    </script>

  </main>

</body>

</html>