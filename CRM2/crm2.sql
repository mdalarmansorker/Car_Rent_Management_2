-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 10:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(100) NOT NULL DEFAULT 'NOT NULL',
  `Email` varchar(100) NOT NULL DEFAULT 'NOT NULL',
  `Division` varchar(20) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Designation` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Email`, `Division`, `Gender`, `Password`, `Phone`, `Designation`) VALUES
('MD Al Arman Sorker', 'mdalarmansorker@gmail.com', 'Rangpur', 'Male', 'password', '01723408603', 'CEO'),
('Monisha Bakshi', 'monisha@gmail.com', 'Rangpur', 'Female', 'moni', '01768527710', 'MD'),
('Rayhan', 'rayhan@gmail.com', 'Rangpur', 'Male', 'rayhan', '01789453550', 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `j_from` varchar(255) DEFAULT NULL,
  `j_to` varchar(255) DEFAULT NULL,
  `j_date` date DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `panding` int(1) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `j_status` tinyint(1) DEFAULT NULL,
  `vehicle` varchar(10) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `cancel` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `j_from`, `j_to`, `j_date`, `note`, `type`, `panding`, `price`, `j_status`, `vehicle`, `vehicle_id`, `cancel`) VALUES
(21, 1, 'Rangpur', 'Dhaka', '2022-05-28', '', 'AC', 0, 15000, NULL, 'car', 8, 0),
(22, 1, 'Kurigram', 'Rangpur', '2022-05-30', '', 'AC', 0, 4000, NULL, 'micro', 9, 0),
(23, 1, 'Rangpur', 'Dhaka', '2022-05-31', '', 'AC', 0, 15000, NULL, 'car', 8, 0),
(24, 1, 'Rangpur', 'Dinajpur', '2022-06-10', '', 'AC', 1, NULL, NULL, 'micro', NULL, 0),
(25, 1, 'Rangpur', 'Dhaka', '2022-06-04', '', 'Non AC', 1, NULL, NULL, 'car', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `id` int(11) NOT NULL,
  `CDate` date DEFAULT NULL,
  `Reason` varchar(100) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `v_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id`, `CDate`, `Reason`, `Price`, `v_id`) VALUES
(14, '2021-06-03', 'Mobil Drain', 2500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'Arman', 'arman@gmail.com', '01723408603', 'arman'),
(2, 'Monisha Bakshi', 'monisha@gmail.com', '01768527710', 'monisha'),
(3, 'Ali', 'ali@gmail.com', '01799709970', 'ali'),
(4, 'Rayhan', 'rayhan@gmail.com', '01710431428', 'rayhan');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `s_date` date DEFAULT NULL,
  `e_date` date DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `model`, `reg_no`, `s_date`, `e_date`, `type`) VALUES
(1, 'TOYOTA X-COROLLA 2006 Silver', 'DHAKA METRO-GA 33-2342', '2021-06-01', '2022-05-22', 'car'),
(2, 'TOYOTA X-COROLLA 2005 White', 'DHAKA METRO-GA 33-1123', '2022-01-01', '2022-05-20', 'car'),
(3, 'TOYOTA X-COROLLA 2005 White', 'DHAKA METRO-GA 33-1123', '2022-05-20', '2022-05-28', 'car'),
(4, 'TOYOTA X-NOAH', 'DHAKA METRO-CHA 32-34-36', '2022-05-20', '2022-05-20', 'micro'),
(5, 'TOYOTA X-COROLLA 2006 Silver', 'DHAKA METRO-GA 33-2342', '2022-05-22', '2022-05-22', 'car'),
(6, 'TOYOTA X-NOAH', 'DHAKA METRO-CHA 32-34-88', '2022-05-01', '2022-05-22', 'micro'),
(7, 'TOYOTA HIACH', 'DHAKA METRO-CHA 43-34-36', '2022-05-01', '2022-05-22', 'ambulance'),
(8, 'TOYOTA X-COROLLA 2006 Silver', 'DHAKA METRO-GA 33-2342', '2022-05-22', NULL, 'car'),
(9, 'TOYOTA X-NOAH', 'DHAKA METRO-CHA 32-34-36', '2022-05-01', NULL, 'micro'),
(10, 'TOYOTA X-COROLLA 2005 White', 'DHAKA METRO-GA 33-2343', '2022-05-06', NULL, 'car');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `cost`
--
ALTER TABLE `cost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `v_id` (`v_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cost`
--
ALTER TABLE `cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);

--
-- Constraints for table `cost`
--
ALTER TABLE `cost`
  ADD CONSTRAINT `cost_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
