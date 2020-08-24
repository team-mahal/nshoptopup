-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 08:36 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'md jamil', 'mdjamilaj1@gmail.com', '$2y$10$dejC2zIKMZh1corZaG0CUuuhdmh6.IySPr48AtaQV8HkGd34HXCQi', 1, 'bAFdOMXL5ATJVXwHAUw3pvsDeQHQoD57DMSF4METxYbPtUZFemW7DXFllQZR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `logo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'This is simple title TEst', '1597849933.jpeg', '<p>This is Simple Blog For KMF TEst</p>', '2020-08-19 07:21:53', '2020-08-19 10:06:10'),
(3, 'The Definition of Blog', '1597886275.jpeg', '<p>Do you know what a blog is? If you don&rsquo;t, then you&rsquo;ve come to the right place. In 1994, when blogs began, a blog was more of a personal diary that people shared online. In this online journal, you could talk about your daily life or share about things that you were doing. Then, people saw an opportunity to communicate information in a new way online. Thus began the beautiful world of blogging.</p>', '2020-08-19 08:24:04', '2020-08-19 19:17:55'),
(4, 'What is the purpose of a blog?', '1597849942.jpeg', '<p>There are many reasons to start a blog for personal use and only a handful of strong ones for business blogging. Blogging for business, projects, or anything else that might bring you money has a very straightforward purpose &ndash; to rank your website higher in Google SERPs, a.k.a. increase your visibility.</p>\r\n\r\n<p>As a business, you rely on consumers to keep buying your products and services. As a new business, you rely on blogging to help you get to potential consumers and grab their attention. Without blogging, your website would remain invisible, whereas running a blog makes you searchable and competitive.</p>\r\n\r\n<p>So, the main purpose of a blog is to connect you to the relevant audience. Another one is to boost your traffic and send quality leads to your website.</p>\r\n\r\n<p>The more frequent and better your blog posts are, the higher the chances for your website to get discovered and visited by your target audience. This means that a blog is an effective lead generation tool. Add a great call to action (CTA) to your content, and it will convert your website traffic into high-quality leads. A blog also allows you to showcase your niche authority and build a brand.</p>\r\n\r\n<p>When you use your niche knowledge for creating informative and engaging posts, it builds trust with your audience. Great blogging makes your business look more credible, which is especially important if your brand is still young and fairly unknown. It ensures presence online and niche authority at the same time.</p>', '2020-08-19 08:26:02', '2020-08-19 09:12:22'),
(5, 'Choose the perfect design', '1597886234.png', '<p>Create a beautiful blog that fits your style. Choose from a selection of easy-to-use templates &ndash; all with flexible layouts and hundreds of background images &ndash; or design something new.</p>', '2020-08-19 19:17:15', '2020-08-19 19:17:15');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `sub_total`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 27030, '', '2020-08-22 12:55:06', '2020-08-22 12:55:06'),
(2, 1, 0, 27030, 'cancel', '2020-08-22 13:08:54', '2020-08-23 12:33:47'),
(3, 1, 0, 27030, 'complete', '2020-08-22 13:11:46', '2020-08-23 12:33:16'),
(4, 1, 0, 200, 'cancel', '2020-08-22 13:13:14', '2020-08-23 11:58:50');

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
(9, '2020_07_10_100405_create_payment_methods_table', 1),
(10, '2020_08_18_154216_create_admins_table', 2),
(11, '2020_08_19_125023_create_blogs_table', 3),
(12, '2020_08_22_182128_create_invoices_table', 4),
(13, '2020_08_22_182830_create_shop_details_table', 5);

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
  `user_id` int(255) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `buy_price`, `sale_price`, `package_id`, `status`, `user_id`, `type`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'asd', 2, 123, 12, 'cancel', 0, '', '', '', NULL, '2020-08-16 09:20:22'),
