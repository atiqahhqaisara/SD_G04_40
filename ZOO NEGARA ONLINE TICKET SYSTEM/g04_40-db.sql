-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2023 at 01:04 PM
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
(6, 'To be the leader and innovator in wildlife conservation, recreation, education, training and research.');

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
(2, 'To be one of the world\'s premier zoological park and aquaria dedicated to the conservation, recreation, education, training, and research of various animal and plant species');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `fullName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `newPassword` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `position` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `postal` int NOT NULL,
  `district` varchar(100) NOT NULL,
  `states` varchar(100) NOT NULL,
  `profilePicture` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fullName`, `phone`, `email`, `password`, `newPassword`, `position`, `address`, `postal`, `district`, `states`, `profilePicture`) VALUES
('Akif', '0122334455', 'akifzaini@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', NULL, 'STAFF', 'Rawang', 49999, 'Gombak', 'Selangor', NULL),
('Amir Redzuan', '0178676810', 'amir123@gmail.com', '5913e612d3c4c24a75fb80b5b44b2e24', NULL, 'STAFF', 'Pasir Mas', 79992, 'KL', 'KL', NULL),
('Atiqah Qaisara', '0123456789', 'atiqahqaisarah@gmail.com', '2d60fb0b8a1d5d5e2b3393580ecab9aa', NULL, 'STAFF', 'Sentul', 51000, 'Kuala Lumpur', 'Kuala Lumpur', NULL),
('Chua Lin Wei', '0112233445', 'fifichua@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', NULL, 'STAFF', 'Ampang', 50000, 'Kuala Lumpur', 'Kuala Lumpur', NULL),
('Irdina Sofia', '0175710871', 'irdina5566@gmail.com', 'b223d3f6339c228132e4e1e2732754ec', '', 'ADMIN', 'Alam Impian', 30000, 'Klang', 'Selangor', 'pic.jpg'),
('Irdina Rohaidi', '0123456789', 'irdinacs21@gmail.com', 'b223d3f6339c228132e4e1e2732754ec', '', 'STAFF', 'Keramat', 53100, 'Kuala Lumpur', 'Wilayah Persekutuan Kuala Lumpur', 'pic.jpg');

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
(1, '2023-11-20 10:56:33', '2023-11-21', 'Irdina Sofia', 'irdina5566@gmail.com', '0123456789', 1, 1, 1, 0, 0, 0, 86.00, 1),
(2, '2023-11-20 10:58:46', '2023-11-22', 'Akif', 'irdina5566@gmail.com', '01235647838', 1, 0, 0, 0, 0, 0, 45.00, 1),
(3, '2023-11-20 10:59:59', '2023-11-23', 'Amir', 'irdina5566@gmail.com', '0145627389', 2, 2, 2, 0, 0, 0, 172.00, 0),
(4, '2023-11-20 11:00:55', '2023-11-24', 'Fifi', 'irdina5566@gmail.com', '01987263542', 1, 0, 0, 0, 0, 0, 45.00, 1),
(5, '2023-11-20 11:01:53', '2023-11-28', 'Atiqah', 'irdina5566@gmail.com', '0172345689', 1, 0, 0, 0, 0, 0, 45.00, 1),
(7, '2023-11-21 17:46:21', '2023-11-24', 'Irdina', 'irdina5566@gmail.com', '0127571087', 1, 0, 0, 0, 0, 0, 45.00, 0),
(8, '2023-11-22 12:14:07', '2023-12-08', 'irdina', 'irdina5566@gmail.com', '0123456789', 1, 0, 0, 0, 0, 0, 45.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `picId` int NOT NULL,
  `picName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `picNum` varchar(10) NOT NULL,
  `picEmail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`picId`, `picName`, `picNum`, `picEmail`) VALUES
