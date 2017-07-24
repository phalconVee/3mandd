-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2017 at 09:49 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3mandd`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(16) NOT NULL,
  `state` varchar(16) NOT NULL,
  `lga` varchar(16) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `usr_id`, `firstname`, `lastname`, `address`, `telephone`, `state`, `lga`, `date`) VALUES
(4, 8, 'Phalcon', 'Vee', '08 Nwosu Street, Rumukrussi road, opposite Zenon filling station, Port-Harcourt', '08166601864', '33', '670', '2016-12-06 12:50:59'),
(5, 15, 'Xantus', 'Ekure', '8 Mahjeed Lodge, Ifite Awka South', '08136075036', '4', '71', '2016-12-19 21:08:58'),
(6, 16, 'John', 'Horace', 'No. 2, Ikwerre Housing Estate', '07060319707', '33', '661', '2016-12-20 09:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(16) NOT NULL,
  `group_id` int(16) NOT NULL,
  `state_id` int(16) NOT NULL,
  `local_id` int(16) NOT NULL,
  `store_no` varchar(16) NOT NULL,
  `online` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ip` varchar(30) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='holds authorization details of system admins and distributors';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `group_id`, `state_id`, `local_id`, `store_no`, `online`, `firstname`, `lastname`, `email`, `password`, `gender`, `telephone`, `address`, `status`, `ip`, `date`) VALUES
(103, 2, 33, 670, 'AgtYQujcl9', 0, 'Tiku Cim', 'Okoye', 'tiku.okoye@3mandd.com', 'd30b47829629a71abb16a77746e5203f', 'Female', '08166601865', '23 Etim Eko Crescent, Portharcourt', 1, '::1', '2016-12-10'),
(104, 2, 33, 670, 'CHBy3v8URM', 0, 'Onyinye', 'Imoh', 'onyinye.imoh@3mandd.com', '7bf6a5edb6f5c8bad6c6eb08c4459761', 'Female', '09066601864', '8 Okoye Street, Garrsion, PH', 1, '::1', '2016-12-10'),
(105, 2, 25, 494, 'XI0wwUMWHe', 0, 'Jide', 'Coker', 'jide.coker@3mandd.com', 'e6cf3a8312026d417a311e3e471d6c66', 'Male', '07039401448', '21-23 Broad Street, Lagos Island', 1, '::1', '2016-12-10'),
(106, 2, 15, 263, 'oQ2tiV9nm8', 0, 'Muri', 'Moshood', 'muri.moshood@3mandd.com', 'e768619046c2b9c7fa16340e07a0f1f5', 'Male', '08060319707', 'Adamu Street, Gwagwalada, Abuja', 1, '::1', '2016-12-10'),
(107, 1, 25, 500, '6RE6rRnltt', 0, 'Ugostein', 'Omega', 'administrator@3mandd.com', '21232f297a57a5a743894a0e4a801fc3', 'Male', '08166601864', 'HQ', 1, '::1', '2016-12-10'),
(108, 2, 29, 559, '', 0, 'Sholanke', 'Abbey', 'sholanke.abbey@3mandd.com', '33ae83544151a6d383ce0163221c1119', 'Female', '090333964877', '13 World Bank Road, Akure', 1, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `all_settings`
--

CREATE TABLE `all_settings` (
  `all_id` int(3) NOT NULL,
  `all_name_settings` varchar(60) NOT NULL,
  `all_value_settings` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_settings`
--

INSERT INTO `all_settings` (`all_id`, `all_name_settings`, `all_value_settings`) VALUES
(1, 'footer', 'Copyright © Binercenter.com 2015'),
(2, 'site_name', 'Biner Shop V.1');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(16) NOT NULL,
  `cat_id` int(16) NOT NULL,
  `brand_name` varchar(32) NOT NULL,
  `brand_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `cat_id`, `brand_name`, `brand_description`) VALUES
(1, 1, 'Star', 'Star is a lager.'),
(2, 1, 'Heineken', 'Heineken is lager'),
(3, 1, 'Gulder', 'Gulder is lager'),
(4, 1, 'Goldberg', 'Goldberg is lager'),
(5, 1, 'Star Lite', 'Star Lite is Lager'),
(6, 1, '33 Export', '33 Export is Lager'),
(7, 1, 'Life', 'Life is lager'),
(8, 1, 'More', 'More is Lager'),
(9, 1, 'Star Triplex', 'Star Triplex is Lager'),
(10, 2, 'Legend', 'Legend is extra stout'),
(11, 2, 'Williams', 'Williams is stout'),
(12, 2, 'TurboKing', 'TurboKing is stout'),
(13, 3, 'Amstel Malta', 'Amstel Malta is malt'),
(14, 3, 'Maltina', 'Maltina is malt'),
(15, 3, 'Malta Gold', 'Malta Gold is malt'),
(16, 3, 'Maltex', 'Maltex is malt'),
(17, 3, 'Hi-Malt', 'Hi-Malt is malt'),
(18, 4, 'STRONGBOW', 'STRONGBOW is cider'),
(19, 5, 'Fayrouz', 'Fayrouz is carbonated drink'),
(20, 6, 'Breezer', 'Breezer drink'),
(21, 6, 'Ace Passion', 'Ace Passion drink'),
(22, 6, 'Ace Roots', 'Ace Roots Drink'),
(23, 6, 'Ace Rhythm', 'Ace Rhythm Drink'),
(24, 6, 'Star Radler', 'Star Radler Drink'),
(25, 7, 'Climax', 'Climax Energy Drink');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(16) NOT NULL,
  `cat_name` varchar(32) NOT NULL,
  `cat_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'LAGER', 'Home to brands like star, heineken, gulder, goldberg, star lite, 33 export, life, more, star triplex'),
(2, 'STOUT', 'Home to Legend, Williams, Turboking'),
(3, 'MALT', 'Home to AMSTEL MALTA, MALTINA, MALTA GOLD, MALTEX, HI-MALT'),
(4, 'CIDER', 'Home to Strongbow apple cider'),
(5, 'CARBONATED DRINK', 'Home to Fayrouz'),
(6, 'READY-TO-DRINK', 'Home to BREEZER, ACE PASSION, ACE ROOTS, ACE RHYTHM, STAR RADLER'),
(7, 'ENERGY DRINK', 'Home to Climax');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `gro_id` tinyint(1) NOT NULL,
  `gro_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='admin - have super priviledge\r\nc_admin - have priviledge as assigned by admin\r\nmember - close customers of NB distributors  \r\ng_member - other individuals/user that uses the platform';

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`gro_id`, `gro_name`) VALUES
(1, 'admin'),
(2, 'distributor'),
(3, 'member'),
(4, 'g_member');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(16) NOT NULL,
  `data` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` enum('paid','confirmed','unpaid','canceled','expired') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `data`, `due_date`, `user_id`, `status`) VALUES
(10001008, '2016-11-28 22:15:25', '2016-11-29 22:15:25', 8, 'confirmed'),
(10001009, '2016-12-07 12:46:08', '2016-12-08 12:46:08', 8, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `locals`
--

CREATE TABLE `locals` (
  `local_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `local_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locals`
--

