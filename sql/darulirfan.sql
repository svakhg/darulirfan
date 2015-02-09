-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2015 at 08:06 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

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
-- Table structure for table `acc_group`
--

CREATE TABLE IF NOT EXISTS `acc_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Group_Name` varchar(500) NOT NULL,
  `Group_Type` int(11) NOT NULL,
  `Group_Status` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `acc_group`
--

INSERT INTO `acc_group` (`id`, `Group_Name`, `Group_Type`, `Group_Status`, `create_date`, `modified_date`) VALUES
(1, 'Asset: Current (AC)', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Cash at Bank', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Cash in Hand', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Labour Charge', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Salary/ Bonus', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Entertainment', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Student Fees', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Donation', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Jamanat', 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `acc_group_type`
--

CREATE TABLE IF NOT EXISTS `acc_group_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(600) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `acc_group_type`
--

INSERT INTO `acc_group_type` (`id`, `name`) VALUES
(1, 'I'),
(2, 'E'),
(3, 'L'),
(4, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `acc_ledger`
--

CREATE TABLE IF NOT EXISTS `acc_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `group_id` int(11) NOT NULL,
  `acc_group_type_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_student` tinyint(1) NOT NULL,
  `is_employee` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `acc_ledger`
--

INSERT INTO `acc_ledger` (`id`, `name`, `group_id`, `acc_group_type_id`, `status`, `is_student`, `is_employee`, `create_date`, `modified_date`) VALUES
(1, 'Cash in Hand', 3, 0, 1, 0, 0, '2014-11-30 00:00:00', '0000-00-00 00:00:00'),
(2, 'Islamic Bank (54165564)', 2, 0, 1, 0, 0, '2014-11-30 00:00:00', '0000-00-00 00:00:00'),
(3, 'Student Fees', 7, 2, 1, 0, 0, '2014-11-30 00:00:00', '0000-00-00 00:00:00'),
(4, 'Donation', 8, 2, 1, 0, 0, '2015-02-03 00:00:00', '0000-00-00 00:00:00'),
(5, 'Office Entertainment', 6, 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Eastern Bank (65645644)', 2, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`) VALUES
(1, 'One'),
(2, 'Two'),
(3, 'Three'),
(4, 'Four'),
(5, 'Five');

-- --------------------------------------------------------

--
-- Table structure for table `columns`
--

CREATE TABLE IF NOT EXISTS `columns` (
  `colId` int(11) NOT NULL AUTO_INCREMENT,
  `tableId` int(11) NOT NULL,
  `isForm` tinyint(1) NOT NULL,
  `isGrid` tinyint(1) NOT NULL,
  `isQuickSearch` tinyint(1) NOT NULL,
  `dataBind` varchar(200) NOT NULL,
  `refTableName` varchar(120) NOT NULL,
  `optionsText` varchar(50) NOT NULL,
  `optionsValue` varchar(50) NOT NULL,
  `colName` varchar(50) NOT NULL,
  `isPk` tinyint(1) NOT NULL,
  `ai` tinyint(1) NOT NULL,
  `dataType` varchar(20) NOT NULL,
  `size` int(11) NOT NULL,
  `isNull` tinyint(1) NOT NULL,
  `orderNo` int(11) NOT NULL,
  PRIMARY KEY (`colId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `columns`
--

INSERT INTO `columns` (`colId`, `tableId`, `isForm`, `isGrid`, `isQuickSearch`, `dataBind`, `refTableName`, `optionsText`, `optionsValue`, `colName`, `isPk`, `ai`, `dataType`, `size`, `isNull`, `orderNo`) VALUES
(13, 30, 0, 0, 0, '', '', '', '', 'NavigationId', 1, 1, 'int', 100, 0, 0),
(14, 30, 1, 1, 1, '', '', '', '', 'NavName', 0, 0, 'varchar', 100, 0, 2),
(15, 30, 1, 1, 0, '', '', '', '', 'NavOrder', 0, 0, 'int', 0, 0, 3),
(16, 30, 1, 1, 0, '', '', '', '', 'ActionPath', 0, 0, 'varchar', 100, 0, 4),
(17, 30, 1, 1, 1, '', 'Navigations', 'NavName', 'NavigationId', 'ParentNavId', 0, 0, 'int', 0, 1, 4),
(18, 31, 0, 0, 0, '', '', '', '', 'RoleId', 1, 1, 'int', 0, 0, 0),
(19, 31, 1, 1, 1, '', '', '', '', 'RoleName', 0, 0, 'varchar', 50, 0, 0),
(20, 31, 1, 1, 1, '', 'Navigations', 'NavName', 'NavigationId', 'NavigationId', 0, 0, 'int', 0, 1, 0),
(21, 31, 1, 1, 0, '', '', '', '', 'IsRead', 0, 0, 'boolean', 0, 0, 0),
(22, 31, 1, 1, 0, '', '', '', '', 'IsInsert', 0, 0, 'boolean', 0, 0, 0),
(23, 31, 1, 1, 0, '', '', '', '', 'IsUpdate', 0, 0, 'boolean', 0, 0, 0),
(24, 31, 1, 1, 0, '', '', '', '', 'IsDelete', 0, 0, 'boolean', 0, 0, 0),
(25, 32, 0, 0, 0, '', '', '', '', 'UserId', 1, 1, 'int', 0, 0, 1),
(26, 32, 1, 1, 1, '', '', '', '', 'UserName', 0, 0, 'varchar', 100, 0, 4),
(27, 32, 1, 1, 1, '', '', '', '', 'FirstName', 0, 0, 'varchar', 50, 0, 0),
(28, 32, 1, 1, 1, '', '', '', '', 'LastName', 0, 0, 'varchar', 50, 0, 6),
(29, 32, 1, 0, 0, '', '', '', '', 'Password', 0, 0, 'varchar', 100, 0, 5),
(30, 32, 1, 1, 1, '', '', '', '', 'Email', 0, 0, 'varchar', 100, 0, 6),
(31, 32, 1, 1, 1, '', 'Roles', 'RoleName', 'RoleId', 'Role', 0, 0, 'int', 0, 0, 7),
(32, 32, 1, 1, 1, '', '', '', '', 'IsActive', 0, 0, 'boolean', 0, 1, 8),
(33, 32, 1, 1, 1, '', 'Navigations', 'NavName', 'NavigationId', 'NavigationId', 0, 0, 'int', 0, 1, 6),
(34, 33, 0, 0, 0, '', '', '', '', 'NavgViewId', 1, 1, 'int', 0, 0, 0),
(35, 33, 1, 1, 1, '', 'Navigations', 'NavName', 'NavigationId', 'Navigations', 0, 0, 'int', 0, 0, 0),
(36, 33, 1, 1, 1, '', 'Roles', 'RoleName', 'RoleId', 'Roles', 0, 0, 'int', 0, 1, 0),
(37, 33, 1, 1, 1, '', 'Users', 'UserName', 'UserId', 'Users', 0, 0, 'int', 0, 1, 0),
(50, 38, 1, 1, 1, '', '', '', '', 'std_name', 0, 0, 'varchar', 500, 0, 1),
(51, 38, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(53, 38, 1, 1, 1, '', '', '', '', 'address', 0, 0, 'varchar', 500, 1, 8),
(56, 38, 0, 0, 0, '', '', '', '', 'create_date', 0, 0, 'dateTime', 0, 0, 9),
(57, 38, 1, 1, 1, '', 'class', 'class_name', 'id', 'class', 0, 0, 'int', 0, 0, 4),
(58, 38, 1, 1, 1, '', '', '', '', 'roll_no', 0, 0, 'int', 0, 0, 5),
(59, 38, 1, 1, 1, '', '', '', '', 'father_name', 0, 0, 'varchar', 500, 0, 2),
(60, 38, 1, 1, 1, '', '', '', '', 'mather_mobile_no', 0, 0, 'varchar', 100, 1, 7),
(61, 38, 1, 1, 1, '', '', '', '', 'father_mobile_no', 0, 0, 'varchar', 100, 1, 6),
(62, 38, 1, 1, 1, '', '', '', '', 'mother_name', 0, 0, 'varchar', 500, 1, 3),
(63, 40, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(64, 40, 1, 1, 1, '', '', '', '', 'name', 0, 0, 'varchar', 500, 0, 0),
(65, 40, 1, 1, 1, '', '', '', '', 'father_name', 0, 0, 'varchar', 500, 0, 0),
(66, 40, 1, 1, 1, '', '', '', '', 'mother_name', 0, 0, 'varchar', 500, 0, 0),
(67, 40, 1, 1, 1, '', 'designation', 'Designation_Name', 'id', 'designation', 0, 0, 'int', 0, 0, 0),
(68, 40, 1, 1, 1, '', '', '', '', 'contact_no', 0, 0, 'varchar', 100, 0, 0),
(69, 40, 1, 1, 1, '', '', '', '', 'address', 0, 0, 'varchar', 1500, 0, 0),
(70, 40, 0, 0, 0, '', '', '', '', 'created_date', 0, 0, 'dateTime', 0, 0, 0),
(71, 41, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(72, 41, 1, 1, 1, '', '', '', '', 'class_name', 0, 0, 'varchar', 500, 0, 0),
(73, 42, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(74, 42, 1, 1, 1, '', '', '', '', 'Designation_Name', 0, 0, 'varchar', 500, 0, 0),
(75, 45, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(76, 45, 1, 1, 1, '', '', '', '', 'Group_Name', 0, 0, 'varchar', 500, 0, 0),
(77, 45, 1, 1, 1, '', 'acc_group_type', 'name', 'id', 'Group_Type', 0, 0, 'int', 0, 0, 0),
(78, 47, 1, 1, 1, '', '', '', '', 'id', 1, 1, '', 0, 0, 0),
(79, 47, 1, 1, 1, '', '', '', '', 'name', 0, 0, 'varchar', 2, 0, 0),
(80, 45, 1, 1, 1, '', 'status', 'name', 'id', 'Group_Status', 0, 0, 'int', 0, 0, 0),
(83, 45, 0, 0, 0, '', '', '', '', 'create_date', 0, 0, 'dateTime', 0, 0, 0),
(84, 45, 0, 0, 0, '', '', '', '', 'modified_date', 0, 0, 'dateTime', 0, 0, 0),
(85, 48, 0, 0, 0, '', '', '', '', 'id', 1, 1, '', 0, 0, 0),
(86, 48, 1, 1, 1, '', '', '', '', 'name', 0, 0, 'varchar', 25, 0, 0),
(87, 43, 0, 0, 0, '', '', '', '', 'id', 1, 1, '', 0, 0, 0),
(88, 43, 1, 1, 1, '', '', '', '', 'name', 0, 0, 'varchar', 500, 0, 0),
(89, 43, 1, 1, 1, '', 'acc_group', 'Group_Name', 'id', 'group_id', 0, 0, 'int', 0, 0, 0),
(90, 43, 1, 1, 1, '', 'status', 'name', 'id', 'status', 0, 0, 'int', 0, 0, 0),
(91, 43, 1, 1, 1, '', '', '', '', 'create_date', 0, 0, 'dateTime', 0, 0, 0),
(92, 46, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(93, 46, 1, 1, 1, '', '', '', '', 'voucher_name', 0, 0, 'int', 0, 0, 0),
(94, 46, 1, 1, 1, '', '', '', '', 'approval', 0, 0, 'int', 0, 0, 0),
(95, 46, 0, 1, 1, '', '', '', '', 'approved_by', 0, 0, 'int', 0, 0, 0),
(96, 46, 1, 1, 0, '', '', '', '', 'description', 0, 0, 'varchar', 1500, 1, 0),
(97, 46, 0, 1, 1, '', '', '', '', 'acc_from', 0, 0, 'int', 0, 0, 0),
(98, 46, 0, 1, 1, '', '', '', '', 'acc_to', 0, 0, 'int', 0, 0, 0),
(99, 46, 0, 1, 1, '', '', '', '', 'dr_amount', 0, 0, 'int', 0, 0, 0),
(100, 46, 0, 1, 1, '', '', '', '', 'cr_amount', 0, 0, 'int', 0, 0, 0),
(101, 46, 0, 1, 1, '', '', '', '', 'customer_id', 0, 0, 'int', 0, 0, 0),
(102, 46, 0, 1, 1, '', '', '', '', 'user_id', 0, 0, 'int', 0, 0, 0),
(103, 46, 0, 1, 1, '', '', '', '', 'create_date', 0, 0, 'dateTime', 0, 0, 0),
(104, 46, 1, 1, 1, '', 'status', 'name', 'id', 'status', 0, 0, 'int', 0, 0, 0),
(105, 46, 0, 0, 0, '', '', '', '', 'modified_date', 0, 0, 'dateTime', 0, 0, 0),
(106, 46, 1, 1, 1, '', 'payment_type', 'name', 'id', 'payment_type', 0, 0, 'int', 0, 0, 0),
(107, 46, 0, 1, 1, '', '', '', '', 'total', 0, 0, 'int', 0, 0, 0),
(108, 49, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(109, 49, 1, 1, 1, '', '', '', '', 'name', 0, 0, 'varchar', 500, 0, 0),
(110, 50, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(111, 50, 1, 1, 1, '', '', '', '', 'name', 0, 0, 'varchar', 500, 0, 0),
(112, 50, 1, 1, 1, '', 'status', 'yesno', 'id', 'is_monthly', 0, 0, 'int', 0, 1, 0),
(113, 48, 0, 0, 0, '', '', '', '', 'yesno', 0, 0, 'varchar', 25, 0, 0),
(114, 51, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(115, 51, 1, 1, 1, '', 'fee_category', 'name', 'id', 'fee_category_id', 0, 0, 'int', 0, 0, 1),
(116, 51, 1, 1, 1, '', '', '', '', 'amount', 0, 0, 'int', 0, 0, 3),
(117, 51, 1, 1, 1, '', 'status', 'yesno', 'id', 'is_current', 0, 0, 'int', 0, 0, 4),
(118, 51, 1, 1, 1, '', 'class', 'class_name', 'id', 'class_id', 0, 0, 'int', 0, 1, 2),
(119, 51, 0, 0, 0, '', '', '', '', 'created', 0, 0, 'dateTime', 0, 0, 5),
(120, 51, 0, 0, 0, '', '', '', '', 'modified', 0, 0, 'dateTime', 0, 0, 6),
(121, 51, 0, 0, 0, '', '', '', '', 'user_id', 0, 0, 'int', 0, 0, 7),
(122, 52, 1, 1, 1, '', 'student', 'std_name', 'id', 'std_id', 0, 0, 'int', 0, 0, 0),
(123, 52, 0, 0, 0, '', '', '', '', 'id', 1, 1, 'int', 0, 0, 0),
(124, 52, 1, 1, 1, '', 'fee_category', 'name', 'id', 'fees_id', 0, 0, 'int', 0, 0, 0),
(125, 52, 1, 1, 1, '', 'status', 'name', 'id', 'status', 0, 0, 'int', 0, 0, 0),
(126, 52, 0, 0, 0, '', '', '', '', 'created', 0, 0, 'dateTime', 0, 0, 0),
(127, 52, 0, 0, 0, '', '', '', '', 'user_id', 0, 0, 'int', 0, 0, 0),
(128, 52, 0, 0, 0, '', '', '', '', 'modified', 0, 0, 'dateTime', 0, 0, 0),
(129, 38, 1, 1, 1, '', 'status', 'name', 'id', 'status', 0, 0, 'int', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Designation_Name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `Designation_Name`) VALUES
(1, 'Teacher'),
(2, 'Principle'),
(3, 'Staff'),
(4, 'Guard');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `mother_name` varchar(500) NOT NULL,
  `designation` int(11) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `address` varchar(1500) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `father_name`, `mother_name`, `designation`, `contact_no`, `address`, `created_date`) VALUES
(1, 'Rabia Basary', 'Unknown', 'Rokeya Begum', 1, '01686489638', 'Coxbazar, feni', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `is_current` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `fee_category_id`, `class_id`, `amount`, `is_current`, `created`, `modified`, `user_id`) VALUES
(1, 1, 1, 100, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(2, 1, 2, 200, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 1, 3, 300, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 1, 4, 400, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 2, 0, 5000, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, 3, 0, 2000, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, 4, 0, 500, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(8, 5, 0, 900, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fee_category`
--

CREATE TABLE IF NOT EXISTS `fee_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `is_monthly` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `fee_category`
--

INSERT INTO `fee_category` (`id`, `name`, `is_monthly`) VALUES
(1, 'Monthly Fee', 1),
(2, 'Hostel Fee', 1),
(3, 'Admission Fee', 2),
(4, 'Session Fee', 2),
(5, 'Transport Fee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE IF NOT EXISTS `navigations` (
  `NavigationId` int(11) NOT NULL AUTO_INCREMENT,
  `NavName` varchar(100) NOT NULL,
  `NavOrder` int(11) NOT NULL,
  `ActionPath` varchar(100) NOT NULL,
  `ParentNavId` int(11) DEFAULT NULL,
  PRIMARY KEY (`NavigationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`NavigationId`, `NavName`, `NavOrder`, `ActionPath`, `ParentNavId`) VALUES
(1, 'User', 2, 'Users', 4),
(2, 'Role', 4, 'Roles', 4),
(3, 'Navigation', 2, 'Navigations', 4),
(4, 'Authorize', 1, 'Authorize', NULL),
(5, 'Navigation View Right', 3, 'NavigViewRight', 4),
(9, 'Student', 7, 'student', NULL),
(11, 'Employee', 10, 'employee', NULL),
(12, 'Settings', 11, 'settings', NULL),
(13, 'Class', 12, 'class', 12),
(14, 'Designation', 13, 'designation', 12),
(15, 'Account Group Type', 13, 'acc_group_type', 12),
(16, 'Status', 14, 'status', 12),
(17, 'Account', 15, 'account', NULL),
(18, 'Account Group', 15, 'acc_group', 17),
(19, 'Account Ledger', 15, 'acc_ledger', 17),
(20, 'Transaction', 16, 'transaction', NULL),
(21, 'Payment Type', 16, 'payment_type', 17),
(22, 'Cash Payment', 17, 'Cash_Payment', 17),
(23, 'Fees Category', 17, 'fee_category', 17),
(24, 'Fees', 18, 'Fees', 17),
(25, 'Student Fees', 18, 'std_fees', NULL),
(26, 'Student Report', 19, 'std_report', NULL),
(27, 'Voucher', 1, 'voucher', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `navigviewright`
--

CREATE TABLE IF NOT EXISTS `navigviewright` (
  `NavgViewId` int(11) NOT NULL AUTO_INCREMENT,
  `Navigations` int(11) NOT NULL,
  `Roles` int(11) DEFAULT NULL,
  `Users` int(11) DEFAULT NULL,
  PRIMARY KEY (`NavgViewId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `navigviewright`
--

INSERT INTO `navigviewright` (`NavgViewId`, `Navigations`, `Roles`, `Users`) VALUES
(1, 1, 1, NULL),
(2, 4, 1, NULL),
(3, 5, 1, NULL),
(4, 3, 1, NULL),
(5, 2, 1, NULL),
(9, 9, 1, 3),
(11, 11, 1, NULL),
(12, 12, 1, NULL),
(13, 13, 1, NULL),
(14, 14, 1, NULL),
(15, 15, 1, NULL),
(16, 16, 1, NULL),
(17, 17, 1, NULL),
(18, 18, 1, NULL),
(19, 19, 1, NULL),
(20, 20, 1, NULL),
(21, 21, 1, NULL),
(22, 22, 1, NULL),
(23, 23, 1, NULL),
(24, 24, 1, NULL),
(25, 25, 1, NULL),
(26, 26, 1, NULL),
(27, 27, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`) VALUES
(1, 'Cash'),
(2, 'Cheque'),
(3, 'Bank Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `RoleId` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(50) NOT NULL,
  `NavigationId` int(11) NOT NULL,
  `IsRead` tinyint(1) NOT NULL,
  `IsInsert` tinyint(1) NOT NULL,
  `IsUpdate` tinyint(1) NOT NULL,
  `IsDelete` tinyint(1) NOT NULL,
  PRIMARY KEY (`RoleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleId`, `RoleName`, `NavigationId`, `IsRead`, `IsInsert`, `IsUpdate`, `IsDelete`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 1),
(2, 'user', 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `yesno` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `yesno`) VALUES
(1, 'Active', 'Yes'),
(2, 'Inactive', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `std_fees`
--

CREATE TABLE IF NOT EXISTS `std_fees` (
  `std_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fees_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `std_fees`
--

INSERT INTO `std_fees` (`std_id`, `id`, `fees_id`, `status`, `created`, `user_id`, `modified`) VALUES
(3, 8, 2, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 15, 3, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(1, 16, 5, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 17, 5, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `std_fee_report`
--

CREATE TABLE IF NOT EXISTS `std_fee_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `fees_id` int(11) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Dumping data for table `std_fee_report`
--

INSERT INTO `std_fee_report` (`id`, `std_id`, `fees_id`, `fee_category_id`, `month`, `year`, `amount`, `created`, `modified`, `user_id`, `is_active`) VALUES
(139, 3, 0, 2, 'December', 2014, 5000, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(140, 1, 0, 5, 'December', 2014, 900, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 1),
(141, 1, 0, 1, 'December', 2014, 100, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(142, 2, 0, 1, 'December', 2014, 200, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(143, 3, 0, 1, 'December', 2014, 300, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(144, 4, 0, 1, 'December', 2014, 400, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(145, 3, 0, 2, 'February', 2015, 5000, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(146, 1, 0, 5, 'February', 2015, 900, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 1),
(147, 1, 0, 1, 'February', 2015, 100, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(148, 2, 0, 1, 'February', 2015, 200, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(149, 3, 0, 1, 'February', 2015, 300, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(150, 4, 0, 1, 'February', 2015, 400, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(500) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `mother_name` varchar(500) NOT NULL,
  `class` int(11) DEFAULT NULL,
  `roll_no` int(11) NOT NULL,
  `father_mobile_no` varchar(100) NOT NULL,
  `mother_mobile_no` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `std_name`, `father_name`, `mother_name`, `class`, `roll_no`, `father_mobile_no`, `mother_mobile_no`, `address`, `create_date`, `status`) VALUES
(1, 'Mehdi Hasan', 'Babul Ahmed', 'Rokeya Begum', 2, 2, '01686489638', '01684896853', 'Feni, Bd', '0000-00-00 00:00:00', 1),
(2, 'Rabia Basary', 'Unknown', 'Rokeya Begum', 1, 1, '01686489638', '0125689956', 'Coxbazar, Ctg', '0000-00-00 00:00:00', 1),
(3, 'Raihan Ahmed', 'Babul Ahmed', 'Rokeya Begum', 3, 1, '5645', '541650145', 'Feni, BD', '0000-00-00 00:00:00', 1),
(4, 'Imran Ahmed', 'unknown', '', 4, 4, '4522', '45254', 'feni.bd', '0000-00-00 00:00:00', 1),
(5, 'sdf', 'sdf', 'sd', 0, 0, '', '', '', '0000-00-00 00:00:00', 0),
(6, 'sd', 'sdf', 'sdf', 0, 0, '', '', '', '0000-00-00 00:00:00', 0),
(7, 'sdf', 'sdfs', 'df', 0, 0, '', '', '', '0000-00-00 00:00:00', 0),
(8, 'sdf', 'sdf', 'sdf', 0, 0, '', '', '', '0000-00-00 00:00:00', 0),
(9, 'sdf', 'sdf', 'sdf', 0, 0, '', '', '', '0000-00-00 00:00:00', 0),
(10, 'sdf', 'sdf', 'sdf', 0, 0, '', '', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `synctables`
--

CREATE TABLE IF NOT EXISTS `synctables` (
  `TableName` varchar(100) NOT NULL,
  PRIMARY KEY (`TableName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `synctables`
--

INSERT INTO `synctables` (`TableName`) VALUES
('acc-group'),
('acc-group-type'),
('acc-ledger'),
('acc_group'),
('acc_group_type'),
('acc_ledger'),
('class'),
('department'),
('designation'),
('employee'),
('Fees'),
('fee_category'),
('Navigations'),
('NavigViewRight'),
('payment_type'),
('Roles'),
('status'),
('std_fees'),
('student'),
('transaction'),
('Users');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `tableId` int(11) NOT NULL AUTO_INCREMENT,
  `tableName` varchar(100) NOT NULL,
  PRIMARY KEY (`tableId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`tableId`, `tableName`) VALUES
(30, 'Navigations'),
(31, 'Roles'),
(32, 'Users'),
(33, 'NavigViewRight'),
(38, 'student'),
(40, 'employee'),
(41, 'class'),
(42, 'designation'),
(43, 'acc_ledger'),
(44, 'customer'),
(45, 'acc_group'),
(46, 'transaction'),
(47, 'acc_group_type'),
(48, 'status'),
(49, 'payment_type'),
(50, 'fee_category'),
(51, 'Fees'),
(52, 'std_fees');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `acc_group_id` int(11) NOT NULL,
  `ledger_id` int(11) NOT NULL,
  `debit` float NOT NULL,
  `credit` float NOT NULL,
  `description` text NOT NULL,
  `voucher_type` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `student_id`, `acc_group_id`, `ledger_id`, `debit`, `credit`, `description`, `voucher_type`, `voucher_id`, `created_by`, `created`, `modified`, `modified_by`) VALUES
(1, 0, 2, 6, 1500, 0, 'sdf', 3, 8120212, 2, '2015-02-07 18:31:12', '0000-00-00 00:00:00', 0),
(2, 0, 2, 1, 0, 1500, 'sdf', 3, 8120212, 2, '2015-02-07 18:31:12', '0000-00-00 00:00:00', 0),
(3, 0, 2, 1, 1000, 0, 'sdf', 4, 8120228, 2, '2015-02-07 18:31:28', '0000-00-00 00:00:00', 0),
(4, 0, 2, 6, 0, 1000, 'sdf', 4, 8120228, 2, '2015-02-07 18:31:28', '0000-00-00 00:00:00', 0),
(5, 0, 2, 2, 10000, 0, 'sdf', 3, 8120247, 2, '2015-02-07 18:31:47', '0000-00-00 00:00:00', 0),
(6, 0, 2, 1, 0, 10000, 'sdf', 3, 8120247, 2, '2015-02-07 18:31:47', '0000-00-00 00:00:00', 0),
(7, 0, 2, 1, 1000, 0, 'sdf', 4, 8120201, 2, '2015-02-07 18:32:01', '0000-00-00 00:00:00', 0),
(8, 0, 2, 2, 0, 1000, 'sdf', 4, 8120201, 2, '2015-02-07 18:32:01', '0000-00-00 00:00:00', 0),
(9, 0, 2, 1, 1000, 0, 'sdf', 4, 8120226, 2, '2015-02-07 18:35:26', '0000-00-00 00:00:00', 0),
(10, 0, 2, 2, 0, 1000, 'sdf', 4, 8120226, 2, '2015-02-07 18:35:26', '0000-00-00 00:00:00', 0),
(11, 0, 7, 3, 1000, 0, '103255', 1, 8120250, 2, '2015-02-07 18:39:50', '0000-00-00 00:00:00', 0),
(12, 0, 7, 1, 0, 1000, '103255', 1, 8120250, 2, '2015-02-07 18:39:50', '0000-00-00 00:00:00', 0),
(13, 0, 6, 1, 100, 0, 'sdfs', 2, 8120200, 2, '2015-02-07 18:40:00', '0000-00-00 00:00:00', 0),
(14, 0, 6, 5, 0, 100, 'sdfs', 2, 8120200, 2, '2015-02-07 18:40:00', '0000-00-00 00:00:00', 0),
(15, 0, 2, 2, 10000, 0, 'sdfs', 3, 8120210, 2, '2015-02-07 18:40:10', '0000-00-00 00:00:00', 0),
(16, 0, 2, 1, 0, 10000, 'sdfs', 3, 8120210, 2, '2015-02-07 18:40:10', '0000-00-00 00:00:00', 0),
(17, 0, 2, 1, 1000, 0, 'sdfs', 4, 8120219, 2, '2015-02-07 18:40:19', '0000-00-00 00:00:00', 0),
(18, 0, 2, 2, 0, 1000, 'sdfs', 4, 8120219, 2, '2015-02-07 18:40:19', '0000-00-00 00:00:00', 0),
(19, 0, 2, 6, 10000, 0, 'sdfs', 3, 8120208, 2, '2015-02-07 18:41:08', '0000-00-00 00:00:00', 0),
(20, 0, 2, 1, 0, 10000, 'sdfs', 3, 8120208, 2, '2015-02-07 18:41:08', '0000-00-00 00:00:00', 0),
(21, 0, 2, 1, 1000, 0, 'sdfs', 4, 8120216, 2, '2015-02-07 18:41:16', '0000-00-00 00:00:00', 0),
(22, 0, 2, 6, 0, 1000, 'sdfs', 4, 8120216, 2, '2015-02-07 18:41:16', '0000-00-00 00:00:00', 0),
(23, 0, 7, 3, 1520, 0, 'skdjf', 1, 8120221, 2, '2015-02-07 18:43:21', '0000-00-00 00:00:00', 0),
(24, 0, 7, 1, 0, 1520, 'skdjf', 1, 8120221, 2, '2015-02-07 18:43:21', '0000-00-00 00:00:00', 0),
(25, 0, 6, 1, 520, 0, 'kldjf', 2, 8120241, 2, '2015-02-07 18:43:41', '0000-00-00 00:00:00', 0),
(26, 0, 6, 5, 0, 520, 'kldjf', 2, 8120241, 2, '2015-02-07 18:43:41', '0000-00-00 00:00:00', 0),
(27, 0, 7, 3, 45, 0, 'dsf', 1, 8120249, 2, '2015-02-07 18:47:49', '0000-00-00 00:00:00', 0),
(28, 0, 7, 1, 0, 45, 'dsf', 1, 8120249, 2, '2015-02-07 18:47:49', '0000-00-00 00:00:00', 0),
(29, 0, 8, 4, 546, 0, 'asd', 1, 8120237, 2, '2015-02-07 18:51:37', '0000-00-00 00:00:00', 0),
(30, 0, 8, 1, 0, 546, 'asd', 1, 8120237, 2, '2015-02-07 18:51:37', '0000-00-00 00:00:00', 0),
(31, 0, 7, 3, 456, 0, 'fas', 1, 8120229, 2, '2015-02-07 18:54:29', '0000-00-00 00:00:00', 0),
(32, 0, 7, 1, 0, 456, 'fas', 1, 8120229, 2, '2015-02-07 18:54:29', '0000-00-00 00:00:00', 0),
(33, 0, 6, 1, 854, 0, 'sdf', 2, 8120252, 2, '2015-02-07 18:55:52', '0000-00-00 00:00:00', 0),
(34, 0, 6, 5, 0, 854, 'sdf', 2, 8120252, 2, '2015-02-07 18:55:52', '0000-00-00 00:00:00', 0),
(35, 0, 8, 4, 5464, 0, 'ytuj', 1, 8010214, 2, '2015-02-07 19:10:14', '0000-00-00 00:00:00', 0),
(36, 0, 8, 1, 0, 5464, 'ytuj', 1, 8010214, 2, '2015-02-07 19:10:14', '0000-00-00 00:00:00', 0),
(37, 0, 6, 1, 150, 0, 'print', 2, 8070242, 2, '2015-02-08 01:37:42', '0000-00-00 00:00:00', 0),
(38, 0, 6, 5, 0, 150, 'print', 2, 8070242, 2, '2015-02-08 01:37:42', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_old`
--

CREATE TABLE IF NOT EXISTS `transaction_old` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `cr_amount` int(11) NOT NULL,
  `dr_amount` int(11) NOT NULL,
  `acc_to` int(11) NOT NULL,
  `acc_from` int(11) NOT NULL,
  `description` varchar(1500) DEFAULT NULL,
  `approved_by` int(11) NOT NULL,
  `approval` int(11) NOT NULL,
  `voucher_name` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `transaction_old`
--

INSERT INTO `transaction_old` (`id`, `payment_type`, `modified_date`, `status`, `create_date`, `user_id`, `customer_id`, `cr_amount`, `dr_amount`, `acc_to`, `acc_from`, `description`, `approved_by`, `approval`, `voucher_name`, `total`) VALUES
(1, 1, '0000-00-00 00:00:00', 1, NULL, 0, 0, 0, 0, 0, 0, 'sdfs', 0, 1, 1234, 0),
(2, 0, '0000-00-00 00:00:00', 0, NULL, 2, 2, 200, 0, 8, 1, 'Rabia Basary, December', 0, 0, 0, 200),
(3, 0, '0000-00-00 00:00:00', 0, NULL, 2, 2, 200, 0, 8, 1, 'Rabia Basary, February', 0, 0, 0, 200),
(4, 0, '0000-00-00 00:00:00', 0, NULL, 2, 1, 100, 0, 8, 1, 'Rabia Basary, December', 0, 0, 0, 100),
(5, 0, '0000-00-00 00:00:00', 0, NULL, 2, 1, 100, 0, 8, 1, 'Rabia Basary, February', 0, 0, 0, 100),
(6, 0, '0000-00-00 00:00:00', 0, NULL, 2, 3, 5000, 0, 8, 2, 'Office Entertainment, December', 0, 0, 0, 5000),
(7, 0, '0000-00-00 00:00:00', 0, NULL, 2, 3, 300, 0, 8, 1, 'Rabia Basary, December', 0, 0, 0, 300),
(8, 0, '0000-00-00 00:00:00', 0, NULL, 2, 3, 5000, 0, 8, 2, 'Office Entertainment, February', 0, 0, 0, 5000),
(9, 0, '0000-00-00 00:00:00', 0, NULL, 2, 3, 300, 0, 8, 1, 'Rabia Basary, February', 0, 0, 0, 300),
(10, 0, '0000-00-00 00:00:00', 0, NULL, 2, 4, 400, 0, 8, 1, 'Rabia Basary, December', 0, 0, 0, 400),
(11, 0, '0000-00-00 00:00:00', 0, NULL, 2, 4, 400, 0, 8, 1, 'Rabia Basary, February', 0, 0, 0, 400);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Role` int(11) NOT NULL,
  `NavigationId` int(11) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserName`, `Password`, `FirstName`, `LastName`, `Email`, `Role`, `NavigationId`, `IsActive`, `UserId`) VALUES
('admin', 'admin', 'jasim', 'jasimff', 'jasim@email.com', 1, NULL, 1, 2),
('user', 'user', 'user', 'user', 'user@gmail.com', 2, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `voucher_type`
--

CREATE TABLE IF NOT EXISTS `voucher_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `acc_group_type_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `voucher_type`
--

INSERT INTO `voucher_type` (`id`, `name`, `acc_group_type_id`, `created`, `user_id`) VALUES
(1, 'Cash Payment', 2, '2015-02-05 17:36:45', 1),
(2, 'Cash Receipt', 1, '2015-02-05 17:36:56', 1),
(3, 'Bank Payment', 2, '2015-02-05 17:37:11', 1),
(4, 'Bank Receipt', 1, '2015-02-05 17:37:11', 1),
(5, 'Journal Voucher', 0, '2015-02-05 17:37:22', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
