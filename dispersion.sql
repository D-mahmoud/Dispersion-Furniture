-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2020 at 10:32 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dispersion`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `productid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stat` varchar(20) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  KEY `productid` (`productid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`c_id`, `productid`, `userid`, `quantity`, `stat`, `Date`) VALUES
(1, 2, 33, 1, 'order', '2020-06-01'),
(2, 2, 32, 3, 'order', '2020-06-02'),
(4, 1, 33, 2, 'order', '2020-06-04'),
(13, 1, 33, 8, 'order', '2020-06-07'),
(14, 2, 33, 5, NULL, '2020-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `reply_on` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `emp_id` (`emp_id`),
  KEY `cust_id` (`cust_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `cust_id`, `emp_id`, `message`, `reply_on`, `Date`) VALUES
(2, 33, 34, '15 le and it will take 2 weeks', 1, '2020-05-22'),
(1, 33, NULL, 'How long it will take?', NULL, '2020-05-22'),
(3, 33, NULL, 'emta el estlam?', NULL, '2020-05-27'),
(9, 32, NULL, 'w ba3deen han5las emta?', NULL, '2020-05-27'),
(19, 32, NULL, 'when', NULL, '2020-06-05'),
(18, 33, 37, 'did it arrive?', 1, '2020-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`) VALUES
(1, 'size'),
(2, 'color'),
(3, 'weight'),
(4, 'model'),
(5, 'Material'),
(6, 'no. Peices');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Expected_Arrival` date DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `total`, `Date`, `Expected_Arrival`, `payment`) VALUES
(3, 32, 2, 3, 1500, '2020-06-05', NULL, NULL),
(5, 33, 1, 2, 200, '2020-06-06', NULL, NULL),
(7, 33, 2, 1, 500, '2020-06-06', NULL, 'premises'),
(8, 33, 1, 8, 800, '2020-06-07', NULL, 'delivery');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(50) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `Type`) VALUES
(1, 'premises'),
(2, 'delivery');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `cost` int(11) NOT NULL,
  `picture` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `type`, `code`, `name`, `cost`, `picture`) VALUES
(1, 'couch', 1, 'Myrtle Green Couch', 100, 'couch.jpg'),
(2, 'bed', 2, 'Modern Bedroom ', 500, '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `cart_ID` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `cart_id` (`cart_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`ID`, `cart_ID`, `status`) VALUES
(1, 1, 'confirm'),
(2, 2, 'confirm'),
(4, 4, 'confirm'),
(6, 13, 'confirm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `number` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `fname`, `lname`, `password`, `username`, `email`, `number`, `address`, `role`) VALUES
(32, 'shahd', 'Hesham', '202cb962ac59075b964b07152d234b70', 'shahd', 'shahd@', '01000000', '11 abbas el akkad street ', 'customer'),
(33, 'd', 'd', '8277e0910d750195b448797616e091ad', 'd', 'dd', 'd', '11 abbas el akkad street ', 'customer'),
(34, 'maleeka', 'hesham', '202cb962ac59075b964b07152d234b70', 'employee', 'maleeka@', '11', '11', 'employee'),
(36, 'dalia', 'mahmoud', '202cb962ac59075b964b07152d234b70', 'admin', 'dalia@', '0100', 'fifth sett', 'admin'),
(37, 'yara', 'mahmoud', '202cb962ac59075b964b07152d234b70', 'employee', 'dalia@', '0100', 'fifth sett', 'employee'),
(55, 'c', 'c', '4a8a08f09d37b73795649038408b5f33', 'c', 'c', '12345', 'c', 'admin'),
(57, 'f', 'f', '202cb962ac59075b964b07152d234b70', 'f', 'f', '11', 'f', 'employee');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
