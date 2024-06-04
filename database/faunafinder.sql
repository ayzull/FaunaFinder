-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 10:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faunafinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `scientific_name` varchar(255) NOT NULL,
  `gestation_period` varchar(255) NOT NULL,
  `country_origin` varchar(255) NOT NULL,
  `habitat` varchar(255) NOT NULL,
  `food` varchar(255) NOT NULL,
  `fun_fact` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`animal_id`, `name`, `scientific_name`, `gestation_period`, `country_origin`, `habitat`, `food`, `fun_fact`, `image`) VALUES
(1, 'African Elephant', 'Loxodonta africana', 'About 22 months', 'Africa', 'Savannahs, forests, grasslands', 'Grass, leaves, bark, fruit', 'African elephants are the largest land animals, weighing up to 7 tons.', 'african elephant.jpg'),
(2, 'King Penguin', 'Aptenodytes patagonica', 'Around 60 days', 'Antarctica', 'Coastal areas, icebergs', 'Fish, squid, krill', 'King penguins are the second-largest species of penguin and can dive to depths of over 300 meters.', 'king penguin.jpg'),
(3, 'Red Panda', 'red panda, panda, bear cat, cat bear', 'About 90 to 150 days', 'Eastern Himalayas, southwestern China', 'Forests, mountains', 'Bamboo, fruits, insects', 'Red pandas have a false thumb that helps them grip bamboo and climb trees.', 'red panda.jpg'),
(4, 'Lion', 'king of beasts, Panthera leo', 'About 110 days', 'Africa, Asia', 'Grasslands, savannahs, open woodlands', 'Meat (primarily from hunting)', 'Lions are the only cats that live in social groups called prides.', 'lion.jpg'),
(5, 'Tabby Cat', 'tabby cat', 'About 63 to 65 days', 'Unknown', 'Various habitats (domesticated)', 'Cat food, meat, fish', 'Tabby cats are known for their distinctive coat patterns, with stripes, spots, or swirls.', 'tabby cat.jpg'),
(6, 'Tiger', 'Panthera tigris', 'About 103 days', 'Asia', 'Grasslands, forests, mangrove swamps', 'Deer, boar, water buffalo', 'Tigers are the largest cat species and are renowned for their strength and agility.', 'tiger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `totalamount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `firstname`, `lastname`, `email`, `phone`, `totalamount`, `status`, `created_at`, `userid`) VALUES
(1, 'John', 'Doe', 'johndoe@example.com', '1234567890', '200.00', 'Paid', '2023-07-10 10:00:00', 2),
(2, 'John', 'Doe', 'johndoe@example.com', '9876543210', '150.00', 'Paid', '2023-07-10 11:30:00', 2),
(3, 'Michael', 'Brown', 'michaelbrown@example.com', '5555555555', '350.00', 'Paid', '2023-07-11 09:45:00', 3),
(4, 'Sarah', 'Wilson', 'sarahwilson@example.com', '2222222222', '100.00', 'Paid', '2023-07-11 14:20:00', 4),
(5, 'Robert', 'Davis', 'robertdavis@example.com', '9999999999', '250.00', 'Paid', '2023-07-12 16:10:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetail`
--

CREATE TABLE `bookingdetail` (
  `detail_id` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  `adult_qty` varchar(255) DEFAULT NULL,
  `child_qty` varchar(255) DEFAULT NULL,
  `senior_qty` varchar(255) DEFAULT NULL,
  `annual_qty` varchar(255) DEFAULT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bookingdetail`
--

INSERT INTO `bookingdetail` (`detail_id`, `package`, `adult_qty`, `child_qty`, `senior_qty`, `annual_qty`, `booking_id`) VALUES
(1, 'basic', '2', '1', '', '', 1),
(2, 'annual', '', '', '', '5', 2),
(3, 'basic', '1', '2', '', '', 3),
(4, 'basic', '3', '4', '1', '', 4),
(5, 'basic', '3', '4', '1', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `firstname`, `lastname`, `username`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '123', 'admin', '2023-07-07 23:33:26'),
(2, 'John', 'Doe', 'johndoe', 'johndoe@example.com', 'password123', 'user', '2023-07-10 10:00:00'),
(3, 'Alice', 'Smith', 'alicesmith', 'alicesmith@example.com', 'password456', 'user', '2023-07-10 11:00:00'),
(4, 'Michael', 'Johnson', 'michaeljohnson', 'michaeljohnson@example.com', 'password789', 'user', '2023-07-10 12:00:00'),
(5, 'Emily', 'Davis', 'emilydavis', 'emilydavis@example.com', 'password1234', 'user', '2023-07-10 13:00:00'),
(6, 'David', 'Wilson', 'davidwilson', 'davidwilson@example.com', 'password5678', 'user', '2023-07-10 14:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `bid` (`booking_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingdetail`
--
ALTER TABLE `bookingdetail`
  ADD CONSTRAINT `bid` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
