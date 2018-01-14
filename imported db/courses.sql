-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 12:42 PM
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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_title` text NOT NULL,
  `course_code` text NOT NULL,
  `level` text NOT NULL,
  `department` text NOT NULL,
  `semester` text NOT NULL,
  `course_status` text NOT NULL,
  `units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `course_code`, `level`, `department`, `semester`, `course_status`, `units`) VALUES
(1, 'Database Management System', 'CMP 302', '300L', '6', '1st', 'Compulsory', 3),
(3, 'Artificial intelligence', 'CMP 402', '400L', '6', '1st', 'Compulsory', 3),
(4, 'Introduction to Business Adminstration', 'BUS 101', '100L', 'Business Administration ', '1st', 'Compulsory', 3),
(5, 'Simulation', 'CMP 411', '400L', '6', '1st', 'Complusory', 3),
(6, 'Graphics', 'CMP 412', '400L', '6', '1st', 'Complusory', 2),
(7, 'Computer Installation Management', 'CMP 408', '400L', '6', '2nd', 'Compulsory', 3),
(8, 'Organisation of Programming Languages', 'CMP 404', '400l', '6', '2nd', 'Complusory', 2),
(9, 'Introduction to Operating System', 'CMP 301', '300L', '6', '1st', 'Compulsory', 3),
(10, 'Operating System 2', 'CMP 414', '400L', '6', '1st', 'Complusory', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
