-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 10:44 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `montegoportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(100) NOT NULL,
  `value` int(1) NOT NULL,
  `surveyingStaffEmail` varchar(200) NOT NULL,
  `surveyedStaff` varchar(200) NOT NULL,
  `surveyedStaffID` int(100) DEFAULT NULL,
  `surveyID` int(100) NOT NULL,
  `questionID` int(100) NOT NULL,
  `category` varchar(200) NOT NULL,
  `datePosted` datetime NOT NULL DEFAULT current_timestamp(),
  `surveySession` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `value`, `surveyingStaffEmail`, `surveyedStaff`, `surveyedStaffID`, `surveyID`, `questionID`, `category`, `datePosted`, `surveySession`) VALUES
(1, 5, 'd.dike@montego.com', 'Chinyere Onuzo', NULL, 3, 4, 'Sommethng else', '2020-08-13 15:15:43', 1),
(2, 5, 'd.dike@montego.com', 'Chinyere Onuzo', NULL, 3, 5, 'Etiquette', '2020-08-13 15:15:43', 1),
(3, 4, 'd.dike@montego.com', 'Chinyere Onuzo', NULL, 3, 6, 'Sommethng else', '2020-08-13 15:15:43', 1),
(4, 4, 'd.dike@montego.com', 'Chinyere Onuzo', NULL, 3, 7, 'Etiquette', '2020-08-13 15:15:43', 1),
(5, 5, 'd.dike@montego.com', 'Chinyere Onuzo', NULL, 3, 8, 'Home', '2020-08-13 15:15:43', 1),
(6, 5, 'd.dike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 4, 'Sommethng else', '2020-08-13 15:15:43', 0),
(7, 5, 'd.dike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 5, 'Etiquette', '2020-08-12 15:15:43', 0),
(8, 2, 'd.dike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 6, 'Sommethng else', '2020-08-13 15:15:43', 0),
(9, 4, 'd.dike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 7, 'Etiquette', '2020-08-13 15:15:43', 0),
(10, 5, 'd.dike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 8, 'Home', '2020-08-13 15:15:43', 0),
(11, 4, 'r.ejire@montego.com', 'Abraham Ogbunigwe', NULL, 3, 4, 'Sommethng else', '2020-08-14 12:33:32', 0),
(12, 2, 'r.ejire@montego.com', 'Abraham Ogbunigwe', NULL, 3, 5, 'Etiquette', '2020-08-14 12:33:32', 0),
(13, 3, 'r.ejire@montego.com', 'Abraham Ogbunigwe', NULL, 3, 6, 'Sommethng else', '2020-08-14 12:33:32', 0),
(14, 2, 'r.ejire@montego.com', 'Abraham Ogbunigwe', NULL, 3, 7, 'Etiquette', '2020-08-14 12:33:32', 0),
(15, 2, 'r.ejire@montego.com', 'Abraham Ogbunigwe', NULL, 3, 8, 'Home', '2020-08-14 12:33:32', 0),
(16, 5, 'r.ejire@montego.com', 'Abraham Ogbunigwe', NULL, 4, 11, 'Time', '2020-08-14 14:15:19', 0),
(17, 5, 'r.ejire@montego.com', 'Abraham Ogbunigwe', NULL, 4, 12, 'Discussions', '2020-08-14 14:15:19', 0),
(18, 4, 'r.ejire@montego.com', 'Abraham Ogbunigwe', NULL, 4, 13, 'Presentations', '2020-08-14 14:15:20', 0),
(19, 4, 'k.anyabuike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 4, 'Sommethng else', '2020-08-14 14:46:09', 18),
(20, 5, 'k.anyabuike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 5, 'Etiquette', '2020-08-14 14:46:10', 18),
(21, 4, 'k.anyabuike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 6, 'Sommethng else', '2020-08-14 14:46:10', 18),
(22, 4, 'k.anyabuike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 7, 'Etiquette', '2020-08-14 14:46:10', 18),
(23, 4, 'k.anyabuike@montego.com', 'Abraham Ogbunigwe', NULL, 3, 8, 'Home', '2020-08-14 14:46:10', 18);

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `serialNo` varchar(50) DEFAULT NULL,
  `macAddress` varchar(50) DEFAULT NULL,
  `staffID` int(50) DEFAULT NULL,
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `lastUpdated` datetime NOT NULL DEFAULT current_timestamp(),
  `state` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `price` varchar(10) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `isSignedFor` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `model`, `class`, `serialNo`, `macAddress`, `staffID`, `dateAdded`, `lastUpdated`, `state`, `location`, `price`, `comment`, `isSignedFor`) VALUES
(1, 'HP Keyboard', NULL, 'Keyboard', 'MUS/IT/38384', NULL, 3, '2020-01-07 11:37:18', '2020-01-07 11:37:18', 'Good', 'Room', '3000', NULL, 'no'),
(2, 'Boze Speaker', 'FP-222', 'Other ICT Device', 'MUS/IT/38273', NULL, 0, '2020-01-09 15:26:41', '2020-01-09 15:26:41', 'Faulty', '', '5000', 'My comment', 'no'),
(3, 'Sample', '3323', 'Mouse', 'MUS/SDUDSYDS', '0032|3223|2323', 1, '2020-01-09 17:22:01', '2020-01-09 17:22:01', 'Damaged', '', '3000', NULL, 'yes'),
(4, 'ffsff', 'dsdsds', 'Keyboard', 'dffdfdfd', NULL, 0, '2020-01-11 14:33:19', '2020-01-11 14:33:19', 'Good', '', '332323', NULL, 'no'),
(5, 'HP Laptop', 'Hp onLive', 'Desktop PC', 'MUS/2242/323', NULL, 3, '2020-01-13 11:55:27', '2020-01-13 11:55:27', 'Good', '', '', '', 'no'),
(6, 'Office Drawer', 'Carbon Top', 'Drawer', 'MUS/YD/EWDS', NULL, 1, '2020-01-13 11:56:15', '2020-01-13 11:56:15', 'Good', 'Top Floor Bathroom', '3232', 'my comment', 'no'),
(7, 'dsdssd', 'sdsdssd', 'Drawer', '34333', NULL, 1, '2020-01-13 11:57:04', '2020-01-13 11:57:04', 'Damaged', 'Conference Room', 'ssddds', 'My new comment', 'yes'),
(8, 'sdsdsd', 'dsdsds', 'Couch', 'sdsdsd', NULL, 3, '2020-01-13 11:57:56', '2020-01-13 11:57:56', 'Damaged', '', 'sddsdsd', '', 'no'),
(9, 'dsddsd', 'PD-S', 'Desktop PC', 'sddsdssd', NULL, 2, '2020-01-13 13:54:58', '2020-01-13 13:54:58', 'Damaged', 'Top Floor Bathroom', 'EWWEEW', NULL, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `field` varchar(50) NOT NULL,
  `val` text NOT NULL,
  `lastUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `field`, `val`, `lastUpdated`) VALUES
