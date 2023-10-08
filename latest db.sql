-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2023 at 05:10 PM
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
-- Database: `cardb`
--
CREATE DATABASE IF NOT EXISTS `cardb` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `cardb`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_reference` varchar(100) NOT NULL DEFAULT '',
  `Cust_no` varchar(6) DEFAULT NULL,
  `Date_reserved` date DEFAULT NULL,
  `Reserved_by` char(12) DEFAULT NULL,
  `Date_rent_start` date DEFAULT NULL,
  `Date_rent_end` date DEFAULT NULL,
  `Rental_period` smallint DEFAULT NULL,
  `regNumber` varchar(20) DEFAULT NULL,
  `Amount_due` double DEFAULT NULL,
  `Paid` varchar(50) DEFAULT NULL,
  `bookingStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Booking_reference`, `Cust_no`, `Date_reserved`, `Reserved_by`, `Date_rent_start`, `Date_rent_end`, `Rental_period`, `regNumber`, `Amount_due`, `Paid`, `bookingStatus`) VALUES
('c01ABP10242017-08-31', 'c01', '2017-08-31', 'c01', '2017-08-31', '2017-09-02', 2, 'ABP1024', 211.9788, NULL, NULL),
('c01ABP10242017-09-05', 'c01', '2017-09-05', 'c01', '2017-09-05', '2017-09-09', 4, 'ABP1024', 423.9576, NULL, NULL),
('c01ABP10242020-01-22', 'c01', '2020-01-17', 'c01', '2020-01-22', '2020-01-25', 3, 'ABP1024', 317.9682, NULL, NULL),
('c01ABP10242020-02-20', 'c01', '2020-02-14', 'c01', '2020-02-20', '2020-02-28', 8, 'ABP1024', 847.9152, NULL, NULL),
('c01ABP10242021-02-09', 'c01', '2021-02-08', 'c01', '2021-02-09', '2021-02-11', 2, 'ABP1024', 211.9788, NULL, NULL),
('c01ABP10242021-02-23', 'c01', '2021-02-22', 'c01', '2021-02-23', '2021-02-25', 2, 'ABP1024', 211.9788, NULL, NULL),
('c01ABP10242023-03-27', 'c01', '2023-03-23', 'c01', '2023-03-27', '2023-03-29', 2, 'ABP1024', 211.9788, NULL, NULL),
('c01ABP10242023-04-11', 'c01', '2023-03-27', 'c01', '2023-04-11', '2023-04-13', 2, 'ABP1024', 211.9788, NULL, NULL),
('c01airBNB22222021-02-25', 'c01', '2021-02-24', 'c01', '2021-02-25', '2021-02-26', 1, 'airBNB2222', 106, NULL, NULL),
('c01BBB12342017-09-05', 'c01', '2017-09-05', 'c01', '2017-09-05', '2017-09-08', 3, 'BBB1234', 317.9682, NULL, NULL),
('c01BNB11232020-02-27', 'c01', '2020-02-20', 'c01', '2020-02-27', '2020-02-29', 2, 'BNB1123', 180.2, NULL, NULL),
('c01BNB11232021-01-23', 'c01', '2021-01-23', 'c01', '2021-01-23', '2021-01-27', 4, 'BNB1123', 360.4, NULL, NULL),
('c01VA1012017-09-21', 'c01', '2017-08-31', 'c01', '2017-09-21', '2017-09-26', 5, 'VA101', 529.947, NULL, NULL),
('c01XA1012020-02-26', 'c01', '2020-02-02', 'c01', '2020-02-26', '2020-02-29', 3, 'XA101', 798.18, NULL, NULL),
('C02ABP10242017-08-01', 'C02', '2017-08-31', 'C02', '2017-08-01', '2017-08-05', 4, 'ABP1024', 423.9576, NULL, NULL),
('C02CCC11122017-08-31', 'C02', '2017-08-31', 'C02', '2017-08-31', '2017-09-04', 4, 'CCC1112', 423.9576, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `regNumber` varchar(30) NOT NULL DEFAULT '',
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `regDate` date DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `engineType` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`regNumber`, `brand`, `model`, `regDate`, `price`, `engineType`) VALUES
('ABP1024', 'Toyota', 'VIOS', '2017-08-06', '99.99', NULL),
('airBNB2222', 'Perodua', 'MyVi', '2021-02-08', '100.00', 'Petrol'),
('BBB1234', 'Perodua', 'VIVA', '2017-03-01', '100.00', 'Petrol'),
('BNB1123', 'Perodua', 'Alza', NULL, '85.00', NULL),
('BOSS11', 'Proton', 'X70', '2021-02-12', '200.00', NULL),
('BOSS9999', 'Proton', 'X70', '2021-02-11', '200.00', 'Diesel'),
('BOSSKITA', 'Proton', 'X70', '2021-02-12', '200.00', 'Diesel'),
('CCC1112', 'Proton', 'ARENA', '2017-08-02', '99.99', NULL),
('JLM8469', 'Proton', 'SAGA', '2017-08-07', '99.99', 'Petrol'),
('MNP1123', 'Perodua', 'VIVA', '2017-08-17', '85.00', NULL),
('MNP1124', 'Perodua', 'VIVA', '2017-08-17', '85.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Cust_no` varchar(6) NOT NULL DEFAULT '0',
  `Cust_name` char(100) DEFAULT NULL,
  `Address` char(150) DEFAULT NULL,
  `Town` char(50) DEFAULT NULL,
  `State` char(50) DEFAULT NULL,
  `Post_code` char(10) DEFAULT NULL,
  `Contact` char(20) DEFAULT NULL,
  `Pay_method` char(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Cust_no`, `Cust_name`, `Address`, `Town`, `State`, `Post_code`, `Contact`, `Pay_method`, `email`, `sex`) VALUES
('C001', 'Ali Hamzah', NULL, NULL, NULL, NULL, '0113652147', 'C', NULL, NULL),
('C003', 'Kamaruddin Hamzah', 'NO. 11 USJ 11/2C', 'SUBANG USJ', NULL, NULL, '0123657789', 'C', NULL, NULL),
('C01', 'Ahmad Mustafa b. Harun', NULL, NULL, NULL, NULL, '0192653435', NULL, 'ahmadMus2@yahoo.com', NULL),
('C02', 'Abu kasim bin ali', NULL, NULL, NULL, NULL, '0192832404', 'C', 'kas80@gmail.com', 'MALE'),
('C05', 'Ahmad Kamal Ibrahim', NULL, NULL, NULL, NULL, '0198754622', NULL, 'aki45@yahoo.com', NULL),
('C06', 'Kamaruddin Mat Yatim', NULL, NULL, NULL, NULL, NULL, NULL, 'kam83@gmail.com', NULL),
('C08', 'Nik Kamal Nik Ismail', NULL, NULL, NULL, NULL, NULL, NULL, 'nikKamal@yahoo.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` varchar(50) DEFAULT NULL,
  `Password` varchar(11) DEFAULT NULL,
  `userType` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Password`, `userType`) VALUES
('admin', 'admin', 'ADMIN'),
('C01', 'C01', 'CUSTOMER'),
('S01', 'S01', 'STAFF'),
('C02', 'C02', 'CUSTOMER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_reference`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`regNumber`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Cust_no`);
--
-- Database: `cardb40`
--
CREATE DATABASE IF NOT EXISTS `cardb40` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `cardb40`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactNumber` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`, `name`, `email`, `contactNumber`) VALUES
('sofia', '123', 'irdina', 'irdina@gmail.com', '0123456789'),
('yaya', '123', 'Yaya Yusri', 'yaya@gmail.com', '0123402506');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);
--
-- Database: `cardb402023`
--
CREATE DATABASE IF NOT EXISTS `cardb402023` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `cardb402023`;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `regNumber` varchar(50) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `regDate` date NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `engineType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`regNumber`, `brand`, `model`, `regDate`, `price`, `engineType`) VALUES
('CDE1234', 'TOYOTA', 'ESTIMA', '2022-03-01', '2312.20', 'PETROL'),
('VHT2022', 'LAND ROVER', 'EVOQUE', '2023-03-01', '3021.20', 'PETROL'),
('WKH2177', 'PROTON', 'SAGA', '2023-03-15', '567.80', 'PETROL'),
('WSE1234', 'HONDA', 'CITY', '2022-02-02', '789.00', 'PETROL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`regNumber`);
--
-- Database: `g04s40stsdb`
--
CREATE DATABASE IF NOT EXISTS `g04s40stsdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `g04s40stsdb`;

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `applyNo` int NOT NULL,
  `staffId` varchar(30) DEFAULT NULL,
  `trainingId` varchar(10) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`applyNo`, `staffId`, `trainingId`, `firstName`, `lastName`) VALUES
(8, 'S101', 'T001', 'MEK', 'SOL');

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

CREATE TABLE `attend` (
  `staffId` varchar(30) NOT NULL,
  `trainingId` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `staffStatus` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`staffId`, `trainingId`, `date`, `staffStatus`, `reason`) VALUES
('S101', 'T001', '2023-03-01', 'ATTEND', '-');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `icNumber` varchar(12) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `contactNumber` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateOfEmployment` date NOT NULL,
  `position` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `firstName`, `lastName`, `icNumber`, `dateOfBirth`, `contactNumber`, `email`, `dateOfEmployment`, `position`, `password`) VALUES
