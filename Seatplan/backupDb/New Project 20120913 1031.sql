-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.16


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema seatplan
--

CREATE DATABASE IF NOT EXISTS seatplan;
USE seatplan;

--
-- Definition of table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `userpass` varchar(45) NOT NULL,
  `userlevel` int(10) unsigned NOT NULL,
  `stud_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` (`id`,`username`,`userpass`,`userlevel`,`stud_id`) VALUES 
 (1,'b','92eb5ffee6ae2fec3ad71c777531578f',1,2),
 (2,'g','b2f5ff47436671b6e533d8dc3614845d',1,7);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;


--
-- Definition of table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `room_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rroom` int(10) unsigned NOT NULL,
  `room_size` int(10) unsigned NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` (`room_id`,`rroom`,`room_size`) VALUES 
 (1,308,40);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;


--
-- Definition of table `school_year`
--

DROP TABLE IF EXISTS `school_year`;
CREATE TABLE `school_year` (
  `sy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sy` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

/*!40000 ALTER TABLE `school_year` DISABLE KEYS */;
INSERT INTO `school_year` (`sy_id`,`sy`,`status`) VALUES 
 (1,'SY 2012 - 2013 First Semester',1),
 (2,'SY 2012 - 2013 Second Semester',0);
/*!40000 ALTER TABLE `school_year` ENABLE KEYS */;


--
-- Definition of table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `sec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sec_name` varchar(45) NOT NULL,
  PRIMARY KEY (`sec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` (`sec_id`,`sec_name`) VALUES 
 (1,'A');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;


--
-- Definition of table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `stud_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stud_lname` varchar(45) NOT NULL,
  `stud_fname` varchar(45) NOT NULL,
  `stud_mi` varchar(45) NOT NULL,
  `stud_gender` varchar(45) NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`stud_id`,`stud_lname`,`stud_fname`,`stud_mi`,`stud_gender`) VALUES 
 (2,'Padao','Francis Rey','F','Male'),
 (7,'Dimas','Mechelle','P','Female');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;


--
-- Definition of table `student_subject`
--

DROP TABLE IF EXISTS `student_subject`;
CREATE TABLE `student_subject` (
  `ssubj_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stud_id` int(10) unsigned NOT NULL,
  `ssec_id` int(10) unsigned NOT NULL,
  `seat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ssubj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_subject`
--

/*!40000 ALTER TABLE `student_subject` DISABLE KEYS */;
INSERT INTO `student_subject` (`ssubj_id`,`stud_id`,`ssec_id`,`seat_id`) VALUES 
 (1,1,1,1);
/*!40000 ALTER TABLE `student_subject` ENABLE KEYS */;


--
-- Definition of table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `subj_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subj_name` varchar(45) NOT NULL,
  `class_size` int(10) unsigned NOT NULL,
  PRIMARY KEY (`subj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` (`subj_id`,`subj_name`,`class_size`) VALUES 
 (1,'Web Development 1',30),
 (2,'SAP 1',30);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;


--
-- Definition of table `subject_section`
--

DROP TABLE IF EXISTS `subject_section`;
CREATE TABLE `subject_section` (
  `ssec_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sec_id` int(10) unsigned NOT NULL,
  `subj_id` int(10) unsigned NOT NULL,
  `sy_id` varchar(45) NOT NULL,
  `room_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ssec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_section`
--

/*!40000 ALTER TABLE `subject_section` DISABLE KEYS */;
INSERT INTO `subject_section` (`ssec_id`,`sec_id`,`subj_id`,`sy_id`,`room_id`) VALUES 
 (1,1,1,'1',1);
/*!40000 ALTER TABLE `subject_section` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
