<?php
  session_start();
  include './cabecera.php';
?>
<div class="navbar-menu">
  <p>
    <a href="index.php">Inicio</a>
    <span class="divisor">|</span>
    <a href="registrar.php">Registrarse</a>
  </p>
</div>

<h1>Registro de Usuarios</h1>

<div class="content-center">
  <strong>Agregar Usuarios</strong>
  <form name="usuarios" action="validacion.php" method="post">
    <table>
      <tr>
        <td><strong>Email:</strong></td>
        <td><input name="login" type="text"></td>
      </tr>
      <tr>
        <td><strong>Password:</strong></td>
        <td><input name="password" type="password"></td>
      </tr>
      <tr>
        <td><strong>Nombre:</strong></td>
        <td><input name="nombre" type="text"></td>
      </tr>
      <tr>
        <td><strong>Apellido:</strong></td>
        <td><input name="apellido" type="text"></td>
      </tr>
      <tr>
        <td><strong>C.I.:</strong></td>
        <td><input name="cedula" type="text"></td>
      </tr>
      <tr>
        <td class="buttons-form-container" colspan="2">
          <input type="hidden" name="val" value="2">
          <input type="submit" value="Enviar" class="space-right">
          <input type="reset" value="Borrar">
        </td>
      </tr>
    </table>
  </form>
</div>

</body>
</html>