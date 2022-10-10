<?php


$dbHost = 'us-cdbr-east-06.cleardb.net';
$dbUserame = 'b4ee5d50e48637';
$dbPassword = '9ef676b4';
$dbName = 'heroku_f3a0f7238f7a0b5';

$conexao = new mysqli(
    $dbHost,
    $dbUserame,
    $dbPassword,
    $dbName
);


// $dbHost = 'Localhost';
// $dbUserame = 'root';
// $dbPassword = '';
// $dbName = 'dblivraria';

// $conexao = new mysqli($dbHost, $dbUserame, $dbPassword, $dbName);

/* if ($conexao->connect_errno) {
    echo "<h1>Erro!</h1>";
} else {
    echo "<h1>Conexão efetuada com sucesso!</h1>";
} */
