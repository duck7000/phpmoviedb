-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 23, 2024 at 05:29 PM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmoviedb`
--
CREATE DATABASE IF NOT EXISTS `phpmoviedb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpmoviedb`;

-- --------------------------------------------------------

--
-- Table structure for table `audiotypes`
--

CREATE TABLE `audiotypes` (
  `id` int UNSIGNED NOT NULL,
  `audiotypes` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audiotypes`
--

INSERT INTO `audiotypes` (`id`, `audiotypes`) VALUES
(1, 'AAC 1.0'),
(2, 'AAC 1.1'),
(3, 'AAC 2.0'),
(4, 'AAC 2.1'),
(5, 'AAC 3.0'),
(6, 'AAC 3.1'),
(7, 'AAC 4.0'),
(8, 'AAC 4.1'),
(9, 'AAC 5.0'),
(10, 'AAC 5.1'),
(11, 'Dolby Digital 1.0'),
(12, 'Dolby Digital 1.1'),
(13, 'Dolby Digital 2.0'),
(14, 'Dolby Digital 2.1'),
(15, 'Dolby Digital 3.0'),
(16, 'Dolby Digital 3.1'),
(17, 'Dolby Digital 4.0'),
(18, 'Dolby Digital 4.1'),
(19, 'Dolby Digital 5.0'),
(20, 'Dolby Digital 5.1'),
(21, 'Dolby Digital Plus 1.0'),
(22, 'Dolby Digital Plus 1.1'),
(23, 'Dolby Digital Plus 2.0'),
(24, 'Dolby Digital Plus 2.1'),
(25, 'Dolby Digital Plus 3.0'),
(26, 'Dolby Digital Plus 3.1'),
(27, 'Dolby Digital Plus 4.0'),
(28, 'Dolby Digital Plus 4.1'),
(29, 'Dolby Digital Plus 5.0'),
(30, 'Dolby Digital Plus 5.1'),
(31, 'Dolby Digital Pro Logic 1.0'),
(32, 'Dolby Digital Pro Logic 1.1'),
(33, 'Dolby Digital Pro Logic 2.0'),
(34, 'Dolby Digital Pro Logic 2.1'),
(35, 'Dolby Digital Pro Logic 3.0'),
(36, 'Dolby Digital Pro Logic 3.1'),
(37, 'Dolby Digital Pro Logic 4.0'),
(38, 'Dolby TrueHD 1.0'),
(39, 'Dolby TrueHD 1.1'),
(40, 'Dolby TrueHD 2.0'),
(41, 'Dolby TrueHD 2.1'),
(42, 'Dolby TrueHD 3.0'),
(43, 'Dolby TrueHD 3.1'),
(44, 'Dolby TrueHD 4.0'),
(45, 'Dolby TrueHD 4.1'),
(46, 'Dolby TrueHD 5.0'),
(47, 'Dolby TrueHD 5.1'),
(48, 'Dolby TrueHD 6.0'),
(49, 'Dolby TrueHD 6.1'),
(50, 'Dolby TrueHD 7.0'),
(51, 'Dolby TrueHD 7.1'),
(52, 'DTS 1.0'),
(53, 'DTS 1.1'),
(54, 'DTS 2.0'),
(55, 'DTS 2.1'),
(56, 'DTS 3.0'),
(57, 'DTS 3.1'),
(58, 'DTS 4.0'),
(59, 'DTS 4.1'),
(60, 'DTS 5.0'),
(61, 'DTS 5.1'),
(62, 'DTS 6.0'),
(63, 'DTS 6.1'),
(64, 'DTS-HD Master Audio 1.0'),
(65, 'DTS-HD Master Audio 1.1'),
(66, 'DTS-HD Master Audio 2.0'),
(67, 'DTS-HD Master Audio 2.1'),
(68, 'DTS-HD Master Audio 3.0'),
(69, 'DTS-HD Master Audio 3.1'),
(70, 'DTS-HD Master Audio 4.0'),
(71, 'DTS-HD Master Audio 4.1'),
(72, 'DTS-HD Master Audio 5.0'),
(73, 'DTS-HD Master Audio 5.1'),
(74, 'DTS-HD Master Audio 6.0'),
(75, 'DTS-HD Master Audio 6.1'),
(76, 'DTS-HD Master Audio 7.0'),
(77, 'DTS-HD Master Audio 7.1'),
(78, 'FLAC 1.0'),
(79, 'FLAC 1.1'),
(80, 'FLAC 2.0'),
(81, 'FLAC 2.1'),
(82, 'FLAC 3.0'),
(83, 'FLAC 3.1'),
(84, 'FLAC 4.0'),
(85, 'FLAC 4.1'),
(86, 'FLAC 5.0'),
(87, 'FLAC 5.1'),
(88, 'PCM/LPCM 1.0'),
(89, 'PCM/LPCM 1.1'),
(90, 'PCM/LPCM 2.0'),
(91, 'PCM/LPCM 2.1'),
(92, 'PCM/LPCM 3.0'),
(93, 'PCM/LPCM 3.1'),
(94, 'PCM/LPCM 4.0'),
(95, 'PCM/LPCM 4.1'),
(96, 'PCM/LPCM 5.0'),
(97, 'PCM/LPCM 5.1'),
(98, 'Mono 1.0'),
(99, 'Mono 1.1'),
(100, 'Stereo 2.0'),
(101, 'MP2 1.0'),
(102, 'MP2 1.1'),
(103, 'MP2 2.0'),
(104, 'MP3 1.0'),
(105, 'MP3 1.1'),
(106, 'MP3 2.0');