(1, 'vacant_positions', 'IT intern|Asset manager', '2020-02-24 12:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `itrequests`
--

CREATE TABLE `itrequests` (
  `id` int(10) UNSIGNED NOT NULL,
  `staffID` int(10) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `comment` text NOT NULL,
  `response` varchar(250) DEFAULT NULL,
  `datePosted` datetime NOT NULL DEFAULT current_timestamp(),
  `urgency` varchar(100) NOT NULL,
  `rating` varchar(100) DEFAULT NULL,
  `review` tinytext NOT NULL,
  `dateRessolved` datetime DEFAULT NULL,
  `itStaffID` int(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itrequests`
--

INSERT INTO `itrequests` (`id`, `staffID`, `category`, `comment`, `response`, `datePosted`, `urgency`, `rating`, `review`, `dateRessolved`, `itStaffID`, `status`) VALUES
(1, 1, 'Hardware', 'My printer is faulty and i can\'t get the right settings to print in color. Help', 'Noted. we will fix', '2020-04-30 19:08:01', 'Minor', 'Very good', 'Amazing service', '2020-05-12 00:00:00', 4, 'Ressolved'),
(2, 1, 'Software', 'MS excel not working ', 'Understood', '2020-04-27 19:08:01', 'Minor', 'Fair', '', NULL, 4, 'Received'),
(4, 1, 'Email', 'Cant receive mails', 'Noted. will respond shortly', '2020-04-28 21:52:13', 'Very urgent', 'Good', 'Nice work. could be faster next time', '2020-05-01 00:00:00', 1, 'Ressolved');

-- --------------------------------------------------------

--
-- Table structure for table `pendingstaff`
--

CREATE TABLE `pendingstaff` (
  `id` int(100) UNSIGNED NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `maritalStatus` enum('Single','Married') DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `expYears` int(2) NOT NULL,
  `skills` text NOT NULL,
  `educationLevel` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `fieldOfInterest` varchar(30) NOT NULL,
  `position` varchar(50) NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `cv` varchar(100) DEFAULT NULL,
  `cvStatus` enum('New','Interviewed','Post-Interview','Shortlisted','Keep in view','Rejected','') NOT NULL DEFAULT 'New',
  `dateAdded` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendingstaff`
--

INSERT INTO `pendingstaff` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `maritalStatus`, `address`, `state`, `nationality`, `expYears`, `skills`, `educationLevel`, `course`, `fieldOfInterest`, `position`, `phoneNumber`, `email`, `dateOfBirth`, `cv`, `cvStatus`, `dateAdded`) VALUES
(1, 'John', 'Fredick', 'Doe', 'Male', 'Single', '14a, Markhall road', 'Lagos', 'Nigerian', 2, 'BDU Leader', 'Msc', 'Human resource Management', '', '', '07848836633', 'john.doe@montego-holdings.com', '1997-11-18', '1575909972-COSC102.pdf', 'Shortlisted', '2019-11-29 12:03:12'),
(3, 'Kingsley', 'Chubie', 'Anyabuike', 'Male', 'Single', 'Plot 16, Temple Road, Ikoyi Lagos', 'Imo', 'Nigeria', 2, 'I am a skilled Developer', 'Bachelor&#039;s degree', 'Computer Science', '', 'ICT personnel', '07059572593', 'k.anyabuike@montego-holdings.com', '1997-10-11', '1575909972-COSC102.pdf', 'New', '2019-12-04 13:13:30'),
(14, 'Damola', '', 'Adeyanju', 'Male', 'Single', '42 Bagada, Lagos', 'Ogun', 'Nigeria', 1, 'I highly talented HR personnel', 'Master&#039;s degree', 'Sociology', 'Human Resources', 'HR representative', '07053735273', 'damola@gmail.com', '1997-01-27', '1582556581-Damola-Adeyanju', 'New', '2020-02-24 16:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(100) UNSIGNED NOT NULL,
  `category` varchar(150) NOT NULL,
  `question` text NOT NULL,
  `surveyID` int(100) NOT NULL,
  `datePosted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category`, `question`, `surveyID`, `datePosted`) VALUES
(4, 'Sommethng else', 'this is question for survey 2', 3, '2020-08-13 15:16:06'),
(5, 'Etiquette', 'How early does he/she arrive to the meeting room?', 3, '2020-08-13 15:16:06'),
(6, 'Sommethng else', 'How good is he/she in listening during discussions', 3, '2020-08-13 15:16:06'),
(7, 'Etiquette', 'This is a good question for something else', 3, '2020-08-13 15:16:06'),
(8, 'Home', 'This is a good question for home', 3, '2020-08-13 15:16:06'),
(10, 'Home', 'First question for this survey', 2, '2020-08-13 15:16:06'),
(11, 'Time', 'Does the staff arrive early', 4, '2020-08-14 14:12:09'),
(12, 'Discussions', 'How good is he/she in listening during discussions', 4, '2020-08-14 14:12:36'),
(13, 'Presentations', 'How good are the power point slides during presentations', 4, '2020-08-14 14:13:07'),
(14, 'Discussions', 'This is question 4', 4, '2020-08-14 14:34:31'),
(17, 'Discussions', 'How good is the staff&#039;s conduct during contributions', 4, '2020-08-14 14:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `department` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `privileges` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fullname`, `email`, `dateOfBirth`, `department`, `password`, `privileges`) VALUES
(1, 'Chinyere Onuzo', 'c.onuzo@montego.com', '2020-02-21', 'Corporate Services', 'password', 'ACCESS_SYSTEM|VIEW_ASSET_LIST'),
(3, 'David Dike', 'd.dike@montego.com', '2020-02-03', 'BDU', 'password', 'ACCESS_SYSTEM'),
(4, 'Marcus Agwuibe', 'm.agwibe@montego.com', '2020-02-26', 'Corporate Services', 'password', 'ACCESS_SYSTEM'),
(5, 'Aderonke Imam', 'a.imam@montego.com', '2020-02-03', 'Corporate Services', 'password', 'ACCESS_SYSTEM'),
(6, 'Chinwe Chukwurah', 'c.chukwurah@montego.com', '2020-02-03', 'BDU', 'password33', 'ACCESS_SYSTEM'),
(12, 'Nengi Oriye', 'n.oriye@montego.com', '2020-08-04', 'BDU', 'password', 'ACCESS_SYSTEM|MANAGE_USERS');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `response` text DEFAULT NULL,
  `staffID` int(100) DEFAULT NULL,
  `datePosted` datetime NOT NULL DEFAULT current_timestamp(),
  `respondingStaffID` int(100) DEFAULT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `title`, `comment`, `response`, `staffID`, `datePosted`, `respondingStaffID`, `category`) VALUES
(1, 'ID Card implementation', 'I like to see the ID cards implemented as soon as possible. It would make things more interesting. ', 'Noted in the company, we take steps to make sure everyone is comfortable', 1, '2020-01-22 12:02:31', 3, 'ICT'),
(2, 'I want more food', 'The food being served is too small o!', 'No fear!.. new guys are coming', 1, '2020-01-22 13:02:57', 1, 'Food'),
(3, 'Fire extinguishers', 'He need more fire extinguishers around the office.', 'Great suggestion. We will notify the HSE department.', 1, '2020-01-22 13:24:21', 1, 'Health and safety'),
(4, 'Sample suggestion', 'Metal detectors round the building.', 'My reply', 1, '2020-01-22 13:25:50', 1, 'Security'),
(5, 'Another Suggestion', 'Some wires are exposed', 'Duly Noted. Thanks', 3, '2020-01-30 11:10:29', 1, 'Health and safety'),
(8, 'Final suggestion', 'This is a second report ', NULL, 2, '2020-04-30 21:48:42', NULL, 'Email');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(100) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `categories` text NOT NULL,
  `staffID` int(100) UNSIGNED NOT NULL,
  `datePosted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `title`, `description`, `categories`, `staffID`, `datePosted`) VALUES
(2, 'Second survey', 'A cool definitioin', 'Work|Home|Play', 1, '2020-08-12 10:13:06'),
(3, 'Meeting room ethics', 'To rate the different staff who use the meeting room(s)', 'Neatness|Etiquette|Sommethng else', 1, '2020-08-12 11:21:03'),
(4, 'Meeting room', 'Description', 'Time|Discussions|Presentations', 1, '2020-08-14 14:11:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itrequests`
--
ALTER TABLE `itrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendingstaff`
--
ALTER TABLE `pendingstaff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itrequests`
--
ALTER TABLE `itrequests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendingstaff`
--
ALTER TABLE `pendingstaff`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
