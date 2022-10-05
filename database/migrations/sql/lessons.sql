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
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `workspace_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` text COLLATE utf8mb4_unicode_ci,
  `duration` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `workspace_id`, `course_id`, `title`, `description`, `image`, `video`, `order`, `created_at`, `updated_at`, `file`, `duration`, `slug`) VALUES
(2, 1, 12, 'SOMO LA KOZI YA LUGHA YA KIARABU', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Kiarabu ni chanzo cha mafunzo ya uislam kwani vitabu vya kale vimeandikwa kwa kiarabu na mtume Muhammad Rehema za Allah aliyetakasika alikuwa mwarabu na aliyeongea kiarabu. Uislam ni dini ya ulimwengu na Qur’an imenakiliwa katika kiarabu na tafsiri zake zinatokana na kiarabu. Kwa hiyo utaona kiarabu ni Lugha muhimu kwa waislamu wote ili waweze kujua dini vizuri bila kuegemea tafsiri tu.</span></p>', NULL, NULL, 0, '2022-09-27 12:08:15', '2022-09-27 12:08:15', 'media/X8Ez54ySXUIsAvK0u25J2BQW973PykB5sHEaRxLk.pdf', '6', 'somo-la-kozi-ya-lugha-ya-kiarabu'),
(3, 1, 11, 'SOMO LA KOZI YA UANDISHI WA HABARI', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Uandishi wa habari (kwa Kiingereza journalism) ni kazi ya kukusanya, kupanga na kusambaza habari kwa wasomaji, wasikilizaji na watazamaji katika jamii. </span></p>', NULL, NULL, 0, '2022-09-27 12:10:58', '2022-09-27 12:10:58', 'media/iY5qfwIuuNmmKlKur2T0o5LDmkPT3JtMI9doeqID.pdf', '3', 'somo-la-kozi-ya-uandishi-wa-habari'),
(4, 1, 10, 'SOMO LA KOZI YA UCHUMI NA UJASIRIAMALI', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Moduli hii inahusu UCHUMI NA UJASIRIAMALI imekusudia kuwajengea uwezo Waisilam kwa ujumla wao (viongozi na waisiokuwa viongozi) maarifa muhimu yanahusu UCHUMI na UJASIRIAMALI ili waweze kuingia vyema katika kuujenga uchumi wa mtu mmoja mmoja na jamii kwa ujumla kwa kufanya shughuli za ujasiriamali au kwa wale ambao tayari wanafanya shughuli za ujasiriamali waweze kuongeza maarifa yao na kupiga hatua zaidi za kiuchumi.</span></p>', NULL, NULL, 0, '2022-09-27 12:13:24', '2022-09-27 12:13:24', 'media/eDzMHVcFYtVD8itSUrqbWpjK5FhigVjU1hFuzbGM.pdf', NULL, 'somo-la-kozi-ya-uchumi-na-ujasiriamali'),
(5, 1, 9, 'SOMO LA KOZI YA WALIMU WA MADRASA', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Ufundishaji (ualimu) ni fani ambayo kila mjuzii wa kitu chochote lazima kuna chanzo na njia zilizo tumika kumfanya awe mjuzi. Na kila mjuzi ana mjuzi wake. Hivyo katika kozi hii kila aliye mjuzi ni wajibu kwake kuwajuza wengine wasio na ujuzi kupitia njia zilizo bainishwa na huo ndio ufundishaji. </span></p>', NULL, NULL, 0, '2022-09-27 12:15:22', '2022-09-27 12:15:22', 'media/oGJUnY2xH3kNygRodPHTbUbSlMoisGEXAjbokOe4.pdf', '2', 'somo-la-kozi-ya-walimu-wa-madrasa'),
(6, 1, 13, 'SOMO LA SCHOOL MANAGEMENT COURSE', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">School Management comprises planning, organizing, staffing, leading or directing, and controlling an educational institution with the purpose of accomplishing the educational goals. Its main aim is to create a safe and conducive learning environment in the school.</span></p>', NULL, NULL, 0, '2022-09-27 12:17:00', '2022-09-27 12:17:00', 'media/Ulu4bKEA2H5oOO16cFvEKGIZ0lzdGnWRxeo8RtsR.pdf', '3', 'somo-la-school-management-course'),
(7, 1, 8, 'SOMO LA STADI ZA MAISHA KWA MWANAMKE WA KIISLAM', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Kutokana na dunia ya sasa mambo mengi kuhitaji maarifa, inatubidi tujifunze kila mara ili tuweze kuendelea kumcha Mwenyezi Mungu wa pekee, aliyetakasika na wakati huo huo tukimudu maisha yenye mabadiliko.</span></p>', NULL, NULL, 0, '2022-09-27 12:19:01', '2022-09-27 12:21:08', 'media/vdif3PckZCW5SwrBVzWOsOvc5RiufvfhYmJ3r7TW.pdf', '1', 'somo-la-stadi-za-maisha-kwa-mwanamke'),
(8, 1, 7, 'SOMO LA STADI ZA UHASIBU NA USIMAMIZI WA FEDHA', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Moduli hii imeaandaliwa kwa lengo kuu la kujenga weledi (ufahamu) katika stadi za uhasibu na usimamizi wa fedha kwa watendaji na viongozi wa taasisi. Kwa kuwa taaluma ni pana sana ya maswala ya uhasibu na usimamizi wa fedha, mdouli hii imelenga katika kutoa mwangaza wa kumfanya kiongozi na mtendaji katika taasisi kutekeleza wajibu wao kwa mambo muhimu lakini bila kupoteza rasilimali za taasisi.</span></p>', NULL, NULL, 0, '2022-09-27 12:23:17', '2022-09-27 12:23:17', 'media/pUChI7vcoSnmjyMtIOiGnaPgAKqAbGxZI5GgTh0w.pdf', '3', 'somo-la-stadi-za-uhasibu-na-usimamizi-wa-fedha'),
(9, 1, 6, 'SOMO LA UFUGAJI WA KUKU', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Kitabu hiki kitaelekeza kwa muhtasari mbinu muhimu za ufugaji wa kuku kwa faida ikizingatiwa kufuga kwa kanuni za kisasa na maradhi ya kuku bila kusahau tiba za maradhi hayo ili mfugaji haweze kupata faida inayoendana na juhudi zake bila kusahau mtaji aliyotumia katika mradi wa kuku.</span></p>', NULL, NULL, 0, '2022-09-27 12:25:03', '2022-09-27 12:25:03', 'media/QQxQ5wXV1Ya8gdjCXI9x8KybVKuiL4ss7Mao4iY4.pdf', '3', 'somo-la-ufugaji-wa-kuku'),
(10, 1, 5, 'SOMO LA UONGOZI NA USIMAMIZI WA MSIKITI', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Kozi hii ni maalum kwa Viongozi wa Msikiti kama imam, Katibu, Mweka hazina na Wajumbe wote na pia ni hiari kwa yoyote anayehitaji maarifa na kujiandaa kuongoza msikiti siku zijazo katika maisha yake.</span></p>', NULL, NULL, 0, '2022-09-27 12:27:00', '2022-09-27 12:27:00', 'media/33Z5QHVeumMtRUNAwSs27KKIBxrtoQc3kw4ILx9d.pdf', '1', 'somo-la-uongozi-na-usimamizi-wa-msikiti'),
(11, 1, 4, 'SOMO LA UONGOZI NDANI YA BAKWATA', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Moduli hii ni maalumu kwa viongozi ambao wapo katika nafasi mbali mbali za BAKWATA kwa sasa na wale ambao si viongozi lakini wangependa kusoma kwa matumizi yao ya baadaye. </span></p>', NULL, NULL, 0, '2022-09-27 12:29:23', '2022-09-27 12:29:23', 'media/v2PfMiVJe0QfeVb1gwAjzbi5x349YKdBTFPtIUTJ.pdf', '3', 'somo-la-uongozi-ndani-ya-bakwata'),
(12, 1, 3, 'SOMO LA URAIA, MAADILI NA SHERIA ZA MSINGI NA SHERIA ZA ARDHI', '<p><span style=\"color:#67748e;font-family:Inter, sans-serif;font-size:16px;background-color:#ffffff;\">Hili somo rasmi la Uraia na Maadili ni somo kwa kila mtanzania wa umri wowote na linahusu hasa kanuni zinazobainisha uzuri na ubaya wa matendo ya binadamu. Tutajifunza ni jinsi gani binadamu anastahili au anapaswa kuishi. Kwa maneno mengine, katika Somo la Uraia na Maadili tunajiuliza maisha mazuri ni yapi? Kuishi vizuri maana yake ni nini? Ubaya ni nini? Tunawezaje kuishi kama binadamu?</span></p>', NULL, NULL, 0, '2022-09-27 12:31:56', '2022-09-27 12:31:56', 'media/fsuCYzwJ3koBHjlFI5uJVEzhKWVCtEYcVDRiPR5O.pdf', '3', 'somo-la-uraia,-maadili-na-sheria-za-msingi-na-sheria-za-ardhi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
