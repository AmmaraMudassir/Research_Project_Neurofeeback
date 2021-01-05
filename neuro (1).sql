-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 07:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neuro`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_time`
--

CREATE TABLE `access_time` (
  `sNo` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `baselinemean`
--

CREATE TABLE `baselinemean` (
  `sNo` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `bands` varchar(10) NOT NULL,
  `channel1` float NOT NULL,
  `channel2` float NOT NULL,
  `channel3` float NOT NULL,
  `channel4` float NOT NULL,
  `channel5` float NOT NULL,
  `channel6` float NOT NULL,
  `channel7` float NOT NULL,
  `channel8` float NOT NULL,
  `channel9` float NOT NULL,
  `channel10` float NOT NULL,
  `channel11` float NOT NULL,
  `channel12` float NOT NULL,
  `channel13` float NOT NULL,
  `channel14` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `digitspantest`
--

CREATE TABLE `digitspantest` (
  `sNo` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `finalscore` int(11) NOT NULL,
  `behaviouralTest` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `sNo` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peakperformance`
--

CREATE TABLE `peakperformance` (
  `sNo` int(11) NOT NULL,
  `protocol` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(10) NOT NULL,
  `bands` varchar(20) NOT NULL,
  `channel1` float NOT NULL,
  `channel2` float NOT NULL,
  `channel3` float NOT NULL,
  `channel4` float NOT NULL,
  `channel5` float NOT NULL,
  `channel6` float NOT NULL,
  `channel7` float NOT NULL,
  `channel8` float NOT NULL,
  `channel9` float NOT NULL,
  `channel10` float NOT NULL,
  `channel11` float NOT NULL,
  `channel12` float NOT NULL,
  `channel13` float NOT NULL,
  `channel14` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postbaselinemean`
--

CREATE TABLE `postbaselinemean` (
  `id` int(11) NOT NULL,
  `date` varchar(11) NOT NULL,
  `bands` varchar(11) NOT NULL,
  `channel1` float NOT NULL,
  `channel2` float NOT NULL,
  `channel3` float NOT NULL,
  `channel4` float NOT NULL,
  `channel5` float NOT NULL,
  `channel6` float NOT NULL,
  `channel7` float NOT NULL,
  `channel8` float NOT NULL,
  `channel9` float NOT NULL,
  `channel10` float NOT NULL,
  `channel11` float NOT NULL,
  `channel12` float NOT NULL,
  `channel13` float NOT NULL,
  `channel14` float NOT NULL,
  `sNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rel`
--

CREATE TABLE `rel` (
  `gender` varchar(10) NOT NULL,
  `value` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rel`
--

INSERT INTO `rel` (`gender`, `value`) VALUES
('Male', 12009),
('Female', 11011),
('Male', 12009),
('Female', 11011),
('Male', 12009),
('Female', 11011);

-- --------------------------------------------------------

--
-- Table structure for table `strooptest`
--

CREATE TABLE `strooptest` (
  `sNo` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `totalScore` int(11) NOT NULL,
  `totalTime` decimal(11,2) NOT NULL,
  `date` varchar(10) NOT NULL,
  `behavioralTest` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `s_question`
--

CREATE TABLE `s_question` (
  `sNo` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `time` float NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_time`
--
ALTER TABLE `access_time`
  ADD PRIMARY KEY (`sNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `baselinemean`
--
ALTER TABLE `baselinemean`
  ADD PRIMARY KEY (`sNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `digitspantest`
--
ALTER TABLE `digitspantest`
  ADD PRIMARY KEY (`sNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`sNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `peakperformance`
--
ALTER TABLE `peakperformance`
  ADD PRIMARY KEY (`sNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `postbaselinemean`
--
ALTER TABLE `postbaselinemean`
  ADD PRIMARY KEY (`sNo`);

--
-- Indexes for table `strooptest`
--
ALTER TABLE `strooptest`
  ADD PRIMARY KEY (`sNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `s_question`
--
ALTER TABLE `s_question`
  ADD PRIMARY KEY (`sNo`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_time`
--
ALTER TABLE `access_time`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `baselinemean`
--
ALTER TABLE `baselinemean`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `digitspantest`
--
ALTER TABLE `digitspantest`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `peakperformance`
--
ALTER TABLE `peakperformance`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postbaselinemean`
--
ALTER TABLE `postbaselinemean`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strooptest`
--
ALTER TABLE `strooptest`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `s_question`
--
ALTER TABLE `s_question`
  MODIFY `sNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_time`
--
ALTER TABLE `access_time`
  ADD CONSTRAINT `access_time_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`);

--
-- Constraints for table `baselinemean`
--
ALTER TABLE `baselinemean`
  ADD CONSTRAINT `baselinemean_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

--
-- Constraints for table `digitspantest`
--
ALTER TABLE `digitspantest`
  ADD CONSTRAINT `digitspantest_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`);

--
-- Constraints for table `peakperformance`
--
ALTER TABLE `peakperformance`
  ADD CONSTRAINT `peakperformance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user_info` (`id`);

--
-- Constraints for table `strooptest`
--
ALTER TABLE `strooptest`
  ADD CONSTRAINT `strooptest_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

--
-- Constraints for table `s_question`
--
ALTER TABLE `s_question`
  ADD CONSTRAINT `s_question_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
