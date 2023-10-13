-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2019 at 10:17 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`id`, `class_id`, `subject_id`, `chapter`, `description`) VALUES
(5, 1, 1, 'Finite Automata', 'Bechlor in Science in Computer Science , 4th Semester'),
(6, 2, 2, '1st', 'Master\'s in Computer Science'),
(13, 1, 15, 'Loops', 'Bachelor in Computer Science'),
(14, 1, 15, 'Conditions', 'Bachelor in Computer Science'),
(15, 2, 17, '1st', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`, `description`) VALUES
(1, 'BSCS', 'Bechlor in Science in Computer Science , 4th Semester'),
(2, 'MCS', 'Master\'s in Computer Science'),
(3, 'BBA', 'Bechlor in Business and Accounting'),
(4, 'BS Physics', 'Bechlor in Science in Physics');

-- --------------------------------------------------------

--
-- Table structure for table `edit_profile`
--

CREATE TABLE `edit_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `file` varchar(100) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(100) NOT NULL,
  `fcontact` varchar(40) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `edit_profile`
--

INSERT INTO `edit_profile` (`id`, `name`, `file`, `cnic`, `contact`, `email`, `address`, `fcontact`, `class_id`) VALUES
(1, 'Mehtab', 'images/teacher/IMG_20180808_152756_809.jpg', '123', '03037670715', 'chmehtab4@gmail.com', 'RYK', '0303-76707245', 1),
(2, 'Azam', 'images/teacher/2017-04-13_21.46.27.jpg', '9966332', '03037670715', 'mehtab@gmail.com', 'ryk', '0303-76707245', 2);

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_topic_1_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_1` varchar(255) NOT NULL,
  `option_2` varchar(255) NOT NULL,
  `option_3` varchar(255) NOT NULL,
  `option_4` varchar(255) NOT NULL,
  `correct` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`id`, `class_id`, `subject_id`, `chapter_id`, `topic_id`, `sub_topic_1_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct`, `quality`) VALUES
(2, 1, 1, 5, 1, 7, 'What is the name of our National Poet?', 'Allama Iqbal', 'Faiz ahmed Faiz', 'Ghalib', 'John Elia', '1', 'easy'),
(3, 1, 1, 5, 4, 6, 'whis is the name of this sub topic?', 'aaaa', 'bbb', 'ccc', 'ddd', '2', 'hard'),
(4, 2, 17, 15, 7, 8, 'whis is POST Method?', 'aaaa', 'bbb', 'c', 'd', '3', 'easy'),
(5, 1, 1, 5, 1, 7, 'Our National Animal?', 'Lion', 'Monkey', 'Markhor', 'Cat', '3', 'easy');

-- --------------------------------------------------------

--
-- Table structure for table `question_category`
--

CREATE TABLE `question_category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_category`
--

INSERT INTO `question_category` (`id`, `category`, `description`) VALUES
(1, 'Objective', 'It\'s very Easy..');

-- --------------------------------------------------------

--
-- Table structure for table `question_level`
--

CREATE TABLE `question_level` (
  `id` int(11) NOT NULL,
  `level` varchar(40) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_level`
--

INSERT INTO `question_level` (`id`, `level`, `description`) VALUES
(1, 'Easy', 'It\'s very Easy.');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `quiz_name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `total_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `class_id`, `subject_id`, `chapter_id`, `quiz_name`, `description`, `start_time`, `end_time`, `code`, `total_question`) VALUES
(8, 1, 2, 6, 'Monthly', 'Its a Monthly Test', '13:00', '14:00', '1111', 10),
(9, 1, 1, 5, 'Monthly', 'its monthly test', '12:00', '13:00', '1234', 15);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `id` int(11) NOT NULL,
  `std_cnic` int(15) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `std_cnic`, `quiz_id`, `class_id`, `subject_id`, `chapter_id`, `question_id`, `answer`) VALUES
