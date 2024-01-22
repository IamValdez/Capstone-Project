-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 02:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `famsmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `ID` int(10) NOT NULL,
  `AppointmentNumber` int(10) DEFAULT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `AppointmentTime` time DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Faculty` int(10) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`ID`, `AppointmentNumber`, `Name`, `MobileNumber`, `Email`, `AppointmentDate`, `AppointmentTime`, `Specialization`, `Faculty`, `Message`, `ApplyDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 141561395, 'Saimon Nick Cleofas', 989, 'sncgmail.com', '2022-11-12', '12:41:00', '2', 2, 'Thanks', '2022-11-10 06:11:50', 'Cancelled due to incorrect mobile number', 'Cancelled', '2022-11-10 12:40:35'),
(9, 970419258, 'Christian Jay G . Valdez', 907458409, 'cjvaldez152@gmail.com', '2024-01-21', '20:25:00', '5', 5, 'HELLO', '2024-01-20 09:25:53', 'asdasdasdasd', 'Approved', '2024-01-20 09:34:09'),
(10, 823271262, 'Roiner Imbang B.', 907458409, 'cjvaldez151@gmail.com', '2024-01-21', '17:49:00', '5', 8, 'HELLO', '2024-01-20 09:47:14', 'No, I\'m busy at that time, so can we reschedule or set a new appointment.', 'Approved', '2024-01-20 09:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

CREATE TABLE `tblfaculty` (
  `ID` int(5) NOT NULL,
  `user_ID` varchar(250) DEFAULT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `yearLevel` varchar(250) DEFAULT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Sem` varchar(250) DEFAULT NULL,
  `Student_Status` varchar(250) DEFAULT NULL,
  `Faculty_Status` varchar(250) DEFAULT NULL,
  `Subject` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`ID`, `user_ID`, `FullName`, `MobileNumber`, `Email`, `yearLevel`, `Specialization`, `Password`, `role`, `CreationDate`, `Sem`, `Student_Status`, `Faculty_Status`, `Subject`) VALUES
(6, 'valdez', 'Administrator', 907458409, 'admin@gmail.com', NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', '1', '2024-01-20 09:18:52', NULL, NULL, NULL, NULL),
(8, 'sabao@gmail.com', 'Jomarie Sabao', NULL, 'sabao@gmail.com', '2nd Year', '5', '9b5b3b21c861bcbbb860abf7d6b4cb7a', '2', '2024-01-20 09:38:17', '2nd Semester', NULL, 'Full-Time', 'Web Development'),
(9, 'AY2024-00001', 'Christian Jay G. Valdez', 907458409, 'cjvaldez152@gmail.com', '4th Year', '0', '629f931c902ce86fe0d890b7f9078516', '3', '2024-01-20 09:40:39', '2nd Semester', 'Irregular', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<div><font color=\"#202124\" face=\"arial, sans-serif\"><b>This system is only for the Faculty and Students of the college department in St. Vincent College of Cabuyao.</b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b><br></b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b>This system will help address the concerns of students, such as school events, concerns, compliance activities, special projects, and so on. This system is a great help for the Faculty to professionally manage appointment requests from students and to avoid overlooking or ignoring the requests of the students towards the faculty.\n</b></font></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'Brgy. Mamatid, City of Cabuyao, Laguna)', 'svcc@gmail.com', 7896541239, NULL, '6:15am to 8:00 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblspecialization`
--

CREATE TABLE `tblspecialization` (
  `ID` int(5) NOT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblspecialization`
--

INSERT INTO `tblspecialization` (`ID`, `Specialization`, `CreationDate`) VALUES
(1, 'Accountancy', '2022-11-09 14:22:33'),
(2, 'Hospitality Management', '2022-11-09 14:24:42'),
(3, 'Criminology', '2022-11-09 14:25:31'),
(4, 'Education', '2022-11-09 14:25:52'),
(5, 'Information Technology', '2022-11-09 14:27:18'),
(6, 'Pyschology', '2022-11-09 14:27:52'),
(7, 'Tourism', '2022-11-09 14:28:32'),
(8, 'Business Administrator', '2022-11-09 14:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `ID` int(250) NOT NULL,
  `Subject` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`ID`, `Subject`, `CreationDate`) VALUES
(1, 'Capstone ', '2024-01-22 09:09:49'),
(2, 'Software Engineering', '2024-01-23 09:09:49'),
(3, 'System Analysis and Design', '2024-01-23 09:09:49'),
(4, 'Networking', '2024-01-23 09:09:49'),
(5, 'Multimedia', '2024-01-25 09:09:49'),
(6, 'Web Development', '2024-01-24 09:09:49'),
(7, 'Physical Education', '2024-01-24 09:09:49'),
(8, 'Science Technology and Society', '2024-01-23 09:09:49'),
(9, 'Art Appreciation', '2024-01-27 09:09:49'),
(10, 'Mathematics and the Modern World', '2024-01-29 09:09:49'),
(11, 'Filipino', '2024-01-22 09:12:39'),
(12, 'Business Communication', '2024-01-22 09:12:39'),
(13, 'Purposive Communication', '2024-01-23 09:12:39'),
(14, 'System Administration', '2024-01-26 09:12:39'),
(15, 'ROTC ', '2024-01-26 09:12:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblspecialization`
--
ALTER TABLE `tblspecialization`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
