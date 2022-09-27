# dive_log

DROP TABLE IF EXISTS `dives`;

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`dive_location` varchar(255),
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
CONSTRAINT `fk_dives_locations`
FOREIGN KEY (`location`) REFERENCES `locations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `locations` (`dive_location`) VALUES ('Gili T - Gili');
INSERT INTO `locations` (`dive_location`) VALUES ('Zenobia - Cyprus');

INSERT INTO `dives` (`location`, `depth`, `type`, `activity`, `temperature`, `visability`, `air`, `weight`, `equipment`, `bottom_time`, `level`, `notes`, `photo`) VALUES (1, 30.00, 'Deep', 'Reef', 20.00, 30.00, 20.00, 2, 'camera, computer', 30.00, 'OpenWater', 'Saw Turtles and an Eel', 'images/Gili.jpeg');
INSERT INTO `dives` (`location`, `depth`, `type`, `activity`, `temperature`, `visability`, `air`, `weight`, `equipment`, `bottom_time`, `level`, `notes`, `photo`) VALUES (1, 30.00, 'Boat', 'Reef', 18.00, 30.00, 20.00, 2, 'computer', 35.00, 'OpenWater', 'Saw a squid', 'images/Gili.jpeg');
INSERT INTO `dives` (`location`, `depth`, `type`, `activity`, `temperature`, `visability`, `air`, `weight`, `equipment`, `bottom_time`, `level`, `notes`, `photo`) VALUES (1, 30.00, 'Shore', 'Recreation', 22.00, 25.00, 25.00, 2, 'computer', 40.00, 'OpenWater', 'Diving with a group of friends and family', 'images/Gili.jpeg');
INSERT INTO `dives` (`location`, `depth`, `type`, `activity`, `temperature`, `visability`, `air`, `weight`, `equipment`, `bottom_time`, `level`, `notes`, `photo`) VALUES (2, 30.00, 'Shore', 'UW Navig', 25.00, 30.00, 20.00, 2, 'computer', 30.00, 'OpenWater', 'Saw an Eel, lionfish and octopus', 'images/Zenobia.jpeg');
INSERT INTO `dives` (`location`, `depth`, `type`, `activity`, `temperature`, `visability`, `air`, `weight`, `equipment`, `bottom_time`, `level`, `notes`, `photo`) VALUES (2, 40.00, 'Deep', 'Search and Recov', 26.00, 30.00, 40.00, 2, 'computer, camera', 40.00, 'advanced', 'navigated and sent items to surface', 'images/Zenobia.jpeg');
INSERT INTO `dives` (`location`, `depth`, `type`, `activity`, `temperature`, `visability`, `air`, `weight`, `equipment`, `bottom_time`, `level`, `notes`, `photo`) VALUES (2, 42.00, 'Boat', 'Wreck', 15.00, 20.00, 20.00, 2, 'computer, flashlight', 45.00, 'advanced', 'navigated through a large ship wreck', 'images/Zenobia.jpeg');
