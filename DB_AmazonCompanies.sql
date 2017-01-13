-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jan-2017 às 01:37
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.5.33

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
-- Estrutura da tabela `analise`
--

CREATE TABLE `analise` (
  `idanalise` int(11) NOT NULL,
  `texto` text,
  `status` varchar(20) NOT NULL,
  `idEmpresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `analise`
--

INSERT INTO `analise` (`idanalise`, `texto`, `status`, `idEmpresa`) VALUES
(2, 'Isto aqui é um teste!', '1', 2),
(3, 'Este é um sistema operacional que muitos usam, mas eu ainda prefiro Linux.', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `Empresa_idEmpresa` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `Comentario_idComentario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`idComentario`, `conteudo`, `Empresa_idEmpresa`, `Usuario_idUsuario`, `Comentario_idComentario`) VALUES
(1, 'Esta análise me parece boa!', 1, 1, NULL),
(2, 'Talvez precisa investir mais em RH', 2, 3, NULL),
(3, 'Não concordo e nem discordo de você, muito pelo contrário!', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `idConta` int(20) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idDemonstracao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`idConta`, `nome`, `idDemonstracao`) VALUES
(1, 'Ativo Circulante Financeiro', 1),
(2, 'Disponibilidades', 2),
(3, 'Ativo Circulante Operacional', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `demonstracao`
--

CREATE TABLE `demonstracao` (
  `id` int(11) NOT NULL,
  `nomeDemonstracao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `demonstracao`
--

INSERT INTO `demonstracao` (`id`, `nomeDemonstracao`) VALUES
(1, ''),
(2, ''),
(3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `fonte` varchar(45) NOT NULL,
  `logotipo` varchar(200) DEFAULT NULL,
  `tipo` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `fonte`, `logotipo`, `tipo`) VALUES
(1, 'Moto Honda da Amazônia LTDA', 'www.motohonda.com.br', NULL, 'Nacional'),
(2, 'Teewa', 'www.teewa.com.br', NULL, 'Local'),
(3, 'Microsoft S.A', 'www.microsoft.com', NULL, 'Estrangeira'),
(4, 'Pastelaria do Arruda EPP', 'www.queso.blogspot.com.br', NULL, 'Local');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresahasusuario`
--

CREATE TABLE `empresahasusuario` (
  `Empresa_idEmpresa` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresahasusuario`
--

INSERT INTO `empresahasusuario` (`Empresa_idEmpresa`, `Usuario_idUsuario`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_conta`
--

CREATE TABLE `empresa_conta` (
  `ano` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idConta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa_conta`
--

INSERT INTO `empresa_conta` (`ano`, `valor`, `idEmpresa`, `idConta`) VALUES
(2013, 100, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `indice`
--

CREATE TABLE `indice` (
  `idIndice` int(11) NOT NULL,
  `formula` varchar(45) NOT NULL,
  `idTipo_Indice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `indice`
--

INSERT INTO `indice` (`idIndice`, `formula`, `idTipo_Indice`) VALUES
(1, 'LG = (AT/PE)', 1),
(2, 'LC = (AC/PC)', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `idNotificacao` int(11) NOT NULL,
  `Usuario_idUsuario` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `notificacao`
--

INSERT INTO `notificacao` (`idNotificacao`, `Usuario_idUsuario`, `status`, `conteudo`, `tipo`) VALUES
(1, 1, 1, 'Todo dia é dia de trabalhar!', 1),
(2, 2, 0, 'Você foi uma menina má!', 2),
(3, 3, 1, 'Já falei para não me chamar de chefinho!', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_empresa`
--

CREATE TABLE `tipo_empresa` (
  `Nome` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_empresa`
--

INSERT INTO `tipo_empresa` (`Nome`, `id`) VALUES
('Estrangeira', 1),
('Local', 2),
('Nacional', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_indice`
--

CREATE TABLE `tipo_indice` (
  `idTipo_indice` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_indice`
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
-- Estrutura da tabela `usuario`
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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `login`, `nome`, `senha`, `ativo`, `identificadorPessoa`, `email`) VALUES
(1, 'LG', 'Luiz Gustavo', '25d55ad283aa400af464c76d713c07ad', 1, 1, 'lgpa@icomp.ufam.edu.br'),
(2, 'Tata14', 'Tatazinha', 'a384b6463fc216a5f8ecb6670f86456a', 0, 1, 'tla@icomp.ufam.edu.br'),
(3, 'Gisa', 'Gisele', '25d55ad283aa400af464c76d713c07ad', 1, 2, 'gisa@icomp.ufam.edu.br'),
(4, 'Motoca', 'Moto Honda da Amazônia LTDA', '3dcdda99b20ed51f83b25c6315c5a818', 1, 3, 'motohonda@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analise`
--
ALTER TABLE `analise`
  ADD PRIMARY KEY (`idanalise`),
  ADD KEY `fk_analise_1_idx` (`idEmpresa`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`,`Empresa_idEmpresa`,`Usuario_idUsuario`),
  ADD KEY `fk_Comentário_Empresa1_idx` (`Empresa_idEmpresa`),
  ADD KEY `fk_Comentário_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Comentário_Comentário1_idx` (`Comentario_idComentario`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`idConta`),
  ADD KEY `fkDemonstracao` (`idDemonstracao`);

--
-- Indexes for table `demonstracao`
--
ALTER TABLE `demonstracao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkTipo` (`tipo`);

--
-- Indexes for table `empresahasusuario`
--
ALTER TABLE `empresahasusuario`
  ADD PRIMARY KEY (`Empresa_idEmpresa`,`Usuario_idUsuario`),
  ADD KEY `fk_Empresa_has_Usuario_Usuario1_idx` (`Usuario_idUsuario`),
  ADD KEY `fk_Empresa_has_Usuario_Empresa1_idx` (`Empresa_idEmpresa`);

--
-- Indexes for table `empresa_conta`
--
ALTER TABLE `empresa_conta`
  ADD KEY `fkIdConta` (`idConta`),
  ADD KEY `fkIdEmpresa` (`idEmpresa`);

--
-- Indexes for table `indice`
--
ALTER TABLE `indice`
  ADD PRIMARY KEY (`idIndice`) USING BTREE,
  ADD KEY `fk_Indice_Tipo_Indice1_idx` (`idTipo_Indice`);

--
-- Indexes for table `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`idNotificacao`,`Usuario_idUsuario`),
  ADD KEY `fk_Notificacao_Usuario_idx` (`Usuario_idUsuario`);

--
-- Indexes for table `tipo_empresa`
--
ALTER TABLE `tipo_empresa`
  ADD PRIMARY KEY (`Nome`);

--
-- Indexes for table `tipo_indice`
--
ALTER TABLE `tipo_indice`
  ADD PRIMARY KEY (`idTipo_indice`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analise`
--
ALTER TABLE `analise`
  MODIFY `idanalise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `idConta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `demonstracao`
--
ALTER TABLE `demonstracao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `indice`
--
ALTER TABLE `indice`
  MODIFY `idIndice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `idNotificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `analise`
--
ALTER TABLE `analise`
  ADD CONSTRAINT `fk_analise_1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_Comentario_Comentario1` FOREIGN KEY (`Comentario_idComentario`) REFERENCES `comentario` (`idComentario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comentario_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comentario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `fkDemonstracao` FOREIGN KEY (`idDemonstracao`) REFERENCES `demonstracao` (`id`);

--
-- Limitadores para a tabela `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `fkTipo` FOREIGN KEY (`tipo`) REFERENCES `tipo_empresa` (`Nome`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `empresahasusuario`
--
ALTER TABLE `empresahasusuario`
  ADD CONSTRAINT `fk_Empresa_has_Usuario_Empresa1` FOREIGN KEY (`Empresa_idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Empresa_has_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `empresa_conta`
--
ALTER TABLE `empresa_conta`
  ADD CONSTRAINT `fkIdConta` FOREIGN KEY (`idConta`) REFERENCES `conta` (`idConta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkIdEmpresa` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `indice`
--
ALTER TABLE `indice`
  ADD CONSTRAINT `fk_Indice_Tipo_Indice1` FOREIGN KEY (`idTipo_Indice`) REFERENCES `tipo_indice` (`idTipo_indice`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `fk_Notificacao_Usuario` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
