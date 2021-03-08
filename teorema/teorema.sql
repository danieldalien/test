-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Mar-2021 às 17:48
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teorema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` varchar(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `valor` varchar(1) NOT NULL,
  `cara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `caracteristicas`
--

INSERT INTO `caracteristicas` (`id`, `nome`, `valor`, `cara`) VALUES
('01', 'Forma da semente', 'a', 'Ondulada'),
('02', 'Forma da semente', 'A', 'Lisa'),
('03', 'Cor da semente', 'b', 'Amarela'),
('04', 'Cor da semente', 'B', 'Verde'),
('05', 'Cor da flor', 'c', 'Purpura'),
('06', 'Cor da flor', 'C', 'Branca'),
('07', 'Forma da vagem', 'd', 'Constrita'),
('08', 'Forma da vagem', 'D', 'Inflada'),
('09', 'Cor da vagem', 'e', 'Amarela'),
('10', 'Cor da vagem', 'E', 'Verde'),
('11', 'Posicao da flor', 'f', 'Axial'),
('12', 'Posicao da flor', 'F', 'Terminal'),
('13', 'Comprimento do caule', 'g', 'Anao'),
('14', 'Comprimento do caule', 'G', 'Alto'),
('15', 'daniel', 'h', 'jafnjkscndfj'),
('16', 'daniel', 'H', 'flelçmc');

-- --------------------------------------------------------

--
-- Estrutura da tabela `novas_plantas`
--

CREATE TABLE `novas_plantas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `p_1` varchar(100) NOT NULL,
  `p_2` varchar(100) NOT NULL,
  `cara_1` varchar(11) NOT NULL,
  `cara_2` varchar(11) NOT NULL,
  `cara_3` varchar(11) NOT NULL,
  `cara_4` varchar(11) NOT NULL,
  `cara_5` varchar(11) NOT NULL,
  `cara_6` varchar(11) NOT NULL,
  `cara_7` varchar(11) NOT NULL,
  `cara_8` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `novas_plantas`
--

INSERT INTO `novas_plantas` (`id`, `nome`, `p_1`, `p_2`, `cara_1`, `cara_2`, `cara_3`, `cara_4`, `cara_5`, `cara_6`, `cara_7`, `cara_8`) VALUES
(1, 'planta_1', 'Kershane', 'Ezugettle', '0202', '0403', '0506', '0707', '0909', '1211', '1314', '####'),
(2, 'planta_2', 'Kershane', 'Ezugettle', '0201', '0403', '0606', '0807', '1009', '1211', '1413', '####'),
(3, 'planta_3', 'Kershane', 'Ezugettle', '0202', '0403', '0606', '0807', '1009', '1211', '1414', '####'),
(4, 'planta_4', 'Kershane', 'Ezugettle', '0201', '0403', '0606', '0807', '1009', '1211', '1413', '####'),
(5, 'planta_1', 'Kershane', 'Anuphoom', '0201', '0404', '0506', '0708', '0910', '1211', '1313', '####'),
(6, 'planta_2', 'Kershane', 'Anuphoom', '0201', '0404', '0606', '0807', '1009', '1211', '1414', '####'),
(7, 'planta_3', 'Kershane', 'Anuphoom', '0201', '0404', '0606', '0808', '1010', '1211', '1413', '####'),
(8, 'planta_4', 'Kershane', 'Anuphoom', '0201', '0404', '0606', '0807', '1009', '1211', '1414', '####'),
(9, 'planta_1', 'Ezugettle', 'Anuphoom', '0201', '0304', '0606', '0708', '0910', '1111', '1413', '####'),
(10, 'planta_2', 'Ezugettle', 'Anuphoom', '0101', '0304', '0606', '0707', '0909', '1111', '1314', '####'),
(11, 'planta_3', 'Ezugettle', 'Anuphoom', '0101', '0304', '0606', '0708', '0910', '1111', '1313', '####'),
(12, 'planta_4', 'Ezugettle', 'Anuphoom', '0101', '0304', '0606', '0707', '0909', '1111', '1314', '####');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plantas`
--

