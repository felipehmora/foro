-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2021 a las 00:40:11
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdphp2_20210607`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comentarios`
--

CREATE TABLE `tbl_comentarios` (
  `id` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `autor_comentario` varchar(30) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_tema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_comentarios`
--

INSERT INTO `tbl_comentarios` (`id`, `comentario`, `autor_comentario`, `fecha`, `hora`, `id_tema`) VALUES
(1, 'SIN COMENTARIOS.', 'MARIA GONZALEZ', '2021-06-10', '14:13:24', 4),
(2, 'EXCELENTE LENGUAJE DE PROGRAMACIÓN.', 'PEDRO PEREIRA', '2021-06-10', '14:17:06', 4),
(3, 'EXCELENTE LIBRO', 'JOSE DIAZ', '2021-06-11', '14:58:26', 2),
(4, 'PESIMA SITUACIÓN', 'JOSE DIAZ', '2021-06-11', '14:59:17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_temas`
--

CREATE TABLE `tbl_temas` (
  `id` int(11) NOT NULL,
  `tit` text DEFAULT NULL,
  `autor_tema` varchar(30) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_temas`
--

INSERT INTO `tbl_temas` (`id`, `tit`, `autor_tema`, `fecha`, `hora`) VALUES
(1, 'LAS DEFICIENCIAS DEL SISTEMAS DE EDUCACIÓN EN VENEZUELA.', 'CARLOS GONZALEZ', '2021-06-09', '14:48:30'),
(2, 'VENEZUELA, POLÍTICA Y PETROLEO', 'JOSE TORO', '2021-06-09', '14:49:31'),
(3, 'EL ACCESO A LOS MEDIOS DE COMUNICACIÓN EN DICTADURA.', 'MARIA LINARES', '2021-06-09', '14:50:17'),
(4, 'LENGUAJE DE PROGRAMACIÓN PHP.', 'VANESSA PEÑA', '2021-06-10', '13:10:10');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_foro_resumen1`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_foro_resumen1` (
`tema` text
,`autor_tema` varchar(30)
,`comentario` text
,`auto_comentario` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_foro_resumen2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_foro_resumen2` (
`tema` text
,`autor_tema` varchar(30)
,`comentario` text
,`auto_comentario` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_foro_resumen3`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_foro_resumen3` (
`tema` text
,`autor_tema` varchar(30)
,`comentario` text
,`auto_comentario` varchar(30)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_foro_resumen1`
--
DROP TABLE IF EXISTS `vw_foro_resumen1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_foro_resumen1`  AS  select `a`.`tit` AS `tema`,`a`.`autor_tema` AS `autor_tema`,`b`.`comentario` AS `comentario`,`b`.`autor_comentario` AS `auto_comentario` from (`tbl_temas` `a` join `tbl_comentarios` `b`) where `a`.`id` = `b`.`id_tema` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_foro_resumen2`
--
DROP TABLE IF EXISTS `vw_foro_resumen2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_foro_resumen2`  AS  select `a`.`tit` AS `tema`,`a`.`autor_tema` AS `autor_tema`,`b`.`comentario` AS `comentario`,`b`.`autor_comentario` AS `auto_comentario` from (`tbl_temas` `a` join `tbl_comentarios` `b` on(`a`.`id` = `b`.`id_tema`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_foro_resumen3`
--
DROP TABLE IF EXISTS `vw_foro_resumen3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_foro_resumen3`  AS  select `a`.`tit` AS `tema`,`a`.`autor_tema` AS `autor_tema`,`b`.`comentario` AS `comentario`,`b`.`autor_comentario` AS `auto_comentario` from (`tbl_temas` `a` left join `tbl_comentarios` `b` on(`a`.`id` = `b`.`id_tema`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_temas`
--
ALTER TABLE `tbl_temas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_comentarios`
--
ALTER TABLE `tbl_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_temas`
--
ALTER TABLE `tbl_temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
