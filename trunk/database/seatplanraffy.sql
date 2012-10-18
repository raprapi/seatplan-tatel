-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2012 at 01:41 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seatplanraffy`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `userpass` varchar(45) NOT NULL,
  `userlevel` int(10) unsigned NOT NULL,
  `stud_id` int(10) unsigned NOT NULL,
  `notif` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `userpass`, `userlevel`, `stud_id`, `notif`) VALUES
(1, 'b', '92eb5ffee6ae2fec3ad71c777531578f', 1, 2, 0),
(2, 'g', 'b2f5ff47436671b6e533d8dc3614845d', 1, 7, 0),
(3, 's1', '92eb5ffee6ae2fec3ad71c777531578f', 0, 8, 0),
(4, 's2', '92eb5ffee6ae2fec3ad71c777531578f', 0, 9, 14),
(6, 's4', '92eb5ffee6ae2fec3ad71c777531578f', 0, 11, 0),
(8, 'c', '4a8a08f09d37b73795649038408b5f33', 0, 14, 0),
(9, 'd', '8277e0910d750195b448797616e091ad', 0, 15, 0),
(10, 'e', 'e1671797c52e15f763380b45e841ec32', 0, 16, 0),
(11, 'f', '8fa14cdd754f91cc6554c9e71929cce7', 0, 17, 8),
(12, 'raffytatel', '469b1f72377d68f1d7539fe236f7c5ea', 0, 18, 0),
(13, 'z', 'fbade9e36a3f36d3d676c1b808451dd7', 0, 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rroom` int(10) unsigned NOT NULL,
  `room_size` int(10) unsigned NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `rroom`, `room_size`) VALUES
(1, 308, 40);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE IF NOT EXISTS `school_year` (
  `sy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sy` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`sy_id`, `sy`, `status`) VALUES
(1, 'SY 2012 - 2013 First Semester', 1),
(2, 'SY 2012 - 2013 Second Semester', 0);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `sec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sec_name` varchar(45) NOT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sec_id`, `sec_name`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stud_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stud_lname` varchar(45) NOT NULL,
  `stud_fname` varchar(45) NOT NULL,
  `stud_mi` varchar(45) NOT NULL,
  `stud_gender` varchar(45) NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `stud_lname`, `stud_fname`, `stud_mi`, `stud_gender`) VALUES
(2, 'Padao', 'Francis Rey', 'F', 'Male'),
(7, 'Dimas', 'Mechelle', 'P', 'Female'),
(8, 's1', 's1', 's', 'Female'),
(9, 's2', 's2', 's', 'Female'),
(11, 's4', 's4', 's', 'Male'),
(14, 'c', 'c', 'c', 'Female'),
(15, 'd', 'd', 'd', 'Female'),
(16, 'e', 'e', 'e', 'Female'),
(17, 'f', 'f', 'f', 'Female'),
(18, 'tatel', 'raffy', 'e.', 'Male'),
(19, 'a', 'z', 'b', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE IF NOT EXISTS `student_subject` (
  `ssubj_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stud_id` int(10) unsigned NOT NULL,
  `ssec_id` int(10) unsigned NOT NULL,
  `seat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ssubj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`ssubj_id`, `stud_id`, `ssec_id`, `seat_id`) VALUES
(1, 18, 1, 1),
(2, 9, 1, 2),
(3, 0, 1, 3),
(4, 17, 1, 4),
(5, 8, 1, 5),
(6, 0, 1, 6),
(7, 0, 1, 7),
(8, 11, 1, 8),
(9, 0, 1, 9),
(10, 14, 1, 10),
(11, 0, 1, 11),
(12, 0, 1, 12),
(13, 0, 1, 13),
(14, 0, 1, 14),
(15, 0, 1, 15),
(16, 0, 1, 16),
(17, 0, 1, 17),
(18, 0, 1, 18),
(19, 0, 1, 19),
(20, 0, 1, 20),
(21, 0, 1, 21),
(22, 0, 1, 22),
(23, 0, 1, 23),
(24, 0, 1, 24),
(25, 0, 1, 25),
(26, 0, 1, 26),
(27, 0, 1, 27),
(28, 0, 1, 28),
(29, 0, 1, 29),
(30, 0, 1, 30),
(31, 16, 1, 31),
(32, 0, 1, 32),
(33, 0, 1, 33),
(34, 0, 1, 34),
(35, 0, 1, 35),
(36, 0, 1, 36),
(37, 0, 1, 37),
(38, 0, 1, 38),
(39, 0, 1, 39),
(40, 0, 1, 40),
(41, 0, 1, 41),
(42, 0, 1, 42),
(43, 0, 1, 43),
(44, 15, 1, 44),
(45, 0, 1, 45);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subj_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subj_name` varchar(45) NOT NULL,
  `class_size` int(10) unsigned NOT NULL,
  PRIMARY KEY (`subj_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_id`, `subj_name`, `class_size`) VALUES
(1, 'Web Development 1', 30),
(2, 'SAP 1', 30);

-- --------------------------------------------------------

--
-- Table structure for table `subject_section`
--

CREATE TABLE IF NOT EXISTS `subject_section` (
  `ssec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sec_id` int(10) unsigned NOT NULL,
  `subj_id` int(10) unsigned NOT NULL,
  `sy_id` varchar(45) NOT NULL,
  `room_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ssec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subject_section`
--

INSERT INTO `subject_section` (`ssec_id`, `sec_id`, `subj_id`, `sy_id`, `room_id`) VALUES
(1, 1, 1, '1', 1);
