<?php
require_once("funcionesBD.php");
$conexion = obtenerConexion();




$libro = $_GET['lstAutoresForLibros'];

$sql = "SELECT authorId,authorNname,authorBirhdate,authorPremio,authorNacionalidad FROM author  WHERE author.authorId IN ( SELECT booksIdAutor FROM books WHERE bookId = $libro )";
// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje  = "<div class='container'>";
$mensaje .= "<h2 class='text-center'>Autor</h2>";
$mensaje .= "<table class='table table-striped table-light'>";
$mensaje .= "<thead><tr><th>#</th><th>Nombre</th><th>Fecha de nacimiento</th><th>Premio Nobel</th><th>Nacionalidad</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
if ($fila['authorPremio'] == 1 ){

    $premio = "Sí";
}else {

    $premio = "No";
}

    $mensaje .= "<tr><td>" . $fila['authorId'] . "</td>";
    $mensaje .= "<td>" . $fila['authorNname'] . "</td>";
    $mensaje .= "<td>" . $fila['authorBirhdate'] . "</td>";
    $mensaje .= "<td>" . $premio . "</td>";
    $mensaje .= "<td>" . $fila['authorNacionalidad'] . "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table></div>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
