-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2025 at 11:43 AM
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
  `kp_godown_name` varchar(100) NOT NULL,
  `creat_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kata_parchi`
--

INSERT INTO `kata_parchi` (`kp_id`, `kp_date`, `kp_acc_no`, `kp_rel_name`, `kp_acc_holdername`, `kp_bhoomiswami_name`, `kp_vilage`, `kp_rakaba_acre`, `kp_mo_no`, `kp_rogger_name`, `kp_verity`, `kp_rstno`, `kp_vehicle_wight`, `kp_godown_name`, `creat_at`, `update_at`, `status`, `is_deleted`) VALUES
(1, '0000-00-00', '15465152154', 'sukhraj verma', 's_raj', 'India', 'khargone', 65, '4569873210', 'raj', '', '6987241', 25, 'kgn', '2025-06-29 12:25:03', '2025-06-29 12:25:03', 1, 1),
(2, '0000-00-00', '123456', 'abcd', 'abdc', 'vgfr', 'khargone', 12, '735401689', 'tyui', '', '12589', 0, 'oooo', '2025-06-29 12:32:28', '2025-06-29 12:32:28', 1, 1),
(3, '2025-02-02', '123648', 'mjuy', 'nhyt', 'nhtd', 'khargone', 52, '1236547890', 'rfty', 'kkkkkkkkkkk', '999999999', 0, 'lkiuyt', '2025-06-29 12:49:50', '2025-06-29 12:49:50', 1, 0),
(4, '2020-11-11', '4569971235', 'sukhraj verma', 's_raj', 'India', 'khargone', 65, '789654123', 'tyui', 'khyuk', '6987241', 0, 'kgn', '2025-06-29 12:56:46', '2025-06-29 12:56:46', 1, 0),
(5, '2025-02-02', '7896541230', 'sukhraj verma', 's_raj', 'India', 'khargone', 0, '7896541230', 'tyui', 'ppppppp', '6987241', 0, 'kgn', '2025-06-29 12:59:10', '2025-06-29 12:59:10', 1, 0),
(6, '2020-11-11', '7896541230', 'sukhraj verma', 'abdc', 'India', 'khargone', 0, '8511254122', 'tyui', 'ppppppp', '6987241', 65, 'oooo', '2025-06-29 13:01:20', '2025-06-29 13:01:20', 1, 0),
(7, '1111-11-11', '1111111111111111', 'aaaaaaaaaaa', 'aaaaaaaaaaaaaa', 'aaaaaaa', 'aa', 35, '111111111111', 'raj', 'qqqqqqqqqqq', '6987241', 888888, 'kgn', '2025-06-29 13:03:15', '2025-06-29 13:03:15', 1, 0),
(8, '0000-00-00', '00000000000', 'yyyyyyyyyy', 'yyyy', 'yyyyyy', 'uuuuuuuu', 0, '000000000000', 'yyyyyyyyyyyyyyyyyy', 'yyy', '00000000000', 0, 'yyyyyyyy', '2025-06-29 14:52:19', '2025-06-29 14:52:19', 1, 1);

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
  MODIFY `kp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
