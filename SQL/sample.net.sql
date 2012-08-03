-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2012 at 09:45 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.6-13ubuntu3.8

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
(1, 'Super Administrator', 'superadmin@sample.net', 'ac497cfaba23c4184cb03b97e8c51e0a', 1, 2, '2012-08-02 11:44:50', '192.168.30.44', '2012-08-02 11:44:50', '202.53.15.132', 0, '2012-08-02 11:44:50', '192.168.30.44', 0),
(2, 'Regular Admin-1', 'regularadmin1@sample.net', '0a13fa487a9fc4708200a96442529fc7', 2, 2, '2012-08-02 11:44:50', '192.168.30.44', '2012-08-02 11:44:50', '202.53.15.132', 0, '2012-08-02 11:44:50', '192.168.30.44', 0),
(3, 'Regular Admin-2', 'regularadmin2@sample.net', '8ed657407fb8ffba4db61ee39b497afc', 2, 2, '2012-08-02 11:44:50', '192.168.30.44', '2012-08-02 11:44:50', '202.53.15.132', 0, '2012-08-02 11:44:50', '192.168.30.44', 0);

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
  `name` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=246 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `is_active`) VALUES
(1, 'Andorra', 'AD', '1'),
(2, 'United Arab Emirates', 'AE', '1'),
(3, 'Afghanistan', 'AF', '1'),
(4, 'Antigua and Barbuda', 'AG', '1'),
(5, 'Anguilla', 'AI', '1'),
(6, 'Albania', 'AL', '1'),
(7, 'Armenia', 'AM', '1'),
(8, 'Netherlands Antilles', 'AN', '1'),
(9, 'Angola', 'AO', '1'),
(10, 'Asia/Pacific Region', 'AP', '1'),
(11, 'Antarctica', 'AQ', '1'),
(12, 'Argentina', 'AR', '1'),
(13, 'American Samoa', 'AS', '1'),
(14, 'Austria', 'AT', '1'),
(15, 'Australia', 'AU', '1'),
(16, 'Aruba', 'AW', '1'),
(17, 'Aland Islands', 'AX', '1'),
(18, 'Azerbaijan', 'AZ', '1'),
(19, 'Bosnia and Herzegovi', 'BA', '1'),
(20, 'Barbados', 'BB', '1'),
(21, 'Bangladesh', 'BD', '1'),
(22, 'Belgium', 'BE', '1'),
(23, 'Burkina Faso', 'BF', '1'),
(24, 'Bulgaria', 'BG', '1'),
(25, 'Bahrain', 'BH', '1'),
(26, 'Burundi', 'BI', '1'),
(27, 'Benin', 'BJ', '1'),
(28, 'Bermuda', 'BM', '1'),
(29, 'Brunei Darussalam', 'BN', '1'),
(30, 'Bolivia', 'BO', '1'),
(31, 'Brazil', 'BR', '1'),
(32, 'Bahamas', 'BS', '1'),
(33, 'Bhutan', 'BT', '1'),
(34, 'Bouvet Island', 'BV', '1'),
(35, 'Botswana', 'BW', '1'),
(36, 'Belarus', 'BY', '1'),
(37, 'Belize', 'BZ', '1'),
(38, 'Canada', 'CA', '1'),
(39, 'Cocos (Keeling) Isla', 'CC', '1'),
(40, 'Congo, Democratic Republic', 'CD', '1'),
(41, 'Central African Repu', 'CF', '1'),
(42, 'Congo', 'CG', '1'),
(43, 'Switzerland', 'CH', '1'),
(44, 'Ivory Coast', 'CI', '1'),
(45, 'Cook Islands', 'CK', '1'),
(46, 'Chile', 'CL', '1'),
(47, 'Cameroon', 'CM', '1'),
(48, 'China', 'CN', '1'),
(49, 'Colombia', 'CO', '1'),
(50, 'Costa Rica', 'CR', '1'),
(51, 'Cape Verde', 'CV', '1'),
(52, 'Christmas Island', 'CX', '1'),
(53, 'Cyprus', 'CY', '1'),
(54, 'Czech Republic', 'CZ', '1'),
(55, 'Germany', 'DE', '1'),
(56, 'Djibouti', 'DJ', '1'),
(57, 'Denmark', 'DK', '1'),
(58, 'Dominica', 'DM', '1'),
(59, 'Dominican Republic', 'DO', '1'),
(60, 'Algeria', 'DZ', '1'),
(61, 'Ecuador', 'EC', '1'),
(62, 'Estonia', 'EE', '1'),
(63, 'Egypt', 'EG', '1'),
(64, 'Western Sahara', 'EH', '1'),
(65, 'Eritrea', 'ER', '1'),
(66, 'Spain', 'ES', '1'),
(67, 'Ethiopia', 'ET', '1'),
(68, 'Europe', 'EU', '1'),
(69, 'Finland', 'FI', '1'),
(70, 'Fiji', 'FJ', '1'),
(71, 'Falkland Islands (Ma', 'FK', '1'),
(72, 'Micronesia', 'FM', '1'),
(73, 'Faroe Islands', 'FO', '1'),
(74, 'France', 'FR', '1'),
(75, 'France- Metropolitan', 'FX', '1'),
(76, 'Gabon', 'GA', '1'),
(77, 'United Kingdom', 'GB', '1'),
(78, 'Grenada', 'GD', '1'),
(79, 'Georgia', 'GE', '1'),
(80, 'French Guiana', 'GF', '1'),
(81, 'Guernsey', 'GG', '1'),
(82, 'Ghana', 'GH', '1'),
(83, 'Gibraltar', 'GI', '1'),
(84, 'Greenland', 'GL', '1'),
(85, 'Gambia', 'GM', '1'),
(86, 'Guinea', 'GN', '1'),
(87, 'Guadeloupe', 'GP', '1'),
(88, 'Equatorial Guinea', 'GQ', '1'),
(89, 'Greece', 'GR', '1'),
(90, 'South Georgia and th', 'GS', '1'),
(91, 'Guatemala', 'GT', '1'),
(92, 'Guam', 'GU', '1'),
(93, 'Guinea-Bissau', 'GW', '1'),
(94, 'Guyana', 'GY', '1'),
(95, 'Hong Kong', 'HK', '1'),
(96, 'Heard Island and McD', 'HM', '1'),
(97, 'Honduras', 'HN', '1'),
(98, 'Croatia', 'HR', '1'),
(99, 'Haiti', 'HT', '1'),
(100, 'Hungary', 'HU', '1'),
(101, 'Indonesia', 'ID', '1'),
(102, 'Ireland', 'IE', '1'),
(103, 'Israel', 'IL', '1'),
(104, 'Isle Of Man', 'IM', '1'),
(105, 'India', 'IN', '1'),
(106, 'British Indian Ocean', 'IO', '1'),
(107, 'Iraq', 'IQ', '1'),
(108, 'Iceland', 'IS', '1'),
(109, 'Italy', 'IT', '1'),
(110, 'Jersey', 'JE', '1'),
(111, 'Jamaica', 'JM', '1'),
(112, 'Jordan', 'JO', '1'),
(113, 'Japan', 'JP', '1'),
(114, 'Kenya', 'KE', '1'),
(115, 'Kyrgyzstan', 'KG', '1'),
(116, 'Cambodia', 'KH', '1'),
(117, 'Kiribati', 'KI', '1'),
(118, 'Comoros', 'KM', '1'),
(119, 'Saint Kitts and Nevi', 'KN', '1'),
(120, 'Korea', 'KR', '1'),
(121, 'Kuwait', 'KW', '1'),
(122, 'Cayman Islands', 'KY', '1'),
(123, 'Kazakhstan', 'KZ', '1'),
(124, 'Lao Peoples Democrat', 'LA', '1'),
(125, 'Lebanon', 'LB', '1'),
(126, 'Saint Lucia', 'LC', '1'),
(127, 'Liechtenstein', 'LI', '1'),
(128, 'Sri Lanka', 'LK', '1'),
(129, 'Liberia', 'LR', '1'),
(130, 'Lesotho', 'LS', '1'),
(131, 'Lithuania', 'LT', '1'),
(132, 'Luxembourg', 'LU', '1'),
(133, 'Latvia', 'LV', '1'),
(134, 'Libyan Arab Jamahiri', 'LY', '1'),
(135, 'Morocco', 'MA', '1'),
(136, 'Monaco', 'MC', '1'),
(137, 'Moldova', 'MD', '1'),
(138, 'Montenegro', 'ME', '1'),
(139, 'Madagascar', 'MG', '1'),
(140, 'Marshall Islands', 'MH', '1'),
(141, 'Macedonia', 'MK', '1'),
(142, 'Mali', 'ML', '1'),
(143, 'Myanmar', 'MM', '1'),
(144, 'Mongolia', 'MN', '1'),
(145, 'Macao', 'MO', '1'),
(146, 'Northern Mariana Isl', 'MP', '1'),
(147, 'Martinique', 'MQ', '1'),
(148, 'Mauritania', 'MR', '1'),
(149, 'Montserrat', 'MS', '1'),
(150, 'Malta', 'MT', '1'),
(151, 'Mauritius', 'MU', '1'),
(152, 'Maldives', 'MV', '1'),
(153, 'Malawi', 'MW', '1'),
(154, 'Mexico', 'MX', '1'),
(155, 'Malaysia', 'MY', '1'),
(156, 'Mozambique', 'MZ', '1'),
(157, 'Namibia', 'NA', '1'),
(158, 'New Caledonia', 'NC', '1'),
(159, 'Niger', 'NE', '1'),
(160, 'Norfolk Island', 'NF', '1'),
(161, 'Nigeria', 'NG', '1'),
(162, 'Nicaragua', 'NI', '1'),
(163, 'Netherlands', 'NL', '1'),
(164, 'Norway', 'NO', '1'),
(165, 'Nepal', 'NP', '1'),
(166, 'Nauru', 'NR', '1'),
(167, 'Niue', 'NU', '1'),
(168, 'New Zealand', 'NZ', '1'),
(169, 'Oman', 'OM', '1'),
(170, 'Panama', 'PA', '1'),
(171, 'Peru', 'PE', '1'),
(172, 'French Polynesia', 'PF', '1'),
(173, 'Papua New Guinea', 'PG', '1'),
(174, 'Philippines', 'PH', '1'),
(175, 'Pakistan', 'PK', '1'),
(176, 'Poland', 'PL', '1'),
(177, 'Saint Pierre and Miq', 'PM', '1'),
(178, 'Pitcairn', 'PN', '1'),
(179, 'Puerto Rico', 'PR', '1'),
(180, 'Palestine', 'PS', '1'),
(181, 'Portugal', 'PT', '1'),
(182, 'Palau', 'PW', '1'),
(183, 'Paraguay', 'PY', '1'),
(184, 'Qatar', 'QA', '1'),
(185, 'Reunion', 'RE', '1'),
(186, 'Romania', 'RO', '1'),
(187, 'Serbia', 'RS', '1'),
(188, 'Russian Federation', 'RU', '1'),
(189, 'Rwanda', 'RW', '1'),
(190, 'Saudi Arabia', 'SA', '1'),
(191, 'Solomon Islands', 'SB', '1'),
(192, 'Seychelles', 'SC', '1'),
(193, 'Sweden', 'SE', '1'),
(194, 'Singapore', 'SG', '1'),
(195, 'Saint Helena', 'SH', '1'),
(196, 'Slovenia', 'SI', '1'),
(197, 'Svalbard and Jan May', 'SJ', '1'),
(198, 'Slovakia', 'SK', '1'),
(199, 'Sierra Leone', 'SL', '1'),
(200, 'San Marino', 'SM', '1'),
(201, 'Senegal', 'SN', '1'),
(202, 'Somalia', 'SO', '1'),
(203, 'Suriname', 'SR', '1'),
(204, 'Sao Tome and Princip', 'ST', '1'),
(205, 'El Salvador', 'SV', '1'),
(206, 'Swaziland', 'SZ', '1'),
(207, 'Turks and Caicos Isl', 'TC', '1'),
(208, 'Chad', 'TD', '1'),
(209, 'French Southern Terr', 'TF', '1'),
(210, 'Togo', 'TG', '1'),
(211, 'Thailand', 'TH', '1'),
(212, 'Tajikistan', 'TJ', '1'),
(213, 'Tokelau', 'TK', '1'),
(214, 'East Timor', 'TL', '1'),
(215, 'Turkmenistan', 'TM', '1'),
(216, 'Tunisia', 'TN', '1'),
(217, 'Tonga', 'TO', '1'),
(218, 'Turkey', 'TR', '1'),
(219, 'Trinidad and Tobago', 'TT', '1'),
(220, 'Tuvalu', 'TV', '1'),
(221, 'Taiwan', 'TW', '1'),
(222, 'Tanzania', 'TZ', '1'),
(223, 'Ukraine', 'UA', '1'),
(224, 'Uganda', 'UG', '1'),
(225, 'United States Minor ', 'UM', '1'),
(226, 'United States', 'US', '1'),
(227, 'Uruguay', 'UY', '1'),
(228, 'Uzbekistan', 'UZ', '1'),
(229, 'Holy See (Vatican Ci', 'VA', '1'),
(230, 'Saint Vincent and th', 'VC', '1'),
(231, 'Venezuela', 'VE', '1'),
(232, 'Virgin Islands- Brit', 'VG', '1'),
(233, 'Virgin Islands- U.S.', 'VI', '1'),
(234, 'Vietnam', 'VN', '1'),
(235, 'Vanuatu', 'VU', '1'),
(236, 'Wallis and Futuna', 'WF', '1'),
(237, 'Samoa', 'WS', '1'),
(238, 'Yemen', 'YE', '1'),
(239, 'Mayotte', 'YT', '1'),
(240, 'Yugoslavia', 'YU', '1'),
(241, 'South Africa', 'ZA', '1'),
(242, 'Zambia', 'ZM', '1'),
(243, 'Zaire', 'ZR', '1'),
(244, 'Zimbabwe', 'ZW', '1');

-- --------------------------------------------------------

--
-- Table structure for table `doc_categories`
--

CREATE TABLE IF NOT EXISTS `doc_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_cat_name` varchar(255) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `status_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `valid_countries` text,
  `status_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `prod_categories`
--

CREATE TABLE IF NOT EXISTS `prod_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_cat_name` varchar(255) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `status_id` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `user_id` int(11) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`,`rating`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Inactive'),
(2, 'Active'),
(3, 'Deleted');

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
