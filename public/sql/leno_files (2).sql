-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 11:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leno_files`
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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `type`, `size`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'LimBlog logo_02-04-23_08-54-27.png', 'image/png', 0.025999069213867, 1, '2023-04-02 19:54:27', '2023-04-02 19:54:27'),
(2, 'LimBlog logo_02-04-23_08-55-31.png', 'image/png', 0.025999069213867, 1, '2023-04-02 19:55:32', '2023-04-02 19:55:32'),
(3, 'LimStores logo 2_02-04-23_09-03-42.png', 'image/png', 0.014618873596191, 1, '2023-04-02 20:03:43', '2023-04-02 20:03:43'),
(4, '36_Admin_Roles_02-04-23_09-05-47.jpg', 'image/jpeg', 0.0027685165405273, 1, '2023-04-02 20:05:47', '2023-04-02 20:05:47'),
(7, 'taking-notes-icon-beautiful-meticulously-designed-taking-notes-icon-perfect-use-designing-developing-websites-printed-112019902_14-05-23_01-42-55.jpg', 'image/jpeg', 0.017185211181641, 2, '2023-05-14 12:42:55', '2023-05-14 12:42:55'),
(8, 'taking-notes-icon-beautiful-meticulously-designed-taking-notes-icon-perfect-use-designing-developing-websites-printed-112019902_14-05-23_01-56-56.jpg', 'image/jpeg', 0.017185211181641, 2, '2023-05-14 12:56:56', '2023-05-14 12:56:56'),
(9, 'taking-notes-icon-beautiful-meticulously-designed-taking-notes-icon-perfect-use-designing-developing-websites-printed-112019902_14-05-23_01-58-33.jpg', 'image/jpeg', 0.017185211181641, 2, '2023-05-14 12:58:33', '2023-05-14 12:58:33'),
(10, 'kisspng-video-player-computer-software-android-error-dialog-5ad129dd419ff0.1887879215236571812688_04-01-24_09-07-22.jpg', 'application/octet-stream', 0.058794975280762, 1, '2024-01-04 20:07:22', '2024-01-04 20:07:22'),
(11, 'Why-Cloud-Storage-is-Essential-for-Web-Developers-BLOG_04-01-24_09-23-36.png', 'application/octet-stream', 0.030014991760254, 1, '2024-01-04 20:23:36', '2024-01-04 20:23:36'),
(12, 'quiz-image_04-01-24_09-24-36.jpg', 'application/octet-stream', 0.076817512512207, 1, '2024-01-04 20:24:36', '2024-01-04 20:24:36'),
(13, 'taking-notes-icon-beautiful-meticulously-designed-taking-notes-icon-perfect-use-designing-developing-websites-printed-112019902_04-01-24_09-27-06.jpg', 'application/octet-stream', 0.017185211181641, 1, '2024-01-04 20:27:06', '2024-01-04 20:27:06'),
(14, 'quiz-image-2_04-01-24_09-32-54.png', 'application/octet-stream', 0.041339874267578, 1, '2024-01-04 20:32:54', '2024-01-04 20:32:54'),
(15, 'quiz-exam-icon-button-test-examination-1447937-pxhere.com_04-01-24_09-37-00.jpg', 'application/octet-stream', 0.87160110473633, 1, '2024-01-04 20:37:00', '2024-01-04 20:37:00'),
(16, 'Picture1_04-01-24_09-48-53.jpg', 'application/octet-stream', 0.023969650268555, 1, '2024-01-04 20:48:53', '2024-01-04 20:48:53'),
(17, 'istockphoto-1152567220-612x612_04-01-24_09-50-51.jpg', 'application/octet-stream', 0.025702476501465, 1, '2024-01-04 20:50:51', '2024-01-04 20:50:51'),
(18, 'LimBlog logo_04-01-24_09-52-12.png', 'application/octet-stream', 0.025999069213867, 1, '2024-01-04 20:52:12', '2024-01-04 20:52:12');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_11_220216_create_files_table', 1),
(6, '2023_03_15_183816_add_size_to_files_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 1, 'MyApp', '9a75d76e9c6bb00889084b71a56ee113a67667d1968b9d4637d5fdab89b30833', '[\"*\"]', '2024-01-04 22:20:50', '2023-11-21 15:40:40', '2024-01-04 22:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tochukwu', 'Uchem', 'uchemcolin@gmail.com', NULL, '$2y$10$UXwJodEpCE6kEhIC2UbHZOa.y7WRPZV/3AduaYcGrltAWXDWRL3j.', NULL, '2023-04-02 16:11:04', '2023-12-15 18:23:42'),
(2, 'Tochukwu', 'Uchem', 'colinuchem@gmail.com', NULL, '$2y$10$iQNFZVj2J4Mol6EKCh6AAOroY5Gq7sCadZBO3K2Kzui8B1xIoZjCa', NULL, '2023-05-14 12:33:52', '2023-05-14 16:50:06');

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
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_user_id_foreign` (`user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
