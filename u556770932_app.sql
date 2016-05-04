
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2016 at 03:51 PM
-- Server version: 10.0.19-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u556770932_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignment`
--

CREATE TABLE IF NOT EXISTS `tbl_assignment` (
  `AssignmentID` int(10) NOT NULL AUTO_INCREMENT,
  `TaskID` int(10) NOT NULL,
  `AssignedTo` int(10) NOT NULL,
  `AssignedBy` int(10) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT '1',
  `AssignedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`AssignmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_assignment`
--

INSERT INTO `tbl_assignment` (`AssignmentID`, `TaskID`, `AssignedTo`, `AssignedBy`, `Status`, `AssignedDate`) VALUES
(1, 1, 2, 1, 1, '2016-04-11 18:55:09'),
(2, 2, 2, 1, 1, '2016-04-11 18:56:13'),
(3, 3, 2, 1, 1, '2016-04-11 18:56:49'),
(4, 4, 2, 1, 1, '2016-04-11 18:57:32'),
(5, 5, 1, 1, 1, '2016-04-11 19:12:47'),
(6, 6, 1, 1, 1, '2016-04-11 19:13:19'),
(7, 7, 1, 1, 1, '2016-04-11 19:13:44'),
(8, 8, 1, 1, 1, '2016-04-11 19:14:21'),
(9, 9, 1, 1, 1, '2016-04-11 19:14:47'),
(10, 10, 2, 1, 1, '2016-04-13 03:26:22'),
(11, 13, 2, 1, 1, '2016-04-13 03:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE IF NOT EXISTS `tbl_company` (
  `CompanyID` int(10) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(40) NOT NULL,
  `CompanyDesc` varchar(255) NOT NULL,
  `ContactPerson` varchar(40) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `EmailAddress` varchar(60) NOT NULL,
  `Website` varchar(255) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`CompanyID`, `CompanyName`, `CompanyDesc`, `ContactPerson`, `ContactNumber`, `EmailAddress`, `Website`, `Status`) VALUES
