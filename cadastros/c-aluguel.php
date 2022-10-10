<?php

include_once('../config.php');
if (isset($_POST['submit'])) {

    $livro_cod = $_POST['tb_livros'];
    $usu_cod = $_POST['tb_usu'];
    $data_aluguel = $_POST['data_aluguel'];
    $data_previsao = $_POST['data_previsao'];

    $result = mysqli_query($conexao, "INSERT INTO aluga(livro_cod,usuario_cod,data_aluguel,data_previsao) 
        VALUES ('$livro_cod','$usu_cod','$data_aluguel','$data_previsao')");

    header('Location: ../sistema/s-aluguel.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulário | JP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to left, #5808fb, #4760ff);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box {
            color: white;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px;
            border-radius: 15px;
        }

        header h1 {
            text-align: center;
            padding: 15px;
        }

        .inputBox {
            position: relative;
            margin: 10px;
        }

        .select p {
            display: inline-block;
            padding-left: 10px;
            padding-bottom: 15px;
            font-size: 1.1em;
        }

        label {
            font-size: 1.1em;
        }

        .option {
            padding: 5px;
            background: #4760ff;
            border-radius: 10px;
            width: 60%;
            color: white;
            font-weight: 600;
            text-align: center;
        }

        #submit {
            background-image: linear-gradient(to right, rgb(10, 111, 255), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            margin-bottom: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }

        #submit:hover {
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
        }

        a {
            color: white;
            font-size: 15px;
            margin-left: 80%;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color: #4760ff;
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="c-aluguel.php" method="POST">
            <header>
                <h1> Cadastrar Aluguel</h1>
            </header>
            <div class="select">
                <p>Livro:</p>
                <select id="s1" class="option" name="tb_livros">
                    <option value="">Selecione</option>
                    <?php
                    $sql = "SELECT * FROM livros ORDER BY id_livro ASC";
                    $res_livros = mysqli_query($conexao, $sql);
                    while ($user_livro = mysqli_fetch_row($res_livros)) {
                        $id_livro = $user_livro[0];
                        $livros_nome = $user_livro[1];

                        echo "<option value='$id_livro'>$livros_nome</option>";
                    }
                    ?>
                </select>
                <br>
                <p>Usuário:</p>
                <select id="s2" class="option" name="tb_usu">
                    <option value="">Selecione</option>
                    <?php
                    $sql = "SELECT * FROM usuarios ORDER BY id_usuario ASC";
                    $res_usuarios = mysqli_query($conexao, $sql);
                    while ($user_usu = mysqli_fetch_row($res_usuarios)) {
                        $id_usu = $user_usu[0];
                        $nome_usu = $user_usu[1];
                        echo "<option value='$id_usu'>$nome_usu</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="inputBox">
                <label for="data_aluguel" class="date">Data de aluguel:</label>
                <input type="date" name="data_aluguel" required />
                <br /><br />
                <label for="lancamento" class="date">Previsão de devolução:</label>
                <input type="date" name="data_previsao" required />
                <br /><br />

                <input type="submit" name="submit" id="submit" />
                <a href="../sistema/s-aluguel.php">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>