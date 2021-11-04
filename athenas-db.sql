-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 04/11/2021 às 20:21
-- Versão do servidor: 5.6.13
-- Versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `athenas-db`
--
CREATE DATABASE IF NOT EXISTS `athenas-db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `athenas-db`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`codigo`, `nome`) VALUES
(1, 'Admin'),
(2, 'Gerente'),
(3, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
--

CREATE TABLE IF NOT EXISTS `pessoas` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `categoria_id` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Fazendo dump de dados para tabela `pessoas`
--

INSERT INTO `pessoas` (`codigo`, `nome`, `email`, `categoria_id`) VALUES
(1, 'Jorge da Silva Lima', 'jorge@terra.com.br', 3),
(2, 'Flavia Monteiro', 'flavia@globo.com', 2),
(3, 'Marcos Frota Ribeiro', 'ribeiro@gmail.com', 2),
(4, 'Raphael Souza Santos', 'rsantos@gmail.com', 1),
(5, 'Pedro Paulo Mota', 'ppmota@gmail.com', 1),
(6, 'Winder Carvalho da Silva', 'winder@hotmail.com', 3),
(7, 'Maria da Penha Albuquerque', 'mpa@hotmail.com', 3),
(8, 'Rafael Garcia Souza', 'rgsouza@hotmail.com', 3),
(9, 'Tabata Costa', 'tabata_costa@gmail.com', 2),
(10, 'Ronil Camarote', 'camarote@terra.com.br', 1),
(11, 'Joaquim Barbosa', 'barbosa@globo.com', 1),
(12, 'Eveline Maria Alcantra', 'ev_alcantra@gmail.com', 2),
(13, 'João Paulo Vieira', 'jpvieria@gmail.com', 1),
(14, 'Carla Zamborlini', 'zamborlini@terra.com.br', 3),
(15, 'Mateus Silva', 'mateuspedro2012@outlook.com', 3),
(16, 'José dos Santos Alves', 'jspereira@gmail.com', 2),
(17, 'Joaquim Pereira', 'joaquim.pereira10@gmail.com', 3),
(18, 'Daniela Andrade', 'daniandrade@gmail.com', 3),
(19, 'Rafael Pereira', 'rafa.pereira@hotmail.com', 1),
(20, 'Sandra Regina da Silva', 'sreginas@gmail.com', 1),
(21, 'Fábio de Lima Peixoto', 'fabiopeixotolima@hotmail.com', 2),
(23, 'Juliano Rocha', 'julianorocha54@hotmail.com', 1),
(24, 'Caio Maciel', 'caio.maciel@outlook.com', 1);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `pessoas`
--
ALTER TABLE `pessoas`
  ADD CONSTRAINT `pessoas_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`codigo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
