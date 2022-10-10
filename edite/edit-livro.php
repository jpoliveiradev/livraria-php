<?php
include_once('../config.php');
if (!empty($_GET['id'])) {
    $id_livro = $_GET['id'];
    $sqlSelect = "SELECT * FROM livros WHERE id_livro = $id_livro";
    $result = $conexao->query($sqlSelect);
    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome_livro = $user_data['nome_livro'];
            $editora_cod = $user_data['editora_cod'];
            $autor = $user_data['autor'];
            $lancamento = $user_data['lancamento'];
            $quantidade = $user_data['quantidade'];
        }
    } else {
        header('Location: ../sistema/s-livros.php');
    }
} else {
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
            justify-content: center;
            align-items: center;

        }

        .box {
            color: white;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
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
            padding-left: 10px;
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

        .botao {
            border: none;
            padding: 14px;
            margin-left: 10px;
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
            margin-left: 15px;
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
        <form action="../savEdit/saveLivro.php" method="POST">
            <header>
                <h1> Editar Livro</h1>
            </header>
            <div class="inputBox">
                <input type="text" name="nome_livro" value="<?php echo $nome_livro ?>" id="nome_livro" class="inputUser" required />
                <label for="nome_livro" class="labelInput">Nome do livro</label>
            </div>
            <br>
            <div class="select">
                <p>Editora:</p>
                <select class="select_edi" name="tb_editoras">
                    <?php
                    $sql = "SELECT * FROM editoras ORDER BY cod_editora ASC";
                    $res = mysqli_query($conexao, $sql);
                    while ($user_edi = mysqli_fetch_row($res)) {
                        $id_edi = $user_edi[0];
                        $nome_edi = $user_edi[1];

                        if ($id_edi == $editora_cod) {
                            echo "<option value='$id_edi' selected >$nome_edi</option>";
                        }
                        echo "<option value='$id_edi'>$nome_edi</option>";
                    }
                    ?>
                </select>
            </div>
            <br><br>
            <div class="inputBox">
                <input type="text" name="autor" value="<?php echo $autor ?>" id="autor" class="inputUser" required />
                <label for="autor" class="labelInput">Autor</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="date" name="lancamento" value="<?php echo $lancamento ?>" id="lancamento" class="inputUser" required />
                <label for="lancamento" class="labelInput">Data lancamento</label>
            </div>
            <br /><br />
            <div class="inputBox">
                <input type="number" name="quantidade" value="<?php echo $quantidade ?>" id="quantidade" class="inputUser" required />
                <label for="quantidade" class="labelInput">Quantidade</label>
            </div>
            <br /><br />
            <input type="hidden" name="id" value="<?php echo $id_livro; ?>">
            <a class="botao" href="../sistema/s-livros.php">Fechar</a>
            <input type="submit" class="botao" name="update" id="update" value="Salvar" />

        </form>
    </div>
</body>

</html>