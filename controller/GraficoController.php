<?php

require __DIR__ . '/../config.php';
require __DIR__ . '/../model/GraficoModel.php';

$graficoModel = new GraficoModel($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['mes']) && isset($_POST['kilowatts'])) {
        $mes = $_POST['mes'];
        $kilowatts = $_POST['kilowatts'];

        if (!empty($mes) && !empty($kilowatts)) {
            $graficoModel->inserirDado($mes, $kilowatts);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    } elseif (isset($_POST['delete_mes'])) {
        $delete_mes = $_POST['delete_mes'];
        $graficoModel->deletarDado($delete_mes);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$dados = $graficoModel->listarDados();
$graficoModel->fecharConexao();
?>
