-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2020 at 11:40 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

DROP TABLE IF EXISTS `abilities`;
CREATE TABLE IF NOT EXISTS `abilities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT '0',
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abilities_scope_index` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `options`, `scope`, `created_at`, `updated_at`) VALUES
(1, '*', 'All abilities', NULL, '*', 0, NULL, NULL, '2020-02-26 11:47:16', '2020-02-26 11:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

DROP TABLE IF EXISTS `assigned_roles`;
CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restricted_to_id` int(10) UNSIGNED DEFAULT NULL,
  `restricted_to_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  KEY `assigned_roles_role_id_index` (`role_id`),
  KEY `assigned_roles_scope_index` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `role_id`, `entity_id`, `entity_type`, `restricted_to_id`, `restricted_to_type`, `scope`) VALUES
(5, 2, 3, 'App\\User', NULL, NULL, NULL),
(4, 1, 1, 'App\\User', NULL, NULL, NULL),
(6, 3, 2, 'App\\User', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'rerum', 'tlynch@example.net', '2014-03-28 01:53:53', '1999-10-28 08:53:51'),
(2, 'eaque', 'dlarkin@example.com', '1979-05-03 08:26:29', '1987-07-02 09:51:11'),
(3, 'nihil', 'nienow.ayana@example.com', '1995-06-13 19:10:18', '2015-08-25 22:54:35'),
(4, 'veritatis', 'ncollier@example.net', '1993-08-08 20:19:31', '1990-07-04 00:02:59'),
(5, 'delectus', 'unitzsche@example.net', '1992-11-20 21:10:12', '1975-11-09 15:46:19'),
(6, 'ut', 'edyth72@example.com', '2013-05-21 09:08:10', '1986-04-26 15:07:08'),
(7, 'et', 'izaiah.schmeler@example.com', '1999-06-08 06:33:51', '1983-08-10 12:57:35'),
(8, 'aut', 'gerald.grady@example.com', '2013-04-07 04:14:53', '1972-07-17 06:57:27'),
(9, 'nostrum', 'liza.vandervort@example.net', '1999-04-21 11:24:05', '1996-05-13 10:47:43'),
(10, 'non', 'bboehm@example.org', '2006-02-16 16:59:48', '2003-02-25 10:59:50'),
(11, 'dolores', 'candida12@example.com', '2004-11-25 08:52:59', '2014-03-09 11:45:02'),
(12, 'officia', 'kasey.johnston@example.net', '1996-06-01 15:01:44', '2012-01-21 09:29:17'),
(13, 'magni', 'mayert.leta@example.com', '1991-09-08 08:01:07', '1976-08-21 12:59:29'),
(14, 'ut', 'madge.reilly@example.com', '1977-01-30 22:47:08', '1997-04-15 09:41:38'),
(15, 'esse', 'little.hillard@example.com', '1981-03-27 04:39:53', '1976-04-16 08:49:15'),
(16, 'quasi', 'osborne.thompson@example.com', '1978-06-21 05:24:46', '2010-01-27 10:15:32'),
(17, 'pariatur', 'emelie84@example.org', '2011-07-08 15:34:02', '1999-07-28 20:04:25'),
(18, 'iusto', 'kristian.robel@example.org', '1975-08-26 21:27:58', '2006-10-16 05:07:07'),
(19, 'numquam', 'kunde.eileen@example.org', '1974-06-12 07:18:43', '2000-07-31 15:17:38'),
(20, 'qui', 'klein.lauriane@example.net', '2008-03-24 02:44:51', '2005-08-27 13:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `log_activities`
--

DROP TABLE IF EXISTS `log_activities`;
CREATE TABLE IF NOT EXISTS `log_activities` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `Order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log_activities`
--

INSERT INTO `log_activities` (`id`, `subject`, `user_id`, `customer_id`, `Order_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 'viewed Order Number = 5', 1, NULL, NULL, NULL, '2020-02-26 12:44:33', '2020-02-26 12:44:33'),
(6, 'viewed Order Number = 4', 1, NULL, NULL, NULL, '2020-02-26 12:44:20', '2020-02-26 12:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_02_26_091306_create_activity_log_table', 1),
(4, '2020_02_26_091734_create_bouncer_tables', 1),
(5, '2020_02_26_095700_create_customers_table', 1),
(6, '2020_02_26_095948_create_products_table', 1),
(7, '2020_02_26_100248_create_orders_table', 1),
(8, '2020_02_26_101152_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('new','processed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_invoice_number_unique` (`invoice_number`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_number`, `total_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '64954', '393329079.1', 'new', '2003-09-17 17:46:43', '2001-12-27 20:57:55'),
(2, '55', '0.015018', 'new', '2016-12-20 09:08:31', '1995-01-06 08:13:03'),
(3, '32802', '1493.421', 'new', '1985-12-14 13:53:33', '2012-06-26 13:29:23'),
(4, '64382', '473034.03213144', 'new', '1994-01-19 09:06:31', '1992-12-14 21:14:50'),
(5, '29171', '74384328.05546', 'new', '1987-12-08 16:16:42', '1991-11-29 12:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '228860160.771', '2008-08-24 09:13:08', '1986-07-13 22:32:31'),
(2, '2', '2', '5687.2', '2003-10-22 01:56:57', '2012-02-17 07:06:04'),
(3, '3', '3', '35308701.436638', '2006-03-12 02:38:09', '1999-10-30 19:21:18'),
(4, '4', '4', '3367.000599', '1989-04-29 01:15:36', '2013-08-03 18:29:14'),
(5, '5', '5', '32.565538626', '1993-06-11 23:50:42', '1983-05-15 06:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ability_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  KEY `permissions_ability_id_index` (`ability_id`),
  KEY `permissions_scope_index` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(1, 1, 1, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `in_stock`, `created_at`, `updated_at`) VALUES
(1, 'est', '1064.3170562', 1, '2011-03-18 07:02:15', '1990-05-06 15:41:51'),
(2, 'libero', '', 1, '2017-12-22 20:16:12', '1998-10-31 18:26:50'),
(3, 'iusto', '174.649547', 1, '1976-02-16 23:33:59', '1971-07-01 23:01:28'),
(4, 'voluptatem', '', 1, '1997-01-11 12:37:58', '1977-09-14 21:04:01'),
(5, 'quidem', '39.555', 1, '1981-03-11 00:55:36', '2020-02-24 09:31:09'),
(6, 'aspernatur', '62290215.317938', 1, '2004-06-06 15:22:00', '1973-02-13 07:02:11'),
(7, 'tempora', '114571.58171288', 1, '1982-06-23 08:41:04', '1974-08-13 08:57:37'),
(8, 'reprehenderit', '185229347.36463', 1, '1976-12-14 01:12:52', '1972-05-06 00:31:07'),
(9, 'est', '277.30640504', 1, '2008-03-24 19:49:05', '2018-06-17 03:15:43'),
(10, 'commodi', '0.39722', 1, '1999-09-08 02:45:46', '1988-12-30 23:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  KEY `roles_scope_index` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `level`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', NULL, NULL, '2020-02-26 11:30:10', '2020-02-26 11:30:10'),
(2, 'shop-manager', 'ShopManager', NULL, NULL, '2020-02-26 11:31:15', '2020-02-26 11:31:15'),
(3, 'user-manager', 'UserManager', NULL, NULL, '2020-02-26 11:31:31', '2020-02-26 11:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Shop Manager', 'shopmanager@yopmail.com', '$2y$10$zrWeT3yI6JQ0m4In7WaBze2DROm4v6dYyXfRwBujLmm4.4Lwyt2ie', 'LZ9cFZqUGSMW1CEsISytpuQgKKmmfIOBzEBYFH8owtHuf1ndPjZ8EsyGi59K', NULL, NULL),
(2, 'User Manager', 'usermanager@yopmail.com', '$2y$10$0iCex1kbx6V8zaimJm4utuFW.Q4Jnfp101KjBS4TPAe34Uj9f9M6y', 'j2fa29CzX5HjDlVFv2w9GLI7NtPMy4S3ik7w4LPkhj4QDJokxR8BYhfiCU4y', NULL, NULL),
(1, 'Admin', 'applocumadmin@yopmail.com', '$2y$10$YG05owEUd1eREKbxcv3v6.8PGBWqVn1dku4eASKGghbGEipqD53Yu', 'JVj22SSl6QXFKBYFWCFjaa9JKmX7kukoPamzl07vDjRSU5xeH7syOR9vrUcj', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
