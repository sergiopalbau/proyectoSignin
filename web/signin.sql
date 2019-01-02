-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-01-2019 a las 07:06:32
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `signin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id_acceso` int(10) NOT NULL,
  `id_rol3` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_explotacion3` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='acceso a la web';

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id_acceso`, `id_rol3`, `nombre`, `password`, `email`, `telefono`, `id_explotacion3`) VALUES
(1, 2, 'Sergio Palomo Bautista', '1234', 'spalomo@aquona-sa.es', '675865408', '304SAR'),
(2, 0, 'Ruben Prieto G', '4321', 'rprietol@aquona-sa.es', '987213927', '304SAR'),
(3, 1, 'Jose Antonio Fidalgo', '1234', 'jfidalgo@gmail.com', '666777888', '304SAR'),
(26, 1, 'Perico de los Palotes', '333', 'palotes@gamil.com', '987213234', '000MAD'),
(27, 2, 'sar', '1234', 'nohat@nohay.es', '987221238', '304SAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `explotacion`
--

CREATE TABLE `explotacion` (
  `id_explotacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `explotacion`
--

INSERT INTO `explotacion` (`id_explotacion`, `municipio`) VALUES
('000MAD', 'Madrid'),
('304SAR', 'San Andres del Rabanedo'),
('305VQL', 'Villaquilambre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacion`
--

CREATE TABLE `instalacion` (
  `id_instalacion` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_explotacion2` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `instalacion`
--

INSERT INTO `instalacion` (`id_instalacion`, `nombre`, `id_explotacion2`) VALUES
(1, 'Dp Trobajo del Camino', '304SAR'),
(5, 'Dp Villabalter', '304SAR'),
(7, 'dp San juan de Dios', '304SAR'),
(8, 'deposito b', '305VQL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(10) NOT NULL,
  `id_explotacion3` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_instalacion2` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time DEFAULT NULL,
  `nombre_visita` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dni_visita` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `observaciones` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `firma` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `condiciones` tinyint(1) DEFAULT NULL,
  `prl` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `id_explotacion3`, `id_instalacion2`, `fecha`, `hora_inicio`, `hora_fin`, `nombre_visita`, `dni_visita`, `id_usuario`, `observaciones`, `firma`, `condiciones`, `prl`) VALUES
(1, '304SAR', 1, '2018-12-31', '00:00:00', '01:00:00', 'perico gonzalez', '12345678x', 1, 'visita comercial', 'pa30a91sad\'01923\'0', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='roles usuarios';

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(0, 'superAdministrador'),
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(5) NOT NULL,
  `id_explotacion2` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_explotacion2`, `nombre`) VALUES
(1, '305VQL', 'Sergio Palomo Bautista '),
(2, '304SAR', 'goyo perez'),
(3, '304SAR', 'jose Alfredo'),
(4, '304SAR', 'ivan vicente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id_acceso`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_rol3` (`id_rol3`),
  ADD KEY `id_explotacion3` (`id_explotacion3`);

--
-- Indices de la tabla `explotacion`
--
ALTER TABLE `explotacion`
  ADD PRIMARY KEY (`id_explotacion`);

--
-- Indices de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  ADD PRIMARY KEY (`id_instalacion`),
  ADD KEY `id_explotacion2` (`id_explotacion2`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_explotacion3` (`id_explotacion3`),
  ADD KEY `id_instalacion2` (`id_instalacion2`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_explotacion2` (`id_explotacion2`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_acceso` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `instalacion`
--
ALTER TABLE `instalacion`
  MODIFY `id_instalacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`id_explotacion3`) REFERENCES `explotacion` (`id_explotacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acceso_ibfk_2` FOREIGN KEY (`id_rol3`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_instalacion2`) REFERENCES `instalacion` (`id_instalacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`id_explotacion3`) REFERENCES `explotacion` (`id_explotacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_explotacion2`) REFERENCES `explotacion` (`id_explotacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
