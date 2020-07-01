-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 01, 2020 at 04:10 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schooltest`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `com_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `com_name`, `address`, `phone`, `email`) VALUES
(3, 'Edu-Lamp Group', 'yangon', '09975662429', 'hein@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `dept_name`, `status`) VALUES
(1, 'admin', '123456', 'Developer', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dailyexpense`
--

CREATE TABLE `dailyexpense` (
  `id` int(11) NOT NULL,
  `dexp_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dexp_amount` float NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deposit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expense` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `work_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `work_time`, `status`) VALUES
(2, 'Human Resouce', '9 AM to 5 PM', ''),
(3, 'Marketing', '9AM to 5PM', ''),
(4, 'Learning', '9AM to 5PM', ''),
(5, 'Front Office', '9AM to 5PM', ''),
(6, 'Accounting', '9AM to 5PM', ''),
(7, 'Security', '', ''),
(8, 'BOD', '', ''),
(9, 'Cleaning', '', ''),
(10, 'M&E', '', ''),
(11, 'Adminstration', '', ''),
(12, 'Developer', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `deposit_list` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deposit_amount` float NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `finger_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nrc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edu_1` text COLLATE utf8_unicode_ci NOT NULL,
  `edu_2` text COLLATE utf8_unicode_ci NOT NULL,
  `edu_3` text COLLATE utf8_unicode_ci NOT NULL,
  `qualifi_1` text COLLATE utf8_unicode_ci NOT NULL,
  `qualifi_2` text COLLATE utf8_unicode_ci NOT NULL,
  `job_1` text COLLATE utf8_unicode_ci NOT NULL,
  `job_2` text COLLATE utf8_unicode_ci NOT NULL,
  `bank_acc` text COLLATE utf8_unicode_ci NOT NULL,
  `marital` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `join_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` text COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `resign_date` text COLLATE utf8_unicode_ci NOT NULL,
  `freeze` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_G4`
--

CREATE TABLE `exam_G4` (
  `id` int(11) NOT NULL,
  `st_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mya` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `math` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam_G4`
--

INSERT INTO `exam_G4` (`id`, `st_id`, `st_name`, `mya`, `eng`, `math`, `phy`, `chem`, `bio`, `eco`, `total`, `month`, `created_date`, `status`) VALUES
(1, 'S2020065', 'mg aung ko thein', '40', '40', '70', '40', '40', '50', '', '280', 'June', '2020-06-18', '');

-- --------------------------------------------------------

--
-- Table structure for table `exam_G5`
--

CREATE TABLE `exam_G5` (
  `id` int(11) NOT NULL,
  `st_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mya` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `math` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_G6`
--

CREATE TABLE `exam_G6` (
  `id` int(11) NOT NULL,
  `st_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mya` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `math` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_G7`
--

CREATE TABLE `exam_G7` (
  `id` int(11) NOT NULL,
  `st_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mya` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `math` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_G8`
--

CREATE TABLE `exam_G8` (
  `id` int(11) NOT NULL,
  `st_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mya` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `math` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_G9`
--

CREATE TABLE `exam_G9` (
  `id` int(11) NOT NULL,
  `st_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mya` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `math` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_G10`
--

CREATE TABLE `exam_G10` (
  `id` int(11) NOT NULL,
  `st_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mya` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eng` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `math` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phy` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_attendance`
--

CREATE TABLE `e_attendance` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_out` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `late_min` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `late_lost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ot` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ot_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leave_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leave_lost` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_leave`
--

CREATE TABLE `e_leave` (
  `id` int(11) NOT NULL,
  `leave_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leave_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `days` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `asign` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_menu`
--

CREATE TABLE `e_menu` (
  `id` int(11) NOT NULL,
  `e_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_payroll`
--

CREATE TABLE `e_payroll` (
  `payroll_id` int(11) NOT NULL,
  `e_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basic_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meal_allowance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transport_allowance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `topup_allowance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ssb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `income_tax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_deduction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `late_fine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leave_fine` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ot_total` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_pay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staff_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_payslip`
--

CREATE TABLE `e_payslip` (
  `id` int(11) NOT NULL,
  `payslip_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payroll_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basic_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_allowance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ot_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_deduction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_pay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pay_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `e_salary`
--

CREATE TABLE `e_salary` (
  `id` int(11) NOT NULL,
  `e_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basic_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meal_allow` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transpo_allow` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `top_up_allow` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `income_tax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ssb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `fee_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_amount` float NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `g_id`, `fee_name`, `fee_amount`, `remark`) VALUES
(1, 1, 'KG', 10000, ''),
(2, 2, 'Grade-1', 20000, ''),
(3, 3, 'Grade-2', 30000, ''),
(4, 4, 'Grade-3', 40000, ''),
(5, 5, 'Grade-4', 50000, ''),
(6, 6, 'Grade-5', 60000, ''),
(7, 7, 'Grade-6', 70000, ''),
(8, 8, 'Grade-7', 80000, ''),
(9, 9, 'Grade-8', 90000, ''),
(10, 10, 'Grade-9', 100000, ''),
(11, 11, 'Grade-10', 110000, '');

-- --------------------------------------------------------

--
-- Table structure for table `fees_collect`
--

CREATE TABLE `fees_collect` (
  `id` int(11) NOT NULL,
  `fees_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_amount` float NOT NULL,
  `fee_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fee_month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deposit_amount` float NOT NULL,
  `uniform` float NOT NULL,
  `other` float NOT NULL,
  `hostel` float NOT NULL,
  `total` float NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fees_collect`
--

INSERT INTO `fees_collect` (`id`, `fees_id`, `grade_id`, `st_id`, `st_name`, `fee_amount`, `fee_year`, `fee_month`, `deposit_amount`, `uniform`, `other`, `hostel`, `total`, `reg_user`, `reg_date`, `status`) VALUES
(1, 'V2020061', 1, 'S2020061', 'ma shin may kya', 10000, '2020', 'June', 0, 0, 0, 200000, 210000, 'admin', '2020-06-12', 'reported'),
(2, 'V2020062', 1, 'S2020061', 'ma shin may kya', 10000, '2020', 'July', 0, 0, 0, 200000, 210000, 'admin', '2020-06-12', 'reported'),
(3, 'V2020063', 1, 'S2020061', 'ma shin may kya', 10000, '2019', 'January', 0, 0, 0, 200000, 210000, 'admin', '2020-06-12', 'reported'),
(4, 'V2020064', 1, 'S2020061', 'ma shin may kya', 10000, '2019', 'October', 0, 0, 0, 0, 10000, 'admin', '2020-06-15', ''),
(5, 'V2020065', 1, 'S2020061', 'ma shin may kya', 10000, '2018', 'September', 0, 0, 0, 0, 10000, 'admin', '2020-06-15', ''),
(6, 'V2020066', 5, 'S2020065', 'mg aung ko thein', 50000, '2020', 'June', 0, 0, 0, 200000, 250000, 'admin', '2020-06-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `grade_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade_name`) VALUES
(1, 'KG'),
(2, 'G-1'),
(3, 'G-2'),
(4, 'G-3'),
(5, 'G-4'),
(6, 'G-5'),
(7, 'G-6'),
(8, 'G-7'),
(9, 'G-8'),
(10, 'G-9'),
(11, 'G-10');

-- --------------------------------------------------------

--
-- Table structure for table `G_1`
--

CREATE TABLE `G_1` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `G_1`
--

INSERT INTO `G_1` (`id`, `st_id`, `st_name`, `active`, `year`, `reg_user`, `reg_date`) VALUES
(1, 'S2020064', 'ma nan htet nay', 'September', '2020', 'admin', '2020-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `G_2`
--

CREATE TABLE `G_2` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `G_2`
--

INSERT INTO `G_2` (`id`, `st_id`, `st_name`, `active`, `year`, `reg_user`, `reg_date`) VALUES
(1, 'S2020063', 'mg arr guu', 'June', '2020', 'admin', '2020-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `G_3`
--

CREATE TABLE `G_3` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `G_3`
--

INSERT INTO `G_3` (`id`, `st_id`, `st_name`, `active`, `year`, `reg_user`, `reg_date`) VALUES
(1, 'S2020066', 'su su Lay', '', '', 'admin', '2020-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `G_4`
--

CREATE TABLE `G_4` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `G_4`
--

INSERT INTO `G_4` (`id`, `st_id`, `st_name`, `active`, `year`, `reg_user`, `reg_date`) VALUES
(2, 'S2020065', 'mg aung ko thein', 'June', '2020', 'admin', '2020-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `G_5`
--

CREATE TABLE `G_5` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `G_6`
--

CREATE TABLE `G_6` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `G_7`
--

CREATE TABLE `G_7` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `G_8`
--

CREATE TABLE `G_8` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `G_9`
--

CREATE TABLE `G_9` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `G_10`
--

CREATE TABLE `G_10` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `id` int(11) NOT NULL,
  `hostel_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`id`, `hostel_name`, `reg_user`, `status`) VALUES
(1, '100', 'admin', ''),
(2, '101', 'admin', ''),
(3, '102', 'admin', ''),
(4, '103', 'admin', ''),
(5, '104', 'admin', ''),
(6, '105', 'admin', ''),
(7, '106', 'admin', ''),
(8, '107', 'admin', ''),
(9, '108', 'admin', ''),
(10, '109', 'admin', ''),
(11, '110', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_fees`
--

CREATE TABLE `hostel_fees` (
  `id` int(11) NOT NULL,
  `g_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `grade_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fees` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hostel_fees`
--

INSERT INTO `hostel_fees` (`id`, `g_id`, `grade_name`, `fees`, `remark`, `reg_user`, `created_date`, `status`) VALUES
(3, '1', 'KG', '200000', 'include meal and guide', 'admin', '2020-06-10', ''),
(4, '2', 'G-1', '250000', 'test for edit', 'admin', '2020-06-10', '');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_record`
--

CREATE TABLE `hostel_record` (
  `id` int(11) NOT NULL,
  `h_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `check_in` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `check_out` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hostel_record`
--

INSERT INTO `hostel_record` (`id`, `h_name`, `st_id`, `st_name`, `check_in`, `check_out`, `status`) VALUES
(1, '100', 'S2020064', 'ma nan htet nay', '2020-06-10 10:46:20am', '2020-06-11 04:07:26am', ''),
(2, '101', 'S2020063', 'mg arr guu', '2020-06-10 10:49:18am', '2020-06-10 10:50:45am', ''),
(3, '100', 'S2020064', 'ma nan htet nay', '2020-06-10 14:59:25pm', '2020-06-11 04:07:26am', '');

-- --------------------------------------------------------

--
-- Table structure for table `instocks`
--

CREATE TABLE `instocks` (
  `id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `instocks`
--

INSERT INTO `instocks` (`id`, `date`, `reg_user`, `item`, `remark`, `quantity`, `total_price`) VALUES
(1, '2020-06-07', 'admin', 'Book', '1*250', '100', '25000'),
(2, '2020-06-07', 'admin', 'Book', '1*250', '100', '25000'),
(3, '2020-06-07', 'admin', 'Book', '1*250', '100', '25000'),
(4, '2020-06-08', 'admin', 'Ruler', '1*100', '100', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `KG`
--

CREATE TABLE `KG` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `KG`
--

INSERT INTO `KG` (`id`, `st_id`, `st_name`, `active`, `year`, `reg_user`, `reg_date`) VALUES
(1, 'S2020061', 'ma shin may kya', 'September', '2018', 'admin', '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `late_category`
--

CREATE TABLE `late_category` (
  `id` int(11) NOT NULL,
  `start_min` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_min` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lost_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_category`
--

CREATE TABLE `leave_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lost_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave_category`
--

INSERT INTO `leave_category` (`id`, `name`, `day`, `lost_amount`, `reg_user`, `created_date`, `status`) VALUES
(14, 'Medical Leave', '50', '100', 'admin', '2020-06-09', ''),
(15, 'Normal Leave', '30', '1000', 'admin', '2020-06-09', ''),
(16, 'Casual Leave', '10', '1000', 'admin', '2020-06-09', ''),
(17, 'Travel Leave', '40', '200', 'admin', '2020-06-09', '');

-- --------------------------------------------------------

--
-- Table structure for table `letter_foot`
--

CREATE TABLE `letter_foot` (
  `id` int(11) NOT NULL,
  `foot_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `letter_foot`
--

INSERT INTO `letter_foot` (`id`, `foot_image`) VALUES
(2, '879012d7039593aaeb8781f5709d8d81.png');

-- --------------------------------------------------------

--
-- Table structure for table `letter_head`
--

CREATE TABLE `letter_head` (
  `id` int(11) NOT NULL,
  `letter_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `letter_head`
--

INSERT INTO `letter_head` (`id`, `letter_image`) VALUES
(5, 'c7d554488e97243b66ba200b5d300c64.png');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_image`) VALUES
(9, 'ad686910313a0a296d00fb56dc0b7b2f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_list`
--

CREATE TABLE `menu_list` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu_list`
--

INSERT INTO `menu_list` (`id`, `menu_name`, `status`, `edit`) VALUES
(1, 'fo', '1', ''),
(2, 'learn', '1', ''),
(3, 'account', '1', ''),
(4, 'hr', '1', ''),
(5, 'admin', '1', ''),
(6, 'market', '1', ''),
(7, 'store', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `ot_category`
--

CREATE TABLE `ot_category` (
  `id` int(11) NOT NULL,
  `ot_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pay_day`
--

CREATE TABLE `pay_day` (
  `id` int(11) NOT NULL,
  `start_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rule_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `status`) VALUES
(1, 'Intern', ''),
(2, 'Junior', ''),
(3, 'Senior', ''),
(4, 'Senior Executive', ''),
(5, 'Manager', ''),
(6, 'Executive Manager', ''),
(7, 'General Manager', '');

-- --------------------------------------------------------

--
-- Table structure for table `send_sms`
--

CREATE TABLE `send_sms` (
  `id` int(11) NOT NULL,
  `action_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `send_date` date NOT NULL,
  `send_time` time NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_api`
--

CREATE TABLE `sms_api` (
  `id` int(11) NOT NULL,
  `api_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `api_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_api`
--

INSERT INTO `sms_api` (`id`, `api_key`, `sender`, `api_url`, `message_url`, `balance_url`) VALUES
(3, 'jU77TYjXKRsE-EjNuclD23P4NzEdQLI4oRBgJBcrDlrVzLzGAmipWR1HzP2TJVQg', 'EDULAMP', 'https://smspoh.com/api/v2/send', 'https://smspoh.com/api/v2/messages', 'https://smspoh.com/api/v2/get-balance');

-- --------------------------------------------------------

--
-- Table structure for table `sms_promotion`
--

CREATE TABLE `sms_promotion` (
  `id` int(11) NOT NULL,
  `text_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_desc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `send_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `send_date` date NOT NULL,
  `send_time` time NOT NULL,
  `count_sms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_promotion`
--

INSERT INTO `sms_promotion` (`id`, `text_name`, `text_desc`, `send_type`, `send_date`, `send_time`, `count_sms`, `user`, `reg_date`, `status`) VALUES
(4, 'SMS Testing For Student', 'Hello! Welcome to My School !!!!\r\nfor students', 'Student', '2020-06-06', '10:04:00', '', 'admin', '2020-06-06', ''),
(5, 'Test for Learning Dept', 'for Learning Deptment', 'Trainer', '2020-06-06', '10:09:00', '', 'admin', '2020-06-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms_setting`
--

CREATE TABLE `sms_setting` (
  `id` int(11) NOT NULL,
  `action_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sms_setting`
--

INSERT INTO `sms_setting` (`id`, `action_name`, `status`) VALUES
(1, 'PPPP', '1'),
(2, 'Patient Appointment', '1'),
(3, 'SMS', '1'),
(4, 'Doctor Appointment', '1');

-- --------------------------------------------------------

--
-- Table structure for table `soft_expire`
--

CREATE TABLE `soft_expire` (
  `id` int(11) NOT NULL,
  `e_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `soft_expire`
--

INSERT INTO `soft_expire` (`id`, `e_date`) VALUES
(1, '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `new_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `coast` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_quantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `out_quantity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `refer_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `out_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `out_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `new_date`, `item`, `in_quantity`, `remark`, `coast`, `in_user`, `in_date`, `total_quantity`, `out_quantity`, `refer_to`, `out_user`, `out_date`) VALUES
(1, '2020-06-07', 'Book', '100', '1*250', '25000', 'admin', '2020-06-07', '100', '', '', '', ''),
(2, '2020-06-07', 'Book', '100', '1*250', '25000', 'admin', '2020-06-07', '200', '', '', '', ''),
(3, '2020-06-07', 'Book', '100', '1*250', '25000', 'admin', '2020-06-07', '300', '', '', '', ''),
(4, '', 'Book', '', '', '', '', '', '250', '50', '', 'admin', '2020-06-07'),
(5, '', 'Book', '', '', '', '', '', '200', '50', '', 'admin', '2020-06-07'),
(6, '', 'Book', '', '', '', '', '', '150', '50', '', 'admin', '2020-06-07'),
(7, '', 'Book', '', '', '', '', '', '100', '50', '', 'admin', '2020-06-07'),
(8, '', 'Book', '', '', '', '', '', '90', '10', '', 'admin', '2020-06-07'),
(9, '', 'Book', '', '', '', '', '', '80', '10', '', 'admin', '2020-06-07'),
(10, '', 'Book', '', '', '', '', '', '70', '10', '', 'admin', '2020-06-07'),
(11, '', 'Book', '', '', '', '', '', '60', '10', '', 'admin', '2020-06-07'),
(12, '2020-06-08', 'Ruler', '100', '1*100', '10000', 'admin', '2020-06-08', '100', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stock_categories`
--

CREATE TABLE `stock_categories` (
  `id` int(11) NOT NULL,
  `stk_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_id` int(11) NOT NULL,
  `st_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nrc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `modi_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modi_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `st_id`, `grade_id`, `st_name`, `father_name`, `mother_name`, `age`, `gender`, `nrc`, `phone`, `address`, `photo`, `reg_date`, `modi_date`, `status`, `reg_user`, `modi_user`) VALUES
(1, 'S2020061', 1, 'ma shin may kya', 'u zaw', 'd kyu', '2.2.2000', 'Female', '12/dagama(n)09090', '09962007639', 'No(907),Ingyin St,38 Qtr, North Dagon, Yangon', '20161016_181133.jpg', '2020-06-07', '2020-06-07 14:49:33', '', 'admin', ''),
(3, 'S2020063', 3, 'mg arr guu', 'u oo', 'd moe', '3.3.2000', 'Male', '12/dagama(n)22222', '012345678987', 'Yankin, Yangon', '20161016_184450.jpg', '2020-06-08', '2020-06-08 08:45:51', '', 'admin', ''),
(6, 'S2020064', 2, 'ma nan htet nay', 'u zawhtet', 'd pone', '2.2.2010', 'Female', '12/dagama(N)123456', '09797885731', 'yagon', '20161016_181154.jpg', '2020-06-09', '2020-06-09 16:51:30', '', 'admin', ''),
(7, 'S2020065', 5, 'mg aung ko thein', 'u kyaw', 'd phyo', '3.3.2020', 'Male', '12/dagama(n)00099', '09895552588', 'yangon', '20161016_184450.jpg', '2020-06-17', '2020-06-17 19:33:38', '', 'admin', ''),
(8, 'S2020066', 4, 'su su Lay', 'U Myint ', 'daw khin saw', '7/1/1997', 'Female', '12/YaPATha(n)095022', '0962007639', 'north okkalapa', '', '2020-06-17', '2020-06-17 20:35:10', '', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `st_leaves`
--

CREATE TABLE `st_leaves` (
  `id` int(11) NOT NULL,
  `st_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `st_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `leave_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `st_leaves`
--

INSERT INTO `st_leaves` (`id`, `st_id`, `st_name`, `grade_name`, `leave_type`, `start`, `end_date`, `reg_user`, `reg_date`, `status`, `year`) VALUES
(15, 'S2020061', 'ma shin may kya', 'KG', 'Normal Leave', '2020-06-16', '2020-06-16', 'admin', '2020-06-16', 'approved', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `staff_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staff_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `row_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyexpense`
--
ALTER TABLE `dailyexpense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_G4`
--
ALTER TABLE `exam_G4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_G5`
--
ALTER TABLE `exam_G5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_G6`
--
ALTER TABLE `exam_G6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_G7`
--
ALTER TABLE `exam_G7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_G8`
--
ALTER TABLE `exam_G8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_G9`
--
ALTER TABLE `exam_G9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_G10`
--
ALTER TABLE `exam_G10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_attendance`
--
ALTER TABLE `e_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_leave`
--
ALTER TABLE `e_leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_menu`
--
ALTER TABLE `e_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_payroll`
--
ALTER TABLE `e_payroll`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `e_payslip`
--
ALTER TABLE `e_payslip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_salary`
--
ALTER TABLE `e_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_collect`
--
ALTER TABLE `fees_collect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_1`
--
ALTER TABLE `G_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_2`
--
ALTER TABLE `G_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_3`
--
ALTER TABLE `G_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_4`
--
ALTER TABLE `G_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_5`
--
ALTER TABLE `G_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_6`
--
ALTER TABLE `G_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_7`
--
ALTER TABLE `G_7`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_8`
--
ALTER TABLE `G_8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_9`
--
ALTER TABLE `G_9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `G_10`
--
ALTER TABLE `G_10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_fees`
--
ALTER TABLE `hostel_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_record`
--
ALTER TABLE `hostel_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instocks`
--
ALTER TABLE `instocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `KG`
--
ALTER TABLE `KG`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `late_category`
--
ALTER TABLE `late_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_category`
--
ALTER TABLE `leave_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_foot`
--
ALTER TABLE `letter_foot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `letter_head`
--
ALTER TABLE `letter_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_list`
--
ALTER TABLE `menu_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_category`
--
ALTER TABLE `ot_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_day`
--
ALTER TABLE `pay_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_sms`
--
ALTER TABLE `send_sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_api`
--
ALTER TABLE `sms_api`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_promotion`
--
ALTER TABLE `sms_promotion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_setting`
--
ALTER TABLE `sms_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soft_expire`
--
ALTER TABLE `soft_expire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_categories`
--
ALTER TABLE `stock_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st_leaves`
--
ALTER TABLE `st_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dailyexpense`
--
ALTER TABLE `dailyexpense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_G4`
--
ALTER TABLE `exam_G4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_G5`
--
ALTER TABLE `exam_G5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_G6`
--
ALTER TABLE `exam_G6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_G7`
--
ALTER TABLE `exam_G7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_G8`
--
ALTER TABLE `exam_G8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_G9`
--
ALTER TABLE `exam_G9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_G10`
--
ALTER TABLE `exam_G10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_attendance`
--
ALTER TABLE `e_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_leave`
--
ALTER TABLE `e_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_menu`
--
ALTER TABLE `e_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_payroll`
--
ALTER TABLE `e_payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_payslip`
--
ALTER TABLE `e_payslip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_salary`
--
ALTER TABLE `e_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fees_collect`
--
ALTER TABLE `fees_collect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `G_1`
--
ALTER TABLE `G_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `G_2`
--
ALTER TABLE `G_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `G_3`
--
ALTER TABLE `G_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `G_4`
--
ALTER TABLE `G_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `G_5`
--
ALTER TABLE `G_5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `G_6`
--
ALTER TABLE `G_6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `G_7`
--
ALTER TABLE `G_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `G_8`
--
ALTER TABLE `G_8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `G_9`
--
ALTER TABLE `G_9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `G_10`
--
ALTER TABLE `G_10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `hostel_fees`
--
ALTER TABLE `hostel_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hostel_record`
--
ALTER TABLE `hostel_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instocks`
--
ALTER TABLE `instocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `KG`
--
ALTER TABLE `KG`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `late_category`
--
ALTER TABLE `late_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_category`
--
ALTER TABLE `leave_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `letter_foot`
--
ALTER TABLE `letter_foot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `letter_head`
--
ALTER TABLE `letter_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_list`
--
ALTER TABLE `menu_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ot_category`
--
ALTER TABLE `ot_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_day`
--
ALTER TABLE `pay_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `send_sms`
--
ALTER TABLE `send_sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_api`
--
ALTER TABLE `sms_api`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sms_promotion`
--
ALTER TABLE `sms_promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sms_setting`
--
ALTER TABLE `sms_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soft_expire`
--
ALTER TABLE `soft_expire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stock_categories`
--
ALTER TABLE `stock_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `st_leaves`
--
ALTER TABLE `st_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
