-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 29, 2017 at 05:42 PM
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
-- Table structure for table `account_tbl`
--

CREATE TABLE `account_tbl` (
  `id` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `streetNum` int(11) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `postalCode` varchar(45) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_tbl`
--

INSERT INTO `account_tbl` (`id`, `firstName`, `lastName`, `email`, `phone`, `isAdmin`, `password`, `street`, `streetNum`, `city`, `province`, `country`, `postalCode`, `isActive`) VALUES
(1, 'ahmad', 'baiazid', 'ahmad@gmail.com', '123', 1, '63a9f0ea7bb98050796b649e85481845', 'ziko', 123, 'piko', 'niko', 'fak', 'liko', 1);

-- --------------------------------------------------------

--
-- Table structure for table `audit_tbl`
--

CREATE TABLE `audit_tbl` (
  `id` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `logout` datetime DEFAULT NULL,
  `login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit_tbl`
--

INSERT INTO `audit_tbl` (`id`, `accountID`, `logout`, `login`) VALUES
(1, 1, '2017-10-28 20:39:17', '2017-10-28 20:29:43'),
(2, 1, '2017-10-29 01:34:47', '2017-10-29 01:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `desktop_tbl`
--

CREATE TABLE `desktop_tbl` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `specKey` varchar(45) DEFAULT NULL,
  `specValue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desktop_tbl`
--

INSERT INTO `desktop_tbl` (`id`, `productID`, `specKey`, `specValue`) VALUES
(1, 38, 'weight', '2'),
(2, 38, 'brand', 'dell'),
(3, 38, 'price', '5000'),
(4, 38, 'processorType', 'i5'),
(5, 38, 'ramSize', '8gb'),
(6, 38, 'numCPU', '4core'),
(7, 38, 'hardDriveSize', '800gb'),
(8, 38, 'length', '12'),
(9, 38, 'width', '12'),
(10, 38, 'height', '12');

-- --------------------------------------------------------

--
-- Table structure for table `laptop_tbl`
--

CREATE TABLE `laptop_tbl` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `specKey` varchar(45) DEFAULT NULL,
  `specValue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laptop_tbl`
--

INSERT INTO `laptop_tbl` (`id`, `productID`, `specKey`, `specValue`) VALUES
(1, 30, 'displaySize', '24'),
(2, 30, 'weight', '2'),
(3, 30, 'brand', 'dell'),
(4, 30, 'price', '5000'),
(5, 30, 'processorType', 'i5'),
(6, 30, 'ramSize', '8gb'),
(7, 30, 'numCPU', '4core'),
(8, 30, 'batteryLife', '4hours'),
(9, 30, 'operatingSystem', 'mac'),
(10, 30, 'hardDriveSize', '800gb'),
(11, 30, 'hasCamera', 'on'),
(12, 30, 'isTouchScreen', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `monitor_tbl`
--

CREATE TABLE `monitor_tbl` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `specKey` varchar(45) DEFAULT NULL,
  `specValue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitor_tbl`
--

INSERT INTO `monitor_tbl` (`id`, `productID`, `specKey`, `specValue`) VALUES
(1, 21, 'displaySize', ':display'),
(2, 21, 'weight', ':weight'),
(3, 21, 'brand', ':brandName'),
(4, 21, 'price', ':price'),
(5, 22, 'displaySize', ':display'),
(6, 22, 'weight', ':weight'),
(7, 22, 'brand', ':brandName'),
(8, 22, 'price', ':price'),
(9, 23, 'displaySize', ':display'),
(10, 23, 'weight', ':weight'),
(11, 23, 'brand', ':brandName'),
(12, 23, 'price', ':price'),
(13, 24, 'displaySize', ':display'),
(14, 24, 'weight', ':weight'),
(15, 24, 'brand', ':brandName'),
(16, 24, 'price', ':price'),
(17, 25, 'displaySize', '24'),
(18, 25, 'weight', '2'),
(19, 25, 'brand', 'DELL'),
(20, 25, 'price', '3000'),
(21, 26, 'displaySize', '24'),
(22, 26, 'weight', '13'),
(23, 26, 'brand', 'newbrand'),
(24, 26, 'price', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `id` int(11) NOT NULL,
  `productType` varchar(45) DEFAULT NULL,
  `serialNum` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `productType`, `serialNum`) VALUES
(1, NULL, '12345sdasgfadfg'),
(2, NULL, '12345sdasgfadfg'),
(3, NULL, '12345sdasgfadfg'),
(4, NULL, '12345sdasgfadfg'),
(5, NULL, '12345sdasgfadfg'),
(6, NULL, '12345sdasgfadfg'),
(7, NULL, ''),
(8, NULL, 'abc123xyz789'),
(9, NULL, 'abc123xyz789'),
(10, NULL, '12345sdasgfadfg'),
(11, 'Submit', 'newxyz'),
(12, 'monitor', 'abc123xyz789'),
(13, 'monitor', 'abc123xyz789'),
(14, 'monitor', 'abc123xyz789'),
(15, 'monitor', 'abc123xyz789'),
(16, 'monitor', 'abc123xyz789'),
(17, 'monitor', 'abc123xyz789'),
(18, 'monitor', '12345sdasgfadfg'),
(19, 'monitor', '12345sdasgfadfg'),
(20, 'monitor', '12345sdasgfadfg'),
(21, 'monitor', '12345sdasgfadfg'),
(22, 'monitor', '12345sdasgfadfg'),
(23, 'monitor', 'XYZER34543RTE'),
(24, 'monitor', 'XYZER34543RTE'),
(25, 'monitor', 'XYZER34543RTE'),
(26, 'monitor', 'XYZER34543RTE'),
(27, 'laptop', 'AMPM'),
(28, 'laptop', 'AMPM'),
(29, 'laptop', 'abc123xyz789'),
(30, 'laptop', '12345sdasgfadfg'),
(31, 'tablet', 'abc123xyz789'),
(32, 'tablet', '12345sdasgfadfg'),
(33, 'tablet', '12345sdasgfadfg'),
(34, 'tablet', '12345sdasgfadfg'),
(35, 'tablet', '12345sdasgfadfg'),
(36, 'tablet', '12345sdasgfadfg'),
(37, 'tablet', '12345sdasgfadfg'),
(38, 'desktop', '12345sdasgfadfg');

-- --------------------------------------------------------

--
-- Table structure for table `purchaselist_tbl`
--

CREATE TABLE `purchaselist_tbl` (
  `id` int(11) NOT NULL,
  `purchaseID` int(11) NOT NULL,
  `productID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_tbl`
--

CREATE TABLE `purchases_tbl` (
  `id` int(11) NOT NULL,
  `purchaseDate` datetime DEFAULT NULL,
  `accountID` int(11) NOT NULL,
  `totalCost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tablet_tbl`
--

CREATE TABLE `tablet_tbl` (
  `id` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `specKey` varchar(45) DEFAULT NULL,
  `specValue` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablet_tbl`
--

INSERT INTO `tablet_tbl` (`id`, `productID`, `specKey`, `specValue`) VALUES
(1, 31, 'displaySize', '24'),
(2, 31, 'weight', '2'),
(3, 31, 'brand', 'dell'),
(4, 31, 'price', '5000'),
(5, 31, 'processorType', 'i5'),
(6, 31, 'ramSize', '8gb'),
(7, 31, 'numCPU', '4core'),
(8, 31, 'batteryLife', '4hours'),
(9, 31, 'operatingSystem', 'mac'),
(10, 31, 'hardDriveSize', '800gb'),
(11, 31, 'hasCamera', NULL),
(12, 31, 'isTouchScreen', NULL),
(13, 31, 'length', NULL),
(14, 31, 'camera', '12mp'),
(15, 32, 'displaySize', '24'),
(16, 32, 'weight', '2'),
(17, 32, 'brand', 'dell'),
(18, 32, 'price', '5000'),
(19, 32, 'processorType', 'i5'),
(20, 32, 'ramSize', '8gb'),
(21, 32, 'numCPU', '4core'),
(22, 32, 'batteryLife', '4hours'),
(23, 32, 'operatingSystem', 'mac'),
(24, 32, 'hardDriveSize', '800gb'),
(25, 32, 'length', '12'),
(26, 32, 'camera', '12mp'),
(27, 33, 'displaySize', '24'),
(28, 33, 'weight', '2'),
(29, 33, 'brand', 'dell'),
(30, 33, 'price', '5000'),
(31, 33, 'processorType', 'i5'),
(32, 33, 'ramSize', '8gb'),
(33, 33, 'numCPU', '4core'),
(34, 33, 'batteryLife', '4hours'),
(35, 33, 'operatingSystem', 'mac'),
(36, 33, 'hardDriveSize', '800gb'),
(37, 33, 'length', '12'),
(38, 33, 'width', '12'),
(39, 33, 'camera', '12mp'),
(40, 34, 'displaySize', '24'),
(41, 34, 'weight', '2'),
(42, 34, 'brand', 'dell'),
(43, 34, 'price', '5000'),
(44, 34, 'processorType', 'i5'),
(45, 34, 'ramSize', '8gb'),
(46, 34, 'numCPU', '4core'),
(47, 34, 'batteryLife', '4hours'),
(48, 34, 'operatingSystem', 'mac'),
(49, 34, 'hardDriveSize', '800gb'),
(50, 34, 'length', '12'),
(51, 34, 'width', '12'),
(52, 34, 'camera', '12mp'),
(53, 35, 'displaySize', '24'),
(54, 35, 'weight', '2'),
(55, 35, 'brand', 'dell'),
(56, 35, 'price', '5000'),
(57, 35, 'processorType', 'i5'),
(58, 35, 'ramSize', '8gb'),
(59, 35, 'numCPU', '4core'),
(60, 35, 'batteryLife', '4hours'),
(61, 35, 'operatingSystem', 'mac'),
(62, 35, 'hardDriveSize', '800gb'),
(63, 35, 'length', '12'),
(64, 35, 'width', '12'),
(65, 35, 'camera', '12mp'),
(66, 36, 'displaySize', '24'),
(67, 36, 'weight', '2'),
(68, 36, 'brand', 'dell'),
(69, 36, 'price', '5000'),
(70, 36, 'processorType', 'i5'),
(71, 36, 'ramSize', '8gb'),
(72, 36, 'numCPU', '4core'),
(73, 36, 'batteryLife', '4hours'),
(74, 36, 'operatingSystem', 'mac'),
(75, 36, 'hardDriveSize', '800gb'),
(76, 36, 'length', '12'),
(77, 36, 'width', '12'),
(78, 36, 'camera', '12mp'),
(79, 37, 'displaySize', '24'),
(80, 37, 'weight', '2'),
(81, 37, 'brand', 'dell'),
(82, 37, 'price', '5000'),
(83, 37, 'processorType', 'i5'),
(84, 37, 'ramSize', '8gb'),
(85, 37, 'numCPU', '4core'),
(86, 37, 'batteryLife', '4hours'),
(87, 37, 'operatingSystem', 'mac'),
(88, 37, 'hardDriveSize', '800gb'),
(89, 37, 'length', '12'),
(90, 37, 'width', '12'),
(91, 37, 'height', '12'),
(92, 37, 'camera', '12mp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tbl`
--
ALTER TABLE `account_tbl`
  ADD PRIMARY KEY (`id`,`email`),
  ADD KEY `Account_idx` (`id`);

--
-- Indexes for table `audit_tbl`
--
ALTER TABLE `audit_tbl`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `accountID_idx` (`accountID`);

--
-- Indexes for table `desktop_tbl`
--
ALTER TABLE `desktop_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productIDdesktop` (`productID`);

--
-- Indexes for table `laptop_tbl`
--
ALTER TABLE `laptop_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productIDlaptop` (`productID`);

--
-- Indexes for table `monitor_tbl`
--
ALTER TABLE `monitor_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productIDmonitor` (`productID`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaselist_tbl`
--
ALTER TABLE `purchaselist_tbl`
  ADD PRIMARY KEY (`id`,`productID`,`purchaseID`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `productID_UNIQUE` (`productID`),
  ADD KEY `purchaseID_idx` (`purchaseID`),
  ADD KEY `productID_idx` (`productID`);

--
-- Indexes for table `purchases_tbl`
--
ALTER TABLE `purchases_tbl`
  ADD PRIMARY KEY (`id`,`accountID`),
  ADD KEY `accountIDPurchases_idx` (`accountID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tablet_tbl`
--
ALTER TABLE `tablet_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productIDtablet` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tbl`
--
ALTER TABLE `account_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_tbl`
--
ALTER TABLE `audit_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `desktop_tbl`
--
ALTER TABLE `desktop_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laptop_tbl`
--
ALTER TABLE `laptop_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `monitor_tbl`
--
ALTER TABLE `monitor_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `purchaselist_tbl`
--
ALTER TABLE `purchaselist_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases_tbl`
--
ALTER TABLE `purchases_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tablet_tbl`
--
ALTER TABLE `tablet_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_tbl`
--
ALTER TABLE `audit_tbl`
  ADD CONSTRAINT `accountIDAudit` FOREIGN KEY (`accountID`) REFERENCES `account_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `desktop_tbl`
--
ALTER TABLE `desktop_tbl`
  ADD CONSTRAINT `productIDdesktop` FOREIGN KEY (`productID`) REFERENCES `product_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `laptop_tbl`
--
ALTER TABLE `laptop_tbl`
  ADD CONSTRAINT `productIDlaptop` FOREIGN KEY (`productID`) REFERENCES `product_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `monitor_tbl`
--
ALTER TABLE `monitor_tbl`
  ADD CONSTRAINT `productIDmonitor` FOREIGN KEY (`productID`) REFERENCES `product_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchaselist_tbl`
--
ALTER TABLE `purchaselist_tbl`
  ADD CONSTRAINT `productID` FOREIGN KEY (`productID`) REFERENCES `product_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `purchaseID` FOREIGN KEY (`purchaseID`) REFERENCES `purchases_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `purchases_tbl`
--
ALTER TABLE `purchases_tbl`
  ADD CONSTRAINT `accountIDPurchases` FOREIGN KEY (`accountID`) REFERENCES `account_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tablet_tbl`
--
ALTER TABLE `tablet_tbl`
  ADD CONSTRAINT `productIDtablet` FOREIGN KEY (`productID`) REFERENCES `product_tbl` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
