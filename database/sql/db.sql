-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2026 at 08:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primevest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `tag`, `password`, `remember_token`, `json`, `status`, `updated`, `date`) VALUES
(1, 'master', '$2y$12$9.2R2RU7GN1Sz.n1lbnmI.7y9P4QjjPZONMpxhScf9/bqX.zFGjAS', 'D5yuhncTpWsTrWRvRnQBSxaDEtHbo0noJyy8jIKwqT1EOpMEBgGZr1s5bXMP', NULL, 'active', '2026-03-07 17:02:07', '2026-03-07 17:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('primevest-cache-processing_packages', 'b:1;', 1790058113);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giftcodes`
--

CREATE TABLE `giftcodes` (
  `id` bigint(20) NOT NULL,
  `code` varchar(255) NOT NULL,
  `reward` float NOT NULL,
  `limit` bigint(20) NOT NULL DEFAULT 0,
  `invest_before_redeeming` varchar(255) NOT NULL DEFAULT 'no',
  `redeemed` bigint(20) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `status`, `date`) VALUES
(1, 1, 'success', '2026-09-20 16:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `url` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`url`)),
  `icon` text DEFAULT NULL,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`title`)),
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`body`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'json status format for user and admin wether read or unread' CHECK (json_valid(`status`)),
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `uniqid`, `url`, `icon`, `title`, `body`, `json`, `status`, `updated`, `date`) VALUES
(1, 'ejLgtsU6l5V6', '{\"admins\":\"http:\\/\\/localhost\\/profitport\\/public\\/admins\\/transaction\\/receipt?id=2\",\"users\":\"http:\\/\\/localhost\\/profitport\\/public\\/users\\/transaction\\/receipt?id=2\"}', NULL, '{\"users\":\"Withdrawal placed\",\"admins\":\"withdrawal request\"}', '{\"users\":\"You placed a withdrawal\",\"admins\":\"New withdrawal request from Emmanuel\"}', NULL, '{\"admins\": \"read\", \"users\": \"unread\"}', '2026-03-25 03:58:16', '2026-03-25 03:58:16'),
(2, 'XGrGpcc4kzRX', '{\"admins\":\"http:\\/\\/localhost\\/profitport\\/public\\/admins\\/transaction\\/receipt?id=2\",\"users\":\"http:\\/\\/localhost\\/profitport\\/public\\/users\\/transaction\\/receipt?id=2\"}', NULL, '{\"users\":\"Withdrawal placed\",\"admins\":\"withdrawal request\"}', '{\"users\":\"You placed a withdrawal\",\"admins\":\"New withdrawal request from Emmanuel\"}', NULL, '{\"admins\": \"read\", \"users\": \"unread\"}', '2026-03-25 03:58:17', '2026-03-25 03:58:17'),
(3, 'CPmuQCKITAwC', '{\"admins\":\"http:\\/\\/localhost\\/profitport\\/public\\/admins\\/transaction\\/receipt?id=2\",\"users\":\"http:\\/\\/localhost\\/profitport\\/public\\/users\\/transaction\\/receipt?id=2\"}', NULL, '{\"users\":\"Withdrawal placed\",\"admins\":\"withdrawal request\"}', '{\"users\":\"You placed a withdrawal\",\"admins\":\"New withdrawal request from Emmanuel\"}', NULL, '{\"admins\": \"read\", \"users\": \"unread\"}', '2026-03-25 03:58:20', '2026-03-25 03:58:20'),
(4, 'dDV8NJjqJXL4', '{\"admins\":\"http:\\/\\/localhost\\/profitport\\/public\\/admins\\/transaction\\/receipt?id=2\",\"users\":\"http:\\/\\/localhost\\/profitport\\/public\\/users\\/transaction\\/receipt?id=2\"}', NULL, '{\"users\":\"Withdrawal placed\",\"admins\":\"withdrawal request\"}', '{\"users\":\"You placed a withdrawal\",\"admins\":\"New withdrawal request from Emmanuel\"}', NULL, '{\"admins\": \"read\", \"users\": \"unread\"}', '2026-03-25 03:58:22', '2026-03-25 03:58:22'),
(5, '1gKE6vHfCJoE', '{\"admins\":\"http:\\/\\/localhost\\/profitport\\/public\\/admins\\/transaction\\/receipt?id=2\",\"users\":\"http:\\/\\/localhost\\/profitport\\/public\\/users\\/transaction\\/receipt?id=2\"}', NULL, '{\"users\":\"Withdrawal placed\",\"admins\":\"withdrawal request\"}', '{\"users\":\"You placed a withdrawal\",\"admins\":\"New withdrawal request from Emmanuel\"}', NULL, '{\"admins\": \"read\", \"users\": \"unread\"}', '2026-03-25 03:58:25', '2026-03-25 03:58:25'),
(6, 'RjCHowXUCXhh', '{\"admins\":\"http:\\/\\/localhost\\/profitport\\/public\\/admins\\/transaction\\/receipt?id=2\",\"users\":\"http:\\/\\/localhost\\/profitport\\/public\\/users\\/transaction\\/receipt?id=2\"}', NULL, '{\"users\":\"Withdrawal placed\",\"admins\":\"withdrawal request\"}', '{\"users\":\"You placed a withdrawal\",\"admins\":\"New withdrawal request from Emmanuel\"}', NULL, '{\"admins\": \"read\", \"users\": \"unread\"}', '2026-03-25 03:58:31', '2026-03-25 03:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cost` double NOT NULL DEFAULT 0 COMMENT 'package cost/purchase price',
  `earning` double NOT NULL DEFAULT 0 COMMENT 'daily earning amount',
  `validity` bigint(20) NOT NULL DEFAULT 1000 COMMENT 'How long the package last befire expiry',
  `available` bigint(20) NOT NULL COMMENT 'the units of thei pacakage available',
  `type` varchar(255) NOT NULL DEFAULT 'vip',
  `coming_soon` varchar(255) NOT NULL DEFAULT 'false',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `uniqid`, `photo`, `name`, `cost`, `earning`, `validity`, `available`, `type`, `coming_soon`, `status`, `updated`, `date`) VALUES
