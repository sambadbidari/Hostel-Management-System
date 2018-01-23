-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2017 at 04:13 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `corresCity` varchar(100) NOT NULL,
  `corresZone` varchar(100) NOT NULL,
  `pmntCity` varchar(100) NOT NULL,
  `pmntZone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `corresCity`, `corresZone`, `pmntCity`, `pmntZone`) VALUES
(1, 'Kathmandu', 'Bagmati', 'Syangya', 'Gandaki'),
(2, 'Kathmandu', 'Bagmati', 'Kathmandu', 'Bagmati');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `username`, `email`, `password`) VALUES
(1, 1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `block` int(11) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `dname`, `block`, `postingdate`) VALUES
(1, 'Department of Computer Science and Engineering', 9, '2017-08-08 08:58:23'),
(2, 'Department of Geomatics Engineering', 9, '2017-08-08 08:37:00'),
(6, 'Department of Electrical and Electronics Engineering', 8, '2017-08-08 08:37:26'),
(7, 'Department of Mechanical Engineering', 8, '2017-08-08 08:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enquiry_no` int(10) NOT NULL,
  `username` char(25) NOT NULL,
  `room_no` int(10) NOT NULL,
  `problems` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enquiry_no`, `username`, `room_no`, `problems`) VALUES
(3, 'Prelisa', 102, 'No internet access in room'),
(4, 'rochak', 101, 'Water Problem, Light Problem');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_no` int(11) NOT NULL,
  `event_details` text NOT NULL,
  `event_date` varchar(100) NOT NULL,
  `event_time` varchar(100) NOT NULL,
  `organiser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_no`, `event_details`, `event_date`, `event_time`, `organiser`) VALUES
(1, 'Grand Welcome 2017', '13 August, 2017', '9:00 am', 'Second Year'),
(2, 'Meeting of GW', 'August 9 2017', '1 pm', '2nd year');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `guardianName` varchar(100) NOT NULL,
  `guardianRelation` varchar(100) NOT NULL,
  `guardianContact` bigint(11) NOT NULL,
  `egycontactno` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`guardianName`, `guardianRelation`, `guardianContact`, `egycontactno`) VALUES
('Rasmi Gautam', 'Sister', 9840070034, 9861015214),
('Shashwat Acharya', 'Brother', 9841025896, 9843057834);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_helplines`
--

CREATE TABLE `hostel_helplines` (
  `id` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `sector` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel_helplines`
--

