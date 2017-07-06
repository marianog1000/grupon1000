-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2016 at 07:24 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boot_pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

--DROP TABLE IF EXISTS `users`;
--CREATE TABLE IF NOT EXISTS `users` (
--  `id` int(11) NOT NULL AUTO_INCREMENT,
--  `first_name` varchar(50) DEFAULT NULL,
--  `last_name` varchar(50) DEFAULT NULL,
--  `email` varchar(50) DEFAULT NULL,
--  `contact` int(11) DEFAULT NULL,
--  PRIMARY KEY (`id`)
--) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `grn_historia_clinica`;
CREATE TABLE IF NOT EXISTS `grn_historia_clinica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `legajo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `ant_personales` text DEFAULT NULL,
  `ant_familiares` text DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `tratamiento` text DEFAULT NULL,
  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `grn_hc_consultas`;
CREATE TABLE IF NOT EXISTS `grn_hc_consultas` (
  `nro_consulta` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `especialidad` varchar(50) DEFAULT NULL, 
  `fecha` datetime DEFAULT NULL, 
  `motivo` text DEFAULT NULL,
  `enfermedad_actual` text DEFAULT NULL,
  `examen_fisico` text DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `tratamiento` text DEFAULT NULL,
  
  PRIMARY KEY (`nro_consulta`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;




--
-- Dumping data for table `users`
--

--INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `contact`) VALUES
--(21, 'parth', 'sharma', 'devsuneja1993@gmail.com', 2323232),
--(19, 'vijay', 'sharma', 'tarun.suneja29@gmail.com', 3434),
--(18, 'Ajay', 'Suneja', 'ajay.suneja2@gmail.com', 26361363);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
