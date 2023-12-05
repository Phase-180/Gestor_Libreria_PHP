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
  <div class="container m-5">
            <form name="frmModLibro" id="frmModLibro" action="procesar_actualizar_libro.php"  method="post">
                <fieldset>
                    <legend>Modificar de libro</legend>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Elige el libro que quieras modificar</label>
                        <select id="lstLibrosModificar" name="lstLibrosModificar" class="form-select">
                        <?php echo $optionsBooks; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Título</label>
                        <input type="text" id="txtTituloLibroMod" name="txtTituloLibroMod" class="form-control"
                            placeholder="Titulo libro">
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Autor</label>
                        <select id="lstModificarAutorDelLibro" name="lstModificarAutorDelLibro" class="form-select">
                        <?php echo $optionsAuthor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Fecha de Publicación</label>
                        <input type="date" id="dateFechaLibroMod" name="dateFechaLibroMod" class="form-control">
                    </div>
                    <button type="submit" id="btnActualizar" name="btnActualizar"
                        class="btn btn-primary">Guardar</button>
                </fieldset>
            </form>
    </div>
</div>
</body>
</html>
