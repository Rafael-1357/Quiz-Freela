<?php
  include 'BDConection.php';
  $mysqli = conectarBD();

  $json  = file_get_contents('php://input');
  
  //$dados->operation - Irá armazenar o tipo da operação. Os valores podem ser 1 ou 2
  //$dados->id - ID do elemento que estará sendo modificado
  //$dados->value - Irá armazenar o novo valor que deverá ser atribuído
  $dados = json_decode($json);
  $table = '';
  $id    = '';

  if($dados->operation === 1) {
    $table = 'Options';
    $id = 'idOption';
  } else {
    $table = 'Questions';
    $id = 'idQuestion';
  }

  $query = "UPDATE $table SET valor = $dados->value WHERE $id = $dados->id";
  $mysqli->query($query);
?>