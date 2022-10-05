-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2022 at 02:59 PM
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
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Meru', 1, NULL, NULL),
(2, 'Arusha City', 1, NULL, NULL),
(3, 'Arusha District', 1, NULL, NULL),
(4, 'Karatu', 1, NULL, NULL),
(5, 'Longido', 1, NULL, NULL),
(6, 'Monduli', 1, NULL, NULL),
(7, 'Ngorongoro', 1, NULL, NULL),
(8, 'Ilala', 2, NULL, NULL),
(9, 'Kinondoni', 2, NULL, NULL),
(10, 'Temeke', 2, NULL, NULL),
(11, 'Kigamboni', 2, NULL, NULL),
(12, 'Ubungo', 2, NULL, NULL),
(13, 'Bahi', 3, NULL, NULL),
(14, 'Chamwino', 3, NULL, NULL),
(15, 'Chemba', 3, NULL, NULL),
(16, 'Dodoma Municipal', 3, NULL, NULL),
(17, 'Kondoa', 3, NULL, NULL),
(18, 'Kongwa', 3, NULL, NULL),
(19, 'Mpwapwa', 3, NULL, NULL),
(20, 'Bukombe', 4, NULL, NULL),
(21, 'Chato', 4, NULL, NULL),
(22, 'Geita Town Council & Geita District Council', 4, NULL, NULL),
(23, 'Mbogwe', 4, NULL, NULL),
(24, 'Nyang\'hwale', 4, NULL, NULL),
(25, 'Iringa District', 5, NULL, NULL),
(26, 'Iringa Municipal', 5, NULL, NULL),
(27, 'Kilolo', 5, NULL, NULL),
(28, 'Mafinga Town', 5, NULL, NULL),
(29, 'Mufindi', 5, NULL, NULL),
(30, 'Biharamulo', 6, NULL, NULL),
(31, 'Bukoba', 6, NULL, NULL),
(32, 'Bukoba Municipal', 6, NULL, NULL),
(33, 'Karagwe', 6, NULL, NULL),
(34, 'Kyerwa', 6, NULL, NULL),
(35, 'Missenyi', 6, NULL, NULL),
(36, 'Muleba', 6, NULL, NULL),
(37, 'Ngara', 6, NULL, NULL),
(38, 'Mlele', 7, NULL, NULL),
(39, 'Mpanda', 7, NULL, NULL),
(40, 'Mpanda Town', 7, NULL, NULL),
(41, 'Buhigwe', 8, NULL, NULL),
(42, 'Kakonko', 8, NULL, NULL),
(43, 'Kasulu District', 8, NULL, NULL),
(44, 'Kasulu Town', 8, NULL, NULL),
(45, 'Kibondo', 8, NULL, NULL),
(46, 'Kigoma District', 8, NULL, NULL),
(47, 'Kigoma-Ujiji Municipal', 8, NULL, NULL),
(48, 'Uvinza', 8, NULL, NULL),
(49, 'Hai', 9, NULL, NULL),
(50, 'Moshi District', 9, NULL, NULL),
(51, 'Moshi Municipal', 9, NULL, NULL),
(52, 'Mwanga', 9, NULL, NULL),
(53, 'Rombo', 9, NULL, NULL),
(54, 'Same', 9, NULL, NULL),
(55, 'Siha', 9, NULL, NULL),
(56, 'Kilwa', 10, NULL, NULL),
(57, 'Lindi District', 10, NULL, NULL),
(58, 'Lindi Municipal', 10, NULL, NULL),
(59, 'Liwale', 10, NULL, NULL),
(60, 'Nachingwea', 10, NULL, NULL),
(61, 'Ruangwa', 10, NULL, NULL),
(62, 'Babati Town', 11, NULL, NULL),
(63, 'Babati District', 11, NULL, NULL),
(64, 'Hanang', 11, NULL, NULL),
(65, 'Kiteto', 11, NULL, NULL),
(66, 'Mbulu', 11, NULL, NULL),
(67, 'Simanjiro', 11, NULL, NULL),
(68, 'Bunda', 12, NULL, NULL),
(69, 'Butiama', 12, NULL, NULL),
(70, 'Musoma District', 12, NULL, NULL),
(71, 'Musoma Municipal', 12, NULL, NULL),
(72, 'Rorya', 12, NULL, NULL),
(73, 'Serengeti', 12, NULL, NULL),
(74, 'Tarime', 12, NULL, NULL),
(75, 'Busokelo', 13, NULL, NULL),
(76, 'Chunya', 13, NULL, NULL),
(77, 'Kyela', 13, NULL, NULL),
(78, 'Mbarali', 13, NULL, NULL),
(79, 'Mbeya City', 13, NULL, NULL),
(80, 'Mbeya District', 13, NULL, NULL),
(81, 'Rungwe', 13, NULL, NULL),
(82, 'Gairo', 14, NULL, NULL),
(83, 'Kilombero', 14, NULL, NULL),
(84, 'Kilosa', 14, NULL, NULL),
(85, 'Morogoro District', 14, NULL, NULL),
(86, 'Morogoro Municipal', 14, NULL, NULL),
(87, 'Mvomero', 14, NULL, NULL),
(88, 'Ulanga', 14, NULL, NULL),
(89, 'Masasi District', 15, NULL, NULL),
(90, 'Masasi Town', 15, NULL, NULL),
(91, 'Mtwara District', 15, NULL, NULL),
(92, 'Mtwara Municipal', 15, NULL, NULL),
(93, 'Nanyumbu', 15, NULL, NULL),
(94, 'Newala', 15, NULL, NULL),
(95, 'Tandahimba', 15, NULL, NULL),
(96, 'Ilemela', 16, NULL, NULL),
(97, 'Kwimba', 16, NULL, NULL),
(98, 'Magu', 16, NULL, NULL),
(99, 'Misungwi', 16, NULL, NULL),
(100, 'Nyamagana', 16, NULL, NULL),
(101, 'Sengerema', 16, NULL, NULL),
(102, 'Ukerewe', 16, NULL, NULL),
(103, 'Kati', 32, NULL, NULL),
(104, 'Kusini', 32, NULL, NULL),
(105, 'Magharibi', 30, NULL, NULL),
(106, 'Mjini', 30, NULL, NULL),
(107, 'Kaskazini A', 33, NULL, NULL),
(108, 'Kaskazini B', 33, NULL, NULL),
(109, 'Micheweni', 18, NULL, NULL),
(110, 'Wete', 18, NULL, NULL),
(111, 'Chake Chake', 19, NULL, NULL),
(112, 'Mkoani', 19, NULL, NULL),
(113, 'Ludewa', 17, NULL, NULL),
(114, 'Makambako', 17, NULL, NULL),
(115, 'Makete', 17, NULL, NULL),
(116, 'Njombe District', 17, NULL, NULL),
(117, 'Njombe Town', 17, NULL, NULL),
(118, 'Wanging\'ombe', 17, NULL, NULL),
(119, 'Bagamoyo', 20, NULL, NULL),
(120, 'Kibaha District', 20, NULL, NULL),
(121, 'Kibaha Town', 20, NULL, NULL),
(122, 'Kisarawe', 20, NULL, NULL),
(123, 'Mafia', 20, NULL, NULL),
(124, 'Mkuranga', 20, NULL, NULL),
(125, 'Rufiji', 20, NULL, NULL),
(126, 'Kalambo', 21, NULL, NULL),
(127, 'Nkasi', 21, NULL, NULL),
(128, 'Sumbawanga District', 21, NULL, NULL),
(129, 'Sumbawanga Municipal', 21, NULL, NULL),
(130, 'Mbinga', 22, NULL, NULL),
(131, 'Songea District', 22, NULL, NULL),
(132, 'Songea Municipal', 22, NULL, NULL),
(133, 'Tunduru', 22, NULL, NULL),
(134, 'Namtumbo', 22, NULL, NULL),
(135, 'Nyasa', 22, NULL, NULL),
(136, 'Bariadi', 24, NULL, NULL),
(137, 'Busega', 24, NULL, NULL),
(138, 'Itilima', 24, NULL, NULL),
(139, 'Maswa', 24, NULL, NULL),
(140, 'Meatu', 24, NULL, NULL),
(141, 'Ikungi', 25, NULL, NULL),
(142, 'Iramba', 25, NULL, NULL),
(143, 'Manyoni', 25, NULL, NULL),
(144, 'Mkalama', 25, NULL, NULL),
(145, 'Singida District', 25, NULL, NULL),
(146, 'Singida Municipal', 25, NULL, NULL),
(147, 'Igunga', 26, NULL, NULL),
(148, 'Kaliua', 26, NULL, NULL),
(149, 'Nzega', 26, NULL, NULL),
(150, 'Sikonge', 26, NULL, NULL),
(151, 'Tabora Municipal', 26, NULL, NULL),
(152, 'Urambo', 26, NULL, NULL),
(153, 'Uyui', 26, NULL, NULL),
(154, 'Handeni District', 27, NULL, NULL),
(155, 'Handeni Town', 27, NULL, NULL),
(156, 'Kilindi', 27, NULL, NULL),
(157, 'Korogwe Town', 27, NULL, NULL),
(158, 'Korogwe District', 27, NULL, NULL),
(159, 'Lushoto', 27, NULL, NULL),
(160, 'Muheza', 27, NULL, NULL),
(161, 'Mkinga', 27, NULL, NULL),
(162, 'Pangani', 27, NULL, NULL),
(163, 'Tanga City', 27, NULL, NULL),
(164, 'Kahama Town', 23, NULL, NULL),
(165, 'Kahama District', 23, NULL, NULL),
(166, 'Kishapu', 23, NULL, NULL),
(167, 'Shinyanga District', 23, NULL, NULL),
(168, 'Shinyanga Municipal', 23, NULL, NULL),
(169, 'Songwe', 31, NULL, NULL),
(170, 'Mbozi', 31, NULL, NULL),
(171, 'Ileje', 31, NULL, NULL),
(172, 'Momba', 31, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
