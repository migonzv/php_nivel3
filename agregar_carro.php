<?php session_start(); ?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Documento sin título</title>
</head>
<body>
<?php
include "link.php";
include "cabecera.php";
$sql = "select * from producto where id_producto ='$_GET[pro]'"; 
$query = mysqli_query($link,$sql); 
$vector=mysqli_fetch_array($query);
?>
<div class="producto">
 <table width="320" border="1" align ="center">
 <tr>
 <td width="40%" >
 <img src="images/<?php echo $vector['imagen']; ?>" border="0" width="120" height="90">
 </td>
 <td width="60%" >
 <b><?php echo $vector[1]; ?></b>
 <i>Precio</i>: Bs. <?php echo $vector[2]; ?><br />
<form id="form1" name="form1" method="post" action="validacion.php">
 <i>cantidad</i>: <input size="10" type="text" name="cantidad"><br />
 <input type="hidden" name="id_producto" value ="<?php echo $vector[0]; ?>">
 <input type="hidden" name="val" value="4">
 <input type="submit" value="agregar a carrito">
 </form>
 </td>
 </tr> 
 </table>
</div>
</body>
</html>