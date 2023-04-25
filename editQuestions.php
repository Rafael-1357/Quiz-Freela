<?php
  include 'BDConection.php';
  $mysqli = conectarBD();

  $json  = file_get_contents('php://input');
  
  //$dados->operation - Irá armazenar o tipo da operação. Os valores podem ser "question", "weight" e "alternate"
  //$dados->id - ID do elemento que estará sendo modificado
  //$dados->value - Irá armazenar o novo valor que deverá ser atribuído
  $dados = json_decode($json);
  var_dump($dados);
  $id    = '';
  $table = '';
  $field = '';

  switch($dados->operation) {
    case 'question':
      $table = 'Perguntas';
      $id    = 'idPergunta';
      $field = 'descricao';
      break;
    
    case 'weigth':
      $table = 'Perguntas';
      $id    = 'idPergunta';
      $field = 'peso'; 
      break;

    case 'alternate':
      $table = 'Opcoes';
      $id    = 'idOpcao';
      $field = 'descricao';
  }

  $query = "UPDATE $table SET $field = '$dados->value' WHERE $id = $dados->id";
  $mysqli->query($query);
?>