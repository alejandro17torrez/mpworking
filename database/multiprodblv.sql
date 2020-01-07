-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para multipro
CREATE DATABASE IF NOT EXISTS `multipro` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `multipro`;

-- Volcando estructura para tabla multipro.banco
CREATE TABLE IF NOT EXISTS `banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `banco` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `tmoneda` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `coopid` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `coopid` (`coopid`),
  CONSTRAINT `banco_ibfk_1` FOREIGN KEY (`coopid`) REFERENCES `cooperativa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.banco: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.cargos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` (`id`, `desc`, `created_at`) VALUES
	(1, 'Presidente', '2019-11-25 15:45:12'),
	(2, 'Tesorero', '2019-11-25 15:45:16'),
	(3, 'Socio', '2019-11-25 15:45:31');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.catalogo
CREATE TABLE IF NOT EXISTS `catalogo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `cuenta` varchar(100) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `grupo` int(11) NOT NULL DEFAULT '0',
  `subgrupo` int(11) NOT NULL DEFAULT '0',
  `tipo` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `catalogo_ibfk_1` (`grupo`),
  KEY `catalogo_ibfk_2` (`subgrupo`),
  KEY `catalogo_ibfk_3` (`tipo`),
  CONSTRAINT `catalogo_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catalogo_ibfk_2` FOREIGN KEY (`subgrupo`) REFERENCES `subgrupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `catalogo_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `tipo_cuenta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.catalogo: ~67 rows (aproximadamente)
/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
INSERT INTO `catalogo` (`id`, `codigo`, `cuenta`, `grupo`, `subgrupo`, `tipo`, `created_at`) VALUES
	(93, '1101', 'CAJA', 7, 12, 5, '2019-11-24 14:46:55'),
	(94, '110101', 'CAJA GENERAL', 7, 12, 6, '2019-11-24 14:47:18'),
	(95, '110102', 'CAJA CHICA', 7, 12, 6, '2019-11-24 14:47:38'),
	(96, '5101', 'Gatos de administracion', 11, 20, 5, '2019-11-24 14:49:18'),
	(97, '510101', 'Papeleria y utilles de oficina', 11, 20, 6, '2019-11-24 14:49:49'),
	(98, '510102', 'Gestiones legales', 11, 20, 6, '2019-11-24 14:50:58'),
	(99, '510103', 'Mantenimiento y reparacion', 11, 20, 6, '2019-11-24 14:51:33'),
	(100, '510104', 'Eventos', 11, 20, 6, '2019-11-24 14:51:55'),
	(101, '1102', 'BANCO', 7, 12, 5, '2019-11-24 15:32:30'),
	(102, '1102n', 'BANCO', 7, 12, 6, '2019-11-24 15:35:04'),
	(103, '1103', 'Cuentas y documentos por cobrar', 7, 12, 5, '2019-11-27 07:58:06'),
	(104, '110301', 'Asociados por aportes al capital social', 7, 12, 6, '2019-11-27 07:59:42'),
	(105, '1104', 'Anticipos a justificar', 7, 12, 5, '2019-11-27 08:02:36'),
	(106, '110401', 'Socios', 7, 12, 6, '2019-11-27 08:06:05'),
	(107, '110402', 'Otros', 7, 12, 6, '2019-11-27 08:06:33'),
	(108, '1105', 'Pagos por anticipo', 7, 12, 5, '2019-11-27 08:07:22'),
	(109, '110501', 'a proveedores', 7, 12, 6, '2019-11-27 08:08:02'),
	(110, '110502', 'gastos pagados por anticipo', 7, 12, 6, '2019-11-27 08:08:41'),
	(111, '1106', 'IVA acreditable', 7, 12, 5, '2019-11-27 08:09:20'),
	(112, '1201', 'terrenos', 7, 13, 5, '2019-11-27 08:13:49'),
	(113, '120101', 'detalles', 7, 13, 6, '2019-11-27 08:14:20'),
	(114, '1202', 'edificios', 7, 13, 5, '2019-11-27 08:14:43'),
	(115, '120201', 'detalles', 7, 13, 6, '2019-11-27 08:15:07'),
	(116, '1203', 'depreciacion acumulada', 7, 13, 5, '2019-11-27 08:15:59'),
	(117, '120301', 'edificio', 7, 13, 6, '2019-11-27 08:16:25'),
	(118, '1204', 'Gastos de constitucion', 7, 13, 5, '2019-11-27 08:17:24'),
	(119, '120401', 'Detalle', 7, 13, 6, '2019-11-27 08:17:50'),
	(120, '1205', 'depositos en garantia', 7, 13, 6, '2019-11-27 08:18:32'),
	(121, '2101', 'cuentas por pagar', 8, 14, 5, '2019-11-27 08:19:12'),
	(122, '210101', 'detalle', 8, 14, 6, '2019-11-27 08:19:41'),
	(123, '2102', 'prestamos por pagar c/p', 8, 14, 5, '2019-11-27 08:21:05'),
	(124, '210201', 'CENCOVICOD', 8, 14, 6, '2019-11-27 08:21:42'),
	(125, '2104', 'retenciones por pagar', 8, 14, 5, '2019-11-27 08:22:23'),
	(126, '210401', 'compra de bienes y servicios', 8, 14, 6, '2019-11-27 08:22:59'),
	(127, '210402', 'servicios profesionales', 8, 14, 6, '2019-11-27 08:23:26'),
	(128, '2105', 'IVA por pagar', 8, 14, 5, '2019-11-27 08:23:55'),
	(129, '2201', 'prestamos por pagar l/p', 8, 15, 5, '2019-11-27 08:24:28'),
	(130, '220101', 'CENCOVICOD', 8, 15, 6, '2019-11-27 08:24:50'),
	(131, '3101', 'capital social', 9, 16, 5, '2019-11-27 09:34:21'),
	(132, '310101', 'detalle', 9, 16, 6, '2019-11-27 15:48:27'),
	(133, '3102', 'Aportes al capital', 9, 16, 5, '2019-11-27 15:49:17'),
	(134, '310201', 'aportes para terreno', 9, 16, 6, '2019-11-27 15:50:58'),
	(135, '310202', 'aporte para gastos administrativos', 9, 16, 6, '2019-11-27 15:51:26'),
	(136, '3204', 'utilidad o perdida acumulada', 9, 17, 5, '2019-11-27 15:54:04'),
	(137, '320401', 'utilidad acumulada', 9, 17, 6, '2019-11-27 15:54:35'),
	(138, '320402', 'perdida acumulada', 9, 17, 6, '2019-11-27 15:54:58'),
	(139, '3205', 'utilidad o perdida del ejercicio', 9, 17, 5, '2019-11-27 15:55:42'),
	(140, '320501', 'utilidad del ejecicio', 9, 17, 6, '2019-11-27 15:56:13'),
	(141, '320502', 'perdida del ejercicio', 9, 17, 6, '2019-11-27 15:56:34'),
	(142, '4101', 'ingresos financieros', 10, 18, 5, '2019-11-27 16:03:13'),
	(143, '410101', 'Ganancia por diferencial', 10, 18, 6, '2019-11-27 16:03:41'),
	(144, '410102', 'intereses bancarios', 10, 18, 6, '2019-11-27 16:05:19'),
	(145, '4201', 'otros ingresos', 10, 19, 5, '2019-11-27 16:06:54'),
	(146, '420101', 'detalle', 10, 19, 6, '2019-11-27 16:07:44'),
	(147, '4202', 'ingresos extraordinarios', 10, 19, 5, '2019-11-27 16:09:45'),
	(148, '420201', 'detalles', 10, 19, 6, '2019-11-27 16:10:11'),
	(149, '5102', 'gastos financieros', 11, 20, 5, '2019-11-27 16:11:19'),
	(150, '510201', 'Retenciones de Intereses en Cuentas de Ahorro ', 11, 20, 6, '2019-11-27 16:12:44'),
	(151, '510202', 'comisiones bancarias', 11, 20, 6, '2019-11-27 16:15:05'),
	(152, '510203', 'Intereses por prestamos', 11, 20, 6, '2019-11-27 16:16:21'),
	(153, '51020301', 'corrientes', 11, 20, 7, '2019-11-27 16:17:06'),
	(154, '51020302', 'moratorios', 11, 20, 7, '2019-11-27 16:17:58'),
	(155, '510204', 'deslizamiento monetario', 11, 20, 6, '2019-11-27 16:18:57'),
	(156, '5201', 'otros gastos', 11, 21, 5, '2019-11-27 16:20:08'),
	(157, '520101', 'detalle', 11, 21, 6, '2019-11-27 16:20:44'),
	(158, '5202', 'gastos deducibles', 11, 21, 5, '2019-11-27 16:21:37'),
	(159, '520201', 'multas dgi', 11, 21, 6, '2019-11-27 16:22:11');
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.cheques
CREATE TABLE IF NOT EXISTS `cheques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta_banco` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `numero_cheque` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipoMoneda` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` float NOT NULL,
  `cantidadLetras` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `concepto` int(11) NOT NULL DEFAULT '0',
  `comprobante_diario` int(11) NOT NULL DEFAULT '0',
  `paguese_a` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cheques_ibfk_1` (`comprobante_diario`),
  KEY `cheques_conceptos` (`concepto`),
  CONSTRAINT `cheques_conceptos` FOREIGN KEY (`concepto`) REFERENCES `cuentas_conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cheques_ibfk_1` FOREIGN KEY (`comprobante_diario`) REFERENCES `comprobante_diario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.cheques: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cheques` DISABLE KEYS */;
