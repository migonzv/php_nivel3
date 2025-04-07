<?php
  session_start();
  include './cabecera.php';
?>
<div class="navbar-menu">
  <p>
    <span><?php echo 'Bienvenid@ ' . $_SESSION['nombre']; ?></span>
    <span class="divisor">|</span>
    <a href="index.php">Inicio</a>
    <span class="divisor">|</span>
    <a href="cierre.php">Salir</a>
  </p>
</div>

<h1>Registro de Productos</h1>

<div class="content-center">
  <strong>Agregar Productos</strong>
  <form name="productos" action="validacion.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <td><strong>Imagen:</strong></td>
        <td><input name="img" type="file"></td>
      </tr>
      <tr>
        <td><strong>Nombre:</strong></td>
        <td><input name="nombre" type="text"></td>
      </tr>
      <tr>
        <td><strong>Precio:</strong></td>
        <td><input name="precio" type="text"></td>
      </tr>
      <tr>
        <td><strong>Cantidad:</strong></td>
        <td><input name="cantidad" type="text"></td>
      </tr>
      <tr>
        <td><strong>Descripción:</strong></td>
        <td><textarea name="descripcion" rows="8" cols="22"></textarea></textarea></td>
      </tr>
      <tr>
        <td class="buttons-form-container" colspan="2">
          <input type="hidden" name="val" value="3">
          <input type="submit" value="Enviar" class="space-right">
          <input type="reset" value="Borrar">
        </td>
      </tr>
    </table>
  </form>
</div>

</body>
</html>