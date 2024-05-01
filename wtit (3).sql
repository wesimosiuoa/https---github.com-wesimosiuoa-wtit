-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 10:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtit`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_number` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_number`, `name`, `description`) VALUES
(1, 're', 're'),
(2, 'weewe', ' wewewe'),
(3, 'weewe', ' wewewe'),
(4, 'weewe', ' wewewe'),
(5, 'Executive Breaking', ' jhgfdsa'),
(6, 'Executive Breaking', ' jhgfdsa'),
(7, 'Executive Breaking', ' jhgfdsa'),
(8, 'Executive Breaking', ' s'),
(9, 'Software Engineering', ' Learn how to develop softwares'),
(10, 'Networking', 'Learn networks and everything about them\r\n '),
(11, 'Communication and Study Skills', ' Learn effective communication, team work and collaboration, comflicts managment and presentastion skills');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` varchar(100) NOT NULL,
  `courseName` varchar(200) DEFAULT NULL,
  `descrption` text DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `instructorid` varchar(100) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `category_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `courseName`, `descrption`, `duration`, `price`, `instructorid`, `startdate`, `enddate`, `status`, `category_number`) VALUES
('AI-2024', 'Artificial Interlligence ', '     ', 6, 500, 'TI-50-2024', '2024-04-03', '2024-10-03', 'active', 1),
('C-2024', 'Cybercsecurity', 'Self defence ', 6, 1000, 'MW-32-2024', '2024-11-11', '2025-05-11', 'active', 10),
('PS-2024', 'Presentation Skills', 'Learn how to create engaging presentation with visual aids', 4, 300, 'MW-32-2024', '2024-11-11', '2025-05-11', 'active', 11),
('TAD-2024', 'Testing and Debugging ', 'Test and debug enterprise software', 6, 500, 'MW-32-2024', '2024-11-11', '2025-05-11', 'active', 9),
('WDUC-2024', 'Web Development Using C#', 'working', 6, 450, 'TI-50-2024', '2024-04-03', '2024-10-03', 'active', 8),
('WDUP-2024', 'Web Development Using PHP', 'qwertyuiop', 6, 450, 'MW-32-2024', '2024-04-02', '2024-10-02', 'active', 9);

-- --------------------------------------------------------

--
-- Table structure for table `enrolments`
--

CREATE TABLE `enrolments` (
  `enrolmentID` int(11) NOT NULL,
  `studentid` varchar(100) DEFAULT NULL,
  `courseid` varchar(100) DEFAULT NULL,
  `enrolmentDate` date DEFAULT NULL,
  `intake_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolments`
--

INSERT INTO `enrolments` (`enrolmentID`, `studentid`, `courseid`, `enrolmentDate`, `intake_id`) VALUES
(15, 'WTIT-STU-MW-41-2024', 'AI-2024', '2024-04-05', 23),
(36, 'WTIT-STU-MW-41-2024', 'C-2024', '2024-04-06', 23),
(39, 'WTIT-STU-MW-41-2024', 'WDUC-2024', '2024-04-06', 23),
(50, 'WTIT-STU-MW-41-2024', 'WDUP-2024', '2024-04-02', 22),
(56, 'WTIT-STU-MW-41-2024', 'PS-2024', '2024-04-06', 23),
(60, 'WTIT-STU-MW-41-2024', 'TAD-2024', '2024-04-05', 23);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructorid` varchar(100) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `expectise` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructorid`, `fullname`, `email`, `expectise`, `password`) VALUES
('MW-32-2024', 'Mosiuoa Wesi ', 'wezimosiuoa@gmail.com', 'Software Engineering', 'qwerty'),
('TI-50-2024', 'Tholoana Isaaka', 'tholoana.isaaka@gmail.com', 'Business Manager', '');

-- --------------------------------------------------------

--
-- Table structure for table `intake`
--

CREATE TABLE `intake` (
  `intake_id` int(11) NOT NULL,
  `intake_date` date DEFAULT NULL,
  `application_deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intake`
--

INSERT INTO `intake` (`intake_id`, `intake_date`, `application_deadline`) VALUES
(22, '2024-04-02', '2024-05-11'),
(23, '2024-04-05', '2024-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentID` int(11) NOT NULL,
  `enrolmentID` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `paymentDate` date DEFAULT NULL,
  `paymentMethod` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentID`, `enrolmentID`, `amount`, `paymentDate`, `paymentMethod`) VALUES
(28, 50, 2000.00, '2024-04-02', 'ecocash'),
(29, 50, 700.00, '2024-04-03', 'mpesa'),
(30, 15, 3000.00, '2024-04-05', 'ecocash'),
(31, 15, 3000.00, '2024-04-05', 'ecocash'),
(32, 15, 6000.00, '2024-04-06', 'mpesa'),
(33, 15, 2000.00, '2024-04-06', 'mpesa'),
(34, 15, 700.00, '2024-04-06', 'ecocash'),
(35, 15, 1000.00, '2024-04-06', 'ecocash');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `studentID` varchar(100) DEFAULT NULL,
  `courseID` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `reviewDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stundets`
--

CREATE TABLE `stundets` (
  `studentid` varchar(100) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stundets`
--

INSERT INTO `stundets` (`studentid`, `fname`, `lname`, `email`, `dob`, `gender`, `country`, `password`) VALUES
('WTIT-STU-MW-41-2024', 'MOSIUOA', 'WESI', 'wezimosiuoa@gmail.com', '2024-04-02', 'Female', 'Lesotho', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_number`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`),
  ADD KEY `fk_instructor` (`instructorid`),
  ADD KEY `_category` (`category_number`);

--
-- Indexes for table `enrolments`
--
ALTER TABLE `enrolments`
  ADD PRIMARY KEY (`enrolmentID`),
  ADD KEY `kf_student` (`studentid`),
  ADD KEY `kl_course` (`courseid`),
  ADD KEY `kg_intake_id` (`intake_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructorid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `intake`
--
ALTER TABLE `intake`
  ADD PRIMARY KEY (`intake_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `kl_enrolment` (`enrolmentID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `fka_student` (`studentID`),
  ADD KEY `fka_course` (`courseID`);

--
-- Indexes for table `stundets`
--
ALTER TABLE `stundets`
  ADD PRIMARY KEY (`studentid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enrolments`
--
ALTER TABLE `enrolments`
  MODIFY `enrolmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `intake`
--
ALTER TABLE `intake`
  MODIFY `intake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `_category` FOREIGN KEY (`category_number`) REFERENCES `category` (`category_number`),
  ADD CONSTRAINT `fk_instructor` FOREIGN KEY (`instructorid`) REFERENCES `instructor` (`instructorid`);

--
-- Constraints for table `enrolments`
--
ALTER TABLE `enrolments`
  ADD CONSTRAINT `kf_student` FOREIGN KEY (`studentid`) REFERENCES `stundets` (`studentid`),
  ADD CONSTRAINT `kg_intake_id` FOREIGN KEY (`intake_id`) REFERENCES `intake` (`intake_id`),
  ADD CONSTRAINT `kl_course` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fka_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseid`),
  ADD CONSTRAINT `fka_student` FOREIGN KEY (`studentID`) REFERENCES `stundets` (`studentid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
