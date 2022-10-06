-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Out-2022 às 18:09
-- Versão do servidor: 8.0.26
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `Nome` varchar(40) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Cpf` varchar(11) NOT NULL,
  `Cell` varchar(11) NOT NULL,
  `Endereco` varchar(100) NOT NULL,
  `Texto` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DataNascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `Nome`, `Email`, `Cpf`, `Cell`, `Endereco`, `Texto`, `DataNascimento`) VALUES
(84, 'Henrique', 'henrique@hotmail.com', '', '231', '211', '2131', '2003-06-30'),
(86, 'Luiza', 'luiza10@gmail.com', '', '200', '232', '2323', '2003-06-30'),
(88, 'Luan', 'luan@outlook.com', '', '123456789', 'Rua almeida', 'teste', '2003-06-30'),
(89, 'Eloisa', 'elo10@gmail.com', '', '987654321', 'Rua das palmeiras', 'Testando 2', '2004-04-12');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
