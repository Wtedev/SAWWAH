

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_database`
--

-- --------------------------------------------------------

--
-- بنية الجدول `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `weather_info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`weather_info`)),
  `image` varchar(255) DEFAULT NULL,
  `daily_budget` float DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `description`, `currency`, `weather_info`, `image`, `daily_budget`, `created_at`, `updated_at`) VALUES
(1, 'مصر', 'egypt', 'بلد في شمال إفريقيا', 'جنيه مصري', '{\"temp\": 25, \"condition\": \"مشمس\"}', 'path/to/egypt.jpg', 100, '2025-07-20 11:32:00', '2025-07-20 11:32:00'),
(2, 'السعودية', 'saudi-arabia', 'بلد في الشرق الأوسط', 'ريال سعودي', '{\"temp\": 38, \"condition\": \"حار\"}', 'path/to/saudi.jpg', 150, '2025-07-20 11:32:00', '2025-07-20 11:32:00'),
(3, 'الأردن', 'jordan', 'بلد في الشرق الأوسط', 'دينار أردن', '{\"temp\": 28, \"condition\": \"صافي\"}', 'path/to/jordan.jpg', 80, '2025-07-20 11:32:00', '2025-07-20 11:32:00'),
(4, 'المغرب', 'morocco', 'بلد في شمال إفريقيا', 'درهم مغربي', '{\"temp\": 22, \"condition\": \"غائم\"}', 'path/to/morocco.jpg', 90, '2025-07-20 11:32:00', '2025-07-20 11:32:00');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
