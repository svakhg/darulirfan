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
-- Table structure for table `acc_group`
--

CREATE TABLE IF NOT EXISTS `acc_group` (
`id` int(11) NOT NULL,
  `group_name` varchar(500) NOT NULL,
  `group_type` int(11) NOT NULL,
  `group_status` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `acc_group`
--

INSERT INTO `acc_group` (`id`, `group_name`, `group_type`, `group_status`, `create_date`, `modified_date`) VALUES
(1, 'Asset: Current (AC)', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Cash at Bank', 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Cash in Hand', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Labour Charge', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Salary/ Bonus', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Entertainment', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Student Fees', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Donation', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Jamanat', 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Dining', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `acc_group_type`
--

CREATE TABLE IF NOT EXISTS `acc_group_type` (
`id` int(11) NOT NULL,
  `name` varchar(600) NOT NULL
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
`id` int(11) NOT NULL,
  `ledger_id` varchar(15) NOT NULL,
  `name` varchar(500) NOT NULL,
  `group_id` int(11) NOT NULL,
  `acc_group_type_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_student` tinyint(1) DEFAULT NULL,
  `is_employee` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `acc_ledger`
--

INSERT INTO `acc_ledger` (`id`, `ledger_id`, `name`, `group_id`, `acc_group_type_id`, `status`, `is_student`, `is_employee`, `create_date`, `modified_date`, `user_id`) VALUES
(1, '1', 'Cash in Hand', 3, 0, 1, 0, 0, '2014-11-29 18:00:00', '0000-00-00 00:00:00', 0),
(2, '2', 'Islamic Bank (54165564)', 2, 0, 1, 0, 0, '2014-11-29 18:00:00', '0000-00-00 00:00:00', 0),
(3, '3', 'Student Fees', 7, 2, 1, 0, 0, '2014-11-29 18:00:00', '0000-00-00 00:00:00', 0),
(4, '4', 'Donation', 8, 2, 1, 0, 0, '2015-02-02 18:00:00', '0000-00-00 00:00:00', 0),
(5, '5', 'Office Entertainment', 6, 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(6, '6', 'Eastern Bank (65645644)', 2, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(7, '7', 'Marketing', 10, 0, 1, 0, 0, '2015-02-03 18:00:00', '0000-00-00 00:00:00', 0),
(8, 'M15001', 'sdf', 7, 0, 1, 1, NULL, '2015-03-11 01:38:04', '0000-00-00 00:00:00', 2),
(9, 'E15004', 'sdf', 5, 0, 1, NULL, 1, '2015-03-11 01:53:46', '0000-00-00 00:00:00', 2),
(10, 'M15004', 'Mehdi Hasan sdf', 7, 0, 1, 1, NULL, '2015-03-16 18:03:26', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`id` int(11) NOT NULL,
  `class_name` varchar(500) NOT NULL
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
`colId` int(11) NOT NULL,
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
  `orderNo` int(11) NOT NULL
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
`id` int(11) NOT NULL,
  `Designation_Name` varchar(500) NOT NULL
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
`id` int(11) NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `emp_name` varchar(500) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `mother_name` varchar(500) NOT NULL,
  `designation` int(11) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `present_address` varchar(1500) NOT NULL,
  `permanent_address` text NOT NULL,
  `emergency_address` text NOT NULL,
  `remarks` text NOT NULL,
  `residential_status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1- residential, 2- non-residential',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL COMMENT '1-active, 2- inactive, 3- blocked',
  `salary_amount` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `emp_name`, `gender`, `father_name`, `mother_name`, `designation`, `contact_no`, `present_address`, `permanent_address`, `emergency_address`, `remarks`, `residential_status`, `created_date`, `status`, `salary_amount`, `user_id`) VALUES
(3, 'E15001', 'Rabia Basary', 1, 'sdf', 'sdf', 1, '01686489638', 'sdf', 'sdf', 'sdf', 'sdf', 1, '2015-02-18 17:15:00', 1, 1500, 0),
(5, 'E15002', 'Raihan Ahmed', 1, 'sdfkj', 'sdjfl', 2, '01686489638', 'jskldjf', 'lsjdfl', 'ljsdfk', 'sdf', 1, '2015-02-18 17:35:50', 1, 5000, 0),
(6, 'E15003', 'Mehedi Hasan', 1, 'df', 'sdf', 3, '01686489638', 'sdf', 'sdf', 'sdf', 'sdf', 1, '2015-02-18 17:42:06', 1, 15200, 0),
(7, 'E15004', 'sdf', 1, 'sdf', 'sdf', 2, '8798', 'sdf', '', '', '', 1, '2015-03-11 01:53:46', 1, 5000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_report`
--

CREATE TABLE IF NOT EXISTS `employee_salary_report` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `emp_name` varchar(200) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `datetime` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1-paid 0-unpaid',
  `amount` float NOT NULL,
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary_report`
--

INSERT INTO `employee_salary_report` (`id`, `emp_id`, `emp_name`, `month`, `year`, `datetime`, `status`, `amount`, `remarks`, `created`, `created_by`) VALUES
(1, 'E15003', 'Mehedi Hasan', '2', 2014, '', 0, 1200, ' sdfsdf', '2015-02-19 12:47:04', 0),
(2, 'E15002', 'Raihan Ahmed', '2', 2014, '', 1, 5000, 'sdf', '2015-02-19 12:47:04', 0),
(3, 'E15001', 'Rabia Basary', '2', 2014, '', 1, 1500, 'sdf', '2015-02-19 12:47:04', 0),
(4, 'E15003', 'Mehedi Hasan', '1', 2015, '', 0, 15200, 'sdf', '2015-02-19 12:49:40', 0),
(5, 'E15002', 'Raihan Ahmed', '1', 2015, '', 0, 5000, 'sdf', '2015-02-19 12:49:40', 0),
(6, 'E15001', 'Rabia Basary', '1', 2015, '', 0, 1500, 'sdf', '2015-02-19 12:49:40', 0),
(7, 'E15003', 'Mehedi Hasan', '2', 2015, '', 1, 15200, 'sdf', '2015-02-19 12:50:44', 0),
(8, 'E15002', 'Raihan Ahmed', '2', 2015, '', 1, 5000, '', '2015-02-19 12:50:44', 0),
(9, 'E15001', 'Rabia Basary', '2', 2015, '', 1, 1500, '', '2015-02-19 12:50:44', 0),
(10, 'E15003', 'Mehedi Hasan', '1', 2014, '', 0, 15200, '', '2015-02-19 12:51:54', 0),
(11, 'E15002', 'Raihan Ahmed', '1', 2014, '', 0, 5000, '', '2015-02-19 12:51:54', 0),
(12, 'E15001', 'Rabia Basary', '1', 2014, '', 0, 1500, '', '2015-02-19 12:51:54', 0),
(13, 'E15003', 'Mehedi Hasan', '3', 2015, '', 1, 15200, '', '2015-03-03 12:17:46', 0),
(14, 'E15002', 'Raihan Ahmed', '3', 2015, '', 1, 5000, '', '2015-03-03 12:17:46', 0),
(15, 'E15001', 'Rabia Basary', '3', 2015, '', 1, 1500, '', '2015-03-03 12:17:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
`id` int(11) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `is_current` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE IF NOT EXISTS `navigations` (
`NavigationId` int(11) NOT NULL,
  `NavName` varchar(100) NOT NULL,
  `NavOrder` int(11) NOT NULL,
  `ActionPath` varchar(100) NOT NULL,
  `ParentNavId` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

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
(24, 'Salary Sheet', 18, 'employee/salary_sheet', 17),
(25, 'Student Fees', 18, 'std_fees', 9),
(26, 'Student Report', 19, 'student', 30),
(27, 'Voucher', 1, 'voucher', NULL),
(28, 'Ledger Book', 2, 'ledger_book', NULL),
(29, 'Student Info', 19, 'student', 9),
(30, 'Report', 4, 'report', NULL),
(31, 'Individual Ledger Report', 6, 'ledger_report', 30);

-- --------------------------------------------------------

--
-- Table structure for table `navigviewright`
--

CREATE TABLE IF NOT EXISTS `navigviewright` (
`NavgViewId` int(11) NOT NULL,
  `Navigations` int(11) NOT NULL,
  `Roles` int(11) DEFAULT NULL,
  `Users` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

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
(27, 27, 1, 2),
(28, 28, 1, 2),
(29, 29, 1, NULL),
(30, 30, 1, NULL),
(31, 31, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
`id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
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
`RoleId` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL,
  `NavigationId` int(11) NOT NULL,
  `IsRead` tinyint(1) NOT NULL,
  `IsInsert` tinyint(1) NOT NULL,
  `IsUpdate` tinyint(1) NOT NULL,
  `IsDelete` tinyint(1) NOT NULL
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
`id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `yesno` varchar(25) NOT NULL
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
`id` int(11) NOT NULL,
  `fees_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `std_fees`
--

INSERT INTO `std_fees` (`std_id`, `id`, `fees_id`, `status`, `created`, `user_id`, `modified`) VALUES
(3, 8, 2, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 15, 3, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(1, 16, 5, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 17, 5, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `std_fee_report`
--

CREATE TABLE IF NOT EXISTS `std_fee_report` (
`id` int(11) NOT NULL,
  `std_id` varchar(11) NOT NULL,
  `fees_id` int(11) NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `payable_amount` float NOT NULL,
  `concession_amount` float NOT NULL,
  `amount` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `std_fee_report`
--

INSERT INTO `std_fee_report` (`id`, `std_id`, `fees_id`, `fee_category_id`, `month`, `year`, `payable_amount`, `concession_amount`, `amount`, `created`, `modified`, `user_id`, `is_active`) VALUES
(139, '3', 0, 2, 'December', 2014, 0, 0, 5000, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(140, 'M15001', 0, 5, 'December', 2014, 0, 0, 900, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 1),
(141, '1', 0, 1, 'December', 2014, 0, 0, 100, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(142, '2', 0, 1, 'December', 2014, 0, 0, 200, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(143, '3', 0, 1, 'December', 2014, 0, 0, 300, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(144, '4', 0, 1, 'December', 2014, 0, 0, 400, '2014-12-02 01:56:01', '0000-00-00 00:00:00', 0, 0),
(145, '3', 0, 2, 'February', 2015, 0, 0, 5000, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(146, 'M15001', 0, 5, 'February', 2015, 0, 0, 900, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 1),
(147, '1', 0, 1, 'February', 2015, 0, 0, 100, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(148, '2', 0, 1, 'February', 2015, 0, 0, 200, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(149, '3', 0, 1, 'February', 2015, 0, 0, 300, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(150, '4', 0, 1, 'February', 2015, 0, 0, 400, '2015-01-28 05:11:50', '0000-00-00 00:00:00', 0, 0),
(151, 'M15001', 0, 1, 'March', 2015, 8200, 1000, 7200, '2015-03-09 13:28:46', '0000-00-00 00:00:00', 0, 1),
(152, 'M15002', 0, 1, 'March', 2015, 6100, 123, 5977, '2015-03-09 13:28:46', '0000-00-00 00:00:00', 0, 1),
(153, 'M15001', 0, 7, 'March', 2015, 600, 0, 600, '2015-03-09 16:54:18', '0000-00-00 00:00:00', 0, 1),
(154, 'M15001', 0, 7, '', 2015, 600, 0, 600, '2015-03-09 16:58:26', '0000-00-00 00:00:00', 0, 1),
(155, 'M15001', 0, 7, '', 2015, 600, 0, 600, '2015-03-09 16:58:31', '0000-00-00 00:00:00', 0, 1),
(156, 'M15001', 0, 4, '', 2015, 7000, 0, 7000, '2015-03-09 16:59:27', '0000-00-00 00:00:00', 0, 1),
(157, 'M15001', 0, 3, '', 2015, 7000, 0, 7000, '2015-03-09 17:02:35', '0000-00-00 00:00:00', 0, 1),
(158, 'M15001', 0, 8, '', 2015, 1000, 0, 1000, '2015-03-09 17:02:48', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`id` int(11) NOT NULL,
  `std_id` varchar(15) NOT NULL,
  `std_name` varchar(500) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `mother_name` varchar(500) NOT NULL,
  `guardian_name` varchar(250) NOT NULL,
  `guardian_mobile_no` varchar(50) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `roll_no` int(11) NOT NULL,
  `father_mobile_no` varchar(100) NOT NULL,
  `mother_mobile_no` varchar(100) NOT NULL,
  `present_address` tinytext NOT NULL,
  `permanent_address` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-active, 2- inactive, 3- blocked',
  `residential_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1- residential, 2- non-residential',
  `concession_description` text NOT NULL,
  `concession_amount` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `std_id`, `std_name`, `gender`, `father_name`, `mother_name`, `guardian_name`, `guardian_mobile_no`, `class_id`, `roll_no`, `father_mobile_no`, `mother_mobile_no`, `present_address`, `permanent_address`, `create_date`, `status`, `residential_status`, `concession_description`, `concession_amount`, `user_id`) VALUES
(1, 'M15001', 'RAbia Basary', 2, 'Babul Ahmed', '4sdsd', 'sdfaws', '5465465', 2, 21, '01686489638', 'sdfsdf', 'home: Rokeya Monjil, Village: Uttar ballabpur, Thana: Chhagalnaiya, District: Feni, Country: Bangladesh. ', 'home: Rokeya Monjil, Village: Uttar ballabpur, Thana: Chhagalnaiya, District: Feni, Country: Bangladesh. ', '2015-02-15 06:35:54', 1, 1, 'sdfdf', 1000, 0),
(2, 'M15002', 'Mehdi Hasan', 1, 'sfsf', '4sdsd', 'sdfaws', '5465465', 5, 21, '546', 'sdfsdf', 'klsjdf', 'skldfjkl', '2015-02-15 06:36:20', 1, 2, 'asfd', 123, 0),
(3, 'M15003', 'sdf', 1, 'sdf', 'sdf', '', '', 1, 1, '', '', 'sdf', '', '2015-03-11 01:38:04', 1, 0, '', 0, 2),
(4, 'M15004', 'Mehdi Hasan sdf', 1, 'sdf', 'sdfsdf', 'sdfsdf', '23423', 2, 2, '345345', '23432', 'asdf', 'sdf', '2015-03-16 18:03:26', 1, 1, '', 2300, 2);

-- --------------------------------------------------------

--
-- Table structure for table `synctables`
--

CREATE TABLE IF NOT EXISTS `synctables` (
  `TableName` varchar(100) NOT NULL
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
`tableId` int(11) NOT NULL,
  `tableName` varchar(100) NOT NULL
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
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `acc_group_id` int(11) NOT NULL,
  `ledger_id` varchar(11) NOT NULL,
  `debit` float DEFAULT NULL,
  `credit` float DEFAULT NULL,
  `description` text NOT NULL,
  `voucher_type` int(11) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `date` date NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(100) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `student_id`, `acc_group_id`, `ledger_id`, `debit`, `credit`, `description`, `voucher_type`, `voucher_id`, `created_by`, `date`, `created`, `user_ip`, `modified`, `modified_by`) VALUES
(1, 0, 7, '1', 7200, NULL, 'Monthly Fee, March- 2015 (151)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(2, 0, 7, 'M15001', NULL, 7200, 'Monthly Fee, March- 2015 (151)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(3, 0, 7, '1', 100, NULL, 'Computer Lab, March- 2015 (153)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(4, 0, 7, 'M15001', NULL, 100, 'Computer Lab, March- 2015 (153)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(5, 0, 7, '1', 600, NULL, 'Computer Lab, - 2015 (154)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(6, 0, 7, 'M15001', NULL, 600, 'Computer Lab, - 2015 (154)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(7, 0, 7, '1', 600, NULL, 'Computer Lab, - 2015 (155)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(8, 0, 7, 'M15001', NULL, 600, 'Computer Lab, - 2015 (155)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(9, 0, 7, '1', 6813, NULL, 'Session Fee, - 2015 (156)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(10, 0, 7, 'M15001', NULL, 6813, 'Session Fee, - 2015 (156)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(11, 0, 7, '1', 6915, NULL, 'Admission Fee, - 2015 (157)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(12, 0, 7, 'M15001', NULL, 6915, 'Admission Fee, - 2015 (157)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(13, 0, 7, '1', 915, NULL, 'Other, - 2015 (158)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(14, 0, 7, 'M15001', NULL, 915, 'Other, - 2015 (158)', 2, 11090331, 2, '2015-03-11', '2015-03-11 03:27:31', '127.0.0.1', '0000-00-00 00:00:00', 0),
(15, 0, 6, '5', 123, NULL, 'sdf', 1, 11090341, 2, '2015-03-11', '2015-03-11 03:28:41', '127.0.0.1', '0000-00-00 00:00:00', 0),
(16, 0, 6, '1', NULL, 123, 'sdf', 1, 11090341, 2, '2015-03-11', '2015-03-11 03:28:41', '127.0.0.1', '0000-00-00 00:00:00', 0),
(17, 0, 5, '1', 1500, NULL, 'march salary', 2, 11090355, 2, '2015-03-11', '2015-03-11 03:28:55', '127.0.0.1', '0000-00-00 00:00:00', 0),
(18, 0, 5, 'E15004', NULL, 1500, 'march salary', 2, 11090355, 2, '2015-03-11', '2015-03-11 03:28:55', '127.0.0.1', '0000-00-00 00:00:00', 0),
(19, 0, 2, '2', 1500, NULL, 'Bank Theke Uttalon', 3, 11090330, 2, '2015-03-11', '2015-03-11 03:30:30', '127.0.0.1', '0000-00-00 00:00:00', 0),
(20, 0, 2, '1', NULL, 1500, 'Bank Theke Uttalon', 3, 11090330, 2, '2015-03-11', '2015-03-11 03:30:30', '127.0.0.1', '0000-00-00 00:00:00', 0),
(21, 0, 2, '1', 50000, NULL, 'Bank e Jomma', 4, 11090340, 2, '2015-03-11', '2015-03-11 03:30:40', '127.0.0.1', '0000-00-00 00:00:00', 0),
(22, 0, 2, '2', NULL, 50000, 'Bank e Jomma', 4, 11090340, 2, '2015-03-11', '2015-03-11 03:30:40', '127.0.0.1', '0000-00-00 00:00:00', 0),
(23, 0, 7, '1', 7200, NULL, 'M15001- Monthly Fee, March- 2015 (151)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:43', '127.0.0.1', '0000-00-00 00:00:00', 0),
(24, 0, 7, 'M15001', NULL, 7200, 'M15001- Monthly Fee, March- 2015 (151)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(25, 0, 7, '1', 100, NULL, 'M15001- Computer Lab, March- 2015 (153)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(26, 0, 7, 'M15001', NULL, 100, 'M15001- Computer Lab, March- 2015 (153)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(27, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, - 2015 (154)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(28, 0, 7, 'M15001', NULL, 600, 'M15001- Computer Lab, - 2015 (154)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(29, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, - 2015 (155)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(30, 0, 7, 'M15001', NULL, 600, 'M15001- Computer Lab, - 2015 (155)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(31, 0, 7, '1', 6813, NULL, 'M15001- Session Fee, - 2015 (156)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(32, 0, 7, 'M15001', NULL, 6813, 'M15001- Session Fee, - 2015 (156)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(33, 0, 7, '1', 6915, NULL, 'M15001- Admission Fee, - 2015 (157)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(34, 0, 7, 'M15001', NULL, 6915, 'M15001- Admission Fee, - 2015 (157)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(35, 0, 7, '1', 915, NULL, 'M15001- Other, - 2015 (158)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(36, 0, 7, 'M15001', NULL, 915, 'M15001- Other, - 2015 (158)', 2, 11090343, 2, '2015-03-11', '2015-03-11 03:31:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(37, 0, 0, '1', 5977, NULL, 'M15002- Monthly Fee, March- 2015 (152)', 2, 11090341, 2, '2015-03-11', '2015-03-11 03:33:41', '127.0.0.1', '0000-00-00 00:00:00', 0),
(38, 0, 0, 'M15002', NULL, 5977, 'M15002- Monthly Fee, March- 2015 (152)', 2, 11090341, 2, '2015-03-11', '2015-03-11 03:33:41', '127.0.0.1', '0000-00-00 00:00:00', 0),
(39, 0, 7, '1', 7200, NULL, 'M15001- Monthly Fee, March- 2015 (151)', 2, 11090346, 2, '2015-03-11', '2015-03-11 03:34:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(40, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, March- 2015 (153)', 2, 11090346, 2, '2015-03-11', '2015-03-11 03:34:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(41, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, - 2015 (154)', 2, 11090346, 2, '2015-03-11', '2015-03-11 03:34:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(42, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, - 2015 (155)', 2, 11090346, 2, '2015-03-11', '2015-03-11 03:34:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(43, 0, 7, '1', 7000, NULL, 'M15001- Session Fee, - 2015 (156)', 2, 11090346, 2, '2015-03-11', '2015-03-11 03:34:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(44, 0, 7, '1', 7000, NULL, 'M15001- Admission Fee, - 2015 (157)', 2, 11090346, 2, '2015-03-11', '2015-03-11 03:34:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(45, 0, 7, '1', 1000, NULL, 'M15001- Other, - 2015 (158)', 2, 11090346, 2, '2015-03-11', '2015-03-11 03:34:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(46, 0, 0, '1', 5977, NULL, 'M15002- Monthly Fee, March- 2015 (152)', 2, 11090316, 2, '2015-03-11', '2015-03-11 15:37:17', '127.0.0.1', '0000-00-00 00:00:00', 0),
(47, 0, 0, '1', 5977, NULL, 'M15002- Monthly Fee, March- 2015 (152)', 2, 11090300, 2, '2015-03-11', '2015-03-11 15:38:00', '127.0.0.1', '0000-00-00 00:00:00', 0),
(48, 0, 7, '1', 7200, NULL, 'M15001- Monthly Fee, March- 2015 (151)', 2, 11090348, 2, '2015-03-11', '2015-03-11 15:38:48', '127.0.0.1', '0000-00-00 00:00:00', 0),
(49, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, March- 2015 (153)', 2, 11090348, 2, '2015-03-11', '2015-03-11 15:38:48', '127.0.0.1', '0000-00-00 00:00:00', 0),
(50, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, - 2015 (154)', 2, 11090348, 2, '2015-03-11', '2015-03-11 15:38:48', '127.0.0.1', '0000-00-00 00:00:00', 0),
(51, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, - 2015 (155)', 2, 11090348, 2, '2015-03-11', '2015-03-11 15:38:48', '127.0.0.1', '0000-00-00 00:00:00', 0),
(52, 0, 7, '1', 7000, NULL, 'M15001- Session Fee, - 2015 (156)', 2, 11090348, 2, '2015-03-11', '2015-03-11 15:38:48', '127.0.0.1', '0000-00-00 00:00:00', 0),
(53, 0, 7, '1', 7000, NULL, 'M15001- Admission Fee, - 2015 (157)', 2, 11090348, 2, '2015-03-11', '2015-03-11 15:38:48', '127.0.0.1', '0000-00-00 00:00:00', 0),
(54, 0, 7, '1', 1000, NULL, 'M15001- Other, - 2015 (158)', 2, 11090348, 2, '2015-03-11', '2015-03-11 15:38:48', '127.0.0.1', '0000-00-00 00:00:00', 0),
(55, 0, 7, '1', 600, NULL, 'M15001- Computer Lab, March- 2015 (153)', 2, 17120359, 2, '2015-03-17', '2015-03-16 18:13:59', '127.0.0.1', '0000-00-00 00:00:00', 0),
(56, 0, 7, '1', 6877, NULL, 'M15001- Admission Fee, - 2015 (157)', 2, 17120359, 2, '2015-03-17', '2015-03-16 18:13:59', '127.0.0.1', '0000-00-00 00:00:00', 0),
(57, 0, 7, '1', 1000, NULL, 'M15001- Other, - 2015 (158)', 2, 17120359, 2, '2015-03-17', '2015-03-16 18:13:59', '127.0.0.1', '0000-00-00 00:00:00', 0),
(58, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(59, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(60, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(61, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(62, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(63, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(64, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(65, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(66, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(67, 0, 7, 'M15001', NULL, 600, 'M15001- Computer Lab, March- 2015 (153)', 2, 17120339, 2, '2015-03-17', '2015-03-16 18:18:39', '127.0.0.1', '0000-00-00 00:00:00', 0),
(68, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(69, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(70, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(71, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(72, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(73, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(74, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(75, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(76, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(77, 0, 7, 'M15001', NULL, 6877, 'M15001- Admission Fee, - 2015 (157)', 2, 17120339, 2, '2015-03-17', '2015-03-16 18:18:39', '127.0.0.1', '0000-00-00 00:00:00', 0),
(78, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(79, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(80, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(81, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(82, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(83, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(84, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(85, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(86, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:18:39', '', '0000-00-00 00:00:00', 0),
(87, 0, 7, 'M15001', NULL, 1000, 'M15001- Other, - 2015 (158)', 2, 17120339, 2, '2015-03-17', '2015-03-16 18:18:39', '127.0.0.1', '0000-00-00 00:00:00', 0),
(88, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(89, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(90, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(91, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(92, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(93, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(94, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(95, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(96, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(97, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(98, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(99, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(100, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(101, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(102, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(103, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(104, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(105, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(106, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(107, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(108, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(109, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(110, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(111, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(112, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(113, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(114, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(115, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(116, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(117, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(118, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(119, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(120, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(121, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(122, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(123, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(124, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(125, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(126, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(127, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(128, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(129, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(130, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(131, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(132, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(133, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(134, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(135, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(136, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(137, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(138, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(139, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(140, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(141, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:22:46', '', '0000-00-00 00:00:00', 0),
(142, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(143, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(144, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(145, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(146, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(147, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(148, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(149, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(150, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-16 18:25:33', '', '0000-00-00 00:00:00', 0),
(151, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(152, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(153, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(154, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(155, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(156, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(157, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(158, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(159, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-17 01:49:26', '', '0000-00-00 00:00:00', 0),
(160, 0, 2, '2', 1234, NULL, 'asdf', 3, 516905, 2, '2015-03-18', '2015-03-18 02:22:07', '127.0.0.1', '0000-00-00 00:00:00', 0),
(161, 0, 2, '1', NULL, 1234, 'asdf', 3, 516905, 2, '2015-03-18', '2015-03-18 02:22:07', '127.0.0.1', '0000-00-00 00:00:00', 0),
(162, 0, 2, '1', 234, NULL, 'sdf', 4, 381382, 2, '2015-03-18', '2015-03-18 02:22:15', '127.0.0.1', '0000-00-00 00:00:00', 0),
(163, 0, 2, '2', NULL, 234, 'sdf', 4, 381382, 2, '2015-03-18', '2015-03-18 02:22:15', '127.0.0.1', '0000-00-00 00:00:00', 0),
(164, 0, 6, '5', 23, NULL, 'sdf', 1, 864351, 2, '2015-03-18', '2015-03-18 02:22:26', '127.0.0.1', '0000-00-00 00:00:00', 0),
(165, 0, 6, '1', NULL, 23, 'sdf', 1, 864351, 2, '2015-03-18', '2015-03-18 02:22:26', '127.0.0.1', '0000-00-00 00:00:00', 0),
(166, 0, 6, '1', 234, NULL, 'sdf', 2, 282234, 2, '2015-03-18', '2015-03-18 02:22:32', '127.0.0.1', '0000-00-00 00:00:00', 0),
(167, 0, 6, '5', NULL, 234, 'sdf', 2, 282234, 2, '2015-03-18', '2015-03-18 02:22:32', '127.0.0.1', '0000-00-00 00:00:00', 0),
(168, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(169, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(170, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(171, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(172, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(173, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(174, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(175, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(176, 0, 0, '', NULL, NULL, '', 0, 0, 0, '0000-00-00', '2015-03-22 16:42:26', '', '0000-00-00 00:00:00', 0),
(177, 0, 7, '1', 7200, NULL, 'M15001- Monthly Fee, March- 2015 (151)', 2, 22110311, 2, '2015-03-22', '2015-03-22 17:01:11', '127.0.0.1', '0000-00-00 00:00:00', 0),
(178, 0, 7, '1', 7200, NULL, 'M15001- Monthly Fee, March- 2015 (151)', 2, 22110328, 2, '2015-03-22', '2015-03-22 17:01:28', '127.0.0.1', '0000-00-00 00:00:00', 0),
(179, 0, 7, '1', 7200, NULL, 'M15001- Monthly Fee, March- 2015 (151)', 2, 22110311, 2, '2015-03-22', '2015-03-22 17:02:11', '127.0.0.1', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_old`
--

CREATE TABLE IF NOT EXISTS `transaction_old` (
`id` int(11) NOT NULL,
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
  `total` int(11) NOT NULL
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
`UserId` int(11) NOT NULL
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
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `acc_group_type_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_group`
--
ALTER TABLE `acc_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_group_type`
--
ALTER TABLE `acc_group_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_ledger`
--
ALTER TABLE `acc_ledger`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `columns`
--
ALTER TABLE `columns`
 ADD PRIMARY KEY (`colId`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_category`
--
ALTER TABLE `fees_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
 ADD PRIMARY KEY (`NavigationId`);

--
-- Indexes for table `navigviewright`
--
ALTER TABLE `navigviewright`
 ADD PRIMARY KEY (`NavgViewId`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_fees`
--
ALTER TABLE `std_fees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_fee_report`
--
ALTER TABLE `std_fee_report`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synctables`
--
ALTER TABLE `synctables`
 ADD PRIMARY KEY (`TableName`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
 ADD PRIMARY KEY (`tableId`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_old`
--
ALTER TABLE `transaction_old`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `voucher_type`
--
ALTER TABLE `voucher_type`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_group`
--
ALTER TABLE `acc_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `acc_group_type`
--
ALTER TABLE `acc_group_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `acc_ledger`
--
ALTER TABLE `acc_ledger`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `columns`
--
ALTER TABLE `columns`
MODIFY `colId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fees_category`
--
ALTER TABLE `fees_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
MODIFY `NavigationId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `navigviewright`
--
ALTER TABLE `navigviewright`
MODIFY `NavgViewId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `std_fees`
--
ALTER TABLE `std_fees`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `std_fee_report`
--
ALTER TABLE `std_fee_report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `tableId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `transaction_old`
--
ALTER TABLE `transaction_old`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `voucher_type`
--
ALTER TABLE `voucher_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
