-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 01:13 PM
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
-- Database: `kmf`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Garena', '1597388845.jpeg', '2020-08-14 01:07:25', '2020-08-14 01:07:25'),
(3, '444', '1597516878.png', '2020-08-15 12:41:18', '2020-08-15 12:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_07_122845_create_oauth_providers_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_06_26_062810_create_products_table', 1),
(6, '2020_07_01_151556_create_brands_table', 1),
(7, '2020_07_07_175033_create_packages_table', 1),
(8, '2020_07_08_175838_create_orders_table', 1),
(9, '2020_07_10_100405_create_payment_methods_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_providers`
--

CREATE TABLE `oauth_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `access_token` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `refresh_token` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `buy_price`, `sale_price`, `package_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asd', 2, 123, 12, 'pandding', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `buy_price`, `sale_price`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'Speacial discount', 200, 180, 7, '2020-08-14 01:53:29', '2020-08-14 01:53:29'),
(2, 'Offer', 100, 120, 5, '2020-08-14 01:58:00', '2020-08-14 02:01:23'),
(3, '60 UC', 400, 400, 4, '2020-08-14 11:10:27', '2020-08-14 11:10:27'),
(4, '325 UC', 1000, 1002, 4, '2020-08-14 11:10:53', '2020-08-14 11:10:53'),
(5, '660 UC', 4000, 4100, 4, '2020-08-14 11:11:16', '2020-08-14 11:11:16'),
(6, '1800 UC', 1800, 1800, 4, '2020-08-14 11:11:44', '2020-08-14 11:11:44'),
(7, '8100 UC', 4500, 5000, 4, '2020-08-14 11:12:08', '2020-08-14 11:12:08'),
(8, '3850 UC', 3850, 3850, 4, '2020-08-14 11:12:29', '2020-08-14 11:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `logo` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `number`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'bKash', 250, '1597402368.png', '2020-08-14 04:41:43', '2020-08-14 04:52:48'),
(2, 'Nogod', 5000, '1597402412.jpeg', '2020-08-14 04:53:32', '2020-08-14 04:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `tag_line` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `tag_line`, `description`, `logo`, `type`, `created_at`, `updated_at`) VALUES
(1, 'PUBG mobile', 'finis', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388111.jpeg', '1', '2020-08-13 21:49:55', '2020-08-14 00:55:11'),
(2, 'Amazon (USD)', 'Amazon.com, Inc.', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388183.png', '0', '2020-08-13 23:22:02', '2020-08-14 00:56:23'),
(4, 'PUBG Mobile', 'Tencent Games', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597387850.jpeg', '0', '2020-08-14 00:50:50', '2020-08-14 00:50:50'),
(5, 'Minecraft', 'Mojang', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388033.jpeg', '0', '2020-08-14 00:51:15', '2020-08-14 00:53:53'),
(6, 'iTunes Gift Card (USD)', 'Apple', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388246.jpeg', '0', '2020-08-14 00:57:26', '2020-08-14 00:57:26'),
(7, 'Xbox Live (US)', 'Xbox Live (US)', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388291.png', '0', '2020-08-14 00:58:11', '2020-08-14 00:58:11'),
(8, 'Nintendo eShop Cards', 'Nintendo', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388328.jpeg', '0', '2020-08-14 00:58:48', '2020-08-14 00:58:48'),
(9, 'The Coldest Sunset', 'Garena', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597403046.jpeg', '0', '2020-08-14 05:04:06', '2020-08-14 05:04:06'),
(10, 'The Coldest Sunset', 'Garena', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597403074.jpeg', '0', '2020-08-14 05:04:34', '2020-08-14 05:04:34'),
(11, 'Super Power Garena', 'Garena', '<p>&nbsp;</p>\r\n\r\n<p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>\r\n\r\n<p>&nbsp;</p>', '1597422422.jpeg', '1', '2020-08-14 10:27:02', '2020-08-14 13:05:22'),
(12, 'Garena Bangla', 'Garena', '<p>this is test</p>', '1597431560.png', '1', '2020-08-14 12:59:20', '2020-08-14 12:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jamil', 'mdjamilaj1@gmail.com', NULL, '$2y$10$dejC2zIKMZh1corZaG0CUuuhdmh6.IySPr48AtaQV8HkGd34HXCQi', NULL, '2020-08-13 21:21:54', '2020-08-13 21:21:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_providers`
--
ALTER TABLE `oauth_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_providers_user_id_foreign` (`user_id`),
  ADD KEY `oauth_providers_provider_user_id_index` (`provider_user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oauth_providers`
--
ALTER TABLE `oauth_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oauth_providers`
--
ALTER TABLE `oauth_providers`
  ADD CONSTRAINT `oauth_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
