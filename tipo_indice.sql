-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2017 às 17:28
-- Versão do servidor: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazoncompanies`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_indice`
--

CREATE TABLE IF NOT EXISTS `tipo_indice` (
  `idTipo_indice` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_indice`
--

INSERT INTO `tipo_indice` (`idTipo_indice`, `nome`, `descricao`) VALUES
(1, 'Liquidez', 'Texto exemplo Liquidez'),
(2, 'Endividamento', 'Texto Exemplo Endividamento'),
(3, 'Lucratividade', 'Texto Exemplo Lucratividade'),
(4, 'Rentabilidade', 'Texto Exemplo Rentabilidade'),
(5, 'Giros e Prazos', 'Texto Exemplo Giros e Prazos'),
(6, 'Giros Assaf Neto', 'Texto Exemplo Giros Assaf Neto'),
(7, 'Giros Viaconti', 'Texto Exemplo Giros Viaconti'),
(8, 'Teste Listagem', 'Texto Exemplo Teste Listagem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipo_indice`
--
ALTER TABLE `tipo_indice`
  ADD PRIMARY KEY (`idTipo_indice`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
