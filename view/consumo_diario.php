<?php
require_once '../config.php';
require_once '../controller/DispositivoController.php';

session_start();
$dispositivoController = new DispositivoController($pdo);
$consumos = $dispositivoController->listarConsumos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumo Diário</title>
</head>
<body>

<h1>Histórico de Consumo Diário</h1>

<?php if (!empty($consumos)): ?>
    <table border="1">
        <tr>
            <th>Data</th>
            <th>Consumo (kWh)</th>
        </tr>
        <?php foreach ($consumos as $consumo): ?>
            <tr>
                <td><?= htmlspecialchars($consumo["data_diario"]) ?></td>
                <td><?= htmlspecialchars($consumo["consumo_diario"]) ?> kWh</td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <p>Nenhum consumo registrado.</p>
<?php endif; ?>

<a href="../index.php">Voltar</a>

</body>
</html>
