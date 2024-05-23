-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 12:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interiordesign`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `Id` int(50) NOT NULL,
  `Names` varchar(60) NOT NULL,
  `Date` date NOT NULL,
  `About` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`Id`, `Names`, `Date`, `About`) VALUES
(1, 'Rita kagabe', '2024-05-29', 'Hey we Like');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `Id` int(40) NOT NULL,
  `Names` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`Id`, `Names`, `Email`, `Password`) VALUES
(1, 'Gady', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `Id` int(56) NOT NULL,
  `Names` varchar(59) NOT NULL,
  `Dates` date NOT NULL,
  `About` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`Id`, `Names`, `Dates`, `About`) VALUES
(1, 'Hugues', '2024-05-10', 'My home saloon');

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE `designers` (
  `Id` int(60) NOT NULL,
  `Names` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Speciality` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designers`
--

INSERT INTO `designers` (`Id`, `Names`, `Email`, `Password`, `Speciality`) VALUES
(1, 'Gady', 'admin@gmail.com', '123', 'Residential design'),
(2, 'Mike', 'asdsadas@gmail.com', '1234', 'Commercial'),
(3, 'Mike dean', 'asdsadas@gmail.com', '123', 'Commercial'),
(4, 'Mike', 'asdsadas@gmail.com', '1234', 'Commercial'),
(5, 'Mike', 'asdsadas@gmail.com', '1234', 'Commercial'),
(6, 'Mike', 'asdsadas@gmail.com', '', 'Commercial'),
(7, 'Mike', 'asdsadas@gmail.com', '123', 'Commercial'),
(8, 'Mike', 'asdsadas@gmail.com', '', 'Commercial'),
(9, 'manullll', 'igihozogady2@gmail.com', 'bgvhjh', 'Commercial');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Id` int(11) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moodboard`
--

CREATE TABLE `moodboard` (
  `MoodBoardID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `ImageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moodboard`
--

INSERT INTO `moodboard` (`MoodBoardID`, `Name`, `Description`, `ImageURL`) VALUES
(2, 'Design', 'Residential', 'weee');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(50) NOT NULL,
  `Names` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Gender` varchar(87) NOT NULL,
  `Password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Names`, `Email`, `Gender`, `Password`) VALUES
(2, 'Mike dean', 'kkk@gmail.com', 'Female', ''),
(3, 'gady', 'gad@gmail.com', 'male', '123'),
(4, 'igihozo kaaa', 'igihozo11gady@gmail.com', '2fc4a68635c26db1019047965180ce1b', 'Student'),
(5, 'igihozo gady', 'igihozogady@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `moodboard`
--
ALTER TABLE `moodboard`
  ADD PRIMARY KEY (`MoodBoardID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `Id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `Id` int(56) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `Id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `moodboard`
--
ALTER TABLE `moodboard`
  MODIFY `MoodBoardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
