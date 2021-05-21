-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2020 a las 18:17:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_contaduria_2020`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliacion_arl`
--

CREATE TABLE `afiliacion_arl` (
  `id` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `tipo_trabajo_grado` varchar(15) DEFAULT NULL,
  `id_practicas` int(10) DEFAULT NULL,
  `eps_ars` varchar(23) NOT NULL,
  `createAt` timestamp NULL DEFAULT current_timestamp(),
  `recibido` int(11) DEFAULT NULL,
  `fecha_recibido` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `afiliacion_arl`
--

INSERT INTO `afiliacion_arl` (`id`, `id_estudiante`, `tipo_trabajo_grado`, `id_practicas`, `eps_ars`, `createAt`, `recibido`, `fecha_recibido`) VALUES
(72, 154, 'PASANTIA', NULL, 'COOMEVA', '2020-02-28 16:43:07', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE `convenio` (
  `id` int(10) NOT NULL,
  `id_estudiante` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `tipo_trabajo_grado` varchar(15) DEFAULT NULL,
  `id_practicas` int(10) DEFAULT NULL,
  `recibido` varchar(11) DEFAULT NULL,
  `fecha_recibido` date DEFAULT NULL,
  `createAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `convenio`
--

INSERT INTO `convenio` (`id`, `id_estudiante`, `id_empresa`, `tipo_trabajo_grado`, `id_practicas`, `recibido`, `fecha_recibido`, `createAt`) VALUES
(21, 153, 22, 'INVESTIGACION', NULL, NULL, NULL, '2020-02-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `nit` varchar(23) NOT NULL,
  `email` varchar(23) NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `direccion` varchar(23) NOT NULL,
  `r_legal_nombres` varchar(23) NOT NULL,
  `r_legal_apellidos` varchar(23) NOT NULL,
  `r_legal_identificacion` int(10) NOT NULL,
  `r_legal_lugar_exp_id` varchar(23) NOT NULL,
  `superv_nombres` varchar(23) NOT NULL,
  `superv_apellidos` varchar(23) NOT NULL,
  `superv_identificacion` int(10) NOT NULL,
  `superv_lugar_exp_id` varchar(23) NOT NULL,
  `supervisor_cargo` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `nit`, `email`, `telefono`, `direccion`, `r_legal_nombres`, `r_legal_apellidos`, `r_legal_identificacion`, `r_legal_lugar_exp_id`, `superv_nombres`, `superv_apellidos`, `superv_identificacion`, `superv_lugar_exp_id`, `supervisor_cargo`) VALUES
(22, 'CENS', '80.245.142-3', 'CENSNORTEDES@GMAIL.COM', '58444444', 'CALLE 16 N° 22-12 SEVIL', 'ANA KARINA', 'SANDOVAL ARANGO', 60308966, 'LOS PATIOS', 'ELKIN ALBERTO', 'ZAPATA RODRIGUEZ', 64121005, 'BOGOTA', 'GERENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(10) NOT NULL,
  `p_nombre` varchar(10) NOT NULL,
  `s_nombre` varchar(10) NOT NULL,
  `p_apellido` varchar(10) NOT NULL,
  `s_apellido` varchar(10) NOT NULL,
  `codigo` int(7) NOT NULL,
  `tipo_Identificacion` varchar(5) NOT NULL,
  `identificacion` int(10) NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `semestre` int(2) NOT NULL,
  `dpto` varchar(23) NOT NULL,
  `ciudad` varchar(23) NOT NULL,
  `email` varchar(23) NOT NULL,
  `telf_fijo` varchar(14) NOT NULL,
  `telf_movil` varchar(14) NOT NULL,
  `direccion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `codigo`, `tipo_Identificacion`, `identificacion`, `fecha_expedicion`, `genero`, `fecha_nacimiento`, `semestre`, `dpto`, `ciudad`, `email`, `telf_fijo`, `telf_movil`, `direccion`) VALUES
(153, 'YEISON', 'DAVID ', 'CORDOBA', 'CASTELLANO', 1151509, 'C.C', 1094587123, '2015-06-10', 'M', '2020-02-03', 2, 'NORTE DE SANTANDER', 'CUCUTA', 'YEIISON@OUTLOOK.COM', '58479612', '315412345', 'CALLE 14, BELEN'),
(154, 'CAMILA', 'ANDREA', 'OSORIO', 'CASTELLANO', 1191546, 'C.C', 60308, '2019-05-14', 'F', '2020-02-19', 8, 'NORTE DE SANTANDER', 'CUCUTA', 'CAMIOSO@GMAIL.COM', '5846633', '316745219', 'AV 5 N° 14-19, SEVILLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicas`
--

CREATE TABLE `practicas` (
  `id` int(10) NOT NULL,
  `asignatura` varchar(23) NOT NULL,
  `docente` varchar(23) NOT NULL,
  `docente_email` varchar(23) NOT NULL,
  `jornada` varchar(6) NOT NULL,
  `grupo` varchar(2) NOT NULL,
  `area_designada` text DEFAULT NULL,
  `tematica_desarrollar` text DEFAULT NULL,
  `horario_asistencia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(10) NOT NULL,
  `nombre` varchar(23) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'este perfil es el de mas alto rango, con acceso a todos los modulos'),
(2, 'Docente', 'perfil de recibido de documentos'),
(3, 'Beca-Trabajo', 'Perfil de solo lectura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(23) NOT NULL,
  `apellido` varchar(23) NOT NULL,
  `username` varchar(23) NOT NULL,
  `password` varchar(20) NOT NULL,
  `rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellido`, `username`, `password`, `rol`) VALUES
('Julian', 'Becerra', 'JulianVega03', '0323', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliacion_arl`
--
ALTER TABLE `afiliacion_arl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_practicas` (`id_practicas`),
  ADD KEY `id_trabajo_grado` (`tipo_trabajo_grado`);

--
-- Indices de la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empresa` (`id_empresa`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_practicas` (`id_practicas`),
  ADD KEY `id_trabajo_grado` (`tipo_trabajo_grado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `practicas`
--
ALTER TABLE `practicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliacion_arl`
--
ALTER TABLE `afiliacion_arl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `convenio`
--
ALTER TABLE `convenio`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `practicas`
--
ALTER TABLE `practicas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `afiliacion_arl`
--
ALTER TABLE `afiliacion_arl`
  ADD CONSTRAINT `afiliacion_arl_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id`),
  ADD CONSTRAINT `afiliacion_arl_ibfk_2` FOREIGN KEY (`id_practicas`) REFERENCES `practicas` (`id`);

--
-- Filtros para la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD CONSTRAINT `convenio_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `convenio_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id`),
  ADD CONSTRAINT `convenio_ibfk_3` FOREIGN KEY (`id_practicas`) REFERENCES `practicas` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
