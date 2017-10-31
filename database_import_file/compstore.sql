SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `compstore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `compstore`;

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Admin` tinyint(1) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `StreetName` varchar(45) DEFAULT NULL,
  `StreetNumber` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `Province` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `PostalCode` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`account_ID`),
  UNIQUE KEY `Email` (`Email`),
  KEY `account_index` (`account_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO `account` (`account_ID`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `Admin`, `Password`, `StreetName`, `StreetNumber`, `City`, `Province`, `Country`, `PostalCode`) VALUES
(7, 'Anania', 'Yeghikian', 'anania.y@hotmail.com', '5149278861', 1, '7815696ecbf1c96e6894b779456d330e', '208 Victorias', '208 bb', 'Laval', 'QC', 'Canada', 'H7X 0A4'),
(9, 'Anania2', 'Yeghikian', 'anania2.y@hotmail.com', '5149278861', 1, '7815696ecbf1c96e6894b779456d330e', '208 Victorias, 208 bb', '208 bb', 'Laval', 'QC', 'Canada', 'H7X 0A4');

DROP TABLE IF EXISTS `audit`;
CREATE TABLE IF NOT EXISTS `audit` (
  `audit_ID` int(11) NOT NULL AUTO_INCREMENT,
  `account_ID` int(11) NOT NULL,
  `Logout` datetime DEFAULT NULL,
  `Login` datetime DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`audit_ID`),
  UNIQUE KEY `account_ID` (`account_ID`),
  KEY `account_ID_index` (`account_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `audit` (`audit_ID`, `account_ID`, `Logout`, `Login`, `Active`) VALUES
(1, 7, '2017-10-28 00:34:16', '2017-10-28 00:30:34', 0);

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Type` varchar(45) NOT NULL,
  `Price` decimal(11,2) NOT NULL,
  `Stock` int(11) NOT NULL,
  PRIMARY KEY (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_ID` int(11) NOT NULL,
  `account_ID` int(11) NOT NULL,
  `PurchaseDate` datetime DEFAULT NULL,
  `TotalCost` decimal(11,2) NOT NULL,
  PRIMARY KEY (`purchase_ID`),
  KEY `account_IDpurchases_index` (`account_ID`),
  KEY `purchases_ID` (`purchase_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `purchaselist`;
CREATE TABLE IF NOT EXISTS `purchaselist` (
  `purchase_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `PricePaid` decimal(11,2) NOT NULL,
  PRIMARY KEY (`purchase_ID`,`product_ID`),
  KEY `product_ID` (`product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `specifications`;
CREATE TABLE IF NOT EXISTS `specifications` (
  `product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SpecKey` varchar(45) NOT NULL,
  `SpecValue` varchar(45) NOT NULL,
  PRIMARY KEY (`product_ID`,`SpecKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `audit`
  ADD CONSTRAINT `account_IDaudit` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `purchase`
  ADD CONSTRAINT `Account_IDpurchases` FOREIGN KEY (`account_ID`) REFERENCES `account` (`account_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `purchaselist`
  ADD CONSTRAINT `purchaselist_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`),
  ADD CONSTRAINT `purchaselist_ibfk_2` FOREIGN KEY (`purchase_ID`) REFERENCES `purchase` (`purchase_ID`);

ALTER TABLE `specifications`
  ADD CONSTRAINT `specifications_ibfk_1` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
