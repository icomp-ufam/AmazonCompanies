-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 08/02/2017 às 19:41
-- Versão do servidor: 5.7.17-0ubuntu0.16.04.1
-- Versão do PHP: 7.0.13-0ubuntu0.16.04.1

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
-- Estrutura para tabela `analise`
--

CREATE TABLE `analise` (
  `idanalise` int(11) NOT NULL,
  `texto` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `textoAnalisador` varchar(50) DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `analise`
--

INSERT INTO `analise` (`idanalise`, `texto`, `status`, `idEmpresa`, `textoAnalisador`, `Usuario_idUsuario`) VALUES
(2, 'Texto enviado para análise', '0', 2, 'Resultado da análise feita pelo responsável.', 2),
(3, 'Este é um sistema operacional que', '0', 1, 'ooooooooooooooooooooooooooooooooooooo', 1),
(6, 'Mais um teste do testo enviado para análise.', '1', 4, 'Resultado da análise texto de exemplo ------------', 6),
(7, 'achei legal<br>', '1', 6, 'bacana<br>', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `Comentario_idComentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `comentario`
--

INSERT INTO `comentario` (`idComentario`, `conteudo`, `Empresa_idEmpresa`, `nome`, `email`, `data`, `hora`, `Comentario_idComentario`) VALUES
(1, 'olar', 3, 'Neves', 'larissa@icomp.ufam.edu.br', '2017-02-06', '838:59:59', NULL),
(2, 'olar\r\n', 3, 'Larissa', 'llen@icomp.ufam.edu.br', '2017-02-06', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `idConta` int(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idDemonstracao` int(11) NOT NULL,
  `chave` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `conta`
--

INSERT INTO `conta` (`idConta`, `nome`, `idDemonstracao`, `chave`) VALUES
(4, 'Ativos Totais', 1, '#AT'),
(5, 'Ativo Circulante', 1, '#AC'),
(6, 'Disponibilidades + Aplicações Fin Liq Im.', 1, '#DALI'),
(7, 'Estoques ', 1, '#EST'),
(8, 'Ativo não Circulante', 1, '#ANC'),
(9, 'Imobilizado', 1, '#IM'),
(10, 'Passivo Circulante', 1, '#PC'),
(11, 'Passivo Não Circulante', 3, '#PNC'),
(12, 'Passivo Não Circulante Oneroso', 1, '#PNCO'),
(13, 'Passivo Exigível', 1, '#PE'),
(14, 'Patrimônio Líquido', 1, '#PL'),
(15, 'Ativos Totais Médios', 1, '#ATM'),
(16, 'Investimentos (Oneroso + PL)', 3, '#IOPL'),
(17, 'Investimentos Médios', 3, '#IM'),
(18, 'Patrimônio Líquido Médios', 1, '#PLM'),
(19, 'Fornecedores Médio', 1, '#FM'),
(20, 'Estoque Médio', 1, '#EM'),
(21, 'Clientes Médio', 2, '#CM'),
(22, 'CMV', 2, '#CMV'),
(23, 'Compras', 1, '#COMP'),
(24, 'Vendas Líquidas', 2, '#VL'),
(25, 'Lucro Bruto', 2, '#LB'),
(26, 'Lucro Operacional', 2, '#LO'),
(27, 'Lucro Líquido', 2, '#LL');

-- --------------------------------------------------------

--
-- Estrutura para tabela `demonstracao`
--

CREATE TABLE `demonstracao` (
  `idDemonstracao` int(11) NOT NULL,
  `nomeDemonstracao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `demonstracao`
--

INSERT INTO `demonstracao` (`idDemonstracao`, `nomeDemonstracao`) VALUES
(1, 'BALANÇO PATRIMONIAL\r\n'),
(2, 'DEMONSTRAÇÃO DO RESULTADO DO EXERCÍCIO'),
(3, 'DEMONSTRAÇÃO DOS FLUXOS DE CAIXA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `fonte` varchar(45) NOT NULL,
  `logotipo` varchar(200) DEFAULT NULL,
  `tipo` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nome`, `fonte`, `logotipo`, `tipo`) VALUES
(1, 'Moto Honda da Amazônia LTDA', 'www.motohonda.com.br', NULL, 'Nacional'),
(2, 'Teewa', 'www.teewa.com.br', NULL, 'Local'),
(3, 'Microsoft S.A', 'www.microsoft.com', NULL, 'Estrangeira'),
(4, 'Pastelaria do Arruda EPP', 'www.queso.blogspot.com.br', 'beneficio-morango.jpg', 'Local'),
(5, 'TeamSleep', 'teamsleep.com.br', '9428da2563387bf08c4b2ba32af5db03169fa0d5.jpeg', 'Local'),
(6, 'SauronGames', 'www.senhordosaneis.com', NULL, 'Estrangeira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresahasusuario`
--

CREATE TABLE `empresahasusuario` (
  `Empresa_idEmpresa` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `empresahasusuario`
--

INSERT INTO `empresahasusuario` (`Empresa_idEmpresa`, `Usuario_idUsuario`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa_conta`
--

CREATE TABLE `empresa_conta` (
  `id` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idConta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `statusValidacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `empresa_conta`
--

INSERT INTO `empresa_conta` (`id`, `ano`, `valor`, `idEmpresa`, `idConta`, `idUsuario`, `statusValidacao`) VALUES
(2, 2014, 54102, 5, 4, 6, 1),
(3, 2013, 422000, 4, 4, 6, 1),
(4, 2016, 888, 5, 6, 3, 1),
(5, 2015, 25, 5, 4, 3, 0),
(6, 2015, 5, 5, 5, 3, 0),
(7, 2014, 55, 5, 5, 4, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `indice`
--

CREATE TABLE `indice` (
  `idIndice` int(11) NOT NULL,
  `formula` varchar(45) NOT NULL,
  `idTipo_Indice` int(11) NOT NULL,
  `nomeIndice` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `indice`
--

INSERT INTO `indice` (`idIndice`, `formula`, `idTipo_Indice`, `nomeIndice`) VALUES
(1, '(@#AT@+@#AC@)@*@(@#AT@-@#AC@)', 1, 'Liquidez Primária'),
(2, '#DALI@+@#EST', 2, 'Endividamento Secundário'),
(3, '(@#AC@+@#AT@)@*@(@#AC@-@#AT@)', 1, 'Liquidez Teste Indice');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `idNotificacao` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `tipo` int(11) NOT NULL,
  `idAnalise` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `notificacao`
--

INSERT INTO `notificacao` (`idNotificacao`, `Usuario_idUsuario`, `status`, `conteudo`, `tipo`, `idAnalise`) VALUES
(1, 1, 0, 'Todo dia é dia de trabalhar!', 1, NULL),
(2, 2, 0, 'Você foi uma menina má!', 2, NULL),
(3, 3, 1, 'Já falei para não me chamar de chefinho!', 1, NULL),
(6, 6, 1, 'Teste Daniel Godinho', 2, 2),
(7, 2, 1, '2', 3, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_empresa`
--

CREATE TABLE `tipo_empresa` (
  `Nome` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_empresa`
--

INSERT INTO `tipo_empresa` (`Nome`, `id`) VALUES
('Estrangeira', 1),
('Local', 2),
('Nacional', 3);

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
(7, 'Giros Viaconti'),
(8, 'Teste Listagem');

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
(4, 'Motoca', 'Moto Honda da Amazônia LTDA', '3dcdda99b20ed51f83b25c6315c5a818', 1, 3, 'motohonda@gmail.com'),
(5, 'icaro', 'Icaro Dolzane', 'a48e0f40dba24e3bcfe84aad2c272d8d', 0, 1, 'ifd@icomp.ufam.edu.br'),
(6, 'Thitan', 'Thiego Barros', '394bdfc0ac888e1e9a8e6c829dc43025', 1, 1, 't@icomp.ufam.br'),
(7, 'agus', 'Augusto Arruda', '41092952f6cfadc1a1ef40c405159ce3', 1, 2, 'augusto_rr_arruda@gmail.com'),
(8, 'Brasitech', 'Brasitech Indústria de Produtos LTDA', '25d55ad283aa400af464c76d713c07ad', 1, 3, 'bra@gmail.com'),
(9, 'Daniel_aluno', 'Daniel_aluno', '25d55ad283aa400af464c76d713c07ad', 1, 2, 'Daniel_aluno@gmail.com'),
(10, 'teste2', 'tdasdadas', '25d55ad283aa400af464c76d713c07ad', 1, 2, 'cacs@icomp.ufam.edu.br');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `analise`
--
ALTER TABLE `analise`
  ADD PRIMARY KEY (`idanalise`),
  ADD UNIQUE KEY `fk_idUsuario` (`Usuario_idUsuario`) USING BTREE,
  ADD KEY `fk_analise_1_idx` (`idEmpresa`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `Comentario_idComentario` (`Comentario_idComentario`),
  ADD KEY `Empresa_idEmpresa` (`Empresa_idEmpresa`);

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`idConta`),
  ADD KEY `fkDemonstracao` (`idDemonstracao`);

--
-- Índices de tabela `demonstracao`
--
ALTER TABLE `demonstracao`
  ADD PRIMARY KEY (`idDemonstracao`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`),
  ADD KEY `fkTipo` (`tipo`);

--
-- Índices de tabela `empresahasusuario`
--
ALTER TABLE `empresahasusuario`
  ADD PRIMARY KEY (`Empresa_idEmpresa`,`Usuario_idUsuario`),
  ADD KEY `fk_Empresa_has_Usuario_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Empresa_has_Usuario_Empresa1_idx` (`Empresa_idEmpresa`);

--
-- Índices de tabela `empresa_conta`
--
ALTER TABLE `empresa_conta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkIdConta` (`idConta`),
  ADD KEY `fkIdEmpresa` (`idEmpresa`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices de tabela `indice`
--
ALTER TABLE `indice`
  ADD PRIMARY KEY (`idIndice`) USING BTREE,
  ADD KEY `fk_Indice_Tipo_Indice1_idx` (`idTipo_Indice`);

--
-- Índices de tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`idNotificacao`,`Usuario_idUsuario`),
  ADD KEY `fk_Notificacao_Usuario_idx` (`Usuario_idUsuario`);

--
-- Índices de tabela `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  ADD PRIMARY KEY (`Nome`);

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
-- AUTO_INCREMENT de tabela `analise`
--
ALTER TABLE `analise`
  MODIFY `idanalise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `idConta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de tabela `demonstracao`
--
ALTER TABLE `demonstracao`
  MODIFY `idDemonstracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `empresa_conta`
--
ALTER TABLE `empresa_conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `indice`
--
ALTER TABLE `indice`
  MODIFY `idIndice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `idNotificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `analise`
--
ALTER TABLE `analise`
  ADD CONSTRAINT `fk_analise_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idUsuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `notificacao` (`Usuario_idUsuario`);

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`Comentario_idComentario`) REFERENCES `comentario` (`idComentario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `fkDemonstracao` FOREIGN KEY (`idDemonstracao`) REFERENCES `demonstracao` (`idDemonstracao`);

--
-- Restrições para tabelas `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fkTipo` FOREIGN KEY (`tipo`) REFERENCES `tipo_empresa` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `empresahasusuario`
--
ALTER TABLE `empresahasusuario`
  ADD CONSTRAINT `fk_Empresa_has_Usuario_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empresa_has_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `empresa_conta`
--
ALTER TABLE `empresa_conta`
  ADD CONSTRAINT `fkIdConta` FOREIGN KEY (`idConta`) REFERENCES `conta` (`idConta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkIdEmpresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkIdUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `indice`
--
ALTER TABLE `indice`
  ADD CONSTRAINT `fk_Indice_Tipo_Indice1` FOREIGN KEY (`idTipo_Indice`) REFERENCES `tipo_indice` (`idTipo_indice`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `fk_Notificacao_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
