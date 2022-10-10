<?php

session_start();
include_once('../config.php');

if ((!isset($_SESSION['nome_usuario']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['nome_usuario']);
    unset($_SESSION['senha']);
    header('Location: ../login.php');
}
$logado = $_SESSION['nome_usuario'];

if (!empty($_GET['search'])) {
    $data = $_GET['search'];

    $sql = "SELECT id_livro,nome_livro,editoras.nome_editora,autor,lancamento,quantidade FROM livros,editoras
    WHERE livros.editora_cod = editoras.cod_editora AND (id_livro LIKE '%$data%' OR nome_livro LIKE '%$data%'
     OR nome_editora LIKE '%$data%' OR autor LIKE '%$data%' OR lancamento LIKE '%$data%' OR quantidade LIKE '%$data%') ORDER BY id_livro ASC;";
} else {
    $sql = "SELECT id_livro,nome_livro,editoras.nome_editora,autor,lancamento,quantidade FROM livros,editoras
    WHERE livros.editora_cod = editoras.cod_editora ORDER BY id_livro ASC;";
}
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Sistema - JP</title>
    <style>
        .nav-menu a.nav-livros {
            background-color: #4760ff;
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
                <li class="nav-menu"><a href="s-home.php">INICIO</a></li>
                <li class="nav-menu"><a href="s-usuarios.php">USUÁRIO</a></li>
                <li class="nav-menu"><a href="s-editora.php">EDITORA</a></li>
                <li class="nav-menu"> <a class="nav-livros" style="color: white;" href="s-livros.php">LIVRO</a></li>
                <li class="nav-menu"><a href="s-aluguel.php">ALUGUEL</a></li>
                <li>
                    <div class="d-flex">
                        <a href="sair.php" class="btn btn-danger me-5">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="m-5 registros">
        <div class="header-table">
            <h2>Livros</h2>
            <a href="../cadastros/c-livros.php">NOVO +</a>
            <input type="search" class="form-control w-25 box-search" placeholder="Pesquisar" id="pesquisar">
            <button onclick="searchData()" class="btn btn-pesquisar box-search">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
        </div>
        <table class="table text-white table-bg">
            <thead class="table-bg-1">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Editora</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Lançamento</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($user_data = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['id_livro'] . "</td>";
                    echo "<td>" . $user_data['nome_livro'] . "</td>";
                    echo "<td>" . $user_data['nome_editora'] . "</td>";
                    echo "<td>" . $user_data['autor'] . "</td>";
                    echo "<td>" . $user_data['lancamento'] . "</td>";
                    echo "<td>" . $user_data['quantidade'] . "</td>";
                    echo "<td>
                    <a class='btn btn-sm btn-primary' href='../edite/edit-livro.php?id=$user_data[id_livro]'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                    </svg></a>
                    <a class='btn btn-sm btn-danger' href='../delete/d-livro.php?id=$user_data[id_livro]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                     <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                    </svg>
                    </a>
                    </td>";
                    echo "</tr>";
                }

                ?>


            </tbody>
        </table>
    </div>
    <script>
        const search = document.querySelector('#pesquisar');
        // chama a função de pesquisar(searchData) quando apertar na tecla "ENTER" 
        search.addEventListener("keydown", function(event) {
            if (event.key === "Enter") {
                searchData();
            }
        });

        function searchData() {
            window.location = 's-livros.php?search=' + search.value;
        }
    </script>
</body>

</html>