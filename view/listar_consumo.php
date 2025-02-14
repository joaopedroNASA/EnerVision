<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico de Consumo Diário</title>
</head>

<body>
    <h1>Histórico de Consumo Diário</h1>
    
    <?php
    require_once 'C:\Turma2\xampp\htdocs\EnerVsion\config.php';
    require_once 'C:\Turma2\xampp\htdocs\EnerVsion\controller\DispositivoController.php';
    
    $dispositivoController = new DispositivoController($pdo);
    $consumos = $dispositivoController->listarConsumos();
    
    if (!empty($consumos)) {
        echo "<table border='1'>";
        echo "<tr><th>Data</th><th>Consumo (kWh)</th></tr>";
        
        foreach ($consumos as $consumo) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($consumo["data_diario"]) . "</td>";
            echo "<td>" . htmlspecialchars($consumo["consumo_diario"]) . " kWh</td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>Nenhum registro de consumo encontrado.</p>";
    }
    ?>

    <br>
    <button><a href="../index.php">VOLTAR</a></button>
</body>

</html>