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


if (empty($usuario)) {
    $error = "enter your name !";
    $code = 1;
} else if (!ctype_alpha($uname)) {
    $error = "letters only !";
    $code = 1;
} else if (empty($email)) {
    $error = "enter your email !";
    $code = 2;
} else if (!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)) {
    $error = "not valid email !";
    $code = 2;
} else if (empty($mno)) {
    $error = "Enter Mobile NO !";
    $code = 3;
} else if (!is_numeric($mno)) {
    $error = "Numbers only !";
    $code = 3;
} else if (strlen($mno) != 10) {
    $error = "10 characters only !";
    $code = 3;
} else if (empty($upass)) {
    $error = "enter password !";
    $code = 4;
} else if (strlen($upass) < 8) {
    $error = "Minimum 8 characters !";
    $code = 4;
} else {
?>
    <script>
        alert('success');
        document.location.href = 'index.php';
    </script>
<?php
}
