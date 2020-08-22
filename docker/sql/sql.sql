USE `stack`;

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);