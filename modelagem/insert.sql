-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Fev-2019 às 19:05
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
-- Database: `jogo`
--
CREATE DATABASE IF NOT EXISTS `jogo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jogo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `monstro`
--

CREATE TABLE `monstro` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `hp` int(11) DEFAULT NULL,
  `ataque` int(11) DEFAULT NULL,
  `defesa` int(11) DEFAULT NULL,
  `agilidade` int(11) DEFAULT NULL,
  `sorte` int(11) DEFAULT NULL,
  `imagem` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `monstro`
--

INSERT INTO `monstro` (`id`, `nome`, `hp`, `ataque`, `defesa`, `agilidade`, `sorte`, `imagem`) VALUES
(1, 'Mazzoni', 50, 90, 80, 50, 30, '3.png'),
(2, 'Brum', 90, 50, 80, 40, 55, '10.png'),
(3, 'Chimanski', 100, 70, 100, 56, 60, '6.png'),
(4, 'Guinger', 100, 70, 100, 80, 30, '4.png'),
(5, 'Mattinhos', 40, 70, 10, 80, 90, '1.png'),
(6, 'West Pal', 60, 70, 80, 80, 60, '8.png'),
(7, 'Sd. Prestes', 50, 50, 50, 50, 0, '7.png'),
(8, 'Uszaki', 10, 10, 10, 10, 60, '9.png'),
(9, 'Freitista', 80, 80, 80, 80, 80, '5.png'),
(10, 'JungÃ£o', 1000, 100, 100, 100, 50, '2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monstro`
--
ALTER TABLE `monstro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monstro`
--
ALTER TABLE `monstro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
