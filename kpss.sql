-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 03:30 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kpss`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE IF NOT EXISTS `batch` (
`bid` int(11) NOT NULL,
  `bname` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`bid`, `bname`) VALUES
(1, 'First Batch'),
(2, '2nd Batch'),
(3, '3rd Batch'),
(4, '4th Batch'),
(5, '5th Batch'),
(6, '6th Batch'),
(7, '7th Batch'),
(8, '8th Batch'),
(9, '9th Batch');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `post` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `cid`, `uid`, `post`, `time`) VALUES
(1, 2, 2, 'yes', '0000-00-00 00:00:00'),
(2, 2, 3, 'hmm', '2016-12-09 06:27:13'),
(3, 2, 11, 'hello', '2016-12-09 06:44:23'),
(4, 2, 1, 'like', '2016-12-09 08:21:37'),
(5, 2, 12, 'yhhh', '2016-12-09 08:49:15'),
(6, 2, 13, '568768', '2016-12-09 09:00:45'),
(13, 2, 1, 'done', '2016-12-09 11:38:03'),
(14, 2, 1, 'ddone', '2016-12-09 11:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE IF NOT EXISTS `complaint` (
`id` int(8) NOT NULL,
  `uid` int(11) NOT NULL,
  `post` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approve` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `uid`, `post`, `time`, `approve`) VALUES
(1, 1, 'Net Speed Problem Net Speed Problem Net', '2016-12-22 00:00:00', 1),
(2, 1, 'New Building', '2016-12-24 00:00:00', 1),
(5, 11, 'what`s going on', '2016-12-11 18:28:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`courseid` int(5) NOT NULL,
  `cname` varchar(86) NOT NULL,
  `ccode` varchar(11) NOT NULL,
  `tid` int(4) NOT NULL,
  `semid` int(2) NOT NULL,
  `credit` float NOT NULL,
  `ctype` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `cname`, `ccode`, `tid`, `semid`, `credit`, `ctype`) VALUES
