-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2018 às 02:43
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assistente`
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
  `pergunta_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta_name`, `pergunta_type`, `pergunta_status`) VALUES
(1, 'oi', 0, 0),
(2, 'oi, como vai você?', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `resposta_name` mediumtext NOT NULL,
  `resposta_pergunta_id` int(11) NOT NULL,
  `resposta_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `respostas`
--

INSERT INTO `respostas` (`id`, `resposta_name`, `resposta_pergunta_id`, `resposta_status`) VALUES
(1, 'olá', 1, 0),
(2, 'oi, como vai?', 1, 0);

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
  `use_last_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `system_users`
--

INSERT INTO `system_users` (`id`, `user_type`, `user_mail`, `user_pass`, `user_points`, `user_name`, `use_last_name`) VALUES
(1, 1, 'samuelprado.a@gmail.com', 'bfb4b183c326b79d6dbb0623c7e43cd9', 0, 'samuel', 'prado almeida');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
