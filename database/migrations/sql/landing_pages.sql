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
-- Table structure for table `landing_pages`
--

DROP TABLE IF EXISTS `landing_pages`;
CREATE TABLE IF NOT EXISTS `landing_pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `hero_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hero_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_one_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature1_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_two_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature1_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_three_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature1_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_four_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature1_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_five_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature1_six` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_six_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature1_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_image_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature1_image_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial_sidecard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial1_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial1_student_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial1_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial1_paragraph` text COLLATE utf8mb4_unicode_ci,
  `testimonial2_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial2_student_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial2_occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testimonial2_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_one_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature2_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_two_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature2_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_three_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature2_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_four_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature2_five` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_five_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature2_six` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_six_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature2_seven` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_seven_paragraph` text COLLATE utf8mb4_unicode_ci,
  `feature2_eight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature2_eight_paragraph` text COLLATE utf8mb4_unicode_ci,
  `partners_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partners_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partners_paragraph` text COLLATE utf8mb4_unicode_ci,
  `calltoaction_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calltoaction_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `story1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `story1_paragrapgh` text COLLATE utf8mb4_unicode_ci,
  `story1_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `story2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `story2_paragrapgh` text COLLATE utf8mb4_unicode_ci,
  `story2_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_pages`
--

INSERT INTO `landing_pages` (`id`, `admin_id`, `hero_title`, `hero_subtitle`, `background_image`, `hero_paragraph`, `feature1_title`, `feature1_subtitle`, `feature1_one`, `feature1_one_paragraph`, `feature1_two`, `feature1_two_paragraph`, `feature1_three`, `feature1_three_paragraph`, `feature1_four`, `feature1_four_paragraph`, `feature1_five`, `feature1_five_paragraph`, `feature1_six`, `feature1_six_paragraph`, `feature1_image`, `feature1_image_title`, `feature1_image_subtitle`, `testimonial_sidecard`, `testimonial1_image`, `testimonial1_student_name`, `testimonial1_occupation`, `testimonial1_paragraph`, `testimonial2_image`, `testimonial2_student_name`, `testimonial2_occupation`, `testimonial2_paragraph`, `feature2_title`, `feature2_subtitle`, `feature2_one`, `feature2_one_paragraph`, `feature2_two`, `feature2_two_paragraph`, `feature2_three`, `feature2_three_paragraph`, `feature2_four`, `feature2_four_paragraph`, `feature2_five`, `feature2_five_paragraph`, `feature2_six`, `feature2_six_paragraph`, `feature2_seven`, `feature2_seven_paragraph`, `feature2_eight`, `feature2_eight_paragraph`, `partners_title`, `partners_subtitle`, `partners_paragraph`, `calltoaction_title`, `calltoaction_subtitle`, `story1_title`, `story1_paragrapgh`, `story1_image`, `story2_title`, `story2_paragrapgh`, `story2_image`, `created_at`, `updated_at`) VALUES
(1, 0, 'Bakwata Online Academy', 'Soma Kidigitali kwa jina la Mola wako', 'media/NbjoNPJT3C6XljutyBOFKdiguNJAmhNxnDh6OCrj.jpg', '<p>Jitambue, Badilika, Acha mazoea</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ushuhuda', 'media/txcbCXr9S0gzElddrzALImPjcKkZxjIrSeAR8oCv.jpg', 'Fatuma Mohamed', NULL, '<p>Kupitia Bakwata Online Academy, nmeweza kujifunza mengi na kuongeza ujuzi wangu wa utawala bora</p>', 'media/txcbCXr9S0gzElddrzALImPjcKkZxjIrSeAR8oCv.jpg', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hujachelewa', 'Jiunge sasa', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-14 14:49:56', '2022-09-14 14:58:08');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
