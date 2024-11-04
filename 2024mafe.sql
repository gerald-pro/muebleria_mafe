-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 21:32:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2024mafe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'ROPERO 1 CUERPO', '2024-06-03 01:49:09'),
(2, 'ROPERO 2 CUERPOS', '2024-06-03 01:49:17'),
(3, 'ROPERO 3 CUERPOS', '2024-06-03 01:49:37'),
(7, 'VITRINA 3 CUERPOS', '2024-06-12 07:14:14'),
(8, 'ZAPATERO 1 CUERPO', '2024-06-12 07:00:29'),
(9, 'MESA DE PLANCHAR', '2024-09-19 13:26:57'),
(10, 'ORGANIZADOR ', '2024-09-19 13:30:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text NOT NULL,
  `telefono` text NOT NULL,
  `direccion` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(3, 'Juan Villegas Martinez', 214748, 'juan@hotmail.com', '67856648', 'Calle 23 # 45 - 57', '1980-11-02', 23, '2024-10-29 09:44:10', '2024-10-29 14:44:10'),
(4, 'Pedro Pérez', 2147483647, 'pedro@gmail.com', '62334398', 'Calle 34 N33 -56', '1970-08-07', 38, '2024-10-28 16:12:53', '2024-10-28 21:12:53'),
(5, 'Miguel Murillo', 325235235, 'miguel@hotmail.com', '76543821', 'calle 34 # 34 - 23', '1976-03-04', 26, '2024-10-31 10:40:08', '2024-10-31 15:40:08'),
(19, 'Carmen Virginia Villalobos', 4321234, '', '39938029', 'Calle la paz 5to anillo', '0000-00-00', 4, '2024-10-28 16:11:13', '2024-10-28 21:11:13'),
(20, 'Osmar Oswaldo Perez ', 746583, '', '65234787', 'Barrio Roca y Coronado', '0000-00-00', -35, '2024-10-28 12:21:10', '2024-10-28 21:08:50'),
(21, 'Maria Luisa Salcedo', 1278675, '', '69784343', 'Barrio Roca y Coronado', '0000-00-00', 8, '2024-08-27 11:39:03', '2024-08-27 16:06:28'),
(22, 'Eri Jonathan Perez Salcedo', 45332334, '', '74565392', 'El fuerte', '0000-00-00', 8, '2024-06-12 07:41:05', '2024-06-12 12:41:05'),
(23, 'Pablo Herney Salvatierra', 1256766, '', '71238483', 'Calle los laureles ', '0000-00-00', 0, '0000-00-00 00:00:00', '2024-10-28 01:24:25'),
(24, 'Lidia Camargo', 1214234, '', '6878787', 'Calle San Marcos', '0000-00-00', 7, '2024-08-14 01:06:31', '2024-08-27 16:06:33'),
(25, 'Ingrid Camila Mamani', 1245464, '', '62053478', 'Calle Barrio Lindo', '0000-00-00', 0, '0000-00-00 00:00:00', '2024-08-28 03:58:34'),
(27, 'Samara Mendoza', 8175467, '', '68806135', 'Villa 1ro de Mayo', '0000-00-00', 3, '2024-09-19 14:07:00', '2024-09-19 19:07:00'),
(28, 'Juan Pablo Vargas', 2345689, '', '6290876', 'B.Roca y coronado', '0000-00-00', 7, '2024-10-28 22:51:53', '2024-10-29 03:51:53'),
(29, 'Davian Perez', 236544, '', '62050085', 'B.Roca y coronado', '0000-00-00', 4, '2024-10-30 09:40:25', '2024-10-30 14:40:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `pago` float NOT NULL,
  `fecha_pago` date NOT NULL,
  `total_pagado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `id_venta`, `pago`, `fecha_pago`, `total_pagado`) VALUES
(58, 214, 100, '2024-10-31', 0),
(59, 214, 200, '2024-10-31', 0),
(60, 214, 100, '2024-10-29', 0),
(62, 212, 400, '2024-10-29', 0),
(63, 213, 100, '2024-10-31', 0),
(64, 213, 300, '2024-10-31', 0),
(65, 213, 99, '2024-10-31', 0),
(66, 215, 100, '2024-10-31', 0),
(67, 215, 300, '2024-10-31', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `medidas` text NOT NULL,
  `color` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`, `medidas`, `color`) VALUES
(75, 3, 'R3VERPLO', 'Ropero', 'vistas/img/productos/R3VERPLO/366.jpg', 5, 0, 1200, 12, '2024-09-19 14:51:48', '120 CM X 190 CM', 'Color Verde Con Plomo'),
(77, 2, 'R2VERAZNE', 'Ropero', 'vistas/img/productos/R2VERAZNE/359.jpg', 14, 0, 850, 4, '2024-09-19 14:48:04', '100 CM X 190 CM', 'Color Verde Azul y Negro'),
(78, 7, 'V3AZROJ', 'Vitrina', 'vistas/img/productos/V3AZROJ/933.jpg', 19, 0, 1200, 13, '2024-09-19 13:39:13', '120 CM X 190 CM', 'Color Azul Con Rojo'),
(80, 2, 'R2ROS', 'Ropero', 'vistas/img/productos/R2ROS/771.jpg', 12, 0, 850, 0, '2024-09-19 13:03:48', '100 CM X 190 CM', 'Color Rosado'),
(81, 7, 'V3CAFB', 'Vitrina', 'vistas/img/productos/V3CAFB/732.jpg', 7, 0, 1200, 0, '2024-09-19 13:06:37', '120 CM X 190 CM', 'Color Cafe Con Blanco'),
(82, 1, 'R1ROSCA', 'Ropero', 'vistas/img/productos/R1ROSCA/451.jpg', 18, 0, 400, 2, '2024-09-19 22:22:56', '110 CM X 90 CM', 'Color Rosado Con Blanco'),
(83, 1, 'R1ROJ', 'Ropero', 'vistas/img/productos/R1ROJ/797.jpg', 14, 0, 400, 1, '2024-10-29 13:09:01', '110 CM X 90 CM', 'Color Rojo'),
(84, 1, 'R1AZB', 'Ropero', 'vistas/img/productos/R1AZB/461.jpg', 53, 0, 400, -34, '2024-10-31 15:40:08', '110 CM X 90 CM', 'Color Azul Con Blanco '),
(85, 9, 'MNEG', 'Mesa de planchar', 'vistas/img/productos/MNEG/851.jpg', 0, 0, 350, 8, '2024-09-19 22:01:50', '80 CM X 100 CM', 'Color Negro'),
(90, 10, 'ORVE', 'Organizador', 'vistas/img/productos/ORVE/975.jpg', 8, 0, 300, 13, '2024-10-29 14:44:10', '80 CM X 100 CM', 'Color Verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `perfil` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Jhon Alexnader Murillo Cardona', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/919.jpg', 1, '2024-10-29 21:39:53', '2024-10-30 02:39:53'),
(57, 'Juan Garizabal Chore', 'juan', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Vendedor', 'vistas/img/usuarios/juan/212.jpg', 1, '2024-09-19 18:41:37', '2024-09-19 23:41:37'),
(59, 'Ana Karina', 'ana', '$2a$07$asxx54ahjppf45sd87a5aumUskocpQucMnvwsUt.aC6WLWGcLNcY6', 'Vendedor', 'vistas/img/usuarios/ana/635.jpg', 0, '2017-12-26 19:21:40', '2024-08-14 05:12:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text NOT NULL,
  `impuesto` float DEFAULT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo` text NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `pagado` BOOLEAN NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`, `tipo`, `estado`) VALUES
(65, 101, 20, 1, '[{\"id\":\"74\",\"descripcion\":\"Mueble\",\"cantidad\":\"1\",\"stock\":\"40\",\"precio\":\"600\",\"total\":\"600\"},{\"id\":\"71\",\"descripcion\":\"Vitrina\",\"cantidad\":\"2\",\"stock\":\"7\",\"precio\":\"1000\",\"total\":\"2000\"}]', 26, 2600, 2626, 'Efectivo', '2024-10-24 22:59:48', 'Venta', 0),
(66, 102, 21, 1, '[{\"id\":\"74\",\"descripcion\":\"Mueble\",\"cantidad\":\"3\",\"stock\":\"37\",\"precio\":\"600\",\"total\":\"1800\"}]', 0, 1800, 1800, 'Efectivo', '2024-06-12 05:35:14', '', 0),
(67, 103, 22, 57, '[{\"id\":\"71\",\"descripcion\":\"Vitrina\",\"cantidad\":\"2\",\"stock\":\"5\",\"precio\":\"1000\",\"total\":\"2000\"}]', 0, 2000, 2000, 'Efectivo', '2024-06-12 05:37:16', '', 0),
(69, 105, 4, 1, '[{\"id\":\"74\",\"descripcion\":\"Mueble\",\"cantidad\":\"1\",\"stock\":\"36\",\"precio\":\"600\",\"total\":\"600\"}]', 60, 600, 660, 'Efectivo', '2024-06-12 05:49:09', '', 0),
(70, 106, 5, 1, '[{\"id\":\"71\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"4\",\"precio\":\"1000\",\"total\":\"1000\"}]', 30, 1000, 1030, 'Efectivo', '2024-06-12 05:51:35', '', 0),
(71, 107, 3, 57, '[{\"id\":\"74\",\"descripcion\":\"Mueble\",\"cantidad\":\"1\",\"stock\":\"35\",\"precio\":\"600\",\"total\":\"600\"}]', 0, 600, 600, 'Efectivo', '2024-06-12 06:11:58', '', 0),
(72, 108, 22, 57, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"2\",\"stock\":\"10\",\"precio\":\"1200\",\"total\":\"2400\"}]', 0, 2400, 2400, 'Efectivo', '2024-06-12 07:19:05', '', 0),
(73, 109, 5, 1, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2024-06-12 08:35:55', '', 0),
(74, 110, 21, 57, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2024-06-12 08:36:54', '', 0),
(75, 111, 21, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"29\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'Efectivo', '2024-06-12 12:15:04', '', 0),
(76, 112, 22, 57, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"3\",\"stock\":\"5\",\"precio\":\"1200\",\"total\":\"3600\"},{\"id\":\"77\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"850\",\"total\":\"850\"}]', 0, 4450, 4450, 'QR-98765432', '2024-09-03 23:32:18', 'Pedido', NULL),
(78, 113, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"28\",\"precio\":\"350\",\"total\":\"350\"}]', 3.5, 350, 353.5, 'Efectivo', '2024-06-17 16:23:28', '', 0),
(79, 114, 3, 1, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"4\",\"precio\":\"1200\",\"total\":\"1200\"}]', 924, 1200, 2124, 'Efectivo', '2024-06-17 19:33:54', '', 0),
(80, 115, 3, 1, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2024-06-20 13:13:05', '', 0),
(81, 116, 4, 1, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2024-07-09 21:28:33', '', 0),
(82, 117, 3, 1, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2024-07-11 18:44:59', '', 0),
(83, 118, 4, 1, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2024-07-11 18:50:28', '', 0),
(84, 119, 3, 1, '[{\"id\":\"77\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"850\",\"total\":\"850\"}]', 0, 850, 850, 'Efectivo', '2024-07-11 18:55:17', '', 0),
(85, 120, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"27\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'Efectivo', '2024-07-22 14:00:12', '', 0),
(86, 121, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"2\",\"stock\":\"25\",\"precio\":\"350\",\"total\":\"700\"}]', 0, 700, 700, 'Efectivo', '2024-07-22 14:07:05', '', 0),
(87, 122, 3, 1, '[{\"id\":\"77\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"850\",\"total\":\"850\"}]', 0, 850, 850, 'TC-63986221', '2024-07-24 14:02:40', '', 0),
(88, 123, 5, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"4\",\"stock\":\"21\",\"precio\":\"350\",\"total\":\"1400\"}]', 0, 1400, 1400, 'TC-76543265432', '2024-07-31 13:48:36', '', 0),
(89, 124, 3, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"20\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'QR-45678976', '2024-08-11 05:00:10', '', 0),
(90, 125, 3, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'QR-45678976', '2024-08-27 15:39:03', '', 2),
(91, 126, 3, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'Efectivo', '2024-08-11 18:42:32', 'Venta', 0),
(92, 127, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'QR-87654345', '2024-08-11 22:52:04', 'Venta', 0),
(96, 128, 21, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'QR-87654345', '2024-08-11 23:52:03', 'Pedido', 0),
(97, 129, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'Efectivo', '2024-08-12 16:06:00', 'Venta', 0),
(98, 130, 24, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"6\",\"stock\":\"8\",\"precio\":\"350\",\"total\":\"2100\"}]', 0, 2100, 2100, 'Efectivo', '2024-08-12 16:07:59', 'Pedido', 0),
(99, 131, 5, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"7\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'Efectivo', '2024-08-14 03:23:42', 'Venta', 0),
(100, 132, 21, 1, '[{\"id\":\"75\",\"descripcion\":\"Ropero\",\"cantidad\":\"2\",\"stock\":\"8\",\"precio\":\"1200\",\"total\":\"2400\"}]', 0, 2400, 2400, 'Efectivo', '2024-08-27 15:39:03', 'Venta', 2),
(101, 133, 20, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'Efectivo', '2024-08-27 15:38:59', 'Venta', 2),
(102, 134, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'Efectivo', '2024-08-27 15:38:58', 'Venta', 2),
(103, 135, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'QR-98765432', '2024-08-14 14:41:54', 'Venta', 0),
(104, 136, 19, 1, '[{\"id\":\"75\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"7\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2024-08-14 14:42:07', 'Pedido', 0),
(105, 137, 24, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'QR-00000876543', '2024-08-14 05:06:31', 'Pedido', 1),
(106, 138, 3, 1, '[{\"id\":\"75\",\"descripcion\":\"Ropero\",\"cantidad\":\"3\",\"stock\":\"3\",\"precio\":\"1200\",\"total\":\"3600\"}]', 0, 3600, 3600, 'Efectivo', '2024-08-26 04:26:22', 'Venta', 2),
(107, 139, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"86\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-123456789', '2024-08-28 12:11:01', 'Pedido', 1),
(108, 140, 5, 57, '[{\"id\":\"79\",\"descripcion\":\"Zapatero\",\"cantidad\":\"7\",\"stock\":\"80\",\"precio\":\"300\",\"total\":\"2100\"}]', 0, 2100, 2100, 'QR-87654321', '2024-08-26 04:58:15', 'Pedido', 0),
(110, 141, 4, 1, '[{\"id\":\"79\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"79\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-33333333333', '2024-08-26 16:27:17', 'Pedido', 2),
(111, 142, 19, 1, '[{\"id\":\"79\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"78\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-123456', '2024-08-28 04:01:46', 'Pedido', 0),
(112, 143, 4, 1, '[{\"id\":\"79\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"77\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-098765', '2024-08-27 15:20:55', 'Venta', 0),
(113, 144, 5, 1, '[{\"id\":\"75\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"1200\",\"total\":\"1200\"}]', 192, 1200, 1392, 'QR-12345676543', '2024-08-28 00:19:08', 'Pedido', 2),
(114, 145, 4, 1, '[{\"id\":\"79\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"76\",\"precio\":\"300\",\"total\":\"300\"}]', 48, 300, 348, 'QR-12378987654', '2024-09-13 12:28:48', 'Pedido', 1),
(119, 146, 5, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"85\",\"precio\":\"300\",\"total\":\"300\"}]', 48, 300, 348, 'QR-123456789098', '2024-08-27 16:10:44', 'Venta', 2),
(120, 147, 5, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"84\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-09876543', '2024-09-13 12:28:43', 'Pedido', 0),
(121, 148, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"83\",\"precio\":\"300\",\"total\":\"300\"},{\"id\":\"75\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1500, 1500, 'QR-098765432', '2024-08-27 16:18:08', 'Pedido', 2),
(122, 149, 19, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"82\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-98654', '2024-08-28 00:18:53', 'Venta', 2),
(123, 150, 3, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"81\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-5439876543', '2024-08-28 00:19:42', 'Venta', NULL),
(124, 151, 3, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"80\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-9876543', '2024-08-28 00:46:49', 'Pedido', 2),
(125, 152, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"79\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-000000000', '2024-09-13 12:28:38', 'Pedido', 1),
(127, 154, 5, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"77\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-123456', '2024-08-28 00:34:15', 'Venta', NULL),
(128, 155, 5, 1, '[{\"id\":\"75\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'QR-98765432', '2024-09-13 12:28:29', 'Pedido', 1),
(129, 156, 5, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"76\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-2345789', '2024-08-28 00:48:26', 'Venta', 2),
(130, 157, 4, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"75\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-095432', '2024-08-28 00:51:26', 'Venta', NULL),
(131, 158, 5, 1, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"74\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-1234567', '2024-08-28 04:51:18', 'Venta', NULL),
(132, 159, 5, 57, '[{\"id\":\"76\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"73\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-09875432', '2024-08-28 00:54:38', 'Venta', NULL),
(133, 160, 5, 1, '[{\"id\":\"79\",\"descripcion\":\"Zapatero\",\"cantidad\":\"1\",\"stock\":\"75\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'Efectivo', '2024-08-28 09:49:33', 'Venta', NULL),
(135, 161, 3, 1, '[{\"id\":\"75\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"1200\",\"total\":\"1200\"}]', 0, 1200, 1200, 'Efectivo', '2024-09-11 12:53:56', 'Pedido', 0),
(136, 162, 5, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"300\",\"total\":\"300\"}]', 36, 300, 264, 'QR-344562287', '2024-09-19 16:14:26', 'Pedido', 1),
(137, 163, 4, 1, '[{\"id\":\"77\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"850\",\"total\":\"850\"}]', 0, 850, 850, 'Efectivo', '2024-09-10 12:29:52', 'Pedido', 0),
(140, 165, 4, 1, '[{\"id\":\"78\",\"descripcion\":\"Vitrina\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"1200\",\"total\":\"1200\"}]', 60, 1200, 1140, 'QR-98765423', '2024-09-19 16:14:25', 'Pedido', 1),
(141, 166, 4, 1, '[{\"id\":\"75\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"1200\",\"total\":\"1200\"}]', 72, 1200, 1128, 'QR-9887676', '2024-09-19 18:13:15', 'Pedido', 0),
(142, 167, 3, 1, '[{\"id\":\"85\",\"descripcion\":\"Mesa de planchar\",\"cantidad\":\"1\",\"stock\":\"7\",\"precio\":\"350\",\"total\":\"350\"},{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"18\",\"precio\":\"400\",\"total\":\"400\"}]', 45, 750, 705, 'Efectivo', '2024-09-19 14:48:04', 'Venta', NULL),
(143, 168, 5, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"2\",\"stock\":\"15\",\"precio\":\"300\",\"total\":\"600\"}]', 72, 600, 528, 'Efectivo', '2024-09-19 14:45:33', 'Venta', NULL),
(146, 169, 3, 57, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"13\",\"precio\":\"300\",\"total\":\"300\"}]', 36, 300, 264, 'Efectivo', '2024-09-19 18:10:48', 'Venta', NULL),
(147, 170, 27, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"2\",\"stock\":\"11\",\"precio\":\"300\",\"total\":\"600\"},{\"id\":\"85\",\"descripcion\":\"Mesa de planchar\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"350\",\"total\":\"350\"}]', 47.5, 950, 902.5, 'QR-2434545', '2024-09-19 19:07:22', 'Pedido', 1),
(148, 171, 28, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"3\",\"stock\":\"8\",\"precio\":\"300\",\"total\":\"900\"}]', 63, 900, 837, 'QR-435645454', '2024-09-19 19:58:12', 'Pedido', 2),
(149, 172, 28, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"2\",\"stock\":\"6\",\"precio\":\"300\",\"total\":\"600\"}]', 18, 600, 582, 'Efectivo', '2024-09-19 19:56:11', 'Venta', NULL),
(150, 173, 4, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"2\",\"stock\":\"4\",\"precio\":\"300\",\"total\":\"600\"},{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"17\",\"precio\":\"400\",\"total\":\"400\"}]', 40, 1000, 960, 'QR-43443543', '2024-09-19 20:11:56', 'Venta', NULL),
(151, 174, 4, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"16\",\"precio\":\"400\",\"total\":\"400\"},{\"id\":\"83\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 800, 800, 'Efectivo', '2024-10-29 13:50:33', 'Pedido', 0),
(152, 175, 29, 57, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'QR-23423234', '2024-10-29 13:30:41', 'Pedido', 0),
(153, 176, 3, 1, '[{\"id\":\"85\",\"descripcion\":\"Mesa de planchar\",\"cantidad\":\"2\",\"stock\":\"4\",\"precio\":\"350\",\"total\":\"700\"},{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"6\",\"precio\":\"300\",\"total\":\"300\"}]', 60, 1000, 940, 'QR-475483934', '2024-09-19 21:50:40', 'Venta', NULL),
(154, 177, 4, 1, '[{\"id\":\"85\",\"descripcion\":\"Mesa de planchar\",\"cantidad\":\"3\",\"stock\":\"1\",\"precio\":\"350\",\"total\":\"1050\"}]', 0, 1050, 1050, 'Efectivo', '2024-10-29 13:29:34', 'Pedido', 0),
(155, 178, 29, 57, '[{\"id\":\"85\",\"descripcion\":\"Mesa de planchar\",\"cantidad\":\"1\",\"stock\":\"0\",\"precio\":\"350\",\"total\":\"350\"}]', 0, 350, 350, 'QR-5694564905', '2024-10-29 13:19:33', 'Pedido', 0),
(156, 179, 4, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"5\",\"precio\":\"300\",\"total\":\"300\"},{\"id\":\"82\",\"descripcion\":\"Ropero\",\"cantidad\":\"2\",\"stock\":\"18\",\"precio\":\"400\",\"total\":\"800\"}]', 66, 1100, 1034, 'Efectivo', '2024-09-19 22:22:56', 'Venta', NULL),
(157, 180, 4, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"4\",\"precio\":\"300\",\"total\":\"300\"}]', 12, 300, 288, 'QR-43343544', '2024-10-29 13:18:00', 'Pedido', 0),
(158, 181, 4, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'Efectivo', '2024-10-15 08:05:29', 'Venta', NULL),
(159, 182, 20, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"15\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'QR-167290871', '2024-10-29 13:12:46', 'Pedido', 0),
(160, 182, 20, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'QR-167290871', '2024-10-15 08:25:45', 'Pedido', NULL),
(162, 183, 5, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"2\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'Efectivo', '2024-10-21 15:57:29', 'Venta', NULL),
(175, 190, 4, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"11\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'QR-0000000000', '2024-10-29 13:16:46', 'Pedido', 0),
(176, 191, 4, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"1\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'Efectivo', '2024-10-29 13:44:02', 'Pedido', 0),
(200, 203, 20, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"41\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'Efectivo', '2024-10-28 16:21:10', 'Venta', NULL),
(201, 204, 28, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"40\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'Efectivo', '2024-10-28 16:24:38', 'Venta', NULL),
(205, 208, 5, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"40\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'QR-8765432', '2024-10-28 18:30:01', 'Venta', NULL),
(206, 209, 5, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"43\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'Efectivo', '2024-10-28 18:46:02', 'Venta', NULL),
(209, 212, 19, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"55\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'Efectivo', '2024-10-28 21:11:13', 'Venta', NULL),
(210, 213, 4, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"56\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'Efectivo', '2024-10-28 21:12:53', 'Venta', NULL),
(211, 214, 29, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"55\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'QR-123456789', '2024-10-28 22:07:15', 'Venta', NULL),
(212, 215, 28, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"54\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'QR-9999999', '2024-10-29 03:51:53', 'Venta', NULL),
(213, 216, 3, 1, '[{\"id\":\"90\",\"descripcion\":\"Organizador\",\"cantidad\":\"1\",\"stock\":\"8\",\"precio\":\"300\",\"total\":\"300\"}]', 0, 300, 300, 'Efectivo', '2024-10-29 14:44:10', 'Pedido', NULL),
(214, 217, 29, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"54\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'Efectivo', '2024-10-30 14:40:25', 'Venta', NULL),
(215, 218, 5, 1, '[{\"id\":\"84\",\"descripcion\":\"Ropero\",\"cantidad\":\"1\",\"stock\":\"53\",\"precio\":\"400\",\"total\":\"400\"}]', 0, 400, 400, 'Efectivo', '2024-10-31 15:40:08', 'Venta', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
