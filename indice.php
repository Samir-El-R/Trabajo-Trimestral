<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    require 'HTML/header.php';
    include 'Server/conectarse.php';
    ?>

    <main>
        <div class="bienvenida">
            <?php
            if (isset($_SESSION["username"])) {

                echo "Bienvenido " . $_SESSION["username"] . "!!";
            }
            ?>
        </div>  
        
        <div class="contenido">

        </div>
    </main>
</body>

</html>