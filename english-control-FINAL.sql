-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2022 at 10:39 PM
-- Server version: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `english-control`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE DATABASE `english-control`;
USE `english-control`;

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `num_control` varchar(9) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellido_p` varchar(45) NOT NULL,
  `apellido_m` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `carrera_id`, `num_control`, `password`, `nombres`, `apellido_p`, `apellido_m`) VALUES
(1, 1, '19410258', 'asd', 'CARLOS EDUARDO', 'CERECERES', 'HOLGUIN'),
(2, 1, '19410257', 'asd', 'KEVIN ADRIAN', 'CERECERES', 'BARRAZA'),
(3, 3, '19410111', 'asd', 'OSBALDO', 'JIMENEZ', 'HERNANDEZ'),
(4, 4, '19410112', 'asd', 'SAMUEL', 'DE', 'LUQUE'),
(5, 3, '19410113', 'asd', 'RICARDO', 'MARTINEZ', 'FRANCO'),
(6, 1, '19410114', 'asd', 'ALICIA', 'HERNANDEZ', 'HERNANDEZ'),
(7, 5, '19410255', 'asd', 'IVAN', 'TORRES', 'MARTINEZ');

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `calif_1` float NOT NULL DEFAULT 0,
  `calif_2` float NOT NULL DEFAULT 0,
  `calif_3` float NOT NULL DEFAULT 0,
  `calif_4` float NOT NULL DEFAULT 0,
  `calif_5` float NOT NULL DEFAULT 0,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `calif_1`, `calif_2`, `calif_3`, `calif_4`, `calif_5`, `estado_id`) VALUES
(1, 18, 0, 0, 0, 3, 2),
(3, 0, 0, 0, 0, 0, 1),
(4, 0, 0, 0, 0, 0, 1),
(6, 0, 0, 0, 0, 0, 1),
(7, 0, 0, 0, 0, 0, 1),
(8, 0, 0, 0, 0, 0, 1),
(9, 0, 0, 0, 0, 0, 1),
(10, 0, 0, 0, 0, 0, 1),
(12, 0, 0, 0, 0, 0, 1),
(14, 0, 0, 0, 0, 0, 1),
(15, 0, 0, 0, 0, 0, 1),
(16, 10, 20, 30, 40, 50, 2),
(17, 0, 0, 0, 0, 0, 2),
(18, 0, 0, 0, 0, 0, 1),
(19, 0, 11, 0, 0, 0, 1),
(20, 0, 0, 0, 0, 0, 1),
(21, 0, 0, 0, 0, 0, 1),
(22, 0, 0, 0, 0, 0, 1),
(23, 0, 0, 0, 0, 0, 1),
(24, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE `carrera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`id`, `nombre`) VALUES
(1, 'ING. SISTEMAS'),
(2, 'ING. INDUSTRIAL'),
(3, 'ING. QUIMICA'),
(4, 'ING. MECATRONICA'),
(5, 'ING. ELECTROMECANICA');

-- --------------------------------------------------------

--
-- Table structure for table `cursado`
--

