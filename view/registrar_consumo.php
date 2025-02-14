<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Consumo Diário</title>
</head>
<body>

<h1>Registrar Consumo Diário</h1>

<form method="post">
    <label>Data:</label>
    <input type="date" name="data_diario" required><br>

    <label>Consumo (kWh):</label>
    <input type="number" name="consumo_diario" step="0.01" required><br>

    <button type="submit">Registrar</button>
</form>
<?php
require_once 'C:\Turma2\xampp\htdocs\EnerVsion\config.php';
require_once 'C:\Turma2\xampp\htdocs\EnerVsion\controller\DispositivoController.php';

if (isset($_POST["data_diario"]) && isset($_POST["consumo_diario"])) {
    $dispositivoController = new DispositivoController($pdo);

    $dispositivoController->registrarConsumoDiario($_POST["data_diario"], $_POST["consumo_diario"]);

    header("location: listar_consumo.php");
}
?>
    <br><br>

<a href="../index.php">VOLTAR</a>