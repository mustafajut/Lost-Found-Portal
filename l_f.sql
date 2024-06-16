-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 08:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l&f`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(15) NOT NULL,
  `category_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Bag'),
(1, 'Book'),
(7, 'Earpods'),
(4, 'keys'),
(9, 'Lunch Box'),
(3, 'Mobile'),
(5, 'Notes'),
(8, 'Others'),
(10, 'Perfume'),
(11, 'Stationary'),
(6, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `lostclaim`
--

CREATE TABLE `lostclaim` (
  `cId` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `ccontact` varchar(12) NOT NULL,
  `lostitemname` varchar(255) NOT NULL,
  `lostitemdate` date NOT NULL,
  `lostitemlocation` varchar(255) NOT NULL,
  `lostitemdesc` varchar(255) NOT NULL,
  `proofimage` blob NOT NULL,
  `claim_status` int(11) NOT NULL DEFAULT 0,
  `additioninfo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lostclaim`
--

INSERT INTO `lostclaim` (`cId`, `cname`, `ccontact`, `lostitemname`, `lostitemdate`, `lostitemlocation`, `lostitemdesc`, `proofimage`, `claim_status`, `additioninfo`) VALUES
(1, 'jutt', '0300-8000000', 'Bag', '2024-02-23', 'Room#9', 'This is my bag i lost in room#9', '', 0, 'this is my bag');

-- --------------------------------------------------------

--
-- Table structure for table `reportfound`
--

CREATE TABLE `reportfound` (
  `fitemName` varchar(255) NOT NULL,
  `FDate` date NOT NULL,
  `fLocation` varchar(255) NOT NULL,
  `fTime` enum('Morning','Afternoon','Evening') NOT NULL,
  `fItemDescription` varchar(255) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `fitemId` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportfound`
--

INSERT INTO `reportfound` (`fitemName`, `FDate`, `fLocation`, `fTime`, `fItemDescription`, `Contact`, `status`, `fitemId`, `category_name`) VALUES
('bag red', '2024-12-06', 'ROOM#18', 'Morning', 'FOUND RED BAG', '0300-0000000', 0, 2, 'Bag'),
('Lunch Box', '2024-12-03', 'Cafeteria', 'Afternoon', 'Found Lunch Box From Cafeteria if someone lost it contact me 0301-1232445', '0301-1232445', 0, 3, 'Lunch Box');

-- --------------------------------------------------------

--
-- Table structure for table `reportlost`
--

CREATE TABLE `reportlost` (
  `litemName` varchar(255) NOT NULL,
  `LostDate` date NOT NULL,
  `lLostLocation` varchar(255) NOT NULL,
  `lLostTime` enum('Morning','Afternoon','Evening') NOT NULL,
  `lItemDescription` varchar(255) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `itemimage` blob NOT NULL,
  `litemId` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reportlost`
--

INSERT INTO `reportlost` (`litemName`, `LostDate`, `lLostLocation`, `lLostTime`, `lItemDescription`, `Contact`, `itemimage`, `litemId`, `category_name`) VALUES
('Urdu Book ', '2024-10-02', 'Room#10', 'Morning', 'Lost Urdu Book from room# 10', '0300-0000000', 0x75706c6f61642f36383363623164663061653766663532623832616461313633343239353637612e6a7067, 3, 'Book'),
('Lunch Box', '2024-12-01', 'Room# 19', 'Morning', 'Lost My Lunch Box From Room# 19 If Someone found Contact me at 0300-0000000', '0300-0000000', 0x75706c6f61642f636f666665322e6a7067, 4, 'Lunch Box'),
('Perfume ', '2023-02-05', 'Room# 10', 'Morning', 'Lost My Perfume from Room#10 If Someone Found contact me at 0300-0000000', '0300-0000000', 0x75706c6f61642f706578656c732d6b68756c6f6f642d616264756c6768616e692d31313438323438312e6a7067, 5, 'Perfume'),
('ICT Notes', '2024-02-01', 'Library', 'Morning', 'Lost ICT & Society Notes from Library if someone found Contact me at 0300-1234567', '0300-1234567', 0x75706c6f61642f61622e6a7067, 6, 'Notes'),
('Casual Watch', '2024-02-04', 'Exam Hall', 'Afternoon', 'Lost casual Watch from hall If someone found Contact me 0300-1234567', '0300-1234567', 0x75706c6f61642f77617463682e6a666966, 7, 'Watch'),
('Gucci Bag ', '2024-03-04', 'Library', 'Afternoon', 'Lost  Red Bag From Library If some one found Report it', '0903-0654444', 0x75706c6f61642f6261672e6a666966, 8, 'Bag');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(50) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Phone`, `Password`, `type`) VALUES
(1, 'Ali g', 'agfafg', '0300-0000002', '123456', 'user'),
(3, 'Mustafa', 'mustafa@gmail.com', '0300-8333727', '123456', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_name` (`category_name`);

--
-- Indexes for table `lostclaim`
--
ALTER TABLE `lostclaim`
  ADD PRIMARY KEY (`cId`);

--
-- Indexes for table `reportfound`
--
ALTER TABLE `reportfound`
  ADD PRIMARY KEY (`fitemId`),
  ADD KEY `fk_reportfound_category_name` (`category_name`);

--
-- Indexes for table `reportlost`
--
ALTER TABLE `reportlost`
  ADD PRIMARY KEY (`litemId`),
  ADD KEY `fk_category_name` (`category_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lostclaim`
--
ALTER TABLE `lostclaim`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reportfound`
--
ALTER TABLE `reportfound`
  MODIFY `fitemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reportlost`
--
ALTER TABLE `reportlost`
  MODIFY `litemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reportfound`
--
ALTER TABLE `reportfound`
  ADD CONSTRAINT `fk_reportfound_category_name` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`);

--
-- Constraints for table `reportlost`
--
ALTER TABLE `reportlost`
  ADD CONSTRAINT `fk_category_name` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
