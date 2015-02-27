# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.34)
# Database: shalom
# Generation Time: 2015-02-27 00:40:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dayHr
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dayHr`;

CREATE TABLE `dayHr` (
  `dayHrId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `timeId` int(11) NOT NULL,
  `weekId` int(11) NOT NULL,
  PRIMARY KEY (`dayHrId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table smgrp
# ------------------------------------------------------------

DROP TABLE IF EXISTS `smgrp`;

CREATE TABLE `smgrp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groups` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `days` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `hrtime` text CHARACTER SET latin1 NOT NULL,
  `age` text NOT NULL,
  `location` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `topic` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `weekId` int(11) NOT NULL,
  `timeId` int(11) NOT NULL,
  `dayHrId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `smgrp` WRITE;
/*!40000 ALTER TABLE `smgrp` DISABLE KEYS */;

INSERT INTO `smgrp` (`id`, `groups`, `days`, `hrtime`, `age`, `location`, `topic`, `weekId`, `timeId`, `dayHrId`)
VALUES
	(1,'David Butler ','Monday','5:00pm','25-39','412 Midland St','General Study',1,0,NULL),
	(2,'Refugio Alvarez ','Monday','7:00pm','35-60','5200 Linn St','Finance Study',1,0,NULL),
	(3,'Steve Bernard ','Tueday','7:00pm','20-35','SVSU Starbucks','Men\'s Study',2,0,NULL),
	(4,'Jose Hernandez','Tuesday','3:00pm','30-60','4570 Monitor Rd ','General Study',2,0,NULL),
	(5,'Van Dinh ','Wednesday\n','7:00pm','25-60','123 Hike Place','General Study',3,0,NULL),
	(10,'Cindy LaTerra','Wednesday','5:30pm','35-60','3507 Broadway Place','Women\'s Study',3,0,NULL),
	(14,'Luz Hernandez','Thursday','3:00pm','35-60','258 Fisher','Women\'s Study',4,0,NULL),
	(22,'Blake Dennison','Friday\n','5:00pm','25-60','4820 Hope Circle','Financial Study',5,0,NULL),
	(25,'John Doe ','Sunday','6:00pm','25-40','4573 Tenth St','Men\'s Study',7,0,NULL),
	(26,'Angelica Dinh','Monday','6:00pm','30-60','482 Ellen Drive Apt ','College Study',0,0,NULL);

/*!40000 ALTER TABLE `smgrp` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table time
# ------------------------------------------------------------

DROP TABLE IF EXISTS `time`;

CREATE TABLE `time` (
  `timeId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hour` int(11) NOT NULL,
  PRIMARY KEY (`timeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table weekday
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weekday`;

CREATE TABLE `weekday` (
  `weekId` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `days` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`weekId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weekday` WRITE;
/*!40000 ALTER TABLE `weekday` DISABLE KEYS */;

INSERT INTO `weekday` (`weekId`, `days`)
VALUES
	(1,'Monday'),
	(2,'Tuesday'),
	(3,'Wednesday'),
	(4,'Thursday'),
	(5,'Friday'),
	(6,'Saturday'),
	(7,'Sunday');

/*!40000 ALTER TABLE `weekday` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