/*!40000 ALTER TABLE `cheques` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.comprobante_diario
CREATE TABLE IF NOT EXISTS `comprobante_diario` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo unico para cada registro del comprobante de diario',
  `asiento` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL COMMENT 'fecha de cada comprobante de diario.',
  `sumasIguales` float DEFAULT NULL COMMENT 'Sumas iguales de las cuentas.',
  `cooperativa_id` int(11) NOT NULL,
  `detalle_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cooperativas_fk` (`cooperativa_id`),
  KEY `detalle_id` (`detalle_id`),
  CONSTRAINT `cooperativas_fk` FOREIGN KEY (`cooperativa_id`) REFERENCES `cooperativa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalle_id` FOREIGN KEY (`detalle_id`) REFERENCES `cuentas_conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla para almacenar los comprobantes de diario de las cooperativas de vivienda';

-- Volcando datos para la tabla multipro.comprobante_diario: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `comprobante_diario` DISABLE KEYS */;
INSERT INTO `comprobante_diario` (`id`, `asiento`, `fecha`, `sumasIguales`, `cooperativa_id`, `detalle_id`, `created_at`) VALUES
	(2, 1, '2019-12-02 00:00:00', 0, 81, 30, '2019-12-02 10:44:58'),
	(5, 4, '2019-12-17 00:00:00', 0, 81, 30, '2019-12-02 16:57:28'),
	(6, 1, '2019-09-11 00:00:00', 0, 81, 15, '2019-12-03 10:19:43'),
	(7, 2, '2019-09-11 00:00:00', 0, 81, 15, '2019-12-03 10:25:47'),
	(8, 3, '2019-09-11 00:00:00', 0, 81, 15, '2019-12-03 10:37:18'),
	(17, 3, '2019-12-19 00:00:00', 0, 81, 15, '2019-12-04 16:52:12'),
	(18, 4, '2019-12-27 00:00:00', 0, 81, 15, '2019-12-04 16:54:46'),
	(19, 5, '2019-12-14 00:00:00', 0, 81, 32, '2019-12-07 12:49:38'),
	(20, 6, '2019-12-19 00:00:00', 0, 81, 32, '2019-12-07 16:47:35'),
	(21, 7, '2019-12-11 00:00:00', 0, 81, 32, '2019-12-07 16:50:52'),
	(24, 8, '2019-12-11 00:00:00', NULL, 81, 32, '2019-12-07 17:11:09'),
	(25, 9, '2019-12-18 00:00:00', NULL, 81, 32, '2019-12-07 17:18:13'),
	(26, 10, '2019-12-10 00:00:00', 0, 81, 32, '2019-12-07 17:20:05'),
	(27, 11, '2019-12-19 00:00:00', 0, 81, 28, '2019-12-08 13:49:11'),
	(28, 12, '2019-12-17 00:00:00', 0, 81, 28, '2019-12-08 13:54:25'),
	(29, 13, '2019-12-12 00:00:00', 0, 81, 28, '2019-12-08 14:04:17'),
	(30, 14, '2019-12-05 00:00:00', 0, 81, 30, '2019-12-08 14:07:46'),
	(31, 15, '2019-12-21 00:00:00', 0, 81, 28, '2019-12-08 14:09:00'),
	(32, 16, '2019-12-25 00:00:00', 0, 81, 30, '2019-12-08 14:10:24'),
	(33, 17, '2019-12-12 00:00:00', 0, 81, 30, '2019-12-08 15:56:48'),
	(34, 18, '2019-12-19 00:00:00', 0, 81, 28, '2019-12-08 15:58:56');
