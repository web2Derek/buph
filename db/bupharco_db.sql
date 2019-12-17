-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 10:52 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bupharco_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_info`
--

CREATE TABLE `tbl_account_info` (
  `account_info_id` int(11) NOT NULL,
  `date_approve` varchar(20) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ac_resolution_no` varchar(150) NOT NULL,
  `branch` int(11) NOT NULL,
  `classifications` varchar(3) NOT NULL,
  `facilitator` varchar(50) NOT NULL,
  `encoded_by` varchar(50) NOT NULL,
  `invited_by` varchar(50) NOT NULL,
  `date_of_pmes` varchar(50) NOT NULL,
  `encoded_date` varchar(50) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_account_info`
--

INSERT INTO `tbl_account_info` (`account_info_id`, `date_approve`, `member_id`, `ac_resolution_no`, `branch`, `classifications`, `facilitator`, `encoded_by`, `invited_by`, `date_of_pmes`, `encoded_date`, `remarks`) VALUES
(2, '11/26/2019', 216, '000123', 3, 'A+', 'Samsung8458', '1', '', '11/12/2019', '11/19/2019', 'OKAY keeeeyo'),
(3, '11/28/2019', 217, '000123', 1, 'C', 'Ghre', '1', 'Matthew Derek', '11/27/2019', '11/24/2019', ''),
(4, '12/03/2019', 218, '', 1, 'C', '', '1', '', '', '2019-12-03', ''),
(5, '', 222, '', 1, 'C', '', '1', '', '', '2019-12-09', ''),
(6, '', 223, '', 1, 'C', '', '1', '', '', '2019-12-09', ''),
(7, '', 224, '', 2, 'C', '', '1', '', '', '2019-12-09', ''),
(8, '', 228, '', 1, 'C', '', '1', '', '', '2019-12-09', ''),
(9, '', 236, '', 1, 'C', '', '1', '', '', '2019-12-09', ''),
(10, '', 237, '', 1, 'C', '', '1', '', '', '2019-12-09', ''),
(11, '', 238, '', 1, 'C', '', '1', '', '', '2019-12-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicant_access`
--

