<?php
  include 'BDConection.php';
  $mysqli = conectarBD();
  
  function validarDado($dado, $regex, $tamanho) {

  }
  
  $json  = file_get_contents('php://input');
  $dados = json_decode($json);

  $nome      = $dados->nome;
  $telefone  = $dados->telefone;
  $raca      = $dados->raca;
  $pontuacao = $dados->pontuacao;

  $regexNome      = '';
  $regexTelefone  = '';
  $regexRaca      = '';
  $regexPontuacao = '';

  $mysqli->query("INSERT INTO form VALUES ('$nome', '$telefone', '$raca', '$pontuacao')");
?>