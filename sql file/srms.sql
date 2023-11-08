-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 08:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Usertype` enum('Admin','Faculty','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `Usertype`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'faculty', 'd561c7c03c1f2831904823a95835ff5f', 'Faculty'),
(3, 'faculty2', 'd561c7c03c1f2831904823a95835ff5f', 'Faculty'),
(4, 'faculty3', 'd561c7c03c1f2831904823a95835ff5f', 'Faculty'),
(5, 'faculty4', 'd561c7c03c1f2831904823a95835ff5f', 'Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `phone`, `comments`) VALUES
('Sanjay', 'sanjay@gmail.com', '7598133297', 'completely satisfied with the website'),
('Syed Ashraf', 'syed@gmail.com', '9282942309', 'good\r\n'),
('ramya s', 'ramya9@gmail.com', '1234567890', 'its a good website'),
('RAMYA S', 'ramyasankaran19@gmail.com', '09361115382', 'well done website');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(10) NOT NULL,
  `ClassId` int(10) NOT NULL,
  `SubjectId` int(10) NOT NULL,
  `StudentId` int(10) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `ClassId`, `SubjectId`, `StudentId`, `marks`) VALUES
(1, 6, 7, 91, 32),
(2, 6, 7, 92, 33),
(3, 6, 7, 93, 34),
(4, 4, 5, 0, 19);

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `pdf` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`pdf`) VALUES
('ramy.pdf'),
('ramy.pdf'),
('navi.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `revaluation`
--

CREATE TABLE `revaluation` (
  `Roll` varchar(40) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `reason` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revaluation`
--

INSERT INTO `revaluation` (`Roll`, `class`, `subject`, `reason`) VALUES
('007', '7', 'Mathematics-II', 'I have written well,I expect more marks I am not satisfied with this mark'),
('007', '7', 'Engineering Physics', 'I have written well,I expect more marks I am not satisfied with this mark'),
('007', '7', 'Programming in C', 'I have written well,I expect more marks I am not satisfied with this mark'),
('007', '7', 'Technical English', 'I have written well,I expect more marks I am not satisfied with this mark'),
('007', '7', 'Mathematics-II', ''),
('007', '7', 'Programming in C', ''),
('007', '7', 'Mathematics-II', 'not satisfied'),
('007', '7', 'Engineering Physics', 'not satisfied'),
('001', '7', 'Mathematics-II', 'not satisfied'),
('001', '7', 'Engineering Physics', 'not satisfied'),
('001', '6', 'Chemistry', 'not satisfiedwith the results obtained '),
('001', '6', 'Mathematics-I', 'not satisfiedwith the results obtained ');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` varchar(10) DEFAULT NULL,
  `Section` varchar(10) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(6, 'First Year', 'CSE', 'I', '2022-01-21 15:13:04', '2022-01-22 14:51:00'),
(7, 'Second Year', 'CSE', 'II', '2022-01-21 16:13:51', '2022-01-22 14:51:11'),
(8, 'Third Year', 'CSE', 'III', '2022-01-21 15:16:05', '2022-01-22 14:51:21'),
(9, 'Fourth Year', 'CSE', 'IV', '2022-01-21 16:17:32', '2022-01-22 14:51:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(1, 8, 6, 3, 80, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(2, 8, 6, 1, 80, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(3, 8, 6, 4, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(4, 8, 6, 2, 80, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(5, 9, 6, 3, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(6, 9, 6, 1, 91, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(7, 9, 6, 4, 92, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(8, 9, 6, 2, 93, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(9, 6, 6, 3, 100, '2022-02-12 09:48:48', '2022-02-12 09:48:48'),
(10, 6, 6, 1, 99, '2022-02-12 09:48:49', '2022-02-12 09:48:49'),
(11, 6, 6, 4, 98, '2022-02-12 09:48:49', '2022-02-12 09:48:49'),
(12, 6, 6, 2, 97, '2022-02-12 09:48:49', '2022-02-12 09:48:49'),
(13, 7, 6, 3, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(14, 7, 6, 1, 92, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(15, 7, 6, 4, 89, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(16, 7, 6, 2, 95, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(17, 10, 7, 6, 94, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(18, 10, 7, 5, 89, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(19, 10, 7, 7, 88, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(20, 10, 7, 8, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(21, 11, 7, 6, 64, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(22, 11, 7, 5, 64, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(23, 11, 7, 7, 64, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(24, 11, 7, 8, 64, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(25, 12, 7, 6, 92, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(26, 12, 7, 5, 89, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(27, 12, 7, 7, 79, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(28, 12, 7, 8, 88, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(29, 13, 7, 6, 88, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(30, 13, 7, 5, 92, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(31, 13, 7, 7, 89, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(32, 13, 7, 8, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(33, 14, 8, 11, 88, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(34, 14, 8, 12, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(35, 14, 8, 10, 79, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(36, 14, 8, 9, 85, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(37, 16, 8, 11, 87, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(38, 16, 8, 12, 82, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(39, 16, 8, 10, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(40, 16, 8, 9, 81, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(41, 15, 8, 11, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(42, 15, 8, 12, 89, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(43, 15, 8, 10, 92, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(44, 15, 8, 9, 85, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(45, 17, 8, 11, 89, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(46, 17, 8, 12, 85, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(47, 17, 8, 10, 79, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(48, 17, 8, 9, 81, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(49, 18, 9, 14, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(50, 18, 9, 16, 89, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(51, 18, 9, 15, 85, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(52, 18, 9, 13, 93, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(53, 19, 9, 14, 88, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(54, 19, 9, 16, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(55, 19, 9, 15, 85, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(56, 19, 9, 13, 92, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(57, 20, 9, 14, 87, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(58, 20, 9, 16, 90, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(59, 20, 9, 15, 81, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(60, 20, 9, 13, 88, '2022-01-21 15:06:48', '2022-01-21 15:06:48'),
(63, 21, 9, 13, 100, '2022-02-04 07:01:31', '2022-02-04 07:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) DEFAULT NULL,
  `RollId` varchar(100) DEFAULT NULL,
  `StudentEmail` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DOB` varchar(100) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `StudentEmail`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(6, 'Sanjay K', '001', 'sanjay@gmail.com', 'Male', '2001-12-29', 6, '2021-10-05 04:05:46', NULL, 1),
