-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 06:56 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_board_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_username`, `admin_email`, `admin_password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `f_id` int(11) NOT NULL,
  `file_title` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `file_path` varchar(1000) COLLATE utf32_unicode_ci NOT NULL,
  `file_type` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `uploaded_by` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_details` varchar(1000) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `linkid` int(11) NOT NULL,
  `link_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `link_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `proposal_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_abstract` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_features` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_modules` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_tools` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_conclusion` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rejected_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_status` tinyint(1) NOT NULL,
  `is_reffered` tinyint(4) NOT NULL,
  `t_comment` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referred_proposals`
--

CREATE TABLE `referred_proposals` (
  `r_p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `referred_from` int(11) NOT NULL,
  `referred_from_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `referred_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `m_id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_student_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(24) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status_student` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_email`
--

CREATE TABLE `student_email` (
  `id` int(11) NOT NULL,
  `student_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `proposal_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_task`
--

CREATE TABLE `sub_task` (
  `subtask_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `subtask_headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtask_details` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcreate_at` datetime NOT NULL,
  `subtask_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task_headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_details` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_id` int(11) NOT NULL,
  `proposal_id` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `task_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_id` int(11) UNSIGNED NOT NULL,
  `t_name` varchar(255) DEFAULT NULL,
  `t_email` varchar(255) NOT NULL,
  `t_password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `t_post` varchar(255) NOT NULL,
  `t_mobile` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 for Active , 0 for Inactive',
  `project_limit` int(11) NOT NULL,
  `remining_limit` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`linkid`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`proposal_id`);

--
-- Indexes for table `referred_proposals`
--
ALTER TABLE `referred_proposals`
  ADD PRIMARY KEY (`r_p_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `student_email`
--
ALTER TABLE `student_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_task`
--
ALTER TABLE `sub_task`
  ADD PRIMARY KEY (`subtask_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `linkid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `proposal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referred_proposals`
--
ALTER TABLE `referred_proposals`
  MODIFY `r_p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_email`
--
ALTER TABLE `student_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_task`
--
ALTER TABLE `sub_task`
  MODIFY `subtask_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `t_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
