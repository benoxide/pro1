-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 15, 2018 at 08:34 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id3604024_temporary`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `value` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`value`) VALUES
('cardiology'),
('radiology');

-- --------------------------------------------------------

--
-- Table structure for table `empid`
--

CREATE TABLE `empid` (
  `value` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empid`
--

INSERT INTO `empid` (`value`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE `name` (
  `value` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`value`) VALUES
('abc'),
('dvd'),
('bill'),
('records');

-- --------------------------------------------------------

--
-- Table structure for table `obj1`
--

CREATE TABLE `obj1` (
  `id` int(10) NOT NULL,
  `record_type` varchar(100) NOT NULL,
  `security_clearance` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obj1`
--

INSERT INTO `obj1` (`id`, `record_type`, `security_clearance`) VALUES
(1, 'testreport', 'topsecret');

-- --------------------------------------------------------

--
-- Table structure for table `record_type`
--

CREATE TABLE `record_type` (
  `value` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `record_type`
--

INSERT INTO `record_type` (`value`) VALUES
('bill'),
('testreport');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `value` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`value`) VALUES
('doctor'),
('manager');

-- --------------------------------------------------------

--
-- Table structure for table `rule_obj`
--

CREATE TABLE `rule_obj` (
  `rule_id` varchar(100) NOT NULL,
  `objectid` int(10) NOT NULL,
  `operation` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule_obj`
--

INSERT INTO `rule_obj` (`rule_id`, `objectid`, `operation`) VALUES
('12j', 1, 'read'),
('32d', 1, 'write');

-- --------------------------------------------------------

--
-- Table structure for table `rule_sub`
--

CREATE TABLE `rule_sub` (
  `id` int(10) NOT NULL,
  `rule_id` varchar(100) NOT NULL,
  `empid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rule_sub`
--

INSERT INTO `rule_sub` (`id`, `rule_id`, `empid`, `name`, `role`) VALUES
(4, '12j', 1, 'abc', 'doctor'),
(8, '32d', 1, 'abc', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `security_clearance`
--

CREATE TABLE `security_clearance` (
  `value` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `security_clearance`
--

INSERT INTO `security_clearance` (`value`) VALUES
('confidential'),
('secret'),
('topsecret');

-- --------------------------------------------------------

--
-- Table structure for table `sub1`
--

CREATE TABLE `sub1` (
  `id` int(10) NOT NULL,
  `empid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub1`
--

INSERT INTO `sub1` (`id`, `empid`, `name`, `role`) VALUES
(2, 1, 'abc', 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(5) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `role`) VALUES
(1, 'manager'),
(2, 'def');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`value`);

--
-- Indexes for table `empid`
--
ALTER TABLE `empid`
  ADD PRIMARY KEY (`value`);

--
-- Indexes for table `obj1`
--
ALTER TABLE `obj1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record_type`
--
ALTER TABLE `record_type`
  ADD PRIMARY KEY (`value`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`value`);

--
-- Indexes for table `rule_obj`
--
ALTER TABLE `rule_obj`
  ADD PRIMARY KEY (`rule_id`),
  ADD KEY `objectid` (`objectid`);

--
-- Indexes for table `rule_sub`
--
ALTER TABLE `rule_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rule_id` (`rule_id`);

--
-- Indexes for table `security_clearance`
--
ALTER TABLE `security_clearance`
  ADD PRIMARY KEY (`value`);

--
-- Indexes for table `sub1`
--
ALTER TABLE `sub1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obj1`
--
ALTER TABLE `obj1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rule_sub`
--
ALTER TABLE `rule_sub`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub1`
--
ALTER TABLE `sub1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