(16, 'VGLHHFYB1784481246', 'doa74uku1784481246.jpeg', 'VIP 1', 15000, 375, 60, 995, 'vip', 'false', 'active', '2026-07-20 01:14:06', '2026-07-20 01:14:06'),
(17, 'ME4VAVUW1784481391', 'lgez961y1784481391.jpeg', 'VIP 2', 60000, 1500, 80, 999, 'vip', 'false', 'active', '2026-07-20 01:16:31', '2026-07-20 01:16:31'),
(18, 'OGCFQCA31784481428', '05kablq61784481428.jpeg', 'VIP 3', 150000, 3000, 120, 1000, 'vip', 'false', 'active', '2026-07-20 01:17:08', '2026-07-20 01:17:08'),
(19, 'EDSXRVA11784481461', 'v5gucnhi1784481461.jpeg', 'VIP 4', 375000, 7500, 130, 1000, 'vip', 'false', 'active', '2026-07-20 01:17:41', '2026-07-20 01:17:41'),
(20, 'JNRZ7FQU1784481492', 'ijaablp61784481492.jpeg', 'VIP 5', 75000, 15000, 140, 1000, 'vip', 'false', 'active', '2026-07-20 01:18:12', '2026-07-20 01:18:12'),
(21, '6WNEXHYD1784481529', '5bkinnvc1784481529.jpeg', 'VIP 6', 1125000, 22500, 160, 1000, 'vip', 'false', 'active', '2026-07-20 01:18:49', '2026-07-20 01:18:49'),
(22, '9N7TXUG11784481734', NULL, 'SAVINGS 01', 3000, 3000, 3, 995, 'savings', 'false', 'active', '2026-09-22 13:53:20', '2026-07-20 01:22:14'),
(23, 'SWMMTSC41789813580', NULL, 'SAVINGS 02', 200000, 700, 40, 1000, 'savings', 'true', 'active', '2026-09-22 00:37:07', '2026-09-19 18:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchased_packages`
--

CREATE TABLE `purchased_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'The id of the user who purchased the package',
  `package` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'The package purchased in json format,usually fetched from package table based of package id' CHECK (json_valid(`package`)),
  `cycle` bigint(20) NOT NULL DEFAULT 100 COMMENT 'Remaining cycle left before package expires in days\r\n',
  `status` varchar(255) NOT NULL DEFAULT 'active' COMMENT 'Sets to inactive if not active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'updated date(updates for last rewarded time)',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'purchase date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchased_packages`
--

INSERT INTO `purchased_packages` (`id`, `uniqid`, `user_id`, `package`, `cycle`, `status`, `updated`, `date`) VALUES
(3, 'EAKSMGAY17', 1, '{\"id\":16,\"uniqid\":\"VGLHHFYB1784481246\",\"photo\":\"doa74uku1784481246.jpeg\",\"name\":\"VIP 1\",\"cost\":15000,\"earning\":375,\"validity\":60,\"available\":997,\"type\":\"vip\",\"coming_soon\":\"false\",\"status\":\"active\",\"updated\":\"2026-07-19 18:14:06\",\"date\":\"2026-07-19 18:14:06\"}', 58, 'active', '2026-09-22 13:59:52', '2026-09-22 13:19:11'),
(4, '1BPP4QEI17', 1, '{\"id\":22,\"uniqid\":\"9N7TXUG11784481734\",\"photo\":null,\"name\":\"SAVINGS 01\",\"cost\":15000,\"earning\":3000,\"validity\":180,\"available\":1000,\"type\":\"savings\",\"coming_soon\":\"false\",\"status\":\"active\",\"updated\":\"2026-09-21 17:37:21\",\"date\":\"2026-07-19 18:22:14\"}', 180, 'active', '2026-09-22 13:23:25', '2026-09-22 13:23:25'),
(5, 'WIZYKTYS17', 1, '{\"id\":22,\"uniqid\":\"9N7TXUG11784481734\",\"photo\":null,\"name\":\"SAVINGS 01\",\"cost\":15000,\"earning\":3000,\"validity\":180,\"available\":999,\"type\":\"savings\",\"coming_soon\":\"false\",\"status\":\"active\",\"updated\":\"2026-09-21 17:37:21\",\"date\":\"2026-07-19 18:22:14\"}', 178, 'active', '2026-09-22 13:45:10', '2026-09-22 13:27:26'),
(6, 'MU9TFJ4P17', 1, '{\"id\":22,\"uniqid\":\"9N7TXUG11784481734\",\"photo\":null,\"name\":\"SAVINGS 01\",\"cost\":15000,\"earning\":3000,\"validity\":180,\"available\":998,\"type\":\"savings\",\"coming_soon\":\"false\",\"status\":\"active\",\"updated\":\"2026-09-21 17:37:21\",\"date\":\"2026-07-19 18:22:14\"}', 180, 'active', '2026-09-22 13:28:03', '2026-09-22 13:28:03'),
(7, 'IWBXNMTN17', 1, '{\"id\":22,\"uniqid\":\"9N7TXUG11784481734\",\"photo\":null,\"name\":\"SAVINGS 01\",\"cost\":3000,\"earning\":3000,\"validity\":3,\"available\":997,\"type\":\"savings\",\"coming_soon\":\"false\",\"status\":\"active\",\"updated\":\"2026-09-22 06:53:20\",\"date\":\"2026-07-19 18:22:14\"}', 0, 'completed', '2026-09-22 13:57:59', '2026-09-22 13:53:22'),
(8, 'METEP2SA17', 6, '{\"id\":22,\"uniqid\":\"9N7TXUG11784481734\",\"photo\":null,\"name\":\"SAVINGS 01\",\"cost\":3000,\"earning\":3000,\"validity\":3,\"available\":996,\"type\":\"savings\",\"coming_soon\":\"false\",\"status\":\"active\",\"updated\":\"2026-09-22 06:53:20\",\"date\":\"2026-07-19 18:22:14\"}', 3, 'active', '2026-09-22 14:13:45', '2026-09-22 14:13:45'),
(9, 'FUAG3BGA17', 6, '{\"id\":16,\"uniqid\":\"VGLHHFYB1784481246\",\"photo\":\"doa74uku1784481246.jpeg\",\"name\":\"VIP 1\",\"cost\":15000,\"earning\":375,\"validity\":60,\"available\":996,\"type\":\"vip\",\"coming_soon\":\"false\",\"status\":\"active\",\"updated\":\"2026-07-19 18:14:06\",\"date\":\"2026-07-19 18:14:06\"}', 60, 'active', '2026-09-22 14:19:18', '2026-09-22 14:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `redeemed_giftcodes`
--

CREATE TABLE `redeemed_giftcodes` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `giftcode` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`giftcode`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `redeemed_giftcodes`
--

INSERT INTO `redeemed_giftcodes` (`id`, `user_id`, `giftcode`, `status`, `updated`, `date`) VALUES
(1, 8, '{\"id\":2,\"code\":\"01KTSZ4GQQBTV6QKAJZNRJ9EQY\",\"reward\":1500,\"limit\":100,\"redeemed\":0,\"status\":\"active\",\"updated\":\"2026-06-11 00:54:19\",\"date\":\"2026-06-10 23:50:59\"}', 'success', '2026-06-11 09:18:19', '2026-06-11 09:18:19'),
(2, 20, '{\"id\":8,\"code\":\"01KTTWB76CSGV327Z7AR8KV8Z5\",\"reward\":200,\"limit\":20,\"invest_before_redeeming\":\"yes\",\"redeemed\":0,\"status\":\"active\",\"updated\":\"2026-06-11 08:21:27\",\"date\":\"2026-06-11 08:21:27\"}', 'success', '2026-06-11 15:22:08', '2026-06-11 15:22:08'),
(3, 11, '{\"id\":8,\"code\":\"01KTTWB76CSGV327Z7AR8KV8Z5\",\"reward\":200,\"limit\":20,\"invest_before_redeeming\":\"no\",\"redeemed\":1,\"status\":\"active\",\"updated\":\"2026-06-11 08:23:05\",\"date\":\"2026-06-11 08:21:27\"}', 'success', '2026-06-11 15:23:08', '2026-06-11 15:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `salary` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`salary`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `uniqid`, `user_id`, `salary`, `status`, `updated`, `date`) VALUES
(1, '1NGIWZRM17', 1, '{\"id\":5,\"uniqid\":\"KYA5YKC117\",\"criteria\":50000,\"reward\":5,\"completed\":0,\"status\":\"active\",\"updated\":\"2026-09-20 09:18:42\",\"date\":\"2026-09-20 09:18:42\"}', 'success', '2026-09-20 18:09:12', '2026-09-20 18:09:12'),
(2, '9UKBLMY117', 1, '{\"id\":6,\"uniqid\":\"SNTRJUD217\",\"criteria\":100000,\"reward\":10,\"completed\":0,\"status\":\"active\",\"updated\":\"2026-09-20 11:10:47\",\"date\":\"2026-09-20 11:10:47\"}', 'success', '2026-09-20 18:14:09', '2026-09-20 18:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `criteria` float NOT NULL,
  `reward` float NOT NULL,
  `completed` bigint(20) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `uniqid`, `criteria`, `reward`, `completed`, `status`, `updated`, `date`) VALUES
(5, 'KYA5YKC117', 50000, 5, 0, 'active', '2026-09-20 16:18:42', '2026-09-20 16:18:42'),
(6, 'SNTRJUD217', 100000, 10, 0, 'active', '2026-09-20 18:10:47', '2026-09-20 18:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tFVgUXMiWZXxXXLX8ffWgWLREvifjqLihwU6wOPW', NULL, '172.20.10.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.6.1 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNmxvdlVwREVLclpJYVo2S2tlQkx4aU5vbHhzVXNnaTJKanFNaGpWNyI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjUxOiJodHRwOi8vMTcyLjIwLjEwLjMvcHJpbWV2ZXN0L3B1YmxpYy91c2Vycy9kYXNoYm9hcmQiO3M6NToicm91dGUiO047fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1790052848),
('YccGaSzmdCKbCEGL1u9QfDaaHxv85OXMhAbzgazZ', NULL, '172.20.10.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_7 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.6.1 Mobile/15E148 Safari/604.1', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiazRLMThDVHNTckw3NzRIdUF3TWlVZFpiMlp6WlRHb3pUNjZnVWlBMyI7czo1MjoibG9naW5fdXNlcnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vMTcyLjIwLjEwLjMvcHJpbWV2ZXN0L3B1YmxpYy91c2Vycy9wcm9maWxlIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUzOiJsb2dpbl9hZG1pbnNfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1790058112);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`value`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `json`, `status`, `updated`, `date`) VALUES
(1, 'general_settings', '{\"email_verification\":\"on\",\"maintenance_mode\":\"on\"}', NULL, 'active', '2026-03-24 07:18:07', '2026-03-24 03:09:32'),
(2, 'social_settings', '{\"whatsapp_community\":\"https:\\/\\/hhsgd.sh\",\"telegram_community\":\"https:\\/\\/gsgsh.edhd\",\"customer_support\":\"https:\\/\\/172.20.10.3\\/primevest\\/public\\/admins\\/settings\",\"site_notification\":\"Empowering students to thrive beyond academics.\\r\\n  Earnify is a dedicated student welfare service focused on holistic support \\u2014 from mental health resources and financial guidance to peer mentoring and work-life balance strategies.\\r\\n  We bridge the gap between academic pressure and personal well-being, ensuring every student has access to the tools, advocacy, and community they need to succeed in school and in life.\",\"marquee_notification\":\"This is a marquee notification from admin can always be updated please endeavour to change before launching this was used for development\"}', NULL, 'active', '2026-09-21 18:56:10', '2026-03-24 03:48:42'),
(3, 'referral_settings', '{\"level_1\":\"14\",\"level_2\":\"5\",\"level_3\":\"1\"}', NULL, 'active', '2026-06-12 20:46:12', '2026-04-25 07:15:28'),
(4, 'finance_settings', '{\"welcome_bonus\":\"200\",\"daily_check_in\":\"70\",\"withdrawal\":{\"minimum\":\"100\",\"maximum\":\"50000\",\"fee\":\"10\",\"portal\":\"on\"}}', NULL, 'active', '2026-09-21 04:26:07', '2026-06-07 16:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT 0,
  `fee` float DEFAULT 0,
  `icon` text DEFAULT NULL,
  `wallet` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`wallet`)),
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `status` varchar(255) NOT NULL DEFAULT 'success',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `uniqid`, `user_id`, `title`, `class`, `type`, `amount`, `fee`, `icon`, `wallet`, `json`, `data`, `status`, `updated`, `date`) VALUES
(1, 'CAMXWL3G1789672716', 1, 'Welcome Bonus', 'credit', 'welcome_bonus', 200, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 5H20V3H4V5ZM20 9H4V7H20V9ZM3 11H10V13H14V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11ZM16 13V15H8V13H5V19H19V13H16Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":\"200\"},\"primary_wallet\":\"Main Wallet\"}', NULL, 'success', '2026-09-18 03:18:36', '2026-09-18 03:18:36'),
(2, 'ZNW1QKYW1789818042', 2, 'Welcome Bonus', 'credit', 'welcome_bonus', 200, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 5H20V3H4V5ZM20 9H4V7H20V9ZM3 11H10V13H14V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11ZM16 13V15H8V13H5V19H19V13H16Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":\"200\"},\"primary_wallet\":\"Main Wallet\"}', NULL, 'success', '2026-09-19 19:40:42', '2026-09-19 19:40:42'),
(3, 'CR2ACVHB1789818090', 3, 'Welcome Bonus', 'credit', 'welcome_bonus', 200, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 5H20V3H4V5ZM20 9H4V7H20V9ZM3 11H10V13H14V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11ZM16 13V15H8V13H5V19H19V13H16Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":\"200\"},\"primary_wallet\":\"Main Wallet\"}', NULL, 'success', '2026-09-19 19:41:30', '2026-09-19 19:41:30'),
(4, 'CIF84YCH1789818128', 4, 'Welcome Bonus', 'credit', 'welcome_bonus', 200, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 5H20V3H4V5ZM20 9H4V7H20V9ZM3 11H10V13H14V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11ZM16 13V15H8V13H5V19H19V13H16Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":\"200\"},\"primary_wallet\":\"Main Wallet\"}', NULL, 'success', '2026-09-19 19:42:08', '2026-09-19 19:42:08'),
(5, '4GKN5B0D1789818179', 5, 'Welcome Bonus', 'credit', 'welcome_bonus', 200, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 5H20V3H4V5ZM20 9H4V7H20V9ZM3 11H10V13H14V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11ZM16 13V15H8V13H5V19H19V13H16Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":\"200\"},\"primary_wallet\":\"Main Wallet\"}', NULL, 'success', '2026-09-19 19:42:59', '2026-09-19 19:42:59'),
(6, 'S1EWU0LE1789818774', 6, 'Welcome Bonus', 'credit', 'welcome_bonus', 200, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 5H20V3H4V5ZM20 9H4V7H20V9ZM3 11H10V13H14V11H21V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V11ZM16 13V15H8V13H5V19H19V13H16Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":\"200\"},\"primary_wallet\":\"Main Wallet\"}', NULL, 'success', '2026-09-19 19:52:54', '2026-09-19 19:52:54'),
(7, 'JOLNELVWLV', 1, 'Gg', 'credit', 'credit_alert', 50000, 0, NULL, '{\"from\":\"admin\",\"to\":\"deposit_balance\"}', '{\"balance\":{\"before\":200,\"after\":50200},\"primary_wallet\":\"Deposit Wallet\"}', NULL, 'success', '2026-09-19 21:43:46', '2026-09-19 21:43:46'),
(8, '12YUCO0G1789825536', 1, 'Product purchase', 'debit', 'package_purchase', 15000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":50200,\"after\":35200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":16,\"investment_id\":1}', '{\"Product\":\"VIP 1\",\"Product Cost\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a6375.00\",\"Total Earning\":\"\\u20a622,500.00\",\"Expires\":\"After 60 days\"}', 'success', '2026-09-19 21:45:36', '2026-09-19 21:45:36'),
(9, 'CS2UWBRM1789825542', 1, 'Product purchase', 'debit', 'package_purchase', 15000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":35200,\"after\":20200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":16,\"investment_id\":2}', '{\"Product\":\"VIP 1\",\"Product Cost\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a6375.00\",\"Total Earning\":\"\\u20a622,500.00\",\"Expires\":\"After 60 days\"}', 'success', '2026-09-19 21:45:42', '2026-09-19 21:45:42'),
(10, 'KCEMF3SBEI', 6, 'Deposit', 'credit', 'credit_alert', 50000, 0, NULL, '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":50000,\"after\":100000},\"primary_wallet\":\"Withdrawal Wallet\"}', NULL, 'success', '2026-09-20 18:02:35', '2026-09-20 18:02:35'),
(11, 'UVIFORAQ17', 1, 'Salary earning', 'credit', 'salary', 5, 0, '', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":0},\"primary_wallet\":\"Main Wallet\"}', NULL, 'success', '2026-09-20 18:09:12', '2026-09-20 18:09:12'),
(12, 'JLOMSPJ5PZ', 6, 'Gh', 'credit', 'credit_alert', 70000, 0, NULL, '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":100000,\"after\":170000},\"primary_wallet\":\"Withdrawal Wallet\"}', NULL, 'success', '2026-09-20 18:13:52', '2026-09-20 18:13:52'),
(13, 'EOZXWUHJ17', 1, 'Salary earning', 'credit', 'salary', 10000, 0, '', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":0},\"primary_wallet\":\"Main Wallet\"}', NULL, 'success', '2026-09-20 18:14:09', '2026-09-20 18:14:09'),
(14, 'DNI54NWP17', 1, 'Daily Check In', 'credit', 'daily_check_in', 70, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":500},\"primary_wallet\":\"Main Wallet\"}', '{\"Reward Method\":\"Instant\"}', 'success', '2026-09-20 20:17:09', '2026-09-20 20:17:09'),
(15, 'TKRDZSOZ17', 1, 'Daily interest repayment', 'credit', 'package_earning', 375, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM16 11L11 18V13H8L13 6V11H16Z\"></path></svg>', '{\"from\":\"package\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":460,\"after\":835},\"primary_wallet\":\"Main Wallet\",\"investment_id\":1}', '{\"Package\":\"VIP 1\",\"Purchase Price\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a6375.00\"}', 'success', '2026-09-21 03:08:37', '2026-09-21 03:08:37'),
(16, 'EORN9KKJ17', 1, 'Daily interest repayment', 'credit', 'package_earning', 375, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM16 11L11 18V13H8L13 6V11H16Z\"></path></svg>', '{\"from\":\"package\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":835,\"after\":1210},\"primary_wallet\":\"Main Wallet\",\"investment_id\":2}', '{\"Package\":\"VIP 1\",\"Purchase Price\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a6375.00\"}', 'success', '2026-09-21 03:08:37', '2026-09-21 03:08:37'),
(17, 'JZ59LO8X17', 1, 'Withdrawal from main wallet', 'debit', 'withdrawal', 1800, 200, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M1 14.5C1 12.1716 2.22429 10.1291 4.06426 8.9812C4.56469 5.044 7.92686 2 12 2C16.0731 2 19.4353 5.044 19.9357 8.9812C21.7757 10.1291 23 12.1716 23 14.5C23 17.9216 20.3562 20.7257 17 20.9811L7 21C3.64378 20.7257 1 17.9216 1 14.5ZM16.8483 18.9868C19.1817 18.8093 21 16.8561 21 14.5C21 12.927 20.1884 11.4962 18.8771 10.6781L18.0714 10.1754L17.9517 9.23338C17.5735 6.25803 15.0288 4 12 4C8.97116 4 6.42647 6.25803 6.0483 9.23338L5.92856 10.1754L5.12288 10.6781C3.81156 11.4962 3 12.927 3 14.5C3 16.8561 4.81833 18.8093 7.1517 18.9868L7.325 19H16.675L16.8483 18.9868ZM13 13V17H11V13H8L12 8L16 13H13Z\"></path></svg>', '{\"from\":\"main_balance\",\"to\":{\"method\":\"bank\",\"account_number\":\"5005016577\",\"bank_name\":\"Standard Chartered Bank\",\"account_name\":\"DAVID JAMES ABAKPA\"}}', '{\"balance\":{\"before\":7835,\"after\":5835},\"primary_wallet\":\"Main Wallet\",\"bank\":\"{\\\"account_number\\\":\\\"5005016577\\\",\\\"bank_name\\\":\\\"Standard Chartered Bank\\\",\\\"account_name\\\":\\\"DAVID JAMES ABAKPA\\\",\\\"bank_code\\\":\\\"068\\\"}\"}', '{\"Withdrawal method\":\"Bank Withdrawal\",\"Account number\":\"5005016577\",\"Bank name\":\"Standard Chartered Bank\",\"Account name\":\"DAVID JAMES ABAKPA\"}', 'success', '2026-09-21 04:26:49', '2026-09-21 04:26:49'),
(18, 'OSPTDPJH17', 1, 'Daily Check In', 'credit', 'daily_check_in', 70, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":500},\"primary_wallet\":\"Main Wallet\"}', '{\"Reward Method\":\"Instant\"}', 'success', '2026-09-21 18:55:40', '2026-09-21 18:55:40'),
(19, 'H2VZY9RF17', 1, 'Product purchase', 'debit', 'package_purchase', 15000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":20200,\"after\":5200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":16,\"investment_id\":3}', '{\"Product\":\"VIP 1\",\"Product Cost\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a6375.00\",\"Total Earning\":\"\\u20a622,500.00\",\"Expires\":\"After 60 days\"}', 'success', '2026-09-22 13:19:11', '2026-09-22 13:19:11'),
(20, 'WMJKJBA017', 1, 'Product purchase', 'debit', 'package_purchase', 15000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":55200,\"after\":40200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":22,\"investment_id\":4}', '{\"Product\":\"SAVINGS 01\",\"Product Cost\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a63,000.00\",\"Total Earning\":\"\\u20a6540,000.00\",\"Expires\":\"After 180 days\"}', 'success', '2026-09-22 13:23:25', '2026-09-22 13:23:25'),
(21, 'YSEIORBW17', 1, 'Investment in SAVINGS 01', 'debit', 'package_purchase', 15000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":40200,\"after\":25200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":22,\"investment_id\":5}', '{\"Product\":\"SAVINGS 01\",\"Product Cost\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a63,000.00\",\"Total Earning\":\"\\u20a6540,000.00\",\"Expires\":\"After 180 days\"}', 'success', '2026-09-22 13:27:26', '2026-09-22 13:27:26'),
(22, 'FP9AHM8E17', 1, 'Investment (SAVINGS 01)', 'debit', 'package_purchase', 15000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":25200,\"after\":10200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":22,\"investment_id\":6}', '{\"Product\":\"SAVINGS 01\",\"Product Cost\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a63,000.00\",\"Total Earning\":\"\\u20a6540,000.00\",\"Expires\":\"After 180 days\"}', 'success', '2026-09-22 13:28:03', '2026-09-22 13:28:03'),
(23, 'ACODJTDC17', 1, 'Investment (SAVINGS 01)', 'debit', 'package_purchase', 3000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":10200,\"after\":7200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":22,\"investment_id\":7}', '{\"Product\":\"SAVINGS 01\",\"Product Cost\":\"\\u20a63,000.00\",\"Daily Earning\":\"\\u20a63,000.00\",\"Total Earning\":\"\\u20a69,000.00\",\"Expires\":\"After 3 days\"}', 'success', '2026-09-22 13:53:22', '2026-09-22 13:53:22'),
(24, 'H1DHA1PG17', 1, 'Savings Return', 'credit', 'package_earning', 9000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM16 11L11 18V13H8L13 6V11H16Z\"></path></svg>', '{\"from\":\"package\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":0},\"primary_wallet\":\"Main Wallet\",\"investment_id\":7}', '{\"Share\":\"SAVINGS 01\",\"Share Cost\":\"\\u20a63,000.00\"}', 'success', '2026-09-22 13:57:59', '2026-09-22 13:57:59'),
(25, 'ML3GSUON17', 1, 'Daily interest repayment', 'credit', 'package_earning', 375, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM16 11L11 18V13H8L13 6V11H16Z\"></path></svg>', '{\"from\":\"package\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":15280,\"after\":15655},\"primary_wallet\":\"Main Wallet\",\"investment_id\":3}', '{\"Package\":\"VIP 1\",\"Purchase Price\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a6375.00\"}', 'success', '2026-09-22 13:58:43', '2026-09-22 13:58:43'),
(26, 'OR4CR4AH17', 1, 'Daily Payout', 'credit', 'package_earning', 375, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM16 11L11 18V13H8L13 6V11H16Z\"></path></svg>', '{\"from\":\"package\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":15655,\"after\":16030},\"primary_wallet\":\"Main Wallet\",\"investment_id\":3}', '{\"Package\":\"VIP 1\",\"Purchase Price\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a6375.00\"}', 'success', '2026-09-22 13:59:52', '2026-09-22 13:59:52'),
(27, 'RJAXRBXG17', 1, 'Daily Check In', 'credit', 'daily_check_in', 70, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":500},\"primary_wallet\":\"Main Wallet\"}', '{\"Reward Method\":\"Instant\"}', 'success', '2026-09-22 14:11:32', '2026-09-22 14:11:32'),
(28, '5FL6LP9917', 6, 'Daily Check In', 'credit', 'daily_check_in', 70, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":0,\"after\":500},\"primary_wallet\":\"Main Wallet\"}', '{\"Reward Method\":\"Instant\"}', 'success', '2026-09-22 14:13:36', '2026-09-22 14:13:36'),
(29, '4ZFANPNO17', 6, 'Investment (SAVINGS 01)', 'debit', 'package_purchase', 3000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":20200,\"after\":17200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":22,\"investment_id\":8}', '{\"Product\":\"SAVINGS 01\",\"Product Cost\":\"\\u20a63,000.00\",\"Daily Earning\":\"\\u20a63,000.00\",\"Total Earning\":\"\\u20a69,000.00\",\"Expires\":\"After 3 days\"}', 'success', '2026-09-22 14:13:45', '2026-09-22 14:13:45'),
(30, 'DG0WND8B17', 1, 'Level 1 referral commission', 'credit', 'referral_commission', 420, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":15725,\"after\":16145},\"primary_wallet\":\"Main Wallet\",\"level\":1}', '{\"Referred User\":\"Fhdhch\",\"Referral Level\":\"Level 1\",\"Product Purchased\":\"SAVINGS 01\",\"Product Cost\":\"\\u20a63,000.00\"}', 'success', '2026-09-22 14:13:45', '2026-09-22 14:13:45'),
(31, 'Z8NCOELH17', 6, 'Investment (VIP 1)', 'debit', 'package_purchase', 15000, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M4 3H20L22 7V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V7.00353L4 3ZM13 14V10H11V14H8L12 18L16 14H13ZM19.7639 7L18.7639 5H5.23656L4.23744 7H19.7639Z\"></path></svg>', '{\"from\":\"deposit_balance\",\"to\":\"admin\"}', '{\"balance\":{\"before\":17200,\"after\":2200},\"primary_wallet\":\"Deposit Wallet\",\"package_id\":16,\"investment_id\":9}', '{\"Product\":\"VIP 1\",\"Product Cost\":\"\\u20a615,000.00\",\"Daily Earning\":\"\\u20a6375.00\",\"Total Earning\":\"\\u20a622,500.00\",\"Expires\":\"After 60 days\"}', 'success', '2026-09-22 14:19:18', '2026-09-22 14:19:18'),
(32, '0FW7JKNU17', 1, 'Level 1 referral commission', 'credit', 'referral_commission', 2100, 0, '<svg viewBox=\"0 0 24 24\" fill=\"CurrentColor\" xmlns=\"http://www.w3.org/2000/svg\" height=\"20\" width=\"20\"><path d=\"M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z\"></path></svg>', '{\"from\":\"admin\",\"to\":\"main_balance\"}', '{\"balance\":{\"before\":16145,\"after\":18245},\"primary_wallet\":\"Main Wallet\",\"level\":1,\"user\":6}', '{\"Referred User\":\"Fhdhch\",\"Referral Level\":\"Level 1\",\"Product Purchased\":\"VIP 1\",\"Product Cost\":\"\\u20a615,000.00\"}', 'success', '2026-09-22 14:19:18', '2026-09-22 14:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqid` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'user',
  `username` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL DEFAULT 'nigeria',
  `currency` varchar(255) NOT NULL DEFAULT '₦',
  `display_currency` varchar(255) NOT NULL DEFAULT 'NGN',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `ref` bigint(20) DEFAULT NULL,
  `main_balance` float NOT NULL DEFAULT 0,
  `deposit_balance` float NOT NULL DEFAULT 0,
  `withdrawal_balance` float NOT NULL DEFAULT 0,
  `withdrawal` varchar(255) NOT NULL DEFAULT 'active',
  `palmpay_account` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`palmpay_account`)),
  `paga_account` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`paga_account`)),
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json`)),
  `status` varchar(255) DEFAULT 'active',
  `updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `bank` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'The user bank details in json_format with keys(bank_name,account_number & account_name)' CHECK (json_valid(`bank`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uniqid`, `type`, `username`, `photo`, `phone`, `country`, `currency`, `display_currency`, `name`, `email`, `ref`, `main_balance`, `deposit_balance`, `withdrawal_balance`, `withdrawal`, `palmpay_account`, `paga_account`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `json`, `status`, `updated`, `date`, `bank`) VALUES
(1, 'PA45IVZO1789672715', 'user', 'Blaady05', NULL, 'Blaady05', 'nigeria', '₦', 'NGN', 'David James', 'techie5961@gmail.com', NULL, 18245, 7200, 0, 'active', NULL, '{\"account_number\":\"1404632130\",\"account_name\":\"Aspfiy-Socialgigs David\",\"bank_name\":\"Paga\"}', NULL, '$2y$12$FURRtmJ1IByMLlJANRoxgeRSTLEpNzvSzIdli1ZSvBeZUE32McOcK', 'cLSCoiJxroYpx0kAbzy2ImpxcAqKelcWwWFfznNIF8zhsyfxafhVSJSXAUWk', NULL, NULL, NULL, 'active', '2026-09-22 14:19:18', '2026-09-18 03:18:36', '{\"account_number\":\"5005016577\",\"bank_name\":\"Standard Chartered Bank\",\"account_name\":\"DAVID JAMES ABAKPA\",\"bank_code\":\"068\"}'),
(2, 'YQNQOWTC1789818041', 'user', 'tdv', NULL, 'Tdv', 'nigeria', '₦', 'NGN', 'David James', 'abakpa@gmail.com', NULL, 0, 200, 0, 'active', NULL, NULL, NULL, '$2y$12$UZIooldAe2MXEhawbvsIKeIgjA5zYXvsGGMXFBWyfT2XmMh6IHeF6', NULL, NULL, NULL, NULL, 'active', '2026-09-19 19:40:42', '2026-09-19 19:40:42', NULL),
(3, '0GLSGG7O1789818090', 'user', 'avahaj', NULL, 'Avahaj', 'nigeria', '₦', 'NGN', 'David James', 'twch@hmaj.cjsb', NULL, 0, 200, 0, 'active', NULL, NULL, NULL, '$2y$12$LZIQ/x1G4t9pBYIYFcBuOuKZinGCiCaayTu4w95WAtmgybJjFMuZ2', NULL, NULL, NULL, NULL, 'active', '2026-09-19 19:41:30', '2026-09-19 19:41:30', NULL),
(4, 'B9BLXJKH1789818127', 'user', 'fggjg', NULL, 'Fggjg', 'nigeria', '₦', 'NGN', 'Ggy Fff', 'fudh@myog.mhi', NULL, 0, 200, 0, 'active', NULL, NULL, NULL, '$2y$12$vpdKS9EiqG6TN6Y10Qt2N.JRzbKbHwpzDRhYQHT2VrE/Wxh1vVptW', NULL, NULL, NULL, NULL, 'active', '2026-09-19 19:42:08', '2026-09-19 19:42:08', NULL),
(5, 'QVARFRYE1789818178', 'user', 'fggjgt', NULL, 'Fggjgt', 'nigeria', '₦', 'NGN', 'Ggy Fff', 'fudh@myog.mhig', NULL, 0, 200, 0, 'active', NULL, NULL, NULL, '$2y$12$Sgn8mftbxym0NTpk7G5MbO/frGfpcNPyWM7QyFVQVV2BhSd/hc9nm', NULL, NULL, NULL, NULL, 'active', '2026-09-19 19:42:59', '2026-09-19 19:42:59', NULL),
(6, '67AR7EPV1789818774', 'user', 'fhdhch', NULL, 'Fhdhch', 'nigeria', '₦', 'NGN', 'Chdjg Yyyu', 'cjfjh@jgkb.uig', 1, 170070, 2200, 0, 'active', NULL, '{\"account_number\":\"2352401272\",\"account_name\":\"Aspfiy-Socialgigs Chdjg\",\"bank_name\":\"Paga\"}', NULL, '$2y$12$lCR2cVzcMuQ/1S5mMZucweBN1GqxQCOSpseARevtSjL8rHD23hx/y', NULL, NULL, NULL, NULL, 'active', '2026-09-22 14:19:18', '2026-09-19 19:52:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giftcodes`
--
ALTER TABLE `giftcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `purchased_packages`
--
ALTER TABLE `purchased_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeemed_giftcodes`
--
ALTER TABLE `redeemed_giftcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giftcodes`
--
ALTER TABLE `giftcodes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `purchased_packages`
--
ALTER TABLE `purchased_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `redeemed_giftcodes`
--
ALTER TABLE `redeemed_giftcodes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
