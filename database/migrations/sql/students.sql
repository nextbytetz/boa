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
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_reset_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_conversion` datetime DEFAULT NULL,
  `last_conversion_ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `registration_paid` tinyint(1) NOT NULL DEFAULT '0',
  `number` text COLLATE utf8mb4_unicode_ci,
  `district_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_password_reset_key_unique` (`password_reset_key`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `admin_id`, `company_id`, `type_id`, `type`, `first_name`, `last_name`, `email`, `password_reset_key`, `phone_number`, `website`, `twitter`, `facebook`, `linkedin`, `address`, `bio`, `zip`, `city`, `state`, `country`, `photo`, `email_verified_at`, `password`, `language`, `timezone`, `cover_photo`, `last_login`, `last_conversion`, `last_conversion_ip`, `created_at`, `updated_at`, `region_id`, `registration_paid`, `number`, `district_id`, `ward`, `village`) VALUES
(1, 0, '0', '0', NULL, 'Khadija', 'Hassan', 'khadija@gmail.com', NULL, '0766221322', NULL, NULL, 'facebook.com', NULL, 'testing address', NULL, NULL, NULL, NULL, NULL, 'media/m89GnFRlUnREYFVoHJbBaK8yoQmmpYvoEOOv0pXh.jpg', NULL, '$2y$10$Bdr3E60jMWAs8giiyySq8.hUwJ3sVqBhj/SNPbGsjjTjPKbS0VJSC', 'sw', NULL, NULL, '2022-09-27 14:50:41', NULL, NULL, '2022-09-14 11:21:01', '2022-09-27 13:50:41', 2, 1, 'BOA/DSM/09/2022', 0, '', ''),
(2, 0, '0', '0', NULL, 'Mohamed', 'Othman', 'mo@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ewqTnayiy2HeJtLSPvRT8eHCpH6s6qflRXkKy7llsg9UCP03jsuQi', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 08:56:19', '2022-09-15 08:56:19', 0, 0, '', 0, '', ''),
(3, 0, '0', '0', NULL, 'Juma', 'Awadhi', 'juma@gmail.com', NULL, '0713366301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$wK4nrskD1onT.0Eg2031FeG8onC.wJshHD1dtk4tPfcLlKL88jFNG', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 09:04:14', '2022-09-15 09:04:14', 0, 0, '', 0, '', ''),
(4, 0, '0', '0', NULL, 'Ally', 'Hussein', 'ally@gmail.com', NULL, '0713366300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$vpk3tYb4y0Cfg4R69RXjPe3splaHD8WKFsVJ1R2akrDYsA6B1RW3O', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 09:06:16', '2022-09-15 09:06:16', 0, 0, '', 0, '', ''),
(5, 0, '0', '0', NULL, 'Ally', 'Shaban', 'shaban@gmail.com', NULL, '0713366309', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$AMQ5q2oB2HoJL3CKbbEAB.50r1B01tknWurUnxlv/y6.uBWT27MyS', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 11:54:57', '2022-09-15 11:54:57', 0, 0, '', 0, '', ''),
(6, 0, '0', '0', NULL, 'Ramadhan', 'Rajab', 'ram@gmail.com', NULL, '0788330308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$qSjurcx9v4PiGbyLUo9hMelXNrzoPq6sXB1x.ho3bV1wa1tQMnzU6', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 11:56:08', '2022-09-15 11:56:08', 1, 0, '', 0, '', ''),
(7, 0, '0', '0', NULL, 'Rashid', 'Mbegu', 'rashid@gmail.com', NULL, '074536630', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$gaAmzzDoNk/WJAJKUVODnO2d5S22dZHSLKFZ2SWp177Enm.YLcErO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 12:23:39', '2022-09-15 12:23:39', 3, 0, '', 0, '', ''),
(8, 0, '0', '0', NULL, 'Mwanaidi', 'Shabani', 'mwana@gmail.com', NULL, '0745366306', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$AJfk/zrSqWexGbm1cjiehuVat3RUmFhWTLw4.B3KQgSMs6QUoQw26', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 12:25:45', '2022-09-15 12:25:45', 2, 0, '', 0, '', ''),
(9, 0, '0', '0', NULL, 'Bakari', 'Mussa', 'bakari@gmail.com', NULL, '0713366309', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XPsT7yzHGQMxoQdOJqcx.erOeXUMSOe/VtrII.4hJxSVmRd0P6y0e', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 12:28:45', '2022-09-15 12:28:45', 5, 0, '', 0, '', ''),
(10, 0, '0', '0', NULL, 'Maadhi', 'Rutajwaa', 'maa@gmail.com', NULL, '0713366303', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$PcvfaxlgyX/B6t2jIYwDa.C9X4jac6636vDQJn4LOIa4oyVbo6k42', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 12:31:09', '2022-09-15 12:31:09', 13, 0, '', 0, '', ''),
(11, 0, '0', '0', NULL, 'Jiohn', 'Jumaa', 'msaa@gmail.com', NULL, '0713366545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$qxCeUYi1zNBTQ42g6pKbCOq6OeFr1dTPyDpoBkK3fG7xnHSha/LfS', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-15 12:50:24', '2022-09-15 12:50:24', 15, 0, '', 0, '', ''),
(12, 0, '0', '0', NULL, 'Juma', 'Shabanii', 'jumaa@gmail.com', NULL, '0764244867', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'media/GwAJmzar2j7VziRLnprPapPXlmvNHMBauhhu7VW9.jpg', NULL, '$2y$10$U3vhuQ58NxInwFvFqRKczuKidia12DpuLfM02k7THCVnMTYZ1U8Am', 'sw', NULL, NULL, '2022-09-16 12:47:13', NULL, NULL, '2022-09-16 09:46:50', '2022-09-16 10:20:56', 3, 0, 'BOA/DOM/9/2022/12', 0, '', ''),
(13, 0, '0', '0', NULL, 'Mussa', 'Ramadhani', 'mussa@gmail.com', NULL, '0788330301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$pUn5EKMTq1GWmzXFMmJbmOFyJLVCPzW0xwvxY58YeZrOil2DZs5cK', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-18 03:26:37', '2022-09-18 03:26:38', 8, 0, 'BOA/KIG/9/2022/13', 9, 'test', 'test'),
(14, 0, '0', '0', NULL, 'Mwajuma', 'Salum', 'mwajuma@gmail.com', NULL, '0788330308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Bdr3E60jMWAs8giiyySq8.hUwJ3sVqBhj/SNPbGsjjTjPKbS0VJSC', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-18 05:41:54', '2022-09-18 05:41:54', 6, 0, 'BOA/KGA/9/2022/14', 7, 'test', 'test'),
(15, 0, '0', '0', NULL, 'Hamisi', 'Juma', 'hamisi@gmail.com', NULL, '0788330308', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$xWHlbPYwEwJorI8gy9ZJLuXlrgWiJDh8GsQYeTw1dV7gajEByBJLu', NULL, NULL, NULL, '2022-09-18 06:45:37', NULL, NULL, '2022-09-18 05:45:24', '2022-09-18 05:46:48', 2, 1, 'BOA/DSM/9/2022/15', 11, 'test', 'test'),
(16, 0, '0', '0', NULL, 'Maadhi', 'Abdu', 'computces@gmail.com', NULL, '0764244867', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$WcZruQE33rEEJI8cJwbxGeIilPU.3gBjyxX/51U4RA5RTeU/5OdhO', NULL, NULL, NULL, '2022-09-21 03:58:33', NULL, NULL, '2022-09-18 06:54:10', '2022-09-21 02:58:33', 2, 0, 'BOA/DSM/9/2022/16', 8, 'Ilala', 'Manyoni'),
(17, 0, '0', '0', NULL, 'Msabila', 'Raphael', 'msabila2013@yahoo.com', NULL, '0758357878', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$fi/4LhLAxbwe08UdpI1wsuOLz30n0kt0xUzWZjnAZgNWzKna9YF9G', NULL, NULL, NULL, '2022-09-18 10:55:11', NULL, NULL, '2022-09-18 09:54:42', '2022-09-18 09:55:11', 6, 0, 'BOA/KGA/9/2022/17', 32, 'Rwamishenye', 'Rwamishenye');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
