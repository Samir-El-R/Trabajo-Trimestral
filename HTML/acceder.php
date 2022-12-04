<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Css/style_Register_Login.css">
</head>

<body>
    <?php
    require 'header.php';
    ?>
    <section class="forms-section ">
        <!-- login -->
        <div class="forms">
            <div class="form-wrapper is-active ">
                <button type="button" class="switcher switcher-login">
                    Iniciar Sesión
                    <span class="underline"></span>
                </button>
                <form class="form form-login" id="form-login" method="post" action="../Server/login.php">
                    <fieldset>

                        <div class="input-block">
                            <label for="usuario_login">Usuario</label>
                            <input type="text" name="usuario_login" id="usuario_login"><br>
                        </div>
                        <div class="input-block">
                            <label for="contrasena_login">Contraseña</label>
                            <input name="contrasena_login" id="contrasena_login" type="password" required>
                        </div>
                    </fieldset>
                    <button type="submit" name="iniciar_sesion" id="enviar_login" class="btn-login">Iniciar Sesion</button>
                    <button type="reset" class="btn-login">Limpiar</button>

                </form>
            </div>


            <!-- Registor -->

            <div class="form-wrapper  ">
                <button type="button" class="switcher switcher-signup">
                    Registrarse
                    <span class="underline"></span>
                </button>
                <form class="form form-signup" method="post" >
                    <fieldset>
                        <div class="input-block">
                            <label for="usuario_signup">Usuario</label>
                            <input type="text" name="usuario_signup" id="usuario_signup" required>
                        </div>

                        <div class="input-block">
                            <label for="nombre_real">Nombre</label>
                            <input type="text" name="nombre_real" id="nombre_real">
                        </div>

                        <div class="input-block">
                            <label for="apellidos_signup">Apellidos</label>
                            <input type="text" name="apellidos_signup" id="apellidos_signup">
                        </div>


                        <div class="input-block">
                            <label for="email_signup">E-mail</label>
                            <input type="email" name="email_signup" id="email_signup" required>
                        </div>
                        <div class="input-block">
                            <label for="contrasena_signup">Contraseña</label>
                            <input type="password" name="contrasena_signup" id="contrasena_signup" required>
                        </div>
                        <div class="input-block">
                            <label for="confirmar_contrasena_signup">Confirmar Contraseña</label>
                            <input type="password" name="confirmar_contrasena_signup" id="confirmar_contrasena_signup" required>
                        </div>
                    </fieldset>

                    <button type="submit" name="registrarse" id="enviar_register" class="btn-signup">Registrarse</button>
                    <button type="reset" class="btn-signup">Limpiar</button>
                </form>
            </div>
        </div>
    </section>
    <?php
    include "../Server//register.php"
    ?>
</body>

<script>
    const switchers = [...document.querySelectorAll('.switcher')]

    switchers.forEach(item => {
        item.addEventListener('click', function() {
            switchers.forEach(item => item.parentElement.classList.remove('is-active'))
            this.parentElement.classList.add('is-active')
        })
    })
</script>

</html>