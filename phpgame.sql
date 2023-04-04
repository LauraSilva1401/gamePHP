-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 04-04-2023 a las 13:45:21
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phpgame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historypage`
--

DROP TABLE IF EXISTS `historypage`;
CREATE TABLE IF NOT EXISTS `historypage` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `result` varchar(11) NOT NULL,
  `lives` int(11) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `fk_users_historypage` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historypage`
--

INSERT INTO `historypage` (`id`, `date`, `result`, `lives`, `userId`, `level`) VALUES
(1, '2023-03-27 19:25:54', 'LOSE', 6, 8, 1),
(2, '2023-03-27 19:26:47', 'LOSE', 6, 8, 1),
(3, '2023-03-27 19:27:07', 'LOSE', 4, 8, 1),
(4, '2023-03-27 19:50:32', 'WON', 3, 8, 6),
(5, '2023-03-27 19:53:13', 'LOSE', 0, 8, 2),
(6, '2023-03-29 16:10:14', 'LOSE', 5, 8, 1),
(7, '2023-03-30 13:54:32', 'LOSE', 4, 8, 1),
(8, '2023-03-30 14:18:18', 'LOSE', 3, 8, 1),
(9, '2023-03-30 14:23:07', 'LOSE', 6, 8, 1),
(10, '2023-03-30 14:23:53', 'LOSE', 6, 8, 1),
(11, '2023-03-30 14:34:36', 'LOSE', 6, 10, 1),
(12, '2023-04-03 17:05:47', 'WON', 5, 10, 6),
(13, '2023-04-03 17:13:49', 'LOSE', 6, 10, 1),
(14, '2023-04-03 17:14:18', 'LOSE', 6, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(17) NOT NULL,
  `LastName` varchar(17) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `Password` varchar(81) NOT NULL,
  `registrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `FirstName`, `LastName`, `userName`, `Password`, `registrationDate`) VALUES
(4, 'jose', 'salazar', 'joshrs23@gmail.com', 'JDJ5JDEwJEVDTU44Qi5mQzZyM0d6SkYwcm8wT2UvTVJQSUNqZ3JmRmc3MFZJVE9YSUhmd3RlMUE2elMy', '2023-03-11 19:48:27'),
(5, 'jose', 'salazar', 'joshrafael@gmail.com', 'JDJ5JDEwJFlvMEhLLmhZcVUwTi5oQlpFajhwWGVpQTJzbEZ0L2FWdy42RG1OS0lRaU41NldVcnUwZ3gy', '2023-03-12 22:36:22'),
(6, 'jose', 'salazar', 'joshrs23_@gmail.com', 'JDJ5JDEwJDN2V3F0UklGSUsueDZidlcvSkJvVXUudjZVWHpoZ2NTRWFwTGF1V09HZGtLMnFKNEN4TC5x', '2023-03-12 22:43:09'),
(7, 'jose', 'salazar', 'joshrs23aasdadadasdada', 'JDJ5JDEwJHAyYjJSODdhUFptWE4vRHNNUXVEY09JN1dFWGFRRE8vb0I3ZkZtY1RhRVBISlRIeExMTDl1', '2023-03-13 15:44:27'),
(8, 'jose', 'salazar', 'joshrs23_3@gmail.com', 'JDJ5JDEwJDdhSXJBczFHWkl5T1E3TlhRVnNHaXUwbmJnVG93VjZJN05BMUkwalFPSS5QZTdYcTJMRnRl', '2023-03-13 16:32:33'),
(10, 'jose', 'salazar', 'joshrs23', 'JDJ5JDEwJGl6TE4xd0pOS2dpV01sRm1sWnc5ay41NzdhZVNveE5nSGV1b0h1cFRhT20vRzhOYTA4WmFl', '2023-03-30 14:34:31');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historypage`
--
ALTER TABLE `historypage`
  ADD CONSTRAINT `fk_users_historypage` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
