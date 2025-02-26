<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Login - EnerVision</title>
</head>

<body>

    <nav class="nav-logo">
        <strong>
            <p class="ener">ENER</p>
        </strong>
        <img src="../img/Enervision.png" alt="Logo EnerVision">
        <strong>
            <p class="vision">VISION</p>
        </strong>
    </nav>

    <section class="page-login">
        <div class="login">
            <h1>LOGIN</h1>
            <form class="form" action="" method="POST">
                <input type="email" name="email_usuario" placeholder="Email">
                <input type="password" name="senha_usuario" placeholder="Password">
                <button class="button" type="submit">Login</button>
                <a href="cadastro.php" class="button"><button type="button" class="button">Criar</button></a>
            </form>
            

            <?php
            require_once 'C:\Turma2\xampp\htdocs\EnerVision\config.php';
            require_once 'C:\Turma2\xampp\htdocs\EnerVision\controller\DispositivoController.php';

            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["email_usuario"], $_POST["senha_usuario"])) {
                $dispositivoController = new DispositivoController($pdo);

                if ($dispositivoController->login($_POST["email_usuario"], $_POST["senha_usuario"])) {
                    header("Location: ../index2.php");
                    exit;
                } else {
                    echo "<p class='erro'>Usuário ou senha inválidos.</p>";
                }
            }
            ?>
        </div>
    </section>

</body>

</html>
