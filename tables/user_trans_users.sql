-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2023 at 06:55 PM
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
-- Table structure for table `user_trans_users`
--

CREATE TABLE `user_trans_users` (
  `user_tra_id` bigint UNSIGNED NOT NULL,
  `user_tra_reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_tra_amount` decimal(16,2) NOT NULL,
  `user_tra_user` bigint UNSIGNED NOT NULL,
  `user_tra_receiver` bigint UNSIGNED NOT NULL,
  `user_tra_currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_tra_source` enum('mt','fx') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_tra_destination` enum('mt','fx') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_tra_status` enum('pending','confirmed','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_trans_users`
--

INSERT INTO `user_trans_users` (`user_tra_id`, `user_tra_reason`, `user_tra_amount`, `user_tra_user`, `user_tra_receiver`, `user_tra_currency`, `user_tra_source`, `user_tra_destination`, `user_tra_status`, `created_at`, `updated_at`) VALUES
(1, 'test initial', '1000.00', 15, 8, 'USD', 'mt', NULL, 'pending', '2023-06-13 13:43:34', '2023-06-14 14:38:21'),
(2, 'qwerty', '100.00', 15, 13, 'USD', 'fx', NULL, 'pending', '2023-06-13 14:04:18', '2023-06-13 14:04:18'),
(3, 'test', '100000.00', 8, 15, 'RWF', 'fx', NULL, 'pending', '2023-06-14 13:16:27', '2023-06-23 08:04:59'),
(4, 'test', '1000.00', 15, 8, 'RWF', 'fx', NULL, 'cancelled', '2023-06-15 09:40:41', '2023-06-27 07:31:45'),
(5, 'test', '123.00', 8, 5, 'USD', 'fx', NULL, 'pending', '2023-06-15 09:41:50', '2023-06-15 10:20:22'),
(6, 'test fx transaction', '10000000000.00', 8, 2, 'RWF', 'fx', NULL, 'pending', '2023-06-15 10:23:28', '2023-06-15 10:50:37'),
(7, 'test final', '100.00', 15, 8, 'RWF', 'mt', 'mt', 'confirmed', '2023-06-16 08:26:12', '2023-06-16 09:10:18'),
(8, 'test', '1000.00', 8, 15, 'USD', 'fx', NULL, 'cancelled', '2023-06-16 09:18:21', '2023-06-16 11:43:20'),
(9, 'test', '1000.00', 8, 15, 'KES', 'fx', 'fx', 'confirmed', '2023-06-16 10:12:23', '2023-06-16 10:45:34'),
(10, 'test usd', '1000.00', 15, 8, 'USD', 'mt', 'mt', 'confirmed', '2023-06-16 11:35:36', '2023-06-16 11:41:56'),
(11, 'final user2user test', '1000.00', 8, 15, 'EUR', 'fx', 'fx', 'confirmed', '2023-06-27 07:30:43', '2023-06-27 07:31:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_trans_users`
--
ALTER TABLE `user_trans_users`
  ADD PRIMARY KEY (`user_tra_id`),
  ADD KEY `user_trans_users_user_tra_user_foreign` (`user_tra_user`),
  ADD KEY `user_trans_users_user_tra_receiver_foreign` (`user_tra_receiver`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_trans_users`
--
ALTER TABLE `user_trans_users`
  MODIFY `user_tra_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_trans_users`
--
ALTER TABLE `user_trans_users`
  ADD CONSTRAINT `user_trans_users_user_tra_receiver_foreign` FOREIGN KEY (`user_tra_receiver`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_trans_users_user_tra_user_foreign` FOREIGN KEY (`user_tra_user`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
