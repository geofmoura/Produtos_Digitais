<?php 
  $usuario = 'root';
  $senha = 'novasenha';
  $database = 'sistema';
  $host = 'localhost';
  
  $mysqli = new mysqli($host, $usuario, $senha, $database);

    if($mysqli -> error) {
        die("Erro ao tentar conexão: " . $mysqli -> error);
    }
?>