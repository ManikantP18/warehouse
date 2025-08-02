-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2025 at 10:04 AM
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
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `purchase_way` varchar(255) NOT NULL,
  `purchase_relation_cusm` varchar(255) NOT NULL,
  `purchase_accountant` varchar(255) NOT NULL,
  `purchase_owner` varchar(255) NOT NULL,
  `purchase_village` varchar(255) NOT NULL,
  `purchase_acre` int(11) NOT NULL,
  `purchase_phone` int(10) NOT NULL,
  `purchase_rst_no` varchar(50) NOT NULL,
  `purchase_lot_no` int(11) NOT NULL,
  `purchase_account_no` varchar(255) NOT NULL,
  `purchas_bank_name` varchar(255) NOT NULL,
  `purchase_ifsc` varchar(255) NOT NULL,
  `purchase_branch` varchar(255) NOT NULL,
  `purchase_gst_no` varchar(50) NOT NULL,
  `purchase_item` varchar(255) NOT NULL,
  `purchase_quantity` int(11) NOT NULL,
  `purchase_rate` float NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `pure_wigth` varchar(50) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `purchase_status` tinyint(4) NOT NULL DEFAULT 1,
  `purchase_to` varchar(255) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_hide` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_way`, `purchase_relation_cusm`, `purchase_accountant`, `purchase_owner`, `purchase_village`, `purchase_acre`, `purchase_phone`, `purchase_rst_no`, `purchase_lot_no`, `purchase_account_no`, `purchas_bank_name`, `purchase_ifsc`, `purchase_branch`, `purchase_gst_no`, `purchase_item`, `purchase_quantity`, `purchase_rate`, `purchase_total`, `pure_wigth`, `is_deleted`, `purchase_status`, `purchase_to`, `purchase_date`, `is_hide`) VALUES
