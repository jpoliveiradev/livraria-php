<?php

if (!empty($_GET['id'])) {
    include_once('../config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT *  FROM usuarios WHERE id_usuario=$id";

    $result = $conexao->query($sqlSelect);

    $sqlAluguel = "SELECT *  FROM aluga WHERE usuario_cod=$id";

    $resultAluguel = $conexao->query($sqlAluguel);

    if ($result->num_rows > 0) {
        $sqlDeleteAluguel = "DELETE FROM aluga WHERE usuario_cod=$id";
        $resultDeleteAluguel = $conexao->query($sqlDeleteAluguel);

        $sqlDelete = "DELETE FROM usuarios WHERE id_usuario=$id";
        $resultDelete = $conexao->query($sqlDelete);
    }
}
header('Location: ../sistema/s-usuarios.php');
