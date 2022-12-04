<?php
include 'conectarse.php';
session_start();

if (true) {

    $usuario = $_POST['usuario_signup'];
    $correo = $_POST['nombre_real'];
    $nombre = $_POST['apellidos_signup'];
    $apellidos = $_POST['email_signup'];
    $contrasena = $_POST['contrasena_signup'];
    $confirmar_contrasena = $_POST['confirmar_contrasena_signup'];
    $fecha = date('Y-m-d H:i:s');
    // $errors = array();
    if ($confirmar_contrasena == $contrasena) {

        $MyBBDD->consulta("SELECT * FROM registro where email = '$correo'");

        if (!$MyBBDD->numero_filas() > 0) {

            $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

            if (!$MyBBDD->numero_filas() > 0) {

                $MyBBDD->consulta("INSERT INTO registro (usuario,nombre,apellido,fecha_creacion,email,contrasena) values ('$usuario','$nombre','$apellidos','$fecha','$correo','$contrasena')");

                $MyBBDD->consulta("SELECT * FROM registro where usuario = '$usuario'");

                if ($MyBBDD->numero_filas() > 0) {
                    // echo "<script> alert('Usuario registrado con exito')</script>";
                    // $usuario = "";
                    // $correo = "";
                    // $nombre = "";
                    // $apellidos = "";
                    // $contrasena = "";
                    echo ("registrado");
                } else {
                    echo ("Hay un error");
                }
            } else {
                echo ("existe usuario");
            }
        } else {
            echo ("existe correo");
        }
    } else {
        echo ("no son iguales");
    }
} else {
    echo ("Algo ha fallado");
}


