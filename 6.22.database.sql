-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.6.7-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pilatricycle_db
CREATE DATABASE IF NOT EXISTS `pilatricycle_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pilatricycle_db`;

-- Dumping structure for table pilatricycle_db.admins_tbl
CREATE TABLE IF NOT EXISTS `admins_tbl` (
  `admin_id` varchar(36) NOT NULL DEFAULT uuid(),
  `admin_email` varchar(128) NOT NULL,
  `admin_password` varchar(256) NOT NULL,
  `admin_fullname` varchar(256) NOT NULL,
  `admin_birthdate` date NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains the basic authentication details of an admin.';

-- Dumping data for table pilatricycle_db.admins_tbl: ~0 rows (approximately)
DELETE FROM `admins_tbl`;
/*!40000 ALTER TABLE `admins_tbl` DISABLE KEYS */;
INSERT INTO `admins_tbl` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`, `admin_birthdate`) VALUES
	('e7ee6cdd-f17a-11ec-a5e1-00d861bb616d', 'admin@pilatricycle.com', '$2a$12$eheO8DfUqfm0p0KN6v2zO.OL/hbc1S2I6/nBHL7XXloWtZztYjJWq', 'Admin', '2022-06-21');
/*!40000 ALTER TABLE `admins_tbl` ENABLE KEYS */;

-- Dumping structure for table pilatricycle_db.queue_elements_tbl
CREATE TABLE IF NOT EXISTS `queue_elements_tbl` (
  `queue_uuid` varchar(36) NOT NULL DEFAULT uuid(),
  `queue_driver_uuid` varchar(36) NOT NULL,
  `queue_passengers_count` int(11) NOT NULL DEFAULT 0,
  `queue_status` varchar(16) NOT NULL DEFAULT 'ACTIVE',
  `queue_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`queue_uuid`),
  KEY `QE_Driver_FK` (`queue_driver_uuid`),
  CONSTRAINT `QE_Driver_FK` FOREIGN KEY (`queue_driver_uuid`) REFERENCES `tricycle_drivers_tbl` (`driver_uuid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains information of the tricycle queue that consists of tricycle drivers';

-- Dumping data for table pilatricycle_db.queue_elements_tbl: ~1 rows (approximately)
DELETE FROM `queue_elements_tbl`;
/*!40000 ALTER TABLE `queue_elements_tbl` DISABLE KEYS */;
INSERT INTO `queue_elements_tbl` (`queue_uuid`, `queue_driver_uuid`, `queue_passengers_count`, `queue_status`, `queue_created_at`) VALUES
	('67175135-f18a-11ec-a5e1-00d861bb616d', 'e6c78789-f180-11ec-a5e1-00d861bb616d', 0, 'ACTIVE', '2022-06-22 01:48:35');
/*!40000 ALTER TABLE `queue_elements_tbl` ENABLE KEYS */;

-- Dumping structure for table pilatricycle_db.tricycle_drivers_tbl
CREATE TABLE IF NOT EXISTS `tricycle_drivers_tbl` (
  `driver_uuid` varchar(36) NOT NULL DEFAULT uuid(),
  `driver_fullname` varchar(256) NOT NULL,
  `driver_email` varchar(256) NOT NULL,
  `driver_password` varchar(256) NOT NULL,
  `driver_birthdate` date NOT NULL,
  `driver_address` varchar(512) NOT NULL,
  `driver_contact_number` varchar(512) NOT NULL,
  `driver_toda_number` varchar(512) NOT NULL,
  `driver_years_in_service` varchar(512) NOT NULL,
  `driver_plate_no` varchar(512) NOT NULL,
  `driver_license_expiration_date` date NOT NULL,
  `driver_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`driver_uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains the basic authentication details of an tricycle driver.';

-- Dumping data for table pilatricycle_db.tricycle_drivers_tbl: ~1 rows (approximately)
DELETE FROM `tricycle_drivers_tbl`;
/*!40000 ALTER TABLE `tricycle_drivers_tbl` DISABLE KEYS */;
INSERT INTO `tricycle_drivers_tbl` (`driver_uuid`, `driver_fullname`, `driver_email`, `driver_password`, `driver_birthdate`, `driver_address`, `driver_contact_number`, `driver_toda_number`, `driver_years_in_service`, `driver_plate_no`, `driver_license_expiration_date`, `driver_created_at`) VALUES
	('5c8d077f-f18c-11ec-a5e1-00d861bb616d', 'Test User 2', 'testuser2@gmail.com', '$2y$12$2hs6LtEFbxtgVG71hiZ.dea70zL906qkT6Cuwp29pK5uxB48tSLK6', '2002-02-02', 'Address Line #2', '09062281050', '21', '23', '20-1936', '2040-02-02', '2022-06-22 02:02:36'),
	('e6c78789-f180-11ec-a5e1-00d861bb616d', 'Test User', 'testuser@gmail.com', '$2y$12$OtzADQinahpfuSBxRziVy.zcoCnfK4675gkA7rxyLREoqOG3cz0Te', '2002-02-02', 'Address Line #1', '09062281049', '20', '10', '201935', '2030-02-02', '2022-06-22 00:40:34');
/*!40000 ALTER TABLE `tricycle_drivers_tbl` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
