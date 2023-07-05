-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jul-2023 às 01:44
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cds`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(20) NOT NULL,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `cod_turma` int(11) NOT NULL,
  `nome_responsavel` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data_entrada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`cod_turma`, `nome_responsavel`, `nome`, `cpf`, `rg`, `email`, `data_entrada`) VALUES
(1, 'Natan', 'Natan Lima ', '10785102531', '136565666', 'santos@gmail.com', NULL),
(2, 'Natan', 'Natan soares', '10785102531', '123456789', 'santos@gmail.com', NULL),
(3, 'Jobson Santos', 'Jobson Santos', '10785102531', '01349010134', 'natan@gmail.com', NULL),
(4, 'Jobson Santos', 'Jobson Santos Lima', '10785102531', '01349010134', 'natanjob@gmail.com', NULL),
(5, 'Jobson Santos Lima', 'Jobson Santos Lima', '10785102531', '01349010134', 'natanjob222@gmail.com', NULL),
(6, 'Jobson Santos Cleiton', 'Jobson Santos Lima', '10785102531', '01349010134', 'natanjob22222@gmail.com', NULL),
(7, 'dfsfdsfs', 'sfsfsfsds', '9440061596', '55745442', 'fdsfshsvhh@gmail.com', NULL),
(8, 'dfsfdsfs', 'sfsfsfsds', '9440061596', '55745442', 'fdsfshsvhh@gmail.com', NULL),
(9, 'dfdfasdsad', 'josasd s', '9974279577', '1231325456', 'jobinho200@gmail.com', NULL),
(10, 'dfdfasdsad', 'josasd s', '9974279577', '1231325456', 'jobinho200@gmail.com', NULL),
(11, 'dfdfasdsad', 'josasd s', '9974279577', '1231325456', 'jobinho200@gmail.com', NULL),
(12, 'dfdfasdsad', 'josasd s', '9974279577', '1231325456', 'jobinho200@gmail.com', NULL),
(13, 'dfdfasdsad', 'josasd s', '9974279577', '1231325456', 'jobinho200@gmail.com', NULL),
(14, 'dfdfasdsad', 'josasd s', '9974279577', '1231325456', 'jobinho200@gmail.com', NULL),
(15, 'dfdfasdsad', 'josasd s', '9974279577', '1231325456', 'jobinho200@gmail.com', NULL),
(16, 'dasjdoksadjaskd', 'sjdhakjshdkjashdk', '9974279577', '1231223132132', 'jobsonsdsf04@gmail.com', NULL),
(17, 'sd jakhd jskhd', 'jhsdajkfhsajkdhj', '9974279577', '1212456456456', 'josbonsdsad@gmail.com', NULL),
(18, 'Nata', 'JOBOSN', '10785102531', '190491094', 'SANTOSFLAENGO@GMAIL.COM', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`cod_turma`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `cod_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
