-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Maio-2022 às 06:52
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dblivraria`
--
CREATE DATABASE IF NOT EXISTS `dblivraria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dblivraria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `id_adm` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `email` varchar(110) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`id_adm`, `nome`, `nome_usuario`, `email`, `senha`) VALUES
(1, 'João Paulo', 'jpoliveira', 'jpoliveira@gmail.com', 'jp1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluga`
--

CREATE TABLE `aluga` (
  `cod_aluguel` int(11) NOT NULL,
  `livro_cod` int(11) NOT NULL,
  `usuario_cod` int(11) NOT NULL,
  `data_aluguel` date NOT NULL,
  `data_previsao` date NOT NULL,
  `data_devolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluga`
--

INSERT INTO `aluga` (`cod_aluguel`, `livro_cod`, `usuario_cod`, `data_aluguel`, `data_previsao`, `data_devolucao`) VALUES
(1, 2, 2, '2010-04-12', '2010-04-20', '2010-04-27'),
(2, 1, 4, '2010-04-13', '2010-04-25', '2010-05-01'),
(6, 5, 2, '2010-05-12', '2010-05-19', '2010-05-19'),
(13, 1, 2, '2022-05-10', '2022-05-12', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editoras`
--

CREATE TABLE `editoras` (
  `cod_editora` int(11) NOT NULL,
  `nome_editora` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `editoras`
--

INSERT INTO `editoras` (`cod_editora`, `nome_editora`, `cidade`) VALUES
(1, 'Makron', 'São Paulo'),
(2, 'Campus', 'Rio de Janeiro'),
(3, 'Pearson Jackson', 'São Paulo'),
(4, 'Bookman', 'São Paulo'),
(6, 'Rockster', 'Caucaia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `nome_livro` varchar(45) NOT NULL,
  `editora_cod` int(11) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `lancamento` date NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `nome_livro`, `editora_cod`, `autor`, `lancamento`, `quantidade`) VALUES
(1, 'Banco de Dados', 4, 'Navathe', '2002-10-10', 8),
(2, 'Redes de Computadores', 1, 'Deitel', '2005-05-03', 3),
(4, 'Sistemas Operacionais', 2, 'Cormen', '2004-06-06', 2),
(5, 'Algoritmos', 1, 'Cormen', '2006-08-08', 8),
(6, 'Programação em C++', 2, 'Deitel', '2005-12-20', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(45) NOT NULL,
  `cidade_usuario` varchar(45) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `email` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `cidade_usuario`, `endereco`, `email`) VALUES
(2, 'Marcelo Silva', 'Fortaleza', 'Av B, 1200', 'ms@gmail.com'),
(4, 'Roberta Porto', 'Recife', 'Rua D, 120', 'rporto@bol.com'),
(6, 'Amanda Sousa', 'Rio de Janeiro', 'Rua S, 780', 'amanda@gmail.com'),
(7, 'Maria Oliveira', 'Rio de Janeiro', 'Av HM, 152', 'mariaoliveira@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices para tabela `aluga`
--
ALTER TABLE `aluga`
  ADD PRIMARY KEY (`cod_aluguel`),
  ADD KEY `fk_aluga_livros` (`livro_cod`),
  ADD KEY `fk_aluga_usuarios` (`usuario_cod`);

--
-- Índices para tabela `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`cod_editora`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `fk_livros_editoras` (`editora_cod`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `aluga`
--
ALTER TABLE `aluga`
  MODIFY `cod_aluguel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `editoras`
--
ALTER TABLE `editoras`
  MODIFY `cod_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluga`
--
ALTER TABLE `aluga`
  ADD CONSTRAINT `fk_aluga_livros` FOREIGN KEY (`livro_cod`) REFERENCES `livros` (`id_livro`),
  ADD CONSTRAINT `fk_aluga_usuarios` FOREIGN KEY (`usuario_cod`) REFERENCES `usuarios` (`id_usuario`);

--
-- Limitadores para a tabela `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `fk_livros_editoras` FOREIGN KEY (`editora_cod`) REFERENCES `editoras` (`cod_editora`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
