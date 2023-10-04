-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 04, 2023 at 04:36 PM
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
  `fullName` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `newPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `position` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postal` int NOT NULL,
  `district` varchar(100) NOT NULL,
  `states` varchar(100) NOT NULL,
  `profilePicture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fullName`, `phone`, `email`, `password`, `newPassword`, `position`, `address`, `postal`, `district`, `states`, `profilePicture`) VALUES
('IRDINA SOFIA BINTI ROHAIDI', '0175710871', 'irdina5566@gmail.com', '86b19a0013a70a10e5c46bfd2b0b8504', '', 'ADMIN', 'Alam Impian', 43500, 'Shah Alam', 'Selangor', 'Lv 4.jpg'),
('IRDINA ROHAIDI', '0123456789', 'irdinacs21@gmail.com', '86b19a0013a70a10e5c46bfd2b0b8504', '', 'STAFF', 'Keramat', 53000, 'Kuala Lumpur', 'Wilayah Persekutuan Kuala Lumpur', 'WhatsApp Image 2023-08-17 at 14.19.09.jpg'),
('Irdina Sofia', '01223402506', 'irdinathingy@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', NULL, 'STAFF', 'Meru', 42099, 'Klang', 'Selangor', 'WhatsApp Image 2023-08-17 at 14.19.09.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `dob`, `contactNumber`, `email`, `password`, `code`, `status`) VALUES
(1, 'IRDINA SOFIA BINTI ROHAIDI', '2003-11-03', '0175710871', 'irdina5566@gmail.com', '$2y$10$h/I9cidqjrPvDrFSqZZ4U.P/IpdkAV8wKtnTmhxf6Om0klqB8h.Cy', 0, 'verified'),
(2, 'sofia', '2003-11-03', '012345678', 'irdinacs21@gmail.com', '$2y$10$16HWHnhE/PWaB9CNWZQxA.KLbUhMDPv38X0xugURe0bMH5uoXR0Ze', 0, 'verified'),
(3, 'Aisyah Qarirah binti Hijat', '2000-12-11', '0162557735', 'atiqahhqaisara@gmail.com', '$2y$10$yFvA.JijhZE8n0JWLvejxO9hvVkA600BnH.O2Y6v3K6OEPmA1iHli', 0, 'verified'),
(4, 'Laila Suhaila', '2003-10-13', '0162557794', 'atiqahqaisarahijat@gmail.com', '$2y$10$VCwQ8J7.NGeF9IAThAzwJevP4XYxFHpeZ.4gG0DfPiokIx7CEhYpS', 0, 'verified'),
(7, 'Irdina', '2003-11-03', '0175710871', 'irdinasofia@graduate.utm.my', '$2y$10$dM.nyhYahCmmBin8PzZVnuyxWLRr82ilgJxqGFwbpM5Pk31fQ9X8i', 0, 'verified'),
(8, 'Irdina', '2003-11-03', '0123456789', 'irdinathingy@gmail.com', '$2y$10$Kq.xL4SBzKbYgd1Z/SdmN.WAmgAb6MVrIQjEPUKALU4d7du1.E.cq', 0, 'verified');

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
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketId` int NOT NULL,
  `visitor` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketId`, `visitor`, `category`, `price`) VALUES
(1, 'Malaysian', 'Adult', 20.00);

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
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
