-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 07:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iit_automation`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_catagories`
--

CREATE TABLE `book_catagories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_catagories`
--

INSERT INTO `book_catagories` (`cat_id`, `cat_name`) VALUES
(1, 'Breakfast'),
(2, 'Breakfast'),
(3, 'Statistics'),
(4, 'সাহিত্য '),
(5, 'গবেষণা '),
(6, 'পরিসংখ্যান '),
(7, 'মুক্তিযুদ্ধ'),
(8, ' বঙ্গবন্ধু '),
(9, 'ফলিত গণিত '),
(10, 'তড়িৎ প্রকৌশল '),
(11, 'Computer Science'),
(12, 'IIT'),
(13, 'Accounting'),
(14, 'Liberation War');

-- --------------------------------------------------------

--
-- Table structure for table `book_catalog`
--

CREATE TABLE `book_catalog` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(150) NOT NULL,
  `author_name` varchar(150) NOT NULL,
  `copies` int(11) NOT NULL,
  `present_copies` int(11) NOT NULL,
  `cat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_catalog`
--

INSERT INTO `book_catalog` (`book_id`, `book_name`, `author_name`, `copies`, `present_copies`, `cat_name`) VALUES
(37, 'Statistics', 'Nurul Islam', 10, 9, 'Statistics'),
(41, 'গল্পগুচ্ছ ', 'রবীন্দ্রনাথ ঠাকুর ', 12, 11, 'সাহিত্য'),
(42, 'Professional Ethics', 'Robert Gliz', 15, 12, 'IIT'),
(43, 'Captive Lady', 'মাইকেল মধুসুদন দত্ত', 23, 20, 'সাহিত্য'),
(44, 'Nstu Branch', 'মাইকেল মধুসুদন দত্ত', 45, 44, 'Liberation War');

-- --------------------------------------------------------

--
-- Table structure for table `book_requests`
--

