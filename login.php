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

<h1>Inicio de sesión</h1>

<div class="content-center">
  <strong>Introduzca su nombre de usuario</strong>
  <form action="validacion.php" method="post">
    <table>
      <tr>
        <td><strong>Correo:</strong></td>
        <td><input name="email" type="text" size="20" maxlength="50" value=""></td>
      </tr>
      <tr>
        <td><strong>Password:</strong></td>
        <td><input name="password" type="password" size="20" maxlength="16" value=""></td>
      </tr>
      <tr>
        <td class="buttons-form-container" colspan="2">
          <input type="hidden" name="val" value="1">
          <input type="submit" value="Enviar" class="space-right">
          <input type="reset" value="Borrar">
        </td>
      </tr>
    </table>
  </form>
</div>

</body>
</html>