-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.24-log - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla castanae.accesos
DROP TABLE IF EXISTS `accesos`;
CREATE TABLE IF NOT EXISTS `accesos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Instante (fecha-hora) en que se realizó el acceso a la página.',
  `session_id` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Id de HttpSession, para distinguir los nuevos accesos de las idas y venidas de un mismo usuario navegando por la web.',
  `url` varchar(1000) COLLATE utf8_spanish_ci NOT NULL COMMENT 'URL mediante la que accede el navegador',
  `ip` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'IP de la maquina cliente',
  `observaciones` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Registra los accesos a la pagina principal de la web';

-- Volcando datos para la tabla castanae.accesos: 12 rows
/*!40000 ALTER TABLE `accesos` DISABLE KEYS */;
INSERT INTO `accesos` (`id`, `timestamp`, `session_id`, `url`, `ip`, `observaciones`) VALUES
	(1, '2014-06-11 17:41:47', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(2, '2014-06-11 17:46:15', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(3, '2014-06-11 17:47:53', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(4, '2014-06-11 17:49:31', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(5, '2014-06-11 17:49:59', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(6, '2014-06-11 17:50:07', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(7, '2014-06-11 17:50:38', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(8, '2014-06-11 17:50:51', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(9, '2014-06-11 17:50:58', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(10, '2014-06-11 17:51:08', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(11, '2014-06-11 17:51:18', '594mqirlt4b23un6t433erujm0', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(12, '2014-06-12 12:08:06', '0a5k8s4n1cugiuaor21fgdqq17', '/castanae/', '127.0.0.1', 'acceso la pagina principal index.php'),
	(13, '2014-06-12 15:22:04', '0a5k8s4n1cugiuaor21fgdqq17', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(14, '2014-06-12 15:25:54', '0a5k8s4n1cugiuaor21fgdqq17', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php'),
	(15, '2014-06-12 15:28:28', '0a5k8s4n1cugiuaor21fgdqq17', '/castanae/index.php', '127.0.0.1', 'acceso la pagina principal index.php');
/*!40000 ALTER TABLE `accesos` ENABLE KEYS */;


-- Volcando estructura para tabla castanae.contactos
DROP TABLE IF EXISTS `contactos`;
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `comentarios` text COLLATE utf8_spanish_ci,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `leido` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Indica si este mensaje ya se ha leido desde la utilizad de lectura de accesos (accesos)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla castanae.contactos: 0 rows
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;


-- Volcando estructura para tabla castanae.noticias
DROP TABLE IF EXISTS `noticias`;
CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `texto` text COLLATE utf8_spanish_ci,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla castanae.noticias: 4 rows
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` (`id`, `titulo`, `texto`, `fecha`) VALUES
	(1, 'Nuevo producto: la Rosca de Castaña', '<p>Castanae lanza su producto estrella</p>\r\n<p>El lanzamiento no ha dejado a nadie indiferente, todo el concejo de O Corgo esperaba el evento con los dientes afilados.</p>\r\n<p>Ñam, ñam ... que rica está!</p>\r\n', '2014-06-01'),
	(2, 'Castanae lanza su web', '<p>Por fín parece que Castanae lanza su web!</p>\r\n<p>Les ha costado un poco más de lo previsto por unos pequeños incovenientes de última hora, pero ya parece que todo está en marcha.</p>\r\n<p>Buena suerte a los valientes!!</p>\r\n', '2014-06-07'),
	(3, 'Ofertas para el mes de Julio', '<p>En este mes de Julio hemos sacado unas ofertas irresistibles</p>\r\n<p>Un 20% de descuento en los siguientes productos:</p>\r\n<p>- tarta de zanahiria</p>\r\n<p>- magdalenas de nuez y chocolate</p>\r\n<p>- torta de naranja</p>\r\n', '2014-06-14'),
	(4, 'Castanae en la feria agroalimentaria FAPEA', '<p>Castanae estará presente en la Feria Agroalimentaria de Productos Ecológicos de Asturias (FAPEA)</p>\r\n<p>Incluiremos algunos de nuestros productos en la degustación de la feria: <a href="http://www.fapea.net/degustacion.php">http://www.fapea.net/degustacion.php</a>.</p>:\r\n<p>&nbsp;</p>\r\n<p>EMPLAZAMIENTO DE FAPEA</p>\r\n<p>Recinto ferial de Ables. Llanera. Asturias.</p>\r\n<p>&nbsp;</p>\r\n<p>FECHAS</p>\r\n<p>16, 17 y 18 de Agosto de 2013 (viernes, sábado y domingo), con el siguiente horario: sábado y domingo de 11:00h a 20:00h</p>\r\n<p>&nbsp;</p>\r\n<p>INFORMACION SOBRE FAPEA</p>\r\n<p>El Ayuntamiento de Llanera, a través la Agencia de Desarrollo Local de Llanera, puede facilitar información sobre la Feria Agroalimentaria de Productos Ecológicos de Asturias. Teléfono: 985.77.00.07 (extensiones 184 / 185 / 188). Dirección de correo electrónico: adl@llanera.es</p>\r\n<p>&nbsp;</p>\r\n<p>INFRAESTRUCTURA</p>\r\n<p>Se instalarán dos carpas unidas (una que albergará a los productores asturianos y otra para los participantes de otras comunidades autónomas) con una superficie total de 1200 m2 aproximadamente, en una parcela colindante de recinto ferial permanente, donde se montarán stands de madera de 2 x 0,8 m de tipo individual, construidos en madera con tejadillos entoldados. Cada stand tendrá un cartel indicativo de los datos del productor que lo utiliza. El precio del stand será gratuito para todos los operadores participantes. </p>\r\n', '2014-08-16');
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;


