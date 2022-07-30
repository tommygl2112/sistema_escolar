-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-07-2022 a las 03:50:26
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_univer_prodesat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_alumnos`
--

DROP TABLE IF EXISTS `cat_alumnos`;
CREATE TABLE IF NOT EXISTS `cat_alumnos` (
  `iCodigoAlumno` int NOT NULL,
  `vchNombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vchApellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dtFechaNac` date NOT NULL,
  PRIMARY KEY (`iCodigoAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Catalogo Alumnos';

--
-- Volcado de datos para la tabla `cat_alumnos`
--

INSERT INTO `cat_alumnos` (`iCodigoAlumno`, `vchNombres`, `vchApellidos`, `dtFechaNac`) VALUES
(1, 'Tomas', 'Garcia Lopez', '1997-12-21'),
(2, 'Jhon', 'Snow', '0283-00-00'),
(3, 'Ernesto', 'Oliva Salazar', '1998-01-05'),
(5, 'Luis', 'Manza Manzanilla', '1995-06-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_materias`
--

DROP TABLE IF EXISTS `cat_materias`;
CREATE TABLE IF NOT EXISTS `cat_materias` (
  `vchCodigoMateria` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `vchMateria` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`vchCodigoMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Catalogo de materias';

--
-- Volcado de datos para la tabla `cat_materias`
--

INSERT INTO `cat_materias` (`vchCodigoMateria`, `vchMateria`) VALUES
('DB', 'Bases de datos'),
('IA', 'Inteligencia artificial'),
('P1', 'Introduccion a la programacion'),
('t1', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_rel_alumno_materia`
--

DROP TABLE IF EXISTS `cat_rel_alumno_materia`;
CREATE TABLE IF NOT EXISTS `cat_rel_alumno_materia` (
  `iCodigoAlumno` int NOT NULL,
  `vchCodigoMateria` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `fCalificacion` float DEFAULT NULL,
  KEY `iCodigoAlumno` (`iCodigoAlumno`),
  KEY `vchCodigoMateria` (`vchCodigoMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cat_rel_alumno_materia`
--

INSERT INTO `cat_rel_alumno_materia` (`iCodigoAlumno`, `vchCodigoMateria`, `fCalificacion`) VALUES
(2, 'P1', 0),
(3, 'ia', 0),
(5, 'db', 80);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_rel_alumno_materia`
--
ALTER TABLE `cat_rel_alumno_materia`
  ADD CONSTRAINT `cat_rel_alumno_materia_ibfk_1` FOREIGN KEY (`iCodigoAlumno`) REFERENCES `cat_alumnos` (`iCodigoAlumno`),
  ADD CONSTRAINT `cat_rel_alumno_materia_ibfk_2` FOREIGN KEY (`vchCodigoMateria`) REFERENCES `cat_materias` (`vchCodigoMateria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
