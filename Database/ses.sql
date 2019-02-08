-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2019 at 05:29 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ses`
--

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `student_id`, `section_id`) VALUES
(3, 32, 8),
(4, 33, 9),
(6, 63, 8);

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `time_day` varchar(255) DEFAULT NULL,
  `time_hour` int(11) DEFAULT NULL,
  `time_min` int(11) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `name`, `time_day`, `time_hour`, `time_min`, `suffix`, `status`, `subject_id`, `unit`, `created_at`) VALUES
(2, 'Lecture', 'Mon', 9, 30, 'AM', 'Available', 4, 2, '2019-01-19 15:24:00'),
(4, 'Lab', 'Tue', 7, 30, 'AM', 'Available', 4, 2, '2019-01-19 15:42:05'),
(8, 'Lab', 'Thur', 7, 30, 'AM', 'Available', 4, 1, '2019-01-19 15:50:18'),
(13, 'Lecture', 'Mon', 9, 0, 'AM', 'Available', 4, 1, '2019-01-19 16:41:30'),
(14, 'Lab', 'Thur', 12, 30, 'AM', 'Available', 4, 1, '2019-01-20 00:36:00'),
(15, 'Lecture', 'Wed', 12, 0, 'AM', 'Available', 4, 1, '2019-01-20 00:36:38'),
(16, 'Lab', 'Wed', 9, 30, 'AM', 'Available', 4, 2, '2019-01-20 00:37:57'),
(17, 'Lecture', 'Mon', 7, 30, 'AM', 'Available', 5, 1, '2019-01-20 04:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `year`, `subjects`, `status`, `created_at`) VALUES
(8, '1A', 'Grade_11', '2,4,8,13,16', NULL, '2019-01-20 03:28:17'),
(9, '1B', '2nd', '17', NULL, '2019-01-20 04:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `student_metas`
--

CREATE TABLE `student_metas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_metas`
--

INSERT INTO `student_metas` (`id`, `user_id`, `meta_key`, `meta_value`, `created_at`) VALUES
(16, 63, 'famInfo_mName', 'Lesley Wall', '2019-01-26 06:06:31'),
(17, 63, 'famInfo_fName', 'Anastasia Shannon', '2019-01-26 06:06:31'),
(18, 63, 'famInfo_gName', 'Vaughan Odonnell', '2019-01-26 06:06:31'),
(19, 63, 'famInfo_gContactNo', 'Ipsam veniam cum ex', '2019-01-26 06:06:31'),
(20, 63, 'famInfo_gAddress', 'Praesentium optio e', '2019-01-26 06:06:31'),
(21, 63, 'studStrand', 'TVL_HOME_ECONOMIC', '2019-01-26 06:06:31'),
(22, 63, 'studGrade', 'Grade_12', '2019-01-26 06:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `name`, `description`, `unit`, `status`, `created_at`, `updated_at`) VALUES
(4, 'IT101', 'PROGRAMMING 1', 'PROGRAMMING NODE JS', '3', 'Active', '2019-01-13 10:17:41', '2019-01-13 10:33:45'),
(5, 'IT102', 'PROGRAMMING 1', 'PROGRAMMING 1 NODE JS', '3', 'Active', '2019-01-13 10:19:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject_metas`
--

CREATE TABLE `subject_metas` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `contact_number`, `status`, `gender`, `address`, `created_at`, `updated_at`, `type`) VALUES
(7, 'nyx.assasin', '$2y$10$3VEP4WtOHG7h4iZV3Tcjme4vta/9T44lmYg3ZZPI/jSrkhvmSNo/W', 'Nyx', 'Assasin', 'nyx@codeofaninja.com', '+639177791994', 'active', NULL, NULL, '2019-01-12 12:56:21', '2019-01-13 14:10:23', 'user'),
(32, 'TAC112-123120-2019', '$2y$10$jSia/iiK.UMdk2r7scUZSeNzx8oQXp0a9Lh0iAnLowVfuU2r7wx0W', 'Juan', 'Delacruz', 'juan@yopmail.com', '+639177791994', 'Enrolled', NULL, NULL, '2019-01-13 08:56:01', '2019-01-13 08:58:20', 'student'),
(33, 'TAC112-65484-2019', '$2y$10$YrCuca0SvgjpUGpUpUsHT.V/MxWCJQ8cdTwLgmvuyGZEK6BLR4qdq', 'Nico', 'Cabral', 'nico@yopmail.com', '+639177791994', 'Enrolled', NULL, NULL, '2019-01-13 08:58:07', '0000-00-00 00:00:00', 'student'),
(34, 'TAC112-98857-2019', '$2y$10$UBh43m4zmhrvNmKhbSl1XeygWNr4JKC5Ksctv1VmsGkucb/4.Kq/2', 'Cardo', 'Dalisay', 'cardo@yopmail.com', '+639177791994', 'Active', NULL, NULL, '2019-01-13 08:58:48', '0000-00-00 00:00:00', 'student'),
(38, 'nico.cabral', '$2y$10$KnPys5f5zgtgajGrvmQaK.PB05vw3f3bEQ5uqVnfvqRrzHtQGhcum', 'Nico', 'Cabral', 'nico@yopmail.com', '+639177791994', 'Active', NULL, NULL, '2019-01-13 12:40:15', '2019-01-20 16:10:29', 'user'),
(60, 'rukaxo', '$2y$10$8lK9oW3d.3qWhKHJtXt0repXohoFluxjjBikGoMuKflmHe7wZ94CK', 'Casey', 'Sawyer', 'wunamaxycy@mailinator.net', '513', 'Active', NULL, NULL, '2019-01-25 16:00:14', '2019-01-26 05:56:22', 'user'),
(63, 'dymeziso', '$2y$10$jGyM2xqGkST0I50ui35jDuWrk5/rR/7mvIRJ9C/Fq5NoXTMnggNbO', 'Galvin', 'Contreras', 'myturesir@mailinator.net', '309', 'Enrolled', 'Female', 'Voluptatem consequat', '2019-01-26 06:06:31', '0000-00-00 00:00:00', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_metas`
--
ALTER TABLE `student_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_metas`
--
ALTER TABLE `subject_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_metas`
--
ALTER TABLE `student_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject_metas`
--
ALTER TABLE `subject_metas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
