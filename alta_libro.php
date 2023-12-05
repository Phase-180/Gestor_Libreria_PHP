<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sql = "SELECT authorId,authorNname FROM author;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= " <option value='" . $fila["authorId"] . "'>" . $fila["authorNname"] . "</option>";
}

?>






<?php
include_once("cabecera.html");
?>
<div class="container">
        <!-- FORMULARIO ALTA LIBRO -->
        <div class="container m-5">
            <form name="frmAltaLibro" id="frmAltaLibro" action="procesar_alta_libro.php"  method="post">
                <fieldset>
                    <legend>Alta de libro</legend>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Título</label>
                        <input type="text" name="txtTituloLibro" id="txtTituloLibro" class="form-control"
                            placeholder="Titulo libro">
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Autor</label>
                        <select id="lstAutores" name="lstAutores" class="form-select">
                        <?php echo $options; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="disabledTextInput" class="form-label">Fecha de Publicación</label>
                        <input type="date" name="dateFechaPublicacion" id="dateFechaPublicacion" class="form-control">
                    </div>
                    <button type="submit" id="btnGuardarLibro" name="btnGuardarAutor"
                        class="btn btn-primary">Guardar</button>
                </fieldset>
            </form>

        </div>
</div>
</body>
</html>
