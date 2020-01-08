-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 02:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bupharco_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_info`
--

CREATE TABLE IF NOT EXISTS `tbl_account_info` (
`account_info_id` int(11) NOT NULL,
  `date_approve` varchar(20) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ac_resolution_no` varchar(150) NOT NULL,
  `branch` int(11) NOT NULL,
  `subs_share` varchar(100) NOT NULL,
  `classifications` varchar(3) NOT NULL,
  `facilitator` varchar(50) NOT NULL,
  `encoded_by` varchar(50) NOT NULL,
  `invited_by` varchar(50) NOT NULL,
  `date_of_pmes` varchar(50) NOT NULL,
  `encoded_date` varchar(50) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_info`
--

INSERT INTO `tbl_account_info` (`account_info_id`, `date_approve`, `member_id`, `ac_resolution_no`, `branch`, `subs_share`, `classifications`, `facilitator`, `encoded_by`, `invited_by`, `date_of_pmes`, `encoded_date`, `remarks`) VALUES
(2, '11/26/2019', 216, '000123', 3, '', 'A+', 'Samsung8458', '1', '', '11/12/2019', '11/19/2019', 'TESTING'),
(3, '11/28/2019', 217, '000123', 1, '', 'C', 'Ghre', '1', 'Matthew Derek', '11/27/2019', '11/24/2019', ''),
(4, '12/03/2019', 218, '', 1, '', 'C', '', '1', '', '', '2019-12-03', ''),
(5, '', 222, '', 1, '', 'C', '', '1', '', '', '2019-12-09', ''),
(6, '', 223, '', 1, '', 'C', '', '1', '', '', '2019-12-09', ''),
(7, '', 224, '', 2, '', 'C', '', '1', '', '', '2019-12-09', ''),
(8, '', 228, '', 1, '', 'C', '', '1', '', '', '2019-12-09', ''),
(9, '', 236, '', 1, '', 'C', '', '1', '', '', '2019-12-09', ''),
(10, '', 237, '', 1, '', 'C', '', '1', '', '', '2019-12-09', ''),
(11, '', 238, '', 1, '', 'C', '', '1', '', '', '2019-12-11', ''),
(12, '', 239, '', 1, '', 'C', '', '1', '', '', '2019-12-18', ''),
(13, '12/30/2019', 240, '', 1, '', 'C', '', '1', '', '', '2019-12-18', ''),
(14, '', 241, '', 1, '', 'C', '', '1', '', '', '2019-12-18', ''),
(15, '12/30/2019', 240, '', 1, '', 'C', '', '1', '', '', '2019-12-18', ''),
(16, '', 241, '', 1, '', 'C', '', '1', '', '', '2019-12-19', ''),
(17, '', 243, '', 1, '', 'C', '', '1', '', '', '2019-12-19', ''),
(18, '', 244, '', 1, '', 'C', '', '1', '', '', '2019-12-19', ''),
(19, '', 245, '', 1, '', 'C', '', '1', '', '', '2019-12-19', ''),
(20, '', 246, '', 1, '', 'C', '', '1', '', '', '2019-12-19', ''),
(21, '', 247, '', 1, '', 'C', '', '1', '', '', '2019-12-19', ''),
(22, '', 261, '', 1, '', 'C', '', '1', '', '', '2019-12-20', ''),
(23, '', 268, '', 1, '', 'C', '', '1', '', '', '2019-12-20', ''),
(24, '', 269, '', 1, '', 'C', '', '1', '', '', '2019-12-20', ''),
(25, '', 270, '', 1, '', 'C', '', '1', '', '', '2019-12-20', ''),
(26, '', 271, '', 1, '', 'C', '', '1', '', '', '2019-12-20', ''),
(27, '', 272, '', 1, '', 'C', '', '1', '', '', '2019-12-20', ''),
(28, '', 273, '', 1, '', 'C', '', '1', '', '', '2019-12-20', ''),
(29, '', 274, '', 1, '', 'C', '', '1', '', '', '2019-12-23', ''),
(30, '', 275, '', 1, '', 'C', '', '1', '', '', '2019-12-23', ''),
(31, '', 276, '', 1, '', 'C', '', '1', '', '', '2019-12-26', ''),
(32, '', 278, '', 1, '', 'C', '', '1', '', '', '2019-12-26', ''),
(33, '12/15/2019', 280, '', 1, '', 'C', '', '1', '', '', '2019-12-26', ''),
(34, '12/23/2019', 281, '', 1, '4', 'C', '', '1', '', '', '2019-12-26', ''),
(35, '12/03/2019', 282, '', 1, '', 'C', '', '1', '', '', '2019-12-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_access`
--

