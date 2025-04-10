<?php
  session_start();
  include 'link.php';
  include 'cabecera.php';
  $sql = 'select * from producto where cantidad>0';
  $query = mysqli_query($link,$sql);
  $num = mysqli_num_rows($query);
?>
<html>
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

<div class="navbar-menu">
  <p>
  <?php
    if (!isset($_SESSION['id_usuario']))
    { ?>
      <span><a href="login.php">Login</a></span>
      <span class="divisor">|</span>
      <a href="registrar.php">Registrarse</a>
      <?php
    }
    else
    {
      echo 'Bienvenid@ '.$_SESSION['nombre'].'
      <span class="divisor">|</span>
      ';
      if ($_SESSION['tipo']=='Administrador')
      {?>
        <a href="producto.php">Productos</a>
        <span class="divisor">|</span>
        <?php
      }
      else
      { ?>
        <a href="carrito.php">Ver carrito </a>
        <span class="divisor">|</span>
        <?php
      }?>
        <a href="cierre.php">Salir</a>
      <?php
    }
  ?>
  </p>
</div>
<div class="content-center wrap">
  <h1>Tienda Virtual</h1>
  <div id="productos" class="productos">
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
      <table class="table-element">
        <tr>
          <td width="40%">
            <?php
              $id_image = $row['id_producto'];

              $query_image = "SELECT imagen FROM producto WHERE id_producto= $id_image;";

              $result_tasks = mysqli_query($link, $query_image);

              $img_data = mysqli_fetch_assoc($result_tasks);

              echo '<img src="data:image/jpeg;base64,'.base64_encode($img_data['imagen']).'" name="img-'.$row['nombre'].'" border="0" width="120" height="auto"/>';
            ?>
          </td>
          <td width="60%" >
            <b><?php echo $row['nombre']; ?></b>
            <?php
            if (isset($_SESSION['tipo']) && $_SESSION['tipo']=='usuario')
              { ?>
                <a href="./agregar_carro.php?pro=<?php print $row [0];?>"  ?>
                <img src="./images/addcarrito.png" width="33" height="auto" id="carrito2" align="right" /></a><?php
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