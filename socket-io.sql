-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 12:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socket-io`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_sessions`
--

CREATE TABLE `login_sessions` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `ip` varchar(512) NOT NULL,
  `session_id` varchar(512) NOT NULL,
  `device_token` varchar(512) DEFAULT NULL,
  `device_info` varchar(512) DEFAULT NULL,
  `browser_info` varchar(512) DEFAULT NULL,
  `last_seen` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_sessions`
--

INSERT INTO `login_sessions` (`id`, `user_id`, `ip`, `session_id`, `device_token`, `device_info`, `browser_info`, `last_seen`, `created_at`, `updated_at`) VALUES
(27, 2, '103.217.178.0', 'ahlC2sePYTirTvGtCQmyzUKBBZUkfSlIBwe7Ii4p', 'fAEGOyYzWGPADkzs7x4yRX:APA91bH7L-9xEQsgaQIhgArII5hVWMygsMO1I51O8pdcwWRJhp9xU8mTYqU0QHrZBLzgKd30TLQ9b-juIgVZfJC4jje-3CJRB4-Aa_QqIoYD3sWarfRaW_SkYP73dY65pv3I0q2FgxrX', 'Windows: Desktop', 'Browser Opera', '2023-06-07 15:52:57', '2023-06-07 13:08:25', '2023-06-07 15:52:57'),
(28, 2, '103.217.178.0', 'hJp9ci07qko4RheGOO1xEuiRT5aue26vFJdMCcM0', 'fhlpe5JRmtGtiD6XqX5GCW:APA91bHWP16xK7GYMrxu4T0fYtK7zEL3vy9PGyt8lwyn--n-uMJehN_pCry7nE0ZJM185Ug3KFCQUCwYK2HmkWqAb7Cwe4kIcoAYUO76f0-EOWGZ1Vt320XjpLhY9EttS14J0jgQDZqG', 'Windows: Desktop', 'Browser Chrome', '2023-06-07 14:42:04', '2023-06-07 13:09:59', '2023-06-07 14:42:04'),
(30, 2, '103.217.178.0', 'GIegTKZZ1gKrKL4PC5EvQ4gQjqa2npQObpLpSRkP', 'fAEGOyYzWGPADkzs7x4yRX:APA91bH7L-9xEQsgaQIhgArII5hVWMygsMO1I51O8pdcwWRJhp9xU8mTYqU0QHrZBLzgKd30TLQ9b-juIgVZfJC4jje-3CJRB4-Aa_QqIoYD3sWarfRaW_SkYP73dY65pv3I0q2FgxrX', 'Windows: Desktop', 'Browser Opera', '2023-06-08 17:15:33', '2023-06-08 16:00:17', '2023-06-08 17:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_06_04_164142_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GIegTKZZ1gKrKL4PC5EvQ4gQjqa2npQObpLpSRkP', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36 OPR/101.0.0.0 (Edition developer)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV0F2bEVqakljQnZCMmlhV1Nwcjg2RUR3REJMdW9nV2h5TjNLd3FIMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9teS1jaGF0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1686262533);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'chat/img/default-user-image.png',
  `phone` varchar(212) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_seen` timestamp NOT NULL DEFAULT current_timestamp(),
  `device_token` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `phone`, `bio`, `email_verified_at`, `password`, `last_seen`, `device_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'darpan', 'darpankhatri817@gmail.com', 'chat/img/default-user-image.png', NULL, NULL, NULL, '$2y$10$pGGph5GQ9erVcUrLFUw/l.x4uZb3ziO9lIUhY6fNn/0pcEi7nQcgq', '2023-06-07 12:49:13', 'c-IZq_4Ww_ytYBLER0KbYP:APA91bF544ABAQUF5GaImgLikjipm73BeDxKGuIGyqFHzUDcvtu5ysQn0mBfcyv9meuPeAlbVNb7bxfjkiVBrOX4TwQkq0Li8CAqEM0qFBCEn_WSogIpEmZeaXl34mAWGuVZj_sdhQUO', NULL, '2023-06-04 04:37:36', '2023-06-07 12:49:13'),
(2, 'Jesse Cherry', 'admin@project.com', 'chat/img/default-user-image.png', '+1 (688) 194-6256', 'Deleniti mollitia et', NULL, '$2y$10$dFkE.VD/375hHjIakO2xDOHoNckG6UzPTQcsW/18mXINcYgJM6cr6', '2023-06-08 17:15:33', NULL, NULL, '2023-06-05 03:30:19', '2023-06-08 17:15:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `login_sessions`
--
ALTER TABLE `login_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_sessions`
--
ALTER TABLE `login_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
