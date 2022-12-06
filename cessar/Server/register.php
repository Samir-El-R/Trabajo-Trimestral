<?php
include 'conectarse.php';
if (isset($_POST['registrarse'])) {


    // recogida de datos al pulsar registrarse

    $usuario = $_POST['usuario_signup'];
    $nombre  = $_POST['nombre_real'];
    $apellidos= $_POST['apellidos_signup'];
    $correo = $_POST['email_signup'];
    $contrasena = $_POST['contrasena_signup'];
    $confirmar_contrasena = $_POST['confirmar_contrasena_signup'];
    $fecha = date('Y-m-d H:i:s');
    $imagen_Por_Defecto = 'perfil-por-defecto.png';

    // mensajes por si hay algun error si estan vacios o no pasan filtros

    if (empty($usuario)) {
        echo "Introduzca su usuario!";
    } else if (!ctype_alnum($usuario)) {
        echo "El usuario solo debe tener letras y numeros!";
    } else if (empty($correo)) {
        echo "Introduzca su correo!";
    } else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
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

                                echo "registrado";
                            } else {
                                echo "Hay un error en la base de datos";
                            }
                        } else {

                            echo "Formato no valido";
                        }
                    } else {
                        $MyBBDD->consulta("INSERT INTO registro (usuario,nombre,apellido,fecha_creacion,email,contrasena,imagen_perfil) values ('$usuario','$nombre','$apellidos','$fecha','$correo','$contrasena','$imagen_Por_Defecto')");

                        $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

                        if ($MyBBDD->numero_filas() > 0) {

                            echo "registrado";
                        } else {
                            echo "Hay un error en la base de datos";
                        }
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
