<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<form action="index.php?controller=dispositivo&action=adicionar" method="post">
    <label>Nome:</label>
    <input type="text" name="nome" required><br>
    
    <label>Potência (W):</label>
    <input type="number" name="potencia" required><br>

    <label>Tempo Médio de Uso (h/dia):</label>
    <input type="number" name="tempo_uso" step="0.1" required><br>

    <button type="submit">Adicionar</button>
</form>  
</body>
</html>