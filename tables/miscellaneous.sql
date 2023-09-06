-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2023 at 06:54 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maico`
--

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous`
--

CREATE TABLE `miscellaneous` (
  `mis_id` bigint UNSIGNED NOT NULL,
  `mis_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mis_user` bigint UNSIGNED NOT NULL,
  `mis_customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mis_customer_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mis_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mis_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mis_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mis_type` enum('receive','send') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mis_status` enum('success','cancelling','deleted') COLLATE utf8mb4_unicode_ci DEFAULT 'success',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `miscellaneous`
--

INSERT INTO `miscellaneous` (`mis_id`, `mis_reason`, `mis_user`, `mis_customer_name`, `mis_customer_tel`, `mis_currency`, `mis_amount`, `mis_account`, `mis_type`, `mis_status`, `created_at`, `updated_at`) VALUES
(1, 'hi', 15, 'Audace', '0783503691', 'RWF', '1000000', 'mt', 'receive', 'success', '2023-06-22 12:39:42', '2023-06-22 12:39:42'),
(2, 'test qwerty', 15, 'audace SANGANO', '0783503691', 'USD', '100', 'mt', 'receive', 'success', '2023-06-22 12:41:22', '2023-06-22 12:41:22'),
(3, 'test fx', 15, 'audace SANGANO', '0783503691', 'RWF', '1000', 'fx', 'receive', 'success', '2023-06-22 13:17:07', '2023-06-22 13:17:07'),
(4, 'test fx', 15, 'audace SANGANO', '0783503691', 'RWF', '1000', 'fx', 'receive', 'success', '2023-06-22 13:18:00', '2023-06-22 13:18:00'),
(5, 'qwerty', 15, 'audace SANGANO', '0783503691', 'BIF', '1000', 'fx', 'receive', 'success', '2023-06-23 14:22:35', '2023-06-23 14:24:20'),
(6, 'test transaction', 15, 'jojo', '0788888888', 'RWF', '10000', 'fx', 'send', 'success', '2023-06-23 15:22:28', '2023-06-23 15:24:03'),
(7, 'test sano', 15, 'audace SANGANO', '0783503691', 'RWF', '2000', 'mt', 'receive', 'success', '2023-06-23 14:38:17', '2023-06-23 14:38:17'),
(8, 'qwerty', 15, 'audace SANGANO', '0783503691', 'RWF', '2000', 'fx', 'send', 'deleted', '2023-06-23 15:38:17', '2023-06-23 15:42:06'),
(9, 'qwerty', 15, 'Audace', '0783503691', 'USD', '1000', 'fx', 'receive', 'deleted', '2023-06-23 15:53:17', '2023-06-23 15:53:36'),
(10, 'test miscellaneous transaction', 15, 'Audace', '0788888888', 'EUR', '10000', 'fx', 'receive', 'deleted', '2023-06-27 07:39:24', '2023-06-27 07:39:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  ADD PRIMARY KEY (`mis_id`),
  ADD KEY `miscellaneous_mis_user_foreign` (`mis_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  MODIFY `mis_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `miscellaneous`
--
ALTER TABLE `miscellaneous`
  ADD CONSTRAINT `miscellaneous_mis_user_foreign` FOREIGN KEY (`mis_user`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
