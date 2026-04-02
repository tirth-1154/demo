-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2026 at 08:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `addedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcat`
--

CREATE TABLE `tblcat` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcat`
--

INSERT INTO `tblcat` (`categoryid`, `categoryname`) VALUES
(1, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `totalamout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderid`, `userid`, `orderdate`, `totalamout`) VALUES
(1, 1, '2025-08-27 01:36:12', 1044),
(2, 6, '2025-09-22 00:01:01', 474),
(3, 7, '2025-11-29 08:24:51', 553),
(4, 7, '2025-12-01 04:18:11', 534),
(5, 7, '2025-12-02 03:08:44', 623),
(6, 7, '2025-12-04 01:07:16', 348),
(7, 8, '2025-12-05 22:35:33', 1068),
(8, 8, '2025-12-05 22:36:35', 553),
(9, 9, '2026-03-19 13:44:04', 60),
(10, 9, '2026-03-19 13:54:30', 315);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetails`
--

CREATE TABLE `tblorderdetails` (
  `detailid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `qty` int(11) DEFAULT 1,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblorderdetails`
--

INSERT INTO `tblorderdetails` (`detailid`, `orderid`, `productid`, `qty`, `price`, `subtotal`) VALUES
(1, 0, 9, 1, 44, 44),
(2, 1, 8, 1, 1000, 1000),
(3, 1, 9, 1, 44, 44),
(4, 2, 11, 6, 79, 474),
(5, 3, 11, 7, 79, 553),
(6, 4, 12, 6, 89, 534),
(7, 5, 12, 7, 89, 623),
(8, 6, 17, 1, 199, 199),
(9, 6, 18, 1, 149, 149),
(10, 7, 12, 12, 89, 1068),
(11, 8, 11, 7, 79, 553),
(12, 9, 19, 1, 25, 25),
(13, 9, 20, 1, 35, 35),
(14, 10, 12, 9, 35, 315);

-- --------------------------------------------------------

--
-- Table structure for table `tblpro`
--

CREATE TABLE `tblpro` (
  `productid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `mrp` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `des` varchar(200) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpro`
--

INSERT INTO `tblpro` (`productid`, `title`, `mrp`, `price`, `categoryid`, `des`, `img`) VALUES
(11, 'Fresh Apples', 120, 100, NULL, 'Crisp, sweet, and freshly handpicked apples delivered farm-fresh to your door.', 'apples.jpg'),
(12, 'Whole Wheat Bread', 40, 35, NULL, 'Freshly baked 100% whole wheat bread, perfect for a healthy breakfast.', 'bread.jpg'),
(13, 'Amul Milk 1L', 65, 62, NULL, 'Daily essential fresh milk with essential nutrients for a healthy start.', 'milk.jpg'),
(14, 'Basmati Rice 1kg', 150, 130, NULL, 'Premium quality long-grain Basmati rice, perfect for every special meal.', 'rice.jpg'),
(15, 'Aashirvaad Atta 5kg', 250, 230, NULL, '100% whole wheat chakki fresh atta for soft and fluffy rotis.', 'atta.jpg'),
(16, 'Tata Salt 1kg', 25, 22, NULL, 'Vacuum evaporated iodized salt, carefully sourced and packed.', 'salt.jpg'),
(17, 'Toor Dal 1kg', 180, 160, NULL, 'Unpolished toor dal, rich in protein and essential nutrients.', 'dal.jpg'),
(18, 'Sunflower Oil 1L', 160, 145, NULL, 'Light and healthy sunflower oil, fortified with vitamins.', 'oil.jpg'),
(19, 'Fresh Potatoes 1kg', 30, 25, NULL, 'Farm fresh, versatile potatoes for all your cooking needs.', 'potato.jpg'),
(20, 'Fresh Onions 1kg', 40, 35, NULL, 'High-quality fresh onions, essential for everyday cooking.', 'onion.jpg'),
(21, 'Eggs 1 Dozen', 80, 75, NULL, 'Farm-fresh, protein-rich white eggs.', 'eggs.jpg'),
(22, 'qwefwegtr', 120, 110, 1, 'wqef', '1586323267_1586323258031.jpg.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `hobbies` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userid`, `username`, `password`, `email`, `phone`, `address`, `city`, `pincode`, `gender`, `hobbies`) VALUES
(1, 'user', '1234', 'user@gmail.com', '9876543210', '456 Green St, City', 'City', '110001', 'male', 'football,reading'),
(6, 'Divy', 'divy123', 'pateldivy@gmali.com', '9876543211', '789 Fruit Lane, Area', 'Area', '110002', 'Male', 'Cricket,Volleyball'),
(7, 'tirth', '1234', 'tirth@gmail.com', '9876543212', '123 Veggie Road, Town', 'Town', '110003', 'Male', 'Cricket,Volleyball'),
(8, 'krish', '12345', 'krish@gmail.com', '9876543213', '101 Farm View, Village', 'Village', '110004', 'Male', 'Volleyball'),
(9, 'sayam', 'sayam123', 'sayam@gmail.com', '1234567890', 'wfeklj3hrfyug4ry cgft4uygt', 'Surat', '394221', 'Male', 'Organic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cartid`),
  ADD UNIQUE KEY `ux_user_product` (`userid`,`productid`),
  ADD KEY `idx_user` (`userid`),
  ADD KEY `idx_product` (`productid`);

--
-- Indexes for table `tblcat`
--
ALTER TABLE `tblcat`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  ADD PRIMARY KEY (`detailid`);

--
-- Indexes for table `tblpro`
--
ALTER TABLE `tblpro`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcat`
--
ALTER TABLE `tblcat`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblorderdetails`
--
ALTER TABLE `tblorderdetails`
  MODIFY `detailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblpro`
--
ALTER TABLE `tblpro`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
