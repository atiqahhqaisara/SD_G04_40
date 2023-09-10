-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2023 at 04:46 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `g04_40`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `role`) VALUES
('adminzoo@gmail.com', 'zooNEGARA', 'admin'),
('irdinacs21@gmail.com', '8a34471c0661b07e22e5e5f8557b5b74', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contactNumber` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `dob`, `contactNumber`, `email`, `password`, `code`, `status`) VALUES
(1, 'irdina', '2003-11-03', 175710871, 'irdinacs21@gmail.com', '$2y$10$oBvGn3DyFB78tbh36A9MQuBsmQBad811i6yd4dB1.3nlyZcdjw5RO', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(400) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `member_since` varchar(100) NOT NULL,
  `membership` int NOT NULL,
  `dom` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `courtry` varchar(100) NOT NULL,
  `activate` tinyint NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `about_me` varchar(1000) NOT NULL,
  `re_emai` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `ccode` int NOT NULL,
  `activation_has` varchar(300) NOT NULL,
  `activation_time` varchar(200) NOT NULL,
  `website` varchar(300) NOT NULL,
  `fb` varchar(1000) NOT NULL,
  `twitter` varchar(1000) NOT NULL,
  `fb_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `ip`, `member_since`, `membership`, `dom`, `city`, `courtry`, `activate`, `first_name`, `last_name`, `about_me`, `re_emai`, `gender`, `mobile`, `ccode`, `activation_has`, `activation_time`, `website`, `fb`, `twitter`, `fb_id`) VALUES
(30, 'stint', 'gajanand.kgn@rediffmail.com', '$2y$10$9ND.xDaDLZnMup6I4qHfzOpj05zH6AsW4RzHODiWkzmQQllo2UyQC', '113.193.102.61', '2017/09/03 14:50:35', 1, '', 'Indore', 'India', 1, 'Gajanand', 'Rathor', '', '', 'M', '', 0, 'null', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `signup` ADD FULLTEXT KEY `ft_signup` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
