<?php

// Incluir un fichero para acceso a la base de datos

include('config.php');


$conexion = obtenerConexion();





$nombre = $_POST['txtTituloLibro'];
$fechaPublicacion = $_POST['dateFechaPublicacion'];
$idAutor = $_POST['lstAutores'];





$sql = "INSERT INTO books VALUES (null, '$nombre' ,  '$fechaPublicacion' , $idAutor)";

// var_dump($sql);
// die();


$resultado = mysqli_query($conexion, $sql);

if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Libro insertado</h2>"; 
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header( "refresh:5;url=index.php" );
?>

<?php
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>