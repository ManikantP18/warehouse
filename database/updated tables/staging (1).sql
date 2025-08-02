-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 10:06 AM
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
-- Database: `agriaccounts-323036a652`
--

-- --------------------------------------------------------

--
-- Table structure for table `staging`
--

CREATE TABLE `staging` (
  `staging_id` int(11) NOT NULL,
  `select_lot_no` int(11) NOT NULL,
  `staging_varity` varchar(255) NOT NULL,
  `farmer_name` varchar(255) NOT NULL,
  `godown` varchar(100) NOT NULL,
  `rst_no` int(11) NOT NULL,
  `stage_no` int(11) NOT NULL,
  `no_of_begs` int(11) NOT NULL,
  `final_weight` int(11) NOT NULL,
  `pay_for_staging` int(11) NOT NULL,
  `staging_date` date NOT NULL DEFAULT current_timestamp(),
  `staging_status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staging`
--
ALTER TABLE `staging`
  ADD PRIMARY KEY (`staging_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staging`
--
ALTER TABLE `staging`
  MODIFY `staging_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
