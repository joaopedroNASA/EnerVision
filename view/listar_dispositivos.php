<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Dispositivos</title>
</head>
<body>

<h1>Lista de Dispositivos</h1>

<?php
require_once 'C:\Turma2\xampp\htdocs\EnerVsion\config.php';
require_once 'C:\Turma2\xampp\htdocs\EnerVsion\controller\DispositivoController.php';
$controller = new DispositivoController($pdo);
$dispositivos = $controller->listarDispositivos();

if (!empty($dispositivos)) {
    foreach ($dispositivos as $dispositivo) {
        echo "Nome: " . htmlspecialchars($dispositivo["nome_dispositivo"]) . "<br>";
        echo "Potência: " . htmlspecialchars($dispositivo["potencia"]) . " W<br>";
        echo "Tempo de Uso: " . htmlspecialchars($dispositivo["tempo_uso"]) . " horas/dia<br>";
        echo "Consumo Estimado: " . htmlspecialchars($dispositivo["consumo_estimado"]) . " kWh<br>";
        echo "<br><hr>";
    }
} else {
    echo "<p>Nenhum dispositivo cadastrado.</p>";
}
?>

<button><a href="form_dispositivo.php">Cadastrar Novo Dispositivo</a></button>


</body>
</html>

