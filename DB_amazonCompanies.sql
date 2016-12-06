-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 06/12/2016 às 08:50
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

CREATE TABLE `agregado` (
  `idAgregado` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `sigla` varchar(45) NOT NULL,
  `Índice_idÍndice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `analise`
--

CREATE TABLE `analise` (
  `idanalise` int(11) NOT NULL,
  `texto` text,
  `status` tinyint(1) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `analise`
--

INSERT INTO `analise` (`idanalise`, `texto`, `status`, `idEmpresa`) VALUES
(1, 'Isso aqui é um teste!', 0, 2),
(2, 'Este é um sistema operacional que muitos usam, mas eu prefiro o Linux!', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

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

CREATE TABLE `conta` (
  `idConta` int(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` decimal(20,3) NOT NULL,
  `idDemonstracao` int(11) DEFAULT NULL,
  `idAgregado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `conta`
--

INSERT INTO `conta` (`idConta`, `nome`, `valor`, `idDemonstracao`, `idAgregado`) VALUES
(1, 'Ativo Circulante Financeiro', '32892.850', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `demonstracao`
--

CREATE TABLE `demonstracao` (
  `idDemonstracao` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `ano` year(4) NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `demonstracao`
--

INSERT INTO `demonstracao` (`idDemonstracao`, `nome`, `ano`, `Empresa_idEmpresa`) VALUES
(1, 'Balanço Patrimonial', 2014, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `fonte` varchar(45) NOT NULL,
  `Tipo_Empresa_idTipo_Empresa` int(11) NOT NULL,
  `logotipo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nome`, `fonte`, `Tipo_Empresa_idTipo_Empresa`, `logotipo`) VALUES
(1, 'Moto Honda da Amazônia LTDA', 'www.motohonda.com.br', 2, NULL),
(2, 'Teewa', 'www.teewa.com.br', 3, NULL),
(3, 'Microsoft S.A', 'www.microsoft.com', 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresaHasUsuario`
--

CREATE TABLE `empresaHasUsuario` (
  `Empresa_idEmpresa` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `indice`
--

CREATE TABLE `indice` (
  `idIndice` int(11) NOT NULL,
  `formula` varchar(45) NOT NULL,
  `idTipo_Indice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `idNotificacao` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_empresa`
--

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

CREATE TABLE `tipo_indice` (
  `idTipo_indice` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `identificadorPessoa` int(11) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `login`, `nome`, `senha`, `ativo`, `identificadorPessoa`, `email`) VALUES
(1, 'LG', 'Luiz Gustavo', 'b1270e45ddc61a1c2dc42fa71b5f6c29', 1, 1, 'lgpa@icomp.ufam.edu.br'),
(2, 'Tata14', 'Tatazinha', 'a384b6463fc216a5f8ecb6670f86456a', 0, 1, 'tla@icomp.ufam.edu.br'),
(3, 'Gisa', 'Gisele', '25d55ad283aa400af464c76d713c07ad', 1, 2, 'gisa@icomp.ufam.edu.br'),
(4, 'Motoca', 'Moto Honda da Amazônia LTDA', '3dcdda99b20ed51f83b25c6315c5a818', 1, 3, 'motohonda@gmail.com');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `agregado`
--
ALTER TABLE `agregado`
  ADD PRIMARY KEY (`idAgregado`,`Índice_idÍndice`),
  ADD KEY `fk_Agregado_Índice1_idx` (`Índice_idÍndice`);

--
-- Índices de tabela `analise`
--
ALTER TABLE `analise`
  ADD PRIMARY KEY (`idanalise`),
  ADD KEY `fk_analise_1_idx` (`idEmpresa`);

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
  ADD PRIMARY KEY (`idConta`),
  ADD KEY `fk_Demonstração_Tipo_Demonstração1_idx` (`idDemonstracao`),
  ADD KEY `fk_agregado_idx` (`idAgregado`);

--
-- Índices de tabela `demonstracao`
--
ALTER TABLE `demonstracao`
  ADD PRIMARY KEY (`idDemonstracao`),
  ADD KEY `fk_demonstracao_1_idx` (`Empresa_idEmpresa`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `fk_Empresa_Tipo_Empresa1_idx` (`Tipo_Empresa_idTipo_Empresa`);

--
-- Índices de tabela `empresaHasUsuario`
--
ALTER TABLE `empresaHasUsuario`
  ADD PRIMARY KEY (`Empresa_idEmpresa`,`Usuario_idUsuario`),
  ADD KEY `fk_Empresa_has_Usuario_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Empresa_has_Usuario_Empresa1_idx` (`Empresa_idEmpresa`);

--
-- Índices de tabela `indice`
--
ALTER TABLE `indice`
  ADD PRIMARY KEY (`idIndice`) USING BTREE,
  ADD KEY `fk_Índice_Tipo_Índice1_idx` (`idTipo_Indice`);

--
-- Índices de tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`idNotificacao`,`Usuario_idUsuario`),
  ADD KEY `fk_Notificação_Usuario_idx` (`Usuario_idUsuario`);

--
-- Índices de tabela `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  ADD PRIMARY KEY (`idTipo_Empresa`,`nome`);

--
-- Índices de tabela `tipo_indice`
--
ALTER TABLE `tipo_indice`
  ADD PRIMARY KEY (`idTipo_indice`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `agregado`
--
ALTER TABLE `agregado`
  MODIFY `idAgregado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `analise`
--
ALTER TABLE `analise`
  MODIFY `idanalise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `idConta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `demonstracao`
--
ALTER TABLE `demonstracao`
  MODIFY `idDemonstracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `indice`
--
ALTER TABLE `indice`
  MODIFY `idIndice` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `idNotificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `agregado`
--
ALTER TABLE `agregado`
  ADD CONSTRAINT `fk_Agregado_Índice1` FOREIGN KEY (`Índice_idÍndice`) REFERENCES `indice` (`idIndice`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `analise`
--
ALTER TABLE `analise`
  ADD CONSTRAINT `fk_analise_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_Demonstração_Demonstração1` FOREIGN KEY (`idDemonstracao`) REFERENCES `demonstracao` (`idDemonstracao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agregado` FOREIGN KEY (`idAgregado`) REFERENCES `agregado` (`idAgregado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `demonstracao`
--
ALTER TABLE `demonstracao`
  ADD CONSTRAINT `fk_demonstracao_1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fk_Empresa_Tipo_Empresa1` FOREIGN KEY (`Tipo_Empresa_idTipo_Empresa`) REFERENCES `tipo_empresa` (`idTipo_Empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `empresaHasUsuario`
--
ALTER TABLE `empresaHasUsuario`
  ADD CONSTRAINT `fk_Empresa_has_Usuario_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empresa_has_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `indice`
--
ALTER TABLE `indice`
  ADD CONSTRAINT `fk_Índice_Tipo_Índice1` FOREIGN KEY (`idTipo_Indice`) REFERENCES `tipo_indice` (`idTipo_indice`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `fk_Notificação_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
