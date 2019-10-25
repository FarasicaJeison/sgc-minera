-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2019 a las 02:50:36
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgc_minera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `Cod_act` int(11) NOT NULL,
  `ide_usua` int(11) NOT NULL,
  `actividad` varchar(50) NOT NULL,
  `pago` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `desde` varchar(50) NOT NULL,
  `hasta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anticipos`
--

CREATE TABLE `anticipos` (
  `cod_anti` int(11) NOT NULL,
  `ide_usua` int(11) NOT NULL,
  `motivo_anti` varchar(50) NOT NULL,
  `precio_anti` int(11) NOT NULL,
  `fecha_anti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `cod_nom` int(11) NOT NULL,
  `ide_usua` int(11) NOT NULL,
  `cod_anti` int(11) NOT NULL,
  `fecha_nom` varchar(50) NOT NULL,
  `cod_act` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `desde` varchar(50) NOT NULL,
  `hasta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puertas`
--

CREATE TABLE `puertas` (
  `cod_puer` int(11) NOT NULL,
  `fecha_creacion` varchar(50) NOT NULL,
  `cod_act` int(11) NOT NULL,
  `precio_puer` int(11) NOT NULL,
  `tramo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte de carga`
--

CREATE TABLE `transporte de carga` (
  `cod_trans` int(11) NOT NULL,
  `ide_usua` int(11) NOT NULL,
  `cod_puer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ide_usua` int(11) NOT NULL,
  `nomb_usua` varchar(20) NOT NULL,
  `ape_usua` varchar(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL,
  `tel_familiar` int(11) NOT NULL,
  `nom_familiar` varchar(40) NOT NULL,
  `riesgos` varchar(30) NOT NULL,
  `eps` varchar(20) NOT NULL,
  `pension` varchar(20) NOT NULL,
  `rh` varchar(10) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`Cod_act`),
  ADD KEY `ide_usua` (`ide_usua`);

--
-- Indices de la tabla `anticipos`
--
ALTER TABLE `anticipos`
  ADD PRIMARY KEY (`cod_anti`),
  ADD KEY `ide_usua` (`ide_usua`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`cod_nom`),
  ADD KEY `ide_usua` (`ide_usua`),
  ADD KEY `cod_act` (`cod_act`),
  ADD KEY `cod_anti` (`cod_anti`);

--
-- Indices de la tabla `puertas`
--
ALTER TABLE `puertas`
  ADD PRIMARY KEY (`cod_puer`),
  ADD KEY `cod_act` (`cod_act`);

--
-- Indices de la tabla `transporte de carga`
--
ALTER TABLE `transporte de carga`
  ADD PRIMARY KEY (`cod_trans`),
  ADD KEY `cod_puer` (`cod_puer`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ide_usua`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `Cod_act` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `cod_nom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puertas`
--
ALTER TABLE `puertas`
  MODIFY `cod_puer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transporte de carga`
--
ALTER TABLE `transporte de carga`
  MODIFY `cod_trans` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ide_usua` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`ide_usua`) REFERENCES `usuario` (`ide_usua`);

--
-- Filtros para la tabla `anticipos`
--
ALTER TABLE `anticipos`
  ADD CONSTRAINT `anticipos_ibfk_1` FOREIGN KEY (`cod_anti`) REFERENCES `usuario` (`ide_usua`);

--
-- Filtros para la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD CONSTRAINT `nomina_ibfk_1` FOREIGN KEY (`ide_usua`) REFERENCES `usuario` (`ide_usua`),
  ADD CONSTRAINT `nomina_ibfk_2` FOREIGN KEY (`cod_act`) REFERENCES `actividades` (`Cod_act`),
  ADD CONSTRAINT `nomina_ibfk_3` FOREIGN KEY (`cod_anti`) REFERENCES `anticipos` (`cod_anti`);

--
-- Filtros para la tabla `puertas`
--
ALTER TABLE `puertas`
  ADD CONSTRAINT `puertas_ibfk_1` FOREIGN KEY (`cod_puer`) REFERENCES `transporte de carga` (`cod_puer`),
  ADD CONSTRAINT `puertas_ibfk_2` FOREIGN KEY (`cod_act`) REFERENCES `actividades` (`Cod_act`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
