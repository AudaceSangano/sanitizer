-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2023 at 06:53 PM
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
-- Table structure for table `closes`
--

CREATE TABLE `closes` (
  `close_id` bigint UNSIGNED NOT NULL,
  `close_user` bigint UNSIGNED NOT NULL,
  `close_currency` int NOT NULL,
  `close_system_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `close_result_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `closes`
--

INSERT INTO `closes` (`close_id`, `close_user`, `close_currency`, `close_system_amount`, `close_result_amount`, `created_at`, `updated_at`) VALUES
(4, 8, 169, '15971', '2280', '2023-07-04 11:26:08', '2023-07-04 09:34:32'),
(5, 8, 59, '0', '185', '2023-07-04 11:44:11', '2023-07-04 11:44:11'),
(6, 8, 139, '66879504', '8680', '2023-07-04 11:50:55', '2023-07-04 11:50:55'),
(7, 8, 55, '66879504', '2100', '2023-07-05 07:21:17', '2023-07-05 07:21:17'),
(8, 8, 21, '0', '0', '2023-07-05 07:36:35', '2023-07-05 07:36:35'),
(9, 8, 86, '7000', '7000', '2023-07-05 07:40:49', '2023-07-05 07:40:49'),
(10, 8, 33, '200', '400', '2023-07-05 07:47:57', '2023-07-05 05:56:21'),
(11, 8, 168, '0', '200000', '2023-07-05 07:50:47', '2023-07-05 07:50:47'),
(12, 8, 165, '30000', '35000', '2023-07-05 07:54:43', '2023-07-05 07:54:43'),
(13, 8, 139, '66879504', '0', '2023-07-05 08:25:09', '2023-07-05 08:25:09'),
(14, 8, 169, '15971', '16600', '2023-07-05 14:00:31', '2023-07-05 14:00:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `closes`
--
ALTER TABLE `closes`
  ADD PRIMARY KEY (`close_id`),
  ADD KEY `closes_close_user_foreign` (`close_user`),
  ADD KEY `closes_close_currency_foreign` (`close_currency`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `closes`
--
ALTER TABLE `closes`
  MODIFY `close_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `closes`
--
ALTER TABLE `closes`
  ADD CONSTRAINT `closes_close_currency_foreign` FOREIGN KEY (`close_currency`) REFERENCES `currency` (`currency_id`),
  ADD CONSTRAINT `closes_close_user_foreign` FOREIGN KEY (`close_user`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
