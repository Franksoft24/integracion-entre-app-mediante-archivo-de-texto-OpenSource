-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.0.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for fundapec
CREATE DATABASE IF NOT EXISTS `fundapec` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fundapec`;


-- Dumping structure for table fundapec.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Matricula` int(8) NOT NULL,
  `Monto` decimal(18,2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table fundapec.estudiante: ~4 rows (approximately)
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` (`ID`, `Nombre`, `Apellido`, `Matricula`, `Monto`) VALUES
	(1, 'Frankmer', 'Ramirez', 20130616, 15000.00),
	(2, 'Radhames', 'Taveras', 20130626, 25000.00),
	(3, 'Yaneris', 'Betances', 20112196, 10000.00),
	(4, 'Gerard', 'Ogando', 20122204, 30000.00);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
