-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 07:45 PM
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
-- Database: `l_f`
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
(13, 'Laptop'),
(9, 'Lunch Box'),
(3, 'Mobile'),
(5, 'Notes'),
(8, 'Others'),
(10, 'Perfume'),
(11, 'Stationary'),
(6, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `Name`, `email`, `Message`) VALUES
(1, 'Mustafa ', 'mustafa@gmail.cm', 'Great Initiative!'),
(2, 'mustafajut', 'mustafajut01@gmail.com', 'Great! It helped me to find my Laptop'),
(3, 'Awais', 'awasi@gmail.com', 'Thanks for helping me t found my lost Earpods'),
(4, 'Hammad', 'hammad@gmail.com', 'This portal helped me to find my lost keys ');

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
(1, 'jutt', '0300-8000000', 'Bag', '2024-02-23', 'Room#9', 'This is my bag i lost in room#9', '', 1, 'this is my bag'),
(2, 'Ali gee ', '0800-2232424', 'Red Gucci Bag', '2024-04-03', 'Islamabad', 'Lost Gucci bag red Color from library', 0x6261672e6a706567, 0, '');

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
('bag red', '2024-12-06', 'ROOM#18', 'Morning', 'FOUND RED BAG if some one lost contact me ', '0300-0000000', 1, 2, 'Bag'),
('Lunch Boxes', '2024-12-03', 'Cafeteria', 'Afternoon', 'Found Lunch Box From Cafeteria if someone lost it contact me 0301-1232445', '0301-1232445', 0, 3, 'Others'),
('Red Gucci Bag', '2024-03-12', 'Library', 'Afternoon', 'Found Gucci Bag Red Color if found contact 0900-2234443', '0900-2234443', 0, 4, 'Bag'),
('Hands free', '2024-08-29', 'Room # 19', 'Evening', 'Found white hands free from room# 19 if someone lost feel free to contact me.\r\n0302-1223456', '0302-1223456', 0, 5, 'Others'),
('Hands free', '2024-08-29', 'Room # 19', 'Evening', 'Found white hands free from room# 19 if someone lost feel free to contact me.\r\n0302-1223456', '0302-1223456', 0, 6, 'Others');

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
('Urdu Book ', '2024-10-02', 'Room#10', 'Morning', 'Lost Urdu Book from room# 10 in the morning', '0300-0000000', 0x75706c6f61642f36383363623164663061653766663532623832616461313633343239353637612e6a7067, 3, 'Book'),
('Red Lunch Box', '2024-12-01', 'Room# 19', 'Afternoon', 'Lost My Lunch Box From Room# 19 If Someone found Contact me at 0300-0000000', '0300-0000000', 0x75706c6f61642f636f666665322e6a7067, 4, 'Lunch Box'),
('Perfume ', '2023-02-05', 'Room# 10', 'Morning', 'Lost My Perfume from Room#10 If Someone Found contact me at 0300-0000000', '0300-0000000', 0x75706c6f61642f706578656c732d6b68756c6f6f642d616264756c6768616e692d31313438323438312e6a7067, 5, 'Perfume'),
('ICT Notes', '2024-02-01', 'Library', 'Morning', 'Lost ICT & Society Notes from Library if someone found Contact me at 0300-1234567', '0300-1234567', 0x75706c6f61642f61622e6a7067, 6, 'Notes'),
('Red Gucci Bag', '2024-03-12', 'Room#17', 'Morning', 'Lost red Gucci Bag From room#17', '0900-1234567', 0x75706c6f61642f6261672e6a706567, 10, 'Bag'),
('Watch', '2024-02-12', 'Library', 'Morning', 'Lost Men\'s Watch Gray Color if found contact 0900-2234443', '0900-2234443', 0x75706c6f61642f646f776e6c6f61642e6a706567, 11, 'Watch'),
('Camera', '2024-03-12', 'Studio Room', 'Afternoon', 'Lost Camera Gray Color if found contact 0900-2234443', '0900-2234443', 0x75706c6f61642f706578656c732d726f6e2d6c6163682d31303334393938392e6a7067, 12, 'Others'),
('Hands free', '2024-08-28', 'Room # 19', 'Afternoon', 'i Lost my Mobile hands free :\r\nits color is white and company is huawei. If someone found this please return it to me ASAP', '0303-2873784', 0x75706c6f61642f68616e6473667265652e6a706567, 13, 'Others'),
('Black watch', '2024-10-12', 'Room # 06', 'Afternoon', 'Lost my Black watch from room#06 fin the morning. If someone found let me know', '0301-2334566', 0x75706c6f61642f646f776e6c6f61642e6a706567, 15, 'Watch');

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
(4, 'Mustafa Jutt', 'mustafa@gmail.com', '0300-9432701', 'sana9876', 'admin'),
(8, 'juttt', 'juttt@gmail.commmm', '0301-3343782', '$2y$10$mKjVYE9bKH34V02K92TZpOnjmOIQNkQOmW1.j9isbkIfCCsjUsX5y', 'user'),
(9, 'Awais', 'awasi@gmail.com', '0333-5248722', '$2y$10$Vb1fsO5d1JfNUGsKGVd4yua/3FMsD71hwb9xySNTgjeScF6fZ1B6S', 'user'),
(10, 'admin', 'mustafajut01@gmail.com', '0300-8932311', '$2y$10$EfmU9lrjfTzq9Kjwj9nuU.w/mq8CG6ZSiFY7nMBIf6VvLSCONEA9e', 'admin'),
(11, 'Ali ', 'ali1@gmail.com', '0890-1243544', '$2y$10$KsUc47w6E22W33V9.CO.De69nJsv65yLAstYAb9OjF/VjGmWOY0gm', 'user'),
(12, 'Atta', 'atta@gmail.com', '0323-4342222', '$2y$10$WWN9LviFFNmPtGbGLoXTJOVdkdlhaLUJ.ej6kAtz.U.awwDEdW4I2', 'user');

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
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `category_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lostclaim`
--
ALTER TABLE `lostclaim`
  MODIFY `cId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reportfound`
--
ALTER TABLE `reportfound`
  MODIFY `fitemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reportlost`
--
ALTER TABLE `reportlost`
  MODIFY `litemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
