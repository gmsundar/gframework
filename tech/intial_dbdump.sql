-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2012 at 07:54 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gflat_manager`
--

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
  `tet` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency_id` (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `__company`
--

INSERT INTO `__company` (`id`, `company_name`, `company_code`, `company_logo`, `currency_id`, `website`, `tax_id`, `phone1`, `phone2`, `tet`) VALUES
(1, 'Geotekh', 'Gt', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Sangford', 'Sgf', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Table structure for table `__dashboard`
--

CREATE TABLE IF NOT EXISTS `__dashboard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `columns` int(11) NOT NULL DEFAULT '2',
  `user_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `__dashboard`
--

INSERT INTO `__dashboard` (`id`, `title`, `columns`, `user_id`) VALUES
(1, 'First Dashboard', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `__dashboard_widget_relation`
--

CREATE TABLE IF NOT EXISTS `__dashboard_widget_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dashboard_id` int(11) NOT NULL,
  `widget_id` int(11) NOT NULL,
  `row` smallint(6) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `status` char(1) NOT NULL,
  `add_date` datetime DEFAULT NULL,
  `col` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 1, 'admin', '0192023a7bbd73250516f069df18b500', '2012-05-03 06:25:54', 1),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(1, 'state test', 'mstate1.rptdesign', '2012-02-01 09:39:55'),
(2, 'application_bill', 'application_bill.rptdesign', '2012-02-10 21:17:00'),
(3, 'fees search', 'fees_search.rptdesign', '2012-04-04 06:38:45'),
(4, 'fee_structure', 'fee_structure.rptdesign', '2012-03-05 08:23:52'),
(5, 'welcome_letter', 'welcome_letter.rptdesign', '2012-03-24 12:49:59'),
(6, 'payment_history', 'payment_history.rptdesign', '2012-03-26 10:13:11'),
(7, 'payment_receipt', 'payment_receipt.rptdesign', '2012-03-27 15:40:52'),
(8, 'pre_admission', 'pre_admission', '2012-05-03 19:20:40');

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
(2, 'bill_no', 11, 'pre_admission', 'bill_no', 1, 4, '0', '0'),
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
(1, 'Sundar', 'G', NULL, NULL, NULL, NULL, NULL, 1, NULL, '', 1, 1, 1, '', '', 1, 1, 1, 1, NULL, NULL, '', NULL, '', 1, 1, '', '2012-05-03 06:26:24', '0000-00-00 00:00:00'),
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `__widgets`
--

CREATE TABLE IF NOT EXISTS `__widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin,
  `title` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
