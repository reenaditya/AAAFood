-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 06:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Itelian', 'upload/cuisines/mmFsqwtCyI9gKNA8MywztTFZ2XYGjVHqkdu8T2CQ.jpg', 1, '2021-07-30 22:19:08', '2021-07-30 22:19:08'),
(4, 'Chinese', 'upload/cuisines/9Jl8cLfDzujCvlZpBb1mDEPcunKDqTSAgJc7LYT9.jpg', 1, '2021-07-30 22:19:49', '2021-07-30 22:19:49'),
(5, 'Indian', 'upload/cuisines/2U2Dc7pwMZ787bO5F4NErfKCdlDhvlXQ7wjq0HAY.jpg', 1, '2021-08-03 21:50:23', '2021-08-03 21:50:23'),
(6, 'South Indian', 'upload/cuisines/tfujxZ0SEDgs6zmoRqauU5W8J8Pow6RHELBXmoXr.jpg', 1, '2021-08-03 21:53:03', '2021-08-03 21:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `cuisine_restaurants`
--

CREATE TABLE `cuisine_restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cuisine_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuisine_restaurants`
--

INSERT INTO `cuisine_restaurants` (`id`, `cuisine_id`, `restaurant_id`, `status`, `created_at`, `updated_at`) VALUES
(30, 3, 3, 1, '2021-07-31 11:03:00', NULL),
(32, 4, 4, 1, '2021-07-31 11:04:00', NULL),
(33, 4, 6, 1, '2021-07-31 11:04:00', NULL),
(35, 3, 7, 1, '2021-07-31 11:04:00', NULL),
(36, 4, 7, 1, '2021-07-31 11:04:00', NULL),
(40, 3, 1, 1, '2021-08-04 20:05:00', NULL),
(41, 6, 1, 1, '2021-08-04 20:05:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu_groups`
--

CREATE TABLE `menu_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_groups`
--

INSERT INTO `menu_groups` (`id`, `restaurant_id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Biryanis', 1, '2021-07-30 02:55:41', '2021-07-31 13:49:24'),
(2, 2, 1, 'Egg', 1, '2021-07-30 05:16:30', '2021-07-30 21:29:16'),
(3, 1, 3, 'Chawmin', 1, '2021-08-03 22:50:18', '2021-08-04 20:29:05'),
(4, 1, 3, 'Rice', 1, '2021-08-04 20:11:52', '2021-08-04 20:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `menu_group_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_time` int(11) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `discount_type` tinyint(4) NOT NULL COMMENT '1=Price, 2=Percent',
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `restaurant_id`, `user_id`, `menu_group_id`, `image`, `name`, `estimated_time`, `discount`, `discount_type`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 3, 4, 'upload/menu_item/7BChKaHwRYDe0EjTrA44O6po1Jk3ihlpCxEz9LRb.jpg', 'Masala Rice', 20, 20, 1, NULL, 1, '2021-08-04 21:29:17', '2021-08-04 21:29:17'),
(9, 1, 3, 3, 'upload/menu_item/S7qEjgp76xSh9vCDwDaTaiQ4dHI40owuiyXMJaL4.jpg', 'Veg Chawmin', 20, 30, 1, NULL, 1, '2021-08-04 22:46:47', '2021-08-04 22:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items_price_quantities`
--

CREATE TABLE `menu_items_price_quantities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_quantity_group_id` bigint(20) UNSIGNED NOT NULL,
  `menu_item_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(12,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items_price_quantities`
--

INSERT INTO `menu_items_price_quantities` (`id`, `menu_quantity_group_id`, `menu_item_id`, `price`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 8, 200.00, 1, NULL, NULL),
(7, 4, 8, 300.00, 1, NULL, NULL),
(11, 2, 9, 150.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_quantity_groups`
--

CREATE TABLE `menu_quantity_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `menu_group_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_quantity_groups`
--

INSERT INTO `menu_quantity_groups` (`id`, `restaurant_id`, `user_id`, `menu_group_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 3, 'per plate', 1, '2021-07-30 20:46:40', '2021-08-04 20:29:29'),
(3, 1, 3, 4, 'half plate', 1, '2021-08-04 20:26:35', '2021-08-04 20:26:35'),
(4, 1, 3, 4, 'Full Plate', 1, '2021-08-04 20:26:50', '2021-08-04 20:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2021_07_15_184807_create_sessions_table', 2),
(7, '2021_07_15_184810_create_cuisines_table', 3),
(8, '2021_07_15_184810_create_restaurants_table', 4),
(9, '2021_07_29_170221_create_menu_groups_table', 4),
(10, '2021_07_29_173029_create_menu_items_table', 4),
(11, '2021_07_30_015633_create_menu_quantity_groups_table', 4),
(12, '2021_07_30_020124_create_menu_items_price_quantities_table', 4),
(13, '2021_07_31_061054_create_cuisine_restaurants_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuisines` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_tax` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dine_in` tinyint(4) DEFAULT NULL COMMENT '1=Yes, 0=No',
  `seating_capacity_indoor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seating_capacity_outdoor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reservations` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Yes, 0=No',
  `reservation_system` tinyint(4) NOT NULL DEFAULT 4,
  `takeout` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Yes, 0=No',
  `own_delivery` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Yes, 0=No',
  `delivery_fee` double(12,2) DEFAULT NULL,
  `minimum_delivery_amount` double(12,2) DEFAULT NULL,
  `free_delivery_amount` double(12,2) DEFAULT NULL,
  `delivery_radius` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_zip_codes` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_lead_time` int(11) DEFAULT NULL,
  `delivery_extra_time` int(11) DEFAULT NULL,
  `delivery_service` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Yes, 0=No',
  `participate_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aaadining_club` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Yes, 0=No',
  `birthday_club` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=Yes, 0=No',
  `mf_from` time DEFAULT NULL,
  `mf_to` time DEFAULT NULL,
  `sat_from` time DEFAULT NULL,
  `sat_to` time DEFAULT NULL,
  `sun_from` time DEFAULT NULL,
  `sun_to` time DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serve` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `user_id`, `name`, `slug`, `location`, `cuisines`, `address`, `address2`, `city`, `state`, `country`, `zipcode`, `website`, `sale_tax`, `dine_in`, `seating_capacity_indoor`, `seating_capacity_outdoor`, `reservations`, `reservation_system`, `takeout`, `own_delivery`, `delivery_fee`, `minimum_delivery_amount`, `free_delivery_amount`, `delivery_radius`, `delivery_zip_codes`, `order_lead_time`, `delivery_extra_time`, `delivery_service`, `participate_file`, `aaadining_club`, `birthday_club`, `mf_from`, `mf_to`, `sat_from`, `sat_to`, `sun_from`, `sun_to`, `description`, `image`, `serve`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '1 Point 5 Street', '1-point-5-street', 'Florida', '3,6', 'Road no. 2', 'near dps school', 'JHUNJHUNU', 'RAJASTHAN', 'India', '333011', 'ow.com', '2', 1, '22', '22', 0, 2, 1, 0, 20.00, 100.00, 200.00, '20', '333011', 12, 23, 0, 'upload/restaurant/lLRRa2CCOpWCVnVjWMReVESCDOFvyDGAyqP0VVDz.jpg', 0, 0, '09:55:00', '20:55:00', '09:55:00', '13:55:00', '13:55:00', '20:55:00', 'New restoro', 'upload/restaurant/NQR8qBQsYIkDvfRvc7Y3TYnHAhCAtTAr6bIg105K.jpg', 0, 1, '2021-07-29 20:50:17', '2021-08-04 20:05:11'),
(2, 1, 'Nirman Veg & Non Veg Restroo', 'nirman-veg-non-veg-restroo', 'India', '', 'Ward No. 10', 'Kyamsar', 'JHUNJHUNU', 'RAJASTHAN', 'Norway', '333011', 'nirman.com', '5', 1, '30', '50', 0, 2, 0, 0, 10.00, 20.00, 400.00, '20', '333998,98979,89789,9879879,', 30, 10, 0, 'upload/restaurant/VWeII8EYEHlpVsPlqDQzN6GgDZ4cFfyuz392xZru.jpg', 0, 0, '09:20:00', '22:20:00', '09:20:00', '14:20:00', NULL, NULL, 'best food  and best test guarantee', 'upload/restaurant/hXUQmpCTm7m5bQFz4HiFMmxjx0DelP2UMpJ3kRYG.jpg', 0, 1, '2021-07-30 21:17:14', '2021-08-04 20:05:57'),
(3, NULL, 'Wrapstick', 'wrapstick', 'India', '2,3', 'Ward No. 10', 'Kyamsar', 'JHUNJHUNU', 'RAJASTHAN', 'Norway', '333011', 'nirman.com', '12', 1, '12', '21', 1, 2, 1, 1, 20.00, 100.00, 200.00, '20', '223344,223341', 20, 10, 1, 'upload/restaurant/JgsIOc1HVOyW1unBwHVICnXyUuE2vOuUuBrF7Mko.jpg', 1, 1, '13:10:00', '17:14:00', NULL, NULL, NULL, NULL, 'Sat sun will be off', 'upload/restaurant/PPrNG5OmJ3RkvonUjt3mb4S2X3IIyzEL844fKkiY.jpg', 0, 1, '2021-07-31 00:16:46', '2021-07-31 11:03:50'),
(4, NULL, 'Khana Khajan restoo', 'khana-khajan-restoo', 'Jhunjhunu', '2,4', 'Ward No. 10', 'Kyamsar', 'JHUNJHUNU', 'RAJASTHAN', 'Norway', '333011', 'nirman.com', '12', 1, '12', '22', 1, 2, 1, 1, 20.00, 100.00, 200.00, '20', '88786,23424', 20, 20, 1, 'upload/restaurant/k6Uvqze2NkQ6mzOcnySrbs21oEziZG6RofbaKUqq.jpg', 1, 1, '11:59:00', '17:05:00', '12:00:00', '23:00:00', NULL, NULL, 'try new dishs New', 'upload/restaurant/w9y4zAr0jREbjlB8onyG7fHPQUTHDhiAVwgyc0Xz.jpg', 0, 1, '2021-07-31 01:00:31', '2021-07-31 11:04:11'),
(6, NULL, 'Kuresh non veg hotel', 'kuresh-non-veg-hotel', 'Jhunjhunu', '4', 'Ward No. 10', 'Kyamsar', 'JHUNJHUNU', 'RAJASTHAN', 'Norway', '333011', 'nirman.com', '5', 1, '11', '22', 1, 2, 1, 1, 20.00, 100.00, 200.00, '20', NULL, 22, 10, 1, 'upload/restaurant/ezJgCxg4ekqidIEfK8ZFaxsGvSmg08Lg7VJAcKDu.jpg', 1, 1, '14:07:00', '16:05:00', NULL, NULL, NULL, NULL, 'smndfg sdfg dfg', 'upload/restaurant/CRzLySWHfSd6561ZSbmPa3NIj7lBP8DNYTDwipWp.jpg', 0, 1, '2021-07-31 01:05:38', '2021-07-31 11:04:30'),
(7, NULL, 'Hamara Rajasthn Restaurant', 'hamara-rajasthn-restaurant', 'Rajsathan', '2,3,4', 'Ward No. 10', 'Kyamsar', 'JHUNJHUNU', 'RAJASTHAN', 'Norway', '333011', 'nirman.com', '12', 1, '11', '22', 1, 3, 1, 1, 20.00, 100.00, 200.00, '20', NULL, 12, 23, 1, NULL, 1, 1, '10:00:00', '20:00:00', NULL, NULL, NULL, NULL, 'notydf sfdsfsd fd sfsd f', 'upload/restaurant/A0OuergYyqmBZPN5UDW9WELKuXIC4SAt1eKBzUL5.jpg', 0, 1, '2021-07-31 01:23:45', '2021-07-31 11:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('iQ5bokgnmFwuHm4xF0tHoBuEe5obg47vMHQrfykQ', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.107 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiM2dVR0Y4WWJSNlNKbnFsZWNWUjRteE04QmtOcktJV3RWNTh4MlRJbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9tZW51X2l0ZW0vOS9lZGl0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGlPYlZOS05yTDNFZUphV25aMzRHVXVDOW5uMUV3SHBIaW5lL1Y5emlxQ0xEM2NCaExBTTk2IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRpT2JWTktOckwzRWVKYVduWjM0R1V1QzlubjFFd0hwSGluZS9WOXppcUNMRDNjQmhMQU05NiI7fQ==', 1628137744);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aditya Singh', 'user@gmail.com', 1, NULL, '$2y$10$SId5u853113XZznZGoKjT.HRPFKJ.IhUQacA2R9FzJ8/fDB0xPl0y', NULL, NULL, 'jzBm1eHsXymt2MoEfmflVDrIIQZlZZE6l1Winh3t4eYhX0WMjIbYcf0oWeCg', '2021-07-15 08:27:17', '2021-07-15 08:55:54'),
(2, 'Super Admin', 'super@admin.com', 2, NULL, '$2y$10$1AH8nN2XL/fHeIsUS2kiseWwrlCLx2m10uh6in4Sps7MkaYqyJKGC', NULL, NULL, 'BLc57XSOi5XiP2arhCskw5Pjc9so64xIvzjtr6h52xxFs7S85hgTxN0IaWVF', '2021-07-15 08:29:33', '2021-07-15 08:29:33'),
(3, 'TANVEER KHAN', 'fooddeli@mailinator.com', 1, NULL, '$2y$10$iObVNKNrL3EeJaWnZ34GUuC9nn1EwHpHine/V9ziqCLD3cBhLAM96', NULL, NULL, NULL, '2021-08-03 22:36:11', '2021-08-03 22:36:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuisine_restaurants`
--
ALTER TABLE `cuisine_restaurants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuisine_restaurants_cuisine_id_foreign` (`cuisine_id`),
  ADD KEY `cuisine_restaurants_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `menu_groups`
--
ALTER TABLE `menu_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_groups_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `menu_items_menu_group_id_foreign` (`menu_group_id`);

--
-- Indexes for table `menu_items_price_quantities`
--
ALTER TABLE `menu_items_price_quantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_price_quantities_menu_quantity_group_id_foreign` (`menu_quantity_group_id`),
  ADD KEY `menu_items_price_quantities_menu_item_id_foreign` (`menu_item_id`);

--
-- Indexes for table `menu_quantity_groups`
--
ALTER TABLE `menu_quantity_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_quantity_groups_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `menu_quantity_groups_menu_group_id_foreign` (`menu_group_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cuisine_restaurants`
--
ALTER TABLE `cuisine_restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_groups`
--
ALTER TABLE `menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_items_price_quantities`
--
ALTER TABLE `menu_items_price_quantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menu_quantity_groups`
--
ALTER TABLE `menu_quantity_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuisine_restaurants`
--
ALTER TABLE `cuisine_restaurants`
  ADD CONSTRAINT `cuisine_restaurants_cuisine_id_foreign` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisines` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cuisine_restaurants_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_groups`
--
ALTER TABLE `menu_groups`
  ADD CONSTRAINT `menu_groups_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_group_id_foreign` FOREIGN KEY (`menu_group_id`) REFERENCES `menu_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_items_price_quantities`
--
ALTER TABLE `menu_items_price_quantities`
  ADD CONSTRAINT `menu_items_price_quantities_menu_item_id_foreign` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_items_price_quantities_menu_quantity_group_id_foreign` FOREIGN KEY (`menu_quantity_group_id`) REFERENCES `menu_quantity_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_quantity_groups`
--
ALTER TABLE `menu_quantity_groups`
  ADD CONSTRAINT `menu_quantity_groups_menu_group_id_foreign` FOREIGN KEY (`menu_group_id`) REFERENCES `menu_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_quantity_groups_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
