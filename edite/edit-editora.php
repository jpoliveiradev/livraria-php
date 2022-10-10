<?php
include_once('../config.php');
if (!empty($_GET['id'])) {
    $id_edi = $_GET['id'];
    $sqlSelect = "SELECT * FROM editoras WHERE cod_editora = $id_edi";
    $result = $conexao->query($sqlSelect);
    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome_editora = $user_data['nome_editora'];
            $cidade = $user_data['cidade'];
        }
    } else {
        header('Location: ../sistema/s-usuarios.php');
    }
} else {
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
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to left, #5808fb, #4760ff);
        }

        .box {
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

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

        .botao {
            border: none;
            padding: 14px;
            margin-left: 8px;
            margin-bottom: 10px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
            width: 50%;
            text-decoration: none;
            background: linear-gradient(90deg, #af0d0d, #e71313);
        }

        #update {
            margin-left: 30px;
            background-image: linear-gradient(to right, rgb(10, 111, 255), rgb(90, 20, 220));
        }

        #update:hover {
            background-image: linear-gradient(to right, rgb(0, 80, 172), rgb(80, 19, 200));
        }

        .botao:hover {
            background: linear-gradient(to left, #3b0b0b, #e71313);

        }
    </style>
</head>

<body>
    <div class="box">
        <form action="../savEdit/saveEditora.php" method="POST">
            <header>
                <h1> Editar Editora</h1>
            </header>
            <div class="inputBox">
                <input type="text" name="nome_editora" value="<?php echo $nome_editora ?>" id="nome_editora" class="inputUser" required />
                <label for="nome_editora" class="labelInput">Nome da Editora</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="text" name="cidade" value="<?php echo $cidade ?>" id="cidade" class="inputUser" required />
                <label for="cidade" class="labelInput">Cidade</label>
            </div>
            <br /><br />
            <input type="hidden" name="id" value="<?php echo $id_edi; ?>">
            <a class="botao" href="../sistema/s-editora.php">Fechar</a>
            <input type="submit" class="botao" name="update" id="update" value="Salvar" />

        </form>
    </div>
</body>

</html>