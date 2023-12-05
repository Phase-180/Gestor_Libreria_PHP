-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 30-11-2023 a las 18:42:02
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdlibreria`
--
CREATE DATABASE IF NOT EXISTS `bdlibreria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bdlibreria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--

CREATE TABLE `author` (
  `authorId` int NOT NULL,
  `authorNname` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `authorBirhdate` date NOT NULL,
  `authorPremio` tinyint(1) NOT NULL,
  `authorNacionalidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`authorId`, `authorNname`, `authorBirhdate`, `authorPremio`, `authorNacionalidad`) VALUES
(38, 'Martín Berasategui', '1960-02-07', 0, 'Española'),
(39, 'Carme Ruscalleda', '1952-02-07', 0, 'Española'),
(40, 'Jordi Cruz', '1978-02-11', 1, 'Española'),
(41, 'Paco Pérez', '1962-02-04', 1, 'Española'),
(42, 'Eneko Atxa', '1977-02-01', 0, 'Española'),
(43, 'Dabiz Muñoz', '1980-12-03', 1, 'Española'),
(44, 'Joan Roca', '1964-12-03', 1, 'Española'),
(45, 'Ángel León', '1977-12-03', 0, 'Española'),
(46, 'Jesús Sánchez', '1965-12-09', 0, 'Española'),
(47, 'Juan Mari Arzak', '0942-12-12', 1, 'Española');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `bookId` int NOT NULL,
  `bookTitle` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bookPublished` date NOT NULL,
  `booksIdAutor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`bookId`, `bookTitle`, `bookPublished`, `booksIdAutor`) VALUES
(38, 'Serranito', '2023-10-30', 38),
(39, 'El alioli que se merece un serranito', '2023-10-13', 39),
(40, 'Los mandamientos del serranito', '2023-10-22', 42),
(41, 'Serranito, la revolución', '2023-10-12', 43),
(42, 'El clásico bocadillo del sur', '2023-10-03', 45),
(43, 'Un serranito con tortilla, no es serranito', '2023-10-19', 41),
(44, 'El pimiento perfecto', '2023-10-19', 40),
(45, 'Serranito de pollo vs lomo', '2018-10-19', 47),
(46, 'La visión del jamón aplicado al serranito', '2018-10-04', 41),
(47, 'Serranito: qué es y cómo prepararlo', '2018-10-04', 43);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authorId`);

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `author_books_FK` (`booksIdAutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `author`
--
ALTER TABLE `author`
  MODIFY `authorId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `author_books_FK` FOREIGN KEY (`booksIdAutor`) REFERENCES `author` (`authorId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
