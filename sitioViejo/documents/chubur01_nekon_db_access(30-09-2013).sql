-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-09-2013 a las 14:35:36
-- Versión del servidor: 5.1.56
-- Versión de PHP: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `chubur01_nekon_db_access`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `idArticulo` int(11) NOT NULL AUTO_INCREMENT,
  `Medidas` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Precio` double NOT NULL,
  `Stock` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `Codigo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `idMueble` int(11) NOT NULL,
  PRIMARY KEY (`idArticulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=68 ;

--
-- Volcar la base de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idArticulo`, `Medidas`, `Descripcion`, `Precio`, `Stock`, `Codigo`, `idMueble`) VALUES
(1, '0,91 X 2,10 m', '', 6915, 'S', 'MFO01', 1),
(2, '1,07 X 2,48 m', '', 7708, 'S', 'MFO02', 1),
(3, '1,22 X 2,87 m', '', 9910, 'S', 'MFO03', 1),
(4, '0,91 X 2,70 m', '', 8710, 'S', 'MFO04', 2),
(5, '1,07 X 3,18 m', '', 10223, 'S', 'MFO05', 2),
(6, '1,22 X 3,57 m ', '', 11686, 'S', 'MFO06', 2),
(7, '1,22 m', '', 4489, 'S', 'MFC01', 3),
(8, '1,40 m', '', 6332, 'S', 'MFC02', 3),
(9, '0,91 X 1,82 m', '', 5590, 'S', 'MFT01', 4),
(10, '0,91 X 2,44 m', '', 6254, 'S', 'MFT02', 4),
(11, '1,07 X 1,22 m ', '', 4052, 'S', 'MFT03', 4),
(12, '1,07 X 2,14 m', '', 6254, 'S', 'MFT04', 4),
(13, '1,07 X 2,44 m', '', 6915, 'S', 'MFT05', 4),
(14, '1,22 X 1,40 m', '', 4695, 'S', 'MFT06', 4),
(15, '1,22 X 2,44 m', '', 8368, 'S', 'MFT07', 4),
(16, '1,22 X 2,80 m ', '', 9335, 'S', 'MFT08', 4),
(17, '0,91 X 2,52 m', '', 8020, 'S', 'MFT09', 5),
(18, '1,07 X 2,84 m', '', 8898, 'S', 'MFT10', 5),
(19, '1,20 X 3,10 m', '', 11210, 'S', 'MFT11', 5),
(20, '1,07 X 3,50 m', '', 11322, 'S', 'MFT12', 5),
(21, '1,20 X 3,50 m', '', 12422, 'S', 'MFT13', 5),
(24, '1,22 m', '', 4107, 'S', 'MFR01', 6),
(25, '1,34 m', '', 4596, 'S', 'MFR02', 6),
(26, '1,50 m', '', 5360, 'S', 'MFR03', 6),
(27, '0,82 m', '', 1816, 'S', 'MPC01', 7),
(28, '1,22 m', '', 2896, 'S', 'MPC02', 7),
(29, '0,65 m', '', 1522, 'S', 'MPC03', 7),
(30, '0,82 X 1,44 m', '', 2682, 'S', 'MPT01', 8),
(31, '0,65 x 1,22 m', '', 2256, 'S', 'MPT02', 8),
(32, '0,91 m', '', 2025, 'S', 'MPR01', 9),
(33, '1,22 m', '', 2966, 'S', 'MPR02', 9),
(40, 'ver detalle', 'Altura asiento:   46 cm\r\nAltura respaldo:   90 cm\r\nAltura apoyabrazos:   66 cm\r\nAncho apoyabrazos:   57 cm\r\nAncho:   54 cm\r\nProfundidad:   50 cm\r\nPeso:   12 kg', 1583, 'S', 'SFX01', 11),
(41, 'ver detalle', 'Altura asiento:   46 cm\r\nAltura respaldo:   90 cm\r\nAncho:   45 cm\r\nProfundidad:   58 cm\r\nPeso:   10 kg', 1268, 'S', 'SFX02', 12),
(42, 'ver detalle', 'Altura de respaldo:   98 cm\r\nAltura de apoyabrazos:   66,5 cm\r\nAltura asiento:   42,5 cm\r\nAltura plegada:   112 cm\r\nProfundidad:   44,5 cm\r\nProfundidad plegada:   11,5 cm\r\nAncho:   53,5 cm\r\nPeso:   9 kg', 1445, 'S', 'SPA01', 13),
(43, 'ver detalle', 'Altura:   98 cm\r\nAltura plegada:   110 cm\r\nAltura asiento:   42 cm\r\nProfundidad:   44,5 cm\r\nAncho:   45 cm\r\nPeso:   9 kg', 1153, 'S', 'SPA02', 14),
(44, 'ver detalle', 'Altura de respaldo:   86,5 cm\r\nAltura de apoyabrazos:   66,5 cm\r\nAltura de asiento:   42,5 cm\r\nAltura plegada:   112 cm\r\nProfundidad:   44,5 cm\r\nProfundidad plegada:   11,5 cm\r\nAncho:   53,5 cm\r\nPeso:   8 kg', 1390, 'S', 'SPB01', 15),
(45, 'ver detalle', 'Altura de respaldo:   86 cm\r\nAltura de asiento:   42,5 cm\r\nAltura plegada:   98,5 cm\r\nProfundidad:   44,5 cm\r\nProfundidad plegada:   11,5 cm\r\nAncho:   44,5 cm\r\nPeso:   7 kg', 1098, 'S', 'SPB02', 16),
(46, 'ver detalle', 'Altura de respaldo:   96,5 cm\r\nAltura de apoyabrazos:   67 cm\r\nAltura de asiento:   48 cm\r\nProfundidad:   63,5 cm\r\nAncho:   53 cm\r\nPeso:   8 kg', 1140, 'S', 'SPR01', 17),
(47, 'ver detalle', 'Altura de respaldo:   96,5 cm\r\nAltura de asiento:   48 cm\r\nProfundidad:   63,5 cm\r\nAncho:   44,5 cm\r\nPeso:   6,5 kg', 791, 'S', 'SPR02', 18),
(48, 'ver detalle', 'Altura de respaldo:   87,5 cm\r\nAltura de apoyabrazos:   64,5 cm\r\nAltura asiento:   43 cm\r\nProfundidad:   66 cm\r\nAncho:   65 cm\r\nPeso:   16 kg', 2152, 'S', 'SIX01', 19),
(49, 'ver detalle', 'Altura de respaldo:   87,5 cm\r\nAltura de apoyabrazos:   64,5 cm\r\nAltura asiento:   43 cm\r\nProfundidad:   66 cm\r\nAncho:   1,22 m\r\nPeso:   25 kg', 3302, 'S', 'SIX02', 20),
(50, 'ver detalle', '', 3966, 'S', 'SIX03', 21),
(51, '0,91 m', '', 988, 'S', 'BRX01', 22),
(52, '1,07 m', '', 1047, 'S', 'BRX02', 22),
(53, '1,22 m', '', 1121, 'S', 'BRX03', 22),
(54, 'ver detalle', 'Altura respaldo:   1,04 m\r\nAltura plano:   35,5 cm\r\nAltura apoyabrazos:   53,5 cm\r\nAncho:   66,5 cm\r\nAncho con apoyabrazos:   79 cm\r\nLargo:   2,02 m\r\nPeso con apoyabrazos:   43 kg\r\nPeso sin apoyabrazos:   41 kg\r\nAltura mesita:   23,5 cm', 3941, 'S', 'RCX01', 23),
(55, 'ver detalles', 'Altura respaldo:   1,04 m\r\nAltura plano:   35,5 cm\r\nAltura apoyabrazos:   53,5 cm\r\nAncho:   66,5 cm\r\nAncho con apoyabrazos:   79 cm\r\nLargo:   2,02 m\r\nPeso con apoyabrazos:   43 kg\r\nPeso sin apoyabrazos:   41 kg\r\nAltura mesita:   23,5 cm', 4359, 'S', 'RCX03', 24),
(56, 'ver detalle', '', 1689, 'S', 'RPX01', 26),
(57, 'ver detalle', 'Reposera plegable simple sin apoyabrazos', 777, 'S', 'RPX02', 27),
(58, 'ver detalle', 'Reposera plegable simple con apoyabrazos', 881, 'S', 'RPX03', 27),
(59, '', '', 4596, 'S', 'CBX01', 28),
(60, '0,60 x 0,80 m', '', 1637, 'S', 'MBT01', 29),
(61, '0,60 x 1,00 m', '', 1775, 'S', 'MBT02', 29),
(62, '0,60 x 1,20 m', '', 1852, 'S', 'MBT03', 29),
(63, '0,60 x 0,60 m', '', 1415, 'S', 'MBT04', 30),
(64, '0,80 x 0,80 m', '', 1775, 'S', 'MBT05', 30),
(65, '1,00 x 1,00 m', '', 2132, 'S', 'MBT06', 30),
(66, '', '', 717, 'S', 'MBP01', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombreApellido` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Comentarios` text COLLATE utf8_unicode_ci NOT NULL,
  `Telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Direccion` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=159 ;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nombreApellido`, `Comentarios`, `Telefono`, `Email`, `Direccion`) VALUES
(155, 'Esteban Nykon', 'Que demora tendria con la entrega de estos artìculos', '02214613486', 'esteban.nykon@hotmail.com', '16 Nª 4436'),
(156, 'Eduardo Barberis ', '', '1146391792', 'ehbarberis@gmail.com', 'David Peña 4330 - CABA'),
(157, 'Liliana Righero', 'Que buena la página!!!!!!!', '0221155084254', 'lilianarighero@hotmail.com', '40 N° 1751 La Plata'),
(158, 'Liliana Righero', 'Que buena la página!!!!!!!', '0221155084254', 'lilianarighero@hotmail.com', '40 N° 1751 La Plata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `idImagen` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `Epigrafe` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombreImagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Grupo` int(11) DEFAULT NULL,
  `idMueble` int(11) NOT NULL,
  PRIMARY KEY (`idImagen`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=297 ;

--
-- Volcar la base de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idImagen`, `Tipo`, `Epigrafe`, `nombreImagen`, `Grupo`, `idMueble`) VALUES
(8, 'M', NULL, 'MFO-ext-carrito.jpg', NULL, 2),
(9, 'C', NULL, 'MFO-ext-1min.jpg', 4, 2),
(10, 'G', 'Mesa fija ovalada extensible', 'MFO-ext-1.jpg', 4, 2),
(11, 'C', NULL, 'MFO-ext-2min.jpg', 5, 2),
(12, 'G', 'Mesa fija ovalada extensible', 'MFO-ext-2.jpg', 5, 2),
(13, 'C', NULL, 'MFO-ext-3min.jpg', 6, 2),
(14, 'G', 'Mesa fija ovalada extensible', 'MFO-ext-3.jpg', 6, 2),
(21, 'C', NULL, 'MFC-1min.jpg', 9, 3),
(22, 'G', 'Mesa fija cuadrada', 'MFC-1.jpg', 9, 3),
(23, 'M', NULL, 'MFT-carrito.jpg', NULL, 4),
(24, 'C', NULL, 'MFT-1min.jpg', 10, 4),
(25, 'G', 'Mesa fija rectangular', 'MFT-1.jpg', 10, 4),
(26, 'M', NULL, 'MFT-ext-carrito.jpg', NULL, 5),
(27, 'C', NULL, 'MFT-ext-1min.jpg', 11, 5),
(28, 'G', 'Mesa fija rectangular extensible', 'MFT-ext-1.jpg', 11, 5),
(49, 'M', NULL, 'MFR-carrito.jpg', NULL, 6),
(57, 'C', NULL, 'MFR-2min.jpg', 18, 6),
(58, 'G', 'Mesa fija redonda', 'MFR-2.jpg', 18, 6),
(59, 'C', NULL, 'MFR-3min.jpg', 19, 6),
(60, 'G', 'Mesa fija redonda', 'MFR-3.jpg', 19, 6),
(61, 'M', NULL, 'MPC-carrito.jpg', NULL, 7),
(62, 'C', NULL, 'MPC-1min.jpg', 20, 7),
(63, 'G', 'Mesa plegable cuadrada', 'MPC-1.jpg', 20, 7),
(68, 'C', NULL, 'MPC-4min.jpg', 23, 7),
(69, 'G', 'Mesa plegable cuadrada', 'MPC-4.jpg', 23, 7),
(74, 'M', NULL, 'MPT-carrito.jpg', NULL, 8),
(75, 'C', NULL, 'MPT-1min.jpg', 26, 8),
(76, 'G', 'Mesa plegable rectangular', 'MPT-1.jpg', 26, 8),
(77, 'C', NULL, 'MPT-2min.jpg', 27, 8),
(78, 'G', 'Mesa plegable rectangular', 'MPT-2.jpg', 27, 8),
(82, 'C', NULL, 'MPT-3min.jpg', 28, 8),
(83, 'G', 'Mesa plegable rectangular', 'MPT-3.jpg', 28, 8),
(84, 'M', NULL, 'MPR-carrito.jpg', NULL, 9),
(104, 'M', NULL, 'MFO-carrito.jpg', NULL, 1),
(105, 'C', NULL, 'MFO-1min.jpg', 38, 1),
(106, 'G', 'Mesa fija ovalada', 'MFO-1.jpg', 38, 1),
(107, 'C', NULL, 'MFO-2min.jpg', 39, 1),
(108, 'G', 'Mesa fija ovalada', 'MFO-2.jpg', 39, 1),
(109, 'C', NULL, 'MFO-3min.jpg', 40, 1),
(110, 'G', 'Mesa fija ovalada detalle', 'MFO-3.jpg', 40, 1),
(111, 'C', NULL, 'MFT-2min.jpg', 41, 4),
(112, 'G', 'Mesa fija rectangular extensible con sillas plegables de respaldo bajo', 'MFT-2.jpg', 41, 4),
(113, 'C', NULL, 'MFT-ext-3min.jpg', 42, 5),
(114, 'G', 'Mesa fija rectangular extensible', 'MFT-ext-3.jpg', 42, 5),
(115, 'C', NULL, 'MFT-ext-4min.jpg', 43, 5),
(116, 'G', 'Mesa fija rectangular extensible', 'MFT-ext-4.jpg', 43, 5),
(131, 'C', NULL, 'SPA01-1min.jpg', 46, 13),
(132, 'G', 'Silla plegable con respaldo alto con apoyabrazos', 'SPA01-1.jpg', 46, 13),
(135, 'C', NULL, 'SPA01-2min.jpg', 47, 13),
(136, 'G', 'Silla plegable con respaldo alto con apoyabrazos', 'SPA01-2.jpg', 47, 13),
(137, 'C', NULL, 'SPA01-3min.jpg', 48, 13),
(138, 'G', 'Silla plegable con respaldo alto con apoyabrazos', 'SPA01-3.jpg', 48, 13),
(141, 'C', NULL, 'SPA02-1min.jpg', 50, 14),
(142, 'G', 'Silla plegable con respaldo alto sin apoyabrazos', 'SPA02-1.jpg', 50, 14),
(143, 'C', NULL, 'SPA02-2min.jpg', 51, 14),
(144, 'G', 'Silla plegable con respaldo alto sin apoyabrazos', 'SPA02-2.jpg', 51, 14),
(145, 'C', NULL, 'SPA02-3min.jpg', 52, 14),
(146, 'G', 'Silla plegable con respaldo alto sin apoyabrazos', 'SPA02-3.jpg', 52, 14),
(147, 'C', NULL, 'SPB01-1min.jpg', 53, 15),
(148, 'G', 'Silla plegable con respaldo bajo con apoyabrazos', 'SPB01-1.jpg', 53, 15),
(149, 'C', NULL, 'SPB01-2min.jpg', 54, 15),
(150, 'G', 'Silla plegable con respaldo bajo con apoyabrazos', 'SPB01-2.jpg', 54, 15),
(151, 'C', NULL, 'SPB01-3min.jpg', 55, 15),
(152, 'G', 'Dos sillas con respaldo alto y dos sillas con respaldo bajo', 'SPB01-3.jpg', 55, 15),
(153, 'C', NULL, 'SPB02-1min.jpg', 56, 16),
(154, 'G', 'Silla plegable con respaldo bajo sin apoyabrazos ', 'SPB02-1.jpg', 56, 16),
(155, 'C', NULL, 'SPB02-2min.jpg', 57, 16),
(156, 'G', 'Silla plegable con respaldo bajo sin apoyabrazos con almohadón', 'SPB02-2.jpg', 57, 16),
(157, 'C', NULL, 'SPB02-3min.jpg', 58, 16),
(158, 'G', 'Silla plegable con respaldo bajo sin apoyabrazos con mesa fija rectangular', 'SPB02-3.jpg', 58, 16),
(159, 'C', NULL, 'SPR01-1min.jpg', 59, 17),
(160, 'G', 'Silla plegable recta con apoyabrazos', 'SPR01-1.jpg', 59, 17),
(161, 'C', NULL, 'SPR02-1min.jpg', 60, 18),
(162, 'G', 'Silla plegable recta sin apoyabrazos', 'SPR02-1.jpg', 60, 18),
(163, 'C', NULL, 'SIX01-1min.jpg', 61, 19),
(164, 'G', 'Sillón de un cuerpo', 'SIX01-1.jpg', 61, 19),
(165, 'C', NULL, 'SIX02-1min.jpg', 62, 20),
(166, 'G', 'Sillón de dos cuerpos', 'SIX02-1.jpg', 62, 20),
(167, 'C', NULL, 'SIX03-1min.jpg', 63, 21),
(168, 'G', 'Sillón de tres cuerpos', 'SIX03-1.jpg', 63, 21),
(169, 'C', NULL, 'BRX-1min.jpg', 64, 22),
(170, 'G', 'Banco romano', 'BRX-1.jpg', 64, 22),
(171, 'C', NULL, 'RCX01-1min.jpg', 65, 23),
(172, 'G', 'Reposera camastro con ruedas, una articulación, con apoyabrazos', 'RCX01-1.jpg', 65, 23),
(173, 'C', NULL, 'RCX01-2min.jpg', 66, 23),
(174, 'G', 'Reposera camastro con ruedas, una articulación, con apoyabrazos', 'RCX01-2.jpg', 66, 23),
(175, 'C', NULL, 'RCX01-3min.jpg', 67, 23),
(176, 'G', 'Reposera camastro con ruedas, una articulación, con apoyabrazos', 'RCX01-3.jpg', 67, 23),
(177, 'C', NULL, 'RCX03-1min.jpg', 68, 24),
(178, 'G', 'Reposera camastro con ruedas, dos articulaciones', 'RCX03-1.jpg', 68, 24),
(179, 'C', NULL, 'RCX03-2min.jpg', 69, 24),
(180, 'G', 'Reposera camastro con ruedas, dos articulaciones', 'RCX03-2.jpg', 69, 24),
(181, 'C', NULL, 'RCX03-3min.jpg', 70, 24),
(182, 'G', 'Reposera camastro con ruedas, dos articulaciones', 'RCX03-3.jpg', 70, 24),
(183, 'C', NULL, 'RCX03-4min.jpg', 71, 24),
(184, 'G', 'Reposera camastro con ruedas, dos articulaciones', 'RCX03-4.jpg', 71, 24),
(185, 'C', NULL, 'RCX03-5min.jpg', 72, 24),
(186, 'G', 'Reposera camastro con ruedas, dos articulaciones', 'RCX03-5.jpg', 72, 24),
(187, 'C', NULL, 'RPX01-1min.jpg', 73, 26),
(188, 'G', 'Reposera plegable extensible con lona', 'RPX01-1.jpg', 73, 26),
(189, 'C', NULL, 'RPX01-2min.jpg', 74, 26),
(190, 'G', 'Reposera plegable extensible con lona', 'RPX01-2.jpg', 74, 26),
(191, 'C', NULL, 'RPX03-1min.jpg', 75, 27),
(192, 'G', 'Reposera plegable simple con lona', 'RPX03-1.jpg', 75, 27),
(193, 'C', NULL, 'RPX03-2min.jpg', 76, 27),
(194, 'G', 'Reposera plegable simple con lona', 'RPX03-2.jpg', 76, 27),
(195, 'C', NULL, 'CBX01-1min.jpg', 77, 28),
(196, 'G', 'Carrobar', 'CBX01-1.jpg', 77, 28),
(197, 'C', NULL, 'CBX01-2min.jpg', 78, 28),
(198, 'G', 'Carrobar', 'CBX01-2.jpg', 78, 28),
(199, 'C', NULL, 'CBX01-3min.jpg', 79, 28),
(200, 'G', 'Carrobar', 'CBX01-3.jpg', 79, 28),
(205, 'C', NULL, 'MFC-2min.jpg', 80, 3),
(206, 'G', 'Mesa fija cuadrada con sillas fijas', 'MFC-2.jpg', 80, 3),
(207, 'C', NULL, 'MFC-3min.jpg', 81, 3),
(208, 'G', 'Mesa fija cuadrada. Detalle de patas.', 'MFC-3.jpg', 81, 3),
(209, 'C', NULL, 'MPR-1min.jpg', 82, 9),
(210, 'G', 'Mesa plegable redonda', 'MPR-1.jpg', 82, 9),
(217, 'C', NULL, 'MPR-2min.jpg', 83, 9),
(218, 'G', 'Mesa plegable redonda', 'MPR-2.jpg', 83, 9),
(219, 'C', NULL, 'MPR-3min.jpg', 84, 9),
(220, 'G', 'Mesa plegable redonda', 'MPR-3.jpg', 84, 9),
(227, 'M', NULL, 'MBT-carrito-rec.jpg', NULL, 29),
(234, 'C', NULL, 'MBT-01rec-min.jpg', 89, 29),
(235, 'G', 'Mesita baja fija rectangular', 'MBT-01rec.jpg', 89, 29),
(236, 'C', NULL, 'MBT-02rec-min.jpg', 90, 29),
(237, 'G', 'Mesita baja fija rectangular', 'MBT-02rec.jpg', 90, 29),
(238, 'M', NULL, 'MBTcuad-carrito.jpg', NULL, 30),
(239, 'C', NULL, 'MBT-03cuad-min.jpg', 91, 30),
(240, 'G', 'Mesita baja fija cuadrada', 'MBT-03cuad.jpg', 91, 30),
(241, 'C', NULL, 'MBT-02cuad-min.jpg', 92, 30),
(242, 'G', 'Mesita baja fija cuadrada', 'MBT-02cuad.jpg', 92, 30),
(243, 'C', NULL, 'MBT-01cuad-min.jpg', 93, 30),
(244, 'G', 'Mesita baja fija cuadrada', 'MBT-01cuad.jpg', 93, 30),
(245, 'M', NULL, 'MBP-carrito.jpg', NULL, 31),
(246, 'C', NULL, 'MBP-01min.jpg', 94, 31),
(247, 'G', 'Mesita baja plegable cuadrada', 'MBP-01.jpg', 94, 31),
(248, 'C', NULL, 'MBP-02min.jpg', 95, 31),
(249, 'G', 'Mesita baja plegable cuadrada', 'MBP-02.jpg', 95, 31),
(250, 'C', NULL, 'MBP-03min.jpg', 96, 31),
(251, 'G', 'Mesita baja plegable cuadrada', 'MBP-03.jpg', 96, 31),
(252, 'M', NULL, 'SFX01-carrito.jpg', NULL, 11),
(253, 'C', NULL, 'SFX01-1min.jpg', 97, 11),
(254, 'G', 'Silla fija con apoyabrazos', 'SFX01-1.jpg', 97, 11),
(255, 'C', NULL, 'SFX01-2min.jpg', 98, 11),
(256, 'G', 'Silla fija con apoyabrazos', 'SFX01-2.jpg', 98, 11),
(257, 'C', NULL, 'SFX01-3min.jpg', 99, 11),
(258, 'G', 'Silla fija con apoyabrazos', 'SFX01-3.jpg', 99, 11),
(259, 'M', NULL, 'SFX02-carrito.jpg', NULL, 12),
(260, 'C', NULL, 'SFX02-1min.jpg', 100, 12),
(261, 'G', 'Silla fija sin apoyabrazos', 'SFX02-1.jpg', 100, 12),
(262, 'C', NULL, 'SFX02-2min.jpg', 101, 12),
(263, 'G', 'Silla fija sin apoyabrazos', 'SFX02-2.jpg', 101, 12),
(266, 'M', NULL, 'SPA01-carrito.jpg', NULL, 13),
(267, 'M', NULL, 'SPA02-carrito.jpg', NULL, 14),
(268, 'M', NULL, 'MFC-carrito.jpg', NULL, 3),
(269, 'C', NULL, 'SPR02-2min.jpg', 102, 18),
(270, 'G', 'Silla plegable recta sin apoyabrazos', 'SPR02-2.jpg', 102, 18),
(271, 'C', NULL, 'SPR02-3min.jpg', 103, 18),
(272, 'G', 'Silla plegable recta sin apoyabrazos', 'SPR02-3.jpg', 103, 18),
(273, 'M', NULL, 'SPB01-carrito.jpg', NULL, 15),
(274, 'M', NULL, 'SPB02-carrito.jpg', NULL, 16),
(275, 'M', NULL, 'SPR01-carrito.jpg', NULL, 17),
(276, 'M', NULL, 'SPR02-carrito.jpg', NULL, 18),
(277, 'M', NULL, 'SIX01-carrito.jpg', NULL, 19),
(278, 'C', NULL, 'SIX01-2min.jpg', 104, 19),
(279, 'G', 'Sillón de un cuerpo con almohadón', 'SIX01-2.jpg', 104, 19),
(280, 'C', NULL, 'SIX01-3min.jpg', 105, 19),
(281, 'G', 'Sillón de un cuerpo detalle', 'SIX01-3.jpg', 105, 19),
(284, 'M', NULL, 'SIX02-carrito.jpg', NULL, 20),
(285, 'C', NULL, 'SIX02-2min.jpg', 107, 20),
(286, 'G', 'Sillón de dos cuerpos con almohadón', 'SIX02-2.jpg', 107, 20),
(289, 'C', NULL, 'BRX-2min.jpg', 108, 22),
(290, 'G', 'Banco romano', 'BRX-2.jpg', 108, 22),
(291, 'M', NULL, 'BRX-carrito.jpg', NULL, 22),
(292, 'M', NULL, 'RCX01-carrito.jpg', NULL, 23),
(293, 'M', NULL, 'RCX03-carrito.jpg', NULL, 24),
(294, 'M', NULL, 'RPX01-carrito.jpg', NULL, 26),
(295, 'M', NULL, 'RPX03-carrito.jpg', NULL, 27),
(296, 'M', NULL, 'CBX01-carrito.jpg', NULL, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muebles`
--

CREATE TABLE IF NOT EXISTS `muebles` (
  `idMueble` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMueble` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idSeccion` int(11) NOT NULL,
  `Orden` int(11) NOT NULL,
  PRIMARY KEY (`idMueble`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=32 ;

--
-- Volcar la base de datos para la tabla `muebles`
--

INSERT INTO `muebles` (`idMueble`, `nombreMueble`, `idSeccion`, `Orden`) VALUES
(1, 'Mesa fija ovalada', 1, 1),
(2, 'Mesa fija ovalada extensible', 1, 2),
(3, 'Mesa fija cuadrada', 1, 3),
(4, 'Mesa fija rectangular', 1, 4),
(5, 'Mesa fija rectangular extensible', 1, 5),
(6, 'Mesa fija redonda', 1, 6),
(7, 'Mesa plegable cuadrada', 1, 8),
(8, 'Mesa plegable rectangular', 1, 9),
(9, 'Mesa plegable redonda', 1, 7),
(11, 'Silla fija con apoyabrazos', 2, 1),
(12, 'Silla fija sin apoyabrazos', 2, 2),
(13, 'Silla plegable con respaldo alto con apoyabrazos', 2, 3),
(14, 'Silla plegable con respaldo alto sin apoyabrazos', 2, 4),
(15, 'Silla plegable con respaldo bajo con apoyabrazos ', 2, 5),
(16, 'Silla plegable con respaldo bajo sin apoyabrazos', 2, 6),
(17, 'Silla plegable recta con apoyabrazos', 2, 7),
(18, 'Silla plegable recta sin apoyabrazos', 2, 8),
(19, 'Sillón de 1 cuerpo', 3, 1),
(20, 'Sillón de 2 cuerpos', 3, 2),
(21, 'Sillón de 3 cuerpos', 3, 3),
(22, 'Banco romano', 4, 1),
(23, 'Reposera camastro con ruedas, una articulación', 5, 1),
(24, 'Reposera camastro con ruedas, dos articulaciones', 5, 2),
(26, 'Reposera plegable extensible con lona', 5, 3),
(27, 'Reposera plegable simple con lona', 5, 4),
(28, 'Carrobar', 6, 1),
(29, 'Mesita baja fija rectangular', 1, 10),
(30, 'Mesita baja fija cuadrada', 1, 11),
(31, 'Mesita baja plegable cuadrada', 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE IF NOT EXISTS `secciones` (
  `idSeccion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreSeccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idSeccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idSeccion`, `nombreSeccion`) VALUES
(1, 'Mesas de jardín'),
(2, 'Sillas de jardín'),
(3, 'Sillones de jardín'),
(4, 'Bancos de jardín'),
(5, 'Reposeras de jardín'),
(6, 'Varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `NombreUsuario`, `Clave`) VALUES
(2, '3285bdcc7cff9c538de4d89e763998ac', '84c19bf4d21d33d3fcc3e285ea499a21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas_envios`
--

CREATE TABLE IF NOT EXISTS `zonas_envios` (
  `idZona` int(11) NOT NULL AUTO_INCREMENT,
  `nombreZona` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `presupuestoTope` int(11) NOT NULL,
  `Costo` double NOT NULL,
  PRIMARY KEY (`idZona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `zonas_envios`
--

INSERT INTO `zonas_envios` (`idZona`, `nombreZona`, `presupuestoTope`, `Costo`) VALUES
(1, 'Zona 1', 0, 0),
(2, 'Zona 2', 15000, 200),
(3, 'Zona 3', 15000, 400);
