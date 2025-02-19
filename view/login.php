<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title></title>
</head>

<body>

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
            <h1>LOGIN</h1>
            <form class="form" action="" method="POST">
                <input type="email" name="email_usuario" placeholder="Email" required>
                <input type="password" name="senha_usuario" placeholder="Password" required>
                <button class="button">Login</button>
                <a href="cadastro.php"><button class="button">Criar</button></a>
                <?php
                require_once 'C:\Turma2\xampp\htdocs\EnerVision\config.php';
                require_once 'C:\Turma2\xampp\htdocs\EnerVision\controller\DispositivoController.php';

                if (isset($_POST["email_usuario"]) && isset($_POST["senha_usuario"])) {
                    $dispositivoController = new DispositivoController($pdo);

                    $dispositivoController->login($_POST["email_usuario"], $_POST["senha_usuario"]);

                    header("location: ../index2.php");
                }
                ?>
            </form>
        </div>
    </section>



</body>

</html>