('S101', 'HAFIZUDDIN', 'NORDIN', '030401140627', '2003-04-01', '0105531403', 'sol@gmail.com', '2023-01-01', 'admin', 'Sol1403'),
('S102', 'AKIF', 'ZAINI', '031011141231', '2003-10-11', '0182239804', 'akif@gmail.com', '2023-01-01', 'staff', '123'),
('S103', 'AMIR', 'SUPRI', '030118032133', '2003-01-18', '01140235125', 'amir@gmail.com', '2023-01-01', 'STAFF', ''),
('S104', 'IRDINA', 'ROHAIDI', '031103140124', '2003-11-03', '0175710871', 'irdina@gmail.com', '2023-01-01', 'STAFF', ''),
('S105', 'AHMAD', 'ALI', '001223101233', '2000-12-23', '0123456789', 'ahmad@gmail.com', '2022-12-01', 'STAFF', ''),
('S106', 'AZAM', 'AHMAD', '031204101211', '2003-12-04', '0121234098', 'azam@gmail.com', '2023-02-01', 'TRAINER', ''),
('S107', 'MEK', 'SOL', '030303', '2023-04-01', '0123456', 'hfizpiju@gmail.com', '2023-04-29', 'staff', 'hafizuddin');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `trainingId` varchar(10) NOT NULL,
  `trainingName` varchar(100) NOT NULL,
  `trainingDate` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `trainerName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`trainingId`, `trainingName`, `trainingDate`, `location`, `trainerName`) VALUES
('T001', 'WELCOME TO WEB DEVELOPMENT', '2023-03-01', 'GOOGLE MEET', 'HALIM BIN ABU'),
('T002', 'JAVA DEVELOPMENT', '2023-04-12', 'Google Meet', 'Puan Rohana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`applyNo`),
  ADD KEY `staffId` (`staffId`),
  ADD KEY `trainingId` (`trainingId`);

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD KEY `staffId` (`staffId`),
  ADD KEY `trainingId` (`trainingId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`trainingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `applyNo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`),
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`trainingId`) REFERENCES `training` (`trainingId`);

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`trainingId`) REFERENCES `training` (`trainingId`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
-- Database: `g04_40`
--
CREATE DATABASE IF NOT EXISTS `g04_40` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `g04_40`;

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
('Atiqah Qaisara', '0123456789', 'atiqahqaisarah@gmail.com', '5295d4d2995f645c2d451f167cd8514a', NULL, 'STAFF', 'Sentul', 51000, 'Kuala Lumpur', 'Kuala Lumpur', NULL),
('IRDINA SOFIA BINTI ROHAIDI', '0175710871', 'irdina5566@gmail.com', 'bffa783a022fe2d98692014dda6d7a4c', '', 'ADMIN', 'Alam Impian', 30530, 'Shah Alam', 'Selangor', 'Lv 4.jpg'),
('Irdina Rohaidi', '0123456789', 'irdinacs21@gmail.com', 'bffa783a022fe2d98692014dda6d7a4c', '', 'STAFF', 'Keramat', 53100, 'Kuala Lumpur', 'Wilayah Persekutuan Kuala Lumpur', 'WhatsApp Image 2023-08-17 at 14.19.09.jpg'),
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
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventId` int NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `lastDate` date DEFAULT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventId`, `eventName`, `eventDate`, `lastDate`, `description`, `image`) VALUES
(7, 'Animal Feeding', '2023-10-12', '2023-10-16', 'The visitor can feed their favourite animals. Only RM 2.OO for each food', './zoo/feed.jpeg'),
(8, 'Selfie With Animal', '2023-10-20', '2023-10-27', 'Get ready to selfie with the selected animals!', 'zoo/selfie.jpg');

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
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotionId` int NOT NULL,
  `promotionName` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `lastDate` date DEFAULT NULL,
  `description` varchar(5000) NOT NULL,
  `promotion` varchar(5000) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotionId`, `promotionName`, `startDate`, `lastDate`, `description`, `promotion`, `image`) VALUES
(2, 'Free Trem', '2023-10-13', '2023-10-17', 'Only Applicable for big family', 'free', 'promo/feed.jpeg'),
(3, 'Promo Dolphin Show', '2023-10-11', '2023-10-17', 'Enjoy our dolphin show! Only applicable walk-in', '10% Off', 'promo/dolphin.jpg');

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
(1, 'Malaysian', 'Adult', 65.00),
(6, 'Malaysian', 'Children', 35.00),
(7, 'Malaysian', 'Senior Citizen', 20.00);

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
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotionId`);

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
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `query` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_length` text COLLATE utf8mb3_bin,
  `col_collation` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8mb3_bin DEFAULT '',
  `col_default` text COLLATE utf8mb3_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `settings_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"false\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8mb3_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `template_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tables` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `page_nr` int UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tables` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"g04_40\",\"table\":\"admin\"},{\"db\":\"g04_40\",\"table\":\"ticket\"},{\"db\":\"g04_40\",\"table\":\"promotion\"},{\"db\":\"g04_40\",\"table\":\"event\"},{\"db\":\"g04_40\",\"table\":\"customer\"},{\"db\":\"tempahan_kereta_sewa\",\"table\":\"penyewa\"},{\"db\":\"g04_40\",\"table\":\"password_reset_temp\"},{\"db\":\"tempahan_kereta_sewa\",\"table\":\"kereta\"},{\"db\":\"g04_40\",\"table\":\"signup\"},{\"db\":\"g04_40\",\"table\":\"ad\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pdf_page_number` int NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('posdb', 'record', 'itemId');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `prefs` text COLLATE utf8mb3_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'g04_40', 'admin', '{\"CREATE_TIME\":\"2023-09-19 18:36:08\",\"col_order\":[0,1,2,3,4,5,6,7,8,9,10,11],\"col_visib\":[1,1,1,1,1,1,1,1,1,1,1,1]}', '2023-09-19 10:52:24'),