INSERT INTO `hostel_helplines` (`id`, `room_no`, `name`, `contactno`, `sector`) VALUES
(1, 105, 'Subarna Basnet', 9841056987, 'Hostel Prefect');

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE `name` (
  `name_id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`name_id`, `firstName`, `middleName`, `lastName`) VALUES
(1, 'Rochak', '', 'Gautam'),
(2, 'Bibhusan', '', 'Baral');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `seater`, `room_no`, `fees`, `postingdate`) VALUES
(3, 6, 101, 100, '2017-08-10 13:12:45'),
(4, 2, 102, 1000, '2017-08-08 08:33:00'),
(5, 3, 103, 800, '2017-08-08 08:33:10'),
(6, 4, 104, 600, '2017-08-08 08:33:22'),
(7, 5, 105, 500, '2017-08-08 08:33:31');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `regno` int(11) NOT NULL,
  `gender` varchar(150) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `egycontactno` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`regno`, `gender`, `email_id`, `egycontactno`) VALUES
(1925515, 'male', 'gautam.rochak.5@gmail.com', 9861015214),
(1925578, 'male', 'bibhusanbaral@gmail.com', 9843057834);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uname`, `email_id`, `login_time`) VALUES
(3, 'sambad', 'sambad@gmail.com', '2017-08-09 11:04:13'),
(4, 'Prelisa', 'dprelisa@gmail.com', '2017-08-09 11:13:54'),
(5, 'sambad', 'sambad@gmail.com', '2017-08-09 14:21:28'),
(6, 'rochak', 'gautam.rochak.5@gmail.com', '2017-08-09 16:18:09'),
(7, 'rochak', 'gautam.rochak.5@gmail.com', '2017-08-09 17:34:58'),
(8, 'sambad', 'sambad@gmail.com', '2017-08-10 05:42:27'),
(9, 'sambad', 'sambad@gmail.com', '2017-08-10 05:43:10'),
(10, 'sambad', 'sambad@gmail.com', '2017-08-10 05:43:47'),
(11, 'sambad', 'sambad@gmail.com', '2017-08-10 05:44:01'),
(12, 'sambad', 'sambad@gmail.com', '2017-08-10 05:44:37'),
(13, 'sambad', 'sambad@gmail.com', '2017-08-10 05:51:21'),
(14, 'sambad', 'sambad@gmail.com', '2017-08-10 06:20:17'),
(15, 'sambad', 'sambad@gmail.com', '2017-08-10 06:24:49'),
(16, 'aakash', 'akash@gmail.com', '2017-08-10 06:26:29'),
(17, 'sambad', 'sambad@gmail.com', '2017-08-10 06:41:11'),
(18, 'sambad', 'sambad@gmail.com', '2017-08-10 07:26:43'),
(19, 'sambad', 'sambad@gmail.com', '2017-08-10 07:27:31'),
(20, 'sambad', 'sambad@gmail.com', '2017-08-10 09:25:56'),
(21, 'sambad', 'sambad@gmail.com', '2017-08-10 09:26:26'),
(22, 'sambad', 'sambad@gmail.com', '2017-08-10 09:26:59'),
(23, 'sambad', 'sambad@gmail.com', '2017-08-10 09:27:46'),
(24, 'sambad', 'sambad@gmail.com', '2017-08-10 09:29:04'),
(25, 'sambad', 'sambad@gmail.com', '2017-08-10 10:34:24'),
(26, 'sambad', 'sambad@gmail.com', '2017-08-10 10:35:23'),
(27, 'sambad', 'sambad@gmail.com', '2017-08-10 10:35:42'),
(28, 'sambad', 'sambad@gmail.com', '2017-08-10 10:42:53'),
(29, 'sambad', 'sambad@gmail.com', '2017-08-10 10:43:13'),
(30, 'sambad', 'sambad@gmail.com', '2017-08-10 10:44:37'),
(31, 'sambad', 'sambad@gmail.com', '2017-08-10 10:46:53'),
(32, 'sambad', 'sambad@gmail.com', '2017-08-10 10:49:06'),
(33, 'sambad', 'sambad@gmail.com', '2017-08-10 10:50:02'),
(34, 'sambad', 'sambad@gmail.com', '2017-08-10 10:50:16'),
(35, 'sambad', 'sambad@gmail.com', '2017-08-10 10:51:40'),
(36, 'sambad', 'sambad@gmail.com', '2017-08-10 10:51:57'),
(37, 'sambad', 'sambad@gmail.com', '2017-08-10 10:53:07'),
(38, 'sambad', 'sambad@gmail.com', '2017-08-10 10:54:16'),
(39, 'sambad', 'sambad@gmail.com', '2017-08-10 11:24:30'),
(40, 'sambad', 'sambad@gmail.com', '2017-08-10 11:30:12'),
(41, 'sambad', 'sambad@gmail.com', '2017-08-10 11:38:04'),
(42, 'sambad', 'sambad@gmail.com', '2017-08-10 11:39:22'),
(43, 'sambad', 'sambad@gmail.com', '2017-08-10 11:39:38'),
(44, 'sambad', 'sambad@gmail.com', '2017-08-10 11:40:00'),
(45, 'sambad', 'sambad@gmail.com', '2017-08-10 11:40:30'),
(46, 'sambad', 'sambad@gmail.com', '2017-08-10 11:40:44'),
(47, 'sambad', 'sambad@gmail.com', '2017-08-10 11:41:24'),
(48, 'sambad', 'sambad@gmail.com', '2017-08-10 11:42:45'),
(49, 'birat', 'birat@gmail.com', '2017-08-10 11:43:55'),
(50, 'sambad', 'sambad@gmail.com', '2017-08-10 11:45:23'),
(51, 'sambad', 'sambad@gmail.com', '2017-08-10 11:46:18'),
(52, 'sambad', 'sambad@gmail.com', '2017-08-10 11:46:39'),
(53, 'sambad', 'sambad@gmail.com', '2017-08-10 11:48:48'),
(54, 'sambad', 'sambad@gmail.com', '2017-08-10 11:51:41'),
(55, 'sambad', 'sambad@gmail.com', '2017-08-10 11:52:30'),
(56, 'sambad', 'sambad@gmail.com', '2017-08-10 11:59:04'),
(57, 'sambad', 'sambad@gmail.com', '2017-08-10 12:03:26'),
(58, 'sambad', 'sambad@gmail.com', '2017-08-10 12:04:08'),
(59, 'sambad', 'sambad32bidari@gmail.com', '2017-08-10 12:12:28'),
(60, 'abhisek', 'abhisek@gmail.com', '2017-08-10 13:29:20'),
(61, 'sambad', 'sambad32bidari@gmail.com', '2017-08-10 14:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regno` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `room_no` int(11) NOT NULL,
  `seater` int(11) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `stayfrom` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `regno`, `firstName`, `middleName`, `lastName`, `room_no`, `seater`, `contactno`, `stayfrom`) VALUES
