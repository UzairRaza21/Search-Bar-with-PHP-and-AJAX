-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 12:22 PM
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
-- Database: `adlisting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_address` varchar(255) NOT NULL,
  `ad_price` varchar(255) NOT NULL,
  `ad_size` varchar(255) NOT NULL,
  `ad_year` varchar(255) NOT NULL,
  `ad_commission` varchar(255) NOT NULL,
  `ad_img` varchar(255) NOT NULL,
  `ad_city` varchar(255) NOT NULL,
  `ad_zipcode` varchar(255) NOT NULL,
  `ad_bedroom` varchar(255) NOT NULL,
  `ad_bathroom` varchar(255) NOT NULL,
  `ad_agent_name` varchar(255) NOT NULL,
  `ad_agent_phone` varchar(255) NOT NULL,
  `ad_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_address`, `ad_price`, `ad_size`, `ad_year`, `ad_commission`, `ad_img`, `ad_city`, `ad_zipcode`, `ad_bedroom`, `ad_bathroom`, `ad_agent_name`, `ad_agent_phone`, `ad_category`) VALUES
(36, '602 Bellemeade BLVD', '100,000', '100', '2024', '10000', '[\"dash-bg.jpg\"]', 'Dallas', '72467', '3', '2', 'James', '1234', 'sale'),
(37, '602 Bellemeade BLVD', '100,000', '100', '2024', '10000', '[\"dash-bg.jpg\"]', 'Dallas', '72467', '3', '2', 'James', '1234', 'sale'),
(38, '602 Bellemeade BLVD', '100,000', '100', '2024', '1,000', '[\"dash-bg.jpg\"]', 'Mexico', '72467', '3', '2', 'James', '1234', 'lease');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
