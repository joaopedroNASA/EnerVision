-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/02/2025 às 18:57
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `enervision`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `email_adm` varchar(250) NOT NULL,
  `senha_adm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `consumo_diario`
--

CREATE TABLE `consumo_diario` (
  `id` int(11) NOT NULL,
  `consumo_id` int(11) NOT NULL,
  `data_diario` date NOT NULL,
  `consumo_diario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consumo_diario`
--

INSERT INTO `consumo_diario` (`id`, `consumo_id`, `data_diario`, `consumo_diario`) VALUES
(1, 1, '2025-02-14', 244693),
(2, 1, '2025-02-14', 244693);

-- --------------------------------------------------------

--
-- Estrutura para tabela `dispositivos`
--

CREATE TABLE `dispositivos` (
  `id` int(11) NOT NULL,
  `nome_dispositivo` varchar(250) NOT NULL,
  `potencia` float NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dispositivos`
--

INSERT INTO `dispositivos` (`id`, `nome_dispositivo`, `potencia`, `usuario_id`) VALUES
(485, 'Geladeira', 150, 1),
(486, 'Micro-ondas', 1200, 1),
(487, 'Fogão Elétrico', 2000, 1),
(488, 'Máquina de Lavar', 500, 1),
(489, 'Ar-condicionado', 1800, 2),
(490, 'Aquecedor', 1500, 2),
(491, 'Ventilador', 100, 2),
(492, 'TV LED 42\"', 100, 3),
(493, 'TV OLED 55\"', 200, 3),
(494, 'Notebook', 65, 3),
(495, 'Carregador de Telemóvel', 10, 4),
(496, 'Impressora', 300, 4),
(497, 'Scanner', 250, 4),
(498, 'Modem Wi-Fi', 20, 5),
(499, 'Roteador', 15, 5),
(500, 'Console de Videogame', 200, 5),
(501, 'Cafeteira Elétrica', 800, 6),
(502, 'Torradeira', 900, 6),
(503, 'Liquidificador', 600, 6),
(504, 'Ferro de Passar', 1200, 7),
(505, 'Máquina de Secar', 2500, 7),
(506, 'Aspirador de Pó', 1500, 7),
(507, 'Câmera de Segurança', 50, 8),
(508, 'Sistema de Alarme', 30, 8),
(509, 'Videocassete', 100, 8),
(510, 'Smart Speaker', 20, 9),
(511, 'Monitor de PC', 75, 9),
(512, 'Tablet', 15, 9),
(513, 'Receptor de TV a Cabo', 50, 10),
(514, 'Forno Elétrico', 2200, 10),
(515, 'Máquina de Pão', 850, 10),
(516, 'Drone', 90, 11),
(517, 'Carregador de Carro Elétrico', 7000, 11),
(518, 'Secador de Cabelo', 1600, 12),
(519, 'Barbeador Elétrico', 12, 12),
(520, 'Placa de Vídeo Externa', 250, 12),
(521, 'Lâmpada LED', 10, 13),
(522, 'Lustre Inteligente', 20, 13),
(523, 'Relógio Inteligente', 5, 13),
(524, 'Balança Digital', 10, 14),
(525, 'Frigobar', 100, 14),
(526, 'Projetor Multimídia', 250, 15),
(527, 'Home Theater', 500, 15),
(528, 'Amplificador de Som', 350, 16),
(529, 'Teclado e Mouse sem Fio', 5, 16),
(530, 'Purificador de Água', 100, 17),
(531, 'Desumidificador', 300, 17),
(532, 'Cortador de Cabelo', 15, 18),
(533, 'Fonte de PC', 450, 18),
(534, 'Placa-Mãe', 100, 18),
(535, 'Caixa de Som Bluetooth', 20, 19),
(536, 'Carregador Wireless', 10, 19),
(537, 'Monitor Gamer', 120, 20),
(538, 'Placa de Captura de Vídeo', 150, 20),
(539, 'Nobreak', 600, 21),
(540, 'Luminária de Mesa', 15, 21),
(541, 'Hub USB', 5, 22),
(542, 'Webcam', 10, 22),
(543, 'Teclado Mecânico', 50, 23),
(544, 'Sistema de Irrigação', 200, 24),
(545, 'Máquina de Costura', 100, 24),
(546, 'Bebedouro', 300, 25),
(547, 'Fritadeira Elétrica', 1400, 25),
(548, 'Câmera DSLR', 50, 26),
(549, 'Drone Profissional', 120, 26),
(550, 'Sensor de Movimento', 10, 27),
(551, 'Câmera de Ação', 25, 27),
(552, 'Lava-Louças', 1500, 28),
(553, 'Caixa Registradora', 250, 28),
(554, 'Fogão de Indução', 2200, 29),
(555, 'Fonte Modular de PC', 750, 29),
(556, 'Robô Aspirador', 400, 30),
(557, 'TV Smart 75\"', 250, 30),
(558, 'Sistema de Som Automotivo', 300, 31),
(559, 'Chuveiro Elétrico', 5500, 31),
(560, 'Monitor 4K', 150, 32),
(561, 'Mesa Digitalizadora', 25, 32),
(562, 'Detector de Fumaça', 20, 33),
(563, 'Despertador Digital', 10, 33),
(564, 'Máquina de Gelo', 500, 34),
(565, 'Projetor 4K', 250, 34),
(566, 'Console Portátil', 100, 35),
(567, 'Gravador Digital', 30, 35),
(568, 'Batedeira Planetária', 700, 36),
(569, 'Cortador de Grama Elétrico', 1800, 36),
(570, 'Repetidor Wi-Fi', 15, 37),
(571, 'Impressora 3D', 350, 37),
(572, 'Pipoqueira Elétrica', 1000, 38),
(573, 'Fervedor Elétrico', 1200, 38),
(574, 'Máquina de Cerveja', 200, 39),
(575, 'Fogareiro Elétrico', 1000, 39),
(576, 'Toca-Discos', 15, 40),
(577, 'Microfone USB', 5, 40),
(578, 'Gerador de Energia Solar', 500, 41),
(579, 'Purificador de Ar', 150, 41),
(580, 'Videogame Portátil', 75, 42),
(581, 'Espelho Inteligente', 40, 42),
(582, 'Batedeira de Mão', 250, 43),
(583, 'Máquina de Algodão Doce', 400, 43),
(584, 'Cortador de Unhas Elétrico', 5, 44),
(585, 'Almofada Massageadora', 30, 44),
(586, 'Máquina de Café Expresso', 1200, 45),
(587, 'Mesa com Carregador Wireless', 50, 45),
(588, 'Chaleira Elétrica', 1800, 46),
(589, 'Torradeira Inteligente', 800, 46),
(590, 'Estação Meteorológica', 15, 47),
(591, 'Tapete Aquecido', 50, 47),
(592, 'Sistema de Fechadura Digital', 20, 48),
(593, 'Cadeira de Massagem', 250, 48),
(594, 'Vaporizador Facial', 100, 49),
(595, 'Rádio Portátil', 20, 49),
(596, 'Relógio de Parede Digital', 10, 50),
(597, 'Desidratador de Alimentos', 600, 50);

