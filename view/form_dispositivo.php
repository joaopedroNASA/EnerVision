<?php
require_once 'C:\Turma2\xampp\htdocs\EnerVision\config.php';
require_once 'C:\Turma2\xampp\htdocs\EnerVision\controller\DispositivoController.php';

// Iniciar a sessão para armazenar os dados de dispositivos e consumo total
session_start();

// Verifica se foi clicado o botão de Resetar e limpa os dados
if (isset($_POST['resetar'])) {
    $_SESSION['adicionados'] = [];
    $_SESSION['consumo_total'] = 0;
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

// Recuperar dispositivos do banco de dados
try {
    $query = "SELECT id, nome_dispositivo, potencia FROM dispositivos";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $dispositivos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro ao recuperar dispositivos: ' . $e->getMessage();
}

$adicionados = isset($_SESSION['adicionados']) ? $_SESSION['adicionados'] : [];
$consumo_total = isset($_SESSION['consumo_total']) ? $_SESSION['consumo_total'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tempo_uso_selecionado = isset($_POST["tempo_uso_selecionado"]) ? floatval($_POST["tempo_uso_selecionado"]) : 0;
    $tempo_uso_manual = isset($_POST["tempo_uso_manual"]) ? floatval($_POST["tempo_uso_manual"]) : 0;
    $tempo_uso = max($tempo_uso_selecionado, $tempo_uso_manual);

    $dispositivo_nome = trim($_POST["dispositivo_nome"] ?? '');
    $potencia_personalizada = isset($_POST["potencia_personalizada"]) ? floatval($_POST["potencia_personalizada"]) : 0;

    $dispositivo = null;

    if (!empty($_POST["dispositivo_id"])) {
        $dispositivo_id = $_POST["dispositivo_id"];
        $query = "SELECT nome_dispositivo, potencia FROM dispositivos WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $dispositivo_id, PDO::PARAM_INT);
        $stmt->execute();
        $dispositivo = $stmt->fetch(PDO::FETCH_ASSOC);
    } elseif (!empty($dispositivo_nome) && $potencia_personalizada > 0) {
        $dispositivo = [
            'nome_dispositivo' => $dispositivo_nome,
            'potencia' => $potencia_personalizada
        ];
    }

    if ($dispositivo && $tempo_uso > 0) {
        $dispositivo['potencia'] = floatval($dispositivo['potencia']);
        // Convertendo potência de W para kW e multiplicando pelo tempo de uso
        $potencia_kw = $dispositivo['potencia'] / 1000; // Potência em kW
        $consumo_estimado = $potencia_kw * $tempo_uso; // Consumo estimado em kW
        $consumo_total += $consumo_estimado;
        $adicionados[] = [
            'nome' => $dispositivo['nome_dispositivo'],
            'potencia' => $dispositivo['potencia'],
            'tempo_uso' => $tempo_uso,
            'consumo_estimado' => $consumo_estimado
        ];
    }

    // Salvar dados na sessão
    $_SESSION['adicionados'] = $adicionados;
    $_SESSION['consumo_total'] = $consumo_total;

    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

// Função para calcular o consumo diário de kW
function calcularKwPorDia($kwTotal, $diasNoMes)
{
    if ($diasNoMes > 0) {
        $kwPorDia = $kwTotal / $diasNoMes;
        return round($kwPorDia, 2); // arredonda para 2 casas decimais
    } else {
        return "Número de dias inválido.";
    }
}

// Verifica se os dados foram enviados via GET
$mensagem = '';
if (isset($_GET['kw']) && isset($_GET['dias'])) {
    // Pega os valores enviados pela URL
    $kwTotal = $_GET['kw'];
    $diasNoMes = $_GET['dias'];

    // Verifica se os valores são válidos
    if (is_numeric($kwTotal) && is_numeric($diasNoMes) && $kwTotal > 0 && $diasNoMes > 0) {
        // Calcula o consumo diário
        $kwPorDia = calcularKwPorDia($kwTotal, $diasNoMes);

        // Definir a mensagem de acordo com o consumo diário
// Definir a mensagem de acordo com o consumo diário
        if ($kwPorDia < $consumo_total) {
            $mensagem = "A Média do Consumo Diário Calculado está abaixo do consumo estimado {$consumo_total} kW. Parabéns!";
        } else {
            $mensagem = "A Média do Consumo Diário Calculado está acima do consumo estimado {$consumo_total} kW. Que pena!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <title>Cadastrar Dispositivo</title>
</head>

<body>
    <nav class="nav-bar">
        <div class="logo">
            <strong class="ener">ENER</strong>
            <img src="../img/Enervision.png" alt="Logo EnerVision">
            <strong class="vision">VISION</strong>
        </div>
        <div class="name-usuario">
            <h1>João Pedro Neves Amaral de Souza Camargo</h1>
        </div>
    </nav>
    <main class="container">
        <section class="Consumo-diario2">
            <h1>Consumo Estimado</h1>
            <form method="POST">
                <select name="dispositivo_id" id="dispositivo_id">
                    <option value="" disabled selected hidden>Selecione um dispositivo</option>
                    <?php foreach ($dispositivos as $dispositivo): ?>
                        <option value="<?php echo htmlspecialchars($dispositivo['id']); ?>">
                            <?php echo htmlspecialchars($dispositivo['nome_dispositivo']); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>

                <input type="number" step="0.01" name="tempo_uso_selecionado" placeholder="Tempo de uso (em horas)"><br>
                <button type="submit">Adicionar</button><br>

                <p>Caso não tenha o dispositivo acima, adicione manualmente.</p>
                <input type="text" name="dispositivo_nome" placeholder="Nome do eletrodoméstico"><br>
                <input type="number" step="0.01" name="potencia_personalizada" placeholder="Potência (W)"><br>

                <input type="number" step="0.01" name="tempo_uso_manual" placeholder="Tempo de uso (em horas)"><br>

                <button type="submit">Adicionar</button><br>
                <button type="submit" name="resetar">Resetar</button><br>
            </form>
            <h1>Produtos Adicionados</h1>
            <table>
                <thead>
                    <tr>
                        <th>Dispositivo</th>
                        <th>Potência (W)</th>
                        <th>Tempo de Uso (h)</th>
                        <th>Consumo Estimado (kW)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($adicionados)): ?>
                        <?php foreach ($adicionados as $adicionado): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($adicionado['nome']); ?></td>
                                <td><?php echo htmlspecialchars($adicionado['potencia']); ?> W</td>
                                <td><?php echo htmlspecialchars($adicionado['tempo_uso']); ?> h</td>
                                <td><?php echo number_format($adicionado['consumo_estimado'], 2); ?> kW</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Nenhum dispositivo adicionado.</td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td colspan="3"><strong>Total:</strong></td>
                        <td><strong><?php echo number_format($consumo_total, 2); ?> kW</strong></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="Consumo-diario2">
            <h1>Média do Consumo Diário Calculado:</h1>

            <form method="GET" action="">
                <label for="kw">Total de kW consumidos:</label>
                <input type="number" name="kw" id="kw" step="0.01" required>
                <br><br>

                <label for="dias">Número de dias no mês:</label>
                <input type="number" name="dias" id="dias" required>
                <br><br>

                <input type="submit" value="Calcular">
            </form>

            <?php if (!empty($mensagem)): ?>
                <p><strong><?php echo $mensagem; ?></strong></p>
            <?php endif; ?>

        </section>

    </main>
    <br>
    <br>
    <a href="../index2.php" class="botao-inicio">Início</a>
</body>

</html>