-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 06:56 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booktopus2`
--

-- --------------------------------------------------------

--
-- Table structure for table `btp_departments`
--

CREATE TABLE `btp_departments` (
  `dept_id` bigint(15) NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  `dept_status` enum('active','deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btp_departments`
--

INSERT INTO `btp_departments` (`dept_id`, `dept_name`, `dept_status`) VALUES
(1, 'computer', 'active'),
(2, 'Electrical', 'active'),
(3, 'E & C', 'active'),
(4, 'Civil', 'active'),
(5, 'Mechanical', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `btp_issued_books`
--

CREATE TABLE `btp_issued_books` (
  `issued_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `book_id` bigint(20) DEFAULT NULL,
  `recepient_id` bigint(20) DEFAULT NULL,
  `issued_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btp_issued_books`
--

INSERT INTO `btp_issued_books` (`issued_id`, `user_id`, `book_id`, `recepient_id`, `issued_date`) VALUES
(1, 170090107001, 4, 170090107005, '2020-05-09'),
(2, 170090107003, 30, 170090107001, '2020-05-28'),
(3, 170090107003, 32, 170090107001, '2020-05-28'),
(4, 170090107003, 33, 170090107001, '2020-05-02'),
(5, 170090107003, 31, 170090107001, '2020-05-29'),
(6, 170090107001, 7, 170090107011, '2020-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `btp_pending_request`
--

CREATE TABLE `btp_pending_request` (
  `req_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `book_id` bigint(20) DEFAULT NULL,
  `req_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btp_pending_request`
--

INSERT INTO `btp_pending_request` (`req_id`, `user_id`, `book_id`, `req_date`) VALUES
(1, 170090107003, 2, '2020-05-07'),
(3, 170090107001, 31, '2020-05-27'),
(4, 190090107003, 33, '2020-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `btp_subjects`
--

CREATE TABLE `btp_subjects` (
  `sub_id` bigint(15) NOT NULL,
  `dept_id` bigint(15) NOT NULL,
  `subject_code` bigint(20) NOT NULL,
  `sub_name` varchar(50) NOT NULL,
  `sub_semister` varchar(15) NOT NULL,
  `sub_status` enum('active','deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btp_subjects`
--

INSERT INTO `btp_subjects` (`sub_id`, `dept_id`, `subject_code`, `sub_name`, `sub_semister`, `sub_status`) VALUES
(2, 1, 21250, 'DS', '3', 'active'),
(3, 1, 21240, 'Object Oriented With C++', '3', 'active'),
(4, 1, 12345, 'c', '3', 'active'),
(5, 1, 215425, 'Machine Learning', '8', 'active'),
(6, 3, 12345, 'maths', '4', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `btp_upload_books`
--

CREATE TABLE `btp_upload_books` (
  `book_id` bigint(20) NOT NULL,
  `sub_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_publication` varchar(20) NOT NULL,
  `book_author` varchar(20) NOT NULL,
  `book_description` varchar(300) DEFAULT NULL,
  `book_edition` varchar(20) NOT NULL,
  `book_status` enum('active','deactive') NOT NULL,
  `book_img1` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btp_upload_books`
--

INSERT INTO `btp_upload_books` (`book_id`, `sub_id`, `user_id`, `book_title`, `book_publication`, `book_author`, `book_description`, `book_edition`, `book_status`, `book_img1`) VALUES
(2, 2, 170090107001, 'Data Structure', 'Atul Prakation', 'Roshani Jawale', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarras', '6th', 'deactive', 0x626f6f6b332e6a7067),
(3, 3, 170090107001, 'Maths', 'Technical', 'vishaljariwala', 'Hello Friend', '5th', 'deactive', 0x626f6f6b312e706e67),
(4, 4, 170090107001, 'c language', 'Atul prakation', 'Roshani Jawale', 'fgsgsdhdshhzgfnxgcvcbz', '7th', 'deactive', 0x626f6f6b322e6a7067),
(7, 3, 170090107001, 'oop in c', 'Atul prakation', 'Roshani Jawale', 'zgzggzgergggeggzeg', '6th', 'deactive', 0x626f6f6b335f312e6a7067),
(29, 2, 170090107001, 'Data Structure', 'Atul prakation', 'Roshani Jawale', '123456', '6th', 'deactive', 0x312e706e67),
(30, 3, 170090107003, 'Object oriented with c++', 'Atul prakation', 'Roshani Jawale', 'fdsfdsxgdsgdsfsdgfdsfds', '6th', 'active', 0x31202835292e6a7067),
(31, 2, 170090107003, 'Theory of Structures/ Analysis of Structure', 'Atul prakation', 'S. Ramamurtham', 'dxvdxcbvsdzxvsafzcad', '6th', 'active', 0x32362e6a7067),
(32, 6, 170090107003, 'Design of steel structures', 'Atul prakation', 'S. Ramamurtham', 'xcblvdsx bvndx kb dxcbvn sdkxb vx', '7th', 'active', 0x33372e6a7067),
(33, 5, 170090107003, 'python', 'Atul prakation', 'Pillai & Menon', 'zsxv,dx cbxcc', '6th', 'active', 0x436f6c6f7266756c5f576f726c645f30315f62795f6d65646961626c6164652e6a7067),
(34, 3, 170090107001, 'Theory of Structures/ Analysis of Structure', 'Atul prakation', 'Roshani Jawale', 'dfhchfdcngfmv', '6th', 'deactive', 0x382e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `btp_users`
--

CREATE TABLE `btp_users` (
  `user_id` bigint(20) NOT NULL,
  `id_no` bigint(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_contact` bigint(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `dept_id` bigint(15) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_type` enum('admin','student','professor') NOT NULL,
  `user_status` enum('active','deactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btp_users`
--

INSERT INTO `btp_users` (`user_id`, `id_no`, `first_name`, `last_name`, `user_contact`, `user_email`, `dept_id`, `user_password`, `user_type`, `user_status`) VALUES
(2, 170090107001, 'Bhargavi', 'Bhagat', 9903354560, 'bhargavi@gmail.com', 1, '123456', 'student', 'active'),
(3, 170090107003, 'Hetvi', 'Desai', 8529876540, 'hetvi@gmail.com', 1, '123456', 'student', 'active'),
(4, 170090107005, 'bunny', 'shaah', 7896547896, 'bunny@gmail.com', 3, 'abc', 'student', 'active'),
(5, 190090107003, 'hemil', 'xyz', 7474747474, 'hemil@gmail.com', 1, 'asdf', 'student', 'active'),
(6, 170090107006, 'himani', 'patel', 7896547896, 'himani@gmail.com', 1, 'roshani', 'student', 'active'),
(7, 170090107011, 'rohani', 'vasawa', 7474747474, 'a@gmail.com', 2, 'sdf', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `btp_valid_users`
--

CREATE TABLE `btp_valid_users` (
  `valid_id_no` bigint(20) NOT NULL,
  `valid_email` varchar(50) NOT NULL,
  `valid_type` enum('professor','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `btp_valid_users`
--

INSERT INTO `btp_valid_users` (`valid_id_no`, `valid_email`, `valid_type`) VALUES
(170090107001, 'bhargavi@gmail.com', 'student'),
(170090107003, 'hetvi@gmail.com', 'student'),
(170090107004, 'akash@gmail.com', 'student'),
(170090107005, 'bunny@gmail.com', 'student'),
(170090107006, 'hinali@gmail.com', 'student'),
(170090107007, 'paridhi@gmail.com', 'student'),
(170090107008, 'neel@gmail.com', 'student'),
(170090107009, 'haripriya@gmail.com', 'student'),
(170090107010, 'fenil@gmail.com', 'student'),
(170090107011, 'vishal@gmail.com', 'student'),
(190090107001, 'neelem@gmail.com', 'professor'),
(190090107002, 'yogesh@gmail.com', 'professor'),
(190090107003, 'hemil@gmail.com', 'professor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `btp_departments`
--
ALTER TABLE `btp_departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `btp_issued_books`
--
ALTER TABLE `btp_issued_books`
  ADD PRIMARY KEY (`issued_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `recepient_id` (`recepient_id`);

--
-- Indexes for table `btp_pending_request`
--
ALTER TABLE `btp_pending_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `btp_subjects`
--
ALTER TABLE `btp_subjects`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `btp_upload_books`
--
ALTER TABLE `btp_upload_books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `btp_users`
--
ALTER TABLE `btp_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `btp_valid_users`
--
ALTER TABLE `btp_valid_users`
  ADD PRIMARY KEY (`valid_id_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `btp_departments`
--
ALTER TABLE `btp_departments`
  MODIFY `dept_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `btp_issued_books`
--
ALTER TABLE `btp_issued_books`
  MODIFY `issued_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `btp_pending_request`
--
ALTER TABLE `btp_pending_request`
  MODIFY `req_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `btp_subjects`
--
ALTER TABLE `btp_subjects`
  MODIFY `sub_id` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `btp_upload_books`
--
ALTER TABLE `btp_upload_books`
  MODIFY `book_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `btp_users`
--
ALTER TABLE `btp_users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `btp_issued_books`
--
ALTER TABLE `btp_issued_books`
  ADD CONSTRAINT `btp_issued_books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `btp_users` (`id_no`),
  ADD CONSTRAINT `btp_issued_books_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `btp_upload_books` (`book_id`),
  ADD CONSTRAINT `btp_issued_books_ibfk_3` FOREIGN KEY (`recepient_id`) REFERENCES `btp_users` (`id_no`);

--
-- Constraints for table `btp_pending_request`
--
ALTER TABLE `btp_pending_request`
  ADD CONSTRAINT `btp_pending_request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `btp_users` (`id_no`),
  ADD CONSTRAINT `btp_pending_request_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `btp_upload_books` (`book_id`);

--
-- Constraints for table `btp_subjects`
--
ALTER TABLE `btp_subjects`
  ADD CONSTRAINT `btp_subjects_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `btp_departments` (`dept_id`);

--
-- Constraints for table `btp_upload_books`
--
ALTER TABLE `btp_upload_books`
  ADD CONSTRAINT `btp_upload_books_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `btp_subjects` (`sub_id`),
  ADD CONSTRAINT `btp_upload_books_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `btp_users` (`id_no`);

--
-- Constraints for table `btp_users`
--
ALTER TABLE `btp_users`
  ADD CONSTRAINT `btp_users_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `btp_departments` (`dept_id`),
  ADD CONSTRAINT `btp_users_ibfk_2` FOREIGN KEY (`id_no`) REFERENCES `btp_valid_users` (`valid_id_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