-- --------------------------------------------------------

--
-- Estrutura para tabela `grafico`
--

CREATE TABLE `grafico` (
  `id` int(11) NOT NULL,
  `mes` varchar(250) NOT NULL,
  `kilowatts` decimal(10,0) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `grafico`
--

INSERT INTO `grafico` (`id`, `mes`, `kilowatts`, `usuario_id`) VALUES
(2, 'Fevereiro', 123, 1),
(4, 'Março', 33, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(250) NOT NULL,
  `email_usuario` varchar(250) NOT NULL,
  `senha_usuario` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(1, 'sara', 'sara@leptop.com', '$2y$10$ZRfJXiusnmzZ9gSc3vKg8ORgnqLT5ER8vcb3ULY2iZI7kD5MTa5IS'),
(2, 'Ângelo', 'Octavio1@gmail.com', '$2y$10$yVB1PrOQSd46kakiPdTkpOiMgXoqTk3mWdnXC3mvf7N9gHx68xHu6');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `consumo_diario`
--
ALTER TABLE `consumo_diario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `grafico`
--
ALTER TABLE `grafico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `consumo_diario`
--
ALTER TABLE `consumo_diario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=598;

--
-- AUTO_INCREMENT de tabela `grafico`
--
ALTER TABLE `grafico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
