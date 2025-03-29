-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2024 at 10:00 AM
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
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `username`, `password`) VALUES
(1, 'krel', '2023-54276', '123'),
(2, 'test', '2023-54277', '123'),
(3, 'aj', '2023-0002', '123'),
(4, 'cass', '2023-0004', '123'),
(5, 'ian', '2023-0006', '123');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `Food_ID` int(11) NOT NULL,
  `Food_Name` varchar(255) NOT NULL,
  `Food_Price` decimal(15,2) NOT NULL,
  `Food_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`Food_ID`, `Food_Name`, `Food_Price`, `Food_Quantity`) VALUES
(2, 'Blueberry Juice', 50.00, 2),
(3, 'Chocolate Milktea', 30.00, 67),
(4, 'Coke Float', 45.00, 48),
(5, 'Cookies and Cream Milktea', 30.00, 32),
(6, 'Lemon Juice', 38.00, 40),
(7, 'Lychee Juice', 38.00, 40),
(8, 'Matcha Milktea', 30.00, 62),
(9, 'Okinawa Milktea', 30.00, 62),
(10, 'Royal Float', 45.00, 89),
(11, 'Water', 10.00, 150);

-- --------------------------------------------------------

--
-- Table structure for table `drinks_thumbnail`
--

CREATE TABLE `drinks_thumbnail` (
  `Food_Thumbnail_ID` int(11) NOT NULL,
  `Food_Thumbnail_Name` varchar(255) NOT NULL,
  `Food_Thumbnail_Directory` varchar(255) NOT NULL,
  `Food_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `drinks_thumbnail`
--

INSERT INTO `drinks_thumbnail` (`Food_Thumbnail_ID`, `Food_Thumbnail_Name`, `Food_Thumbnail_Directory`, `Food_ID`) VALUES
(2, 'blueberry', 'blueberry.png', 2),
(3, 'chocolate', 'chocolate.png', 3),
(4, 'coke_float', 'coke_float.jpg', 4),
(5, 'cookies_and_cream', 'cookies_and_cream.jpg', 5),
(6, 'lemon', 'lemon.jpg', 6),
(7, 'lychee', 'lychee.jpeg', 7),
(8, 'matcha', 'matcha.png', 8),
(9, 'okinawa milktea', 'okinawa_milktea.png', 9),
(10, 'royal_float', 'royal_float.jpg', 10),
(11, 'water', 'water.jpg', 11);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_ID` int(11) NOT NULL,
  `Food_Name` varchar(255) NOT NULL,
  `Food_Price` decimal(15,2) NOT NULL,
  `Food_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_ID`, `Food_Name`, `Food_Price`, `Food_Quantity`) VALUES
(12, 'fries mcdo', 100.00, 7),
(13, 'Burger Steak w/ Rice', 58.00, 100),
(15, 'Ham w/ Rice', 45.00, 50),
(16, 'Japanese Siomai', 45.00, 30),
(17, 'Siomai', 33.00, 25),
(18, 'Luncheon Meat w/ Rice', 48.00, 55),
(19, 'Nuggets w/ Rice', 58.00, 50),
(20, 'Siopao', 25.00, 40),
(21, 'Tocino with Rice', 80.00, 66);

-- --------------------------------------------------------

--
-- Table structure for table `food_thumbnail`
--

CREATE TABLE `food_thumbnail` (
  `Food_Thumbnail_ID` int(11) NOT NULL,
  `Food_Thumbnail_Name` varchar(255) NOT NULL,
  `Food_Thumbnail_Directory` varchar(255) NOT NULL,
  `Food_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `food_thumbnail`
--

INSERT INTO `food_thumbnail` (`Food_Thumbnail_ID`, `Food_Thumbnail_Name`, `Food_Thumbnail_Directory`, `Food_ID`) VALUES
(12, 'fries', 'fries.jpg', 12),
(13, 'burger_steak', 'burger_steak.jpg', 13),
(15, 'ham', 'ham.jpg', 15),
(16, 'japanese_siomai', 'japanese_siomai.jpg', 16),
(17, 'siomai', 'siomai.jpg', 17),
(18, 'luncheon_meat', 'luncheon_meat.jpeg', 18),
(19, 'nuggets', 'nuggets.png', 19),
(20, 'siopao', 'siopao.jpg', 20),
(21, 'tocino', 'tocino.png', 21);

-- --------------------------------------------------------

--
-- Table structure for table `reserve_drinks`
--

CREATE TABLE `reserve_drinks` (
  `reserve_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_student_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_drinks_items`
--

CREATE TABLE `reserve_drinks_items` (
  `id` int(11) NOT NULL,
  `reserve_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve_food`
--

CREATE TABLE `reserve_food` (
  `reserve_id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_student_id` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reserve_food`
--

INSERT INTO `reserve_food` (`reserve_id`, `customer_name`, `customer_student_id`, `date`, `time`, `total`, `status`) VALUES
(93, 'aj', '2023-0002', '2024-12-07', '04:59', 58, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_food_items`
--

CREATE TABLE `reserve_food_items` (
  `id` int(11) NOT NULL,
  `reserve_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reserve_food_items`
--

INSERT INTO `reserve_food_items` (`id`, `reserve_id`, `price`, `quantity`, `food_name`) VALUES
(106, 93, 58, 1, 'Burger Steak w/ Rice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`Food_ID`),
  ADD UNIQUE KEY `Food_Name` (`Food_Name`);

--
-- Indexes for table `drinks_thumbnail`
--
ALTER TABLE `drinks_thumbnail`
  ADD PRIMARY KEY (`Food_Thumbnail_ID`),
  ADD UNIQUE KEY `Food_Thumbnail_Name` (`Food_Thumbnail_Name`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_ID`),
  ADD UNIQUE KEY `Food_Name` (`Food_Name`);

--
-- Indexes for table `food_thumbnail`
--
ALTER TABLE `food_thumbnail`
  ADD PRIMARY KEY (`Food_Thumbnail_ID`),
  ADD UNIQUE KEY `Food_Thumbnail_Name` (`Food_Thumbnail_Name`);

--
-- Indexes for table `reserve_drinks`
--
ALTER TABLE `reserve_drinks`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `reserve_drinks_items`
--
ALTER TABLE `reserve_drinks_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_food`
--
ALTER TABLE `reserve_food`
  ADD PRIMARY KEY (`reserve_id`);

--
-- Indexes for table `reserve_food_items`
--
ALTER TABLE `reserve_food_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `Food_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `drinks_thumbnail`
--
ALTER TABLE `drinks_thumbnail`
  MODIFY `Food_Thumbnail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `food_thumbnail`
--
ALTER TABLE `food_thumbnail`
  MODIFY `Food_Thumbnail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reserve_drinks`
--
ALTER TABLE `reserve_drinks`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reserve_drinks_items`
--
ALTER TABLE `reserve_drinks_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reserve_food`
--
ALTER TABLE `reserve_food`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `reserve_food_items`
--
ALTER TABLE `reserve_food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
