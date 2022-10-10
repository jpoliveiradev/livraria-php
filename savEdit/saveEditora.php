<?php
include_once('../config.php');

if (isset($_POST['update'])) {
    $id_editora = $_POST['id'];
    $nome_editora = $_POST['nome_editora'];
    $cidade = $_POST['cidade'];

    $sqlInsert = "UPDATE editoras
SET nome_editora='$nome_editora',cidade='$cidade' WHERE cod_editora=$id_editora";
    $resultUpdate = $conexao->query($sqlInsert);
}
header('Location: ../sistema/s-editora.php');
