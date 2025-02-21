<?php
session_start();


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <nav class="nav-bar2">
        <div class="logo">
            <img src="img/Enervision.png" alt="">
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
           
        </div>
        <div class="buttons">
            <button class="dark-btn"><i class="fa-solid fa-moon"></i></button>
            <?php

if (isset($_SESSION['id_usuario'])) {
    echo "<a href='view/logout.php'><button>Logout</button></a>";
} else {
    echo "<a href='view/login.php'><button>Login</button></a>";
} ?>
            
        </div>
    </nav>
    <div class="imagem">
        <div class="carrossel">
            <div class="carrossel-container">
                <img src="img/Capa de Email Promoção da Semana Moderno Preto e Amarelo (1).png" alt="Imagem 1">
                <img src="img/2.png" alt="Imagem 2">
                <img src="img/3.png" alt="Imagem 3">
                <img src="img/4.png" alt="Imagem 4">
            </div>
        </div>
    </div>
    <a href="view/login.php">
        <div class="diario-mensal">
            <section class="consumo-diario">
                <img src="img/imagem1.png" alt="">
                <h4>Consumo Diário</h4>
                <p>Dispositivos eletrônicos e consumo estimado</p>
            </section>
    </a>
    <a href="view/login.php">
        <section class="consumo-mensal">
            <img src="img/imagem2.png" alt="">
            <h4>Consumo Mensal</h4>
            <p>Criação de gráficos detalhados do consumo mensal de energia.</p>
        </section>
    </a>
    </div>
    </div>
    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <img src="img/Enervision.png" alt="" width="300px">
                <div id="footer_social_media">
                    <a href="https://www.instagram.com/" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.facebook.com" class="footer-link" id="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://web.whatsapp.com/" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <ul class="footer-list">
                <li>
                    <h3>Feito por:</h3>
                </li>
                <li>
                    <a href="" class="footer-link">João Pedro</a>
                </li>
                <li>
                    <a href="" class="footer-link">Luis Felipe</a>
                </li>
                <li>
                    <a href="" class="footer-link">Diego Brito</a>
                </li>
                <li>
                    <a href="" class="footer-link">Paulo Cesar</a>
                </li>
                <li>
                    <a href="" class="footer-link">Octávio Gomes</a>
                </li>
                <li>
                    <a href="" class="footer-link">Sara Ajala</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <h3>Dados:</h3>
                </li>
                <li>
                    <a href="" class="footer-link">CNPJ:
                        12.345.678/0001-90
                    </a>
                </li>
                <li>
                    <a href="" class="footer-link">Endereço:
                        Rua Fictícia, 123, Bairro Imaginário, Cidade Exemplo, Estado de Teste, 12345-678
                    </a>
                </li>
            </ul>

            <div id="footer_copyright">
                &#169 2025 all rights reserved
            </div>
        </div>
    </footer>
</body>

</html>