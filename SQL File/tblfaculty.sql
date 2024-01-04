-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 05:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `famsmadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblfaculty`
--

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
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfaculty`
--

INSERT INTO `tblfaculty` (`ID`, `user_ID`, `FullName`, `MobileNumber`, `Email`, `yearLevel`, `Specialization`, `Password`, `role`, `CreationDate`) VALUES
(5, 'AY2020-00343', 'Joe', 380173791, 'joe@gmail.com', '1', '5', '482c811da5d5b4bc6d497ffa98491e38', 1, '2023-12-05 09:21:28'),
(7, 'AY2020-00123', 'kane', 380173791, 'gelo12@gmail.com', '2', '3', '482c811da5d5b4bc6d497ffa98491e38', 3, '2023-12-05 10:12:39'),
(8, 'AY2020-00121', 'Kane Louie', 198308108, 'john@gmail.com', '2', '4', 'bee82d6a6e43584ec254d2d97cd0ac9f', 3, '2023-12-05 10:28:38'),
(9, 'AY2020-00122', 'Jenny Joe', 380173791, 'abc@gmail.com', '4', '7', '202cb962ac59075b964b07152d234b70', 3, '2023-12-05 10:42:53'),
(10, 'AY2020-00126', 'Kane', 198308108, 'abc3@gmail.com', '2', '5', '202cb962ac59075b964b07152d234b70', 3, '2023-12-05 13:00:24'),
(11, 'AY2020-00120', 'Jenny Joe', 380173791, 'john3@gmail.com', '2', '6', '202cb962ac59075b964b07152d234b70', 3, '2023-12-05 13:02:17'),
(12, 'AY2020-00129', 'Kane kana', NULL, 'abc77@gmail.com', '2', '7', '202cb962ac59075b964b07152d234b70', 3, '2023-12-05 13:11:19'),
(13, 'AY2020-08281', 'Kane Joe', NULL, 'ab123@gmail.com', '2', '7', '482c811da5d5b4bc6d497ffa98491e38', 3, '2023-12-06 04:15:31'),
(14, 'AY2020-09271', 'Kane Koe', NULL, 'kane0202@gmail.com', '3', '6', '482c811da5d5b4bc6d497ffa98491e38', 2, '2023-12-06 04:16:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblfaculty`
--
ALTER TABLE `tblfaculty`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
