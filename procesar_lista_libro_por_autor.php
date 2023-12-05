<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();



$autor =  $_GET['lstLibrosForAutor'];


$sql = "SELECT bookId,bookTitle,bookPublished,booksIdAutor FROM books WHERE booksIdAutor = $autor;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

$mensaje  = "<div class='container'>";
$mensaje .= "<h2 class='text-center'>Listado de libros</h2>";
$mensaje .= "<table class='table table-striped table-light'>";
$mensaje .= "<thead><tr><th>#</th><th>Título</th><th>Fecha de Publicación</th><th>ID Autor</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['bookId'] . "</td>";
    $mensaje .= "<td>" . $fila['bookTitle'] . "</td>";
    $mensaje .= "<td>" . $fila['bookPublished'] . "</td>";
    $mensaje .= "<td>" . $fila['booksIdAutor'] . "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table></div>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
