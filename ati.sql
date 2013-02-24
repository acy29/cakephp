-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2013 a las 22:48:26
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
-- Estructura de tabla para la tabla `clasevehiculos`
--

CREATE TABLE IF NOT EXISTS `clasevehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clasevehiculos`
--

INSERT INTO `clasevehiculos` (`id`, `nombre`) VALUES
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

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`cedula`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
('19965431', 'yy', 'cruz', 'la candelariayyy', '0212-5731818');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `polizas`
--

CREATE TABLE IF NOT EXISTS `polizas` (
  `numero` int(11) NOT NULL,
  `monto` double NOT NULL,
  `prima` double NOT NULL,
  `tipo_poliza_id` int(11) NOT NULL,
  `fecha_emision` varchar(200) NOT NULL,
  `fecha_vigencia_inicio` varchar(200) NOT NULL,
  `fecha_vigencia_fin` varchar(200) NOT NULL,
  `persona_id` varchar(200) NOT NULL,
  `vehiculo_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `polizas`
--

INSERT INTO `polizas` (`numero`, `monto`, `prima`, `tipo_poliza_id`, `fecha_emision`, `fecha_vigencia_inicio`, `fecha_vigencia_fin`, `persona_id`, `vehiculo_id`, `id`) VALUES
(5000, 500, 500, 1, '6', 'ddd', 'dddy', '19965431', 19, 1),
(1, 2, 3, 1, '', '4', '6', '19965431', 7, 3),
(1, 2, 3, 1, '', '4', '6', '19965431', 7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopolizas`
--

CREATE TABLE IF NOT EXISTS `tipopolizas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipopolizas`
--

INSERT INTO `tipopolizas` (`id`, `nombre`) VALUES
(1, 'hcm'),
(2, 'vehicular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculos`
--

CREATE TABLE IF NOT EXISTS `tipovehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipovehiculos`
--

INSERT INTO `tipovehiculos` (`id`, `nombre`) VALUES
(1, 'carro'),
(2, 'camioneta'),
(3, 'camion'),
(4, 'autobus');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usovehiculos`
--

CREATE TABLE IF NOT EXISTS `usovehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usovehiculos`
--

INSERT INTO `usovehiculos` (`id`, `nombre`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `placa`, `marca`, `modelo`, `serial_carroceria`, `serial_motor`, `color`, `costo`, `tipo_vehiculo_id`, `uso_vehiculo_id`, `clase_vehiculo_id`) VALUES
(7, 'placa', 'ferrari', 'ferari', '4545456454', '45454564512', 'rojo', 2000000000, 1, 1, 1),
(19, 'ttt', 'ttt', 'ttt', 'ttt', 'ttt', 'ttt', 447, 1, 1, 1),
(20, 'ttt', 'ttt', 'ttt', 'ttt', 'ttt', 'ttt', 447, 3, 2, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`tipo_vehiculo_id`) REFERENCES `tipovehiculos` (`id`),
  ADD CONSTRAINT `vehiculos_ibfk_2` FOREIGN KEY (`uso_vehiculo_id`) REFERENCES `usovehiculos` (`id`),
  ADD CONSTRAINT `vehiculos_ibfk_3` FOREIGN KEY (`clase_vehiculo_id`) REFERENCES `clasevehiculos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
