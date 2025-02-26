<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Cadastrar Usuário</title>
</head>

<body>

    <div class="page">
        <nav class="nav-logo">
            <strong>
                <p class="ener">ENER</p>
            </strong>
            <img src="../img/Enervision.png" alt="">
            <strong>
                <p class="vision">VISION</p>
            </strong>
        </nav>
        <section class="page-login">
            <div class="login">
                <h1>CRIAR</h1>
                <form class="form" action=""  method="POST">
                    <input type="name" name="nome_usuario" placeholder="Nome">
                    <input type="email" name="email_usuario"  placeholder="Email">
                    <input type="password" name="senha_usuario" placeholder="Senha">
                    <input class="button" type="submit">
                    <a href="../index.php"><button class="button">Voltar</button></a>
                </form>
            </div>
        </section>
    </div>

    <?php
    require_once 'C:\Turma2\xampp\htdocs\EnerVision\config.php';
    require_once 'C:\Turma2\xampp\htdocs\EnerVision\controller\DispositivoController.php';

    if (isset($_POST["nome_usuario"]) && isset($_POST["email_usuario"]) && isset($_POST["senha_usuario"])) {
        $dispositivoController = new DispositivoController($pdo);

        $dispositivoController->cadastrar($_POST["nome_usuario"], $_POST["email_usuario"], $_POST["senha_usuario"]);

        header("location: ../index.php");
    }
    ?>

    <br><br>


</body>

</html>