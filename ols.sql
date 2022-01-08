-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 05:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ols`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(21, 'Beliz Pehlivan', 'bp', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `course_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `instructor_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `code`, `course_name`, `instructor_id`) VALUES
(34, 'COM488', 'Algorithms', 15),
(35, 'COM477', 'Computer Science', 16),
(36, 'COM201', 'Calculus', 15),
(38, 'COM332', 'Computer Architecture ', 17);

-- --------------------------------------------------------

--
-- Table structure for table `course_content`
--

CREATE TABLE `course_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_code` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `course_content`
--

INSERT INTO `course_content` (`id`, `course_code`, `file_name`, `title`) VALUES
(31, 'COM488', 'doc1.txt', 'Exercise1'),
(34, 'COM488', 'grades.txt', 'Final Exam Grades'),
(37, 'COM477', 'doc1.txt', 'Week 1'),
(38, 'COM477', 'doc2.txt', 'Week 2'),
(39, 'COM201', 'doc1.txt', 'Exercise1'),
(40, 'COM332', 'grades.txt', 'Midterm Grades'),
(41, 'COM332', 'doc1.txt', 'Exercise');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `course_code` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `student_id` int(10) NOT NULL,
  `student_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`course_id`, `course_code`, `student_id`, `student_name`) VALUES
(34, 'COM488', 20, 'Lily Taylor'),
(34, 'COM488', 21, 'James Williams'),
(34, 'COM488', 23, 'Mary Miller'),
(34, 'COM488', 24, 'Beliz Pehlivan'),
(35, 'COM477', 20, 'Lily Taylor'),
(36, 'COM201', 20, 'Lily Taylor'),
(35, 'COM477', 21, 'James Williams'),
(35, 'COM477', 23, 'Mary Miller'),
(35, 'COM477', 24, 'Beliz Pehlivan'),
(36, 'COM201', 23, 'Mary Miller'),
(36, 'COM201', 24, 'Beliz Pehlivan');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `full_name`, `password`, `mail`, `username`) VALUES
(20, 'Lily Taylor', '202cb962ac59075b964b07152d234b70', 'lily@gmail.com', 'lilyt'),
(21, 'James Williams', '202cb962ac59075b964b07152d234b70', 'wjamess@gmail.com', 'wjames'),
(23, 'Mary Miller', '03c7c0ace395d80182db07ae2c30f034', 'marym@gmail.com', 'marymiller'),
(24, 'Beliz Pehlivan', '202cb962ac59075b964b07152d234b70', 'bp@gmail.com', 'bp');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `full_name`, `password`, `mail`, `username`) VALUES
(15, 'Beliz ', '202cb962ac59075b964b07152d234b70', 'bp@gmail.com', 'belizp'),
(16, 'Harry Callum', '202cb962ac59075b964b07152d234b70', 'harrycal@gmail.com', 'harrycal'),
(17, 'Ava Smith', '202cb962ac59075b964b07152d234b70', 'smith@gmail.com', 'smith');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_content`
--
ALTER TABLE `course_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `course_content`
--
ALTER TABLE `course_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
