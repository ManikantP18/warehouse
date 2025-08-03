-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2025 at 10:58 AM
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
-- Table structure for table `packing`
--

CREATE TABLE `packing` (
  `packing_id` int(11) NOT NULL,
  `packing_date` datetime NOT NULL DEFAULT current_timestamp(),
  `packing_verity` varchar(255) NOT NULL,
  `packing_godown` varchar(255) NOT NULL,
  `packing_stage_no` int(11) NOT NULL,
  `packing_no_of_begs` float NOT NULL,
  `packing_gredded_quantity` float NOT NULL,
  `packing_pay` int(11) NOT NULL,
  `gredding_id` int(11) NOT NULL,
  `packing_status` tinyint(4) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `land_owner` varchar(255) NOT NULL,
  `farmer_name` varchar(255) NOT NULL,
  `final_weight` float NOT NULL,
  `rst_no` int(11) NOT NULL,
  `is_hide` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packing`
--

INSERT INTO `packing` (`packing_id`, `packing_date`, `packing_verity`, `packing_godown`, `packing_stage_no`, `packing_no_of_begs`, `packing_gredded_quantity`, `packing_pay`, `gredding_id`, `packing_status`, `is_deleted`, `land_owner`, `farmer_name`, `final_weight`, `rst_no`, `is_hide`) VALUES
(1, '2025-08-02 01:13:06', '2', '1', 11, 25, 520, 1500, 1, 1, 0, 'nikita', 'alina', 520.36, 3343, 0),
(2, '2025-08-02 01:13:06', '3', '1', 11, 25, 520, 1500, 1, 1, 0, 'nikita', 'alina', 520.36, 3343, 0),
(3, '2025-08-03 00:28:20', '3', '4', 25, 0, 500, 2500, 0, 1, 0, 'Krishna', 'Shri radhe', 45, 1604, 0),
(4, '2025-08-03 00:28:30', '3', '4', 25, 0, 500, 2500, 0, 1, 0, 'Krishna', 'Shri radhe', 45, 1604, 0),
(5, '2025-08-03 00:35:54', '3', '4', 25, 0, 500, 2500, 0, 1, 0, 'Krishna', 'Shri radhe', 45, 1604, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `packing`
--
ALTER TABLE `packing`
  ADD PRIMARY KEY (`packing_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `packing`
--
ALTER TABLE `packing`
  MODIFY `packing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