/*!40000 ALTER TABLE `comprobante_diario` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.conceptos
CREATE TABLE IF NOT EXISTS `conceptos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.conceptos: ~45 rows (aproximadamente)
/*!40000 ALTER TABLE `conceptos` DISABLE KEYS */;
INSERT INTO `conceptos` (`id`, `concepto`) VALUES
	(5, 'cuenta mayor'),
	(7, 'gastos de papeleria'),
	(8, 'gastos legales'),
	(9, 'mantenimiento y reparacion'),
	(10, 'eventos'),
	(11, 'salida de caja general'),
	(12, 'entrada de caja general'),
	(13, 'salida de caja chica'),
	(14, 'entrada de caja chica'),
	(15, 'entrada al banco'),
	(16, 'salida al banco'),
	(17, 'prestamo de dinero '),
	(18, 'pago total de deuda'),
	(19, 'abono de deuda'),
	(20, 'anticipo a proveedor'),
	(21, 'gastos pagados por anticipo '),
	(22, 'gastos pagados por anticipado'),
	(23, 'IVA acreditable'),
	(24, 'compra de edificio'),
	(25, 'compra de terreno'),
	(26, 'pago a abogados'),
	(27, 'pago a ministerio de gobernacion'),
	(28, 'pago a federacion de cooperativas'),
	(29, 'depositos en garantia '),
	(30, 'deuda por pagar'),
	(31, 'prestamo que hizo la cooperativa a una institucion financiera'),
	(32, 'retenciones por pagar'),
	(33, 'IVA por pagar'),
	(34, 'pago de impuestos'),
	(35, 'prestamos por pagar a largo plazo'),
	(36, 'Aportes al capitál social'),
	(37, 'ganacia por diferencial cambiario'),
	(38, 'intereses cambiarios'),
	(39, 'actividades varias'),
	(40, 'ingresos por actividades varias'),
	(41, 'ingresos extraordinarios'),
	(42, 'aporte al capital social'),
	(43, 'aporte para terreno'),
	(44, 'aporte para gastos administrativos'),
	(45, 'detalles de asociados al capital social'),
	(46, 'anticipo a justificar por un socio'),
	(47, 'anticipo a justificar por un tercero'),
	(48, 'depreciacion acumulada de x edificio'),
	(49, 'detalle de gastos de constitucion'),
	(50, 'compra de bienes y servicios a');
/*!40000 ALTER TABLE `conceptos` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.cooperativa
CREATE TABLE IF NOT EXISTS `cooperativa` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo unico para identificar a cada cooperativa\\n',
  `nombre_cooperativa` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre de cada cooperativa',
  `resolucion_cooperativa` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'resolucion de cada cooperativa',
  `numero_ruc` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='tabla para almacenar las cooperativas de viviendas ';

-- Volcando datos para la tabla multipro.cooperativa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cooperativa` DISABLE KEYS */;
INSERT INTO `cooperativa` (`id`, `nombre_cooperativa`, `resolucion_cooperativa`, `numero_ruc`, `created_at`) VALUES
	(80, 'multipro', '12345678', '1234561', '2019-11-24 14:34:59'),
	(81, 'solidaridad', '456671', '123453', '2019-11-24 14:35:13');
/*!40000 ALTER TABLE `cooperativa` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.cuentas_conceptos
CREATE TABLE IF NOT EXISTS `cuentas_conceptos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuentas_coop` int(11) NOT NULL DEFAULT '0',
  `conceptos` int(11) NOT NULL DEFAULT '0',
  `signo` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cuentas_conceptos_ibfk_2` (`conceptos`),
  KEY `cooperativa_cuentas` (`cuentas_coop`),
  CONSTRAINT `cooperativa_cuentas` FOREIGN KEY (`cuentas_coop`) REFERENCES `cuentas_cooperativas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cuentas_conceptos_ibfk_2` FOREIGN KEY (`conceptos`) REFERENCES `conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Amarre de todos los cocneptos a una o varias cuentas';

-- Volcando datos para la tabla multipro.cuentas_conceptos: ~47 rows (aproximadamente)
/*!40000 ALTER TABLE `cuentas_conceptos` DISABLE KEYS */;
INSERT INTO `cuentas_conceptos` (`id`, `cuentas_coop`, `conceptos`, `signo`, `created_at`) VALUES
	(9, 8, 5, '=', '2019-11-24 15:12:58'),
	(10, 9, 12, '+', '2019-11-24 15:14:32'),
	(11, 9, 11, '-', '2019-11-24 15:14:56'),
	(12, 10, 14, '+', '2019-11-24 15:15:27'),
	(13, 10, 13, '-', '2019-11-24 15:15:55'),
	(14, 11, 5, '=', '2019-11-24 15:16:32'),
	(15, 12, 7, '+', '2019-11-24 15:17:30'),
	(16, 13, 8, '+', '2019-11-24 15:17:55'),
	(17, 14, 9, '+', '2019-11-24 15:18:06'),
	(18, 15, 10, '+', '2019-11-24 15:18:15'),
	(19, 16, 5, '=', '2019-11-24 15:44:44'),
	(20, 17, 15, '+', '2019-11-24 15:46:00'),
	(21, 17, 16, '-', '2019-11-24 15:46:18'),
	(22, 18, 15, '+', '2019-11-24 15:46:29'),
	(23, 18, 16, '-', '2019-11-24 15:46:39'),
	(24, 19, 5, '=', '2019-11-27 16:35:14'),
	(25, 20, 37, '-', '2019-11-27 17:20:53'),
	(26, 21, 38, '-', '2019-11-27 17:21:29'),
	(27, 22, 5, '=', '2019-11-27 17:21:53'),
	(28, 23, 39, '-', '2019-11-27 17:23:49'),
	(29, 24, 5, '=', '2019-11-27 17:28:13'),
	(30, 25, 41, '-', '2019-11-27 17:28:40'),
	(31, 27, 5, '=', '2019-11-27 18:59:17'),
	(32, 28, 42, '-', '2019-11-27 18:59:39'),
	(33, 29, 5, '=', '2019-11-27 19:00:24'),
	(34, 30, 43, '-', '2019-11-27 19:00:45'),
	(35, 31, 44, '-', '2019-11-27 19:01:13'),
	(36, 48, 5, '=', '2019-11-27 22:10:25'),
	(37, 49, 45, '+', '2019-11-27 22:18:34'),
	(38, 50, 5, '=', '2019-11-27 22:22:48'),
	(39, 51, 46, '+', '2019-11-27 22:24:19'),
	(40, 52, 47, '+', '2019-11-27 22:25:08'),
	(41, 53, 5, '=', '2019-11-27 22:26:55'),
	(42, 54, 20, '+', '2019-11-27 22:27:36'),
	(43, 55, 21, '+', '2019-11-27 22:28:00'),
	(44, 56, 5, '=', '2019-11-27 22:46:43'),
	(45, 57, 5, '=', '2019-11-27 22:47:59'),
	(46, 58, 25, '+', '2019-11-27 23:01:20'),
	(47, 59, 5, '=', '2019-11-27 23:01:52'),
	(48, 60, 24, '+', '2019-11-27 23:02:46'),
	(49, 61, 5, '=', '2019-11-27 23:03:16'),
	(50, 62, 48, '+', '2019-11-27 23:06:50'),
	(51, 63, 5, '=', '2019-11-27 23:08:17'),
	(52, 64, 49, '+', '2019-11-27 23:08:49'),
	(53, 64, 5, '=', '2019-11-27 23:09:05'),
	(54, 42, 5, '=', '2019-11-27 23:14:05'),
	(55, 43, 50, '-', '2019-11-27 23:15:28'),
	(56, 45, 5, '=', '2019-11-27 23:15:56');
