-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 06:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yogveda`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `chac_name` varchar(100) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `police_number` bigint(20) NOT NULL,
  `police_link` varchar(300) NOT NULL,
  `police_add` varchar(300) NOT NULL,
  `chac_add` varchar(300) NOT NULL,
  `password` varchar(15) NOT NULL,
  `chac_phone` bigint(20) NOT NULL,
  `state` varchar(25) NOT NULL,
  `dist` varchar(30) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`chac_name`, `admin_name`, `police_number`, `police_link`, `police_add`, `chac_add`, `password`, `chac_phone`, `state`, `dist`, `zipcode`) VALUES
('a1', '', 8310577, '', 'BANEEKERI NIVASA 3RD RIGHT CROSS SARVAJNA NAGARA OLD BOMMANAKATTE SHIMOGA', '', '123456', 123, 'Karnataka', '', 577204),
('a1', 'sa', 8310577556, 'sadasdsd', 'BANEEKERI NIVASA 3RD RIGHT CROSS SARVAJNA NAGARA OLD BOMMANAKATTE SHIMOGA', '', '123456', 8310577556, 'Karnataka', '', 577204);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CID` int(11) NOT NULL,
  `AID` bigint(20) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `i_name` varchar(250) NOT NULL,
  `i_phone` bigint(20) NOT NULL,
  `i_email` varchar(250) NOT NULL,
  `uses` varchar(250) NOT NULL,
  `app` varchar(250) NOT NULL,
  `v_count` int(11) NOT NULL,
  `v_dur` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL,
  `desct` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CID`, `AID`, `c_name`, `i_name`, `i_phone`, `i_email`, `uses`, `app`, `v_count`, `v_dur`, `level`, `desct`) VALUES
(1, 8310577556, 'ahha', 'Shrihari Kallapur ', 8310577556, 'shriharivkallapur@gmail.com', 'Ayurveda', 'ju;', 2, '25052', 'Beginner', ''),
(2, 123456789, 'shrihari ', 'Kallapur ', 123456789, 'shriharivkallapur@gmail.com', 'Ayurveda', 'dont know', 6, '8', 'Advance', ''),
(3, 123456789, 'shrihari ', 'Kallapur ', 8310577556, 'shriharivkallapur@gmail.com', 'Ayurveda', 'dont know', 12, '1223', 'Beginner', ''),
(7, 8310577556, 'shrihari ', 'Kallapur ', 8310577556, 'shriharivkallapur@gmail.com', 'Ayurveda', 'dont know', 10, '122', 'Intermediate', ''),
(8, 8310577556, 'shrihari ', 'Kallapur ', 8310577556, 'shriharivkallapur@gmail.com', 'Ayurveda', 'dont know', 10, '122', 'Intermediate', ''),
(9, 8310577556, 'shrihari ', 'Kallapur ', 8310577556, 'shriharivkallapur@gmail.com', 'Ayurveda', 'dont know', 10, '122', 'Intermediate', ''),
(10, 8310577556, 'shrihari ', 'Kallapur ', 8310577556, 'shriharivkallapur@gmail.com', 'Ayurveda', 'dont know', 10, '122', 'Intermediate', ''),
(11, 8310577556, 'shrihari ', 'Kallapur ', 8310577556, 'shriharivkallapur@gmail.com', 'Ayurveda', 'dont know', 10, '122', 'Intermediate', ''),
(12, 8310577556, 'shrihari ', 'Kallapur ', 8310577556, 'shriharivkallapur@gmail.com', 'Ayurveda', 'dont know', 1, '122', 'Advance', '');

-- --------------------------------------------------------

--
-- Table structure for table `c_vided`
--

CREATE TABLE `c_vided` (
  `VID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `Title` varchar(500) NOT NULL,
  `v_num` int(11) NOT NULL,
  `descr` varchar(500) NOT NULL,
  `paths` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `c_vided`
--

INSERT INTO `c_vided` (`VID`, `CID`, `Title`, `v_num`, `descr`, `paths`) VALUES
(1, 12, 'rwrrwr', 2147483647, '11gfngfngfngfn', 'course_video/120.ts'),
(2, 12, 'rwrrwr', 2147483647, '11gfngfngfngfn', 'course_video/120.ts'),
(3, 12, 'rwrrwr', 2147483647, '11gfngfngfngfn', 'course_video/120.ts'),
(5, 1, 'intro 2', 2, 'hello', 'course_video/1.mp4'),
(6, 1, 'hello', 1, 'this is about course 1', 'course_video/0.mp4'),
(7, 1, 'hello 2', 2, 'this is about course 1', 'course_video/1.mp4'),
(8, 1, 'hello', 1, 'this is about course 1', 'course_video/10.mp4'),
(9, 1, 'hello', 1, 'this is about course 1', 'course_video/11.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `vnum` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `checked` varchar(3) NOT NULL,
  `answer` longtext NOT NULL,
  `qns` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ID`, `UID`, `CID`, `vnum`, `name`, `checked`, `answer`, `qns`) VALUES
(1, 7892, 1, 1, 'pranav', 'don', 'yes', 'ewfds?');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `phone`, `address`, `state`, `dist`, `zip`) VALUES
('Pranav', 'npranavrnayak@gmail.com', '123456', 7892, '201 Hitha Harmony Building Shridevi Hospital', 'Karnataka', '', 576201);

-- --------------------------------------------------------

--
-- Table structure for table `user_course`
--

CREATE TABLE `user_course` (
  `ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `UID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_course`
--

INSERT INTO `user_course` (`ID`, `CID`, `UID`) VALUES
(1, 1, 7892),
(2, 12, 7892);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`chac_phone`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `c_vided`
--
ALTER TABLE `c_vided`
  ADD PRIMARY KEY (`VID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`phone`);

--
-- Indexes for table `user_course`
--
ALTER TABLE `user_course`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `c_vided`
--
ALTER TABLE `c_vided`
  MODIFY `VID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_course`
--
ALTER TABLE `user_course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
