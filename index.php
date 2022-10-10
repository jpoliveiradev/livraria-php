<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to bottom, #5808fb, #4760ff);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            text-align: center;

        }

        h1 {
            margin-bottom: 10px;
        }

        a {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            margin: 10px;

            padding: 10px;
            color: white;
            text-decoration: none;
            border: 3px solid #4760ff;
            border-radius: 10px;
        }

        a:hover {
            background-color: #4760ff;
        }
    </style>
</head>

<body>
    <div class="box">
        <h1>Livraria WDA</h1>
        <a href="login.php">Login</a>
        <a href="cadastro_acesso.php">Cadastre-se</a>
    </div>
</body>

</html>