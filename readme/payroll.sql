-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2014 at 10:04 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `username` varchar(50) COLLATE ascii_bin NOT NULL,
  `password` varchar(50) COLLATE ascii_bin NOT NULL,
  `activate` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `empId`, `username`, `password`, `activate`) VALUES
(1, 1, 'clement', 'admin1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `compId` int(11) NOT NULL AUTO_INCREMENT,
  `compName` varchar(255) COLLATE ascii_bin NOT NULL,
  `address` varchar(255) COLLATE ascii_bin NOT NULL,
  `registrationNo` varchar(100) COLLATE ascii_bin NOT NULL,
  `numberOfEmp` int(11) NOT NULL,
  `levelOne` int(11) NOT NULL,
  `levelTwo` int(11) NOT NULL,
  `levelThree` int(11) NOT NULL,
  `levelFour` int(11) NOT NULL,
  `levelFive` int(11) NOT NULL,
  PRIMARY KEY (`compId`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`compId`, `compName`, `address`, `registrationNo`, `numberOfEmp`, `levelOne`, `levelTwo`, `levelThree`, `levelFour`, `levelFive`) VALUES
(1, 'Rescoden Company International', 'Post Office Box 24 , Kumasi Ghana', 'GH123344', 6, 9, 60, 45, 80, 69);

-- --------------------------------------------------------

--
-- Table structure for table `emplog`
--

CREATE TABLE IF NOT EXISTS `emplog` (
  `empLogId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `username` varchar(50) COLLATE ascii_bin NOT NULL,
  `password` varchar(50) COLLATE ascii_bin NOT NULL,
  `activate` tinyint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`empLogId`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `emplog`
--

INSERT INTO `emplog` (`empLogId`, `empId`, `username`, `password`, `activate`) VALUES
(1, 2, 'employee', 'emp1', 1),
(4, 1, 'solomon', 'kingot', 1),
(6, 6, 'appiah', 'b2086154f101464aab3328ba7e060deb', 0),
(7, 7, 'blessed', 'bless', 1),
(8, 8, 'sharaf', 'king', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `empId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE ascii_bin NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(50) COLLATE ascii_bin NOT NULL,
  `level` int(10) NOT NULL,
  `designation` varchar(100) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`empId`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empId`, `name`, `phone`, `email`, `level`, `designation`) VALUES
(1, 'Appiah Osei Tutu', 4674674, 'ot.clement@gmail.com', 2, 'Designer'),
(2, 'Clement Osei Tutu', 51301310, 'ot.clement@gmail.com', 3, 'Web Master'),
(3, 'Appiah Stephen', 244301310, 'appiah@gmail.com', 1, 'Designer'),
(4, 'Michael Amponsem', 24330123, 'ot.solo@gmail.com', 5, 'Administrator'),
(5, 'David Okang', 24330123, 'david@gmail.com', 5, 'System Analyst'),
(6, 'Solomon Otoo', 512365376, 'at@gmail.com', 4, 'Web Master'),
(7, 'Baddo Blessed Lord', 248493724, 'ste@gmail.com', 4, 'Data Manager'),
(8, 'Amira Osei Tutu', 24367893, 'amira@gmail.com', 3, 'Secretary');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `inboxId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `username` varchar(255) COLLATE ascii_bin NOT NULL,
  `title` varchar(255) COLLATE ascii_bin NOT NULL,
  `content` longtext COLLATE ascii_bin NOT NULL,
  `viewed` enum('0','1') COLLATE ascii_bin NOT NULL DEFAULT '0',
  `recievedDate` varchar(255) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`inboxId`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=66 ;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`inboxId`, `empId`, `username`, `title`, `content`, `viewed`, `recievedDate`) VALUES
(44, 1, 'Appiah Stephen', 'Hi man', 'thanks', '0', '3rd December 2014, 7:01:31 am'),
(45, 1, 'Appiah Stephen', 'man', 'your welcome', '0', '3rd December 2014, 7:02:30 am'),
(47, 1, 'Appiah Stephen', 'hello Appiah', 'Hi', '0', '3rd December 2014, 11:10:32 am'),
(48, 5, 'Appiah Osei Tutu', 'hi David', 'how are you', '0', '3rd December 2014, 11:42:54 am'),
(53, 3, 'Appiah Osei Tutu', 'yes', 'yes', '', '3rd December 2014, 12:45:48 pm'),
(54, 3, 'Appiah Osei Tutu', 'Dear Sir,', 'I''m glad to inform you that , the system is now working perfectly', '', '3rd December 2014, 1:10:02 pm'),
(55, 2, 'Appiah Stephen', 'Congratulation', 'you are welcome to Rescoden Company Internation.Enjoy working with us', '', '3rd December 2014, 1:30:48 pm'),
(56, 1, 'Clement Osei Tutu', 'Hi Appiah', 'I like for you to know that', '', '3rd December 2014, 1:52:50 pm'),
(57, 2, 'Appiah Osei Tutu', 'Money come', 'come take your', '', '3rd December 2014, 1:55:46 pm'),
(58, 3, 'Clement Osei Tutu', 'Delay to pay our salary', 'Please we would like to know when you will pay our salary', '', '3rd December 2014, 1:56:58 pm'),
(61, 0, 'Appiah Stephen', 'all again', 'all agin', '', '3rd December 2014, 5:46:54 pm'),
(62, 1, 'Clement Osei Tutu', 'Fund Raising', 'manager ', '', '3rd December 2014, 6:00:34 pm'),
(63, 3, 'Clement Osei Tutu', 'Allowance Enquiry', 'We would like to know the the status of our allowances', '', '3rd December 2014, 6:02:07 pm'),
(64, 7, 'Appiah Osei Tutu', 'Hey Boi', 'How are you doing', '', '3rd December 2014, 8:17:32 pm'),
(65, 7, 'Appiah Stephen', 'Thanks', 'Thanks Blessed for your good work...keep it up!', '', '6th December 2014, 4:19:37 pm');

-- --------------------------------------------------------

--
-- Table structure for table `managerlog`
--

CREATE TABLE IF NOT EXISTS `managerlog` (
  `managerId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `username` varchar(50) COLLATE ascii_bin NOT NULL,
  `password` varchar(50) COLLATE ascii_bin NOT NULL,
  `activate` int(11) NOT NULL,
  PRIMARY KEY (`managerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `managerlog`
--

INSERT INTO `managerlog` (`managerId`, `empId`, `username`, `password`, `activate`) VALUES
(1, 3, 'manager', 'manager1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `outboxId` int(11) NOT NULL AUTO_INCREMENT,
  `empId` int(11) NOT NULL,
  `username` varchar(255) COLLATE ascii_bin NOT NULL,
  `title` varchar(255) COLLATE ascii_bin NOT NULL,
  `content` longtext COLLATE ascii_bin NOT NULL,
  `sendDate` varchar(255) COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`outboxId`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=121 ;

--
-- Dumping data for table `outbox`
--

INSERT INTO `outbox` (`outboxId`, `empId`, `username`, `title`, `content`, `sendDate`) VALUES
(102, 3, 'Appiah Stephen', 'hello Appiah', 'Hi', '3rd December 2014, 11:10:32 am'),
(105, 1, 'Appiah Osei Tutu', 'Hi manager', 'How are you doing?', '3rd December 2014, 12:01:04 pm'),
(106, 3, 'Appiah Stephen', 'Hi Administrator', 'get me the index number of A', '3rd December 2014, 12:07:40 pm'),
(107, 1, 'Appiah Osei Tutu', 'Hi Manager,', 'I would like you to know ', '3rd December 2014, 12:12:32 pm'),
(108, 1, 'Appiah Osei Tutu', 'yes', 'yes', '3rd December 2014, 12:45:48 pm'),
(109, 1, 'Appiah Osei Tutu', 'Dear Sir,', 'I''m glad to inform you that , the system is now working perfectly', '3rd December 2014, 1:10:02 pm'),
(110, 3, 'Appiah Stephen', 'Congratulation', 'you are welcome to Rescoden Company Internation.Enjoy working with us', '3rd December 2014, 1:30:48 pm'),
(112, 1, 'Appiah Osei Tutu', 'Money come', 'come take your', '3rd December 2014, 1:55:46 pm'),
(113, 2, 'Clement Osei Tutu', 'Delay to pay our salary', 'Please we would like to know when you will pay our salary', '3rd December 2014, 1:56:58 pm'),
(117, 2, 'Clement Osei Tutu', 'Fund Raising', 'manager ', '3rd December 2014, 6:00:34 pm'),
(118, 2, 'Clement Osei Tutu', 'Allowance Enquiry', 'We would like to know the the status of our allowances', '3rd December 2014, 6:02:07 pm'),
(119, 1, 'Appiah Osei Tutu', 'Hey Boi', 'How are you doing', '3rd December 2014, 8:17:32 pm'),
(120, 3, 'Appiah Stephen', 'Thanks', 'Thanks Blessed for your good work...keep it up!', '6th December 2014, 4:19:37 pm');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
  `payrollId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE ascii_bin NOT NULL,
  `empId` int(11) NOT NULL,
  `date` varchar(255) COLLATE ascii_bin NOT NULL,
  `basicSalary` int(11) NOT NULL,
  `numOfLeaves` int(11) NOT NULL,
  `salaryPerDay` int(11) NOT NULL,
  `deduction` int(11) NOT NULL,
  `netSalary` int(11) NOT NULL,
  PRIMARY KEY (`payrollId`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=90 ;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payrollId`, `name`, `empId`, `date`, `basicSalary`, `numOfLeaves`, `salaryPerDay`, `deduction`, `netSalary`) VALUES
(36, 'Clement Osei Tutu', 2, '11/26/2014', 3600, 5, 120, 600, 3000),
(37, 'Clement Osei Tutu', 2, '11/27/2014', 3600, 10, 120, 600, 3000),
(38, 'Clement Osei Tutu', 2, '11/26/2014', 3600, 10, 120, 1200, 2400),
(39, 'Clement Osei Tutu', 2, '11/26/2014', 3600, 10, 120, 1200, 2400),
(41, ' Appiah Osei Tutu', 1, '11/27/2014', 2070, 10, 69, 828, 1242),
(42, ' Appiah Osei Tutu', 1, '11/26/2014', 2070, 12, 69, 690, 1380),
(87, 'Baddo Blessed Lord', 7, '12/09/2014', 2400, 6, 80, 480, 1920),
(88, 'Baddo Blessed Lord', 7, '12/09/2014', 2400, 7, 80, 560, 1840),
(89, 'Clement Osei Tutu', 2, '12/09/2014', 1350, 8, 45, 360, 990);