CREATE TABLE `plantas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cara_1` varchar(11) NOT NULL,
  `cara_2` varchar(11) NOT NULL,
  `cara_3` varchar(11) NOT NULL,
  `cara_4` varchar(11) NOT NULL,
  `cara_5` varchar(11) NOT NULL,
  `cara_6` varchar(11) NOT NULL,
  `cara_7` varchar(11) NOT NULL,
  `cara_8` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `plantas`
--

INSERT INTO `plantas` (`id`, `nome`, `cara_1`, `cara_2`, `cara_3`, `cara_4`, `cara_5`, `cara_6`, `cara_7`, `cara_8`) VALUES
(1, 'Deqlasse', '0101', '0404', '0505', '0708', '1010', '1112', '1413', NULL),
(2, 'Kershane', '0202', '0404', '0506', '0708', '0910', '1212', '1314', NULL),
(4, 'Ezugettle', '0201', '0303', '0606', '0707', '0909', '1111', '1413', NULL),
(5, 'Anuphoom', '0101', '0404', '0606', '0807', '1009', '1111', '1314', NULL),
(6, 'Efyassons', '0101', '0404', '0505', '0807', '1009', '1211', '1314', NULL),
(7, 'Chricros', '0202', '0404', '0605', '0808', '0910', '1112', '1313', NULL),
(8, 'Iruantamire', '0201', '0403', '0605', '0708', '1010', '1111', '1413', NULL),
(9, 'Aching Polkweed', '0102', '0304', '0506', '0808', '1010', '1112', '1314', NULL),
(10, 'Ezeepax', '0101', '0404', '0505', '0807', '0909', '1211', '1313', NULL),
(11, 'Oknarmood', '0102', '0304', '0605', '0808', '0910', '1212', '1414', NULL),
(12, 'Eefijina', '0102', '0303', '0606', '0707', '0909', '1212', '1314', NULL),
(13, 'Nissequin', '0101', '0404', '0606', '0708', '1009', '1112', '1313', NULL),
(14, 'Spibget', '0202', '0404', '0606', '0807', '1009', '1112', '1414', NULL),
(15, 'Criwirin', '0202', '0404', '0605', '0708', '0909', '1211', '1313', NULL),
(16, 'Esroddons', '0201', '0303', '0605', '0807', '0910', '1111', '1313', NULL),
(17, 'Weflard', '0102', '0304', '0606', '0808', '1010', '1111', '1413', NULL),
(18, 'Glestrons', '0101', '0404', '0506', '0808', '0910', '1212', '1414', NULL),
(19, 'Okniacet', '0201', '0303', '0606', '0707', '0910', '1211', '1313', NULL),
(20, 'Praqlegon', '0201', '0404', '0605', '0708', '0909', '1212', '1313', NULL),
(26, 'Daniel', '0102', '0304', '0506', '0808', '1010', '1112', '1414', NULL),
(27, 'Larissa', '0102', '0404', '0605', '0807', '1010', '1212', '1314', NULL),
(29, 'Shiny', '0101', '0303', '0505', '0707', '0909', '1111', '1313', '1515'),
(33, 'baba', '0202', '0404', '0606', '0808', '1010', '1212', '1414', '1616'),
(35, 'PAW', '0101', '0303', '0506', '0708', '0910', '1112', '1314', '1516');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_role_id` varchar(250) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `user_role_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'admin', 'daniel', 'doe', 'john_doe@example.com', '123'),
(2, 'visitor', 'ahsan', 'zameer', 'ahsan@example.com', '123'),
(4, 'client', 'Daniel', 'Honen', 'daniel-honen@hotmail.de', 'www');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `novas_plantas`
--
ALTER TABLE `novas_plantas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`,`p_1`,`p_2`);

--
-- Índices para tabela `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `novas_plantas`
--
ALTER TABLE `novas_plantas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
