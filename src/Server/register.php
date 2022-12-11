<?php
include 'conectarse.php';
if (isset($_POST['registrarse'])) {


    // recogida de datos al pulsar registrarse

    $usuario = $_POST['usuario_signup'];
    $nombre = $_POST['nombre_real'];
    $apellidos = $_POST['apellidos_signup'];
    $correo = $_POST['email_signup'];
    $contrasena = $_POST['contrasena_signup'];
    $confirmar_contrasena = $_POST['confirmar_contrasena_signup'];
    $fecha = date('Y-m-d H:i:s');
    $imagen_Por_Defecto = 'perfil-por-defecto.png';

    // mensajes por si hay algun error si estan vacios o no pasan filtros

    if (empty($usuario)) {
        echo '<script> alert("Introduzca su usuario!"); </script>';
    } else if (!ctype_alnum($usuario)) {
        echo '<script> alert("El usuario solo debe tener letras y numeros!"); </script>';
    } else if (strlen($usuario) <= 8) {
        echo '<script> alert("El usuario debe tener 8 caracteres alfanumericos !"); </script>';
    } else if (empty($correo)) {
        echo '<script> alert("Introduzca su correo!"); </script>';
    } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '<script> alert("El correo no es valido!"); </script>';
    } else if (empty($nombre)) {
        echo '<script> alert("Introduzca su nombre!"); </script>';
    } else if (!ctype_alpha($nombre)) {
        echo '<script> alert("Solamente letras en el nombre!"); </script>';
    } else if (empty($apellidos)) {
        echo '<script> alert("Introduzca sus apellidos!"); </script>';
    } else if (!ctype_alpha($nombre)) {
        echo '<script> alert("Solamente letras en el apellido!"); </script>';
    } else if (empty($contrasena)) {
        echo '<script> alert("Introduzca sus contraseña !"); </script>';
    } else if (strlen($contrasena) < 8) {
        echo '<script> alert("La contraseña debe tener al menos 8 caracteres !"); </script>';
    } else if (empty($confirmar_contrasena)) {
        echo '<script> alert("Introduzca sus contraseña !"); </script>';
    } else if (strlen($confirmar_contrasena) < 8) {
        echo '<script> alert("La contraseña debe tener al menos 8 caracteres !"); </script>';
    } else {
        if ($confirmar_contrasena == $contrasena) {

            // Comprobacion de que los valor introducidos no se puedan duplicar en la BBDD

            $MyBBDD->consulta("SELECT * FROM registro where email = '$correo'");

            if (!$MyBBDD->numero_filas() > 0) {

                $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

                if (!$MyBBDD->numero_filas() > 0) {

                    if ($_FILES['file']['name'] != null) {
                        $fileName = $_FILES['file']['name'];
                        $fileType = $_FILES['file']['type'];
                        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
                        $nombre_imagen_perfil = 'perfil-' . substr(str_shuffle($permitted_chars), 0, 12) . '.';
                        $nombre_imagen_perfil .= $extension;
                        if ($fileType == "image/jpeg" || $fileType == "image/png") {

                            move_uploaded_file($_FILES['file']['tmp_name'], "../imagen/img_perfil/$nombre_imagen_perfil");

                            $MyBBDD->consulta("INSERT INTO registro (usuario,nombre,apellido,fecha_creacion,email,contrasena,imagen_perfil) values ('$usuario','$nombre','$apellidos','$fecha','$correo','$contrasena','$nombre_imagen_perfil')");
                            $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

                            if ($MyBBDD->numero_filas() > 0) {

                                echo '<script> alert("Usuario Registrado"); </script>';
                            } else {
                                echo '<script> alert("Hay un error en la base de datos"); </script>';
                            }
                        } else {

                            echo "Formato no valido";
                        }
                    } else {
                        $MyBBDD->consulta("INSERT INTO registro (usuario,nombre,apellido,fecha_creacion,email,contrasena,imagen_perfil) values ('$usuario','$nombre','$apellidos','$fecha','$correo','$contrasena','$imagen_Por_Defecto')");

                        $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

                        if ($MyBBDD->numero_filas() > 0) {

                            echo '<script> alert("Usuario Registrado"); </script>';
                        } else {
                            echo '<script> alert("Hay un error en la base de datos"); </script>';
                        }
                    }
                } else {
                    echo '<script> alert("EL usuario existe"); </script>';
                }
            } else {
                echo '<script> alert("EL correo ya existe"); </script>';
            }
        } else {
            echo '<script> alert("Las contraseñas no son iguales"); </script>';
        }
    }
}
