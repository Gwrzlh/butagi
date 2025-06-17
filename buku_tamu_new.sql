-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 09:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buku_tamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `purpose` text NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `name`, `phone`, `institution`, `purpose`, `signature`, `user_id`, `photo`, `status`, `reason`, `created_at`) VALUES
(21, 'Doni', '087760928460', 'PT. ABC', 'Testing', '674fce1dacd8c.png', 7, '674fce1dad57a.png', 'pending', NULL, '2024-12-03 21:35:57'),
(22, 'Ai Sa\'adatuddaroin', '087760928460', 'TOEIC Indonesia', 'Koordinasi', '67500b45d8669.png', 5, '67500b45d94b5.png', 'pending', NULL, '2024-12-04 01:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `created_at`) VALUES
(1, 'Tata Usaha', '2024-11-25 03:37:16'),
(3, 'Kurikulum', '2024-11-25 07:49:54'),
(4, 'Kesiswaan', '2024-11-26 01:10:55'),
(12, 'Kepala Sekolah', '2024-11-28 06:46:58'),
(13, 'Humas', '2024-11-28 06:47:37'),
(16, 'SIM - Pengembang Aplikasi', '2024-12-02 06:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('superadmin','admin_ruangan') NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `room_id`, `created_at`) VALUES
(1, 'Administrator', 'superadmin', '$2y$10$66JsBwJhCuXVkFgxRPYgEu6dbysFhI1ziqApqEr62rAJiyKQlZ9nS', 'superadmin', NULL, '2024-11-25 05:50:50'),
(3, 'Ahmad Hakim Makarim', 'hakim', '$2y$10$0bNw5pSgIo/WkNOFRpbPGutgqnzBk0OiAMNgwLQ6PDKQBMEmjR7li', 'admin_ruangan', 1, '2024-11-25 07:55:25'),
(4, 'Aldy Agustiansyah', 'aldy', '$2y$10$66JsBwJhCuXVkFgxRPYgEu6dbysFhI1ziqApqEr62rAJiyKQlZ9nS', 'admin_ruangan', 1, '2024-11-26 01:12:57'),
(5, 'Deddy Hudaya, S.Si.', 'deddy', '$2y$10$QmyFWYcIZhC3Ow4eBAU5FuLu5Xe0WA3zpQldF0ePlmQWK5HFM0QQu', 'admin_ruangan', 13, '2024-11-28 06:54:58'),
(6, 'Cahya Ramdan Syah', 'sim', '$2y$10$qMrBRx63JJMaUfb1uHatweIWFcn2YsGVpceL1qDrVeWVFhknE1XSW', 'admin_ruangan', 16, '2024-12-02 07:04:02'),
(7, 'Rizal Suyaman, S.Kom.', 'rizal', '$2y$10$Iad/3if3HXP7puOMCNi.XuVZQaL2RBNZz2sgU.99fI/RX4.OnoNi6', 'admin_ruangan', 16, '2024-12-03 07:52:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
