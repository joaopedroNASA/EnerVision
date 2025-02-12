<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Dispositivo</title>
</head>

<body>
    <h1>Cadastrar Dispositivo</h1>
    <form method="POST">
    <label>Nome:</label>
    <input type="text" name="nome" required><br>
    
    <label>Potência (W):</label>
    <input type="number" name="potencia" required><br>

    <label>Tempo Médio de Uso (h/dia):</label>
    <input type="number" name="tempo_uso" step="0.1" required><br>

    <button type="submit">Adicionar</button>
    </form>

    <?php
    require_once 'C:\Turma2\xampp\htdocs\EnerVsion\config.php';
    require_once 'C:\Turma2\xampp\htdocs\EnerVsion\controller\DispositivoController.php';

    if (isset($_POST["nome"]) && isset($_POST["potencia"]) && isset($_POST["tempo_uso"])) {
        $dispositivoController = new DispositivoController($pdo);

        $dispositivoController->adicionarDispositivo($_POST["nome"], $_POST["potencia"], $_POST["tempo_uso"]);

        header("location: listar_dispositivos.php");
    }
    ?>

    <br><br>

<a href="../index.php">VOLTAR</a>
</body>

</html>