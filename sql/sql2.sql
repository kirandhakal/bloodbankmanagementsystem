-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2023 at 12:26 PM
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
-- Database: `bbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Full_name` varchar(100) NOT NULL,
  `User_name` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `Email`, `Full_name`, `User_name`, `Password`) VALUES
(66, 'admin@gmail.com', 'Administor', 'admin', '12345'),
(69, 'senijiky@mailinator.com', 'Camden Stanton', 'binety', 'Pa$$w0rd!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doner`
--

CREATE TABLE `tbl_doner` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `Phone_number` bigint(20) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Blood_type` varchar(20) NOT NULL,
  `Disease` varchar(100) NOT NULL,
  `Additional_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donerhistory`
--

CREATE TABLE `tbl_donerhistory` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `phone_number` bigint(11) NOT NULL,
  `age` int(11) NOT NULL,
  `reasonorunit` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_donerhistory`
--

INSERT INTO `tbl_donerhistory` (`id`, `userid`, `phone_number`, `age`, `reasonorunit`, `unit`, `blood_type`, `disease`, `action`) VALUES
(1, 11, 2147483647, 36, 'abc', 0, 'O+', '', 'deleted'),
(2, 11, 9813245623, 36, 'abc', 0, 'O+', '', 'deleted'),
(3, 11, 1, 61, 'abc', 0, 'O-', 'Duis aut et in sed u', 'deleted'),
(13, 11, 9813245623, 36, '5', 0, 'O+', '', 'accepted'),
(14, 0, 987462542, 15, '15', 0, 'A+', '', 'accepted'),
(15, 11, 7251491501, 15, '-', 15, 'B+', 'Enim enim neque nihi', 'accepted'),
(16, 0, 830, 99, '-', 15, 'A+', 'Et tempora do tempor', 'accepted'),
(17, 11, 350, 55, '-', 15, 'A-', 'Necessitatibus nisi ', 'accepted'),
(18, 11, 620, 59, '-', 15, 'B+', 'Harum voluptatem du', 'accepted'),
(19, 11, 973, 100, '-', 15, 'B-', 'Quisquam velit offic', 'accepted'),
(20, 11, 452, 24, '-', 15, 'O+', 'Quod ad nisi sapient', 'accepted'),
(21, 11, 314, 74, '-', 15, 'O+', 'Magnam cillum velit', 'accepted'),
(22, 11, 212, 52, '-', 15, 'O-', 'Ea maiores veniam l', 'accepted'),
(23, 11, 790, 86, '-', 15, 'AB+', 'Est consequatur Qui', 'accepted'),
(24, 11, 69, 68, '-', 15, 'AB-', 'Tempora quas qui eli', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Image_name` varchar(255) NOT NULL,
  `Date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_notice`
--

INSERT INTO `tbl_notice` (`id`, `Admin_id`, `Title`, `Image_name`, `Date`) VALUES
(10, 0, 'notice for blood donation camp	', 'Notice_663.jpg', '2023-09-30'),
(11, 0, 'rfqerfq', 'Notice_851.jpg', '2023-09-30'),
(12, 0, 'yueme', 'Notice_420.jpg', '2023-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Phone_Number` bigint(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Blood_Type` varchar(20) NOT NULL,
  `Required_Unit` int(11) NOT NULL,
  `Prescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`id`, `User_id`, `Phone_Number`, `Age`, `Blood_Type`, `Required_Unit`, `Prescription`) VALUES
(3, 18, 0, 15, 'B+', 6, 'Prescription_18_688.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patienthistory`
--

CREATE TABLE `tbl_patienthistory` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `age` int(11) NOT NULL,
  `blood_type` varchar(10) NOT NULL,
  `required_unit` int(11) NOT NULL,
  `prescription` text NOT NULL,
  `action` varchar(50) NOT NULL,
  `remarksorreason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_patienthistory`
--

INSERT INTO `tbl_patienthistory` (`id`, `userid`, `phone_number`, `age`, `blood_type`, `required_unit`, `prescription`, `action`, `remarksorreason`) VALUES
(2, 17, 9826114231, 23, 'A-', 5, 'Prescription_17_408.jpg', 'accepted', 'sadfa'),
(3, 16, 1, 21, 'O+', 77, 'Prescription_16_475.jpg', 'deleted', ''),
(4, 16, 134323423, 83, 'AB+', 62, 'Prescription_16_301.jpg', 'deleted', 'abc'),
(5, 11, 9823145673, 45, 'O-', 5, 'Prescription_11_972.jpg', 'accepted', ''),
(6, 11, 7251491501, 15, 'O-', 1, 'Prescription_11_403.jpg', 'accepted', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signup`
--

CREATE TABLE `tbl_signup` (
  `id` int(11) NOT NULL,
  `Full_name` varchar(50) NOT NULL,
  `User_name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_signup`
--

INSERT INTO `tbl_signup` (`id`, `Full_name`, `User_name`, `Email`, `Password`) VALUES
(11, 'suraj kandel', 'suraj123', 'suraj@gmail.com', '321'),
(12, 'Fitzgerald Olson', 'xugamyzow', 'qefywubedi@mailinator.com', 'Pa$$w0rd!'),
(13, 'Hoyt Brooks', 'xehihu', 'qohedifim@mailinator.com', 'Pa$$w0rd!'),
(14, 'Ray Wagner', 'vahaneryta', 'bobudegype@mailinator.com', 'Pa$$w0rd!'),
(15, 'Zahir Jackson', 'hajyberony', 'nawidusim@mailinator.com', 'Pa$$w0rd!'),
(16, 'sk', 'ss', 's@gmial.com', '1'),
(17, 'bimal shrestha', 'bimal123', 'bimal@gmail.com', '678'),
(18, 'kiran', 'kiran', 'kiran@gmailaa.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Full-Name` varchar(100) NOT NULL,
  `User-name` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_doner`
--
ALTER TABLE `tbl_doner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donerhistory`
--
ALTER TABLE `tbl_donerhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patienthistory`
--
ALTER TABLE `tbl_patienthistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_doner`
--
ALTER TABLE `tbl_doner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_donerhistory`
--
ALTER TABLE `tbl_donerhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_notice`
--
ALTER TABLE `tbl_notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_patienthistory`
--
ALTER TABLE `tbl_patienthistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
