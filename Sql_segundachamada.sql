-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Mar-2019 às 16:32
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `segundachamada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `matricula` varchar(9) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `matricula`, `nome`, `sobrenome`, `email`, `senha`, `tipo`) VALUES
(2, 'amin123', 'admin', 'admin', 'admin@admin.com', '$2y$10$HrnZl.6X4O3iC7fmsUEA2.nTOiwTtmsBN5Nfc/vkYZzJgWpnyB5Rq', 3),
(3, 'm02500248', 'leandro', 'machado', 'le@le.com', '$2y$10$QGJQy.e28uDp2GC7OEpjaeulkX5LjwOQ3547/D24OuqjXGy8e7dLC', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `deferimento`
--

CREATE TABLE `deferimento` (
  `id` int(11) NOT NULL,
  `decisao` int(11) DEFAULT NULL,
  `pedidos` int(11) NOT NULL,
  `justificativa` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `deferimento`
--

INSERT INTO `deferimento` (`id`, `decisao`, `pedidos`, `justificativa`) VALUES
(9, 0, 1, 'SFSAASDAAASA'),
(10, 0, 1, 'fasfdaadas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`) VALUES
(3, 'Biologia'),
(6, 'Filosofia'),
(8, 'Física'),
(4, 'Geografia'),
(5, 'História'),
(1, 'Matemática'),
(2, 'Português'),
(7, 'Sociologia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina_turma`
--

CREATE TABLE `disciplina_turma` (
  `id` int(11) NOT NULL,
  `disciplina` int(11) NOT NULL,
  `turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `disciplina_turma`
--

INSERT INTO `disciplina_turma` (`id`, `disciplina`, `turma`) VALUES
(1, 5, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cadastro` int(11) NOT NULL,
  `disciplina_turma` int(11) NOT NULL,
  `justificativa` varchar(500) NOT NULL,
  `arquivo` varchar(500) NOT NULL,
  `datahora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cadastro`, `disciplina_turma`, `justificativa`, `arquivo`, `datahora`) VALUES
(1, 3, 1, 'ASDFGVVSD', 'Carregamentos/5c8ba8b3764c5-subbarra.png', '2019-03-15 13:29:23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `turma` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`, `turma`) VALUES
(1, 'in202'),
(2, 'in203');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `deferimento`
--
ALTER TABLE `deferimento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos` (`pedidos`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `disciplina_turma`
--
ALTER TABLE `disciplina_turma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplina` (`disciplina`),
  ADD KEY `turma` (`turma`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cadastro` (`cadastro`),
  ADD KEY `disciplina_turma` (`disciplina_turma`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `turma` (`turma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deferimento`
--
ALTER TABLE `deferimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `disciplina_turma`
--
ALTER TABLE `disciplina_turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `deferimento`
--
ALTER TABLE `deferimento`
  ADD CONSTRAINT `deferimento_ibfk_1` FOREIGN KEY (`pedidos`) REFERENCES `pedidos` (`id`);

--
-- Limitadores para a tabela `disciplina_turma`
--
ALTER TABLE `disciplina_turma`
  ADD CONSTRAINT `disciplina_turma_ibfk_1` FOREIGN KEY (`disciplina`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `disciplina_turma_ibfk_2` FOREIGN KEY (`turma`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cadastro`) REFERENCES `cadastro` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`disciplina_turma`) REFERENCES `disciplina_turma` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
