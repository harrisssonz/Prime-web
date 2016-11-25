<?php

  $para      = "admin@prime.co";
  $de        = $_POST['de'];
  $titulo    = $_POST['asunto'];
  $mensaje   = $_POST['mensaje'];
  $cabeceras = 'From: '.$de;

  mail($para, $titulo, $mensaje,$cabeceras);


  echo "<div class='container'> <h2>Correo envíado exitosamente</h2> </div>";

?>