/*!40000 ALTER TABLE `cuentas_conceptos` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.cuentas_cooperativas
CREATE TABLE IF NOT EXISTS `cuentas_cooperativas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cooperativa` int(11) NOT NULL,
  `cuenta` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '',
  `saldo` float NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cooperativa` (`cooperativa`),
  KEY `cuenta` (`cuenta`),
  CONSTRAINT `cuentas_catalogo` FOREIGN KEY (`cuenta`) REFERENCES `catalogo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cuentas_cooperativas_ibfk_1` FOREIGN KEY (`cooperativa`) REFERENCES `cooperativa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.cuentas_cooperativas: ~54 rows (aproximadamente)
/*!40000 ALTER TABLE `cuentas_cooperativas` DISABLE KEYS */;
INSERT INTO `cuentas_cooperativas` (`id`, `cooperativa`, `cuenta`, `descripcion`, `saldo`, `create_at`) VALUES
	(8, 81, 93, '', 0, '2019-11-24 15:03:56'),
	(9, 81, 94, '', 230, '2019-12-08 15:56:48'),
	(10, 81, 95, '', 0, '2019-11-24 15:05:16'),
	(11, 81, 96, '', 0, '2019-11-24 15:05:26'),
	(12, 81, 97, '', 0, '2019-11-24 15:05:38'),
	(13, 81, 98, '', 0, '2019-11-24 15:05:46'),
	(14, 81, 99, '', 0, '2019-11-24 15:06:06'),
	(15, 81, 100, '', 0, '2019-11-24 15:06:17'),
	(16, 81, 101, '', 0, '2019-11-24 15:36:45'),
	(17, 81, 102, '1002056J', 5000, '2019-12-08 15:58:56'),
	(18, 81, 102, '1013467A', 0, '2019-11-24 15:38:17'),
	(19, 81, 142, '', 0, '2019-11-27 16:31:45'),
	(20, 81, 143, '', 0, '2019-11-27 16:32:04'),
	(21, 81, 144, '', 0, '2019-11-27 16:32:21'),
	(22, 81, 145, '', 0, '2019-11-27 16:32:38'),
	(23, 81, 146, '', -5000, '2019-12-08 15:58:56'),
	(24, 81, 147, '', 0, '2019-11-27 16:33:10'),
	(25, 81, 148, '', -230, '2019-12-08 15:56:48'),
	(27, 81, 131, '', 0, '2019-11-27 18:30:56'),
	(28, 81, 132, '', 0, '2019-12-08 14:01:12'),
	(29, 81, 133, '', 0, '2019-11-27 18:36:44'),
	(30, 81, 134, '', 0, '2019-11-27 18:36:56'),
	(31, 81, 135, '', 0, '2019-11-27 18:37:11'),
	(32, 81, 136, '', 0, '2019-11-27 18:37:27'),
	(33, 81, 137, '', 0, '2019-11-27 18:37:41'),
	(34, 81, 138, '', 0, '2019-11-27 18:37:59'),
	(35, 81, 139, '', 0, '2019-11-27 18:38:21'),
	(36, 81, 140, '', 0, '2019-11-27 18:38:38'),
	(37, 81, 141, '', 0, '2019-11-27 18:39:04'),
	(38, 81, 121, '', 0, '2019-11-27 21:46:58'),
	(39, 81, 122, '', 0, '2019-11-27 21:47:08'),
	(40, 81, 123, '', 0, '2019-11-27 21:47:18'),
	(41, 81, 124, '', 0, '2019-11-27 21:47:28'),
	(42, 81, 125, '', 0, '2019-11-27 21:47:42'),
	(43, 81, 126, '', 0, '2019-11-27 21:47:54'),
	(44, 81, 127, '', 0, '2019-11-27 21:48:03'),
	(45, 81, 128, '', 0, '2019-11-27 21:48:13'),
	(46, 81, 129, '', 0, '2019-11-27 21:48:38'),
	(47, 81, 130, '', 0, '2019-11-27 21:48:56'),
	(48, 81, 103, '', 0, '2019-11-27 21:53:30'),
	(49, 81, 104, '', 0, '2019-11-27 21:53:52'),
	(50, 81, 105, '', 0, '2019-11-27 21:54:04'),
	(51, 81, 106, '', 0, '2019-11-27 21:54:24'),
	(52, 81, 107, '', 0, '2019-11-27 21:54:48'),
	(53, 81, 108, '', 0, '2019-11-27 21:54:59'),
	(54, 81, 109, '', 0, '2019-11-27 21:55:11'),
	(55, 81, 110, '', 0, '2019-11-27 21:55:22'),
	(56, 81, 111, '', 0, '2019-11-27 21:55:36'),
	(57, 81, 112, '', 0, '2019-11-27 21:55:45'),
	(58, 81, 113, '', 0, '2019-11-27 21:56:02'),
	(59, 81, 114, '', 0, '2019-11-27 21:56:18'),
	(60, 81, 115, '', 0, '2019-11-27 21:56:29'),
	(61, 81, 116, '', 0, '2019-11-27 21:56:41'),
	(62, 81, 117, '', 0, '2019-11-27 21:56:51'),
	(63, 81, 118, '', 0, '2019-11-27 21:57:14'),
	(64, 81, 119, '', 0, '2019-11-27 21:57:23'),
	(65, 81, 120, '', 0, '2019-11-27 21:57:32');