(1, 'Ali', '0198810981', 'ali123@gmail.com'),
(2, 'Aina', '0162345567', 'ainaa@gmail.com'),
(3, 'Alya', '0123456789', 'alyaaa@gmail.com'),
(4, 'Sofia', '0123456778', 'sofiaaaa@gmail.com'),
(5, 'Atiqah', '0123456789', 'atiqah@gmail.com');

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
('Sofia', '2003-11-03', '0175710871', 'irdina5566@gmail.com', '$2y$10$XE0CDj4mSgaluE5j8367SuFMVOLFX0OppiXsTrjJUGPt.PIvZnt6a', 0, 'verified'),
('Irdina', '2003-11-03', '0123456789', 'irdinacs21@gmail.com', '$2y$10$WQTpfV0bVjuhzKp9ZXM57e9jEG8KWLAj/vrvFOtDOh/iSu0yf7xrG', 0, 'verified'),
('Allea', '2003-11-19', '0122342506', 'irdinathingy@gmail.com', '$2y$10$woRrUHPBEoFmynJidj5AIuMJlTSidn37Uzn91.GXx5d01d.jjADF6', 0, 'verified'),
('Chua Lin Wei', '2003-08-22', '01110887243', 'miaofifi146@gmail.com', '$2y$10$HNXEMf4345oKK/wVF1PlwO8Cpn26L6.NT3Qkh.ovI8dzMiB4nufAm', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enquiryId` int NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` varchar(1200) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enquiryId`, `email`, `phone`, `message`, `time`, `status`) VALUES
(1, 'irdina5566@gmail.com', '0123345678', 'how to book?', '2023-11-18 14:50:42', 1),
(2, 'irdina5566@gmail.com', '0123456789', 'Can I walk in?', '2023-11-18 15:22:44', 1),
(3, 'irdina5566@gmail.com', '0123456789', 'Is there any events?', '2023-11-19 05:24:33', 1),
(4, 'irdina5566@gmail.com', '0123456789', 'Can I get the pic contact for birthday event?', '2023-11-20 19:19:46', 0),
(5, 'irdina5566@gmail.com', '0123456789', 'Is the food good?', '2023-11-20 19:20:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventId` int NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `lastDate` date DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventId`, `eventName`, `eventDate`, `lastDate`, `description`, `image`) VALUES
(1, 'Birthday Party - Zoo Fiesta Package', '2023-01-01', '2023-12-31', 'Celebrate your birthday with us and let our party crew host this memorable function.  We can even bring out some tame animals on your special day. Join our package now!', 'BirthdayPackage.jpg'),
(2, 'Orang Utan Fun Walk @ Zoo Negara', '2023-12-01', '2023-12-31', 'With a minimum commitment fees you will get a free entrance to Zoo Negara, fun activities, lucky draw, t-shirt, finisher medal, 2 meals (breakfast & lunch) and e-certificate. During the Orangutan Fun Walk, participants will have the opportunity to explore the zoo grounds while enjoying a leisurely stroll alongside the orangutan enclosures.', 'event (2).png'),
(3, 'Zoo Explorers Kids Camp', '2023-12-09', '2023-12-09', 'Calling all young explorers! Join us for a day filled with adventure, education, and hands-on fun. Our Zoo Explorers Kids Camp offers a unique opportunity for children to engage with wildlife through games, crafts, and guided tours. It\'s an unforgettable experience designed for the next generation of conservation enthusiasts.', 'zooex.png'),
(4, 'Shutter Safari Photography Day', '2023-12-19', '2023-12-19', 'Grab your cameras and join us for a Shutter Safari Photography Day! Capture the beauty and essence of our zoo\'s inhabitants in this exclusive photography event. Whether you\'re a beginner or a seasoned photographer, this is your chance to snap stunning shots and gain insights from photography experts.', 'photography.png'),
(5, 'Dolphin Show', '2023-12-15', '2023-12-22', 'Enjoy the dolphin show!!', 'ticket-dolphin.jpg');

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
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`transactionID`, `name`, `email`, `phone`, `price`, `status`) VALUES
('TP2311183507029802', 'irdina', 'irdina5566@gmail.com', '0123456789', 45.00, 1),
('TP2311200620708136', 'Irdina', 'irdina5566@gmail.com', '0175710871', 45.00, 1),
('TP2311201934399194', 'Fifi', 'irdina5566@gmail.com', '01987263542', 45.00, 1),
('TP2311202868984209', 'Atiqah', 'irdina5566@gmail.com', '0172345689', 45.00, 1),
('TP2311203319793145', 'Akif', 'irdina5566@gmail.com', '01235647838', 45.00, 1),
('TP2311204373060937', 'Irdina Sofia', 'irdina5566@gmail.com', '0123456789', 86.00, 1),
('TP2311221782840403', 'Irdina', 'irdina5566@gmail.com', '0127571087', 45.00, 1),
('TP2311224418603133', 'irdina', 'irdina5566@gmail.com', '0123456789', 45.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotionId` int NOT NULL,
  `promotionName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `startDate` date NOT NULL,
  `lastDate` date DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `promotion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotionId`, `promotionName`, `startDate`, `lastDate`, `description`, `promotion`, `image`) VALUES
(1, 'Free Trem', '2023-10-13', '2023-10-17', 'Only Applicable for big family', 'Free', 'tram.png'),
(2, 'Promo Dolphin Show', '2023-10-11', '2023-10-17', 'Enjoy our dolphin show! Only applicable walk-in', '50% Off', 'dolphin.png'),
(3, 'Creature Carnival', '2023-12-01', '2023-12-31', 'Join the Creature Carnival in style! Children dressed in carnival or animal-themed costumes receive half-price admission. A fun-filled day of entertainment and surprises awaits.', 'Half-Price Admission for Kids in Costume', 'kids.png'),
(4, 'Family Funday Fiesta', '2023-11-01', '2023-12-31', ' Make Sundays memorable with our Family Funday Fiesta! Bring the whole family for a day of laughter, learning, and love for animals – because weekends are for making memories.', ' Special family packages available ', 'download.jpg'),
(5, 'Penguin Parade Party', '2023-12-01', '2023-12-31', 'March into the Penguin Parade Party! Join our adorable penguins for a celebration of fun and frolic. Exclusive penguin-themed activities, photo opportunities, and discounted admission for a chilly good time.', '50% Off', 'penguin.png');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `replyId` int NOT NULL,
  `enquiryId` int NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`replyId`, `enquiryId`, `email`, `phone`, `message`, `time`) VALUES
(1, 1, 'irdina5566@gmail.com', '0123345678', 'hello', '2023-11-18 14:53:23'),
(2, 2, 'irdina5566@gmail.com', '0123456789', 'iyeeee', '2023-11-18 15:24:09'),
(3, 3, 'irdina5566@gmail.com', '0123456789', 'makanlah', '2023-11-19 05:31:41');

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
(1, 'Malaysian', 'Adult', 45.00),
(2, 'Malaysian', 'Children', 18.00),
(3, 'Malaysian', 'Senior Citizen', 23.00),
(4, 'Foreigner', 'Adult', 50.00),
(5, 'Foreigner', 'Children', 25.00),
(6, 'Foreigner', 'Senior Citizen', 50.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutmission`
--
ALTER TABLE `aboutmission`
  ADD PRIMARY KEY (`missionId`);

--
-- Indexes for table `aboutvision`
--
ALTER TABLE `aboutvision`
  ADD PRIMARY KEY (`visionId`);

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
  ADD PRIMARY KEY (`enquiryId`),
  ADD KEY `enquiry_ibfk_1` (`email`);

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
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`replyId`),
  ADD KEY `reply_ibfk_1` (`enquiryId`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutmission`
--
ALTER TABLE `aboutmission`
  MODIFY `missionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `aboutvision`
--
ALTER TABLE `aboutvision`
  MODIFY `visionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `picId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enquiryId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `replyId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticketId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `enquiry_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`enquiryId`) REFERENCES `enquiry` (`enquiryId`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
