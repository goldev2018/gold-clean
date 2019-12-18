-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 02:35 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gold`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_annual`
--

CREATE TABLE `tbl_annual` (
  `annual_id` int(5) NOT NULL,
  `annual_count` int(5) NOT NULL,
  `dateHired` text NOT NULL,
  `if_status` int(5) NOT NULL,
  `emp_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_annual`
--

INSERT INTO `tbl_annual` (`annual_id`, `annual_count`, `dateHired`, `if_status`, `emp_id`) VALUES
(1, 0, '01/08/2018', 0, 'GOLD-AR-025');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dept_id` int(10) UNSIGNED NOT NULL,
  `dept_name` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dept_id`, `dept_name`) VALUES
(1, 'Human Resource'),
(2, 'Architectural'),
(3, 'Admin'),
(4, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leave`
--

CREATE TABLE `tbl_leave` (
  `leave_id` int(5) NOT NULL,
  `leave_series` varchar(100) NOT NULL DEFAULT '',
  `leave_counter` varchar(10) NOT NULL DEFAULT '',
  `leave_period_from` text NOT NULL,
  `leave_period_to` text NOT NULL,
  `leave_total` varchar(5) NOT NULL DEFAULT '',
  `leave_nature` int(5) NOT NULL DEFAULT '0',
  `leave_reason` longtext NOT NULL,
  `leave_date` text NOT NULL,
  `leave_docu` text NOT NULL,
  `status` int(5) NOT NULL,
  `emp_id` text NOT NULL,
  `annual_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ob`
--

CREATE TABLE `tbl_ob` (
  `ob_id` int(10) UNSIGNED NOT NULL,
  `ob_series` text NOT NULL,
  `ob_counter` varchar(10) NOT NULL DEFAULT '0',
  `ob_dateTravel` text NOT NULL,
  `ob_route` longtext NOT NULL,
  `ob_from` text NOT NULL,
  `ob_to` text NOT NULL,
  `ob_purpose` longtext NOT NULL,
  `ob_estimate` text NOT NULL,
  `ob_cash` text NOT NULL,
  `ob_project` text NOT NULL,
  `ob_others` text NOT NULL,
  `ob_date` text NOT NULL,
  `emp_id` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `pos_id` int(10) UNSIGNED NOT NULL,
  `pos_title` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`pos_id`, `pos_title`) VALUES
(1, 'Admin'),
(2, 'Web Developer'),
(3, 'Graphic Artist');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project`
--

CREATE TABLE `tbl_project` (
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_name` text NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_info`
--

CREATE TABLE `tbl_project_info` (
  `proj_info_id` int(10) UNSIGNED NOT NULL,
  `proj_info_codes` text NOT NULL,
  `proj_info_building` text,
  `project_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timesheet`
--

CREATE TABLE `tbl_timesheet` (
  `ts_id` int(10) UNSIGNED NOT NULL,
  `ts_weekstart` text NOT NULL,
  `ts_weekend` text NOT NULL,
  `ts_week` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ts_sil` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ts_ot` longtext NOT NULL,
  `emp_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timesheetinfo`
--

CREATE TABLE `tbl_timesheetinfo` (
  `tsinfo_id` int(10) UNSIGNED NOT NULL,
  `tsinfo_desc` longtext NOT NULL,
  `tsinfo_time` longtext NOT NULL,
  `tsinfo_day` varchar(45) NOT NULL DEFAULT '',
  `tsinfo_week` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tsinfo_total` int(5) NOT NULL,
  `tsinfo_date` text NOT NULL,
  `tsinfo_status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ts_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `project_id` longtext NOT NULL,
  `proj_info_id` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `emp_id` varchar(100) NOT NULL DEFAULT '',
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `mi` varchar(5) DEFAULT NULL,
  `position` text NOT NULL,
  `company` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `image` longtext,
  `u_type` varchar(50) NOT NULL DEFAULT '0',
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `request` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`emp_id`, `password`, `fname`, `lname`, `mi`, `position`, `company`, `department`, `image`, `u_type`, `status`, `request`) VALUES
('admin', 'f53c73a352a2ca11b93e721f167b8850', 'Super', 'Admin', '', 'Web Developer', 'GOLD', 'Architectural', 'img/admin2.jpg', 'Super Admin', 1, 0),
('GOLD-AR-025', 'f53c73a352a2ca11b93e721f167b8850', 'Slash', 'Delacruz', 'F', 'Web Developer', 'GOLD', 'Architectural', 'img/GOLD-AR-025.jpg', 'Employee', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_annual`
--
ALTER TABLE `tbl_annual`
  ADD PRIMARY KEY (`annual_id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `tbl_ob`
--
ALTER TABLE `tbl_ob`
  ADD PRIMARY KEY (`ob_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `tbl_project`
--
ALTER TABLE `tbl_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tbl_project_info`
--
ALTER TABLE `tbl_project_info`
  ADD PRIMARY KEY (`proj_info_id`);

--
-- Indexes for table `tbl_timesheet`
--
ALTER TABLE `tbl_timesheet`
  ADD PRIMARY KEY (`ts_id`);

--
-- Indexes for table `tbl_timesheetinfo`
--
ALTER TABLE `tbl_timesheetinfo`
  ADD PRIMARY KEY (`tsinfo_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_annual`
--
ALTER TABLE `tbl_annual`
  MODIFY `annual_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dept_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_leave`
--
ALTER TABLE `tbl_leave`
  MODIFY `leave_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ob`
--
ALTER TABLE `tbl_ob`
  MODIFY `ob_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `pos_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_project`
--
ALTER TABLE `tbl_project`
  MODIFY `project_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_project_info`
--
ALTER TABLE `tbl_project_info`
  MODIFY `proj_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_timesheet`
--
ALTER TABLE `tbl_timesheet`
  MODIFY `ts_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_timesheetinfo`
--
ALTER TABLE `tbl_timesheetinfo`
  MODIFY `tsinfo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
