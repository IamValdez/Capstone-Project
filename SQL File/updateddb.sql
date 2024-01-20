SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Table structure for table `tblappointment`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblappointment` (`ID`, `AppointmentNumber`, `Name`, `MobileNumber`, `Email`, `AppointmentDate`, `AppointmentTime`, `Specialization`, `Faculty`, `Message`, `ApplyDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 141561395, 'Saimon Nick Cleofas', 989, 'sncgmail.com', '2022-11-12', '12:41:00', '2', 2, 'Thanks', '2022-11-10 06:11:50', 'Cancelled due to incorrect mobile number', 'Cancelled', '2022-11-10 12:40:35');

-- Table structure for table `tblfaculty`
CREATE TABLE `tblfaculty` (
  `ID` int(5) NOT NULL,
  `user_ID` varchar(255) NOT NULL,
  `FullName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `yearLevel` varchar(100) NOT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 3,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Sem` varchar(100) NOT NULL,
  `Student_Status` varchar(250) DEFAULT NULL,
  `Faculty_Status` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblfaculty` (`ID`, `user_ID`, `FullName`, `MobileNumber`, `Email`, `yearLevel`, `Specialization`, `Password`, `role`, `CreationDate` ,`Sem`,`Student_Status`,`Faculty_Status`) VALUES
(5, 'AY2020-00343', 'Joe', 380173791, 'joe@gmail.com', '1', '5', '482c811da5d5b4bc6d497ffa98491e38', 1, '2023-12-05 09:21:28'),
(7, 'AY2020-00123', 'kane', 380173791, 'gelo12@gmail.com', '2', '3', '482c811da5d5b4bc6d497ffa98491e38', 3, '2023-12-05 10:12:39'),
(8, 'AY2020-00121', 'Kane Louie', 198308108, 'john@gmail.com', '2', '4', 'bee82d6a6e43584ec254d2d97cd0ac9f', 3, '2023-12-05 10:28:38'),
(9, 'AY2020-00122', 'Jenny Joe', 380173791, 'abc@gmail.com', '4', '7', '202cb962ac59075b964b07152d234b70', 3, '2023-12-05 10:42:53'),
(10, 'AY2020-00126', 'Kane', 198308108, 'abc3@gmail.com', '2', '5', '202cb962ac59075b964b07152d234b70', 3, '2023-12-05 13:00:24'),
(11, 'AY2020-00120', 'Jenny Joe', 380173791, 'john3@gmail.com', '2', '6', '202cb962ac59075b964b07152d234b70', 3, '2023-12-05 13:02:17'),
(12, 'AY2020-00129', 'Kane kana', NULL, 'abc77@gmail.com', '2', '7', '202cb962ac59075b964b07152d234b70', 3, '2023-12-05 13:11:19'),
(13, 'AY2020-08281', 'Kane Joe', NULL, 'ab123@gmail.com', '2', '7', '482c811da5d5b4bc6d497ffa98491e38', 3, '2023-12-06 04:15:31'),
(14, 'AY2020-09271', 'Kane Koe', NULL, 'kane0202@gmail.com', '3', '6', '482c811da5d5b4bc6d497ffa98491e38', 2, '2023-12-06 04:16:10');

-- Table structure for table `tblpage`
CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<div><font color=\"#202124\" face=\"arial, sans-serif\"><b>This system is only for the Faculty and Students of the college department in St. Vincent College of Cabuyao.</b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b><br></b></font></div><div><font color=\"#202124\" face=\"arial, sans-serif\"><b>This system will help address the concerns of students, such as school events, concerns, compliance activities, special projects, and so on. This system is a great help for the Faculty to professionally manage appointment requests from students and to avoid overlooking or ignoring the requests of the students towards the faculty.</b></font></div>', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', 'Brgy. Mamatid, City of Cabuyao, Laguna)', 'svcc@gmail.com', 7896541239, NULL, '6:15am to 8:00 pm');

-- Table structure for table `tblspecialization`
CREATE TABLE `tblspecialization` (
  `ID` int(5) NOT NULL,
  `Specialization` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblspecialization` (`ID`, `Specialization`, `CreationDate`) VALUES 
(1, 'Accountancy', '2022-11-09 14:22:33'),  
(2, 'Hospitality Management', '2022-11-09 14:24:42'), 
(3, 'Criminology', '2022-11-09 14:25:31'), 
(4, 'Education', '2022-11-09 14:25:52'), 
(5, 'Information Technology', '2022-11-09 14:27:18'), 
(6, 'Pyschology', '2022-11-09 14:27:52'), 
(7, 'Tourism', '2022-11-09 14:28:32'),
(8, 'Business Administrator', '2022-11-09 14:28:32');

-- Table structure for table `tblsubject`
CREATE TABLE `tblsubject` (
  `ID` int(5) NOT NULL,
  `Subject` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tblsubject` (`ID`, `Subject`, `CreationDate`) VALUES 
(1, 'Capstone', '2022-11-09 14:22:33'),  
(2, 'Software Engineering', '2022-11-09 14:24:42'), 
(3, 'System Analysis and Design', '2022-11-09 14:25:31'), 
(4, 'Networking', '2022-11-09 14:25:52'), 
(5, 'Art appreciation', '2022-11-09 14:27:18'), 
(6, 'Purposive Communication', '2022-11-09 14:27:52'), 
(7, 'Mathematics and the modern World', '2022-11-09 14:28:32'),
(8, 'ROTC', '2022-11-09 14:28:32');

-- Indexes and AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `tblappointment`
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblappointment`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- Indexes and AUTO_INCREMENT for table `tblfaculty`
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblfaculty`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

-- Indexes and AUTO_INCREMENT for table `tblpage`
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Indexes and AUTO_INCREMENT for table `tblspecialization`
ALTER TABLE `tblspecialization`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblspecialization`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

-- Indexes and AUTO_INCREMENT for table `tblsubject`
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tblsubject`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

COMMIT;
