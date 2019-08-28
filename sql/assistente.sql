-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 28-Ago-2019 às 02:48
-- Versão do servidor: 5.6.41-84.1
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `world381_game`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assistente`
--

CREATE TABLE `assistente` (
  `id` int(11) NOT NULL,
  `assistente_name` varchar(50) NOT NULL,
  `assistente_last_name` varchar(200) NOT NULL,
  `assistente_creator_name` varchar(50) NOT NULL,
  `assistente_creator_last_name` varchar(200) NOT NULL,
  `assistente_age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `assistente`
--

INSERT INTO `assistente` (`id`, `assistente_name`, `assistente_last_name`, `assistente_creator_name`, `assistente_creator_last_name`, `assistente_age`) VALUES
(1, 'Lilly', 'Almeida', 'samuel', 'prado almeida', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `pergunta_name` mediumtext NOT NULL,
  `pergunta_type` int(11) NOT NULL,
  `pergunta_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aprovado` int(11) NOT NULL,
  `reprovado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta_name`, `pergunta_type`, `pergunta_status`, `user_id`, `aprovado`, `reprovado`) VALUES
(1, 'oi', 0, 0, 0, 0, 0),
(2, 'opa', 0, 0, 0, 0, 0),
(3, 'olá', 0, 0, 0, 0, 0),
(4, 'oioi', 0, 0, 0, 0, 0),
(5, 'q', 0, 0, 0, 0, 0),
(6, 'nossa', 0, 0, 0, 0, 0),
(7, 'opaopa', 0, 0, 0, 0, 0),
(8, 'ual', 0, 0, 0, 0, 0),
(9, 'oi lilly', 0, 0, 0, 0, 0),
(10, 'olá lilly', 0, 0, 0, 0, 0),
(11, 'e ai beleza?', 0, 0, 0, 0, 0),
(12, 'sasa', 0, 0, 0, 0, 0),
(13, 'aaa', 0, 0, 0, 0, 0),
(14, 'tudo bem com você?', 0, 0, 0, 0, 0),
(15, 'e ai', 0, 0, 0, 0, 0),
(16, 'como você está?', 0, 0, 0, 0, 0),
(17, '?', 0, 0, 0, 0, 0),
(18, 'tudo bem?', 0, 0, 0, 0, 0),
(19, 'boa tarde', 0, 0, 0, 0, 0),
(20, 'qual o seu nome?', 0, 0, 0, 0, 0),
(21, 'tudo bem ?', 0, 0, 0, 0, 0),
(22, 'pq ?', 0, 0, 0, 0, 0),
(23, 'fodasse', 0, 0, 0, 0, 0),
(24, 'boa noite', 0, 0, 0, 0, 0),
(25, 'estou triste', 0, 0, 0, 0, 0),
(26, 'o que estas a fazer?', 0, 0, 0, 0, 0),
(27, 'quantos anos você tem?', 0, 0, 0, 0, 0),
(28, 'opaopaa', 0, 0, 0, 0, 0),
(29, 'opaoapoaopa', 0, 0, 1, 0, 0),
(30, 'opaoapaopaoopa', 0, 0, 1, 1, 0),
(31, 'opsopsops', 0, 0, 1, 1, 0),
(32, 'como vai?', 0, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `resposta_name` mediumtext NOT NULL,
  `resposta_pergunta_id` int(11) NOT NULL,
  `resposta_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `aprovado` int(11) NOT NULL,
  `reprovado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `resposta_name`, `resposta_pergunta_id`, `resposta_status`, `user_id`, `aprovado`, `reprovado`) VALUES
(1, 'olá', 1, 0, 0, 0, 0),
(2, 'opa', 2, 0, 0, 0, 0),
(3, 'olá', 3, 0, 0, 0, 0),
(4, 'olá', 4, 0, 0, 0, 0),
(5, '?', 5, 0, 0, 0, 0),
(6, 'o que? estou curiosa', 6, 0, 0, 0, 0),
(7, 'opa', 7, 0, 0, 0, 0),
(8, 'estou curiosa', 8, 0, 0, 0, 0),
(9, 'olá tudo bem?', 9, 0, 0, 0, 0),
(10, 'olá tudo bem?', 10, 0, 0, 0, 0),
(11, 'opa beleza e você?', 11, 0, 0, 0, 0),
(12, 'sasa', 12, 0, 0, 0, 0),
(13, 'aaa', 13, 0, 0, 0, 0),
(14, 'tudo sim', 14, 0, 0, 0, 0),
(15, 'e ai beleza?', 15, 0, 0, 0, 0),
(16, 'estou ótima obrigado por perguntar', 16, 0, 0, 0, 0),
(17, '?', 17, 0, 0, 0, 0),
(18, 'tudo sim obrigada', 18, 0, 0, 0, 0),
(19, 'boa tarde tudo bem?', 19, 0, 0, 0, 0),
(20, 'o meu nome é Lilly.', 20, 0, 0, 0, 0),
(21, 'ai depende...', 21, 0, 0, 0, 0),
(22, 'Se estar com fome é estar bem, então estou bem', 22, 0, 0, 0, 0),
(23, 'está nervoso?', 23, 0, 0, 0, 0),
(24, 'boa noote, tudo bem?', 24, 0, 0, 0, 0),
(25, 'por que está triste?', 25, 0, 0, 0, 0),
(26, 'nada', 26, 0, 0, 0, 0),
(27, 'que tal trocarmos de assunto...', 27, 0, 0, 0, 0),
(28, '?', 28, 0, 0, 0, 0),
(29, '?', 29, 0, 1, 0, 0),
(30, '?', 30, 0, 1, 1, 0),
(31, '?', 31, 0, 1, 1, 0),
(32, 'vou ótima e você?', 32, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_permission`
--

CREATE TABLE `system_permission` (
  `id` int(11) NOT NULL,
  `permission_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_permission`
--

INSERT INTO `system_permission` (`id`, `permission_name`) VALUES
(1, 'ADMIN'),
(2, 'CONTROLADOR'),
(3, 'FUNCIONARIO'),
(4, 'VISITANTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_mail` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `user_points` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `use_last_name` varchar(400) NOT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_users`
--

INSERT INTO `system_users` (`id`, `user_type`, `user_mail`, `user_pass`, `user_points`, `user_name`, `use_last_name`, `user_status`) VALUES
(1, 1, 'samuelprado.a@gmail.com', '0c7540eb7e65b553ec1ba6b20de79608', 0, 'samuel', 'prado almeida', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistente`
--
ALTER TABLE `assistente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_permission`
--
ALTER TABLE `system_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistente`
--
ALTER TABLE `assistente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `system_permission`
--
ALTER TABLE `system_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
