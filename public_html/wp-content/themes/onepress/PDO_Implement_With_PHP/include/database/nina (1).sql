-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2017 a las 00:45:03
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grn_hc_consultas`
--

CREATE TABLE `grn_consultas` (
  `nro_consulta` int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `id` int(11) NOT NULL,
  `especialidad` varchar(50) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `motivo_consulta` text,
  `enfermedad_actual` text,
  `examen_fisico` text,
  `diagnostico` text,
  `tratamiento` text,
  `usuario` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

CREATE TABLE `grn_hc_especialidades` (
  `nro_consulta` int(11) NOT NULL  PRIMARY KEY,
  `especialidad` varchar(50) DEFAULT NULL,  
) ENGINE=MyISAM DEFAULT CHARSET=latin1;










CREATE TABLE `grn_historico_consultas` (

  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `fecha_accion` datetime DEFAULT NULL,  
  `accion` varchar(50) NOT NULL,

  `nro_consulta_ant` int(11) NOT NULL,
  `nro_consulta_new` int(11) NOT NULL,

  `id_con_ant` int(11) NOT NULL,
  `id_con_new` int(11) NOT NULL,

  `usuario_ant` varchar(50) NOT NULL,
  `usuario_new` varchar(50) NOT NULL,

  `especialidad_ant` varchar(50) DEFAULT NULL,
  `especialidad_new` varchar(50) DEFAULT NULL,

  `fecha_ant` datetime DEFAULT NULL,
  `fecha_new` datetime DEFAULT NULL,

  `motivo_consulta_ant` text,
  `motivo_consulta_new` text,

  `enfermedad_actual_ant` text,
  `enfermedad_actual_new` text,

  `examen_fisico_ant` text,
  `examen_fisico_new` text,

  `diagnostico_ant` text,
  `diagnostico_new` text,

  `tratamiento_ant` text,
  `tratamiento_new` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



--
-- Estructura de tabla para la tabla `grn_historia_clinica`
--

CREATE TABLE `grn_hc_pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `fecha_nac` datetime DEFAULT NULL,
  `lugar_nac` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(30) DEFAULT NULL,
  `ocupacion` varchar(30) DEFAULT NULL,
  `grupo_sanguineo` varchar(10) DEFAULT NULL,
  `escolaridad` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ant_personales` text,
  `ant_familiares` text,
  `alergias` text,
  `usuario` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--


CREATE TABLE `grn_historico_hist_clinica` (
  `id` int(11) NOT NULL AUTO_INCREMENT  PRIMARY KEY,
  `fecha_accion` datetime DEFAULT NULL,  
  `accion` varchar(50) NOT NULL,

  `usuario_ant` varchar(50) NOT NULL,
  `usuario_new` varchar(50) NOT NULL,
  
  `id_hc_ant` int DEFAULT NULL,
  `id_hc_new` int DEFAULT NULL,
    
  `nombre_ant` varchar(50) DEFAULT NULL,
  `nombre_new` varchar(50) DEFAULT NULL,
  
  `apellido_ant` varchar(50) DEFAULT NULL,
  `apellido_new` varchar(50) DEFAULT NULL, 
  
  `dni_ant` varchar(20) DEFAULT NULL,
  `dni_new` varchar(20) DEFAULT NULL,
  
  `telefono_ant` varchar(20) DEFAULT NULL,
  `telefono_new` varchar(20) DEFAULT NULL,
  
  `fecha_ant` datetime DEFAULT NULL,
  `fecha_new` datetime DEFAULT NULL,
  
  `direccion_ant` varchar(50) DEFAULT NULL,
  `direccion_new` varchar(50) DEFAULT NULL,
  
  `ciudad_ant` varchar(50) DEFAULT NULL,
  `ciudad_new` varchar(50) DEFAULT NULL,
  
  `fecha_nac_ant` datetime DEFAULT NULL,
  `fecha_nac_new` datetime DEFAULT NULL,
  
  `lugar_nac_ant` varchar(50) DEFAULT NULL,
  `lugar_nac_new` varchar(50) DEFAULT NULL,
  
  `estado_civil_ant` varchar(30) DEFAULT NULL,
  `estado_civil_new` varchar(30) DEFAULT NULL,
  
  `ocupacion_ant` varchar(30) DEFAULT NULL,
  `ocupacion_new` varchar(30) DEFAULT NULL,
  
  `grupo_sanguineo_ant` varchar(10) DEFAULT NULL,
  `grupo_sanguineo_new` varchar(10) DEFAULT NULL,
  
  `escolaridad_ant` varchar(30) DEFAULT NULL,
  `escolaridad_new` varchar(30) DEFAULT NULL,
  
  `email_ant` varchar(50) DEFAULT NULL,
  `email_new` varchar(50) DEFAULT NULL,
  
  `ant_personales_ant` text,
  `ant_personales_new` text,
  
  `ant_familiares_ant` text,
  `ant_familiares_new` text,
  
  `alergias_ant` text,
  `alergias_new` text
  
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

