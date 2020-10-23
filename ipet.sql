-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 24/10/2020 às 00:58
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
(20, 'Entrou no sistema', 'login', 21, 'Sata Sata', '44324268886', '23-10-2020 19:56:40');

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
(1, 3, 'Diogo Ferreira', 'diogo.santos134@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '44324268886', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(2, 1, 'João Eugênio', 'joao.eugenio@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(3, 0, 'Pedro Ferreira', 'pedro.ferreira@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(4, 1, 'Danilo Santana', 'danilo.santana@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(5, 2, 'Henrique Anselmo', 'henrique.anselmo@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(6, 1, 'João Cadoni', 'joao.cadoni@etec.sp.gov', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(7, 1, 'Pedro Amalfi', 'pedro.amalfi@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(8, 2, 'Barbosa', 'barbosa@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(9, 2, 'Barbosa2', 'barbosa2@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(10, 2, 'Barbosa3', 'barbosa3@etec.sp.gov.br', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(11, 2, 'Teste teste', 'aaa@aaa.com', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(12, 3, 'aaa', 'adm@adm.com', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(13, 1, 'POCs da noite', 'njoao6016@gmail.com', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(14, 1, 'João Eugênio', 'bbb@bbb.com', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(15, 1, 'Teste teste', 'eee@eee.com', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(16, 1, 'Diogo Ferreira', 'ccc@ccc.com', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(17, 1, 'vvv', 'vvv@vvv.com', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(18, 1, 'Teste teste', 'diogo1936@hotmail.com', '202cb962ac59075b964b07152d234b70', '44324268886', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(19, 1, 'aaa', 'fim@fim.com', '202cb962ac59075b964b07152d234b70', '00000000000', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(20, 1, 'aaa', 'aaa@aaa.nnn', '74b87337454200d4d33f80c4663dc5e5', '11111', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0),
(21, 1, 'Sata Sata', 'sata@sata.com', '202cb962ac59075b964b07152d234b70', '44324268886', '19991621576', '@dhiogo_fer', 'Rua Nair de Oliveira Moreno, 78', 'Jardim Veneza', 'Mogi Guaçu', 'SP', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'diogo.png', 'banner2.jpg', 1, 0),
(23, 1, 'new', 'new@new.com', '202cb962ac59075b964b07152d234b70', '44324268886', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'avatar.png', 'banner1.jpeg', 1, 1),
(27, 1, 'Teste teste', '999@999.com', '202cb962ac59075b964b07152d234b70', '22222222222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'avatar.png', 'banner1.jpeg', 1, 1),
(29, 1, 'yyy', 'yyy@gmail.com', '202cb962ac59075b964b07152d234b70', '44324268886', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'avatar.png', 'banner1.jpeg', 1, 1),
(31, 1, 'Zeta Bot', 'zeta@gmail.com', '202cb962ac59075b964b07152d234b70', '44324268886', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'avatar.png', 'banner1.jpeg', 1, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