CREATE TABLE `book_requests` (
  `request_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `request_by` varchar(150) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  `request_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_requests`
--

INSERT INTO `book_requests` (`request_id`, `book_id`, `request_by`, `user_type`, `request_date`) VALUES
(149, 41, 'Imran', '2', '2021-09-24 23:20:20'),
(150, 44, 'Imran', '2', '2021-09-24 23:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `cont_ass_configuration`
--

CREATE TABLE `cont_ass_configuration` (
  `id_cac` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  `att_weight` int(11) NOT NULL DEFAULT 25,
  `ct_count` varchar(45) NOT NULL DEFAULT '3',
  `ct_ass_method` varchar(45) DEFAULT NULL,
  `ct_weight` int(11) NOT NULL,
  `ct_01` int(11) DEFAULT NULL,
  `ct_02` int(11) DEFAULT NULL,
  `ct_03` int(11) DEFAULT NULL,
  `ct_04` int(11) DEFAULT NULL,
  `ct_05` int(11) DEFAULT NULL,
  `assgn_count` int(11) NOT NULL,
  `assgn_ass_meth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cont_ass_marks`
--

CREATE TABLE `cont_ass_marks` (
  `id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `ct_01` int(11) DEFAULT NULL,
  `ct_02` int(11) DEFAULT NULL,
  `ct_03` int(11) DEFAULT NULL,
  `ct_04` int(11) DEFAULT NULL,
  `ct_05` int(11) DEFAULT NULL,
  `ass_01` int(11) DEFAULT NULL,
  `ass_02` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cont_ass_mark_conv`
--

CREATE TABLE `cont_ass_mark_conv` (
  `id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `ct_01` int(11) DEFAULT NULL,
  `ct_02` int(11) DEFAULT NULL,
  `ct_03` int(11) DEFAULT NULL,
  `ct_04` int(11) DEFAULT NULL,
  `ct_05` int(11) DEFAULT NULL,
  `ass_01` int(11) DEFAULT NULL,
  `ass_02` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_markseet`
--

CREATE TABLE `course_markseet` (
  `id` int(11) NOT NULL,
  `course_code` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `student_id` varchar(45) DEFAULT NULL,
  `attendence` int(11) DEFAULT NULL,
  `ct` int(11) DEFAULT NULL,
  `assignment` int(11) DEFAULT NULL,
  `ppt` int(11) DEFAULT NULL,
  `final_marks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

CREATE TABLE `event_details` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_type_id` int(11) NOT NULL,
  `total_guest` int(11) NOT NULL,
  `event_details` varchar(2000) NOT NULL,
  `event_date` datetime DEFAULT NULL,
  `reserve_date` datetime DEFAULT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `event_id` int(11) NOT NULL,
  `event_type_name` varchar(225) NOT NULL,
  `event_type_details` varchar(1005) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `final_marks`
--

CREATE TABLE `final_marks` (
  `id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  `student_id` varchar(45) NOT NULL,
  `examiner_01` float NOT NULL,
  `examiner_02` float NOT NULL,
  `examiner_03` float DEFAULT NULL,
  `final_exam_marks` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `issued_books`
--

CREATE TABLE `issued_books` (
  `issued_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(150) NOT NULL,
  `author_name` varchar(150) NOT NULL,
  `issued_to` varchar(150) NOT NULL,
  `issue_date` datetime NOT NULL DEFAULT current_timestamp(),
  `return_date` datetime NOT NULL,
  `user_type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issued_books`
--

INSERT INTO `issued_books` (`issued_id`, `book_id`, `book_name`, `author_name`, `issued_to`, `issue_date`, `return_date`, `user_type`) VALUES
(60, 42, 'Professional Ethics', 'Robert Gliz', 'Shuvra', '2021-09-24 23:16:00', '2021-10-09 00:00:00', '2');

-- --------------------------------------------------------

--
-- Table structure for table `notice_information`
--

CREATE TABLE `notice_information` (
  `notice_id` int(11) NOT NULL,
  `notice_title` varchar(100) NOT NULL,
  `notice_details` varchar(1000) NOT NULL,
  `pdf_file_name` varchar(45) DEFAULT NULL,
  `notice_date` datetime NOT NULL DEFAULT current_timestamp(),
  `expire_date` datetime NOT NULL,
  `user_type` int(11) NOT NULL,
  `picture_name` varchar(45) DEFAULT NULL,
  `post_by` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `return_books`
--

CREATE TABLE `return_books` (
  `return_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `return_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `return_books`
--

INSERT INTO `return_books` (`return_id`, `issue_id`, `return_date`, `status`) VALUES
(23, 27, '2021-09-24 00:00:00', 'return'),
(24, 28, '2021-09-24 00:00:00', 'return'),
(25, 29, '2021-09-24 00:00:00', 'return'),
(26, 30, '2021-09-24 00:00:00', 'return'),
(27, 31, '2021-09-24 00:00:00', 'return'),
(28, 32, '2021-09-24 00:00:00', 'return'),
(29, 33, '2021-09-24 00:00:00', 'return'),
(30, 34, '2021-09-24 00:00:00', 'return'),
(31, 37, '2021-09-24 00:00:00', 'return'),
(32, 35, '2021-09-24 00:00:00', 'return'),
(33, 36, '2021-09-24 00:00:00', 'return'),
(34, 39, '2021-09-24 00:00:00', 'return'),
(35, 51, '2021-09-24 00:00:00', 'return'),
(36, 40, '2021-09-24 00:00:00', 'return'),
(37, 41, '2021-09-24 00:00:00', 'return'),
(38, 42, '2021-09-24 00:00:00', 'return'),
(39, 46, '2021-09-24 00:00:00', 'return'),
(40, 45, '2021-09-24 00:00:00', 'return'),
(41, 47, '2021-09-24 00:00:00', 'return'),
(42, 52, '2021-09-24 00:00:00', 'return'),
(43, 53, '2021-09-24 00:00:00', 'return'),
(44, 54, '2021-09-24 00:00:00', 'return'),
(45, 55, '2021-09-24 00:00:00', 'return'),
(46, 61, '2021-09-24 00:00:00', 'return'),
(47, 58, '2021-09-24 00:00:00', 'return'),
(48, 57, '2021-09-24 00:00:00', 'return'),
(49, 56, '2021-09-24 00:00:00', 'return'),
(50, 59, '2021-09-24 00:00:00', 'return'),
(51, 62, '2021-09-24 00:00:00', 'return');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `cell_no` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shedule_table`
--

CREATE TABLE `shedule_table` (
  `slot_id` int(11) NOT NULL,
  `course_code` varchar(45) NOT NULL,
  `course_name` varchar(45) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `batch_no` varchar(45) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `password`, `user_type`) VALUES
(1, 'Tahrim', '12345', 1),
(2, 'Tamanna', '12345', 2),
(3, 'Moon', '12345', 2),
(4, 'Saima', '12345', 2),
(5, 'Shuvra', '12345', 2),
(6, 'Rahat', '12345', 2),
(7, 'Imran', '12345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `idvenue` int(11) NOT NULL,
  `vanue_name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_catagories`
--
ALTER TABLE `book_catagories`
  ADD PRIMARY KEY (`cat_id`,`cat_name`);

--
-- Indexes for table `book_catalog`
--
ALTER TABLE `book_catalog`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_requests`
--
ALTER TABLE `book_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `cont_ass_configuration`
--
ALTER TABLE `cont_ass_configuration`
  ADD PRIMARY KEY (`id_cac`);

--
-- Indexes for table `cont_ass_marks`
--
ALTER TABLE `cont_ass_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cont_ass_mark_conv`
--
ALTER TABLE `cont_ass_mark_conv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_markseet`
--
ALTER TABLE `course_markseet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_details`
--
ALTER TABLE `event_details`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `final_marks`
--
ALTER TABLE `final_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issued_books`
--
ALTER TABLE `issued_books`
  ADD PRIMARY KEY (`issued_id`);

--
-- Indexes for table `notice_information`
--
ALTER TABLE `notice_information`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `return_books`
--
ALTER TABLE `return_books`
  ADD PRIMARY KEY (`return_id`,`issue_id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`,`slot_id`);

--
-- Indexes for table `shedule_table`
--
ALTER TABLE `shedule_table`
  ADD PRIMARY KEY (`slot_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`,`username`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`idvenue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_catagories`
--
ALTER TABLE `book_catagories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `book_catalog`
--
ALTER TABLE `book_catalog`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `book_requests`
--
ALTER TABLE `book_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `cont_ass_configuration`
--
ALTER TABLE `cont_ass_configuration`
  MODIFY `id_cac` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cont_ass_marks`
--
ALTER TABLE `cont_ass_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cont_ass_mark_conv`
--
ALTER TABLE `cont_ass_mark_conv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `issued_books`
--
ALTER TABLE `issued_books`
  MODIFY `issued_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `return_books`
--
ALTER TABLE `return_books`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shedule_table`
--
ALTER TABLE `shedule_table`
  MODIFY `slot_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