CREATE TABLE `tbl_applicant_access` (
  `applicant_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_applicant_access`
--

INSERT INTO `tbl_applicant_access` (`applicant_id`, `username`, `password`, `email`, `status`, `first_name`, `last_name`) VALUES
(1, 'user', 'user', 'user@gmail.com', 1, 'colz', 'aligz');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_code` int(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `Status` int(2) NOT NULL DEFAULT '1',
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_code`, `address`, `Status`, `date_added`) VALUES
(1, 'Aglayan', 5, 'Aglayan Cebu', 1, '2019-10-03'),
(2, 'BMBL Aglayan', 12, 'Terry', 1, '0000-00-00'),
(3, 'BMBL Valencia', 11, 'Poblacion Valencia City', 0, '2019-10-03'),
(4, 'Calinan', 10, '', 1, '0000-00-00'),
(5, 'Don Carlos', 2, 'Don Carlos', 1, '2019-10-03'),
(6, 'Kisolon', 6, '', 1, '0000-00-00'),
(7, 'Malaybalay', 77, '', 1, '2019-10-03'),
(8, 'Manolo', 5, '', 1, '2019-10-03'),
(9, 'Maramag', 3, 'Maramag', 1, '2019-10-03'),
(10, 'Mintal', 13, '', 1, '2019-10-03'),
(11, 'Puerto', 4, '', 1, '2019-10-03'),
(12, 'Quezon', 77, '-', 1, '2019-10-03'),
(13, 'Valencia', 1, 'Terry', 0, '2019-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_group`
--

CREATE TABLE `tbl_contact_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `contact_list` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `added_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_group`
--

INSERT INTO `tbl_contact_group` (`group_id`, `group_name`, `contact_list`, `date_created`, `date_updated`, `added_by`) VALUES
(1, 'palautang', '[\"2\",\"1\",\"4\",\"3\"]', '2019-10-25', '0000-00-00', 'admin'),
(2, 'WIFEZILLA', '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\",\"7\"]', '2019-10-30', '0000-00-00', 'admin'),
(3, 'Chronos', '[\"09056568956\",\"09306543214\",\"09056567931\"]', '2019-12-06', '0000-00-00', 'admin'),
(4, 'Chronos', '[\"09056568956\",\"09306543214\",\"09056567931\"]', '2019-12-06', '0000-00-00', 'admin'),
(6, 'Cassiopea', '[\"09306543214\",\"09056568956\",\"09056567931\"]', '2019-12-06', '0000-00-00', 'admin'),
(7, 'Cassiopeas', '[\"09306543214\",\"09056568956\",\"09056567931\"]', '2019-12-06', '0000-00-00', 'admin'),
(8, 'Nyx', '[\"09056568956\",\"09306543214\",\"09056567931\"]', '2019-12-06', '0000-00-00', 'admin'),
(10, 'test', '[\"09306543214\",\"09056568956\",\"09056567931\"]', '2019-12-06', '0000-00-00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_financial_info`
--

CREATE TABLE `tbl_financial_info` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_financial_info`
--

INSERT INTO `tbl_financial_info` (`financial_info_id`, `member_id`, `sourceOf_income`, `farmer`, `fi_company_name`, `fi_office_address`, `fi_Job_title`, `fi_employmentStatus`, `fi_contact_no`, `fi_business_gross_income_month`, `fi_gross_income_month`, `fi_gross_income_year`) VALUES
(105, 208, '{\"salary_honorarium\":\"on\",\"interest_commission\":\"on\",\"source_business\":\"on\",\"ofw_remitance\":\"on\",\"source_farmer\":\"on\",\"other_remittance\":\"on\",\"pension\":\"on\",\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, '232323'),
(106, 209, '{\"salary_honorarium\":\"on\",\"interest_commission\":\"on\",\"source_business\":\"on\",\"ofw_remitance\":\"on\",\"source_farmer\":\"on\",\"other_remittance\":\"on\",\"pension\":\"on\",\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, '232323'),
(107, 211, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(108, 212, '{\"salary_honorarium\":\"on\",\"interest_commission\":\"on\",\"source_business\":\"on\",\"ofw_remitance\":\"on\",\"source_farmer\":\"on\",\"other_remittance\":\"on\",\"pension\":\"on\",\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(109, 213, '{\"salary_honorarium\":\"on\",\"interest_commission\":\"on\",\"source_business\":\"on\",\"ofw_remitance\":\"on\",\"source_farmer\":\"on\",\"other_remittance\":\"on\",\"pension\":\"on\",\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(110, 215, '{\"salary_honorarium\":\"on\",\"interest_commission\":\"on\",\"source_business\":null,\"ofw_remitance\":\"on\",\"source_farmer\":null,\"other_remittance\":\"on\",\"pension\":\"on\",\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, '10000'),
(111, 216, '{\"salary_honorarium\":\"on\",\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":\"on\",\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(112, 217, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(113, 218, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":\"on\",\"ofw_remitance\":null,\"source_farmer\":\"on\",\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":\"owned\"}', '', '', '', '', '', '', '10000', ''),
(114, 222, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(115, 223, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(116, 224, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(117, 228, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(118, 236, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(119, 237, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, ''),
(120, 238, '{\"salary_honorarium\":null,\"interest_commission\":null,\"source_business\":null,\"ofw_remitance\":null,\"source_farmer\":null,\"other_remittance\":null,\"pension\":null,\"others\":null}', '{\"corn\":null,\"sugarcane\":null,\"rice\":null,\"fruits\":null,\"cash\":null,\"livestock\":null}', '', '', '', '', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holiday`
--

CREATE TABLE `tbl_holiday` (
  `id` int(11) NOT NULL,
  `holiday` varchar(250) NOT NULL,
  `holiday_mess` varchar(250) NOT NULL,
  `hol_date` date NOT NULL,
  `sent_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_id_logs` (
  `logs_id` int(11) NOT NULL,
  `member_id` int(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `date_last_generated` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_id_logs`
--

INSERT INTO `tbl_id_logs` (`logs_id`, `member_id`, `total`, `date_last_generated`, `date_added`) VALUES
(1, 216, '3', '2019-12-06', '2019-12-06'),
(2, 218, '2', '2019-12-06', '2019-12-06'),
(4, 222, '', '', ''),
(5, 223, '', '', ''),
(7, 224, '', '', ''),
(8, 228, '', '', ''),
(9, 236, '', '', ''),
(10, 237, '', '', ''),
(11, 238, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_insured_dependents`
--

CREATE TABLE `tbl_insured_dependents` (
  `ins_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_insured_dependents`
--

INSERT INTO `tbl_insured_dependents` (`ins_id`, `member_id`, `full_name`, `birthdate`, `age`, `relationship`, `date_added`) VALUES
(2, 216, 'Matthew Durk', '05/09/1995', 24, 'Brother', '2019-12-02'),
(5, 216, 'Michael Dave Andreanne Amaba', '05/09/1995', 24, 'Brother', '2019-12-03'),
(8, 217, 'Proweaver Test Kerry', '12/02/2019', 0, 'TEST', '2019-12-03'),
(9, 218, 'TESTING', '07/14/2009', 10, 'TEST', '2019-12-03'),
(11, 216, 'Proweaver TEST', '05/09/1995', 24, 'TESTING', '2019-12-03'),
(12, 216, 'Proweaver TEST', '05/09/1995', 24, 'TESTING', '2019-12-03'),
(20, 218, '', '', 0, '', '2019-12-03'),
(21, 216, 'Proweaver Test Kerry', '12/04/2019', 0, 'TEST', '2019-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_contact`
--

CREATE TABLE `tbl_member_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member_contact`
--

INSERT INTO `tbl_member_contact` (`contact_id`, `contact_number`, `member_name`, `status`) VALUES
(1, '09306543214', 'Tony', 1),
(2, '09056568956', 'Tonya', 0),
(3, '09057562356', 'Karla', 1),
(4, '09078942356', 'Linda', 1),
(5, '09056567931', 'Julieta', 1),
(6, '09231342354', 'Axle', 1),
(7, '09999695011', 'Derek', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member_types`
--

CREATE TABLE `tbl_member_types` (
  `type_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_member_withdrawal` (
  `withdraw_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `wt_resolution_no` varchar(50) NOT NULL,
  `date_close` varchar(11) NOT NULL,
  `date_approve` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member_withdrawal`
--

INSERT INTO `tbl_member_withdrawal` (`withdraw_id`, `member_id`, `reason`, `wt_resolution_no`, `date_close`, `date_approve`) VALUES
(9, 217, 'pang bayad sa hospital', '123456', '12/02/2019', '12/04/2019'),
(11, 216, 'Emergency', '132', '11/12/2019', '11/19/2019'),
(12, 216, '', '', '', ''),
(13, 216, '', '', '', ''),
(14, 217, '', '', '', ''),
(15, 218, '', '', '', ''),
(16, 218, '', '', '', ''),
(17, 217, '', '', '', ''),
(18, 218, '', '', '', ''),
(19, 217, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_beneficiaries`
--

CREATE TABLE `tbl_mem_beneficiaries` (
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

CREATE TABLE `tbl_mem_education_attainment` (
  `education_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `attainment` varchar(100) DEFAULT NULL,
  `name_of_school` varchar(100) DEFAULT NULL,
  `course_year_graduated` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_education_attainment`
--

INSERT INTO `tbl_mem_education_attainment` (`education_id`, `member_id`, `attainment`, `name_of_school`, `course_year_graduated`) VALUES
(71, 208, 'College Grad', 'Proweaver Test Kerry', ''),
(72, 209, 'College Grad', 'Proweaver Test Kerry', ''),
(73, 211, 'College Grad', 'Proweaver Test Kerry', ''),
(74, 212, 'College Grad', 'Proweaver Test Kerry', ''),
(75, 213, 'College Grad', 'Proweaver Test Kerry', ''),
(76, 215, 'College Grad', '', ''),
(77, 216, 'College Grad', '', ''),
(78, 217, 'College Grad', '', ''),
(79, 218, 'College Grad', '', ''),
(80, 222, 'College Grad', '', ''),
(81, 223, 'College Grad', '', ''),
(82, 224, 'College Grad', 'Proweaver Test Kerry', ''),
(83, 228, 'College Grad', '', ''),
(84, 236, 'College Grad', '', ''),
(85, 237, 'College Grad', '', ''),
(86, 238, 'College Grad', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_eployment_information`
--

CREATE TABLE `tbl_mem_eployment_information` (
  `employmentInfo_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `type_of_employment` varchar(50) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `company_contact_no` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `employmentStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_eployment_information`
--

INSERT INTO `tbl_mem_eployment_information` (`employmentInfo_id`, `member_id`, `type_of_employment`, `company_name`, `company_contact_no`, `address`, `designation`, `employmentStatus`) VALUES
(69, 208, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(70, 209, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(71, 211, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(72, 212, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(73, 213, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(74, 215, 'Student', '', '', '', '', ''),
(75, 216, 'Student', '', '', '', '', ''),
(76, 217, 'Student', '', '', '', '', ''),
(77, 218, 'Student', '', '', '', '', ''),
(78, 222, 'Student', '', '', '', '', ''),
(79, 223, 'Student', '', '', '', '', ''),
(80, 224, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(81, 228, 'Student', '', '', '', '', ''),
(82, 236, 'Student', '', '', '', '', ''),
(83, 237, 'Student', '', '', '', '', ''),
(84, 238, 'Student', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_personal_information`
--

CREATE TABLE `tbl_mem_personal_information` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_personal_information`
--

INSERT INTO `tbl_mem_personal_information` (`member_id`, `acount_id`, `member_type_id`, `last_name`, `first_name`, `middle_name`, `birthdate`, `age`, `blood_type`, `birth_place`, `religion`, `email`, `nationality`, `civil_status`, `gender`, `mobile_no`, `tin`, `sss`, `pag_ibig`, `date_added`) VALUES
(216, 'AG19B7B284BB00', 6, 'Amaba', 'Matthew Derek', 'Antig', '05/09/1996', '24', '0+', 'Dalaguete', 'Catholic', 'prospteam@gmail.com', 'Fil-Am', 'Single', 'Male', '09306543214', '', '', '', '11/26/2019'),
(218, 'VA195C59305160', 6, 'Testing', 'Proweaver', 'Test', '05/09/1995', '24', '0+', 'Spring Valley', 'Catholic', 'example@proweaver.com', 'Fil-Am', 'Married', 'Male', '09056567931', '123456', '123456', '132456', '12/03/2019'),
(222, 'AG19DD05915F24', 2, 'Kerry', 'Proweaver', 'Test', '', '', 'O', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', '12/31/2019'),
(223, 'AG19DD079DE1D1', 2, 'Kerry', 'Proweaver', 'Test', '', '', 'O', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', '12/31/2019'),
(224, '19E14FFDC267', 6, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(227, NULL, 1, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(228, '19E184C0F90C', 6, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(231, '19E19084A875', 1, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(232, '19E1910EE659', 1, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(233, '19E196BD4EAA', 1, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(234, '19E197BC9413', 1, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(235, '19E19C46CEA0', 1, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(236, '19E1AEAA6781', 1, 'Kerry', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(237, '19E1B233485B', 1, 'Matte Red', 'Proweaver', 'Test', '', '', 'T', 'Spring Valley', '', 'example@proweaver.com', 'United States', 'Married', 'Male', '2025550140', '', '', '', ''),
(238, '1905EB301904', 1, 'Kerry', 'Proweaver', 'Test', '12/04/2019', '55', 'T', 'Spring Valley', 'Kerry', 'example@proweaver.com', '', 'Married', 'Male', '2025550140', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_residence`
--

CREATE TABLE `tbl_mem_residence` (
  `residence_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `type_of_residence` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `barangay_district` varchar(100) DEFAULT NULL,
  `municipality` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_residence`
--

INSERT INTO `tbl_mem_residence` (`residence_id`, `member_id`, `type_of_residence`, `street`, `barangay_district`, `municipality`, `province`, `zip_code`) VALUES
(69, 208, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', 'Michigan', 22345),
(70, 209, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', 'Michigan', 22345),
(71, 211, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', 'Michigan', 22345),
(72, 212, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', 'Michigan', 22345),
(73, 213, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', 'Michigan', 22345),
(74, 215, 'Owned', '', '', '', '', 0),
(75, 216, 'Owned', '', '', '', '', 0),
(76, 217, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(77, 218, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', '', 'Michigan', 22345),
(78, 222, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', 'Kamagayan', '', '', 0),
(79, 223, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', 'Kamagayan', '', '', 0),
(80, 224, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', 'Spring Valley', 'Michigan', 22345),
(81, 228, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(82, 236, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(83, 237, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court, 162 Little Embers Court', '', '', '', 0),
(84, 238, 'Owned', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', '', 'Michigan', 22345);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_spouse_emp_info`
--

CREATE TABLE `tbl_mem_spouse_emp_info` (
  `spouse_emp_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `type_of_employment` varchar(100) DEFAULT NULL,
  `sp_company_name` varchar(100) DEFAULT NULL,
  `sp_company_contact_no` varchar(100) DEFAULT NULL,
  `sp_comp_address` varchar(100) DEFAULT NULL,
  `sp_designation` varchar(100) DEFAULT NULL,
  `sp_employmentStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_spouse_emp_info`
--

INSERT INTO `tbl_mem_spouse_emp_info` (`spouse_emp_id`, `member_id`, `type_of_employment`, `sp_company_name`, `sp_company_contact_no`, `sp_comp_address`, `sp_designation`, `sp_employmentStatus`) VALUES
(59, 208, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(60, 209, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(61, 211, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(62, 212, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(63, 213, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(64, 215, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(65, 216, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(66, 217, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(67, 218, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(68, 222, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(69, 223, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(70, 224, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(71, 228, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(72, 236, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', ''),
(73, 237, 'Student', '', '', '', '', ''),
(74, 238, 'Student', '', '', '3178 Quiet Trail, 162 Little Embers Court, 162 Little Embers Court', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mem_spouse_information`
--

CREATE TABLE `tbl_mem_spouse_information` (
  `spouse_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `sp_last_name` varchar(100) DEFAULT NULL,
  `sp_first_name` varchar(100) DEFAULT NULL,
  `sp_middle_name` varchar(100) DEFAULT NULL,
  `sp_birthdate` varchar(50) DEFAULT NULL,
  `sp_mobile_no` varchar(100) DEFAULT NULL,
  `sp_nationality` varchar(100) DEFAULT NULL,
  `sp_tin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mem_spouse_information`
--

INSERT INTO `tbl_mem_spouse_information` (`spouse_id`, `member_id`, `sp_last_name`, `sp_first_name`, `sp_middle_name`, `sp_birthdate`, `sp_mobile_no`, `sp_nationality`, `sp_tin`) VALUES
(69, 208, 'Kerry', 'Proweaver', 'Test', '', '2025550140', '', ''),
(70, 209, 'Kerry', 'Proweaver', 'Test', '', '2025550140', '', ''),
(71, 211, 'Kerry', 'Proweaver', 'Test', '11/15/2019', '2025550140', '', ''),
(72, 212, '', '', '', '11/15/2019', '2025550140', '', ''),
(73, 213, '', '', '', '11/15/2019', '2025550140', '', ''),
(74, 215, '', '', '', '', '', '', ''),
(75, 216, '', '', '', '', '', '', ''),
(76, 217, 'Kerry', 'Proweaver', 'Test', '', '2025550140', '', ''),
(77, 218, 'Kerry', 'Proweaver', 'Test', '', '2025550140', '', ''),
(78, 222, '', '', '', '', '', '', ''),
(79, 223, '', '', '', '', '', '', ''),
(80, 224, 'Kerry', 'Proweaver', 'Test', '', '2025550140', 'United States', ''),
(81, 228, '', '', '', '', '', '', ''),
(82, 236, '', '', '', '', '', '', ''),
(83, 237, '', '', '', '', '', '', ''),
(84, 238, 'Kerry', 'Proweaver', 'Test', '', '2025550140', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monetary_req`
--

CREATE TABLE `tbl_monetary_req` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_monetary_req`
--

INSERT INTO `tbl_monetary_req` (`monetary_id`, `member_id`, `membership_fee`, `mortuary_prem`, `savings_deposit`, `paid_up_capital`, `total`, `amount`, `no_of_shares`, `deposited_for_subs`, `capital_share_deposit`, `loans_payable`, `credit_on_trade_payable`, `interest_on_loan_payable`, `penalties_on_trade_payable`, `time_deposit`, `penalties_on_loan_payable_2`, `sub_total`, `deductions`, `grand_total`) VALUES
(5, 216, '449', '45', '45', '45', '584', '100', '5', '5', '100', '1', '1', '12', '1', '200', '152', '345', '167', '178'),
(6, 217, '45', '45', '45', '45', '180', '40', '52', '52', '40', '100', '50', '20', '10', '400', '148', '485', '330', '155'),
(7, 218, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 222, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 223, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 224, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 228, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 236, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 237, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 238, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profile_img`
--

CREATE TABLE `tbl_profile_img` (
  `image_id` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL,
  `pr_file_name` varchar(40) NOT NULL,
  `pr_date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profile_img`
--

INSERT INTO `tbl_profile_img` (`image_id`, `member_id`, `pr_file_name`, `pr_date_added`) VALUES
(10, '208', '191118-5dd1e655d0d4f.png', '2019-11-18'),
(11, '209', '191118-5dd25d7c3670d.jpeg', '2019-11-18'),
(12, '211', '191119-5dd3b88f46dd9.jpeg', '2019-11-19'),
(13, '212', 'AG19E71CA62FAF.png', '2019-11-15'),
(14, '213', 'AG19E774B27775.png', '2019-11-15'),
(15, '215', '191122-5dd7927b3ba0a.png', '2019-11-22'),
(16, '216', '191128-5ddf81394d217.jpg', '2019-11-25'),
(17, '217', '191128-5ddf81a1e3b3e.png', '2019-11-28'),
(18, '218', '191205-5de87056051f2.jpg', '2019-12-03'),
(19, '222', '191209-5dedd0591cdde.png', '2019-12-09'),
(20, '223', '191209-5dedd079e1cc9.png', '2019-12-09'),
(21, '224', '191209-5dee14ffe2a23.png', '2019-12-09'),
(22, '228', '191209-5dee184c12b3c.jpg', '2019-12-09'),
(23, '236', '191209-5dee1aeaa8651.jpg', '2019-12-09'),
(24, '237', '191209-5dee1b23369ad.jpg', '2019-12-09'),
(25, '238', '191211-5df05eb30fd1a.jpg', '2019-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signatures`
--

CREATE TABLE `tbl_signatures` (
  `signature_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `sg_file_name` varchar(100) NOT NULL,
  `qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_signatures`
--

INSERT INTO `tbl_signatures` (`signature_id`, `member_id`, `sg_file_name`, `qrcode`) VALUES
(53, 208, '191118-5dd1e64aee219.jpeg', ''),
(54, 209, '191118-5dd256ac9ebb9.jpeg', ''),
(55, 211, '191119-5dd3b8965b4fa.png', ''),
(56, 212, 'AG19E71CA62FAF.jpeg', ''),
(57, 213, 'AG19E774B27775.jpeg', ''),
(58, 215, '191122-5dd7927b194ef.png', ''),
(59, 216, '191125-5ddb7b284c108.jpg', ''),
(60, 217, '191128-5ddf6ce1a6e5c.jpg', ''),
(61, 218, '191203-5de5c59305733.png', ''),
(62, 0, '', '191206-5de9e8810b30a.png'),
(63, 0, '', '191206-5de9e8810ee9b.png'),
(64, 0, '', '191206-5de9ea1e7906a.png'),
(65, 0, '', '191206-5de9ea2204005.png'),
(66, 0, '', '191206-5de9ea2206f76.png'),
(67, 0, '', '191206-5de9ea8285994.png'),
(68, 0, '', '191206-5de9ea8288192.png'),
(69, 0, '', '191206-5de9ec2597139.png'),
(70, 0, '', '191206-5de9ec2598d3c.png'),
(71, 0, '', '191206-5de9ec714d1d7.png'),
(72, 0, '', '191206-5de9ec714f777.png'),
(73, 0, '', '191206-5de9ec9102172.png'),
(74, 0, '', '191206-5de9ec9103971.png'),
(75, 0, '', '191206-5de9ecb287a14.png'),
(76, 0, '', '191206-5de9ecb28a4cb.png'),
(77, 0, '', '191206-5de9ee3a2064d.png'),
(78, 0, '', '191206-5de9ee3a21ed1.png'),
(79, 0, '', '191206-5de9eec862f81.png'),
(80, 0, '', '191206-5de9eec8641a4.png'),
(81, 0, '', '191206-5de9f03e6c206.png'),
(82, 0, '', '191206-5de9f03e6d79c.png'),
(83, 0, '', '191206-5de9f08e44976.png'),
(84, 0, '', '191206-5de9f08e47813.png'),
(85, 0, '', '191206-5de9f1178607a.png'),
(86, 0, '', '191206-5de9f1178772e.png'),
(87, 0, '', '191206-5de9f1264c085.png'),
(88, 0, '', '191206-5de9f12c2edfe.png'),
(89, 0, '', '191206-5de9f12ed6fd0.png'),
(90, 0, '', '191206-5de9f12ee261a.png'),
(91, 0, '', '191206-5de9f1bfc49cb.png'),
(92, 0, '', '191206-5de9f1bfc5ec3.png'),
(93, 0, '', '191206-5de9f2060cfe9.png'),
(94, 0, '', '191206-5de9f2060f7df.png'),
(95, 0, '', '191206-5de9f40d174a5.png'),
(96, 0, '', '191206-5de9f40d1963f.png'),
(97, 0, '', '191206-5de9f44f01797.png'),
(98, 0, '', '191206-5de9f44f03057.png'),
(99, 0, '', '191206-5de9f59024838.png'),
(100, 0, '', '191206-5de9f590280a1.png'),
(101, 0, '', '191206-5de9f5dfbd06f.png'),
(102, 0, '', '191206-5de9f5dfbf04a.png'),
(103, 0, '', '191206-5dea04417712a.png'),
(104, 0, '', '191206-5dea04417b328.png'),
(105, 0, '', '191206-5dea047080274.png'),
(106, 0, '', '191206-5dea047081f5f.png'),
(107, 0, '', '191206-5dea04d995d83.png'),
(108, 0, '', '191206-5dea04d9980fa.png'),
(109, 0, '', '191206-5dea066aa739b.png'),
(110, 0, '', '191206-5dea066aa8ebe.png'),
(111, 0, '', '191206-5dea06957726f.png'),
(112, 0, '', '191206-5dea06957a629.png'),
(113, 0, '', '191206-5dea06fad9473.png'),
(114, 0, '', '191206-5dea06fada780.png'),
(115, 0, '', '191206-5dea077bdbe6a.png'),
(116, 0, '', '191206-5dea077bdf209.png'),
(117, 0, '', '191206-5dea07c6b5de0.png'),
(118, 0, '', '191206-5dea07c6b921b.png'),
(119, 0, '', '191206-5dea086ec842f.png'),
(120, 0, '', '191206-5dea088c51e2d.png'),
(121, 0, '', '191206-5dea0a694b9ac.png'),
(122, 0, '', '191206-5dea0a694e69e.png'),
(123, 0, '', '191206-5dea0c9b280b1.png'),
(124, 222, '191209-5dedd0591664e.jpg', ''),
(125, 223, '191209-5dedd079deaf1.jpg', ''),
(126, 224, '191209-5dee14ffdcafb.jpg', ''),
(127, 228, '191209-5dee184c10499.jpg', ''),
(128, 236, '191209-5dee1aeaa6bfc.jpg', ''),
(129, 237, '191209-5dee1b2334d61.jpg', ''),
(130, 238, '191211-5df05eb301f96.jpg', ''),
(131, 0, '', '191216-5df73b897894c.png'),
(132, 0, '', '191216-5df73b899efca.png'),
(133, 0, '', '191216-5df73b89b65b6.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms`
--

CREATE TABLE `tbl_sms` (
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

CREATE TABLE `tbl_token` (
  `token_id` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `date_generated` date NOT NULL,
  `info_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`token_id`, `token`, `status`, `date_generated`, `info_id`) VALUES
(1, 'tcMafE1R7hHZYZBkuJ4UrBPSu', 0, '2019-12-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_to_receives_benefits`
--

CREATE TABLE `tbl_to_receives_benefits` (
  `benefit_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `birthdate` varchar(30) NOT NULL,
  `age` int(50) NOT NULL,
  `relationship` varchar(30) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_to_receives_benefits`
--

INSERT INTO `tbl_to_receives_benefits` (`benefit_id`, `member_id`, `type`, `full_name`, `birthdate`, `age`, `relationship`, `date_added`) VALUES
(23, 216, 'Primary', 'Matthew Derek', '05/03/1995', 24, 'Web2 TEST', ''),
(24, 216, 'Secondary', 'Matthew Derek', '01/19/1995', 24, 'Prweaver Test', ''),
(25, 216, 'Primary', 'Matthew Derek', '05/03/1995', 24, 'TEST', ''),
(26, 217, 'Primary', 'Matthew Derek', '05/06/2013', 6, 'TISOY', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_credentials`
--

CREATE TABLE `tbl_user_credentials` (
  `credentials_id` int(11) NOT NULL,
  `info_id` int(20) NOT NULL,
  `branch_id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` int(10) NOT NULL COMMENT '0 - guest, 1 - Staff, 2 - SuperAdmin ',
  `status` int(2) NOT NULL COMMENT '1-active , 0 - inactive',
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_credentials`
--

INSERT INTO `tbl_user_credentials` (`credentials_id`, `info_id`, `branch_id`, `username`, `password`, `user_type`, `status`, `date_added`, `date_updated`) VALUES
(1, 1, 1, 'admin', 'admin', 2, 1, '2019-09-26', '2019-09-26'),
(6, 15, 1, 'user1', 'user1', 1, 1, '2019-10-10', '2019-10-10'),
(7, 16, 2, 'user', 'user', 3, 0, '2019-12-04', '2019-12-04'),
(9, 18, 1, 'user123', 'user123', 3, 0, '2019-12-05', '2019-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_informations`
--

CREATE TABLE `tbl_user_informations` (
  `info_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `date_added` date NOT NULL,
  `last_logged_in` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_informations`
--

INSERT INTO `tbl_user_informations` (`info_id`, `firstname`, `middlename`, `lastname`, `email`, `date_added`, `last_logged_in`) VALUES
(1, 'Proweaver', 'Derek', 'Web2', 'prospteam@gmail.com', '2019-09-26', '2019-09-26'),
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
  MODIFY `account_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_applicant_access`
--
ALTER TABLE `tbl_applicant_access`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_contact_group`
--
ALTER TABLE `tbl_contact_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_financial_info`
--
ALTER TABLE `tbl_financial_info`
  MODIFY `financial_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tbl_holiday`
--
ALTER TABLE `tbl_holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_id_logs`
--
ALTER TABLE `tbl_id_logs`
  MODIFY `logs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_insured_dependents`
--
ALTER TABLE `tbl_insured_dependents`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_member_contact`
--
ALTER TABLE `tbl_member_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_member_types`
--
ALTER TABLE `tbl_member_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_member_withdrawal`
--
ALTER TABLE `tbl_member_withdrawal`
  MODIFY `withdraw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_mem_beneficiaries`
--
ALTER TABLE `tbl_mem_beneficiaries`
  MODIFY `beneficiaries_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mem_education_attainment`
--
ALTER TABLE `tbl_mem_education_attainment`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_mem_eployment_information`
--
ALTER TABLE `tbl_mem_eployment_information`
  MODIFY `employmentInfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_mem_personal_information`
--
ALTER TABLE `tbl_mem_personal_information`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `tbl_mem_residence`
--
ALTER TABLE `tbl_mem_residence`
  MODIFY `residence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_mem_spouse_emp_info`
--
ALTER TABLE `tbl_mem_spouse_emp_info`
  MODIFY `spouse_emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_mem_spouse_information`
--
ALTER TABLE `tbl_mem_spouse_information`
  MODIFY `spouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_monetary_req`
--
ALTER TABLE `tbl_monetary_req`
  MODIFY `monetary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_profile_img`
--
ALTER TABLE `tbl_profile_img`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_signatures`
--
ALTER TABLE `tbl_signatures`
  MODIFY `signature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_to_receives_benefits`
--
ALTER TABLE `tbl_to_receives_benefits`
  MODIFY `benefit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_user_credentials`
--
ALTER TABLE `tbl_user_credentials`
  MODIFY `credentials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user_informations`
--
ALTER TABLE `tbl_user_informations`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