/*!40000 ALTER TABLE `cuentas_cooperativas` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.detallesfactura
CREATE TABLE IF NOT EXISTS `detallesfactura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` float NOT NULL,
  `descripcion` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `total` float NOT NULL,
  `idfactura` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detallesfactura_ibfk_1` (`idfactura`),
  CONSTRAINT `detallesfactura_ibfk_1` FOREIGN KEY (`idfactura`) REFERENCES `facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.detallesfactura: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `detallesfactura` DISABLE KEYS */;
INSERT INTO `detallesfactura` (`id`, `cantidad`, `descripcion`, `precio`, `total`, `idfactura`) VALUES
	(1, 2, 'marcador color azul UNIDAD DE MEDIDA:unidad', 13, 26, 1),
	(2, 2, 'papelografo UNIDAD DE MEDIDA:unidad', 15, 30, 1),
	(3, 2, 'marcador color azul UNIDAD DE MEDIDA:unidad', 13, 26, 2),
	(4, 2, 'papelografo UNIDAD DE MEDIDA:unidad', 15, 30, 2),
	(5, 2, 'marcador color azul UNIDAD DE MEDIDA:unidad', 13, 26, 3),
	(6, 2, 'papelografo UNIDAD DE MEDIDA:unidad', 15, 30, 3),
	(13, 12, 's UNIDAD DE MEDIDA:s', 12, 144, 12),
	(14, 34, 's UNIDAD DE MEDIDA:s', 213, 7242, 13);
