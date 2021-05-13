-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 10:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pat_id` int(11) NOT NULL,
  `pat_name` varchar(255) NOT NULL,
  `pat_phone` varchar(255) NOT NULL,
  `pat_address` varchar(255) NOT NULL,
  `test_date` date NOT NULL,
  `rtpcr` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `scan_result` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `doctor_result` int(11) NOT NULL DEFAULT -1,
  `score` int(11) NOT NULL DEFAULT -1,
  `trained` int(11) NOT NULL DEFAULT 0,
  `remarks` varchar(255) NOT NULL DEFAULT 'Yet to be given'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pat_id`, `pat_name`, `pat_phone`, `pat_address`, `test_date`, `rtpcr`, `img_name`, `scan_result`, `percentage`, `doctor_result`, `score`, `trained`, `remarks`) VALUES
(1, 'hey', '1234567890', 'hyd', '2021-05-14', 1, 'abc.jpg', -1, -1, -1, -1, 0, 'Yet to be given'),
(2, 'Pranav', '9876543210', 'SHRI RAM BHAVANAM, 53/74,\r\nBUNGALOW STREET,', '2021-05-06', 0, '609cd9246a8022.63660823.jpg', 0, 0.0113111, -1, -1, 0, 'Yet to be given');

-- --------------------------------------------------------

--
-- Table structure for table `prediction`
--

CREATE TABLE `prediction` (
  `pid` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `result` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prediction`
--

INSERT INTO `prediction` (`pid`, `img_name`, `result`) VALUES
(1, '609cd0b09fe3b4.01415876.jpg', 0),
(2, '609cd1a1bde5e3.47467424.png', 1),
(3, '609cd21a3ebe61.38257797.jpg', 1),
(4, '609cd252138030.96733689.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pat_id`),
  ADD UNIQUE KEY `pat_phone` (`pat_phone`);

--
-- Indexes for table `prediction`
--
ALTER TABLE `prediction`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prediction`
--
ALTER TABLE `prediction`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
