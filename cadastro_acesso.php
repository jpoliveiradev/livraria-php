<?php

if (isset($_POST['submit'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO acesso(nome,nome_usuario,email,senha) 
        VALUES ('$nome','$username','$email','$senha')");

    header('Location: login.php');
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
            justify-content: center;
            align-items: center;
        }


        .box {
            color: white;
            background-color: rgba(0, 0, 0, 0.7);
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
        }


        header h1 {
            text-align: center;
            padding: 10px;
            margin-bottom: 12px;
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
            width: 100%;
            border: none;
            padding: 15px;
            margin-bottom: 20px;
            color: white;
            background-image: linear-gradient(to right, rgb(10, 111, 255), rgb(90, 20, 220));
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }


        #submit:hover {
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 195));
        }

        a {
            color: white;
            padding: 10px;
        }

        a#voltar {
            margin-left: 2%;
            margin-right: 52%;
        }

        a:hover {
            color: #4760ff;
        }
    </style>
</head>

<body>
    <div class="box">
        <form action="cadastro_acesso.php" method="POST">
            <header>
                <h1> Cadastro de Acesso</h1>
            </header>

            <div class="inputBox">
                <input type="text" name="nome" id="nome" class="inputUser" required />
                <label for="nome" class="labelInput">Nome Completo</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="text" name="username" id="username" class="inputUser" required />
                <label for="username" class="labelInput">Nome de Usuário</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="text" name="email" id="email" class="inputUser" required />
                <label for="email" class="labelInput">Email</label>
            </div><br><br>
            <div class="inputBox">
                <input type="password" name="senha" id="senha" class="inputUser" required />
                <label for="senha" class="labelInput">Senha</label>
            </div>

            <br />
            <input type="submit" name="submit" id="submit" />
            <a id="voltar" href="index.php">Voltar</a>
            <a id="login" href="login.php">Login</a>

        </form>
    </div>
</body>

</html>