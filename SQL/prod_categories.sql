-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2012 at 09:53 AM
-- Server version: 5.1.63
-- PHP Version: 5.3.6-13ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sample`
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `prod_categories`
--

INSERT INTO `prod_categories` (`id`, `prod_cat_name`, `parent_cat_id`, `status_id`) VALUES
(1, 'Mobiles ', 0, 2),
(2, 'Cameras ', 0, 2),
(3, 'Computers ', 0, 2),
(4, 'Gadgets ', 0, 2),
(5, 'Automobiles ', 0, 2),
(6, 'Kitchen ', 0, 2),
(7, 'Jewellery ', 0, 2),
(8, 'Gifts ', 0, 2),
(9, 'Fashion ', 0, 2),
(10, 'Health ', 0, 2),
(11, 'Home Decor ', 0, 2),
(12, 'Apparel', 0, 2),
(13, 'Sports ', 0, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
