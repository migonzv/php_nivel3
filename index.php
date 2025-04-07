<?php
session_start();
include 'link.php'; 
include 'cabecera.php'; 
$sql = 'select * from producto where cantidad>0';
$query = mysqli_query($link,$sql);
$num = mysqli_num_rows($query);
?>
<html >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP3 - CARRITO DE COMPRA</title>
  <link href="stl.css" rel="stylesheet" type="text/css" />

<script>
function carrito(idp) {
  document.formac.idp.value = idp;
  document.formac.submit(); 
}  
</script>
</head>
<body>

<div class="dcont"><p align="right">
<?php
  if (!isset($_SESSION['id_usuario'])) 
  { ?> 
    <a href="login.php">Login</a> | <a href="registrar.php">Registrarse</a><?php 
  }
  else 
  {
    echo 'Bienvenid@ '.$_SESSION['nombre'].' | ';
    if ($_SESSION['tipo']=='Administrador') 
    {?> 
      <a href="producto.php">Productos</a> |  <?php 
    }
    else 
    { ?>
      <a href="carrito.php">Ver carrito </a> | <?php 
    }?>
     <a href="cierre.php">Salir</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php  
  }
?>
</p>
</div>
<div class="dcont">
  <div id="productos"> 
 <?php
  if($num==0) 
  {
    echo 'No existen productos en este momento.';
  }
  else 
  {
    while($row = mysqli_fetch_array($query)) 
    { ?>
    <div class="producto">
      <table width="320" border="1">
        <tr>
          <td width="40%" >
            <img src="images/<?php echo $row['imagen']; ?>" name="img<?php echo $row['id']; ?>" border="0" width="120" height="90">
          </td>
          <td width="60%" >
            <b><?php echo $row['nombre']; ?></b>
            <?php 
            if (isset($_SESSION['tipo']) && $_SESSION['tipo']=='usuario') 
              { ?>
               <a href="agregar_carro.php?pro=<?php print $row [0];?>"  ?> 
               <img src="images/addcarrito.png" width="33" height="23" id="carrito2" align="right" /></a><?php 
              } ?>
              <br /> 
              <i>Precio</i>: Bs. <?php echo $row['precio']; ?><br />
              <i>Existencia</i>: <?php echo $row['cantidad']; ?><br />
              <i>Descripcion</i>: <?php echo $row['descripcion']; ?>
          </td>
        </tr> 
      </table>
    </div>
<?php   
    }
  }
?>
  </div>
</div>
<form name="formac" method="post" action="validacion.php">
  <!--  formulario para agregar productos al carrito-->
  <input type="hidden" name="val" value="4" />
  <input type="hidden" name="idp" value="" />
</form>
</body>
</html>