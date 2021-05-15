-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2021 at 11:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(2, 'Pranav', '9876543210', 'SHRI RAM BHAVANAM, 53/74,\r\nBUNGALOW STREET,', '2021-05-06', 0, '609cd9246a8022.63660823.jpg', 0, 0.0113111, 0, 0, 0, 'No covid'),
(3, 'test', '1234567893', 'hyd', '2021-05-25', 1, '609ce8bdb7cef8.37750748.jpeg', 0, 1.95315, 1, 19, 0, 'covid'),
(7, 'Preeti', '1234567895', 'sdfgsd', '2021-05-18', 1, '609d6bb6539234.87277596.jpeg', 0, 0.00191937, 1, 19, 0, 'Covid'),
(11, 'Preeti', '1234567823', 'sdfgsd', '2021-05-18', 1, '609d6bb6539234.87277596.jpeg', 0, 0.00191937, 0, 0, 0, 'negative'),
(12, 'Sree Ratcha', '1234567999', 'Kalpakam', '2021-05-25', 0, '609f950f3fbf62.07385275.png', 1, 100, -1, -1, 0, 'Yet to be given'),
(13, 'Sree ', '1234567990', 'Chennai', '2021-05-12', 1, '609f95f6d8b571.58969881.png', 1, 100, -1, -1, 0, 'Yet to be given'),
(14, 'Vijay', '1234568990', 'Chennai', '2021-05-12', 0, '609f9618ed8cb7.78074450.png', 0, 99.999, -1, -1, 0, 'Yet to be given'),
(15, 'Vijaya', '1234569990', 'Chennai, adyar', '2021-04-15', 1, '609f968cb97557.44704720.png', 1, 100, -1, -1, 0, 'Yet to be given'),
(16, 'Pranav', '1234565990', 'Chennai, adyar', '2021-04-14', 0, '609f975d74ec97.11495280.png', 0, 2.79648e-16, -1, -1, 0, 'Yet to be given'),
(17, 'Pranavi', '1234566990', 'Chennai', '2021-04-14', 1, '609f9780761558.74696880.png', 0, 0.00112065, -1, -1, 0, 'Yet to be given'),
(18, 'Preeti', '1233566990', 'Hyderabad', '2021-04-05', 0, '609f988a155388.48883969.png', 0, 0.00626347, -1, -1, 0, 'Yet to be given'),
(19, 'Preeti Krish', '1223566990', 'Hyderabad, Telangana', '2021-02-19', 1, '609f98bf4a47e1.01018507.png', 1, 100, -1, -1, 0, 'Yet to be given'),
(20, 'Krish', '2223566990', 'Telangana', '2021-02-01', 0, '609f98d7f1ffd4.83243196.jpeg', 0, 0.00165134, -1, -1, 0, 'Yet to be given'),
(21, 'Krishnaveni', '5223566990', 'Telangana', '2021-02-23', 1, '609f98f5315147.26013791.png', 0, 6.19798, -1, -1, 0, 'Yet to be given'),
(22, 'Raj', '5723566990', 'Telangana', '2021-02-08', 0, '609f991c8bba15.45517231.png', 0, 6.0533e-24, -1, -1, 0, 'Yet to be given'),
(23, 'Raji', '5723766990', 'Telangana', '2021-02-08', 1, '609f992ddfa055.13594124.png', 1, 100, -1, -1, 0, 'Yet to be given'),
(24, 'kohila', '5723768990', 'Telangana', '2021-02-08', 0, '609f9950461f50.99951492.jpeg', 1, 100, -1, -1, 0, 'Yet to be given'),
(25, 'kohila raj', '5723768998', 'Telangana', '2021-02-04', 1, '609f99675f12d5.77204170.png', 1, 100, -1, -1, 0, 'Yet to be given');

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
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `prediction`
--
ALTER TABLE `prediction`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
