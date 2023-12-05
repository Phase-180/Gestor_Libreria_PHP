<?php
require_once("funcionesBD.php");

$conexion = obtenerConexion();

$sql = "SELECT bookId ,bookTitle FROM books;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= " <option value='" . $fila["bookId"] . "'>" . $fila["bookTitle"] . "</option>";
}

?>



  
  
  
  
  <?php
include_once("cabecera.html");
?>
<div class="container">
  <div class="container m-5">
            <form name="frmDelLibro" id="frmDelLibro" action="procesar_borrar_libro.php"  method="post">
                <fieldset>
                    <legend>Eliminar libro</legend>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Elige el libro que quieras eliminar</label>
                        <select id="lstLibrosDelete" name="lstLibrosDelete" class="form-select">
                        <?php echo $options; ?>
                        </select>
                    </div>
                    <button type="sumit" class="btn btn-primary" name="btnDeleteLibro"
                        id="btnDeleteLibro">Eliminar</button>
                </fieldset>
            </form>
        </div>
</div>
</body>
</html>