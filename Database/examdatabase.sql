-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 06:35 AM
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
-- Database: `examdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_tbl`
--

CREATE TABLE `about_tbl` (
  `id` int(11) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_tbl`
--

INSERT INTO `about_tbl` (`id`, `h1`, `about`) VALUES
(1, 'About us', '<p>একবিংশ শতাব্দির তথ্য প্রযুক্তি নির্ভর তীব্র প্রতিযোগিতামূলক বিশ্বে&nbsp; www.mcqexamhall.com আপনার ক্যারিয়ার ও স্বপ্ন গঠনের সহযোগী</p>');

-- --------------------------------------------------------

--
-- Table structure for table `admartsmodel_1`
--

CREATE TABLE `admartsmodel_1` (
  `id` int(11) NOT NULL,
  `question_no` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admartsmodel_1`
--

INSERT INTO `admartsmodel_1` (`id`, `question_no`, `question`) VALUES
(1, 1, 'পদ্মরাগ কোন ধরনের রচনা ?');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `email`, `password`) VALUES
(1, 'sobuj.bru@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `admission_allanswer`
--

CREATE TABLE `admission_allanswer` (
  `id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `right_ans` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_allanswer`
--

INSERT INTO `admission_allanswer` (`id`, `question_no`, `answer`, `right_ans`) VALUES
(25, 1, 'কাব্য', 0),
(26, 1, 'উপন্যাস', 1),
(27, 1, 'প্রবন্ধ', 0),
(28, 1, 'গল্প', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admission_allquestion`
--

CREATE TABLE `admission_allquestion` (
  `id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_allquestion`
--

INSERT INTO `admission_allquestion` (`id`, `question_no`, `cat`, `question`) VALUES
(7, 1, 1, 'পদ্মরাগ কোন ধরনের রচনা ?');

-- --------------------------------------------------------

--
-- Table structure for table `admission_category`
--

CREATE TABLE `admission_category` (
  `catid` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_category`
--

INSERT INTO `admission_category` (`catid`, `category`) VALUES
(1, 'Bangla 1st');

-- --------------------------------------------------------

--
-- Table structure for table `admission_commerce_model_tbl`
--

CREATE TABLE `admission_commerce_model_tbl` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admission_model_tbl`
--

CREATE TABLE `admission_model_tbl` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission_model_tbl`
--

INSERT INTO `admission_model_tbl` (`id`, `model_name`) VALUES
(11, 'admartsmodel_1');

-- --------------------------------------------------------

--
-- Table structure for table `admission_science_model_tbl`
--

CREATE TABLE `admission_science_model_tbl` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bcs_allanswer`
--

CREATE TABLE `bcs_allanswer` (
  `id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `right_ans` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bcs_allanswer`
--

INSERT INTO `bcs_allanswer` (`id`, `question_no`, `right_ans`, `answer`) VALUES
(181, 1, 0, 'কাব্য'),
(182, 1, 0, 'গল্প'),
(183, 1, 1, 'উপন্যাস'),
(184, 1, 0, 'নাটক'),
(185, 2, 1, 'বহুব্রীহি'),
(186, 2, 0, 'গোড়া'),
(187, 2, 0, 'ডাকঘর'),
(188, 2, 0, 'নৌকাডুবি'),
(189, 3, 0, 'কারক'),
(190, 3, 0, 'বিভক্তি'),
(191, 3, 0, 'যতি'),
(192, 3, 1, 'প্রকৃতি');

-- --------------------------------------------------------

--
-- Table structure for table `bcs_allquestion`
--

CREATE TABLE `bcs_allquestion` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bcs_allquestion`
--

INSERT INTO `bcs_allquestion` (`id`, `cat`, `question_no`, `question`) VALUES
(53, 1, 1, 'পদ্মরাগ কোন ধরনের রচন ?'),
(54, 1, 2, 'কোনটি রবীন্দ্রনাথ ঠাকুর এর উপন্যাস নয়?&nbsp;'),
(55, 1, 3, ' যে ধাতু বা শব্দের শেষে প্রত্যয় যুক্ত হয় তার নাম কী?');

-- --------------------------------------------------------

--
-- Table structure for table `bcs_category`
--

CREATE TABLE `bcs_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bcs_category`
--

INSERT INTO `bcs_category` (`id`, `category`) VALUES
(1, 'Bangla'),
(2, 'English'),
(3, 'Mathematics'),
(4, 'GK Bangladesh Affairs'),
(5, 'GK International Affairs'),
(6, 'ICT'),
(7, 'Mental ability'),
(8, 'General Science');

-- --------------------------------------------------------

--
-- Table structure for table `bcs_model_tbl`
--

CREATE TABLE `bcs_model_tbl` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bcs_model_tbl`
--

INSERT INTO `bcs_model_tbl` (`id`, `model_name`) VALUES
(24, 'model_1');

-- --------------------------------------------------------

--
-- Table structure for table `exam_time`
--

CREATE TABLE `exam_time` (
  `id` int(11) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_time`
--

INSERT INTO `exam_time` (`id`, `duration`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_bank_model_tbl`
--

CREATE TABLE `job_bank_model_tbl` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_other_model_tbl`
--

CREATE TABLE `job_other_model_tbl` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_primary_model_tbl`
--

CREATE TABLE `job_primary_model_tbl` (
  `id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logo_tbl`
--

CREATE TABLE `logo_tbl` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo_tbl`
--

INSERT INTO `logo_tbl` (`id`, `logo`) VALUES
(1, 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `model_1`
--

CREATE TABLE `model_1` (
  `id` int(11) NOT NULL,
  `question_no` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model_1`
--

INSERT INTO `model_1` (`id`, `question_no`, `question`) VALUES
(1, 1, 'পদ্মরাগ কোন ধরনের রচন ?'),
(2, 2, 'কোনটি রবীন্দ্রনাথ ঠাকুর এর উপন্যাস নয়? '),
(3, 3, ' যে ধাতু বা শব্দের শেষে প্রত্যয় যুক্ত হয় তার নাম কী?');

-- --------------------------------------------------------

--
-- Table structure for table `notice_tbl`
--

CREATE TABLE `notice_tbl` (
  `id` int(11) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `notice` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_tbl`
--

INSERT INTO `notice_tbl` (`id`, `h1`, `notice`, `date`) VALUES
(1, 'notice 2', '<p>This is second notice for the website This is second notice for the website This is second notice for the website This is second notice for the website This is second notice for the website</p>\r\n<p>This is second notice for the website This is second notice for the website This is second notice for the website This is second notice for the website This is second notice for the website</p>', '2021-02-28 08:17:31'),
(2, 'notice 2', '<p>&nbsp;notice 3 This is second notice for the website This is second notice for the website This is second notice for the website This is second notice for the website This is second notice for the website</p>\r\n<p>This is second notice for the website This is second notice for the website This is second notice for the website This is second notice for the website This is second notice for the website</p>', '2021-02-28 08:21:35'),
(3, 'notice 3', '<p>This is notice 3 This is notice 3 This is notice 3 This is notice 3</p>\r\n<p>This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3 This is notice 3</p>', '2021-02-28 08:26:07'),
(4, 'notice 4', '<p>hgjhghkhljhjkhkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy</p>', '2021-03-01 16:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `social_tbl`
--

CREATE TABLE `social_tbl` (
  `id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twiter` varchar(255) NOT NULL,
  `instragram` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_tbl`
--

INSERT INTO `social_tbl` (`id`, `facebook`, `twiter`, `instragram`, `googleplus`) VALUES
(1, 'www.facebook.com', 'www.twiter.com', 'www.instragram.com', 'www.googleplus.com');

-- --------------------------------------------------------

--
-- Table structure for table `title_tbl`
--

CREATE TABLE `title_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title_tbl`
--

INSERT INTO `title_tbl` (`id`, `title`, `subtitle`, `logo`) VALUES
(1, 'MCQ Exam Hall', 'একবিংশ শতাব্দির তথ্য প্রযুক্তি নির্ভর তীব্র প্রতিযোগিতামূলক বিশ্বে <br> www.mcqexamhall.com <br>আপনার ক্যারিয়ার ও স্বপ্ন গঠনের সহযোগী', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `number`, `password`, `status`) VALUES
(1, 'Rasheduzzaman', 1705831991, '12345', 0),
(4, 'manik', 1722963413, '12345', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_tbl`
--
ALTER TABLE `about_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admartsmodel_1`
--
ALTER TABLE `admartsmodel_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_allanswer`
--
ALTER TABLE `admission_allanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_allquestion`
--
ALTER TABLE `admission_allquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_category`
--
ALTER TABLE `admission_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `admission_commerce_model_tbl`
--
ALTER TABLE `admission_commerce_model_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_model_tbl`
--
ALTER TABLE `admission_model_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_science_model_tbl`
--
ALTER TABLE `admission_science_model_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bcs_allanswer`
--
ALTER TABLE `bcs_allanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bcs_allquestion`
--
ALTER TABLE `bcs_allquestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bcs_category`
--
ALTER TABLE `bcs_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bcs_model_tbl`
--
ALTER TABLE `bcs_model_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_time`
--
ALTER TABLE `exam_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_bank_model_tbl`
--
ALTER TABLE `job_bank_model_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_other_model_tbl`
--
ALTER TABLE `job_other_model_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_primary_model_tbl`
--
ALTER TABLE `job_primary_model_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_tbl`
--
ALTER TABLE `logo_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_1`
--
ALTER TABLE `model_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_tbl`
--
ALTER TABLE `notice_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_tbl`
--
ALTER TABLE `social_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_tbl`
--
ALTER TABLE `title_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_tbl`
--
ALTER TABLE `about_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admartsmodel_1`
--
ALTER TABLE `admartsmodel_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_allanswer`
--
ALTER TABLE `admission_allanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `admission_allquestion`
--
ALTER TABLE `admission_allquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admission_category`
--
ALTER TABLE `admission_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_commerce_model_tbl`
--
ALTER TABLE `admission_commerce_model_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission_model_tbl`
--
ALTER TABLE `admission_model_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admission_science_model_tbl`
--
ALTER TABLE `admission_science_model_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bcs_allanswer`
--
ALTER TABLE `bcs_allanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `bcs_allquestion`
--
ALTER TABLE `bcs_allquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `bcs_category`
--
ALTER TABLE `bcs_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bcs_model_tbl`
--
ALTER TABLE `bcs_model_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `exam_time`
--
ALTER TABLE `exam_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_bank_model_tbl`
--
ALTER TABLE `job_bank_model_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_other_model_tbl`
--
ALTER TABLE `job_other_model_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_primary_model_tbl`
--
ALTER TABLE `job_primary_model_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logo_tbl`
--
ALTER TABLE `logo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `model_1`
--
ALTER TABLE `model_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice_tbl`
--
ALTER TABLE `notice_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_tbl`
--
ALTER TABLE `social_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `title_tbl`
--
ALTER TABLE `title_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
