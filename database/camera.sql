-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 11:49 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camera`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `idate` datetime DEFAULT NULL,
  `udate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `idate`, `udate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-09-06 19:21:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `quantity`) VALUES
(7, 4, 1, 1),
(20, 5, 1, 1),
(30, 17, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `mes` varchar(200) DEFAULT NULL,
  `res` varchar(200) DEFAULT NULL,
  `iDate` datetime DEFAULT NULL,
  `uDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `contact`, `mes`, `res`, `iDate`, `uDate`) VALUES
(1, 'bh', 'bh@gmail.com', '7600636383', 'd3c3138bddd60cb66d7b62bec7c57334', NULL, '0000-00-00 00:00:00', NULL),
(2, 'bh', 'bha111@gmail.com', '7600636383', '40fe9ad4949331a12f5f19b477133924', NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `regDate` datetime DEFAULT current_timestamp(),
  `payMode` varchar(30) DEFAULT NULL,
  `orderStatus` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `pid`, `quantity`, `regDate`, `payMode`, `orderStatus`) VALUES
(42, 16, 1, 3, '2022-09-05 00:54:50', 'Credit/Debit Card', 'Delivered'),
(43, 16, 1, 2, '2022-09-05 02:29:36', 'Cash on Delivery', 'in Process'),
(44, 17, 2, 3, '2022-09-07 03:34:15', 'Cash on Delivery', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `postDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderid`, `status`, `remarks`, `postDate`) VALUES
(1, 42, 'in Process', 'In Process', NULL),
(2, 42, 'in Process', 'In Process', NULL),
(3, 42, 'in Process', 'In Process', NULL),
(4, 42, 'Delivered', 'Successfully delivered', NULL),
(5, 43, 'in Process', 'Hello your product has been shipped', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `crossPrice` varchar(10) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `img1` varchar(500) DEFAULT NULL,
  `img2` varchar(500) DEFAULT NULL,
  `img3` varchar(500) DEFAULT NULL,
  `checkStatus` varchar(30) DEFAULT NULL,
  `popular` int(2) NOT NULL,
  `iDate` datetime DEFAULT NULL,
  `uDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `brand`, `price`, `crossPrice`, `description`, `img1`, `img2`, `img3`, `checkStatus`, `popular`, `iDate`, `uDate`) VALUES
(1, 'Canon Eos 550', 'Canon', '5001', '6550', 'Canon best camera', 'Canon Eos 550.png', NULL, NULL, 'In Stock', 1, '2022-09-02 21:37:41', NULL),
(2, 'Nikon D 3100', 'Nikon', '3500', '4200', 'Nikon best camera 16MP', 'Nikon D 3100.png', NULL, NULL, 'In Stock', 0, '2022-09-02 21:41:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `shippingAdd` varchar(500) NOT NULL,
  `shippingState` varchar(25) NOT NULL,
  `shippingCity` varchar(25) NOT NULL,
  `shippingPincode` varchar(10) NOT NULL,
  `billingAdd` varchar(500) NOT NULL,
  `billingState` varchar(25) NOT NULL,
  `billingCity` varchar(25) NOT NULL,
  `billingPincode` varchar(10) NOT NULL,
  `regDate` datetime NOT NULL DEFAULT current_timestamp(),
  `uDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `password`, `shippingAdd`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAdd`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `uDate`) VALUES
(16, 'Bh', 'bh@gmail.com', '7600636383', 'c08bba7a0c0386f1551e8474d853ecbf', 'Swaminarayan', 'Guj', 'Anand', '388680', 'Swaminarayan mandir', 'Gujrat', 'Anand', '388180', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Bh', 'bhaaa@gmail.com', '7600636383', '23af498bbaddfc2589b3958edc7bded6', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
