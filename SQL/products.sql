-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 24, 2012 at 12:18 AM
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
  `product_rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_from` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime NOT NULL,
  `modified_from` varchar(20) NOT NULL,
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image`, `description`, `valid_countries`, `status_id`, `product_rating`, `created_at`, `created_from`, `created_by`, `modified_at`, `modified_from`, `modified_by`) VALUES
(1, 'Mobile_Prod_1', 1, '', 'Mobile_Prod_1', '1,2,3,4,5,6', 1, 5, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(2, 'Camera_Prod_1', 2, '', 'Camera_Prod_1', '10,202,30,50', 1, 1, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(3, 'Mobile_Prod_2', 1, '', 'Mobile_Prod_2', '1,2,3,4,5,6', 1, 0, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(4, 'Camera_Prod_2', 2, '', 'Camera_Prod_2', '10,202,30,50', 1, 0, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(5, 'Mobile_Prod_3', 1, '', 'Mobile_Prod_3', '1,2,3,4,5,6', 1, 0, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(6, 'samsung_produt_1', 14, '', 'samsung_produt_1', '1,2,3,4,5,6', 1, 5, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0),
(7, 'samsung_produt_2', 14, '', 'samsung_produt_2', '1,2,3,4,5,6', 1, 5, '2012-08-11 08:40:33', '202.53.15.132', 0, '2012-08-11 08:40:33', '192.168.30.44', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
