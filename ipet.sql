-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 29/10/2020 às 20:38
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
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created` varchar(30) NOT NULL
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
(309, 'Diogo Ferreira desativou a conta: 21', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:26:32'),
(310, 'Diogo Ferreira reabilitou a conta: 21', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:26:41'),
(311, 'Diogo Ferreira desativou a conta: 21', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:36:22'),
(312, 'Diogo Ferreira desativou a conta: 38', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:43:18'),
(313, 'Diogo Ferreira desativou a conta: 36', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:45:59'),
(314, 'Diogo Ferreira reabilitou a conta: 38', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:47:01'),
(315, 'Diogo Ferreira reabilitou a conta: 36', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:47:06'),
(316, 'Diogo Ferreira desativou a conta: 3', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:51:31'),
(317, 'Diogo Ferreira desativou a conta: 2', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:53:11'),
(318, 'Diogo Ferreira reabilitou a conta: 3', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:54:56'),
(319, 'Diogo Ferreira desativou a conta: 3', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:55:03'),
(320, 'Diogo Ferreira reabilitou a conta: 2', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:55:13'),
(321, 'Diogo Ferreira Removeu ADM: 2', 'Promoção', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:55:30'),
(322, 'Diogo Ferreira Tornou ADM: 2', 'Promoção', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:55:53'),
(323, 'Diogo Ferreira Removeu ADM: 3', 'Promoção', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:56:33'),
(324, 'Diogo Ferreira Tornou ADM: 3', 'Promoção', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 12:56:43'),
(325, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 13:34:21'),
(326, 'ADM - Excluiu o post 50', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 13:34:42'),
(327, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:16:01'),
(328, 'ADM - Excluiu o post 51', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:17:20'),
(329, 'Diogo Ferreira desativou a conta: 38', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:20:39'),
(330, 'Diogo Ferreira reabilitou a conta: 38', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:20:49'),
(331, 'Diogo Ferreira desativou a conta: 38', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:21:32'),
(332, 'Diogo Ferreira reabilitou a conta: 38', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:22:07'),
(333, 'Diogo Ferreira Tornou ADM: 32', 'Promoção', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:27:36'),
(334, 'Diogo Ferreira Removeu ADM: 32', 'Promoção', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:27:50'),
(335, 'Diogo Ferreira desativou a conta: 32', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:28:32'),
(336, 'Diogo Ferreira desativou a conta: 38', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:33:53'),
(337, 'Diogo Ferreira reabilitou a conta: 38', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:36:54'),
(338, 'Diogo Ferreira reabilitou a conta: 32', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:40:26'),
(339, 'Diogo Ferreira reabilitou a conta: 21', 'Activate', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:40:43'),
(340, 'Diogo Ferreira desativou a conta: 38', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 14:41:04'),
(341, 'Entrou no sistema', 'Login', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 15:01:51'),
(342, 'ADM - Excluiu a notificação 21', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 15:31:02'),
(343, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 15:58:47'),
(344, 'ADM - Excluiu a notificação 24', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 16:00:09'),
(345, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 16:03:50'),
(346, 'ADM - Excluiu a notificação 25', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 16:13:56'),
(347, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 16:14:26'),
(348, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 16:14:26'),
(349, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 16:15:11'),
(350, 'ADM - Excluiu a notificação 28', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 16:15:34'),
(351, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 16:16:23'),
(352, 'ADM - Excluiu a notificação 29', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 16:16:50'),
(353, 'ADM - Excluiu a notificação 27', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 16:16:54'),
(354, 'ADM - Excluiu a notificação 26', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 16:33:21'),
(355, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 16:34:02'),
(356, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 16:34:42'),
(357, 'Realizou uma postagem', 'Post', 1, 'Diogo Ferreira', '', '29-10-2020 16:35:39'),
(358, 'ADM - Excluiu a notificação 31', 'Delete', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 16:35:48'),
(359, 'Saiu do sistema', 'Logout', 1, 'Diogo Ferreira', '44324268886', '29-10-2020 16:37:20'),
(360, 'Entrou no sistema', 'Login', 32, 'Dmitri Ivanovich Mendelev', '00000000000', '29-10-2020 16:37:27'),
(361, 'Saiu do sistema', 'Logout', 32, 'Dmitri Ivanovich Mendelev', '00000000000', '29-10-2020 16:37:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notify`
--