('root', 'tempahan_kereta_sewa', 'kereta', '{\"sorted_col\":\"`kereta`.`gambar` DESC\"}', '2023-04-05 15:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `version` int UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8mb3_bin NOT NULL,
  `schema_sql` text COLLATE utf8mb3_bin,
  `data_sql` longtext COLLATE utf8mb3_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8mb3_bin DEFAULT NULL,
  `tracking_active` int UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-10-08 16:10:33', '{\"Console\\/Mode\":\"collapse\",\"Export\\/file_template_database\":\"__DB__-db_%Y-%m-%d\",\"Export\\/file_template_table\":\"__TABLE__-table_%Y-%m-%d\",\"Export\\/file_template_server\":\"__SERVER__-mysql_%Y-%m-%d\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8mb3_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8mb3_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `posdb`
--
CREATE DATABASE IF NOT EXISTS `posdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `posdb`;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemId` varchar(5) NOT NULL,
  `itemName` varchar(50) NOT NULL,
  `stock` int NOT NULL,
  `price` double(10,2) NOT NULL,
  `pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemId`, `itemName`, `stock`, `price`, `pic`) VALUES
('I01', 'SUGUS', 21, 2.50, 'sugus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `itemId` varchar(5) NOT NULL,
  `staffId` varchar(5) NOT NULL,
  `dateBuy` date NOT NULL,
  `quantity` int NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` varchar(5) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `firstName`, `lastName`, `email`, `password`) VALUES
('S01', 'NAJMI', 'HAKIM', 'najmi@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD KEY `itemId` (`itemId`),
  ADD KEY `staffId` (`staffId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`) ON DELETE RESTRICT ON UPDATE RESTRICT;
--
-- Database: `register`
--
CREATE DATABASE IF NOT EXISTS `register` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `register`;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Database: `salesdb`
--
CREATE DATABASE IF NOT EXISTS `salesdb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `salesdb`;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` int NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`email`, `password`, `phone`, `dob`) VALUES
('irdina@gmail.com', '', 12345678, '2023-04-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`);
--
-- Database: `tempahan_kereta_sewa`
--
CREATE DATABASE IF NOT EXISTS `tempahan_kereta_sewa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `tempahan_kereta_sewa`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nokp_admin` varchar(12) NOT NULL,
  `nama_admin` varchar(60) DEFAULT NULL,
  `katalaluan_admin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nokp_admin`, `nama_admin`, `katalaluan_admin`) VALUES
