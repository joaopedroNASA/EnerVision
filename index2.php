<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <nav class="nav-bar">
        <div class="logo">
            <strong class="ener">ENER</strong>
            <img src="img/Enervision.png" alt="">
            <strong class="vision">VISION</strong>
        </div>
        <div class="name-usuario">
            <h1>João Pedro Neves Amaral de Souza Camargo</h1>
        </div>
        <div>

        </div>
    </nav>
    <div class="imagem">
        <img src="img/imagem3.png" alt="">
    </div>
    <a href="view/form_dispositivo.php">
        <div class="diario-mensal">
            <section class="consumo-diario">
                <img src="img/imagem1.png" alt="">
                <h4>Consumo Diário</h4>
                <p>Dispositivos eletrônicos e consumo estimado</p>
            </section>
    </a>
    <a href="indexgrafico.php">
        <section class="consumo-mensal">
            <img src="img/imagem2.png" alt="">
            <h4>Consumo Mensal</h4>
            <p>Criação de gráficos detalhados do consumo mensal de energia.</p>
        </section>
    </a>
    </div>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

        :root {
            --color-neutral-0: #0e0c0c;
            --color-neutral-10: #171717;
            --color-neutral-30: #a8a29e;
            --color-neutral-40: #f5f5f5;
        }


        footer {
            width: 100%;
            color: var(--color-neutral-40);
        }

        #footer_content {
            background-color: var(--color-neutral-10);
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            padding: 3rem 3.5rem;
        }

        #footer_contacts h1 {
            margin-bottom: 0.75rem;
        }

        #footer_social_media {
            display: flex;
            gap: 2rem;
        }

        #footer_social_media {
            display: flex;
            gap: 2rem;
            margin-top: 1.5rem;
        }

        #footer_social_media .footer-link {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 2.5rem;
            width: 2.5rem;
            color: var(--color-neutral-40);
            border-radius: 50%;
        }

        #instagram {
            background: linear-gradient(#7f37c9, #ff2992, #ff9807);
        }

        #facebook {
            background-color: #4267b3;
        }

        #whatsapp {
            background-color: #25d366;
        }

        #facebook {
            background-color: #4267b3;
        }

        #whatsapp {
            background-color: #25d366;
        }

        .footer-list {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            list-style: none;
        }

        .footer-list .footer-link {
            color: var(--color-neutral-30);
            transition: all 0.4s;
        }

        .footer-list .footer-link:hover {
            color: #7f37c9;
        }

        #footer_subscribe {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        #footer_subscribe p {
            color: var(--color-neutral-30);
        }

        #input_group {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 4px;
        }

        #input_group input {
            all: unset;
            padding: 0.75rem;
            width: 100%;
        }

        #input_group button {
            background-color: #7f37c9;
            border: none;
            color: var(--color-neutral-40);
            padding: 0px 1.75rem;
            font-size: 1.125rem;
            height: 100%;
            transition: all 0.4s;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;/
        }

        #input_group button:hover {
            opacity: 0.8;
        }

        #footer_copyright {
            display: flex;
            justify-content: center;
            background-color: var(--color-neutral-0);
            font-size: 0.9rem;
            padding: 1.5rem;
            font-weight: 100%;
        }

        @media screen and (max-width: 768px) {
            #footer_content {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
        }

        @media screen and (max-width: 426px) {
            #footer_content {
                grid-template-columns: repeat(1, 1fr);
                padding: 3rem 2rem;
            }
        }
    </style>
    <footer>
        <div id="footer_content">
            <div id="footer_contacts">
                <h1>Logo</h1>
                <p>It's all about your dreams.</p>
                <div id="footer_social_media">
                    <a href="#" class="footer-link" id="instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="footer-link" id="facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="footer-link" id="whatsapp">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <ul class="footer-list">
                <li>
                    <h3>Blog</h3>
                </li>
                <li>
                    <a href="#" class="footer-link">Tech</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Adventures</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Music</a>
                </li>
            </ul>

            <ul class="footer-list">
                <li>
                    <h3>Products</h3>
                </li>
                <li>
                    <a href="#" class="footer-link">App</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Desktop</a>
                </li>
                <li>
                    <a href="#" class="footer-link">Cloud</a>
                </li>
            </ul>

            <div id="footer_subscribe">
                <h3>Subscribe</h3>
                <p>
                    Enter your e-mail to get notified about our news solutions.
                </p>
                <div id="input_group">
                    <input type="email" id="email">
                    <button>
                        <i class="fa-regular fa-envelope"></i>
                    </button>
                </div>
            </div>

            <div id="footer_copyright">
                &#169 2023 all rights reserved
            </div>
        </div>
    </footer>
</body>

</html>