INSERT INTO `locals` (`local_id`, `state_id`, `local_name`) VALUES
(1, 1, 'Aba South'),
(2, 1, 'Arochukwu'),
(3, 1, 'Bende'),
(4, 1, 'Ikwuano'),
(5, 1, 'Isiala Ngwa North'),
(6, 1, 'Isiala Ngwa South'),
(7, 1, 'Isuikwuato'),
(8, 1, 'Obi Ngwa'),
(9, 1, 'Ohafia'),
(10, 1, 'Osisioma'),
(11, 1, 'Ugwunagbo'),
(12, 1, 'Ukwa East'),
(13, 1, 'Ukwa West'),
(14, 1, 'Umuahia North'),
(15, 1, 'Umuahia South'),
(16, 1, 'Umu Nneochi'),
(17, 2, 'Fufure'),
(18, 2, 'Ganye'),
(19, 2, 'Gayuk'),
(20, 2, 'Gombi'),
(21, 2, 'Grie'),
(22, 2, 'Hong'),
(23, 2, 'Jada'),
(24, 2, 'Lamurde'),
(25, 2, 'Madagali'),
(26, 2, 'Maiha'),
(27, 2, 'Mayo Belwa'),
(28, 2, 'Michika'),
(29, 2, 'Mubi North'),
(30, 2, 'Mubi South'),
(31, 2, 'Numan'),
(32, 2, 'Shelleng'),
(33, 2, 'Song'),
(34, 2, 'Toungo'),
(35, 2, 'Yola North'),
(36, 2, 'Yola South'),
(37, 3, 'Eastern Obolo'),
(38, 3, 'Eket'),
(39, 3, 'Esit Eket'),
(40, 3, 'Essien Udim'),
(41, 3, 'Etim Ekpo'),
(42, 3, 'Etinan'),
(43, 3, 'Ibeno'),
(44, 3, 'Ibesikpo Asutan'),
(45, 3, 'Ibiono-Ibom'),
(46, 3, 'Ika'),
(47, 3, 'Ikono'),
(48, 3, 'Ikot Abasi'),
(49, 3, 'Ikot Ekpene'),
(50, 3, 'Ini'),
(51, 3, 'Itu'),
(52, 3, 'Mbo'),
(53, 3, 'Mkpat-Enin'),
(54, 3, 'Nsit-Atai'),
(55, 3, 'Nsit-Ibom'),
(56, 3, 'Nsit-Ubium'),
(57, 3, 'Obot Akara'),
(58, 3, 'Okobo'),
(59, 3, 'Onna'),
(60, 3, 'Oron'),
(61, 3, 'Oruk Anam'),
(62, 3, 'Udung-Uko'),
(63, 3, 'Ukanafun'),
(64, 3, 'Uruan'),
(65, 3, 'Urue-Offong/Oruko'),
(66, 3, 'Uyo'),
(67, 4, 'Anambra East'),
(68, 4, 'Anambra West'),
(69, 4, 'Anaocha'),
(70, 4, 'Awka North'),
(71, 4, 'Awka South'),
(72, 4, 'Ayamelum'),
(73, 4, 'Dunukofia'),
(74, 4, 'Ekwusigo'),
(75, 4, 'Idemili North'),
(76, 4, 'Idemili South'),
(77, 4, 'Ihiala'),
(78, 4, 'Njikoka'),
(79, 4, 'Nnewi North'),
(80, 4, 'Nnewi South'),
(81, 4, 'Ogbaru'),
(82, 4, 'Onitsha North'),
(83, 4, 'Onitsha South'),
(84, 4, 'Orumba North'),
(85, 4, 'Orumba South'),
(86, 4, 'Oyi'),
(87, 5, 'Bauchi'),
(88, 5, 'Bogoro'),
(89, 5, 'Damban'),
(90, 5, 'Darazo'),
(91, 5, 'Dass'),
(92, 5, 'Gamawa'),
(93, 5, 'Ganjuwa'),
(94, 5, 'Giade'),
(95, 5, 'Itas/Gadau'),
(96, 5, 'Jama''are'),
(97, 5, 'Katagum'),
(98, 5, 'Kirfi'),
(99, 5, 'Misau'),
(100, 5, 'Ningi'),
(101, 5, 'Shira'),
(102, 5, 'Tafawa Balewa'),
(103, 5, 'Toro'),
(104, 5, 'Warji'),
(105, 5, 'Zaki'),
(106, 6, 'Ekeremor'),
(107, 6, 'Kolokuma/Opokuma'),
(108, 6, 'Nembe'),
(109, 6, 'Ogbia'),
(110, 6, 'Sagbama'),
(111, 6, 'Southern Ijaw'),
(112, 6, 'Yenagoa'),
(113, 7, 'Apa'),
(114, 7, 'Ado'),
(115, 7, 'Buruku'),
(116, 7, 'Gboko'),
(117, 7, 'Guma'),
(118, 7, 'Gwer East'),
(119, 7, 'Gwer West'),
(120, 7, 'Katsina-Ala'),
(121, 7, 'Konshisha'),
(122, 7, 'Kwande'),
(123, 7, 'Logo'),
(124, 7, 'Makurdi'),
(125, 7, 'Obi'),
(126, 7, 'Ogbadibo'),
(127, 7, 'Ohimini'),
(128, 7, 'Oju'),
(129, 7, 'Okpokwu'),
(130, 7, 'Oturkpo'),
(131, 7, 'Tarka'),
(132, 7, 'Ukum'),
(133, 7, 'Ushongo'),
(134, 7, 'Vandeikya'),
(135, 8, 'Askira/Uba'),
(136, 8, 'Bama'),
(137, 8, 'Bayo'),
(138, 8, 'Biu'),
(139, 8, 'Chibok'),
(140, 8, 'Damboa'),
(141, 8, 'Dikwa'),
(142, 8, 'Gubio'),
(143, 8, 'Guzamala'),
(144, 8, 'Gwoza'),
(145, 8, 'Hawul'),
(146, 8, 'Jere'),
(147, 8, 'Kaga'),
(148, 8, 'Kala/Balge'),
(149, 8, 'Konduga'),
(150, 8, 'Kukawa'),
(151, 8, 'Kwaya Kusar'),
(152, 8, 'Mafa'),
(153, 8, 'Magumeri'),
(154, 8, 'Maiduguri'),
(155, 8, 'Marte'),
(156, 8, 'Mobbar'),
(157, 8, 'Monguno'),
(158, 8, 'Ngala'),
(159, 8, 'Nganzai'),
(160, 8, 'Shani'),
(161, 9, 'Akamkpa'),
(162, 9, 'Akpabuyo'),
(163, 9, 'Bakassi'),
(164, 9, 'Bekwarra'),
(165, 9, 'Biase'),
(166, 9, 'Boki'),
(167, 9, 'Calabar Municipal'),
(168, 9, 'Calabar South'),
(169, 9, 'Etung'),
(170, 9, 'Ikom'),
(171, 9, 'Obanliku'),
(172, 9, 'Obubra'),
(173, 9, 'Obudu'),
(174, 9, 'Odukpani'),
(175, 9, 'Ogoja'),
(176, 9, 'Yakuur'),
(177, 9, 'Yala'),
(178, 10, 'Aniocha South'),
(179, 10, 'Bomadi'),
(180, 10, 'Burutu'),
(181, 10, 'Ethiope East'),
(182, 10, 'Ethiope West'),
(183, 10, 'Ika North East'),
(184, 10, 'Ika South'),
(185, 10, 'Isoko North'),
(186, 10, 'Isoko South'),
(187, 10, 'Ndokwa East'),
(188, 10, 'Ndokwa West'),
(189, 10, 'Okpe'),
(190, 10, 'Oshimili North'),
(191, 10, 'Oshimili South'),
(192, 10, 'Patani'),
(193, 10, 'Sapele'),
(194, 10, 'Udu'),
(195, 10, 'Ughelli North'),
(196, 10, 'Ughelli South'),
(197, 10, 'Ukwuani'),
(198, 10, 'Uvwie'),
(199, 10, 'Warri North'),
(200, 10, 'Warri South'),
(201, 10, 'Warri South West'),
(202, 11, 'Afikpo North'),
(203, 11, 'Afikpo South'),
(204, 11, 'Ebonyi'),
(205, 11, 'Ezza North'),
(206, 11, 'Ezza South'),
(207, 11, 'Ikwo'),
(208, 11, 'Ishielu'),
(209, 11, 'Ivo'),
(210, 11, 'Izzi'),
(211, 11, 'Ohaozara'),
(212, 11, 'Ohaukwu'),
(213, 11, 'Onicha'),
(214, 12, 'Egor'),
(215, 12, 'Esan Central'),
(216, 12, 'Esan North-East'),
(217, 12, 'Esan South-East'),
(218, 12, 'Esan West'),
(219, 12, 'Etsako Central'),
(220, 12, 'Etsako East'),
(221, 12, 'Etsako West'),
(222, 12, 'Igueben'),
(223, 12, 'Ikpoba Okha'),
(224, 12, 'Orhionmwon'),
(225, 12, 'Oredo'),
(226, 12, 'Ovia North-East'),
(227, 12, 'Ovia South-West'),
(228, 12, 'Owan East'),
(229, 12, 'Owan West'),
(230, 12, 'Uhunmwonde'),
(231, 13, 'Efon'),
(232, 13, 'Ekiti East'),
(233, 13, 'Ekiti South-West'),
(234, 13, 'Ekiti West'),
(235, 13, 'Emure'),
(236, 13, 'Gbonyin'),
(237, 13, 'Ido Osi'),
(238, 13, 'Ijero'),
(239, 13, 'Ikere'),
(240, 13, 'Ikole'),
(241, 13, 'Ilejemeje'),
(242, 13, 'Irepodun/Ifelodun'),
(243, 13, 'Ise/Orun'),
(244, 13, 'Moba'),
(245, 13, 'Oye'),
(246, 14, 'Awgu'),
(247, 14, 'Enugu East'),
(248, 14, 'Enugu North'),
(249, 14, 'Enugu South'),
(250, 14, 'Ezeagu'),
(251, 14, 'Igbo Etiti'),
(252, 14, 'Igbo Eze North'),
(253, 14, 'Igbo Eze South'),
(254, 14, 'Isi Uzo'),
(255, 14, 'Nkanu East'),
(256, 14, 'Nkanu West'),
(257, 14, 'Nsukka'),
(258, 14, 'Oji River'),
(259, 14, 'Udenu'),
(260, 14, 'Udi'),
(261, 14, 'Uzo Uwani'),
(262, 15, 'Bwari'),
(263, 15, 'Gwagwalada'),
(264, 15, 'Kuje'),
(265, 15, 'Kwali'),
(266, 15, 'Municipal Area Council'),
(267, 16, 'Balanga'),
(268, 16, 'Billiri'),
(269, 16, 'Dukku'),
(270, 16, 'Funakaye'),
(271, 16, 'Gombe'),
(272, 16, 'Kaltungo'),
(273, 16, 'Kwami'),
(274, 16, 'Nafada'),
(275, 16, 'Shongom'),
(276, 16, 'Yamaltu/Deba'),
(277, 17, 'Ahiazu Mbaise'),
(278, 17, 'Ehime Mbano'),
(279, 17, 'Ezinihitte'),
(280, 17, 'Ideato North'),
(281, 17, 'Ideato South'),
(282, 17, 'Ihitte/Uboma'),
(283, 17, 'Ikeduru'),
(284, 17, 'Isiala Mbano'),
(285, 17, 'Isu'),
(286, 17, 'Mbaitoli'),
(287, 17, 'Ngor Okpala'),
(288, 17, 'Njaba'),
(289, 17, 'Nkwerre'),
(290, 17, 'Nwangele'),
(291, 17, 'Obowo'),
(292, 17, 'Oguta'),
(293, 17, 'Ohaji/Egbema'),
(294, 17, 'Okigwe'),
(295, 17, 'Orlu'),
(296, 17, 'Orsu'),
(297, 17, 'Oru East'),
(298, 17, 'Oru West'),
(299, 17, 'Owerri Municipal'),
(300, 17, 'Owerri North'),
(301, 17, 'Owerri West'),
(302, 17, 'Unuimo'),
(303, 18, 'Babura'),
(304, 18, 'Biriniwa'),
(305, 18, 'Birnin Kudu'),
(306, 18, 'Buji'),
(307, 18, 'Dutse'),
(308, 18, 'Gagarawa'),
(309, 18, 'Garki'),
(310, 18, 'Gumel'),
(311, 18, 'Guri'),
(312, 18, 'Gwaram'),
(313, 18, 'Gwiwa'),
(314, 18, 'Hadejia'),
(315, 18, 'Jahun'),
(316, 18, 'Kafin Hausa'),
(317, 18, 'Kazaure'),
(318, 18, 'Kiri Kasama'),
(319, 18, 'Kiyawa'),
(320, 18, 'Kaugama'),
(321, 18, 'Maigatari'),
(322, 18, 'Malam Madori'),
(323, 18, 'Miga'),
(324, 18, 'Ringim'),
(325, 18, 'Roni'),
(326, 18, 'Sule Tankarkar'),
(327, 18, 'Taura'),
(328, 18, 'Yankwashi'),
(329, 19, 'Chikun'),
(330, 19, 'Giwa'),
(331, 19, 'Igabi'),
(332, 19, 'Ikara'),
(333, 19, 'Jaba'),
(334, 19, 'Jema''a'),
(335, 19, 'Kachia'),
(336, 19, 'Kaduna North'),
(337, 19, 'Kaduna South'),
(338, 19, 'Kagarko'),
(339, 19, 'Kajuru'),
(340, 19, 'Kaura'),
(341, 19, 'Kauru'),
(342, 19, 'Kubau'),
(343, 19, 'Kudan'),
(344, 19, 'Lere'),
(345, 19, 'Makarfi'),
(346, 19, 'Sabon Gari'),
(347, 19, 'Sanga'),
(348, 19, 'Soba'),
(349, 19, 'Zangon Kataf'),
(350, 19, 'Zaria'),
(351, 20, 'Albasu'),
(352, 20, 'Bagwai'),
(353, 20, 'Bebeji'),
(354, 20, 'Bichi'),
(355, 20, 'Bunkure'),
(356, 20, 'Dala'),
(357, 20, 'Dambatta'),
(358, 20, 'Dawakin Kudu'),
(359, 20, 'Dawakin Tofa'),
(360, 20, 'Doguwa'),
(361, 20, 'Fagge'),
(362, 20, 'Gabasawa'),
(363, 20, 'Garko'),
(364, 20, 'Garun Mallam'),
(365, 20, 'Gaya'),
(366, 20, 'Gezawa'),
(367, 20, 'Gwale'),
(368, 20, 'Gwarzo'),
(369, 20, 'Kabo'),
(370, 20, 'Kano Municipal'),
(371, 20, 'Karaye'),
(372, 20, 'Kibiya'),
(373, 20, 'Kiru'),
(374, 20, 'Kumbotso'),
(375, 20, 'Kunchi'),
(376, 20, 'Kura'),
(377, 20, 'Madobi'),
(378, 20, 'Makoda'),
(379, 20, 'Minjibir'),
(380, 20, 'Nasarawa'),
(381, 20, 'Rano'),
(382, 20, 'Rimin Gado'),
(383, 20, 'Rogo'),
(384, 20, 'Shanono'),
(385, 20, 'Sumaila'),
(386, 20, 'Takai'),
(387, 20, 'Tarauni'),
(388, 20, 'Tofa'),
(389, 20, 'Tsanyawa'),
(390, 20, 'Tudun Wada'),
(391, 20, 'Ungogo'),
(392, 20, 'Warawa'),
(393, 20, 'Wudil'),
(394, 21, 'Batagarawa'),
(395, 21, 'Batsari'),
(396, 21, 'Baure'),
(397, 21, 'Bindawa'),
(398, 21, 'Charanchi'),
(399, 21, 'Dandume'),
(400, 21, 'Danja'),
(401, 21, 'Dan Musa'),
(402, 21, 'Daura'),
(403, 21, 'Dutsi'),
(404, 21, 'Dutsin Ma'),
(405, 21, 'Faskari'),
(406, 21, 'Funtua'),
(407, 21, 'Ingawa'),
(408, 21, 'Jibia'),
(409, 21, 'Kafur'),
(410, 21, 'Kaita'),
(411, 21, 'Kankara'),
(412, 21, 'Kankia'),
(413, 21, 'Katsina'),
(414, 21, 'Kurfi'),
(415, 21, 'Kusada'),
(416, 21, 'Mai''Adua'),
(417, 21, 'Malumfashi'),
(418, 21, 'Mani'),
(419, 21, 'Mashi'),
(420, 21, 'Matazu'),
(421, 21, 'Musawa'),
(422, 21, 'Rimi'),
(423, 21, 'Sabuwa'),
(424, 21, 'Safana'),
(425, 21, 'Sandamu'),
(426, 21, 'Zango'),
(427, 22, 'Arewa Dandi'),
(428, 22, 'Argungu'),
(429, 22, 'Augie'),
(430, 22, 'Bagudo'),
(431, 22, 'Birnin Kebbi'),
(432, 22, 'Bunza'),
(433, 22, 'Dandi'),
(434, 22, 'Fakai'),
(435, 22, 'Gwandu'),
(436, 22, 'Jega'),
(437, 22, 'Kalgo'),
(438, 22, 'Koko/Besse'),
(439, 22, 'Maiyama'),
(440, 22, 'Ngaski'),
(441, 22, 'Sakaba'),
(442, 22, 'Shanga'),
(443, 22, 'Suru'),
(444, 22, 'Wasagu/Danko'),
(445, 22, 'Yauri'),
(446, 22, 'Zuru'),
(447, 23, 'Ajaokuta'),
(448, 23, 'Ankpa'),
(449, 23, 'Bassa'),
(450, 23, 'Dekina'),
(451, 23, 'Ibaji'),
(452, 23, 'Idah'),
(453, 23, 'Igalamela Odolu'),
(454, 23, 'Ijumu'),
(455, 23, 'Kabba/Bunu'),
(456, 23, 'Kogi'),
(457, 23, 'Lokoja'),
(458, 23, 'Mopa Muro'),
(459, 23, 'Ofu'),
(460, 23, 'Ogori/Magongo'),
(461, 23, 'Okehi'),
(462, 23, 'Okene'),
(463, 23, 'Olamaboro'),
(464, 23, 'Omala'),
(465, 23, 'Yagba East'),
(466, 23, 'Yagba West'),
(467, 24, 'Baruten'),
(468, 24, 'Edu'),
(469, 24, 'Ekiti'),
(470, 24, 'Ifelodun'),
(471, 24, 'Ilorin East'),
(472, 24, 'Ilorin South'),
(473, 24, 'Ilorin West'),
(474, 24, 'Irepodun'),
(475, 24, 'Isin'),
(476, 24, 'Kaiama'),
(477, 24, 'Moro'),
(478, 24, 'Offa'),
(479, 24, 'Oke Ero'),
(480, 24, 'Oyun'),
(481, 24, 'Pategi'),
(482, 25, 'Ajeromi-Ifelodun'),
(483, 25, 'Alimosho'),
(484, 25, 'Amuwo-Odofin'),
(485, 25, 'Apapa'),
(486, 25, 'Badagry'),
(487, 25, 'Epe'),
(488, 25, 'Eti Osa'),
(489, 25, 'Ibeju-Lekki'),
(490, 25, 'Ifako-Ijaiye'),
(491, 25, 'Ikeja'),
(492, 25, 'Ikorodu'),
(493, 25, 'Kosofe'),
(494, 25, 'Lagos Island'),
(495, 25, 'Lagos Mainland'),
(496, 25, 'Mushin'),
(497, 25, 'Ojo'),
(498, 25, 'Oshodi-Isolo'),
(499, 25, 'Shomolu'),
(500, 25, 'Surulere'),
(501, 26, 'Awe'),
(502, 26, 'Doma'),
(503, 26, 'Karu'),
(504, 26, 'Keana'),
(505, 26, 'Keffi'),
(506, 26, 'Kokona'),
(507, 26, 'Lafia'),
(508, 26, 'Nasarawa'),
(509, 26, 'Nasarawa Egon'),
(510, 26, 'Obi'),
(511, 26, 'Toto'),
(512, 26, 'Wamba'),
(513, 27, 'Agwara'),
(514, 27, 'Bida'),
(515, 27, 'Borgu'),
(516, 27, 'Bosso'),
(517, 27, 'Chanchaga'),
(518, 27, 'Edati'),
(519, 27, 'Gbako'),
(520, 27, 'Gurara'),
(521, 27, 'Katcha'),
(522, 27, 'Kontagora'),
(523, 27, 'Lapai'),
(524, 27, 'Lavun'),
(525, 27, 'Magama'),
(526, 27, 'Mariga'),
(527, 27, 'Mashegu'),
(528, 27, 'Mokwa'),
(529, 27, 'Moya'),
(530, 27, 'Paikoro'),
(531, 27, 'Rafi'),
(532, 27, 'Rijau'),
(533, 27, 'Shiroro'),
(534, 27, 'Suleja'),
(535, 27, 'Tafa'),
(536, 27, 'Wushishi'),
(537, 28, 'Abeokuta South'),
(538, 28, 'Ado-Odo/Ota'),
(539, 28, 'Egbado North'),
(540, 28, 'Egbado South'),
(541, 28, 'Ewekoro'),
(542, 28, 'Ifo'),
(543, 28, 'Ijebu East'),
(544, 28, 'Ijebu North'),
(545, 28, 'Ijebu North East'),
(546, 28, 'Ijebu Ode'),
(547, 28, 'Ikenne'),
(548, 28, 'Imeko Afon'),
(549, 28, 'Ipokia'),
(550, 28, 'Obafemi Owode'),
(551, 28, 'Odeda'),
(552, 28, 'Odogbolu'),
(553, 28, 'Ogun Waterside'),
(554, 28, 'Remo North'),
(555, 28, 'Shagamu'),
(556, 29, 'Akoko North-West'),
(557, 29, 'Akoko South-West'),
(558, 29, 'Akoko South-East'),
(559, 29, 'Akure North'),
(560, 29, 'Akure South'),
(561, 29, 'Ese Odo'),
(562, 29, 'Idanre'),
(563, 29, 'Ifedore'),
(564, 29, 'Ilaje'),
(565, 29, 'Ile Oluji/Okeigbo'),
(566, 29, 'Irele'),
(567, 29, 'Odigbo'),
(568, 29, 'Okitipupa'),
(569, 29, 'Ondo East'),
(570, 29, 'Ondo West'),
(571, 29, 'Ose'),
(572, 29, 'Owo'),
(573, 30, 'Atakunmosa West'),
(574, 30, 'Aiyedaade'),
(575, 30, 'Aiyedire'),
(576, 30, 'Boluwaduro'),
(577, 30, 'Boripe'),
(578, 30, 'Ede North'),
(579, 30, 'Ede South'),
(580, 30, 'Ife Central'),
(581, 30, 'Ife East'),
(582, 30, 'Ife North'),
(583, 30, 'Ife South'),
(584, 30, 'Egbedore'),
(585, 30, 'Ejigbo'),
(586, 30, 'Ifedayo'),
(587, 30, 'Ifelodun'),
(588, 30, 'Ila'),
(589, 30, 'Ilesa East'),
(590, 30, 'Ilesa West'),
(591, 30, 'Irepodun'),
(592, 30, 'Irewole'),
(593, 30, 'Isokan'),
(594, 30, 'Iwo'),
(595, 30, 'Obokun'),
(596, 30, 'Odo Otin'),
(597, 30, 'Ola Oluwa'),
(598, 30, 'Olorunda'),
(599, 30, 'Oriade'),
(600, 30, 'Orolu'),
(601, 30, 'Osogbo'),
(602, 31, 'Akinyele'),
(603, 31, 'Atiba'),
(604, 31, 'Atisbo'),
(605, 31, 'Egbeda'),
(606, 31, 'Ibadan North'),
(607, 31, 'Ibadan North-East'),
(608, 31, 'Ibadan North-West'),
(609, 31, 'Ibadan South-East'),
(610, 31, 'Ibadan South-West'),
(611, 31, 'Ibarapa Central'),
(612, 31, 'Ibarapa East'),
(613, 31, 'Ibarapa North'),
(614, 31, 'Ido'),
(615, 31, 'Irepo'),
(616, 31, 'Iseyin'),
(617, 31, 'Itesiwaju'),
(618, 31, 'Iwajowa'),
(619, 31, 'Kajola'),
(620, 31, 'Lagelu'),
(621, 31, 'Ogbomosho North'),
(622, 31, 'Ogbomosho South'),
(623, 31, 'Ogo Oluwa'),
(624, 31, 'Olorunsogo'),
(625, 31, 'Oluyole'),
(626, 31, 'Ona Ara'),
(627, 31, 'Orelope'),
(628, 31, 'Ori Ire'),
(629, 31, 'Oyo'),
(630, 31, 'Oyo East'),
(631, 31, 'Saki East'),
(632, 31, 'Saki West'),
(633, 31, 'Surulere'),
(634, 32, 'Barkin Ladi'),
(635, 32, 'Bassa'),
(636, 32, 'Jos East'),
(637, 32, 'Jos North'),
(638, 32, 'Jos South'),
(639, 32, 'Kanam'),
(640, 32, 'Kanke'),
(641, 32, 'Langtang South'),
(642, 32, 'Langtang North'),
(643, 32, 'Mangu'),
(644, 32, 'Mikang'),
(645, 32, 'Pankshin'),
(646, 32, 'Qua''an Pan'),
(647, 32, 'Riyom'),
(648, 32, 'Shendam'),
(649, 32, 'Wase'),
(650, 33, 'Ahoada East'),
(651, 33, 'Ahoada West'),
(652, 33, 'Akuku-Toru'),
(653, 33, 'Andoni'),
(654, 33, 'Asari-Toru'),
(655, 33, 'Bonny'),
(656, 33, 'Degema'),
(657, 33, 'Eleme'),
(658, 33, 'Emuoha'),
(659, 33, 'Etche'),
(660, 33, 'Gokana'),
(661, 33, 'Ikwerre'),
(662, 33, 'Khana'),
(663, 33, 'Obio/Akpor'),
(664, 33, 'Ogba/Egbema/Ndoni'),
(665, 33, 'Ogu/Bolo'),
(666, 33, 'Okrika'),
(667, 33, 'Omuma'),
(668, 33, 'Opobo/Nkoro'),
(669, 33, 'Oyigbo'),
(670, 33, 'Port Harcourt'),
(671, 33, 'Tai'),
(672, 34, 'Bodinga'),
(673, 34, 'Dange Shuni'),
(674, 34, 'Gada'),
(675, 34, 'Goronyo'),
(676, 34, 'Gudu'),
(677, 34, 'Gwadabawa'),
(678, 34, 'Illela'),
(679, 34, 'Isa'),
(680, 34, 'Kebbe'),
(681, 34, 'Kware'),
(682, 34, 'Rabah'),
(683, 34, 'Sabon Birni'),
(684, 34, 'Shagari'),
(685, 34, 'Silame'),
(686, 34, 'Sokoto North'),
(687, 34, 'Sokoto South'),
(688, 34, 'Tambuwal'),
(689, 34, 'Tangaza'),
(690, 34, 'Tureta'),
(691, 34, 'Wamako'),
(692, 34, 'Wurno'),
(693, 34, 'Yabo'),
(694, 35, 'Bali'),
(695, 35, 'Donga'),
(696, 35, 'Gashaka'),
(697, 35, 'Gassol'),
(698, 35, 'Ibi'),
(699, 35, 'Jalingo'),
(700, 35, 'Karim Lamido'),
(701, 35, 'Kumi'),
(702, 35, 'Lau'),
(703, 35, 'Sardauna'),
(704, 35, 'Takum'),
(705, 35, 'Ussa'),
(706, 35, 'Wukari'),
(707, 35, 'Yorro'),
(708, 35, 'Zing'),
(709, 36, 'Bursari'),
(710, 36, 'Damaturu'),
(711, 36, 'Fika'),
(712, 36, 'Fune'),
(713, 36, 'Geidam'),
(714, 36, 'Gujba'),
(715, 36, 'Gulani'),
(716, 36, 'Jakusko'),
(717, 36, 'Karasuwa'),
(718, 36, 'Machina'),
(719, 36, 'Nangere'),
(720, 36, 'Nguru'),
(721, 36, 'Potiskum'),
(722, 36, 'Tarmuwa'),
(723, 36, 'Yunusari'),
(724, 36, 'Yusufari'),
(725, 37, 'Bakura'),
(726, 37, 'Birnin Magaji/Kiyaw'),
(727, 37, 'Bukkuyum'),
(728, 37, 'Bungudu'),
(729, 37, 'Gummi'),
(730, 37, 'Gusau'),
(731, 37, 'Kaura Namoda'),
(732, 37, 'Maradun'),
(733, 37, 'Maru'),
(734, 37, 'Shinkafi'),
(735, 37, 'Talata Mafara'),
(736, 37, 'Chafe'),
(737, 37, 'Zurmi'),
(738, 17, 'Aboh Mbaise');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(16) NOT NULL,
  `order_id` int(16) NOT NULL,
  `from_id` int(16) NOT NULL COMMENT 'from_id = amin_id, to_id = dist_id',
  `to_id` int(16) NOT NULL,
  `read` int(16) NOT NULL COMMENT '0 - unread, 1-read',
  `msg_status` int(1) NOT NULL COMMENT '0-cancel request, 1- send order request',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `order_id`, `from_id`, `to_id`, `read`, `msg_status`, `time`) VALUES
