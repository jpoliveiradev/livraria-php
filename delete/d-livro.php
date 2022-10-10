<?php

if (!empty($_GET['id'])) {
    include_once('../config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM livros WHERE id_livro=$id";

    $result = $conexao->query($sqlSelect);

    $sqlAluguel = "SELECT *  FROM aluga WHERE livro_cod=$id";

    $resultAluguel = $conexao->query($sqlAluguel);

    if ($result->num_rows > 0) {
        $sqlDeleteAluguel = "DELETE FROM aluga WHERE livro_cod=$id";
        $resultDeleteAluguel = $conexao->query($sqlDeleteAluguel);

        $sqlDelete = "DELETE FROM livros WHERE id_livro=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
}
header('Location: ../sistema/s-livros.php');
