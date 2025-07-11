-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 09:31 AM
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
-- Table structure for table `kata_parchi`
--

CREATE TABLE `kata_parchi` (
  `kp_id` int(11) NOT NULL,
  `kp_date` date NOT NULL DEFAULT current_timestamp(),
  `kp_acc_no` varchar(100) NOT NULL,
  `kp_rel_name` varchar(50) NOT NULL,
  `kp_acc_holdername` varchar(50) NOT NULL,
  `kp_bhoomiswami_name` varchar(100) NOT NULL,
  `kp_vilage` varchar(100) NOT NULL,
  `kp_rakaba_acre` float NOT NULL,
  `kp_mo_no` varchar(12) NOT NULL,
  `kp_rogger_name` varchar(100) NOT NULL,
  `kp_verity` varchar(50) NOT NULL,
  `kp_rstno` varchar(50) NOT NULL,
  `kp_vehicle_wight` int(11) NOT NULL,
  `kp_only_vechicle_w` int(10) NOT NULL,
  `kp_pure_wigth` int(10) NOT NULL,
  `pure_update_hide` tinyint(2) NOT NULL DEFAULT 0,
  `kp_godown_name` varchar(100) NOT NULL,
  `creat_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kata_parchi`
--

INSERT INTO `kata_parchi` (`kp_id`, `kp_date`, `kp_acc_no`, `kp_rel_name`, `kp_acc_holdername`, `kp_bhoomiswami_name`, `kp_vilage`, `kp_rakaba_acre`, `kp_mo_no`, `kp_rogger_name`, `kp_verity`, `kp_rstno`, `kp_vehicle_wight`, `kp_only_vechicle_w`, `kp_pure_wigth`, `pure_update_hide`, `kp_godown_name`, `creat_at`, `update_at`, `status`, `is_deleted`) VALUES
(15, '2025-07-11', 'cust-1', 'Manikant Patidar', '111111111111', 'Tulsi', 'Bada Gaon', 5.5, '7744551122', 'Raj Verma', '1111111111', '11111111111', 0, 2147483647, 2147483647, 0, '11111111111', '2025-07-11 11:13:59', '2025-07-11 11:13:59', 1, 0),
(18, '2011-07-25', 'cust-1', 'Manikant Patidar', '333333333333', 'Tulsi', 'Bada Gaon', 5.5, '7744551122', 'Raj Verma', 'yuy', '8989898', 22, 22, 22, 0, 'kgn', '2025-07-11 11:44:32', '2025-07-11 11:44:32', 1, 0),
(19, '2025-07-11', 'cust-2', 'Sapna Ji', '78787877', 'Tulsi', 'Bada Gaon', 5.5, '7744551122', 'jiiiiiiiiiiiiiii', 'jiiiiiiiiiiii', '877887788', 78547, 77778888, 88887777, 0, 'jiiiiiiiiiiii', '2025-07-11 11:51:27', '2025-07-11 11:51:27', 1, 0),
(20, '2011-07-25', 'cust-1', 'Manikant Patidar', '414141', 'Tulsi', 'Bada Gaon', 5.5, '7744551122', 'Raj Verma', 'ooooooooo', '121412', 414141, 141, 414000, 1, 'ololol', '2025-07-11 11:54:01', '2025-07-11 11:54:01', 1, 0),
(21, '2025-07-11', 'cust-2', 'Sapna Ji', '4747474', 'Tulsi', 'Bada Gaon', 5.5, '7744551122', 'ffffffffff', 'fffffffff', '85858585', 58585858, 5858, 58580000, 1, 'fffffff', '2025-07-11 12:55:35', '2025-07-11 12:55:35', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kata_parchi`
--
ALTER TABLE `kata_parchi`
  ADD PRIMARY KEY (`kp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kata_parchi`
--
ALTER TABLE `kata_parchi`
  MODIFY `kp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
