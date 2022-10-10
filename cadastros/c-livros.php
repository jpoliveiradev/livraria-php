<?php

include_once('../config.php');
if (isset($_POST['submit'])) {

    $nome_livro = $_POST['nome_livro'];
    $editora_cod = $_POST['tb_editoras'];
    $autor = $_POST['autor'];
    $lancamento = $_POST['lancamento'];
    $quantidade = $_POST['quantidade'];

    $result = mysqli_query($conexao, "INSERT INTO livros(nome_livro,editora_cod,autor,lancamento,quantidade) 
        VALUES ('$nome_livro','$editora_cod','$autor','$lancamento','$quantidade')");

    header('Location: ../sistema/s-livros.php');
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
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to left, #5808fb, #4760ff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box {
            color: white;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 15px;
            border-radius: 15px;
        }

        header h1 {
            padding: 15px;
            margin-bottom: 10px;
            text-align: center;
        }

        .inputBox {
            position: relative;
            margin-left: 10px;
            margin-right: 10px;
        }

        .inputUser {
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }

        .labelInput {
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: 5px;
        }

        .inputUser:focus~.labelInput,
        .inputUser:valid~.labelInput {
            top: -20px;
            font-size: 12px;
            color: rgb(10, 111, 255);
        }

        .select p {
            display: inline-block;
            margin-left: 10px;
            font-size: 1.1em;
        }

        .select_edi {
            padding: 8px;
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
        <form action="c-livros.php" method="POST">
            <header>
                <h1> Cadastro de Livros</h1>
            </header>
            <div class="inputBox">
                <input type="text" name="nome_livro" id="nome_livro" class="inputUser" required />
                <label for="nome_livro" class="labelInput">Nome do livro</label>
            </div>
            <br /><br />
            <div class="select">
                <p>Editora:</p>
                <select class="select_edi" name="tb_editoras">
                    <option value="">Selecione</option>
                    <?php
                    $sql = "SELECT * FROM editoras ORDER BY cod_editora ASC";
                    $res = mysqli_query($conexao, $sql);
                    while ($user_edi = mysqli_fetch_row($res)) {
                        $id_edi = $user_edi[0];
                        $nome_edi = $user_edi[1];

                        echo "<option class='edi_valores' value='$id_edi'>$nome_edi</option>";
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="inputBox">
                <input type="text" name="autor" id="autor" class="inputUser" required />
                <label for="autor" class="labelInput">Autor</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <label for="lancamento" class="labelInput">Data lancamento:</label><br><br>
                <input type="date" name="lancamento" id="lancamento" class="inputUser" required />
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="number" name="quantidade" id="quantidade" class="inputUser" required />
                <label for="quantidade" class="labelInput">Quantidade</label>
            </div>
            <br /><br />

            <input type="submit" name="submit" id="submit" />
            <a href="../sistema/s-livros.php">Voltar</a>

        </form>
    </div>
</body>

</html>