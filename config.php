<?php


$dbHost = 'Localhost';
$dbUserame = 'root';
$dbPassword = '';
$dbName = 'dblivraria';

$conexao = new mysqli($dbHost, $dbUserame, $dbPassword, $dbName);

/* if ($conexao->connect_errno) {
    echo "<h1>Erro!</h1>";
} else {
    echo "<h1>Conexão efetuada com sucesso!</h1>";
} */
