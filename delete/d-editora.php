<?php

if (!empty($_GET['id'])) {
    include_once('../config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM editoras WHERE cod_editora=$id";

    $result = $conexao->query($sqlSelect);

    $sqlLivro = "SELECT *  FROM livros WHERE editora_cod=$id";

    $resultLivro = $conexao->query($sqlLivro);

    if ($result->num_rows > 0) {
        $sqlDeleteLivro = "DELETE FROM livros WHERE editora_cod=$id";
        $resultDeleteLivro = $conexao->query($sqlDeleteLivro);

        $sqlDelete = "DELETE FROM editoras WHERE cod_editora=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
}
header('Location: ../sistema/s-editora.php');