(1, 1925515, 'Rochak', '', 'Gautam', 101, 1, 9860120613, '2017-08-09'),
(2, 1925578, 'Bibhusan', '', 'Baral', 102, 2, 9861015214, '2017-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `upassword` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `districts` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `uname`, `upassword`, `email_id`, `contactno`, `districts`) VALUES
(1, 1, 'sambad', 'd7522e3aa5980dd168b3f2442e11da1a', 'sambad32bidari@gmail.com', 9843057834, 'hetauda'),
(2, 2, 'Prelisa', '8b4405f8f7fb3e09a108425622992ce2', 'dprelisa@gmail.com', 9860103098, 'Damak'),
(3, 3, 'rochak', '125a77f1085bf9c374f91aee6912863c', 'gautam.rochak.5@gmail.com', 9860120613, 'Kathmandu'),
(4, 4, 'birat', '290b113adc640c6de4c8af474aefbd67', 'birat@gmail.com', 9860512348, 'Sanga'),
(5, 5, 'suyog', '5c9e01573cef0ba08498875b98b02029', 'suyog@gmail.com', 9843025896, 'lokanthali'),
(6, 6, 'aakash', 'a870c4012ce2eaa3b60a4c59cb786f76', 'akash@gmail.com', 8965874521, 'KU'),
(0, 7, 'abhisek', '4faac31a71576f400f0f2d97a0dfb05e', 'abhisek@gmail.com', 9845621125, 'bharatpur');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id` int(11) NOT NULL,
  `zones` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id`, `zones`) VALUES
(1, 'Mechi'),
(2, 'Koshi'),
(3, 'Sagarmatha'),
(4, 'Janakpur'),
(5, 'Bagmati'),
(6, 'Narayani'),
(7, 'Gandaki'),
(8, 'Lumbini'),
(9, 'Dhawalagiri'),
(10, 'Rapti'),
(11, 'Bheri'),
(12, 'Karnali'),
(13, 'Seti'),
(14, 'Mahakali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enquiry_no`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_no`);

--
-- Indexes for table `hostel_helplines`
--
ALTER TABLE `hostel_helplines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `name`
--
ALTER TABLE `name`
  ADD PRIMARY KEY (`name_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_no`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD KEY `regno` (`regno`),
  ADD KEY `regno_2` (`regno`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`,`regno`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enquiry_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hostel_helplines`
--
ALTER TABLE `hostel_helplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `name`
--
ALTER TABLE `name`
  MODIFY `name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD CONSTRAINT `enquiry_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `rooms` (`room_no`);

--
-- Constraints for table `hostel_helplines`
--
ALTER TABLE `hostel_helplines`
  ADD CONSTRAINT `hostel_helplines_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `rooms` (`room_no`);

--
-- Constraints for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD CONSTRAINT `userregistration_ibfk_1` FOREIGN KEY (`room_no`) REFERENCES `rooms` (`room_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
