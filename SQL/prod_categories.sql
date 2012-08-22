-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 22, 2012 at 07:40 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `prod_categories`
--

INSERT INTO `prod_categories` (`id`, `prod_cat_name`, `parent_cat_id`, `status_id`, `created_at`, `created_from`, `created_by`, `modified_at`, `modified_from`, `modified_by`) VALUES
(1, 'Mobiles', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
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
(13, 'Sports ', 0, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(14, 'Nokia', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(15, 'Samsung', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(16, 'Blackberry', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(17, 'Sony Erricson', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(18, 'Iphone', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
