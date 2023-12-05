<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();


$sql = "SELECT authorId,authorNname FROM author;";

$resultado = mysqli_query($conexion, $sql);

$optionsAuthor = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $optionsAuthor .= " <option value='" . $fila["authorId"] . "'>" . $fila["authorNname"] . "</option>";
}






?>

<?php
include_once("cabecera.html");
?>
<div class="container">
      <div class="container m-5" name="frmListaAutoresPorLibro" id="frmListaAutoresPorLibro">
            <form action="procesar_lista_libro_por_autor.php"  method="get">
                <fieldset>
                    <h2>Listar los libros del autor:</h2>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Elige el autor</label>
                        <select id="lstLibrosForAutor" name="lstLibrosForAutor" class="form-select">
                        <?php echo $optionsAuthor; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnAutorPorLIbros"
                        name="btnAutorPorLIbros">Buscar</button>
                </fieldset>
            </form>
        </div>
</div>
</body>
</html>
