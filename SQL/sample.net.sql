-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2012 at 08:54 AM
-- Server version: 5.1.63
-- PHP Version: 5.3.6-13ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample.net`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_type_ref_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `last_login_at` datetime DEFAULT '0000-00-00 00:00:00',
  `last_login_from` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_from` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_from` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `password`, `admin_type_ref_id`, `status_id`, `last_login_at`, `last_login_from`, `created_at`, `created_from`, `created_by`, `modified_at`, `modified_from`, `modified_by`) VALUES
(1, 'Super Administrator', 'superadmin@sample.net', 'ac497cfaba23c4184cb03b97e8c51e0a', 1, 1, '2012-08-02 11:44:50', '192.168.30.44', '2012-08-02 11:44:50', '202.53.15.132', 0, '2012-08-02 11:44:50', '192.168.30.44', 0),
(2, 'Regular Admin-1', 'regularadmin1@sample.net', '0a13fa487a9fc4708200a96442529fc7', 2, 1, '2012-08-02 11:44:50', '192.168.30.44', '2012-08-02 11:44:50', '202.53.15.132', 0, '2012-08-02 11:44:50', '192.168.30.44', 0),
(3, 'Regular Admin-2', 'regularadmin2@sample.net', '8ed657407fb8ffba4db61ee39b497afc', 2, 1, '2012-08-02 11:44:50', '192.168.30.44', '2012-08-02 11:44:50', '202.53.15.132', 0, '2012-08-02 11:44:50', '192.168.30.44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_type_ref`
--