(5, 12, 107, 104, 1, 1, '2017-01-15 13:44:05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(16) NOT NULL,
  `usr_id` int(16) NOT NULL,
  `items` text NOT NULL,
  `items_unit` text NOT NULL,
  `items_qty` text NOT NULL,
  `invoice_no` varchar(64) NOT NULL,
  `order_no` varchar(128) NOT NULL,
  `total_cart_qty` int(3) NOT NULL,
  `empty_qty` int(3) NOT NULL,
  `empty_ret_qty` int(3) NOT NULL,
  `empty_value` int(9) NOT NULL,
  `full_value` int(9) NOT NULL,
  `total_value` int(9) NOT NULL,
  `empty_ret_value` int(9) NOT NULL,
  `balance_to_pay` int(9) NOT NULL,
  `host_service` varchar(3) NOT NULL DEFAULT 'no',
  `host_charge` int(9) NOT NULL,
  `status` varchar(16) NOT NULL,
  `delivery_date` date NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `usr_id`, `items`, `items_unit`, `items_qty`, `invoice_no`, `order_no`, `total_cart_qty`, `empty_qty`, `empty_ret_qty`, `empty_value`, `full_value`, `total_value`, `empty_ret_value`, `balance_to_pay`, `host_service`, `host_charge`, `status`, `delivery_date`, `order_date`) VALUES