-- Volcando estructura para tabla castanae.productos
DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `cod` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_corta` text COLLATE utf8_spanish_ci,
  `descripcion_larga` text COLLATE utf8_spanish_ci,
  `foto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre del fichero que contiene la foto del producto',
  `orden` int(4) NOT NULL COMMENT 'Numero que permite ordenar la lista de productos en pantalla',
  `activo` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'Indica si el producto está activo (1) o inactivo (0). Sólo los productos activos se muestran en la web.',
  PRIMARY KEY (`cod`),
  KEY `orden` (`orden`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla castanae.productos: 4 rows
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`cod`, `nombre`, `descripcion_corta`, `descripcion_larga`, `foto`, `orden`, `activo`) VALUES
	('rosca_castana', 'Rosca de castaña', 'Deliciosa rosca hecha con productos naturales que se conserva fresca durante mucho tiempo', '<p>Nuestro producto estrella es la ya famosa Rosca de Castaña de Castanae. Un sabor delicioso en un producto que se puede consumir en cualquier situación. Este producto no sólo se conserva muy bien sino que gana en sabor con el paso del tiempo</p>', 'rosca_castana.jpg', 1, 1),
	('tarta_chocolate', 'Tarta de chocolate', 'Versión Castanae de la clásica tarta de chocolate', '<p>Esta es la versión Castanae de la clásica tarta de chocolate con mermelada de fresa ácida y nata. Una apuesta segura para cualquier celebración o evento social.</p>\r\n', 'tarta_chocolate.jpg', 2, 1),
	('pastel_zanahoria', 'Pastel de zanahoria', 'Exquisito pastel de zanahoria con secreto incluido', '<p>Esponjoso bizcocho con un sorprendente sabor a zanahoria al que se añade nuestro ingrediente secreto. La cubierta de crema de aporta una textura jugosa al conjunto, que lo convierte en un bocado delicioso.</p>', 'pastel_zanahoria.jpg', 3, 1),
	('pastel_naranja', 'Pastel de naranja', 'Sorprendente mezcla de sabores', '<p>Combina el ácido de la naranja con una deliciosa crema y un esponjoso bizcocho que la convierten en toda una experiencia para el paladar.</p>\r\n', 'pastel_naranja.jpg', 4, 1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


-- Volcando estructura para tabla castanae.pruebas
DROP TABLE IF EXISTS `pruebas`;
CREATE TABLE IF NOT EXISTS `pruebas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla castanae.pruebas: 5 rows
/*!40000 ALTER TABLE `pruebas` DISABLE KEYS */;
INSERT INTO `pruebas` (`id`, `nombre`) VALUES
	(1, 'La guerra de las galaxias'),
	(2, 'El imperio contraataca'),
	(3, 'El retorno del Jedi'),
	(4, 'Una prueba con caracteres especiales:ñ Ñ á é í ó ú Á É Í Ó Ú'),
	(5, 'Otra prueba con caracteres especiales: ñ Ñ á é í ó ú Á É Í Ó Ú');
/*!40000 ALTER TABLE `pruebas` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
