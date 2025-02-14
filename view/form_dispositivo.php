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
        <div>

        </div>
    </nav>
    <main class="container">
        <section class="Consumo-diario2">
            <h1>Consumo diário</h1>
            <form method="POST">
                <select name="" id="">
                    <option value="" disabled selected hidden>Selecione</option> Option para "placeholder"
                    <option value=""></option>
                </select>
                <button type="button" name="potencia" required>Adicionar</button><br>
                <p>Caso não tenha acima, adicione.</p>
                <select name="" id="">
                    <option type="number" name="tempo_uso" step="0.1" required>Eletrodoméstico</option><br>
                    <option value="">
                    </option>
                </select>
                <input type="number" name="tempo_uso" required placeholder="Consumo"><br>
                <button type="number" name="tempo_uso" required>Adicionar</button>
                <p>Produtos adicionados:</p>
                
            </form>
        </section>
        <section class="Consumo-diario2">
            <h1>Consumo diário real</h1>
            <form method="POST">
                    <input type="number" name="nome" required placeholder="Consumo em Kw do mês "><br>
                    <select name="" id="">
                    <option value="" disabled selected hidden>Selecione o mês</option> Option para "placeholder"
                    <option value="">Janeiro</option>
                    <option value="">Fevereiro</option>
                    <option value="">Março</option>
                    <option value="">Abril</option>
                    <option value="">Maio</option>
                    <option value="">Junho</option>
                    <option value="">Julho</option>
                    <option value="">Agosto</option>
                    <option value="">Setembro</option>
                    <option value="">Outubro</option>
                    <option value="">Novembro</option>
                    <option value="">Dezembro</option>
                    </select>

            </form>
        </section>
    </main>



    <?php
    require_once 'C:\Turma2\xampp\htdocs\EnerVision\config.php';
    require_once 'C:\Turma2\xampp\htdocs\EnerVision\controller\DispositivoController.php';

    if (isset($_POST["nome"]) && isset($_POST["potencia"]) && isset($_POST["tempo_uso"])) {
        $dispositivoController = new DispositivoController($pdo);

        $dispositivoController->adicionarDispositivo($_POST["nome"], $_POST["potencia"], $_POST["tempo_uso"]);

        header("location: listar_dispositivos.php");
    }
    ?>

    <br><br>

    <a href="../index2.php">VOLTAR</a>
</body>

</html>