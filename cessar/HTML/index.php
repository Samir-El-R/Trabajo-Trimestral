<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .bienvenida {
            font-weight: bolder;
            margin-top: 25px;
            text-align: center;
            font-size: 30px;
            padding: 20px;
        }

        .p_temas {
            padding-top: 9px;
            background-color: #313131;
            display: flex;
            justify-content: center;
            text-align: center;
            font-size: 25px;
            font-weight: bolder;
        }

        body {
            font-weight: bolder;
            background-color: #212121;
        }

        main {
            z-index: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #212121;
            width: 100%;
            height: 100%;
            color: white;
        }

        .postear {
            justify-content: center;
            border: 1px solid white;
            height: 100%;
            width: 70%;
            z-index: 0;
            margin-top: 50px;
            display: flex;
            flex-direction: column;
        }

        .listas {
            background-color: #313131;
            width: 100%;
            height: 100%;
            text-align: center;


        }

        .columna {
            background-color: #212121;
            width: 100%;
            flex-direction: column;
        }

        .listas ul li {
            list-style: none;
        }

        .listas ul {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        a {
            text-decoration: none;
            color: #FFF;
        }

        .btn {

            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: transparent;
            border: 2px solid #e74c3c;
            border-radius: 0.6em;
            color: #e74c3c;
            cursor: pointer;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-align-self: center;
            -ms-flex-item-align: center;
            align-self: center;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1;
            margin: 20px;
            padding: 1.2em 2.8em;
            text-decoration: none;
            text-align: center;
            text-transform: uppercase;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        .btn:hover,
        .btn:focus {
            color: #fff;
            outline: 0;
        }

        .third {
            border-color: violet;
            color: white;
            background-color: black;
            -webkit-transition: all 150ms ease-in-out;
            transition: all 150ms ease-in-out;
        }

        .third:hover {
            box-shadow: 0 0 10px 0 #3498db inset, 0 0 10px 4px #3498db;
        }

        .ultimas_publicaciones {
            background-color: #313131;
            padding: 25px;
            display: flex;
            font-size: 25px;
            font-weight: bolder;
            justify-content: center;
        }

        /* inicio bloque post */


        .general_post {

            height: 100%;
            width: 100%;

        }

        .titulo_autor {
            border: 1px solid white;
        }

        .titulo {
            font-weight: bolder;
            height: 80px;
            margin-left: 30px;
            width: 100%;

            color: white;
            font-size: 25px;
        }

        .autor {
            font-weight: bolder;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding-right: 30px;
            height: 100px;
            width: 150px;
            color: white;
        }

        .tema {
            font-weight: bolder;
            height: 30px;
            padding-bottom: 50px;
            margin-left: 35%;
            width: 300px;
            color: white;
        }

        .foto {
            background-color: white;
            height: 60px;
            width: 70px;
        }

        .imagen {
            height: 60px;
            width: 70px;
        }
    </style>
</head>

<body>

    <?php
    require 'header.php';
    include '../Server/conectarse.php';
    ?>

    <main>

        <!-- Si hay algun usuario reistrado se le da la bienvenida -->

        <div class="bienvenida">
            <?php
            if (isset($_SESSION["username"])) {
                echo "Bienvenido " . $_SESSION["username"]["usuario"] . "!!";
            }
            ?>
        </div>

        <!-- Bloque de posts donde se dan unas opciones de filtro y se mostraran más abajo -->

        <div class="postear">
            <div class="p_temas">
                <p>Elegir tema:</p>
            </div>
            <div class="listas">
                <ul>

                    <!-- Listas con las opciones de temas de post -->

                    <div>
                        <li>
                            <form action="" method="post">
                                <input name="general" type="submit" value="General" class="btn third">

                            </form>
                        </li>
                    </div>
                    <div>
                        <li>
                            <form action="" method="post">
                                <input name="rutinas" type="submit" value="Rutinas" class="btn third">
                            </form>
                        </li>
                    </div>
                    <div>
                        <li>
                            <form action="" method="post">
                                <input name="ciclos" type="submit" value="Ciclos" class="btn third">
                            </form>
                        </li>
                    </div>
                    <div>
                        <li>
                            <form action="" method="post">
                                <input name="culturismo" type="submit" value="Culturismo" class="btn third">
                            </form>
                        </li>
                    </div>
                    <div>
                        <li>
                            <form action="" method="post">
                                <input name="dietas" type="submit" value="Dietas" class="btn third">
                            </form>
                        </li>
                    </div>

                </ul>


            </div>
            <div class="ultimas_publicaciones">
                <h4>Últimas publicaciones:</h4>
            </div>


            <?php
            echo '<style>
                            
             /* inicio bloque post */
     
   
     .titulo_autor{
         padding-top: 35px;  
         display:flex ;
         justify-content: space-between;
     }
     .titulo{
         height: 80px;
         margin-left: 30px;
         width:400px ; 
         
         color: white;
         font-size: 25px;
     }
     .autor{
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         margin-right: 30px;
         height: 100px;
         width:150px ; 
         color: white;
     }
     .tema{
         
         height: 30px;
         margin-top:50px;
         width:300px ; 
         color: white;
     }
     .foto{
         background-color: white;
         height: 60px;
         width: 70px;
     }
     
     
     
         </style>';

            // Printeo de los post dependiendo del tema que se haya seleccionado

            $valor = true;
            if (isset($_POST['general'])) {
                $valor = false;
                $MyBBDD->consulta("SELECT * FROM posts where post_tema = 'general'  order by post_fecha");
                $cantidad = 0;
                while ($fila = $MyBBDD->extraer_registro()) {
                    if ($cantidad >= 5) {
                        break;
                    } else {
                        $cantidad++;
        
                        echo "<a href='../Server/mostrar_post.php?variable=". $fila['post_id'] ."' >";
               
                        echo '<div class="columna">';
                        echo "<div class='titulo_autor'>";
                        echo "<div class='titulo'>" . $fila['post_titulo'] . '</div>';

                        echo "<div class='tema'>Tema : " . $fila['post_tema'] . '</div>';
                        echo "<div class='autor'> <div class='foto'> 
                            <img class='imagen' src='../imagen/img_publicacion/"
                            . $fila['post_imagen'] . "'></div>";
                        echo $fila['post_autor'];
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                }
            }




            if (isset($_POST['rutinas'])) {
                $valor = false;
                $MyBBDD->consulta("SELECT * FROM posts where post_tema = 'rutinas'  order by post_fecha");
                $cantidad = 0;
                while ($fila = $MyBBDD->extraer_registro()) {
                    if ($cantidad >= 5) {
                        break;
                    } else {
                        $cantidad++;
                        echo "<a href='../Server/mostrar_post.php?variable=". $fila['post_id'] ."' >";
                        echo '<div class="columna">';
                        echo "<div class='titulo_autor'>";
                        echo "<div class='titulo'>" . $fila['post_titulo'] . '</div>';

                        echo "<div class='tema'>Tema : " . $fila['post_tema'] . '</div>';
                        echo "<div class='autor'> <div class='foto'> 
                            <img class='imagen' src='../imagen/img_publicacion/"
                            . $fila['post_imagen'] . "'></div>";
                        echo $fila['post_autor'];
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                }
            }



            if (isset($_POST['ciclos'])) {
                $valor = false;
                $MyBBDD->consulta("SELECT * FROM posts where post_tema = 'ciclos'  order by post_fecha");
                $cantidad = 0;
                while ($fila = $MyBBDD->extraer_registro()) {
                    if ($cantidad >= 5) {
                        break;
                    } else {
                        $cantidad++;
                        echo "<a href='../Server/mostrar_post.php?variable=". $fila['post_id'] ."' >";
                        echo '<div class="columna">';
                        echo "<div class='titulo_autor'>";
                        echo "<div class='titulo'>" . $fila['post_titulo'] . '</div>';

                        echo "<div class='tema'>Tema : " . $fila['post_tema'] . '</div>';
                        echo "<div class='autor'> <div class='foto'> 
                            <img class='imagen' src='../imagen/img_publicacion/"
                            . $fila['post_imagen'] . "'></div>";
                        echo $fila['post_autor'];
                        echo '</div>';


                        echo '</div>';
                        echo '</a>';
                    }
                }
            }




            if (isset($_POST['culturismo'])) {
                $valor = false;
                $MyBBDD->consulta("SELECT * FROM posts where post_tema = 'culturismo'  order by post_fecha");
                $cantidad = 0;
                while ($fila = $MyBBDD->extraer_registro()) {
                    if ($cantidad >= 5) {
                        break;
                    } else {
                        $cantidad++;
                        echo "<a href='../Server/mostrar_post.php?variable=". $fila['post_id'] ."' >";
                        echo '<div class="columna">';
                        echo "<div class='titulo_autor'>";
                        echo "<div class='titulo'>" . $fila['post_titulo'] . '</div>';

                        echo "<div class='tema'>Tema : " . $fila['post_tema'] . '</div>';
                        echo "<div class='autor'> <div class='foto'> 
                            <img class='imagen' src='../imagen/img_publicacion/"
                            . $fila['post_imagen'] . "'></div>";
                        echo $fila['post_autor'];
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                }
            }



            if (isset($_POST['dietas'])) {
                $valor = false;
                $MyBBDD->consulta("SELECT * FROM posts where post_tema = 'dietas'  order by post_fecha");
                $cantidad = 0;
                while ($fila = $MyBBDD->extraer_registro()) {
                    if ($cantidad >= 5) {
                        break;
                    } else {
                        $cantidad++;
                        echo "<a href='../Server/mostrar_post.php?variable=". $fila['post_id'] ."' >";
                        echo '<div class="columna">';
                        echo "<div class='titulo_autor'>";
                        echo "<div class='titulo'>" . $fila['post_titulo'] . '</div>';

                        echo "<div class='tema'>Tema : " . $fila['post_tema'] . '</div>';
                        echo "<div class='autor'> <div class='foto'> 
                            <img class='imagen' src='../imagen/img_publicacion/"
                            . $fila['post_imagen'] . "'></div>";
                        echo $fila['post_autor'];
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                }
            }

            if ($valor) {
                $MyBBDD->consulta("SELECT * FROM posts order by post_fecha");
                $cantidad = 0;
                while ($fila = $MyBBDD->extraer_registro()) {
                    if ($cantidad >= 5) {
                        break;
                    } else {
                        $cantidad++;
                        echo "<a href='../Server/mostrar_post.php?variable=". $fila['post_id'] ."' >";
                        echo '<div class="columna">';
                        echo "<div class='titulo_autor'>";
                        echo "<div class='titulo'>" . $fila['post_titulo'] . '</div>';

                        echo "<div class='tema'>Tema : " . $fila['post_tema'] . '</div>';
                        echo "<div class='autor'> <div class='foto'> 
                            <img class='imagen' src='../imagen/img_publicacion/"
                            . $fila['post_imagen'] . "'></div>";
                        echo $fila['post_autor'];
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                }
            }
                ?>
        </div>
    </main>
</body>

</html>