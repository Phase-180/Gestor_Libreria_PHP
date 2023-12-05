<?php

// Incluir un fichero para acceso a la base de datos

include('config.php');

$conexion = obtenerConexion();



$idLibro = $_POST['lstLibrosModificar'];
$nombre = $_POST['txtTituloLibroMod'];
$fechaPublicacion = $_POST['dateFechaLibroMod'];
$idAutor = $_POST['lstModificarAutorDelLibro'];




$sql = "UPDATE `books` SET `bookId`= $idLibro , `bookTitle`='$nombre',`bookPublished`='$fechaPublicacion',`booksIdAutor`= $idAutor  WHERE `bookId` = $idLibro;";


// var_dump($sql);
// die();

$resultado = mysqli_query($conexion, $sql);



// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Libro Modificado.</h2>"; 
}

?>

<?php
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>