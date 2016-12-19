-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 13/12/2016 às 14:17
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
  `sigla` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `agregado`
--

INSERT INTO `agregado` (`idAgregado`, `nome`, `sigla`) VALUES
(1, 'Ativo Circulante Financeiro', 'ACF');

-- --------------------------------------------------------

--
-- Estrutura para tabela `analise`
--

CREATE TABLE `analise` (
  `idanalise` int(11) NOT NULL,
  `texto` text,
  `status` varchar(20) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `analise`
--

INSERT INTO `analise` (`idanalise`, `texto`, `status`, `idEmpresa`) VALUES
(2, 'Isto aqui é um teste!', 1, 2),
(3, 'Este é um sistema operacional que muitos usam, mas eu ainda prefiro Linux.', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Comentario_idComentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `comentario`
--

INSERT INTO `comentario` (`idComentario`, `conteudo`, `Empresa_idEmpresa`, `Usuario_idUsuario`, `Comentario_idComentario`) VALUES
(1, 'Esta análise me parece boa!', 1, 1, NULL),
(2, 'Talvez precisa investir mais em RH', 2, 3, NULL),
(3, 'Não concordo e nem discordo de você, muito pelo contrário!', 1, 3, 1);

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
(1, 'Ativo Circulante Financeiro', '47000.372', 1, 1),
(2, 'Disponibilidades', '12000.623', 1, NULL),
(3, 'Ativo Circulante Operacional', '32892.850', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `demonstracao`
--

CREATE TABLE `demonstracao` (
  `idDemonstracao` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL,
  `idtipoDemonstração` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `demonstracao`
--

INSERT INTO `demonstracao` (`idDemonstracao`, `ano`, `Empresa_idEmpresa`, `idtipoDemonstração`) VALUES
(1, 2013, 1, 2),
(2, 2013, 1, 1),
(3, 2013, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `fonte` varchar(45) NOT NULL,
  `logotipo` varchar(200) DEFAULT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nome`, `fonte`, `logotipo`, `tipo`) VALUES
(1, 'Moto Honda da Amazônia LTDA', 'www.motohonda.com.br', NULL, 'Nacional'),
(2, 'Teewa', 'www.teewa.com.br', NULL, 'Local'),
(3, 'Microsoft S.A', 'www.microsoft.com', NULL, 'Estrangeira'),
(4, 'Pastelaria do Arruda EPP', 'www.queso.blogspot.com.br', NULL, 'Local');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresaHasUsuario`
--

CREATE TABLE `empresaHasUsuario` (
  `Empresa_idEmpresa` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `empresaHasUsuario`
--

INSERT INTO `empresaHasUsuario` (`Empresa_idEmpresa`, `Usuario_idUsuario`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `indice`
--

CREATE TABLE `indice` (
  `idIndice` int(11) NOT NULL,
  `formula` varchar(45) NOT NULL,
  `idTipo_Indice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `indice`
--

INSERT INTO `indice` (`idIndice`, `formula`, `idTipo_Indice`) VALUES
(1, 'LG = (AT/PE)', 1),
(2, 'LC = (AC/PC)', 2);

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

--
-- Fazendo dump de dados para tabela `notificacao`
--

INSERT INTO `notificacao` (`idNotificacao`, `Usuario_idUsuario`, `status`, `conteudo`, `tipo`) VALUES
(1, 1, 1, 'Todo dia é dia de trabalhar!', 1),
(2, 2, 0, 'Você foi uma menina má!', 2),
(3, 3, 1, 'Já falei para não me chamar de chefinho!', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoDemonstração`
--

CREATE TABLE `tipoDemonstração` (
  `idtipoDemonstração` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tipoDemonstração`
--

INSERT INTO `tipoDemonstração` (`idtipoDemonstração`, `nome`) VALUES
(1, 'Balanço Patrimonial'),
(2, 'Demonstração dos Fluxos de Caixa'),
(3, 'Demonstração do Resultado do Exercício');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_indice`
--

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

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `login` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `identificadorPessoa` tinyint(1) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `login`, `nome`, `senha`, `ativo`, `identificadorPessoa`, `email`) VALUES
(1, 'LG', 'Luiz Gustavo', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'lgpa@icomp.ufam.edu.br'),
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
  ADD PRIMARY KEY (`idAgregado`);

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
  ADD KEY `fk_demonstracao_1_idx` (`Empresa_idEmpresa`),
  ADD KEY `fk_demonstracao_2_idx` (`idtipoDemonstração`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

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
-- Índices de tabela `tipoDemonstração`
--
ALTER TABLE `tipoDemonstração`
  ADD PRIMARY KEY (`idtipoDemonstração`);

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
  MODIFY `idAgregado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `analise`
--
ALTER TABLE `analise`
  MODIFY `idanalise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `idConta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `demonstracao`
--
ALTER TABLE `demonstracao`
  MODIFY `idDemonstracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `indice`
--
ALTER TABLE `indice`
  MODIFY `idIndice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `idNotificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restrições para dumps de tabelas
--

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
  ADD CONSTRAINT `fk_demonstracao_1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demonstracao_2` FOREIGN KEY (`idtipoDemonstração`) REFERENCES `tipoDemonstração` (`idtipoDemonstração`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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