-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 08:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `consultation_id` int(10) NOT NULL,
  `cough` varchar(20) DEFAULT NULL,
  `cough_days` smallint(3) DEFAULT NULL,
  `vomiting` varchar(20) DEFAULT NULL,
  `vomiting_days` smallint(3) DEFAULT NULL,
  `colds` varchar(20) DEFAULT NULL,
  `colds_days` smallint(3) DEFAULT NULL,
  `abd` varchar(20) DEFAULT NULL,
  `abd_days` smallint(3) DEFAULT NULL,
  `fever` varchar(20) DEFAULT NULL,
  `fever_days` varchar(3) DEFAULT NULL,
  `headache` varchar(20) DEFAULT NULL,
  `headache_days` smallint(3) DEFAULT NULL,
  `diarrhea` varchar(20) DEFAULT NULL,
  `dirrhea_days` smallint(3) DEFAULT NULL,
  `pain` varchar(20) DEFAULT NULL,
  `pain_days` smallint(3) DEFAULT NULL,
  `swelling` varchar(20) DEFAULT NULL,
  `swelling_days` smallint(3) DEFAULT NULL,
  `allergies` varchar(20) DEFAULT NULL,
  `allergies_days` smallint(3) DEFAULT NULL,
  `others_complain_check` varchar(25) DEFAULT NULL,
  `others_complain_text` text,
  `personal_info_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family_history`
--

CREATE TABLE `family_history` (
  `family_history_id` int(10) NOT NULL,
  `asthma` varchar(10) DEFAULT NULL,
  `dm` varchar(10) DEFAULT NULL,
  `hpn` varchar(10) DEFAULT NULL,
  `ca` varchar(10) DEFAULT NULL,
  `others_family_history_check` varchar(20) DEFAULT NULL,
  `others_family_history_text` text,
  `past_medical_file` varchar(255) DEFAULT NULL,
  `additional_past_medical` text,
  `personal_info_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `personal_info_id` int(10) NOT NULL,
  `first_name` varchar(500) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(500) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `complete_address` longtext NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `mother_age` int(11) NOT NULL,
  `mother_occupation` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `father_age` int(11) NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `date_archived` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_exam`
--

CREATE TABLE `physical_exam` (
  `physical_exam_id` int(10) NOT NULL,
  `bp` varchar(255) NOT NULL,
  `temp` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `physical_exam` text,
  `assessment` text NOT NULL,
  `personal_info_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(10) NOT NULL,
  `antibiotics` varchar(50) DEFAULT NULL,
  `antihistamine` varchar(50) DEFAULT NULL,
  `antipyretic` varchar(50) DEFAULT NULL,
  `clarithromycin` varchar(50) DEFAULT NULL,
  `multivitamins` varchar(50) DEFAULT NULL,
  `others_prescription_check` varchar(50) DEFAULT NULL,
  `others_prescription_text` text,
  `other_last` text,
  `personal_info_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_position`
--

CREATE TABLE `user_position` (
  `position_id` int(10) NOT NULL,
  `name` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`consultation_id`),
  ADD UNIQUE KEY `personal_info_id_2` (`personal_info_id`);

--
-- Indexes for table `family_history`
--
ALTER TABLE `family_history`
  ADD PRIMARY KEY (`family_history_id`),
  ADD UNIQUE KEY `personal_info_id` (`personal_info_id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`personal_info_id`);

--
-- Indexes for table `physical_exam`
--
ALTER TABLE `physical_exam`
  ADD PRIMARY KEY (`physical_exam_id`),
  ADD UNIQUE KEY `personal_info_id` (`personal_info_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`),
  ADD UNIQUE KEY `personal_info_id` (`personal_info_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `user_position`
--
ALTER TABLE `user_position`
  ADD PRIMARY KEY (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `consultation_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_history`
--
ALTER TABLE `family_history`
  MODIFY `family_history_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `personal_info_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physical_exam`
--
ALTER TABLE `physical_exam`
  MODIFY `physical_exam_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_position`
--
ALTER TABLE `user_position`
  MODIFY `position_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