(1, 16, 'Gulder beer crate,Heineken crate beer,Amstel Malta,Heineken beer can', '1,1,2,2', '', '3MD587789C14B1CB', 'po7Y6d3rml', 46, 24, 13, 13000, 75700, 99700, 13000, 87200, 'yes', 500, 'pending', '0000-00-00', '2017-01-12 14:00:19'),
(2, 8, 'Gulder beer crate,Heineken crate beer,Amstel Malta', '1,1,2', '', '3MD587793D3D0D30', 'MIM31RHI5P', 15, 9, 6, 6000, 25550, 34550, 6000, 28550, '', 0, 'pending', '0000-00-00', '2017-01-12 14:34:04'),
(3, 8, 'Heineken crate beer,Gulder beer crate', '1,1', '', '3MD5877956712AA0', '4YCTHLH2B6', 9, 9, 6, 6000, 17950, 26950, 6000, 21450, 'yes', 500, 'pending', '2017-01-14', '2017-01-12 14:40:47'),
(4, 8, 'Gulder beer crate', '1', '', '3MD58779702DC250', 'VUMUE93DDM', 4, 4, 3, 3000, 7800, 11800, 3000, 8800, '', 0, 'pending', '2017-01-14', '2017-01-12 14:47:36'),
(5, 8, 'Gulder beer crate,Heineken crate beer', '1,1', '', '3MD58779824AB7FF', '74GHJKIA8M', 10, 10, 5, 5000, 20000, 30000, 5000, 25000, '', 0, 'pending', '2017-01-20', '2017-01-12 14:52:32'),
(6, 8, 'Gulder beer crate,Heineken crate beer,Amstel Malta', '1,1,2', '', '3MD5877A47ACEA72', 'O1N23FKWDV', 34, 24, 5, 5000, 60700, 84700, 5000, 79700, '', 0, 'pending', '2017-01-19', '2017-01-12 15:45:24'),
(7, 8, 'Gulder beer crate', '1', '', '3MD5877DDE2E6322', '7V57WUB397', 4, 4, 3, 3000, 7800, 11800, 3000, 9300, 'yes', 500, 'pending', '2017-01-20', '2017-01-12 19:50:06'),
(8, 8, 'Gulder beer crate,Heineken crate beer', '1,1', '', '3MD5877E6017CD9E', 'GI04DGKAGC', 29, 29, 7, 7000, 58250, 87250, 7000, 80750, 'yes', 500, 'pending', '2017-01-26', '2017-01-12 20:24:45'),
(9, 8, 'Gulder beer crate', '1', '', '3MD5877E7C59945B', '01J7XYYFOC', 5, 5, 5, 5000, 9750, 14750, 5000, 10250, 'yes', 500, 'pending', '2017-01-25', '2017-01-12 20:32:16'),
(10, 8, 'Gulder beer crate', '1', '', '3MD5877E7ACF07FF', 'J23XNH8V5R', 16, 16, 6, 6000, 31200, 47200, 6000, 41700, 'yes', 500, 'pending', '2017-01-21', '2017-01-12 20:32:23'),
(11, 8, 'Heineken crate beer,Gulder beer crate,Amstel Malta', '1,1,1,1,2,2', '', '3MD5878CDF414D54', '49Z9R28WMW', 39, 32, 15, 15000, 72350, 104350, 15000, 89850, 'yes', 500, 'pending', '2017-01-14', '2017-01-13 12:54:36'),
(12, 8, 'Heineken crate beer,Gulder beer crate,Amstel Malta', '1,1,1,1,2,2', '14,12,12', '3MD5878D8DF4E57D', 'PYAANC14NS', 38, 26, 13, 13000, 67100, 93100, 13000, 80600, 'yes', 500, 'pending', '2017-01-14', '2017-01-13 13:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(16) NOT NULL,
  `usr_id` int(16) NOT NULL,
  `items` text NOT NULL,
  `items_unit` text NOT NULL,
  `txnref` varchar(32) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `total` int(9) NOT NULL,
  `host_charge` varchar(16) NOT NULL,
  `status` varchar(32) NOT NULL,
  `pay_option` varchar(100) NOT NULL,
  `date` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `usr_id`, `items`, `items_unit`, `txnref`, `currency`, `total`, `host_charge`, `status`, `pay_option`, `date`) VALUES