(7, 'Syed Ashraf N', '002', 'ashraf@gmail.com', 'Male', '2001-09-14', 6, '2021-10-05 04:06:29', NULL, 1),
(8, 'Akshaya K', '003', 'akshaya@gmail.com', 'Female', '2002-01-01', 6, '2021-10-05 04:07:25', NULL, 1),
(9, 'Bhavani K', '004', 'bhavani@gmail.com', 'Female', '2002-02-02', 6, '2021-10-05 04:08:07', NULL, 1),
(10, 'Dinesh S', '005', 'dinesh@gmail.com', 'Male', '2002-07-27', 7, '2021-10-05 04:09:23', NULL, 1),
(11, 'Ezhumalai K', '006', 'ezhumalai@gmail.com', 'Male', '2002-03-03', 7, '2021-10-05 04:10:49', NULL, 1),
(12, 'Madumitha M', '007', 'madumitha@gmail.com', 'Female', '2002-04-04', 7, '2021-10-05 04:13:32', '2022-02-05 06:17:58', 1),
(13, 'Nivedha R', '008', 'nivedha@gmail.com', 'Female', '2002-05-05', 7, '2021-10-05 04:14:12', NULL, 1),
(14, 'Gokul P', '009', 'gokul@gmail.com', 'Male', '2002-06-06', 8, '2021-10-05 04:19:36', NULL, 1),
(15, 'Pranesh C', '010', 'pranesh@gmail.com', 'Male', '2002-05-21', 8, '2021-10-05 04:20:24', NULL, 1),
(16, 'Pavithra C', '011', 'pavithra@gmail.com', 'Female', '2002-04-02', 8, '2021-10-05 04:21:21', NULL, 1),
(17, 'Ramya S', '012', 'ramya@gmail.com', 'Female', '2002-07-16', 8, '2021-10-05 04:22:25', NULL, 1),
(18, 'Kodeeswaran M', '013', 'kodeeswaran@gmail.com', 'Male', '2000-10-04', 9, '2021-10-05 04:23:27', NULL, 1),
(19, 'Ranjith R', '014', 'ranjith@gmail.com', 'Male', '2002-06-23', 9, '2021-10-05 04:24:19', NULL, 1),
(20, 'Savitha R', '015', 'savitha@gmail.com', 'Female', '1999-10-25', 9, '2021-10-05 04:25:23', NULL, 1),
(21, 'Sowfiya Begum A', '016', 'sowfiya@gmail.com', 'Female', '1999-11-12', 9, '2021-10-05 04:26:14', NULL, 1),
(22, 'chandi', '017', 'abc@gmail.com', 'Female', '2001-01-01', 9, '2022-01-24 16:50:27', '2022-02-05 06:33:03', 1),
(23, 'yeshuma', '18', 'yesh@gmail.com', 'Female', '2001-02-02', 9, '2022-02-05 04:06:47', '2022-02-05 06:33:04', 0),
(24, 'sanku', '19', 'sanku@gmail.com', 'Male', '2001-03-03', 10, '2022-02-05 04:06:47', '2022-02-05 06:33:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updationdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 6, 1, 1, '2022-01-21 15:17:32', '2022-01-29 06:48:20'),
(2, 6, 2, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(3, 6, 3, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(4, 6, 4, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(5, 7, 5, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(6, 7, 6, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(7, 7, 7, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(8, 7, 8, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(9, 8, 9, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(10, 8, 10, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(11, 8, 11, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(12, 8, 12, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(13, 9, 13, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(14, 9, 14, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(15, 9, 15, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(16, 9, 16, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(17, 6, 33, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(18, 7, 35, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(19, 8, 36, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(20, 9, 38, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(21, 8, 36, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32'),
(22, 8, 36, 1, '2022-01-21 15:17:32', '2022-01-21 15:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) DEFAULT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Chemistry', '101', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(2, 'Mathematics-I', '102', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(3, 'Basic Electrical  Engineering', '103', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(4, 'Engineering Graphics', '104', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(5, 'Mathematics-II', '201', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(6, 'Engineering Physics', '202', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(7, 'Programming in C', '203', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(8, 'Technical English', '204', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(9, 'Mathematics-III', '301', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(10, 'Digital Principles', '302', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(11, 'C++ and Java', '303', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(12, 'Data Structures', '304', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(13, 'Probability', '401', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(14, 'Computer Organization', '402', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(15, 'Operating System', '403', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(16, 'Database Management', '404', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(33, 'Chemistry Lab', '005', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(35, 'Physics Lab', '205', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(37, 'Professsional Ethics', '305', '2022-01-21 15:15:42', '2022-01-21 15:15:42'),
(38, 'Designs and Analysis of Algorithms', '405', '2022-01-21 15:15:42', '2022-01-21 15:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`) VALUES
('Naveena', 'naveejai19@gmail.com'),
('Ramya', 'ramyasankaran19@gmail.com'),
('sarvan', 'skhema444@gmail.com'),
('Yeshoda', 'yeshodasankaran10@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
