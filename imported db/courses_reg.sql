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
-- Table structure for table `courses_reg`
--

CREATE TABLE `courses_reg` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `session` text NOT NULL,
  `semester` text NOT NULL,
  `course1` text NOT NULL,
  `course2` text NOT NULL,
  `course3` text NOT NULL,
  `course4` text NOT NULL,
  `course5` text NOT NULL,
  `course6` text NOT NULL,
  `course7` text NOT NULL,
  `course8` text NOT NULL,
  `course9` text NOT NULL,
  `course10` text NOT NULL,
  `course11` text NOT NULL,
  `course12` text NOT NULL,
  `course13` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_reg`
--

INSERT INTO `courses_reg` (`id`, `student_id`, `session`, `semester`, `course1`, `course2`, `course3`, `course4`, `course5`, `course6`, `course7`, `course8`, `course9`, `course10`, `course11`, `course12`, `course13`) VALUES
(1, 0, '', '1st', 'CMP 411', 'CMP 402', '', '', '', '', '', '', '', '', '', '', ''),
(2, 1, '2016/2017', '2nd', 'CMP 408', 'CMP 404', '', '', '', '', '', '', '', '', '', '', ''),
(3, 2, '2016/2017', '2nd', 'CMP 402', 'CMP 411', '', '', '', '', '', '', '', '', '', '', ''),
(4, 1, '2016/2017', '1st', 'CMP 302', 'CMP 411', 'CMP 412', '', '', '', '', '', '', '', '', '', ''),
(5, 2, '2016/2017', '1st', 'CMP 301', 'CMP 414', 'CMP 412', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses_reg`
--
ALTER TABLE `courses_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses_reg`
--
ALTER TABLE `courses_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
