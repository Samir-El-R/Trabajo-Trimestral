-- borramos la base de datos
DROP DATABASE IF EXISTS foro;

-- creamos la base de datos
CREATE DATABASE IF NOT EXISTS foro;

-- usamos la base de dat
USE foro;

-- seleccionamos la base de datos 
SELECT DATABASE();

-- creamos la tabla registro
CREATE TABLE IF NOT EXISTS registro (
  id INT UNSIGNED AUTO_INCREMENT,
  usuario varchar(255) not null unique,
  nombre varchar(255) not null,
  apellido varchar(255) not null,
  fecha_creacion DATETIME NOT NULL,
  email varchar(255) not null unique,
  contrasena varchar(255),
  imagen_perfil varchar(255),
  PRIMARY KEY (id)
);

-- ususario anonimo para asiganrle los posts mas tarde
INSERT INTO registro (usuario,nombre,apellido,fecha_creacion,email,contrasena,imagen_perfil) values ('anonimo','anonimo','anonimo','0000-00-00 00:00:01',' AlbertoSamirCesar@gmail.com','anonimo12345','perfil-por-defecto.png');

-- creamos la tabla posts
CREATE TABLE IF NOT EXISTS posts (
  post_id INT(8) NOT NULL AUTO_INCREMENT,
  post_contenido TEXT NOT NULL,
  post_fecha DATETIME NOT NULL,
  post_tema varchar(255) NOT NULL,
  post_titulo varchar(255) NOT NULL,
  post_autor varchar(255) NOT NULL,
  post_imagen varchar(255) not null,
  PRIMARY KEY (post_id),
  FOREIGN KEY posts (post_autor) REFERENCES registro(usuario)
);

-- creamos la tabla comentarios para los posts
CREATE TABLE IF NOT EXISTS comentarios (
  id INT(8) NOT NULL AUTO_INCREMENT,
  contenido TEXT NOT NULL,
  fecha DATETIME NOT NULL,
  post_ref INT(8) NOT NULL,
  coment_autor varchar(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY comentarios_ref (post_ref) REFERENCES posts(post_id),
  FOREIGN KEY comentarios_autor (coment_autor) REFERENCES registro(usuario)
);