-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 08:58 AM
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
-- Table structure for table `admin_payment_settings`
--

CREATE TABLE `admin_payment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `purchase_date` date NOT NULL,
  `supported_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `chart_account_id` int(11) NOT NULL DEFAULT 0,
  `opening_balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `contact_number` varchar(255) DEFAULT NULL,
  `bank_address` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `holder_name`, `bank_name`, `account_number`, `chart_account_id`, `opening_balance`, `contact_number`, `bank_address`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Cash', '', '-', 0, 0.00, '-', '-', 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfers`
--

CREATE TABLE `bank_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `retainer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `receipt` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` varchar(255) NOT NULL DEFAULT '0',
  `vender_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `due_date` date NOT NULL,
  `order_number` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `shipping_display` int(11) NOT NULL DEFAULT 1,
  `send_date` date DEFAULT NULL,
  `discount_apply` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_accounts`
--

CREATE TABLE `bill_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chart_account_id` int(11) NOT NULL DEFAULT 0,
  `price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `ref_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_payments`
--

CREATE TABLE `bill_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `add_receipt` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_products`
--

CREATE TABLE `bill_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tax` varchar(50) DEFAULT NULL,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_cont` varchar(12) NOT NULL,
  `branch_address` text NOT NULL,
  `branch_status` tinyint(2) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_name`, `branch_cont`, `branch_address`, `branch_status`, `created_at`, `updated_at`) VALUES
