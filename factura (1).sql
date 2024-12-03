-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2024 a las 22:55:00
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carlo-stock`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `factura_id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL,
  `comprador` varchar(255) DEFAULT NULL,
  `vendedor` varchar(255) DEFAULT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL,
  `tipo_pago` varchar(255) DEFAULT NULL,
  `condicion_pago` varchar(255) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `sub_total` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `descuento` float DEFAULT NULL,
  `recargo` float DEFAULT NULL,
  `tasa` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`factura_id`, `numero`, `empresa`, `comprador`, `vendedor`, `tipo_documento`, `tipo_pago`, `condicion_pago`, `fecha_vencimiento`, `fecha_emision`, `sub_total`, `iva`, `descuento`, `recargo`, `tasa`) VALUES
(2, '4566545', 'tecnosegura', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '9886556', 'pharmatique', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '5644785', 'TECNOvITAL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '7878', 'dasda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '9889', 'sda', 'adas', 'dads', 'asdas', 'asdas', 'dsada', '0000-00-00', '0000-00-00', 56456, 655, 564, 654, 5464),
(106, '9889', 'sda', 'adas', 'dads', 'asdas', 'asdas', 'dsada', '0000-00-00', '0000-00-00', 56456, 655, 564, 654, 5464),
(107, 'B0005026', 'B0005026', 'Carlos', 'VENDEDOR1', 'NOTA DE  ENTREGA', 'CREDITO', '15 DIAS', '0000-00-00', '0000-00-00', 165.5, 0, 0, 0, 55),
(108, 'B0005026', 'B0005026', 'Carlos', 'VENDEDOR1', 'NOTA DE  ENTREGA', 'CREDITO', '15 DIAS', '0000-00-00', '0000-00-00', 165.5, 0, 0, 0, 55),
(109, 'B0005026', 'B0005026', 'Carlos', 'VENDEDOR1', 'NOTA DE  ENTREGA', 'CREDITO', '15 DIAS', '0000-00-00', '0000-00-00', 165.5, 0, 0, 0, 55);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`factura_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
