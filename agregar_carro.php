<?php
  session_start();
  include "link.php";
  include "cabecera.php";
  $sql = "SELECT * FROM producto WHERE id_producto ='$_GET[pro]'";
  $query = mysqli_query($link, $sql);
  $vector = mysqli_fetch_array($query);
?>
  <div class="content-center">
    <h1>Agregar al Carrito</h1>
    <div class="producto">
      <table class="table-element">
        <tr>
          <td width="40%">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($vector['imagen']) ?>" name="img-<?php echo $vector[1] ?>" width="120" height="auto"/>
          </td>
          <td width="60%">
            <b><?php echo $vector[1]; ?></b>
            <i>Precio</i>: Bs. <?php echo $vector[2]; ?><br />
            <form id="form1" name="form1" method="post" action="validacion.php">
              <i>cantidad</i>: <input size="10" type="text" name="cantidad"><br />
              <input type="hidden" name="id_producto" value="<?php echo $vector[0]; ?>">
              <input type="hidden" name="val" value="4">
              <input type="submit" value="agregar a carrito">
            </form>
          </td>
        </tr>
      </table>
    </div>
  </div>
</body>

</html>