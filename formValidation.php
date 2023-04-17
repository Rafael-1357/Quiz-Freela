<?php
  include 'BDConection.php';
  $mysqli = conectarBD();
  
  function validarDados($dados, $callbacksValidation) {
    foreach($dados as $chave => $valor) {
      if(!$callbacksValidation[$chave]($valor)) {
        return false;
      }
    }

    return true;
  }
  
  $json  = file_get_contents('php://input');
  $dados = json_decode($json);

  $callbacksValidation['nome'] = function($nome) {
    $regex = '/^[a-zA-Zá-üÁ-Ü]+(( [a-zA-Zá-üÁ-Ü]+)+)?$/';
    $tamanho = strlen($nome);
    return preg_match($regex, $nome) && $tamanho > 2 && $tamanho <= 60;  
  };

  $callbacksValidation['telefone'] = function($telefone) {
    $regex = '/^\d{11,13}$/';

    return preg_match($regex, $telefone);
  };

  $callbacksValidation['raca'] = function($raca) {
    $regex = '/^[a-zA-Zá-üÁ-Ü]+(( [a-zA-Zá-üÁ-Ü]+)+)?$/';
    $tamanho = strlen($raca);
    return preg_match($regex, $raca) && $tamanho > 2 && $tamanho <= 60;
  };

  $callbacksValidation['pontuacao'] = function($pontuacao) {
    return $pontuacao >= 0 && $pontuacao <= 10;
  };

  $validacao = validarDados($dados, $callbacksValidation);

  if($validacao) {
    $query = "INSERT INTO form(nome, telefone, raca, pontuacao) VALUES ('$dados->nome', '$dados->telefone', '$dados->raca', $dados->pontuacao)";
    $mysqli->query($query);
  }
?>