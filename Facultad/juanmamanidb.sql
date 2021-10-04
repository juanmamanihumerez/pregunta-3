-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-10-2021 a las 16:10:35
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juanmamanidb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `ci` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `sigla` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nota1` int(3) NOT NULL,
  `nota2` int(3) NOT NULL,
  `nota3` int(3) NOT NULL,
  `nota_final` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nota`
--

INSERT INTO `nota` (`ci`, `sigla`, `nota1`, `nota2`, `nota3`, `nota_final`) VALUES
('222', 'INF-111', 56, 87, 75, NULL),
('333', 'INF-112', 68, 96, 85, NULL),
('444', 'MAT-100', 78, 85, 91, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fec_nac` date NOT NULL,
  `departamento` varchar(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `fec_nac`, `departamento`) VALUES
('111', 'Juan Mamani Humerez', '1985-04-02', 'LP'),
('222', 'Marcelo Conde Luna', '2000-08-04', 'OR'),
('333', 'Simon Tusco Chama', '1995-03-01', 'PT'),
('444', 'Luis Mejia Lopez', '2000-06-09', 'LP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `usuario`, `password`) VALUES
('111', 'admin', '$2y$10$oZCeiU54pKbS4Mirg3UTG.nOxNGo2M4LnQDw7HT4RrXnDDp4rB3KC'),
('222', 'estudiante1', '$2y$10$K2ii1oC0b5WINAQbPtn0k.M6yOXhZ5ROhZ05Pa.fJ3g1NDbxLpBZG'),
('333', 'estudiante2', '$2y$10$Xrxa.oqWHBnu1PyaRakSweOi5Q.OPSBwQKJvVWBZi0SFrEWaijCN6'),
('444', 'estudiante3', '$2y$10$5O6EuEzsTSORtkOtXzWBkOjCGT8R6aBGZ7e9MacnDD9sMwB9OPKvy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
