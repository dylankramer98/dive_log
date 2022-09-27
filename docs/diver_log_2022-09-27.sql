# ************************************************************
# Sequel Ace SQL dump
# Version 20035
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.39)
# Database: diver_log
# Generation Time: 2022-09-27 13:23:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table dives
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dives`;

CREATE TABLE `dives` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `location` int(11) unsigned NOT NULL,
  `depth` float NOT NULL,
  `type` varchar(250) NOT NULL,
  `activity` varchar(250) NOT NULL,
  `temperature` float NOT NULL,
  `visability` float NOT NULL,
  `air` float NOT NULL,
  `weight` float NOT NULL,
  `equipment` varchar(255) NOT NULL,
  `bottom_time` float NOT NULL,
  `level` varchar(250) NOT NULL,
  `notes` varchar(1000) DEFAULT NULL,
  `photo` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dives_locations` (`location`),
  CONSTRAINT `fk_dives_locations` FOREIGN KEY (`location`) REFERENCES `locations` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

LOCK TABLES `dives` WRITE;
/*!40000 ALTER TABLE `dives` DISABLE KEYS */;

INSERT INTO `dives` (`id`, `location`, `depth`, `type`, `activity`, `temperature`, `visability`, `air`, `weight`, `equipment`, `bottom_time`, `level`, `notes`, `photo`)
VALUES
	(1,1,30,'Deep','Reef',20,30,20,2,'camera, computer',30,'OpenWater','Saw Turtles and an Eel','images/Gili.jpeg'),
	(2,1,30,'Boat','Reef',18,30,20,2,'computer',35,'OpenWater','Saw a squid','images/Gili.jpeg'),
	(3,1,30,'Shore','Recreation',22,25,25,2,'computer',40,'OpenWater','Diving with a group of friends and family','images/Gili.jpeg'),
	(4,2,30,'Shore','UW Navig',25,30,20,2,'computer',30,'OpenWater','Saw an Eel, lionfish and octopus','images/Zenobia.jpeg'),
	(5,2,40,'Deep','Search and Recov',26,30,40,2,'computer, camera',40,'advanced','navigated and sent items to surface','images/Zenobia.jpeg'),
	(6,2,42,'Boat','Wreck',15,20,20,2,'computer, flashlight',45,'advanced','navigated through a large ship wreck','images/Zenobia.jpeg');

/*!40000 ALTER TABLE `dives` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table locations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dive_location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;

INSERT INTO `locations` (`id`, `dive_location`)
VALUES
	(1,'Gili T - Gili'),
	(2,'Zenobia - Cyprus');

/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