/*!40000 ALTER TABLE `detallesfactura` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.facturas
CREATE TABLE IF NOT EXISTS `facturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoMoneda` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `fecha` date NOT NULL,
  `proveedor` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `RUC` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `concepto` int(11) NOT NULL DEFAULT '0',
  `tipoPago` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `cuentabanco` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '0',
  `baucher` varchar(100) COLLATE utf8_spanish2_ci DEFAULT '0',
  `subtotal` float NOT NULL DEFAULT '-9',
  `IVA` float NOT NULL,
  `Total` float NOT NULL DEFAULT '-9',
  `comprobante_diario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `facturas_ibfk_1` (`comprobante_diario`),
  KEY `facturas_conceptos` (`concepto`),
  CONSTRAINT `facturas_conceptos` FOREIGN KEY (`concepto`) REFERENCES `cuentas_conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`comprobante_diario`) REFERENCES `comprobante_diario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.facturas: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
INSERT INTO `facturas` (`id`, `numero`, `tipoMoneda`, `fecha`, `proveedor`, `RUC`, `concepto`, `tipoPago`, `cuentabanco`, `baucher`, `subtotal`, `IVA`, `Total`, `comprobante_diario`) VALUES
	(1, '1', 'C$', '2019-09-11', 'MAYON', 'RUC-MAYON', 15, 'EFECTIVO', NULL, 'PAPEL BOND', 15, 2, 17, 6),
	(2, '1', 'C$', '2019-09-11', 'MAYON', 'RUC-MAYON', 15, 'EFECTIVO', NULL, 'PAPEL BOND', 15, 2, 17, 7),
	(3, '1', 'C$', '2019-09-11', 'MAYON', 'RUC-MAYON', 15, 'EFECTIVO', NULL, 'PAPEL BOND', 15, 2, 17, 8),
	(12, '12', 'C$', '2019-12-19', 'e', '123e', 15, '1102', '123AS', '1002056J', 144, 12, 1872, 17),
	(13, '23', 'C$', '2019-12-27', 'a', '12w', 15, '1102', '1002056J', '123ERT', 7242, 12, 94146, 18);
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.grupos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` (`id`, `grupo`, `created_at`) VALUES
	(7, 'activos', '2019-11-24 14:38:27'),
	(8, 'pasivos', '2019-11-24 14:38:31'),
	(9, 'capital', '2019-11-24 14:38:35'),
	(10, 'ingresos', '2019-11-24 14:38:40'),
	(11, 'egresos', '2019-11-24 14:38:44');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.movimientos
CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo unico de proceso de cuentas',
  `comprobante_id` int(11) NOT NULL DEFAULT '0',
  `cuenta_id` int(11) NOT NULL DEFAULT '0',
  `parcial` float DEFAULT NULL COMMENT 'detalle asignado en una cuenta.',
  `debe` float DEFAULT NULL COMMENT 'lo que ingresa a una cuenta general',
  `haber` float DEFAULT NULL COMMENT 'lo que sale de una cuenta del catalogo',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comprobante_fk` (`comprobante_id`),
  KEY `cuenta_fk` (`cuenta_id`),
  CONSTRAINT `comprobante_fk` FOREIGN KEY (`comprobante_id`) REFERENCES `comprobante_diario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cuenta_fk` FOREIGN KEY (`cuenta_id`) REFERENCES `cuentas_conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla para almacenar los movimientos de las cuentas dentro del comprobante\nde diario.';

-- Volcando datos para la tabla multipro.movimientos: ~78 rows (aproximadamente)
/*!40000 ALTER TABLE `movimientos` DISABLE KEYS */;
INSERT INTO `movimientos` (`id`, `comprobante_id`, `cuenta_id`, `parcial`, `debe`, `haber`, `created_at`) VALUES
	(3, 2, 30, 1000, NULL, NULL, '2019-12-02 10:44:58'),
	(4, 2, 29, NULL, NULL, 1000, '2019-12-02 10:44:58'),
	(5, 2, 10, 1000, NULL, NULL, '2019-12-02 10:44:58'),
	(6, 2, 9, NULL, 1000, NULL, '2019-12-02 10:44:58'),
	(11, 5, 30, 12, NULL, NULL, '2019-12-02 16:57:28'),
	(12, 5, 29, NULL, NULL, 12, '2019-12-02 16:57:28'),
	(13, 5, 20, 12, NULL, NULL, '2019-12-02 16:57:28'),
	(14, 5, 19, NULL, 12, NULL, '2019-12-02 16:57:28'),
	(15, 6, 15, 17, NULL, NULL, '2019-12-03 10:19:43'),
	(16, 6, 14, NULL, 17, NULL, '2019-12-03 10:19:43'),
	(17, 6, 11, 17, NULL, NULL, '2019-12-03 10:19:43'),
	(18, 6, 9, NULL, NULL, 17, '2019-12-03 10:19:43'),
	(19, 7, 15, 17, NULL, NULL, '2019-12-03 10:25:47'),
	(20, 7, 14, NULL, 17, NULL, '2019-12-03 10:25:47'),
	(21, 7, 11, 17, NULL, NULL, '2019-12-03 10:25:47'),
	(22, 7, 9, NULL, NULL, 17, '2019-12-03 10:25:47'),
	(23, 8, 15, 17, NULL, NULL, '2019-12-03 10:37:18'),
	(24, 8, 14, NULL, 17, NULL, '2019-12-03 10:37:18'),
	(25, 8, 11, 17, NULL, NULL, '2019-12-03 10:37:18'),
	(26, 8, 9, NULL, NULL, 17, '2019-12-03 10:37:18'),
	(41, 17, 15, 1872, NULL, NULL, '2019-12-04 16:52:12'),
	(42, 17, 14, NULL, 1872, NULL, '2019-12-04 16:52:12'),
	(43, 17, 21, 1872, NULL, NULL, '2019-12-04 16:52:12'),
	(44, 17, 19, NULL, NULL, 1872, '2019-12-04 16:52:12'),
	(45, 18, 15, 94146, NULL, NULL, '2019-12-04 16:54:45'),
	(46, 18, 14, NULL, 94146, NULL, '2019-12-04 16:54:45'),
	(47, 18, 21, 94146, NULL, NULL, '2019-12-04 16:54:45'),
	(48, 18, 19, NULL, NULL, 94146, '2019-12-04 16:54:45'),
	(49, 19, 32, 5000, NULL, NULL, '2019-12-07 12:49:38'),
	(50, 19, 31, NULL, NULL, 5000, '2019-12-07 12:49:38'),
	(51, 19, 20, 5000, NULL, NULL, '2019-12-07 12:49:38'),
	(52, 19, 19, NULL, 5000, NULL, '2019-12-07 12:49:38'),
	(53, 20, 32, 1200, NULL, NULL, '2019-12-07 16:47:34'),
	(54, 20, 31, NULL, NULL, 1200, '2019-12-07 16:47:35'),
	(55, 20, 20, 1200, NULL, NULL, '2019-12-07 16:47:35'),
	(56, 20, 19, NULL, 1200, NULL, '2019-12-07 16:47:35'),
	(57, 21, 32, 1500, NULL, NULL, '2019-12-07 16:50:52'),
	(58, 21, 31, NULL, NULL, 1500, '2019-12-07 16:50:52'),
	(59, 21, 20, 1500, NULL, NULL, '2019-12-07 16:50:52'),
	(60, 21, 19, NULL, 1500, NULL, '2019-12-07 16:50:52'),
	(66, 24, 32, 1235, NULL, NULL, '2019-12-07 17:11:09'),
	(67, 25, 32, 1234, NULL, NULL, '2019-12-07 17:18:13'),
	(68, 26, 32, 1230, NULL, NULL, '2019-12-07 17:20:05'),
	(69, 26, 31, NULL, NULL, 1230, '2019-12-07 17:20:05'),
	(70, 26, 20, 1230, NULL, NULL, '2019-12-07 17:20:05'),
	(71, 26, 19, NULL, 1230, NULL, '2019-12-07 17:20:05'),
	(72, 27, 28, 1300, NULL, NULL, '2019-12-08 13:49:10'),
	(73, 27, 27, NULL, NULL, 1300, '2019-12-08 13:49:10'),
	(74, 27, 20, 1300, NULL, NULL, '2019-12-08 13:49:11'),
	(75, 27, 19, NULL, 1300, NULL, '2019-12-08 13:49:11'),
	(76, 28, 28, 23, NULL, NULL, '2019-12-08 13:54:25'),
	(77, 28, 27, NULL, NULL, 23, '2019-12-08 13:54:25'),
	(78, 28, 20, 23, NULL, NULL, '2019-12-08 13:54:25'),
	(79, 28, 19, NULL, 23, NULL, '2019-12-08 13:54:25'),
	(80, 29, 28, 12, NULL, NULL, '2019-12-08 14:04:16'),
	(81, 29, 27, NULL, NULL, 12, '2019-12-08 14:04:16'),
	(82, 29, 20, 12, NULL, NULL, '2019-12-08 14:04:16'),
	(83, 29, 19, NULL, 12, NULL, '2019-12-08 14:04:17'),
	(84, 30, 30, 88, NULL, NULL, '2019-12-08 14:07:45'),
	(85, 30, 29, NULL, NULL, 88, '2019-12-08 14:07:45'),
	(86, 30, 20, 88, NULL, NULL, '2019-12-08 14:07:45'),
	(87, 30, 19, NULL, 88, NULL, '2019-12-08 14:07:45'),
	(88, 31, 28, 12, NULL, NULL, '2019-12-08 14:08:59'),
	(89, 31, 27, NULL, NULL, 12, '2019-12-08 14:09:00'),
	(90, 31, 20, 12, NULL, NULL, '2019-12-08 14:09:00'),
	(91, 31, 19, NULL, 12, NULL, '2019-12-08 14:09:00'),
	(92, 32, 30, 12, NULL, NULL, '2019-12-08 14:10:23'),
	(93, 32, 29, NULL, NULL, 12, '2019-12-08 14:10:24'),
	(94, 32, 20, 12, NULL, NULL, '2019-12-08 14:10:24'),
	(95, 32, 19, NULL, 12, NULL, '2019-12-08 14:10:24'),
	(96, 33, 30, 230, NULL, NULL, '2019-12-08 15:56:48'),
	(97, 33, 29, NULL, NULL, 230, '2019-12-08 15:56:48'),
	(98, 33, 10, 230, NULL, NULL, '2019-12-08 15:56:48'),
	(99, 33, 9, NULL, 230, NULL, '2019-12-08 15:56:48'),
	(100, 34, 28, 5000, NULL, NULL, '2019-12-08 15:58:56'),
	(101, 34, 27, NULL, NULL, 5000, '2019-12-08 15:58:56'),
	(102, 34, 20, 5000, NULL, NULL, '2019-12-08 15:58:56'),
	(103, 34, 19, NULL, 5000, NULL, '2019-12-08 15:58:56');
