-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 10:05 AM
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
  `bhumi_gram` varchar(255) NOT NULL,
  `khasra_no` varchar(255) NOT NULL,
  `opening_balance` float NOT NULL,
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

INSERT INTO `ladgers` (`ladger_id`, `account_id`, `ladger_type`, `relational_cust_name`, `account_holder`, `farm_owner_name`, `village`, `farm_area_acre`, `bhumi_gram`, `khasra_no`, `opening_balance`, `phone_number`, `bank_account_name`, `account_number`, `bank_name`, `ifsc_code`, `branch`, `gst_num`, `created_by`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'cust-1', 1, 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', 5.5, '', '', 0, '7744551122', 'Nikita Yadav', '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', 'hk79hkjfojhl', 2, 1, 0, '2025-06-25 07:41:38', '2025-06-25 07:41:38'),
(2, 'cust-2', 2, 'Sukharaj', 'Verma', '', 'Khamkheda', 0, '', '', 0, '7854545457', '', '', '', '', '', '456454', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'cust-3', 2, 'serwerf', 'tulshi', '', 'qsesd', 0, '', '', 0, '9876543211', '', '', '', '', '', '8787686', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'cust-4', 1, 'Mukesh Kumar Verma', 'Dinesh Kumar verma', 'Ramesh Kumar Verma', 'Ghugriya Khedi', 12.5, '', '', 0, '7845123692', 'Susila Kumari Verma', '546765153748744', 'HDFC', 'HDFC0011245', 'Khargone', '456798746547870', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'cust-5', 1, 'PRAVESH SHARMA', 'MADHAV', '', 'GOGAWAN', 5, '', '', 0, '7000362599', 'PRAVESH SHARMA', '1234567', 'IDFC', 'IDFC000000011', 'KH', 'NON GST', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'cust-6', 1, 'PRAVESH SHARMA', 'MADHAV', 'ACCFG', 'GO', 0.02, '', '', 0, '7000362599', 'PRAVESH SHARMA', '112245545', 'IDFC', 'IDFC0000012', 'KH', 'N', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'cust-7', 1, 'jitendra yadav', 'kailash ji yadav', 'kailash ji yadav', 'vadiya', 10, '', '', 0, '9669765114', 'kailash shankar', '1930004070202', 'ccb', 'CBIN0MPDCAS', 'gogawan', 'NA', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'cust-8', 1, 'Dharmendra rathour', 'Narendra rathour', 'narendra rathour', 'kukdol', 5, '', '', 0, '9826206837', 'dharmendra rathour', '33598433813', 'state bank of india', 'SBIN0030027', 'khandwa road khargone', 'NA', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'cust-9', 1, 'shelen yashwant chouhan', 'SHELEN CHOUHAN', 'yashwant chouhan', 'borgaon', 5, '', '', 0, '6264396044', 'yashwant', '62643960441234', 'state bank of india', 'BKID0009920', 'GOGAWA', 'NO', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'cust-10', 1, 'jitendra  yadav', 'ABC', 'bhupendra  SO kailash', 'vadiya', 2, '', '', 0, '9713529877', 'bhupendra  so kailash', '1930004070202', 'CCB', 'CBIN0PMDCAS', 'GOGAWAN', '1365489732654', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'cust-11', 1, 'GANESH HUKUM YADAV', 'ASS', 'KANCHAN BAI  PUNYA YADAV', 'DAYALPURA', 3, '', '', 0, '9644251990', 'KANCHAN BAI  HUKUM YADAV', '19300387525', 'CCB', 'CBIN0MPDCAS', 'GOGAWAN', '123456789', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'cust-12', 1, 'Dinesh Bhai', '78654354867863636896686363633633546381', 'Suresh Bhai', 'Kakkad Gaon', 12.5, '', '145/45/12/1/2', 50001, '7879670071', 'Mahesh Bhai', '7864567484538978', 'Bank Of Baroda', 'SBIN0001234', 'Khargone Mdhya Pradesh', '', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'cust-13', 1, 'PRAFULL SHARMA', '12345678945', 'SURESH SHARMA', 'GOGAWAN', 5, '', '29/2', 0, '8889485785', 'PRAFULL SHARMA', '00012546632695', 'SBI', 'SBIN0030034', 'GOGAWAN', '', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'cust-14', 1, 'shyam', '710300710029', 'shyam', 'baijapur', 1.5, '', '41/3', 10, '8839147990', 'shyamsingh kadwasingh', '1930004070202', 'CCB', 'CBIN0PMDCAS', 'GOGAWAN', '', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'cust-15', 1, 'pawan', '123456789987', 'manohar naharsingh', 'baijapur', 2, '', '154', 10000, '9644476066', 'manohar naharsingh', '1930004070202', 'CCB', 'CBIN0PMDCAS', 'GOGAWAN', '', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'cust-16', 1, 'RADHE', '1233', 'PK', 'SHAHPURA', 5, 'MURADABAD', '29/2', 2, '9893577554', 'RADHE', '1930004070202', 'BOI', 'BKID0001234', 'GOGAWAN', '', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'cust-18', 1, 'Shree Ji', '78457754574', 'Shree Hari', 'Vekunth', 5e24, 'Vekunth', '78/45/12', 7.88788e31, '7857848787', 'Shree Hari Har', '487654878986446', 'IDBI', 'BARB0SANAND', 'Vekunth', '', 0, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  MODIFY `ladger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
