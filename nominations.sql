-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 11:53 AM
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
-- Database: `nominations`
--

-- --------------------------------------------------------

--
-- Table structure for table `scoring`
--

CREATE TABLE `scoring` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reg_no` varchar(50) NOT NULL,
  `poly_name` varchar(100) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ic_no` varchar(20) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `session` varchar(50) NOT NULL,
  `advisor_name` varchar(100) NOT NULL,
  `hpnm` decimal(4,2) NOT NULL,
  `calculated_mark` decimal(5,2) NOT NULL,
  `org_program` varchar(255) NOT NULL,
  `calculate1_mark` decimal(5,2) NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `calculate2_mark` decimal(5,2) NOT NULL,
  `program_name3` varchar(255) NOT NULL,
  `calculate_k3_mark` decimal(5,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `uploaded_file` varchar(255) NOT NULL,
  `total_mark` decimal(5,2) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scoring`
--

INSERT INTO `scoring` (`id`, `name`, `created_at`, `reg_no`, `poly_name`, `dept_name`, `class`, `email`, `ic_no`, `phone_no`, `session`, `advisor_name`, `hpnm`, `calculated_mark`, `org_program`, `calculate1_mark`, `program_name`, `calculate2_mark`, `program_name3`, `calculate_k3_mark`, `image`, `uploaded_file`, `total_mark`, `status`) VALUES
(194, 'enxuan', '2024-11-02 10:04:25', '10DDT22F2024', 'Polytechnic Seberang Perai', 'JTMK', 'DDT5A', 'enxuan18@gmail.com', '123456789012', '0129229312', 'Sesi1 2024/2025', 'Puan Syima', 4.00, 40.00, 'Badminton', 10.00, 'Football', 20.00, 'AKJ', 30.00, '', '', 100.00, 'pending'),
(195, 'Wani', '2024-11-02 10:04:59', '10DDT22F2028', 'Polytechnic Seberang Perai', 'JTMK', 'DDT5A', 'abc@gmail.com', '123456789012', '0129229312', 'Sesi1 2024/2025', 'Puan Syima', 3.98, 39.80, 'Badminton', 10.00, 'Football', 20.00, 'AKJ', 30.00, '', '', 99.80, 'pending'),
(196, 'EKA', '2024-11-02 10:05:35', '10DDT22F2011', 'Polytechnic Seberang Perai', 'JTMK', 'DDT5A', 'jtmk@gmail.com', '123456789012', '0129229312', 'Sesi1 2024/2025', 'Puan Syima', 3.65, 36.50, 'Badminton', 3.00, 'Football', 15.00, 'AKJ', 15.00, '', '', 69.50, 'pending'),
(197, 'Minny lisa', '2024-11-02 10:06:18', '10DDT22F2008', 'Polytechnic Seberang Perai', 'JTMK', 'DDT5A', 'abc@gmail.com', '123456789012', '0129229312', 'Sesi1 2024/2025', 'Puan Syima', 2.55, 25.50, 'Badminton', 10.00, 'Football', 6.00, 'AKJ', 10.00, '', '', 51.50, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scoring`
--
ALTER TABLE `scoring`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scoring`
--
ALTER TABLE `scoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