(1, 'cash', 'nikita', 'tulsi', 'sumit', 'gogawan', 12, 700054569, '11', 13, '567894878412484', 'HDFC', 'hdfc54845156', 'khargone', '454826265', 'gehu', 2, 3, 50000, '', 0, 1, 'farmer', '2025-07-14 10:16:56', 0),
(2, 'cash', 'fhg', 'rfg', 'rdtd', 'sdfd', 65, 2147483647, '4565', 45645, '21245254', 'aeds', 'sdf', 'sada', '0', '', 1, 0, 0, '', 1, 1, 'farmer', '2025-07-14 10:16:56', 0),
(3, 'cash', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', 6, 2147483647, '0', 4444, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '0', '1', 5, 1000, 5000, '', 1, 1, 'farmer', '2025-07-14 10:16:56', 0),
(4, 'cash', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'gogawan', 6, 2147483647, '4565', 4444, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '0', 'null', 1, 1000, 1000, '', 0, 1, 'farmer', '2025-07-14 10:16:56', 0),
(5, '', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', 6, 2147483647, '4565', 4444, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '0', '1', 1, 0, 0, '', 0, 1, 'other', '2025-07-14 10:16:56', 0),
(6, 'credit', 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'gogawan', 6, 2147483647, '0', 45, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '0', '1', 5, 2200, 11000, '', 1, 1, 'farmer', '2025-07-14 10:16:56', 0),
(7, '', 'Dinesh Bhai', '78654354867863636896686363633633546381', 'Suresh Bhai', 'Kakkad Gaon', 145, 2147483647, '542124', 0, '', '', '', '', '', '1', 1, 1200, 1200, '', 0, 1, '', '2025-07-14 10:16:56', 0),
(8, 'cash', 'Dinesh Bhai', '78654354867863636896686363633633546381', 'Suresh Bhai', 'Kakkad Gaon', 145, 2147483647, '754478754', 51, '7864567484538978', 'Bank Of Baroda', 'SBIN0001234', 'Khargone Mdhya Pradesh', '', '1', 333, 4500, 1498500, '', 0, 1, 'farmer', '2025-07-14 10:16:56', 0),
(9, '', 'Manikant Patidar', '1111', 'Tulsi', 'Bada Gaon', 0, 2147483647, '55', 0, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', 'hk79hkjfojhl', '1', 1, 1200, 1200, '', 0, 1, '', '2025-07-14 12:28:05', 0),
(10, '', 'PRAFULL SHARMA', '12345678945', 'SURESH SHARMA', 'GOGAWAN', 29, 2147483647, '101', 0, '00012546632695', 'SBI', 'SBIN0030034', 'GOGAWAN', '', '1', 1, 1200, 1200, '', 0, 1, '', '2025-07-14 12:44:29', 0),
(11, '', 'Dinesh Bhai', '78654354867863636896686363633633546381', 'Suresh Bhai', 'Kakkad Gaon', 145, 2147483647, '777878', 0, '7864567484538978', 'Bank Of Baroda', 'SBIN0001234', 'Khargone Mdhya Pradesh', '', '1', 1, 1200, 1200, '', 0, 1, '', '2025-07-14 12:54:29', 0),
(12, '', 'PRAFULL SHARMA', '12345678945', 'SURESH SHARMA', 'GOGAWAN', 29, 2147483647, '19', 0, '00012546632695', 'SBI', 'SBIN0030034', 'GOGAWAN', '', '1', 1, 1200, 1200, '', 1, 1, '', '2025-07-14 12:56:13', 0),
(13, '', 'PRAFULL SHARMA', '12345678945', 'SURESH SHARMA', 'GOGAWAN', 5, 2147483647, '99', 1, '00012546632695', '', 'SBIN0030034', 'GOGAWAN', '0', '2', 20, 2400, 48000, '', 0, 1, 'farmer', '2025-07-14 17:25:40', 0),
(14, '', 'jitendra  yadav', '0', 'bhupendra  SO kailash', 'vadiya', 0, 2147483647, '22', 0, '1930004070202', 'CCB', 'CBIN0PMDCAS', 'GOGAWAN', '1365489732654', '1', 1, 1200, 1200, '', 0, 1, '', '2025-07-14 17:28:46', 0),
(15, '', 'PRAVESH SHARMA', '0', 'ACCFG', 'GO', 0, 2147483647, 'NA', 0, '112245545', 'IDFC', 'IDFC0000012', 'KH', 'N', '1', 1, 1200, 1200, '', 0, 1, '', '2025-07-14 17:30:14', 0),
(16, '', 'Manikant Patidar', '564654', 'Tulsi', 'Bada Gaon', 0, 2147483647, '100', 0, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', 'hk79hkjfojhl', '1', 1, 1200, 1200, '', 0, 1, '', '2025-07-15 05:50:35', 0),
(17, 'cash', 'PRAVESH SHARMA', 'MADHAV', 'ACCFG', 'GO', 0, 2147483647, 'NA', 8974646, '112245545', 'IDFC', 'IDFC0000012', 'KH', '863546', '', 0, 0, 7700, '', 0, 1, 'farmer', '2025-07-18 13:29:27', 0),
(18, 'cash', 'RADHE', '1233', 'PK', 'SHAHPURA', 5, 2147483647, '56', 0, '1930004070202', 'BOI', 'BKID0001234', 'GOGAWAN', '0', '', 0, 0, 215004, '', 0, 1, 'farmer', '2025-07-19 20:37:46', 0),
(19, 'cash', 'Shree Ji', '78457754574', 'Shree Hari', 'Vekunth', 78, 2147483647, '7875487', 4654, '487654878986446', 'IDBI', 'BARB0SANAND', 'Vekunth', '', '1', 1, 1200, 5600, '', 0, 1, 'farmer', '2025-07-24 16:26:31', 1),
(20, '', 'Anshu Patidar', '56678789899009', 'Tulsi', 'Bada Gaon', 600, 2147483647, '15465654', 0, '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', 'hk79hkjfojhl', '1', 1, 1150, 1150, '', 0, 1, '', '2025-07-26 10:56:04', 0),
(21, '', 'yuvrajjj', '123456789012', 'yuvrajjj', 'yuv', 2147483647, 2147483647, '121412', 0, '875421986532', 'idfc', 'IDFC0000012', 'yuv', '', '1', 1, 1150, 1150, '', 0, 1, '', '2025-07-26 11:20:36', 0),
(22, 'cash', 'yuvrajjj', '123456789012', 'yuvrajjj', 'yuv', 2147483647, 2147483647, '999999999', 0, '875421986532', 'idfc', 'IDFC0000012', 'yuv', '', '1', 1, 1150, 0, '80.00', 0, 1, 'farmer', '2025-07-26 11:39:39', 1),
(25, '', 'yuvrajjj', '123456789012', 'yuvrajjj', 'yuv', 2147483647, 2147483647, '999999999', 0, '875421986532', 'idfc', 'IDFC0000012', 'yuv', '', '1', 1, 1150, 1150, '10.50', 1, 1, '', '2025-07-26 13:00:56', 0),
(26, '', 'yuvrajjj', '123456789012', 'yuvrajjj', 'yuv', 2147483647, 2147483647, '999999999', 0, '875421986532', 'idfc', 'IDFC0000012', 'yuv', '', '1', 1, 1150, 1150, '10.50', 1, 1, '', '2025-07-26 13:01:22', 0),
(27, 'cash', 'yuvrajjj', '123456789012', 'yuvrajjj', 'yuv', 2147483647, 2147483647, '999999999', 0, '875421986532', 'idfc', 'IDFC0000012', 'yuv', '', '1', 1, 1150, 500, '10.50', 0, 1, 'farmer', '2025-07-26 13:02:04', 1),
(28, 'cash', 'rajaji', '221155447788', 'rajaji', 'rajnagar', 2147483647, 2147483647, '15465654', 5858, '875421986532', 'idfc', 'IDFC0000012', 'rajpur', '', '1', 1, 1150, 1200, '10.00', 0, 1, 'farmer', '2025-07-26 13:24:38', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