CREATE TABLE IF NOT EXISTS `tbl_applicant_access` (
`applicant_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant_access`
--

INSERT INTO `tbl_applicant_access` (`applicant_id`, `username`, `password`, `email`, `status`, `first_name`, `last_name`) VALUES
(1, 'user', 'user', 'user@gmail.com', 1, 'colz', 'aligz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE IF NOT EXISTS `tbl_branch` (
`branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_code` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Status` int(2) NOT NULL DEFAULT '1',
  `date_added` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_code`, `address`, `Status`, `date_added`) VALUES
(1, 'Aglayan', 5, 'Aglayan Cebu', 1, '2019-10-03'),
(2, 'BMBL Aglayan', 12, 'Terry', 1, '0000-00-00'),
(3, 'BMBL Valencia', 11, 'Poblacion Valencia City', 1, '2019-10-03'),
(4, 'Calinan', 10, '', 1, '0000-00-00'),
(5, 'Don Carlos', 2, 'Don Carlos', 1, '2019-10-03'),
(6, 'Kisolon', 6, '', 1, '0000-00-00'),
(7, 'Malaybalay', 77, '', 1, '2019-10-03'),
(8, 'Manolo', 5, '', 1, '2019-10-03'),
(9, 'Maramag', 3, 'Maramag', 1, '2019-10-03'),
(10, 'Mintal', 13, '', 1, '2019-10-03'),
(11, 'Puerto', 4, '', 0, '2019-10-03'),
(12, 'Quezon', 77, '-', 0, '2019-10-03'),
(13, 'Valencia', 1, 'Terry', 0, '2019-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_group`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_group` (
`group_id` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `contact_list` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `added_by` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_group`
--

INSERT INTO `tbl_contact_group` (`group_id`, `group_name`, `contact_list`, `date_created`, `date_updated`, `added_by`) VALUES
(1, 'palautang', '["2","1","4","3"]', '2019-10-25', '0000-00-00', 'admin'),
(2, 'WIFEZILLA', '["1","2","3","4","5","6","7"]', '2019-10-30', '0000-00-00', 'admin'),
(3, 'Chronos', '["09056568956","09306543214","09056567931"]', '2019-12-06', '0000-00-00', 'admin'),
(4, 'Chronos', '["09056568956","09306543214","09056567931"]', '2019-12-06', '0000-00-00', 'admin'),
(6, 'Cassiopea', '["09306543214","09056568956","09056567931"]', '2019-12-06', '0000-00-00', 'admin'),
(7, 'Cassiopeas', '["09306543214","09056568956","09056567931"]', '2019-12-06', '0000-00-00', 'admin'),
(8, 'Nyx', '["09056568956","09306543214","09056567931"]', '2019-12-06', '0000-00-00', 'admin'),
(10, 'test', '["09306543214","09056568956","09056567931"]', '2019-12-06', '0000-00-00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_financial_info`
--

CREATE TABLE IF NOT EXISTS `tbl_financial_info` (
`financial_info_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `sourceOf_income` varchar(255) DEFAULT NULL,
  `farmer` varchar(255) NOT NULL,
  `fi_company_name` varchar(100) DEFAULT NULL,
  `fi_office_address` varchar(100) DEFAULT NULL,
  `fi_Job_title` varchar(100) DEFAULT NULL,
  `fi_employmentStatus` varchar(100) DEFAULT NULL,
  `fi_contact_no` varchar(100) DEFAULT NULL,
  `fi_business_gross_income_month` varchar(100) NOT NULL,
  `fi_gross_income_month` varchar(100) DEFAULT NULL,
  `fi_gross_income_year` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_financial_info`
--

INSERT INTO `tbl_financial_info` (`financial_info_id`, `member_id`, `sourceOf_income`, `farmer`, `fi_company_name`, `fi_office_address`, `fi_Job_title`, `fi_employmentStatus`, `fi_contact_no`, `fi_business_gross_income_month`, `fi_gross_income_month`, `fi_gross_income_year`) VALUES
(135, 271, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":"checked","sugarcane":"checked","rice":"checked","fruits":"checked","cash":"checked","livestock":"checked"}', '', '', '', '', '', '', NULL, ''),
(136, 272, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":"checked","sugarcane":"checked","rice":"checked","fruits":"checked","cash":"checked","livestock":"checked"}', '', '', '', '', '', '', NULL, ''),
(137, 273, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":null,"sugarcane":null,"rice":null,"fruits":null,"cash":null,"livestock":null}', 'Tom', '7339 Silver Pine Highlands', 'Lynn', 'Lynn', 'Peter', 'Kerry', NULL, 'Lynn'),
(138, 274, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":"checked","sugarcane":"checked","rice":"checked","fruits":"checked","cash":"checked","livestock":"checked"}', '', '', '', '', '', '', NULL, ''),
(139, 275, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":"checked","sugarcane":"checked","rice":"checked","fruits":"checked","cash":"checked","livestock":"checked"}', '', '', '', '', '', '', NULL, ''),
(140, 276, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":"checked","sugarcane":"checked","rice":"checked","fruits":"checked","cash":"checked","livestock":"checked"}', '', '', '', '', '', '', NULL, ''),
(141, 278, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":null,"sugarcane":null,"rice":null,"fruits":null,"cash":null,"livestock":null}', 'Proweaver Test', 'Terry', 'Proweaver Test', 'Proweaver Test', '', 'Proweaver Test', NULL, ''),
(142, 280, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":"checked","sugarcane":"checked","rice":"checked","fruits":"checked","cash":"checked","livestock":"checked"}', 'Proweaver Test', 'Terry', 'Proweaver Test', 'Proweaver Test', '', 'Proweaver Test', '10000', ''),
(143, 281, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":"checked","sugarcane":"checked","rice":"checked","fruits":"checked","cash":"checked","livestock":"checked"}', '', '', '', '', '', '', NULL, ''),
(144, 282, '{"salary_honorarium":"checked","interest_commission":"checked","source_business":"checked","ofw_remitance":"checked","source_farmer":"checked","other_remittance":"checked","pension":"checked","others":null}', '{"corn":"checked","sugarcane":"checked","rice":"checked","fruits":"checked","cash":"checked","livestock":"checked"}', 'Proweaver Test', 'Terry', 'Proweaver Test', 'Proweaver Test', '', 'Proweaver Test', '10000', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holiday`
--

CREATE TABLE IF NOT EXISTS `tbl_holiday` (
`id` int(11) NOT NULL,
  `holiday` varchar(250) NOT NULL,
  `holiday_mess` varchar(250) NOT NULL,
  `hol_date` date NOT NULL,
  `sent_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_holiday`
--

INSERT INTO `tbl_holiday` (`id`, `holiday`, `holiday_mess`, `hol_date`, `sent_status`) VALUES
(1, 'All Souls Day', 'Happy Halloween', '2019-11-01', ''),
(2, 'Merry Christmas', 'All Tidings season', '2019-12-25', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_id_logs`
--

CREATE TABLE IF NOT EXISTS `tbl_id_logs` (
`logs_id` int(11) NOT NULL,
  `member_id` int(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `date_last_generated` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_id_logs`
--

INSERT INTO `tbl_id_logs` (`logs_id`, `member_id`, `total`, `date_last_generated`, `date_added`) VALUES
(13, 272, '4', '2020-01-07', ''),
(14, 273, '', '', ''),
(15, 274, '', '', ''),
(16, 275, '', '', ''),
(17, 276, '2', '2020-01-07', ''),
(18, 278, '', '', ''),
(19, 280, '', '', ''),
(20, 281, '', '', ''),
(21, 282, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insured_dependents`
--

CREATE TABLE IF NOT EXISTS `tbl_insured_dependents` (
`ins_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_member_contact` (
`contact_id` int(11) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_types`
--

CREATE TABLE IF NOT EXISTS `tbl_member_types` (
`type_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member_types`
--

INSERT INTO `tbl_member_types` (`type_id`, `title`, `date_added`) VALUES
(1, 'Deferral', '2019-10-23'),
(2, 'Associate', '0000-00-00'),
(3, 'Smart Teens/Young Savers', '2019-10-23'),
(4, 'Closed Account', '2019-10-23'),
(5, 'Write-Off', '2019-10-23'),
(6, 'Regular', '2019-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_withdrawal`
--

CREATE TABLE IF NOT EXISTS `tbl_member_withdrawal` (
`withdraw_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `wt_resolution_no` varchar(50) NOT NULL,
  `date_close` varchar(11) NOT NULL,
  `date_approve` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member_withdrawal`
--

INSERT INTO `tbl_member_withdrawal` (`withdraw_id`, `member_id`, `reason`, `wt_resolution_no`, `date_close`, `date_approve`) VALUES
(1, 273, '', '', '', ''),
(2, 281, 'TEST ONLY', '123', '01/02/2020', '01/02/2020'),
(3, 281, 'TEST ONLY', '123', '01/02/2020', '01/02/2020');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_beneficiaries`
--

CREATE TABLE IF NOT EXISTS `tbl_mem_beneficiaries` (
`beneficiaries_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `percentage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_education_attainment`
--

CREATE TABLE IF NOT EXISTS `tbl_mem_education_attainment` (
`education_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `attainment` varchar(100) DEFAULT NULL,
  `name_of_school` varchar(100) DEFAULT NULL,
  `course_year_graduated` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_education_attainment`
--

INSERT INTO `tbl_mem_education_attainment` (`education_id`, `member_id`, `attainment`, `name_of_school`, `course_year_graduated`) VALUES
(102, 271, 'College Grad', '', ''),
(103, 272, 'College Grad', '', ''),
(104, 273, 'College Grad', 'Lynn', 'Leonardo'),
(105, 274, 'College Grad', '', ''),
(106, 275, 'College Grad', '', ''),
(107, 276, 'College Grad', '', ''),
(108, 278, 'College Grad', '', ''),
(109, 280, 'College Grad', 'Proweaver Test Kerry', ''),
(110, 281, 'College Grad', 'Proweaver Test Kerry', ''),
(111, 282, 'College Grad', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_eployment_information`
--

CREATE TABLE IF NOT EXISTS `tbl_mem_eployment_information` (
`employmentInfo_id` int(11) NOT NULL,
  `fk_member_id` int(11) DEFAULT NULL,
  `type_of_employment` varchar(50) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_contact_no` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `employmentStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_eployment_information`
--

INSERT INTO `tbl_mem_eployment_information` (`employmentInfo_id`, `fk_member_id`, `type_of_employment`, `company_name`, `company_contact_no`, `address`, `designation`, `employmentStatus`) VALUES
(100, 271, 'Student', '', '', '', '', ''),
(101, 272, 'Student', '', '', '', '', ''),
(102, 273, 'Student', 'Petey', 'Bob', '7669 Gulf Drive', 'Peter', 'Lynn'),
(103, 274, 'Student', '', '', '', '', ''),
(104, 275, 'Embalmer', '', '', '', '', ''),
(105, 276, 'Student', '', '', '', '', ''),
(106, 278, 'Karpenthur', '', '', '', '', ''),
(107, 280, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(108, 281, 'Student', 'Proweaver Test', 'Proweaver Test', 'Terry, 162 Little Embers Court', '', ''),
(109, 282, 'Student', 'Proweaver Test', 'Proweaver Test', 'Terry', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_personal_information`
--

CREATE TABLE IF NOT EXISTS `tbl_mem_personal_information` (
`member_id` int(11) NOT NULL,
  `acount_id` varchar(100) DEFAULT NULL,
  `member_type_id` int(11) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `birthdate` varchar(100) DEFAULT NULL,
  `age` varchar(100) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `birth_place` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `civil_status` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `tin` varchar(50) DEFAULT NULL,
  `sss` varchar(50) DEFAULT NULL,
  `pag_ibig` varchar(50) DEFAULT NULL,
  `date_added` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=283 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_personal_information`
--

INSERT INTO `tbl_mem_personal_information` (`member_id`, `acount_id`, `member_type_id`, `last_name`, `first_name`, `middle_name`, `birthdate`, `age`, `blood_type`, `birth_place`, `religion`, `email`, `nationality`, `civil_status`, `gender`, `mobile_no`, `tin`, `sss`, `pag_ibig`, `date_added`) VALUES
(272, 'AG19C437A2E199', 6, 'Kerry', 'Proweaver', 'Test', '12/10/2019', '24', '', 'Spring Valley', 'TEST', 'example@proweaver.com', 'United States', 'Married', 'Female', '2025550140', '', '', '', ''),
(273, 'AG19C45C34F4DA', 4, 'Peter', 'Sue', 'Tom', '05/09/1995', '24', 'Lynn', 'Cory', 'Leonardo', 'example@proweaver.com', 'Lynn', 'Single', 'Male', '2025550142', 'Matt', 'Matt', 'Frank', 'Kerry'),
(274, 'AG1901A90D9333', 1, 'Kerry', 'Proweaver', 'Test', '11/29/1986', '56', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(275, 'AG1902B28EB488', 1, 'Kerry', 'Proweaver', 'Test', '03/09/1999', '20', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(276, 'AG1944F428176C', 6, 'Kerry', 'Proweaver', 'Test', '11/29/1999', '1', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Single', 'Male', '2025550140', '', '', '', ''),
(278, 'AG19465F8B394D', 1, 'test', 'Proweaverhhhhhhhhhhhh', 'test', '11/29/1980', '71', 'T', 'Spring Valley', '', 'exadddddmple@proweaver.com', 'United States', 'Single', 'Male', '2025550140', '', '', '', '12/30/2019'),
(280, 'AG1946B5ABD9D0', 2, 'Kerrydasdasd', 'Proweaverasdasdas', 'Testdasdasdasdasdas', '12/30/1993', '45', 'O', 'Spring Valley', 'TEST', 'exampddsadasdle@proweaver.com', 'United States', 'Single', 'Male', '2025550140', '', '', '', '12/15/2019'),
(281, 'AG1946BD5EF969', 6, 'Nikol', 'Ynah', 'Amaba', '12/09/1991', '31', 'O', 'Spring Valley', 'TEST', 'exxxxample@proweaver.com', 'United States', 'Single', 'Male', '2025550140', '', '', '', '12/23/2019'),
(282, 'AG1946C1695797', 2, 'Agail', 'Bagila', 'Amaba', '12/30/2000', '42', 'O', 'Spring Valley', 'TEST', 'exaasdasdasdmple@proweaver.com', 'United States', 'Single', 'Female', '2025550140', '', '', '', '12/03/2019');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_residence`
--

CREATE TABLE IF NOT EXISTS `tbl_mem_residence` (
`residence_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `type_of_residence` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `barangay_district` varchar(100) DEFAULT NULL,
  `municipality` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_residence`
--

INSERT INTO `tbl_mem_residence` (`residence_id`, `member_id`, `type_of_residence`, `street`, `barangay_district`, `municipality`, `province`, `zip_code`) VALUES
(100, 271, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(101, 272, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(102, 273, 'Owned', 'Uy', 'Frank', 'Tom', 'Marion', 0),
(103, 274, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(104, 275, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(105, 276, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(106, 278, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', 'asdasda', 'sdasdasd', '', 0),
(107, 280, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', 'Kamagayan', 'Spring Valley', 'Michigan', 22345),
(108, 281, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', 'Sancianko', 'Moselle', 'Maine', 60007),
(109, 282, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', 'Bob', 'Moselle', 'Maine', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_spouse_emp_info`
--

CREATE TABLE IF NOT EXISTS `tbl_mem_spouse_emp_info` (
`spouse_emp_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `type_of_employment` varchar(100) DEFAULT NULL,
  `sp_company_name` varchar(100) DEFAULT NULL,
  `sp_company_contact_no` varchar(100) DEFAULT NULL,
  `sp_comp_address` varchar(100) DEFAULT NULL,
  `sp_designation` varchar(100) DEFAULT NULL,
  `sp_employmentStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_spouse_emp_info`
--

INSERT INTO `tbl_mem_spouse_emp_info` (`spouse_emp_id`, `member_id`, `type_of_employment`, `sp_company_name`, `sp_company_contact_no`, `sp_comp_address`, `sp_designation`, `sp_employmentStatus`) VALUES
(90, 271, 'Student', '', '', '', '', ''),
(91, 272, 'Student', '', '', '', '', ''),
(92, 273, 'Student', 'Sue', 'Cory', '162 Little Embers Court', 'Mull', 'Terry'),
(93, 274, 'Student', '', '', '', '', ''),
(94, 275, 'Student', '', '', '', '', ''),
(95, 276, 'Student', '', '', '', '', ''),
(96, 278, 'Student', '', '', '', '', ''),
(97, 280, 'Student', '', '', '', '', ''),
(98, 281, 'Student', '', '', '', '', ''),
(99, 282, 'Student', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_spouse_information`
--

CREATE TABLE IF NOT EXISTS `tbl_mem_spouse_information` (
`spouse_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `sp_last_name` varchar(100) DEFAULT NULL,
  `sp_first_name` varchar(100) DEFAULT NULL,
  `sp_middle_name` varchar(100) DEFAULT NULL,
  `sp_birthdate` varchar(50) DEFAULT NULL,
  `sp_mobile_no` varchar(100) DEFAULT NULL,
  `sp_nationality` varchar(100) DEFAULT NULL,
  `sp_tin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_spouse_information`
--

INSERT INTO `tbl_mem_spouse_information` (`spouse_id`, `member_id`, `sp_last_name`, `sp_first_name`, `sp_middle_name`, `sp_birthdate`, `sp_mobile_no`, `sp_nationality`, `sp_tin`) VALUES
(100, 271, '', '', '', '', '', '', ''),
(101, 272, '', '', '', '', '', '', ''),
(102, 273, 'Holly', 'Sue', 'Sue', 'Mull', 'Tom', 'Terry', 'Marion'),
(103, 274, '', '', '', '', '', '', ''),
(104, 275, '', '', '', '', '', '', ''),
(105, 276, '', '', '', '', '', '', ''),
(106, 278, '', '', '', '', '', '', ''),
(107, 280, 'Kerry', 'Proweaver', 'Test', '', '2025550140', 'United States', ''),
(108, 281, 'Kerry', 'Proweaver Test', '', '', '2025550140', 'United States', ''),
(109, 282, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monetary_req`
--

CREATE TABLE IF NOT EXISTS `tbl_monetary_req` (
`monetary_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `membership_fee` varchar(100) NOT NULL,
  `mortuary_prem` varchar(100) NOT NULL,
  `savings_deposit` varchar(100) NOT NULL,
  `paid_up_capital` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `no_of_shares` varchar(100) NOT NULL,
  `deposited_for_subs` varchar(100) NOT NULL,
  `capital_share_deposit` varchar(100) NOT NULL,
  `loans_payable` varchar(100) NOT NULL,
  `credit_on_trade_payable` varchar(100) NOT NULL,
  `interest_on_loan_payable` varchar(100) NOT NULL,
  `penalties_on_trade_payable` varchar(100) NOT NULL,
  `time_deposit` varchar(100) NOT NULL,
  `penalties_on_loan_payable_2` varchar(100) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `deductions` varchar(100) NOT NULL,
  `grand_total` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_monetary_req`
--

INSERT INTO `tbl_monetary_req` (`monetary_id`, `member_id`, `membership_fee`, `mortuary_prem`, `savings_deposit`, `paid_up_capital`, `total`, `amount`, `no_of_shares`, `deposited_for_subs`, `capital_share_deposit`, `loans_payable`, `credit_on_trade_payable`, `interest_on_loan_payable`, `penalties_on_trade_payable`, `time_deposit`, `penalties_on_loan_payable_2`, `sub_total`, `deductions`, `grand_total`) VALUES
(29, 271, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 272, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 273, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 274, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 275, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 276, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 278, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(36, 280, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(37, 281, '500', '500', '500', '500', '2000', '200', '1', '1000', '200', '1000', '1000', '1000', '1000', '1000', '', '1700', '4000', '-2300'),
(38, 282, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile_img`
--

CREATE TABLE IF NOT EXISTS `tbl_profile_img` (
`image_id` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `pr_file_name` varchar(40) NOT NULL,
  `pr_date_added` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profile_img`
--

INSERT INTO `tbl_profile_img` (`image_id`, `member_id`, `pr_file_name`, `pr_date_added`) VALUES
(40, '271', '191220-5dfc3f529f0ef.png', '2019-12-20'),
(41, '272', '191223-5e0018489a508.jpg', '2019-12-20'),
(42, '273', '191223-5e0018de19956.jpg', '2019-12-20'),
(43, '274', '191223-5e001abf8995a.jpg', '2019-12-23'),
(44, '275', '191223-5e002b2909274.jpg', '2019-12-23'),
(45, '276', 'profile.jpg', '2019-12-26'),
(46, '278', 'profile.jpg', '2019-12-26'),
(47, '280', 'profile.jpg', '2019-12-26'),
(48, '281', 'profile.jpg', '2019-12-26'),
(49, '282', 'profile.jpg', '2019-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_progress`
--

CREATE TABLE IF NOT EXISTS `tbl_progress` (
`progress_id` int(11) NOT NULL,
  `fk_member_id` int(11) NOT NULL,
  `progress_status` int(11) NOT NULL,
  `previous_session` varchar(100) NOT NULL,
  `member_status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_progress`
--

INSERT INTO `tbl_progress` (`progress_id`, `fk_member_id`, `progress_status`, `previous_session`, `member_status`) VALUES
(1, 10, 0, '0', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signatures`
--

CREATE TABLE IF NOT EXISTS `tbl_signatures` (
`signature_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `sg_file_name` varchar(100) NOT NULL,
  `qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_signatures`
--

INSERT INTO `tbl_signatures` (`signature_id`, `member_id`, `sg_file_name`, `qrcode`) VALUES
(156, 271, '191220-5dfc3f50d07c0.jpg', ''),
(157, 272, '191220-5dfc437a2ede6.jpg', ''),
(158, 0, '', '191220-5dfc4398ce06e.png'),
(159, 0, '', '191220-5dfc4398e2bd7.png'),
(160, 273, '191223-5e0018eda1643.jpg', ''),
(161, 0, '', '191220-5dfc7d73a1520.png'),
(162, 0, '', '191220-5dfc7d73baa55.png'),
(163, 274, '191223-5e001a90d98f1.jpg', ''),
(164, 275, '191223-5e002b28eba8b.jpg', ''),
(165, 276, '191226-5e044f428192a.jpg', ''),
(166, 278, '191226-5e0465f8b3b9c.jpg', ''),
(167, 280, '191226-5e046b5abdc60.jpg', ''),
(168, 281, '191226-5e046bd5efb36.jpg', ''),
(169, 282, '191226-5e046c16959bb.jpg', ''),
(170, 0, '', '200102-5e0d57f1c7917.png'),
(171, 0, '', '200102-5e0d57f1dd43b.png'),
(172, 0, '', '200107-5e14554498fc3.png'),
(173, 0, '', '200107-5e145544dcd74.png'),
(174, 0, '', '200107-5e1455451bd1b.png'),
(175, 0, '', '200107-5e1455453f85d.png'),
(176, 0, '', '200107-5e14555982779.png'),
(177, 0, '', '200107-5e145559a0ac7.png'),
(178, 0, '', '200107-5e145559bf397.png'),
(179, 0, '', '200107-5e145559dc2dc.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms`
--

CREATE TABLE IF NOT EXISTS `tbl_sms` (
  `sms_id` int(11) NOT NULL,
  `sms_title` varchar(255) NOT NULL,
  `sms_message` varchar(255) NOT NULL,
  `sms_created` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date_modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sms`
--

INSERT INTO `tbl_sms` (`sms_id`, `sms_title`, `sms_message`, `sms_created`, `added_by`, `date_modified`) VALUES
(1, 'Happy Birthday', 'Happy Birthday To You. You May have a wonderful and blessed year. More Birthdays to Come.', '2019-10-11', '', '2019-12-09'),
(2, 'Due Reminder', 'This is to remind you about the payment due which is next week. Failure to report to our office will be subject to discipline.', '2019-10-11', '', '2019-12-06'),
(3, 'Happy New Year!', 'Happy New Year to you and your Family. May you have a prosperous new Year!!!', '2019-10-11', '', '2019-12-09'),
(4, 'Merry Christmas', 'Merry Christmas to you and your Family. May you have a wonderful and memorable Christmas', '0000-00-00', '', NULL),
(0, 'Sample greetings', 'Sample greetings', '2019-12-05', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE IF NOT EXISTS `tbl_token` (
`token_id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `date_generated` date NOT NULL,
  `info_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`token_id`, `token`, `status`, `date_generated`, `info_id`) VALUES
(1, 'tcMafE1R7hHZYZBkuJ4UrBPSu', 0, '2019-12-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_to_receives_benefits`
--

CREATE TABLE IF NOT EXISTS `tbl_to_receives_benefits` (
`benefit_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthdate` varchar(30) NOT NULL,
  `age` int(50) NOT NULL,
  `relationship` varchar(30) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_credentials`
--

CREATE TABLE IF NOT EXISTS `tbl_user_credentials` (
`credentials_id` int(11) NOT NULL,
  `info_id` int(20) NOT NULL,
  `branch_id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` int(10) NOT NULL COMMENT '0 - guest, 1 - Staff, 2 - SuperAdmin ',
  `status` int(2) NOT NULL COMMENT '1-active , 0 - inactive',
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_credentials`
--

INSERT INTO `tbl_user_credentials` (`credentials_id`, `info_id`, `branch_id`, `username`, `password`, `user_type`, `status`, `date_added`, `date_updated`) VALUES
(1, 1, 1, 'admin', 'admin', 2, 1, '2019-09-26', '2019-09-26'),
(6, 15, 1, 'user1', 'user1', 0, 1, '2019-10-10', '2019-10-10'),
(7, 16, 2, 'user', 'user', 3, 0, '2019-12-04', '2019-12-04'),
(9, 18, 1, 'user123', 'user123', 0, 1, '2019-12-05', '2019-12-05'),
(10, 0, 1, 'test20', 'test20', 0, 1, '2020-01-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_informations`
--

CREATE TABLE IF NOT EXISTS `tbl_user_informations` (
`info_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_added` date NOT NULL,
  `last_logged_in` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_informations`
--

INSERT INTO `tbl_user_informations` (`info_id`, `firstname`, `middlename`, `lastname`, `email`, `date_added`, `last_logged_in`) VALUES
(1, 'Proweaverrrrrr', 'Derek', 'Web2', 'prospteam@gmail.com', '2019-09-26', '2019-09-26'),
(10, 'Matthew Derek', '', 'Amaba', '', '2019-12-19', '0000-00-00'),
(15, 'Proweaverrrr', 'Test', 'Kerry', 'example@proweaver.com', '2019-10-10', '0000-00-00'),
(16, 'Proweaver Nicole ', '-', 'Cilley', 'test@gmail.com', '2019-12-04', '0000-00-00'),
(18, 'Proweaver Nicole', '-', 'Cilley', 'test@test.com', '2019-12-05', '0000-00-00'),
(19, 'Petey', 'Kerry', 'Peter', 'example@proweaver.com', '2019-12-05', '0000-00-00'),
(20, 'Sue', 'Petey', 'Cliff', 'proweaver@example.com', '2019-12-05', '0000-00-00'),
(21, 'Uy', 'Anna', 'Uy', 'example@proweaver.com', '2019-12-05', '0000-00-00'),
(22, 'Marion', 'Hollyy', 'Cliff', 'proweaverrrr@example.com', '2019-12-05', '0000-00-00'),
(23, 'Cruiser', 'Sue', 'Bobb', 'proweaver@example.com', '2019-12-05', '0000-00-00'),
(24, 'Bob', 'Brock', 'Anna', 'example@proweaver.com', '2019-12-05', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account_info`
--
ALTER TABLE `tbl_account_info`
 ADD PRIMARY KEY (`account_info_id`);

--
-- Indexes for table `tbl_applicant_access`
--
ALTER TABLE `tbl_applicant_access`
 ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
 ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_contact_group`
--
ALTER TABLE `tbl_contact_group`
 ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tbl_financial_info`
--
ALTER TABLE `tbl_financial_info`
 ADD PRIMARY KEY (`financial_info_id`);

--
-- Indexes for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_id_logs`
--
ALTER TABLE `tbl_id_logs`
 ADD PRIMARY KEY (`logs_id`);

--
-- Indexes for table `tbl_insured_dependents`
--
ALTER TABLE `tbl_insured_dependents`
 ADD PRIMARY KEY (`ins_id`);

--
-- Indexes for table `tbl_member_contact`
--
ALTER TABLE `tbl_member_contact`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_member_types`
--
ALTER TABLE `tbl_member_types`
 ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_member_withdrawal`
--
ALTER TABLE `tbl_member_withdrawal`
 ADD PRIMARY KEY (`withdraw_id`);

--
-- Indexes for table `tbl_mem_beneficiaries`
--
ALTER TABLE `tbl_mem_beneficiaries`
 ADD PRIMARY KEY (`beneficiaries_id`);

--
-- Indexes for table `tbl_mem_education_attainment`
--
ALTER TABLE `tbl_mem_education_attainment`
 ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `tbl_mem_eployment_information`
--
ALTER TABLE `tbl_mem_eployment_information`
 ADD PRIMARY KEY (`employmentInfo_id`);

--
-- Indexes for table `tbl_mem_personal_information`
--
ALTER TABLE `tbl_mem_personal_information`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_mem_residence`
--
ALTER TABLE `tbl_mem_residence`
 ADD PRIMARY KEY (`residence_id`);

--
-- Indexes for table `tbl_mem_spouse_emp_info`
--
ALTER TABLE `tbl_mem_spouse_emp_info`
 ADD PRIMARY KEY (`spouse_emp_id`);

--
-- Indexes for table `tbl_mem_spouse_information`
--
ALTER TABLE `tbl_mem_spouse_information`
 ADD PRIMARY KEY (`spouse_id`);

--
-- Indexes for table `tbl_monetary_req`
--
ALTER TABLE `tbl_monetary_req`
 ADD PRIMARY KEY (`monetary_id`);

--
-- Indexes for table `tbl_profile_img`
--
ALTER TABLE `tbl_profile_img`
 ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_progress`
--
ALTER TABLE `tbl_progress`
 ADD PRIMARY KEY (`progress_id`);

--
-- Indexes for table `tbl_signatures`
--
ALTER TABLE `tbl_signatures`
 ADD PRIMARY KEY (`signature_id`);

--
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
 ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `tbl_to_receives_benefits`
--
ALTER TABLE `tbl_to_receives_benefits`
 ADD PRIMARY KEY (`benefit_id`);

--
-- Indexes for table `tbl_user_credentials`
--
ALTER TABLE `tbl_user_credentials`
 ADD PRIMARY KEY (`credentials_id`);

--
-- Indexes for table `tbl_user_informations`
--
ALTER TABLE `tbl_user_informations`
 ADD PRIMARY KEY (`info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account_info`
--
ALTER TABLE `tbl_account_info`
MODIFY `account_info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl_applicant_access`
--
ALTER TABLE `tbl_applicant_access`
MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_contact_group`
--
ALTER TABLE `tbl_contact_group`
MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_financial_info`
--
ALTER TABLE `tbl_financial_info`
MODIFY `financial_info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_id_logs`
--
ALTER TABLE `tbl_id_logs`
MODIFY `logs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_insured_dependents`
--
ALTER TABLE `tbl_insured_dependents`
MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_member_contact`
--
ALTER TABLE `tbl_member_contact`
MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_member_types`
--
ALTER TABLE `tbl_member_types`
MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_member_withdrawal`
--
ALTER TABLE `tbl_member_withdrawal`
MODIFY `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mem_beneficiaries`
--
ALTER TABLE `tbl_mem_beneficiaries`
MODIFY `beneficiaries_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_mem_education_attainment`
--
ALTER TABLE `tbl_mem_education_attainment`
MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `tbl_mem_eployment_information`
--
ALTER TABLE `tbl_mem_eployment_information`
MODIFY `employmentInfo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `tbl_mem_personal_information`
--
ALTER TABLE `tbl_mem_personal_information`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=283;
--
-- AUTO_INCREMENT for table `tbl_mem_residence`
--
ALTER TABLE `tbl_mem_residence`
MODIFY `residence_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `tbl_mem_spouse_emp_info`
--
ALTER TABLE `tbl_mem_spouse_emp_info`
MODIFY `spouse_emp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `tbl_mem_spouse_information`
--
ALTER TABLE `tbl_mem_spouse_information`
MODIFY `spouse_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `tbl_monetary_req`
--
ALTER TABLE `tbl_monetary_req`
MODIFY `monetary_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_profile_img`
--
ALTER TABLE `tbl_profile_img`
MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_progress`
--
ALTER TABLE `tbl_progress`
MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_signatures`
--
ALTER TABLE `tbl_signatures`
MODIFY `signature_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_to_receives_benefits`
--
ALTER TABLE `tbl_to_receives_benefits`
MODIFY `benefit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_credentials`
--
ALTER TABLE `tbl_user_credentials`
MODIFY `credentials_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user_informations`
--
ALTER TABLE `tbl_user_informations`
MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
