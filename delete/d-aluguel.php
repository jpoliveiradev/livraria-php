<?php

if (!empty($_GET['id'])) {
    include_once('../config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM aluga WHERE cod_aluguel=$id";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM aluga WHERE cod_aluguel=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
}
header('Location: ../sistema/s-aluguel.php');