CREATE TABLE IF NOT EXISTS `admin_type_ref` (
  `admin_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_type_desc` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_type_ref`
--

INSERT INTO `admin_type_ref` (`admin_type_id`, `admin_type_desc`) VALUES
(1, 'Super Admin'),
(2, 'Regular Admin');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `status_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET latin1 NOT NULL,
  `code` varchar(45) CHARACTER SET latin1 NOT NULL,
  `status_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `status_id`) VALUES
(1, 'Andorra', 'AD', 1),
(2, 'United Arab Emirates', 'AE', 1),
(3, 'Afghanistan', 'AF', 1),
(4, 'Antigua and Barbuda', 'AG', 1),
(5, 'Anguilla', 'AI', 1),
(6, 'Albania', 'AL', 1),
(7, 'Armenia', 'AM', 1),
(8, 'Netherlands Antilles', 'AN', 1),
(9, 'Angola', 'AO', 1),
(10, 'Asia/Pacific Region', 'AP', 1),
(11, 'Antarctica', 'AQ', 1),
(12, 'Argentina', 'AR', 1),
(13, 'American Samoa', 'AS', 1),
(14, 'Austria', 'AT', 1),
(15, 'Australia', 'AU', 1),
(16, 'Aruba', 'AW', 1),
(17, 'Aland Islands', 'AX', 1),
(18, 'Azerbaijan', 'AZ', 1),
(19, 'Bosnia and Herzegovi', 'BA', 1),
(20, 'Barbados', 'BB', 1),
(21, 'Bangladesh', 'BD', 1),
(22, 'Belgium', 'BE', 1),
(23, 'Burkina Faso', 'BF', 1),
(24, 'Bulgaria', 'BG', 1),
(25, 'Bahrain', 'BH', 1),
(26, 'Burundi', 'BI', 1),
(27, 'Benin', 'BJ', 1),
(28, 'Bermuda', 'BM', 1),
(29, 'Brunei Darussalam', 'BN', 1),
(30, 'Bolivia', 'BO', 1),
(31, 'Brazil', 'BR', 1),
(32, 'Bahamas', 'BS', 1),
(33, 'Bhutan', 'BT', 1),
(34, 'Bouvet Island', 'BV', 1),
(35, 'Botswana', 'BW', 1),
(36, 'Belarus', 'BY', 1),
(37, 'Belize', 'BZ', 1),
(38, 'Canada', 'CA', 1),
(39, 'Cocos (Keeling) Isla', 'CC', 1),
(40, 'Congo, Democratic Republic', 'CD', 1),
(41, 'Central African Repu', 'CF', 1),
(42, 'Congo', 'CG', 1),
(43, 'Switzerland', 'CH', 1),
(44, 'Ivory Coast', 'CI', 1),
(45, 'Cook Islands', 'CK', 1),
(46, 'Chile', 'CL', 1),
(47, 'Cameroon', 'CM', 1),
(48, 'China', 'CN', 1),
(49, 'Colombia', 'CO', 1),
(50, 'Costa Rica', 'CR', 1),
(51, 'Cape Verde', 'CV', 1),
(52, 'Christmas Island', 'CX', 1),
(53, 'Cyprus', 'CY', 1),
(54, 'Czech Republic', 'CZ', 1),
(55, 'Germany', 'DE', 1),
(56, 'Djibouti', 'DJ', 1),
(57, 'Denmark', 'DK', 1),
(58, 'Dominica', 'DM', 1),
(59, 'Dominican Republic', 'DO', 1),
(60, 'Algeria', 'DZ', 1),
(61, 'Ecuador', 'EC', 1),
(62, 'Estonia', 'EE', 1),
(63, 'Egypt', 'EG', 1),
(64, 'Western Sahara', 'EH', 1),
(65, 'Eritrea', 'ER', 1),
(66, 'Spain', 'ES', 1),
(67, 'Ethiopia', 'ET', 1),
(68, 'Europe', 'EU', 1),
(69, 'Finland', 'FI', 1),
(70, 'Fiji', 'FJ', 1),
(71, 'Falkland Islands (Ma', 'FK', 1),
(72, 'Micronesia', 'FM', 1),
(73, 'Faroe Islands', 'FO', 1),
(74, 'France', 'FR', 1),
(75, 'France- Metropolitan', 'FX', 1),
(76, 'Gabon', 'GA', 1),
(77, 'United Kingdom', 'GB', 1),
(78, 'Grenada', 'GD', 1),
(79, 'Georgia', 'GE', 1),
(80, 'French Guiana', 'GF', 1),
(81, 'Guernsey', 'GG', 1),
(82, 'Ghana', 'GH', 1),
(83, 'Gibraltar', 'GI', 1),
(84, 'Greenland', 'GL', 1),
(85, 'Gambia', 'GM', 1),
(86, 'Guinea', 'GN', 1),
(87, 'Guadeloupe', 'GP', 1),
(88, 'Equatorial Guinea', 'GQ', 1),
(89, 'Greece', 'GR', 1),
(90, 'South Georgia and th', 'GS', 1),
(91, 'Guatemala', 'GT', 1),
(92, 'Guam', 'GU', 1),
(93, 'Guinea-Bissau', 'GW', 1),
(94, 'Guyana', 'GY', 1),
(95, 'Hong Kong', 'HK', 1),
(96, 'Heard Island and McD', 'HM', 1),
(97, 'Honduras', 'HN', 1),
(98, 'Croatia', 'HR', 1),
(99, 'Haiti', 'HT', 1),
(100, 'Hungary', 'HU', 1),
(101, 'Indonesia', 'ID', 1),
(102, 'Ireland', 'IE', 1),
(103, 'Israel', 'IL', 1),
(104, 'Isle Of Man', 'IM', 1),
(105, 'India', 'IN', 1),
(106, 'British Indian Ocean', 'IO', 1),
(107, 'Iraq', 'IQ', 1),
(108, 'Iceland', 'IS', 1),
(109, 'Italy', 'IT', 1),
(110, 'Jersey', 'JE', 1),
(111, 'Jamaica', 'JM', 1),
(112, 'Jordan', 'JO', 1),
(113, 'Japan', 'JP', 1),
(114, 'Kenya', 'KE', 1),
(115, 'Kyrgyzstan', 'KG', 1),
(116, 'Cambodia', 'KH', 1),
(117, 'Kiribati', 'KI', 1),
(118, 'Comoros', 'KM', 1),
(119, 'Saint Kitts and Nevi', 'KN', 1),
(120, 'Korea', 'KR', 1),
(121, 'Kuwait', 'KW', 1),
(122, 'Cayman Islands', 'KY', 1),
(123, 'Kazakhstan', 'KZ', 1),
(124, 'Lao Peoples Democrat', 'LA', 1),
(125, 'Lebanon', 'LB', 1),
(126, 'Saint Lucia', 'LC', 1),
(127, 'Liechtenstein', 'LI', 1),
(128, 'Sri Lanka', 'LK', 1),
(129, 'Liberia', 'LR', 1),
(130, 'Lesotho', 'LS', 1),
(131, 'Lithuania', 'LT', 1),
(132, 'Luxembourg', 'LU', 1),
(133, 'Latvia', 'LV', 1),
(134, 'Libyan Arab Jamahiri', 'LY', 1),
(135, 'Morocco', 'MA', 1),
(136, 'Monaco', 'MC', 1),
(137, 'Moldova', 'MD', 1),
(138, 'Montenegro', 'ME', 1),
(139, 'Madagascar', 'MG', 1),
(140, 'Marshall Islands', 'MH', 1),
(141, 'Macedonia', 'MK', 1),
(142, 'Mali', 'ML', 1),
(143, 'Myanmar', 'MM', 1),
(144, 'Mongolia', 'MN', 1),
(145, 'Macao', 'MO', 1),
(146, 'Northern Mariana Isl', 'MP', 1),
(147, 'Martinique', 'MQ', 1),
(148, 'Mauritania', 'MR', 1),
(149, 'Montserrat', 'MS', 1),
(150, 'Malta', 'MT', 1),
(151, 'Mauritius', 'MU', 1),
(152, 'Maldives', 'MV', 1),
(153, 'Malawi', 'MW', 1),
(154, 'Mexico', 'MX', 1),
(155, 'Malaysia', 'MY', 1),
(156, 'Mozambique', 'MZ', 1),
(157, 'Namibia', 'NA', 1),
(158, 'New Caledonia', 'NC', 1),
(159, 'Niger', 'NE', 1),
(160, 'Norfolk Island', 'NF', 1),
(161, 'Nigeria', 'NG', 1),
(162, 'Nicaragua', 'NI', 1),
(163, 'Netherlands', 'NL', 1),
(164, 'Norway', 'NO', 1),
(165, 'Nepal', 'NP', 1),
(166, 'Nauru', 'NR', 1),
(167, 'Niue', 'NU', 1),
(168, 'New Zealand', 'NZ', 1),
(169, 'Oman', 'OM', 1),
(170, 'Panama', 'PA', 1),
(171, 'Peru', 'PE', 1),
(172, 'French Polynesia', 'PF', 1),
(173, 'Papua New Guinea', 'PG', 1),
(174, 'Philippines', 'PH', 1),
(175, 'Pakistan', 'PK', 1),
(176, 'Poland', 'PL', 1),
(177, 'Saint Pierre and Miq', 'PM', 1),
(178, 'Pitcairn', 'PN', 1),
(179, 'Puerto Rico', 'PR', 1),
(180, 'Palestine', 'PS', 1),
(181, 'Portugal', 'PT', 1),
(182, 'Palau', 'PW', 1),
(183, 'Paraguay', 'PY', 1),
(184, 'Qatar', 'QA', 1),
(185, 'Reunion', 'RE', 1),
(186, 'Romania', 'RO', 1),
(187, 'Serbia', 'RS', 1),
(188, 'Russian Federation', 'RU', 1),
(189, 'Rwanda', 'RW', 1),
(190, 'Saudi Arabia', 'SA', 1),
(191, 'Solomon Islands', 'SB', 1),
(192, 'Seychelles', 'SC', 1),
(193, 'Sweden', 'SE', 1),
(194, 'Singapore', 'SG', 1),
(195, 'Saint Helena', 'SH', 1),
(196, 'Slovenia', 'SI', 1),
(197, 'Svalbard and Jan May', 'SJ', 1),
(198, 'Slovakia', 'SK', 1),
(199, 'Sierra Leone', 'SL', 1),
(200, 'San Marino', 'SM', 1),
(201, 'Senegal', 'SN', 1),
(202, 'Somalia', 'SO', 1),
(203, 'Suriname', 'SR', 1),
(204, 'Sao Tome and Princip', 'ST', 1),
(205, 'El Salvador', 'SV', 1),
(206, 'Swaziland', 'SZ', 1),
(207, 'Turks and Caicos Isl', 'TC', 1),
(208, 'Chad', 'TD', 1),
(209, 'French Southern Terr', 'TF', 1),
(210, 'Togo', 'TG', 1),
(211, 'Thailand', 'TH', 1),
(212, 'Tajikistan', 'TJ', 1),
(213, 'Tokelau', 'TK', 1),
(214, 'East Timor', 'TL', 1),
(215, 'Turkmenistan', 'TM', 1),
(216, 'Tunisia', 'TN', 1),
(217, 'Tonga', 'TO', 1),
(218, 'Turkey', 'TR', 1),
(219, 'Trinidad and Tobago', 'TT', 1),
(220, 'Tuvalu', 'TV', 1),
(221, 'Taiwan', 'TW', 1),
(222, 'Tanzania', 'TZ', 1),
(223, 'Ukraine', 'UA', 1),
(224, 'Uganda', 'UG', 1),
(225, 'United States Minor ', 'UM', 1),
(226, 'United States', 'US', 1),
(227, 'Uruguay', 'UY', 1),
(228, 'Uzbekistan', 'UZ', 1),
(229, 'Holy See (Vatican Ci', 'VA', 1),
(230, 'Saint Vincent and th', 'VC', 1),
(231, 'Venezuela', 'VE', 1),
(232, 'Virgin Islands- Brit', 'VG', 1),
(233, 'Virgin Islands- U.S.', 'VI', 1),
(234, 'Vietnam', 'VN', 1),
(235, 'Vanuatu', 'VU', 1),
(236, 'Wallis and Futuna', 'WF', 1),
(237, 'Samoa', 'WS', 1),
(238, 'Yemen', 'YE', 1),
(239, 'Mayotte', 'YT', 1),
(240, 'Yugoslavia', 'YU', 1),
(241, 'South Africa', 'ZA', 1),
(242, 'Zambia', 'ZM', 1),
(243, 'Zaire', 'ZR', 1),
(244, 'Zimbabwe', 'ZW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `valid_countries` text,
  `status_id` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_from` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_from` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `category_id`, `image`, `description`, `valid_countries`, `status_id`, `created_at`, `created_from`, `created_by`, `modified_at`, `modified_from`, `modified_by`) VALUES
(1, 'Mobile_Doc_1', 1, '', 'nsdjkhnndjkfdjhm', '1,2,3,4,5,6', 1, '2012-08-02 11:44:50', '202.53.15.132', 0, '2012-08-02 11:44:50', '192.168.30.44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doc_categories`
--

CREATE TABLE IF NOT EXISTS `doc_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_cat_name` varchar(255) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `status_id` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_from` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_from` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `doc_categories`
--

INSERT INTO `doc_categories` (`id`, `doc_cat_name`, `parent_cat_id`, `status_id`, `created_at`, `created_from`, `created_by`, `modified_at`, `modified_from`, `modified_by`) VALUES
(1, 'Mobiles ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(2, 'Cameras ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(3, 'Computers ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(4, 'Gadgets ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(5, 'Automobiles ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(6, 'Kitchen ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(7, 'Jewellery ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(8, 'Gifts ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(9, 'Fashion ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(10, 'Health ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(11, 'Home Decor ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(12, 'Apparel', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(13, 'Sports ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doc_ratings`
--

CREATE TABLE IF NOT EXISTS `doc_ratings` (
  `user_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `rating` enum('1','2','3','4','5') CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `grab_url` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `only_today` tinyint(1) NOT NULL,
  `valid_countries` text,
  `status_id` smallint(6) NOT NULL,
  `product_rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_from` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_from` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image`, `description`, `grab_url`, `featured`, `only_today`, `valid_countries`, `status_id`, `product_rating`, `created_at`, `created_from`, `created_by`, `modified_at`, `modified_from`, `modified_by`) VALUES
(5, 'Necklace 1', 7, 'product_5.gif', 'Necklace 1 desc', 'http://www.trendseeder.com/shop/product_item_page/MTAw', 1, 1, '2,6,7,11,13,14,16,19,21,26,28,30,42,47,49,55,60', 1, 3, '2012-08-23 02:29:00', '127.0.0.1', 1, '2012-08-24 11:34:47', '127.0.0.1', 1),
(6, 'Diamond Necklace 1', 7, 'product_6.jpg', 'Diamond Necklace 1 Desc', 'http://www.trendseeder.com/shop/product_item_page/MTAw', 1, 1, '224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239', 1, 3, '2012-08-23 02:33:16', '127.0.0.1', 1, '2012-08-23 04:07:28', '127.0.0.1', 1),
(7, 'Diamond Necklace 2', 7, 'product_7.jpg', 'Diamond Necklace 2', 'http://www.trendseeder.com/shop/', 1, 1, '2,3,4,5,6,7,8,9,10', 1, 3, '2012-08-23 02:34:26', '127.0.0.1', 1, '2012-08-24 23:34:53', '127.0.0.1', 1),
(8, 'Mobile_1', 14, 'product_8.jpg', 'mob 1', 'http://www.trendseeder.com/shop/', 1, 1, '41,42,43,44,45,46,47,48,49,50,51,52,53,54,55', 1, 0, '2012-08-25 01:18:39', '127.0.0.1', 1, '2012-08-25 01:39:28', '127.0.0.1', 1),
(9, 'Mobile_2', 16, 'product_9.jpg', 'mob 2', 'http://www.trendseeder.com/shop/', 1, 1, '98,88,89,87,92,91,93,94,96,97,95,90', 1, 0, '2012-08-25 01:19:22', '127.0.0.1', 1, '2012-08-25 18:32:16', '127.0.0.1', 1),
(10, 'Mobile_3', 14, 'product_10.jpg', 'mobile 3', 'http://www.trendseeder.com/shop/', 1, 1, '3,6,5,4,7,8,2', 1, 4, '2012-08-25 01:19:54', '127.0.0.1', 1, '2012-08-25 18:32:34', '127.0.0.1', 1),
(11, 'Camera 1', 2, 'product_11.jpg', 'cam 1', 'http://www.trendseeder.com/shop/', 1, 1, '6,7,8', 1, 0, '2012-08-25 01:21:52', '127.0.0.1', 1, '2012-08-25 01:23:33', '127.0.0.1', 1),
(12, 'Camera 2', 2, 'product_12.jpg', 'cam 2', 'http://www.trendseeder.com/shop/', 1, 1, '4,5,6,7,8,9', 1, 0, '2012-08-25 01:23:01', '127.0.0.1', 1, '2012-08-25 01:23:35', '127.0.0.1', 1),
(13, 'Camera 3', 2, 'product_13.jpg', 'jkhjhkhkjk', 'http://www.trendseeder.com/shop/', 1, 1, '3,4,5,6,7,8', 1, 0, '2012-08-25 01:23:29', '127.0.0.1', 1, '2012-08-25 01:23:36', '127.0.0.1', 1),
(14, 'Testing', 12, 'product_14.jpg', 'Testing', 'google.com', 1, 1, '3,17,6,60,13,1,9,5,11,4,12,7,16,10,15,14,18,32,25,21,20,36,22,37,27,28,33,30,19,35,34,31,106,29,24,23,26,116,47,38,51,122,41,208,46,48,52,39,49,118,42,40,45,50,98,53,54,57,56,58,59,214,61,63,205,88,65,62,67,68,71,73,70,69,74,75,80,172,209,76,85,79,55,82,83,89,84,78,87,92,91,81,86,93,94,99,96,229,97,95,100,108,105,101,107,102,104,103,109,44,111,113,110,112,123,114,117,120,121,115,124,133,125,130,129,134,127,131,132,145,141,139,153,155,152,142,150,140,147,148,151,239,154,72,137,136,144,138,149,135,156,143,157,166,165,163,8,158,168,162,159,161,167,160,146,164,169,175,182,180,170,173,183,171,174,178,176,181,179,184,185,186,188,189,195,119,126,177,230,237,200,204,190,201,187,192,199,194,198,196,191,202,241,90,66,128,203,197,206,193,43,221,212,222,211,210,213,217,219,216,218,215,207,220,224,223,2,77,226,225,227,228,235,231,234,232,233,236,64,238,240,243,242,244', 1, 5, '2012-08-25 18:48:12', '127.0.0.1', 1, '2012-08-25 19:06:34', '127.0.0.1', 1),
(15, 'Lappy', 19, 'product_15.jpg', 'Lappy', 'http://www.trendseeder.com/dasdasdasd', 1, 1, '3,17', 1, 5, '2012-08-25 18:50:51', '127.0.0.1', 1, '2012-08-25 18:54:06', '127.0.0.1', 1),
(16, 'Testing', 12, 'product_16.jpg', 'Product Test', 'http://google.com', 1, 0, '60,13,9,11', 1, 5, '2012-08-25 19:03:22', '127.0.0.1', 1, '2012-09-18 08:53:28', '127.0.0.1', 1),
(17, 'Hello', 16, 'product_17.jpg', 'mhslkhlksjdlskjdlajsdlkajsdljka', 'https://jsdhksd.com', 1, 1, '6,60,5', 0, 0, '2012-09-01 03:21:25', '127.0.0.1', 1, '2012-09-01 03:21:25', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prod_categories`
--

CREATE TABLE IF NOT EXISTS `prod_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_cat_name` varchar(255) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `status_id` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_from` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_from` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `prod_categories`
--

INSERT INTO `prod_categories` (`id`, `prod_cat_name`, `parent_cat_id`, `status_id`, `created_at`, `created_from`, `created_by`, `modified_at`, `modified_from`, `modified_by`) VALUES
(1, 'Mobilez', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-25 17:16:59', '127.0.0.1', 1),
(2, 'Cameras ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(3, 'Computers ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(4, 'Gadgets ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(5, 'Automobiles ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(6, 'Kitchen ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(7, 'Jewellery ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(8, 'Gifts ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(9, 'Fashion ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(10, 'Health Care', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-25 17:15:08', '127.0.0.1', 1),
(11, 'Home Decor ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(12, 'Apparel', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(13, 'Sports ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(14, 'Nokia', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(15, 'Samsung', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(16, 'Blackberry', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-25 02:47:17', '127.0.0.1', 1),
(17, 'Sony Erricson', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-25 02:47:04', '127.0.0.1', 1),
(18, 'Iphone', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(19, 'Laptops', 3, 1, '2012-08-25 17:17:32', '127.0.0.1', 1, '2012-08-25 17:17:38', '127.0.0.1', 1),
(20, 'Cloths', 9, 1, '2012-08-25 17:18:08', '127.0.0.1', 1, '2012-08-25 17:18:44', '127.0.0.1', 1),
(21, 'Cloths', 0, 0, '2012-08-25 19:28:05', '127.0.0.1', 1, '2012-08-25 19:28:18', '127.0.0.1', 1),
(22, 'dasdasdasda', 7, 0, '2012-08-25 19:28:53', '127.0.0.1', 1, '2012-08-25 19:29:22', '127.0.0.1', 1),
(23, 't1t1t1t', 0, 0, '2012-09-03 01:05:15', '127.0.0.1', 1, '2012-09-03 01:05:15', '127.0.0.1', 1),
(24, 't2t2t2t2t', 12, 2, '2012-09-03 01:05:43', '127.0.0.1', 1, '2012-09-03 23:40:54', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prod_ratings`
--

CREATE TABLE IF NOT EXISTS `prod_ratings` (
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `rating` enum('1','2','3','4','5') CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prod_ratings`
--

INSERT INTO `prod_ratings` (`user_id`, `prod_id`, `rating`) VALUES
(1, 1, '4'),
(2, 1, '2'),
(3, 1, '3'),
(1, 10, '4'),
(1, 16, '5'),
(1, 15, '5'),
(1, 14, '5');

-- --------------------------------------------------------

--
-- Table structure for table `scribd_documents`
--

CREATE TABLE IF NOT EXISTS `scribd_documents` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `doc_id` int(10) NOT NULL COMMENT 'scribd suploaded document id',
  `access_key` varchar(100) NOT NULL COMMENT 'scribd access key',
  `secret_password` varchar(100) NOT NULL,
  `pdfdoc_category` int(5) NOT NULL,
  `doc_type` varchar(10) NOT NULL,
  `thumb_url` varchar(200) NOT NULL,
  `uploaded_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `scribd_documents`
--

INSERT INTO `scribd_documents` (`id`, `doc_id`, `access_key`, `secret_password`, `pdfdoc_category`, `doc_type`, `thumb_url`, `uploaded_date`) VALUES
(1, 104315212, 'key-1nf0mr3z3ltwa40360dj', '18vgsspmhhy1teg5q6t9', 1, 'private', '', '2012-08-29'),
(2, 104315382, 'key-22mapyq3dgwmxryfq0qz', '1nga20qjqfmp7c2mqxmw', 1, 'private', '', '2012-08-29'),
(3, 104315921, 'key-1ok4x305ikn82uyj8lue', 'hnl6szr1211ugd35k3y', 1, 'private', '', '2012-08-29'),
(4, 104316053, 'key-xqhciwrh4yyhoojquqy', '1hvpvnurleognl95kb7u', 1, 'private', '', '2012-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `desc` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `desc`) VALUES
(0, 'Inactive'),
(1, 'Active'),
(2, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `email_opt` enum('Y','N') NOT NULL DEFAULT 'Y',
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `pw_encryption` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_from` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_from` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
