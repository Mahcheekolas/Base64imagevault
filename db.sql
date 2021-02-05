CREATE DATABASE theCollector;

USE theCollector;

CREATE TABLE `images` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `imageBase64` longblob,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `codetype` varchar(10) DEFAULT NULL,
  `code` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
