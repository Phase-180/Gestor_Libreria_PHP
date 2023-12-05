<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sqlBooks = "SELECT bookId ,bookTitle FROM books;";

$resultadoBooks = mysqli_query($conexion, $sqlBooks);

$optionsBooks = "";
while ($fila = mysqli_fetch_assoc($resultadoBooks)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $optionsBooks .= " <option value='" . $fila["bookId"] . "'>" . $fila["bookTitle"] . "</option>";
}

?>

<?php
include_once("cabecera.html");
?>
<div class="container">
<div class="container m-5" name="frmListaAutoresPorLibro" id="frmListaAutoresPorLibro">
            <form action="procesar_lista_autor_por_libro.php"  method="get">
                <fieldset>
                    <h2>Listar el autor del libro:</h2>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Elige el libro</label>
                        <select id="lstAutoresForLibros" name="lstAutoresForLibros" class="form-select">
                        <?php echo $optionsBooks; ?>
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
