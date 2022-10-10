<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Livraria</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to bottom, #5808fb, #4760ff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.733);
            color: white;
            padding: 35px;
            border-radius: 10px;
        }

        header h1 {
            margin-bottom: 30px;
        }

        .inputBox {
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            border-radius: 10px;
            width: 100%;

        }

        .inputSubmit {
            color: white;
            background: #4307bb;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 10px;
            font-size: 1.4em;
            cursor: pointer;
        }

        .inputSubmit:hover {
            background: #2f0d74;
        }

        a {
            color: white;
            font-size: 12px;
        }

        a#voltar {
            margin-left: 2%;
            margin-right: 45%;
        }

        a:hover {
            color: #4760ff;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <h1>Login de Acesso</h1>
        </header>
        <form action="./sistema/testeLogin.php" method="POST">
            <input type="text" class="inputBox" name="nome_usuario" id="nome_usuario" placeholder="Usuário" />
            <br /><br />
            <input type="password" class="inputBox" name="senha" id="senha" placeholder="Senha" /> <br /><br />
            <input class="inputSubmit" type="submit" name="submit" value="Acessar" />
        </form>
        <a id="voltar" href="index.php">Voltar</a>
        <a id="cadastro" href="cadastro_acesso.php">cadastrar acesso</a>
    </div>
</body>

</html>