(1, 'English Foundation I', 'ENG 111', 1, 1, 2, 0),
(2, 'Differential and Integral Calculus', 'MAT 111', 2, 1, 3, 0),
(3, 'English Foundation II', 'ENG 121', 1, 2, 2, 0),
(4, 'Electrical Circuits', 'CSE 121', 2, 2, 3, 0),
(5, 'Discrete Mathematics', 'CSE 131', 2, 3, 3, 0),
(6, 'Object Oriented Programming', 'CSE 133', 2, 3, 3, 0),
(7, 'Physics I Lab', 'PHY 112', 3, 1, 1, 1),
(8, 'Electrical Circuits Lab', 'CSE 122', 2, 2, 1, 1),
(9, 'Object Oriented Programming Lab', 'CSE 134', 2, 3, 1.5, 1),
(10, 'Data Structures Lab', 'CSE 212', 3, 2, 1.5, 1),
(11, 'Computer Application Lab', 'CSE 112', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crsemester`
--

CREATE TABLE IF NOT EXISTS `crsemester` (
`id` int(11) NOT NULL,
  `crsemid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crsemester`
--

INSERT INTO `crsemester` (`id`, `crsemid`, `sid`) VALUES
(1, 2, 141311039),
(2, 9, 141311042),
(3, 9, 141311044),
(4, 9, 141311057),
(5, 1, 14115445),
(6, 2, 14115468),
(8, 3, 14115432),
(9, 1, 14115886),
(10, 4, 14115486),
(11, 6, 14115549),
(12, 2, 14115538),
(13, 3, 14115578),
(14, 1, 2147483647),
(15, 1, 4745675);

-- --------------------------------------------------------

--
-- Table structure for table `lresults`
--

CREATE TABLE IF NOT EXISTS `lresults` (
`rid` int(5) NOT NULL,
  `sid` int(12) NOT NULL,
  `semid` int(2) NOT NULL,
  `crsid` int(5) NOT NULL,
  `atten` float NOT NULL,
  `asses` float NOT NULL,
  `ltest` float NOT NULL,
  `acredit` float NOT NULL,
  `GPA` float NOT NULL,
  `grade` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lresults`
--

INSERT INTO `lresults` (`rid`, `sid`, `semid`, `crsid`, `atten`, `asses`, `ltest`, `acredit`, `GPA`, `grade`) VALUES
(1, 141311039, 1, 7, 8, 40, 34, 3, 4, 'A+'),
(2, 14115886, 1, 2, 8, 0, 0, 0, 0, 'F'),
(3, 14115538, 2, 10, 7, 44, 34, 2, 4, 'A+'),
(4, 141311039, 1, 11, 8, 40, 34, 3, 4, 'A+'),
(5, 14115432, 3, 9, 7, 4, 2, 0, 0, 'F'),
(6, 14115578, 3, 9, 3, 4, 2, 0, 0, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
`id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `msg`, `sender`, `receiver`, `time`, `read`) VALUES
(1, '', 1, 11, '2016-12-14 18:51:16', 0),
(2, 'hhh', 1, 11, '2016-12-14 18:51:16', 0),
(3, 'pppp', 1, 11, '2016-12-14 18:51:16', 0),
(4, 'jhftft', 1, 12, '2016-12-14 18:51:16', 0),
(5, 'hhftydrses', 1, 0, '2016-12-14 18:51:16', 0),
(6, 'gvtf5rdf5d', 1, 11, '2016-12-14 18:51:16', 0),
(7, 'bvtfrd', 1, 12, '2016-12-14 18:51:16', 0),
(8, 'hello', 1, 13, '2016-12-14 18:51:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`semid` int(4) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `tcredit` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semid`, `semester`, `tcredit`) VALUES
(1, 'First Semester', 13),
(2, '2nd Semester', 13.5),
(3, '3rd Semester', 11.5),
(4, '4th Semester', 0),
(5, '5th Semester', 0),
(6, '6th Semester', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tresults`
--

CREATE TABLE IF NOT EXISTS `tresults` (
`rid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `semid` int(11) NOT NULL,
  `crsid` int(11) NOT NULL,
  `atten` float NOT NULL,
  `assign` float NOT NULL,
  `ctest` float NOT NULL,
  `mid` float NOT NULL,
  `fnal` float DEFAULT NULL,
  `acredit` float NOT NULL,
  `GPA` float NOT NULL,
  `grade` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64785 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tresults`
--

INSERT INTO `tresults` (`rid`, `sid`, `semid`, `crsid`, `atten`, `assign`, `ctest`, `mid`, `fnal`, `acredit`, `GPA`, `grade`) VALUES
(90, 141311039, 1, 1, 8, 7, 8, 24, 34, 2, 4, 'A+'),
(94, 141311039, 2, 3, 6, 5, 2, 12, 14, 1, 0, 'F'),
(103, 141311039, 1, 2, 7, 7, 8, 24, 0, 3, 2.25, 'C'),
(104, 14115538, 3, 7, 7, 7, 6, 22, 24, 2, 2, 'D'),
(64781, 14115886, 1, 1, 8, 2, 4, 3, 4, 0, 0, 'F'),
(64782, 14115538, 2, 4, 4, 3, 4, 2, 4, 0, 0, 'F'),
(64783, 2147483647, 1, 2, 2, 4, 3, 4, 2, 0, 0, 'F'),
(64784, 14115578, 3, 9, 8, 7, 2, 4, 3, 0, 0, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `batch` int(11) DEFAULT NULL,
  `birth` date NOT NULL,
  `mob` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `utype` int(1) NOT NULL DEFAULT '3'
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `name`, `batch`, `birth`, `mob`, `email`, `pass`, `utype`) VALUES
(1, 101, 'Admin', 0, '1994-06-18', '01724867557', 'admin@kpss.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(2, 102, 'Teacher-1', 0, '1988-10-26', '01856742862', 'teacher1@kpss.com', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(3, 104, 'Teacher 2', 0, '1984-08-20', '01712649758', 'teacher2@kpss.com', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(11, 141311039, 'Parvez', 3, '1994-06-18', '01719130600', 'samsadur@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(12, 141311042, 'Kasid', 3, '1995-01-22', '017170143168', 'kasid.raj@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(13, 141311044, 'Shishir', 5, '1994-06-16', '01689754206', '', '81dc9bdb52d04dc20036dbd8313ed055', 3),
(14, 141311057, 'Shuvo', 5, '1992-06-18', '016769559292', '', '74be16979710d4c4e7c6647856088456', 3),
(61, 103, 'Admin 2', 0, '1988-06-16', '01712574757', 'admin2@kpss.com', '81dc9bdb52d04dc20036dbd8313ed055', 1),
(88, 14115445, 'Tanvir', 8, '2016-11-18', '01719134782', 'tanivir@gmail.com', '2bc5ab42d10fac4437fcc89b19b05dd8', 3),
(89, 14115468, 'Sumon', 8, '2016-11-18', '01719134788', 'sumon@gmail.com', '37075e5652f56df3a1b63f552d1059c4', 3),
(90, 14115468, 'Gibon', 8, '2016-11-18', '01719134482', 'gibon@gmail.com', '133eb4575dc58ef51c31b9c35fda6a94', 3),
(91, 14115432, 'Razon', 8, '2016-11-18', '01719132864', 'razon@gmail.com', 'eaa169823508229cd978c53227f9f0be', 3),
(92, 14115886, 'Sohag', 7, '2016-11-18', '01719135723', 'sohag@gmail.com', 'defeff83bc4f22135369f1dfd3dee29b', 3),
(93, 14115486, 'Galib', 7, '2016-11-18', '01719135723', 'galib@gmail.com', '1fa5facc0119f663756a19c2a659b0bf', 3),
(94, 14115549, 'Nasir', 7, '2016-11-18', '01719138764', 'nasir@gmail.com', '189c8a7af337cf23db2f2b8901dcb06b', 3),
(95, 14115538, 'Shajib', 7, '1992-11-18', '01719137328', 'shajib@gmail.com', '70028658328c3c71ddca24240df7cf3d', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
 ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`courseid`), ADD KEY `courseid` (`ccode`);

--
-- Indexes for table `crsemester`
--
ALTER TABLE `crsemester`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `sid` (`sid`);

--
-- Indexes for table `lresults`
--
ALTER TABLE `lresults`
 ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`semid`);

--
-- Indexes for table `tresults`
--
ALTER TABLE `tresults`
 ADD PRIMARY KEY (`rid`), ADD KEY `subid` (`crsid`), ADD KEY `studid` (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `courseid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `crsemester`
--
ALTER TABLE `crsemester`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `lresults`
--
ALTER TABLE `lresults`
MODIFY `rid` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `semid` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tresults`
--
ALTER TABLE `tresults`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64785;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
