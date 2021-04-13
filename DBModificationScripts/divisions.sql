-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2016 at 10:50 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `region_bangladesh`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `bn_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `bn_name`, `created_at`, `updated_at`) VALUES
(1, 'Barisal', 'à¦¬à¦°à¦¿à¦¶à¦¾à¦²', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Chittagong', 'à¦šà¦Ÿà§à¦Ÿà¦—à§à¦°à¦¾à¦®', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Dhaka', 'à¦¢à¦¾à¦•à¦¾', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Khulna', 'à¦–à§à¦²à¦¨à¦¾', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Rajshahi', 'à¦°à¦¾à¦œà¦¶à¦¾à¦¹à§€', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Rangpur', 'à¦°à¦‚à¦ªà§à¦°', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Sylhet', 'à¦¸à¦¿à¦²à§‡à¦Ÿ', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Mymensingh', 'à¦®à¦¯à¦¼à¦®à¦¨à¦¸à¦¿à¦‚à¦¹', '2016-04-06 10:46:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;