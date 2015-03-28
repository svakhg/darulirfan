-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 28 2015 г., 13:59
-- Версия сервера: 5.6.20
-- Версия PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `darulirfan`
--

-- --------------------------------------------------------

--
-- Структура таблицы `acc_group`
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
-- Дамп данных таблицы `acc_group`
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
-- Структура таблицы `acc_group_type`
--

CREATE TABLE IF NOT EXISTS `acc_group_type` (
`id` int(11) NOT NULL,
  `name` varchar(600) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `acc_group_type`
--

INSERT INTO `acc_group_type` (`id`, `name`) VALUES
(1, 'I'),
(2, 'E'),
(3, 'L'),
(4, 'A');

-- --------------------------------------------------------

--
-- Структура таблицы `acc_ledger`
--

CREATE TABLE IF NOT EXISTS `acc_ledger` (
`id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `group_id` int(11) NOT NULL,
  `acc_group_type_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_student` tinyint(1) NOT NULL,
  `is_employee` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `ledger_id` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Дамп данных таблицы `acc_ledger`
--

INSERT INTO `acc_ledger` (`id`, `name`, `group_id`, `acc_group_type_id`, `status`, `is_student`, `is_employee`, `create_date`, `modified_date`, `ledger_id`, `user_id`) VALUES
(1, 'Cash in Hand', 3, 0, 1, 0, 0, '2014-11-30 08:00:00', '0000-00-00 00:00:00', '', 0),
(2, 'Islamic Bank (54165564)', 2, 0, 1, 0, 0, '2014-11-30 08:00:00', '0000-00-00 00:00:00', '', 0),
(3, 'Student Fees', 7, 2, 1, 0, 0, '2014-11-30 08:00:00', '0000-00-00 00:00:00', '', 0),
(4, 'Donation', 8, 2, 1, 0, 0, '2015-02-03 08:00:00', '0000-00-00 00:00:00', '', 0),
(5, 'Office Entertainment', 6, 1, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(6, 'Eastern Bank (65645644)', 2, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0),
(7, 'Marketing', 10, 0, 1, 0, 0, '2015-02-04 08:00:00', '0000-00-00 00:00:00', '', 0),
(8, 'Qazi Md. Mushfiqur Rahman', 7, 0, 1, 1, 0, '2015-03-21 02:07:57', '0000-00-00 00:00:00', 'M15001', 0),
(9, 'Foshior Rahman Oni', 7, 0, 1, 1, 0, '2015-03-21 05:11:06', '0000-00-00 00:00:00', 'M15002', 0),
(10, 'Tawsif Abdullah Muhammad', 7, 0, 1, 1, 0, '2015-03-22 18:03:59', '0000-00-00 00:00:00', 'M15003', 0),
(11, 'Saquib Hasan Rayan', 7, 0, 1, 1, 0, '2015-03-22 18:06:53', '0000-00-00 00:00:00', 'M15004', 0),
(12, 'Asif Ali Chy Aman', 7, 0, 1, 1, 0, '2015-03-22 18:10:44', '0000-00-00 00:00:00', 'M15005', 0),
(13, 'Year Md. Atique', 7, 0, 1, 1, 0, '2015-03-22 18:13:43', '0000-00-00 00:00:00', 'M15006', 0),
(14, 'Burhan Uddin', 7, 0, 1, 1, 0, '2015-03-22 18:16:43', '0000-00-00 00:00:00', 'M15007', 0),
(15, 'Omar Faruq Adnan', 7, 0, 1, 1, 0, '2015-03-22 18:19:58', '0000-00-00 00:00:00', 'M15008', 0),
(16, 'Omar bin Faruq', 7, 0, 1, 1, 0, '2015-03-22 18:23:41', '0000-00-00 00:00:00', 'M15009', 0),
(17, 'Osman Bin Faruq', 7, 0, 1, 1, 0, '2015-03-23 00:39:05', '0000-00-00 00:00:00', 'M15010', 0),
(18, 'Abdur Rahman', 7, 0, 1, 1, 0, '2015-03-23 00:46:23', '0000-00-00 00:00:00', 'M15011', 0),
(19, 'Ahnaf Nafew', 7, 0, 1, 1, 0, '2015-03-23 00:56:25', '0000-00-00 00:00:00', 'M15012', 0),
(20, 'Mohammad Ahsn Jubaer', 7, 0, 1, 1, 0, '2015-03-23 01:10:20', '0000-00-00 00:00:00', 'M15013', 0),
(21, 'Ahmed Ullah Miraz', 7, 0, 1, 1, 0, '2015-03-23 11:37:06', '0000-00-00 00:00:00', 'M15014', 0),
(22, 'Akbar Hossain', 7, 0, 1, 1, 0, '2015-03-23 11:56:36', '0000-00-00 00:00:00', 'M15015', 0),
(23, 'Md. Rakibul Hasan Adnan', 7, 0, 1, 1, 0, '2015-03-23 12:11:26', '0000-00-00 00:00:00', 'M15016', 0),
(24, 'Abu Muhammad Belal Karim Zihan', 7, 0, 1, 1, 0, '2015-03-23 13:35:16', '0000-00-00 00:00:00', 'M15017', 0),
(25, 'Abdullah Al Mamun', 7, 0, 1, 1, 0, '2015-03-23 13:56:06', '0000-00-00 00:00:00', 'M15018', 0),
(26, 'Nayf Uddin Rafi', 7, 0, 1, 1, 0, '2015-03-23 14:14:59', '0000-00-00 00:00:00', 'M15019', 0),
(27, 'Shedur Rahman Showrov', 7, 0, 1, 1, 0, '2015-03-23 14:24:51', '0000-00-00 00:00:00', 'M15020', 0),
(28, 'Khalekuzzaman Forhad', 7, 0, 1, 1, 0, '2015-03-23 14:32:45', '0000-00-00 00:00:00', 'M15021', 0),
(29, 'Mohammad Ibrahim Rahat', 7, 0, 1, 1, 0, '2015-03-23 14:52:29', '0000-00-00 00:00:00', 'M15022', 0),
(30, 'Numan bin Faruq', 7, 0, 1, 1, 0, '2015-03-23 16:28:05', '0000-00-00 00:00:00', 'M15023', 0),
(31, 'Tahsin Md. Arham', 7, 0, 1, 1, 0, '2015-03-23 16:33:27', '0000-00-00 00:00:00', 'M15024', 0),
(32, 'Anas Md. Ali Akbor', 7, 0, 1, 1, 0, '2015-03-23 16:36:31', '0000-00-00 00:00:00', 'M15025', 0),
(33, 'Abdullah Bin Nezam Siam', 7, 0, 1, 1, 0, '2015-03-24 15:58:12', '0000-00-00 00:00:00', 'M15026', 0),
(34, 'Hossain Mohammad Umayer', 7, 0, 1, 1, 0, '2015-03-24 16:06:20', '0000-00-00 00:00:00', 'M15027', 0),
(35, 'Md. Zoynal Abedin Misbah', 7, 0, 1, 1, 0, '2015-03-25 11:43:30', '0000-00-00 00:00:00', 'M15028', 0),
(36, 'Momtahire Uddin Rohan', 7, 0, 1, 1, 0, '2015-03-25 12:11:52', '0000-00-00 00:00:00', 'M15029', 0),
(37, 'Mohammad Abu Nayem Nihal', 7, 0, 1, 1, 0, '2015-03-25 13:13:12', '0000-00-00 00:00:00', 'M15030', 0),
(38, 'Yeasinl Hossen Hasin', 7, 0, 1, 1, 0, '2015-03-25 13:23:14', '0000-00-00 00:00:00', 'M15031', 0),
(39, 'Rayhan Mahruz Arman', 7, 0, 1, 1, 0, '2015-03-25 13:33:46', '0000-00-00 00:00:00', 'M15032', 0),
(40, 'Mohammad Maizid', 7, 0, 1, 1, 0, '2015-03-26 00:20:01', '0000-00-00 00:00:00', 'M15033', 0),
(41, 'Tawhid Kayum', 7, 0, 1, 1, 0, '2015-03-26 00:29:08', '0000-00-00 00:00:00', 'M15034', 0),
(42, 'Hizbullah', 7, 0, 1, 1, 0, '2015-03-26 00:38:29', '0000-00-00 00:00:00', 'M15035', 0),
(43, 'Mohammad Yeaser', 7, 0, 1, 1, 0, '2015-03-26 00:53:40', '0000-00-00 00:00:00', 'M15036', 0),
(44, 'Mohammad Akib Hossain', 7, 0, 1, 1, 0, '2015-03-26 00:59:42', '0000-00-00 00:00:00', 'M15037', 0),
(45, 'Maswud Sarwar', 7, 0, 1, 1, 0, '2015-03-26 01:11:56', '0000-00-00 00:00:00', 'M15038', 0),
(46, 'Md. Masud Chy.', 7, 0, 1, 1, 0, '2015-03-26 12:47:04', '0000-00-00 00:00:00', 'M15039', 0),
(47, 'Mohammad Ehsan Ullah', 7, 0, 1, 1, 0, '2015-03-26 15:26:51', '0000-00-00 00:00:00', 'M15040', 0),
(48, 'Sayed Mohammad Tariqul Islam', 7, 0, 1, 1, 0, '2015-03-26 15:48:59', '0000-00-00 00:00:00', 'M15041', 0),
(49, 'Safwan Kamal Shamil', 7, 0, 1, 1, 0, '2015-03-26 16:01:20', '0000-00-00 00:00:00', 'M15042', 0),
(50, 'md. Haris Uddin Rafi', 7, 0, 1, 1, 0, '2015-03-27 14:23:22', '0000-00-00 00:00:00', 'M15043', 0),
(51, 'Tanvir Mahtab', 7, 0, 1, 1, 0, '2015-03-27 14:31:47', '0000-00-00 00:00:00', 'M15044', 0),
(52, 'Md Sohadul Alam', 7, 0, 1, 1, 0, '2015-03-27 15:00:29', '0000-00-00 00:00:00', 'M15045', 0),
(53, 'Ahmed Munawar Dua', 7, 0, 1, 1, 0, '2015-03-27 16:30:34', '0000-00-00 00:00:00', 'M15046', 0),
(54, 'Atiqur Rahman Taif', 7, 0, 1, 1, 0, '2015-03-28 00:30:52', '0000-00-00 00:00:00', 'M15047', 0),
(55, 'Saydur Rahman Raihan', 7, 0, 1, 1, 0, '2015-03-28 00:40:58', '0000-00-00 00:00:00', 'M15048', 0),
(56, 'Kazi Md. Ahnaf Abid', 7, 0, 1, 1, 0, '2015-03-28 00:47:55', '0000-00-00 00:00:00', 'M15049', 0),
(57, 'Khubaib bin Ilias', 7, 0, 1, 1, 0, '2015-03-28 00:53:58', '0000-00-00 00:00:00', 'M15050', 0),
(58, 'Saad Mohammad Mohsin', 7, 0, 1, 1, 0, '2015-03-28 01:04:32', '0000-00-00 00:00:00', 'M15051', 0),
(59, 'Mohammad Abu Sayed', 7, 0, 1, 1, 0, '2015-03-28 01:17:21', '0000-00-00 00:00:00', 'M15052', 0),
(60, 'Kazi Md. Murshidur Rahman', 7, 0, 1, 1, 0, '2015-03-28 01:23:49', '0000-00-00 00:00:00', 'M15053', 0),
(61, 'Mohammad Ayman Nur', 7, 0, 1, 1, 0, '2015-03-28 01:28:47', '0000-00-00 00:00:00', 'M15054', 0),
(62, 'Mohammad Ariful Islam', 7, 0, 1, 1, 0, '2015-03-28 01:34:30', '0000-00-00 00:00:00', 'M15055', 0),
(63, 'Md. Abid Ullah', 7, 0, 1, 1, 0, '2015-03-28 09:26:57', '0000-00-00 00:00:00', 'M15056', 0),
(64, 'Md. Mushqur Rahman Sayuf', 7, 0, 1, 1, 0, '2015-03-28 09:31:56', '0000-00-00 00:00:00', 'M15057', 0),
(65, 'Md. Naymus Siam', 7, 0, 1, 1, 0, '2015-03-28 09:36:23', '0000-00-00 00:00:00', 'M15058', 0),
(66, 'Abidur Rahman Ahad', 7, 0, 1, 1, 0, '2015-03-28 09:41:15', '0000-00-00 00:00:00', 'M15059', 0),
(67, 'Abrarul Hoque', 7, 0, 1, 1, 0, '2015-03-28 09:48:32', '0000-00-00 00:00:00', 'M15060', 0),
(68, 'Mahdi Hasan Marzuq', 7, 0, 1, 1, 0, '2015-03-28 10:00:19', '0000-00-00 00:00:00', 'M15061', 0),
(69, 'Md. Fabasshir Ibad Siam', 7, 0, 1, 1, 0, '2015-03-28 10:20:30', '0000-00-00 00:00:00', 'M15062', 0),
(73, 'S M Zakareya', 5, 0, 1, 0, 1, '2015-03-28 12:37:15', '0000-00-00 00:00:00', 'E15001', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`id` int(11) NOT NULL,
  `class_name` varchar(500) NOT NULL,
  `sorting` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `class_name`, `sorting`) VALUES
(0, 'Nursery', 0),
(1, 'One', 0),
(2, 'Two', 0),
(3, 'Three', 0),
(4, 'Four', 0),
(5, 'Five', 0),
(6, 'Six', 0),
(7, 'Seven', 0),
(8, 'Eight', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `columns`
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
-- Дамп данных таблицы `columns`
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
-- Структура таблицы `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
`id` int(11) NOT NULL,
  `designation_name` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `designation`
--

INSERT INTO `designation` (`id`, `designation_name`) VALUES
(1, 'General Teacher'),
(2, 'Hifz Teacher'),
(3, 'Head of General Teacher'),
(4, 'Head of Hifz Teacher'),
(5, 'Office Administrative'),
(6, 'Staff'),
(7, 'Principle'),
(8, 'Guard'),
(9, 'Servant');

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
`id` int(11) NOT NULL,
  `emp_id` varchar(15) NOT NULL,
  `national_id` bigint(20) NOT NULL,
  `emp_name` varchar(500) NOT NULL,
  `emp_mobile` varchar(20) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `mother_name` varchar(500) NOT NULL,
  `designation` int(11) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `present_address` varchar(1500) NOT NULL,
  `permanent_address` text NOT NULL,
  `emergency_address` text NOT NULL,
  `remarks` text NOT NULL,
  `residential_status` tinyint(1) NOT NULL COMMENT '1- residential, 2- non-residential',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-active, 2- inactive, 3- blocked',
  `salary_amount` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id`, `emp_id`, `national_id`, `emp_name`, `emp_mobile`, `gender`, `father_name`, `mother_name`, `designation`, `contact_no`, `present_address`, `permanent_address`, `emergency_address`, `remarks`, `residential_status`, `created_date`, `status`, `salary_amount`, `user_id`) VALUES
(1, 'E15001', 452, 'S M Zakareya', '', 1, 'Alhazz Mou. Mohammad Mahbubal Hoque', 'Jebun Nessa Chy', 3, '01952170961', 'DIHM, H-15, R-8, Chandgaong R/A, Ctg', 'M. Muradpur, Mirsharai, Ctg.', '', '', 0, '2015-03-28 12:37:15', 1, 7000, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `employee_salary_report`
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

-- --------------------------------------------------------

--
-- Структура таблицы `fees`
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
-- Дамп данных таблицы `fees`
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
-- Структура таблицы `fees_category`
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
-- Дамп данных таблицы `fees_category`
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
-- Структура таблицы `navigations`
--

CREATE TABLE IF NOT EXISTS `navigations` (
`NavigationId` int(11) NOT NULL,
  `NavName` varchar(100) NOT NULL,
  `NavOrder` int(11) NOT NULL,
  `ActionPath` varchar(100) NOT NULL,
  `ParentNavId` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `navigations`
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
(26, 'Student Report', 19, 'student', NULL),
(27, 'Voucher', 1, 'voucher', NULL),
(28, 'Ledger Book', 2, 'ledger_book', 30),
(29, 'Student Info', 19, 'student', NULL),
(30, 'Report', 4, 'report', NULL),
(31, 'Individual Ledger Report', 6, 'ledger_report', 30);

-- --------------------------------------------------------

--
-- Структура таблицы `navigviewright`
--

CREATE TABLE IF NOT EXISTS `navigviewright` (
`NavgViewId` int(11) NOT NULL,
  `Navigations` int(11) NOT NULL,
  `Roles` int(11) DEFAULT NULL,
  `Users` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `navigviewright`
--

INSERT INTO `navigviewright` (`NavgViewId`, `Navigations`, `Roles`, `Users`) VALUES
(1, 1, 1, NULL),
(2, 4, 1, NULL),
(3, 5, 1, NULL),
(4, 3, 1, NULL),
(5, 2, 1, NULL),
(9, 9, 1, 3),
(11, 11, 1, 3),
(12, 12, 1, NULL),
(13, 13, 1, NULL),
(14, 14, 1, NULL),
(15, 15, 1, NULL),
(16, 16, 1, NULL),
(17, 17, 1, NULL),
(18, 18, 1, NULL),
(19, 19, 1, NULL),
(20, 20, NULL, NULL),
(21, 21, 1, NULL),
(22, 22, 1, NULL),
(23, 23, 1, NULL),
(24, 24, 1, NULL),
(25, 25, NULL, NULL),
(26, 26, NULL, NULL),
(27, 27, 1, 2),
(28, 28, 1, 2),
(29, 29, NULL, NULL),
(30, 30, 1, NULL),
(31, 31, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
`id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`) VALUES
(1, 'Cash'),
(2, 'Cheque'),
(3, 'Bank Deposit');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
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
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`RoleId`, `RoleName`, `NavigationId`, `IsRead`, `IsInsert`, `IsUpdate`, `IsDelete`) VALUES
(1, 'Super Admin', 1, 1, 1, 1, 1),
(2, 'Accountant', 9, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `yesno` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`, `yesno`) VALUES
(1, 'Active', 'Yes'),
(2, 'Inactive', 'No');

-- --------------------------------------------------------

--
-- Структура таблицы `std_fees`
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
-- Дамп данных таблицы `std_fees`
--

INSERT INTO `std_fees` (`std_id`, `id`, `fees_id`, `status`, `created`, `user_id`, `modified`) VALUES
(3, 8, 2, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 15, 3, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(1, 16, 5, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 17, 5, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `std_fee_report`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `student`
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
  `residential_status` tinyint(4) NOT NULL COMMENT '1- residential, 2- non-residential',
  `concession_description` text NOT NULL,
  `concession_amount` float NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `std_id`, `std_name`, `gender`, `father_name`, `mother_name`, `guardian_name`, `guardian_mobile_no`, `class_id`, `roll_no`, `father_mobile_no`, `mother_mobile_no`, `present_address`, `permanent_address`, `create_date`, `status`, `residential_status`, `concession_description`, `concession_amount`, `user_id`) VALUES
(1, 'M15001', 'Qazi Md. Mushfiqur Rahman', 1, 'Qazi Md. Abdur Rahman', 'Maksuda Mozumdar', '', '', 5, 16, '', '', 'Flat-A9, Night Sarah Tower,10, Mehedibag Road, Mehedibag,CTG.', 'Flat-A9, Night Sarah Tower,10, Mehedibag Road, Mehedibag,CTG.', '2015-03-21 02:07:57', 1, 1, '', 1000, 0),
(2, 'M11004', 'Foshior Rahman Oni', 1, 'Md. Eisa', 'Mumena Nur Siddiqah', 'Md. Eisa', '', 5, 5, '', '', 'Garden Enklap, Zawtola Road, Ceragi Pahad, CTG', '', '2015-03-21 05:11:06', 1, 1, '', 2000, 0),
(3, 'M13012', 'Tawsif Abdullah Muhammad', 1, 'D. Md. Mahbubur Rahman', 'Qazi Nahid Sultana', '', '', 1, 2, '', '', 'South Hazatia, Hazotkhula Bazr, Sodor North, Kumilla', '', '2015-03-22 18:03:59', 1, 2, '', 1000, 0),
(4, 'M15004', 'Saquib Hasan Rayan', 1, 'Kamal Hussen', 'Parvin Akhter', '', '', 4, 7, '', '', 'Rawzan', '', '2015-03-22 18:06:53', 1, 1, '', 2000, 0),
(5, 'M15005', 'Asif Ali Chy Aman', 1, 'Ayub Ali Chy', 'Razia Sultana', '', '', 4, 5, '', '', 'Habibullah Chy House, South Muhra, Chandgaon, Ctg.', '', '2015-03-22 18:10:44', 1, 1, '', 1000, 0),
(6, 'M15006', 'Year Md. Atique', 1, 'Md. Yeasin', 'Farzana Yeasin', '', '', 4, 9, '', '', 'Forida Para, Pachlaish, Ctg', '', '2015-03-22 18:13:43', 1, 1, '', 2500, 0),
(7, 'M15007', 'Burhan Uddin', 1, 'Md. Ziauddin', 'Zannatun Nahar', '', '', 5, 7, '', '', 'Forsin Omar, Bodo Uthan, Potiya, Ctg', '', '2015-03-22 18:16:43', 1, 1, '', 1000, 0),
(8, 'M15008', 'Omar Faruq Adnan', 1, 'Md. Eisa', 'Md. Ayesah Siddiqah', '', '', 5, 3, '', '', 'Rawzan', '', '2015-03-22 18:19:58', 1, 1, '', 2000, 0),
(9, 'M15009', 'Omar bin Faruq', 1, 'Md. Faruq', 'Khairun Nesa', '', '', 5, 18, '', '', 'Nur Mansion, Forida Para, Khoteeber Hat, Pachlaish, Ctg.', '', '2015-03-22 18:23:41', 1, 1, '', 2000, 0),
(10, 'M15010', 'Osman Bin Faruq', 1, 'Omar Faruq', 'Khayrun Nessa', '', '', 5, 6, '01813799699', '', 'Nur Menssion, Forida Para, Khotiber Hat, Panclaish, Ctg.', 'Nur Menssion, Forida Para, Khotiber Hat, Panchlaish, Ctg.', '2015-03-23 00:39:05', 1, 1, '', 2000, 0),
(11, 'M15011', 'Abdur Rahman', 1, 'Mohammad Askandar', 'Minu Aktar', '', '', 5, 10, '01823931441', '', 'Nur Menssion, Forida Para, Khotiber Hat, Panchlaish, Ctg.', 'Nur Menssion, Forida Para, Khotiber Hat, Panchlaish, Ctg.', '2015-03-23 00:46:23', 1, 1, '', 2000, 0),
(12, 'M15012', 'Ahnaf Nafew', 1, 'Gias Uddin Chy', 'Nasim Ara Chy', '', '', 5, 13, '01673614174', '', 'Salam Vila, Hazi Hakim Ali Road, Andarkillah, Ctg.', 'Salam Vila, Hazi Hakim Ali Road, Andarkillah, Ctg.', '2015-03-23 00:56:26', 1, 1, '', 1000, 0),
(13, 'M15013', 'Mohammad Ahsan Jubaer', 1, 'Mohammad Hasem', 'Musammad Bibi Fatima', '', '', 5, 8, '01813346725', '01819785269', 'Akbar Ali Hazir Bari, V-Condro Pur, P/o Mirer Hat, Hathazari, Ctg.', 'Mahmuda Villa, Ismaeel Koloni, Mohammad Pur, Solo Shohor, Ctg.', '2015-03-23 01:10:20', 1, 1, '', 0, 0),
(14, 'M15014', 'Ahmed Ullah Miraz', 1, 'Didarul Alam', 'Amena Begum', '', '', 3, 10, '01817225496', '01814498513', 'Ahmed Ali Sowdagor Bari, North Urkir Cor, South Rauzan, Ctg.', 'Ahmed Ali Sowdagor Bari, North Urkir Cor, South Rauzan, Ctg.', '2015-03-23 11:37:06', 1, 1, '', 0, 0),
(15, 'M15015', 'Akbar Hossain', 1, 'Mohammad hossain', 'Shimul Akter', '', '', 3, 7, '01820013660', '01818084303', 'Shohid Nogor R/A, Oxisen, Bayazid, Ctg.', 'V-Uttor Sodva, 1 No Holidia, Rauzan, Ctg.', '2015-03-23 11:56:37', 1, 1, '', 0, 0),
(16, 'M15016', 'Md. Rakibul Hasan Adnan', 1, 'Mohammad Yousuf Azmy', 'Zinnat Ara Begum', '', '', 3, 3, '01819359987', '01815615615', 'Sugondha R/A, R-1, H-70, Muradpur, Ctg.', 'Sugondha R/A, R-1, H-70, Muradpur, Ctg.', '2015-03-23 12:11:26', 1, 1, '', 0, 0),
(17, 'M15017', 'Abu Muhammad Belal Karim Zihan', 1, 'Abu Muhammad Fazlul Karim', 'Zannatun Nayem', '', '', 5, 4, '01558389994', '', 'Shekh Ahmad Member bari, Can Mia munshi Lane, DC Road, Chawk Bazar, Ctg.', 'Shekh Ahmad Member bari, can Mia Munshi lane, DC Road, Chawk bazar, Ctg.', '2015-03-23 13:35:16', 1, 1, '', 0, 0),
(18, 'M15018', 'Abdullah Al Mamun', 1, 'Mohammad Forkan Uddin', 'Fatima Begum', '', '', 4, 6, '01754777456', '01818750163', 'H#20, R#1, nasirabad H/S, Panchlaish, Ctg', 'Zonar kewcia, Kerani Hat,Satkania, Ctg.', '2015-03-23 13:56:06', 1, 1, '', 0, 0),
(19, 'M15019', 'Nayf Uddin Rafi', 1, 'Zasim Uddin Babul', 'Parvin Akhter', '', '', 4, 4, '01754777456', '01815815817', 'H#20, R#1, Nasirabad H/S, Panchlaish, Ctg', 'Purba Afzal nagar, Chadha, Satkania, Ctg.', '2015-03-23 14:14:59', 1, 1, '', 0, 0),
(20, 'M15020', 'Shedur Rahman Showrov', 1, 'Md. Habibur Rahman', 'Momtaz Begum', '', '', 2, 5, '01762653324', '01673012233', 'Liton Vila, Bohoddar hat Kaca bazar Goli, Bohoddar Hat, candgawng, Ctg.', 'Ruby Gate, Bayazid, Ctg.', '2015-03-23 14:24:51', 1, 1, '', 0, 0),
(21, 'M15021', 'Khalekuzzaman Forhad', 1, 'Zagir Hossen Badsha', 'Azmir Begum', '', '', 3, 13, '01813732932', '01819800892', 'Imam Ali Sowdagorer bari, Baroi Para, Bohoddar  Hat, Chandgawng, Ctg.', 'Imam Ali Sowdagorer bari, Baroi Para, Bohoddar hat, Chandgawng, ctg.', '2015-03-23 14:32:45', 1, 1, '', 0, 0),
(22, 'M15022', 'Mohammad Ibrahim Rahat', 1, 'Nur Mohammad', 'Nazmin Aktar', '', '', 3, 11, '01811299339', '01819385946', 'Amir Menssion, CNB Road, Didar Market,\n Dewan Bazar, Ctg.', 'Amir Menssion, CNB Road, Didar Market, Dewn Bazar, Ctg.', '2015-03-23 14:52:29', 1, 1, '', 0, 0),
(23, 'M15023', 'Numan bin Faruq', 1, 'Md. Faruq', 'Khairun Nesa', '', '', 2, 7, '', '', 'Nur Mansion, Foridar Para, KHOTEEBER HAT, Pachlaish, CTG', '', '2015-03-23 16:28:05', 1, 1, '', 2000, 0),
(24, 'M15024', 'Tahsin Md. Arham', 1, 'Zahangir Kobir Bhuiya', 'Selina Akhter', '', '', 4, 3, '', '', 'Noju Monjil, Bodo Mia Pukur Pad, Bohoddarhat, Chandgaon, CTG', '', '2015-03-23 16:33:28', 1, 1, '', 2000, 0),
(25, 'M15025', 'Anas Md. Ali Akbor', 1, 'Dr. Md. Ali', 'Dr. Fozilatunnesa Chy', '', '', 2, 2, '', '', '347,Road-14,Block-B, Changaon R/A, Bohaddarhat, Ctg.', '', '2015-03-23 16:36:31', 1, 1, '', 1000, 0),
(26, 'M15026', 'Abdullah Bin Nezam Siam', 1, 'Mohammad Nezam Uddin', 'Fahmida Haydar Sonia', 'Md. Nasim Uddin', '01554342890', 3, 8, '01819385946', '01819938573', 'Nur Menssion, 344,Zubli Road, Ctg', 'Nur Menssion, 344,Zubli Road, Ctg.', '2015-03-24 15:58:13', 1, 1, '', 0, 0),
(27, 'M15027', 'Hossain Mohammad Umayer', 1, 'Mohammad Zamal Uddin', 'Parvin Aktar', 'Md. Nasim Uddin', '01554342890', 3, 4, '01819385946', '', 'Nur Menssion, 344,Zubli Road, Ctg.', 'Nur Menssion, 344,Zubli Road, Ctg.', '2015-03-24 16:06:20', 1, 1, '', 0, 0),
(28, 'M15028', 'Md. Zoynal Abedin Misbah', 1, 'Md. Zahangir Alam', 'Zannatul Ferdaous', '', '', 3, 5, '01673970427', '', 'Osman Sikdar Bari, Dokkhin Mohara, Chandgaong, Ctg.', 'Osman Sikder Bari, Dokkhin Mohara, Chandgaong, Ctg.', '2015-03-25 11:43:30', 1, 1, '', 0, 0),
(29, 'M15029', 'Momtahire Uddin Rohan', 1, 'Main Uddin Titu', 'Mochammad Yasmin Akter', '', '', 4, 12, '01819328454', '01825058055', 'Abu Compenys House, DC Road, Chowk Bazar, Ctg.', 'Abu Companys House, DC Road,Chowk Bazar, Ctg.', '2015-03-25 12:11:52', 1, 1, '', 0, 0),
(30, 'M15030', 'Mohammad Abu Nayem Nihal', 1, 'Mohammad Abu Sayed', 'Zahanara Begum', '', '', 3, 9, '01815579901', '01819345168', 'Chodu Talukdaars House, Vill-Potia, PO-Potia, PS- potia, Ctg.', 'Chodu Talukdars House, Vill-Potia, PS-Potia, PS-Potia, Ctg.', '2015-03-25 13:13:12', 1, 1, '', 0, 0),
(31, 'M15031', 'Yeasinl Hossen Hasin', 1, 'Shahadat Hossen', 'Sabina Hossen', '', '', 3, 6, '01813799675', '01834617366', 'Y/9, Main Road, Chandgaong R/A, Bohoddar Hat, Ctg.', 'Sayed Bari, South side of Ranggunia Thana, Ctg.', '2015-03-25 13:23:14', 1, 1, '', 0, 0),
(32, 'M15032', 'Rayhan Mahruz Arman', 1, 'Abdur Razzak', 'Roksana Akter', '', '', 3, 2, '01819635230', '01812025816', 'Asia vobon (6th), 84,Nobab Sirazuddowla Road, Dewan Bazar, Ctg.', 'Sec-7, H-3, Notun Uposhohor, Thana-Kotowali, Dis-Joshor.', '2015-03-25 13:33:46', 1, 1, '', 0, 0),
(33, 'M15033', 'Mohammad Maizid', 1, 'Md. Monabber Hossen', 'Shamim Akter', '', '', 4, 8, '01817752942', '', 'Oxizen R/A, Pathan Pur, Panchlaish, Ctg.', 'Purbo Lelang Para, Rauzan, Ctg.', '2015-03-26 00:20:01', 1, 1, '', 0, 0),
(34, 'M15034', 'Tawhid Kayum', 1, 'Abdul Kayum Nizami', 'Humayra Begum', '', '', 3, 1, '01715785025', '0181933223', 'Hazi T.Ali Lane, 285,Condonpura, Nobab Sirazuddowla Road, Ctg.', 'V-Moszidia, Hadi Fokir Hat,  PS-Mirsarai, Dis- Ctg', '2015-03-26 00:29:08', 1, 1, '', 0, 0),
(35, 'M15035', 'Hizbullah', 1, 'Shaker ahammad', 'Nur Begum', '', '', 5, 2, '01821146600', '', 'F-7, Arif Monzil, Khotiber Hat, Panchlaish, Ctg.', 'Zafor Ahmads House, Ashiya,P/O-Ashia Bangla Bazar,  W-4, Potia, Ctg.', '2015-03-26 00:38:29', 1, 1, '', 0, 0),
(36, 'M14016', 'Mohammad Yeaser', 1, 'Mohammad Yousuf Ali', 'Zinnat Fatima', '', '', 1, 1, '01849549930', '01849549930', 'F-6, Arif Monzil, Khotiber Hat Moszid, Khotiber Hat, Panclaish, Ctg.', 'V-Ashia, P/OAshia Bangla Bazar, W-5, PS-Potia Ctg.', '2015-03-26 00:53:40', 1, 1, '', 0, 0),
(37, 'M15037', 'Mohammad Akib Hossain', 1, 'Muhammad Abdul Khalek', 'Musammad Rosy Akter', '', '', 5, 12, '01817782499', '', 'Postar Par, Dewan Hat, Dobolmuring, Ctg.', 'Postar Par, Dewan Hat, Dobolmuring, Ctg.', '2015-03-26 00:59:42', 1, 1, '', 0, 0),
(38, 'M15038', 'Maswud Sarwar', 1, 'Mohammad Osman Sarwar', 'Ayasha Begum', 'Rohima Begum,  Moriam Begum.', '0184335993,  01553590020', 3, 12, '01737516067', '01837011177', 'C/O-Kabir Ahmad, Chaktai Branch, IBBL, Ctg.', 'North Chomalia Cora, Brikfield Road, CoxesBazar powro Sova, W-5, coxesbazar, Ctg.', '2015-03-26 01:11:56', 1, 1, '', 0, 0),
(39, 'M15001', 'Md. Masud Chy.', 1, 'Md. Shofiul Alam Chy', 'Mrs. Chanowara Begum Nargis', '', '', 1, 11, '01727356484', '01927180613', 'Green View Society, Oxizen, Bayezid, Ctg.', 'V- Dorop Chy Bari, South Madarsha, PS-Hathazari, Ctg.', '2015-03-26 12:47:05', 1, 1, '', 0, 0),
(40, 'M15040', 'Mohammad Ehsan Ullah', 1, 'Alhazz Rofiq Ullah', 'Nahda Akter', '', '', 2, 8, '01819380884', '01727605985', '1115, Hazi Sobhan Sowdagor Road, Caktai, Ctg.', '1115, Hazi Sobhan Sowdagor Road, Caktai, Ctg.', '2015-03-26 15:26:51', 1, 1, '', 0, 0),
(41, 'M15041', 'Sayed Mohammad Tariqul Islam', 1, 'Sayed Mohammad Nazrul Islam', 'Anzuman Ara Khanom', '', '', 2, 21, '01731620210', '01686841710 , 01816583447', 'Sayed Moulana Saheber bari, V&PO- Khitaf Cor, PS-Boul Khali, Ctg.', 'Sayed Moulana Saheber Bari, V&PO-Khitap Cor, PS- Boul Khali, Ctg.', '2015-03-26 15:48:59', 1, 1, '', 0, 0),
(42, 'M15042', 'Safwan Kamal Shamil', 1, 'Md. Kamal Uddin', 'Sharmin Bashar', '', '', 3, 15, '01755555177', '01815330842', 'Hoque Monzil, Foyaz Lack, Khulshi, Ctg.', 'Vill-Diakul(Sikdar Para), P/o-Bazalia, UP-Chondonaish, Ctg.', '2015-03-26 16:01:20', 1, 1, '', 1000, 0),
(43, 'M15043', 'Md. Haris Uddin Rafi', 1, 'Md. Aman Uddin', 'Msd. Jesmin Aktar Laki', '', '', 5, 17, '01831786396', '01672143277', 'Vill-Cor Pathor Ghata, P/O-Azib Para, P/S-Kornafuly, Dis-Ctg.', 'Vill-Cor Pathor Ghata, P/O-Azib Para, P/S-Kornafuly, Dis-Ctg.', '2015-03-27 14:23:22', 1, 1, '', 1000, 0),
(44, 'M15044', 'Tanvir Mahtab', 1, 'N M M Nazim Uddin Chy', 'Rashida Begum', '', '', 3, 16, '01819359002', '', 'East Mother Bari, Ctg.', 'Satbaria, Chondanaish, Ctg.', '2015-03-27 14:31:47', 1, 1, '', 500, 0),
(45, 'M15045', 'Md Sohadul Alam Riham', 1, 'Md. Tawhidul  Alam', 'Msd. Hosneara Laki', '', '', 0, 10, '01861194119', '01861194119', 'Hamdan Islam Towar, Momenbag R/A, Hamzar Bag, Panchlaish, Ctg.', 'Bhuya Bari, South Rangamatia, Fotikchori, Ctg.', '2015-03-27 15:00:29', 1, 1, '', 1000, 0),
(46, 'M15046', 'Ahmed Munawar Dua', 1, 'Moulana Monirul Islam Rofiq', 'Fahima Ferdousy Afsana', '', '', 2, 11, '01819315979', '01815511211', 'A-1, Pice Tower, CDA New Chandgaong R/ABohoddar Hat, Ctg.', 'Polly Mastar Para, Vill+P/O-Joishtho Pura, boulkhali, Ctg.', '2015-03-27 16:30:34', 1, 1, '', 1000, 0),
(47, 'M15047', 'Atiqur Rahman Taif', 1, 'Md. Aktar Hossen Chy', 'Nargis Akter', '', '', 3, 17, '01815503487', '01815503487', 'Goni Mia Chy Bari, South Ghat Beg, Rangunia, Ctg.', 'Goni Mia Chy Bari, South Ghat Beg, Rangunia, Ctg.', '2015-03-28 00:30:52', 1, 1, '', 1000, 0),
(48, 'M15048', 'Saydur Rahman Raihan', 1, 'Hasan Dostagir Azad', 'Sultana Akter', '', '', 2, 22, '01711347764', '01726037010', 'Lalkhan Bazar, Ctg.', 'Nowa Khali.', '2015-03-28 00:40:58', 1, 1, '', 0, 0),
(49, 'M15049', 'Kazi Md. Ahnaf Abid', 1, 'Md.Nazimuddin', 'Samina Akter', '', '', 4, 13, '01817716654', '01732450574', 'Rebeka Menssion, 87/A,Shohid sayfuddin kgaled Road, Zamal Khan, Ctg.', 'V-kewcia, P/O-Bytul Izzat, UP- Satkania, Ctg.', '2015-03-28 00:47:55', 1, 1, '', 0, 0),
(50, 'M15050', 'Khubaib bin Ilias', 1, 'Md. Ilias', 'Rohima Akter Rina', '', '', 2, 14, '01814137844', '01814137844', 'Z-4, R-8, B-A, Chandgaong R/A, Bohoddar hat, Ctg.', 'Dorgah Mura, Podua, Ctg.', '2015-03-28 00:53:58', 1, 1, '', 1000, 0),
(51, 'M15051', 'Saad Mohammad Mohsin', 1, 'Mohammad Mohsin', 'Kawsar Zahan', '', '', 2, 16, '01830177057', '01830177057', 'Rebeka Menssion, SA Khaled Road, Joynogor, Zamal Khan, Ctg.', 'V-M. Salim Pur, P/O-Zaforabad, 10,no Union, Sitakunda.', '2015-03-28 01:04:32', 1, 1, '', 2500, 0),
(52, 'M15052', 'Mohammad Abu Sayed', 1, 'Hazi Mohammad Salim', 'Hazi Roksana Begum', '', '', 4, 14, '01730919596', '01816095800', 'A1, Redix Flora Spring, Giridhara R/A, Ambagan, Ctg.', 'A1, Redix Flora Spring, Giridhara R/A, Ambagan, Ctg.', '2015-03-28 01:17:21', 1, 1, '', 0, 0),
(53, 'M15053', 'Kazi Md. Murshidur Rahman', 1, 'Kazi Md. Abdur Rahman', 'Maksuda Mozumdar', '', '', 3, 18, '', '01196288133', 'A-9, Sarah Tawar, 10,Mehedi Bag Road, Mehedi Bag, Ctg.', 'V-Sayed Pur, T-Kachua, Chandpur.', '2015-03-28 01:23:49', 1, 1, '', 1000, 0),
(54, 'M15054', 'Mohammad Ayman Nur', 1, 'Mohammad Rashed', 'Nurjahan', '', '', 3, 20, '01711338515', '01815911611', 'Hali Shohor, Ctg.', 'V- M.Madfarsha, Hathazari, Ctg.', '2015-03-28 01:28:47', 1, 1, '', 1000, 0),
(55, 'M15055', 'Mohammad Ariful Islam', 1, 'Abdul Malek Manik', 'Lutfun Nahar', '', '', 3, 21, '01819861518', '018180250892', '19, K.B. Fazlul Kadert Road, Panchlaish, Ctg.', 'Badar Uddin Bhuia Bari, Airpur, P/O-Chomon Munsir Hat, P/S-Senbag, Noakhali.', '2015-03-28 01:34:30', 1, 1, '', 0, 0),
(56, 'M15056', 'Md. Abid Ullah', 1, 'Md. Habib Ullah', 'Aysha Begum', '', '', 2, 19, '01864794948', '', 'Abu Zafar Road, Caktay Noya Moszid, PO- GPO-4000, P/S- Bakolia, Ctg.', 'DO', '2015-03-28 09:26:57', 1, 1, '', 1000, 0),
(57, 'M15057', 'Md. Mushqur Rahman Sayuf', 1, 'Md. Anamul Hoque', 'Shahin Akter', '', '', 0, 9, '01817798982', '', 'Mistri Para, Askarabad, Ctg.', 'Dokkhin Paindong, Fotik Chori.', '2015-03-28 09:31:56', 1, 1, '', 0, 0),
(58, 'M15036', 'Md. Naymus Siam', 1, 'Md. Nozrul Mia', 'Msd. Rubina Akter', '', '', 1, 17, '01720380481', '01736271053', 'H-99, R-5, Hill View R/A, Ctg.', 'Digonto-88, Uttor Aous para, Tongi, Gazipur.', '2015-03-28 09:36:23', 1, 1, '', 0, 0),
(59, 'M15059', 'Abidur Rahman Ahad', 1, 'Arshadur Rahman', 'Jayda begum Jhorna', '', '', 4, 16, '01819389803', '01832836596', 'Mofizur Rahman Chearmens House, Khaja Road, 18no,Ward Bolirhat, Bakolia, ctg.', 'Do', '2015-03-28 09:41:15', 1, 1, '', 1000, 0),
(60, 'M13007', 'Abrarul Hoque', 1, 'Abul Kasem', 'Kaneta Begum', '', '', 1, 3, '01829382099', '', 'Aocia, Dawdighi, Satkania, Ctg.', 'Do', '2015-03-28 09:48:32', 1, 2, '', 0, 0),
(61, 'M15061', 'Mahdi Hasan Marzuq', 1, 'Pro. Mohammad Ali Hossain', 'Mrs. Zannatul Ferdaous', '', '', 2, 3, '01911914855', '', 'F-5c, Towar Al Mawa, Kusumbag R/A, Khulshi Ctg.', 'Do', '2015-03-28 10:00:19', 1, 2, '', 0, 0),
(62, 'M15062', 'Md. Fabasshir Ibad Siam', 1, 'Md. Shahin Badsha', 'Shamima Nasrin', '', '', 2, 1, '01815467821', '01711133377', 'KIP, Officers Colony,  B-a, R-3, Chandgaong R/A, Ctg.', '2nd Muradpur, Rokeya Vila, PO+Dis- Cumilla.', '2015-03-28 10:20:30', 1, 2, '', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `synctables`
--

CREATE TABLE IF NOT EXISTS `synctables` (
  `TableName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `synctables`
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
-- Структура таблицы `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
`tableId` int(11) NOT NULL,
  `tableName` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Дамп данных таблицы `tables`
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
-- Структура таблицы `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
`id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `acc_group_id` int(11) NOT NULL,
  `ledger_id` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Дамп данных таблицы `transaction`
--

INSERT INTO `transaction` (`id`, `student_id`, `acc_group_id`, `ledger_id`, `debit`, `credit`, `description`, `voucher_type`, `voucher_id`, `created_by`, `date`, `created`, `user_ip`, `modified`, `modified_by`) VALUES
(1, 0, 6, 5, 5000, NULL, 'For Tea cost in Office', 1, 7050335, 2, '2015-03-07', '2015-03-07 11:07:35', '127.0.0.1', '0000-00-00 00:00:00', 0),
(2, 0, 6, 1, NULL, 5000, 'For Tea cost in Office', 1, 7050335, 2, '2015-03-07', '2015-03-07 11:07:35', '127.0.0.1', '0000-00-00 00:00:00', 0),
(3, 0, 7, 1, 1500, NULL, 'Mehedi Hasan class 2', 2, 7050321, 2, '2015-03-07', '2015-03-07 11:08:21', '127.0.0.1', '0000-00-00 00:00:00', 0),
(4, 0, 7, 3, NULL, 1500, 'Mehedi Hasan class 2', 2, 7050321, 2, '2015-03-07', '2015-03-07 11:08:22', '127.0.0.1', '0000-00-00 00:00:00', 0),
(5, 0, 7, 1, 15000, NULL, 'Rabia Basary', 2, 7050344, 2, '2015-03-07', '2015-03-07 11:08:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(6, 0, 7, 3, NULL, 15000, 'Rabia Basary', 2, 7050344, 2, '2015-03-07', '2015-03-07 11:08:44', '127.0.0.1', '0000-00-00 00:00:00', 0),
(11, 0, 2, 2, 5000, NULL, 'Bank theke uttalon', 3, 7050311, 2, '2015-03-07', '2015-03-07 11:13:11', '127.0.0.1', '0000-00-00 00:00:00', 0),
(12, 0, 2, 1, NULL, 5000, 'Bank theke uttalon', 3, 7050311, 2, '2015-03-07', '2015-03-07 11:13:11', '127.0.0.1', '0000-00-00 00:00:00', 0),
(13, 0, 2, 1, 15000, NULL, 'Bank a Joma', 4, 7050324, 2, '2015-03-07', '2015-03-07 11:13:24', '127.0.0.1', '0000-00-00 00:00:00', 0),
(14, 0, 2, 2, NULL, 15000, 'Bank a Joma', 4, 7050324, 2, '2015-03-07', '2015-03-07 11:13:24', '127.0.0.1', '0000-00-00 00:00:00', 0),
(15, 0, 2, 2, 5000, NULL, 'Bank theke uttalon', 3, 8090354, 2, '2015-03-08', '2015-03-08 03:52:54', '127.0.0.1', '0000-00-00 00:00:00', 0),
(16, 0, 2, 1, NULL, 5000, 'Bank theke uttalon', 3, 8090354, 2, '2015-03-08', '2015-03-08 03:52:54', '127.0.0.1', '0000-00-00 00:00:00', 0),
(17, 0, 2, 1, 500, NULL, 'Bank e jomma', 4, 8090306, 2, '2015-03-08', '2015-03-08 03:53:06', '127.0.0.1', '0000-00-00 00:00:00', 0),
(18, 0, 2, 2, NULL, 500, 'Bank e jomma', 4, 8090306, 2, '2015-03-08', '2015-03-08 03:53:06', '127.0.0.1', '0000-00-00 00:00:00', 0),
(19, 0, 6, 5, 150, NULL, 'sdf', 1, 8090334, 2, '2015-03-08', '2015-03-08 03:53:34', '127.0.0.1', '0000-00-00 00:00:00', 0),
(20, 0, 6, 1, NULL, 150, 'sdf', 1, 8090334, 2, '2015-03-08', '2015-03-08 03:53:34', '127.0.0.1', '0000-00-00 00:00:00', 0),
(21, 0, 7, 1, 5400, NULL, 'Mehedi Hasan 2015', 2, 8090349, 2, '2015-03-08', '2015-03-08 03:53:49', '127.0.0.1', '0000-00-00 00:00:00', 0),
(22, 0, 7, 3, NULL, 5400, 'Mehedi Hasan 2015', 2, 8090349, 2, '2015-03-08', '2015-03-08 03:53:49', '127.0.0.1', '0000-00-00 00:00:00', 0),
(23, 0, 10, 7, 25000, NULL, 'sdf', 1, 920874, 2, '2015-03-09', '2015-03-09 07:28:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(24, 0, 10, 1, NULL, 25000, 'sdf', 1, 920874, 2, '2015-03-09', '2015-03-09 07:28:46', '127.0.0.1', '0000-00-00 00:00:00', 0),
(25, 0, 2, 1, 5400, NULL, 'sdf', 2, 256984, 2, '2015-03-10', '2015-03-10 10:32:09', '127.0.0.1', '0000-00-00 00:00:00', 0),
(26, 0, 2, 2, NULL, 5400, 'sdf', 2, 256984, 2, '2015-03-10', '2015-03-10 10:32:09', '127.0.0.1', '0000-00-00 00:00:00', 0),
(27, 0, 2, 6, 2345, NULL, 'sdfsdf', 3, 131379, 2, '2015-03-11', '2015-03-11 12:47:53', '127.0.0.1', '0000-00-00 00:00:00', 0),
(28, 0, 2, 1, NULL, 2345, 'sdfsdf', 3, 131379, 2, '2015-03-11', '2015-03-11 12:47:53', '127.0.0.1', '0000-00-00 00:00:00', 0),
(29, 0, 6, 1, 45, NULL, 'jgj', 2, 843709, 2, '2015-03-13', '2015-03-13 16:55:12', '::1', '0000-00-00 00:00:00', 0),
(30, 0, 6, 5, NULL, 45, 'jgj', 2, 843709, 2, '2015-03-13', '2015-03-13 16:55:12', '::1', '0000-00-00 00:00:00', 0),
(31, 0, 7, 1, 145, NULL, 'uhk', 2, 791800, 2, '2015-03-13', '2015-03-13 16:55:49', '::1', '0000-00-00 00:00:00', 0),
(32, 0, 7, 3, NULL, 145, 'uhk', 2, 791800, 2, '2015-03-13', '2015-03-13 16:55:50', '::1', '0000-00-00 00:00:00', 0),
(33, 0, 2, 2, 2352, NULL, 'bank e jomma', 3, 168484, 2, '2015-03-13', '2015-03-13 16:57:08', '::1', '0000-00-00 00:00:00', 0),
(34, 0, 2, 1, NULL, 2352, 'bank e jomma', 3, 168484, 2, '2015-03-13', '2015-03-13 16:57:08', '::1', '0000-00-00 00:00:00', 0),
(35, 0, 2, 1, 2500, NULL, 'bank theke utalon', 4, 761340, 2, '2015-03-13', '2015-03-13 17:00:30', '::1', '0000-00-00 00:00:00', 0),
(36, 0, 2, 2, NULL, 2500, 'bank theke utalon', 4, 761340, 2, '2015-03-13', '2015-03-13 17:00:30', '::1', '0000-00-00 00:00:00', 0),
(37, 0, 7, 1, 500, NULL, 'lok', 2, 154060, 2, '2015-03-14', '2015-03-14 00:06:06', '::1', '0000-00-00 00:00:00', 0),
(38, 0, 7, 3, NULL, 500, 'lok', 2, 154060, 2, '2015-03-14', '2015-03-14 00:06:06', '::1', '0000-00-00 00:00:00', 0),
(39, 0, 6, 5, 500, NULL, 'klsf', 1, 76824, 2, '2015-03-13', '2015-03-13 11:33:29', '::1', '0000-00-00 00:00:00', 0),
(40, 0, 6, 1, NULL, 500, 'klsf', 1, 76824, 2, '2015-03-13', '2015-03-13 11:33:29', '::1', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `transaction_old`
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
-- Дамп данных таблицы `transaction_old`
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
-- Структура таблицы `users`
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
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`UserName`, `Password`, `FirstName`, `LastName`, `Email`, `Role`, `NavigationId`, `IsActive`, `UserId`) VALUES
('admin', 'admin', 'jasim', 'jasimff', 'jasim@email.com', 1, NULL, 1, 2),
('user', 'user', 'user', 'user', 'user@gmail.com', 2, NULL, 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `voucher_type`
--

CREATE TABLE IF NOT EXISTS `voucher_type` (
`id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `acc_group_type_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `voucher_type`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `columns`
--
ALTER TABLE `columns`
MODIFY `colId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
MODIFY `tableId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
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
