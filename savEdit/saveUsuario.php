<?php
include_once('../config.php');

if (isset($_POST['update'])) {
    $id_usuario = $_POST['id'];
    $nome_usu = $_POST['nome_usuario'];
    $cidade_usu = $_POST['cidade'];
    $endereco_usu = $_POST['endereco'];
    $email_usu = $_POST['email'];

    $sqlInsert = "UPDATE usuarios
SET nome_usuario='$nome_usu',cidade_usuario='$cidade_usu',endereco='$endereco_usu',email='$email_usu'
WHERE id_usuario=$id_usuario";
    $resultUpdate = $conexao->query($sqlInsert);
}
header('Location: ../sistema/s-usuarios.php');
