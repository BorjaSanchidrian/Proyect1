-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2013 a las 15:46:18
-- Versión del servidor: 5.6.11
-- Versión de PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyect1_db`
--
CREATE DATABASE IF NOT EXISTS `proyect1_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `proyect1_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navbar_config`
--

CREATE TABLE IF NOT EXISTS `navbar_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `button_name` varchar(255) NOT NULL,
  `button_href` varchar(255) NOT NULL DEFAULT '#',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `navbar_config`
--

INSERT INTO `navbar_config` (`id`, `button_name`, `button_href`, `active`) VALUES
(1, 'Inicio', 'index.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portadas_historias`
--

CREATE TABLE IF NOT EXISTS `portadas_historias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `history_name` varchar(255) NOT NULL,
  `history_photo` varchar(255) NOT NULL,
  `history_description` text NOT NULL,
  `votos` int(1) NOT NULL DEFAULT '0',
  `upload_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `portadas_historias`
--

INSERT INTO `portadas_historias` (`id`, `history_name`, `history_photo`, `history_description`, `votos`, `upload_date`, `active`) VALUES
(1, 'testHistory', 'css/images/foto3.jpg', 'testDescription', 3, '2013-11-21', 1),
(2, 'as', 'sa', 'sa', 0, '2013-11-19', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider_config`
--

CREATE TABLE IF NOT EXISTS `slider_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_name` varchar(255) NOT NULL,
  `photo_description` varchar(255) NOT NULL,
  `photo_location` varchar(255) NOT NULL DEFAULT '#',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `slider_config`
--

INSERT INTO `slider_config` (`id`, `photo_name`, `photo_description`, `photo_location`, `active`) VALUES
(1, 'nameTest', 'descriptionTest', 'css/images/foto1.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` date NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha_registro`, `banned`) VALUES
(1, 'Admin', '', 'admin@admin.com', 'caca', '2013-11-21', 0),
(2, 'Borja', 'Sanchidrián', 'b.sanchidrianmonge@gmail.com', '9fee0e188b420effd5045b59003a2439', '2013-11-21', 0),
(3, 'b', 'b', 'borja2@borja.com', '9fee0e188b420effd5045b59003a2439', '2013-11-21', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
