-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2015 at 08:15 AM
-- Server version: 5.5.41-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `darulirfan`
--

-- --------------------------------------------------------

--
-- Table structure for table `fees_category`
--

CREATE TABLE IF NOT EXISTS `fees_category` (
`id` int(11) NOT NULL,
  `fee_category` varchar(500) NOT NULL,
  `mother_fee_category` int(11) NOT NULL,
  `description` text NOT NULL,
  `fee_type` tinyint(1) NOT NULL COMMENT '1-monthly, 2-yearly 3-one time',
  `residential` float NOT NULL,
  `non_residential` float NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1-active,2-inactive, 3-deleted',
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `fees_category`
--

INSERT INTO `fees_category` (`id`, `fee_category`, `mother_fee_category`, `description`, `fee_type`, `residential`, `non_residential`, `status`, `user_id`, `created`) VALUES
(1, 'Monthly Fee', 0, '', 1, 8200, 6100, 1, 0, '0000-00-00 00:00:00'),
(3, 'Admission Fee', 0, '', 3, 7000, 7000, 1, 0, '0000-00-00 00:00:00'),
(4, 'Session Fee', 0, '', 2, 7000, 7000, 1, 0, '0000-00-00 00:00:00'),
(7, 'Computer Lab', 0, '', 2, 600, 600, 1, 0, '2015-03-08 02:01:37'),
(8, 'Other', 0, 'ID card, Cultural Festival, Result card, Sport etc. ', 2, 1000, 1000, 1, 0, '2015-03-08 17:00:08'),
(9, 'Food', 1, '3 Meal', 1, 2500, 1800, 1, 0, '2015-03-17 01:53:15'),
(10, 'Teffin', 1, '4 Times', 1, 900, 800, 1, 0, '2015-03-17 01:53:50'),
(11, 'Tution Fee', 1, '', 1, 2000, 2000, 1, 0, '2015-03-17 01:54:16'),
(12, 'Hostel Fee', 1, '', 1, 1800, 500, 1, 0, '2015-03-17 01:54:45'),
(13, 'Stablishment Fee', 1, 'House rent, Telephone, Water, Electricity, Gas, AC, IPS etc', 1, 1000, 1000, 1, 0, '2015-03-17 01:56:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fees_category`
--
ALTER TABLE `fees_category`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fees_category`
--
ALTER TABLE `fees_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
