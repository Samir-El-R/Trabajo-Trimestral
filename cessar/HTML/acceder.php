<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceder</title>
    <link rel="stylesheet" href="../Css/style_Register_Login.css">
</head>

<body>
    <?php
    //    Se importa el header
  
    require 'header.php';
    if (!isset($_SESSION["username"])) {
        $_SESSION["username"] = array();
    } else {
        header("location: ../HTML/index.php");
    }

    ?>
    <section class="forms-section ">

        <!-- Formularios para inicio de sesión y registro -->

        <div class="forms">

            <!-- Div del formulario para inicio de sesión,esta active para que aparezca por predeterminado -->

            <div class="form-wrapper  ">
                <button type="button" class="switcher switcher-login">
                    Iniciar Sesión
                    <span class="underline"></span>
                </button>

                <!-- Formulario que envia la informacion a login.php -->

                <form class="form form-login" id="form-login" method="POST" action="../Server/login.php">
                    <fieldset>

                        <!-- Campo usuario -->

                        <div class="input-block">
                            <label for="usuario_login">Usuario</label>
                            <input type="text" name="usuario_login" id="usuario_login"><br>
                        </div>

                        <!-- Campo contraseña -->

                        <div class="input-block">
                            <label for="contrasena_login">Contraseña</label>
                            <input name="contrasena_login" id="contrasena_login" type="password" required>
                        </div>
                    </fieldset>

                    <!-- Butones para enviar datos y resetear formulario -->

                    <button type="submit" name="iniciar_sesion" id="enviar_login" class="btn-login">Iniciar Sesion</button>
                    <button type="reset" class="btn-login">Limpiar</button>

                </form>
            </div>


            <!-- Div del formulario para registro, por defecto esta en segundo plano -->

            <div class="form-wrapper is-active  ">
                <button type="button" class="switcher switcher-signup">
                    Registrarse
                    <span class="underline"></span>
                </button>
                <form class="form form-signup" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <!-- Campo usuario -->

                        <div class="input-block">
                            <label for="usuario_signup">Usuario</label>
                            <input type="text" name="usuario_signup" id="usuario_signup" required>
                        </div>

                        <!-- Campo nombre real -->

                        <div class="input-block">
                            <label for="nombre_real">Nombre</label>
                            <input type="text" name="nombre_real" id="nombre_real">
                        </div>

                        <!-- Campo apellidos -->

                        <div class="input-block">
                            <label for="apellidos_signup">Apellidos</label>
                            <input type="text" name="apellidos_signup" id="apellidos_signup">
                        </div>

                        <!-- Campo email -->

                        <div class="input-block">
                            <label for="email_signup">E-mail</label>
                            <input type="email" name="email_signup" id="email_signup" required>
                        </div>

                        <!-- Campo contraseña -->

                        <div class="input-block">
                            <label for="contrasena_signup">Contraseña</label>
                            <input type="password" name="contrasena_signup" id="contrasena_signup" required>
                        </div>

                        <!-- Campo confirmar contraseña -->

                        <div class="input-block">
                            <label for="confirmar_contrasena_signup">Confirmar Contraseña</label>
                            <input type="password" name="confirmar_contrasena_signup" id="confirmar_contrasena_signup" required>
                        </div>
                        <!-- Campo para subir la imagen -->

                        <div id="yourBtn">
                            <div onclick="getFile()" class="uploader-text">
                                Subir imagen Perfil
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-upload" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                <polyline points="9 15 12 12 15 15" />
                                <line x1="12" y1="12" x2="12" y2="21" />
                            </svg>
                            <div style='   display: none;'>
                                <input type="file" name="file" id="file" value="upload">
                            </div>
                        </div>
                    </fieldset>

                    <!-- Botones para enviar datos y resetear formulario -->

                    <div class="div-btn-signup">
                        <button type="submit" name="registrarse" id="enviar_register" class="btn-signup">Registrarse</button>
                        <button type="reset" class="btn-signup">Limpiar</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
    include "../Server/register.php"
    ?>
</body>

<!-- Script para dar primer plano al div que deseemos dependiendo de si hacemos click en "INICIAR SESIÓN" O "REGISTRARSE" -->

<script>
    const switchers = [...document.querySelectorAll('.switcher')]
    switchers.forEach(item => {
        item.addEventListener('click', function() {
            switchers.forEach(item => item.parentElement.classList.remove('is-active'))
            this.parentElement.classList.add('is-active')
        })
    })

    function getFile() {
        document.getElementById("file").click();
    }

    // function sub(obj) {
    //     let file = obj.value;
    //     let fileNamej = file.split("\\");
    //     document.getElementById("yourBtn").innerHTML = fileNamej[fileName.length - 1];
    //     // event.preventDefault();
    // }
</script>

</html>