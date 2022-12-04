<?php


include 'conectarse.php';
session_start();
if (isset($_POST['publicar'])) {
    $autor = $_SESSION["username"];
    $post = $_POST['post'];
    $tema = $_POST['temas'];
    $titulo = $_POST['post_titulo'];
    $fecha = date('Y-m-d H:i:s');
    $fileName = $_FILES['file']['name'];
    $fileType = $_FILES['file']['type'];



    if ($fileType == "image/jpeg" || $fileType == "image/png") {
        move_uploaded_file($_FILES['file']['tmp_name'], "../imagen/img_publicacion/$fileName"); 
        // $MyBBDD->consulta("UPDATE posts SET post_imagen = '$fileName' WHERE post_autor ='$autor'");
        // $MyBBDD->consulta("INSERT INTO posts (post_imagen) VALUES ('$fileName')");
        $MyBBDD->consulta("INSERT INTO posts (post_contenido,post_fecha,post_autor,post_tema,post_titulo,post_imagen) values ('$post','$fecha','$autor','$tema','$titulo','$fileName')");

    } else {
        echo "Formato no valido";
    }
    
    
    
// $MyBBDD->consulta("INSERT INTO posts (post_contenido,post_fecha,post_autor,post_tema,post_titulo) values ('$post','$fecha','$autor','$tema','$titulo')");
}

// if ($MyBBDD != false) {
//     $MyBBDD->consulta("SELECT * FROM posts");
//     while ($fila = $MyBBDD->extraer_registro()) {

//         echo "Post: " . $fila['post_contenido'] . "<br>";
//     }
// }


?>











<!-- include 'conect_class.php';
if (isset($_POST['post'])) {
    $tweet = $_POST['tweet'];
    $MyBBDD->consulta("INSERT INTO timeline (arroba_titulo,contenido) values ('$user','$tweet')"); 
}

if (isset($_POST['like'])) {
    $id =$_POST['hidden'];

    $MyBBDD->consulta("UPDATE timeline SET likes = likes + 1 WHERE id = $id");
}

<body>
    <form action="" method="post">
        
        <label for="">Tweet</label>
        <input type="text" name="tweet" id="text">
        <input type="submit" value="postear" name="post">

    </form>
</body>

</html>
if ($MyBBDD != false) {
    $MyBBDD->consulta("SELECT * FROM timeline");
    while ($fila = $MyBBDD->extraer_registro()) {
        $id = $fila['id'];
        echo "<br>";
        echo "titulo: " . $fila['arroba_titulo'] . "<br><br>";
        echo "Tweet: " . $fila['contenido'] . "<br>";
        echo "Likes: ".$fila['likes'] . "<br>";
        echo"<form action='' method='post'>
        <input type='submit' value='Like' name='like'>
        <input type='hidden' value='$id' name='hidden'>
    </form>";
    }
} -->