-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2025 at 08:53 AM
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
-- Table structure for table `ladgers`
--

CREATE TABLE `ladgers` (
  `ladger_id` int(11) NOT NULL,
  `account_id` varchar(50) NOT NULL,
  `ladger_type` tinyint(2) NOT NULL DEFAULT 1 COMMENT '1  former, 2 - others',
  `relational_cust_name` varchar(100) NOT NULL,
  `account_holder` varchar(100) NOT NULL,
  `farm_owner_name` varchar(100) NOT NULL,
  `village` varchar(50) NOT NULL,
  `farm_area_acre` float NOT NULL,
  `khasra_no` int(11) NOT NULL,
  `opening_balance` int(11) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `bank_account_name` varchar(100) NOT NULL,
  `account_number` varchar(25) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `branch` text NOT NULL,
  `gst_num` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ladgers`
--

INSERT INTO `ladgers` (`ladger_id`, `account_id`, `ladger_type`, `relational_cust_name`, `account_holder`, `farm_owner_name`, `village`, `farm_area_acre`, `khasra_no`, `opening_balance`, `phone_number`, `bank_account_name`, `account_number`, `bank_name`, `ifsc_code`, `branch`, `gst_num`, `created_by`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'cust-1', 1, 'Anshu Patidar', '56678789899009', 'Tulsi', 'Bada Gaon', 5.5, 600, 0, '7744551122', 'Nikita Yadav', '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '7687', 2, 1, 0, '2025-06-25 07:41:38', '2025-06-25 07:41:38'),
(3, '', 1, 'sapna kushwah', 'Tulsi', 'Nikita', 'Shahpura', 5, 0, 0, '1235677890', 'assfdgfhh', '45465798090', 'baadgfhgjh', 'BROTHIKRI', 'Thikri', '6', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '', 1, 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', 5.5, 0, 0, '7744551122', 'Nikita Yadav', '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '6', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '', 1, 'Manikant Patidar', 'Sukhraj ji', 'Tulsi', 'Bada Gaon', 5.5, 0, 0, '7744551122', 'Nikita Yadav', '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '6', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'cust-6', 1, 'sapna kushwah', 'Sukhraj ji', 'Nikita', 'Shahpura', 15, 0, 0, '8784521548', 'assfdgfhh', '4157821148775418', 'Jila Sahkari bank', 'BROTHIKRI', 'Thikri', '545754', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'cust-7', 1, 'Manikant Patidar', 'Tulsi', '', 'Bada Gaon', 0, 0, 0, '4667778890', '', '', '', '', '', '5', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'cust-8', 1, 'Manikant Patidar', 'Tulsi', '', 'Bada Gaon', 0, 0, 0, '4667778890', '', '', '', '', '', '5', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'cust-9', 1, 'Manikant Patidar', 'Tulsi', '', 'Bada Gaon', 0, 0, 0, '4667778890', '', '', '', '', '', '5', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'cust-10', 1, 'mvkjbkj', 'Tulsi', '', 'bvnbmb', 0, 0, 0, '454857854', '', '', '', '', '', '52462454', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'cust-12', 1, 'sapna kushwah', 'Tulsi', 'Nikita', 'Shahpura', 4, 0, 0, '1234567890', 'assfdgfhh', '134678909', 'Jila Sahkari bank', 'BROTHIKRI', 'Thikri', '112', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'cust-13', 1, 'sapna kushwah', 'Tulsi', '', 'Bada Gaon', 0, 0, 0, '1234567890', '', '', '', '', '', '12', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'cust-14', 1, 'Lakshya Chouhan', 'Sapna Ji', '', 'Thikri', 0, 0, 0, '9875555412', '', '', '', '', '', '546845341343', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'cust-15', 1, 'Nikita', 'Yadav', '', 'Kakkad Gaon', 0, 0, 0, '4654134454', '', '', '', '', '', '4567443245646', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'cust-16', 1, 'sapna kushwah', 'Tulsi', '', 'Bada Gaon', 0, 0, 0, '4564564564', '', '', '', '', '', '4564123131', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'cust-17', 2, 'Manikant Patidar', 'Sukhraj', '', 'Bada Gaon', 0, 0, 0, '1456454114', '', '', '', '', '', '456456156', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'cust-18', 1, 'sumit', 'lakshay', 'Nikita', 'Shahpura', 3.4, 0, 0, '1234567890', 'Bank of india', '12345678904566', 'Jila Sahkari bank', 'SBIN0001234', 'Thikri', '122345566677723', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'cust-19', 2, 'sapna kushwah', 'Tulsi', '', 'hgfh', 0, 0, 0, '9876543219', '', '', '', '', '', '67676', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'cust-20', 2, 'sapna kushwah', 'sdrfdgd', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '676', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'cust-21', 1, 'sapna kushwah', 'Tulsi', 'Nikita', 'Shahpura', 65666, 0, 0, '6289907654', 'assfdgfhh', '98976787676', 'baadgfhgjh', 'SBIN0001234', 'Bus Stand', '090909089980900', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'cust-23', 1, 'sapna kushwah', 'Tulsi', 'Nikita', 'Shahpura', 535, 0, 0, '6289907654', 'assfdgfhh', '98976784444', 'baadgfhgjh', 'SBIN0001234', 'Bus Stand', '768743434344340', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'cust-24', 2, 'sapna kushwah', 'Sukhraj', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '12332323223', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'cust-25', 2, 'sapna kushwah', 'Tulsi', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'cust-26', 2, 'mvkjbkj', 'Tulsi', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'cust-27', 2, 'sapna kushwah', 'Sukhraj ji', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'cust-28', 2, 'sapna kushwah', 'Tulsi', '', 'Bada Gaon', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'cust-29', 2, 'sapna kushwah', 'Sukhraj', '', 'Bada Gaon', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'cust-30', 2, 'sapna kushwah', 'Tulsi', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'cust-31', 2, 'sapna kushwah', 'Tulsi', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'cust-32', 2, 'sapna kushwah', 'Sukhraj', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'cust-33', 2, 'sapna kushwah', 'Sukhraj', '', 'Shahpura', 0, 0, 0, '6289907654', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'cust-34', 2, 'Muskan', 'Simran', '', 'sakad', 0, 0, 0, '9340956697', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'cust-35', 2, 'Nikita', 'Yadav', '', 'Kakkad Gaon', 0, 0, 0, '6264620242', '', '', '', '', '', '124345', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'cust-36', 1, 'simran', 'muskan', 'Nikita', 'Kakkad Gaon', 2, 0, 0, '6264620242', 'Bank of India', '9897678234', 'Jila Sahkari bank', 'SBIN0001234', 'Thikri', '768734567890123', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'cust-37', 2, 'sapna kushwah', 'Sukhraj', '', 'Bada Gaon', 0, 0, 0, '6264620242', '', '', '', '', '', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'cust-38', 1, 'sapna kushwah', '56789239054', 'Nikita', 'Shahpura', 4, 0, 0, '6362785368', 'Bank of India', '9897678234788', 'Jila Sahkari bank', 'SBIN0001234', 'Thikri', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'cust-39', 1, 'simran badole', '9697898873763', 'muskan', 'sakad', 7, 278, 500, '6697547823', 'Bank of India', '9897678234', 'Jila Sahkari bank', 'SBIN0001234', 'Thikri', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'cust-40', 1, 'simran badole', '9697898873763', 'muskan badole', 'sakad', 7, 278, 800, '6697547823', 'Bank of India', '9897678234', 'Jila Sahkari bank', 'SBIN0001234', 'Thikri', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'cust-41', 1, 'Manikant Patidar', '90900056090670', 'sapna', 'Bada Gaon', 5.5, 0, 0, '7744551122', 'Nikita Yadav', '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', '7687', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ladgers`
--
ALTER TABLE `ladgers`
  ADD PRIMARY KEY (`ladger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ladgers`
--
ALTER TABLE `ladgers`
  MODIFY `ladger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
