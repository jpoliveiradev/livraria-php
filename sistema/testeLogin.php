<?php

//inicia a sessão
session_start();
if (isset($_POST['submit']) && !empty($_POST['nome_usuario']) && !empty($_POST['senha'])) {
    // Acessa
    include_once('../config.php');
    $nome_usuario = $_POST['nome_usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM acesso WHERE nome_usuario = '$nome_usuario' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) < 1) {
        // Se não houver vai apagar as informações
        unset($_SESSION['nome_usuario']);
        unset($_SESSION['senha']);
        header('Location: ../login.php');
    } else {
        $_SESSION['nome_usuario'] = $nome_usuario;
        $_SESSION['senha'] = $senha;
        header('Location: s-home.php');
    }

    //
} else {
    // Não acessa
    header('Location: ../login.php');
}
