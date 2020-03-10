-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 08:32 AM
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
-- Database: `ewiln001_gold`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ot`
--

CREATE TABLE `tbl_ot` (
  `ot_id` int(10) UNSIGNED NOT NULL,
  `ot_date` text NOT NULL,
  `ot_from` text NOT NULL,
  `ot_to` text NOT NULL,
  `ot_reason` longtext NOT NULL,
  `ot_hours` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ot_attachment` longtext NOT NULL,
  `ot_noted` longtext NOT NULL,
  `ot_datefiled` longtext NOT NULL,
  `emp_id` longtext NOT NULL,
  `rtw_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rtw`
--

CREATE TABLE `tbl_rtw` (
  `rtw_id` int(10) UNSIGNED NOT NULL,
  `rtw_date` text NOT NULL,
  `rtw_from` text NOT NULL,
  `rtw_to` text NOT NULL,
  `rtw_reason` longtext NOT NULL,
  `rtw_attachment` longtext NOT NULL,
  `rtw_datefiled` text NOT NULL,
  `emp_id` longtext NOT NULL,
  `if_filed` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ot`
--
ALTER TABLE `tbl_ot`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `tbl_rtw`
--
ALTER TABLE `tbl_rtw`
  ADD PRIMARY KEY (`rtw_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ot`
--
ALTER TABLE `tbl_ot`
  MODIFY `ot_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rtw`
--
ALTER TABLE `tbl_rtw`
  MODIFY `rtw_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
