-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 04:34 PM
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` double(12,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `restaurant_id`, `data`, `total_amount`, `created_at`, `updated_at`) VALUES
(5, 2, 3, '[]', 0.00, '2021-08-21 01:15:30', '2021-08-21 01:15:30'),
(8, 2, 7, '[]', 0.00, '2021-08-21 01:17:09', '2021-08-21 01:17:25');

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
(86, 4, 6, 1, '2021-08-17 12:35:00', NULL),
(89, 4, 4, 1, '2021-08-17 12:41:00', NULL),
(90, 6, 4, 1, '2021-08-17 12:41:00', NULL),
(91, 3, 3, 1, '2021-08-17 12:42:00', NULL),
(92, 5, 3, 1, '2021-08-17 12:42:00', NULL),
(93, 3, 14, 1, '2021-08-18 10:39:00', NULL),
(94, 5, 14, 1, '2021-08-18 10:39:00', NULL),
(95, 4, 15, 1, '2021-08-18 10:50:00', NULL),
(96, 5, 15, 1, '2021-08-18 10:50:00', NULL),
(98, 5, 17, 1, '2021-08-18 10:56:00', NULL),
(99, 3, 7, 1, '2021-08-22 07:43:00', NULL),
(100, 6, 7, 1, '2021-08-22 07:43:00', NULL);

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
(5, 7, 3, 'Biryani', 1, '2021-08-17 13:10:30', '2021-08-17 13:10:30'),
(6, 7, 3, 'Burger', 1, '2021-08-17 13:11:07', '2021-08-17 13:13:27');

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
(10, 7, 3, 6, 'upload/menu_item/P5Dj53nLHPQOKK1hl67iwepCLjGNt1NZI4tfJ3Ot.jpg', 'Double daker burger', 20, 10, 2, NULL, 1, '2021-08-17 13:19:46', '2021-08-17 13:19:46'),
(11, 7, 3, 6, 'upload/menu_item/RJ8bhigTZ3N6S7w9fbYjojT7eocLwvzJpTKeJt3B.jpg', 'Big tornado buger', 25, 20, 1, NULL, 1, '2021-08-17 13:21:40', '2021-08-17 13:21:40'),
(12, 7, 3, 5, 'upload/menu_item/0Fj6uTbAVkEoxFnOeLd6RFmI3ftwI7RBBnRzsvxz.jpg', 'Veg Biryani', 20, 10, 1, NULL, 1, '2021-08-17 13:22:23', '2021-08-17 13:22:23'),
(13, 7, 3, 5, 'upload/menu_item/NdjXBcPC7Mn2lUep1Wyn637L1djD9ysHk5oaog4F.jpg', 'Non Veg Biryani', 25, 10, 1, NULL, 1, '2021-08-17 13:23:16', '2021-08-17 13:23:16');

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
(12, 7, 10, 20.00, 1, NULL, NULL),
(13, 7, 11, 80.00, 1, NULL, NULL),
(14, 5, 12, 50.00, 1, NULL, NULL),
(15, 6, 12, 80.00, 1, NULL, NULL),
(16, 5, 13, 80.00, 1, NULL, NULL),
(17, 6, 13, 130.00, 1, NULL, NULL);

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
(5, 7, 3, 5, 'half plate', 1, '2021-08-17 13:11:46', '2021-08-17 13:11:46'),
(6, 7, 3, 5, 'Full Plate', 1, '2021-08-17 13:11:56', '2021-08-17 13:11:56'),
(7, 7, 3, 6, 'Per Peace', 1, '2021-08-17 13:13:58', '2021-08-17 13:16:34');

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
(13, '2021_07_31_061054_create_cuisine_restaurants_table', 5),
(14, '2021_08_14_090920_create_restaurant_offers_table', 6),
(15, '2021_08_20_200945_create_carts_table', 7);

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
  `icon` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serve` tinyint(4) DEFAULT NULL,
  `meal_starting` double(12,2) DEFAULT 0.00,
  `banner_img` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=yes, 0=no',
  `new` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=yes, 0=no',
  `top_rated` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=yes, 0=no',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `user_id`, `name`, `slug`, `location`, `cuisines`, `address`, `address2`, `city`, `state`, `country`, `zipcode`, `website`, `sale_tax`, `dine_in`, `seating_capacity_indoor`, `seating_capacity_outdoor`, `reservations`, `reservation_system`, `takeout`, `own_delivery`, `delivery_fee`, `minimum_delivery_amount`, `free_delivery_amount`, `delivery_radius`, `delivery_zip_codes`, `order_lead_time`, `delivery_extra_time`, `delivery_service`, `participate_file`, `aaadining_club`, `birthday_club`, `mf_from`, `mf_to`, `sat_from`, `sat_to`, `sun_from`, `sun_to`, `description`, `image`, `icon`, `serve`, `meal_starting`, `banner_img`, `trending`, `new`, `top_rated`, `status`, `created_at`, `updated_at`) VALUES
