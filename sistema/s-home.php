<?php

// inicia a sessão
session_start();
include_once('../config.php');

if ((!isset($_SESSION['nome_usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['nome_usuario']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}
$logado = $_SESSION['nome_usuario'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sistema - JP</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            background: linear-gradient(to right, #5808fb, #4760ff);
            color: white;
            text-align: center;
        }

        nav {
            background: #fefefe;
            box-shadow: 1px 1px 6px black;
        }

        .menu {
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding-top: 10px;

        }

        .menu ul {
            list-style: none;
            margin-top: 10px;

        }

        .menu ul li {
            display: inline-block;

        }

        .menu ul li a {
            text-decoration: none;
        }

        .menu ul li a.home {
            background-color: #4760ff;
            color: aliceblue;
        }

        .menu ul .nav-menu a:hover {
            background-color: #5808fb;
            color: white;

        }

        .menu ul li .logo {
            color: black;
            font-size: 25px;
            font-weight: bolder;
        }


        .menu ul .nav-menu a {
            color: black;
            padding: 10px;
            font-size: 18px;
            margin-left: 15px;
            border-radius: 15px;
            transition: 0.5s;
        }

        .menu ul .nav-menu a:hover {
            background-color: #5808fb;
            color: white;
        }

        .menu ul li .d-flex a {
            margin: 5px;
            margin-left: 50px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="menu">
            <ul>
                <li> <a class="logo" href="#">WDA LIVRARIA</a></li>
            </ul>
            <ul>
                <li class="nav-menu"><a class="home" href="s-home.php">INICIO</a></li>
                <li class="nav-menu"><a class="usuario" href="s-usuarios.php">USUÁRIO</a></li>
                <li class="nav-menu"><a class="editora" href="s-editora.php">EDITORA</a></li>
                <li class="nav-menu"> <a class="livro" href="s-livros.php">LIVRO</a></li>
                <li class="nav-menu"><a class="alugel" href="s-aluguel.php">ALUGUEL</a></li>
                <li>
                    <div class="d-flex">
                        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <br>

    <?php
    echo "<h1>Bem vindo <u>$logado</u></h1>";
    ?>
</body>

</html>