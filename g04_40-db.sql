-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2023 at 06:43 PM
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
-- Table structure for table `aboutmission`
--

CREATE TABLE `aboutmission` (
  `missionId` int NOT NULL,
  `mission` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aboutmission`
--

INSERT INTO `aboutmission` (`missionId`, `mission`) VALUES
(5, 'To provide an outstanding and dynamic habitat for animals and plant life and incorporating high quality animal health care and husbandry.'),
(6, 'To be the leader and innovator in wildlife conservation, recreation, education, training and research.'),
(7, 'To collaborate and disseminate scientific knowledge to local, regional, and worldwide zoos through our science-based approach to wildlife management.');

-- --------------------------------------------------------

--
-- Table structure for table `aboutvision`
--

CREATE TABLE `aboutvision` (
  `visionId` int NOT NULL,
  `vision` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aboutvision`
--

INSERT INTO `aboutvision` (`visionId`, `vision`) VALUES
(2, 'To be one of the world\'s premier zoological park and aquaria dedicated to the conservation, recreation, education, training, and research of various animal and plant speciess');

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
('Amir', '0178676818', 'amir123@gmail.com', '5913e612d3c4c24a75fb80b5b44b2e24', NULL, 'STAFF', 'Pasir Mas', 79992, 'KL', 'KL', NULL),
('Atiqah Qaisara', '0123456789', 'atiqahqaisarah@gmail.com', '2d60fb0b8a1d5d5e2b3393580ecab9aa', NULL, 'STAFF', 'Sentul', 51000, 'Kuala Lumpur', 'Kuala Lumpur', NULL),
('ilya', '0122342506', 'fcvdgebhnj@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'STAFF', 'dfssgh', 20144, 'thd', 'safa', NULL),
('IRDINA SOFIA BINTI ROHAIDI', '0175710871', 'irdina5566@gmail.com', '86b19a0013a70a10e5c46bfd2b0b8504', '', 'ADMIN', 'Alam Impian', 30000, 'Klang', 'Selangor', 'Lv 4.jpg'),
('Irdina Rohaidi', '0123456789', 'irdinacs21@gmail.com', 'bffa783a022fe2d98692014dda6d7a4c', '', 'STAFF', 'Keramat', 53100, 'Kuala Lumpur', 'Wilayah Persekutuan Kuala Lumpur', 'WhatsApp Image 2023-08-17 at 14.19.09.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingId` int NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bookingDate` date NOT NULL,
  `fullName` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `MYadult` int DEFAULT NULL,
  `MYchild` int DEFAULT NULL,
  `MYsenior` int DEFAULT NULL,
  `Iadult` int DEFAULT NULL,
  `Ichild` int DEFAULT NULL,
  `Isenior` int DEFAULT NULL,
  `grandTotal` double(10,2) DEFAULT NULL,
  `status` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingId`, `orderDate`, `bookingDate`, `fullName`, `email`, `phone`, `MYadult`, `MYchild`, `MYsenior`, `Iadult`, `Ichild`, `Isenior`, `grandTotal`, `status`) VALUES
(34, '2023-11-17 15:13:06', '2023-11-24', 'soifa', 'irdina5566@gmail.com', '0123456789', 1, 0, 0, 0, 0, 0, 45.00, 1),
(35, '2023-11-17 17:35:01', '2023-11-30', 'irdina', 'irdina5566@gmail.com', '0123456789', 1, 0, 0, 0, 0, 0, 45.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `picId` int NOT NULL,
  `picName` varchar(255) NOT NULL,
  `picNum` varchar(10) NOT NULL,
  `picEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`picId`, `picName`, `picNum`, `picEmail`) VALUES
(1, 'Ali', '0198810981', 'ali123@gmail.com'),
(2, 'Aina', '0162345567', 'ainaa@gmail.com'),
(3, 'Sheila', '0123342235', 'sheilarh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
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

INSERT INTO `customer` (`name`, `dob`, `contactNumber`, `email`, `password`, `code`, `status`) VALUES
('Aisyah Qarirah binti Hijat', '2000-12-11', '0162557735', 'atiqahhqaisara@gmail.com', '$2y$10$yFvA.JijhZE8n0JWLvejxO9hvVkA600BnH.O2Y6v3K6OEPmA1iHli', 0, 'verified'),
('Laila Suhaila', '2003-10-13', '0162557794', 'atiqahqaisarahijat@gmail.com', '$2y$10$VCwQ8J7.NGeF9IAThAzwJevP4XYxFHpeZ.4gG0DfPiokIx7CEhYpS', 0, 'verified'),
('IRDINA SOFIA BINTI ROHAIDI', '2003-11-03', '0175710871', 'irdina5566@gmail.com', '$2y$10$h/I9cidqjrPvDrFSqZZ4U.P/IpdkAV8wKtnTmhxf6Om0klqB8h.Cy', 0, 'verified'),
('irdina', '2003-11-03', '0123456789', 'irdinacs21@gmail.com', '$2y$10$WQTpfV0bVjuhzKp9ZXM57e9jEG8KWLAj/vrvFOtDOh/iSu0yf7xrG', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` varchar(1200) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `email`, `phone`, `message`, `time`) VALUES
(4, 'irdina5566@gmail.com', '0123456789', 'lapar', '2023-11-17 17:22:19');

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
(1, 'BIRTHDAY – ZOO FIESTA PARTY PACKAGE', '2023-01-01', '2023-12-31', 'Celebrate your birthday with us and let our party crew host this memorable function.  We can even bring out some tame animals on your special day. Join our package now!', 'zoo/event (3).png'),
(2, 'Orangutan Fun Walk @ Zoo Negara', '2023-12-01', '2023-12-31', 'With a minimum commitment fees you will get a free entrance to Zoo Negara, fun activities, lucky draw, t-shirt, finisher medal, 2 meals (breakfast & lunch) and e-certificate. During the Orangutan Fun Walk, participants will have the opportunity to explore the zoo grounds while enjoying a leisurely stroll alongside the orangutan enclosures.', 'zoo/event (2).png');

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `transactionID` varchar(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`transactionID`, `name`, `email`, `phone`, `price`, `status`) VALUES
('TP2311172935475193', 'soifa', 'irdina5566@gmail.com', '0123456789', 45.00, 1),
('TP2311174611502581', 'irdina', 'irdina5566@gmail.com', '0123456789', 45.00, 1);

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
(2, 'Free Trem', '2023-10-13', '2023-10-17', 'Only Applicable for big family', 'Free', 'promo/feed.jpeg'),
(3, 'Promo Dolphin Show', '2023-10-11', '2023-10-17', 'Enjoy our dolphin show! Only applicable walk-in', '50% Off', 'promo/event (1).png');

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
(1, 'Malaysian', 'Adult', 50.00),
(2, 'Malaysian', 'Children', 35.00),
(3, 'Malaysian', 'Senior Citizen', 20.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingId`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`picId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`transactionID`);

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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `picId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `enquiry_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
