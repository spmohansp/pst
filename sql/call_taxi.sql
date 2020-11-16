-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `drivers`;
CREATE TABLE `drivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `driver_name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicle_id` (`vehicle_id`),
  CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `entry`;
CREATE TABLE `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `vehicle_id` int(10) DEFAULT NULL,
  `driver_id` int(10) DEFAULT NULL,
  `starting_location` varchar(50) DEFAULT NULL,
  `destination_location` varchar(50) DEFAULT NULL,
  `starting_km` varchar(10) DEFAULT NULL,
  `ending_km` varchar(10) DEFAULT NULL,
  `total_km` varchar(10) DEFAULT NULL,
  `starting_time` varchar(30) DEFAULT NULL,
  `ending_time` varchar(30) DEFAULT NULL,
  `total_time` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `extra_amount` int(10) DEFAULT NULL,
  `bill_amount` int(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `driver_id` (`driver_id`),
  KEY `vehicle_id` (`vehicle_id`),
  CONSTRAINT `entry_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `entry_ibfk_2` FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`),
  CONSTRAINT `entry_ibfk_3` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pricing_master`;
CREATE TABLE `pricing_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vechicle_id` int(11) DEFAULT NULL,
  `additional_rate` varchar(10) DEFAULT NULL,
  `additional_rate_km` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vechicle_id` (`vechicle_id`),
  CONSTRAINT `pricing_master_ibfk_1` FOREIGN KEY (`vechicle_id`) REFERENCES `vehicles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_name` varchar(50) DEFAULT NULL,
  `vehicle_number` varchar(50) DEFAULT NULL,
  `model_number` varchar(50) DEFAULT NULL,
  `insurance` varchar(50) DEFAULT NULL,
  `fc_renewal` varchar(50) DEFAULT NULL,
  `tax_date` varchar(50) DEFAULT NULL,
  `rc_date` varchar(50) DEFAULT NULL,
  `remain_date` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2018-03-27 08:03:12
