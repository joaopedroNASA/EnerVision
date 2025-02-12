<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
<form method="post">
    <label>Email:</label>
    <input type="email" name="email_usuario" required><br>

    <label>Senha:</label>
    <input type="password" name="senha_usuario" required><br>

    <button type="submit">Entrar</button>
</form>

<?php
 require_once 'C:\Turma2\xampp\htdocs\EnerVsion\config.php';
 require_once 'C:\Turma2\xampp\htdocs\EnerVsion\controller\DispositivoController.php';

 if (isset($_POST["email_usuario"]) && isset($_POST["senha_usuario"])) {
     $dispositivoController = new DispositivoController($pdo);

     $dispositivoController->login($_POST["email_usuario"], $_POST["senha_usuario"]);

     header("location: ../index.php");
 }
 ?>

</body>
</html>