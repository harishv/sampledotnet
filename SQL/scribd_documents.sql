-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2012 at 11:48 AM
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
