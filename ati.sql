-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2013 a las 20:42:47
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ati`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_vehiculo`
--

CREATE TABLE IF NOT EXISTS `clase_vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clase_vehiculo`
--

INSERT INTO `clase_vehiculo` (`id`, `nombre`) VALUES
(1, 'coupe'),
(2, 'sedan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `cedula` varchar(300) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `apellido` varchar(300) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE IF NOT EXISTS `tipo_vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`id`, `nombre`) VALUES
(1, 'carro'),
(2, 'camioneta'),
(3, 'camion'),
(4, 'autobus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uso_vehiculo`
--

CREATE TABLE IF NOT EXISTS `uso_vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `uso_vehiculo`
--

INSERT INTO `uso_vehiculo` (`id`, `nombre`) VALUES
(1, 'particular'),
(2, 'comercial'),
(3, 'publico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE IF NOT EXISTS `vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(500) NOT NULL,
  `marca` varchar(500) NOT NULL,
  `modelo` varchar(500) NOT NULL,
  `serial_carroceria` varchar(200) NOT NULL,
  `serial_motor` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `costo` double NOT NULL,
  `tipo_vehiculo_id` int(11) NOT NULL,
  `uso_vehiculo_id` int(11) NOT NULL,
  `clase_vehiculo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_vehiculo_id` (`tipo_vehiculo_id`),
  KEY `uso_vehiculo_id` (`uso_vehiculo_id`),
  KEY `clase_vehiculo_id` (`clase_vehiculo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `placa`, `marca`, `modelo`, `serial_carroceria`, `serial_motor`, `color`, `costo`, `tipo_vehiculo_id`, `uso_vehiculo_id`, `clase_vehiculo_id`) VALUES
(7, 'placa', 'ferrari', 'ferari', '4545456454', '45454564512', 'rojo', 2000000000, 1, 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_3` FOREIGN KEY (`clase_vehiculo_id`) REFERENCES `clase_vehiculo` (`id`),
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`tipo_vehiculo_id`) REFERENCES `tipo_vehiculo` (`id`),
  ADD CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`uso_vehiculo_id`) REFERENCES `uso_vehiculo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
