-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/01/2025 às 23:36
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
-- Banco de dados: `sw`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`id`, `description`, `status`, `date`) VALUES
(458, 'Consulta de filmes realizada com sucesso!', 'success', '2025-01-08 23:03:18'),
(459, 'Consulta do filme A New Hope realizada com sucesso!', 'success', '2025-01-08 23:03:27'),
(460, 'Consulta de filmes realizada com sucesso!', 'success', '2025-01-08 23:04:53'),
(461, 'Consulta do filme The Empire Strikes Back realizada com sucesso!', 'success', '2025-01-08 23:05:15'),
(462, 'Consulta de filmes realizada com sucesso!', 'success', '2025-01-08 23:06:08'),
(463, 'Consulta do filme A New Hope realizada com sucesso!', 'success', '2025-01-08 23:07:09'),
(464, 'Consulta de filmes realizada com sucesso!', 'success', '2025-01-08 23:07:46'),
(465, 'Consulta de filmes realizada com sucesso!', 'success', '2025-01-08 23:08:18'),
(466, 'Consulta de filmes realizada com sucesso!', 'success', '2025-01-08 23:08:48'),
(467, 'Consulta do filme A New Hope realizada com sucesso!', 'success', '2025-01-08 23:08:53'),
(468, 'Consulta de filmes realizada com sucesso!', 'success', '2025-01-08 23:10:38'),
(469, 'Consulta do filme The Empire Strikes Back realizada com sucesso!', 'success', '2025-01-08 23:10:42'),
(470, 'Consulta do filme The Empire Strikes Back realizada com sucesso!', 'success', '2025-01-08 23:32:38'),
(471, 'resposta invalida da APi  no endpoit :https://swapi-node.vercel.app/api/films/logs', 'error', '2025-01-08 23:32:40'),
(472, 'resposta invalida da APi  no endpoit :https://swapi-node.vercel.app/api/films/logs', 'error', '2025-01-08 23:32:55'),
(473, 'resposta invalida da APi  no endpoit :https://swapi-node.vercel.app/api/films/logs', 'error', '2025-01-08 23:33:23'),
(474, 'Consulta de filmes realizada com sucesso!', 'success', '2025-01-08 23:33:49'),
(475, 'Consulta do filme The Empire Strikes Back realizada com sucesso!', 'success', '2025-01-08 23:34:20'),
(476, 'Consulta do filme The Empire Strikes Back realizada com sucesso!', 'success', '2025-01-08 23:34:26'),
(477, 'Consulta do filme The Empire Strikes Back realizada com sucesso!', 'success', '2025-01-08 23:34:37'),
(478, 'Consulta do filme The Empire Strikes Back realizada com sucesso!', 'success', '2025-01-08 23:34:48');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
