-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2022 a las 12:19:11
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gnius`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE `asesor` (
  `id_asesor` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `clave` varchar(150) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `foto` mediumblob DEFAULT NULL,
  `tipo_foto` varchar(100) DEFAULT NULL,
  `nombre_foto` varchar(100) DEFAULT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Activo',
  `hash_` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`id_asesor`, `nombre`, `correo`, `clave`, `telefono`, `direccion`, `foto`, `tipo_foto`, `nombre_foto`, `estado`, `hash_`) VALUES
(1, 'Manuel Luis Limón De Montaña', 'sistema.gnius2022@gmail.com', 'UWgrSVhQSytsK3lNN2gzUWthV1RCQT09', '2235-5555', 'San Salvador', NULL, NULL, NULL, 'Activo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `id_emprendedor` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `titulo` varchar(30) NOT NULL DEFAULT 'Reunión',
  `fecha` datetime NOT NULL,
  `color` varchar(20) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `id_emprendedor` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `respuesta` varchar(500) DEFAULT NULL,
  `estado` varchar(25) NOT NULL DEFAULT 'Visible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_emprendedor`
--

CREATE TABLE `datos_emprendedor` (
  `id_datoEmprendedor` int(11) NOT NULL,
  `id_formulario` int(11) NOT NULL,
  `id_emprendedor` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `nombre_emprendedor` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Visible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emprendedor`
--

CREATE TABLE `emprendedor` (
  `id_emprendedor` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'Inactivo',
  `hash_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresas` int(11) NOT NULL,
  `id_emprendedor` int(11) NOT NULL,
  `id_formulario` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `nombre_empresa` varchar(500) NOT NULL,
  `rubro` varchar(200) NOT NULL,
  `estado` varchar(25) NOT NULL DEFAULT 'Visible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id_formulario` int(11) NOT NULL,
  `id_emprendedor` int(11) NOT NULL,
  `id_asesor` int(11) NOT NULL,
  `nombre_empresa` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo_empresa` varchar(100) NOT NULL,
  `rubro` varchar(100) NOT NULL,
  `vinculo_utec` varchar(200) NOT NULL,
  `descripcion_emprendimiento` varchar(500) NOT NULL,
  `perfil_investigacion` varchar(1000) NOT NULL,
  `titulo_investigacion` varchar(100) NOT NULL,
  `planteamiento_problema` varchar(1500) NOT NULL,
  `antecedentes` varchar(1500) NOT NULL,
  `delimitacion` varchar(1500) NOT NULL,
  `justificacion` varchar(1500) NOT NULL,
  `objetivos` varchar(1000) NOT NULL,
  `metodologia` varchar(1000) NOT NULL,
  `cronograma` varchar(1500) NOT NULL,
  `dato_emprendedor` varchar(700) NOT NULL,
  `apoyo` varchar(300) NOT NULL,
  `estado` varchar(25) NOT NULL DEFAULT 'Visible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`id_asesor`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `fk_7` (`id_emprendedor`),
  ADD KEY `fk_8` (`id_asesor`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `fk_1` (`id_emprendedor`),
  ADD KEY `fk_2` (`id_asesor`);

--
-- Indices de la tabla `datos_emprendedor`
--
ALTER TABLE `datos_emprendedor`
  ADD PRIMARY KEY (`id_datoEmprendedor`),
  ADD KEY `fk_6` (`id_formulario`),
  ADD KEY `fk_12` (`id_asesor`),
  ADD KEY `fk_13` (`id_emprendedor`);

--
-- Indices de la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  ADD PRIMARY KEY (`id_emprendedor`),
  ADD KEY `fk_9` (`id_asesor`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresas`),
  ADD KEY `fk_4` (`id_emprendedor`),
  ADD KEY `fk_5` (`id_formulario`),
  ADD KEY `fk_11` (`id_asesor`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id_formulario`),
  ADD KEY `fk_3` (`id_emprendedor`),
  ADD KEY `fk_10` (`id_asesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id_asesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_emprendedor`
--
ALTER TABLE `datos_emprendedor`
  MODIFY `id_datoEmprendedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  MODIFY `id_emprendedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id_formulario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_7` FOREIGN KEY (`id_emprendedor`) REFERENCES `emprendedor` (`id_emprendedor`),
  ADD CONSTRAINT `fk_8` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`);

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`id_emprendedor`) REFERENCES `emprendedor` (`id_emprendedor`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`);

--
-- Filtros para la tabla `datos_emprendedor`
--
ALTER TABLE `datos_emprendedor`
  ADD CONSTRAINT `fk_12` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`),
  ADD CONSTRAINT `fk_13` FOREIGN KEY (`id_emprendedor`) REFERENCES `emprendedor` (`id_emprendedor`),
  ADD CONSTRAINT `fk_6` FOREIGN KEY (`id_formulario`) REFERENCES `formulario` (`id_formulario`);

--
-- Filtros para la tabla `emprendedor`
--
ALTER TABLE `emprendedor`
  ADD CONSTRAINT `fk_9` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`);

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `fk_11` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`),
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`id_emprendedor`) REFERENCES `emprendedor` (`id_emprendedor`),
  ADD CONSTRAINT `fk_5` FOREIGN KEY (`id_formulario`) REFERENCES `formulario` (`id_formulario`);

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `fk_10` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`),
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`id_emprendedor`) REFERENCES `emprendedor` (`id_emprendedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
