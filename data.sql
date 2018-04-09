-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 05:32 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `UserID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ClockNo` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`UserID`, `username`, `password`, `ClockNo`) VALUES
(12, 'ITPer1', '$2y$10$Tgs7qL0jirppvohwMrgSju22vdqmpbgwTOV2XzRbvHZQLfKCVnY3.', '909'),
(1, 'JackD', '$2y$10$GASVrJeiFELFAxdJirP0peV1wqmoN7UwuG5oikb.GAsMca07M9aSy', ''),
(2, 'eliza', '$2y$10$RnsMW01sHqVheq75COj/buPDHES6Uws2jM8dRmWnjdytOpSXWCah6', ''),
(11, 'MWalsh', '$2y$10$9koaaunIh5SebOOJZZmG6.eRwhaIC.kTHnzh4qCUlWMEvM.km.Tpe', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course` varchar(50) NOT NULL,
  `Renew` date NOT NULL,
  `Level` varchar(20) NOT NULL,
  `PassDate` date NOT NULL,
  `ClockNo` varchar(20) NOT NULL,
  `cost` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`Course`, `Renew`, `Level`, `PassDate`, `ClockNo`, `cost`) VALUES
('First Aid', '2018-12-31', 'First Response', '2018-06-10', '909', '0');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Name` varchar(60) NOT NULL,
  `ClockNo` varchar(20) NOT NULL,
  `Department` varchar(40) NOT NULL,
  `Trainer` tinyint(1) NOT NULL,
  `Manager` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Name`, `ClockNo`, `Department`, `Trainer`, `Manager`) VALUES
('Mark Walsh', '1234', 'IT', 1, 1),
('IT guy', '909', 'IT', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trainingbody`
--

CREATE TABLE `trainingbody` (
  `Contact` varchar(40) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Course` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD UNIQUE KEY `Clock No` (`ClockNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
