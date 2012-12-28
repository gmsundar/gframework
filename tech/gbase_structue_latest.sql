-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2012 at 10:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gbase2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE IF NOT EXISTS `admission` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `photo` varchar(1500) CHARACTER SET utf8 DEFAULT NULL,
  `application_no` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `enrollment` int(50) DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `middle_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `current_class` int(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `height` varchar(50) CHARACTER SET utf8 NOT NULL,
  `weight` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sex` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `religion` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `caste` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `community` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `blood_group` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mother_tongue` varchar(50) DEFAULT NULL,
  `lang_speak_at_home` varchar(50) DEFAULT NULL,
  `father_photo` varchar(1500) CHARACTER SET utf8 NOT NULL,
  `father_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mobile_phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `work_phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `employer` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `occupation` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `annual_income` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mother_photo` varchar(1500) CHARACTER SET utf8 NOT NULL,
  `mother_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mmobile_phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mwork_phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `memail` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `memployer` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `moccupation` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `mannual_income` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `home_address` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `haddress_line2` varchar(100) NOT NULL,
  `haddress_city` int(50) DEFAULT NULL,
  `pincode` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `home_phone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `landmark` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `doctors_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `daddress_line2` varchar(100) DEFAULT NULL,
  `daddress_city` int(50) DEFAULT NULL,
  `dphone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `dmobile` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `doctors_address` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `child_allergies` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `any_special_info` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `physically_challenged` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `previous_school` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ps_standard` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `psacademic_yr` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ps_address` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `saddress_line2` varchar(100) DEFAULT NULL,
  `scity` int(50) DEFAULT NULL,
  `transport` varchar(50) DEFAULT NULL,
  `person1_photo` varchar(100) DEFAULT NULL,
  `pick_up_person_1` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prelationship` varchar(50) DEFAULT NULL,
  `person2_phot` varchar(150) DEFAULT NULL,
  `pick_up_person_2` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prelationship2` varchar(50) DEFAULT NULL,
  `route` int(50) DEFAULT NULL,
  `stage` int(50) DEFAULT NULL,
  `cost` varchar(50) DEFAULT NULL,
  `sname` varchar(50) DEFAULT NULL,
  `sage` varchar(50) DEFAULT NULL,
  `sclass` int(50) DEFAULT NULL,
  `sschool` varchar(50) DEFAULT NULL,
  `sname1` varchar(50) DEFAULT NULL,
  `sage1` varchar(50) DEFAULT NULL,
  `sclass1` int(50) DEFAULT NULL,
  `sschool1` varchar(50) DEFAULT NULL,
  `emergency_name` varchar(50) DEFAULT NULL,
  `emergency_mobile` int(50) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `copy_birth_certificate` varchar(50) DEFAULT NULL,
  `tc` varchar(50) DEFAULT NULL,
  `assessment_report_card` varchar(50) DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `screening_id` int(50) NOT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `screening_id` (`screening_id`),
  UNIQUE KEY `application_no` (`application_no`),
  KEY `current_class` (`current_class`),
  KEY `route` (`route`),
  KEY `stage` (`stage`),
  KEY `sclass1` (`sclass1`),
  KEY `nationality` (`nationality`),
  KEY `sclass` (`sclass`),
  KEY `haddress_city` (`haddress_city`),
  KEY `daddress_city` (`daddress_city`),
  KEY `scity` (`scity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `admission`
--


-- --------------------------------------------------------

--
-- Table structure for table `class_section_relation`
--

CREATE TABLE IF NOT EXISTS `class_section_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `section_id` (`section_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `class_section_relation`
--

INSERT INTO `class_section_relation` (`id`, `class_id`, `section_id`, `teacher_id`, `status`) VALUES
(1, 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_relation`
--

CREATE TABLE IF NOT EXISTS `class_subject_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `class_subject_relation`
--


-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `school_name` varchar(50) NOT NULL,
  `standard` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `city2` varchar(50) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `period_start` varchar(50) NOT NULL,
  `period_end` varchar(50) NOT NULL,
  `accident` varchar(50) NOT NULL,
  `vehicle_name1` varchar(50) NOT NULL,
  `period_start1` varchar(50) NOT NULL,
  `period_end1` varchar(50) NOT NULL,
  `accident1` varchar(50) NOT NULL,
  `license_no` varchar(50) NOT NULL,
  `license_address` varchar(50) NOT NULL,
  `period_start2` varchar(50) NOT NULL,
  `expiry_on` varchar(50) NOT NULL,
  `rto` varchar(50) NOT NULL,
  `name_of_employer` varchar(50) NOT NULL,
  `daddress` varchar(50) NOT NULL,
  `dcity` varchar(50) NOT NULL,
  `dstate` varchar(50) NOT NULL,
  `dpincode` varchar(50) NOT NULL,
  `employment_dates_from` date NOT NULL,
  `employment_dates_to` date NOT NULL,
  `pay_rs` int(50) NOT NULL,
  `name_of_immediate_superviser` varchar(50) NOT NULL,
  `reason_for_leaving` varchar(50) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `rrelationship` varchar(50) NOT NULL,
  `raddress` varchar(50) NOT NULL,
  `rwork_number` int(50) NOT NULL,
  `rhome_number` int(50) NOT NULL,
  `rname1` varchar(50) NOT NULL,
  `rrelationship1` varchar(50) NOT NULL,
  `raddress1` varchar(50) NOT NULL,
  `rwork_number1` int(50) NOT NULL,
  `rhome_number1` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `user_id`, `school_name`, `standard`, `year`, `city2`, `vehicle_name`, `period_start`, `period_end`, `accident`, `vehicle_name1`, `period_start1`, `period_end1`, `accident1`, `license_no`, `license_address`, `period_start2`, `expiry_on`, `rto`, `name_of_employer`, `daddress`, `dcity`, `dstate`, `dpincode`, `employment_dates_from`, `employment_dates_to`, `pay_rs`, `name_of_immediate_superviser`, `reason_for_leaving`, `rname`, `rrelationship`, `raddress`, `rwork_number`, `rhome_number`, `rname1`, `rrelationship1`, `raddress1`, `rwork_number1`, `rhome_number1`) VALUES
(1, NULL, 'govt hr sec school', '12', '1987', 'chennai', 'car', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', 0, '', '', '', '', '', 0, 0, '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `education_details`
--

CREATE TABLE IF NOT EXISTS `education_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_name_or_degree` varchar(150) DEFAULT NULL,
  `mark_or_grade` varchar(45) DEFAULT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `photo_copy_image` varchar(350) DEFAULT NULL,
  `is_given` char(1) DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  `major` varchar(45) DEFAULT NULL,
  `year_completed` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `education_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `perm_address_id` int(11) DEFAULT NULL,
  `present_address_id` int(11) DEFAULT NULL,
  `education_details_id` int(11) DEFAULT NULL,
  `experience_details_id` int(11) DEFAULT NULL,
  `date_of_employment` date DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `last_paid_salary` float DEFAULT NULL,
  `employment_type_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `salary_details_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `application_no` varchar(45) DEFAULT NULL,
  `employee_no` varchar(45) DEFAULT NULL,
  `signature_image` varchar(150) DEFAULT NULL,
  `reference_details_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_user_id` (`user_id`),
  KEY `fk_employee_experience_id` (`experience_details_id`),
  KEY `fk_education_details_id` (`education_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employees`
--


-- --------------------------------------------------------

--
-- Table structure for table `experence_details`
--

CREATE TABLE IF NOT EXISTS `experence_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(100) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `salary` float DEFAULT NULL,
  `supervisor_name` varchar(45) DEFAULT NULL,
  `reason_for_leaving` varchar(45) DEFAULT NULL,
  `reference_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `experence_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `class_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `bill_no` int(50) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `chellan_no` varchar(50) NOT NULL,
  `pay` varchar(50) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class` (`class_id`),
  KEY `students` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `fees`
--


-- --------------------------------------------------------

--
-- Table structure for table `fees_dues`
--

CREATE TABLE IF NOT EXISTS `fees_dues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fees_type_id` int(11) NOT NULL,
  `fees_amount` decimal(10,0) NOT NULL,
  `paid` decimal(10,0) DEFAULT NULL,
  `due_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `fees_type_id` (`fees_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `fees_dues`
--


-- --------------------------------------------------------

--
-- Table structure for table `fees_structure`
--

CREATE TABLE IF NOT EXISTS `fees_structure` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `class` int(50) NOT NULL,
  `fees_types` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `effect_from` date NOT NULL,
  `fees_status` varchar(50) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `date_timestamp` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fees_types` (`fees_types`),
  KEY `class` (`class`),
  KEY `branch` (`branch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `fees_structure`
--

INSERT INTO `fees_structure` (`id`, `class`, `fees_types`, `amount`, `effect_from`, `fees_status`, `branch_id`, `date_timestamp`, `status`) VALUES
(5, 1, 1, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(7, 1, 2, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(8, 2, 1, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(9, 2, 2, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(10, 4, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(12, 1, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(13, 1, 4, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(14, 2, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(15, 2, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(16, 12, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(17, 12, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(18, 12, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(19, 12, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(20, 3, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(21, 3, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(22, 3, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(23, 3, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(24, 5, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(25, 5, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(26, 5, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(27, 5, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(28, 6, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(29, 6, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(30, 6, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(31, 6, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(32, 7, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(33, 7, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(34, 7, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(35, 7, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(36, 8, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(37, 8, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(38, 8, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(39, 8, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(40, 9, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(41, 9, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(42, 9, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(43, 9, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(44, 10, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(45, 10, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(46, 10, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(47, 10, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(48, 11, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(49, 11, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(50, 11, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(51, 11, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(52, 4, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(53, 4, 3, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(54, 4, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(55, 13, 1, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(56, 13, 2, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(57, 13, 3, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(58, 13, 4, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(59, 14, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(60, 14, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(61, 14, 3, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(62, 14, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(63, 15, 1, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(64, 15, 2, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0),
(65, 15, 3, 5000, '2012-03-14', 'active', 1, '2012-03-14', 0),
(66, 15, 4, 5000, '2012-03-14', 'active', 1, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fees_transactions`
--

CREATE TABLE IF NOT EXISTS `fees_transactions` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fees_payment_id` int(50) NOT NULL,
  `fees_type_id` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fees_transactions`
--


-- --------------------------------------------------------

--
-- Table structure for table `fees_type`
--

CREATE TABLE IF NOT EXISTS `fees_type` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `fees_type` varchar(50) NOT NULL,
  `fees_priority` int(50) NOT NULL,
  `fees_period` varchar(50) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fees_type`
--

INSERT INTO `fees_type` (`id`, `fees_type`, `fees_priority`, `fees_period`, `add_date`, `status`) VALUES
(1, 'Admission fee', 1, '1', '2012-03-01 00:00:00', ''),
(2, 'Material fee', 2, '0', '2012-03-03 19:54:12', ''),
(3, 'Refundable Fee', 3, '2', '2012-03-03 19:58:47', '1'),
(4, 'Extra Curricular Fee', 4, '1', '2012-03-25 15:54:18', '1'),
(10, 'Transport Fee', 5, '1', '2012-04-07 19:44:07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mclass`
--

CREATE TABLE IF NOT EXISTS `mclass` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `class` varchar(100) NOT NULL,
  `group` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mclass`
--

INSERT INTO `mclass` (`id`, `class`, `group`, `status`) VALUES
(1, 'Toddler', '1', '1'),
(2, 'PreKG', '1', '1'),
(3, 'LKG', '1', '1'),
(4, 'UKG', '1', '1'),
(5, 'STD 1', '1', '1'),
(6, 'STD 2', '1', '1'),
(7, 'STD 3', '1', '1'),
(8, 'STD 4', '1', '1'),
(9, 'STD 5', '1', '1'),
(10, 'STD 6', '1', '1'),
(11, 'STD 7', '1', '1'),
(12, 'STD 8', '1', '1'),
(13, 'STD 9', '1', '1'),
(14, 'STD 10', '1', '1'),
(15, 'STD 11', '1', '1'),
(16, 'STD 12', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pre_admission`
--

CREATE TABLE IF NOT EXISTS `pre_admission` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `application_no` varchar(100) NOT NULL,
  `how_did_you_heard_about_us` varchar(100) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `child_date_of_birth` date NOT NULL,
  `class_to_be_admitted` int(50) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `date_of_issue` date NOT NULL,
  `date_of_returning` date NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `cheque_no` int(50) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `bill_no` int(100) NOT NULL,
  `date_of_pre_screening` date NOT NULL,
  `time_of_pre_screening` varchar(50) NOT NULL,
  `screening_id` int(50) NOT NULL,
  `branch_id` int(100) NOT NULL,
  `date_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bill_no` (`bill_no`),
  UNIQUE KEY `application_no` (`application_no`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`),
  KEY `class_to_be_admitted` (`class_to_be_admitted`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `pre_admission`
--


-- --------------------------------------------------------

--
-- Table structure for table `route_allocation`
--

CREATE TABLE IF NOT EXISTS `route_allocation` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `vehicle_no` int(50) DEFAULT NULL,
  `driver_name` int(50) DEFAULT NULL,
  `route` int(50) DEFAULT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_no` (`vehicle_no`),
  KEY `driver_name` (`driver_name`),
  KEY `route` (`route`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `route_allocation`
--


-- --------------------------------------------------------

--
-- Table structure for table `route_details`
--

CREATE TABLE IF NOT EXISTS `route_details` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `route_no` varchar(50) NOT NULL,
  `route_name` varchar(50) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `date` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `route_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE IF NOT EXISTS `screening` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `application_no` int(50) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `screening_teacher` int(50) NOT NULL,
  `teacher_remarks` varchar(50) NOT NULL,
  `selected` varchar(50) NOT NULL,
  `principal_remarks` varchar(50) NOT NULL,
  `admission_confirmed` varchar(50) NOT NULL,
  `application_id` int(50) NOT NULL,
  `admission_id` int(50) NOT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `application_no` (`application_no`),
  KEY `application_id` (`application_id`),
  KEY `class` (`class`),
  KEY `screening_teacher` (`screening_teacher`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `screening`
--


-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `stage_details`
--

CREATE TABLE IF NOT EXISTS `stage_details` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `route_name` int(50) NOT NULL,
  `stages` varchar(50) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `km` varchar(50) NOT NULL,
  `branch_id` int(50) NOT NULL,
  `status` int(50) NOT NULL,
  `date` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `route_name` (`route_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stage_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `name`) VALUES
(1, 'ENG', 'English'),
(2, 'TAM', 'Tamil'),
(3, 'MAT', 'Maths'),
(4, 'SCI', 'Science'),
(5, 'SOC', 'Social');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `school_name` varchar(50) NOT NULL,
  `subject_major` varchar(50) NOT NULL,
  `year_completed` varchar(50) NOT NULL,
  `percentage` varchar(50) NOT NULL,
  `school_name1` varchar(50) NOT NULL,
  `subject_major1` varchar(50) NOT NULL,
  `year_completed1` varchar(50) NOT NULL,
  `percentage1` varchar(50) NOT NULL,
  `college_name` varchar(50) NOT NULL,
  `subject_major2` varchar(50) NOT NULL,
  `year_completed2` varchar(50) NOT NULL,
  `percentage2` varchar(50) NOT NULL,
  `college_name2` varchar(50) NOT NULL,
  `subject_major3` varchar(50) NOT NULL,
  `year_completed3` varchar(50) NOT NULL,
  `percentage3` varchar(50) NOT NULL,
  `name_of_employer` varchar(50) NOT NULL,
  `daddress` varchar(50) NOT NULL,
  `dcity` varchar(50) NOT NULL,
  `dstate` varchar(50) NOT NULL,
  `dpincode` varchar(50) NOT NULL,
  `employment_dates_from` date NOT NULL,
  `employment_dates_to` date NOT NULL,
  `pay_rs` int(50) NOT NULL,
  `name_of_immediate_superviser` varchar(50) NOT NULL,
  `job_title_description_of_work` varchar(50) NOT NULL,
  `reason_for_leaving` varchar(50) NOT NULL,
  `rname` varchar(50) NOT NULL,
  `rrelationship` varchar(50) NOT NULL,
  `raddress` varchar(50) NOT NULL,
  `rwork_number` int(50) NOT NULL,
  `rhome_number` int(50) NOT NULL,
  `rname1` varchar(50) NOT NULL,
  `rrelationship1` varchar(50) NOT NULL,
  `raddress1` varchar(50) NOT NULL,
  `rwork_number1` int(50) NOT NULL,
  `rhome_number1` int(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `teacher`
--


-- --------------------------------------------------------

--
-- Table structure for table `test_ui`
--

CREATE TABLE IF NOT EXISTS `test_ui` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `text` varchar(50) NOT NULL,
  `select_foregin` int(50) NOT NULL,
  `number` int(50) NOT NULL,
  `date` date NOT NULL,
  `check_box` varchar(50) NOT NULL,
  `radio` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `read_only` varchar(50) NOT NULL,
  `select_array` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `select_foregin` (`select_foregin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `test_ui`
--

INSERT INTO `test_ui` (`id`, `text`, `select_foregin`, `number`, `date`, `check_box`, `radio`, `photo`, `read_only`, `select_array`) VALUES
(1, 'welcome', 1, 1, '2012-06-13', 'on', '', 'http://localhost/issueescalator/src/img/noimage.jp', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test_ui_child`
--

CREATE TABLE IF NOT EXISTS `test_ui_child` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `data` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `test_ui_child`
--

INSERT INTO `test_ui_child` (`id`, `data`) VALUES
(1, '100'),
(2, '200'),
(3, '300');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE IF NOT EXISTS `time_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_section_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_section_id` (`class_section_id`),
  KEY `branch_id` (`branch_id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `time_table`
--


-- --------------------------------------------------------

--
-- Table structure for table `time_table_settings`
--

CREATE TABLE IF NOT EXISTS `time_table_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_periods` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `week_days` varchar(500) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `time_table_settings`
--

INSERT INTO `time_table_settings` (`id`, `no_of_periods`, `no_of_days`, `week_days`, `last_updated`, `user_id`) VALUES
(4, 8, 1, '["2","3","4","5","6"]', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE IF NOT EXISTS `transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_no` varchar(45) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `enrollment` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `landmark1` varchar(150) DEFAULT NULL,
  `landmark2` varchar(150) DEFAULT NULL,
  `pickup` varchar(150) DEFAULT NULL,
  `drop_point` varchar(150) DEFAULT NULL,
  `zone` varchar(45) DEFAULT NULL,
  `total_km` int(11) DEFAULT NULL,
  `pickup_km` int(11) DEFAULT NULL,
  `drop_km` int(11) DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `last_updated` date DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `remarks` varchar(45) DEFAULT NULL,
  `pickup_time` time DEFAULT NULL,
  `drop_time` time DEFAULT NULL,
  `application_date` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transportation`
--


-- --------------------------------------------------------

--
-- Table structure for table `trip_sheet`
--

CREATE TABLE IF NOT EXISTS `trip_sheet` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `vehicle_no` int(50) DEFAULT NULL,
  `driver_name` int(50) DEFAULT NULL,
  `route` int(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `morning_pickup` varchar(50) DEFAULT NULL,
  `morning_drop` varchar(50) DEFAULT NULL,
  `evening_pickup` varchar(50) DEFAULT NULL,
  `evening_drop` varchar(50) DEFAULT NULL,
  `total_km` varchar(50) DEFAULT NULL,
  `diesel_litre` int(50) NOT NULL,
  `diesel_price` int(50) NOT NULL,
  `branch_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_no` (`vehicle_no`),
  KEY `driver_name` (`driver_name`),
  KEY `route` (`route`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `trip_sheet`
--

INSERT INTO `trip_sheet` (`id`, `vehicle_no`, `driver_name`, `route`, `date`, `morning_pickup`, `morning_drop`, `evening_pickup`, `evening_drop`, `total_km`, `diesel_litre`, `diesel_price`, `branch_id`) VALUES
(8, 1, 1, 1, '2012-03-04', '4256', '4586', '4689', '4789', '500', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `registration_no` varchar(50) DEFAULT NULL,
  `owners_name` varchar(50) DEFAULT NULL,
  `s_w_d_o` varchar(50) DEFAULT NULL,
  `permanent_address` varchar(50) DEFAULT NULL,
  `dealer` varchar(50) DEFAULT NULL,
  `registered_date` date DEFAULT NULL,
  `life_time_tax_paid` varchar(50) DEFAULT NULL,
  `challan_no` int(50) NOT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_upto` date NOT NULL,
  `class_of_vehicle` varchar(50) DEFAULT NULL,
  `makers_name` varchar(50) NOT NULL,
  `month_year` varchar(50) NOT NULL,
  `chassis_no` varchar(50) DEFAULT NULL,
  `engine_number` varchar(50) DEFAULT NULL,
  `fuel_used` varchar(50) DEFAULT NULL,
  `makers_class` varchar(50) DEFAULT NULL,
  `seating_capacity` varchar(50) DEFAULT NULL,
  `colour` varchar(50) DEFAULT NULL,
  `hypothecation` varchar(50) DEFAULT NULL,
  `finance_company` varchar(50) DEFAULT NULL,
  `address` varchar(1500) NOT NULL,
  `contract_no` varchar(50) DEFAULT NULL,
  `customer_code` int(50) DEFAULT NULL,
  `original_loan_amount` int(50) DEFAULT NULL,
  `original_interest_amount` int(50) DEFAULT NULL,
  `original_amount_payable` int(50) DEFAULT NULL,
  `original_tenure` int(50) DEFAULT NULL,
  `monthly_instalment` int(50) DEFAULT NULL,
  `agreement_date` date NOT NULL,
  `first_instalment_due_on` date DEFAULT NULL,
  `last_instalment_due_on` date DEFAULT NULL,
  `fc_expires_on` date DEFAULT NULL,
  `insurance_company` varchar(50) DEFAULT NULL,
  `iaddress` varchar(50) DEFAULT NULL,
  `policy_no` varchar(50) DEFAULT NULL,
  `date_of_issuance` date DEFAULT NULL,
  `ivalid_from` date DEFAULT NULL,
  `ivalid_upto` date DEFAULT NULL,
  `permit_from` date DEFAULT NULL,
  `permit_to` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `registration_no`, `owners_name`, `s_w_d_o`, `permanent_address`, `dealer`, `registered_date`, `life_time_tax_paid`, `challan_no`, `valid_from`, `valid_upto`, `class_of_vehicle`, `makers_name`, `month_year`, `chassis_no`, `engine_number`, `fuel_used`, `makers_class`, `seating_capacity`, `colour`, `hypothecation`, `finance_company`, `address`, `contract_no`, `customer_code`, `original_loan_amount`, `original_interest_amount`, `original_amount_payable`, `original_tenure`, `monthly_instalment`, `agreement_date`, `first_instalment_due_on`, `last_instalment_due_on`, `fc_expires_on`, `insurance_company`, `iaddress`, `policy_no`, `date_of_issuance`, `ivalid_from`, `ivalid_upto`, `permit_from`, `permit_to`) VALUES
(1, 'TN20 AQ1200', 'Jayanthi S', 'Sivakumar N', '32, Easwaran Koil street, Thirumazhisai, Chennai -', 'MKS Automotive', '2007-06-26', '4400', 6501813, '2007-06-26', '2007-09-30', 'MAXI CAB', 'Mahindra and Mahindra Ltd', '6/2007', 'MAIHB2GEA73F31859', 'GE 74F 49499', 'DIESEL', 'TOURISTER 1500', '13', 'WHITE', 'yes', 'SUNDARAM FINANCE LTD', '21, Patullos Road', 'CC1098', 15217515, 435000, 98159, 533159, 36, 14810, '2007-06-22', '2007-06-22', '2010-05-17', '2005-06-25', 'IFFCO-TOKIO GENERL INSURANCE CO LTD', 'IFFCO SADAN, C1 Distt Centre, Saket, New Delhi- 11', '39492877', '2008-08-26', '2008-08-02', '2009-08-01', '2007-07-10', '2012-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `__blood_group`
--

CREATE TABLE IF NOT EXISTS `__blood_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `__blood_group`
--

INSERT INTO `__blood_group` (`id`, `blood_group`) VALUES
(1, 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `__branch_details`
--

CREATE TABLE IF NOT EXISTS `__branch_details` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `branch_name` varchar(500) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone1` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`),
  KEY `country_id` (`country_id`),
  KEY `currency_id` (`currency_id`),
  KEY `company_id` (`company_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `__branch_details`
--

INSERT INTO `__branch_details` (`id`, `code`, `branch_name`, `address`, `phone1`, `phone2`, `city_id`, `state_id`, `country_id`, `pincode`, `currency_id`, `company_id`) VALUES
(1, 'gt', 'Geotekh', '', '', '', 1, 24, 1, '', 1, 1),
(2, 'sanchn', 'Chennai', '', '', '', 1, 24, 1, '', 1, 2),
(3, 'sankanchi', 'Kanchipuram', '', '', '', 2, 24, 1, '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `__city`
--

CREATE TABLE IF NOT EXISTS `__city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(150) DEFAULT NULL,
  `city_code` varchar(45) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `__city`
--

INSERT INTO `__city` (`id`, `city_name`, `city_code`, `state_id`) VALUES
(1, 'Chennai', 'chn', 24),
(2, 'Kanchipuram', 'kan', 24),
(3, 'Madurai', '145', 24);

-- --------------------------------------------------------

--
-- Table structure for table `__company`
--

CREATE TABLE IF NOT EXISTS `__company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(150) DEFAULT NULL,
  `company_code` varchar(150) DEFAULT NULL,
  `company_logo` varchar(250) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `website` varchar(75) DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `phone1` varchar(45) DEFAULT NULL,
  `phone2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `__company`
--

INSERT INTO `__company` (`id`, `company_name`, `company_code`, `company_logo`, `currency_id`, `website`, `tax_id`, `phone1`, `phone2`) VALUES
(1, 'Geotekh', 'Gt', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Sangford', 'Sgf', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `__country`
--

CREATE TABLE IF NOT EXISTS `__country` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) DEFAULT NULL,
  `nationality` varchar(50) NOT NULL,
  `languages` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `__country`
--

INSERT INTO `__country` (`id`, `country_name`, `nationality`, `languages`) VALUES
(1, 'Afghanistan', 'Afghan', 'Afghan'),
(2, 'Albania', 'Albanian', 'Albanian'),
(3, 'Algeria', 'Algerian', 'Algerian'),
(4, 'Argentina', 'Argentine or Argentinean', 'Algerian'),
(5, 'Armenia', 'Armenian', 'Armenian'),
(6, 'Australia', 'Australian', 'Australian'),
(7, 'Austria', 'Austrian', 'Austrian'),
(8, 'Azerbaijan', 'Azerbaijani', 'Azerbaijani'),
(9, 'Bangladesh', 'Bangladeshi', 'Bangladeshi'),
(10, 'Belgium', 'Belgian', 'Dutch, German, French'),
(11, 'Bosnia and Herzegovina', 'Bosnian', 'Bosnian'),
(12, 'Brazil', 'Brazilian', 'Brazilian'),
(13, 'Bulgaria', 'Bulgarian', 'Bulgarian'),
(14, 'Cambodia', 'Cambodian', 'Cambodian'),
(15, 'Canada', 'Canadian', 'English, French'),
(16, 'China', 'Chinese', 'Chinese'),
(17, 'Colombia', 'Colombian', 'Colombian'),
(18, 'Croatia', 'Croat or Croatian', 'Croatian'),
(19, 'Cuba', 'Cuban', 'Spanish'),
(20, 'Cyprus', 'Cypriot', 'Greek, Turkish, English'),
(21, 'Czech Republic', 'Czech', 'Czech'),
(22, 'Denmark', 'Danish', 'Danish'),
(23, 'Dominica', 'Dominican', 'Spanish'),
(24, 'Egypt', 'Egyptian', 'Arabic'),
(25, 'Finland', 'Finn or Finnish', 'Finnish'),
(26, 'France', 'French', 'French'),
(27, 'Georgia', 'Georgian', 'Georgian'),
(28, 'Germany', 'German', 'German'),
(29, 'Greece', 'Greek', 'Greek'),
(30, 'Hungary', 'Hungarian', 'Hungarian'),
(31, 'India', 'Indian', 'Indian'),
(32, 'Iran', 'Iranian', 'Arabic'),
(33, 'Iraq', 'Iraqi', 'Arabic'),
(34, 'Ireland', 'Irish', 'Irish, English'),
(35, 'Israel', 'Israeli', 'Hebrew, Arabic'),
(36, 'Italy', 'Italian', 'Italian'),
(37, 'Jamaica', 'Jamaican', 'Jamaican'),
(38, 'Japan', 'Japanese', 'Japanese'),
(39, 'Kazakhstan', 'Kazakhstani', 'Kazak'),
(40, 'Kenya', 'Kenyan', 'Kenyan'),
(41, 'Korea, South', 'South Korean', 'Korean'),
(42, 'Kyrgyz Republic', 'Kyrgyz or Kirghiz', 'Kirghiz'),
(43, 'Lebanon', 'Lebanese', 'Arabic'),
(44, 'Macedonia', 'Macedonian', 'Macedonian'),
(45, 'Mexico', 'Mexican', 'Spanish'),
(46, 'Nigeria', 'Nigerian', 'English, Yoruba'),
(47, 'Spain', 'Spanish', 'Spanish'),
(48, 'Sweden', 'Swede or Swedish', 'Swedish'),
(49, 'Switzerland', 'Swiss', 'German'),
(50, 'Syria', 'Syrian', 'Arabic'),
(51, 'Tunisia', 'Tunisian', 'Arabic'),
(52, 'Turkey', 'Turk or Turkish', 'Turkish'),
(53, 'United Kingdom', 'British, English', 'English'),
(54, 'United States', 'American', 'English'),
(55, 'England', 'Nationality', 'Languages'),
(56, 'dfd', 'ss', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `__currency`
--

CREATE TABLE IF NOT EXISTS `__currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_code` varchar(50) NOT NULL,
  `currency_name` varchar(255) NOT NULL,
  `currency_symbol` varchar(150) NOT NULL,
  `currency_exchange_value` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `__currency`
--

INSERT INTO `__currency` (`id`, `currency_code`, `currency_name`, `currency_symbol`, `currency_exchange_value`) VALUES
(1, 'inr', 'Indian Rupees', 'INR', 55);

-- --------------------------------------------------------

--
-- Table structure for table `__designation`
--

CREATE TABLE IF NOT EXISTS `__designation` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `designation_code` varchar(50) NOT NULL,
  `designation_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `__designation`
--

INSERT INTO `__designation` (`id`, `designation_code`, `designation_name`) VALUES
(1, '045', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `__localization`
--

CREATE TABLE IF NOT EXISTS `__localization` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) NOT NULL,
  `code` varchar(15) NOT NULL,
  `country_id` int(11) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `currency_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `__localization`
--


-- --------------------------------------------------------

--
-- Table structure for table `__login`
--

CREATE TABLE IF NOT EXISTS `__login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_name` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_name_UNIQUE` (`login_name`),
  KEY `fk_login_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `__login`
--

INSERT INTO `__login` (`id`, `user_id`, `login_name`, `password`, `last_updated`, `is_active`) VALUES
(1, 1, 'admin', '0192023a7bbd73250516f069df18b500', '2012-05-03 11:55:54', 1),
(2, 3, 'gmsundar', 'c1d4e10407dd7c54dbc69ff5fe49f99b', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `__menu`
--

CREATE TABLE IF NOT EXISTS `__menu` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `display_icon` varchar(255) DEFAULT NULL,
  `access_key` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `__menu`
--

INSERT INTO `__menu` (`id`, `menu_name`, `url`, `display_icon`, `access_key`, `parent`, `status`) VALUES
(1, 'Home', '#', NULL, NULL, 0, NULL),
(2, 'Academic', '#', '', '', 0, 0),
(3, 'Pre-Admission', 'index.php?file=pre_admission&action=add', '', '', 2, 0),
(4, 'Screening', 'index.php?file=screening', '', '', 2, 0),
(5, 'Admission', 'index.php?file=admission', '', '', 2, 0),
(6, 'Fees', 'index.php?file=report&id=3', '', '', 2, 0),
(7, 'Curriculum', 'index.php?file=curriculum&action=add', '', '', 2, 0),
(8, 'Health', 'index.php?file=health&action=add', '', '', 2, 0),
(9, 'Student', 'index.php?file=student&action=add', '', '', 2, 0),
(10, 'Non-Academic', '#', '', '', 0, 0),
(11, 'Staff', 'index.php?file=teacher&action=add', '', '', 10, 0),
(12, 'Time-Table', 'index.php?file=timetable&action=add', '', '', 10, 0),
(13, 'Memo', 'index.php?file=memo&action=add', '', '', 10, 0),
(14, ' ------------', '', '', '', 10, 0),
(15, 'Payroll', '', '', '', 10, 0),
(17, 'Inventory', '', '', '', 10, 0),
(18, 'Accounts', '', '', '', 10, 0),
(19, 'SMS', '', '', '', 10, 0),
(20, 'Email', '', '', '', 10, 0),
(21, 'Library', '', '', '', 10, 0),
(22, 'Transport', '#', NULL, NULL, 0, NULL),
(23, 'Location', 'index.php?file=branch&action=add', NULL, NULL, 33, NULL),
(24, 'Fees Structure', 'index.php?file=fees_structure&action=add', NULL, NULL, 33, NULL),
(25, 'Fees Type', 'index.php?file=fees_type&action=add', NULL, NULL, 33, NULL),
(26, 'Route Details', 'index.php?file=route_details&action=add', NULL, NULL, 22, NULL),
(27, 'Stage Details', 'index.php?file=stage_details&action=add', NULL, NULL, 22, NULL),
(28, 'Class', 'index.php?file=mclass&action=add', NULL, NULL, 33, NULL),
(29, 'Subjects', 'index.php?file=subjects&action=add', NULL, NULL, 33, NULL),
(30, 'City', 'index.php?file=mcity&action=add', NULL, NULL, 33, NULL),
(31, 'State', 'index.php?file=mstate&action=add', NULL, NULL, 33, NULL),
(32, 'Country', 'index.php?file=mcountry&action=add', NULL, NULL, 33, NULL),
(33, 'Admin', '#', NULL, NULL, 0, NULL),
(34, 'Driver', 'index.php?file=driver&action=add', NULL, NULL, 22, NULL),
(35, 'Vehicle', 'index.php?file=vehicle&action=add', NULL, NULL, 22, 1),
(36, 'Route Allocation', 'index.php?file=route_allocation&action=add', NULL, NULL, 22, 1),
(37, 'Trip Sheet', 'index.php?file=trip_sheet&action=add', NULL, NULL, 22, 1),
(38, 'Report', '#', NULL, NULL, 0, 1),
(39, 'Fees Report', 'index.php?file=report&id=3', NULL, NULL, 38, 1),
(40, 'System Admin', '#', NULL, NULL, 0, 1),
(41, 'Users', 'index.php?file=__user_details&action=add', NULL, NULL, 40, 1),
(42, 'Designation', 'index.php?file=__designation&action=add', NULL, NULL, 40, NULL),
(43, 'Login', 'index.php?file=__login&action=add', '', '', 40, 0),
(44, 'Menu', 'index.php?file=__menu&action=add', '', '', 40, 0),
(45, 'User Menu', 'index.php?file=__user_menu_details&action=add', '', '', 40, 0),
(46, 'Report Filters', 'index.php?file=__report_filters&action=add', '', '', 40, 0),
(47, 'Report Columns', 'index.php?file=__report_columns&action=add', '', '', 40, 0),
(49, 'Report Customization', 'index.php?file=__report_customizations&action=add', '', '', 40, 0),
(50, 'Class Section Relation', 'index.php?file=class_section_relation&action=add', '', '', 33, 0),
(51, 'Class Subject Relation', 'index.php?file=class_subject_relation&action=add', '', '', 33, 0),
(52, 'Sections', 'index.php?file=sections&action=add', '', '', 33, 0),
(53, 'Blood Group', 'index.php?file=__blood_group&action=add', NULL, NULL, 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `__reports`
--

CREATE TABLE IF NOT EXISTS `__reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `report_name` varchar(500) NOT NULL,
  `report_file` varchar(1500) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `report_name` (`report_name`),
  KEY `__reports_report_file_idx` (`report_file`(767)),
  KEY `__reports_add_date_idx` (`add_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `__reports`
--

INSERT INTO `__reports` (`id`, `report_name`, `report_file`, `add_date`) VALUES
(1, 'state test', 'mstate1.rptdesign', '2012-02-01 15:09:55'),
(2, 'application_bill', 'application_bill.rptdesign', '2012-02-11 02:47:00'),
(3, 'fees search', 'fees_search.rptdesign', '2012-04-04 12:08:45'),
(4, 'fee_structure', 'fee_structure.rptdesign', '2012-03-05 13:53:52'),
(5, 'welcome_letter', 'welcome_letter.rptdesign', '2012-03-24 18:19:59'),
(6, 'payment_history', 'payment_history.rptdesign', '2012-03-26 15:43:11'),
(7, 'payment_receipt', 'payment_receipt.rptdesign', '2012-03-27 21:10:52'),
(8, 'pre_admission', 'pre_admission', '2012-05-04 00:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `__report_columns`
--

CREATE TABLE IF NOT EXISTS `__report_columns` (
  `id` int(10) NOT NULL,
  `customization_id` int(10) NOT NULL,
  `column_name` varchar(10) NOT NULL,
  `display_name` varchar(10) NOT NULL,
  `alignment` char(10) NOT NULL,
  `format_as` varchar(10) DEFAULT NULL,
  `is_visible` char(10) NOT NULL,
  `display_order` int(10) NOT NULL,
  KEY `customization_id` (`customization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `__report_columns`
--


-- --------------------------------------------------------

--
-- Table structure for table `__report_customizations`
--

CREATE TABLE IF NOT EXISTS `__report_customizations` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `report_id` int(50) NOT NULL,
  `customization_name` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `report_id` (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `__report_customizations`
--


-- --------------------------------------------------------

--
-- Table structure for table `__report_filters`
--

CREATE TABLE IF NOT EXISTS `__report_filters` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `customization_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `default_filter` varchar(50) DEFAULT NULL,
  `user_filter` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customization_id` (`customization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `__report_filters`
--


-- --------------------------------------------------------

--
-- Table structure for table `__sequence`
--

CREATE TABLE IF NOT EXISTS `__sequence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seq_name` varchar(255) NOT NULL,
  `seq_value` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `column_name` varchar(50) NOT NULL,
  `increment_factor` int(11) NOT NULL,
  `pad_count` int(11) NOT NULL,
  `pad_char` varchar(11) NOT NULL,
  `pad_type` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `__sequence`
--

INSERT INTO `__sequence` (`id`, `seq_name`, `seq_value`, `table_name`, `column_name`, `increment_factor`, `pad_count`, `pad_char`, `pad_type`) VALUES
(1, 'chellan_no', 12, '', '', 1, 9, '0', 'STR_PAD_LEFT'),
(2, 'bill_no', 10, 'pre_admission', 'bill_no', 1, 4, '0', '0'),
(3, 'enrollment', 6, 'admission', 'enrollment', 1, 5, '0', '0'),
(4, 'bill_no1', 1, 'fees', 'bill_no', 1, 4, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `__state`
--

CREATE TABLE IF NOT EXISTS `__state` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `state_code` varchar(45) DEFAULT NULL,
  `state_name` varchar(45) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `__state`
--

INSERT INTO `__state` (`id`, `state_code`, `state_name`, `country_id`) VALUES
(1, 'AP', 'Andhra Pradesh', 101),
(2, 'AR', 'Arunachal Pradesh', 101),
(3, 'AS', 'Assam', 101),
(4, 'BR', 'Bihar', 101),
(5, 'CG', 'Chhattisgarh', 101),
(6, 'GA', 'Goa', 101),
(7, 'GJ', 'Gujarat', 101),
(8, 'HR', 'Haryana', 101),
(9, 'HP', 'Himachal Pradesh', 101),
(10, 'JK', 'Jammu & Kashmir', 101),
(11, 'JH', 'Jharkhand', 101),
(12, 'KA', 'Karnataka', 101),
(13, 'KL', 'Kerala', 101),
(14, 'MP', 'Madhya Pradesh', 101),
(15, 'MH', 'Maharashtra', 101),
(16, 'MN', 'Manipur', 101),
(17, 'ML', 'Meghalaya', 101),
(18, 'MZ', 'Mizoram', 101),
(19, 'NL', 'Nagaland', 101),
(20, 'OR', 'Orissa', 101),
(21, 'PB', 'Punjab', 101),
(22, 'RJ', 'Rajasthan', 101),
(23, 'SK', 'Sikkim', 101),
(24, 'TN', 'Tamil Nadu', 101),
(25, 'TR', 'Tripura', 101),
(26, 'UK', 'Uttarakhand', 101),
(27, 'UP', 'Uttar Pradesh', 101),
(28, 'WB', 'West Bengal', 101),
(29, 'AA', 'Chicago', 32);

-- --------------------------------------------------------

--
-- Table structure for table `__user_details`
--

CREATE TABLE IF NOT EXISTS `__user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `middle_name` varchar(150) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `work_phone` varchar(45) DEFAULT NULL,
  `deignation` int(50) DEFAULT NULL,
  `taddress_1` varchar(255) DEFAULT NULL,
  `taddress_2` varchar(255) NOT NULL,
  `tcity_id` int(11) NOT NULL,
  `tstate_id` int(11) NOT NULL,
  `tcountry_id` int(11) NOT NULL,
  `paddress_1` varchar(255) NOT NULL,
  `paddress_2` varchar(255) NOT NULL,
  `pcity_id` int(11) NOT NULL,
  `pstate_id` int(11) NOT NULL,
  `pcountry_id` int(11) NOT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `blood_group` int(5) DEFAULT NULL,
  `photo` varchar(550) DEFAULT NULL,
  `is_physically_challenged` char(1) NOT NULL,
  `physically_challanged_remarks` varchar(2500) DEFAULT NULL,
  `sex` char(1) NOT NULL,
  `user_type` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_last_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `tcity_id` (`tcity_id`),
  KEY `tstate_id` (`tstate_id`),
  KEY `tcountry_id` (`tcountry_id`),
  KEY `branch_id` (`branch_id`),
  KEY `user_type` (`user_type`),
  KEY `blood_group` (`blood_group`),
  KEY `organization_id` (`organization_id`),
  KEY `pcountry_id` (`pcountry_id`),
  KEY `pstate_id` (`pstate_id`),
  KEY `pcity_id` (`pcity_id`),
  KEY `deignation` (`deignation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `__user_details`
--

INSERT INTO `__user_details` (`id`, `first_name`, `last_name`, `middle_name`, `date_of_birth`, `email`, `mobile`, `work_phone`, `deignation`, `taddress_1`, `taddress_2`, `tcity_id`, `tstate_id`, `tcountry_id`, `paddress_1`, `paddress_2`, `pcity_id`, `pstate_id`, `pcountry_id`, `organization_id`, `blood_group`, `photo`, `is_physically_challenged`, `physically_challanged_remarks`, `sex`, `user_type`, `branch_id`, `status`, `date_added`, `date_last_updated`) VALUES
(1, 'Sundar', 'G', NULL, NULL, NULL, NULL, NULL, 1, NULL, '', 1, 1, 1, '', '', 1, 1, 1, 1, NULL, NULL, '', NULL, '', 1, 1, '', '2012-05-03 11:56:24', '0000-00-00 00:00:00'),
(3, 'Meenakshi', 'Sundaram', 'S', '0000-00-00', 'meenakshi.sun20@gmail.com', '09841673880', '09841673880', 1, 'Plot 7 ,Ist main Road ,Krishna nagar', 'Madanandapuram,Porur,Chennai', 1, 24, 31, 'Plot 7 ,Ist main Road ,Krishna nagar', 'Madanandapuram,Porur,Chennai', 1, 24, 31, 1, 1, 'http://localhost/issueescalator/src/img/noimage.jpg', 'o', '', 'm', 3, 2, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'user123', 'Sundaram', 'S', '2012-05-15', 'ganeshjdir@yahoo.com', '09841673880', '', 1, '', '', 1, 24, 31, '', '', 1, 24, 31, 2, 1, 'http://localhost/schoolerp/src/img/noimage.jpg', '', '', 'm', 3, 2, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `__user_menu_details`
--

CREATE TABLE IF NOT EXISTS `__user_menu_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `__user_menu_details`
--

INSERT INTO `__user_menu_details` (`id`, `user_id`, `menu_id`) VALUES
(1, 1, 0),
(2, 1, 1),
(3, 1, 2),
(4, 1, 3),
(5, 1, 4),
(6, 1, 5),
(7, 1, 6),
(8, 1, 7),
(9, 1, 8),
(10, 1, 9),
(11, 1, 10),
(12, 1, 11),
(13, 1, 12),
(14, 1, 13),
(15, 1, 14),
(16, 1, 15),
(17, 1, 16),
(18, 1, 17),
(19, 1, 18),
(20, 1, 19),
(21, 1, 20),
(22, 1, 21),
(23, 1, 22),
(24, 1, 23),
(25, 1, 24),
(26, 1, 25),
(27, 1, 26),
(28, 1, 27),
(29, 1, 28),
(30, 1, 29),
(31, 1, 30),
(32, 1, 31),
(33, 1, 32),
(34, 1, 33),
(35, 1, 34),
(36, 1, 35),
(37, 1, 36),
(38, 1, 37),
(39, 1, 38),
(40, 1, 39),
(41, 1, 40),
(42, 1, 41),
(43, 1, 42),
(44, 1, 43),
(45, 1, 44),
(46, 1, 45),
(47, 1, 46),
(48, 1, 47),
(49, 1, 48),
(50, 1, 49),
(51, 1, 50),
(52, 1, 51),
(53, 1, 52),
(54, 1, 53),
(55, 1, 54),
(56, 1, 55),
(57, 1, 56),
(58, 1, 57),
(59, 1, 58),
(60, 1, 59),
(61, 1, 60),
(62, 1, 61),
(63, 1, 62),
(64, 1, 63),
(65, 1, 64),
(66, 1, 65),
(67, 1, 66),
(68, 1, 40),
(69, 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `__user_type`
--

CREATE TABLE IF NOT EXISTS `__user_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(255) NOT NULL,
  `user_restrictions` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `__user_type`
--

INSERT INTO `__user_type` (`id`, `user_type_name`, `user_restrictions`) VALUES
(1, 'Admin', ''),
(2, 'CEO', ''),
(3, 'User (Chennai)', 'branch_id=2'),
(4, 'User (Kanchipuram)', 'branch_id=3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `admission_ibfk_7` FOREIGN KEY (`screening_id`) REFERENCES `screening` (`id`),
  ADD CONSTRAINT `admission_ibfk_8` FOREIGN KEY (`current_class`) REFERENCES `mclass` (`id`);

--
-- Constraints for table `class_section_relation`
--
ALTER TABLE `class_section_relation`
  ADD CONSTRAINT `class_section_relation_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `mclass` (`id`),
  ADD CONSTRAINT `class_section_relation_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `class_section_relation_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `__user_details` (`id`);

--
-- Constraints for table `class_subject_relation`
--
ALTER TABLE `class_subject_relation`
  ADD CONSTRAINT `class_subject_relation_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `class_subject_relation_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `__user_details` (`id`),
  ADD CONSTRAINT `class_subject_relation_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `class_section_relation` (`id`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `__user_details` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_education_details_id` FOREIGN KEY (`education_details_id`) REFERENCES `education_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_experience_id` FOREIGN KEY (`experience_details_id`) REFERENCES `experence_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_user_id` FOREIGN KEY (`user_id`) REFERENCES `__user_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `fees_dues`
--
ALTER TABLE `fees_dues`
  ADD CONSTRAINT `fees_dues_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `admission` (`id`),
  ADD CONSTRAINT `fees_dues_ibfk_2` FOREIGN KEY (`fees_type_id`) REFERENCES `fees_type` (`id`);

--
-- Constraints for table `fees_structure`
--
ALTER TABLE `fees_structure`
  ADD CONSTRAINT `fees_structure_ibfk_2` FOREIGN KEY (`fees_types`) REFERENCES `fees_type` (`id`),
  ADD CONSTRAINT `fees_structure_ibfk_4` FOREIGN KEY (`class`) REFERENCES `mclass` (`id`),
  ADD CONSTRAINT `fees_structure_ibfk_5` FOREIGN KEY (`branch_id`) REFERENCES `__branch_details` (`id`);

--
-- Constraints for table `pre_admission`
--
ALTER TABLE `pre_admission`
  ADD CONSTRAINT `pre_admission_ibfk_1` FOREIGN KEY (`class_to_be_admitted`) REFERENCES `mclass` (`id`);

--
-- Constraints for table `route_allocation`
--
ALTER TABLE `route_allocation`
  ADD CONSTRAINT `route_allocation_ibfk_1` FOREIGN KEY (`vehicle_no`) REFERENCES `vehicle` (`id`),
  ADD CONSTRAINT `route_allocation_ibfk_2` FOREIGN KEY (`driver_name`) REFERENCES `driver` (`id`),
  ADD CONSTRAINT `route_allocation_ibfk_3` FOREIGN KEY (`route`) REFERENCES `route_details` (`id`);

--
-- Constraints for table `screening`
--
ALTER TABLE `screening`
  ADD CONSTRAINT `screening_ibfk_3` FOREIGN KEY (`application_id`) REFERENCES `pre_admission` (`id`),
  ADD CONSTRAINT `screening_ibfk_4` FOREIGN KEY (`screening_teacher`) REFERENCES `__user_details` (`id`);

--
-- Constraints for table `stage_details`
--
ALTER TABLE `stage_details`
  ADD CONSTRAINT `stage_details_ibfk_1` FOREIGN KEY (`route_name`) REFERENCES `route_details` (`id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `__user_details` (`id`);

--
-- Constraints for table `test_ui`
--
ALTER TABLE `test_ui`
  ADD CONSTRAINT `test_ui_ibfk_1` FOREIGN KEY (`select_foregin`) REFERENCES `test_ui_child` (`id`);

--
-- Constraints for table `time_table`
--
ALTER TABLE `time_table`
  ADD CONSTRAINT `time_table_ibfk_1` FOREIGN KEY (`class_section_id`) REFERENCES `class_section_relation` (`id`),
  ADD CONSTRAINT `time_table_ibfk_2` FOREIGN KEY (`branch_id`) REFERENCES `__branch_details` (`id`),
  ADD CONSTRAINT `time_table_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `time_table_settings`
--
ALTER TABLE `time_table_settings`
  ADD CONSTRAINT `time_table_settings_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `__user_details` (`id`);

--
-- Constraints for table `__branch_details`
--
ALTER TABLE `__branch_details`
  ADD CONSTRAINT `__branch_details_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `__city` (`id`),
  ADD CONSTRAINT `__branch_details_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `__state` (`id`),
  ADD CONSTRAINT `__branch_details_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `__country` (`id`),
  ADD CONSTRAINT `__branch_details_ibfk_4` FOREIGN KEY (`currency_id`) REFERENCES `__currency` (`id`),
  ADD CONSTRAINT `__branch_details_ibfk_5` FOREIGN KEY (`company_id`) REFERENCES `__company` (`id`);

--
-- Constraints for table `__city`
--
ALTER TABLE `__city`
  ADD CONSTRAINT `__city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `__state` (`id`);

--
-- Constraints for table `__company`
--
ALTER TABLE `__company`
  ADD CONSTRAINT `__company_ibfk_1` FOREIGN KEY (`currency_id`) REFERENCES `__currency` (`id`);

--
-- Constraints for table `__localization`
--
ALTER TABLE `__localization`
  ADD CONSTRAINT `__localization_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `__country` (`id`),
  ADD CONSTRAINT `__localization_ibfk_2` FOREIGN KEY (`currency_id`) REFERENCES `__currency` (`id`);

--
-- Constraints for table `__login`
--
ALTER TABLE `__login`
  ADD CONSTRAINT `fk_login_user_id` FOREIGN KEY (`user_id`) REFERENCES `__user_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `__report_columns`
--
ALTER TABLE `__report_columns`
  ADD CONSTRAINT `__report_columns_ibfk_1` FOREIGN KEY (`customization_id`) REFERENCES `__report_customizations` (`id`);

--
-- Constraints for table `__report_customizations`
--
ALTER TABLE `__report_customizations`
  ADD CONSTRAINT `__report_customizations_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `__reports` (`id`);

--
-- Constraints for table `__report_filters`
--
ALTER TABLE `__report_filters`
  ADD CONSTRAINT `__report_filters_ibfk_1` FOREIGN KEY (`customization_id`) REFERENCES `__report_customizations` (`id`);

--
-- Constraints for table `__user_details`
--
ALTER TABLE `__user_details`
  ADD CONSTRAINT `__user_details_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `__company` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_10` FOREIGN KEY (`user_type`) REFERENCES `__user_type` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_11` FOREIGN KEY (`branch_id`) REFERENCES `__branch_details` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_2` FOREIGN KEY (`deignation`) REFERENCES `__designation` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_3` FOREIGN KEY (`tstate_id`) REFERENCES `__state` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_4` FOREIGN KEY (`tcountry_id`) REFERENCES `__country` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_5` FOREIGN KEY (`pstate_id`) REFERENCES `__state` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_6` FOREIGN KEY (`pcountry_id`) REFERENCES `__country` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_7` FOREIGN KEY (`tcity_id`) REFERENCES `__city` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_8` FOREIGN KEY (`pcity_id`) REFERENCES `__city` (`id`),
  ADD CONSTRAINT `__user_details_ibfk_9` FOREIGN KEY (`blood_group`) REFERENCES `__blood_group` (`id`);
