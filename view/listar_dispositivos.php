<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Potência (W)</th>
        <th>Tempo de Uso (h/dia)</th>
        <th>Consumo Estimado (kWh)</th>
    </tr>
    <?php foreach ($stmt as $dispositivo): ?>
        <tr>
            <td><?= htmlspecialchars($dispositivo["nome"]) ?></td>
            <td><?= htmlspecialchars($dispositivo["potencia"]) ?></td>
            <td><?= htmlspecialchars($dispositivo["tempo_uso"]) ?></td>
            <td><?= htmlspecialchars($dispositivo["consumo_estimado"]) ?></td>
        </tr>
    <?php endforeach; ?>
</table>
    
</body>
</html>