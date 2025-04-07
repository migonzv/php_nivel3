<?php
session_start();
include 'link.php';
include 'cabecera.php';
$sql = "select p.id_producto,p.nombre,p.precio, p.imagen, c.cantidad from producto as p,carrito as c where c.id_usuario=" . $_SESSION['id_usuario'] . " and c.id_producto=p.id_producto";
$query = mysqli_query($link, $sql);
$num = mysqli_num_rows($query);
if ($num == 0) { ?>
  <script>
    alert("Su carrito esta vacío ");
  </script> <?php
} else {
?>
  <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>PHP3 - CARRITO DE COMPRA</title>
    <link href="stl.css" rel="stylesheet" type="text/css" />
    <script language="javascript1.5" type="text/javascript">
      function eliminar(nom, idp, cant) {
        if (confirm("Esta seguro de eliminar el producto " + nom)) {
          document.formae.idp.value = idp;
          document.formae.cant.value = cant;
          document.formae.submit();
        }
      }
    </script>
  </head>
  <body>
    <div class="dcont">
      <p align="right">
        <?php echo 'Bienvenid@ ' . $_SESSION['nombre']; ?> <a href="index.php">Inicio</a> | <a href="cierre.php">Salir</a>&nbsp;&nbsp;</p>
    </div>
    <br />
    <div class="dcont">
      <b>Carrito de compra</b>
      <br><br>
      <form name="forma1" method="post" action="precompra.php">
        <table width="600" border="1" cellspacing="3" cellpadding="3" align="center" bgcolor="#ffcc00">
          <tr height="30" bgcolor="#ffcc00">
            <td width="150" align="center" bgcolor="#FFE57E"><b>Nombre</b></td>
            <td width="150" align="center" bgcolor="#FFE57E"><b>Imagen</b></td>
            <td width="100" align="center" bgcolor="#FFE57E"><b>Cantidad</b></td>
            <td width="100" align="center" bgcolor="#FFE57E"><b>Precio</b></td>
            <td width="100" align="center" bgcolor="#FFE57E"><b>Total</b></td>
            <td width="100" bgcolor="#FFE57E"><input type="hidden" name="val" value="6">
              <input type="hidden" name="numprod" value="<?php echo $num; ?>"></td>
          </tr>
          <?php
            $todo = 0;
            while ($row = mysqli_fetch_array($query)) { ?>
            <tr height="30" bgcolor="#ffffff">
              <td>
                <?php echo $row[1]; ?>
              </td>
              <td>
                <img src="images/<?php echo $row[3]; ?>" border="0" width="80" height="60" name="img" />
              </td>
              <td>
                <?php echo $row[4]; ?>
              </td>
              <td>
                <?php echo $row[2]; ?>
              </td>
              <td><?php print $total = $row[2] * $row[4]; ?></td>
              <td align="center">
                <a href="#" onclick="eliminar('<?php echo $row[1]; ?>','<?php echo $row[0]; ?>','<?php echo $row[4]; ?>')">
                  <img src="images/elim.png" alt="borrar" width="16" height="16" id="borrar1" />
                </a>
              </td>
            </tr>
          <?php $todo = $todo + $total;
            } ?>
          <tr height="30" bgcolor="#ffcc00">
            <td width="150" colspan="6" align="center" bgcolor="#FFcc00">
              <b> <?php print "Total a pagar: " . $todo; ?> </b></td>
          </tr>
          <tr height="30" bgcolor="#ffcc00">
            <td width="150" colspan="6" align="center" bgcolor="#FFcc00">
              <input type="submit" value="PRE-PAGO" />
            </td>
          </tr>
        </table>
      </form>
      <form name="formae" method="post" action="validacion.php">
        <input type="hidden" name="val" value="5">
        <input type="hidden" name="idp" value="">
        <input type="hidden" name="cant" value="">
      </form>
    </div>
  </body>
  </html>
<?php
} //endif
?>