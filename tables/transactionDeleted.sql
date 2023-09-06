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
-- Table structure for table `transactionDeleted`
--

CREATE TABLE `transactionDeleted` (
  `tra_id` bigint UNSIGNED NOT NULL,
  `tra_receiver_names` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_receiver_telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_receiver_id_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_receiver_id_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_receiver_occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_receiver_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_receiver_country` bigint UNSIGNED NOT NULL,
  `tra_receiver_district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_sender_names` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_sender_telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_sender_id_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_sender_id_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_sender_occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_sender_city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_sender_country` bigint UNSIGNED NOT NULL,
  `tra_sender_district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_receiver_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tra_type` enum('in','out') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_teller` bigint UNSIGNED NOT NULL,
  `tra_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_transfer_fees` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_transfer_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_reference` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tran_service_touse` bigint UNSIGNED NOT NULL,
  `tra_status` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tra_currency` int NOT NULL,
  `tra_file` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tra_rollback_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactionDeleted`
--

INSERT INTO `transactionDeleted` (`tra_id`, `tra_receiver_names`, `tra_receiver_telephone`, `tra_receiver_id_type`, `tra_receiver_id_number`, `tra_receiver_occupation`, `tra_receiver_city`, `tra_receiver_country`, `tra_receiver_district`, `tra_sender_names`, `tra_sender_telephone`, `tra_sender_id_type`, `tra_sender_id_number`, `tra_sender_occupation`, `tra_sender_city`, `tra_sender_country`, `tra_sender_district`, `tra_receiver_code`, `tra_type`, `tra_teller`, `tra_amount`, `tra_transfer_fees`, `tra_transfer_reason`, `tra_reference`, `tran_service_touse`, `tra_status`, `tra_currency`, `tra_file`, `tra_rollback_comment`, `created_at`, `updated_at`) VALUES
(3993, 'Kabagwira Bagwire', NULL, NULL, NULL, NULL, 'Kigali', 175, NULL, 'Kamana kalisa', '0722696343', 'National ID', 'Estate', 'Teacher', 'Kigali', 184, 'Gasabo', NULL, 'out', 12, '100', '18', 'Goods arriving in or leaving Rwanda', 'MAICO-OUT/16869250623819652', 1, '0', 2, 'uploaded_files/1686925062_Screenshot from 2023-06-13 14-42-23.png', NULL, '2023-06-19 14:17:42', '2023-06-19 07:35:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactionDeleted`
--
ALTER TABLE `transactionDeleted`
  ADD PRIMARY KEY (`tra_id`),
  ADD KEY `transactions_tra_teller_foreign` (`tra_teller`),
  ADD KEY `transactions_tran_service_touse_foreign` (`tran_service_touse`),
  ADD KEY `transactions_tra_receiver_country_foreign` (`tra_receiver_country`),
  ADD KEY `transactions_tra_sender_country_foreign` (`tra_sender_country`),
  ADD KEY `tra_currency` (`tra_currency`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactionDeleted`
--
ALTER TABLE `transactionDeleted`
  MODIFY `tra_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3994;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactionDeleted`
--
ALTER TABLE `transactionDeleted`
  ADD CONSTRAINT `transactionDeleted_ibfk_1` FOREIGN KEY (`tra_currency`) REFERENCES `currencies` (`cur_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transactionDeleted_ibfk_2` FOREIGN KEY (`tra_receiver_country`) REFERENCES `countries` (`country_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transactionDeleted_ibfk_3` FOREIGN KEY (`tra_sender_country`) REFERENCES `countries` (`country_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transactionDeleted_ibfk_4` FOREIGN KEY (`tra_teller`) REFERENCES `tellers` (`teller_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `transactionDeleted_ibfk_5` FOREIGN KEY (`tran_service_touse`) REFERENCES `partners` (`partner_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
