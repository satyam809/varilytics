-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2023 at 01:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `about` varchar(2000) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `about`, `updated_at`, `created_at`) VALUES
(4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. vikas pal</p>', '2023-01-12 11:32:15', '2023-01-12 11:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `card_number` bigint(20) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `card_details`
--

INSERT INTO `card_details` (`id`, `user_id`, `name`, `card_number`, `month`, `year`, `updated_at`, `created_at`) VALUES
(21, 20, 'Vikas', 768976547898, 12, 2022, '2023-01-11 09:59:34', '2023-01-11 09:59:34'),
(22, 19, 'Abhishek', 768976547898, 12, 2022, '2023-01-11 10:01:35', '2023-01-11 10:01:35'),
(24, 28, 'Abhishek', 76897, 12, 2022, '2023-01-11 11:33:10', '2023-01-11 11:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` int(11) NOT NULL,
  `conditions_value` varchar(2000) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `conditions_value`, `created_at`, `updated_at`) VALUES
(1, '<p style=\"text-align: justify;\"><strong>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</strong>, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.<strong><em>Raghu pal</em></strong></p>', '2023-01-13 05:49:24', '2023-01-13 05:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `privacy` varchar(2000) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `privacy`, `created_at`, `updated_at`) VALUES
(1, '<p style=\"text-align: justify;\"><strong>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</strong>, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.hgjhgjjhhjgjhgjhg</p>', '2023-01-13 10:59:10', '2023-01-13 10:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `emergency_contact` varchar(255) DEFAULT NULL,
  `otp` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `contact_number`, `location`, `emergency_contact`, `otp`, `image`, `updated_at`, `created_at`) VALUES
(18, 'admin', 'admin@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', '', 0, '', '2023-01-02 10:32:29', NULL),
(19, 'Abhishek', 'raghu@gmail.com', 'raghu1144', '12345678', '987654387345', 'Lucknow', '', 0, '', '2023-01-10 11:01:45', '2023-01-02 05:59:54'),
(20, 'Abhishek', 'raghu@gmail.com', 'raghu11445', '25d55ad283aa400af464c76d713c07ad', '9987654087', 'Lucknow', '', 7595, 'Satyam singh.png', '2023-01-10 11:34:05', '2023-01-02 06:04:28'),
(28, 'Abhishek', 'abhishek@gmail.com', 'abhi1144', '1343546546547', '9987654089', 'Lucknow', '9987654087', 9995, 'Satyam singh.png', '2023-01-10 11:31:44', '2023-01-05 07:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_no` bigint(20) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `chassis_no` varchar(500) DEFAULT NULL,
  `engine_name` varchar(255) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `model_name` varchar(255) DEFAULT NULL,
  `vehicle_class` varchar(255) DEFAULT NULL,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `owner_name`, `registration_no`, `registration_date`, `chassis_no`, `engine_name`, `fuel_type`, `model_name`, `vehicle_class`, `updated_at`, `created_at`) VALUES
(1, 'Raghu', 12345678, '2023-01-01', '767689', 'Eicher', 'Deisel', 'Ec2354', 'first', '', ''),
(2, 'Satyam singh', 654798347987, NULL, '324535345', 'xzvcxz', 'xcvxczvx', 'MH3RT56778G', 'First', '2023-01-02 10:08:30', '2023-01-02 09:10:00'),
(7, 'Shivam', 93437984354336, '2022-12-16', '63254532432', 'Suzuki', 'petrol', 'SZ3466365IUYERT', 'FIRST', '2023-01-02 10:14:19', '2023-01-02 10:14:19'),
(11, 'sdfsf', 435436, '2023-01-02', '5435325', 'dfsgs', 'dfgds', 'dfsd', 'dsfgs', '2023-01-03 12:22:00', '2023-01-03 12:22:00'),
(17, 'fdgfd', 435435, '2023-01-03', '4353', 'fdg', 'fdg', 'fdg', 'gfdg', '2023-01-04 06:37:33', '2023-01-04 06:37:33'),
(18, 'Raghvendra', 987654490, '2023-01-03', '87457473', 'Mahindra', 'petrol', 'M250987T', 'Third', '2023-01-04 07:07:14', '2023-01-04 07:07:14'),
(19, 'Faraz', 523553324, '2023-01-02', '098743535', 'Suzuki', 'Petrol', 'SZ766645HYT7', 'FIRST', '2023-01-04 11:47:34', '2023-01-04 11:47:34'),
(20, 'Mangesh Singh', 2133, '2023-01-13', '31213213', 'asdsad', 'asdasd', 'asd', 'sadasd32424', '2023-01-05 06:52:15', '2023-01-05 06:52:15'),
(21, 'Abhishek', 4354359888, '2023-01-04', '3432', 'Mahindra', 'Deisel', 'MH26TY67', 'FIRST', '2023-01-05 10:27:54', '2023-01-05 10:27:54'),
(22, 'Raghvendra pal', 66634854646, '2023-01-04', '4536546', 'THAR', 'Deisel', 'TH6549UY', 'SECOND', '2023-01-05 10:40:46', '2023-01-05 10:40:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `card_details`
--
ALTER TABLE `card_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
