-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 12:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `disapprovedresults`
--

CREATE TABLE `disapprovedresults` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `session` text NOT NULL,
  `semester` text NOT NULL,
  `course1` int(11) NOT NULL,
  `course2` int(11) NOT NULL,
  `course3` int(11) DEFAULT NULL,
  `course4` int(11) NOT NULL,
  `course5` int(11) NOT NULL,
  `course6` int(11) NOT NULL,
  `course7` int(11) NOT NULL,
  `course8` int(11) NOT NULL,
  `course9` int(11) NOT NULL,
  `course10` int(11) NOT NULL,
  `course11` int(11) NOT NULL,
  `course12` int(11) NOT NULL,
  `course13` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disapprovedresults`
--

INSERT INTO `disapprovedresults` (`id`, `admin_id`, `student_id`, `session`, `semester`, `course1`, `course2`, `course3`, `course4`, `course5`, `course6`, `course7`, `course8`, `course9`, `course10`, `course11`, `course12`, `course13`, `status`) VALUES
(1, 1, 2, '2016/2017', '1st', 33, 87, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(2, 1, 2, '2016/2017', '2nd', 33, 87, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 1, '2016/2017', '1st', 44, 77, 67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(4, 1, 2, '2016/2017', '1st', 33, 87, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(5, 1, 1, '2016/2017', '1st', 44, 77, 67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 2, '2016/2017', '1st', 33, 87, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 1, 1, '2016/2017', '1st', 44, 77, 67, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 1, 2, '2016/2017', '1st', 33, 87, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disapprovedresults`
--
ALTER TABLE `disapprovedresults`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disapprovedresults`
--
ALTER TABLE `disapprovedresults`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
