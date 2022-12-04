<?php
include 'conectarse.php';
if (isset($_POST['registrarse'])) {

    $usuario = $_POST['usuario_signup'];
    $correo = $_POST['nombre_real'];
    $nombre = $_POST['apellidos_signup'];
    $apellidos = $_POST['email_signup'];
    $contrasena = $_POST['contrasena_signup'];
    $confirmar_contrasena = $_POST['confirmar_contrasena_signup'];
    $fecha = date('Y-m-d H:i:s');

?>
<!-- <form class="form form-signup" method="post" action="../HTML/acceder.php"> -->

<?php
    if (empty($usuario)) {
        echo "Introduzca su usuario!";

    } else if (!ctype_alnum($usuario)) {
        echo "El usuario solo debe tener letras y numeros!";

    } else if (empty($correo)) {
        echo "Introduzca su correo!";

    } else if (preg_match('/^[^0-20][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correo)) {
        echo "El correo no es valido!";

    } else if (empty($nombre)) {
        echo "Introduzca su nombre!";

    } else if (!ctype_alpha($nombre)) {
        echo "Solamente letras en elnombre!";

    } else if (empty($apellidos)) {
        echo "Introduzca sus apellidos!";

    } else if (!ctype_alpha($nombre)) {
        echo "Solamente letras en el apellido!";

    } else if (empty($contrasena)) {
        echo "Introduzca sus contraseña !";

    } else if (strlen($contrasena) < 8) {
        echo "La contraseña debe tener al menos 8 caracteres !";

    } else if (empty($confirmar_contrasena)) {
        echo "Introduzca sus contraseña !";

    } else if (strlen($confirmar_contrasena) < 8) {
        echo "La contraseña debe tener al menos 8 caracteres !";

    } else {
        if ($confirmar_contrasena == $contrasena) {

            $MyBBDD->consulta("SELECT * FROM registro where email = '$correo'");

            if (!$MyBBDD->numero_filas() > 0) {

                $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

                if (!$MyBBDD->numero_filas() > 0) {

                    $MyBBDD->consulta("INSERT INTO registro (usuario,nombre,apellido,fecha_creacion,email,contrasena) values ('$usuario','$nombre','$apellidos','$fecha','$correo','$contrasena')");

                    $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

                    if ($MyBBDD->numero_filas() > 0) {

                        echo "registrado";
                    } else {
                        echo "Hay un error en la base de datos";
                    }
                } else {
                    echo "EL usuario existe";
                }
            } else {
                echo "EL correo ya existe";
            }
        } else {
            echo "Las contraseñas no son iguales";
        }
    }
} 