CREATE TABLE `notify` (
  `id_not` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `name_user` varchar(100) NOT NULL,
  `image_user` varchar(100) NOT NULL,
  `telephone_user` varchar(30) NOT NULL,
  `type` varchar(2) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `created_at` varchar(20) NOT NULL,
  `origin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `notify`
--

INSERT INTO `notify` (`id_not`, `id_user`, `id_post`, `name_user`, `image_user`, `telephone_user`, `type`, `title`, `text`, `created_at`, `origin`) VALUES
(17, 34, 44, 'Ong 1', 'eugenio.png', '19 99999-0000', '3', 'Cachorro precisando de cirurgia torácica', 'Cachorro precisando de cirurgia torácica', '21:18', 0),
(30, 1, NULL, 'Diogo Ferreira', 'eugenio.png', '19991621576', '3', 'Alerta de segurança', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '16:34', 1),
(32, 1, NULL, 'Diogo Ferreira', 'eugenio.png', '19991621576', '4', 'Bugs resolvidos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '16:35', 1);

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
(21, '32', '00000000000', 1, 'Dmitri Ivanovich Mendelev', 'Mogi Guaçu', 'SP', 'Cachorro com fraturas', 'Teste - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '19999990000', 'aaa@aaa.com', '@dhiogo_fer', 3, '27-10-2020 12:42:24', 'dog.jpg', 'eugenio.png'),
(22, '32', '00000000000', 1, 'Dmitri Ivanovich Mendelev', 'Santa Cruz do Sul', 'SC', 'Cachorros sem ração', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '19999990000', 'aaa@aaa.com', '@dhiogo_fer', 2, '27-10-2020 12:43:09', 'dog.jpg', 'eugenio.png'),
(23, '33', '00000000000', 1, 'Arthur Schopenhauer', 'Mogi Guaçu', 'SP', 'Doação de filhotes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '19991621576', 'delete@delete.com', '@dhiogo_fer', 1, '27-10-2020 12:44:58', 'dog.jpg', 'eugenio.png'),
(44, '34', '00000000000', 2, 'Ong 1', 'Mogi Guaçu', 'SP', 'Cachorro precisando de cirurgia torácica', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '19 99999-0000', 'ong1@ong1.com', '@dhiogo_fer', 3, '28-10-2020 21:18:32', 'dog.jpg', 'eugenio.png'),
(49, '1', '44324268886', 3, 'Diogo Ferreira', 'Mogi Guaçu', 'SP', 'Cachorro precisando de cirurgia pulmonar', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '19991621576', 'diogo.santos134@etec.sp.gov', '@dhiogo_fer', 3, '29-10-2020 10:47:26', 'dog.jpg', 'eugenio.png'),
(52, '1', '', 3, 'Diogo Ferreira', '', '', 'Post 1', 'aaaa', '19991621576', 'diogo.santos134@etec.sp.gov', '', 4, '29-10-2020 15:58:47', 'dog.jpg', 'eugenio.png');

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
(1, 3, 'Diogo Ferreira', 'diogo.santos134@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '44324268886', '19991621576', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner3.jpeg', 1, 1),
(2, 3, 'João Eugênio', 'joao.eugenio@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '00000000000', '0', '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'pedro.png', 'banner3.jpeg', 1, 1),
(3, 3, 'Pedro Ferreira', 'pedro.ferreira@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'diogo.png', 'banner3.jpeg', 1, 0),
(21, 1, 'User', 'sata@sata.com', '202cb962ac59075b964b07152d234b70', '44324268886', '19991621576', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner1.jpeg', 1, 1),
(32, 1, 'Dmitri Ivanovich Mendelev', 'aaa@aaa.com', '202cb962ac59075b964b07152d234b70', '00000000000', '19999990000', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner2.jpg', 1, 1),
(33, 1, 'Arthur Schopenhauer', 'delete@delete.com', '202cb962ac59075b964b07152d234b70', '00000000000', '19991621576', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner3.jpeg', 1, 1),
(34, 2, 'Ong 1', 'ong1@ong1.com', '202cb962ac59075b964b07152d234b70', '00000000000', '19 99999-0000', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner2.jpg', 1, 1),
(35, 2, 'ong 2', 'ong2@ong2.com', '202cb962ac59075b964b07152d234b70', '00000000000', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(36, 2, 'ong 3', 'ong3@ong3.com', '202cb962ac59075b964b07152d234b70', '44324268886', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(37, 2, 'ong 4', 'ong4@gmail.com', '202cb962ac59075b964b07152d234b70', '22222222222', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(38, 2, 'ong 5', 'ong5@gmail.com', '202cb962ac59075b964b07152d234b70', '22222222222', NULL, NULL, NULL, NULL, NULL, NULL, 'Teste', 'avatar.png', 'banner1.jpeg', 1, 0);

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
  MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=362;

--
-- AUTO_INCREMENT de tabela `notify`
--
ALTER TABLE `notify`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