(3, 4, 'Wrapstick fast food', 'wrapstick-fast-food', 'India', '3,5', 'B3 New Palm', 'Near Beach Bala', 'buana vista', 'FL', 'United State', '333011', 'nirman.com', '12', 1, '12', '21', 1, 2, 1, 1, 20.00, 100.00, 200.00, '20', '223344,223341', 20, 10, 1, 'upload/restaurant/JgsIOc1HVOyW1unBwHVICnXyUuE2vOuUuBrF7Mko.jpg', 1, 1, '13:10:00', '17:14:00', NULL, NULL, NULL, NULL, 'lorida is the southeasternmost U.S. state, with the Atlantic on one side and the Gulf of Mexico on the other. It has hundreds of miles of beaches. The city of Miami is known for its Latin-American cultural influences and notable arts scene, as well as its nightlife, especially in upscale South Bea', 'upload/restaurant/PPrNG5OmJ3RkvonUjt3mb4S2X3IIyzEL844fKkiY.jpg', 'upload/restaurant/WQeDcsW4dVJPQNsFjwDP083BvDpuSolMbNeUyZSS.png', 0, 0.00, NULL, 0, 0, 0, 1, '2021-07-31 00:16:46', '2021-08-17 12:42:54'),
(4, 4, 'Khana Khajan restoo', 'khana-khajan-restoo', 'sarasota', '4,6', '55/0', 'DGH Street', 'Sarasota', 'FL', 'United State', '333011', 'nirman.com', '12', 1, '12', '22', 1, 2, 1, 1, 20.00, 100.00, 200.00, '20', '88786,23424', 20, 20, 1, 'upload/restaurant/k6Uvqze2NkQ6mzOcnySrbs21oEziZG6RofbaKUqq.jpg', 1, 1, '11:59:00', '17:05:00', '12:00:00', '23:00:00', NULL, NULL, 'lorida is the southeasternmost U.S. state, with the Atlantic on one side and the Gulf of Mexico on the other. It has hundreds of miles of beaches. The city of Miami is known for its Latin-American cultural influences and notable arts scene, as well as its nightlife, especially in upscale South Bea', 'upload/restaurant/w9y4zAr0jREbjlB8onyG7fHPQUTHDhiAVwgyc0Xz.jpg', 'upload/restaurant/juEKqXYVUx6vvsjZQGJQtiGmLuUrBWSPr6ZQhD2R.png', 0, 0.00, NULL, 0, 0, 0, 1, '2021-07-31 01:00:31', '2021-08-17 12:41:05'),
(6, 1, 'Kuresh non veg hotel', 'kuresh-non-veg-hotel', 'Jhunjhunu', '4', '20/12', 'califo street', 'Orlando', 'FL', 'United State', '333011', 'nirman.com', '5', 1, '11', '22', 1, 2, 1, 1, 20.00, 100.00, 200.00, '20', NULL, 22, 10, 1, 'upload/restaurant/ezJgCxg4ekqidIEfK8ZFaxsGvSmg08Lg7VJAcKDu.jpg', 1, 1, '14:07:00', '16:05:00', NULL, NULL, NULL, NULL, 'smndfg sdfg dfg', 'upload/restaurant/CRzLySWHfSd6561ZSbmPa3NIj7lBP8DNYTDwipWp.jpg', 'upload/restaurant/1FBjzhzO949uO77MIOoxMli6A1RsK4PqNlzfnpLb.png', 0, 0.00, NULL, 0, 0, 0, 1, '2021-07-31 01:05:38', '2021-08-17 12:35:18'),
(7, 3, 'wesley chapel catering', 'wesley-chapel-catering', 'Florida', '3,6', '12/45', 'keywater', 'Tampa', 'FL', 'United State', '333011', 'nirman.com', '12', 1, '11', '22', 1, 3, 1, 1, 20.00, 100.00, 200.00, '20', NULL, 12, 23, 1, NULL, 1, 0, '10:00:00', '20:00:00', NULL, NULL, NULL, NULL, 'lorida is the southeasternmost U.S. state, with the Atlantic on one side and the Gulf of Mexico on the other. It has hundreds of miles of beaches. The city of Miami is known for its Latin-American cultural influences and notable arts scene, as well as its nightlife, especially in upscale South Bea', 'upload/restaurant/A0OuergYyqmBZPN5UDW9WELKuXIC4SAt1eKBzUL5.jpg', 'upload/restaurant/JuTsrVjnV4gd6zso3Rb2iCRdUoLfSryRilhdgqxh.png', 0, 20.00, 'upload/restaurant/CTfKumQdE73PehW0dSFsKX3B831JJ2myFoEPoCgJ.jpg', 1, 1, 1, 1, '2021-07-31 01:23:45', '2021-08-22 07:43:30'),
(14, 5, 'mr & miss Smith caters', 'mr-miss-smith-caters', 'Florida', '3,5', '10', 'KK Loan bar', 'florida', 'CA', 'United State', '333011', 'nirman.com', '12', 1, '12', '12', 1, 1, 1, 1, 20.00, 100.00, 200.00, '20', NULL, 23, 22, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'NA', 'upload/restaurant/N869WP88PQvCqaVCtyroVXvwYfZUsNgoVcyb1oCX.jpg', 'upload/restaurant/wBapflyL8SL4LcPfZEdq9ubgeNKjQE2JTjNWxLXU.png', 0, 0.00, NULL, 0, 0, 0, 1, '2021-08-18 10:39:51', '2021-08-18 10:39:51'),
(15, 7, 'The Floridian Restaurant', 'the-floridian-restaurant', 'Florida', '4,5', '72 Spanish', 'St #3638', 'St. Augustine', 'FL', 'United state', '90876', 'www.3638.com', '4', 1, '34', '55', 1, 1, 1, 1, 20.00, 100.00, 200.00, '20', NULL, 20, 15, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'NA', 'upload/restaurant/Jy0DWUIefYKEUIVwFmEF6kDwF6Ke4Z3JAf3djivt.jpg', 'upload/restaurant/ZdxJzS3jVEmeEuHPLQnVmPMmG35xO88DnU5ZPFv6.png', 0, 0.00, NULL, 0, 0, 0, 1, '2021-08-18 10:50:18', '2021-08-18 10:50:18'),
(17, 10, 'Farmers Market Restaurant', 'farmers-market-restaurant', 'Florida', '5', '2736', 'Edison Ave', 'Fort Myers', 'FL', 'United state', '098hy', 'nirman.com', '2', 1, '55', '66', 1, 1, 1, 1, 20.00, 100.00, 200.00, '20', NULL, 12, 15, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'NA', 'upload/restaurant/NANTbvslKoDs6p8UpOBtmTZVyIhYEP6nHywhVtrt.jpg', 'upload/restaurant/jDaQWbWWeWyu5rpP8XycW0gPthPZAqb2WSZs20dk.png', 0, 0.00, NULL, 0, 0, 0, 1, '2021-08-18 10:56:59', '2021-08-18 10:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_offers`
--

CREATE TABLE `restaurant_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `offer_type` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_valid_day` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_valid_from` time DEFAULT NULL,
  `offer_valid_to` time DEFAULT NULL,
  `terms_condition` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_offers`
--

INSERT INTO `restaurant_offers` (`id`, `restaurant_id`, `offer_type`, `file`, `offer_valid_day`, `offer_valid_from`, `offer_valid_to`, `terms_condition`, `status`, `created_at`, `updated_at`) VALUES
(9, 6, 'AADINING_CLUB', 'upload/restaurant/5h0GsONRxEFfmkaTXllwZ5txYGBwiFvQrIBHnbXR.png', '[\"3\"]', '01:29:00', '02:30:00', '[\"1\",\"2\",\"5\"]', 0, '2021-08-17 12:25:43', '2021-08-17 12:35:18'),
(10, 6, 'BIRTHDAY_CLUB', NULL, NULL, NULL, NULL, '[\"3\",\"4\"]', 0, '2021-08-17 12:25:43', '2021-08-17 12:35:18'),
(11, 7, 'AADINING_CLUB', 'upload/restaurant/VTMkOZQgjdo4rCLFz2M0SBHEA1pZH0XbMHzcTjwD.png', '[\"3\"]', '01:36:00', '10:41:00', '[\"3\"]', 0, '2021-08-17 12:38:29', '2021-08-22 07:43:30'),
(12, 7, 'BIRTHDAY_CLUB', NULL, NULL, NULL, NULL, '[\"4\"]', 0, '2021-08-17 12:38:29', '2021-08-22 07:43:30'),
(13, 4, 'AADINING_CLUB', 'upload/restaurant/Odfou8rtDK3o842AXGs6dVWmafZ0wrY1nmfbV000.jpg', '[\"1\",\"3\"]', '04:45:00', '10:45:00', '[\"1\",\"2\"]', 0, '2021-08-17 12:41:05', '2021-08-17 12:41:05'),
(14, 4, 'BIRTHDAY_CLUB', NULL, NULL, NULL, NULL, '[\"3\",\"5\"]', 0, '2021-08-17 12:41:05', '2021-08-17 12:41:05'),
(15, 3, 'AADINING_CLUB', 'upload/restaurant/RryhCQ2It79AeVbJdAIlCOJpzYBdWXGrZuyEP8L6.jpg', '[\"3\",\"5\",\"6\"]', '09:43:00', '22:48:00', '[\"1\",\"2\"]', 0, '2021-08-17 12:42:55', '2021-08-17 12:42:55'),
(16, 3, 'BIRTHDAY_CLUB', NULL, NULL, NULL, NULL, '[\"7\",\"8\"]', 0, '2021-08-17 12:42:55', '2021-08-17 12:42:55');

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
('xqFZgyaw4smF27nnCq9I6VbVFtGiw4SiaNfjveOI', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTENHYnZaeWRXaTlDZ3hPNkJPYXY4Mlh4OXR6bFdad0tEcWlabmM0UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQxQUg4bk4yWEwvZkhlSXNVUzJraXNlV3dybENMeDJtMTB1aDZpbjRTcHM3TWthWXF5SktHQyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkMUFIOG5OMlhML2ZIZUlzVVMya2lzZVd3cmxDTHgybTEwdWg2aW40U3BzN01rYVlxeUpLR0MiO30=', 1629642761);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) DEFAULT 4 COMMENT '1=Vendor,2=Admin,3=Delivery,4=Customer',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:Active, 0:Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aditya Singh', 'user@gmail.com', 1, NULL, '$2y$10$SId5u853113XZznZGoKjT.HRPFKJ.IhUQacA2R9FzJ8/fDB0xPl0y', NULL, NULL, 'jzBm1eHsXymt2MoEfmflVDrIIQZlZZE6l1Winh3t4eYhX0WMjIbYcf0oWeCg', 1, '2021-07-15 08:27:17', '2021-07-15 08:55:54'),
(2, 'Super Admin', 'super@admin.com', 2, NULL, '$2y$10$1AH8nN2XL/fHeIsUS2kiseWwrlCLx2m10uh6in4Sps7MkaYqyJKGC', NULL, NULL, 'UN028wp6KQpCAicpz9md0tsBfPIT9IONlrUCwa7X6kDL8JEYKowsO5gGSOLx', 1, '2021-07-15 08:29:33', '2021-07-15 08:29:33'),
(3, 'TANVEER KHAN', 'fooddeli@mailinator.com', 1, NULL, '$2y$10$iObVNKNrL3EeJaWnZ34GUuC9nn1EwHpHine/V9ziqCLD3cBhLAM96', NULL, NULL, NULL, 1, '2021-08-03 22:36:11', '2021-08-03 22:36:11'),
(4, 'mandeep', 'mandeep@mailinator.com', 1, NULL, '$2y$10$6xBHKkWURpXkdVYgrdAKDedBnueF12FlZ6JISBO9T8ojvttY14iPa', NULL, NULL, NULL, 1, '2021-08-13 08:51:00', '2021-08-13 08:51:00'),
(5, 'test1233', 'test1233@gmail.com', 4, NULL, '$2y$10$6wd7Wd0h1IhVHgYkw7S5A.qKNHZyG6RbAzvqp63zOfDlc6thGSuhK', NULL, NULL, NULL, 0, '2021-08-18 10:39:51', '2021-08-21 01:19:06'),
(7, 'test124', 'test124@gmail.com', 1, NULL, '$2y$10$kVbNZkiVw0bLs6b5wGjwKOKyJ88ctHjWzSADrb3dXUAruJ2ftMd9.', NULL, NULL, NULL, 1, '2021-08-18 10:50:18', '2021-08-18 10:50:18'),
(10, 'test1252323', 'test125@gmail.com', 1, NULL, '$2y$10$R31ixYRHxD7IxCO.lPLjguNCiRtvLT6eKudP736HKjG5GFZneYWUy', NULL, NULL, NULL, 1, '2021-08-18 10:56:59', '2021-08-21 01:18:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_restaurant_id_foreign` (`restaurant_id`);

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
-- Indexes for table `restaurant_offers`
--
ALTER TABLE `restaurant_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_offers_restaurant_id_foreign` (`restaurant_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cuisine_restaurants`
--
ALTER TABLE `cuisine_restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_groups`
--
ALTER TABLE `menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu_items_price_quantities`
--
ALTER TABLE `menu_items_price_quantities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `menu_quantity_groups`
--
ALTER TABLE `menu_quantity_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `restaurant_offers`
--
ALTER TABLE `restaurant_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `restaurant_offers`
--
ALTER TABLE `restaurant_offers`
  ADD CONSTRAINT `restaurant_offers_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
