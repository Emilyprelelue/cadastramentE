<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cadastramento";

        //criar a conexão

        $conn = new mysqli($servername, $username, $password, $dbname);

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuariose (nome, email, senha) VALUES ('$nome', '$email', '$senha')";


            if($conn->query($sql) === TRUE) {
                echo "<h2>Novo registro criado com sucesso :)</h2>";
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }


        }

        $conn->close();
    ?>

    <h1>
        Registrar Usuário
    </h1>

    <form action="" method="post">
        <h4>Nome:  </h4>  <input type="text" name="nome" id="" required autocomplete="off">
        <br>
        <h4>E-mail:</h4>   <input type="email" name="email" id="" required autocomplete="off">
        <br>
        <h4>Senha: </h4>  <input type="password" name="senha" id="" required>    
        <br>
        
        <input class="rgt" type="submit" value="Cadastrar">

    </form>
</body>
</html>