-- --------------------------------------------------------

--
-- Table structure for table `formats`
--

CREATE TABLE `formats` (
  `id` int UNSIGNED NOT NULL,
  `formats` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formats`
--

INSERT INTO `formats` (`id`, `formats`) VALUES
(1, 'ASF'),
(2, 'AVI'),
(3, 'BLU-RAY'),
(4, 'DVD'),
(5, 'DVD-AUDIO'),
(6, 'DVD-R'),
(7, 'FLV'),
(8, 'HD-DVD'),
(9, 'LASERDISC'),
(10, 'M2TS'),
(11, 'M2V'),
(12, 'M4P'),
(13, 'M4V'),
(14, 'MJPEG'),
(15, 'MK3D'),
(16, 'MKV'),
(17, 'MOV'),
(18, 'MP4'),
(19, 'MPEG'),
(20, 'MPG'),
(21, 'OGM'),
(22, 'OGV'),
(23, 'SVCD'),
(24, 'TS'),
(25, 'VHS'),
(26, 'WEBM'),
(27, 'WMV'),
(28, 'CD');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int UNSIGNED NOT NULL,
  `language` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `language`) VALUES
(1, 'Duits'),
(2, 'Engels'),
(3, 'Engels SDH'),
(4, 'Frans'),
(5, 'Geen'),
(6, 'Grieks'),
(7, 'Italiaans'),
(8, 'Nederlands'),
(9, 'N.v.t.'),
(10, 'Portugees'),
(11, 'Spaans');

-- --------------------------------------------------------

--
-- Table structure for table `mediacertifications`
--

CREATE TABLE `mediacertifications` (
  `id` int UNSIGNED NOT NULL,
  `mediacertifications` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mediacertifications`
--

INSERT INTO `mediacertifications` (`id`, `mediacertifications`) VALUES
(1, 'ATP'),
(2, '+13'),
(3, '+16'),
(4, '+18'),
(5, 'C'),
(6, 'G'),
(7, 'PG'),
(8, 'M'),
(9, 'MA15+'),
(10, 'R18+'),
(11, 'Banned'),
(12, 'RC'),
(13, 'X18+'),
(14, 'Unrestricted'),
(15, '6'),
(16, '8'),
(17, '10'),
(18, '12'),
(19, '14'),
(20, '16'),
(21, '18'),
(22, 'AL/TOUS'),
(23, 'L'),
(24, 'B'),
(162, 'FSK-16'),
(26, 'D'),
(27, 'A'),
(28, 'X'),
(29, 'R'),
(30, '14A'),
(31, 'Exempt'),
(32, 'PG (Not recommended for young children)'),
(33, 'Prohibited'),
(34, '18A'),
(35, 'G (Not suitable for young children)'),
(36, '18 (Explicit sexuality)'),
(37, 'Refused classification'),
(38, 'TE'),
(39, '18 Excessive violence'),
(40, '18 Pornography'),
(41, 'Educational'),
(42, 'Suitable for all ages'),
(43, 'T'),
(44, '7'),
(45, '15'),
(46, '11'),
(47, '11 / 15'),
(48, 'F'),
(49, 'MS-6'),
(50, 'PERE'),
(51, 'MS-12'),
(52, 'MS-14'),
(53, 'K-12'),
(54, 'K-16'),
(55, 'S'),
(56, 'TP'),
(57, '-12'),
(58, '-16'),
(59, '-18'),
(60, '0'),
(61, 'Unrated'),
(62, '13'),
(63, '17'),
(163, 'FSK-18'),
(65, 'I'),
(66, 'IIA/IIB'),
(67, 'III'),
(68, '9'),
(69, 'KN'),
(70, 'U'),
(71, 'UA'),
(72, '13+'),
(73, 'SU'),
(74, '17+'),
(75, '21+'),
(76, 'N/A'),
(77, '12A'),
(78, '15A'),
(79, 'VM14'),
(80, 'VM18'),
(81, 'PG-13'),
(82, 'T-16'),
(83, 'A-18'),
(84, 'R15+'),
(85, 'PG12'),
(86, 'R18+'),
(87, 'K'),
(161, 'FSK-12'),
(89, 'E16'),
(90, 'E18'),
(91, 'Be14'),
(92, 'E'),
(93, 'HA'),
(94, '18+'),
(95, 'T (13+)'),
(96, '7+'),
(97, '12+'),
(98, '16+'),
(99, 'P13'),
(100, '15+'),
(101, '18+'),
(102, 'PU'),
(103, '18+R'),
(104, 'Not fit for exhibition'),
(105, 'B-15'),
(106, 'AA'),
(107, 'AL'),
(108, 'R13'),
(109, 'R15'),
(110, 'R16'),
(111, 'R18'),
(112, 'Objectionable'),
(113, 'RP13'),
(114, 'RP16'),
(115, 'RP18'),
(116, 'RE'),
(117, 'Not approved'),
(118, 'R-13'),
(119, 'R-16'),
(120, 'R-18'),
(121, 'M/ 3/6/12/14/16/18'),
(122, 'M/3'),
(123, 'M/6'),
(124, 'M/12'),
(125, 'M/14'),
(126, 'M/16'),
(127, 'M/18'),
(128, 'M/18-P'),
(129, 'N-15'),
(130, 'AG'),
(131, 'AP-12'),
(132, 'N-15'),
(133, 'IM-18-XXX'),
(134, 'IM-18'),
(135, 'IC'),
(136, '0+'),
(137, '6+'),
(138, 'R12'),
(139, 'M18'),
(140, 'R21'),
(141, 'NC16'),
(142, '7-9PG'),
(143, '10-12PG'),
(144, 'X18'),
(145, 'XX'),
(146, 'ALL'),
(147, 'Restricted screening'),
(148, '18 Restricted screening'),
(149, 'APTA'),
(150, 'Pelicula X'),
(151, 'Btl'),
(152, '20'),
(153, 'P'),
(154, 'Rejected'),
(155, 'Not rated'),
(156, 'NC-17'),
(157, 'C13'),
(158, 'C16'),
(159, 'C18'),
(160, 'MA'),
(164, 'Uncut'),
(165, 'FSK-6'),
(166, 'TV-14');

-- --------------------------------------------------------

--
-- Table structure for table `mediacountry`
--

CREATE TABLE `mediacountry` (
  `id` int UNSIGNED NOT NULL,
  `mediacountry` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mediacountry`
--

INSERT INTO `mediacountry` (`id`, `mediacountry`) VALUES
(2, 'Afghanistan'),
(3, 'Akrotiri'),
(4, 'Albania'),
(5, 'Algeria'),
(6, 'American Samoa'),
(7, 'Andorra'),
(8, 'Angola'),
(9, 'Anguilla'),
(10, 'Antarctica'),
(11, 'Antigua and Barbuda'),
(12, 'Argentina'),
(13, 'Armenia'),
(14, 'Aruba'),
(15, 'Ashmore and Cartier Islands'),
(16, 'Australia'),
(17, 'Austria'),
(18, 'Azerbaijan'),
(19, 'Bahamas'),
(20, 'Bahrain'),
(21, 'Bangladesh'),
(22, 'Barbados'),
(23, 'Bassas da India'),
(24, 'Belarus'),
(25, 'Belgium'),
(26, 'Belize'),
(27, 'Benin'),
(28, 'Bermuda'),
(29, 'Bhutan'),
(30, 'Bolivia'),
(31, 'Bosnia and Herzegovina'),
(32, 'Botswana'),
(33, 'Bouvet Island'),
(34, 'Brazil'),
(35, 'British Indian Ocean Territory'),
(36, 'British Virgin Islands'),
(37, 'Brunei'),
(38, 'Bulgaria'),
(39, 'Burkina Faso'),
(40, 'Burma'),
(41, 'Burundi'),
(42, 'Cambodia'),
(43, 'Cameroon'),
(44, 'Canada'),
(45, 'Cape Verde'),
(46, 'Cayman Islands'),
(47, 'Central African Republic'),
(48, 'Chad'),
(49, 'Chile'),
(50, 'China'),
(51, 'Christmas Island'),
(52, 'Clipperton Island'),
(53, 'Cocos (Keeling) Islands'),
(54, 'Colombia'),
(55, 'Comoros'),
(56, 'Congo'),
(57, 'Cook Islands'),
(58, 'Coral Sea Islands'),
(59, 'Costa Rica'),
(60, 'Cote d\'Ivoire'),
(61, 'Croatia'),
(62, 'Cuba'),
(63, 'Cyprus'),
(64, 'Czech Republic'),
(65, 'Denmark'),
(66, 'Dhekelia'),
(67, 'Djibouti'),
(68, 'Dominica'),
(69, 'Dominican Republic'),
(70, 'Ecuador'),
(71, 'Egypt'),
(72, 'El Salvador'),
(73, 'Equatorial Guinea'),
(74, 'Eritrea'),
(75, 'Estonia'),
(76, 'Ethiopia'),
(77, 'Europa Island'),
(78, 'Falkland Islands (Islas Malvinas)'),
(79, 'Faroe Islands'),
(80, 'Fiji'),
(81, 'Finland'),
(82, 'France'),
(83, 'French Guiana'),
(84, 'French Polynesia'),
(85, 'French Southern and Antarctic Lands'),
(86, 'Gabon'),
(87, 'Gambia'),
(88, 'Gaza Strip'),
(89, 'Georgia'),
(90, 'Germany'),
(91, 'Ghana'),
(92, 'Gibraltar'),
(93, 'Glorioso Islands'),
(94, 'Greece'),
(95, 'Greenland'),
(96, 'Grenada'),
(97, 'Guadeloupe'),
(98, 'Guam'),
(99, 'Guatemala'),
(100, 'Guernsey'),
(101, 'Guinea'),
(102, 'Guinea-Bissau'),
(103, 'Guyana'),
(104, 'Haiti'),
(105, 'Heard Island and McDonald Islands'),
(106, 'Holy See (Vatican City)'),
(107, 'Honduras'),
(108, 'Hong Kong'),
(109, 'Hungary'),
(110, 'Iceland'),
(111, 'India'),
(112, 'Indonesia'),
(113, 'Iran'),
(114, 'Iraq'),
(115, 'Ireland'),
(116, 'Isle of Man'),
(117, 'Israel'),
(118, 'Italy'),
(119, 'Jamaica'),
(120, 'Jan Mayen'),
(121, 'Japan'),
(122, 'Jersey'),
(123, 'Jordan'),
(124, 'Juan de Nova Island'),
(125, 'Kazakhstan'),
(126, 'Kenya'),
(127, 'Kiribati'),
(128, 'Korea North'),
(129, 'Korea South'),
(130, 'Kuwait'),
(131, 'Kyrgyzstan'),
(132, 'Laos'),
(133, 'Latvia'),
(134, 'Lebanon'),
(135, 'Lesotho'),
(136, 'Liberia'),
(137, 'Libya'),
(138, 'Liechtenstein'),
(139, 'Lithuania'),
(140, 'Luxembourg'),
(141, 'Macau'),
(142, 'Macedonia'),
(143, 'Madagascar'),
(144, 'Malawi'),
(145, 'Malaysia'),
(146, 'Maldives'),
(147, 'Mali'),
(148, 'Malta'),
(149, 'Marshall Islands'),
(150, 'Martinique'),
(151, 'Mauritania'),
(152, 'Mauritius'),
(153, 'Mayotte'),
(154, 'Mexico'),
(155, 'Micronesia'),
(156, 'Moldova'),
(157, 'Monaco'),
(158, 'Mongolia'),
(159, 'Montserrat'),
(160, 'Morocco'),
(161, 'Mozambique'),
(162, 'Namibia'),
(163, 'Nauru'),
(164, 'Navassa Island'),
(165, 'Nepal'),
(166, 'Netherlands'),
(167, 'Netherlands Antilles'),
(168, 'New Caledonia'),
(169, 'New Zealand'),
(170, 'Nicaragua'),
(171, 'Niger'),
(172, 'Nigeria'),
(173, 'Niue'),
(174, 'Norfolk Island'),
(175, 'Northern Mariana Islands'),
(176, 'Norway'),
(177, 'Oman'),
(178, 'Pakistan'),
(179, 'Palau'),
(180, 'Panama'),
(181, 'Papua New Guinea'),
(182, 'Paracel Islands'),
(183, 'Paraguay'),
(184, 'Peru'),
(185, 'Philippines'),
(186, 'Pitcairn Islands'),
(187, 'Poland'),
(188, 'Portugal'),
(189, 'Puerto Rico'),
(190, 'Qatar'),
(191, 'Reunion'),
(192, 'Romania'),
(193, 'Russia'),
(194, 'Rwanda'),
(195, 'Saint Helena'),
(196, 'Saint Kitts and Nevis'),
(197, 'Saint Lucia'),
(198, 'Saint Pierre and Miquelon'),
(199, 'Saint Vincent and the Grenadines'),
(200, 'Samoa'),
(201, 'San Marino'),
(202, 'Sao Tome and Principe'),
(203, 'Saudi Arabia'),
(204, 'Senegal'),
(205, 'Serbia and Montenegro'),
(206, 'Seychelles'),
(207, 'Sierra Leone'),
(208, 'Singapore'),
(209, 'Slovakia'),
(210, 'Slovenia'),
(211, 'Solomon Islands'),
(212, 'Somalia'),
(213, 'South Africa'),
(214, 'South Georgia and the South Sandwich Islands'),
(215, 'Spain'),
(216, 'Spratly Islands'),
(217, 'Sri Lanka'),
(218, 'Sudan'),
(219, 'Suriname'),
(220, 'Svalbard'),
(221, 'Swaziland'),
(222, 'Sweden'),
(223, 'Switzerland'),
(224, 'Syria'),
(225, 'Taiwan'),
(226, 'Tajikistan'),
(227, 'Tanzania'),
(228, 'Thailand'),
(229, 'Timor-Leste'),
(230, 'Togo'),
(231, 'Tokelau'),
(232, 'Tonga'),
(233, 'Trinidad and Tobago'),
(234, 'Tromelin Island'),
(235, 'Tunisia'),
(236, 'Turkey'),
(237, 'Turkmenistan'),
(238, 'Turks and Caicos Islands'),
(239, 'Tuvalu'),
(240, 'Uganda'),
(241, 'Ukraine'),
(242, 'United Arab Emirates'),
(243, 'United Kingdom'),
(244, 'United States'),
(245, 'Uruguay'),
(246, 'Uzbekistan'),
(247, 'Vanuatu'),
(248, 'Venezuela'),
(249, 'Vietnam'),
(250, 'Virgin Islands'),
(251, 'Wake Island'),
(252, 'Wallis and Futuna'),
(253, 'West Bank'),
(254, 'Western Sahara'),
(255, 'Yemen'),
(256, 'Zambia'),
(257, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `mediaEdition`
--

CREATE TABLE `mediaEdition` (
  `id` int UNSIGNED NOT NULL,
  `mediaEdition` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mediaEdition`
--

INSERT INTO `mediaEdition` (`id`, `mediaEdition`) VALUES
(1, 'Director\'s Cut'),
(2, 'Extended Cut'),
(3, 'Theatrical Cut'),
(4, 'Broadcast Cut'),
(5, 'Final Cut'),
(6, 'Final Unrated Cut'),
(7, 'Special Edition'),
(8, 'Standard Cut'),
(9, 'International Cut'),
(10, 'Television Cut'),
(11, 'European Director’s Cut'),
(12, 'Uncut'),
(13, 'Unrated'),
(14, '2 Disc Version');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int UNSIGNED NOT NULL,
  `imdbid` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `aka` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `movietype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `top250` smallint UNSIGNED NOT NULL,
  `year` int UNSIGNED NOT NULL,
  `endyear` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `runtime` smallint UNSIGNED NOT NULL,
  `rating` double NOT NULL,
  `metacritics` smallint UNSIGNED NOT NULL,
  `barcode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `languages` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genres` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `director` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `writer` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cast` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `producer` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `composer` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `principalCredits` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `recommendations` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `plotoutline` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `plot` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keywords` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `taglines` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `certifications` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `trailer` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mainaward` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `episodes` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `regioncode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `format` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subtitles` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `externalsubtitles` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `audio1` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `audio2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `video` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mediacertifications` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mediaEdition` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mediacountry` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `own` tinyint NOT NULL DEFAULT '1',
  `notes` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `extramedia` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `trivia` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quotes` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alternateversions` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `soundtracks` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `locations` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `loaned` tinyint NOT NULL DEFAULT '0',
  `loandate` date NOT NULL DEFAULT '1000-01-01',
  `loanname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regioncode`
--

CREATE TABLE `regioncode` (
  `id` int UNSIGNED NOT NULL,
  `regioncode` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regioncode`
--

INSERT INTO `regioncode` (`id`, `regioncode`) VALUES
(1, '0'),
(2, '1'),
(3, '2'),
(4, '3'),
(5, '4'),
(6, '5'),
(7, '6'),
(8, '7'),
(9, '8'),
(10, 'A'),
(11, 'A B C'),
(12, 'ALL'),
(13, 'B'),
(14, 'C'),
(15, 'FREE'),
(16, 'NONE'),
(17, 'A B'),
(18, 'B C'),
(19, 'A C');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `permission` tinyint UNSIGNED NOT NULL DEFAULT '0',
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `permission`, `lastlogin`) VALUES
(1, 'admin@admin.org', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `videotypes`
--

CREATE TABLE `videotypes` (
  `id` int UNSIGNED NOT NULL,
  `videotypes` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `videotypes`
--

INSERT INTO `videotypes` (`id`, `videotypes`) VALUES
(1, '16:9 Widescreen'),
(2, '4:3'),
(3, '4:3 [1.33]'),
(4, '4:3 Full Frame'),
(5, '4:3 Full Frame [1.33:1]'),
(6, '4:3 Letterbox'),
(7, 'Anamorphic Widescreen'),
(8, 'Anamorphic Widescreen [1.76:1]'),
(9, 'Anamorphic Widescreen [1.77:1]'),
(10, 'Anamorphic Widescreen [1.78:1]'),
(11, 'Anamorphic Widescreen [1.85:1]'),
(12, 'Anamorphic Widescreen [2.00:1]'),
(13, 'Anamorphic Widescreen [2.20:1]'),
(14, 'Anamorphic Widescreen [2.21:1]'),
(15, 'Anamorphic Widescreen [2.35:1]'),
(16, 'Anamorphic Widescreen [2.37:1]'),
(17, 'Anamorphic Widescreen [2.39:1]'),
(18, 'Anamorphic Widescreen [2.40:1]'),
(19, 'Anamorphic Widescreen [2.41:1]'),
(20, 'Anamorphic Widescreen [2.55:1]'),
(21, 'Anamorphic Widescreen [2.59:1]'),
(22, 'Anamorphic Widescreen [2.66:1]'),
(23, 'Anamorphic Widescreen [2.76:1]'),
(24, 'Full Frame'),
(25, 'Letterbox'),
(26, 'Widescreen'),
(27, 'Widescreen [1.66:1]'),
(28, 'Widescreen [1.75:1]'),
(29, 'Widescreen [1.76:1]'),
(30, 'Widescreen [1.77:1]'),
(31, 'Widescreen [1.78:1]'),
(32, 'Widescreen [1.85:1]'),
(33, 'Widescreen [2.00:1]'),
(34, 'Widescreen [2.20:1]'),
(35, 'Widescreen [2.21:1]'),
(36, 'Widescreen [2.35:1]'),
(37, 'Widescreen [2.37:1]'),
(38, 'Widescreen [2.39:1]'),
(39, 'Widescreen [2.40:1]'),
(40, 'Widescreen [2.41:1]'),
(41, 'Widescreen [2.55:1]'),
(42, 'Widescreen [2.59:1]'),
(43, 'Widescreen [2.66:1]'),
(44, 'Widescreen [2.76:1]'),
(45, 'Widescreen Letterbox');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audiotypes`
--
ALTER TABLE `audiotypes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `formats`
--
ALTER TABLE `formats`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mediacertifications`
--
ALTER TABLE `mediacertifications`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mediacountry`
--
ALTER TABLE `mediacountry`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mediaEdition`
--
ALTER TABLE `mediaEdition`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imdbid` (`imdbid`),
  ADD KEY `name` (`name`(250)),
  ADD KEY `year` (`year`),
  ADD KEY `rating` (`rating`),
  ADD KEY `own` (`own`),
  ADD KEY `loaned` (`loaned`),
  ADD KEY `added` (`added`);

--
-- Indexes for table `regioncode`
--
ALTER TABLE `regioncode`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `videotypes`
--
ALTER TABLE `videotypes`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audiotypes`
--
ALTER TABLE `audiotypes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `formats`
--
ALTER TABLE `formats`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mediacertifications`
--
ALTER TABLE `mediacertifications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `mediacountry`
--
ALTER TABLE `mediacountry`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `mediaEdition`
--
ALTER TABLE `mediaEdition`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regioncode`
--
ALTER TABLE `regioncode`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videotypes`
--
ALTER TABLE `videotypes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
