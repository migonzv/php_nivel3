<?php
session_start();
include 'link.php';
include 'cabecera.php';
/*Buscar las existencias de los productos que tienen existencia
$sql ="select p.id_producto,p.nombre,p.precio from producto as p, carrito as c where c.id_usuario='$_SESSION[id_usuario]' and p.cantidad >0 and p.id_producto = c.id_producto";
$query = mysqli_query($link,$sql);*/
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>PHP3 - CARRITO DE COMPRA</title>
  <link href="stl.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="dcont">
    <p align="right">
      <?php echo 'Bienvenid@ ' . $_SESSION['nombre']; ?> | <a href="index.php">Inicio</a> | <a href="cierre.php">Salir</a>&nbsp;&nbsp;</p>
  </div>
  <div class="content-center">
    <form method="post" action="validacion.php">
      <input type="hidden" name="numprod" value="<?php echo $_POST['numprod']; ?>">
      <input type="hidden" name="val" value="6">
      <h1>Pre-compra</h1>
      <b class="red">Por favor revise el listado de artículos<br>antes de efectuar la compra</b><br><br>
      <table width="400" border="1" cellspacing="3" cellpadding="3" align="center" bgcolor="#ffcc00">
        <tr bgcolor="#ffcc00">
          <td align="center" bgcolor="#ffee99"><b>Cantidad</b></td>
          <td align="center" bgcolor="#ffee99"><b>Nombre</b></td>
          <td align="center" bgcolor="#ffee99"><b>Precio</b></td>
          <td align="center" bgcolor="#ffee99"><b>Totales</b></td>
        </tr>
        <?php
        $todo = 0;
        $sql = "select c.id_carrito,p.nombre,c.cantidad,p.precio,c.id_producto from carrito as c,producto as p
                where c.id_usuario='$_SESSION[id_usuario]' and c.id_producto=p.id_producto";
        $result = mysqli_query($link, $sql);
        $a = 0;
        while ($vec = mysqli_fetch_array($result)) { ?>
          <tr bgcolor="#ffffff">
            <td><?php print $vec[2]; ?></td>
            <td><?php print $vec[1]; ?></td>
            <td><?php print $vec[3]; ?></td>
            <td><?php print $total = $vec[2] * $vec[3]; ?></td>
          </tr> <?php $todo = $todo + $total;
                $a++;
              }
                ?>
        <tr>
          <td colspan="3" align="right">
            <b>Total a pagar: </b></td>
          <td><?php print $todo; ?></td>
        </tr>
        <tr>
          <td colspan="4" align="center" bgcolor="#ffcc00">
            <input type="submit" value="Comprar">&nbsp;&nbsp;&nbsp;
            <input name="pago" id="pago" type="button" onclick="print()" value="imprimir" />
            <input type="hidden" name="total1" value="<?php print $todo; ?>">
            <input type="hidden" name="cant" value="<?php print $cant; ?>">
            <input type="hidden" name="pro" value="<?php print $pro; ?>">
            <input type="hidden" name="a" value="<?php print $a; ?>">
          </td>
        </tr>
      </table>
    </form>
  </div>
</html>