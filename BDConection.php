<?php
  function conectarBD() {
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'climev';

    return new mysqli($host, $user, $password, $database);
  }
?>