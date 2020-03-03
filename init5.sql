-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 10:07 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `init5`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alumni`
--

CREATE TABLE `tbl_alumni` (
  `RegNo` int(6) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Contact` text NOT NULL,
  `Batch` varchar(250) NOT NULL,
  `CheckIn` enum('No','Yes') NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alumni`
--

INSERT INTO `tbl_alumni` (`RegNo`, `Name`, `Contact`, `Batch`, `CheckIn`) VALUES
(222222, 'Muhammad Mifraz', '0770224336', 'Batch01', 'No'),
(222223, 'Shamodh Hassim', '0771987654', 'Batch02', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecturer`
--

CREATE TABLE `tbl_lecturer` (
  `ID` int(6) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `CheckIn` enum('No','Yes') NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lecturer`
--

INSERT INTO `tbl_lecturer` (`ID`, `Name`, `CheckIn`) VALUES
(333333, 'Lakmal Rupasinghe', 'No'),
(333334, 'Amila Nuwan Senarathne', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_undergrad`
--

CREATE TABLE `tbl_undergrad` (
  `RegNo` int(6) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Contact` text NOT NULL,
  `Batch` varchar(250) NOT NULL,
  `CheckIn` enum('No','Yes') NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_undergrad`
--

INSERT INTO `tbl_undergrad` (`RegNo`, `Name`, `Contact`, `Batch`, `CheckIn`) VALUES
(111111, 'Noman Abdullah', '0123456670', 'Y2S2', 'No'),
(111112, 'Anusha Cabral', '0724733343', 'Y3S1', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alumni`
--
ALTER TABLE `tbl_alumni`
  ADD PRIMARY KEY (`RegNo`);

--
-- Indexes for table `tbl_lecturer`
--
ALTER TABLE `tbl_lecturer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_undergrad`
--
ALTER TABLE `tbl_undergrad`
  ADD PRIMARY KEY (`RegNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_lecturer`
--
ALTER TABLE `tbl_lecturer`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333335;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
