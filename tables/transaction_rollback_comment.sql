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
-- Table structure for table `transaction_rollback_comment`
--

CREATE TABLE `transaction_rollback_comment` (
  `roll_com_id` bigint UNSIGNED NOT NULL,
  `roll_com_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `roll_com_transaction` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction_rollback_comment`
--
ALTER TABLE `transaction_rollback_comment`
  ADD PRIMARY KEY (`roll_com_id`),
  ADD KEY `transaction_rollback_comment_roll_com_transaction_foreign` (`roll_com_transaction`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction_rollback_comment`
--
ALTER TABLE `transaction_rollback_comment`
  MODIFY `roll_com_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_rollback_comment`
--
ALTER TABLE `transaction_rollback_comment`
  ADD CONSTRAINT `transaction_rollback_comment_roll_com_transaction_foreign` FOREIGN KEY (`roll_com_transaction`) REFERENCES `transactions` (`tra_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