(32, 9966332, 9, 1, 1, 5, 2, 'True'),
(33, 9966332, 9, 1, 1, 5, 3, 'False'),
(34, 9966332, 9, 1, 1, 5, 5, 'True');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `class_id`, `subject`, `description`) VALUES
(1, 1, 'Automata', '3rd Semester'),
(2, 1, 'Database', 'Master\'s in Computer Science'),
(14, 1, 'English', 'Bachelor in Computer Science'),
(15, 1, 'C++', 'Bachelor in Computer Science'),
(16, 1, 'Java', 'Bachelor in Computer Science'),
(17, 2, 'PHP', 'aaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `sub_topic_level_1`
--

CREATE TABLE `sub_topic_level_1` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_topic_01` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_topic_level_1`
--

INSERT INTO `sub_topic_level_1` (`id`, `class_id`, `subject_id`, `chapter_id`, `topic_id`, `sub_topic_01`) VALUES
(5, 1, 15, 13, 6, 'If,else'),
(6, 1, 1, 5, 4, 'Intro'),
(7, 1, 1, 5, 1, 'Intro'),
(8, 2, 17, 15, 7, 'method POST');

-- --------------------------------------------------------

--
-- Table structure for table `sub_topic_level_2`
--

CREATE TABLE `sub_topic_level_2` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_topic_1_id` int(11) NOT NULL,
  `sub_topic_2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_topic_level_2`
--

INSERT INTO `sub_topic_level_2` (`id`, `class_id`, `subject_id`, `chapter_id`, `topic_id`, `sub_topic_1_id`, `sub_topic_2`) VALUES
(1, 1, 1, 5, 4, 1, 'wertyu'),
(4, 1, 15, 14, 6, 5, 'Nested If'),
(5, 2, 2, 14, 4, 1, 'Nested If'),
(6, 1, 1, 5, 1, 7, 'define');

-- --------------------------------------------------------

--
-- Table structure for table `sub_topic_level_3`
--

CREATE TABLE `sub_topic_level_3` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `sub_topic_1_id` int(11) NOT NULL,
  `sub_topic_2_id` int(11) NOT NULL,
  `sub_topic_3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_topic_level_3`
--

INSERT INTO `sub_topic_level_3` (`id`, `class_id`, `subject_id`, `chapter_id`, `topic_id`, `sub_topic_1_id`, `sub_topic_2_id`, `sub_topic_3`) VALUES
(2, 3, 1, 5, 1, 1, 5, 'Nested Else'),
(3, 1, 1, 5, 1, 7, 6, 'example');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `file` varchar(50) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `ucontact` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `fcontact` varchar(15) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `education` varchar(20) NOT NULL,
  `experience` varchar(20) NOT NULL,
  `speciality` varchar(30) NOT NULL,
  `availibility` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `file`, `cnic`, `ucontact`, `email`, `address`, `fcontact`, `class_id`, `subject_id`, `education`, `experience`, `speciality`, `availibility`, `description`) VALUES
(1, 'Mehtab', 'images/teacher/IMG_20180802_234057_664.jpg', '3130375415757', '0303-7670715', 'chmehtab4@gmail.com', 'RYK', '0303-76707245', 3, 2, 'MCS', '2year', 'Web', '2018-09-22', 'System Admin');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`id`, `class_id`, `subject_id`, `chapter_id`, `topic`) VALUES
(1, 1, 1, 5, '1st topic'),
(4, 2, 1, 5, 'Transition Graph'),
(6, 1, 15, 13, 'Conditions'),
(7, 2, 17, 15, 'superglobal arrays');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `id` int(11) NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`id`, `usertype`) VALUES
(1, 'System Admin'),
(2, 'Student'),
(5, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`id`, `name`, `cnic`, `usertype`, `password`) VALUES
(8, 'Mehtab Ahmed', '123', '1', 'admin'),
(9, 'Abid Ali', '12345', '5', '12345'),
(10, 'Azam Khokher', '9966332', '2', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `edit_profile`
--
ALTER TABLE `edit_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_category`
--
ALTER TABLE `question_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_level`
--
ALTER TABLE `question_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_topic_level_1`
--
ALTER TABLE `sub_topic_level_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_topic_level_2`
--
ALTER TABLE `sub_topic_level_2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_topic_level_3`
--
ALTER TABLE `sub_topic_level_3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `edit_profile`
--
ALTER TABLE `edit_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_category`
--
ALTER TABLE `question_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_level`
--
ALTER TABLE `question_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sub_topic_level_1`
--
ALTER TABLE `sub_topic_level_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_topic_level_2`
--
ALTER TABLE `sub_topic_level_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_topic_level_3`
--
ALTER TABLE `sub_topic_level_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
