-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2017 at 03:24 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compstor_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `StreetName` varchar(45) DEFAULT NULL,
  `StreetNumber` varchar(10) DEFAULT NULL,
  `Province` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `PostalCode` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `Type` varchar(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`UserID`, `FirstName`, `LastName`, `Email`, `PhoneNumber`, `StreetName`, `StreetNumber`, `Province`, `Country`, `PostalCode`, `Password`, `City`, `Type`) VALUES
(5, 'thug', 'life', 'cc@live.ca', NULL, '200 BOUL RENE-LEVESQUES', '161', 'Quebec', 'Canada', 'H9B 1Y4', 'root', 'DDO', 'C'),
(6, 'ahmad', 'baiazid', 'ahmad@gmail.com', NULL, '161, davignon', '161', 'Quebec', 'Canada', 'H9B 1Y4', 'root', 'DDO', 'C'),
(7, 'admin', 'admin', 'admin@admin.com', '123', 'young thug', '514', 'qc', 'can', 'h9b', 'root', 'mtl', 'A'),
(8, 'admin', 'admin', 'admin@admin.com', '123', 'young thug', '514', 'qc', 'can', 'h9b', 'root', 'mtl', 'C'),
(9, 'admin', 'admin', 'admin@admin.com', '123', 'young thug', '514', 'qc', 'can', 'h9b', 'root', 'mtl', 'C'),
(10, 'admin', 'admin', 'admin@admin.com', '123', 'young thug', '514', 'qc', 'can', 'h9b', 'root', 'mtl', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `Audit`
--

CREATE TABLE `Audit` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `Login` date DEFAULT NULL,
  `Logout` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DesktopComputer`
--

CREATE TABLE `DesktopComputer` (
  `ID` int(11) NOT NULL,
  `ModelNumber` varchar(45) NOT NULL,
  `Dimensions` varchar(10) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `CPUType` varchar(45) NOT NULL,
  `CoreNumber` int(11) NOT NULL,
  `RAMSize` int(11) NOT NULL,
  `Weight` decimal(4,2) NOT NULL,
  `HDDSize` int(11) NOT NULL,
  `SerialNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Laptop`
--

CREATE TABLE `Laptop` (
  `ID` int(11) NOT NULL,
  `ModelNumber` varchar(45) NOT NULL,
  `DisplayDimensions` varchar(10) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `CPUType` varchar(45) NOT NULL,
  `CoreNumber` int(11) NOT NULL,
  `RAMSize` int(11) NOT NULL,
  `Weight` decimal(4,2) NOT NULL,
  `HDDSize` int(11) NOT NULL,
  `Battery` varchar(45) NOT NULL,
  `OS` varchar(45) NOT NULL,
  `ToucheScreenToggle` tinyint(1) DEFAULT NULL,
  `CameraToggle` tinyint(1) DEFAULT NULL,
  `SerialNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Monitor`
--

CREATE TABLE `Monitor` (
  `ID` int(11) NOT NULL,
  `ModelNumber` varchar(45) NOT NULL,
  `DisplayDimensions` int(11) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `Weight` decimal(2,0) NOT NULL,
  `SerialNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tablet`
--

CREATE TABLE `Tablet` (
  `ID` int(11) NOT NULL,
  `ModelNumber` varchar(45) NOT NULL,
  `DisplaySize` int(11) NOT NULL,
  `DisplayDimensions` varchar(10) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  `Price` decimal(6,2) NOT NULL,
  `CPUType` varchar(45) NOT NULL,
  `CoreNumber` int(11) NOT NULL,
  `RAMSize` int(11) NOT NULL,
  `Weight` decimal(4,2) NOT NULL,
  `HDDSize` int(11) NOT NULL,
  `Battery` varchar(45) NOT NULL,
  `OS` varchar(45) NOT NULL,
  `CameraInformation` varchar(45) NOT NULL,
  `SerialNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `ID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `TransactionID` varchar(45) NOT NULL,
  `TotalCost` double DEFAULT NULL,
  `TransactionDate` date DEFAULT NULL,
  `TransactionTime` time DEFAULT NULL,
  `TransactionType` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TransactionList`
--

CREATE TABLE `TransactionList` (
  `ID` int(11) NOT NULL,
  `TransactionID` varchar(45) NOT NULL,
  `ProductSerialNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID_UNIQUE` (`UserID`);

--
-- Indexes for table `Audit`
--
ALTER TABLE `Audit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- Indexes for table `DesktopComputer`
--
ALTER TABLE `DesktopComputer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `Laptop`
--
ALTER TABLE `Laptop`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `Monitor`
--
ALTER TABLE `Monitor`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `Tablet`
--
ALTER TABLE `Tablet`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_UNIQUE` (`ID`),
  ADD KEY `UserID` (`AccountID`);

--
-- Indexes for table `TransactionList`
--
ALTER TABLE `TransactionList`
  ADD PRIMARY KEY (`ID`,`TransactionID`,`ProductSerialNumber`),
  ADD UNIQUE KEY `ProductSerialNumber_UNIQUE` (`ProductSerialNumber`),
  ADD KEY `PurchaseID_idx` (`TransactionID`),
  ADD KEY `ProductSerialNumber_idx` (`ProductSerialNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Audit`
--
ALTER TABLE `Audit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `DesktopComputer`
--
ALTER TABLE `DesktopComputer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Laptop`
--
ALTER TABLE `Laptop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Monitor`
--
ALTER TABLE `Monitor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tablet`
--
ALTER TABLE `Tablet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `TransactionList`
--
ALTER TABLE `TransactionList`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Audit`
--
ALTER TABLE `Audit`
  ADD CONSTRAINT `AccountID` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`UserID`);

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`AccountID`) REFERENCES `Account` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
