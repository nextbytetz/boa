-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2022 at 03:00 PM
-- Server version: 5.7.31
-- PHP Version: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boa`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `workspace_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'company_name', 'CloudOnex', '2022-08-14 04:21:01', '2022-08-14 04:21:01'),
(2, 1, 'currency', 'TZS', '2022-09-14 10:34:00', '2022-09-14 10:43:12'),
(3, 1, 'landingpage', 'Default', '2022-09-14 10:34:00', '2022-09-14 10:34:00'),
(4, 1, 'logo', 'media/6rL9GLlRUoTpKxQu0PfGYVIpuAIc5g5bG8JfHAoV.jpg', '2022-09-14 10:34:00', '2022-09-14 10:34:00'),
(5, 1, 'free_trial_days', '0', '2022-09-14 10:34:00', '2022-09-14 10:34:00'),
(6, 2, 'company_name', 'CloudOnex', '2022-09-15 10:34:58', '2022-09-15 10:34:58'),
(7, 3, 'company_name', 'CloudOnex', '2022-09-15 10:41:10', '2022-09-15 10:41:10'),
(8, 4, 'company_name', 'CloudOnex', '2022-09-15 10:49:47', '2022-09-15 10:49:47');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
