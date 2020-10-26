-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26/10/2020 às 02:55
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ipet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `favorite`
--

CREATE TABLE `favorite` (
  `id_fav` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `created_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `action` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_doc` varchar(11) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `log`
--

INSERT INTO `log` (`id_log`, `description`, `action`, `user_id`, `user_name`, `user_doc`, `created_at`) VALUES
(1, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 18:54:22'),
(2, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:07:51'),
(3, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 19:08:12'),
(4, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:09:23'),
(5, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 19:09:27'),
(6, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:10:24'),
(7, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 19:10:31'),
(8, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:11:22'),
(9, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 19:11:27'),
(10, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:11:58'),
(11, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 19:12:04'),
(12, 'Entrou no sistema', 'login', 11, 'Teste teste', '00000000000', '23-10-2020 19:13:09'),
(13, 'Saiu do sistema', 'logout', 11, 'Teste teste', '00000000000', '23-10-2020 19:13:56'),
(14, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:26:28'),
(15, 'Alterou seus dados pessoais', 'update', 21, 'Sata Sata', '44324268886', '23-10-2020 19:33:32'),
(16, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 19:38:06'),
(17, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:38:54'),
(18, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:38:54'),
(19, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 19:44:46'),
(20, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:56:40'),
(21, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 20:32:26'),
(22, 'Alterou seus dados pessoais', 'update', 21, 'Sata Sata', '44324268886', '23-10-2020 20:56:29'),
(23, 'Alterou seus dados pessoais', 'update', 21, 'Sata Sata', '44324268886', '23-10-2020 20:58:24'),
(24, 'Alterou seus dados pessoais', 'update', 21, 'Sata Sata', '44324268886', '23-10-2020 20:59:41'),
(25, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 21:00:42'),
(26, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 21:00:57'),
(27, 'Alterou seus dados pessoais', 'update', 21, 'Sata Sata', '44324268886', '23-10-2020 21:01:13'),
(28, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '23-10-2020 23:30:16'),
(29, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 23:31:06'),
(30, 'Saiu do sistema', 'logout', 21, 'Sata Sata', '44324268886', '24-10-2020 03:21:10'),
(31, 'Entrou no sistema', 'login', 21, 'User', '44324268886', '24-10-2020 03:21:25'),
(32, 'Saiu do sistema', 'logout', 21, 'User', '44324268886', '24-10-2020 03:27:28'),
(33, 'Entrou no sistema', 'login', 21, 'User', '44324268886', '24-10-2020 03:28:00'),
(34, 'Entrou no sistema', 'login', 21, 'User', '44324268886', '24-10-2020 03:35:51'),
(35, 'Cadastrou-se no sistema', 'signup', 32, 'Teste teste', '00000000000', '24-10-2020 04:45:14'),
(36, 'Cadastrou-se no sistema', 'signup', 33, 'delete', '00000000000', '25-10-2020 12:57:06'),
(37, 'Saiu do sistema', 'logout', 33, 'delete', '00000000000', '25-10-2020 13:15:11'),
(38, 'Entrou no sistema', 'login', 21, 'User', '44324268886', '25-10-2020 13:15:20'),
(39, 'Saiu do sistema', 'logout', 21, 'User', '44324268886', '25-10-2020 13:53:04'),
(40, 'Entrou no sistema', 'login', 33, 'delete', '00000000000', '25-10-2020 13:53:36'),
(41, 'Saiu do sistema', 'logout', 33, 'delete', '00000000000', '25-10-2020 13:56:41'),
(42, 'Entrou no sistema', 'login', 33, 'delete', '00000000000', '25-10-2020 13:56:49'),
(43, 'Saiu do sistema', 'logout', 33, 'delete', '00000000000', '25-10-2020 13:57:01'),
(44, 'Entrou no sistema', 'login', 21, 'User', '44324268886', '25-10-2020 13:57:09'),
(45, 'Saiu do sistema', 'logout', 21, 'User', '44324268886', '25-10-2020 16:41:39'),
(46, 'Entrou no sistema', 'login', 33, 'delete', '00000000000', '25-10-2020 16:41:52'),
(47, 'Alterou seus dados pessoais', 'update', 33, 'Delete', '00000000000', '25-10-2020 16:42:18'),
(48, 'Saiu do sistema', 'logout', 33, 'delete', '00000000000', '25-10-2020 17:43:02'),
(49, 'Cadastrou-se no sistema', 'signup', 34, 'Ong 1', '00000000000', '25-10-2020 17:43:27'),
(50, 'Saiu do sistema', 'logout', 34, 'Ong 1', '00000000000', '25-10-2020 17:43:34'),
(51, 'Cadastrou-se no sistema', 'signup', 35, 'ong 2', '00000000000', '25-10-2020 17:44:02'),
(52, 'Saiu do sistema', 'logout', 35, 'ong 2', '00000000000', '25-10-2020 17:44:06'),
(53, 'Cadastrou-se no sistema', 'signup', 36, 'ong3', '44324268886', '25-10-2020 17:44:34'),
(54, 'Saiu do sistema', 'logout', 36, 'ong3', '44324268886', '25-10-2020 17:44:36'),
(55, 'Cadastrou-se no sistema', 'signup', 37, 'ong4', '22222222222', '25-10-2020 17:45:03'),
(56, 'Saiu do sistema', 'logout', 37, 'ong4', '22222222222', '25-10-2020 17:45:06'),
(57, 'Entrou no sistema', 'login', 21, 'User', '44324268886', '25-10-2020 17:45:55'),
(58, 'Saiu do sistema', 'logout', 21, 'User', '44324268886', '25-10-2020 17:47:46'),
(59, 'Cadastrou-se no sistema', 'signup', 38, 'ONG5', '22222222222', '25-10-2020 17:48:13'),
(60, 'Saiu do sistema', 'logout', 38, 'ONG5', '22222222222', '25-10-2020 17:48:16'),
(61, 'Entrou no sistema', 'login', 21, 'User', '44324268886', '25-10-2020 17:48:24'),
(62, 'Saiu do sistema', 'logout', 21, 'User', '44324268886', '25-10-2020 17:56:13'),
(63, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '25-10-2020 17:56:42'),
(64, 'Saiu do sistema', 'logout', 33, 'Delete', '00000000000', '25-10-2020 18:02:49'),
(65, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '25-10-2020 18:02:59'),
(66, 'Alterou seus dados pessoais', 'update', 33, 'Delete', '00000000000', '25-10-2020 18:11:00'),
(67, 'Saiu do sistema', 'logout', 33, 'Delete', '00000000000', '25-10-2020 18:28:48'),
(68, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '25-10-2020 18:33:44'),
(69, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '25-10-2020 18:33:44'),
(70, 'Desativou sua conta', 'Delete', 33, 'Delete', '00000000000', '25-10-2020 18:45:00'),
(71, 'Saiu do sistema', 'logout', 33, 'Delete', '00000000000', '25-10-2020 18:45:02'),
(72, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '25-10-2020 18:45:45'),
(73, 'Desativou sua conta', 'Delete', 33, 'Delete', '00000000000', '25-10-2020 18:46:31'),
(74, 'Desativou sua conta', 'Delete', 33, 'Delete', '00000000000', '25-10-2020 18:47:26'),
(75, 'Desativou sua conta', 'Delete', 33, 'Delete', '00000000000', '25-10-2020 18:48:13'),
(76, 'Desativou sua conta', 'Delete', 33, 'Delete', '00000000000', '25-10-2020 18:48:43'),
(77, 'Saiu do sistema', 'logout', 33, 'Delete', '00000000000', '25-10-2020 18:48:48'),
(78, 'Entrou no sistema', 'login', 21, 'User', '44324268886', '25-10-2020 18:53:52'),
(79, 'Saiu do sistema', 'logout', 21, 'User', '44324268886', '25-10-2020 18:53:58'),
(80, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '25-10-2020 18:55:18'),
(81, 'Saiu do sistema', 'logout', 33, 'Delete', '00000000000', '25-10-2020 19:29:32'),
(82, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '25-10-2020 19:29:40'),
(83, 'Alterou seus dados pessoais', 'update', 33, 'Delete', '00000000000', '25-10-2020 20:42:45'),
(84, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '25-10-2020 21:49:51'),
(85, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '25-10-2020 21:51:11'),
(86, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '25-10-2020 21:51:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notify`
--

CREATE TABLE `notify` (
  `id_not` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_user` varchar(100) NOT NULL,
  `image_user` varchar(100) NOT NULL,
  `type` varchar(2) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `notify`
--

INSERT INTO `notify` (`id_not`, `id_user`, `name_user`, `image_user`, `type`, `title`, `text`, `created_at`) VALUES
(1, 21, 'Diogo Ferreira', 'diogo.png', '4', 'Não compartilhe suas credenciais', 'Lorem ipsum dolor sit amet', 'xxx'),
(2, 1, 'Pedro Ferreira', 'pedro.png', '1', 'A plataforma está operando normalmente', 'Lorem ipsum dolor sit amet', 'xxx'),
(3, 21, 'teste', 'eugenio.png', '3', 'tipe 3', 'aaaaaaa', 'xxx'),
(4, 21, 'cadoni', 'cadoni.png', '2', 'dddddd', 'ddddd', 'xxx'),
(5, 21, 'aaaa', 'diogo.png', '1', 'aaaaa', 'aaaaa', 'aaa'),
(6, 21, 'aaaaa', 'diogo.png', '2', 'aaaaa', 'aaaa', ''),
(7, 21, 'aaaaaa', 'diogo.png', '3', 'aaaa', 'aaaa', 'aaa'),
(8, 21, 'aaaaa', 'diogo.png', '4', 'aaa', 'aaaa', 'aaa'),
(9, 21, 'aaaa', 'diogo.png', '4', 'qqq', 'qqq', 'aaa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_author` varchar(11) NOT NULL,
  `cpf_author` varchar(20) NOT NULL,
  `ranking_author` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `city_author` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `post`
--

INSERT INTO `post` (`id_post`, `id_author`, `cpf_author`, `ranking_author`, `author`, `city_author`, `uf`, `title`, `text`, `telephone`, `email`, `instagram`, `type`, `created_at`, `image`, `image_author`) VALUES
(1, '33', '00000000000', 1, 'Delete', 'Mogi Guaçu', 'RN', 'Post 1', 'aaaa', '11111111', 'delete@delete.com', '@dhiogo_fer', 3, '25-10-2020 21:49:51', 'dog.jpg', 'eugenio.png'),
(2, '33', '00000000000', 1, 'Delete', 'Mogi Guaçu', 'RN', 'Post 2', 'aaa', '11111111', 'delete@delete.com', '@dhiogo_fer', 2, '25-10-2020 21:51:11', 'dog.jpg', 'eugenio.png'),
(3, '33', '00000000000', 1, 'Delete', 'Mogi Guaçu', 'RN', 'Post 3', 'aaa', '11111111', 'delete@delete.com', '@dhiogo_fer', 2, '25-10-2020 21:51:11', 'dog.jpg', 'eugenio.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `banner` varchar(200) DEFAULT NULL,
  `use_terms` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id_user`, `ranking`, `name`, `email`, `password`, `cpf`, `telephone`, `instagram`, `street`, `neighborhood`, `city`, `uf`, `bio`, `image`, `banner`, `use_terms`, `status`) VALUES
(1, 1, 'Diogo Ferreira', 'diogo.santos134@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '44324268886', '0', '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'danilo.png', 'banner2.jpg', 1, 1),
(2, 1, 'João Eugênio', 'joao.eugenio@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '00000000000', '0', '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'pedro.png', 'banner3.jpeg', 1, 1),
(3, 1, 'Pedro Ferreira', 'pedro.ferreira@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'diogo.png', 'banner3.jpeg', 1, 1),
(21, 1, 'User', 'sata@sata.com', '202cb962ac59075b964b07152d234b70', '44324268886', '19991621576', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner1.jpeg', 1, 1),
(32, 1, 'Teste teste', 'aaa@aaa.com', '202cb962ac59075b964b07152d234b70', '00000000000', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(33, 1, 'Delete', 'delete@delete.com', '202cb962ac59075b964b07152d234b70', '00000000000', '', '@dhiogo_fer', '', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Mogi Guaçu', 'RN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner1.jpeg', 1, 1),
(34, 1, 'Ong 1', 'ong1@ong1.com', '202cb962ac59075b964b07152d234b70', '00000000000', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(35, 1, 'ong 2', 'ong2@ong2.com', '202cb962ac59075b964b07152d234b70', '00000000000', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(36, 1, 'ong3', 'ong3@ong3.com', '202cb962ac59075b964b07152d234b70', '44324268886', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(37, 1, 'ong4', 'ong4@gmail.com', '202cb962ac59075b964b07152d234b70', '22222222222', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(38, 2, 'ONG5', 'ong5@gmail.com', '202cb962ac59075b964b07152d234b70', '22222222222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'avatar.png', 'banner1.jpeg', 1, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id_fav`);

--
-- Índices de tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices de tabela `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id_not`);

--
-- Índices de tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de tabela `notify`
--
ALTER TABLE `notify`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
