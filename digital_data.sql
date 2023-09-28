-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2023 at 05:53 AM
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
(1, 'david', 'martinez', 'dav@gmail.com', '2013-09-03', 3, 1),
(2, 'martin', 'martinss', 'am@gmail.com', '2023-09-30', 2, 1),
(3, 'camila', 'antu', 'cam@gmail.com', '2023-04-04', 2, 0),
(4, 'pilar', 'santizo', 'psan@gmail.com', '2023-09-01', 7, 0),
(5, 'david', 'martinez', 'dav@gmail.com', '2013-09-03', 2, 0),
(6, 'xamp', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(7, 'xamp', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(8, 'xamp2', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(9, 'xamp3', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(10, 'xamp4', 'ti', 'tixamp@gmail.com', '2023-09-12', 2, 0),
(11, 'kat', 'marlen', 'kat@gmail.com', '2023-09-03', 5, 1),
(12, 'prueba', 'pr', 'pr@gmail.com', '2023-09-27', 2, 0);

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
(1162, 1, 1, '2023-09-28', 'XAMP');

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
(2, 'etica', 'curso de etica', '2023-09-03'),
(3, 'redes', 'curso de redes', '2014-09-02'),
(5, 'dev', 'development', '2023-09-06'),
(6, 'sql', 'curso de BD', '2023-09-03'),
(7, 'desarrollo', 'curso', '2023-09-03'),
(8, 'Etica2', 'curso', '2023-09-27');

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
(6, 5, 3),
(7, 5, 7),
(12, 6, 5),
(13, 6, 6),
(14, 3, 3),
(16, 6, 3),
(17, 6, 6),
(18, 4, 3),
(19, 3, 2),
(20, 4, 2),
(21, 3, 2),
(22, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tarea_maestro`
--

CREATE TABLE `tarea_maestro` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarea_maestro`
--

INSERT INTO `tarea_maestro` (`id`, `descripcion`, `materia`) VALUES
(1, 'tarea1', 'etica');

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
(5, 'XAMP', 'XAMP2', 'guillermo.mar18@gmail.com', '83b3d8c330e1d36a583d392df858d7a2', '1212', '66924ee6bbe578f0c1b18dd4b2262071', '2023-09-19 04:47:35', '2023-09-28 04:08:30', '1'),
(6, 'user2', 'alo', 'feyij53454@fandsend.com', '83b3d8c330e1d36a583d392df858d7a2', '232323', '', '2023-09-22 03:49:12', '2023-09-22 03:49:12', '1'),
(7, 'ADMIN', 'ST.', 'admin1212@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2367888', '', '2023-09-24 22:24:21', '2023-09-24 22:24:21', '1');

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
-- Indexes for table `tarea_maestro`
--
ALTER TABLE `tarea_maestro`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1163;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cursoasignado`
--
ALTER TABLE `cursoasignado`
  MODIFY `id_curso_asignado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tarea_maestro`
--
ALTER TABLE `tarea_maestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
