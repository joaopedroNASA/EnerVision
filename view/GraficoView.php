<?php
session_start();


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Consumo</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", { packages: ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Mês", "Consumo (kW)", { role: "style" }],
                <?php if (!empty($dados)) {
                    foreach ($dados as $linha) {
                        echo "['" . $linha['mes'] . "', " . $linha['kilowatts'] . ", '#4CAF50'],";
                    }
                } ?>
            ]);

            var options = {
                title: "Consumo Mensal de Energia (kW)",
                width: 850,
                height: 400,
                bar: { groupWidth: "95%" },
                legend: { position: "none" },
            };

            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(data, options);
        }
    </script>
</head>

<body>
<nav class="nav-bar">
        <div class="logo">
            <strong class="ener">ENER</strong>
            <img src="../img/Enervision.png" alt="Logo EnerVision">
            <strong class="vision">VISION</strong>
        </div>
        <div class="name-usuario">
            <h1><?php 
                if (empty($_SESSION['nome_usuario'])) {
                    echo "ENERVISION";
                } else {
                    echo $_SESSION['nome_usuario'];
                }   
            ?></h1>
        </div>
        <div class="buttons">
            
           <?php if (isset($_SESSION['id_usuario'])) {
      echo "<a href='view/login.php'><button>Login</button></a>";
    } else {
        echo "<a href='view/logout.php'><button>Logout</button></a>";
    } ?>
            <button class="dark-btn"><i class="fa-solid fa-moon"></i></button>
        </div>
    </nav>

    <form method="POST">
        <label for="mes">Mês:</label>
        <input type="text" id="mes" name="mes" required>
        <label for="kilowatts">Consumo (kW):</label>
        <input type="number" step="0.01" id="kilowatts" name="kilowatts" required>
        <button type="submit">Cadastrar</button>
    </form>

    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>

    <h3>Dados Cadastrados:</h3>
    <div style="margin-top: 60px">
        <?php
        // Para depuração, exibe os dados recuperados
        

        if (!empty($dados)) { ?>
            <ul>
                <?php foreach ($dados as $dado) { ?>
                    <li>
                        <?php echo $dado['mes'] . " - Consumo: " . number_format($dado['kilowatts'], 2) . " kW"; ?>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="delete_mes" value="<?php echo $dado['mes']; ?>">
                            <button type="submit"
                                onclick="return confirm('Tem certeza que deseja excluir este dado?');">Deletar</button>
                        </form>
                    </li>
                <?php } ?>
            </ul>
        <?php } else { ?>
            <p>Nenhum dado cadastrado ainda.</p>
        <?php } ?>
    </div>

    <h3>Comparação de Consumo entre Meses:</h3>
    <?php
    if (!empty($dados) && count($dados) > 1) {
        for ($i = 0; $i < count($dados) - 1; $i++) {
            $mes1 = $dados[$i];
            $mes2 = $dados[$i + 1];
            $diff = $mes2['kilowatts'] - $mes1['kilowatts'];

            if ($diff > 0) {
                echo "De {$mes1['mes']} para {$mes2['mes']}, houve um aumento de consumo de " . number_format($diff, 2) . " kW.<br>";
            } elseif ($diff < 0) {
                echo "De {$mes1['mes']} para {$mes2['mes']}, houve uma economia de " . number_format(abs($diff), 2) . " kW.<br>";
            } else {
                echo "De {$mes1['mes']} para {$mes2['mes']}, não houve alteração no consumo.<br>";
            }
        }
    } else {
        echo "<p>Não há dados suficientes para comparação.</p>";
    }
    ?>

</body>

</html>