CREATE TABLE `cursado` (
  `alumnos_id` int(11) NOT NULL,
  `calificaciones_id` int(11) NOT NULL,
  `nivel_curso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cursado`
--

INSERT INTO `cursado` (`alumnos_id`, `calificaciones_id`, `nivel_curso`) VALUES
(1, 18, 'INTERMEDIO 2 Y INTERMEDIO 3'),
(1, 19, 'BASICO 3 Y 4'),
(2, 6, 'INTERMEDIO 4 Y INTERMEDIO 5'),
(3, 16, 'BASICO 3 Y 4');

-- --------------------------------------------------------

--
-- Table structure for table `cursando`
--

CREATE TABLE `cursando` (
  `id` int(11) NOT NULL,
  `alumnos_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `calificaciones_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cursando`
--

INSERT INTO `cursando` (`id`, `alumnos_id`, `curso_id`, `calificaciones_id`) VALUES
(13, 3, 13, 20),
(14, 4, 13, 21),
(15, 5, 14, 22),
(16, 6, 15, 23),
(17, 1, 13, 24);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `dias_id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `hora_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id`, `dias_id`, `profesor_id`, `nivel_id`, `hora_id`) VALUES
(13, 1, 2, 1, 1),
(14, 1, 2, 1, 2),
(15, 1, 2, 1, 3),
(16, 2, 3, 2, 1),
(17, 1, 3, 3, 5),
(18, 1, 4, 1, 1),
(19, 2, 4, 5, 7),
(20, 1, 5, 4, 7),
(21, 2, 7, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `demanda`
--

CREATE TABLE `demanda` (
  `id` int(11) NOT NULL,
  `alumnos_id` int(11) NOT NULL,
  `hora_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `semestre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `demanda`
--

INSERT INTO `demanda` (`id`, `alumnos_id`, `hora_id`, `nivel_id`, `semestre_id`) VALUES
(6, 1, 2, 2, 4),
(7, 2, 3, 3, 2),
(8, 4, 1, 1, 6),
(9, 3, 5, 1, 3),
(10, 5, 2, 1, 5),
(11, 6, 3, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `dias`
--

CREATE TABLE `dias` (
  `id` int(11) NOT NULL,
  `dias` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dias`
--

INSERT INTO `dias` (`id`, `dias`) VALUES
(1, 'LUN - VIE'),
(2, 'SABADOS');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'SIN CONFIRMAR'),
(2, 'CONFIRMADO');

-- --------------------------------------------------------

--
-- Table structure for table `hora`
--

CREATE TABLE `hora` (
  `id` int(11) NOT NULL,
  `hora` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hora`
--

INSERT INTO `hora` (`id`, `hora`) VALUES
(1, '7 - 8'),
(2, '8 - 9'),
(3, '10 - 11'),
(5, '11 - 12'),
(6, '13 - 14'),
(7, '14 - 15'),
(8, '15 - 16');

-- --------------------------------------------------------

--
-- Table structure for table `Misc`
--

CREATE TABLE `Misc` (
  `id` int(11) NOT NULL,
  `msgDocentes` varchar(255) DEFAULT NULL,
  `msgAlumnos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `nivel_curso` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nivel`
--

INSERT INTO `nivel` (`id`, `nivel_curso`) VALUES
(1, 'BASICO 1 Y 2'),
(2, 'BASICO 3 Y 4'),
(3, 'BASICO 5 INTERMEDIO 1'),
(4, 'INTERMEDIO 2 Y INTERMEDIO 3'),
(5, 'INTERMEDIO 4 Y INTERMEDIO 5');

-- --------------------------------------------------------

--
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellido_p` varchar(45) NOT NULL,
  `apellido_m` varchar(45) NOT NULL,
  `numero_identificacion` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`id`, `nombres`, `apellido_p`, `apellido_m`, `numero_identificacion`, `password`, `tipo`) VALUES
(1, 'JUAN ADRIAN', 'JUAREZ', 'MARTINEZ', 'p410001', 'asddd', 3),
(2, 'DIEGO ADRIAN', 'HOLGUIN', 'GUTIERREZ', 'p410002', 'qwerty', 2),
(3, 'RODRIGO', 'VELA', 'JUAREZ', 'p410003', 'qwerty', 2),
(4, 'BENITO', 'DEL', 'OLMO', 'p410004', 'qwerty', 2),
(5, 'DYLAN', 'PAREDES', 'TORRES', 'p410005', 'qwerty', 2),
(6, 'AARON', 'VIERA', 'BLANCO', 'p410006', 'qwerty', 2),
(7, 'CLARA', 'SALGUERO', 'VIDAL', 'p410007', 'qwerty', 2);

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id`, `nombre`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_control_UNIQUE` (`num_control`),
  ADD KEY `fk_alumnos_carrera1_idx` (`carrera_id`);

--
-- Indexes for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_calificaciones_estado1_idx` (`estado_id`);

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cursado`
--
ALTER TABLE `cursado`
  ADD PRIMARY KEY (`alumnos_id`,`calificaciones_id`),
  ADD KEY `fk_alumnos_has_calificaciones_calificaciones1_idx` (`calificaciones_id`),
  ADD KEY `fk_alumnos_has_calificaciones_alumnos1_idx` (`alumnos_id`);

--
-- Indexes for table `cursando`
--
ALTER TABLE `cursando`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cursando_alumnos_idx` (`alumnos_id`),
  ADD KEY `fk_cursando_curso1_idx` (`curso_id`),
  ADD KEY `fk_cursando_calificaciones1_idx` (`calificaciones_id`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curso_profesor1_idx` (`profesor_id`),
  ADD KEY `fk_curso_dias1_idx` (`dias_id`),
  ADD KEY `fk_curso_nivel1_idx` (`nivel_id`),
  ADD KEY `fk_curso_hora1_idx` (`hora_id`);

--
-- Indexes for table `demanda`
--
ALTER TABLE `demanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_demanda_alumnos1_idx` (`alumnos_id`),
  ADD KEY `fk_demanda_hora1_idx` (`hora_id`),
  ADD KEY `fk_demanda_nivel1_idx` (`nivel_id`),
  ADD KEY `fk_demanda_semestre1_idx` (`semestre_id`);

--
-- Indexes for table `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hora`
--
ALTER TABLE `hora`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Misc`
--
ALTER TABLE `Misc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cursando`
--
ALTER TABLE `cursando`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `demanda`
--
ALTER TABLE `demanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dias`
--
ALTER TABLE `dias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hora`
--
ALTER TABLE `hora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Misc`
--
ALTER TABLE `Misc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alumnos_carrera1` FOREIGN KEY (`carrera_id`) REFERENCES `carrera` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `fk_calificaciones_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cursado`
--
ALTER TABLE `cursado`
  ADD CONSTRAINT `fk_alumnos_has_calificaciones_alumnos1` FOREIGN KEY (`alumnos_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumnos_has_calificaciones_calificaciones1` FOREIGN KEY (`calificaciones_id`) REFERENCES `calificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cursando`
--
ALTER TABLE `cursando`
  ADD CONSTRAINT `fk_cursando_alumnos` FOREIGN KEY (`alumnos_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cursando_calificaciones1` FOREIGN KEY (`calificaciones_id`) REFERENCES `calificaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cursando_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_dias1` FOREIGN KEY (`dias_id`) REFERENCES `dias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_hora1` FOREIGN KEY (`hora_id`) REFERENCES `hora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_nivel1` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_profesor1` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `demanda`
--
ALTER TABLE `demanda`
  ADD CONSTRAINT `fk_demanda_alumnos1` FOREIGN KEY (`alumnos_id`) REFERENCES `alumnos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demanda_hora1` FOREIGN KEY (`hora_id`) REFERENCES `hora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demanda_nivel1` FOREIGN KEY (`nivel_id`) REFERENCES `nivel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_demanda_semestre1` FOREIGN KEY (`semestre_id`) REFERENCES `semestre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
