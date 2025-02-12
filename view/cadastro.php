<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>

<body>
    <h1>Cadastrar Usuário</h1>
    <form method="POST">
        <input type="text" name="nome_usuario" placeholder="Nome">
        <input type="text" name="email_usuario" placeholder="Email">
        <input type="text" name="senha_usuario" placeholder="Senha">
        <button type="submit">Cadastar</button>
    </form>

    <?php
    require_once 'C:\Turma2\xampp\htdocs\EnerVsion\config.php';
    require_once 'C:\Turma2\xampp\htdocs\EnerVsion\controller\DispositivoController.php';

    if (isset($_POST["nome_usuario"]) && isset($_POST["email_usuario"]) && isset($_POST["senha_usario"])) {
        $dispositivoController = new DispositivoController($pdo);

        $dispositivoController->cadastrar($_POST["nome_usuario"], $_POST["email_usuario"], $_POST["senha_usario"]);

        header("location: ../index.php");
    }
    ?>

    <br><br>

<a href="../index.php">VOLTAR</a>
</body>

</html>