(1, 'Aadarsh Enterpises', '9876543210', 'Gogawan', 1, '2025-06-26 08:13:42', '2025-06-26 08:13:42'),
(2, 'Bapna Warehouse', '784574874', 'Dhobi Mohyalla Amitabh Sir ke ghar ke pas', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Nikita Warehouse', '4657765445', 'Gogaawan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Nikita Warehouse', '4657765445', 'Gogaawan', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `income_data` text DEFAULT NULL,
  `expense_data` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `sub_type` int(11) NOT NULL DEFAULT 0,
  `parent` int(11) NOT NULL DEFAULT 0,
  `is_enabled` int(11) NOT NULL DEFAULT 1,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`id`, `name`, `code`, `type`, `sub_type`, `parent`, `is_enabled`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Checking Account', 1060, 1, 1, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 'Petty Cash', 1065, 1, 1, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 'Account Receivables', 1200, 1, 1, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 'Allowance for doubtful accounts', 1205, 1, 1, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 'Inventory', 1510, 1, 2, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 'Stock of Raw Materials', 1520, 1, 2, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(7, 'Stock of Work In Progress', 1530, 1, 2, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(8, 'Stock of Finished Goods', 1540, 1, 2, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(9, 'Goods Received Clearing account', 1550, 1, 2, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(10, 'Land and Buildings', 1810, 1, 3, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(11, 'Office Furniture and Equipement', 1820, 1, 3, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(12, 'Accum.depreciation-Furn. and Equip', 1825, 1, 3, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(13, 'Motor Vehicle', 1840, 1, 3, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(14, 'Accum.depreciation-Motor Vehicle', 1845, 1, 3, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(15, 'Account Payable', 2100, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(16, 'Deferred Income', 2105, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(17, 'Accrued Income Tax-Central', 2110, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(18, 'Income Tax Payable', 2120, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(19, 'Accrued Franchise Tax', 2130, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(20, 'Vat Provision', 2140, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(21, 'Purchase Tax', 2145, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(22, 'VAT Pay / Refund', 2150, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(23, 'Zero Rated', 2151, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(24, 'Capital import', 2152, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(25, 'Standard Import', 2153, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(26, 'Capital Standard', 2154, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(27, 'Vat Exempt', 2155, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(28, 'Accrued Use Tax Payable', 2160, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(29, 'Accrued Wages', 2210, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(30, 'Accrued Comp Time', 2220, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(31, 'Accrued Holiday Pay', 2230, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(32, 'Accrued Vacation Pay', 2240, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(33, 'Accr. Benefits - Central Provident Fund', 2310, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(34, 'Accr. Benefits - Stock Purchase', 2320, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(35, 'Accr. Benefits - Med, Den', 2330, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(36, 'Accr. Benefits - Payroll Taxes', 2340, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(37, 'Accr. Benefits - Credit Union', 2350, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(38, 'Accr. Benefits - Savings Bond', 2360, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(39, 'Accr. Benefits - Group Insurance', 2370, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(40, 'Accr. Benefits - Charity Cont.', 2380, 2, 4, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(41, 'Bank Loans', 2620, 2, 5, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(42, 'Loans from Shareholders', 2680, 2, 5, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(43, 'Common Shares', 3350, 2, 6, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(44, 'Reserves and Surplus', 3590, 2, 7, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(45, 'Owners Drawings', 3595, 2, 7, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(46, 'Opening Balances and adjustments', 3020, 3, 8, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(47, 'Owners Contribution', 3025, 3, 8, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(48, 'Profit and Loss ( current Year)', 3030, 3, 8, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(49, 'Retained income', 3035, 3, 8, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(50, 'Sales Income', 4010, 4, 9, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(51, 'Service Income', 4020, 4, 9, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(52, 'Shipping and Handling', 4430, 4, 10, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(53, 'Sundry Income', 4435, 4, 10, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(54, 'Interest Received', 4440, 4, 10, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(55, 'Foreign Exchange Gain', 4450, 4, 10, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(56, 'Unallocated Income', 4500, 4, 10, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(57, 'Discounts Received', 4510, 4, 10, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(58, 'Cost of Sales- On Services', 5005, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(59, 'Cost of Sales - Purchases', 5010, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(60, 'Operating Costs', 5015, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(61, 'Material Usage Varaiance', 5020, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(62, 'Breakage and Replacement Costs', 5025, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(63, 'Consumable Materials', 5030, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(64, 'Sub-contractor Costs', 5035, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(65, 'Purchase Price Variance', 5040, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(66, 'Direct Labour - COS', 5045, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(67, 'Purchases of Materials', 5050, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(68, 'Discounts Received', 5060, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(69, 'Freight Costs', 5100, 5, 11, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(70, 'Salaries and Wages', 5410, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(71, 'Directors Fees & Remuneration', 5415, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(72, 'Wages - Overtime', 5420, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(73, 'Members Salaries', 5425, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(74, 'UIF Payments', 5430, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(75, 'Payroll Taxes', 5440, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(76, 'Workers Compensation ( Coida )', 5450, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(77, 'Normal Taxation Paid', 5460, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(78, 'General Benefits', 5470, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(79, 'Provisional Tax Paid', 5510, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(80, 'Inc Tax Exp - State', 5520, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(81, 'Taxes - Real Estate', 5530, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(82, 'Taxes - Personal Property', 5540, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(83, 'Taxes - Franchise', 5550, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(84, 'Taxes - Foreign Withholding', 5560, 6, 12, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(85, 'Accounting Fees', 5610, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(86, 'Advertising and Promotions', 5615, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(87, 'Bad Debts', 5620, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(88, 'Courier and Postage', 5625, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(89, 'Depreciation Expense', 5660, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(90, 'Insurance Expense', 5685, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(91, 'Bank Charges', 5690, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(92, 'Interest Paid', 5695, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(93, 'Office Expenses - Consumables', 5700, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(94, 'Printing and Stationary', 5705, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(95, 'Security Expenses', 5710, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(96, 'Subscription - Membership Fees', 5715, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(97, 'Electricity, Gas and Water', 5755, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(98, 'Rent Paid', 5760, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(99, 'Repairs and Maintenance', 5765, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(100, 'Motor Vehicle Expenses', 5770, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(101, 'Petrol and Oil', 5771, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(102, 'Equipment Hire - Rental', 5775, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(103, 'Telephone and Internet', 5780, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(104, 'Travel and Accommodation', 5785, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(105, 'Meals and Entertainment', 5786, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(106, 'Staff Training', 5787, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(107, 'Utilities', 5790, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(108, 'Computer Expenses', 5791, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(109, 'Registrations', 5795, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(110, 'Licenses', 5800, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(111, 'Foreign Exchange Loss', 5810, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(112, 'Profit and Loss', 9990, 6, 13, 0, 1, NULL, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account_parents`
--

CREATE TABLE `chart_of_account_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sub_type` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  `account` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account_sub_types`
--

CREATE TABLE `chart_of_account_sub_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chart_of_account_sub_types`
--

INSERT INTO `chart_of_account_sub_types` (`id`, `name`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Current Asset', 1, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 'Inventory Asset', 1, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 'Non-current Asset', 1, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 'Current Liabilities', 2, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 'Long Term Liabilities', 2, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 'Share Capital', 2, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(7, 'Retained Earnings', 2, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(8, 'Owners Equity', 3, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(9, 'Sales Revenue', 4, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(10, 'Other Revenue', 4, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(11, 'Costs of Goods Sold', 5, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(12, 'Payroll Expenses', 6, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(13, 'General and Administrative expenses', 6, 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account_types`
--

CREATE TABLE `chart_of_account_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chart_of_account_types`
--

INSERT INTO `chart_of_account_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Assets', 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 'Liabilities', 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 'Equity', 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 'Income', 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 'Costs of Goods Sold', 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 'Expenses', 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `company_payment_settings`
--

CREATE TABLE `company_payment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer` int(11) NOT NULL DEFAULT 0,
  `subject` varchar(255) DEFAULT NULL,
  `value` decimal(15,2) NOT NULL DEFAULT 0.00,
  `type` int(11) NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `edit_status` varchar(255) NOT NULL DEFAULT 'pending',
  `description` text DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `customer_signature` longtext DEFAULT NULL,
  `company_signature` longtext DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_attachments`
--

CREATE TABLE `contract_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` int(11) NOT NULL,
  `files` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_comments`
--

CREATE TABLE `contract_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` int(11) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_notes`
--

CREATE TABLE `contract_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` int(11) NOT NULL,
  `note` longtext NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_types`
--

CREATE TABLE `contract_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `limit` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit_notes`
--

CREATE TABLE `credit_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` int(11) NOT NULL DEFAULT 0,
  `customer` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tax_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_enable_login` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_phone` varchar(255) DEFAULT NULL,
  `billing_zip` varchar(255) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_country` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(255) DEFAULT NULL,
  `shipping_zip` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `lang` varchar(255) NOT NULL DEFAULT 'en',
  `balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_values`
--

CREATE TABLE `custom_field_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `field_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_notes`
--

CREATE TABLE `debit_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill` int(11) NOT NULL DEFAULT 0,
  `vendor` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `from`, `slug`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'New Bill Payment', 'Agri Accounts', 'new_bill_payment', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 'Customer Invoice Sent', 'Agri Accounts', 'customer_invoice_sent', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 'Bill Sent', 'Agri Accounts', 'bill_sent', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 'New Invoice Payment', 'Agri Accounts', 'new_invoice_payment', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 'Invoice Sent', 'Agri Accounts', 'invoice_sent', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 'Payment Reminder', 'Agri Accounts', 'payment_reminder', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(7, 'Proposal Sent', 'Agri Accounts', 'proposal_sent', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(8, 'User Created', 'Agri Accounts', 'user_created', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(9, 'Vendor Bill Sent', 'Agri Accounts', 'vendor_bill_sent', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(10, 'New Contract', 'Agri Accounts', 'new_contract', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(11, 'Retainer Sent', 'Agri Accounts', 'retainer_sent', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(12, 'Customer Retainer Sent', 'Agri Accounts', 'customer_retainer_sent', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(13, 'New Retainer Payment', 'Agri Accounts', 'new_retainer_payment', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `email_template_langs`
--

CREATE TABLE `email_template_langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template_langs`
--

INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'New Bill Payment', '<p>مرحبا ، { payment_name }</p>\n                    <p>&nbsp;</p>\n                    <p>مرحبا بك في { app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>نحن نكتب لإبلاغكم بأننا قد أرسلنا مدفوعات (payment_bill) } الخاصة بك.</p>\n                    <p>&nbsp;</p>\n                    <p>لقد أرسلنا قيمتك { payment_amount } لأجل { payment_bill } قمت بالاحالة في التاريخ { payment_date } من خلال { payment_method }.</p>\n                    <p>&nbsp;</p>\n                    <p>شكرا جزيلا لك وطاب يومك ! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 1, 'da', 'New Bill Payment', '<p>Hej, { payment_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Velkommen til { app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Vi skriver for at informere dig om, at vi har sendt din { payment_bill }-betaling.</p>\n                    <p>&nbsp;</p>\n                    <p>Vi har sendt dit bel&oslash;b { payment_amount } betaling for { payment_bill } undertvist p&aring; dato { payment_date } via { payment_method }.</p>\n                    <p>&nbsp;</p>\n                    <p>Mange tak, og ha en god dag!</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 1, 'de', 'New Bill Payment', '<p>Hi, {payment_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Willkommen bei {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Wir schreiben Ihnen mitzuteilen, dass wir Ihre Zahlung von {payment_bill} gesendet haben.</p>\n                    <p>&nbsp;</p>\n                    <p>Wir haben Ihre Zahlung {payment_amount} Zahlung f&uuml;r {payment_bill} am Datum {payment_date} &uuml;ber {payment_method} gesendet.</p>\n                    <p>&nbsp;</p>\n                    <p>Vielen Dank und haben einen guten Tag! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 1, 'en', 'New Bill Payment', '<p>Hi, {payment_name}</p>\n                    <p>Welcome to {app_name}</p>\n                    <p>We are writing to inform you that we has sent your {payment_bill} payment.</p>\n                    <p>We has sent your amount {payment_amount} payment for {payment_bill} submited on date {payment_date} via {payment_method}.</p>\n                    <p>Thank You very much and have a good day !!!!</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 1, 'es', 'New Bill Payment', '<p>Hi, {payment_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Bienvenido a {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Estamos escribiendo para informarle que hemos enviado su pago {payment_bill}.</p>\n                    <p>&nbsp;</p>\n                    <p>Hemos enviado su importe {payment_amount} pago para {payment_bill} submitado en la fecha {payment_date} a trav&eacute;s de {payment_method}.</p>\n                    <p>&nbsp;</p>\n                    <p>Thank You very much and have a good day! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 1, 'fr', 'New Bill Payment', '<p>Salut, { payment_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Bienvenue dans { app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Nous vous &eacute;crivons pour vous informer que nous avons envoy&eacute; votre paiement { payment_bill }.</p>\n                    <p>&nbsp;</p>\n                    <p>Nous avons envoy&eacute; votre paiement { payment_amount } pour { payment_bill } soumis &agrave; la date { payment_date } via { payment_method }.</p>\n                    <p>&nbsp;</p>\n                    <p>Merci beaucoup et avez un bon jour ! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(7, 1, 'it', 'New Bill Payment', '<p>Ciao, {payment_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Benvenuti in {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Scriviamo per informarti che abbiamo inviato il tuo pagamento {payment_bill}.</p>\n                    <p>&nbsp;</p>\n                    <p>Abbiamo inviato la tua quantit&agrave; {payment_amount} pagamento per {payment_bill} subita alla data {payment_date} tramite {payment_method}.</p>\n                    <p>&nbsp;</p>\n                    <p>Grazie mille e buona giornata! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(8, 1, 'ja', 'New Bill Payment', '<p>こんにちは、 {payment_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_name} へようこそ</p>\n                    <p>&nbsp;</p>\n                    <p>{payment_bill} の支払いを送信したことをお知らせするために執筆しています。</p>\n                    <p>&nbsp;</p>\n                    <p>{payment_date } に提出された {payment_議案} に対する金額 {payment_date} の支払いは、 {payment_method}を介して送信されました。</p>\n                    <p>&nbsp;</p>\n                    <p>ありがとうございます。良い日をお願いします。</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(9, 1, 'nl', 'New Bill Payment', '<p>Hallo, { payment_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Welkom bij { app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Wij schrijven u om u te informeren dat wij uw betaling van { payment_bill } hebben verzonden.</p>\n                    <p>&nbsp;</p>\n                    <p>We hebben uw bedrag { payment_amount } betaling voor { payment_bill } verzonden op datum { payment_date } via { payment_method }.</p>\n                    <p>&nbsp;</p>\n                    <p>Hartelijk dank en hebben een goede dag! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(10, 1, 'pl', 'New Bill Payment', '<p>Witaj, {payment_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Witamy w aplikacji {app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Piszemy, aby poinformować Cię, że wysłaliśmy Twoją płatność {payment_bill }.</p>\n                    <p>&nbsp;</p>\n                    <p>Twoja kwota {payment_amount } została wysłana przez użytkownika {payment_bill } w dniu {payment_date } za pomocą metody {payment_method }.</p>\n                    <p>&nbsp;</p>\n                    <p>Dziękuję bardzo i mam dobry dzień! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(11, 1, 'ru', 'New Bill Payment', '<p>Привет, { payment_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Вас приветствует { app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Мы пишем, чтобы сообщить вам, что мы отправили вашу оплату { payment_bill }.</p>\n                    <p>&nbsp;</p>\n                    <p>Мы отправили вашу сумму оплаты { payment_amount } для { payment_bill }, подав на дату { payment_date } через { payment_method }.</p>\n                    <p>&nbsp;</p>\n                    <p>Большое спасибо и хорошего дня! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(12, 1, 'pt', 'New Bill Payment', '<p>Oi, {payment_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Bem-vindo a {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Estamos escrevendo para inform&aacute;-lo que enviamos o seu pagamento {payment_bill}.</p>\n                    <p>&nbsp;</p>\n                    <p>N&oacute;s enviamos sua quantia {payment_amount} pagamento por {payment_bill} requisitado na data {payment_date} via {payment_method}.</p>\n                    <p>&nbsp;</p>\n                    <p>Muito obrigado e tenha um bom dia! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(13, 1, 'tr', 'New Bill Payment', '<p>Merhaba, {payment_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Hoşgeldiniz {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Ödemenizi şu kişiden aldığımızı size bildirmek için yazıyoruz: {payment_bill} gönderildi.</p>\n                    <p>&nbsp;</p>\n                    <p>ödemeniz bizde {payment_amount} İçin ödeme {payment_bill} tarihte {payment_date} &uuml;hesaplanmış {payment_method} Gönderildi.</p>\n                    <p>&nbsp;</p>\n                    <p>Teşekkürler ve iyi günler! !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(14, 1, 'zh', 'New Bill Payment', '<p>你好, {payment_name}</p>\n                    <p>&nbsp;</p>\n                    <p>欢迎 {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>我们写信通知您，我们已收到您的付款: {payment_bill} gönderildi.</p>\n                    <p>&nbsp;</p>\n                    <p>我们已收到您的付款 {payment_amount} 支付 {payment_bill} 在历史上 {payment_date} ü 计算 {payment_method} 发送.</p>\n                    <p>&nbsp;</p>\n                    <p>谢谢，美好的一天！ !!!</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(15, 1, 'he', 'New Bill Payment', '<p>היי, {payment_name}</p>\n                    <p>ברוך הבא ל{app_name}</p>\n                    <p>אנו כותבים כדי להודיע ​​לך ששלחנו את שלך{payment_bill} תַשְׁלוּם.</p>\n                    <p>שלחנו את הסכום שלך{payment_amount} תשלום עבור {payment_bill} הוגש בתאריך {payment_date} באמצעות {payment_method}.</p>\n                    <p>תודה רבה ויום טוב!!!!</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(16, 1, 'pt-br', 'New Bill Payment', '<p>Oi, {payment_name}</p>\n                    <p>Bem-vindo ao {app_name}</p>\n                    <p>Estamos escrevendo para informá-lo que enviamos seu pagamento {payment_bill}.</p>\n                    <p>Enviamos seu valor {payment_amount} de pagamento para {payment_bill} enviado na data {payment_date} via {payment_method}.</p>\n                    <p>Muito obrigado e tenha um bom dia !!!!</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(17, 2, 'ar', 'Customer Invoice Sent', '<p>مرحبا ، { invoice_name }</p>\n                    <p>مرحبا بك في { app_name }</p>\n                    <p>أتمنى أن يجدك هذا البريد الإلكتروني جيدا برجاء الرجوع الى رقم الفاتورة الملحقة { invoice_number } للخدمة / الخدمة.</p>\n                    <p>ببساطة اضغط على الاختيار بأسفل.</p>\n                    <p>{ invoice_url }</p>\n                    <p>إشعر بالحرية للوصول إلى الخارج إذا عندك أي أسئلة.</p>\n                    <p>شكرا لك</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(18, 2, 'da', 'Customer Invoice Sent', '<p>Hej, { invoice_name }</p>\n                    <p>Velkommen til { app_name }</p>\n                    <p>H&aring;ber denne e-mail finder dig godt! Se vedlagte fakturanummer { invoice_number } for product/service.</p>\n                    <p>Klik p&aring; knappen nedenfor.</p>\n                    <p>{ invoice_url }</p>\n                    <p>Du er velkommen til at r&aelig;kke ud, hvis du har nogen sp&oslash;rgsm&aring;l.</p>\n                    <p>Tak.</p>\n                    <p>&nbsp;</p>\n                    <p>Med venlig hilsen</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(19, 2, 'de', 'Customer Invoice Sent', '<p>Hi, {invoice_name}</p>\n                    <p>Willkommen bei {app_name}</p>\n                    <p>Hoffe, diese E-Mail findet dich gut! Bitte beachten Sie die beigef&uuml;gte Rechnungsnummer {invoice_number} f&uuml;r Produkt/Service.</p>\n                    <p>Klicken Sie einfach auf den Button unten.</p>\n                    <p>{invoice_url}</p>\n                    <p>F&uuml;hlen Sie sich frei, wenn Sie Fragen haben.</p>\n                    <p>Vielen Dank,</p>\n                    <p>&nbsp;</p>\n                    <p>Betrachtet,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(20, 2, 'en', 'Customer Invoice Sent', '<p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">Hi, {invoice_name}</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">Welcome to {app_name}</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">Hope this email finds you well! Please see attached invoice number {invoice_number} for product/service.</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">Simply click on the button below.</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">{invoice_url}</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">Feel free to reach out if you have any questions.</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">Thank You,</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">Regards,</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">{company_name}</span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(21, 2, 'es', 'Customer Invoice Sent', '<p>Hi, {invoice_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Bienvenido a {app_name}</p>+\n                    <p>&nbsp;</p>\n                    <p>&iexcl;Espero que este email le encuentre bien! Consulte el n&uacute;mero de factura adjunto {invoice_number} para el producto/servicio.</p>\n                    <p>&nbsp;</p>\n                    <p>Simplemente haga clic en el bot&oacute;n de abajo.</p>\n                    <p>&nbsp;</p>\n                    <p>{invoice_url}</p>\n                    <p>&nbsp;</p>\n                    <p>Si&eacute;ntase libre de llegar si usted tiene alguna pregunta.</p>\n                    <p>&nbsp;</p>\n                    <p>Gracias,</p>\n                    <p>&nbsp;</p>\n                    <p>Considerando,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(22, 2, 'fr', 'Customer Invoice Sent', '<p>Bonjour, { invoice_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Bienvenue dans { app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Jesp&egrave;re que ce courriel vous trouve bien ! Voir le num&eacute;ro de facture { invoice_number } pour le produit/service.</p>\n                    <p>&nbsp;</p>\n                    <p>Cliquez simplement sur le bouton ci-dessous.</p>\n                    <p>&nbsp;</p>\n                    <p>{ invoice_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Nh&eacute;sitez pas &agrave; nous contacter si vous avez des questions.</p>\n                    <p>&nbsp;</p>\n                    <p>Merci,</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(23, 2, 'it', 'Customer Invoice Sent', '<p>Ciao, {invoice_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Benvenuti in {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Spero che questa email ti trovi bene! Si prega di consultare il numero di fattura collegato {invoice_number} per il prodotto/servizio.</p>\n                    <p>&nbsp;</p>\n                    <p>Semplicemente clicca sul pulsante sottostante.</p>\n                    <p>&nbsp;</p>\n                    <p>{invoice_url}</p>\n                    <p>&nbsp;</p>\n                    <p>Sentiti libero di raggiungere se hai domande.</p>\n                    <p>&nbsp;</p>\n                    <p>Grazie,</p>\n                    <p>&nbsp;</p>\n                    <p>Riguardo,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(24, 2, 'ja', 'Customer Invoice Sent', '<p>こんにちは、 {invoice_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_name} へようこそ</p>\n                    <p>&nbsp;</p>\n                    <p>この E メールでよくご確認ください。 製品 / サービスについては、添付された請求書番号 {invoice_number} を参照してください。</p>\n                    <p>&nbsp;</p>\n                    <p>以下のボタンをクリックしてください。</p>\n                    <p>&nbsp;</p>\n                    <p>{invoice_url}</p>\n                    <p>&nbsp;</p>\n                    <p>質問がある場合は、自由に連絡してください。</p>\n                    <p>&nbsp;</p>\n                    <p>ありがとうございます</p>\n                    <p>&nbsp;</p>\n                    <p>よろしく</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(25, 2, 'nl', 'Customer Invoice Sent', '<p>Hallo, { invoice_name }</p>\n                    <p>Welkom bij { app_name }</p>\n                    <p>Hoop dat deze e-mail je goed vindt! Zie bijgevoegde factuurnummer { invoice_number } voor product/service.</p>\n                    <p>Klik gewoon op de knop hieronder.</p>\n                    <p>{ invoice_url }</p>\n                    <p>Voel je vrij om uit te reiken als je vragen hebt.</p>\n                    <p>Dank U,</p>\n                    <p>Betreft:</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(26, 2, 'pl', 'Customer Invoice Sent', '<p>Witaj, {invoice_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Witamy w aplikacji {app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Mam nadzieję, że ta wiadomość znajdzie Cię dobrze! Sprawdź załączoną fakturę numer {invoice_number } dla produktu/usługi.</p>\n                    <p>&nbsp;</p>\n                    <p>Wystarczy kliknąć na przycisk poniżej.</p>\n                    <p>&nbsp;</p>\n                    <p>{invoice_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Czuj się swobodnie, jeśli masz jakieś pytania.</p>\n                    <p>&nbsp;</p>\n                    <p>Dziękuję,</p>\n                    <p>&nbsp;</p>\n                    <p>W odniesieniu do</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(27, 2, 'ru', 'Customer Invoice Sent', '<p>Привет, { invoice_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Вас приветствует { app_name }</p>\n                    <p>&nbsp;</p>\n                    <p>Надеюсь, это электронное письмо найдет вас хорошо! См. вложенный номер счета-фактуры { invoice_number } для производства/услуги.</p>\n                    <p>&nbsp;</p>\n                    <p>Просто нажмите на кнопку внизу.</p>\n                    <p>&nbsp;</p>\n                    <p>{ invoice_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Не стеснитесь, если у вас есть вопросы.</p>\n                    <p>&nbsp;</p>\n                    <p>Спасибо.</p>\n                    <p>&nbsp;</p>\n                    <p>С уважением,</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>&nbsp;</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(28, 2, 'pt', 'Customer Invoice Sent', '<p>Oi, {invoice_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Bem-vindo a {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Espero que este e-mail encontre voc&ecirc; bem! Por favor, consulte o n&uacute;mero da fatura anexa {invoice_number} para produto/servi&ccedil;o.</p>\n                    <p>&nbsp;</p>\n                    <p>Basta clicar no bot&atilde;o abaixo.</p>\n                    <p>&nbsp;</p>\n                    <p>{invoice_url}</p>\n                    <p>&nbsp;</p>\n                    <p>Sinta-se &agrave; vontade para alcan&ccedil;ar fora se voc&ecirc; tiver alguma d&uacute;vida.</p>\n                    <p>&nbsp;</p>\n                    <p>Obrigado,</p>\n                    <p>&nbsp;</p>\n                    <p>Considera,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(29, 2, 'tr', 'Customer Invoice Sent', '<p>Merhaba, { invoice_name }</p>\n                    <p>Hoşgeldiniz { app_name }</p>\n                    <p>Umarım bu e-posta sizi iyi bulur! Ürün/hizmet için ekteki fatura numarasına bakın { fatura_numarası }.</p>\n                    <p>Tıklamak aşağıdaki düğme.</p>\n                    <p>{ invoice_url }</p>\n                    <p>Herhangi bir sorunuz varsa bize ulaşabilirsiniz.</p>\n                    <p>Teşekkürler.</p>\n                    <p>&nbsp;</p>\n                    <p>Saygılarımızla</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(30, 2, 'zh', 'Customer Invoice Sent', '<p>你好, { invoice_name }</p>\n                    <p>你好 { app_name }</p>\n                    <p>希望这封电子邮件能让您满意！请参阅随附的产品/服务发票编号 {invoice_number}。</p>\n                    <p>Klik p&aring; knappen nedenfor.</p>\n                    <p>{ invoice_url }</p>\n                    <p>点击下面的按钮。</p>\n                    <p>谢谢.</p>\n                    <p>&nbsp;</p>\n                    <p>最诚挚的问候</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(31, 2, 'he', 'Customer Invoice Sent', '<p>שלום, { invoice_name }</p>\n                    <p>ברוך הבא ל { app_name }</p>\n                    <p>מקווה שהמייל הזה ימצא אותך טוב! ראה את מספר החשבונית המצורפת { invoice_number } למוצר/שירות.</p>\n                    <p>לחץ על כפתור למטה.</p>\n                    <p>{ invoice_url }</p>\n                    <p>אתה מוזמן לפנות אם יש לך שאלות.</p>\n                    <p>תודה.</p>\n                    <p>&nbsp;</p>\n                    <p>איחוליי הלבביים</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(32, 2, 'pt-br', 'Customer Invoice Sent', '<p>Oi, {invoice_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Bem-vindo a {app_name}</p>\n                    <p>&nbsp;</p>\n                    <p>Espero que este e-mail encontre voc&ecirc; bem! Por favor, consulte o n&uacute;mero da fatura anexa {invoice_number} para produto/servi&ccedil;o.</p>\n                    <p>&nbsp;</p>\n                    <p>Basta clicar no bot&atilde;o abaixo.</p>\n                    <p>&nbsp;</p>\n                    <p>{invoice_url}</p>\n                    <p>&nbsp;</p>\n                    <p>Sinta-se &agrave; vontade para alcan&ccedil;ar fora se voc&ecirc; tiver alguma d&uacute;vida.</p>\n                    <p>&nbsp;</p>\n                    <p>Obrigado,</p>\n                    <p>&nbsp;</p>\n                    <p>Considera,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>&nbsp;</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(33, 3, 'ar', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">مرحبا ، { bill_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">مرحبا بك في { app_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">أتمنى أن يجدك هذا البريد الإلكتروني جيدا ! ! برجاء الرجوع الى رقم الفاتورة الملحقة { bill_number } للحصول على المنتج / الخدمة.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">ببساطة اضغط على الاختيار بأسفل.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ bill_url }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">إشعر بالحرية للوصول إلى الخارج إذا عندك أي أسئلة.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">شكرا لك</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Regards,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ company_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ app_url }</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(34, 3, 'da', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hej, { bill_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Velkommen til { app_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">H&aring;ber denne e-mail finder dig godt! Se vedlagte fakturanummer } { bill_number } for product/service.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Klik p&aring; knappen nedenfor.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ bill_url }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Du er velkommen til at r&aelig;kke ud, hvis du har nogen sp&oslash;rgsm&aring;l.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Tak.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Med venlig hilsen</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ company_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ app_url }</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(35, 3, 'de', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hi, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Willkommen bei {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hoffe, diese E-Mail findet dich gut!! Sehen Sie sich die beigef&uuml;gte Rechnungsnummer {bill_number} f&uuml;r Produkt/Service an.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Klicken Sie einfach auf den Button unten.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">F&uuml;hlen Sie sich frei, wenn Sie Fragen haben.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Vielen Dank,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Betrachtet,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(36, 3, 'en', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hi, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Welcome to {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hope this email finds you well!! Please see attached bill number {bill_number} for product/service.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Simply click on the button below.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Feel free to reach out if you have any questions.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Thank You,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Regards,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(37, 3, 'es', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hi,&nbsp;{bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Bienvenido a {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">&iexcl;Espero que este correo te encuentre bien!! Consulte el n&uacute;mero de factura adjunto {bill_number} para el producto/servicio.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Simplemente haga clic en el bot&oacute;n de abajo.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Si&eacute;ntase libre de llegar si usted tiene alguna pregunta.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Gracias,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Considerando,</span></p>\n                    <p><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(38, 3, 'fr', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Salut,&nbsp;{bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Bienvenue dans { app_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Jesp&egrave;re que ce courriel vous trouve bien ! ! Veuillez consulter le num&eacute;ro de facture {bill_number}&nbsp;associ&eacute; au produit / service.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Cliquez simplement sur le bouton ci-dessous.</span></p>\n                    <p><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Nh&eacute;sitez pas &agrave; nous contacter si vous avez des questions.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Merci,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Regards,</span></p>\n                    <p><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(39, 3, 'it', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Ciao, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Benvenuti in {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Spero che questa email ti trovi bene!! Si prega di consultare il numero di fattura allegato {bill_number} per il prodotto/servizio.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Semplicemente clicca sul pulsante sottostante.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Sentiti libero di raggiungere se hai domande.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Grazie,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Riguardo,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(40, 3, 'ja', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">こんにちは、 {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_name} へようこそ</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">この E メールによりよく検出されます !! 製品 / サービスの添付された請求番号 {bill_number} を参照してください。</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">以下のボタンをクリックしてください。</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">質問がある場合は、自由に連絡してください。</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">ありがとうございます</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">よろしく</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(41, 3, 'nl', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hallo, { bill_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Welkom bij { app_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hoop dat deze e-mail je goed vindt!! Zie bijgevoegde factuurnummer { bill_number } voor product/service.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Klik gewoon op de knop hieronder.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ bill_url }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Voel je vrij om uit te reiken als je vragen hebt.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Dank U,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Betreft:</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ company_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ app_url }</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(42, 3, 'pl', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Witaj,&nbsp;{bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Witamy w aplikacji {app_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Mam nadzieję, że ta wiadomość e-mail znajduje Cię dobrze!! Zapoznaj się z załączonym numerem rachunku {bill_number } dla produktu/usługi.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Wystarczy kliknąć na przycisk poniżej.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Czuj się swobodnie, jeśli masz jakieś pytania.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Dziękuję,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">W odniesieniu do</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url }</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(43, 3, 'ru', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Привет, { bill_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Вас приветствует { app_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Надеюсь, это письмо найдет вас хорошо! См. прилагаемый номер счета { bill_number } для product/service.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Просто нажмите на кнопку внизу.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ bill_url }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Не стеснитесь, если у вас есть вопросы.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Спасибо.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">С уважением,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ company_name }</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{ app_url }</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(44, 3, 'pt', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Oi, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Bem-vindo a {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Espero que este e-mail encontre voc&ecirc; bem!! Por favor, consulte o n&uacute;mero de faturamento conectado {bill_number} para produto/servi&ccedil;o.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Basta clicar no bot&atilde;o abaixo.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Sinta-se &agrave; vontade para alcan&ccedil;ar fora se voc&ecirc; tiver alguma d&uacute;vida.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Obrigado,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Considera,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(45, 3, 'tr', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hi, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hoşgeldiniz {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Umarım bu e-posta sizi iyi bulur!! Lütfen ürün/hizmet için ekteki {bill_number} numaralı faturaya bakın.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Aşağıdaki butona tıklamanız yeterlidir.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Herhangi bir sorunuz varsa çekinmeden bize ulaşın.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Teşekkür ederim,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Saygılarımızla,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(46, 3, 'zh', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">你好, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">欢迎来到 {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">希望这封电子邮件给您带来好处！请参阅随附的产品/服务帐单号 {bill_number}。</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">只需点击下面的按钮即可。</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">如果您有任何疑问，请随时与我们联系。</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">谢谢你，</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">问候,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43');
INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(47, 3, 'he', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">היי, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">ברוך הבא ל {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">מקווה שהמייל הזה ימצא אותך טוב!! ראה את מספר החשבון המצורף {bill_number} עבור מוצר/שירות.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">פשוט לחץ על הכפתור למטה.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">אל תהסס לפנות אם יש לך שאלות.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">תודה,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">בברכה,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(48, 3, 'pt-br', 'Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Oi, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Bem-vindo a {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Espero que este e-mail encontre voc&ecirc; bem!! Por favor, consulte o n&uacute;mero de faturamento conectado {bill_number} para produto/servi&ccedil;o.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Basta clicar no bot&atilde;o abaixo.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Sinta-se &agrave; vontade para alcan&ccedil;ar fora se voc&ecirc; tiver alguma d&uacute;vida.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Obrigado,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Considera,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(49, 4, 'ar', 'New Invoice Payment', '<p>مرحبا</p>\n                    <p>مرحبا بك في { app_name }</p>\n                    <p>عزيزي { payment_name }</p>\n                    <p>لقد قمت باستلام المبلغ الخاص بك {payment_amount}&nbsp; لبرنامج { invoice_number } الذي تم تقديمه في التاريخ { payment_date }</p>\n                    <p>مقدار الاستحقاق { invoice_number } الخاص بك هو {payment_dueAmount}</p>\n                    <p>ونحن نقدر الدفع الفوري لكم ونتطلع إلى استمرار العمل معكم في المستقبل.</p>\n                    <p>&nbsp;</p>\n                    <p>شكرا جزيلا لكم ويوم جيد ! !</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(50, 4, 'da', 'New Invoice Payment', '<p>Hej.</p>\n                    <p>Velkommen til { app_name }</p>\n                    <p>K&aelig;re { payment_name }</p>\n                    <p>Vi har modtaget din m&aelig;ngde { payment_amount } betaling for { invoice_number } undert.d. p&aring; dato { payment_date }</p>\n                    <p>Dit { invoice_number } Forfaldsbel&oslash;b er { payment_dueAmount }</p>\n                    <p>Vi s&aelig;tter pris p&aring; din hurtige betaling og ser frem til fortsatte forretninger med dig i fremtiden.</p>\n                    <p>Mange tak, og ha en god dag!</p>\n                    <p>&nbsp;</p>\n                    <p>Med venlig hilsen</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(51, 4, 'de', 'New Invoice Payment', '<p>Hi,</p>\n                    <p>Willkommen bei {app_name}</p>\n                    <p>Sehr geehrter {payment_name}</p>\n                    <p>Wir haben Ihre Zahlung {payment_amount} f&uuml;r {invoice_number}, die am Datum {payment_date} &uuml;bergeben wurde, erhalten.</p>\n                    <p>Ihr {invoice_number} -f&auml;lliger Betrag ist {payment_dueAmount}</p>\n                    <p>Wir freuen uns &uuml;ber Ihre prompte Bezahlung und freuen uns auf das weitere Gesch&auml;ft mit Ihnen in der Zukunft.</p>\n                    <p>Vielen Dank und habe einen guten Tag!!</p>\n                    <p>&nbsp;</p>\n                    <p>Betrachtet,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(52, 4, 'en', 'New Invoice Payment', '<p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">Hi,</span></span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">Welcome to {app_name}</span></span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">Dear {payment_name}</span></span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">We have recieved your amount {payment_amount} payment for {invoice_number} submited on date {payment_date}</span></span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">Your {invoice_number} Due amount is {payment_dueAmount}</span></span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">We appreciate your prompt payment and look forward to continued business with you in the future.</span></span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">Thank you very much and have a good day!!</span></span></p>\n                    <p>&nbsp;</p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">Regards,</span></span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">{company_name}</span></span></p>\n                    <p><span style=\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\"><span style=\"font-size: 15px; font-variant-ligatures: common-ligatures;\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(53, 4, 'es', 'New Invoice Payment', '<p>Hola,</p>\n                    <p>Bienvenido a {app_name}</p>\n                    <p>Estimado {payment_name}</p>\n                    <p>Hemos recibido su importe {payment_amount} pago para {invoice_number} submitado en la fecha {payment_date}</p>\n                    <p>El importe de {invoice_number} Due es {payment_dueAmount}</p>\n                    <p>Agradecemos su pronto pago y esperamos continuar con sus negocios con usted en el futuro.</p>\n                    <p>Muchas gracias y que tengan un buen d&iacute;a!!</p>\n                    <p>&nbsp;</p>\n                    <p>Considerando,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(54, 4, 'fr', 'New Invoice Payment', '<p>Salut,</p>\n                    <p>Bienvenue dans { app_name }</p>\n                    <p>Cher { payment_name }</p>\n                    <p>Nous avons re&ccedil;u votre montant { payment_amount } de paiement pour { invoice_number } soumis le { payment_date }</p>\n                    <p>Votre {invoice_number} Montant d&ucirc; est { payment_dueAmount }</p>\n                    <p>Nous appr&eacute;cions votre rapidit&eacute; de paiement et nous attendons avec impatience de poursuivre vos activit&eacute;s avec vous &agrave; lavenir.</p>\n                    <p>Merci beaucoup et avez une bonne journ&eacute;e ! !</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(55, 4, 'it', 'New Invoice Payment', '<p>Ciao,</p>\n                    <p>Benvenuti in {app_name}</p>\n                    <p>Caro {payment_name}</p>\n                    <p>Abbiamo ricevuto la tua quantit&agrave; {payment_amount} pagamento per {invoice_number} subita alla data {payment_date}</p>\n                    <p>Il tuo {invoice_number} A somma cifra &egrave; {payment_dueAmount}</p>\n                    <p>Apprezziamo il tuo tempestoso pagamento e non vedo lora di continuare a fare affari con te in futuro.</p>\n                    <p>Grazie mille e buona giornata!!</p>\n                    <p>&nbsp;</p>\n                    <p>Riguardo,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(56, 4, 'ja', 'New Invoice Payment', '<p>こんにちは。</p>\n                    <p>{app_name} へようこそ</p>\n                    <p>{ payment_name} に出れます</p>\n                    <p>{ payment_date} 日付で提出された {請求書番号} の支払金額 } の金額を回収しました。 }</p>\n                    <p>お客様の {請求書番号} 予定額は {payment_dueAmount} です</p>\n                    <p>お客様の迅速な支払いを評価し、今後も継続してビジネスを継続することを期待しています。</p>\n                    <p>ありがとうございます。良い日をお願いします。</p>\n                    <p>&nbsp;</p>\n                    <p>よろしく</p>\n                    <p>{ company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(57, 4, 'nl', 'New Invoice Payment', '<p>Hallo,</p>\n                    <p>Welkom bij { app_name }</p>\n                    <p>Beste { payment_name }</p>\n                    <p>We hebben uw bedrag ontvangen { payment_amount } betaling voor { invoice_number } ingediend op datum { payment_date }</p>\n                    <p>Uw { invoice_number } verschuldigde bedrag is { payment_dueAmount }</p>\n                    <p>Wij waarderen uw snelle betaling en kijken uit naar verdere zaken met u in de toekomst.</p>\n                    <p>Hartelijk dank en hebben een goede dag!!</p>\n                    <p>&nbsp;</p>\n                    <p>Betreft:</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(58, 4, 'pl', 'New Invoice Payment', '<p>Witam,</p>\n                    <p>Witamy w aplikacji {app_name }</p>\n                    <p>Droga {payment_name }</p>\n                    <p>Odebrano kwotę {payment_amount } płatności za {invoice_number } w dniu {payment_date }, kt&oacute;ry został zastąpiony przez użytkownika.</p>\n                    <p>{invoice_number } Kwota należna: {payment_dueAmount }</p>\n                    <p>Doceniamy Twoją szybką płatność i czekamy na kontynuację działalności gospodarczej z Tobą w przyszłości.</p>\n                    <p>Dziękuję bardzo i mam dobry dzień!!</p>\n                    <p>&nbsp;</p>\n                    <p>W odniesieniu do</p>\n                    <p>{company_name }</p>\n                    <p>{app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(59, 4, 'ru', 'New Invoice Payment', '<p>Привет.</p>\n                    <p>Вас приветствует { app_name }</p>\n                    <p>Дорогая { payment_name }</p>\n                    <p>Мы получили вашу сумму оплаты {payment_amount} для { invoice_number }, подавшей на дату { payment_date }</p>\n                    <p>Ваша { invoice_number } Должная сумма-{ payment_dueAmount }</p>\n                    <p>Мы ценим вашу своевременную оплату и надеемся на продолжение бизнеса с вами в будущем.</p>\n                    <p>Большое спасибо и хорошего дня!!</p>\n                    <p>&nbsp;</p>\n                    <p>С уважением,</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(60, 4, 'pt', 'New Invoice Payment', '<p>Oi,</p>\n                    <p>Bem-vindo a {app_name}</p>\n                    <p>Querido {payment_name}</p>\n                    <p>N&oacute;s recibimos sua quantia {payment_amount} pagamento para {invoice_number} requisitado na data {payment_date}</p>\n                    <p>Sua quantia {invoice_number} Due &eacute; {payment_dueAmount}</p>\n                    <p>Agradecemos o seu pronto pagamento e estamos ansiosos para continuarmos os neg&oacute;cios com voc&ecirc; no futuro.</p>\n                    <p>Muito obrigado e tenha um bom dia!!</p>\n                    <p>&nbsp;</p>\n                    <p>Considera,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(61, 4, 'tr', 'New Invoice Payment', '<p>Merhaba.</p>\n                    <p>Hoşgeldiniz { app_name }</p>\n                    <p>Canım { payment_name }</p>\n                    <p>{ fatura_numarası } için { ödeme_amount } ödemenizi şu tarihe kadar aldık: { ödeme_tarihi } tarihinde</p>\n                    <p>{ fatura numaranız } Ödenmesi Gereken Tutarınız: { vadesi gelen ödeme Tutarı }</p>\n                    <p>Hızlı ödemeniz için teşekkür ederiz ve gelecekte sizinle iş yapmaya devam etmeyi dört gözle bekliyoruz.</p>\n                    <p>Çok teşekkür ederim ve iyi günler!</p>\n                    <p>&nbsp;</p>\n                    <p>Saygılarımızla</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(62, 4, 'zh', 'New Invoice Payment', '<p>你好.</p>\n                    <p>欢迎来到 { app_name }</p>\n                    <p>亲爱的 { payment_name }</p>\n                    <p>我们已收到您针对 {invoice_number} 的 { payment_amount } 付款日期 { payment_date }</p>\n                    <p>您的{发票号码}到期金额是{付款到期金额}</p>\n                    <p>我们感谢您及时付款，并期待将来继续与您开展业务。</p>\n                    <p>非常感谢您，祝您度过愉快的一天！</p>\n                    <p>&nbsp;</p>\n                    <p>最诚挚的问候</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(63, 4, 'he', 'New Invoice Payment', '<p>שלום.</p>\n                    <p>ברוך הבא ל { app_name }</p>\n                    <p>יָקָר { payment_name }</p>\n                    <p>קיבלנו את התשלום שלך ב-{ payment_amount } עבור { invoice_number } תחת בתאריך { payment_date }</p>\n                    <p>{ חשבונית מספר } סכום התשלום שלך הוא { תשלום בשל סכום }</p>\n                    <p>אנו מעריכים את התשלום המהיר שלך ומצפים להמשך העסקים איתך בעתיד.</p>\n                    <p>תודה רבה ויום נעים!</p>\n                    <p>&nbsp;</p>\n                    <p>איחוליי הלבביים</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(64, 4, 'pt-br', 'New Invoice Payment', '<p>Oi.</p>\n                    <p>Bem-vindo a { app_name }</p>\n                    <p>Querido { payment_name }</p>\n                    <p>N&oacute;s recibimos sua quantia {payment_amount} pagamento para {invoice_number} requisitado na data {payment_date}</p>\n                    <p>Sua quantia {invoice_number} Due &eacute; {payment_dueAmount}</p>\n                    <p>Agradecemos o seu pronto pagamento e estamos ansiosos para continuarmos os neg&oacute;cios com voc&ecirc; no futuro.</p>\n                    <p>Muito obrigado e tenha um bom dia!!</p>\n                    <p>&nbsp;</p>\n                    <p>Considera</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(65, 5, 'ar', 'Invoice Sent', '<p>مرحبا { invoice_name },</p>\n                    <p>أتمنى أن يجدك هذا البريد الإلكتروني جيدا برجاء الرجوع الى رقم الفاتورة الملحقة { invoice_number } للخدمة / الخدمة.</p>\n                    <p>ببساطة اضغط على الاختيار بأسفل</p>\n                    <p>{ invoice_url }</p>\n                    <p>إشعر بالحرية للوصول إلى الخارج إذا عندك أي أسئلة.</p>\n                    <p>شكرا لعملك ! !</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(66, 5, 'da', 'Invoice Sent', '<p>Hallo { invoice_name },</p>\n                    <p>H&aring;ber denne e-mail finder dig godt! Se vedlagte fakturanummer { invoice_number } for product/service.</p>\n                    <p>Klik p&aring; knappen nedenfor</p>\n                    <p>{ invoice_url }</p>\n                    <p>Du er velkommen til at r&aelig;kke ud, hvis du har nogen sp&oslash;rgsm&aring;l.</p>\n                    <p>Tak for din virksomhed!</p>\n                    <p>&nbsp;</p>\n                    <p>Med venlig hilsen</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(67, 5, 'de', 'Invoice Sent', '<p>Hello {invoice_name},</p>\n                    <p>Hoffe, diese E-Mail findet dich gut! Bitte beachten Sie die beigef&uuml;gte Rechnungsnummer {invoice_number} f&uuml;r Produkt/Service.</p>\n                    <p>Klicken Sie einfach auf den Button unten</p>\n                    <p>{invoice_url}</p>\n                    <p>F&uuml;hlen Sie sich frei, wenn Sie Fragen haben.</p>\n                    <p>Vielen Dank f&uuml;r Ihr Unternehmen!!</p>\n                    <p>&nbsp;</p>\n                    <p>Betrachtet,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(68, 5, 'en', 'Invoice Sent', '<p>Hello {invoice_name},</p>\n                    <p>Hope this email finds you well! Please see attached invoice number {invoice_number} for product/service.</p>\n                    <p>Simply click on the button below</p>\n                    <p>{invoice_url}</p>\n                    <p>Feel free to reach out if you have any questions.</p>\n                    <p>Thank you for your business!!</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{company_name}<br />{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(69, 5, 'es', 'Invoice Sent', '<p>Hello {invoice_name},</p>\n                    <p>&iexcl;Espero que este email le encuentre bien! Consulte el n&uacute;mero de factura adjunto {invoice_number} para el producto/servicio.</p>\n                    <p>Simplemente haga clic en el bot&oacute;n de abajo</p>\n                    <p>{invoice_url}</p>\n                    <p>Si&eacute;ntase libre de llegar si usted tiene alguna pregunta.</p>\n                    <p>&iexcl;Gracias por su negocio!!</p>\n                    <p>&nbsp;</p>\n                    <p>Considerando,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(70, 5, 'fr', 'Invoice Sent', '<p>Bonjour {invoice_name},</p>\n                    <p>Jesp&egrave;re que ce courriel vous trouve bien ! Voir le num&eacute;ro de facture { invoice_number } pour le produit/service.</p>\n                    <p>Cliquez simplement sur le bouton ci-dessous</p>\n                    <p>{ invoice_url}</p>\n                    <p>Nh&eacute;sitez pas &agrave; nous contacter si vous avez des questions.</p>\n                    <p>Merci pour votre entreprise ! !</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(71, 5, 'it', 'Invoice Sent', '<p>Ciao {invoice_name},</p>\n                    <p>Spero che questa email ti trovi bene! Si prega di consultare il numero di fattura collegato {invoice_number} per il prodotto/servizio.</p>\n                    <p>Semplicemente clicca sul pulsante sottostante</p>\n                    <p>{invoice_url}</p>\n                    <p>Sentiti libero di raggiungere se hai domande.</p>\n                    <p>Grazie per il tuo business!!</p>\n                    <p>&nbsp;</p>\n                    <p>&nbsp;</p>\n                    <p>Riguardo,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(72, 5, 'ja', 'Invoice Sent', '<p>こんにちは {invoice_name}、</p>\n                    <p>この E メールでよくご確認ください。 製品 / サービスについては、添付された請求書番号 {invoice_number} を参照してください。</p>\n                    <p>以下のボタンをクリックしてください。</p>\n                    <p>{invoice_url}</p>\n                    <p>質問がある場合は、自由に連絡してください。</p>\n                    <p>お客様のビジネスに感謝します。</p>\n                    <p>&nbsp;</p>\n                    <p>よろしく</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(73, 5, 'nl', 'Invoice Sent', '<p>Hallo { invoice_name },</p>\n                    <p>Hoop dat deze e-mail je goed vindt! Zie bijgevoegde factuurnummer { invoice_number } voor product/service.</p>\n                    <p>Klik gewoon op de knop hieronder</p>\n                    <p>{ invoice_url }</p>\n                    <p>Voel je vrij om uit te reiken als je vragen hebt.</p>\n                    <p>Dank u voor uw bedrijf!!</p>\n                    <p>&nbsp;</p>\n                    <p>Betreft:</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(74, 5, 'pl', 'Invoice Sent', '<p>Witaj {invoice_name },</p>\n                    <p>Mam nadzieję, że ta wiadomość znajdzie Cię dobrze! Sprawdź załączoną fakturę numer {invoice_number } dla produktu/usługi.</p>\n                    <p>Wystarczy kliknąć na przycisk poniżej</p>\n                    <p>{invoice_url }</p>\n                    <p>Czuj się swobodnie, jeśli masz jakieś pytania.</p>\n                    <p>Dziękujemy za prowadzenie działalności!!</p>\n                    <p>&nbsp;</p>\n                    <p>W odniesieniu do</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name }</p>\n                    <p>{app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(75, 5, 'ru', 'Invoice Sent', '<p>Здравствуйте, { invice_name },</p>\n                    <p>Надеюсь, это электронное письмо найдет вас хорошо! См. вложенный номер счета-фактуры { invoice_number } для производства/услуги.</p>\n                    <p>Просто нажмите на кнопку ниже</p>\n                    <p>{ invoice_url }</p>\n                    <p>Не стеснитесь, если у вас есть вопросы.</p>\n                    <p>Спасибо за ваше дело!</p>\n                    <p>&nbsp;</p>\n                    <p>С уважением,</p>\n                    <p>&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(76, 5, 'pt', 'Invoice Sent', '<p>Olá {invoice_name},</p>\n                    <p>Espero que este e-mail encontre voc&ecirc; bem! Por favor, consulte o n&uacute;mero da fatura anexa {invoice_number} para produto/servi&ccedil;o.</p>\n                    <p>Basta clicar no botão abaixo</p>\n                    <p>{invoice_url}</p>\n                    <p>Sinta-se &agrave; vontade para alcan&ccedil;ar fora se voc&ecirc; tiver alguma d&uacute;vida.</p>\n                    <p>Obrigado pelo seu neg&oacute;cio!!</p>\n                    <p>&nbsp;</p>\n                    <p>Considera,</p>\n                    <p>&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(77, 5, 'tr', 'Invoice Sent', '<p>Merhaba {invoice_name},</p>\n                    <p>Umarım bu e-posta sizi iyi bulur! Lütfen ürün/hizmet için ekteki {invoice_number} numaralı faturaya bakın.</p>\n                    <p>Aşağıdaki butona tıklamanız yeterli</p>\n                    <p>{invoice_url}</p>\n                    <p>Herhangi bir sorunuz varsa çekinmeden bize ulaşın.</p>\n                    <p>İşiniz için teşekkür ederim!!</p>\n                    <p>&nbsp;</p>\n                    <p>Saygılarımızla,</p>\n                    <p>{company_name}<br />{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(78, 5, 'zh', 'Invoice Sent', '<p>你好 {invoice_name},</p>\n                    <p>希望这封电子邮件能让您满意！请参阅随附的产品/服务发票编号 {invoice_number}。</p>\n                    <p>只需点击下面的按钮</p>\n                    <p>{invoice_url}</p>\n                    <p>如果您有任何疑问，请随时与我们联系。</p>\n                    <p>感谢您的业务！！</p>\n                    <p>&nbsp;</p>\n                    <p>问候,</p>\n                    <p>{company_name}<br />{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(79, 5, 'he', 'Invoice Sent', '<p>שלום {invoice_name},</p>\n                    <p>מקווה שהמייל הזה ימצא אותך טוב! ראה את מספר החשבונית המצורפת {invoice_number} עבור מוצר/שירות.</p>\n                    <p>פשוט לחץ על הכפתור למטה</p>\n                    <p>{invoice_url}</p>\n                    <p>אל תהסס לפנות אם יש לך שאלות.</p>\n                    <p>תודה לך על העסק שלך!!</p>\n                    <p>&nbsp;</p>\n                    <p>בברכה,</p>\n                    <p>{company_name}<br />{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(80, 5, 'pt-br', 'Invoice Sent', '<p>Olá {invoice_name},</p>\n                    <p>Espero que este e-mail o encontre bem! Consulte o número da fatura em anexo {invoice_number} para produto/serviço.</p>\n                    <p>Basta clicar no botão abaixo</p>\n                    <p>{invoice_url}</p>\n                    <p>Sinta-se à vontade para entrar em contato se tiver alguma dúvida.</p>\n                    <p>Agradeço pelos seus serviços!!</p>\n                    <p>&nbsp;</p>\n                    <p>Cumprimentos,</p>\n                    <p>{company_name}<br />{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(81, 6, 'ar', 'Payment Reminder', '<p>عزيزي ، { payment_name }</p>\n                    <p>آمل أن تكون بخير. هذا مجرد تذكير بأن الدفع على الفاتورة { invoice_number } الاجمالي { payment_dueAmount } ، والتي قمنا بارسالها على { payment_date } مستحق اليوم.</p>\n                    <p>يمكنك دفع مبلغ لحساب البنك المحدد على الفاتورة.</p>\n                    <p>أنا متأكد أنت مشغول ، لكني أقدر إذا أنت يمكن أن تأخذ a لحظة ونظرة على الفاتورة عندما تحصل على فرصة.</p>\n                    <p>إذا كان لديك أي سؤال مهما يكن ، يرجى الرد وسأكون سعيدا لتوضيحها.</p>\n                    <p>&nbsp;</p>\n                    <p>شكرا&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(82, 6, 'da', 'Payment Reminder', '<p>K&aelig;re, { payment_name }</p>\n                    <p>Dette er blot en p&aring;mindelse om, at betaling p&aring; faktura { invoice_number } i alt { payment_dueAmount}, som vi sendte til { payment_date }, er forfalden i dag.</p>\n                    <p>Du kan foretage betalinger til den bankkonto, der er angivet p&aring; fakturaen.</p>\n                    <p>Jeg er sikker p&aring; du har travlt, men jeg ville s&aelig;tte pris p&aring;, hvis du kunne tage et &oslash;jeblik og se p&aring; fakturaen, n&aring;r du f&aring;r en chance.</p>\n                    <p>Hvis De har nogen sp&oslash;rgsm&aring;l, s&aring; svar venligst, og jeg vil med gl&aelig;de tydeligg&oslash;re dem.</p>\n                    <p>&nbsp;</p>\n                    <p>Tak.&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(83, 6, 'de', 'Payment Reminder', '<p>Sehr geehrte/r, {payment_name}</p>\n                    <p>Ich hoffe, Sie sind gut. Dies ist nur eine Erinnerung, dass die Zahlung auf Rechnung {invoice_number} total {payment_dueAmount}, die wir gesendet am {payment_date} ist heute f&auml;llig.</p>\n                    <p>Sie k&ouml;nnen die Zahlung auf das auf der Rechnung angegebene Bankkonto vornehmen.</p>\n                    <p>Ich bin sicher, Sie sind besch&auml;ftigt, aber ich w&uuml;rde es begr&uuml;&szlig;en, wenn Sie einen Moment nehmen und &uuml;ber die Rechnung schauen k&ouml;nnten, wenn Sie eine Chance bekommen.</p>\n                    <p>Wenn Sie irgendwelche Fragen haben, antworten Sie bitte und ich w&uuml;rde mich freuen, sie zu kl&auml;ren.</p>\n                    <p>&nbsp;</p>\n                    <p>Danke,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(84, 6, 'en', 'Payment Reminder', '<p>Dear, {payment_name}</p>\n                    <p>I hope you&rsquo;re well.This is just a reminder that payment on invoice {invoice_number} total dueAmount {payment_dueAmount} , which we sent on {payment_date} is due today.</p>\n                    <p>You can make payment to the bank account specified on the invoice.</p>\n                    <p>I&rsquo;m sure you&rsquo;re busy, but I&rsquo;d appreciate if you could take a moment and look over the invoice when you get a chance.</p>\n                    <p>If you have any questions whatever, please reply and I&rsquo;d be happy to clarify them.</p>\n                    <p>&nbsp;</p>\n                    <p>Thanks,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(85, 6, 'es', 'Payment Reminder', '<p>Estimado, {payment_name}</p>\n                    <p>Espero que est&eacute;s bien. Esto es s&oacute;lo un recordatorio de que el pago en la factura {invoice_number} total {payment_dueAmount}, que enviamos en {payment_date} se vence hoy.</p>\n                    <p>Puede realizar el pago a la cuenta bancaria especificada en la factura.</p>\n                    <p>Estoy seguro de que est&aacute;s ocupado, pero agradecer&iacute;a si podr&iacute;as tomar un momento y mirar sobre la factura cuando tienes una oportunidad.</p>\n                    <p>Si tiene alguna pregunta, por favor responda y me gustar&iacute;a aclararlas.</p>\n                    <p>&nbsp;</p>\n                    <p>Gracias,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(86, 6, 'fr', 'Payment Reminder', '<p>Cher, { payment_name }</p>\n                    <p>Jesp&egrave;re que vous &ecirc;tes bien, ce nest quun rappel que le paiement sur facture {invoice_number}total { payment_dueAmount }, que nous avons envoy&eacute; le {payment_date} est d&ucirc; aujourdhui.</p>\n                    <p>Vous pouvez effectuer le paiement sur le compte bancaire indiqu&eacute; sur la facture.</p>\n                    <p>Je suis s&ucirc;r que vous &ecirc;tes occup&eacute;, mais je vous serais reconnaissant de prendre un moment et de regarder la facture quand vous aurez une chance.</p>\n                    <p>Si vous avez des questions, veuillez r&eacute;pondre et je serais heureux de les clarifier.</p>\n                    <p>&nbsp;</p>\n                    <p>Merci,&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(87, 6, 'it', 'Payment Reminder', '<p>Caro, {payment_name}</p>\n                    <p>Spero che tu stia bene, questo &egrave; solo un promemoria che il pagamento sulla fattura {invoice_number} totale {payment_dueAmount}, che abbiamo inviato su {payment_date} &egrave; dovuto oggi.</p>\n                    <p>&Egrave; possibile effettuare il pagamento al conto bancario specificato sulla fattura.</p>\n                    <p>Sono sicuro che sei impegnato, ma apprezzerei se potessi prenderti un momento e guardare la fattura quando avrai una chance.</p>\n                    <p>Se avete domande qualunque, vi prego di rispondere e sarei felice di chiarirle.</p>\n                    <p>&nbsp;</p>\n                    <p>Grazie,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(88, 6, 'ja', 'Payment Reminder', '<p>ID、 {payment_name}</p>\n                    <p>これは、 { payment_dueAmount} の合計 {payment_dueAmount } に対する支払いが今日予定されていることを思い出させていただきたいと思います。</p>\n                    <p>請求書に記載されている銀行口座に対して支払いを行うことができます。</p>\n                    <p>お忙しいのは確かですが、機会があれば、少し時間をかけてインボイスを見渡すことができればありがたいのですが。</p>\n                    <p>何か聞きたいことがあるなら、お返事をお願いしますが、喜んでお答えします。</p>\n                    <p>&nbsp;</p>\n                    <p>ありがとう。&nbsp;</p>\n                    <p>{ company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(89, 6, 'nl', 'Payment Reminder', '<p>Geachte, { payment_name }</p>\n                    <p>Ik hoop dat u goed bent. Dit is gewoon een herinnering dat betaling op factuur { invoice_number } totaal { payment_dueAmount }, die we verzonden op { payment_date } is vandaag verschuldigd.</p>\n                    <p>U kunt betaling doen aan de bankrekening op de factuur.</p>\n                    <p>Ik weet zeker dat je het druk hebt, maar ik zou het op prijs stellen als je even over de factuur kon kijken als je een kans krijgt.</p>\n                    <p>Als u vragen hebt, beantwoord dan uw antwoord en ik wil ze graag verduidelijken.</p>\n                    <p>&nbsp;</p>\n                    <p>Bedankt.&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(90, 6, 'pl', 'Payment Reminder', '<p>Drogi, {payment_name }</p>\n                    <p>Mam nadzieję, że jesteś dobrze. To jest tylko przypomnienie, że płatność na fakturze {invoice_number } total {payment_dueAmount }, kt&oacute;re wysłaliśmy na {payment_date } jest dzisiaj.</p>\n                    <p>Płatność można dokonać na rachunek bankowy podany na fakturze.</p>\n                    <p>Jestem pewien, że jesteś zajęty, ale byłbym wdzięczny, gdybyś m&oacute;gł wziąć chwilę i spojrzeć na fakturę, kiedy masz szansę.</p>\n                    <p>Jeśli masz jakieś pytania, proszę o odpowiedź, a ja chętnie je wyjaśniam.</p>\n                    <p>&nbsp;</p>\n                    <p>Dziękuję,&nbsp;</p>\n                    <p>{company_name }</p>\n                    <p>{app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(91, 6, 'ru', 'Payment Reminder', '<p>Уважаемый, { payment_name }</p>\n                    <p>Я надеюсь, что вы хорошо. Это просто напоминание о том, что оплата по счету { invoice_number } всего { payment_dueAmount }, которое мы отправили в { payment_date }, сегодня.</p>\n                    <p>Вы можете произвести платеж на банковский счет, указанный в счете-фактуре.</p>\n                    <p>Я уверена, что ты занята, но я была бы признательна, если бы ты смог бы поглядеться на счет, когда у тебя появится шанс.</p>\n                    <p>Если у вас есть вопросы, пожалуйста, ответьте, и я буду рад их прояснить.</p>\n                    <p>&nbsp;</p>\n                    <p>Спасибо.&nbsp;</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(92, 6, 'pt', 'Payment Reminder', '<p>Querido, {payment_name}</p>\n                    <p>Espero que voc&ecirc; esteja bem. Este &eacute; apenas um lembrete de que o pagamento na fatura {invoice_number} total {payment_dueAmount}, que enviamos em {payment_date} &eacute; devido hoje.</p>\n                    <p>Voc&ecirc; pode fazer o pagamento &agrave; conta banc&aacute;ria especificada na fatura.</p>\n                    <p>Eu tenho certeza que voc&ecirc; est&aacute; ocupado, mas eu agradeceria se voc&ecirc; pudesse tirar um momento e olhar sobre a fatura quando tiver uma chance.</p>\n                    <p>Se voc&ecirc; tiver alguma d&uacute;vida o que for, por favor, responda e eu ficaria feliz em esclarec&ecirc;-las.</p>\n                    <p>&nbsp;</p>\n                    <p>Obrigado,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(93, 6, 'tr', 'Payment Reminder', '<p>Canım, {payment_name}</p>\n                    <p>Umarım iyisindir. Bu, {payment_date} tarihinde gönderdiğimiz {invoice_number} toplam vade tutarı {payment_dueAmount} olan faturanın ödemesinin bugün sona ereceğini hatırlatma amaçlıdır.</p>\n                    <p>Faturada belirtilen banka hesabına ödeme yapabilirsiniz.</p>\n                    <p>Eminim meşgulsünüz ama fırsat bulduğunuzda bir dakikanızı ayırıp faturaya göz atarsanız sevinirim.</p>\n                    <p>Herhangi bir sorunuz varsa, lütfen yanıtlayın; bunları açıklığa kavuşturmaktan memnuniyet duyarım.</p>\n                    <p>&nbsp;</p>\n                    <p>Teşekkürler,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(94, 6, 'zh', 'Payment Reminder', '<p>亲爱的, {payment_name}</p>\n                    <p>希望您一切顺利。这只是一个提醒，我们于 { payment_date} 发送的发票 {invoice_number} 上的应付金额总计 { payment_dueAmount} 将于今天到期。</p>\n                    <p>您可以向发票上指定的银行帐户付款。</p>\n                    <p>我相信您很忙，但如果您有机会花点时间查看一下发票，我将不胜感激。</p>\n                    <p>如果您有任何疑问，请回复，我很乐意予以澄清。</p>\n                    <p>&nbsp;</p>\n                    <p>谢谢,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(95, 6, 'he', 'Payment Reminder', '<p>יָקָר, {payment_name}</p>\n                    <p>אני מקווה ששלומך טוב. זוהי רק תזכורת שהתשלום על החשבונית {invoice_number} total dueAmount {payment_dueAmount} , ששלחנו בתאריך {payment_date}, יבוא היום.</p>\n                    <p>ניתן לבצע תשלום לחשבון הבנק המצוין בחשבונית.</p>\n                    <p>אני בטוח שאתה עסוק, אבל אודה אם תוכל להקדיש רגע ולעיין בחשבונית כשתהיה לך הזדמנות.</p>\n                    <p>אם יש לך שאלות כלשהן, אנא השב ואשמח להבהיר אותן.</p>\n                    <p>&nbsp;</p>\n                    <p>תודה,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(96, 6, 'pt-br', 'Payment Reminder', '<p>Querido, {payment_name}</p>\n                    <p>Espero que você esteja bem. Este é apenas um lembrete de que o pagamento da fatura {invoice_number} total dueAmount {payment_dueAmount} , que enviamos em {payment_date} vence hoje.</p>\n                    <p>Você pode fazer o pagamento na conta bancária especificada na fatura.</p>\n                    <p>Tenho certeza de que você está ocupado, mas agradeceria se pudesse reservar um momento e dar uma olhada na fatura quando tiver uma chance.</p>\n                    <p>Se você tiver alguma dúvida, responda e terei prazer em esclarecê-la.</p>\n                    <p>&nbsp;</p>\n                    <p>Obrigado,&nbsp;</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(97, 7, 'ar', 'Proposal Sent', '<p>مرحبا ، { proposal_name }</p>\n                    <p>أتمنى أن يجدك هذا البريد الإلكتروني جيدا برجاء الرجوع الى رقم الاقتراح المرفق { proposal_number } للمنتج / الخدمة.</p>\n                    <p>اضغط ببساطة على الاختيار بأسفل</p>\n                    <p>{ proposal_url }</p>\n                    <p>إشعر بالحرية للوصول إلى الخارج إذا عندك أي أسئلة.</p>\n                    <p>شكرا لعملك ! !</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(98, 7, 'da', 'Proposal Sent', '<p>Hej, {proposal__name }</p>\n                    <p>H&aring;ber denne e-mail finder dig godt! Se det vedh&aelig;ftede forslag nummer { proposal_number } for product/service.</p>\n                    <p>klik bare p&aring; knappen nedenfor</p>\n                    <p>{ proposal_url }</p>\n                    <p>Du er velkommen til at r&aelig;kke ud, hvis du har nogen sp&oslash;rgsm&aring;l.</p>\n                    <p>Tak for din virksomhed!</p>\n                    <p>&nbsp;</p>\n                    <p>Med venlig hilsen</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(99, 7, 'de', 'Proposal Sent', '<p>Hi, {proposal_name}</p>\n                    <p>Hoffe, diese E-Mail findet dich gut! Bitte sehen Sie die angeh&auml;ngte Vorschlagsnummer {proposal_number} f&uuml;r Produkt/Service an.</p>\n                    <p>Klicken Sie einfach auf den Button unten</p>\n                    <p>{proposal_url}</p>\n                    <p>F&uuml;hlen Sie sich frei, wenn Sie Fragen haben.</p>\n                    <p>Vielen Dank f&uuml;r Ihr Unternehmen!!</p>\n                    <p>&nbsp;</p>\n                    <p>Betrachtet,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(100, 7, 'en', 'Proposal Sent', '<p>Hi, {proposal_name}</p>\n                    <p>Hope this email ﬁnds you well! Please see attached proposal number {proposal_number} for product/service.</p>\n                    <p>simply click on the button below</p>\n                    <p>{proposal_url}</p>\n                    <p>Feel free to reach out if you have any questions.</p>\n                    <p>Thank you for your business!!</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(101, 7, 'es', 'Proposal Sent', '<p>Hi, {proposal_name}</p>\n                    <p>&iexcl;Espero que este email le encuentre bien! Consulte el n&uacute;mero de propuesta adjunto {proposal_number} para el producto/servicio.</p>\n                    <p>simplemente haga clic en el bot&oacute;n de abajo</p>\n                    <p>{proposal_url}</p>\n                    <p>Si&eacute;ntase libre de llegar si usted tiene alguna pregunta.</p>\n                    <p>&iexcl;Gracias por su negocio!!</p>\n                    <p>&nbsp;</p>\n                    <p>Considerando,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(102, 7, 'fr', 'Proposal Sent', '<p>Salut, {proposal_name}</p>\n                    <p>Jesp&egrave;re que ce courriel vous trouve bien ! Veuillez consulter le num&eacute;ro de la proposition jointe {proposal_number} pour le produit/service.</p>\n                    <p>Il suffit de cliquer sur le bouton ci-dessous</p>\n                    <p>{proposal_url}</p>\n                    <p>Nh&eacute;sitez pas &agrave; nous contacter si vous avez des questions.</p>\n                    <p>Merci pour votre entreprise ! !</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(103, 7, 'it', 'Proposal Sent', '<p>Ciao, {proposal_name}</p>\n                    <p>Spero che questa email ti trovi bene! Si prega di consultare il numero di proposta allegato {proposal_number} per il prodotto/servizio.</p>\n                    <p>semplicemente clicca sul pulsante sottostante</p>\n                    <p>{proposal_url}</p>\n                    <p>Sentiti libero di raggiungere se hai domande.</p>\n                    <p>Grazie per il tuo business!!</p>\n                    <p>&nbsp;</p>\n                    <p>Riguardo,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(104, 7, 'ja', 'Proposal Sent', '<p>こんにちは、 {proposal_name}</p>\n                    <p>この E メールでよくご確認ください。 製品 / サービスの添付されたプロポーザル番号 {proposal_number} を参照してください。</p>\n                    <p>下のボタンをクリックするだけで</p>\n                    <p>{proposal_url}</p>\n                    <p>質問がある場合は、自由に連絡してください。</p>\n                    <p>お客様のビジネスに感謝します。</p>\n                    <p>&nbsp;</p>\n                    <p>よろしく</p>\n                    <p>{ company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(105, 7, 'nl', 'Proposal Sent', '<p>Hallo, {proposal_name}</p>\n                    <p>Hoop dat deze e-mail je goed vindt! Zie bijgevoegde nummer { proposal_number } voor product/service.</p>\n                    <p>gewoon klikken op de knop hieronder</p>\n                    <p>{ proposal_url }</p>\n                    <p>Voel je vrij om uit te reiken als je vragen hebt.</p>\n                    <p>Dank u voor uw bedrijf!!</p>\n                    <p>&nbsp;</p>\n                    <p>Betreft:</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(106, 7, 'pl', 'Proposal Sent', '<p>Witaj, {proposal_name}</p>\n                    <p>Mam nadzieję, że ta wiadomość znajdzie Cię dobrze! Proszę zapoznać się z załączonym numerem wniosku {proposal_number} dla produktu/usługi.</p>\n                    <p>po prostu kliknij na przycisk poniżej</p>\n                    <p>{proposal_url}</p>\n                    <p>Czuj się swobodnie, jeśli masz jakieś pytania.</p>\n                    <p>Dziękujemy za prowadzenie działalności!!</p>\n                    <p>&nbsp;</p>\n                    <p>W odniesieniu do</p>\n                    <p>{company_name }</p>\n                    <p>{app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(107, 7, 'ru', 'Proposal Sent', '<p>Здравствуйте, { proposal_name }</p>\n                    <p>Надеюсь, это электронное письмо найдет вас хорошо! См. вложенное предложение номер { proposal_number} для product/service.</p>\n                    <p>просто нажмите на кнопку внизу</p>\n                    <p>{ proposal_url}</p>\n                    <p>Не стеснитесь, если у вас есть вопросы.</p>\n                    <p>Спасибо за ваше дело!</p>\n                    <p>&nbsp;</p>\n                    <p>С уважением,</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43');
INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(108, 7, 'pt', 'Proposal Sent', '<p>Oi, {proposal_name}</p>\n                    <p>Espero que este e-mail encontre voc&ecirc; bem! Por favor, consulte o n&uacute;mero da proposta anexada {proposal_number} para produto/servi&ccedil;o.</p>\n                    <p>basta clicar no bot&atilde;o abaixo</p>\n                    <p>{proposal_url}</p>\n                    <p>Sinta-se &agrave; vontade para alcan&ccedil;ar fora se voc&ecirc; tiver alguma d&uacute;vida.</p>\n                    <p>Obrigado pelo seu neg&oacute;cio!!</p>\n                    <p>&nbsp;</p>\n                    <p>Considera,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(109, 7, 'tr', 'Proposal Sent', '<p>MERHABA, {proposal_name}</p>\n                    <p>Umarım bu e-posta sizi iyi bulur! Lütfen ürün/hizmet için ekteki {proposal_number} numaralı teklife bakın.</p>\n                    <p>aşağıdaki butona tıklamanız yeterli</p>\n                    <p>{proposal_url}</p>\n                    <p>Herhangi bir sorunuz varsa çekinmeden bize ulaşın.</p>\n                    <p>İşiniz için teşekkür ederim!!</p>\n                    <p>&nbsp;</p>\n                    <p>Saygılarımızla,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(110, 7, 'zh', 'Proposal Sent', '<p>你好, {proposal_name}</p>\n                    <p>希望这封电子邮件能让您满意！请参阅随附的产品/服务提案编号 {proposal_number}。</p>\n                    <p>只需点击下面的按钮</p>\n                    <p>{proposal_url}</p>\n                    <p>如果您有任何疑问，请随时与我们联系。</p>\n                    <p>感谢您的业务！！</p>\n                    <p>&nbsp;</p>\n                    <p>问候,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(111, 7, 'he', 'Proposal Sent', '<p>היי, {proposal_name}</p>\n                    <p>מקווה שהמייל הזה ימצא אותך טוב! ראה את מספר ההצעה המצורפת {proposal_number} עבור מוצר/שירות.</p>\n                    <p>פשוט לחץ על הכפתור למטה</p>\n                    <p>{proposal_url}</p>\n                    <p>אל תהסס לפנות אם יש לך שאלות.</p>\n                    <p>תודה לך על העסק שלך!!</p>\n                    <p>&nbsp;</p>\n                    <p>בברכה,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(112, 7, 'pt-br', 'Proposal Sent', '<p>Oi, {proposal_name}</p>\n                    <p>Espero que este e-mail o encontre bem! Consulte o número da proposta em anexo {proposal_number} para produto/serviço.</p>\n                    <p>Basta clicar no botão abaixo/p>\n                    <p>{proposal_url}</p>\n                    <p>Sinta-se à vontade para entrar em contato se tiver alguma dúvida.</p>\n                    <p>TAgradeço pelos seus serviços!!</p>\n                    <p>&nbsp;</p>\n                    <p>Cumprimentos,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(113, 8, 'ar', 'User Created', '<p>مرحبا ، مرحبا بك في { app_name }.</p>\n                    <p>البريد الالكتروني : { email }</p>\n                    <p>كلمة السرية : { password }</p>\n                    <p>{ app_url }</p>\n                    <p>شكرا</p>\n                    <p>{ app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(114, 8, 'da', 'User Created', '<p>Hej,</p>\n                    <p>velkommen til { app_name }.</p>\n                    <p>E-mail: { email }</p>\n                    <p>-kodeord: { password }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Tak.</p>\n                    <p>{ app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(115, 8, 'de', 'User Created', '<p>Hallo, Willkommen bei {app_name}.</p>\n                    <p>E-Mail: {email}</p>\n                    <p>Kennwort: {password}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>\n                    <p>Danke,</p>\n                    <p>{app_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(116, 8, 'en', 'User Created', '<p>Hello,&nbsp;<br />Welcome to {app_name}.</p>\n                    <p><strong>Email&nbsp;</strong>: {email}<br /><strong>Password</strong>&nbsp;: {password}</p>\n                    <p>{app_url}</p>\n                    <p>Thanks,<br />{app_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(117, 8, 'es', 'User Created', '<p>Hola, Bienvenido a {app_name}.</p>\n                    <p>Correo electr&oacute;nico: {email}</p>\n                    <p>Contrase&ntilde;a: {password}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>\n                    <p>Gracias,</p>\n                    <p>{app_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(118, 8, 'fr', 'User Created', '<p>Bonjour, Bienvenue dans { app_name }.</p>\n                    <p>E-mail: { email }</p>\n                    <p>Mot de passe: { password }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Merci,</p>\n                    <p>{ app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(119, 8, 'it', 'User Created', '<p>Ciao, Benvenuti in {app_name}.</p>\n                    <p>Email: {email}</p>\n                    <p>Password: {password}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>\n                    <p>Grazie,</p>\n                    <p>{app_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(120, 8, 'ja', 'User Created', '<p>こんにちは、 {app_name}へようこそ。</p>\n                    <p>E メール : {email}</p>\n                    <p>パスワード : {password}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>\n                    <p>ありがとう。</p>\n                    <p>{app_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(121, 8, 'nl', 'User Created', '<p>Hallo, Welkom bij { app_name }.</p>\n                    <p>E-mail: { email }</p>\n                    <p>Wachtwoord: { password }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Bedankt.</p>\n                    <p>{ app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(122, 8, 'pl', 'User Created', '<p>Witaj, Witamy w aplikacji {app_name }.</p>\n                    <p>E-mail: {email }</p>\n                    <p>Hasło: {password }</p>\n                    <p>{app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Dziękuję,</p>\n                    <p>{app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(123, 8, 'ru', 'User Created', '<p>Здравствуйте, Добро пожаловать в { app_name }.</p>\n                    <p>Адрес электронной почты: { email }</p>\n                    <p>Пароль: { password }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Спасибо.</p>\n                    <p>{app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(124, 8, 'pt', 'User Created', '<p>Ol&aacute;, Bem-vindo a {app_name}.</p>\n                    <p>E-mail: {email}</p>\n                    <p>Senha: {password}</p>\n                    <p>{app_url}</p>\n                    <p>&nbsp;</p>\n                    <p>Obrigado,</p>\n                    <p>{app_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(125, 8, 'tr', 'User Created', '<p>Merhaba,</p>\n                    <p>Hoşgeldiniz { app_name }.</p>\n                    <p>e-posta: { email }</p>\n                    <p>-şifre: { password }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Teşekkürler.</p>\n                    <p>{ app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(126, 8, 'zh', 'User Created', '<p>你好,</p>\n                    <p>欢迎来到 { app_name }.</p>\n                    <p>电子邮件: { email }</p>\n                    <p>-密码： { password }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>谢谢.</p>\n                    <p>{ app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(127, 8, 'he', 'User Created', '<p>שלום,</p>\n                    <p>ברוך הבא ל { app_name }.</p>\n                    <p>אימייל: { email }</p>\n                    <p>-סיסמה: { password }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>תודה.</p>\n                    <p>{ app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(128, 8, 'pt-br', 'User Created', '<p>Olá,</p>\n                    <p>bem-vindo ao { app_name }.</p>\n                    <p>E-mail: { email }</p>\n                    <p>-senha: { password }</p>\n                    <p>{ app_url }</p>\n                    <p>&nbsp;</p>\n                    <p>Obrigado.</p>\n                    <p>{ app_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(129, 9, 'ar', 'Vendor Bill Sent', '<p>مرحبا ، { bill_name }</p>\n                    <p>مرحبا بك في { app_name }</p>\n                    <p>أتمنى أن يجدك هذا البريد الإلكتروني جيدا ! ! برجاء الرجوع الى رقم الفاتورة الملحقة { bill_number } للحصول على المنتج / الخدمة.</p>\n                    <p>ببساطة اضغط على الاختيار بأسفل.</p>\n                    <p>{ bill_url }</p>\n                    <p>إشعر بالحرية للوصول إلى الخارج إذا عندك أي أسئلة.</p>\n                    <p>شكرا لك</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(130, 9, 'da', 'Vendor Bill Sent', '<p>Hej, { bill_name }</p>\n                    <p>Velkommen til { app_name }</p>\n                    <p>H&aring;ber denne e-mail finder dig godt! Se vedlagte fakturanummer } { bill_number } for product/service.</p>\n                    <p>Klik p&aring; knappen nedenfor.</p>\n                    <p>{ bill_url }</p>\n                    <p>Du er velkommen til at r&aelig;kke ud, hvis du har nogen sp&oslash;rgsm&aring;l.</p>\n                    <p>Tak.</p>\n                    <p>&nbsp;</p>\n                    <p>Med venlig hilsen</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(131, 9, 'de', 'Vendor Bill Sent', '<p>Hi, {bill_name}</p>\n                    <p>Willkommen bei {app_name}</p>\n                    <p>Hoffe, diese E-Mail findet dich gut!! Sehen Sie sich die beigef&uuml;gte Rechnungsnummer {bill_number} f&uuml;r Produkt/Service an.</p>\n                    <p>Klicken Sie einfach auf den Button unten.</p>\n                    <p>{bill_url}</p>\n                    <p>F&uuml;hlen Sie sich frei, wenn Sie Fragen haben.</p>\n                    <p>Vielen Dank,</p>\n                    <p>&nbsp;</p>\n                    <p>Betrachtet,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(132, 9, 'en', 'Vendor Bill Sent', '<p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hi, {bill_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Welcome to {app_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Hope this email finds you well!! Please see attached bill number {bill_number} for product/service.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Simply click on the button below.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{bill_url}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Feel free to reach out if you have any questions.</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Thank You,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">Regards,</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{company_name}</span></p>\n                    <p style=\"line-height: 28px; font-family: Nunito,;\"><span style=\"font-family: sans-serif;\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(133, 9, 'es', 'Vendor Bill Sent', '<p>Hi, {bill_name}</p>\n                    <p>Bienvenido a {app_name}</p>\n                    <p>&iexcl;Espero que este correo te encuentre bien!! Consulte el n&uacute;mero de factura adjunto {bill_number} para el producto/servicio.</p>\n                    <p>Simplemente haga clic en el bot&oacute;n de abajo.</p>\n                    <p>{bill_url}</p>\n                    <p>Si&eacute;ntase libre de llegar si usted tiene alguna pregunta.</p>\n                    <p>Gracias,</p>\n                    <p>&nbsp;</p>\n                    <p>Considerando,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(134, 9, 'fr', 'Vendor Bill Sent', '<p>Salut, { bill_name }</p>\n                    <p>Bienvenue dans { app_name }</p>\n                    <p>Jesp&egrave;re que ce courriel vous trouve bien ! ! Veuillez consulter le num&eacute;ro de facture { bill_number } associ&eacute; au produit / service.</p>\n                    <p>Cliquez simplement sur le bouton ci-dessous.</p>\n                    <p>{bill_url }</p>\n                    <p>Nh&eacute;sitez pas &agrave; nous contacter si vous avez des questions.</p>\n                    <p>Merci,</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(135, 9, 'it', 'Vendor Bill Sent', '<p>Ciao, {bill_name}</p>\n                    <p>Benvenuti in {app_name}</p>\n                    <p>Spero che questa email ti trovi bene!! Si prega di consultare il numero di fattura allegato {bill_number} per il prodotto/servizio.</p>\n                    <p>Semplicemente clicca sul pulsante sottostante.</p>\n                    <p>{bill_url}</p>\n                    <p>Sentiti libero di raggiungere se hai domande.</p>\n                    <p>Grazie,</p>\n                    <p>&nbsp;</p>\n                    <p>Riguardo,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(136, 9, 'ja', 'Vendor Bill Sent', '<p>こんにちは、 {bill_name}</p>\n                    <p>{app_name} へようこそ</p>\n                    <p>この E メールによりよく検出されます !! 製品 / サービスの添付された請求番号 {bill_number} を参照してください。</p>\n                    <p>以下のボタンをクリックしてください。</p>\n                    <p>{bill_url}</p>\n                    <p>質問がある場合は、自由に連絡してください。</p>\n                    <p>ありがとうございます</p>\n                    <p>&nbsp;</p>\n                    <p>よろしく</p>\n                    <p>{ company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(137, 9, 'nl', 'Vendor Bill Sent', '<p>Hallo, { bill_name }</p>\n                    <p>Welkom bij { app_name }</p>\n                    <p>Hoop dat deze e-mail je goed vindt!! Zie bijgevoegde factuurnummer { bill_number } voor product/service.</p>\n                    <p>Klik gewoon op de knop hieronder.</p>\n                    <p>{ bill_url }</p>\n                    <p>Voel je vrij om uit te reiken als je vragen hebt.</p>\n                    <p>Dank U,</p>\n                    <p>&nbsp;</p>\n                    <p>Betreft:</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(138, 9, 'pl', 'Vendor Bill Sent', '<p>Witaj, {bill_name }</p>\n                    <p>Witamy w aplikacji {app_name }</p>\n                    <p>Mam nadzieję, że ta wiadomość e-mail znajduje Cię dobrze!! Zapoznaj się z załączonym numerem rachunku {bill_number } dla produktu/usługi.</p>\n                    <p>Wystarczy kliknąć na przycisk poniżej.</p>\n                    <p>{bill_url}</p>\n                    <p>Czuj się swobodnie, jeśli masz jakieś pytania.</p>\n                    <p>Dziękuję,</p>\n                    <p>&nbsp;</p>\n                    <p>W odniesieniu do</p>\n                    <p>{company_name }</p>\n                    <p>{app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(139, 9, 'ru', 'Vendor Bill Sent', '<p>Привет, { bill_name }</p>\n                    <p>Вас приветствует { app_name }</p>\n                    <p>Надеюсь, это письмо найдет вас хорошо! См. прилагаемый номер счета { bill_number } для product/service.</p>\n                    <p>Просто нажмите на кнопку внизу.</p>\n                    <p>{ bill_url }</p>\n                    <p>Не стеснитесь, если у вас есть вопросы.</p>\n                    <p>Спасибо.</p>\n                    <p>&nbsp;</p>\n                    <p>С уважением,</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(140, 9, 'pt', 'Vendor Bill Sent', '<p>Oi, {bill_name}</p>\n                    <p>Bem-vindo a {app_name}</p>\n                    <p>Espero que este e-mail encontre voc&ecirc; bem!! Por favor, consulte o n&uacute;mero de faturamento conectado {bill_number} para produto/servi&ccedil;o.</p>\n                    <p>Basta clicar no bot&atilde;o abaixo.</p>\n                    <p>{bill_url}</p>\n                    <p>Sinta-se &agrave; vontade para alcan&ccedil;ar fora se voc&ecirc; tiver alguma d&uacute;vida.</p>\n                    <p>Obrigado,</p>\n                    <p>&nbsp;</p>\n                    <p>Considera,</p>\n                    <p>{company_name}</p>\n                    <p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(141, 9, 'tr', 'Vendor Bill Sent', '<p>Merhaba, { bill_name }</p>\n                    <p>Hoşgeldiniz { app_name }</p>\n                    <p>Umarım bu e-posta sizi iyi bulur! Ürün/hizmet için ekteki fatura numarasına bakın } { fatura_numarası }.</p>\n                    <p>Aşağıdaki düğmeyi tıklayın.</p>\n                    <p>{ bill_url }</p>\n                    <p>Herhangi bir sorunuz varsa çekinmeden bize ulaşın.</p>\n                    <p>Teşekkürler.</p>\n                    <p>&nbsp;</p>\n                    <p>Saygılarımızla</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(142, 9, 'zh', 'Vendor Bill Sent', '<p>你好, { bill_name }</p>\n                    <p>欢迎来到 { app_name }</p>\n                    <p>希望这封电子邮件能让您满意！请参阅随附的产品/服务发票编号 } { bill_number }。</p>\n                    <p>单击下面的按钮。</p>\n                    <p>{ bill_url }</p>\n                    <p>Du er velkommen til at r&aelig;kke ud, hvis du har nogen sp&oslash;rgsm&aring;l.</p>\n                    <p>谢谢.</p>\n                    <p>&nbsp;</p>\n                    <p>最诚挚的问候 </p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(143, 9, 'he', 'Vendor Bill Sent', '<p>שלום, { bill_name }</p>\n                    <p>ברוך הבא ל { app_name }</p>\n                    <p>מקווה שהמייל הזה ימצא אותך טוב! ראה את מספר החשבונית המצורפת } { bill_number } למוצר/שירות.</p>\n                    <p>לחץ על הכפתור למטה.</p>\n                    <p>{ bill_url }</p>\n                    <p>אל תהסס לפנות אם יש לך שאלות.</p>\n                    <p>תודה.</p>\n                    <p>&nbsp;</p>\n                    <p>איחוליי הלבביים</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(144, 9, 'pt-br', 'Vendor Bill Sent', '<p>Olá, { bill_name }</p>\n                    <p>Bem-vindo ao { app_name }</p>\n                    <p>Espero que este e-mail o encontre bem! Veja o número da fatura em anexo } { bill_number } para produto/serviço.</p>\n                    <p>Clique no botão abaixo.</p>\n                    <p>{ bill_url }</p>\n                    <p>Sinta-se à vontade para entrar em contato se tiver alguma dúvida.</p>\n                    <p>Obrigado.</p>\n                    <p>&nbsp;</p>\n                    <p>Com os melhores votos</p>\n                    <p>{ company_name }</p>\n                    <p>{ app_url }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(145, 10, 'ar', 'New Contract', '<p>مرحبا { contract_customer }</p>\n                    <p>موضوع العقد : { contract_subject }</p>\n                    <p>نوع العقد : { contract_type }</p>\n                    <p>قيمة العقد : { contract_value }</p>\n                    <p>تاريخ البدء : { contract_start_date }</p>\n                    <p>تاريخ الانتهاء : { contract_end_date }</p>\n                    <p>. أتطلع لسماع منك</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(146, 10, 'da', 'New Contract', '<p>Hej { contract_customer }</p>\n                    <p>Kontraktemne: { contract_subject }</p>\n                    <p>Kontrakttype: { contract_type }</p>\n                    <p>Kontraktv&aelig;rdi: { contract_value }</p>\n                    <p>Startdato: { contract_start_date }</p>\n                    <p>Slutdato: { contract_end_date }</p>\n                    <p>Jeg gl&aelig;der mig til at h&oslash;re fra dig.</p>\n                    <p>&nbsp;</p>\n                    <p>Med venlig hilsen</p>\n                    <p>{ company_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(147, 10, 'de', 'New Contract', '<p>Hi {contract_customer}</p>\n                    <p>Vertragsgegenstand: {contract_subject}</p>\n                    <p>Vertragstyp: {contract_type}</p>\n                    <p>Vertragswert: {contract_value}</p>\n                    <p>Startdatum: {contract_start_date}</p>\n                    <p>Enddatum: {contract_end_date}</p>\n                    <p>Freuen Sie sich auf das H&ouml;ren von Ihnen.</p>\n                    <p>&nbsp;</p>\n                    <p>Betrachtet,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(148, 10, 'es', 'New Contract', '<p>Hi {contract_customer}</p>\n                    <p>Asunto del contrato: {contract_subject}</p>\n                    <p>Tipo de contrato: {contract_type}</p>\n                    <p>Valor de contrato: {contract_value}</p>\n                    <p>Fecha de inicio: {contract_start_date}</p>\n                    <p>Fecha de finalizaci&oacute;n: {contract_end_date}</p>\n                    <p>Con ganas de escuchar de ti.</p>\n                    <p>&nbsp;</p>\n                    <p>Considerando,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(149, 10, 'en', 'New Contract', '<p>Hi {contract_customer}</p>\n                    <p>Contract Subject: {contract_subject}</p>\n                    <p>Contract Type: {contract_type}</p>\n                    <p>Contract Value: {contract_value}</p>\n                    <p>Start Date: {contract_start_date}</p>\n                    <p>End Date: {contract_end_date}</p>\n                    <p>Looking forward to hear from you.</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(150, 10, 'fr', 'New Contract', '<p>Bonjour { contract_customer }</p>\n                    <p>Objet du contrat: { contract_subject }</p>\n                    <p>Type de contrat: { contract_type }</p>\n                    <p>Valeur du contrat: { contract_value }</p>\n                    <p>Date de d&eacute;but: { contract_start_date }</p>\n                    <p>Date de fin: { contract_end_date }</p>\n                    <p>Vous avez h&acirc;te de vous entendre.</p>\n                    <p>&nbsp;</p>\n                    <p>Regards,</p>\n                    <p>{ company_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(151, 10, 'it', 'New Contract', '<p>Ciao {contract_customer}</p>\n                    <p>Oggetto contratto: {contract_subject}</p>\n                    <p>Tipo di contratto: {contract_type}</p>\n                    <p>Valore contratto: {contract_value}</p>\n                    <p>Data inizio: {contract_start_date}</p>\n                    <p>Data di fine: {contract_end_date}</p>\n                    <p>Non vedo lora di sentirti.</p>\n                    <p>&nbsp;</p>\n                    <p>Riguardo,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(152, 10, 'ja', 'New Contract', '<p>こんにちは {contract_customer }</p>\n                    <p>契約件名: {contract_subject}</p>\n                    <p>契約タイプ: {contract_type}</p>\n                    <p>契約値: {contract_value}</p>\n                    <p>開始日: {contract_start_date}</p>\n                    <p>終了日: {contract_end_date}</p>\n                    <p>あなたからの便りを楽しみにしています</p>\n                    <p>&nbsp;</p>\n                    <p>&nbsp;</p>\n                    <p>よろしく</p>\n                    <p>{ company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(153, 10, 'nl', 'New Contract', '<p>Hallo { contract_customer }</p>\n                    <p>Contractonderwerp: { contract_subject }</p>\n                    <p>Contracttype: { contract_type }</p>\n                    <p>Contractwaarde: { contract_value }</p>\n                    <p>Begindatum: { contract_start_date }</p>\n                    <p>Einddatum: { contract_end_date }</p>\n                    <p>Ik kijk ernaar uit om van je te horen.</p>\n                    <p>&nbsp;</p>\n                    <p>Betreft:</p>\n                    <p>{ company_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(154, 10, 'pl', 'New Contract', '<p>Witaj {contract_customer }</p>\n                    <p>Temat kontraktu: {contract_subject }</p>\n                    <p>Typ kontraktu: {contract_type }</p>\n                    <p>Wartość kontraktu: {contract_value }</p>\n                    <p>Data rozpoczęcia: {contract_start_date }</p>\n                    <p>Data zakończenia: {contract_end_date }</p>\n                    <p>Nie mogę się doczekać, by usłyszeć od ciebie.</p>\n                    <p>&nbsp;</p>\n                    <p>&nbsp;</p>\n                    <p>W odniesieniu do</p>\n                    <p>{company_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(155, 10, 'pt', 'New Contract', '<p>Oi {contract_customer}</p>\n                    <p>Assunto do Contrato: {contract_subject}</p>\n                    <p>Tipo de Contrato: {contract_type}</p>\n                    <p>Valor do Contrato: {contract_value}</p>\n                    <p>Data de In&iacute;cio: {contract_start_date}</p>\n                    <p>Data de encerramento: {contract_end_date}</p>\n                    <p>Olhando para a frente para ouvir de voc&ecirc;.</p>\n                    <p>&nbsp;</p>\n                    <p>Considera,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(156, 10, 'ru', 'New Contract', '<p>Здравствуйте { contract_customer }</p>\n                    <p>Тема договора: { contract_subject }</p>\n                    <p>Тип контракта: { contract_type }</p>\n                    <p>Значение контракта: { contract_value }</p>\n                    <p>Дата начала: { contract_start_date }</p>\n                    <p>Дата окончания: { contract_end_date }</p>\n                    <p>С нетерпением жду услышать от тебя.</p>\n                    <p>&nbsp;</p>\n                    <p>С уважением,</p>\n                    <p>{ company_name }</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(157, 10, 'tr', 'New Contract', '<p>MERHABA {contract_customer}</p>\n                    <p>Sözleşme Konusu: {contract_subject}</p>\n                    <p>sözleşme tipi: {contract_type}</p>\n                    <p>Sözleşme Değeri: {contract_value}</p>\n                    <p>Başlangıç ​​tarihi: {contract_start_date}</p>\n                    <p>Bitiş tarihi: {contract_end_date}</p>\n                    <p>Sizden haber bekliyorum.</p>\n                    <p>&nbsp;</p>\n                    <p>Saygılarımızla,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(158, 10, 'zh', 'New Contract', '<p>你好 {contract_customer}</p>\n                    <p>合同主体: {contract_subject}</p>\n                    <p>合同类型: {contract_type}</p>\n                    <p>合约价值: {contract_value}</p>\n                    <p>开始日期: {contract_start_date}</p>\n                    <p>结束日期: {contract_end_date}</p>\n                    <p>期待着听到您的意见。</p>\n                    <p>&nbsp;</p>\n                    <p>问候,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(159, 10, 'he', 'New Contract', '<p>היי {contract_customer}</p>\n                    <p>נושא החוזה: {contract_subject}</p>\n                    <p>סוג חוזה: {contract_type}</p>\n                    <p>ערך חוזה: {contract_value}</p>\n                    <p>תאריך התחלה: {contract_start_date}</p>\n                    <p>תאריך סיום: {contract_end_date}</p>\n                    <p>מצפה לשמוע ממך.</p>\n                    <p>&nbsp;</p>\n                    <p>בברכה,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(160, 10, 'pt-br', 'New Contract', '<p>Oi {contract_customer}</p>\n                    <p>Assunto do Contrato: {contract_subject}</p>\n                    <p>Tipo de Contrato: {contract_type}</p>\n                    <p>Valor do Contrato: {contract_value}</p>\n                    <p>Data de início: {contract_start_date}</p>\n                    <p>Dados finais: {contract_end_date}</p>\n                    <p>Ansioso para ouvir de você.</p>\n                    <p>&nbsp;</p>\n                    <p>Cumprimentos,</p>\n                    <p>{company_name}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(161, 11, 'ar', 'Retainer Sent', '<p>مرحبًا ، {retainer_name}</p><p>آمل أن يكون هذا البريد الإلكتروني جيدًا! يرجى الاطلاع على رقم التجنيب المرفق {retainer_number} للمنتج/الخدمة.</p><p>ببساطة انقر على الزر أدناه</p><p>{retainer_url}</p><p>لا تتردد في التواصل إذا كان لديك أي أسئلة.</p><p>شكرا لك على عملك!!</p><p>&nbsp;</p><p>يعتبر،</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(162, 11, 'da', 'Retainer Sent', '<p>Hej, {retainer_name}</p><p>H&aring;ber denne e -mail finder dig godt! Se vedh&aelig;ftet indehavernummer {retainer_number} for produkt/service.</p><p>Klik blot p&aring; knappen nedenfor</p><p>{retainer_url}</p><p>Du er velkommen til at n&aring; ud, hvis du har sp&oslash;rgsm&aring;l.</p><p>Tak for din forretning!!</p><p>&nbsp;</p><p>Hilsen,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(163, 11, 'de', 'Retainer Sent', '<p>Hi, {retainer_name}</p><p>Ich hoffe, diese E -Mail findet Sie gut! Bitte beachten Sie die beigef&uuml;gte Retainer -Nummer {retainer_number} f&uuml;r Produkt/Dienstleistung.</p><p>Klicken Sie einfach auf die Schaltfl&auml;che unten</p><p>{retainer_url}</p><p>F&uuml;hlen Sie sich frei zu erreichen, wenn Sie Fragen haben.</p><p>Danke f&uuml;r dein Gesch&auml;ft !!</p><p>&nbsp;</p><p>Gr&uuml;&szlig;e,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(164, 11, 'es', 'Retainer Sent', '<p>Hola, {retainer_name}</p><p>&iexcl;Espero que este correo electr&oacute;nico te encuentre bien! Consulte el n&uacute;mero de retenci&oacute;n adjunto {retainer_number} para producto/servicio.</p><p>Simplemente haga clic en el bot&oacute;n de abajo</p><p>{retainer_url}</p><p>No dude en comunicarse si tiene alguna pregunta.</p><p>&iexcl;&iexcl;Gracias por hacer negocios!!</p><p>&nbsp;</p><p>Saludos,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(165, 11, 'en', 'Retainer Sent', '<p>Hi, {retainer_name}</p><p>Hope this email ﬁnds you well! Please see attached retainer number {retainer_number} for product/service.</p><p>simply click on the button below</p><p>{retainer_url}</p><p>Feel free to reach out if you have any questions.</p><p>Thank you for your business!!</p><p>&nbsp;</p><p>Regards,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(166, 11, 'fr', 'Retainer Sent', '<p>Salut, {retainer_name}</p><p>J\'esp&egrave;re que cet e-mail vous trouve bien! Veuillez consulter le num&eacute;ro de dispositif ci-joint {retainer_number} pour le produit / service.</p><p>Cliquez simplement sur le bouton ci-dessous</p><p>{retainer_url}</p><p>N\'h&eacute;sitez pas &agrave; tendre la main si vous avez des questions.</p><p>Merci pour votre entreprise !!</p><p>&nbsp;</p><p>Salutations,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(167, 11, 'it', 'Retainer Sent', '<p>Ciao, {retainer_name}</p><p>Spero che questa e -mail ti faccia bene! Si prega di consultare il numero di fermo allegato {retainer_number} per prodotto/servizio.</p><p>Basta fare clic sul pulsante in basso</p><p>{retainer_url}</p><p>Sentiti libero di contattare se hai domande.</p><p>Grazie per il tuo business!!</p><p>&nbsp;</p><p>Saluti,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(168, 11, 'ja', 'Retainer Sent', '<p>こんにちは、{retainer_name}</p><p>この電子メールがあなたをうまく見つけることを願っています！製品/サービスについては、添付のリテーナー番号{retainer_number}を参照してください。</p><p>下のボタンをクリックするだけです</p><p>{retainer_url}</p><p>ご質問がある場合は、お気軽にご連絡ください。</p><p>お買い上げくださってありがとうございます！！</p><p>&nbsp;</p><p>よろしく、</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(169, 11, 'nl', 'Retainer Sent', '<p>Hallo, {retainer_Name}</p><p>Ik hoop dat deze e -mail je goed vindt! Zie bijgevoegd bewaarnummer {retainer_number} voor product/service.</p><p>Klik eenvoudig op de onderstaande knop</p><p>{retainer_url}</p><p>Voel je vrij om contact op te nemen als je vragen hebt.</p><p>Bedankt voor uw zaken!!</p><p>&nbsp;</p><p>Groeten,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(170, 11, 'pl', 'Retainer Sent', '<p>Cześć, {retainer_name}</p><p>Mam nadzieję, że ten e -mail dobrze Cię znajdzie! Aby uzyskać produkt/usługę/usługi.</p><p>Po prostu kliknij przycisk poniżej</p><p>{retainer_url}</p><p>Możesz się skontaktować, jeśli masz jakieś pytania.</p><p>Dziękuję za Tw&oacute;j biznes !!</p><p>&nbsp;</p><p>Pozdrowienia,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(171, 11, 'pt', 'Retainer Sent', '<p>Oi, {retainer_name}</p><p>Espero que este e -mail o encontre bem! Consulte o n&uacute;mero do retentor anexado {retainer_number} para obter o produto/servi&ccedil;o.</p><p>Basta clicar no bot&atilde;o abaixo</p><p>{retainer_url}</p><p>Sinta -se &agrave; vontade para alcan&ccedil;ar se tiver alguma d&uacute;vida.</p><p>Agrade&ccedil;o pelos seus servi&ccedil;os!!</p><p>&nbsp;</p><p>Cumprimentos,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(172, 11, 'ru', 'Retainer Sent', '<p>Привет, {retainer_name}</p><p>Надеюсь, что это электронное письмо вам хорошо найдет! Пожалуйста, см. Прикрепленный номер фиксатора {retainer_number} для продукта/услуги.</p><p>Просто нажмите на кнопку ниже</p><p>{retainer_url}</p><p>Не стесняйтесь обращаться, если у вас есть какие -либо вопросы.</p><p>Спасибо за ваш бизнес !!</p><p>&nbsp;</p><p>С уважением,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(173, 11, 'tr', 'Retainer Sent', '<p>Merhaba {retainer_name}</p><p>Umarım bu e-posta sizi bulur! Lütfen ürün/hizmet için ekteki hizmetli numarasına {retainer_number} bakın.</p><p>aşağıdaki düğmeyi tıklamanız yeterlidir</p><p>{retainer_url}</p><p>İsterseniz bize ulaşmaktan çekinmeyin herhangi bir sorunuz var.</p><p>İşletmeniz için teşekkür ederiz!</p><p> </p><p>Saygılarımızla,</p><p>{company_name}</p><p >{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(174, 11, 'zh', 'Retainer Sent', '<p>您好，{retainer_name}</p><p>希望这封电子邮件能让您满意！请参阅随附的产品/服务保留号 {retainer_number}。</p><p>只需点击下面的按钮</p><p>{retainer_url}</p><p>如果您有任何疑问。</p><p>感谢您的惠顾！！</p><p> </p><p>此致，</p><p>{company_name}</p><p >{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(175, 11, 'he', 'Retainer Sent', '<p>היי, {retainer_name}</p><p>מקווה שדוא\"ל זה ימצא אותך היטב! ראה את מספר השומר המצורף {retainer_number} עבור מוצר/שירות.</p><p>פשוט לחץ על הלחצן למטה</p><p>{retainer_url}</p><p>אל תהסס לפנות אם אתה יש לך שאלות.</p><p>תודה על העסק שלך!</p><p> </p><p>בברכה,</p><p>{company_name}</p><p >{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(176, 11, 'pt-br', 'Retainer Sent', '<p>Olá, {retainer_name}</p><p>Espero que este e-mail o encontre bem! Consulte o número do retentor {retainer_number} em anexo para obter o produto/serviço.</p><p>basta clicar no botão abaixo</p><p>{retainer_url}</p><p>Sinta-se à vontade para entrar em contato se precisar tiver alguma dúvida.</p><p>Obrigado por sua visita!!</p><p> </p><p>Atenciosamente,</p><p>{company_name}</p><p >{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(177, 12, 'ar', 'Customer Retainer Sent', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">مرحبًا ، {retainer_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">مرحبا بكم في {app_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">أتمنى حين تصلك رسالتي أن تكون بخير! يرجى الاطلاع على رقم التجنيب المرفق {retainer_number} للمنتج/الخدمة.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">ببساطة انقر على الزر أدناه.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{retainer_url}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">لا تتردد في التواصل إذا كان لديك أي أسئلة.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">شكرا لك،</span></span></p><p>&nbsp;</p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">يعتبر،</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{company_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(178, 12, 'da', 'Customer Retainer Sent', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Hej, {retainer_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Velkommen til {app_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">H&aring;ber denne e -mail finder dig godt! Se vedh&aelig;ftet indehavernummer {retainer_number} for produkt/service.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Klik blot p&aring; knappen nedenfor.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{retainer_url}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Du er velkommen til at n&aring; ud, hvis du har sp&oslash;rgsm&aring;l.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Tak skal du have,</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">&nbsp;</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Hilsen,</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{company_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(179, 12, 'de', 'Customer Retainer Sent', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Hi, {retainer_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Willkommen bei {app_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Ich hoffe diese email kommt bei dir an! Bitte beachten Sie die beigef&uuml;gte Retainer -Nummer {retainer_number} f&uuml;r Produkt/Dienstleistung.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Klicken Sie einfach auf die Schaltfl&auml;che unten.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{retainer_url}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">F&uuml;hlen Sie sich frei zu erreichen, wenn Sie Fragen haben.</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Danke,</span></span></p><p>&nbsp;</p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Gr&uuml;&szlig;e,</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{company_name}</span></span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(180, 12, 'es', 'Customer Retainer Sent', '<p>Hola, {retainer_name}</p><p>Bienvenido a {app_name}</p><p>&iexcl;Espero que este mensaje te encuentre bien! Consulte el n&uacute;mero de retenci&oacute;n adjunto {retainer_number} para producto/servicio.</p><p>Simplemente haga clic en el bot&oacute;n de abajo.</p><p>{retainer_url}</p><p>No dude en comunicarse si tiene alguna pregunta.</p><p>Gracias,</p><p>&nbsp;</p><p>Saludos,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(181, 12, 'en', 'Customer Retainer Sent', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Hi, {retainer_name}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Welcome to {app_name}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Hope this email finds you well! Please see attached retainer number {retainer_number} for product/service.</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Simply click on the button below.</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">{retainer_url}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Feel free to reach out if you have any questions.</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Thank You,</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Regards,</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">{company_name}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(182, 12, 'fr', 'Customer Retainer Sent', '<p>Hola, {retainer_name}</p><p>Bienvenido a {app_name}</p><p>&iexcl;Espero que este mensaje te encuentre bien! Consulte el n&uacute;mero de retenci&oacute;n adjunto {retainer_number} para producto/servicio.</p><p>Simplemente haga clic en el bot&oacute;n de abajo.</p><p>{retainer_url}</p><p>No dude en comunicarse si tiene alguna pregunta.</p><p>Gracias,</p><p>&nbsp;</p><p>Saludos,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(183, 12, 'it', 'Customer Retainer Sent', '<p>Ciao, {retainer_name}</p><p>Benvenuti in {app_name}</p><p>Spero che questa email ti trovi bene! Si prega di consultare il numero di fermo allegato {retainer_number} per prodotto/servizio.</p><p>Basta fare clic sul pulsante in basso.</p><p>{retainer_url}</p><p>Sentiti libero di contattare se hai domande.</p><p>Grazie,</p><p>&nbsp;</p><p>Saluti,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(184, 12, 'ja', 'Customer Retainer Sent', '<p>こんにちは、{retainer_name}</p><p>{app_name}へようこそ</p><p>このメールは、あなたがよく見つけた願っています！製品/サービスについては、添付のリテーナー番号{retainer_number}を参照してください。</p><p>下のボタンをクリックするだけです。</p><p>{retainer_url}</p><p>ご質問がある場合は、お気軽にご連絡ください。</p><p>ありがとうございました、</p><p>&nbsp;</p><p>よろしく、</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43');
INSERT INTO `email_template_langs` (`id`, `parent_id`, `lang`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(185, 12, 'nl', 'Customer Retainer Sent', '<p>Hallo, {retainer_name}</p><p>Welkom bij {app_name}</p><p>Ik hoop dat deze e-mail je goed vindt! Zie bijgevoegde houdernummer {retainer_number} voor product/service.</p><p>Klik eenvoudig op de onderstaande knop.</p><p>{retainer_url}</p><p>Neem gerust contact op als je vragen hebt.</p><p>Bedankt,</p><p>&nbsp;</p><p>Groeten,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(186, 12, 'pl', 'Customer Retainer Sent', '<p>Cześć, {retainer_name}</p><p>Witamy w {app_name}</p><p>Mam nadzieję, że ten e-mail Cię dobrze odnajdzie! Zobacz załączony numer ustalający {retainer_number} dla produktu/usługi.</p><p>Po prostu kliknij poniższy przycisk.</p><p>{retainer_url}</p><p>Jeśli masz jakiekolwiek pytania, skontaktuj się z nami.</p><p>Dziękuję,</p><p>&nbsp;</p><p>Pozdrowienia,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(187, 12, 'pt', 'Customer Retainer Sent', '<p>Ol&aacute;, {retainer_name}</p><p>Bem-vindo ao {app_name}</p><p>Espero que este e-mail o encontre bem! Consulte o n&uacute;mero de reten&ccedil;&atilde;o em anexo {retainer_number} para o produto/servi&ccedil;o.</p><p>Basta clicar no bot&atilde;o abaixo.</p><p>{retainer_url}</p><p>Sinta-se &agrave; vontade para entrar em contato se tiver alguma d&uacute;vida.</p><p>Obrigada,</p><p>&nbsp;</p><p>Cumprimentos,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(188, 12, 'ru', 'Customer Retainer Sent', '<p>Привет, {retainer_name}</p><p>Добро пожаловать в {app_name}</p><p>Надеюсь, это письмо найдет вас хорошо! Пожалуйста, смотрите прилагаемый номер клиента {retainer_number} для продукта/услуги.</p><p>Просто нажмите на кнопку ниже.</p><p>{retainer_url}</p><p>Не стесняйтесь обращаться, если у вас есть какие-либо вопросы.</p><p>Благодарю вас,</p><p>&nbsp;</p><p>С уважением,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(189, 12, 'tr', 'Customer Retainer Sent', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-bitişik harfler: ortak bitişik harfler; arka plan- color: #f8f8f8;\\\">Merhaba, {retainer_name}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans -serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">{app_name}</span></p><p><span style=\'a hoş geldiniz \"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-varyant-bitişik harfler: ortak bitişik harfler; arka plan rengi: #f8f8f8;\\\"> Umarım bu e-posta sizi iyi bulur! Lütfen ürün/hizmet için ekteki tutucu numarasına {retainer_number} bakın.</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans -serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Aşağıdaki düğmeyi tıklamanız yeterlidir.</span></p><p><span style =\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-varyant-bitişik harfler: ortak bitişik harfler; arka plan rengi: #f8f8f8;\\ \">{retainer_url}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px ; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Sorularınız varsa bize ulaşmaktan çekinmeyin.</span></p><p><span style=\\\"color : #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Teşekkürler ,</span></p><p><span style=\\\"color: #1d1c1d; yazı tipi ailesi: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; yazı tipi boyutu: 15 piksel; font-varyant-bitişik harfler: ortak bitişik harfler; background-color: #f8f8f8;\\\">Saygılarımızla,</span></p><p><span style=\\\"color: #1d1c1d; yazı tipi ailesi: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; yazı tipi boyutu: 15 piksel; font-varyant-bitişik harfler: ortak bitişik harfler; background-color: #f8f8f8;\\\">{şirket_adı}</span></p><p><span style=\\\"color: #1d1c1d; yazı tipi ailesi: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; yazı tipi boyutu: 15 piksel; font-varyant-bitişik harfler: ortak bitişik harfler; arka plan rengi: #f8f8f8;\\\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(190, 12, 'zh', 'Customer Retainer Sent', '<p><span style=\\\"颜色：#1d1c1d；字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif；字体大小：15px；字体变体连字：通用连字；背景-颜色：#f8f8f8;\\\">嗨，{retainer_name}</span></p><p><span style=\\\"颜色：#1d1c1d；字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans -serif; 字体大小: 15px; 字体变体连字: common-ligatures; 背景颜色: #f8f8f8;\\\">欢迎来到 {app_name}</span></p><p><span style=\\ “颜色：#1d1c1d；字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif；字体大小：15px；字体变体连字：通用连字；背景颜色：#f8f8f8；\\\">希望这封电子邮件能让您满意！请参阅随附的产品/服务保留号 {retainer_number}。</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato、Slack-Fractions、appleLogo、sans -serif; font-size: 15px; font-variant-ligatures: common-ligatures;background-color: #f8f8f8;\\\">只需点击下面的按钮即可。</span></p><p><span style =\\“颜色：#1d1c1d；字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif；字体大小：15px；字体变体连字：通用连字；背景颜色：#f8f8f8；\\ \">{retainer_url}</span></p><p><span style=\\\"color: #1d1c1d; 字体系列: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; 字体大小: 15px ; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">如果您有任何疑问，请随时与我们联系。</span></p><p><span style=\\\"color ：#1d1c1d；字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif；字体大小：15px；字体变体连字：通用连字；背景颜色：#f8f8f8；\\\">谢谢,</span></p><p><span style=\\\"颜色:#1d1c1d;字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif；字体大小：15px；字体变体连字：常见连字；背景颜色：#f8f8f8;\\\">问候，</span></p><p><span style=\\\"颜色：#1d1c1d;字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif；字体大小：15px；字体变体连字：常见连字；背景颜色：#f8f8f8;\\\">{公司名称}</span></p><p><span style=\\\"颜色：#1d1c1d;字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif；字体大小：15px；字体变体连字：常见连字；背景颜色：#f8f8f8;\\\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(191, 12, 'he', 'Customer Retainer Sent', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background- color: #f8f8f8;\\\">היי, {retainer_name}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans -serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">ברוכים הבאים ל-{app_name}</span></p><p><span style=\\ \"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\"> מקווה שהמייל הזה ימצא אותך טוב! אנא עיין במספר המצורף {retainer_number} למוצר/שירות.</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans -serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">פשוט לחץ על הכפתור למטה.</span></p><p><span style =\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\ \">{retainer_url}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px ; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">אל תהסס לפנות אם יש לך שאלות.</span></p><p><span style=\\\"color : #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">תודה לך ,</span></p><p><span style=\\\"color: #1d1c1d; משפחת גופנים: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; גודל גופן: 15px; גופן-variant-ligatures: ליגטורות נפוצות; background-color: #f8f8f8;\\\">בברכה,</span></p><p><span style=\\\"color: #1d1c1d; משפחת גופנים: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; גודל גופן: 15px; גופן-variant-ligatures: ליגטורות נפוצות; background-color: #f8f8f8;\\\">{company_name}</span></p><p><span style=\\\"color: #1d1c1d; משפחת גופנים: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; גודל גופן: 15px; גופן-variant-ligatures: ליגטורות נפוצות; רקע-צבע: #f8f8f8;\\\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(192, 12, 'pt-br', 'Customer Retainer Sent', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; tamanho da fonte: 15px; font-variant-ligatures: common-ligatures; background- color: #f8f8f8;\\\">Olá, {retainer_name}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans -serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Bem-vindo ao {app_name}</span></p><p><span style=\\ \"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\"> Espero que este e-mail o encontre bem! Consulte o número do retentor anexado {retainer_number} para produto/serviço.</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans -serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Basta clicar no botão abaixo.</span></p><p><span style =\\\"cor: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\ \">{retainer_url}</span></p><p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; tamanho da fonte: 15px ; font-variant-ligatures: common-ligatures; background-color: #f8f8f8;\\\">Sinta-se à vontade para entrar em contato se tiver alguma dúvida.</span></p><p><span style=\\\"color : #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; tamanho da fonte: 15px; font-variant-ligatures: common-ligatures; cor de fundo: #f8f8f8;\\\">Obrigado ,</span></p><p><span style=\\\"cor: #1d1c1d; família de fontes: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; tamanho da fonte: 15px; ligaduras-variantes de fonte: ligaduras-comuns; background-color: #f8f8f8;\\\">Atenciosamente,</span></p><p><span style=\\\"color: #1d1c1d; família de fontes: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; tamanho da fonte: 15px; ligaduras-variantes de fonte: ligaduras-comuns; background-color: #f8f8f8;\\\">{company_name}</span></p><p><span style=\\\"color: #1d1c1d; família de fontes: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; tamanho da fonte: 15px; ligaduras-variantes de fonte: ligaduras-comuns; background-color: #f8f8f8;\\\">{app_url}</span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(193, 13, 'ar', 'New Retainer Payment', '<p>أهلاً،</p><p>مرحبًا بك في {app_name}</p><p>عزيزي {payment_name}</p><p>لقد استلمنا المبلغ {payment_amount} الخاص بك مقابل {retainer_number} تم إرساله بتاريخ {payment_date}</p><p>المبلغ المستحق {retainer_number} هو {payment_dueAmount}</p><p>نحن نقدر دفعك الفوري ونتطلع إلى استمرار العمل معك في المستقبل.</p><p>شكرا جزيلا لك ويوم سعيد !!</p><p>&nbsp;</p><p>يعتبر،</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(194, 13, 'da', 'New Retainer Payment', '<p>Hej,</p><p>Velkommen til {app_name}</p><p>K&aelig;re {payment_name}</p><p>Vi har modtaget dit bel&oslash;b {payment_amount} betaling for {retainer_number} indsendt p&aring; datoen {payment_date}</p><p>Dit forfaldne bel&oslash;b for {retainer_number} er {payment_dueAmount}</p><p>Vi s&aelig;tter pris p&aring; din hurtige betaling og ser frem til at forts&aelig;tte forretninger med dig i fremtiden.</p><p>Mange tak og god dag!!</p><p>&nbsp;</p><p>Med venlig hilsen</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(195, 13, 'de', 'New Retainer Payment', '<p>Hi,</p><p>Willkommen bei {app_name}</p><p>Sehr geehrte(r) {payment_name}</p><p>Wir haben Ihre Zahlung in H&ouml;he von {payment_amount} f&uuml;r {retainer_number} erhalten, die am {payment_date} eingereicht wurde</p><p>Ihr {retainer_number} f&auml;lliger Betrag betr&auml;gt {payment_dueAmount}</p><p>Wir wissen Ihre prompte Zahlung zu sch&auml;tzen und freuen uns auf die weitere Zusammenarbeit mit Ihnen in der Zukunft.</p><p>Vielen Dank und einen sch&ouml;nen Tag!!</p><p>&nbsp;</p><p>Gr&uuml;&szlig;e,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(196, 13, 'es', 'New Retainer Payment', '<p>Hola,</p><p>Bienvenido a {app_name}</p><p>Estimado {payment_name}</p><p>Recibimos su pago de {payment_amount} por {retainer_number} enviado en la fecha {payment_date}</p><p>Su monto adeudado de {retainer_number} es {payment_dueAmount}</p><p>Agradecemos su pago puntual y esperamos seguir haciendo negocios con usted en el futuro.</p><p>&iexcl;&iexcl;Muchas gracias y buen d&iacute;a!!</p><p>&nbsp;</p><p>Saludos,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(197, 13, 'en', 'New Retainer Payment', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Hi,</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Welcome to {app_name}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Dear {payment_name}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">We have recieved your amount {payment_amount} payment for {invoice_number} submited on date {payment_date}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Your {invoice_number} Due amount is {payment_dueAmount}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">We appreciate your prompt payment and look forward to continued business with you in the future.</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Thank you very much and have a good day!!</span></span></p>                    <p>&nbsp;</p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Regards,</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{company_name}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(198, 13, 'fr', 'New Retainer Payment', '<p>Salut</p><p>Bienvenue sur {app_name}</p><p>Cher {payment_name}</p><p>Nous avons re&ccedil;u votre paiement d\'un montant de {payment_amount} pour {retainer_number} soumis le {payment_date}</p><p>Votre montant d&ucirc; de {retainer_number} est de {payment_dueAmount}</p><p>Nous appr&eacute;cions votre paiement rapide et esp&eacute;rons continuer &agrave; faire affaire avec vous &agrave; l\'avenir.</p><p>Merci beaucoup et bonne journ&eacute;e !!</p><p>&nbsp;</p><p>Salutations,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(199, 13, 'it', 'New Retainer Payment', '<p>Ciao,</p><p>Benvenuti in {app_name}</p><p>Caro {payment_name}</p><p>Abbiamo ricevuto il tuo importo {payment_amount} pagamento per {retainer_number} inviato alla data {payment_date}</p><p>Il tuo {retainer_number} l\'importo dovuto &egrave; {payment_dueamount}</p><p>Apprezziamo il tuo rapido pagamento e non vediamo l\'ora di continuare a fare affari con te in futuro.</p><p>Grazie mille e buona giornata !!</p><p>&nbsp;</p><p>Saluti,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(200, 13, 'ja', 'New Retainer Payment', '<p>やあ、</p><p>{app_name}へようこそ</p><p>親愛なる{payment_name}</p><p>{retainer_number}の金額{payment_amount}支払いを受け取りました{payment_date}に提出されました</p><p>あなたの{reterer_number}正当な金額は{payment_dueamount}です</p><p>私たちはあなたの迅速な支払いに感謝し、将来あなたとの継続的なビジネスを楽しみにしています。</p><p>どうもありがとうございました、そして良い一日を！</p><p>&nbsp;</p><p>よろしく、</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(201, 13, 'nl', 'New Retainer Payment', '<p>Hoi,</p><p>Welkom bij {app_name}</p><p>Beste {payment_Name}</p><p>We hebben uw bedrag ontvangen.</p><p>Uw {retainer_number} vervallen bedrag is {payment_dueAmount}</p><p>We waarderen uw snelle betaling en kijken uit naar voortdurende zaken met u in de toekomst.</p><p>Heel erg bedankt en een fijne dag fijn !!</p><p>&nbsp;</p><p>Groeten,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(202, 13, 'pl', 'New Retainer Payment', '<p>Cześć,</p><p>Witamy w {app_name}</p><p>Drogi {payment_name}</p><p>Otrzymaliśmy twoją kwotę {payment_amount} płatność za {retainer_number} przesłany na datę {payment_date}</p><p>Twoja {retainer_number} należna kwota to {payment_dueAmount}</p><p>Doceniamy twoją szybką płatność i czekamy na dalszą działalność z Tobą w przyszłości.</p><p>Dziękuję bardzo i życzę miłego dnia !!</p><p>&nbsp;</p><p>Pozdrowienia,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(203, 13, 'pt', 'New Retainer Payment', '<p>Oi,</p><p>Bem -vindo ao {app_Name}</p><p>Querido {retainer_name}</p><p>Recebemos seu valor {payment_amount} pagamento de {retainer_number} submetido na data {payment_date}</p><p>Seu {retainer_number} de vencimento &eacute; {payment_dueAmount}</p><p>Agradecemos seu pagamento imediato e esperamos os neg&oacute;cios cont&iacute;nuos com voc&ecirc; no futuro.</p><p>Muito obrigado e tenha um bom dia !!</p><p>&nbsp;</p><p>Cumprimentos,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(204, 13, 'ru', 'New Retainer Payment', '<p>Привет,</p><p>Добро пожаловать в {app_name}</p><p>Дорогой {retainer_name}</p><p>Мы получили вашу сумму {payment_amount} платеж за {retainer_number}, представленную на дату {payment_date}</p><p>Ваша {retainer_number} Долженная сумма {payment_dueAmount}</p><p>Мы ценим вашу оперативную оплату и с нетерпением ждем продолжения бизнеса с вами в будущем.</p><p>Большое спасибо и хорошего дня !!</p><p>&nbsp;</p><p>С уважением,</p><p>{company_name}</p><p>{app_url}</p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(205, 13, 'tr', 'New Retainer Payment', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Hi,</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Welcome to {app_name}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Dear {payment_name}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">We have recieved your amount {payment_amount} payment for {invoice_number} submited on date {payment_date}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Your {invoice_number} Due amount is {payment_dueAmount}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">We appreciate your prompt payment and look forward to continued business with you in the future.</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Thank you very much and have a good day!!</span></span></p>                    <p>&nbsp;</p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Regards,</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{company_name}</span></span></p>                    <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(206, 13, 'zh', 'New Retainer Payment', '<p><span style=\\\"颜色：#1d1c1d；字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif；\\\"><span style=\\\"字体大小：15px；字体变体-ligatures: common-ligatures;\\\">嗨，</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">欢迎使用 {app_name}</span></span></p > <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-变体连字：通用连字；\\\">亲爱的{付款名称}</span></span></p> <p><span style=\\\"color：#1d1c1d；字体系列：Slack-Lato、Slack -Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">我们已收到您为 {invoice_number} 支付的金额为 { payment_amount} 的付款于 { payment_date} 提交</span></span></p> <p><span style=\\\"color: #1d1c1d;字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">您的 {invoice_number} 应付金额为 { payment_dueAmount}</span></span></p> <p><span style=\\\"color: #1d1c1d;字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">我们感谢您及时付款，并期待将来继续与您开展业务。</span></span></p> <p><span style=\\ “颜色：#1d1c1d；字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">非常感谢您，祝您有美好的一天！！</span></span></p> <p> </p> <p><span style= \\“颜色：#1d1c1d；字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">问候，</span></span></p> <p><span style=\\\"color: #1d1c1d;字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{company_name}</span></span></p> <p><span style=\\\"color: #1d1c1d;字体系列：Slack-Lato、Slack-Fractions、appleLogo、sans-serif;\\\"><span style=\\\"font-size: 15px;字体变体连字：通用连字；\\\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(207, 13, 'he', 'New Retainer Payment', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant -ligatures: common-ligatures;\\\">היי,</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">ברוכים הבאים אל {app_name}</span></span></p > <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font- variant-ligatures: common-ligatures;\\\">יקר {payment_name}</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack -שברים, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">קיבלנו את הסכום שלך {payment_amount} תשלום עבור {invoice_number} הוגש בתאריך {payment_date}</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">סכום התשלום שלך ב-{invoice_number} הוא {payment_dueAmount}</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">אנו מעריכים את התשלום המהיר שלך ומצפים להמשך העסקים איתך בעתיד.</span></span></p> <p><span style=\\ \"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">תודה רבה ויום טוב!!</span></span></p> <p> </p> <p><span style= \\\"צבע: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">בברכה,</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{company_name}</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(208, 13, 'pt-br', 'New Retainer Payment', '<p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant -ligatures: common-ligatures;\\\">Oi,</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Bem-vindo ao {app_name}</span></span></p > <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font- variant-ligatures: common-ligatures;\\\">Prezado {payment_name}</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack -Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Recebemos seu pagamento de {payment_amount} por {invoice_number} enviado na data {payment_date}</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Seu {invoice_number} Valor devido é {payment_dueAmount}</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Agradecemos seu pagamento imediato e esperamos continuar a fazer negócios com você no futuro.</span></span></p> <p><span style=\\ \"cor: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Muito obrigado e tenha um bom dia!!</span></span></p> <p> </p> <p><span style= \\\"cor: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">Atenciosamente,</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{company_name}</span></span></p> <p><span style=\\\"color: #1d1c1d; font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif;\\\"><span style=\\\"font-size: 15px; font-variant-ligatures: common-ligatures;\\\">{app_url}</span></span></p>', '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `date` date DEFAULT NULL,
  `project` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `attachment` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `is_display` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `send_date` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `ref_number` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `shipping_display` int(11) NOT NULL DEFAULT 1,
  `discount_apply` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_payments`
--

CREATE TABLE `invoice_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `txn_id` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL DEFAULT 'Manually',
  `receipt` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `add_receipt` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tax` varchar(50) DEFAULT NULL,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

CREATE TABLE `join_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `journal_id` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `journal_items`
--

CREATE TABLE `journal_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journal` int(11) NOT NULL DEFAULT 0,
  `account` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `debit` double NOT NULL DEFAULT 0,
  `credit` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

INSERT INTO `ladgers` (`ladger_id`, `account_id`, `ladger_type`, `relational_cust_name`, `account_holder`, `farm_owner_name`, `village`, `farm_area_acre`, `phone_number`, `bank_account_name`, `account_number`, `bank_name`, `ifsc_code`, `branch`, `gst_num`, `created_by`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'cust-1', 1, 'Manikant Patidar', 'Sukhraj', 'Tulsi', 'Bada Gaon', 5.5, '7744551122', 'Nikita Yadav', '75548955674861', 'Jila Sahkari bank', 'JL4541867', 'Bus Stand', 'hk79hkjfojhl', 2, 1, 0, '2025-06-25 07:41:38', '2025-06-25 07:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_settings`
--

CREATE TABLE `landing_page_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_page_settings`
--

INSERT INTO `landing_page_settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'topbar_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(2, 'topbar_notification_msg', '70% Special Offer. Don’t Miss it. The offer ends in 72 hours.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(3, 'menubar_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(4, 'menubar_page', '[{\"menubar_page_name\": \"About Us\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Welcome to the AccountGo website. By accessing this website, you agree to comply with and be bound by the following terms and conditions of use. If you disagree with any part of these terms, please do not use our website. The content of the pages of this website is for your general information and use only. It is subject to change without notice. This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, personal information may be stored by us for use by third parties. Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors, and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law. Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services, or information available through this website meet your specific requirements. This website contains material that is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions. Unauthorized use of this website may give rise to a claim for damages and\\/or be a criminal offense. From time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s\",\"page_slug\": \"about_us\",\"header\": \"on\",\"footer\": \"on\",\"login\": \"on\"},{\"menubar_page_name\": \"Terms and Conditions\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Welcome to the AccountGo website. By accessing this website, you agree to comply with and be bound by the following terms and conditions of use. If you disagree with any part of these terms, please do not use our website.\\r\\n\\r\\nThe content of the pages of this website is for your general information and use only. It is subject to change without notice.\\r\\n\\r\\nThis website uses cookies to monitor browsing preferences. If you do allow cookies to be used, personal information may be stored by us for use by third parties.\\r\\n\\r\\nNeither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness, or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors, and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.\\r\\n\\r\\nYour use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services, or information available through this website meet your specific requirements.\\r\\n\\r\\nThis website contains material that is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance, and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.\\r\\n\\r\\nUnauthorized use of this website may give rise to a claim for damages and\\/or be a criminal offense.\\r\\n\\r\\nFrom time to time, this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).\",\"page_slug\": \"terms_and_conditions\",\"header\": \"off\",\"footer\": \"on\",\"login\": \"on\"},{\"menubar_page_name\": \"Privacy Policy\",\"template_name\": \"page_content\",\"page_url\": \"\",\"menubar_page_contant\": \"Introduction: An overview of the privacy policy, including the purpose and scope of the policy. Information Collection: Details about the types of information collected from users\\/customers, such as personal information (name, address, email), device information, usage data, and any other relevant data. Data Usage: An explanation of how the collected data will be used, including providing services, improving products, personalization, analytics, and any other legitimate business purposes. Data Sharing: Information about whether and how the company shares user data with third parties, such as partners, service providers, or affiliates, along with the purposes of such sharing. Data Security: Details about the measures taken to protect user data from unauthorized access, loss, or misuse, including encryption, secure protocols, access controls, and data breach notification procedures. User Choices: Information on the choices available to users regarding the collection, use, and sharing of their personal data, including opt-out mechanisms and account settings. Cookies and Tracking Technologies: Explanation of the use of cookies, web beacons, and similar technologies for tracking user activity and collecting information for analytics and advertising purposes. Third-Party Links: Clarification that the companys website or services may contain links to third-party websites or services and that the privacy policy does not extend to those external sites. Data Retention: Details about the retention period for user data and how long it will be stored by the company. Legal Basis and Compliance: Information about the legal basis for processing personal data, compliance with applicable data protection laws, and the rights of users under relevant privacy regulations (e.g., GDPR, CCPA). Updates to the Privacy Policy: Notification that the privacy policy may be updated from time to time, and how users will be informed of any material changes. Contact Information: How users can contact the company regarding privacy-related concerns or inquiries.\",\"page_slug\": \"privacy_policy\",\"header\": \"off\",\"footer\": \"on\",\"login\": \"on\"}]', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(5, 'site_logo', 'site_logo.png', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(6, 'site_description', 'We build modern web tools to help you jump-start your daily business work.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(7, 'home_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(8, 'home_offer_text', '70% Special Offer', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(9, 'home_title', 'Home', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(10, 'home_heading', 'AccountGo SaaS Accounting and Billing Tool', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(11, 'home_description', 'Use these awesome forms to login or create new account in your project for free.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(12, 'home_trusted_by', '1000+ Customer', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(13, 'home_live_demo_link', 'https://demo.workdo.io/accountgo-saas/login', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(14, 'home_buy_now_link', 'https://codecanyon.net/item/accountgo-saas-accounting-and-billing-tool/25733019', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(15, 'home_banner', 'home_banner.png', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(16, 'home_logo', 'home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png,home_logo.png', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(17, 'feature_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(18, 'feature_title', 'Features', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(19, 'feature_heading', 'All In One Place CRM System', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(20, 'feature_description', 'Use these awesome forms to login or create new account in your project for free. Use these awesome forms to login or create new account in your project for free.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(21, 'feature_buy_now_link', 'https://codecanyon.net/item/accountgo-saas-accounting-and-billing-tool/25733019', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(22, 'feature_of_features', '[{\"feature_logo\":\"1686575690-feature_logo.png\",\"feature_heading\":\"Feature\",\"feature_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"feature_logo\":\"1686545757-feature_logo.png\",\"feature_heading\":\"Support\",\"feature_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"},{\"feature_logo\":\"1686546152-feature_logo.png\",\"feature_heading\":\"Integration\",\"feature_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"}]', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(23, 'highlight_feature_heading', 'AccountGo SaaS Accounting and Billing Tool', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(24, 'highlight_feature_description', 'Use these awesome forms to login or create new account in your project for free.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(25, 'highlight_feature_image', 'highlight_feature_image.png', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(26, 'other_features', '[{\"other_features_image\":\"1688528114-other_features_image.png\",\"other_features_heading\":\"AccountGo SaaS Accounting and Billing Tool\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/accountgo-saas-accounting-and-billing-tool/25733019\"},{\"other_features_image\":\"1688528134-other_features_image.png\",\"other_features_heading\":\"AccountGo SaaS Accounting and Billing Tool\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/accountgo-saas-accounting-and-billing-tool/25733019\"},{\"other_features_image\":\"1688528158-other_features_image.png\",\"other_features_heading\":\"AccountGo SaaS Accounting and Billing Tool\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/accountgo-saas-accounting-and-billing-tool/25733019\"},{\"other_features_image\":\"1688528167-other_features_image.png\",\"other_features_heading\":\"AccountGo SaaS Accounting and Billing Tool\",\"other_featured_description\":\"<p>Use these awesome forms to login or create new account in your project for free.<\\/p>\",\"other_feature_buy_now_link\":\"https://codecanyon.net/item/accountgo-saas-accounting-and-billing-tool/25733019\"}]', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(27, 'discover_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(28, 'discover_heading', 'AccountGo SaaS Accounting and Billing Tool', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(29, 'discover_description', 'Use these awesome forms to login or create new account in your project for free.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(30, 'discover_live_demo_link', 'https://demo.workdo.io/accountgo-saas/login', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(31, 'discover_buy_now_link', 'https://codecanyon.net/item/accountgo-saas-accounting-and-billing-tool/25733019', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(32, 'discover_of_features', '[{\"discover_logo\":\"1686575797-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"<p>Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.<\\/p>\"},{\"discover_logo\":\"1686547242-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"},{\"discover_logo\":\"1686547625-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"},{\"discover_logo\":\"1686547638-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"},{\"discover_logo\":\"1686547653-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"},{\"discover_logo\":\"1686547662-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"},{\"discover_logo\":\"1686547709-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"},{\"discover_logo\":\"1686547717-discover_logo.png\",\"discover_heading\":\"Feature\",\"discover_description\":\"Use these awesome forms to login or create new account in your project for free.Use these awesome forms to login or create new account in your project for free.\"}]', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(33, 'screenshots_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(34, 'screenshots_heading', 'AccountGo SaaS Accounting and Billing Tool', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(35, 'screenshots_description', 'Use these awesome forms to login or create new account in your project for free.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(36, 'screenshots', '[{\"screenshots\":\"1688533303-screenshots.png\",\"screenshots_heading\":\"Account Dashboard\"},{\"screenshots\":\"1688533330-screenshots.png\",\"screenshots_heading\":\"Chart of Accounts\"},{\"screenshots\":\"1688533341-screenshots.png\",\"screenshots_heading\":\"Customer Overview\"},{\"screenshots\":\"1688533348-screenshots.png\",\"screenshots_heading\":\"Invoice Detail\"},{\"screenshots\":\"1688533355-screenshots.png\",\"screenshots_heading\":\"Vendor Overview\"},{\"screenshots\":\"1688533362-screenshots.png\",\"screenshots_heading\":\"Bill Detail\"}]', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(37, 'plan_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(38, 'plan_title', 'Plan', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(39, 'plan_heading', 'AccountGo SaaS Accounting and Billing Tool', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(40, 'plan_description', 'Use these awesome forms to login or create new account in your project for free.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(41, 'faq_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(42, 'faq_title', 'Faq', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(43, 'faq_heading', 'AccountGo SaaS Accounting and Billing Tool', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(44, 'faq_description', 'Use these awesome forms to login or create new account in your project for free.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(45, 'faqs', '[{\"faq_questions\":\"#What does \\\"Theme\\/Package Installation\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Theme\\/Package Installation\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Lifetime updates\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"#What does \\\"Lifetime updates\\\" mean?\",\"faq_answer\":\"For an easy-to-install theme\\/package, we have included step-by-step detailed documentation (in English). However, if it is not done perfectly, please feel free to contact the support team at support@workdo.io\"},{\"faq_questions\":\"# What does \\\"6 months of support\\\" mean?\",\"faq_answer\":\"Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa\\r\\n                                    nesciunt\\r\\n                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt\\r\\n                                    sapiente ea\\r\\n                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven heard of them accusamus labore sustainable VHS.\"},{\"faq_questions\":\"# What does \\\"6 months of support\\\" mean?\",\"faq_answer\":\"Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa\\r\\n                                    nesciunt\\r\\n                                    laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt\\r\\n                                    sapiente ea\\r\\n                                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven heard of them accusamus labore sustainable VHS.\"}]', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(46, 'testimonials_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(47, 'testimonials_heading', 'From our Clients', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(48, 'testimonials_description', 'Use these awesome forms to login or create new account in your project for free.', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(49, 'testimonials_long_description', 'WorkDo seCommerce package offers you a “sales-ready.”secure online store. The package puts all the key pieces together, from design to payment processing. This gives you a headstart in your eCommerce venture. Every store is built using a reliable PHP framework -laravel. Thisspeeds up the development process while increasing the store’s security and performance.Additionally, thanks to the accompanying mobile app, you and your team can manage the store on the go. What’s more, because the app works both for you and your customers, you can use it to reach a wider audience.And, unlike popular eCommerce platforms, it doesn’t bind you to any terms and conditions or recurring fees. You get to choose where you host it or which payment gateway you use. Lastly, you getcomplete control over the looks of the store. And if it lacks any functionalities that you need, just reach out, and let’s discuss customization possibilities', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(50, 'testimonials', '[{\"testimonials_user_avtar\":\"1686634418-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"4\"},{\"testimonials_user_avtar\":\"1686634425-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"4\"},{\"testimonials_user_avtar\":\"1686634432-testimonials_user_avtar.jpg\",\"testimonials_title\":\"Tbistone\",\"testimonials_description\":\"Very quick customer support, installing this application on my machine locally, within 5 minutes of creating a ticket, the developer was able to fix the issue I had within 10 minutes. EXCELLENT! Thank you very much\",\"testimonials_user\":\"Chordsnstrings\",\"testimonials_designation\":\"from codecanyon\",\"testimonials_star\":\"4\"}]', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(51, 'footer_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(52, 'joinus_status', 'on', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(53, 'joinus_heading', 'Join Our Community', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(54, 'joinus_description', 'We build modern web tools to help you jump-start your daily business work.', '2025-06-10 15:15:42', '2025-06-10 15:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `fullName`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'Arabic', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 'zh', 'Chinese', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 'da', 'Danish', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 'de', 'German', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 'en', 'English', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 'es', 'Spanish', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(7, 'fr', 'French', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(8, 'he', 'Hebrew', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(9, 'it', 'Italian', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(10, 'ja', 'Japanese', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(11, 'nl', 'Dutch', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(12, 'pl', 'Polish', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(13, 'pt', 'Portuguese', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(14, 'ru', 'Russian', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(15, 'tr', 'Turkish', '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(16, 'pt-br', 'Portuguese(Brazil)', '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_28_102009_create_settings_table', 1),
(5, '2019_11_13_051828_create_taxes_table', 1),
(6, '2019_11_13_055026_create_invoices_table', 1),
(7, '2019_11_13_072623_create_expenses_table', 1),
(8, '2019_11_21_090403_create_plans_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2020_01_08_063207_create_product_services_table', 1),
(11, '2020_01_08_084029_create_product_service_categories_table', 1),
(12, '2020_01_08_092717_create_product_service_units_table', 1),
(13, '2020_01_08_121541_create_customers_table', 1),
(14, '2020_01_09_104945_create_venders_table', 1),
(15, '2020_01_09_113852_create_bank_accounts_table', 1),
(16, '2020_01_09_124222_create_transfers_table', 1),
(17, '2020_01_10_064723_create_transactions_table', 1),
(18, '2020_01_13_072608_create_invoice_products_table', 1),
(19, '2020_01_15_034438_create_revenues_table', 1),
(20, '2020_01_15_051228_create_bills_table', 1),
(21, '2020_01_15_060859_create_bill_products_table', 1),
(22, '2020_01_15_073237_create_payments_table', 1),
(23, '2020_01_16_043907_create_orders_table', 1),
(24, '2020_01_18_051650_create_invoice_payments_table', 1),
(25, '2020_01_20_091035_create_bill_payments_table', 1),
(26, '2020_02_25_052356_create_credit_notes_table', 1),
(27, '2020_02_26_033827_create_debit_notes_table', 1),
(28, '2020_03_12_095629_create_coupons_table', 1),
(29, '2020_03_12_120749_create_user_coupons_table', 1),
(30, '2020_04_02_045834_create_proposals_table', 1),
(31, '2020_04_02_055706_create_proposal_products_table', 1),
(32, '2020_04_18_035141_create_goals_table', 1),
(33, '2020_04_21_115823_create_assets_table', 1),
(34, '2020_04_24_023732_create_custom_fields_table', 1),
(35, '2020_04_24_024217_create_custom_field_values_table', 1),
(36, '2020_05_21_065337_create_permission_tables', 1),
(37, '2020_07_01_033457_change_product_services_tax_id_column_type', 1),
(38, '2020_07_01_063255_change_tax_column_type', 1),
(39, '2020_07_22_131715_change_amount_type_size', 1),
(40, '2020_08_04_034206_change_settings_value_type', 1),
(41, '2020_09_16_040822_change_user_type_size_in_users_table', 1),
(42, '2020_09_17_053350_change_shipping_default_val', 1),
(43, '2021_01_11_062508_create_chart_of_accounts_table', 1),
(44, '2021_01_11_070441_create_chart_of_account_types_table', 1),
(45, '2021_01_12_032834_create_journal_entries_table', 1),
(46, '2021_01_12_033815_create_journal_items_table', 1),
(47, '2021_01_20_072219_create_chart_of_account_sub_types_table', 1),
(48, '2021_07_15_091920_admin_payment_settings', 1),
(49, '2021_07_15_091933_company_payment_settings', 1),
(50, '2021_09_10_165514_create_plan_requests_table', 1),
(51, '2021_12_02_052828_create_budgets_table', 1),
(52, '2022_03_03_100148_change_price_val', 1),
(53, '2022_03_11_035602_create_stock_reports_table', 1),
(54, '2022_07_18_045119_create_email_templates_table', 1),
(55, '2022_07_18_045328_create_user_email_templates_table', 1),
(56, '2022_07_18_045420_create_email_template_langs_table', 1),
(57, '2022_07_27_025909_create_contract_types_table', 1),
(58, '2022_07_27_040057_create_contracts_table', 1),
(59, '2022_07_29_024854_create_contract_attachments_table', 1),
(60, '2022_07_29_041911_create_contract_comments_table', 1),
(61, '2022_07_29_051300_create_contract_notes_table', 1),
(62, '2022_08_05_071423_create_retainers_table', 1),
(63, '2022_08_05_101408_create_retainer_products_table', 1),
(64, '2022_08_09_111831_create_retainer_payments_table', 1),
(65, '2023_04_20_065200_create_login_details_table', 1),
(66, '2023_04_25_112902_create_webhooks_table', 1),
(67, '2023_05_02_060232_create_notification_templates_table', 1),
(68, '2023_05_02_060355_create_notification_template_langs_table', 1),
(69, '2023_05_29_040852_create_bank_transfers_table', 1),
(70, '2023_06_05_043450_create_landing_page_settings_table', 1),
(71, '2023_06_08_092955_create_template_table', 1),
(72, '2023_06_10_114031_create_join_us_table', 1),
(73, '2023_06_28_043759_create_languages_table', 1),
(74, '2023_12_08_070852_add_is_disable_to_users_table', 1),
(75, '2023_12_29_103429_add_parent_to_chart_of_accounts', 1),
(76, '2023_12_29_104251_add_created_by_to_chart_of_account_sub_types', 1),
(77, '2024_01_02_041737_create_chart_of_account_parents_table', 1),
(78, '2024_01_03_043156_add_sale_chartaccount_id_to_product_services_table', 1),
(79, '2024_01_03_084653_add_chart_account_id_to_bank_accounts_table', 1),
(80, '2024_01_04_120448_create_transaction_lines_table', 1),
(81, '2024_01_05_060143_add_chart_account_id_to_product_service_categories_table', 1),
(82, '2024_01_05_111807_create_bill_accounts_table', 1),
(83, '2024_01_12_110125_add_is_enable_login_to_users', 1),
(84, '2024_01_19_093553_add_trial_days_to_plans_table', 1),
(85, '2024_01_22_034258_add_trial_expire_date_to_users_table', 1),
(86, '2024_01_25_105855_add_is_enable_login_to_customers_table', 1),
(87, '2024_01_26_035807_add_is_enable_login_to_venders_table', 1),
(88, '2024_01_27_031721_add_is_disable_to_plans', 1),
(89, '2024_01_27_034059_add_is_refund_to_orders', 1),
(90, '2024_03_07_102755_create_referral_settings_table', 1),
(91, '2024_03_08_065946_add_referral_code_to_users', 1),
(92, '2024_03_08_104116_create_referral_transactions_table', 1),
(93, '2024_03_11_112409_create_referral_transaction_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(5, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notification_templates`
--

CREATE TABLE `notification_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_templates`
--

INSERT INTO `notification_templates` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'New Customer', 'new_customer', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(2, 'New Invoice', 'new_invoice', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(3, 'New Bill', 'new_bill', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(4, 'New Vendor', 'new_vendor', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(5, 'New Revenue', 'new_revenue', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(6, 'New Proposal', 'new_proposal', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(7, 'New Payment', 'new_payment', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(8, 'Invoice Reminder', 'invoice_reminder', '2025-06-10 15:15:42', '2025-06-10 15:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `notification_template_langs`
--

CREATE TABLE `notification_template_langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lang` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `variables` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_template_langs`
--

INSERT INTO `notification_template_langs` (`id`, `parent_id`, `lang`, `content`, `variables`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'تم إنشاء عميل جديد بواسطة {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(2, 1, 'da', 'Ny kunde oprettet af {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(3, 1, 'de', 'Neuer Kunde erstellt von {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(4, 1, 'en', 'New Customer created by {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(5, 1, 'es', 'Nueva cliente creada por {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(6, 1, 'fr', 'Nouveau client créé par {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(7, 1, 'it', 'Nuovo cliente creato da {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(8, 1, 'ja', '{customer_name} によって作成された新しい顧客', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(9, 1, 'nl', 'Nieuwe klant gemaakt door {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(10, 1, 'pl', 'Nowy klient utworzony przez firmę {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(11, 1, 'ru', 'Новый клиент создан {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(12, 1, 'pt', 'Novo cliente criado por {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(13, 1, 'tr', 'Oluşturan Yeni Müşteri {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(14, 1, 'zh', '新客户创建者 {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(15, 1, 'he', 'לקוח חדש נוצר על ידי {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(16, 1, 'pt-br', 'Novo Cliente criado por {customer_name}', '{\n                    \"Customer Name\": \"customer_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(17, 2, 'ar', 'فاتورة جديدة {invoice_number} تم إنشاؤها بواسطة {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(18, 2, 'da', 'Ny faktura {invoice_number} oprettet af {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(19, 2, 'de', 'Neue Rechnung {invoice_number} erstellt von {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(20, 2, 'en', 'New Invoice {invoice_number} created by {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(21, 2, 'es', 'Nueva factura {invoice_number} creada por {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(22, 2, 'fr', 'Nouvelle facture {invoice_number} créée par {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(23, 2, 'it', 'Nuova fattura {invoice_number} creata da {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(24, 2, 'ja', '{invoice_name} によって作成された新しい請求書 {invoice_number}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(25, 2, 'nl', 'Nieuwe factuur {invoice_number} gemaakt door {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(26, 2, 'pl', 'Nowa faktura {invoice_number} utworzona przez {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(27, 2, 'ru', 'Новый счет {invoice_number}, созданный {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(28, 2, 'pt', 'Nova fatura {invoice_number} criada por {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(29, 2, 'tr', 'Yeni fatura {invoice_number} tarafından yaratıldı {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(30, 2, 'zh', '由 {invoice_name} 创建的新发票 {invoice_number}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(31, 2, 'he', 'חשבונית חדשה {invoice_number} נוצרה על ידי {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(32, 2, 'pt-br', 'Nova fatura {invoice_number} criada por {invoice_name}', '{\n                    \"Invoice Name\": \"invoice_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Invoice URL\": \"invoice_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(33, 3, 'ar', 'تم إنشاء الفاتورة الجديدة {bill_number} بواسطة {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(34, 3, 'da', 'Ny regning {bill_number} oprettet af {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(35, 3, 'de', 'Neue Rechnung {bill_number} erstellt von {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(36, 3, 'en', 'New Bill {bill_number} created by {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(37, 3, 'es', 'Nueva factura {bill_number} creada por {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(38, 3, 'fr', 'Nouvelle facture {bill_number} créée par {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(39, 3, 'it', 'Nuova fattura {bill_number} creata da {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(40, 3, 'ja', '{bill_name} によって作成された新しい請求書 {bill_number}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(41, 3, 'nl', 'Nieuwe factuur {bill_number} gemaakt door {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(42, 3, 'pl', 'Nowy rachunek {bill_number} utworzony przez {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(43, 3, 'ru', 'Новый счет {bill_number}, созданный пользователем {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(44, 3, 'pt', 'Nova fatura {bill_number} criada por {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(45, 3, 'tr', 'Yeni Fatura {bill_number} tarafından yaratıldı {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(46, 3, 'zh', '由 {bill_name} 创建的新帐单 {bill_number}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(47, 3, 'he', 'חשבון חדש {bill_number} נוצר על ידי {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(48, 3, 'pt-br', 'New Bill {bill_number} criado por {bill_name}', '{\n                    \"Bill Name\": \"bill_name\",\n                    \"Bill Number\": \"bill_number\",\n                    \"Bill Url\": \"bill_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(49, 4, 'ar', 'تم إنشاء بائع جديد بواسطة {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(50, 4, 'da', 'Ny leverandør oprettet af {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(51, 4, 'de', 'Neuer Anbieter erstellt von {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(52, 4, 'en', 'New Vendor created by {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(53, 4, 'es', 'Nuevo proveedor creado por {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(54, 4, 'fr', 'Nouveau fournisseur créé par {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(55, 4, 'it', 'Nuovo fornitore creato da {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(56, 4, 'ja', '{vender_name} によって作成された新しいベンダー', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(57, 4, 'nl', 'Nieuwe leverancier gemaakt door {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(58, 4, 'pl', 'Nowy dostawca utworzony przez {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(59, 4, 'ru', 'Новый поставщик создан {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(60, 4, 'pt', 'Novo fornecedor criado por {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(61, 4, 'tr', 'Oluşturan yeni satıcı {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(62, 4, 'zh', '新供应商创建者 {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(63, 4, 'he', 'ספק חדש שנוצר על ידי {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(64, 4, 'pt-br', 'Novo fornecedor criado por {vender_name}', '{\n                    \"Vendor Name\": \"vender_name\",\n                    \"Email\": \"email\",\n                    \"Password\": \"password\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(65, 5, 'ar', 'تم إنشاء إيرادات جديدة لمبلغ {payment_amount} لصالح {payment_name} بواسطة {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(66, 5, 'da', 'Ny omsætning på {payment_amount} oprettet for {payment_name} af {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(67, 5, 'de', 'Neuer Umsatz von {payment_amount} erstellt für {payment_name} von {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(68, 5, 'en', 'New Revenue of {payment_amount} created for {payment_name} by {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(69, 5, 'es', 'Nuevos ingresos de {payment_amount} creados para {payment_name} por {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(70, 5, 'fr', 'Nouveau revenu de {payment_amount} créé pour {payment_name} par {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(71, 5, 'it', 'Nuove entrate di {payment_amount} create per {payment_name} da {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(72, 5, 'ja', '{user_name} によって {payment_name} に作成された {payment_amount} の新しい収入', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(73, 5, 'nl', 'Nieuwe opbrengst van {payment_amount} gecreëerd voor {payment_name} door {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(74, 5, 'pl', 'Nowy przychód w wysokości {payment_amount} utworzony dla {payment_name} przez {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(75, 5, 'ru', 'Новый доход в размере {payment_amount} создан для {payment_name} пользователем {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(76, 5, 'pt', 'Nova receita de {payment_amount} criada para {payment_name} por {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(77, 5, 'tr', 'Yeni Gelir {payment_amount} için yaratıldı {payment_name} ile {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(78, 5, 'zh', '{user_name} 为 { payment_name} 创建了 { payment_amount} 的新收入', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(79, 5, 'he', 'הכנסה חדשה בסך {payment_amount} נוצרה עבור {payment_name} על ידי {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(80, 5, 'pt-br', 'Nova receita de {payment_amount} criada para {payment_name} por {user_name}', '{\n                    \"Revenue name\": \"payment_name\",\n                    \"Amount\": \"payment_amount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"user_name\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(81, 6, 'ar', 'تم إنشاء اقتراح جديد بواسطة {Propand_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(82, 6, 'da', 'Nyt forslag oprettet af {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(83, 6, 'de', 'Neues Angebot erstellt von {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(84, 6, 'en', 'New Proposal created by {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(85, 6, 'es', 'Nueva propuesta creada por {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(86, 6, 'fr', 'Nouvelle proposition créée par {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(87, 6, 'it', 'Nuova proposta creata da {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(88, 6, 'ja', '{proposal_name} によって作成された新しい提案', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(89, 6, 'nl', 'Nieuw voorstel gemaakt door {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(90, 6, 'pl', 'Nowa propozycja utworzona przez {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(91, 6, 'ru', 'Новое предложение, созданное пользователем {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(92, 6, 'pt', 'Nova proposta criada por {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(93, 6, 'tr', 'Yeni Teklif tarafından oluşturuldu {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(94, 6, 'zh', '新提案创建者 {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(95, 6, 'he', 'הצעה חדשה נוצרה על ידי {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(96, 6, 'pt-br', 'Nova Proposta criada por {proposal_name}', '{\n                    \"Proposal Name\": \"proposal_name\",\n                    \"Proposal Number\": \"proposal_number\",\n                    \"Proposal Url\": \"proposal_url\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(97, 7, 'ar', 'تم إنشاء دفعة جديدة بقيمة {payment_amount} لـ {payment_name} بواسطة {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(98, 7, 'da', 'Ny betaling på {payment_amount} oprettet for {payment_name} af {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(99, 7, 'de', 'Neue Zahlung in Höhe von {payment_amount} erstellt für {payment_name} von {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(100, 7, 'en', 'New payment of {payment_amount} created for {payment_name} by {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(101, 7, 'es', 'Nuevo pago de {pago_cantidad} creado para {pago_nombre} por {tipo}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(102, 7, 'fr', 'Nouveau paiement de {payment_amount} créé pour {payment_name} par {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(103, 7, 'it', 'Nuovo pagamento di {payment_amount} creato per {payment_name} da {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(104, 7, 'ja', '{type} によって {payment_name} に対して作成された {payment_amount} の新しい支払い', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(105, 7, 'nl', 'Nieuwe betaling van {payment_amount} gemaakt voor {payment_name} door {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(106, 7, 'pl', 'Nowa płatność w wysokości {payment_amount} została utworzona dla {payment_name} przez {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42');
INSERT INTO `notification_template_langs` (`id`, `parent_id`, `lang`, `content`, `variables`, `created_by`, `created_at`, `updated_at`) VALUES
(107, 7, 'ru', 'Создан новый платеж {payment_amount} для {payment_name} по {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(108, 7, 'pt', 'Novo pagamento de {payment_amount} criado para {payment_name} por {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(109, 7, 'tr', 'Yeni ödeme {payment_amount} için yaratıldı {payment_name} ile {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(110, 7, 'zh', '{type} 为 { payment_name} 创建了一笔金额为 { payment_amount} 的新付款', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(111, 7, 'he', 'תשלום חדש בסך {payment_amount} נוצר עבור {payment_name} על ידי {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(112, 7, 'pt-br', 'Novo pagamento de {payment_amount} criado para {payment_name} por {type}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Payment Amount\": \"payment_amount\",\n                    \"Payment Type\": \"type\", \n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(113, 8, 'ar', 'تم إنشاء تذكير دفع جديد لـ {invoice_number} بواسطة {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(114, 8, 'da', 'Ny betalingspåmindelse om {invoice_number} oprettet af {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(115, 8, 'de', 'Neue Zahlungserinnerung von {invoice_number} erstellt von {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(116, 8, 'en', 'New Payment Reminder of {invoice_number} created by {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(117, 8, 'es', 'Nuevo recordatorio de pago de {invoice_number} creado por {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(118, 8, 'fr', 'Nouveau rappel de paiement de {invoice_number} créé par {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(119, 8, 'it', 'Nuovo sollecito di pagamento di {invoice_number} creato da {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(120, 8, 'ja', '{payment_name} によって作成された {invoice_number} の新しい支払い通知', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(121, 8, 'nl', 'Nieuwe betalingsherinnering van {invoice_number} gemaakt door {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(122, 8, 'pl', 'Nowe przypomnienie o płatności {invoice_number} utworzone przez {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(123, 8, 'ru', 'Новое напоминание о платеже {invoice_number}, созданное {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(124, 8, 'pt', 'Novo lembrete de pagamento de {invoice_number} criado por {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(125, 8, 'tr', 'Yeni Ödeme Hatırlatma {invoice_number} tarafından yaratıldı {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(126, 8, 'zh', '由 { payment_name} 创建的 {invoice_number} 的新付款提醒', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(127, 8, 'he', 'תזכורת חדשה לתשלום של {invoice_number} שנוצרה על ידי {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(128, 8, 'pt-br', 'Novo lembrete de pagamento de {invoice_number} criado por {payment_name}', '{\n                    \"Payment Name\": \"payment_name\",\n                    \"Invoice Number\": \"invoice_number\",\n                    \"Payment Due Amount\": \"payment_dueAmount\",\n                    \"Payment Date\": \"payment_date\",\n                    \"Company Name\": \"company_name\",\n                    \"App Name\": \"app_name\",\n                    \"App Url\": \"app_url\"\n                    }', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `card_number` varchar(10) DEFAULT NULL,
  `card_exp_month` varchar(10) DEFAULT NULL,
  `card_exp_year` varchar(10) DEFAULT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `price_currency` varchar(10) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `payment_type` varchar(255) NOT NULL DEFAULT 'Manually',
  `receipt` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `is_refund` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) DEFAULT NULL,
  `vender_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `recurring` varchar(255) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `add_receipt` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'show dashboard', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(2, 'manage user', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(3, 'create user', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(4, 'edit user', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(5, 'delete user', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(6, 'create language', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(7, 'manage system settings', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(8, 'manage role', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(9, 'create role', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(10, 'edit role', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(11, 'delete role', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(12, 'manage permission', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(13, 'create permission', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(14, 'edit permission', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(15, 'delete permission', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(16, 'manage company settings', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(17, 'manage business settings', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(18, 'manage stripe settings', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(19, 'manage expense', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(20, 'create expense', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(21, 'edit expense', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(22, 'delete expense', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(23, 'manage invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(24, 'create invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(25, 'edit invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(26, 'delete invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(27, 'show invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(28, 'create payment invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(29, 'delete payment invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(30, 'send invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(31, 'delete invoice product', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(32, 'convert invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(33, 'manage plan', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(34, 'create plan', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(35, 'edit plan', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(36, 'manage constant unit', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(37, 'create constant unit', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(38, 'edit constant unit', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(39, 'delete constant unit', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(40, 'manage constant tax', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(41, 'create constant tax', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(42, 'edit constant tax', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(43, 'delete constant tax', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(44, 'manage constant category', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(45, 'create constant category', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(46, 'edit constant category', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(47, 'delete constant category', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(48, 'manage product & service', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(49, 'create product & service', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(50, 'edit product & service', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(51, 'delete product & service', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(52, 'manage customer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(53, 'create customer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(54, 'edit customer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(55, 'delete customer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(56, 'show customer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(57, 'manage vender', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(58, 'create vender', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(59, 'edit vender', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(60, 'delete vender', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(61, 'show vender', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(62, 'manage bank account', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(63, 'create bank account', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(64, 'edit bank account', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(65, 'delete bank account', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(66, 'manage transfer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(67, 'create transfer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(68, 'edit transfer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(69, 'delete transfer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(70, 'manage constant payment method', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(71, 'create constant payment method', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(72, 'edit constant payment method', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(73, 'delete constant payment method', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(74, 'manage transaction', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(75, 'manage revenue', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(76, 'create revenue', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(77, 'edit revenue', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(78, 'delete revenue', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(79, 'manage bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(80, 'create bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(81, 'edit bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(82, 'delete bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(83, 'show bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(84, 'manage payment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(85, 'create payment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(86, 'edit payment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(87, 'delete payment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(88, 'delete bill product', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(89, 'buy plan', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(90, 'send bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(91, 'create payment bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(92, 'delete payment bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(93, 'manage order', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(94, 'income report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(95, 'expense report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(96, 'income vs expense report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(97, 'invoice report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(98, 'bill report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(99, 'stock report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(100, 'tax report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(101, 'loss & profit report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(102, 'manage customer payment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(103, 'manage customer transaction', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(104, 'manage customer invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(105, 'vender manage bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(106, 'manage vender bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(107, 'manage vender payment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(108, 'manage vender transaction', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(109, 'manage credit note', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(110, 'create credit note', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(111, 'edit credit note', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(112, 'delete credit note', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(113, 'manage debit note', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(114, 'create debit note', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(115, 'edit debit note', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(116, 'delete debit note', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(117, 'duplicate invoice', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(118, 'duplicate bill', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(119, 'manage coupon', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(120, 'create coupon', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(121, 'edit coupon', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(122, 'delete coupon', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(123, 'manage proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(124, 'create proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(125, 'edit proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(126, 'delete proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(127, 'duplicate proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(128, 'show proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(129, 'send proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(130, 'delete proposal product', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(131, 'manage customer proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(132, 'manage goal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(133, 'create goal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(134, 'edit goal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(135, 'delete goal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(136, 'manage assets', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(137, 'create assets', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(138, 'edit assets', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(139, 'delete assets', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(140, 'statement report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(141, 'manage constant custom field', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(142, 'create constant custom field', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(143, 'edit constant custom field', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(144, 'delete constant custom field', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(145, 'manage chart of account', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(146, 'create chart of account', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(147, 'edit chart of account', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(148, 'delete chart of account', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(149, 'manage journal entry', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(150, 'create journal entry', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(151, 'edit journal entry', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(152, 'delete journal entry', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(153, 'show journal entry', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(154, 'balance sheet report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(155, 'ledger report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(156, 'trial balance report', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(157, 'create budget planner', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(158, 'edit budget planner', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(159, 'manage budget planner', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(160, 'delete budget planner', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(161, 'view budget planner', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(162, 'manage contract', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(163, 'create contract', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(164, 'manage customer contract', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(165, 'edit contract', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(166, 'delete contract', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(167, 'show contract', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(168, 'duplicate contract', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(169, 'delete attachment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(170, 'delete comment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(171, 'delete notes', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(172, 'contract description', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(173, 'upload attachment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(174, 'add comment', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(175, 'add notes', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(176, 'send contract mail', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(177, 'manage retainer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(178, 'create retainer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(179, 'edit retainer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(180, 'delete retainer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(181, 'show retainer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(182, 'send retainer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(183, 'duplicate retainer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(184, 'delete retainer product', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(185, 'convert invoice proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(186, 'convert invoice retainer', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(187, 'convert retainer proposal', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(188, 'manage constant contract type', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(189, 'create constant contract type', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(190, 'edit constant contract type', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(191, 'delete constant contract type', 'web', '2025-06-10 15:15:42', '2025-06-10 15:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(30,2) DEFAULT 0.00,
  `duration` varchar(100) NOT NULL,
  `max_users` int(11) NOT NULL DEFAULT 0,
  `max_customers` int(11) NOT NULL DEFAULT 0,
  `max_venders` int(11) NOT NULL DEFAULT 0,
  `storage_limit` double NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `enable_chatgpt` varchar(255) NOT NULL DEFAULT 'off',
  `trial` int(11) NOT NULL DEFAULT 0,
  `trial_days` varchar(255) DEFAULT NULL,
  `is_disable` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `max_users`, `max_customers`, `max_venders`, `storage_limit`, `description`, `image`, `enable_chatgpt`, `trial`, `trial_days`, `is_disable`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', 0.00, 'lifetime', 5, 5, 5, 0, NULL, 'free_plan.png', 'off', 0, NULL, 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `plan_requests`
--

CREATE TABLE `plan_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL DEFAULT 'monthly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

CREATE TABLE `product_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `sale_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `purchase_price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `tax_id` varchar(50) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `unit_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL,
  `sale_chartaccount_id` int(11) NOT NULL DEFAULT 0,
  `expense_chartaccount_id` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_service_categories`
--

CREATE TABLE `product_service_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '0',
  `chart_account_id` int(11) NOT NULL DEFAULT 0,
  `color` varchar(255) NOT NULL DEFAULT '#fc544b',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_service_units`
--

CREATE TABLE `product_service_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `send_date` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `discount_apply` int(11) NOT NULL DEFAULT 0,
  `is_convert` int(11) NOT NULL DEFAULT 0,
  `converted_invoice_id` int(11) NOT NULL DEFAULT 0,
  `converted_retainer_id` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_products`
--

CREATE TABLE `proposal_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tax` varchar(50) DEFAULT NULL,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `price` decimal(16,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_settings`
--

CREATE TABLE `referral_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percentage` int(11) NOT NULL,
  `minimum_threshold_amount` int(11) NOT NULL,
  `is_enable` int(11) NOT NULL DEFAULT 0,
  `guideline` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_transactions`
--

CREATE TABLE `referral_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `plan_price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `commission` int(11) NOT NULL,
  `referral_code` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_transaction_orders`
--

CREATE TABLE `referral_transaction_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `req_amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `req_user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retainers`
--

CREATE TABLE `retainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retainer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `send_date` date DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `discount_apply` int(11) NOT NULL DEFAULT 0,
  `converted_invoice_id` int(11) NOT NULL DEFAULT 0,
  `is_convert` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retainer_payments`
--

CREATE TABLE `retainer_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retainer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `receipt` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL DEFAULT 'Manually',
  `txn_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `add_receipt` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retainer_products`
--

CREATE TABLE `retainer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `retainer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenues`
--

CREATE TABLE `revenues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `account_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `add_receipt` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', 0, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(2, 'customer', 'web', 0, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(3, 'vender', 'web', 0, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(4, 'company', 'web', 1, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(5, 'accountant', 'web', 2, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(1, 5),
(2, 1),
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 4),
(6, 1),
(7, 1),
(8, 1),
(8, 4),
(9, 1),
(9, 4),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 4),
(13, 1),
(13, 4),
(14, 1),
(14, 4),
(15, 1),
(15, 4),
(16, 4),
(17, 4),
(18, 1),
(19, 4),
(19, 5),
(20, 4),
(20, 5),
(21, 4),
(21, 5),
(22, 4),
(22, 5),
(23, 4),
(23, 5),
(24, 4),
(24, 5),
(25, 4),
(25, 5),
(26, 4),
(26, 5),
(27, 2),
(27, 4),
(27, 5),
(28, 4),
(28, 5),
(29, 4),
(29, 5),
(30, 4),
(30, 5),
(31, 4),
(31, 5),
(32, 4),
(32, 5),
(33, 1),
(33, 4),
(34, 1),
(35, 1),
(36, 4),
(36, 5),
(37, 4),
(37, 5),
(38, 4),
(38, 5),
(39, 4),
(39, 5),
(40, 4),
(40, 5),
(41, 4),
(41, 5),
(42, 4),
(42, 5),
(43, 4),
(43, 5),
(44, 4),
(44, 5),
(45, 4),
(45, 5),
(46, 4),
(46, 5),
(47, 4),
(47, 5),
(48, 4),
(48, 5),
(49, 4),
(49, 5),
(50, 4),
(50, 5),
(51, 4),
(51, 5),
(52, 4),
(52, 5),
(53, 4),
(53, 5),
(54, 4),
(54, 5),
(55, 4),
(55, 5),
(56, 2),
(56, 4),
(56, 5),
(57, 4),
(57, 5),
(58, 4),
(58, 5),
(59, 4),
(59, 5),
(60, 4),
(60, 5),
(61, 3),
(61, 4),
(61, 5),
(62, 4),
(62, 5),
(63, 4),
(63, 5),
(64, 4),
(64, 5),
(65, 4),
(65, 5),
(66, 4),
(66, 5),
(67, 4),
(67, 5),
(68, 4),
(68, 5),
(69, 4),
(69, 5),
(74, 4),
(74, 5),
(75, 4),
(75, 5),
(76, 4),
(76, 5),
(77, 4),
(77, 5),
(78, 4),
(78, 5),
(79, 4),
(79, 5),
(80, 4),
(80, 5),
(81, 4),
(81, 5),
(82, 4),
(82, 5),
(83, 3),
(83, 4),
(83, 5),
(84, 4),
(84, 5),
(85, 4),
(85, 5),
(86, 4),
(86, 5),
(87, 4),
(87, 5),
(88, 4),
(88, 5),
(89, 4),
(90, 4),
(90, 5),
(91, 4),
(91, 5),
(92, 4),
(92, 5),
(93, 1),
(93, 4),
(94, 4),
(94, 5),
(95, 4),
(95, 5),
(96, 4),
(96, 5),
(97, 4),
(97, 5),
(98, 4),
(98, 5),
(99, 4),
(99, 5),
(100, 4),
(100, 5),
(101, 4),
(101, 5),
(102, 2),
(103, 2),
(104, 2),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(109, 4),
(109, 5),
(110, 4),
(110, 5),
(111, 4),
(111, 5),
(112, 4),
(112, 5),
(113, 4),
(113, 5),
(114, 4),
(114, 5),
(115, 4),
(115, 5),
(116, 4),
(116, 5),
(117, 4),
(118, 4),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 4),
(123, 5),
(124, 4),
(124, 5),
(125, 4),
(125, 5),
(126, 4),
(126, 5),
(127, 4),
(127, 5),
(128, 2),
(128, 4),
(128, 5),
(129, 4),
(129, 5),
(130, 4),
(130, 5),
(131, 2),
(132, 4),
(132, 5),
(133, 4),
(133, 5),
(134, 4),
(134, 5),
(135, 4),
(135, 5),
(136, 4),
(136, 5),
(137, 4),
(137, 5),
(138, 4),
(138, 5),
(139, 4),
(139, 5),
(140, 4),
(140, 5),
(141, 4),
(141, 5),
(142, 4),
(142, 5),
(143, 4),
(143, 5),
(144, 4),
(144, 5),
(145, 4),
(145, 5),
(146, 4),
(146, 5),
(147, 4),
(147, 5),
(148, 4),
(148, 5),
(149, 4),
(149, 5),
(150, 4),
(150, 5),
(151, 4),
(151, 5),
(152, 4),
(152, 5),
(153, 4),
(153, 5),
(154, 4),
(154, 5),
(155, 4),
(155, 5),
(156, 4),
(156, 5),
(157, 4),
(157, 5),
(158, 4),
(158, 5),
(159, 4),
(159, 5),
(160, 4),
(160, 5),
(161, 4),
(161, 5),
(162, 4),
(163, 4),
(164, 2),
(165, 4),
(166, 4),
(167, 2),
(167, 4),
(168, 4),
(169, 4),
(170, 4),
(171, 4),
(172, 2),
(172, 4),
(173, 2),
(173, 4),
(174, 2),
(174, 4),
(175, 2),
(175, 4),
(176, 4),
(177, 4),
(177, 5),
(178, 4),
(178, 5),
(179, 4),
(179, 5),
(180, 4),
(180, 5),
(181, 4),
(181, 5),
(182, 4),
(182, 5),
(183, 4),
(183, 5),
(184, 4),
(184, 5),
(185, 4),
(185, 5),
(186, 4),
(186, 5),
(187, 4),
(187, 5),
(188, 4),
(188, 5),
(189, 4),
(189, 5),
(190, 4),
(190, 5),
(191, 4),
(191, 5);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'local_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 'wasabi_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 's3_storage_validation', 'jpg,jpeg,png,xlsx,xls,csv,pdf', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 'local_storage_max_upload_size', '2048000', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 'wasabi_max_upload_size', '2048000', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 's3_max_upload_size', '2048000', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(7, 'storage_setting', 'local', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `stock_reports`
--

CREATE TABLE `stock_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

CREATE TABLE `taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `rate` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_name` varchar(255) NOT NULL,
  `prompt` text NOT NULL,
  `module` varchar(255) NOT NULL,
  `field_json` text NOT NULL,
  `is_tone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `template_name`, `prompt`, `module`, `field_json`, `is_tone`, `created_at`, `updated_at`) VALUES
(1, 'description', 'Write a long creative product description for: ##title## \n\nTarget audience is: ##audience## \n\nUse this description: ##description## \n\nTone of generated text must be:\n ##tone_language## \n\n', 'product & service', '{\"field\":[{\"label\":\"Product name\",\"placeholder\":\"e.g. VR, Honda\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Audience\",\"placeholder\":\"e.g. Women, Aliens\",\"field_type\":\"text_box\",\"field_name\":\"audience\"},{\"label\":\"Product Description\",\"placeholder\":\"e.g. VR is an innovative device that can allow you to be part of virtual world\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 'name', 'Write a long creative product description for: ##title## \n\nTarget audience is: ##audience## \n\nUse this description: ##description## \n\nTone of generated text must be:\n ##tone_language## \n\n', 'product & service', '{\"field\":[{\"label\":\"Product name\",\"placeholder\":\"e.g. VR, Honda\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Audience\",\"placeholder\":\"e.g. Women, Aliens\",\"field_type\":\"text_box\",\"field_name\":\"audience\"},{\"label\":\"Product Description\",\"placeholder\":\"e.g. VR is an innovative device that can allow you to be part of virtual world\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 'description', 'Generate content for confirming a successful payment transfer. Write a message to inform the recipient that the payment transfer has been successfully completed. The content should be concise, informative. Include the necessary  details,##note## to convey the successful transfe information.plase not cotent should be without header,footer', 'transfer', '{\"field\":[{\"label\":\"Notes\",\"placeholder\":\"e.g. any notes\",\"field_type\":\"textarea\",\"field_name\":\"note\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 'name', 'please suggest subscription plan  name  for this  :  ##description##  for my business', 'plan', '{\"field\":[{\"label\":\"What is your plan about?\",\"placeholder\":\"e.g. Describe your plan details \",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 'description', 'please suggest subscription plan description for this : ##title##: for my business', 'plan', '{\"field\":[{\"label\":\"What is your plan title?\",\"placeholder\":\"e.g. Pro Resller,Exclusive Access\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 'name', 'give 10 catchy only name of Offer or discount Coupon for : ##keywords##', 'coupon', '{\"field\":[{\"label\":\"Seed words\",\"placeholder\":\"e.g. \",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(7, 'meta_keywords', 'Write SEO meta title for:\n\n ##description## \n\nWebsite name is:\n ##title## \n\nSeed words:\n ##keywords## \n\n', 'seo settings', '{\"field\":[{\"label\":\"Website Name\",\"placeholder\":\"e.g. Amazon, Google\",\"field_type\":\"text_box\",\"field_name\":\"title\"},{\"label\":\"Website Description\",\"placeholder\":\"e.g. Describe what your website or business do\",\"field_type\":\"textarea\",\"field_name\":\"description\"},{\"label\":\"Keywords\",\"placeholder\":\"e.g.  cloud services, databases\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(8, 'meta_description', 'Write SEO meta description for:\n\n ##description## \n\nWebsite name is:\n ##title## \n\nSeed words:\n ##keywords## \n\n', 'seo settings', '{\"field\":[{\"label\":\"Seed words\",\"placeholder\":\"e.g.  Store\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"},{\"label\":\"Store Description\",\"placeholder\":\"e.g. Store product details\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(9, 'cookie_title', 'please suggest me cookie title for this ##description## website which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Website name or info\",\"placeholder\":\"e.g. example website \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(10, 'cookie_description', 'please suggest me  Cookie description for this cookie title ##title## which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Cookie Title \",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(11, 'strictly_cookie_title', 'please suggest me only Strictly Cookie Title for this ##description##  website which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Website name or info\",\"placeholder\":\"e.g. example website \",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(12, 'strictly_cookie_description', 'please suggest me Strictly Cookie description for this Strictly cookie title ##title## which i can use in my website cookie', 'cookie', '{\"field\":[{\"label\":\"Strictly Cookie Title \",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(13, 'contactus_url', 'I need assistance in crafting compelling content for my ##web_name## website\'s \'Contact Us\' page of my website. The page should provide relevant information to users, encourage them to reach out for inquiries, support, and feedback, and reflect the unique value proposition of my business.', 'cookie', '{\"field\":[{\"label\":\"Websit Name\",\"placeholder\":\"e.g. example website \",\"field_type\":\"text_box\",\"field_name\":\"web_name\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(14, 'name', 'Generate a list of account names for the \'##keywords##\' category in a company\'s chart of accounts, specifically focusing on ##type##. These account names should accurately represent various types of ##type## owned by the company and help track their financial value. Ensure that the account names are specific and provide meaningful insights into the company\'s fixed asset holdings. Aim for a diverse range of fixed asset categories to cover common types of ##keywords## found in businesses.', 'chart of accounts', '{\"field\":[{\"label\":\"Account\",\"placeholder\":\"e.g.  Asset,Liabilities\",\"field_type\":\"text_box\",\"field_name\":\"keywords\"},{\"label\":\"Store Description\",\"placeholder\":\"e.g. Current Asset,Current Liability\",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(15, 'description', 'You are creating a chart of accounts for a company, and one of the entries is \'Inventory ##name## .\' Write a descriptive explanation for this chart of accounts entry that accurately conveys its purpose and nature. The description should provide a clear understanding of what Inventory ##name##  encompass within the financial records of the company. Consider explaining the concept of Inventory ##name## , their significance in financial reporting, and any relevant information that would help users of the chart of accounts understand this entry.', 'chart of accounts', '{\"field\":[{\"label\":\"Chart of Account Name\",\"placeholder\":\"e.g.  Lease Liabilities,Inventory Expenses\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(16, 'description', 'generate description for this title ##title##', 'journal account', '{\"field\":[{\"label\":\" Title \",\"placeholder\":\"e.g.Accounts Receivable,Office Equipment\",\"field_type\":\"textarea\",\"field_name\":\"title\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(17, 'subject', 'generate contract subject for this contract description ##description##', 'contract', '{\"field\":[{\"label\":\"Contract Description\",\"placeholder\":\"e.g.\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(18, 'description', 'generate contract description for this contract subject ##subject##', 'contract', '{\"field\":[{\"label\":\"Contract Subject\",\"placeholder\":\"e.g.\",\"field_type\":\"textarea\",\"field_name\":\"subject\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(19, 'notes', 'generate contract brief description for title \'##name##\' and cover all point that sutiable to contract title', 'contract', '{\"field\":[{\"label\":\"Contract Name\",\"placeholder\":\"e.g. product return condition \",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(20, 'note', 'generate short and valuable note for contract title \'##name##\'', 'contract', '{\"field\":[{\"label\":\"Contract Name\",\"placeholder\":\"e.g. product return condition \",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(21, 'name', 'list out only just name of asset that can used in ##field_type## .the use of asset must be  for ##description##', 'assets', '{\"field\":[{\"label\":\"Asset Field\",\"placeholder\":\"IT Company ,hospital,grocery store\",\"field_type\":\"text_box\",\"field_name\":\"field_type\"},{\"label\":\"Use of asset\",\"placeholder\":\"website develop,for patient\",\"field_type\":\"textarea\",\"field_name\":\"description\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(22, 'description', 'Generate a descriptive response for a given ##title##. The response should be detailed, engaging, and informative, providing relevant information and capturing the reader\'s interest', 'assets', '{\"field\":[{\"label\":\"Asset name\",\"placeholder\":\"\",\"field_type\":\"text_box\",\"field_name\":\"title\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(23, 'name', 'give list of suitable category name for ##type##', 'category', '{\"field\":[{\"label\":\"Category Type\",\"placeholder\":\"e.g.product,service,income,expense\",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(24, 'name', 'give suitable form field for ##name## module', 'custom field', '{\"field\":[{\"label\":\"Module Name\",\"placeholder\":\"e.g. user,contract\",\"field_type\":\"text_box\",\"field_name\":\"name\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(25, 'content', 'Generate a meeting notification message for an ##topic## meeting. Include the date, time, location, and a brief agenda with three key discussion points.', 'notification template', '{\"field\":[{\"label\":\"Notification Message\",\"placeholder\":\"e.g.brief explanation of the purpose or background of the notification\",\"field_type\":\"textarea\",\"field_name\":\"topic\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(26, 'content', 'generate email template for ##type##', 'email template', '{\"field\":[{\"label\":\"Email Type\",\"placeholder\":\"e.g. new user,new client\",\"field_type\":\"text_box\",\"field_name\":\"type\"}]}', 0, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `account` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `payment_id` int(11) NOT NULL DEFAULT 0,
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_lines`
--

CREATE TABLE `transaction_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `reference_id` int(11) NOT NULL,
  `reference_sub_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_account` int(11) NOT NULL DEFAULT 0,
  `to_account` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(16,2) NOT NULL DEFAULT 0.00,
  `date` date NOT NULL,
  `payment_method` int(11) NOT NULL DEFAULT 0,
  `reference` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `lang` varchar(100) NOT NULL,
  `mode` varchar(10) NOT NULL DEFAULT 'light',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `plan` int(11) DEFAULT NULL,
  `plan_expire_date` date DEFAULT NULL,
  `requested_plan` int(11) NOT NULL DEFAULT 0,
  `referral_code` int(11) NOT NULL DEFAULT 0,
  `used_referral_code` int(11) NOT NULL DEFAULT 0,
  `storage_limit` double NOT NULL DEFAULT 0,
  `trial_plan` varchar(255) DEFAULT NULL,
  `trial_expire_date` varchar(255) NOT NULL DEFAULT '0',
  `delete_status` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_disable` int(11) NOT NULL DEFAULT 1,
  `is_enable_login` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `avatar`, `lang`, `mode`, `created_by`, `plan`, `plan_expire_date`, `requested_plan`, `referral_code`, `used_referral_code`, `storage_limit`, `trial_plan`, `trial_expire_date`, `delete_status`, `is_active`, `is_disable`, `is_enable_login`, `remember_token`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', '2025-06-10 15:15:42', '$2y$10$tf3WZyDfGzP6cQHS.Keuu.J4Qsfwjicmo2Z04QHnTlrrfbA9PGOFO', 'super admin', '', 'en', 'light', 0, NULL, NULL, 0, 0, 0, 0, NULL, '0', 1, 1, 1, 1, NULL, NULL, '2025-06-10 15:15:42', '2025-06-10 15:15:42'),
(2, 'company', 'company@example.com', '2025-06-10 15:15:43', '$2y$10$PwhR4AgX.RwNvUrIFZ1cVeTQsiz15cDcZI2DgZIVIP4yyPYsGlbOW', 'company', '', 'en', 'light', 1, 1, NULL, 0, 290333, 0, 0, NULL, '0', 1, 1, 1, 1, NULL, NULL, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 'accountant', 'accountant@example.com', '2025-06-10 15:15:43', '$2y$10$l5rj9jEuy.MSQFSXnnH0HuZz4.ne/yAZHc5BVgbyugwMQsjYmvu7y', 'accountant', '', 'en', 'light', 2, NULL, NULL, 0, 0, 0, 0, NULL, '0', 1, 1, 1, 1, NULL, NULL, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `order` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_email_templates`
--

CREATE TABLE `user_email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_email_templates`
--

INSERT INTO `user_email_templates` (`id`, `template_id`, `user_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(2, 2, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(3, 3, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(4, 4, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(5, 5, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(6, 6, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(7, 7, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(8, 8, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(9, 9, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(10, 10, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(11, 11, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(12, 12, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43'),
(13, 13, 2, 1, '2025-06-10 15:15:43', '2025-06-10 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `venders`
--

CREATE TABLE `venders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vender_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tax_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT '',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_enable_login` int(11) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `billing_country` varchar(255) DEFAULT NULL,
  `billing_state` varchar(255) DEFAULT NULL,
  `billing_city` varchar(255) DEFAULT NULL,
  `billing_phone` varchar(255) DEFAULT NULL,
  `billing_zip` varchar(255) DEFAULT NULL,
  `billing_address` text DEFAULT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_country` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(255) DEFAULT NULL,
  `shipping_zip` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `lang` varchar(255) NOT NULL DEFAULT 'en',
  `balance` decimal(15,2) NOT NULL DEFAULT 0.00,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `webhooks`
--

CREATE TABLE `webhooks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_payment_settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_accounts`
--
ALTER TABLE `bill_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_payments`
--
ALTER TABLE `bill_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_products`
--
ALTER TABLE `bill_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_of_account_parents`
--
ALTER TABLE `chart_of_account_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_of_account_sub_types`
--
ALTER TABLE `chart_of_account_sub_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_of_account_types`
--
ALTER TABLE `chart_of_account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_payment_settings`
--
ALTER TABLE `company_payment_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_payment_settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_attachments`
--
ALTER TABLE `contract_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_comments`
--
ALTER TABLE `contract_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_notes`
--
ALTER TABLE `contract_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_types`
--
ALTER TABLE `contract_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_notes`
--
ALTER TABLE `credit_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `custom_field_values_record_id_field_id_unique` (`record_id`,`field_id`),
  ADD KEY `custom_field_values_field_id_foreign` (`field_id`);

--
-- Indexes for table `debit_notes`
--
ALTER TABLE `debit_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_template_langs`
--
ALTER TABLE `email_template_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_us`
--
ALTER TABLE `join_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `join_us_email_unique` (`email`);

--
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_items`
--
ALTER TABLE `journal_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ladgers`
--
ALTER TABLE `ladgers`
  ADD PRIMARY KEY (`ladger_id`);

--
-- Indexes for table `landing_page_settings`
--
ALTER TABLE `landing_page_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `landing_page_settings_name_unique` (`name`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notification_templates`
--
ALTER TABLE `notification_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_template_langs`
--
ALTER TABLE `notification_template_langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_id_unique` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_requests`
--
ALTER TABLE `plan_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_service_categories`
--
ALTER TABLE `product_service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_service_units`
--
ALTER TABLE `product_service_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_products`
--
ALTER TABLE `proposal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_settings`
--
ALTER TABLE `referral_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_transactions`
--
ALTER TABLE `referral_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_transaction_orders`
--
ALTER TABLE `referral_transaction_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retainers`
--
ALTER TABLE `retainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retainer_payments`
--
ALTER TABLE `retainer_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retainer_products`
--
ALTER TABLE `retainer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `revenues`
--
ALTER TABLE `revenues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `stock_reports`
--
ALTER TABLE `stock_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_lines`
--
ALTER TABLE `transaction_lines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_email_templates`
--
ALTER TABLE `user_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venders`
--
ALTER TABLE `venders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webhooks`
--
ALTER TABLE `webhooks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_accounts`
--
ALTER TABLE `bill_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_payments`
--
ALTER TABLE `bill_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_products`
--
ALTER TABLE `bill_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `chart_of_account_parents`
--
ALTER TABLE `chart_of_account_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chart_of_account_sub_types`
--
ALTER TABLE `chart_of_account_sub_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chart_of_account_types`
--
ALTER TABLE `chart_of_account_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_payment_settings`
--
ALTER TABLE `company_payment_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_attachments`
--
ALTER TABLE `contract_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_comments`
--
ALTER TABLE `contract_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_notes`
--
ALTER TABLE `contract_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_types`
--
ALTER TABLE `contract_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credit_notes`
--
ALTER TABLE `credit_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_notes`
--
ALTER TABLE `debit_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `email_template_langs`
--
ALTER TABLE `email_template_langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_payments`
--
ALTER TABLE `invoice_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `join_us`
--
ALTER TABLE `join_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal_entries`
--
ALTER TABLE `journal_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal_items`
--
ALTER TABLE `journal_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ladgers`
--
ALTER TABLE `ladgers`
  MODIFY `ladger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landing_page_settings`
--
ALTER TABLE `landing_page_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `notification_templates`
--
ALTER TABLE `notification_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification_template_langs`
--
ALTER TABLE `notification_template_langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plan_requests`
--
ALTER TABLE `plan_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_service_categories`
--
ALTER TABLE `product_service_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_service_units`
--
ALTER TABLE `product_service_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal_products`
--
ALTER TABLE `proposal_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_settings`
--
ALTER TABLE `referral_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_transactions`
--
ALTER TABLE `referral_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referral_transaction_orders`
--
ALTER TABLE `referral_transaction_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retainers`
--
ALTER TABLE `retainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retainer_payments`
--
ALTER TABLE `retainer_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `retainer_products`
--
ALTER TABLE `retainer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `revenues`
--
ALTER TABLE `revenues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock_reports`
--
ALTER TABLE `stock_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_lines`
--
ALTER TABLE `transaction_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_email_templates`
--
ALTER TABLE `user_email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `venders`
--
ALTER TABLE `venders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `webhooks`
--
ALTER TABLE `webhooks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `custom_field_values`
--
ALTER TABLE `custom_field_values`
  ADD CONSTRAINT `custom_field_values_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `custom_fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
