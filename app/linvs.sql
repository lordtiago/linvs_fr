-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2013 at 07:05 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `linvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `parishes`
--

CREATE TABLE `parishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `parishes`
--

INSERT INTO `parishes` (`id`, `name`) VALUES
(1, 'Senhor Bom Jesus');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
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

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `birth`, `cpf`, `rg`, `street`, `number`, `district`, `cep`, `city`, `uf`, `country`, `father_id`, `father2_id`, `spouse_id`, `tel`, `cel`, `cel2`, `email`, `parish_id`) VALUES
(1, 'SERGIO BENEDITO ALVES RAFAEL', '1953-10-06', '', '', 'Rua Alcina Monteiro da Silva', ' Nº 70', 'Itagaçaba', '12.730-400', 'Cruzeiro', 'SP', 'Brasil', NULL, NULL, 2, '(0xx12)3143-3011', '', '', '', 1),
(2, 'ADENILCE DA ROCHA ALVES RAFAEL', '1957-11-29', '', '', 'Rua Alcina Monteiro da Silva', ' Nº 70', 'Itagaçaba', '12.730-400', 'Cruzeiro', 'SP', 'Brasil', NULL, NULL, 1, '(0xx12)3143-3011', '(0xx12)9149-8432', '', '', 1),
(3, 'TIAGO ALVES RAFAEL', '1987-11-28', '363.696.138-19', '42.788.574-7', 'Rua Alcina Monteiro da Silva', ' Nº 70', 'Itagaçaba', '12.730-400', 'Cruzeiro', 'SP', 'Brasil', 1, 2, NULL, '(0xx12)3143-3011', '(0xx12)98230-8736', '', 'pro.tiagorafaell@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tithes`
--

CREATE TABLE `tithes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` decimal(7,2) NOT NULL,
  `month` tinyint(4) NOT NULL,
  `year` smallint(6) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `person` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `parish` FOREIGN KEY (`parish_id`) REFERENCES `parishes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tithes`
--
ALTER TABLE `tithes`
  ADD CONSTRAINT `people` FOREIGN KEY (`person_id`) REFERENCES `people` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
