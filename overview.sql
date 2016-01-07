-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2016 at 06:05 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `overview`
--

CREATE TABLE IF NOT EXISTS `overview` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `revenue_per_month` varchar(255) NOT NULL,
  `average_order` varchar(255) NOT NULL,
  `conversion_rate` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `search_term_1` varchar(255) NOT NULL,
  `search_term_2` varchar(255) NOT NULL,
  `search_term_3` varchar(255) NOT NULL,
  `search_term_4` varchar(255) NOT NULL,
  `search_term_5` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `overview`
--

INSERT INTO `overview` (`id`, `revenue_per_month`, `average_order`, `conversion_rate`, `url`, `email`, `newsletter`, `search_term_1`, `search_term_2`, `search_term_3`, `search_term_4`, `search_term_5`) VALUES
(1, '1000', '10', '10', 'http://www.cool.com', 'marexsu@gmail.com', 1, 'cool', 'nice', '', 'sunny', ''),
(2, '1200', '150', '12', 'https://www.youtube.com/', 'marexsu@gmail.com', 0, 'youtube', 'video', '', '', ''),
(3, '800', '80', '15', 'https://www.google.com', 'marexsu@gmail.com', 0, 'google', '', '', '', ''),
(4, '1600', '50', '12', 'https://www.google.com', 'marexsu@gmail.com', 0, 'google', '', '', '', ''),
(5, '2200', '20', '12', 'https://www.google.com', 'marexsu@gmail.com', 0, 'google', '', 'google', '', ''),
(6, '2200', '20', '12', 'https://www.netherlands.com', 'marexsu@gmail.com', 0, 'google', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
