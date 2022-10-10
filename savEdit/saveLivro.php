<?php
include_once('../config.php');

if (isset($_POST['update'])) {
    $id_livro = $_POST['id'];
    $nome_livro = $_POST['nome_livro'];
    $editora_cod = $_POST['tb_editoras'];
    $autor = $_POST['autor'];
    $lancamento = $_POST['lancamento'];
    $quantidade = $_POST['quantidade'];

    $sqlInsert = "UPDATE livros
SET nome_livro='$nome_livro',editora_cod='$editora_cod',autor='$autor',lancamento='$lancamento',quantidade='$quantidade'
WHERE id_livro=$id_livro";
    $resultUpdate = $conexao->query($sqlInsert);
}
header('Location: ../sistema/s-livros.php');