(24, 8, 'Gulder beer crate,Heineken crate beer,Amstel Malta,Heineken beer can', '1,1,2,2', '3MD587789C14B1CB', 'NGN', 87200, '500', 'pending', 'bank_transfer', 'January 12, 2017'),
(25, 8, 'Gulder beer crate,Heineken crate beer,Amstel Malta', '1,1,2', '3MD587793D3D0D30', 'NGN', 28550, '0', 'pending', 'bank_transfer', 'January 12, 2017'),
(26, 8, 'Heineken crate beer,Gulder beer crate', '1,1', '3MD5877956712AA0', 'NGN', 21450, '500', 'pending', 'bank_transfer', 'January 12, 2017'),
(27, 8, 'Gulder beer crate', '1', '3MD58779702DC250', 'NGN', 8800, '0', 'pending', 'bank_transfer', 'January 12, 2017'),
(28, 8, 'Gulder beer crate,Heineken crate beer', '1,1', '3MD58779824AB7FF', 'NGN', 25000, '0', 'pending', 'bank_transfer', 'January 12, 2017'),
(29, 8, 'Gulder beer crate,Heineken crate beer,Amstel Malta', '1,1,2', '3MD5877A47ACEA72', 'NGN', 79700, '0', 'pending', 'bank_transfer', 'January 12, 2017'),
(30, 8, 'Gulder beer crate', '1', '3MD5877DDE2E6322', 'NGN', 9300, '500', 'pending', 'bank_transfer', 'January 12, 2017'),
(31, 8, 'Gulder beer crate,Heineken crate beer', '1,1', '3MD5877E6017CD9E', 'NGN', 80750, '500', 'pending', 'bank_transfer', 'January 12, 2017'),
(32, 8, 'Gulder beer crate', '1', '3MD5877E7C59945B', 'NGN', 10250, '500', 'pending', 'bank_transfer', 'January 12, 2017'),
(33, 8, 'Gulder beer crate', '1', '3MD5877E7ACF07FF', 'NGN', 41700, '500', 'pending', 'bank_transfer', 'January 12, 2017'),
(34, 8, 'Heineken crate beer,Gulder beer crate,Amstel Malta', '1,1,1,1,2,2', '3MD5878CDF414D54', 'NGN', 89850, '500', 'pending', 'bank_transfer', 'January 13, 2017'),
(35, 8, 'Heineken crate beer,Gulder beer crate,Amstel Malta', '1,1,1,1,2,2', '3MD5878D8DF4E57D', 'NGN', 80600, '500', 'pending', 'bank_transfer', 'January 13, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_id` int(16) NOT NULL,
  `cat_id` int(16) NOT NULL,
  `brand_id` int(16) NOT NULL,
  `admin_id` int(16) NOT NULL COMMENT 'specifies id of disributor the product is under',
  `state_id` int(16) NOT NULL,
  `local_id` int(16) NOT NULL,
  `unit_id` int(16) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_description` text NOT NULL,
  `pro_price` int(9) NOT NULL,
  `pro_stock` int(3) NOT NULL,
  `pro_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_id`, `cat_id`, `brand_id`, `admin_id`, `state_id`, `local_id`, `unit_id`, `pro_name`, `pro_description`, `pro_price`, `pro_stock`, `pro_image`) VALUES
(1, 3, 13, 0, 0, 0, 2, 'Amstel Malta', 'Amstel Malta Can', 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png'),
(2, 1, 4, 0, 0, 0, 2, 'Goldberg', 'Goldberg Can', 1450, 0, 'a63fbeac080201c484894374f94e055f.png'),
(3, 1, 2, 0, 0, 0, 2, 'Heineken beer can', 'Heineken Can', 1250, 0, 'f75df5ce3758cdb36e18a732d41edb9d.png'),
(4, 7, 25, 0, 0, 0, 2, 'Climax Can Drink', 'Climax Energy Drink', 1350, 0, '8ce2f283825084af7126e996cd8b192f.png'),
(5, 5, 19, 0, 0, 0, 2, 'Fayrouz Can Drink', 'Fayrouz Can Drink', 1050, 0, '8b5f0e855e0dc8712b97d33370298250.png'),
(6, 5, 19, 0, 0, 0, 3, 'Fayrouz Pet Drink', 'Fayrouz Pet Drink', 1050, 0, 'ae6438179e7b70b7445bf7527167f8b7.png'),
(7, 3, 14, 0, 0, 0, 2, 'Maltina can drink', 'Maltina Can Drink', 1420, 0, 'fe37ee351b789410a086c813a81ea298.png'),
(13, 1, 2, 0, 0, 0, 1, 'Heineken crate beer', 'Heineken crate beer', 2050, 0, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg'),
(14, 1, 3, 0, 0, 0, 1, 'Gulder beer crate', 'Gulder beer cate', 1950, 0, 'c99a11c4e1c03e66e8111b3da3395c23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `rep_id` int(9) NOT NULL,
  `rep_name` varchar(60) NOT NULL,
  `rep_id_product` int(9) NOT NULL,
  `rep_title_product` varchar(60) NOT NULL,
  `rep_usr_name` varchar(60) NOT NULL,
  `rep_usr_group` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`rep_id`, `rep_name`, `rep_id_product`, `rep_title_product`, `rep_usr_name`, `rep_usr_group`) VALUES
(1, 'Baju', 8, 'Jean', 'Gost', 'Gost'),
(2, 'Baju', 8, 'Jean', 'Gost', 'Gost');

-- --------------------------------------------------------

--
-- Table structure for table `shop_session`
--

CREATE TABLE `shop_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_session`
--

INSERT INTO `shop_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('02454e56bc6f927d45564b16c46c04d286d98965', '::1', 1431592465, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539323436353b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('03f1ca4ae4eaa23830e2569099eeb20cb6045536', '::1', 1431590570, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539303537303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('0438ebe740ef806609b5d6dd135c4981bc0bafaa', '::1', 1431437437, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433373330313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('046c05f2a9187acac03303698c15e208cf350482', '::1', 1431443332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434333333323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('051d211843fe99001c21fa82fe1364ff433b59c2', '::1', 1431434676, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433343637363b),
('0721f2ca412df8fae13d524bdafd1a2441a07b6b', '::1', 1431440779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434303737383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('07c392963a173889c20875600e30fecfb4f427df', '::1', 1431443024, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434333032343b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('09e7b9ea74d4ac11171c35787f7ad1c05deabc77', '::1', 1431479138, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437393133383b),
('0ddbea21505ad502b118e7e7c54c93d06727d40e', '::1', 1437490161, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433373439303136303b),
('0fcb5ba32b2138b9b98eb9552838aa8b8b97a02a', '::1', 1481621292, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313632313238323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('1340e33c8ea519717cd46daca6ecfc9dcfa375ba', '::1', 1431468170, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313436383135313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('14072e403c526089f3110a92c8c0a665595393f2', '::1', 1480499077, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303439393037373b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('1466bcd61bdd1e9787a6ed6c2e554a7a8611636f', '::1', 1431597986, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539373938363b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('162bb9759b4dfcbea5c12ccb6068efe82a1f14e4', '::1', 1431498777, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313439383737373b),
('17f5f3925d03c2daede0bd25ebe29d1e6fe7c763', '::1', 1434896373, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433343839363337333b),
('1c1b3d322391a9f228e62d86ad37182088626a2b', '::1', 1431402532, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313430323533323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('1ea4c8628c928e81231728cd714bb9b957ed0e5f', '::1', 1431599312, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539393331323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('1f6b51ae90cf2b18dd633218a6ca9c1ce0ffe84c', '::1', 1431478322, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437383332323b),
('2523b762386d5ebd51b4dc16a79c3d040f93ad57', '::1', 1431505248, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530353234383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('258eddbee06e42db2c05d3610a96ad876de5cf2d', '::1', 1431474569, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437343536393b),
('2748555a8c3b2dbc0fba9546d573cc81ebd49315', '::1', 1431599627, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539393632373b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('28466f419050238b73087b1f36bdbcefb64ef754', '::1', 1431446036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434363033363b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('2847d0b5daf905ed1c96d84d0a4e897194ca2014', '::1', 1431475428, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437353432383b),
('296625390a9642115c1551a16c0c32c1617a2276', '::1', 1431593086, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539333038363b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('29c2a80deefd93bcf7d1ad0b18df8dc929450bc9', '::1', 1431402958, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313430323935383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('302aa9ce5fe422b6ae1594fbcf2abe9773e41970', '::1', 1481702031, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313730323032333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('3155252182db4e876c2e4d200a935297661282c2', '::1', 1431500722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530303731333b),
('320f003a36f872a0616e2d0a22000e5d3991ad3a', '::1', 1481633132, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313633333131383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('355ecfdfa42cededc3cbe0d23a1bb06aca80a6b3', '::1', 1480366870, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303336363837303b),
('357a8722c15f2f13a4bd665968454f99cb5dff94', '::1', 1438699504, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433383639393530333b),
('362a74fdaac886c0b5fd05e82b321616ea0c8e69', '::1', 1431595571, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539353537313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('3761da4ca6ba969650b2feed93f9ba28d85f7ad2', '::1', 1431484321, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313438343332313b),
('38d9a58d2365fbcd834165945dd5cf7ba4fbee11', '::1', 1431501535, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530313533353b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('392329059a3c949f6074610c4d85ac738dc0ce10', '::1', 1431445444, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434353433333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('3b47abec60a0a9465a28785f7803a032f3f497c7', '::1', 1431596552, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539363535323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('412e7e3cfff901be348a108afab41a87d77ff2a2', '::1', 1431445734, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434353733343b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('419d59bd4c943b840b65c154b6de207d1d2c9699', '::1', 1480367286, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303336373238363b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a3134303330303b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b613a373a7b733a323a226964223b733a313a2238223b733a333a22717479223b643a313b733a353a227072696365223b643a3330303b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224a65616e223b733a353a22726f776964223b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b733a383a22737562746f74616c223b643a3330303b7d733a33323a223435633438636365326532643766626465613161666335316337633661643236223b613a373a7b733a323a226964223b733a313a2239223b733a333a22717479223b643a313b733a353a227072696365223b643a3134303030303b733a343a226e616d65223b733a393a224b6f70692d4761796f223b733a353a227469746c65223b733a31303a224c616b756e204b6f7069223b733a353a22726f776964223b733a33323a223435633438636365326532643766626465613161666335316337633661643236223b733a383a22737562746f74616c223b643a3134303030303b7d7d757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('437e4882a8383de2f28cd42ead8d9cb2b00c3802', '::1', 1431442274, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434323237343b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('473007ec97d26ce50dae3f07d800c72c66988c0a', '::1', 1480498577, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303439383537373b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('49cddb593bfc34591d5faf3bd6bfca8e570e6ae5', '::1', 1481624440, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313632343430343b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('4cab25a5064392e444813238e644c3367feaf0d4', '::1', 1431696158, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313639363036333b636172745f636f6e74656e74737c613a353a7b733a31303a22636172745f746f74616c223b643a3134313030303b733a31313a22746f74616c5f6974656d73223b643a333b733a33323a226138376666363739613266336537316439313831613637623735343231323263223b613a373a7b733a323a226964223b733a313a2234223b733a333a22717479223b643a313b733a353a227072696365223b643a34353030303b733a343a226e616d65223b733a363a224d6f62696c65223b733a353a227469746c65223b733a31363a224854432073656e736174696f6e20584c223b733a353a22726f776964223b733a33323a226138376666363739613266336537316439313831613637623735343231323263223b733a383a22737562746f74616c223b643a34353030303b7d733a33323a226534646133623766626263653233343564373737326230363734613331386435223b613a373a7b733a323a226964223b733a313a2235223b733a333a22717479223b643a313b733a353a227072696365223b643a34363030303b733a343a226e616d65223b733a363a224d6f62696c65223b733a353a227469746c65223b733a383a224970686f6e652036223b733a353a22726f776964223b733a33323a226534646133623766626263653233343564373737326230363734613331386435223b733a383a22737562746f74616c223b643a34363030303b7d733a33323a226338316537323864396434633266363336663036376638396363313438363263223b613a373a7b733a323a226964223b733a313a2232223b733a333a22717479223b643a313b733a353a227072696365223b643a35303030303b733a343a226e616d65223b733a363a224c6170746f70223b733a353a227469746c65223b733a373a22546f7368696261223b733a353a22726f776964223b733a33323a226338316537323864396434633266363336663036376638396363313438363263223b733a383a22737562746f74616c223b643a35303030303b7d7d),
('4cf954448710936feded1525f039eded3725de66', '::1', 1431574103, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313537343130333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('4d54e7e95ffc6e09081449ad953f752ec28d8bd4', '::1', 1431501839, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530313833393b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('4f017c5ff451ce5fb8f0c22247203c1fe8fd25c8', '::1', 1431480671, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313438303637313b),
('4f06b55a56fdf1e66aecda072eddc028d323027a', '::1', 1431473987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437333938373b),
('506a311d426ef4b6da4be8ab7ab58d4eb4c2c6c6', '::1', 1431485705, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313438353636393b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('5204b6284ed0868ad400e0677a0e6b0a69b31e60', '::1', 1431435109, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433353130313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('522fd3cedd3078fc5465c33e324aa0f7e7451630', '::1', 1431606066, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313630363036363b),
('54bb818c74002342cef711abfd0c8bd58f00befe', '::1', 1481700490, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313730303438323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('56896a05abced275b9cd8a8e57f4deebe1982220', '::1', 1431477289, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437373238393b),
('591930dfb6139a490a00742e450cde1f87662b6e', '::1', 1481610807, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313631303830363b6572726f727c733a32333a224d61616620616e64612062656c756d204c6f67696e2021223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('5a89743972fe57c6d67d6bdfec5ba43d89828abd', '::1', 1431504581, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530343538313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('5cc5603e5d73f5f14b36be748f92e9a5710487bc', '::1', 1431763235, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313736333233353b),
('5d7d3acf146549e706e4105f894b3c7ec3572409', '::1', 1431505864, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530353836343b),
('61a806bda81696045d21ccec8b4fe58317561060', '::1', 1431480264, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313438303236343b),
('635e04c34ed3f903ff7353531ccb4be37192c9d3', '::1', 1431598978, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539383937383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('637fd0e9452e8e9f65c26972dfb78de50847f8b8', '::1', 1431432223, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433323232333b),
('666d5b60ea230720eea5e45a87e5413207bddbcd', '::1', 1431444366, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434343336363b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('66ef79e9ef2d7f186c79ee111f383eacb36e7fba', '::1', 1481227036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313232363934393b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('678f2c11a9b5afbb4936179b468b0a3de4437d1d', '::1', 1481786178, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313738363137373b6572726f727c733a32333a224d61616620616e64612062656c756d204c6f67696e2021223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('71a473cdc0e4ad2797f1e1d774807721c4fc48fc', '::1', 1481111169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313131313035363b757365726e616d657c733a31303a227068616c636f6e566565223b67726f75707c733a313a2233223b),
('72aa180f3643fe7fd0f2847ef6336fc3fcad1be7', '::1', 1480434495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303433343436343b757365726e616d657c733a31313a2275676f737465696e313030223b67726f75707c733a313a2233223b),
('7317d79c792298ddfebea9c97ce705c7fe218cbd', '::1', 1481461775, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313436313736343b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('73c87c37832a57603235528d4ba6d752df7c6e0d', '::1', 1431696380, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313639363336373b757365726e616d657c733a393a22456d616b42696e6572223b67726f75707c733a313a2233223b),
('7bd3c0c636bc020cc4b8e4f201bb09a56f6fa34c', '::1', 1431422453, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313432323435333b),
('7cb5aead3d7a7bea34af771ed5ca602f4dbdda12', '::1', 1431470791, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437303739313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('7dfae9c5148874baa2b311f2188986e69189afb4', '::1', 1431403295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313430333238383b757365726e616d657c733a343a2264796161223b67726f75707c733a313a2233223b),
('7ea957ce6540d596fd4c7f7cd236995b8ba5db36', '::1', 1431422755, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313432323735353b),
('800b64d7cc1147f04b6cfc9ba984fc793dd5a732', '::1', 1431433759, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433333735393b),
('8971cc229b7e63d0c6c6239fd2c8e63de6e6ba96', '::1', 1480498273, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303439383237333b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a3330303b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b613a373a7b733a323a226964223b733a313a2238223b733a333a22717479223b643a313b733a353a227072696365223b643a3330303b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224a65616e223b733a353a22726f776964223b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b733a383a22737562746f74616c223b643a3330303b7d7d757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('8b810323020c4ed07af840fc9a17a45f0b739151', '::1', 1431596148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539363134383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('8d15b76c49d5c6e9f0db7102dfaad3f15f7a55a9', '::1', 1480366897, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303336363837313b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a3238303330303b733a31313a22746f74616c5f6974656d73223b643a333b733a33323a223435633438636365326532643766626465613161666335316337633661643236223b613a373a7b733a323a226964223b733a313a2239223b733a333a22717479223b643a323b733a353a227072696365223b643a3134303030303b733a343a226e616d65223b733a393a224b6f70692d4761796f223b733a353a227469746c65223b733a31303a224c616b756e204b6f7069223b733a353a22726f776964223b733a33323a223435633438636365326532643766626465613161666335316337633661643236223b733a383a22737562746f74616c223b643a3238303030303b7d733a33323a226339663066383935666239386162393135396635316664303239376532333664223b613a373a7b733a323a226964223b733a313a2238223b733a333a22717479223b643a313b733a353a227072696365223b643a3330303b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224a65616e223b733a353a22726f776964223b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b733a383a22737562746f74616c223b643a3330303b7d7d),
('8fda1a3f60155b8e1f6f4d595ae481ea4e238655', '::1', 1431433442, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433333434323b),
('90d648361e975eed85c4b12072d1f1f5455cb4a3', '::1', 1431500043, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530303034333b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a32333634343b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b613a373a7b733a323a226964223b733a323a223131223b733a333a22717479223b643a313b733a353a227072696365223b643a32333334343b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224b6f6b6f223b733a353a22726f776964223b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b733a383a22737562746f74616c223b643a32333334343b7d733a33323a226339663066383935666239386162393135396635316664303239376532333664223b613a373a7b733a323a226964223b733a313a2238223b733a333a22717479223b643a313b733a353a227072696365223b643a3330303b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224a65616e223b733a353a22726f776964223b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b733a383a22737562746f74616c223b643a3330303b7d7d),
('91b4137b185ba3385b61637b24dc78417a4fcd76', '::1', 1431478753, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437383735333b),
('94db78eb08374ce427801018ab2b47d5958902e6', '::1', 1431593435, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539333433353b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('969810cce0e3036c62906a885061162f4be09655', '::1', 1481111036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313131313033353b),
('992d83d459b894fcdb8579fdcd75c81d3f809ab4', '::1', 1481364913, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313336343930323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('99973379fd42136c97146b3b3b250a0ed7eb13bf', '::1', 1445056497, 0x5f5f63695f6c6173745f726567656e65726174657c693a313434353035363439313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('9bfd3b7f27446ef66d6e7141adfa32df47827570', '::1', 1433092269, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333039323236393b),
('9e345db250bafb464ed4f0e1d2ff2ba66ae87eb3', '::1', 1431607461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313630373436313b),
('9e67293e05a8650eee6831f6eb9d6f890f193d84', '::1', 1431401464, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313430313435333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('9e9314c7944092f4dad0a730b10aa95b04383215', '::1', 1431499234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313439393231363b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a32333634343b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b613a373a7b733a323a226964223b733a323a223131223b733a333a22717479223b643a313b733a353a227072696365223b643a32333334343b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224b6f6b6f223b733a353a22726f776964223b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b733a383a22737562746f74616c223b643a32333334343b7d733a33323a226339663066383935666239386162393135396635316664303239376532333664223b613a373a7b733a323a226964223b733a313a2238223b733a333a22717479223b643a313b733a353a227072696365223b643a3330303b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224a65616e223b733a353a22726f776964223b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b733a383a22737562746f74616c223b643a3330303b7d7d),
('9fddbf3a0eca77129df5b5584e11bff3af9bf85b', '::1', 1431442710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434323731303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('a4af5232f68663f2d40a2bf61825dd090e7b172c', '::1', 1431421744, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313432313734343b),
('a5c8f57adf75e265a81d440fba34678322386114', '::1', 1437491085, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433373439313038353b),
('a6e90c8edad8ee49dc1c65285ce4937068d22b1a', '::1', 1431593805, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539333830353b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('a8374deb9f671bafce7981a45576695387f301f0', '::1', 1431576289, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313537363238393b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('ac069d28b0a5cd4e2e684145b583b33d5c37b33c', '::1', 1431443653, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434333635333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('b0b9494fae4b68c884cf189695d063364422aabf', '::1', 1431423723, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313432333732333b),
('b263aebf39ed1ab9941528832286d61583a180fa', '::1', 1431589636, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538393633303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('b31328c64b0d94ac84eb7a4d8f3455dd19c4677b', '::1', 1431437681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433373638313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('b4f6313ca283d8cd81cb35f029a77eb7f981f76f', '::1', 1481147115, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313134373131353b),
('b539c43abbbe149c45d8cfe5fe89244d04e670f8', '::1', 1431444698, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434343639383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('b6e20d644870275da99800d43e6c598ffc17d409', '::1', 1435068509, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433353036383530383b),
('b88cbc6ec918edfb0ba2ee878ee58a206d38f83d', '::1', 1431470418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437303431383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('b9cdb2f12aaea600ec1357c9108ffab9225a7a38', '::1', 1431444035, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434343033353b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('ba77970fdcba38c925a75b105192c1b63e4818a9', '::1', 1431473063, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437333036333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('c0a34f960eb747f865a4a6ae49ada0947d244b7a', '127.0.0.1', 1431472461, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437323436313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('c3fcf9c21020bc13b6d6b9f200d9a8151e2c85cb', '::1', 1480597820, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303539373831343b),
('c7d3d29749a3cf2f902963c9ace352c699550a8d', '::1', 1431472030, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437323033303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('c8acc25ab1e76ba3f83f885b827e326d82bb061b', '::1', 1431587864, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538373836343b),
('c97e1831226a09aac2e55c1f3e65cba57cf4de38', '::1', 1431441556, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434313535363b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('ca8a42d8257d354d97bb350537b9a11870ad6339', '::1', 1431441093, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434313039333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('cb5feea5e617c6bfbda397caf53afb5bac3f0345', '::1', 1431403706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313430333730303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('d16565fb973a692c79378b142d5d3a3d508809dc', '::1', 1431501222, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530313136333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('d1e18c891137eaff7b40c7ade56081249c5a291e', '::1', 1480499102, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303439393039353b636172745f636f6e74656e74737c613a333a7b733a31303a22636172745f746f74616c223b643a363b733a31313a22746f74616c5f6974656d73223b643a313b733a33323a223136373930393163356138383066616636666235653630383765623162326463223b613a373a7b733a323a226964223b733a313a2236223b733a333a22717479223b643a313b733a353a227072696365223b643a363b733a343a226e616d65223b733a31393a22416d7374656c2d4d616c746120436172746f6e223b733a353a227469746c65223b733a363a22416d7374656c223b733a353a22726f776964223b733a33323a223136373930393163356138383066616636666235653630383765623162326463223b733a383a22737562746f74616c223b643a363b7d7d),
('d4705ac6d40f83af16c93ff74acec2ccb1214842', '::1', 1431598352, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539383335323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('d89bb983993d01977f86ad140448e900d8ceffb8', '::1', 1431471590, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437313539303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('d98f7f821117d6ae270850963ac5240042c261e7', '::1', 1431422998, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313432323939383b),
('daafbf8a5b6105a454eb9fa4a9d78aafdad4e191', '127.0.0.1', 1431473680, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437333638303b),
('dc76ac978202a4373b8380ec8cc6138143a3a45a', '::1', 1480367792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303336373634353b757365726e616d657c733a31303a227068616c636f6e566565223b67726f75707c733a313a2233223b6d6573736167657c733a35383a225468616e6b20796f75202e2e2e2e2e2077652077696c6c20636865636b206f6e20796f7572207061796d656e7420636f6e6669726d6174696f6e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('e01a9b134f01c1e3b25190ad8d8bcdce19427459', '::1', 1431479909, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437393930393b),
('e17aa461162d47bcb574eb5cbcfc95f25c4d0825', '::1', 1431571755, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313537313735343b),
('e2f1982fa35b983c6cc220b0d09e3cafd0062c78', '::1', 1431594752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539343735323b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('e41caed2d173a3435e828415652593d2f4da80b5', '::1', 1431421430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313432313433303b),
('e5aef612449fcdcc30d33723ac79ee9e255e4b79', '::1', 1431401761, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313430313736313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('e6df65c2faa9b3abeb8c7d3f65fc005e9c8cab0e', '::1', 1432895972, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433323839353937313b),
('e7fa541dd9636cf116aa76e7bf77ad3cf52376a6', '::1', 1431597660, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539373636303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('e82ba570bb7a20e628c587fba64f1ea20067c4da', '::1', 1431504917, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530343931373b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('e934ac1fc8f670810382536a1e89768f4a93a8d0', '::1', 1431499698, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313439393639383b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a32333634343b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b613a373a7b733a323a226964223b733a323a223131223b733a333a22717479223b643a313b733a353a227072696365223b643a32333334343b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224b6f6b6f223b733a353a22726f776964223b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b733a383a22737562746f74616c223b643a32333334343b7d733a33323a226339663066383935666239386162393135396635316664303239376532333664223b613a373a7b733a323a226964223b733a313a2238223b733a333a22717479223b643a313b733a353a227072696365223b643a3330303b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224a65616e223b733a353a22726f776964223b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b733a383a22737562746f74616c223b643a3330303b7d7d),
('ea8a533be4cf22230885e3a8b1c5a2c78ecbbd4c', '::1', 1431441887, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313434313838373b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('ec43c14b229bd5c584e94dd62adb1449123161e9', '::1', 1480367405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303336373336313b6572726f727c733a33333a22557365726e616d65202f2050617373776f7264204e6f7420436f72726563742021223b5f5f63695f766172737c613a313a7b733a353a226572726f72223b733a333a226f6c64223b7d),
('eca9a63d47d95fbc14cf837dfc76bd70a75cc794', '::1', 1431597056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313539373035363b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('ed5cf2b24f5baba138fd78588d598c01ed844a16', '127.0.0.1', 1431486257, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313438363231393b757365726e616d657c733a363a226361646d696e223b67726f75707c733a313a2232223b),
('f23970fba303687223a277a9bf6bb52cf99ef969', '::1', 1431432992, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433323939323b),
('f468ad1945e953ec06c521f7d55d31f74adea89f', '::1', 1431498403, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313439383430333b),
('f508ac879ab82eb9a20378880a6e9bf010259d86', '::1', 1431573499, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313537333439333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('f55e7d485efeaf1e0e635f6da1cb5c66f5acba19', '::1', 1431468753, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313436383735333b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('f6a72c5c29a746560b203ce0a062cd39fc53d01b', '::1', 1431470090, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437303039303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('f70b24c9cf4844db9a494cea3b761cdbfb486c90', '::1', 1433092745, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433333039323732323b757365726e616d657c733a353a2242696e6572223b67726f75707c733a313a2233223b),
('f8ab8e9d5b854a3252188ed533639cdc2fa15e5c', '::1', 1481712154, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313731323134383b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('f8b52d60ce87f83174b00a97c6ac676a0a90c4b6', '::1', 1431589990, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313538393939303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('faded44d12eebad25ce0156005942bf25d7ee138', '::1', 1431479539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313437393533393b),
('fbc237f9e82f42cf500483c5129ba95fdf469317', '::1', 1431436900, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313433363930303b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('fd18d01a969a6f1865543b7d2725949cc05e8f90', '::1', 1431500368, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530303336383b636172745f636f6e74656e74737c613a343a7b733a31303a22636172745f746f74616c223b643a32333634343b733a31313a22746f74616c5f6974656d73223b643a323b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b613a373a7b733a323a226964223b733a323a223131223b733a333a22717479223b643a313b733a353a227072696365223b643a32333334343b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224b6f6b6f223b733a353a22726f776964223b733a33323a223635313262643433643963616136653032633939306230613832363532646361223b733a383a22737562746f74616c223b643a32333334343b7d733a33323a226339663066383935666239386162393135396635316664303239376532333664223b613a373a7b733a323a226964223b733a313a2238223b733a333a22717479223b643a313b733a353a227072696365223b643a3330303b733a343a226e616d65223b733a343a2242616a75223b733a353a227469746c65223b733a343a224a65616e223b733a353a22726f776964223b733a33323a226339663066383935666239386162393135396635316664303239376532333664223b733a383a22737562746f74616c223b643a3330303b7d7d),
('ff1f49e7588e3e46e55d8e08cce8ad546b0ff1a0', '::1', 1480497914, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438303439373931333b),
('ff3a08b14c1404b3e5b2d676ba96633056fb6a4f', '::1', 1431469107, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313436393130373b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b),
('ffe8db00bef9128a8fed7f414ac2dede7e097967', '::1', 1431505561, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433313530353536313b757365726e616d657c733a353a2261646d696e223b67726f75707c733a313a2231223b);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `name`) VALUES
(1, 'Abia State'),
(2, 'Adamawa State'),
(3, 'Akwa Ibom State'),
(4, 'Anambra State'),
(5, 'Bauchi State'),
(6, 'Bayelsa State'),
(7, 'Benue State'),
(8, 'Borno State'),
(9, 'Cross River State'),
(10, 'Delta State'),
(11, 'Ebonyi State'),
(12, 'Edo State'),
(13, 'Ekiti State'),
(14, 'Enugu State'),
(15, 'FCT'),
(16, 'Gombe State'),
(17, 'Imo State'),
(18, 'Jigawa State'),
(19, 'Kaduna State'),
(20, 'Kano State'),
(21, 'Katsina State'),
(22, 'Kebbi State'),
(23, 'Kogi State'),
(24, 'Kwara State'),
(25, 'Lagos State'),
(26, 'Nasarawa State'),
(27, 'Niger State'),
(28, 'Ogun State'),
(29, 'Ondo State'),
(30, 'Osun State'),
(31, 'Oyo State'),
(32, 'Plateau State'),
(33, 'Rivers State'),
(34, 'Sokoto State'),
(35, 'Taraba State'),
(36, 'Yobe State'),
(37, 'Zamfara State');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `temp_id` int(16) NOT NULL,
  `temp_pro_id` int(16) NOT NULL,
  `temp_usr_code` varchar(50) NOT NULL,
  `temp_pro_name` varchar(50) NOT NULL,
  `temp_unit_id` int(3) NOT NULL,
  `temp_pro_qty` int(3) NOT NULL,
  `temp_pro_price` int(9) NOT NULL,
  `temp_return_qty` int(3) NOT NULL,
  `temp_pro_image` text NOT NULL,
  `temp_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_cart`
--

INSERT INTO `temp_cart` (`temp_id`, `temp_pro_id`, `temp_usr_code`, `temp_pro_name`, `temp_unit_id`, `temp_pro_qty`, `temp_pro_price`, `temp_return_qty`, `temp_pro_image`, `temp_time`) VALUES
(1, 14, 'f7e5788b6a5c10e423dfa99c57245e8b', 'Gulder beer crate', 0, 6, 1950, 4, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-10 22:22:17'),
(2, 13, '588636eb6f722531e6ad450a86868927', 'Heineken crate beer', 0, 20, 2050, 7, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-10 22:22:55'),
(3, 7, '126a33d753d1f2adec56813cc475d7cb', 'Maltina can drink', 0, 6, 1420, 0, 'fe37ee351b789410a086c813a81ea298.png', '2017-01-11 08:02:20'),
(4, 14, '571ec7d3c431d5f747db741ebd7f6abc', 'Gulder beer crate', 0, 3, 1950, 1, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-11 08:06:42'),
(5, 14, 'd7b37d8e6b41453e520c3b46f1b2d6fc', 'Gulder beer crate', 0, 3, 1950, 1, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-11 08:07:07'),
(6, 13, 'd3756438a9e24f59926b4b6cc3815518', 'Heineken crate beer', 0, 10, 2050, 4, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-11 08:14:12'),
(7, 7, 'f0ba9e16a3695dbf55702251c4e9f15e', 'Maltina can drink', 0, 6, 1420, 0, 'fe37ee351b789410a086c813a81ea298.png', '2017-01-11 08:15:04'),
(8, 14, 'f6dbbe4cccc8bfb81e1f14176c59a3b3', 'Gulder beer crate', 1, 5, 1950, 1, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-11 09:54:22'),
(9, 13, 'd66ea39caca03c6a4f1cd07cae89ecdc', 'Heineken crate beer', 1, 10, 2050, 2, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-11 09:54:28'),
(10, 1, '7acf879a4884eb501327669d4794d78c', 'Amstel Malta', 2, 15, 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png', '2017-01-11 09:54:39'),
(11, 3, '2a7897dfdc90a50ff818aaa3fd471dd7', 'Heineken beer can', 2, 34, 1250, 0, 'f75df5ce3758cdb36e18a732d41edb9d.png', '2017-01-12 08:23:47'),
(12, 14, '5dff62022b022104bc63e59308be7e50', 'Gulder beer crate', 1, 12, 1950, 3, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 08:24:06'),
(13, 13, 'b085a124b334b8c4d182032c0b6379ed', 'Heineken crate beer', 1, 20, 2050, 15, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 08:24:09'),
(14, 1, 'c3a5917531ddab799b53ab11440c3e9e', 'Amstel Malta', 2, 12, 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png', '2017-01-12 08:24:19'),
(15, 3, '91adffff8c4326d0b83d891dbc72e6c1', 'Heineken beer can', 2, 10, 1250, 0, 'f75df5ce3758cdb36e18a732d41edb9d.png', '2017-01-12 08:24:33'),
(16, 14, '7dc75c763a1e7c3bed7ac7bd25108af8', 'Gulder beer crate', 1, 10, 1950, 3, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 13:49:39'),
(17, 13, '0fb34368d768177c60673d7c3c514a69', 'Heineken crate beer', 1, 14, 2050, 10, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 13:49:50'),
(18, 1, '50ff8708f4c0a3190cc26db6290e40b0', 'Amstel Malta', 2, 10, 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png', '2017-01-12 13:50:13'),
(19, 3, 'd92df2f3093678c50738193921911dbe', 'Heineken beer can', 2, 12, 1250, 0, 'f75df5ce3758cdb36e18a732d41edb9d.png', '2017-01-12 13:50:20'),
(20, 14, 'f1bf3d3c6e71ad1c328668e881563ba3', 'Gulder beer crate', 1, 4, 1950, 1, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 14:33:39'),
(21, 13, '3c002a79cc7d340ac3daa9a6922f5707', 'Heineken crate beer', 1, 5, 2050, 5, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 14:33:41'),
(22, 1, '76da608726f513dc290d56bc33725cf6', 'Amstel Malta', 2, 6, 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png', '2017-01-12 14:33:45'),
(23, 13, '1a1988aad6488177cec366dd46bf75b6', 'Heineken crate beer', 1, 4, 2050, 4, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 14:40:17'),
(24, 14, '6ddd4af960b70aae97b67f26c0286442', 'Gulder beer crate', 1, 5, 1950, 2, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 14:40:19'),
(25, 14, '51c0c39600072f4ffe47106c9dbd264d', 'Gulder beer crate', 1, 4, 1950, 3, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 14:47:22'),
(26, 14, 'c7f6376caade92ab677d7e7770124342', 'Gulder beer crate', 1, 5, 1950, 3, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 14:48:56'),
(27, 13, 'bd5f6629e7ed0947c6897779ad88e298', 'Heineken crate beer', 1, 5, 2050, 2, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 14:49:01'),
(28, 3, '16f8707971a88dbced2005493603d810', 'Heineken beer can', 2, 3, 1250, 0, 'f75df5ce3758cdb36e18a732d41edb9d.png', '2017-01-12 14:49:10'),
(29, 1, '8142b06d644dd9fd4986c9314346b43b', 'Amstel Malta', 2, 6, 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png', '2017-01-12 14:49:14'),
(30, 14, 'a1f5fa690ff27265eb2fafe4888af7b6', 'Gulder beer crate', 1, 10, 1950, 2, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 14:56:54'),
(31, 13, '1780b8363a8c07846ead983975af2a6b', 'Heineken crate beer', 1, 14, 2050, 3, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 14:56:57'),
(32, 3, 'd3573c32a0da6364796ecace2ae4d15e', 'Heineken beer can', 2, 5, 1250, 0, 'f75df5ce3758cdb36e18a732d41edb9d.png', '2017-01-12 14:57:02'),
(33, 1, '822fa4132c2e7f7742e4e7c0b22f6c3a', 'Amstel Malta', 2, 6, 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png', '2017-01-12 14:57:04'),
(34, 3, '2180973e3dfffd3e391cb1cece4b859f', 'Heineken beer can', 2, 5, 1250, 0, 'f75df5ce3758cdb36e18a732d41edb9d.png', '2017-01-12 15:13:58'),
(35, 1, '3ba45d9b31a6de04e4e1ed48c24e3135', 'Amstel Malta', 2, 10, 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png', '2017-01-12 15:14:03'),
(36, 14, '9fb03778a36a9e4291dc368bd4f0cdc0', 'Gulder beer crate', 1, 4, 1950, 3, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 19:49:27'),
(37, 3, '20873b0bd8dfbaff629528895a0ecf82', 'Heineken beer can', 2, 6, 1250, 0, 'f75df5ce3758cdb36e18a732d41edb9d.png', '2017-01-12 19:53:24'),
(38, 1, '2a923ce265e190bf8df6d90eb6a9579d', 'Amstel Malta', 2, 5, 1250, 0, 'fc3b53a9b34cbf6aefd0112eb73c871c.png', '2017-01-12 19:53:27'),
(39, 14, '9c1429c10dea65650f1ef2d586eaaaae', 'Gulder beer crate', 1, 21, 1950, 12, 'c99a11c4e1c03e66e8111b3da3395c23.jpg', '2017-01-12 19:53:33'),
(40, 13, '82e530269cd97c234d3867a047092ad4', 'Heineken crate beer', 1, 12, 2050, 4, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 19:53:36'),
(41, 13, '7f4217d25f12be3177f886918fe0e2ec', 'Heineken crate beer', 1, 12, 2050, 4, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 19:53:40'),
(42, 13, '63dd4c98f23930b3d045320efeaa772b', 'Heineken crate beer', 1, 12, 2050, 4, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg', '2017-01-12 19:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(16) NOT NULL,
  `unit_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Add new units like crate, can, pet etc.';

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_type`) VALUES
(1, 'Crate'),
(2, 'Can'),
(3, 'Pet');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(10) NOT NULL,
  `usr_name` varchar(25) NOT NULL,
  `usr_email` varchar(64) NOT NULL,
  `usr_password` varchar(60) NOT NULL,
  `usr_group` tinyint(1) NOT NULL,
  `usr_fname` varchar(32) NOT NULL,
  `usr_lname` varchar(32) NOT NULL,
  `usr_phone` varchar(16) NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `gplus` varchar(256) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `online` int(11) NOT NULL,
  `forgot_pass_code` varchar(32) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `activation_code` varchar(50) NOT NULL,
  `stuts` tinyint(1) NOT NULL DEFAULT '1',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_name`, `usr_email`, `usr_password`, `usr_group`, `usr_fname`, `usr_lname`, `usr_phone`, `facebook`, `gplus`, `gender`, `online`, `forgot_pass_code`, `ip`, `activation_code`, `stuts`, `date`) VALUES
(1, 'admin', '', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '', '', '', 0, '', '', '', 1, '0000-00-00'),
(4, 'Biner', '', 'e10adc3949ba59abbe56e057f20f883e', 3, '', '', '', '', '', '', 0, '', '', '', 1, '0000-00-00'),
(8, 'phalconVee', 'phalcon.vee@gmail.com', 'ae02b7d7180f70da93f9d3d678cd5039', 3, 'Phalcon', 'Vee', '08166601864', '', '', 'Male', 1484315055, '', '', '', 1, '0000-00-00'),
(10, 'ugostein100', 'ugostein1000@gmail.com', 'c2b795fe0016b7e079a6ac5154094d62', 4, 'Ugo', 'Stein', '07039791447', '', '', 'Male', 0, '', '', '', 1, '0000-00-00'),
(11, 'bruce007', 'bruce007@gmail.com', '53564f456d5c18aa3d019610052455f1', 3, 'Bruce', 'Chi', '08133396478', '', '', 'Male', 0, '', '', '', 1, '0000-00-00'),
(12, 'junior_001', 'ajayi.sunday@yahoo.com', 'b3e1ae7934f8282191008e2eede51fd1', 4, 'Ajayi', 'Sunday', '08166023786', '', '', 'Male', 0, '', '', '', 0, '0000-00-00'),
(13, 'Indomix_001', 'indomix@gmail.com', '098c1f0cd556b7bf4d81ac62fda09d3f', 0, '', '', '', '', '', '', 1482180885, '', '::1', 'f1a4bdcd81b6cd010db499400d53524e', 1, '2016-12-19'),
(14, 'Yahoozee', 'yahoozee@gmail.com', 'f2034164a76bda8b3515cce843f39508', 4, '', '', '', '', '', '', 1482181184, '', '::1', 'e7042a6e8fb48104b9fbf85ea683e197', 1, '2016-12-19'),
(15, 'xantus1990', 'xantus.ekure@gmail.com', 'bbdde2fb90587a9688abfbe6d9ae63f4', 4, '', '', '', '', '', '', 1482181571, '', '::1', '4ea850cfa95eb4705ae938f6954a3e66', 1, '2016-12-19'),
(16, 'johnHorace', 'john.horace@nmr-int.com', 'a3e28e1daad299b6b29a0ec2f71b84c7', 4, '', '', '', '', '', '', 1482225781, '', '::1', '0a87e094e6dc143594a7b136e3273f42', 1, '2016-12-20'),
(17, 'cfive', 'ahamefula.uzoma@gmail.com', 'b70c2ce21468b69c8b9268627f019f89', 4, '', '', '', '', '', '', 1483087530, '', '::1', 'e8f10d63de1198d66bb1d6d5840eb31c', 1, '2016-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `pro_id` int(16) NOT NULL,
  `cat_id` int(16) NOT NULL,
  `brand_id` int(16) NOT NULL,
  `admin_id` int(16) NOT NULL,
  `state_id` int(16) NOT NULL,
  `local_id` int(16) NOT NULL,
  `unit_id` int(16) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_description` text NOT NULL,
  `pro_price` int(9) NOT NULL,
  `pro_stock` int(3) NOT NULL,
  `pro_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='holds all products stocks for distributors';

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`pro_id`, `cat_id`, `brand_id`, `admin_id`, `state_id`, `local_id`, `unit_id`, `pro_name`, `pro_description`, `pro_price`, `pro_stock`, `pro_image`) VALUES
(1, 3, 13, 103, 33, 670, 2, 'Amstel Malta', 'Amstel Malta Can', 1250, 15, 'fc3b53a9b34cbf6aefd0112eb73c871c.png'),
(2, 1, 2, 103, 33, 670, 1, 'Heineken crate beer', 'Heineken crate beer', 2050, 15, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg'),
(3, 1, 3, 103, 33, 670, 1, 'Gulder beer crate', 'Gulder beer cate', 1950, 20, 'c99a11c4e1c03e66e8111b3da3395c23.jpg'),
(4, 3, 13, 104, 33, 670, 2, 'Amstel Malta', 'Amstel Malta Can', 1250, 10, 'fc3b53a9b34cbf6aefd0112eb73c871c.png'),
(5, 1, 3, 104, 33, 670, 1, 'Gulder beer crate', 'Gulder beer cate', 1950, 31, 'c99a11c4e1c03e66e8111b3da3395c23.jpg'),
(6, 1, 2, 106, 12, 202, 1, 'Heineken crate beer', 'Heineken crate beer', 2050, 10, 'f140a1d50fd5bbdbc23a66c3d9eb5cad.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `all_settings`
--
ALTER TABLE `all_settings`
  ADD PRIMARY KEY (`all_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`gro_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locals`
--
ALTER TABLE `locals`
  ADD PRIMARY KEY (`local_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `shop_session`
--
ALTER TABLE `shop_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`temp_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `all_settings`
--
ALTER TABLE `all_settings`
  MODIFY `all_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `gro_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001010;
--
-- AUTO_INCREMENT for table `locals`
--
ALTER TABLE `locals`
  MODIFY `local_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=739;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `rep_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `temp_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `pro_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
