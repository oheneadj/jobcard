-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2023 at 02:12 AM
-- Server version: 10.11.2-MariaDB-1
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `device` varchar(20) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `created_by` varchar(225) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `device`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(3, 'HP', '12', '2023-03-27 16:10:10.777915', NULL, NULL, NULL),
(4, 'DELL', '12', '2023-03-27 16:10:40.595120', NULL, NULL, NULL),
(5, 'ACER', '12', '2023-03-27 16:11:20.135228', NULL, NULL, NULL),
(6, 'APPLE', '12', '2023-03-27 16:11:55.725305', NULL, NULL, NULL),
(7, 'TECNO', '13', '2023-03-27 18:22:59.189632', '109807a5102e2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `company_name` varchar(225) NOT NULL,
  `company_phone_number` varchar(225) NOT NULL,
  `company_address` varchar(225) DEFAULT NULL,
  `company_email` varchar(225) DEFAULT NULL,
  `company_website` varchar(225) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL,
  `created_by` varchar(225) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `created_by` varchar(225) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(10, 'Console', 'console.jpeg', '2023-03-26 22:48:23.246734', NULL, NULL, NULL),
(11, 'Desktop', 'desktop.jpg', '2023-03-26 22:48:41.032262', NULL, NULL, NULL),
(12, 'Laptop', 'laptop.jpg', '2023-03-26 22:49:51.855483', NULL, NULL, NULL),
(13, 'Mobile Phone', 'mobile-phone.jpeg', '2023-03-26 22:50:12.901179', NULL, NULL, NULL),
(14, 'Play Station', 'console.jpeg', '2023-03-27 16:08:50.183534', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobcard`
--

CREATE TABLE `jobcard` (
  `id` int(200) NOT NULL,
  `job_id` varchar(225) NOT NULL,
  `brand_id` int(10) DEFAULT NULL,
  `model_id` int(1) DEFAULT NULL,
  `device_type` int(1) DEFAULT NULL,
  `issue` varchar(225) NOT NULL,
  `serial_number` varchar(225) NOT NULL,
  `imei` varchar(225) DEFAULT NULL,
  `owner_name` varchar(225) NOT NULL,
  `owner_phone_number` varchar(225) NOT NULL,
  `owner_address` varchar(225) NOT NULL,
  `job_status` varchar(225) NOT NULL DEFAULT '0',
  `date_issued` date NOT NULL,
  `date_taken` varchar(6) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL,
  `created_by` varchar(225) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(10) NOT NULL,
  `brand` int(10) NOT NULL,
  `model_name` varchar(225) NOT NULL,
  `model_number` varchar(225) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `created_by` varchar(225) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `brand`, `model_name`, `model_number`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 3, 'ENVY', '360', '2023-03-27 17:05:06.579244', NULL, NULL, NULL),
(2, 4, 'INSPIRON', 'VPRO 12', '2023-03-27 17:26:45.201818', NULL, NULL, NULL),
(3, 6, 'MACBOOK PRO', '2011 M1', '2023-03-27 18:30:28.795209', '109807a5102e2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `uuid` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` int(10) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `created_by` varchar(225) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `password`, `user_type`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '109807a5102e2', 'Ohene Adjei', 'nanajaam@gmail.com', '$2y$10$anhqW8jiP9JEN97PwU/Uau00gS6hJFIUxhsdETFnMQSPsaeEqseJa', 1, '2023-03-26 02:07:27.792152', NULL, NULL, NULL),
(4, '604ea7b1abe0a', 'Joyce Adwoa Boaduwaa', 'joyce@gmail.com', '$2y$10$GQBcdzacpDLgSVqyp1j6OOlmWJ.NkIleoR5wDuzEergB4D6nVEx7m', 2, '2023-03-27 18:07:40.275699', '109807a5102e2', 'Thu March 30, 2023, 2:49 am', '109807a5102e2'),
(5, 'c257b0bb2304c', 'Richard Amoah', 'rich@gmail.com', '$2y$10$dKulwCDWGTZ92rKUDt9qQ.1KZ.uZ77os5183KhowOwi.rqU9.9GYG', 1, '2023-03-27 18:18:19.889163', '109807a5102e2', NULL, NULL),
(7, '2065ea8fc2ff9', 'Akosua Diana ', 'akos@gmail.com', '$2y$10$JTEUXxHuvwgBfD5vRMmCi.3FdqWlWhu0llKA1unExuctJTahmQd0W', 2, '2023-03-30 03:21:46.768310', '109807a5102e2', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobcard`
--
ALTER TABLE `jobcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobcard`
--
ALTER TABLE `jobcard`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
