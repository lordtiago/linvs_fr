-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 12/02/2014 às 17:47
-- Versão do servidor: 5.5.35-0ubuntu0.13.10.2
-- Versão do PHP: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `linvs`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `parishes`
--

CREATE TABLE IF NOT EXISTS `parishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `birth` date DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `number` varchar(15) DEFAULT NULL,
  `district` varchar(25) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `father_id` int(11) DEFAULT NULL,
  `father2_id` int(11) DEFAULT NULL,
  `spouse_id` int(11) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `cel` varchar(20) DEFAULT NULL,
  `cel2` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `parish_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parish` (`parish_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tithes`
--

CREATE TABLE IF NOT EXISTS `tithes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(7,2) NOT NULL,
  `month_ref` tinyint(4) DEFAULT NULL,
  `month` tinyint(4) NOT NULL,
  `year` smallint(6) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person` (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `parish` FOREIGN KEY (`parish_id`) REFERENCES `parishes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `tithes`
--
ALTER TABLE `tithes`
  ADD CONSTRAINT `people` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
