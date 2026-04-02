-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 27, 2025 at 07:15 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE IF NOT EXISTS `tblcart` (
  `cartid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cartid`),
  UNIQUE KEY `ux_user_product` (`userid`,`productid`),
  KEY `idx_user` (`userid`),
  KEY `idx_product` (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE IF NOT EXISTS `tblorder` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totalamout` int(11) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderid`, `userid`, `orderdate`, `totalamout`) VALUES
(1, 1, '2025-08-27 01:36:12', 1044);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetails`
--

CREATE TABLE IF NOT EXISTS `tblorderdetails` (
  `detailid` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) DEFAULT '1',
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`detailid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblorderdetails`
--

INSERT INTO `tblorderdetails` (`detailid`, `orderid`, `productid`, `qty`, `price`, `subtotal`) VALUES
(1, 0, 9, 1, 44, 44),
(2, 1, 8, 1, 1000, 1000),
(3, 1, 9, 1, 44, 44);

-- --------------------------------------------------------

--
-- Table structure for table `tblpro`
--

CREATE TABLE IF NOT EXISTS `tblpro` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `mrp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `des` varchar(200) NOT NULL,
  `img` varchar(500) NOT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblpro`
--

INSERT INTO `tblpro` (`productid`, `title`, `mrp`, `price`, `des`, `img`) VALUES
(8, 'check shirt', 2500, 1000, 'ajhdg ajbgdjhav', 'pexels-gabiguerino-1839904.jpg'),
(9, 'demo', 5645, 44, 'kajhdjkahndk', 'pexels-anastasiya-gepp-654466-1462637.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `hobbies` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userid`, `username`, `password`, `email`, `gender`, `hobbies`) VALUES
(1, 'user', '1234', 'user@gmail.com', 'male', 'football,reading'),
(2, 'keshav', 'K1234', 'keshav@gmail.com', 'male', 'sleeping,writing'),
(3, 'pratham', 'P1234', 'pratham@gmail.com', 'male', 'football,reading'),
(4, 'keshav', 'K1234', 'keshav@gmail.com', 'male', 'sleeping,writing'),
(5, 'tyrus', 't1234', 'tyrus@gmail.com', 'Male', 'Vollyball,Football');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
