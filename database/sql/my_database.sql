-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 06:47 PM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `currency_rate` float NOT NULL,
  `weather_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`weather_info`)),
  `image` varchar(255) DEFAULT NULL,
  `daily_budget` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `description`, `currency`, `currency_rate`, `weather_info`, `image`, `daily_budget`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 'egypt', 'بلد في شمال إفريقيا', 'جنيه مصري', 30.5, '{\"temp\": 25, \"condition\": \"sunny\"}', 'path/to/egypt.jpg', 100, '2025-07-20 11:32:00', '2025-07-20 11:32:00'),
(2, 'السعودية', 'saudi-arabia', 'بلد في الشرق الأوسط', 'ريال سعودي', 3.75, '{\"temp\": 38, \"condition\": \"hot\"}', 'path/to/saudi.jpg', 150, '2025-07-20 11:32:00', '2025-07-20 11:32:00'),
(3, 'الأردن', 'jordan', 'بلد في الشرق الأوسط', 'دينار أردن', 0.71, '{\"temp\": 28, \"condition\": \"clear\"}', 'path/to/jordan.jpg', 80, '2025-07-20 11:32:00', '2025-07-20 11:32:00'),
(4, 'المغرب', 'morocco', 'بلد في شمال إفريقيا', 'درهم مغربي', 10, '{\"temp\": 22, \"condition\": \"cloudy\"}', 'path/to/morocco.jpg', 90, '2025-07-20 11:32:00', '2025-07-20 11:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `country_id`, `title`, `description`, `date`, `location`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'مهرجان الصيف', 'حدث ثقافي رائع', '2025-07-25', 'القاهرة', 'path/to/event1.jpg', '2025-07-20 11:38:00', '2025-07-20 11:38:00'),
(2, 2, 'معرض الفن', 'معرض للفنانين المحليين', '2025-08-01', 'الرياض', 'path/to/event2.jpg', '2025-07-20 11:38:00', '2025-07-20 11:38:00'),
(3, 3, 'يوم التراث', 'احتفال بالتراث الشعبي', '2025-07-30', 'عمان', 'path/to/event3.jpg', '2025-07-20 11:38:00', '2025-07-20 11:38:00'),
(4, 4, 'مهرجان الأفلام', 'عرض أفلام دولية', '2025-08-05', 'الدار البيضاء', 'path/to/event4.jpg', '2025-07-20 11:38:00', '2025-07-20 11:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion_logs`
--

CREATE TABLE `suggestion_logs` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `result` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`result`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestion_logs`
--

INSERT INTO `suggestion_logs` (`id`, `user_id`, `data`, `result`, `created_at`) VALUES
(1, 1, '{\"suggestion\": \"زيارة المتحف\"}', '{\"status\": \"accepted\"}', '2025-07-20 11:42:00'),
(2, NULL, '{\"suggestion\": \"تجربة مطعم\"}', '{\"status\": \"pending\"}', '2025-07-20 11:42:00'),
(3, 2, '{\"suggestion\": \"رحلة برية\"}', '{\"status\": \"rejected\"}', '2025-07-20 11:42:00'),
(4, 3, '{\"suggestion\": \"زيارة شاطئ\"}', '{\"status\": \"accepted\"}', '2025-07-20 11:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `user_id`, `country_id`, `start_date`, `end_date`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-07-25', '2025-07-30', 'احتياجات السفر: جواز سفر', '2025-07-20 11:40:00', '2025-07-20 11:40:00'),
(2, 2, 2, '2025-08-01', '2025-08-05', 'فنادق محجوزة', '2025-07-20 11:40:00', '2025-07-20 11:40:00'),
(3, 3, 3, '2025-07-28', '2025-08-02', 'تحقق من الطقس', '2025-07-20 11:40:00', '2025-07-20 11:40:00'),
(4, 4, 4, '2025-08-03', '2025-08-07', 'احتياطيات مالية', '2025-07-20 11:40:00', '2025-07-20 11:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `currency_preference` varchar(10) DEFAULT NULL,
  `weather_city` varchar(255) DEFAULT NULL,
  `country_preference` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `currency_preference`, `weather_city`, `country_preference`, `created_at`, `updated_at`) VALUES
(1, 'أحمد', 'ahmed@example.com', 'hashed_password123', 1, 'USD', 'القاهرة', 'مصر', '2025-07-20 11:35:00', '2025-07-20 11:35:00'),
(2, 'سارة', 'sara@example.com', 'hashed_password456', 0, 'EUR', 'الرياض', 'السعودية', '2025-07-20 11:35:00', '2025-07-20 11:35:00'),
(3, 'محمد', 'mohamed@example.com', 'hashed_password789', 1, NULL, NULL, NULL, '2025-07-20 11:35:00', '2025-07-20 11:35:00'),
(4, 'فاطمة', 'fatima@example.com', 'hashed_password101', 0, 'GBP', 'الدار البيضاء', 'المغرب', '2025-07-20 11:35:00', '2025-07-20 11:35:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `suggestion_logs`
--
ALTER TABLE `suggestion_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suggestion_logs`
--
ALTER TABLE `suggestion_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suggestion_logs`
--
ALTER TABLE `suggestion_logs`
  ADD CONSTRAINT `suggestion_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
