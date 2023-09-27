-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 06:47:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `digital`
--
CREATE DATABASE IF NOT EXISTS `digital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `digital`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `id_curso_asignado` int(11) NOT NULL,
  `estado_asistencia` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `apellido`, `correo`, `fecha_nac`, `id_curso_asignado`, `estado_asistencia`) VALUES
(1, 'david', 'martinez', 'dav@gmail.com', '2013-09-03', 5, 1),
(2, 'martin', 'martinss', 'am@gmail.com', '2023-09-30', 2, 0),
(3, 'camila', 'antu', 'cam@gmail.com', '2023-04-04', 2, 0),
(4, 'pilar', 'santizo', 'psan@gmail.com', '2023-09-01', 7, 0),
(5, 'david', 'martinez', 'dav@gmail.com', '2013-09-03', 2, 0),
(6, 'xamp', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(7, 'xamp', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(8, 'xamp2', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(9, 'xamp3', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(10, 'xamp4', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(11, 'kat', 'marlen', 'kat@gmail.com', '2023-09-03', 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `estado_asis` int(11) NOT NULL,
  `fecha_asistencia` date NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_alumno`, `estado_asis`, `fecha_asistencia`, `user`) VALUES
(1148, 10, 0, '2023-09-27', 'XAMP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha_ini` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `descripcion`, `fecha_ini`) VALUES
(2, 'etica', 'curso de etica', '2023-09-03'),
(3, 'redes', 'curso de redes', '2014-09-03'),
(5, 'dev', 'development', '2023-09-06'),
(6, 'sql', 'bd', '2023-09-03'),
(7, 'desarrollo', 'curso', '2023-09-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursoasignado`
--

CREATE TABLE `cursoasignado` (
  `id_curso_asignado` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursoasignado`
--

INSERT INTO `cursoasignado` (`id_curso_asignado`, `id_user`, `id_curso`) VALUES
(6, 5, 2),
(7, 5, 7),
(12, 6, 5),
(13, 6, 6),
(14, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_maestro`
--

CREATE TABLE `tarea_maestro` (
  `id` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `forgot_pass_identity` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `forgot_pass_identity`, `created`, `modified`, `status`) VALUES
(3, 'USER', 'TEST1', 'vitivix255@vip4e.com', 'bcabd74f4a06ddab59d55b107f27661b', '2322323', 'ee0a317cc8eb52a10f41a66dc74d4816', '2023-09-19 03:58:12', '2023-09-19 04:17:10', '1'),
(4, 'uma', 'sfs', 'pcvu_hgmas17@cikue.com', 'bcabd74f4a06ddab59d55b107f27661b', '121212', '6b0c0eb328260944cde19d7b3616f4ab', '2023-09-19 04:22:02', '2023-09-19 05:09:13', '1'),
(5, 'XAMP', 'XAMP2', 'guillermo.mar18@gmail.com', '83b3d8c330e1d36a583d392df858d7a2', '1212', '8ff64b1b706ec24632eadfd836b6b57d', '2023-09-19 04:47:35', '2023-09-22 05:19:26', '1'),
(6, 'user2', 'alo', 'feyij53454@fandsend.com', '83b3d8c330e1d36a583d392df858d7a2', '232323', '', '2023-09-22 03:49:12', '2023-09-22 03:49:12', '1'),
(7, 'ADMIN', 'ST.', 'admin1212@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2367888', '', '2023-09-24 22:24:21', '2023-09-24 22:24:21', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `fk_curso_asig` (`id_curso_asignado`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `fk_asistencia_alumno` (`id_alumno`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `cursoasignado`
--
ALTER TABLE `cursoasignado`
  ADD PRIMARY KEY (`id_curso_asignado`),
  ADD KEY `fk_curso_user` (`id_user`),
  ADD KEY `fk_curso_curso` (`id_curso`);

--
-- Indices de la tabla `tarea_maestro`
--
ALTER TABLE `tarea_maestro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1149;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cursoasignado`
--
ALTER TABLE `cursoasignado`
  MODIFY `id_curso_asignado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tarea_maestro`
--
ALTER TABLE `tarea_maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_curso_asig` FOREIGN KEY (`id_curso_asignado`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursoasignado`
--
ALTER TABLE `cursoasignado`
  ADD CONSTRAINT `fk_curso_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
