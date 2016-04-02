-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-04-2016 a las 16:52:13
-- Versión del servidor: 5.5.47-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda_virtual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `clave_cliente` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nom_cliente` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ape_paterno` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ape_materno` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo_electronico` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `telefono` bigint(15) DEFAULT NULL,
  `municipio` enum('Alvaro Obregon','Azcapotzalco','Benito Juarez','Coyoacan','Cuajimalpa de Morelos','Cuauhtemoc','Gustavo A. Madero','Iztacalco','Iztapalapa','Magdalena Contreras','Miguel Hidalgo','Milpa Alta','Tlahuac','Tlalpan','Venustiano Carranza','Xochimilco') COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`clave_cliente`,`correo_electronico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `clave_compra` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `fecha_compra` date DEFAULT NULL,
  `cliente_clave_cliente` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cliente_correo_electronico` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `forpago_clave_forma` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `forpago_tipo_tarjeta` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`clave_compra`,`forpago_clave_forma`,`forpago_tipo_tarjeta`),
  KEY `indice_cliente_compra` (`cliente_clave_cliente`,`cliente_correo_electronico`),
  KEY `indice_forma_pago_compra` (`forpago_clave_forma`,`forpago_tipo_tarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `clave_departamento` int(11) NOT NULL DEFAULT '0',
  `nom_departamento` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`clave_departamento`,`nom_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`clave_departamento`, `nom_departamento`) VALUES
(1, 'Accesorios y Belleza'),
(2, 'Electrónica'),
(3, 'Autos'),
(4, 'Bebés y Juguetes'),
(5, 'Celulares y Fotografía'),
(6, 'Cómputo y Tablets'),
(7, 'Deportes y Jardín'),
(8, 'Electrodomésticos'),
(9, 'Hogar y Muebles'),
(10, 'Películas y Libros'),
(11, 'Mascotas'),
(12, 'Videojuegos'),
(13, 'Papelería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE IF NOT EXISTS `forma_pago` (
  `clave_forma` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `tipo_tarjeta` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`clave_forma`,`tipo_tarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `clave_producto` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nom_producto` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `marca_producto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad_existente` int(4) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `dep_clave_departamento` int(11) DEFAULT NULL,
  `dep_nom_departamento` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`clave_producto`,`nom_producto`),
  KEY `indice_departamento_producto` (`dep_clave_departamento`,`dep_nom_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`clave_producto`, `nom_producto`, `marca_producto`, `descripcion`, `cantidad_existente`, `precio`, `dep_clave_departamento`, `dep_nom_departamento`) VALUES
('1', 'TV', 'LG', '32 pulgadas 720p HD', 10, 4300, 2, 'Electrónica'),
('10', 'Ipad AIR ', 'APPLE', 'Wifi 16GB Silver', 69, 9399, 6, 'Cómputo y Tablets'),
('11', 'Cafetera', 'Black & Decker', '12 Tazas', 42, 399, 8, 'Electrodomésticos'),
('12', 'Horno de Micoondas', 'Mabe', '0.7 pies Cúbicos Blanco', 34, 1149, 8, 'Electrodomésticos'),
('13', 'Estufa', 'Mabe', 'De piso 76 cm de acero inoxidable', 15, 8490, 8, 'Electrodomésticos'),
('14', 'Licuadora', 'Oster', '500 Watts', 40, 1999, 8, 'Electrodomésticos'),
('15', 'Plancha', 'Oster', 'Vapor Steam Iron Azul', 70, 348.99, 8, 'Electrodomésticos'),
('2', 'Bocinas', 'Altec', 'Bluetooth', 30, 890, 2, 'Electrónica'),
('3', 'Microcomponente', 'Panasonic', 'Bluetooth 20 Watts', 13, 1690, 2, 'Electrónica'),
('4', 'Blu-Ray', 'LG', 'Full HD', 50, 1498, 2, 'Electrónica'),
('5', 'Teléfono Alámbrico', 'Nakasaki', 'Blanco', 30, 190, 2, 'Electrónica'),
('6', 'Disco Duro Externo', 'Toshiba', 'Canvio Basic 2TB Negro', 20, 1949, 6, 'Cómputo y Tablets'),
('7', 'Teclado Inalámbrico', 'Microsoft', 'Negro Ergonomic', 47, 899, 6, 'Cómputo y Tablets'),
('8', 'USB', 'Kingston', 'Data Traveler SE3 8GB', 200, 99, 6, 'Cómputo y Tablets'),
('9', 'No Break', 'Koblenz', '900 VA', 15, 1890, 6, 'Cómputo y Tablets');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `compra_clave_compra` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `compra_clave_forma` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `compra_tipo_tarjeta` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `produc_clave_producto` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `produc_nom_producto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  KEY `indice_compra_ticket` (`compra_clave_compra`,`compra_clave_forma`,`compra_tipo_tarjeta`),
  KEY `indice_producto_ticket` (`produc_clave_producto`,`produc_nom_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fky_compra_cliente` FOREIGN KEY (`cliente_clave_cliente`, `cliente_correo_electronico`) REFERENCES `cliente` (`clave_cliente`, `correo_electronico`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fky_compra_formapago` FOREIGN KEY (`forpago_clave_forma`, `forpago_tipo_tarjeta`) REFERENCES `forma_pago` (`clave_forma`, `tipo_tarjeta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fky_producto_departamento` FOREIGN KEY (`dep_clave_departamento`, `dep_nom_departamento`) REFERENCES `departamento` (`clave_departamento`, `nom_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fky_ticket_compra` FOREIGN KEY (`compra_clave_compra`, `compra_clave_forma`, `compra_tipo_tarjeta`) REFERENCES `compra` (`clave_compra`, `forpago_clave_forma`, `forpago_tipo_tarjeta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fky_ticket_producto` FOREIGN KEY (`produc_clave_producto`, `produc_nom_producto`) REFERENCES `producto` (`clave_producto`, `nom_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
