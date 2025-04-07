<?php
  $link = mysqli_connect('localhost','root','','d_php3_migonzv');

  if (!$link) {
    die('Error de Conexión: (' . mysqli_connect_errno() . ') '
      . mysqli_connect_error());
  }
?>