/*!40000 ALTER TABLE `movimientos` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.recibos_egresos
CREATE TABLE IF NOT EXISTS `recibos_egresos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo unico para cada recibo',
  `numeroRecibo` int(11) NOT NULL COMMENT 'numero de cada recibo',
  `tipoIndividuo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'si es un socio o un tercero',
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre del individuo',
  `tipoMoneda` varchar(4) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'tipo de moneda',
  `cantidad` float NOT NULL COMMENT 'cantidad en numeros',
  `concepto` int(11) NOT NULL DEFAULT '0' COMMENT 'concepto del recibo de egresos',
  `descripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'descripcion del recibo de egresos',
  `cajaobanco` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `numeroBoucher` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'n boucher en caso que haya sido egreso por depósito de una cuenta a otra',
  `lugar` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'lugar donde se dió la operación',
  `fecha` datetime NOT NULL COMMENT 'fecha específica',
  `cantidadLetras` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'cantidad en letras',
  `comprobante_diario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `recibos_egresos_ibfk_1` (`comprobante_diario`),
  KEY `conceptos_reciboEgreso` (`concepto`),
  CONSTRAINT `conceptos_reciboEgreso` FOREIGN KEY (`concepto`) REFERENCES `cuentas_conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recibos_egresos_ibfk_1` FOREIGN KEY (`comprobante_diario`) REFERENCES `comprobante_diario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla para almacenar los recibos de egresos de las cooperativas de viviendas';

-- Volcando datos para la tabla multipro.recibos_egresos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `recibos_egresos` DISABLE KEYS */;
/*!40000 ALTER TABLE `recibos_egresos` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.recibos_ingreso
CREATE TABLE IF NOT EXISTS `recibos_ingreso` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo unico para cada recibo',
  `numeroRecibo` int(11) NOT NULL COMMENT 'numero de recibo concatenado con el id autoincrementable para asi poder repetirlo cada mes\\npor numeros de asiento.',
  `tipoIndividuo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0' COMMENT 'registra si el individuo pertenece a la c',
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'registrar el nombre del individuo',
  `tipoMoneda` varchar(2) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'tipo de moneda',
  `cantidad` float NOT NULL COMMENT 'la cantidad en numeros',
  `cantidadLetras` varchar(1200) COLLATE utf8_spanish2_ci NOT NULL,
  `concepto` int(11) NOT NULL DEFAULT '0' COMMENT 'concepto',
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT '0',
  `cajaobanco` varchar(50) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `numeroBoucher` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'numero de boucher en caso que sea depósito',
  `lugar` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'lugar',
  `fecha` datetime NOT NULL COMMENT 'fecha',
  `comprobante_diario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `recibos_ingreso_ibfk_1` (`comprobante_diario`),
  KEY `concpetos` (`concepto`),
  CONSTRAINT `concpetos` FOREIGN KEY (`concepto`) REFERENCES `cuentas_conceptos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `recibos_ingreso_ibfk_1` FOREIGN KEY (`comprobante_diario`) REFERENCES `comprobante_diario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla para recepcionar recibos de ingresos';

-- Volcando datos para la tabla multipro.recibos_ingreso: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `recibos_ingreso` DISABLE KEYS */;
INSERT INTO `recibos_ingreso` (`id`, `numeroRecibo`, `tipoIndividuo`, `nombre`, `tipoMoneda`, `cantidad`, `cantidadLetras`, `concepto`, `descripcion`, `cajaobanco`, `numeroBoucher`, `lugar`, `fecha`, `comprobante_diario`, `created_at`) VALUES
	(2, 1, 'Socio', 'Julio', 'C$', 1000, 'xxxxx', 30, '', '110101', '', 'MATAGALPA , Matagalpa', '2019-12-02 00:00:00', 2, '2019-12-02 10:44:58'),
	(5, 1, 'Socio', 'Julio', 'C$', 12, 'doce córdobas netos', 30, '1002056J', '1102', '123ER', 'MATAGALPA , San Dionisio', '2019-12-17 00:00:00', 5, '2019-12-02 16:57:28'),
	(6, 12, 'Tercero', 'Elyin Soza', 'C$', 5000, 'Cinco mil córdobas netos', 32, '1002056J', '1102', '123454', 'MATAGALPA , Esquipulas', '2019-12-14 00:00:00', 19, '2019-12-07 12:49:38'),
	(7, 12, 'Socio', 'Rafael', 'C$', 1200, 'Mil doscientos córdobas netos', 32, '1002056J', '1102', '12345', 'MATAGALPA , Esquipulas', '2019-12-19 00:00:00', 20, '2019-12-07 16:47:34'),
	(8, 12, 'Socio', 'Rafael', 'C$', 1500, 'Mil quiñentos córdobas netos', 32, '1002056J', '1102', '12345', 'MATAGALPA , San Dionisio', '2019-12-11 00:00:00', 21, '2019-12-07 16:50:52'),
	(11, 45, 'Socio', 'Maria', 'C$', 1235, 'Mil docientos treinta y cinco córdobas netos', 32, '1002056J', '1102', '123435', 'MATAGALPA , San Dionisio', '2019-12-11 00:00:00', 24, '2019-12-07 17:11:09'),
	(12, 12, 'Socio', 'Julio', 'C$', 1234, 'Mil docientos treita y cuatro córdobas netos', 32, '1002056J', '1102', '12345', 'MATAGALPA , La Dalia', '2019-12-18 00:00:00', 25, '2019-12-07 17:18:13'),
	(13, 12, 'Socio', 'Maria', 'C$', 1230, 'Mil docientos treita córdobas netos', 32, '1002056J', '1102', '123456', 'MATAGALPA , Matagalpa', '2019-12-10 00:00:00', 26, '2019-12-07 17:20:05'),
	(14, 12, 'Tercero', 'Lilly Soza', 'C$', 1300, 'Mil trecientos córdobas netos', 28, '1002056J', '1102', '12345', 'MATAGALPA , Esquipulas', '2019-12-19 00:00:00', 27, '2019-12-08 13:49:10'),
	(15, 12, 'Socio', 'Maria', 'C$', 23, 'Veite y tres córdobas netos', 28, '1002056J', '1102', '12334', 'MATAGALPA , Esquipulas', '2019-12-17 00:00:00', 28, '2019-12-08 13:54:25'),
	(16, 12, 'Socio', 'Maria', 'C$', 12, 'doce', 28, '1002056J', '1102', '12345', 'MATAGALPA , La Dalia', '2019-12-12 00:00:00', 29, '2019-12-08 14:04:16'),
	(17, 15, 'Socio', 'Maria', 'C$', 88, 'Ochenta y ocho', 30, '1002056J', '1102', '1234567', 'MATAGALPA , Matagalpa', '2019-12-05 00:00:00', 30, '2019-12-08 14:07:45'),
	(18, 45, 'Socio', 'Maria', 'C$', 12, 'doce', 28, '1002056J', '1102', '12345', 'MATAGALPA , La Dalia', '2019-12-21 00:00:00', 31, '2019-12-08 14:08:59'),
	(19, 23, 'Socio', 'Maria', 'C$', 12, 'doce', 30, '1002056J', '1102', '12345', 'MATAGALPA , La Dalia', '2019-12-25 00:00:00', 32, '2019-12-08 14:10:23'),
	(20, 78, 'Socio', 'Maria', 'C$', 230, 'Docientos treita córdobas netos', 30, '', '110101', '', 'MATAGALPA , Matagalpa', '2019-12-12 00:00:00', 33, '2019-12-08 15:56:48'),
	(21, 45, 'Tercero', 'Lilly Soza', 'C$', 5000, 'Cinco mil córdobas netos', 28, '1002056J', '1102', '12345', 'MATAGALPA , San Dionisio', '2019-12-19 00:00:00', 34, '2019-12-08 15:58:56');
