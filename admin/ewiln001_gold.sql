-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2020 at 04:51 AM
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
  `rtw_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `if_noted` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ot`
--

INSERT INTO `tbl_ot` (`ot_id`, `ot_date`, `ot_from`, `ot_to`, `ot_reason`, `ot_hours`, `ot_attachment`, `ot_noted`, `ot_datefiled`, `emp_id`, `rtw_id`, `if_noted`) VALUES
(1, '03/11/2020', '18:00', '21:00', 'Finishing website', 3, 'ots/1-GOLD-AR-025.docx', 'GOLD-AR-004', 'March 11 2020 Wednesday', 'GOLD-AR-025', 1, 0),
(2, '03/16/2020', '18:00', '19:00', 'Format PC', 1, '', 'GOLD-AR-004', 'March 11 2020 Wednesday', 'GOLD-AR-025', 2, 0),
(3, '03/17/2020', '18:00', '20:00', 'Test website', 2, 'ots/3-GOLD-AR-025.docx', 'GOLD-AR-004', 'March 11 2020 Wednesday', 'GOLD-AR-025', 3, 0);

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
-- Dumping data for table `tbl_rtw`
--

INSERT INTO `tbl_rtw` (`rtw_id`, `rtw_date`, `rtw_from`, `rtw_to`, `rtw_reason`, `rtw_attachment`, `rtw_datefiled`, `emp_id`, `if_filed`) VALUES
(1, '03/11/2020', '18:00', '20:00', 'Finishing website', 'rtw/1-GOLD-AR-025.pdf', 'March 11 2020 Wednesday', 'GOLD-AR-025', 1),
(2, '03/16/2020', '18:00', '21:00', 'Format PC', '', 'March 11 2020 Wednesday', 'GOLD-AR-025', 1),
(3, '03/17/2020', '18:00', '20:00', 'Test website', '', 'March 11 2020 Wednesday', 'GOLD-AR-025', 1);

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
  MODIFY `ot_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_rtw`
--
ALTER TABLE `tbl_rtw`
  MODIFY `rtw_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
