-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 10:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nshoptopup`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `status` enum('pandding','complete','cancel') COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(255) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_number` int(11) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `buy_price`, `sale_price`, `package_id`, `status`, `user_id`, `type`, `transaction_id`, `payment_number`, `payment_method`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'asd', 2, 123, 12, 'complete', 0, '', NULL, 0, 0, '', '', NULL, '2020-09-01 10:58:10'),
(2, '1800 UC', 1800, 1800, 6, 'pandding', 1, '', NULL, 0, 0, '', '', '2020-08-16 08:10:14', '2020-08-16 09:20:47'),
(3, '1800 UC', 1800, 1800, 6, 'pandding', 1, '', NULL, 0, 0, '', '', '2020-08-16 08:13:24', '2020-08-16 09:19:28'),
(4, '1800 UC', 1800, 1800, 6, 'pandding', 1, '', NULL, 0, 0, '', '', '2020-08-16 08:16:10', '2020-08-16 09:20:51'),
(5, '1800 UC', 1800, 1800, 6, 'pandding', 1, '', NULL, 0, 0, '', '', '2020-08-16 11:07:02', '2020-08-16 11:07:02'),
(6, '60 UC', 400, 400, 3, 'pandding', 1, '', NULL, 0, 0, '', '', '2020-08-16 11:07:45', '2020-08-16 11:07:45'),
(7, '1800 UC', 1800, 1800, 6, 'pandding', 1, 'null', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-16 11:14:33', '2020-08-16 11:14:33'),
(8, '60 UC', 400, 400, 3, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-16 11:19:24', '2020-08-16 11:19:24'),
(9, '3850 UC', 3850, 3850, 8, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-16 11:19:47', '2020-08-16 11:19:47'),
(10, '1800 UC', 1800, 1800, 6, 'cancel', 1, 'facebook', NULL, 0, 0, 'sfdgsdfg', 'ajstyle1', '2020-08-16 11:49:35', '2020-08-28 12:14:00'),
(11, '325 UC', 1000, 1002, 4, 'complete', 1, 'ID Code', NULL, 0, 0, 'sadf44545a4sdfasd', 'ID Code', '2020-08-16 11:53:14', '2020-08-17 13:07:34'),
(12, '3850 UC', 3850, 3850, 8, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-18 08:49:02', '2020-08-18 08:49:02'),
(13, '60 UC', 400, 400, 3, 'pandding', 1, 'ID Code', NULL, 0, 0, 'asdasdasd', 'ID Code', '2020-08-27 07:48:34', '2020-08-27 07:48:34'),
(14, '60 UC', 400, 400, 3, 'pandding', 1, 'ID Code', NULL, 0, 0, 'asasfasf', 'ID Code', '2020-08-27 07:49:11', '2020-08-27 07:49:11'),
(15, '60 UC', 400, 400, 3, 'pandding', 1, 'ID Code', NULL, 0, 0, 'asdasdasd', 'ID Code', '2020-08-27 07:49:25', '2020-08-27 07:49:25'),
(16, '60 UC', 400, 400, 3, 'pandding', 1, 'ID Code', NULL, 0, 0, 'asasf', 'ID Code', '2020-08-27 08:09:53', '2020-08-27 08:09:53'),
(17, '8100 UC', 4500, 5000, 7, 'pandding', 1, 'ID Code', NULL, 0, 0, 'asdasdasdasdasd', 'ID Code', '2020-08-27 08:58:16', '2020-08-27 08:58:16'),
(18, '60 UC', 400, 400, 3, 'pandding', 1, 'ID Code', NULL, 0, 0, 'asdasdasd', 'ID Code', '2020-08-27 09:10:11', '2020-08-27 09:10:11'),
(19, '60 UC', 400, 400, 3, 'pandding', 1, 'ID Code', NULL, 0, 0, 'asdasdasd', 'ID Code', '2020-08-27 09:14:11', '2020-08-27 09:14:11'),
(20, '60 UC', 400, 400, 3, 'pandding', 1, 'ID Code', NULL, 0, 0, 'asdasdasd', 'ID Code', '2020-08-27 09:15:13', '2020-08-27 09:15:13'),
(21, '60 UC', 400, 1, 3, 'cancel', 1, 'ID Code', NULL, 0, 0, '7HO3DDN0O5', 'ID Code', '2020-08-27 09:27:53', '2020-08-27 09:29:04'),
(22, '60 UC', 400, 1, 3, 'complete', 1, 'gmail', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-28 12:35:41', '2020-08-28 12:36:55'),
(23, '1800 UC', 1800, 1800, 6, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-30 02:56:48', '2020-08-30 02:56:48'),
(24, '60 UC', 400, 1, 3, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-30 03:01:14', '2020-08-30 03:01:14'),
(25, '60 UC', 400, 1, 3, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-30 03:15:53', '2020-08-30 03:15:53'),
(26, '60 UC', 400, 1, 3, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-30 03:19:38', '2020-08-30 03:19:38'),
(27, '60 UC', 400, 1, 3, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-31 11:55:01', '2020-08-31 11:55:01'),
(28, '60 UC', 400, 1, 3, 'pandding', 1, 'facebook', NULL, 0, 0, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-31 12:00:52', '2020-08-31 12:00:52'),
(29, '1800 UC', 1800, 1800, 6, 'complete', 1, 'facebook', 'ASFDASFASDF', 1475988448, 2, 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-09-07 13:11:19', '2020-09-07 13:11:19'),
(30, '1800 UC', 1800, 1800, 6, 'pandding', 3, 'facebook', 'asfdasdasd', 124512451, 1, 'jamil88481552@gmail.com', 'ajstyle1', '2020-09-07 13:39:56', '2020-09-07 13:39:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
