<?php
require_once 'C:\Turma2\xampp\htdocs\EnerVision\config.php';
require_once 'C:\Turma2\xampp\htdocs\EnerVision\controller\DispositivoController.php';

try {
    // Recuperar dispositivos do banco de dados
    $query = "SELECT id, nome_dispositivo, potencia FROM dispositivos";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $dispositivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro ao recuperar dispositivos: ' . $e->getMessage();
}

$adicionados = isset($_GET['adicionados']) ? json_decode($_GET['adicionados'], true) : [];
$consumo_total = isset($_GET['consumo_total']) ? floatval($_GET['consumo_total']) : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tempo_uso = isset($_POST["tempo_uso"]) ? floatval($_POST["tempo_uso"]) : 0;
    $dispositivo_nome = trim($_POST["dispositivo_nome"] ?? '');
    $potencia_personalizada = isset($_POST["potencia_personalizada"]) ? floatval($_POST["potencia_personalizada"]) : 0;

    if (!empty($_POST["dispositivo_id"])) {
        $dispositivo_id = $_POST["dispositivo_id"];
        $query = "SELECT nome_dispositivo, potencia FROM dispositivos WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $dispositivo_id);
        $stmt->execute();
        $dispositivo = $stmt->fetch(PDO::FETCH_ASSOC);
    } elseif (!empty($dispositivo_nome) && $potencia_personalizada > 0) {
        $dispositivo = [
            'nome_dispositivo' => $dispositivo_nome,
            'potencia' => $potencia_personalizada
        ];
    }

    if (!empty($dispositivo) && $tempo_uso > 0) {
        $dispositivo['potencia'] = floatval($dispositivo['potencia']);
        $consumo_estimado = ($dispositivo['potencia'] * $tempo_uso) / 1000;
        $consumo_total += $consumo_estimado;
        $adicionados[] = [
            'nome' => $dispositivo['nome_dispositivo'],
            'potencia' => $dispositivo['potencia'],
            'tempo_uso' => $tempo_uso,
            'consumo_estimado' => $consumo_estimado
        ];
    }

    header("Location: {$_SERVER['PHP_SELF']}?adicionados=" . urlencode(json_encode($adicionados)) . "&consumo_total=" . $consumo_total);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <title>Cadastrar Dispositivo</title>
</head>
<body>
    <nav class="nav-bar">
        <div class="logo">
            <strong class="ener">ENER</strong>
            <img src="../img/Enervision.png" alt="">
            <strong class="vision">VISION</strong>
        </div>
        <div class="name-usuario">
            <h1>João Pedro Neves Amaral de Souza Camargo</h1>
        </div>
    </nav>

    <main class="container">
        <section class="Consumo-diario2">
            <h1>Consumo diário</h1>
            <form method="POST">
                <select name="dispositivo_id" id="dispositivo_id">
                    <option value="" disabled selected hidden>Selecione um dispositivo</option>
                    <?php foreach ($dispositivos as $dispositivo): ?>
                        <option value="<?php echo $dispositivo['id']; ?>"><?php echo $dispositivo['nome_dispositivo']; ?></option>
                    <?php endforeach; ?>
                </select><br>

                <input type="number" step="0.01" name="tempo_uso" placeholder="Tempo de uso (em horas)"><br>
                <p>Caso não tenha o dispositivo acima, adicione manualmente.</p>
                <input type="text" name="dispositivo_nome" placeholder="Nome do eletrodoméstico"><br>
                <input type="number" step="0.01" name="potencia_personalizada" placeholder="Potência (W)"><br>

                <button type="submit">Adicionar</button><br>
            </form>
        </section>

        <section class="Consumo-diario2">
            <h1>Produtos Adicionados</h1>
            <table>
                <thead>
                    <tr>
                        <th>Dispositivo</th>
                        <th>Potência (W)</th>
                        <th>Tempo de Uso (h)</th>
                        <th>Consumo Estimado (kWh)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($adicionados)): ?>
                        <?php foreach ($adicionados as $adicionado): ?>
                            <tr>
                                <td><?php echo $adicionado['nome']; ?></td>
                                <td><?php echo $adicionado['potencia']; ?> W</td>
                                <td><?php echo $adicionado['tempo_uso']; ?> h</td>
                                <td><?php echo number_format($adicionado['consumo_estimado'], 2); ?> kWh</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Nenhum dispositivo adicionado.</td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td colspan="3"><strong>Total:</strong></td>
                        <td><strong><?php echo number_format($consumo_total, 2); ?> kWh</strong></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <br><br>
    <a href="../index2.php">VOLTAR</a>
</body>
</html>
