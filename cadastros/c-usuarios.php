<?php

if (isset($_POST['submit'])) {
    include_once('../config.php');

    $nome_usuario = $_POST['nome_usuario'];
    $cidade = $_POST['cidade'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome_usuario,cidade_usuario,endereco,email) 
        VALUES ('$nome_usuario','$cidade','$endereco','$email')");

    header('Location: ../sistema/s-usuarios.php');
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
        <form action="c-usuarios.php" method="POST">
            <header>
                <h1> Cadastro de Usuário</h1>
            </header>
            <div class="inputBox">
                <input type="text" name="nome_usuario" id="nome_usuario" class="inputUser" required />
                <label for="nome_usuario" class="labelInput">Nome do Usuário</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="text" name="cidade" id="cidade" class="inputUser" required />
                <label for="cidade" class="labelInput">Cidade</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="text" name="endereco" id="endereco" class="inputUser" required />
                <label for="endereco" class="labelInput">Endereço</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required />
                <label for="email" class="labelInput">Email</label>
            </div><br /><br />

            <input type="submit" name="submit" id="submit" />
            <a href="../sistema/s-usuarios.php">Voltar</a>

        </form>
    </div>
</body>

</html>