(1, 'Little Sparkie', 'full-service commercial, industrial, and residential electrical contractor, centrally located in Mount Airy, Maryland. We are licensed all over Maryland and also in Virginia.', 'Catherine Nazarene', '', '', 'http://littlesparkie.com/', 1),
(2, 'Cklaar College Consulting', 'Help students and parents sort through the overwhelming steps of the college application process and find the colleges that are the "best fit" academically, financially and socially.', 'Charlotte Klaar', '', '', 'http://www.cklaar.com/', 1),
(3, 'Africa  Business Portal', 'Africa- the world’s youngest work-force, an emerging middle class, and explosive growth from academics to investment, makes it the perfect place for companies looking to expand.', '', '', '', 'africabusinessportal.com', 1),
(4, 'Hulyas Aesthetics', '', 'Diane DeMarco', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `DepartmentID` int(10) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(100) NOT NULL,
  `DepartmentDesc` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`DepartmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`DepartmentID`, `DepartmentName`, `DepartmentDesc`, `Status`) VALUES
(1, 'Developer', 'Developer', 1),
(2, 'SEO', 'SEO', 1),
(3, 'IT / System Administrator', 'IT / System Administrator', 1),
(4, 'Accountant', 'Accountant', 1),
(5, 'Project Management', 'Project Management', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `LoginID` int(10) NOT NULL AUTO_INCREMENT,
  `PersonalInfoID` int(10) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Key` varchar(255) NOT NULL,
  `Role` varchar(40) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`LoginID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`LoginID`, `PersonalInfoID`, `Username`, `Password`, `Key`, `Role`, `Status`) VALUES
(1, 1, 'ian.alfie', '1234', 'Ggr2V6STi1q7PogOSHskp9GOPpLerQassk0AhZsJ', 'admin', 1),
(2, 2, 'jcruz', '1234', 'YvG6Pj8NXUHguinSK9fJ4RoA0epqDskLQ3WC_Td1', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personalinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_personalinfo` (
  `PersonalInfoID` int(10) NOT NULL AUTO_INCREMENT,
  `DepartmentID` int(11) NOT NULL,
  `FName` varchar(40) NOT NULL,
  `MName` varchar(40) NOT NULL,
  `LName` varchar(40) NOT NULL,
  `EmailAddress` varchar(60) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Birthday` date NOT NULL,
  `DateRegistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DisplayPic` varchar(255) NOT NULL,
  PRIMARY KEY (`PersonalInfoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_personalinfo`
--

INSERT INTO `tbl_personalinfo` (`PersonalInfoID`, `DepartmentID`, `FName`, `MName`, `LName`, `EmailAddress`, `Gender`, `Birthday`, `DateRegistered`, `DisplayPic`) VALUES
(1, 5, 'Ian Alfie', 'C', 'Dayandayan', 'alfie.ian0605@gmail.com', 'M', '0000-00-00', '2016-04-09 01:37:25', '34V9yjKOF0zH6bXLfAivC7DeGMh1JtwuINocTsS2.jpg'),
(2, 1, 'John Perri', 'Atienza', 'Cruz', 'johnperricruz@gmail.com', 'M', '1994-12-30', '2016-04-10 00:58:52', 'bS3TDuXd7P4VWUiHaNp8Llqf_veAr6yIOKYk2cjm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE IF NOT EXISTS `tbl_projects` (
  `ProjectID` int(10) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(10) NOT NULL,
  `ProjectCreator` int(11) NOT NULL,
  `ProjectName` varchar(40) NOT NULL,
  `ProjectDesc` varchar(255) NOT NULL,
  `ProjectHours` int(60) NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Deadline` date NOT NULL,
  `Status` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ProjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`ProjectID`, `CompanyID`, `ProjectCreator`, `ProjectName`, `ProjectDesc`, `ProjectHours`, `DateCreated`, `Deadline`, `Status`) VALUES
(1, 1, 1, 'Little Sparkie (Wordpress)', '', 40, '2016-04-10 01:04:38', '2016-05-30', 1),
(2, 2, 1, 'Cklaar College (Wordpress)', '', 40, '2016-04-10 01:05:30', '2016-05-31', 1),
(3, 0, 1, 'Hulyas Aesthetics', '', 50, '2016-04-11 19:01:23', '2016-04-11', 1),
(4, 4, 1, 'Hulyas Aesthetics (Support)', 'Just for Support', 50, '2016-04-11 19:02:55', '2016-04-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate`
--

CREATE TABLE IF NOT EXISTS `tbl_rate` (
  `RateID` int(11) NOT NULL AUTO_INCREMENT,
  `Rate` int(11) NOT NULL,
  PRIMARY KEY (`RateID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_rate`
--

INSERT INTO `tbl_rate` (`RateID`, `Rate`) VALUES
(1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `SettingsID` int(10) NOT NULL AUTO_INCREMENT,
  `SettingsName` varchar(50) NOT NULL,
  `Value` varchar(50) NOT NULL,
  PRIMARY KEY (`SettingsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`SettingsID`, `SettingsName`, `Value`) VALUES
(1, 'SystemDate', 'M d, Y'),
(2, 'RememberMe', '0'),
(3, 'SystemTime', 'H: i s'),
(4, 'ForgotPassword', '1'),
(5, 'SystemMailer', 'info@johnperricruz.com'),
(6, 'SystemSender', 'Time Tracker'),
(7, 'UnsecuredSiteAddress', 'http://app.johnperricruz.com/'),
(8, 'WebsiteTitle', 'Time Tracker');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE IF NOT EXISTS `tbl_tasks` (
  `TaskID` int(10) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(10) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `SubcategoryID` int(11) NOT NULL,
  `TaskName` varchar(255) NOT NULL,
  `TaskDesc` varchar(255) NOT NULL,
  `PriorityLevel` varchar(10) NOT NULL,
  `ExpectedHour` int(60) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT '1',
  `TaskPercentage` int(11) NOT NULL,
  PRIMARY KEY (`TaskID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`TaskID`, `ProjectID`, `CategoryID`, `SubcategoryID`, `TaskName`, `TaskDesc`, `PriorityLevel`, `ExpectedHour`, `Status`, `TaskPercentage`) VALUES
(1, 2, 10, 45, 'Create New Page', 'Create new page for cklaar see email for content and further instruction', 'medium', 2, 1, 100),
(2, 1, 5, 0, 'Mock Up Creation', 'Create 2 sets of mock for Little Sparkie', 'medium', 2, 1, 50),
(3, 1, 5, 0, 'Design Implementation', 'Implement design to test.littlesparkie.com use demo 3', 'medium', 10, 1, 100),
(4, 1, 5, 0, 'Set Up Test Site', 'set up wp test site: test.littlesparkie.com', 'medium', 1, 1, 100),
(5, 4, 5, 0, 'Clerical fix', '2. Edit clerical error - Services', 'high', 1, 1, 100),
(6, 4, 8, 39, 'Add dropdowns', 'And dropdowns to Aesthetic and Medical using anchor text', 'medium', 2, 1, 0),
(7, 4, 8, 39, 'Redesign SKIN THERAPY block', 'Update and redesign skin therapy section ', 'low', 2, 1, 0),
(8, 4, 3, 14, 'Change SEO Plugin', 'Change and update SEO Plugin to Yoast, set and configure', 'medium', 1, 1, 0),
(9, 4, 8, 39, 'Update Footer', 'Edit footer from WP to Copyright text', 'medium', 1, 1, 0),
(10, 4, 8, 0, 'Add Menu on Mobile', 'I already installed the plugin. Just fix the css and refer to Diane''s instruction sent via FB', 'medium', 1, 1, 100),
(11, 4, 8, 39, 'QC Task', 'This isn''t a paid task but I will try to bump up the hours once these fixes will find is approved by Diane. Add your findings here: https://docs.google.com/spreadsheets/d/1TCQfe-ETY6SuakruryJ6h9EtvKeBmmt8xmTK0SgRpuY/edit?usp=drive_web', 'low', 3, 1, 0),
(12, 4, 5, 0, 'QC Task', 'https://docs.google.com/spreadsheets/d/1TCQfe-ETY6SuakruryJ6h9EtvKeBmmt8xmTK0SgRpuY/edit?usp=drive_web\n\nThis task is unpaid but once diane approved our findings I''ll bump up the hours. Hope this is okay with you.', 'medium', 3, 1, 0),
(13, 4, 5, 0, 'QC Task', 'https://docs.google.com/spreadsheets/d/1TCQfe-ETY6SuakruryJ6h9EtvKeBmmt8xmTK0SgRpuY/edit#gid=0\n\nThis QC task is unpaid BUT once Diane approved our findings I will bump up the hours. Hope this is okay with you. Thanks', 'low', 2, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task_category`
--

CREATE TABLE IF NOT EXISTS `tbl_task_category` (
  `CategoryID` int(10) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(60) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_task_category`
--

INSERT INTO `tbl_task_category` (`CategoryID`, `CategoryName`, `Status`) VALUES
(1, 'Project Management', 1),
(2, 'Demo Creation', 1),
(3, 'Website Pre-Launch Check', 1),
(4, 'Database', 1),
(5, 'Build Out Site', 1),
(6, 'E-commerce', 1),
(7, 'Launch', 1),
(8, 'Web Maintenance (check all browsers)', 1),
(9, 'SEO', 1),
(10, 'Site Maintenance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task_subcategory`
--

CREATE TABLE IF NOT EXISTS `tbl_task_subcategory` (
  `SubcategoryID` int(10) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(10) NOT NULL,
  `SubcategoryName` varchar(60) NOT NULL,
  `Status` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`SubcategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tbl_task_subcategory`
--

INSERT INTO `tbl_task_subcategory` (`SubcategoryID`, `CategoryID`, `SubcategoryName`, `Status`) VALUES
(1, 1, 'Create Project Plan', 1),
(2, 1, 'Revise Project Plan', 1),
(3, 1, 'Emails Calls Meeting', 1),
(4, 2, 'QuickBooks', 1),
(5, 2, 'Demo', 1),
(6, 2, 'Logo', 1),
(7, 3, 'Presentation', 1),
(8, 3, 'Security', 1),
(9, 3, 'System & Configuration Settings', 1),
(10, 3, 'Development Cleanup', 1),
(11, 3, 'Performance Tuning', 1),
(12, 3, 'Systems/Traffic Management', 1),
(13, 3, 'IT Systems Management', 1),
(14, 3, 'Be Prepared', 1),
(15, 4, 'Create Dev URL', 1),
(16, 4, 'Set Up Magento', 1),
(17, 6, 'Add Product Descriptions', 1),
(18, 6, 'Design Product Page Layout', 1),
(19, 6, 'Design Category Page Layout', 1),
(20, 6, 'Design Category Page Layout', 1),
(21, 6, 'Add Products', 1),
(22, 6, 'Put Products Into Categories', 1),
(23, 6, 'Add Category Navigation', 1),
(24, 6, 'Add Main Navigation (Social Media Section)', 1),
(25, 6, 'Add Content To Pages', 1),
(26, 6, 'Fix Responsiveness', 1),
(27, 6, 'Add Homepage Rotation', 1),
(28, 6, 'Create Contact Form', 1),
(29, 6, 'Add Email to Notifications', 1),
(30, 6, 'Configure Shipping', 1),
(31, 6, 'Add Payment Gateway', 1),
(32, 6, 'Take Out of Test Mode', 1),
(33, 6, 'Add SSL', 1),
(34, 7, 'Hosting/Maintenance', 1),
(35, 7, 'Canonical Domain Issues', 1),
(36, 7, 'Change No Index No Follow', 1),
(37, 7, 'Make the site Live', 1),
(38, 7, 'Active Analytics', 1),
(39, 8, 'Update Content', 1),
(40, 9, 'Onsite Optimization', 1),
(41, 9, 'Optimize Page Names', 1),
(42, 9, 'Google Analytics', 1),
(43, 9, 'Google Webmaster Tools', 1),
(44, 9, 'Basic SEO Settings', 1),
(45, 10, 'Create Ad Images', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_entry`
--

CREATE TABLE IF NOT EXISTS `tbl_time_entry` (
  `TimeEntryID` int(10) NOT NULL AUTO_INCREMENT,
  `TaskID` int(10) NOT NULL,
  `RenderedHours` float NOT NULL,
  `TaskComment` varchar(255) NOT NULL,
  `InputedBy` int(10) NOT NULL,
  `DateInputted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TimeEntryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_time_entry`
--

INSERT INTO `tbl_time_entry` (`TimeEntryID`, `TaskID`, `RenderedHours`, `TaskComment`, `InputedBy`, `DateInputted`) VALUES
(1, 4, 1.5, '', 2, '2016-04-11 22:58:56'),
(2, 3, 3, 'Design Implementation for the Homepage ', 2, '2016-04-13 03:05:10'),
(3, 2, 1, 'Inner page Demo\ntest.littlesparkie.com/demo/resources/html/innerpage.html', 2, '2016-04-13 03:41:38'),
(4, 10, 1, '', 2, '2016-04-13 03:42:56'),
(5, 1, 2, '', 2, '2016-04-15 17:43:29'),
(6, 13, 0.5, 'https://docs.google.com/spreadsheets/d/1TCQfe-ETY6SuakruryJ6h9EtvKeBmmt8xmTK0SgRpuY/edit#gid=0', 2, '2016-04-18 04:25:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
