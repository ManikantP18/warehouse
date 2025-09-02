-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2025 at 10:00 AM
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
-- Table structure for table `labor_prices`
--

CREATE TABLE `labor_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_type` varchar(255) NOT NULL,
  `price_per_kwintal` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labor_prices`
--

INSERT INTO `labor_prices` (`id`, `module_type`, `price_per_kwintal`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'staging', 50.00, 'Default staging labor price per kwintal', 1, '2025-01-20 10:00:00', '2025-01-20 10:00:00'),
(2, 'grading', 75.00, 'Default grading labor price per kwintal', 1, '2025-01-20 10:00:00', '2025-01-20 10:00:00'),
(3, 'packing', 100.00, 'Default packing labor price per kwintal', 1, '2025-01-20 10:00:00', '2025-01-20 10:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labor_prices`
--
ALTER TABLE `labor_prices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labor_prices`
--
ALTER TABLE `labor_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
