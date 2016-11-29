-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 29/11/2016 às 15:34
-- Versão do servidor: 5.7.16-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `amazonCompanies`
--
CREATE DATABASE IF NOT EXISTS `amazonCompanies` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `amazonCompanies`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agregado`
--

DROP TABLE IF EXISTS `agregado`;
CREATE TABLE `agregado` (
  `idAgregado` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sigla` varchar(45) NOT NULL,
  `Conta_idConta` int(11) NOT NULL,
  `Índice_idÍndice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `conteudo` varchar(45) NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Comentario_idComentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE `conta` (
  `idConta` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `demonstracao`
--

DROP TABLE IF EXISTS `demonstracao`;
CREATE TABLE `demonstracao` (
  `idDemonstracao` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `Tipo_Demonstracao_idTipo_Demonstracao` int(11) NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `analise` text,
  `Tipo_Empresa_idTipo_Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nome`, `analise`, `Tipo_Empresa_idTipo_Empresa`) VALUES
(1, 'Moto Honda da Amazônia LTDA', NULL, 2),
(2, 'Teewa', 'Isto aqui é um teste!', 1),
(3, 'Microsoft Windows', 'Este é um sistema operacional que muitos usam, mas eu ainda prefiro Linux.', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa_has_usuario`
--

DROP TABLE IF EXISTS `empresa_has_usuario`;
CREATE TABLE `empresa_has_usuario` (
  `Empresa_idEmpresa` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `empresa_has_usuario`
--

INSERT INTO `empresa_has_usuario` (`Empresa_idEmpresa`, `Usuario_idUsuario`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `indice`
--

DROP TABLE IF EXISTS `indice`;
CREATE TABLE `indice` (
  `idIndice` int(11) NOT NULL,
  `formula` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `Tipo_Indice_idTipo_Indice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacao`
--

DROP TABLE IF EXISTS `notificacao`;
CREATE TABLE `notificacao` (
  `idNotificacao` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `notificacao`
--

INSERT INTO `notificacao` (`idNotificacao`, `status`, `conteudo`, `Usuario_idUsuario`, `tipo`) VALUES
(1, 0, 'Você foi uma menina má!', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_demonstracao`
--

DROP TABLE IF EXISTS `tipo_demonstracao`;
CREATE TABLE `tipo_demonstracao` (
  `idTipo_Demonstracao` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_empresa`
--

DROP TABLE IF EXISTS `tipo_empresa`;
CREATE TABLE `tipo_empresa` (
  `idTipo_Empresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipo_empresa`
--

INSERT INTO `tipo_empresa` (`idTipo_Empresa`, `nome`) VALUES
(1, 'Local'),
(2, 'Nacional'),
(3, 'Estrangeira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_indice`
--

DROP TABLE IF EXISTS `tipo_indice`;
CREATE TABLE `tipo_indice` (
  `idTipo_indice` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipo_indice`
--

INSERT INTO `tipo_indice` (`idTipo_indice`, `nome`) VALUES
(1, 'Liquidez'),
(2, 'Endividamento'),
(3, 'Lucratividade'),
(4, 'Rentabilidade'),
(5, 'Giros e Prazos'),
(6, 'Giros Assaf Neto'),
(7, 'Giros Viaconti');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `identificadorPessoa` int(11) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `senha`, `ativo`, `identificadorPessoa`, `email`) VALUES
(1, 'Luiz Gustavo', '@p310608039090lG', 1, 1, 'lgpa@icomp.ufam.edu.br'),
(2, 'Tatazinha', 'qwert', 0, 1, 'tla@icomp.ufam.edu.br'),
(3, 'Gisele', '12345678', 1, 2, 'gisa@icomp.ufam.edu.br'),
(4, 'Moto Honda da Amazônia LTDA', 'motohonda', 1, 3, 'motohonda@gmail.com');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `agregado`
--
ALTER TABLE `agregado`
  ADD PRIMARY KEY (`idAgregado`,`Conta_idConta`,`Índice_idÍndice`),
  ADD KEY `fk_Agregado_Conta1_idx` (`Conta_idConta`),
  ADD KEY `fk_Agregado_Índice1_idx` (`Índice_idÍndice`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`,`Empresa_idEmpresa`,`Usuario_idUsuario`),
  ADD KEY `fk_Comentário_Empresa1_idx` (`Empresa_idEmpresa`),
  ADD KEY `fk_Comentário_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Comentário_Comentário1_idx` (`Comentario_idComentario`);

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`idConta`,`Empresa_idEmpresa`),
  ADD KEY `fk_Conta_Empresa1_idx` (`Empresa_idEmpresa`);

--
-- Índices de tabela `demonstracao`
--
ALTER TABLE `demonstracao`
  ADD PRIMARY KEY (`idDemonstracao`,`Tipo_Demonstracao_idTipo_Demonstracao`,`Empresa_idEmpresa`),
  ADD KEY `fk_Demonstração_Tipo_Demonstração1_idx` (`Tipo_Demonstracao_idTipo_Demonstracao`),
  ADD KEY `fk_Demonstração_Empresa1_idx` (`Empresa_idEmpresa`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`,`Tipo_Empresa_idTipo_Empresa`),
  ADD KEY `fk_Empresa_Tipo_Empresa1_idx` (`Tipo_Empresa_idTipo_Empresa`);

--
-- Índices de tabela `empresa_has_usuario`
--
ALTER TABLE `empresa_has_usuario`
  ADD PRIMARY KEY (`Empresa_idEmpresa`,`Usuario_idUsuario`),
  ADD KEY `fk_Empresa_has_Usuario_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Empresa_has_Usuario_Empresa1_idx` (`Empresa_idEmpresa`);

--
-- Índices de tabela `indice`
--
ALTER TABLE `indice`
  ADD PRIMARY KEY (`idIndice`,`Tipo_Indice_idTipo_Indice`),
  ADD KEY `fk_Índice_Tipo_Índice1_idx` (`Tipo_Indice_idTipo_Indice`);

--
-- Índices de tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`idNotificacao`,`Usuario_idUsuario`),
  ADD KEY `fk_Notificação_Usuario_idx` (`Usuario_idUsuario`);

--
-- Índices de tabela `tipo_demonstracao`
--
ALTER TABLE `tipo_demonstracao`
  ADD PRIMARY KEY (`idTipo_Demonstracao`);

--
-- Índices de tabela `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  ADD PRIMARY KEY (`idTipo_Empresa`);

--
-- Índices de tabela `tipo_indice`
--
ALTER TABLE `tipo_indice`
  ADD PRIMARY KEY (`idTipo_indice`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `agregado`
--
ALTER TABLE `agregado`
  ADD CONSTRAINT `fk_Agregado_Conta1` FOREIGN KEY (`Conta_idConta`) REFERENCES `conta` (`idConta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Agregado_Índice1` FOREIGN KEY (`Índice_idÍndice`) REFERENCES `indice` (`idIndice`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_Comentário_Comentário1` FOREIGN KEY (`Comentario_idComentario`) REFERENCES `comentario` (`idComentario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comentário_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comentário_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `fk_Conta_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `demonstracao`
--
ALTER TABLE `demonstracao`
  ADD CONSTRAINT `fk_Demonstração_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Demonstração_Tipo_Demonstração1` FOREIGN KEY (`Tipo_Demonstracao_idTipo_Demonstracao`) REFERENCES `tipo_demonstracao` (`idTipo_Demonstracao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_Empresa_Tipo_Empresa1` FOREIGN KEY (`Tipo_Empresa_idTipo_Empresa`) REFERENCES `tipo_empresa` (`idTipo_Empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `empresa_has_usuario`
--
ALTER TABLE `empresa_has_usuario`
  ADD CONSTRAINT `fk_Empresa_has_Usuario_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empresa_has_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `indice`
--
ALTER TABLE `indice`
  ADD CONSTRAINT `fk_Índice_Tipo_Índice1` FOREIGN KEY (`Tipo_Indice_idTipo_Indice`) REFERENCES `tipo_indice` (`idTipo_indice`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `fk_Notificação_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;