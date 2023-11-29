-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 02:29 PM
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
-- Database: `safe_helpp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `therapist_information`
--

CREATE TABLE `therapist_information` (
  `id` int(11) NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `therapist_name` varchar(255) NOT NULL,
  `therapist_email` varchar(255) NOT NULL,
  `therapist_phone` varchar(255) NOT NULL,
  `therapist_address` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist_information`
--

INSERT INTO `therapist_information` (`id`, `therapist_id`, `therapist_name`, `therapist_email`, `therapist_phone`, `therapist_address`, `date`) VALUES
(5, 'SH6544ae98d1b11', 'Susmita Bhowmik', 'bpddev8@gmail.com', '9076543210', 'kolkata', '2023-11-03'),
(6, 'SH6544bcb0f20a6', 'admin', 'admin@gmail.com', '1234567890', 'kolkata', '2023-11-03'),
(7, 'SH6544bdca4d8e1', 'madhu', 'info@betterhealthcafe', '0987654321', 'kolkata', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_profile`
--

CREATE TABLE `therapist_profile` (
  `id` int(11) NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `about_therapist` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `y_o_exp` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `category_therapy` varchar(255) NOT NULL,
  `therapist_specialty` varchar(255) NOT NULL,
  `christian_based_therapy` varchar(255) NOT NULL,
  `accepted_insurance` varchar(255) NOT NULL,
  `therapist_fees` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist_profile`
--

INSERT INTO `therapist_profile` (`id`, `therapist_id`, `profile_picture`, `designation`, `about_therapist`, `state`, `city`, `y_o_exp`, `language`, `category_therapy`, `therapist_specialty`, `christian_based_therapy`, `accepted_insurance`, `therapist_fees`, `date`) VALUES
(5, 'SH6544ae98d1b11', 'Images 01.jpg', 'developers', 'hell', 'Colorado', 'test', '3', 'bengali', '', 'test', '', '', '4000', '2023-11-03'),
(6, 'SH6544bcb0f20a6', 'academic.jpeg', 'designer', 'test', 'Alaska', 'test', '6', 'english', 'Couples Therapy', 'test', 'No', 'test', '4000', '2023-11-03'),
(7, 'SH6544bdca4d8e1', 'Untitled-4.jpg', 'xyz', 'test', 'Hawaii', 'test', '2', 'english,bengali', '', 'test', '', 'test', '4000', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_register`
--

CREATE TABLE `therapist_register` (
  `id` int(11) NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `register_username` varchar(255) NOT NULL,
  `register_email` varchar(255) NOT NULL,
  `register_pass` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist_register`
--

INSERT INTO `therapist_register` (`id`, `therapist_id`, `user_type`, `register_username`, `register_email`, `register_pass`, `date`) VALUES
(5, 'SH6544ae98d1b11', 'therapist', 'Susmita Bhowmik', 'bpddev8@gmail.com', '12345678', '2023-11-03'),
(6, 'SH6544bcb0f20a6', 'admin', 'admin', 'admin@gmail.com', '12345678', '2023-11-03'),
(7, 'SH6544bdca4d8e1', 'therapist', 'madhu', 'info@betterhealthcafe', '12345678', '2023-11-03');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_scheduled_session`
--

CREATE TABLE `therapist_scheduled_session` (
  `id` int(11) NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `session_title` varchar(255) NOT NULL,
  `therapist_name` varchar(255) NOT NULL,
  `therapist_email` varchar(255) NOT NULL,
  `therapist_phone` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `session_date` varchar(255) NOT NULL,
  `scheduled_time` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist_scheduled_session`
--

INSERT INTO `therapist_scheduled_session` (`id`, `therapist_id`, `session_title`, `therapist_name`, `therapist_email`, `therapist_phone`, `speciality`, `session_date`, `scheduled_time`, `date`) VALUES
(10, 'SH6544bcb0f20a6', 'abc', 'doctor', 'doc@gmail.com', '908765432', 'test', '2023-11-04', '15:54', '2023-11-06'),
(13, 'SH6544bcb0f20a6', 'test3', 'Mr. bag', 'bag@gmail.com', '8907654321', 'test3', '2023-11-02', '11:43', '2023-11-07'),
(16, 'SH6544bcb0f20a6', 'test2', 'Mr. s roy', 'roy@gmail.com', '908765432', 'test', '2023-11-03', '07:00', '2023-11-07'),
(24, 'SH6544bcb0f20a6', 'test', 'abc', 'abc@gmail.com', '6590564430', 'test', '2023-11-11', '15:08', '2023-11-07 10:37:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `therapist_information`
--
ALTER TABLE `therapist_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapist_profile`
--
ALTER TABLE `therapist_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapist_register`
--
ALTER TABLE `therapist_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapist_scheduled_session`
--
ALTER TABLE `therapist_scheduled_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `therapist_information`
--
ALTER TABLE `therapist_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `therapist_profile`
--
ALTER TABLE `therapist_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `therapist_register`
--
ALTER TABLE `therapist_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `therapist_scheduled_session`
--
ALTER TABLE `therapist_scheduled_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
