-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2016 at 08:47 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adm_id` int(20) NOT NULL,
  `adm_name` varchar(100) NOT NULL,
  `adm_pass` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_name`, `adm_pass`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `apply_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) DEFAULT NULL,
  `emp_id` int(20) DEFAULT NULL,
  `job_id` int(20) DEFAULT NULL,
  `status` int(20) DEFAULT NULL,
  `date_applied` varchar(20) NOT NULL,
  PRIMARY KEY (`apply_id`),
  KEY `user_id` (`user_id`),
  KEY `emp_id` (`emp_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`apply_id`, `user_id`, `emp_id`, `job_id`, `status`, `date_applied`) VALUES
(6, 8, 1, 2, NULL, '18-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE IF NOT EXISTS `employer` (
  `eid` int(20) NOT NULL AUTO_INCREMENT,
  `log_id` int(20) NOT NULL,
  `ename` varchar(100) DEFAULT NULL,
  `etype` varchar(100) DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `executive` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `profile` varchar(700) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`eid`),
  KEY `log_id` (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`eid`, `log_id`, `ename`, `etype`, `industry`, `address`, `pincode`, `executive`, `phone`, `location`, `profile`, `logo`) VALUES
(1, 18, 'Infosys Pvt Ltd', 'Company', 'Software Services', 'Infosys,\r\nIT Zone,\r\n4 - BE,\r\nBangalore', '458796', 'Ajith', '9145512345', 'India,Karnataka,Bengaluru', 'Infosys is a global leader in consulting, technology, and outsourcing and next-generation services. We enable clients in more than 50 countries to outperform the competition and stay ahead of the innovation curve.', 'Infosys Pvt Ltd1.jpg'),
(2, 23, 'Microsoft', 'Company', 'Software Services', 'Microsoft, Bangalore, Karnataka', '456987', 'Arun', '78945612332', 'India,Karnataka,Bommasandra', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `jobid` int(20) NOT NULL AUTO_INCREMENT,
  `eid` int(20) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `jobdesc` varchar(700) NOT NULL,
  `vacno` int(20) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `basicpay` varchar(100) DEFAULT NULL,
  `fnarea` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `industry` varchar(200) DEFAULT NULL,
  `ugqual` varchar(100) DEFAULT NULL,
  `pgqual` varchar(100) DEFAULT NULL,
  `profile` varchar(700) DEFAULT NULL,
  `postdate` varchar(20) NOT NULL,
  PRIMARY KEY (`jobid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `eid`, `title`, `jobdesc`, `vacno`, `experience`, `basicpay`, `fnarea`, `location`, `industry`, `ugqual`, `pgqual`, `profile`, `postdate`) VALUES
(2, 1, 'Network Administrator', 'Consulting with clients to specify system requirements and design solutions\r\nBudgeting for equipment and assembly costs\r\nAssembling new systems\r\nMaintaining existing software and hardware and upgrading any that have become obsolete\r\nWorking in tandem with IT support personnel\r\nProviding network administration and support', 3, '7', 'Rs75000', 'Network Administration', 'India,Karnataka,Bengaluru', 'Software Services', 'B.Tech/B.E.', 'M.Tech', 'Patience,\r\nTechnical skills.\r\nIT skills,\r\nInterpersonal skills,\r\nEnthusiasm,\r\nTeamworking skills,\r\nInitiative,\r\nCommitment to quality,\r\nAttention to detail.', '09-04-16'),
(3, 1, 'Software Engineer', 'The focus of this position is the design and development of the core V-PIL services infrastructure, including custom automation software, job schedulers, data analysis, data visualization, and web development.', 3, '5', 'Rs 1000000', 'Network Virtualizing', 'India,Karnataka,Bengaluru', 'Software Services', 'B.Tech/B.E.', 'M.Tech', 'Strong ability in JavaScript.\r\nStrong ability in database design.\r\nExperience developing and executing performance test suites.\r\nStrong test suite development, execution and automation experience.\r\nFamiliarity with Jenkins and knowledge of existing cloud test suites, including Tempest and Rally.\r\nExperience with continuous integration practices.\r\nExperience with Juju, Charms and MAAS.', '15-04-16'),
(4, 2, 'Web Developer', 'Development of interactive websites at microfost', 5, '3', 'Rs 25000', 'Web Development', 'India,Kerala,Ernakulam', 'Software Services', 'B.Tech/B.E.', 'Not Pursuing Post Graduation', 'Knowledge in ASP.NET, SQL server', '16-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

DROP TABLE IF EXISTS `jobseeker`;
CREATE TABLE IF NOT EXISTS `jobseeker` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `log_id` int(20) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `basic_edu` varchar(100) DEFAULT NULL,
  `master_edu` varchar(100) DEFAULT NULL,
  `other_qual` varchar(100) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `Resume` varchar(100) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `log_id` (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`user_id`, `log_id`, `name`, `phone`, `location`, `experience`, `skills`, `basic_edu`, `master_edu`, `other_qual`, `dob`, `Resume`, `photo`) VALUES
(7, 14, 'Akshay V K', '7894561231', 'India,West Bengal,Kalaikunda', '5', 'construction , Tax ', 'Not Pursuing Graduation', 'Not Pursuing Post Graduation', NULL, NULL, NULL, 'Akshay V K7.jpg'),
(8, 20, 'Sreelal C', '8943202726', 'India,Kerala,Kozhikode', '1', 'Experience in Php development , HTML , MYSQL, Ajax', 'B.Tech/B.E.', 'Not Pursuing Post Graduation', NULL, NULL, 'Sreelal C8.docx', 'Sreelal C8.JPG'),
(9, 21, 'abc', '1234567890', 'Iceland,Austurland,Bakkafjor ur', '1', 'sjndsnn,mnkjlnlnl  jnn ', 'B.A', 'CA', NULL, NULL, NULL, NULL),
(10, 22, 'jishnu k s', '9526919061', 'India,Kerala,Sulthan Bathery', '9+', 'engineering at kmct', 'B.Tech/B.E.', 'MBA/PGDM', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `log_id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `usertype` varchar(20) NOT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  UNIQUE KEY `email` (`email`),
  KEY `log_id` (`log_id`),
  KEY `log_id_2` (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `email`, `password`, `usertype`, `status`) VALUES
(14, 'akshay@gmail.com', '$2y$10$3/cBmurjZzBYUkaLYE.Y..skkTdBT/YVCZb51Q3yWx73xd.Eyr13e', 'jobseeker', 1),
(18, 'info@infosys.com', '$2y$10$/TP7ishP6SRCroPNfWcVqO1V0mMH47X.Qsft1u/Ed9xFtmietk2ga', 'employer', 0),
(20, 'sreelal.c@live.com', '$2y$10$MfycE3o6lgrM92f5sB8kPu7c38XQkT6FeL5YF3pgx/MM/Jy12xM5i', 'jobseeker', 1),
(21, 'abc@gmail.com', '$2y$10$ZWYhKrFT9B9m0CaysgRy5e1XMZ/e130v0LGkqw4QpkXbJ3WIV.YYe', 'jobseeker', 1),
(22, 'jishnnuks@live.com', '$2y$10$VKC/bSdNBZWJ6PrOwnJ6xezAj1aq5VioW9YjFUsjxnAJHUkZHRWBq', 'jobseeker', 1),
(23, 'info@microsoft.com', '$2y$10$q.xafcSTYUoKtz2FIhrf7OX1x0weMZRzY3beiqoO2NGe0PUKJlzga', 'employer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `selection`
--

DROP TABLE IF EXISTS `selection`;
CREATE TABLE IF NOT EXISTS `selection` (
  `sel_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) DEFAULT NULL,
  `emp_id` int(20) DEFAULT NULL,
  `job_id` int(20) DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`sel_id`),
  KEY `user_id` (`user_id`),
  KEY `emp_id` (`emp_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `fk_empid` FOREIGN KEY (`emp_id`) REFERENCES `employer` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_job` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`jobid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `jobseeker` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employer`
--
ALTER TABLE `employer`
  ADD CONSTRAINT `fk_log_id` FOREIGN KEY (`log_id`) REFERENCES `login` (`log_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `fk_eid` FOREIGN KEY (`eid`) REFERENCES `employer` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD CONSTRAINT `fk_login` FOREIGN KEY (`log_id`) REFERENCES `login` (`log_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `selection`
--
ALTER TABLE `selection`
  ADD CONSTRAINT `fk_emp` FOREIGN KEY (`emp_id`) REFERENCES `employer` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jobs` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`jobid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `jobseeker` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