/*!40000 ALTER TABLE `recibos_ingreso` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.retenciones
CREATE TABLE IF NOT EXISTS `retenciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(140) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(140) COLLATE utf8_spanish2_ci NOT NULL,
  `ruc` varchar(140) COLLATE utf8_spanish2_ci NOT NULL,
  `numerofactura` int(11) NOT NULL,
  `valor` float NOT NULL,
  `concepto` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `comprobante_diario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `retenciones_ibfk_1` (`comprobante_diario`),
  CONSTRAINT `retenciones_ibfk_1` FOREIGN KEY (`comprobante_diario`) REFERENCES `comprobante_diario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.retenciones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `retenciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `retenciones` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.retiros
CREATE TABLE IF NOT EXISTS `retiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `retiro_por` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_moneda` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `monto` float NOT NULL,
  `motivo` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `comprobante_diario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `retiros_ibfk_1` (`comprobante_diario`),
  CONSTRAINT `retiros_ibfk_1` FOREIGN KEY (`comprobante_diario`) REFERENCES `comprobante_diario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.retiros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `retiros` DISABLE KEYS */;
/*!40000 ALTER TABLE `retiros` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.socios
CREATE TABLE IF NOT EXISTS `socios` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo unico para cada socio por cooperativa',
  `nombreI` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'primer nombre, campo obligatorio',
  `nombreII` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'segundo nombre, campo opcional',
  `apellidoI` varchar(45) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'primer apellidado campo obligatorio',
  `apellidoII` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL COMMENT 'segundo apellido campo opcional',
  `fechaNacimiento` datetime NOT NULL COMMENT 'fecha de nacimiento del socio por cooperativa',
  `cedula` varchar(14) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'cedula de identificacion del socio por cooperativa',
  `cargo` int(11) NOT NULL,
  `cooperativa_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `socios_ibfk_1` (`cargo`),
  KEY `socios_ibfk_2` (`cooperativa_id`),
  CONSTRAINT `socios_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `socios_ibfk_2` FOREIGN KEY (`cooperativa_id`) REFERENCES `cooperativa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Tabla donde se administran los socios de cada cooperativa';

-- Volcando datos para la tabla multipro.socios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `socios` DISABLE KEYS */;
INSERT INTO `socios` (`id`, `nombreI`, `nombreII`, `apellidoI`, `apellidoII`, `fechaNacimiento`, `cedula`, `cargo`, `cooperativa_id`, `created_at`) VALUES
	(1, 'Maria', 'Paula', 'Huerta', 'Montoya', '2019-11-25 15:50:48', '4413456781234y', 1, 81, '2019-11-25 15:51:04'),
	(2, 'Rafael', 'Enrrique', 'Corrales', 'Khul', '2019-11-25 15:53:15', '4411311960001Y', 2, 81, '2019-11-25 15:53:56'),
	(3, 'Katerine', 'Juidth', 'Calero', 'Montenegro', '2019-11-25 15:54:51', '4415634892220T', 3, 81, '2019-11-25 15:55:05'),
	(4, 'Julio', 'Miguel', 'Choza', 'Herrera', '1989-10-24 10:42:28', '4412410890002F', 3, 81, '2019-12-02 10:42:56');
/*!40000 ALTER TABLE `socios` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.subgrupos
CREATE TABLE IF NOT EXISTS `subgrupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subgrupo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.subgrupos: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `subgrupos` DISABLE KEYS */;
INSERT INTO `subgrupos` (`id`, `subgrupo`, `created_at`) VALUES
	(12, 'activo corriente', '2019-11-24 14:38:55'),
	(13, 'activo no correinte', '2019-11-24 14:39:01'),
	(14, 'pasivo corriente', '2019-11-24 14:39:07'),
	(15, 'pasivo no corriente', '2019-11-24 14:39:12'),
	(16, 'capital contribuido', '2019-11-24 14:40:25'),
	(17, 'capital ganado', '2019-11-24 14:40:30'),
	(18, 'igresos operativos', '2019-11-24 14:40:37'),
	(19, 'ingresos no operativos', '2019-11-24 14:40:49'),
	(20, 'egresos operativos', '2019-11-24 14:40:57'),
	(21, 'egresos no operativos', '2019-11-24 14:41:03'),
	(22, 'liquidaciones', '2019-11-24 14:41:14');
/*!40000 ALTER TABLE `subgrupos` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.tipo_cuenta
CREATE TABLE IF NOT EXISTS `tipo_cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla multipro.tipo_cuenta: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_cuenta` DISABLE KEYS */;
INSERT INTO `tipo_cuenta` (`id`, `tipo`, `created_at`) VALUES
	(5, 'cuenta', '2019-11-24 14:41:28'),
	(6, 'estados', '2019-11-24 14:41:31'),
	(7, 'detalles', '2019-11-24 14:41:35'),
	(8, 'detalles de detalles', '2019-11-24 14:41:43');
/*!40000 ALTER TABLE `tipo_cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla multipro.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_cooperativa` int(11) NOT NULL DEFAULT '0',
  `usuario` varchar(24) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `create_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `usarios_fkibk_1` (`id_cooperativa`),
  CONSTRAINT `usarios_fkibk_1` FOREIGN KEY (`id_cooperativa`) REFERENCES `cooperativa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci COMMENT='esta tabla almacenará los usuarios del sistema';

-- Volcando datos para la tabla multipro.usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `password`, `id_cooperativa`, `usuario`, `create_at`) VALUES
	(6, '123', 80, 'admin', '2019-11-24 14:37:16'),
	(8, '456', 81, 'soli', '2019-11-24 14:37:25');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
