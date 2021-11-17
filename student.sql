-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 06:48 AM
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
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `attemptquiz`
--

CREATE TABLE `attemptquiz` (
  `aid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attemptquiz`
--

INSERT INTO `attemptquiz` (`aid`, `sid`, `qid`, `eid`, `answer`) VALUES
(1, 10, 1, 3, 'qwert'),
(2, 10, 2, 3, 'pi'),
(3, 10, 3, 4, 'osama'),
(4, 10, 4, 4, 'BS'),
(7, 10, 7, 6, '213'),
(8, 10, 8, 6, '4065'),
(9, 10, 13, 7, 'jkl'),
(10, 10, 11, 7, 'kjl'),
(11, 10, 10, 7, 'uoi'),
(12, 10, 9, 7, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `create_date` date NOT NULL,
  `uid` int(11) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `credit_hours` int(11) NOT NULL,
  `offer_semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cid`, `cname`, `category`, `description`, `create_date`, `uid`, `batch`, `status`, `credit_hours`, `offer_semester`) VALUES
(3, 'Programming Fundamentals', '1', 'This is a programming course', '2021-11-04', 1, '2021 Fall', 'Active', 3, 1),
(4, 'DS', '2', 'This is a special course design for Maths', '2021-11-09', 1, '2021 Fall', 'Active', 3, 1),
(6, 'ghi', '1', 'asd', '2021-11-10', 1, '2021 Fall', 'Active', 3, 4),
(7, 'abac', '2', '64654604802386dfgtbjhdvjfgfgdg ', '2021-11-01', 1, '5050', 'Active', 5, 5),
(8, 'xyz', '1', 'sdasdadasdasdas', '2021-11-10', 1, '2021 FAll', 'Active', 2, 1),
(9, 'Qwerty', '2', 'sdfsdfsdsdf', '2021-11-10', 1, '2021 Spring', 'Active', 3, 4),
(10, 'English', '1', 'English course ', '2021-11-11', 1, '2021 Fall', 'Active', 3, 1),
(11, 'New Course', '1', 'new coursezsdsa dasdasdasasd', '2021-11-11', 1, '2021 Fall', 'Active', 3, 4),
(13, 'mynewosamam', '1', '5413542340563', '2021-11-11', 1, '2021 Fall', 'Active', 4, 4),
(15, 'abc', '1', 'sadasdasd', '2021-11-16', 1, '2021 Fall', 'Active', 3, 1),
(16, 'kamran', '1', 'sdasdasdasdasdsadas', '2021-11-16', 1, '2021 Fall', 'Active', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `coursecategory`
--

CREATE TABLE `coursecategory` (
  `ccid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ccstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursecategory`
--

INSERT INTO `coursecategory` (`ccid`, `name`, `ccstatus`) VALUES
(1, 'Programming Language', 'Active'),
(2, 'Math', 'Active'),
(3, 'English', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `eid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_enroll` date NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `hrs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`eid`, `uid`, `cid`, `status`, `date_enroll`, `tid`, `hrs`) VALUES
(3, 9, 6, 'Enrolled', '2021-11-11', 6, 3),
(6, 9, 13, 'Enrolled', '2021-11-11', 6, 4),
(7, 10, 3, 'Enrolled', '2021-11-11', 6, 3),
(8, 10, 8, 'Enrolled', '2021-11-11', 6, 2),
(9, 12, 6, 'Enrolled', '2021-11-11', 6, 3),
(10, 12, 13, 'Enrolled', '2021-11-11', 6, 4),
(11, 13, 6, 'Enrolled', '2021-11-11', 6, 3),
(12, 14, 3, 'Enrolled', '2021-11-11', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `cid` int(11) NOT NULL,
  `total_question` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `timelimit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `sdate`, `edate`, `cid`, `total_question`, `tid`, `estatus`, `title`, `semester`, `timelimit`) VALUES
(3, '2021-11-16', '2021-11-16', 8, 2, 6, 'Active', 'Quiz 1', 1, 5),
(4, '2021-11-16', '2021-11-16', 3, 2, 6, 'Active', 'Quiz 2', 1, 2),
(6, '2021-11-17', '2021-11-17', 3, 2, 6, 'Active', 'ok', 1, 2),
(7, '2021-11-17', '2021-11-17', 3, 5, 6, 'Active', 'Quiz 5', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `exam_detail`
--

CREATE TABLE `exam_detail` (
  `eid` int(11) NOT NULL,
  `question` varchar(150) NOT NULL,
  `correct_answer` varchar(100) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `edid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_detail`
--

INSERT INTO `exam_detail` (`eid`, `question`, `correct_answer`, `option1`, `option2`, `option3`, `edid`) VALUES
(3, 'q1', 'qwert', 'iuo', 'iou', 'iuo', 1),
(3, 'sad', 'opi', 'pi', 'pi', 'opi', 2),
(4, 'what is your name', 'osama', 'ali', 'kamran', 'ahmed', 3),
(4, 'What is your Highest Level of Education', 'BS', 'MAtric', 'Masters', 'None of Above', 4),
(6, 'q1', '213', '546', '5+', '9', 7),
(6, 'q2', '4065', '5', '056', '546', 8),
(7, 'question', 'abc', 'asjkd', 'jhk', 'hjk', 9),
(7, 'question ', 'ghf', 'uoi', 'uoi', 'uoi', 10),
(7, 'question', 'kl', 'mkl', 'kjl', 'jlk', 11),
(7, 'question', 'kjl', 'jkl', 'jl', 'jl', 12),
(7, 'asddkl', 'jkl', 'jlk', 'jl', 'jkl', 13);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rid` int(11) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `rname`, `status`) VALUES
(1, 'Super Admin', 'Active'),
(2, 'Admin', 'Active'),
(3, 'Teacher', 'Active'),
(4, 'Student', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `takecourse`
--

CREATE TABLE `takecourse` (
  `tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `date_enroll` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `hrs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `takecourse`
--

INSERT INTO `takecourse` (`tid`, `uid`, `cid`, `date_enroll`, `status`, `hrs`) VALUES
(12, 6, 6, '2021-11-10', 'Enroll', 3),
(15, 6, 8, '2021-11-11', 'Enroll', 2),
(16, 6, 3, '2021-11-11', 'Enroll', 3),
(17, 6, 13, '2021-11-11', 'Enroll', 4),
(19, 6, 16, '2021-11-16', 'Enroll', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `DOB`, `gender`, `password`, `email`, `Role`, `status`, `address`, `country`, `city`, `contact`, `semester`) VALUES
(1, 'Osama', 'Waseem', '1998-08-16', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'osama.ftc@gmail.com', 'Admin', 'Active', 'House 12', 'Pakistan', 'Islamabad', '03368407065', 1),
(4, 'Kamran abc', 'Ali', '2016-02-09', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'kamran@gmail.com', 'Student', 'Active', 'house 2 street 11 bahria intellacual village', 'Pakistan', 'Lahore', '032498325', 3),
(5, 'Kashif', 'Ali', '2010-03-09', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'kashif@gmail.com', 'Student', 'Active', 'house 11 street 14 ', 'Pakistan', 'Islamabad', '03368407065', 1),
(6, 'Mushtaq', 'Ahmed', '2021-11-09', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'mushtaq@gmail.com', 'Teacher', 'Active', 'house 11 street 14', 'Pakistan', 'Rawalpindi', '23456768', 0),
(7, 'ALi', 'Ahmed', '2021-11-09', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'ali@gmail.com', 'Student', 'Active', 'dfgh', 'Pakistan', 'Rawalpindi', '123456789', 1),
(8, 'Dilawar', 'Ali', '2021-11-10', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'osama.ftc@gmail.com', 'Student', 'Active', 'sdfsdfdsfsdfsdfsd', 'Pakistan', 'Rawalpindi', '03365509780', 4),
(9, 'Faisal', 'Abid', '2021-11-01', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'faisal@gmail.com', 'Student', 'Active', 'dsasdassd', 'Pakistan', 'Islamabad', '458405460', 4),
(10, 'Student', 'Ahmend', '2021-11-11', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'student@gmail.com', 'Student', 'Active', 'dsfsdfdsfdsfsdfsd', 'Pakistan', 'Karachi', '033684070645', 1),
(12, 'student', 'q', '2021-11-11', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'student1@gmail.com', 'Student', 'Active', '15645056', 'Pakistan', 'Islamabad', '05464023', 4),
(13, 'student2', 'asdasdsad', '2021-11-11', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'student2@gmail.com', 'Student', 'Active', 'dsadasasadad', 'Pakistan', 'Islamabad', '65065350', 4),
(14, 'student3', 'asd', '2021-11-11', 'Male', '81dc9bdb52d04dc20036dbd8313ed055', 'student3@gmail.com', 'Student', 'Active', 'sdfs', 'Pakistan', 'Islamabad', '1540561456405415', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attemptquiz`
--
ALTER TABLE `attemptquiz`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `coursecategory`
--
ALTER TABLE `coursecategory`
  ADD PRIMARY KEY (`ccid`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_detail`
--
ALTER TABLE `exam_detail`
  ADD PRIMARY KEY (`edid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `takecourse`
--
ALTER TABLE `takecourse`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attemptquiz`
--
ALTER TABLE `attemptquiz`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `coursecategory`
--
ALTER TABLE `coursecategory`
  MODIFY `ccid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_detail`
--
ALTER TABLE `exam_detail`
  MODIFY `edid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `takecourse`
--
ALTER TABLE `takecourse`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