(2, '1800 UC', 1800, 1800, 6, 'pandding', 1, '', '', '', '2020-08-16 08:10:14', '2020-08-16 09:20:47'),
(3, '1800 UC', 1800, 1800, 6, 'pandding', 1, '', '', '', '2020-08-16 08:13:24', '2020-08-16 09:19:28'),
(4, '1800 UC', 1800, 1800, 6, 'pandding', 1, '', '', '', '2020-08-16 08:16:10', '2020-08-16 09:20:51'),
(5, '1800 UC', 1800, 1800, 6, 'pandding', 1, '', '', '', '2020-08-16 11:07:02', '2020-08-16 11:07:02'),
(6, '60 UC', 400, 400, 3, 'pandding', 1, '', '', '', '2020-08-16 11:07:45', '2020-08-16 11:07:45'),
(7, '1800 UC', 1800, 1800, 6, 'pandding', 1, 'null', 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-16 11:14:33', '2020-08-16 11:14:33'),
(8, '60 UC', 400, 400, 3, 'pandding', 1, 'facebook', 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-16 11:19:24', '2020-08-16 11:19:24'),
(9, '3850 UC', 3850, 3850, 8, 'pandding', 1, 'facebook', 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-16 11:19:47', '2020-08-16 11:19:47'),
(10, '1800 UC', 1800, 1800, 6, 'pandding', 1, 'facebook', 'sfdgsdfg', 'ajstyle1', '2020-08-16 11:49:35', '2020-08-16 11:49:35'),
(11, '325 UC', 1000, 1002, 4, 'complete', 1, 'ID Code', 'sadf44545a4sdfasd', 'ID Code', '2020-08-16 11:53:14', '2020-08-17 13:07:34'),
(12, '3850 UC', 3850, 3850, 8, 'pandding', 1, 'facebook', 'mdjamilaj1@gmail.com', 'ajstyle1', '2020-08-18 08:49:02', '2020-08-18 08:49:02');

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
  `tag_line` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(1) DEFAULT NULL,
  `buy_price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `is_shop` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `tag_line`, `description`, `logo`, `type`, `buy_price`, `sale_price`, `is_shop`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'PUBG mobile', 'finis', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388111.jpeg', 2, 0, 0, 0, 1, '2020-08-13 21:49:55', '2020-08-14 00:55:11'),
(2, 'Amazon (USD)', 'Amazon.com, Inc.', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388183.png', 1, 0, 0, 0, 1, '2020-08-13 23:22:02', '2020-08-14 00:56:23'),
(4, 'PUBG Mobile', 'Tencent Games', '<p>&nbsp;</p>\r\n\r\n<p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>\r\n\r\n<p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>\r\n\r\n<p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>About PUBG Mobile:</strong></p>\r\n\r\n<p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597387850.jpeg', 2, 0, 0, 0, 1, '2020-08-14 00:50:50', '2020-08-16 12:00:52'),
(5, 'Minecraft', 'Mojang', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388033.jpeg', 1, 0, 0, 0, 1, '2020-08-14 00:51:15', '2020-08-14 00:53:53'),
(6, 'iTunes Gift Card (USD)', 'Apple', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388246.jpeg', 1, 0, 0, 0, 1, '2020-08-14 00:57:26', '2020-08-14 00:57:26'),
(7, 'Xbox Live (US)', 'Xbox Live (US)', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388291.png', 1, 0, 0, 0, 1, '2020-08-14 00:58:11', '2020-08-14 00:58:11'),
(8, 'Nintendo eShop Cards', 'Nintendo', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597388328.jpeg', 1, 0, 0, 0, 1, '2020-08-14 00:58:48', '2020-08-14 00:58:48'),
(9, 'The Coldest Sunset', 'Garena', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597403046.jpeg', 1, 0, 0, 0, 1, '2020-08-14 05:04:06', '2020-08-14 05:04:06'),
(10, 'The Coldest Sunset', 'Garena', '<p>&nbsp;</p>  <p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>  <p><strong>Buy Unknown Cash (UC) Credits PUBG Mobile via UniPin Credits, UniPin Wallet, bKash and many more! No credit card or account registration required.</strong></p>  <p><strong>It&#39;s easy! Just select the desired denomination, complete the payment, and the Unknown Cash (UC) Credits will immediately be added into your PUBG Mobile account!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>About PUBG Mobile:</strong></p>  <p><strong>PUBG Mobile is a mobile game that having 100 players parachute onto a remote 8x8 km island for a winner-takes-all showdown. Players have to locate and scavenge their own weapons, vehicles and supplies, and defeat every player in a graphically and tactically rich battleground that forces players into a shrinking play zone. Get ready to land, loot, and do whatever it takes to survive and be the last man standing!</strong></p>  <p><strong>&nbsp;</strong></p>  <p><strong>How to redeem Unknown Credits at&nbsp;<a href=\"https://www.midasbuy.com/ot/redeem/pubgm\">https://www.midasbuy.com/ot/redeem/pubgm</a></strong></p>', '1597403074.jpeg', 1, 0, 0, 0, 1, '2020-08-14 05:04:34', '2020-08-14 05:04:34'),
(11, 'Super Power Garena', 'Garena', '<p>&nbsp;</p>\r\n\r\n<p><strong>Top Up Unknown Cash (UC) Credits PUBG Mobile fast and cheap in UniPin now!</strong></p>\r\n\r\n<p>&nbsp;</p>', '1597422422.jpeg', 2, 0, 0, 0, 1, '2020-08-14 10:27:02', '2020-08-14 13:05:22'),
(12, 'Garena Bangla', 'Garena', '<p>this is test</p>', '1597431560.png', 2, 0, 0, 0, 1, '2020-08-14 12:59:20', '2020-08-14 12:59:20'),
(13, 'Garena', NULL, '<p>This is shop product</p>', '1597941876.jpeg', 0, 200, 200, 1, 1, '2020-08-20 10:15:11', '2020-08-20 10:44:36'),
(14, 'Free-fire', NULL, '<p>this is free fire shell product</p>', '1597945167.jpeg', 0, 200, 200, 1, 1, '2020-08-20 11:39:27', '2020-08-20 11:39:27'),
(15, 'Free Fire', NULL, '<p>500 dimond topup</p>', '1597945235.jpeg', 0, 500, 540, 1, 1, '2020-08-20 11:40:35', '2020-08-20 12:28:10'),
(16, 'Garena Shop', NULL, '<h2>Product details of Garena Shell 500 - For Malaysia Server - Free Fire - Email Delivery</h2>\r\n\r\n<ul>\r\n	<li>Return Policy is not applicable for this Item</li>\r\n	<li>Online Currency for Garena gaming platforms &amp; operated games</li>\r\n	<li>Can use their Garena Shells to purchase many products &amp; services on Garena platform</li>\r\n	<li>In-Game items can also be purchased using Garena Shells</li>\r\n	<li>Check out what is available at Garena Shop now</li>\r\n	<li>No return/refund</li>\r\n	<li>Daraz Bangladesh is not liable for any misuse of the codes</li>\r\n	<li>Make sure Your account Can login to the website below :https://shop.garena.my</li>\r\n</ul>\r\n\r\n<p>Online Currency for Garena gaming platforms &amp; operated games.. Can use their Garena Shells to purchase many products &amp; services on Garena platform.. In-Game items can also be purchased using Garena Shells.. Check out what is available at Garena Shop now.. No return/refund... Daraz Bangladesh is not liable for any misuse of the codes.. Make sure Your account Can login to the website below :https://shop.garena.my</p>', '1597945286.jpeg', 0, 8000, 8450, 1, 1, '2020-08-20 11:41:26', '2020-08-20 11:41:26'),
(17, 'Garena Product', NULL, '<h3>What is Garena Shells?</h3>\r\n\r\n<p>Garena Shells is the online currency of Garena gaming platform and Garena operated games. Garena users can use their Garena Shells to purchase in-game items, products and services for League of Legends, FIFA Online 3 PC, Heroes of Newerth, FIFA Online 3 M, Free Fire, Contra: Return and Speed Drifters.</p>\r\n\r\n<h3>How to reload Garena account with Garena Shells?</h3>\r\n\r\n<ol>\r\n	<li>Go to&nbsp;Garena Topup Center.</li>\r\n	<li>Login to your Garena Account.</li>\r\n	<li>Click Shell Top Up and select Garena Prepaid Card.</li>\r\n	<li>Enter your Garena Shell Prepaid Card Password and click Confirm to complete top up</li>\r\n</ol>', '1597945336.png', 0, 5420, 6240, 1, 1, '2020-08-20 11:42:16', '2020-08-20 11:42:16'),
(19, 'Test Product', NULL, '<p>TEst PRoduct</p>', '1598291571.png', 0, 1, 1, 1, 1, '2020-08-24 11:52:51', '2020-08-24 11:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

CREATE TABLE `shop_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`id`, `product_id`, `buy_price`, `sale_price`, `invoice_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 15, 500, 540, 3, 1, 2, '2020-08-22 13:11:46', '2020-08-22 13:11:46'),
(2, 16, 8000, 8450, 3, 1, 3, '2020-08-22 13:11:46', '2020-08-22 13:11:46'),
(3, 14, 200, 200, 3, 1, 3, '2020-08-22 13:11:46', '2020-08-22 13:11:46'),
(4, 13, 200, 200, 4, 1, 1, '2020-08-22 13:13:14', '2020-08-22 13:13:14');

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
  `wallet` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `wallet`, `created_at`, `updated_at`) VALUES
(1, 'Jamil', 'mdjamilaj1@gmail.com', NULL, '$2y$10$dejC2zIKMZh1corZaG0CUuuhdmh6.IySPr48AtaQV8HkGd34HXCQi', NULL, 29048, '2020-08-13 21:21:54', '2020-08-23 12:33:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
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
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `oauth_providers`
--
ALTER TABLE `oauth_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shop_details`
--
ALTER TABLE `shop_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
