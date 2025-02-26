<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Consumo</title>

    <!-- CSS -->
    <link rel="stylesheet" href="style2.css">

    <!-- Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            <?php if (!empty($dados)) { ?>
                var data = google.visualization.arrayToDataTable([
                    ["Mês", "Consumo (kW)", {
                        role: "style"
                    }],
                    <?php foreach ($dados as $linha) {
                        echo "['" . $linha['mes'] . "', " . $linha['kilowatts'] . ", '#1B93CA'],";
                    } ?>
                ]);

                var options = {
                    title: "Consumo Mensal de Energia (kW)",
                    bar: {
                        groupWidth: "50%"
                    },
                    legend: {
                        position: "none"
                    },
                    chartArea: {
                        width: "80%",
                        height: "70%"
                    }, // Mantém responsivo
                };

                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                chart.draw(data, options);

                // Redesenhar gráfico ao redimensionar
                window.addEventListener('resize', function() {
                    chart.draw(data, options);
                });
            <?php } else { ?>
                document.getElementById("columnchart_values").innerHTML =
                    "<p style='color: red; font-size: 18px; text-align: center;'>Nenhum dado disponível para exibir o gráfico.</p>";
            <?php } ?>
        }
    </script>
</head>

<body>

    <nav class="nav-bar">
        <div class="logo">
            <strong class="ener2">ENER</strong>
            <a href="index2.php"><img src="img/Enervision.png"></a>
            <strong class="vision2">VISION</strong>
        </div>
        <div class="name-usuario3">
            <h1>
                <?php echo empty($_SESSION['nome_usuario']) ? "ENERVISION" : $_SESSION['nome_usuario']; ?>
            </h1>
        </div>
    </nav>

    <div class="container-grafico">
        <div class="fundograf">
            <div class="formulariograf">
                <form method="POST">
                    <label for="mes">Mês:</label>
                    <input type="text" id="mes" name="mes" required>
                    <label for="kilowatts">Consumo (kW):</label>
                    <input type="number" step="0.01" id="kilowatts" name="kilowatts" required>
                    <button type="submit">Cadastrar</button>
                </form>
            </div>

            <!-- Gráfico Responsivo -->
            <div id="columnchart_values" class="grafico-mobile"></div>

            <h3>Dados Cadastrados:</h3>
            <div style="margin-top: 10px">
                <?php if (!empty($dados)) { ?>
                    <ul>
                        <?php foreach ($dados as $dado) { ?>
                            <li>
                                <?php echo $dado['mes'] . " - Consumo: " . number_format($dado['kilowatts'], 2) . " kW"; ?>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="delete_mes" value="<?php echo $dado['mes']; ?>">
                                    <button class="deletar" type="submit" onclick="return confirm('Tem certeza que deseja excluir este dado?');">Deletar</button>
                                    <style>
                                        .deletar button {
                                            gap: 10px;
                                            margin: 10px;
                                        }
                                    </style>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p>Nenhum dado cadastrado ainda.</p>
                <?php } ?>
            </div>
            <br><br>
            <h3>Comparação de Consumo entre Meses:</h3>
            <br>
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
        </div>
    </div>
</body>

</html>