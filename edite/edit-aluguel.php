<?php
include_once('../config.php');
if (isset($_POST['update'])) {
    $id_usuario = $_POST['id'];
    $data_devolucao = $_POST['data_devolucao'];
    $sqlInsert = "UPDATE aluga
SET data_devolucao='$data_devolucao' WHERE id_usuario=$id_usuario";
    $resultUpdate = $conexao->query($sqlInsert);
}
header('Location: ../sistema/s-usuarios.php');
