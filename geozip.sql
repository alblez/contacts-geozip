# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Base de datos: geozip
# Tiempo de Generación: 2016-07-25 09:38:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;

INSERT INTO `groups` (`id`, `name`)
VALUES
	(1,'Agents'),
	(2,'Contacts');

/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(11) NOT NULL DEFAULT '',
  `group_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `zipcode` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `code`, `group_id`, `name`, `zipcode`)
VALUES
	(1,'1',2,'Michael',85273),
	(2,'2',2,'James',85750),
	(3,'3',2,'Brian',85751),
	(4,'4',2,'Nicholas',85383),
	(5,'5',2,'Jennifer',85716),
	(6,'6',2,'Christopher',85014),
	(7,'7',2,'Michael',85751),
	(8,'8',2,'Patricia',95032),
	(9,'9',2,'Beth',94556),
	(10,'10',2,'Cathy',92260),
	(11,'11',2,'Harold',92120),
	(12,'12',2,'Robin',94062),
	(13,'13',2,'James',90503),
	(14,'14',2,'Douglas',32159),
	(15,'15',2,'Donald',32404),
	(16,'16',2,'Ilene',33140),
	(17,'17',2,'William',33417),
	(18,'18',2,'Lynn',32789),
	(19,'19',2,'Leonie',33417),
	(20,'20',2,'Katherine',32034),
	(21,'21',2,'Melissa',30516),
	(22,'22',2,'Kimberly',30345),
	(23,'23',2,'Richard',30606),
	(24,'24',2,'Richard',30312),
	(25,'25',2,'Ayn',31901),
	(26,'26',2,'Bruce',31410),
	(27,'27',2,'Fred',89451),
	(28,'28',2,'Robert',89110),
	(29,'29',2,'David',89042),
	(30,'30',2,'Maureen',89074),
	(31,'31',2,'Mary Sue',89705),
	(32,'32',2,'Janet',89144),
	(33,'33',2,'John',89145),
	(34,'34',2,'Rand',12580),
	(35,'35',2,'Kathy',10604),
	(36,'36',2,'Susan',13601),
	(37,'37',2,'Robin',10021),
	(38,'38',2,'Peter',12550),
	(39,'39',2,'Diana',10603),
	(40,'40',2,'Richard',12018),
	(41,'01',1,'Agent 1',NULL),
	(42,'02',1,'Agent 2',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
