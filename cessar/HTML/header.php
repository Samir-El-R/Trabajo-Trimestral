<style>
    /* Stilo de elementos generales */
    * {
        margin: 0;
        padding: 0;
    }

    .header {
        display: flex;
        background-color: black;
        color: white;
        width: 100%;
        height: 65px;
        padding-top: 10px;
    }

    ul {
        display: flex;
    }

    li>a {
        color: black;
    }

    /* div de logo + titulo */


    .text_logo {
        min-width: 20%;
        width: 110%;
        display: flex;
        justify-content: space-between;
        margin-left: 40px;
        font-weight: bold;
        font-size: xx-large;
        color: white;
        text-shadow: #FFF 0px 0px 5px, #FFF 0px 0px 10px, #FFF 0px 0px 15px, #FF2D95 0px 0px 20px, #FF2D95 0px 0px 30px, #FF2D95 0px 0px 40px, #FF2D95 0px 0px 50px, #FF2D95 0px 0px 75px;
    }


    .imagen_logo {
        padding-top: 5px;
        min-width: 40px;
    }

    .nombre_logo {
        cursor: pointer;
        justify-content: flex-end;
    }

    .logo {
        min-width: 30px;
        min-height: 30px;
    }

    .svg {
        width: 40px;
        height: 40px;
    }


    /* div de botones */


    .menu_header {
        display: flex;
        justify-content: flex-end;
        width: 90%;
        flex-wrap: wrap;
    }

    .botones_header {
        display: inline-block;
        text-align: center;
        cursor: pointer;
        margin-top: 10px;
        margin-right: 50px;
        width: 100px;
        height: 25px;
        border-radius: 10px;
        box-shadow: #FFF 0px 0px 6px, #FFF 0px 0px 4px, #FFF 0px 0px 5px, #FF2D95 0px 0px 5px, #FF2D95 0px 0px 10px, #FF2D95 0px 0px 10px, #FF2D95 0px 0px 20px, #FF2D95 0px 0px 25px;
        background: -webkit-gradient(linear, left top, right top, from #7f00ff, to(#e100ff));
        background: linear-gradient(to right, #7f00ff, #e100ff);
    }

    .botones_header li {
        padding-top: 3px;
        list-style: none;
    }

    .botones_header li a {
        color: white;
        text-decoration: none;
    }

    .boton_cerrar_sesion {
        margin-top: 5px;
        padding-right: 40px;
    }

    /* Desplegable */

    .desplegable {
        visibility: hidden;
        margin-left: 10px;
    }

    .desplegable ul {
        padding-top: 25px;
        height: 100%;
        width: 80px;
        display: block;
        background-color: white;
        color: black;
        list-style: none;
        border-radius: 0px 0 10px 10px;
    }

    .desplegable>ul>li {
        padding: 10px;
        color: black;
    }

    .desplegable li:hover>ul {
        display: block;
    }

    .botones_header:hover {
        background: #0aadff;
        color: black;
    }

    .botones_header-imagen {
        display: inline-block;
        text-align: center;
        cursor: pointer;
        /* margin-top: 10px; */
        margin-right: 50px;
        width: 51px;
        height: 51px;
        border-radius: 100px;
        box-shadow: #FFF 0px 0px 6px, #FFF 0px 0px 4px, #FFF 0px 0px 5px, #FF2D95 0px 0px 5px, #FF2D95 0px 0px 10px, #FF2D95 0px 0px 10px, #FF2D95 0px 0px 20px, #FF2D95 0px 0px 25px;
        background: -webkit-gradient(linear, left top, right top, from #7f00ff, to(#e100ff));
        background: linear-gradient(to right, #7f00ff, #e100ff);
    }
    .botones_header-imagen li {

        list-style: none;
    }

    .imagen_usuario_header--img {
        max-width: 50px;
        height: 50px;
        border-radius: 100%;
        text-align: center;
    }




    /* Medias */

    /* Media para ocultar el titulo */

    @media (max-width: 700px) {
        .nombre_logo {
            display: none;
        }
    }
</style>
<header>
    <div class="header">

        <!-- svg del logo que sirve para volver a la página principal -->

        <div class="text_logo"> <a href="../HTML/index.php">
                <div class="imagen_logo">
                    <svg class="svg" height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;" version="1.1" viewBox="0 0 1062 1062" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <circle cx="531.308" cy="531.308" id="circle6" r="531.308" style="fill:rgb(37,183,211);" />
                        <rect height="55.6341" style="fill:rgb(205,205,205);" width="885.051" x="88.7824" y="503.491" />
                        <g>
                            <rect height="213.093" style="fill:rgb(91,96,113);" width="44" x="864.465" y="424.761" />
                            <rect height="334.502" style="fill:rgb(66,72,91);" width="44" x="802.838" y="364.057" />
                            <rect height="525.082" style="fill:rgb(55,60,75);" width="44" x="745.921" y="268.767" />
                        </g>
                        <g>
                            <rect height="213.093" style="fill:rgb(91,96,113);" width="44" x="135.758" y="424.761" />
                            <rect height="334.502" style="fill:rgb(66,72,91);" width="44" x="197.385" y="364.057" />
                            <rect height="525.082" style="fill:rgb(55,60,75);" width="44" x="254.303" y="268.767" />
                        </g>
                    </svg></div>
            </a>

            <!-- Titulo que sirve para volver a la página principal -->

            <div class="nombre_logo" id="logo">
                <h3 class="titulo_logo">ZonaFitness</h3>
            </div>
            <script>
                let logo = document.getElementById("logo");
                logo.addEventListener("click", function() {
                    location.href = "index.php";
                })
            </script>

        </div>
        <div class="menu_header">
            <ul>
                <!-- Botones del header,dependiendo de si esta registrado o no un usuario se mostrarán -->


                <!-- Boton acceder -->

                <div class="botones_header" <?php if (isset($_SESSION["username"])) {
                                                echo 'style="display: none;"';
                                            } ?>>
                    <li>
                        <a href="../HTML/acceder.php" id="boton_iniciar_sesion">Acceder</a>
                    </li>
                </div>

               <!-- Boton postear -->

                <div class="botones_header" <?php if (!isset($_SESSION["username"])) {
                                                echo 'style="display: none;"';
                                            } ?>>
                    <li>
                        <a href="postear.php" id="boton_postear">Postear</a>
                    </li>
                </div>

                <!-- Boton desplegable -->

                <div>
                    <div class="botones_header-imagen"  <?php if (!isset($_SESSION["username"])) {echo 'style="display: none;"';} ?>>
                        <li>
                            <img  id="boton_acceder" class="imagen_usuario_header--img" src="../imagen/img_perfil/<?php echo $_SESSION["username"]["imagen"]; ?>" alt="">
                        </li>
                    </div>
                    <div class="desplegable" id="desplegable" <?php if (!isset($_SESSION["username"])) {echo 'style="display: none;"';} ?>>
                        <ul>
                            <li>
                                <a href="../HTML/perfil.php">Ir a perfil</a>
                            </li>
                            <li>
                                <a href="../Server/cerrar_sesion.php" id="boton_cerrar_sesion">Cerrar Sesión</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Script para ocultar o mostrar el menu desplegable de perfil -->

                    <script>
                        let boton_acceder = document.getElementById("boton_acceder");
                        let desplegable = document.getElementById("desplegable");
                        boton_acceder.addEventListener("click", function() {
                            if (desplegable.style.visibility == "hidden") {
                                desplegable.style.visibility = "visible";
                            } else {
                                desplegable.style.visibility = "hidden";
                            }
                        })
                    </script>
                </div>

                <!-- Svg de cerrar sesión, es un enlace a cerrar_sesion.php donde se acaba la sesión -->

                <div class="boton_cerrar_sesion" <?php if (!isset($_SESSION["username"])) {
                                                        echo 'style="display: none";';
                                                    } ?>>
                    <a href="../Server/cerrar_sesion.php" id="boton_cerrar_sesion">
                        <svg xmlns="http://www.w3.org/2000/svg" class="svg icon icon-tabler icon-tabler-power" width="40" height="40" viewBox="0 0 24 24" stroke-width="3" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M7 6a7.75 7.75 0 1 0 10 0" />
                            <line x1="12" y1="4" x2="12" y2="12" />
                        </svg>
                    </a>
                </div>
            </ul>
        </div>
    </div>
</header>