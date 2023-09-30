-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 05:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital`
--
DROP DATABASE IF EXISTS `digital`;
CREATE DATABASE IF NOT EXISTS `digital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `digital`;

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
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
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `apellido`, `correo`, `fecha_nac`, `id_curso_asignado`, `estado_asistencia`) VALUES
(1, 'ANA', 'GONZÁLEZ', 'ana@gmail.com', '2013-09-03', 3, 1),
(2, 'MARTIN', 'LARA', 'malara@gmail.com', '2023-09-30', 2, 1),
(3, 'CAMILA', 'ANTU', 'cam@gmail.com', '2023-04-04', 2, 1),
(4, 'PILAR', 'SANTIZO', 'psan@gmail.com', '2023-09-01', 5, 1),
(5, 'ALU', 'JIMENEZ', 'alu@gmail.com', '2013-09-03', 2, 0),
(6, 'ALEJANDRO', 'PIERA', 'al@gmail.com', '2023-09-10', 3, 0),
(10, 'MARTA', 'MANI', 'marta@gmail.com', '2023-09-12', 2, 0),
(11, 'KAT', 'MARLENY', 'kat@gmail.com', '2023-09-03', 5, 1),
(12, 'ISABEL', 'PRADO', 'pr@gmail.com', '2023-09-27', 2, 0),
(14, 'SEBASTIAN', 'RIOS', 'seb@gmail.com', '2023-08-28', 6, 0),
(15, 'GABRIELA', 'SILVA', 'gab@gmail.com', '2023-09-29', 6, 0),
(16, 'EDUARDO', 'GUT', 'ed@gmail.com', '2023-09-21', 7, 0),
(17, 'EDUARDO', 'CASTILLO', 'edcas@gmail.com', '2023-09-01', 7, 0),
(18, 'CAMILA', 'MONTENGEGRO', 'cammot@gmail.com', '2023-09-01', 8, 0),
(19, 'CATALINA', 'VARGAS', 'cat@gmail.com', '2023-09-28', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `estado_asis` int(11) NOT NULL,
  `fecha_asistencia` date NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_alumno`, `estado_asis`, `fecha_asistencia`, `user`) VALUES
(1161, 11, 1, '2023-09-28', 'user2'),
(1162, 1, 1, '2023-09-28', 'XAMP'),
(1163, 2, 1, '2023-09-28', 'XAMP'),
(1164, 3, 1, '2023-09-28', 'XAMP'),
(1165, 10, 0, '2023-09-28', 'XAMP'),
(1166, 12, 0, '2023-09-28', 'XAMP'),
(1167, 4, 1, '2023-09-28', 'user2'),
(1168, 4, 1, '2023-09-28', 'user2'),
(1169, 4, 1, '2023-09-29', 'user2'),
(1170, 1, 1, '2023-09-29', 'XAMP'),
(1171, 5, 1, '2023-09-29', 'XAMP'),
(1172, 2, 1, '2023-09-29', 'XAMP'),
(1173, 3, 1, '2023-09-29', 'XAMP'),
(1174, 10, 0, '2023-09-29', 'XAMP'),
(1175, 12, 0, '2023-09-29', 'XAMP'),
(1176, 4, 1, '2023-09-29', 'user2'),
(1177, 2, 1, '2023-09-30', 'XAMP'),
(1178, 3, 1, '2023-09-30', 'XAMP'),
(1179, 10, 0, '2023-09-30', 'XAMP'),
(1180, 12, 0, '2023-09-30', 'XAMP'),
(1181, 2, 1, '2023-09-30', 'EZEQUIEL'),
(1182, 3, 1, '2023-09-30', 'EZEQUIEL'),
(1183, 5, 0, '2023-09-30', 'EZEQUIEL'),
(1184, 10, 0, '2023-09-30', 'EZEQUIEL'),
(1185, 12, 0, '2023-09-30', 'EZEQUIEL'),
(1186, 1, 1, '2023-09-30', 'EZEQUIEL'),
(1187, 6, 0, '2023-09-30', 'EZEQUIEL');

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fecha_ini` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre_curso`, `descripcion`, `fecha_ini`) VALUES
(2, 'Etica', 'curso de etica', '2023-09-03'),
(3, 'Redes', 'curso de redes', '2014-09-02'),
(5, 'Desarrollo', 'development', '2023-09-06'),
(6, 'BD', 'curso de BD', '2023-09-03'),
(7, 'Logica', 'curso', '2023-09-03'),
(8, 'Cálculo', 'curso', '2023-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `cursoasignado`
--

CREATE TABLE `cursoasignado` (
  `id_curso_asignado` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cursoasignado`
--

INSERT INTO `cursoasignado` (`id_curso_asignado`, `id_user`, `id_curso`) VALUES
(30, 5, 2),
(31, 5, 3),
(32, 6, 6),
(33, 6, 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `reporte_asistencia`
-- (See below for the actual view)
--
CREATE TABLE `reporte_asistencia` (
`id_curso` int(11)
,`nombre_curso` varchar(50)
,`id_alumno` int(11)
,`nombre` varchar(50)
,`apellido` varchar(50)
,`estado_asistencia` tinyint(1)
,`fecha_asistencia` date
);

-- --------------------------------------------------------

--
-- Table structure for table `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `puntos` int(3) NOT NULL,
  `materia` int(11) NOT NULL,
  `maestro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `nombre`, `descripcion`, `fecha`, `puntos`, `materia`, `maestro`) VALUES
(12, 'desarrollo', 'AWS', '2023-09-19', 21, 2, 3),
(14, 'Entrega', 'ejercicio', '2023-09-26', 1, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `forgot_pass_identity`, `created`, `modified`, `status`) VALUES
(3, 'USER', 'TEST1', 'vitivix255@vip4e.com', 'bcabd74f4a06ddab59d55b107f27661b', '2322323', 'ee0a317cc8eb52a10f41a66dc74d4816', '2023-09-19 03:58:12', '2023-09-19 04:17:10', '1'),
(4, 'uma', 'sfs', 'pcvu_hgmas17@cikue.com', 'bcabd74f4a06ddab59d55b107f27661b', '121212', '6b0c0eb328260944cde19d7b3616f4ab', '2023-09-19 04:22:02', '2023-09-19 05:09:13', '1'),
(5, 'ALEJANDRO', 'ROMERO', 'guillermo.mar18@gmail.com', '83b3d8c330e1d36a583d392df858d7a2', '1212', '66924ee6bbe578f0c1b18dd4b2262071', '2023-09-19 04:47:35', '2023-09-28 04:08:30', '1'),
(6, 'ADRIANA', 'NAVARRO', 'feyij53454@fandsend.com', '83b3d8c330e1d36a583d392df858d7a2', '232323', '', '2023-09-22 03:49:12', '2023-09-22 03:49:12', '1'),
(7, 'ADMIN', 'ST.', 'admin1212@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2367888', '', '2023-09-24 22:24:21', '2023-09-24 22:24:21', '1');

-- --------------------------------------------------------

--
-- Structure for view `reporte_asistencia`
--
DROP TABLE IF EXISTS `reporte_asistencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reporte_asistencia`  AS SELECT `co`.`id_curso` AS `id_curso`, `co`.`nombre_curso` AS `nombre_curso`, `al`.`id_alumno` AS `id_alumno`, `al`.`nombre` AS `nombre`, `al`.`apellido` AS `apellido`, `al`.`estado_asistencia` AS `estado_asistencia`, `si`.`fecha_asistencia` AS `fecha_asistencia` FROM ((`curso` `co` join `alumno` `al` on(`al`.`id_curso_asignado` = `co`.`id_curso`)) join `asistencia` `si` on(`si`.`id_alumno` = `al`.`id_alumno`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `fk_curso_asig` (`id_curso_asignado`);

--
-- Indexes for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `fk_asistencia_alumno` (`id_alumno`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `cursoasignado`
--
ALTER TABLE `cursoasignado`
  ADD PRIMARY KEY (`id_curso_asignado`),
  ADD KEY `fk_curso_user` (`id_user`),
  ADD KEY `fk_curso_curso` (`id_curso`);

--
-- Indexes for table `tarea`
--
ALTER TABLE `tarea`
  ADD KEY `fk_curso` (`materia`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1188;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cursoasignado`
--
ALTER TABLE `cursoasignado`
  MODIFY `id_curso_asignado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_curso_asig` FOREIGN KEY (`id_curso_asignado`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_asistencia_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cursoasignado`
--
ALTER TABLE `cursoasignado`
  ADD CONSTRAINT `fk_curso_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`materia`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
