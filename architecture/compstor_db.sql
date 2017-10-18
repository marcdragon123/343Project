SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `compstor_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `compstor_db`;

DROP TABLE IF EXISTS `Account_tbl`;
CREATE TABLE IF NOT EXISTS `Account_tbl` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `StreetName` varchar(45) DEFAULT NULL,
  `StreetNumber` int(11) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `Province` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `PostalCode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`,`Email`),
  KEY `Account_idx` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Audit_tbl`;
CREATE TABLE IF NOT EXISTS `Audit_tbl` (
  `AccountID` int(11) NOT NULL,
  `Logout` datetime DEFAULT NULL,
  `Login` datetime DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`AccountID`),
  KEY `AccountID_idx` (`AccountID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `DesktopComputer_tbl`;
CREATE TABLE IF NOT EXISTS `DesktopComputer_tbl` (
  `ID` int(11) NOT NULL,
  `Key` varchar(10) DEFAULT NULL,
  `Value` varchar(10) DEFAULT NULL,
  `SerialNumber` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`,`SerialNumber`),
  KEY `SerialNumberDesktopComputer_idx` (`SerialNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Laptop_tbl`;
CREATE TABLE IF NOT EXISTS `Laptop_tbl` (
  `ID` int(11) NOT NULL,
  `Key` varchar(10) DEFAULT NULL,
  `Value` varchar(10) DEFAULT NULL,
  `SerialNumber` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`,`SerialNumber`),
  KEY `SerialNumberLaptop_idx` (`SerialNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Monitor_tbl`;
CREATE TABLE IF NOT EXISTS `Monitor_tbl` (
  `ID` int(11) NOT NULL,
  `Key` varchar(10) DEFAULT NULL,
  `Value` varchar(10) DEFAULT NULL,
  `SerialNumber` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`,`SerialNumber`),
  KEY `SerialNumberMonitor_idx` (`SerialNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Purchaselist_tbl`;
CREATE TABLE IF NOT EXISTS `Purchaselist_tbl` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductSerialNumber` varchar(45) NOT NULL,
  `PurchaseID` int(11) NOT NULL,
  PRIMARY KEY (`ID`,`ProductSerialNumber`,`PurchaseID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`),
  UNIQUE KEY `ProductSerialNumber_UNIQUE` (`ProductSerialNumber`),
  KEY `PurchaseID_idx` (`PurchaseID`),
  KEY `ProductSerialNumber_idx` (`ProductSerialNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Purchases`;
CREATE TABLE IF NOT EXISTS `Purchases` (
  `PurchaseID` int(11) NOT NULL,
  `PurchaseDate` datetime DEFAULT NULL,
  `AccountID` int(11) NOT NULL,
  `TotalCost` double DEFAULT NULL,
  PRIMARY KEY (`PurchaseID`,`AccountID`),
  KEY `AccountIDPurchases_idx` (`AccountID`),
  KEY `PurchaseID` (`PurchaseID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `Tablet_tbl`;
CREATE TABLE IF NOT EXISTS `Tablet_tbl` (
  `ID` int(11) NOT NULL,
  `Key` varchar(10) DEFAULT NULL,
  `Value` varchar(10) DEFAULT NULL,
  `SerialNumber` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`,`SerialNumber`),
  KEY `SerailNumberTablet_idx` (`SerialNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `Audit_tbl`
  ADD CONSTRAINT `AccountIDAudit` FOREIGN KEY (`AccountID`) REFERENCES `Account_tbl` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `DesktopComputer_tbl`
  ADD CONSTRAINT `SerialNumberDesktopComputer` FOREIGN KEY (`SerialNumber`) REFERENCES `Purchaselist_tbl` (`ProductSerialNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Laptop_tbl`
  ADD CONSTRAINT `SerialNumberLaptop` FOREIGN KEY (`SerialNumber`) REFERENCES `Purchaselist_tbl` (`ProductSerialNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Monitor_tbl`
  ADD CONSTRAINT `SerialNumberMonitor` FOREIGN KEY (`SerialNumber`) REFERENCES `Purchaselist_tbl` (`ProductSerialNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Purchaselist_tbl`
  ADD CONSTRAINT `PurchaseID` FOREIGN KEY (`PurchaseID`) REFERENCES `Purchases` (`PurchaseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Purchases`
  ADD CONSTRAINT `AccountIDPurchases` FOREIGN KEY (`AccountID`) REFERENCES `Account_tbl` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Tablet_tbl`
  ADD CONSTRAINT `SerailNumberTablet` FOREIGN KEY (`SerialNumber`) REFERENCES `Purchaselist_tbl` (`ProductSerialNumber`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