('111111111111', 'Alif', '123'),
('222222222222', 'Aliya', '123\r\n'),
('333333333333', 'Xiotan', '123\r\n'),
('444444444444', 'Seri', '123'),
('777777777777', 'Jeong ', '123'),
('820111100036', 'Irdina', '123'),
('888888888888', 'Izham', '123'),
('900312000024', 'Mei Ling', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kereta`
--

CREATE TABLE `kereta` (
  `noplat` varchar(10) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `id_model` int DEFAULT NULL,
  `harga_sewaan` double(6,2) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kereta`
--

INSERT INTO `kereta` (`noplat`, `jenis`, `id_model`, `harga_sewaan`, `gambar`) VALUES
('ABC123', 'Camry', 6, 500.00, 'k1.jpg'),
('ASD1234', 'HRV', 8, 600.00, 'k11.png'),
('BCG345', 'Myvi', 10, 250.00, 'BCG3452020-10-30.png'),
('BGF4532', 'City', 8, 600.00, 'k14.jpeg'),
('BML1234', 'Almera', 13, 500.00, 'k8.png'),
('BMW123', 'Sport', 12, 500.00, 'k15.jpg'),
('EFG456', 'A4', 7, 500.00, 'k2.jpg'),
('JMC418', 'XV2.0i', 14, 800.00, 'k9.jpg'),
('KLM1234', 'Sport', 9, 800.00, 'k4.jpg'),
('RM123Q', 'Myvi', 10, 100.00, 'k13.png'),
('RST5678', 'X70', 11, 600.00, 'k6.png'),
('VPQ4321', 'Aruz', 10, 800.00, 'k5.jpg'),
('VWX8756', 'X5', 12, 700.00, 'k7.jpg'),
('WA4318', 'Vellfire', 6, 1000.00, 'k10.png'),
('WIJ789', 'Civic', 8, 350.00, 'k3.png'),
('WVQ1234', 'Bezza', 10, 400.00, 'k12.jpg'),
('WVQ1245', 'Bezza', 10, 400.00, 'k12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id_model` int NOT NULL,
  `jenis_model` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id_model`, `jenis_model`) VALUES
(6, 'Toyota'),
(7, 'Audi'),
(8, 'Honda'),
(9, 'Range Rover'),
(10, 'Perodua'),
(11, 'Proton'),
(12, 'BMW'),
(13, 'Nissan'),
(14, 'Subaru');

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `nokp_penyewa` varchar(12) NOT NULL,
  `nama_penyewa` varchar(60) DEFAULT NULL,
  `notel_penyewa` varchar(15) DEFAULT NULL,
  `katalaluan_penyewa` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`nokp_penyewa`, `nama_penyewa`, `notel_penyewa`, `katalaluan_penyewa`) VALUES
('010123223344', 'Mia', '0123456789', '123'),
('010831100048', 'Amani', '0123456789', '123'),
('012345678910', 'Lily', '0123456789', '123'),
('111111111111', 'Hyun Bin', '0111111111', '123'),
('222222222222', 'Son Ye Jin', '0122222222', '123'),
('333333333333', 'Irdina', '0123456789', '123'),
('444444444444', 'Zhao Lin', '014444444', '123');

-- --------------------------------------------------------

--
-- Table structure for table `sewaan`
--

CREATE TABLE `sewaan` (
  `nokp_penyewa` varchar(12) NOT NULL,
  `noplat` varchar(10) NOT NULL,
  `tarikh_mula` date NOT NULL,
  `tarikh_tamat` date DEFAULT NULL,
  `jumlah_bayaran` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewaan`
--

INSERT INTO `sewaan` (`nokp_penyewa`, `noplat`, `tarikh_mula`, `tarikh_tamat`, `jumlah_bayaran`) VALUES
('010123223344', 'ABC123', '2023-09-27', '2023-09-28', 500.00),
('010831100048', 'ABC123', '2020-07-25', '2020-07-26', 800.00),
('010831100048', 'ABC123', '2020-07-30', '2020-07-31', 800.00),
('010831100048', 'ABC123', '2020-08-07', '2020-08-08', 800.00),
('010831100048', 'ABC123', '2020-08-10', '2020-08-11', 800.00),
('010831100048', 'ABC123', '2020-08-16', '2020-08-17', 500.00),
('010831100048', 'ABC123', '2020-10-01', '2020-10-02', 500.00),
('010831100048', 'ABC123', '2020-10-02', '2020-10-03', 500.00),
('010831100048', 'ABC123', '2020-10-29', '2020-10-30', 500.00),
('010831100048', 'ASD1234', '2020-08-09', '2020-08-10', 600.00),
('010831100048', 'BGF4532', '2020-07-30', '2020-08-08', 2250.00),
('010831100048', 'BGF4532', '2020-08-09', '2020-08-10', 250.00),
('010831100048', 'EFG456', '2020-07-30', '2020-07-31', 800.00),
('010831100048', 'EFG456', '2020-10-27', '2020-10-28', 500.00),
('010831100048', 'RM123Q', '2020-07-30', '2020-08-12', 1300.00),
('010831100048', 'VWX8756', '2020-07-25', '2020-07-29', 3600.00),
('010831100048', 'WA4318', '2020-07-25', '2020-07-26', 1000.00),
('010831100048', 'WA4318', '2020-08-08', '2020-08-26', 18000.00),
('010831100048', 'WA4318', '2020-08-23', '2020-08-24', 1000.00),
('010831100048', 'WVQ1245', '2020-08-10', '2020-08-11', 400.00),
('012345678910', 'RST5678', '2020-10-29', '2020-11-04', 3600.00),
('111111111111', 'KLM1234', '2020-07-30', '2020-08-15', 14400.00),
('222222222222', 'WIJ789', '2020-07-30', '2020-08-16', 13600.00),
('222222222222', 'WIJ789', '2020-08-14', '2020-08-15', 350.00),
('333333333333', 'ABC123', '2020-08-14', '2020-08-15', 500.00),
('444444444444', 'RM123Q', '2020-07-26', '2020-07-27', 100.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nokp_admin`);

--
-- Indexes for table `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`noplat`),
  ADD KEY `id_model` (`id_model`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`nokp_penyewa`);

--
-- Indexes for table `sewaan`
--
ALTER TABLE `sewaan`
  ADD PRIMARY KEY (`nokp_penyewa`,`noplat`,`tarikh_mula`),
  ADD KEY `noplat` (`noplat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kereta`
--
ALTER TABLE `kereta`
  ADD CONSTRAINT `kereta_ibfk_1` FOREIGN KEY (`id_model`) REFERENCES `model` (`id_model`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sewaan`
--
ALTER TABLE `sewaan`
  ADD CONSTRAINT `sewaan_ibfk_1` FOREIGN KEY (`noplat`) REFERENCES `kereta` (`noplat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sewaan_ibfk_2` FOREIGN KEY (`nokp_penyewa`) REFERENCES `penyewa` (`nokp_penyewa`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `tutorial`
--
CREATE DATABASE IF NOT EXISTS `tutorial` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `tutorial`;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('gajanand.kgn@rediffmail.com', 'f53997f1a58352e1fe65046d6953672562bc648b72', '2020-12-30 11:05:26'),
('irdinastudy@gmail.com', '29e4fdbbe51aa0f1b0d98e7f5de0ff144e61b1b40e', '2023-09-10 08:52:49');

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
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `signup` ADD FULLTEXT KEY `ft_signup` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Database: `userform`
--
CREATE DATABASE IF NOT EXISTS `userform` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `userform`;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(3, 'irdina', 'irdinacs21@gmail.com', '$2y$10$HAGMXgkIT51DmvEn9KJTGOGmT5zJ.VY1FaSgMIoaf.ExOxy6byDdW', 719893, 'notverified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
