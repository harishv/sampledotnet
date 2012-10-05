-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2012 at 09:30 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.10-1ubuntu3.4

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
  `doc_title` varchar(100) NOT NULL,
  `access_key` varchar(100) NOT NULL COMMENT 'scribd access key',
  `secret_password` varchar(100) NOT NULL,
  `pdfdoc_category` int(5) NOT NULL,
  `access` varchar(10) NOT NULL,
  `thumbnail_url` varchar(300) NOT NULL,
  `uploaded_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `scribd_documents`
--

INSERT INTO `scribd_documents` (`id`, `doc_id`, `doc_title`, `access_key`, `secret_password`, `pdfdoc_category`, `access`, `thumbnail_url`, `uploaded_date`) VALUES
(1, 108468291, 'Tes', 'key-1lo535vr36ubbx7daplm', 'dpbo0bowcqs2xkmauj7', 3, 'private', 'http://imgv2-3.scribdassets.com/img/word_document/108468291/111x142/6e6e78c65e/1349013626', '2012-09-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
