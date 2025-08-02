-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2025 at 10:41 AM
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
-- Table structure for table `gredding`
--

CREATE TABLE `gredding` (
  `gredding_id` int(11) NOT NULL,
  `gredding_lot_no` int(50) NOT NULL,
  `gredding_verity` varchar(100) NOT NULL,
  `gredding_godown` varchar(60) NOT NULL,
  `gred_stage_no` int(70) NOT NULL,
  `gred_no_begs` int(100) NOT NULL,
  `gredded_quantity` varchar(50) NOT NULL,
  `undersize_quantity` varchar(50) NOT NULL,
  `pay_gredding` varchar(50) NOT NULL,
  `gredding_date` date NOT NULL DEFAULT current_timestamp(),
  `gredding_status` int(2) NOT NULL DEFAULT 1,
  `farmar_name` varchar(50) NOT NULL,
  `land_owner` varchar(50) NOT NULL,
  `final_waigth` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gredding`
--

INSERT INTO `gredding` (`gredding_id`, `gredding_lot_no`, `gredding_verity`, `gredding_godown`, `gred_stage_no`, `gred_no_begs`, `gredded_quantity`, `undersize_quantity`, `pay_gredding`, `gredding_date`, `gredding_status`, `farmar_name`, `land_owner`, `final_waigth`) VALUES
(1, 11, 'soyabin', 'thikri', 77, 20, '100', '50', '2000', '2025-07-19', 1, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gredding`
--
ALTER TABLE `gredding`
  ADD PRIMARY KEY (`gredding_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gredding`
--
ALTER TABLE `gredding`
  MODIFY `gredding_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
