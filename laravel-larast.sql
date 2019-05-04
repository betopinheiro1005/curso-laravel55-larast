-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2019 at 04:14 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-larast`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Família', '2019-05-02 09:23:46', '2019-05-02 09:23:46'),
(2, 'Trabalho', '2019-05-02 09:23:20', '2019-05-02 09:23:20');

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
(3, '2019_04_19_071011_create_notes_table', 1),
(4, '2019_04_19_080304_add_user_id_column_to_notes_table', 1),
(5, '2019_04_28_015155_create_groups_table', 1),
(6, '2019_04_28_020913_add_group_id_to_note_tables', 1),
(7, '2019_05_02_042334_add_cpf_to_users_table', 1),
(8, '2019_05_02_073112_add_user_to_notes_table', 1),
(9, '2019_05_03_024213_add_paid_field_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `important` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `group_id`, `user_id`, `title`, `body`, `important`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Anotação 1', 'Descrição da anotação 1', 1, '2019-05-02 11:34:07', '2019-05-03 11:26:56'),
(2, 1, 1, 'Anotação 2', 'Descrição da anotação 2', 0, '2019-05-02 11:46:01', '2019-05-03 10:06:32'),
(3, 2, 1, 'Anotação 3', 'Descrição da anotação 3', 1, '2019-05-02 12:03:18', '2019-05-03 10:03:48'),
(4, NULL, 2, 'Anotação de Ricardo', 'Descrição da anotação de Ricardo', 1, '2019-05-02 12:19:47', '2019-05-03 11:21:51'),
(5, 1, 2, 'Outra anotação de Ricardo', 'Esta é uma outra anotação de Ricardo', 1, '2019-05-03 11:28:59', '2019-05-03 11:41:56'),
(6, NULL, 1, 'Frutas', 'Maçã\r\nBanana\r\nMelancia\r\nPera\r\nUva\r\nLaranja\r\nPêssego\r\nGoiaba\r\nMelão\r\nMamão\r\nLimão\r\nCereja\r\nMorango\r\nAbacate\r\nAmora\r\nAmeixa', 1, '2019-05-03 11:32:11', '2019-05-04 07:09:22');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cpf`, `paid`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Roberto Pinheiro', '78557628099', 1, 'betopinheiro1005@yahoo.com.br', '$2y$10$OhjqvDNPt1n4KbDnSt.hJORlqCWjtv12uTOjkFi0poFmjw7pN4S9m', 'm6LkeLalSLZxbktXu3kA7cgU5Mt0Zw9rrlGJNVY6NJhsb7UuSIv9K2cHalSz', '2019-05-02 10:58:11', '2019-05-02 10:58:11'),
(2, 'Ricardo Souza', '44932324049', 1, 'ricardosouza@gmail.com', '$2y$10$sKzmhad7wqzBpXXhf/aAl.X6Pcai0qx42BVLuFe3n4HSLCfmYdB3q', 'RCDCZ6oH6veVHhLBUF3BQ5IJ3y9gm7rE6hfZXCxO8WATAzVIaCkrKokN2Jr0', '2019-05-02 12:16:45', '2019-05-02 12:16:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_group_id_foreign` (`group_id`),
  ADD KEY `notes_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
