-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 27/10/2020 às 22:01
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
(86, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '25-10-2020 21:51:11'),
(87, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '26-10-2020 11:03:21'),
(88, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 11:04:36'),
(89, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 11:36:33'),
(90, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 12:18:16'),
(91, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 12:18:33'),
(92, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 12:18:51'),
(93, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 12:19:09'),
(94, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 12:19:28'),
(95, 'Excluiu o post 1', 'Delete', 33, 'Delete', '00000000000', '26-10-2020 13:27:42'),
(96, 'Excluiu o post 5', 'Delete', 33, 'Delete', '00000000000', '26-10-2020 13:28:31'),
(97, 'Excluiu o post 6', 'Delete', 33, 'Delete', '00000000000', '26-10-2020 13:28:45'),
(98, 'Excluiu o post 9', 'Delete', 33, 'Delete', '00000000000', '26-10-2020 13:32:39'),
(99, 'Excluiu o post 10', 'Delete', 33, 'Delete', '00000000000', '26-10-2020 13:50:40'),
(100, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '26-10-2020 13:52:40'),
(101, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 14:08:45'),
(102, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 14:09:05'),
(103, 'Alterou seus dados pessoais', 'update', 33, 'Delete', '00000000000', '26-10-2020 14:09:21'),
(104, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 14:09:42'),
(105, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 16:31:06'),
(106, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 16:41:36'),
(107, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 16:45:43'),
(108, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 16:46:28'),
(109, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 16:47:49'),
(110, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 16:54:13'),
(111, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 16:55:06'),
(112, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 16:55:43'),
(113, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 17:00:06'),
(114, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 17:00:31'),
(115, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 17:04:06'),
(116, 'Favoritou o post 7', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 17:09:10'),
(117, 'Favoritou o post 7', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 17:23:00'),
(118, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 17:36:03'),
(119, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 17:41:37'),
(120, 'Favoritou o post 7', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 17:50:18'),
(121, 'Removeu o post 3 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 18:04:51'),
(122, 'Removeu o post 2 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 18:06:15'),
(123, 'Favoritou o post 4', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 18:06:46'),
(124, 'Favoritou o post 2', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 18:07:04'),
(125, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '26-10-2020 22:58:43'),
(126, 'Favoritou o post 13', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 23:16:49'),
(127, 'Favoritou o post 8', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 23:29:12'),
(128, 'Removeu o post 8 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 23:29:44'),
(129, 'Favoritou o post 8', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 23:31:13'),
(130, 'Removeu o post 8 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 23:31:36'),
(131, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 23:34:38'),
(132, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 23:34:51'),
(133, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 23:34:51'),
(134, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '26-10-2020 23:39:00'),
(135, 'Favoritou o post 8', 'Favorite', 33, 'Delete', '00000000000', '26-10-2020 23:42:48'),
(136, 'Favoritou o post 11', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 00:12:41'),
(137, 'Removeu o post 11 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 00:12:52'),
(138, 'Favoritou o post 17', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 00:21:00'),
(139, 'Removeu o post 17 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 00:24:55'),
(140, 'Favoritou o post 4', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 00:26:18'),
(141, 'Favoritou o post 4', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 00:26:37'),
(142, 'Removeu o post 4 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 00:26:58'),
(143, 'Removeu o post 7 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 00:28:15'),
(144, 'Excluiu o post 12', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:56:36'),
(145, 'Excluiu o post 11', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:56:45'),
(146, 'Excluiu o post 15', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:56:54'),
(147, 'Excluiu o post 16', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:02'),
(148, 'Excluiu o post 17', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:09'),
(149, 'Excluiu o post 2', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:16'),
(150, 'Excluiu o post 3', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:23'),
(151, 'Excluiu o post 7', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:31'),
(152, 'Excluiu o post 4', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:36'),
(153, 'Excluiu o post 8', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:41'),
(154, 'Excluiu o post 13', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:47'),
(155, 'Excluiu o post 14', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 00:57:52'),
(156, 'Realizou uma postagem', 'post', 33, 'Delete', '00000000000', '27-10-2020 01:02:36'),
(157, 'Favoritou o post 18', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 01:02:59'),
(158, 'Removeu o post 18 dos favoritos', 'Favorite', 33, 'Delete', '00000000000', '27-10-2020 01:03:41'),
(159, 'Saiu do sistema', 'logout', 33, 'Delete', '00000000000', '27-10-2020 01:03:59'),
(160, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '27-10-2020 01:04:10'),
(161, 'Entrou no sistema', 'login', 32, 'Teste teste', '00000000000', '27-10-2020 11:41:06'),
(162, 'Entrou no sistema', 'login', 32, 'Teste teste', '00000000000', '27-10-2020 11:42:46'),
(163, 'Entrou no sistema', 'login', 32, 'Teste teste', '00000000000', '27-10-2020 11:44:16'),
(164, 'Favoritou o post 18', 'Favorite', 32, 'Teste teste', '00000000000', '27-10-2020 11:47:37'),
(165, 'Removeu o post 18 dos favoritos', 'Favorite', 32, 'Teste teste', '00000000000', '27-10-2020 11:48:00'),
(166, 'Saiu do sistema', 'logout', 32, 'Teste teste', '00000000000', '27-10-2020 12:27:55'),
(167, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '27-10-2020 12:28:03'),
(168, 'Saiu do sistema', 'logout', 33, 'Delete', '00000000000', '27-10-2020 12:33:47'),
(169, 'Entrou no sistema', 'login', 32, 'Teste teste', '00000000000', '27-10-2020 12:33:54'),
(170, 'Realizou uma postagem', 'post', 32, 'Teste teste', '00000000000', '27-10-2020 12:34:20'),
(171, 'Realizou uma postagem', 'post', 32, 'Teste teste', '00000000000', '27-10-2020 12:34:34'),
(172, 'Excluiu o post 19', 'Delete', 32, 'Teste teste', '00000000000', '27-10-2020 12:36:06'),
(173, 'Excluiu o post 20', 'Delete', 32, 'Teste teste', '00000000000', '27-10-2020 12:40:20'),
(174, 'Alterou seus dados pessoais', 'update', 32, 'Dmitri Ivanovich Mendelev', '00000000000', '27-10-2020 12:41:26'),
(175, 'Realizou uma postagem', 'post', 32, 'Dmitri Ivanovich Mendelev', '00000000000', '27-10-2020 12:42:24'),
(176, 'Realizou uma postagem', 'post', 32, 'Dmitri Ivanovich Mendelev', '00000000000', '27-10-2020 12:43:09'),
(177, 'Saiu do sistema', 'logout', 32, 'Teste teste', '00000000000', '27-10-2020 12:43:38'),
(178, 'Entrou no sistema', 'login', 33, 'Delete', '00000000000', '27-10-2020 12:43:47'),
(179, 'Excluiu o post 18', 'Delete', 33, 'Delete', '00000000000', '27-10-2020 12:43:53'),
(180, 'Alterou seus dados pessoais', 'update', 33, 'Arthur Schopenhauer', '00000000000', '27-10-2020 12:44:29'),
(181, 'Realizou uma postagem', 'post', 33, 'Arthur Schopenhauer', '00000000000', '27-10-2020 12:44:58'),
(182, 'Saiu do sistema', 'logout', 33, 'Delete', '00000000000', '27-10-2020 12:46:48'),
(183, 'Entrou no sistema', 'login', 33, 'Arthur Schopenhauer', '00000000000', '27-10-2020 12:46:58'),
(184, 'Entrou no sistema', 'login', 32, 'Dmitri Ivanovich Mendelev', '00000000000', '27-10-2020 13:05:21'),
(185, 'Saiu do sistema', 'logout', 33, 'Arthur Schopenhauer', '00000000000', '27-10-2020 17:35:14'),
(186, 'Entrou no sistema', 'login', 32, 'Dmitri Ivanovich Mendelev', '00000000000', '27-10-2020 17:35:26');

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
(5, 21, 'aaaa', 'danilo.png', '1', 'aaaaa', 'aaaaa', 'aaa'),
(6, 21, 'aaaaa', 'eugenio.png', '2', 'aaaaa', 'aaaa', ''),
(7, 21, 'aaaaaa', 'diogo.png', '3', 'aaaa', 'aaaa', 'aaa'),
(8, 21, 'aaaaa', 'pedro.png', '4', 'aaa', 'aaaa', 'aaa'),
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
(21, '32', '00000000000', 1, 'Dmitri Ivanovich Mendelev', 'Mogi Guaçu', 'SP', 'Cachorro com fraturas', 'Teste - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '19999990000', 'aaa@aaa.com', '@dhiogo_fer', 3, '27-10-2020 12:42:24', 'dog.jpg', 'eugenio.png'),
(22, '32', '00000000000', 1, 'Dmitri Ivanovich Mendelev', 'Santa Cruz do Sul', 'SC', 'Cachorros sem ração', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '19999990000', 'aaa@aaa.com', '@dhiogo_fer', 2, '27-10-2020 12:43:09', 'dog.jpg', 'eugenio.png'),
(23, '33', '00000000000', 1, 'Arthur Schopenhauer', 'Mogi Guaçu', 'SP', 'Doação de filhotes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '19991621576', 'delete@delete.com', '@dhiogo_fer', 1, '27-10-2020 12:44:58', 'dog.jpg', 'eugenio.png');

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
(1, 3, 'Diogo Ferreira', 'diogo.santos134@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '44324268886', '0', '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'danilo.png', 'banner2.jpg', 1, 1),
(2, 3, 'João Eugênio', 'joao.eugenio@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '00000000000', '0', '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'pedro.png', 'banner3.jpeg', 1, 1),
(3, 3, 'Pedro Ferreira', 'pedro.ferreira@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'diogo.png', 'banner3.jpeg', 1, 1),
(21, 1, 'User', 'sata@sata.com', '202cb962ac59075b964b07152d234b70', '44324268886', '19991621576', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner1.jpeg', 1, 1),
(32, 1, 'Dmitri Ivanovich Mendelev', 'aaa@aaa.com', '202cb962ac59075b964b07152d234b70', '00000000000', '19999990000', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner2.jpg', 1, 1),
(33, 1, 'Arthur Schopenhauer', 'delete@delete.com', '202cb962ac59075b964b07152d234b70', '00000000000', '19991621576', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'eugenio.png', 'banner3.jpeg', 1, 0),
(34, 2, 'Ong 1', 'ong1@ong1.com', '202cb962ac59075b964b07152d234b70', '00000000000', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(35, 2, 'ong 2', 'ong2@ong2.com', '202cb962ac59075b964b07152d234b70', '00000000000', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(36, 2, 'ong3', 'ong3@ong3.com', '202cb962ac59075b964b07152d234b70', '44324268886', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 1),
(37, 2, 'ong4', 'ong4@gmail.com', '202cb962ac59075b964b07152d234b70', '22222222222', NULL, '@dhiogo_fer', NULL, NULL, 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'avatar.png', 'banner1.jpeg', 1, 0),
(38, 2, 'ONG5', 'ong5@gmail.com', '202cb962ac59075b964b07152d234b70', '22222222222', NULL, NULL, NULL, NULL, NULL, NULL, 'Teste', 'avatar.png', 'banner1.jpeg', 1, 0);

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
  MODIFY `id_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT de tabela `notify`
--
ALTER TABLE `notify`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
