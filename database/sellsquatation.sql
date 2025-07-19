-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2025 at 12:43 PM
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
-- Table structure for table `sellsquatation`
--

CREATE TABLE `sellsquatation` (
  `id` int(11) NOT NULL,
  `Cash_Credit` varchar(50) NOT NULL,
  `Account_holders_name` varchar(255) NOT NULL,
  `Users_name` varchar(255) NOT NULL,
  `Village` varchar(100) NOT NULL,
  `Contact_no` int(10) NOT NULL,
  `Item_To_Be_Sale` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Rate` float NOT NULL,
  `Total_Amount` float NOT NULL,
  `GST_Amount` float NOT NULL,
  `Status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sellsquatation`
--

INSERT INTO `sellsquatation` (`id`, `Cash_Credit`, `Account_holders_name`, `Users_name`, `Village`, `Contact_no`, `Item_To_Be_Sale`, `Quantity`, `Rate`, `Total_Amount`, `GST_Amount`, `Status`) VALUES
(2, '', 'puja', 'ram', 'khargone', 789541232, '2', 1, 2.5, 50, 5, 1),
(3, '', 'Sapna', 'RAJ', 'khargone', 2147483647, '2', 1, 2.5, 500, 55, 1),
(5, '', 'Sapnaaa', 'sumit', 'khargone', 2147483647, '5', 1, 2.5, 234, 23, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sellsquatation`
--
ALTER TABLE `sellsquatation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sellsquatation`
--
ALTER TABLE `sellsquatation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
