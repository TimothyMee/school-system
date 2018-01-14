-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 12:47 PM
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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `parent_email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `address` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `matric_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Admission_session` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` int(11) NOT NULL,
  `Course_of_study` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `Current_session` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Role` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `surname`, `firstname`, `middlename`, `username`, `email`, `parent_email`, `password`, `DOB`, `address`, `matric_no`, `image_name`, `telephone`, `gender`, `level`, `Admission_session`, `department`, `Course_of_study`, `Current_session`, `Role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fadayini', 'Timothy', 'Iyanu', 'Timothy_mee', '', 'Timititu21@gmail.com', '193d3043e029a9f9fbac4f4aaad437edc2c5837719c5cc5f49939573baf78760', '1997-06-27', '10 alagomeji street, Lagos, Nigeria.', '130202003', 'Nine Lives (2016) 1080p BluRay [Cyro.se].png', '08121581441', 'male', '400L', '2013/2014', 6, 'Computer Science', '2016/2017', 'student', NULL, '2017-03-12 23:00:00', '2017-05-18 11:36:57'),
(2, 'Arigbangba', 'John', 'Philip', 'JohnPhilip', '', 'Arigbangbacaleb@gmail.com', 'ba6f957a1a02b1dbce4362dff26deb04c670c3076c241ec2a2c147dde8cbd1df', '1999-03-21', '10,kufeji,palms avenue, lagos', '120202003', '', '0809954446', 'Male', '200L', '2013/2014', 6, 'Micro Biology', '2016/2017', 'Student', '', '2017-04-20 11:25:27', '2017-04-20 11:25:27'),
(5, 'fadayini', 'timothy', 'timimi', 'timothytimimi', '', '', '90311ec56cf7b57e8eb0210185d3fc298c9acb4f6f5bedd63725c560009a730b', '1998-02-04', '', '1202000303', '', '08121581441', 'Female', '300L', '', 7, '', '2016/2017', 'Student', '', '2017-05-18 04:01:33', '2017-05-18 04:01:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
