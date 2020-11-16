-- Adminer 4.6.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`id`, `customer_name`, `phone_number`) VALUES
(11,  'mohan',  'a:1:{i:0;s:10:\"9789689763\";}'),
(12,  'jfjhsdgf', 'a:1:{i:0;s:10:\"8723941304\";}');

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `vehicle_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `drivers` (`id`, `driver_name`, `phone_number`, `vehicle_number`) VALUES
(1, 'dfhaih', '9878909878', '23473'),
(3, 'shfdifh',  '8752934598739',  '98357');

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_number` varchar(50) DEFAULT NULL,
  `model_number` varchar(50) DEFAULT NULL,
  `insurance` varchar(50) DEFAULT NULL,
  `fc_renewal` varchar(50) DEFAULT NULL,
  `tax_date` varchar(50) DEFAULT NULL,
  `rc_date` varchar(50) DEFAULT NULL,
  `remain_date` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `vehicles` (`id`, `vehicle_number`, `model_number`, `insurance`, `fc_renewal`, `tax_date`, `rc_date`, `remain_date`) VALUES
(2, 'tn28', '238',  '2018-03-15', '2018-03-06', '2018-03-14', NULL, '1');

-- 2018-03-12 05:48:58