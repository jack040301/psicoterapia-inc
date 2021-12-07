-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 01:11 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psicoterapia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tble_doctors`
--

CREATE TABLE `tble_doctors` (
  `name` text NOT NULL,
  `profession` text NOT NULL,
  `time` text NOT NULL,
  `availability` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tble_doctors`
--

INSERT INTO `tble_doctors` (`name`, `profession`, `time`, `availability`) VALUES
('Jacqueline Porral', 'Depression', '9:00', 'Available'),
('Danica Cabullo', 'Depression', '5:00', 'Unavailable'),
('Demverleen Espinola', 'Depression', '9:00AM', 'Available'),
('Jeffrix Briol', 'Depression', '5:00PM', 'Unavailable'),
('Alex Caberto', 'Depression', '10:00AM', 'Available'),
('Nikki Baalan', 'Depression', '10:00AM', 'Available'),
('Danica Cabullo', 'Depression', '5:00', 'Unavailable'),
('Jacqueline Porral', 'Depression', '9:00', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appts`
--

CREATE TABLE `tbl_appts` (
  `apptID` text NOT NULL,
  `userID` text NOT NULL,
  `docID` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `apptDateCreated` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appts`
--

INSERT INTO `tbl_appts` (`apptID`, `userID`, `docID`, `date`, `time`, `status`, `apptDateCreated`) VALUES
('1', '3', '1', '2021-12-06', '13:00:00', 'expired', '12-05-2021'),
('2', '3', '2', '2021-12-08', '14:00:00', 'pending', '12-05-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `companyname1` text DEFAULT NULL,
  `companyname2` varchar(255) DEFAULT NULL,
  `companyname3` varchar(255) DEFAULT NULL,
  `companylogo` text NOT NULL,
  `organization` varchar(255) NOT NULL,
  `establish` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`id`, `companyname1`, `companyname2`, `companyname3`, `companylogo`, `organization`, `establish`, `mobile`, `email`) VALUES
(1, 'psico', 'terapia', NULL, 'logo.png', 'incorporation', '2021-11-25', '9210531673', 'psicoterapiainc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctorstime`
--

CREATE TABLE `tbl_doctorstime` (
  `time_id` int(11) NOT NULL,
  `time_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctorstime`
--

INSERT INTO `tbl_doctorstime` (`time_id`, `time_description`) VALUES
(1, '9:00 AM'),
(2, '10:00 AM'),
(3, '1:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `picture` text DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `time` time DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempomail` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `picture`, `lastname`, `firstname`, `birthday`, `position`, `time`, `start_date`, `end_date`, `mobile`, `email`, `tempomail`, `password`, `code`, `status`, `created`) VALUES
(1, 'IMG-61a88ecab78eb7.69831696.jpg', 'vachiravit', 'paisarnkulwong', '1996-08-31', 'doctor', '13:00:00', '2021-12-04', '2021-12-11', '09123456789', 'august@gmail.com', NULL, '$2y$10$myVWRV15xZ/JfVRyMrjcUOCMGPfM4UgG1U2dbT2k5kr.Zux2Hol2S', 0, 'online', '2021-11-25'),
(2, 'IMG-61a8901deddae5.15413575.jpg', 'thanasrivanitchai', 'pakorn', '1992-10-08', 'doctor', '14:00:00', '2021-12-04', '2021-12-31', '09123456789', 'pakorn@gmail.com', 'pakorn@gmail.com', '$2y$10$vNJX3cb7o3P9CMwNlXGGf.4SRkTqAehFoFvxwlUqw5Rzok27DySdG', 0, 'online', '2021-11-25'),
(3, 'IMG-61a8953669f545.40667264.jpg', 'watthanasetsiri', 'pirapat', '1994-02-23', 'moderator', '09:00:00', '2021-11-29', '2021-12-13', '09123456789', 'pirapat@gmail.com', 'pirapat@gmail.com', '$2y$10$9cEWO91zYw6cRIYNgzMuZej289T1RJKVMNCsVJjBH7XL7s5Np4FKm', 0, 'online', '2021-11-26'),
(4, 'profile.png', 'cabullo', 'danica', '2001-03-04', 'doctor', '13:00:00', '2021-12-10', '2021-12-11', '0909090909', 'danicacabullo@gmail.com', NULL, '$2y$10$HL/5p0hNqZuBbL2fpdDJ/OjEHoZmu7iIPgAhUTCFHtu4Z84wYaiNu', 0, 'online', '2021-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_superadmin`
--

CREATE TABLE `tbl_superadmin` (
  `id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempomail` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `birthday` date NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_superadmin`
--

INSERT INTO `tbl_superadmin` (`id`, `picture`, `lastname`, `firstname`, `mobile`, `email`, `tempomail`, `password`, `code`, `status`, `birthday`, `created`) VALUES
(1, 'IMG-61a88070367c73.59954235.jpg', 'pawat', 'chittsawangdee', '09685407802', 'jacquelineporral28@gmail.com', '', '$2a$12$EKhjL4szocORrb0JnNdktOcvmAic87wuiS9eYsREUnRuml7r507tS', 0, 'online', '2000-03-22', '2021-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time`
--

CREATE TABLE `tbl_time` (
  `id` int(11) NOT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_time`
--

INSERT INTO `tbl_time` (`id`, `time`) VALUES
(1, '09:00:00'),
(2, '10:00:00'),
(3, '11:00:00'),
(4, '13:00:00'),
(5, '14:00:00'),
(6, '15:00:00'),
(7, '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccount`
--

CREATE TABLE `tbl_useraccount` (
  `userID` text NOT NULL,
  `userImage` text NOT NULL,
  `userGivenName` text NOT NULL,
  `userSurname` text NOT NULL,
  `userFullname` text NOT NULL,
  `userUsername` text NOT NULL,
  `userContactNumber` text NOT NULL,
  `userAddress` text NOT NULL,
  `userBirthday` text NOT NULL,
  `userAge` text NOT NULL,
  `userEmail` text NOT NULL,
  `userPassword` text NOT NULL,
  `userCode` text NOT NULL,
  `userFPCode` text NOT NULL,
  `userStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_useraccount`
--

INSERT INTO `tbl_useraccount` (`userID`, `userImage`, `userGivenName`, `userSurname`, `userFullname`, `userUsername`, `userContactNumber`, `userAddress`, `userBirthday`, `userAge`, `userEmail`, `userPassword`, `userCode`, `userFPCode`, `userStatus`) VALUES
('1', '', 'Dem', 'ROvira', 'Dem ROvira', 'leonida', '09673222205', 'BLOCK 39 LOT 15', '1997-01-28', '24', 'demverleenespinola07@gmail.com', 'spM4Gpog', '0', '0', 'verified'),
('2', '', 'DEMVERLEEN', 'ESPINOLA', 'DEMVERLEEN ESPINOLA', 'DEM', '09673522220', 'CALOOCAN CITY', '1999-10-07', '22', 'espinola.demverleen.bscs2019@gmail.com', '4tJvStt3a9X1w/M5', '0', '0', 'verified'),
('3', 'uploads/default.png', 'DEM', 'ESPINOLA', 'DEM ESPINOLA', 'ASD', '09673222205', 'CALOOCAN CITY', '1999-10-07', '22', 'espinola.demverleen@gmail.com', 'spM4', '0', '0', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_doctorstime`
--
ALTER TABLE `tbl_doctorstime`
  ADD PRIMARY KEY (`time_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
