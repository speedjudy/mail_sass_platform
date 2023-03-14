-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2023 at 03:35 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `officedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `workspace_id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Raviv installed CloudOffice', '2023-02-28 09:28:39', '2023-02-28 09:28:39'),
(2, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 09:28:54', '2023-02-28 09:28:54'),
(3, 1, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 09:31:40', '2023-02-28 09:31:40'),
(4, 0, 0, 'Failed to login with email:rathwene@buxmail.com', '2023-02-28 09:41:42', '2023-02-28 09:41:42'),
(5, 1, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 09:45:20', '2023-02-28 09:45:20'),
(6, 1, 1, 'User updated: dev dev', '2023-02-28 10:45:30', '2023-02-28 10:45:30'),
(7, 2, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 10:48:32', '2023-02-28 10:48:32'),
(8, 1, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 10:55:09', '2023-02-28 10:55:09'),
(9, 1, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 11:26:33', '2023-02-28 11:26:33'),
(10, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 12:16:22', '2023-02-28 12:16:22'),
(11, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 14:35:16', '2023-02-28 14:35:16'),
(12, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 14:53:30', '2023-02-28 14:53:30'),
(13, 1, 3, 'Logged in with email:dev1@mailbux.com', '2023-02-28 18:00:15', '2023-02-28 18:00:15'),
(14, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-02-28 18:02:16', '2023-02-28 18:02:16'),
(15, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-02-28 18:03:42', '2023-02-28 18:03:42'),
(16, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 18:09:06', '2023-02-28 18:09:06'),
(17, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-02-28 18:41:07', '2023-02-28 18:41:07'),
(18, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-02-28 18:42:03', '2023-02-28 18:42:03'),
(19, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-02-28 18:43:53', '2023-02-28 18:43:53'),
(20, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-02-28 23:38:24', '2023-02-28 23:38:24'),
(21, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-01 09:10:33', '2023-03-01 09:10:33'),
(22, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-01 13:37:53', '2023-03-01 13:37:53'),
(23, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-01 17:58:18', '2023-03-01 17:58:18'),
(24, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-01 17:58:55', '2023-03-01 17:58:55'),
(25, 0, 0, 'Failed to login with email:vincent.hung@cashdirectpay.com', '2023-03-02 09:29:36', '2023-03-02 09:29:36'),
(26, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-02 09:35:36', '2023-03-02 09:35:36'),
(27, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-02 11:55:10', '2023-03-02 11:55:10'),
(28, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-02 15:50:45', '2023-03-02 15:50:45'),
(29, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-03-02 17:24:24', '2023-03-02 17:24:24'),
(30, 2, 2, 'Logged in with email:dev@mailbux.com', '2023-03-02 17:26:58', '2023-03-02 17:26:58'),
(31, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-02 19:26:19', '2023-03-02 19:26:19'),
(32, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-03 14:25:09', '2023-03-03 14:25:09'),
(33, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-04 17:12:56', '2023-03-04 17:12:56'),
(34, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-04 18:24:53', '2023-03-04 18:24:53'),
(35, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-06 06:49:36', '2023-03-06 06:49:36'),
(36, 1, 1, 'User updated: dev dev', '2023-03-06 06:50:01', '2023-03-06 06:50:01'),
(37, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-06 12:38:09', '2023-03-06 12:38:09'),
(38, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-03-06 14:06:40', '2023-03-06 14:06:40'),
(39, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-06 14:06:58', '2023-03-06 14:06:58'),
(40, 1, 1, 'User updated: Raviv Golov', '2023-03-06 14:07:22', '2023-03-06 14:07:22'),
(41, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-07 08:24:39', '2023-03-07 08:24:39'),
(42, 1, 1, 'User updated: dev dev', '2023-03-07 08:25:07', '2023-03-07 08:25:07'),
(43, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-07 08:25:51', '2023-03-07 08:25:51'),
(44, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-07 08:26:12', '2023-03-07 08:26:12'),
(45, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-07 09:06:10', '2023-03-07 09:06:10'),
(46, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-07 09:24:32', '2023-03-07 09:24:32'),
(47, 0, 0, 'Failed to login with email:test@gmail.com', '2023-03-07 09:28:04', '2023-03-07 09:28:04'),
(48, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-07 09:57:17', '2023-03-07 09:57:17'),
(49, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-03-07 11:29:01', '2023-03-07 11:29:01'),
(50, 2, 3, 'Logged in with email:dev1@mailbux.com', '2023-03-07 11:40:46', '2023-03-07 11:40:46'),
(51, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-03-07 11:52:11', '2023-03-07 11:52:11'),
(52, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-07 12:36:44', '2023-03-07 12:36:44'),
(53, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-07 13:51:07', '2023-03-07 13:51:07'),
(54, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-07 19:15:45', '2023-03-07 19:15:45'),
(55, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-08 09:33:00', '2023-03-08 09:33:00'),
(56, 0, 0, 'Failed to login with email:wilson.webart@gmail.com', '2023-03-08 12:18:44', '2023-03-08 12:18:44'),
(57, 0, 0, 'Failed to login with email:wilson.webart@gmail.com', '2023-03-08 12:18:53', '2023-03-08 12:18:53'),
(58, 0, 0, 'Failed to login with email:wilsonewin101994@gmail.com', '2023-03-08 12:19:01', '2023-03-08 12:19:01'),
(59, 0, 0, 'Failed to login with email:wilson.webart@gmail.com', '2023-03-08 12:19:10', '2023-03-08 12:19:10'),
(60, 0, 0, 'Failed to login with email:wilsonerwin101994@gmail.com', '2023-03-08 12:19:17', '2023-03-08 12:19:17'),
(61, 0, 0, 'Failed to login with email:wilsonerwin101994@gmail.com', '2023-03-08 12:19:22', '2023-03-08 12:19:22'),
(62, 0, 0, 'Failed to login with email:wilsonerwin101994@gmail.com', '2023-03-08 12:19:25', '2023-03-08 12:19:25'),
(63, 0, 0, 'Failed to login with email:wilsonerwin101994@gmail.com', '2023-03-08 12:19:28', '2023-03-08 12:19:28'),
(64, 0, 0, 'Failed to login with email:wilson.webart@gmail.com', '2023-03-08 12:19:35', '2023-03-08 12:19:35'),
(65, 0, 0, 'Failed to login with email:wilson.webart@gmail.com', '2023-03-08 12:19:41', '2023-03-08 12:19:41'),
(66, 0, 0, 'Failed to login with email:wilson.webart@gmail.com', '2023-03-08 12:19:45', '2023-03-08 12:19:45'),
(67, 0, 0, 'Failed to login with email:wilson.webart@gmail.com', '2023-03-08 12:19:48', '2023-03-08 12:19:48'),
(68, 0, 0, 'Failed to login with email:wilsonerwin94@gmail.com', '2023-03-08 12:20:15', '2023-03-08 12:20:15'),
(69, 0, 0, 'Failed to login with email:wilsonerwin94@gmail.com', '2023-03-08 12:20:20', '2023-03-08 12:20:20'),
(70, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-09 03:25:35', '2023-03-09 03:25:35'),
(71, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-03-09 03:26:31', '2023-03-09 03:26:31'),
(72, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-09 12:18:38', '2023-03-09 12:18:38'),
(73, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-09 14:39:58', '2023-03-09 14:39:58'),
(74, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-09 15:19:38', '2023-03-09 15:19:38'),
(75, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-09 18:45:51', '2023-03-09 18:45:51'),
(76, 0, 3, 'Logged in with email:dev1@mailbux.com', '2023-03-10 08:41:34', '2023-03-10 08:41:34'),
(77, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-10 09:40:12', '2023-03-10 09:40:12'),
(78, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-10 12:26:25', '2023-03-10 12:26:25'),
(79, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-10 12:27:55', '2023-03-10 12:27:55'),
(80, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-12 10:54:12', '2023-03-12 10:54:12'),
(81, 0, 1, 'Logged in with email:raviv@mailbux.com', '2023-03-14 07:31:15', '2023-03-14 07:31:15'),
(82, 0, 2, 'Logged in with email:dev@mailbux.com', '2023-03-14 10:25:34', '2023-03-14 10:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `workspace_id`, `uuid`, `user_id`, `name`, `key`, `secret`, `created_at`, `updated_at`) VALUES
(1, 1, 'a2f145d7-1364-44d6-8e05-095d6e941f97', 1, 'New API Key', 'oGOIPsE3GCJ1CPVr9y0Tb93UhDEnspDq', NULL, '2023-02-28 11:26:38', '2023-02-28 11:26:38'),
(2, 2, 'a964d720-72b9-4e08-af76-fad067b00784', 3, 'New API Key', 'HWSgPfeQZidNQKgURGwqR3005yaAY2Cw', NULL, '2023-02-28 18:44:16', '2023-02-28 18:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE `calendar_events` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `contact_id` int UNSIGNED NOT NULL DEFAULT '0',
  `admin_id` int UNSIGNED NOT NULL DEFAULT '0',
  `manager_id` int UNSIGNED NOT NULL DEFAULT '0',
  `address_id` int UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '0',
  `priority` enum('high','medium','low') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'medium',
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `type` enum('leave','work','system','personal','holiday','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'other',
  `access_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_key` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `workspace_id`, `uuid`, `user_id`, `first_name`, `last_name`, `email`, `phone`, `title`, `address`, `city`, `state`, `country`, `zip`, `avatar`, `access_key`, `notes`, `birthday`, `created_at`, `updated_at`) VALUES
(1, 1, 'c75854db-45ca-4f81-b974-2e4547c5fd1c', 1, 'Demo', 'Example', 'demo@example.com', NULL, 'Sample Contact', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'This is a sample contact. You can delete it.', NULL, '2023-02-28 09:28:39', '2023-02-28 09:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_key` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci,
  `last_opened_by` int UNSIGNED NOT NULL DEFAULT '0',
  `last_opened_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `workspace_id`, `uuid`, `user_id`, `type`, `title`, `content`, `is_published`, `slug`, `access_key`, `attachment`, `last_opened_by`, `last_opened_at`, `created_at`, `updated_at`) VALUES
(6, 1, '4bf836a9-8155-4d81-bfa0-3a88ea05928c', 1, 'spreadsheet', 'Sample Spreadsheet', '', 0, NULL, 'drHAF4BkBnCh36TAEdwqjZZs4yDtkNZv', NULL, 2, '2023-03-09 12:19:43', '2023-02-28 09:28:39', '2023-03-09 12:19:43'),
(7, 2, '73ac4604-a5b7-4cd4-be25-3217c602a25a', 3, 'spreadsheet', 'sss', '', 0, NULL, 'BRfjJMtHnv4rXAo1NhwT7f4LtBSgYqoP', NULL, 3, '2023-03-07 11:45:50', '2023-02-28 10:46:44', '2023-03-07 11:45:50'),
(9, 1, '1fba9c5d-2c20-4d9b-aec7-6e3c758b135f', 1, 'word', 'Test doc', '<p>Test doc</p>', 0, NULL, 'cwQFAwaIlkUfcbqu3CscI0Uxa42sShfs', NULL, 1, '2023-03-14 07:50:05', '2023-02-28 14:56:57', '2023-03-14 07:50:05'),
(10, 2, '786dda8e-f057-4ae3-a7b8-bcb912f06c3a', 3, 'word', 'test_abc', '<p>vcxvcvx  gsg g ggg gsg</p>', 0, NULL, 'JFpKQv1SoQ3P7xjcwjlZ52zLEiVaqdY4', NULL, 3, '2023-03-10 10:11:55', '2023-03-10 08:41:59', '2023-03-10 10:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `directory_id` int UNSIGNED NOT NULL DEFAULT '0',
  `size` int UNSIGNED NOT NULL DEFAULT '0',
  `width` smallint UNSIGNED NOT NULL DEFAULT '0',
  `height` smallint UNSIGNED NOT NULL DEFAULT '0',
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `access_key` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `workspace_id`, `uuid`, `user_id`, `directory_id`, `size`, `width`, `height`, `folder`, `title`, `path`, `mime_type`, `extension`, `description`, `access_key`, `created_at`, `updated_at`) VALUES
(2, 1, 'ae67a37a-9169-40eb-9158-4b4ff89e1dd8', 1, 0, 8205, 0, 0, NULL, 'Logo_Mailbux_purple.png', 'media/SAoKsM1NRTMgpJ9pAh8WDKwZG07GZQr3v982hN5C.png', 'image/png', 'png', NULL, '3fwVtOy55S7FFLRc2hbpJtHXZtEkzRQJgwZc', '2023-02-28 09:48:28', '2023-03-10 10:09:25'),
(3, 1, '9c0c9401-6074-4ad6-85c0-95a25c91134d', 1, 0, 59566, 0, 0, NULL, 'צילום מסך 2023-02-28 131903.png', 'media/0YMKrfc5Jm4UyS0oobbe1IK9SKaLDAjJwJ3tQG6a.png', 'image/png', 'png', NULL, NULL, '2023-02-28 11:20:35', '2023-02-28 11:20:35'),
(4, 1, '1cec5aae-4675-4ce8-a6ab-f77c18db1569', 1, 0, 43672, 0, 0, NULL, 'צילום מסך 2023-02-28 133015.png', 'media/BiBJ34XavnEIOexOUWadZ88IKX43EHEeEVQdHq0P.png', 'image/png', 'png', NULL, NULL, '2023-02-28 11:31:09', '2023-02-28 11:31:09'),
(5, 1, '01a0a9e9-a457-49f4-84fd-3513a2b1faaa', 1, 0, 97850, 0, 0, NULL, 'צילום מסך 2023-02-28 165454.png', 'media/fW34ybhvgyHFKaW3xAwqxEVnxbdyK9k7c31pTa7C.png', 'image/png', 'png', NULL, NULL, '2023-02-28 14:55:06', '2023-02-28 14:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_test_mode` tinyint(1) NOT NULL DEFAULT '0',
  `order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `workspace_id`, `uuid`, `name`, `api_name`, `type`, `slug`, `username`, `password`, `api_key`, `api_secret`, `account`, `description`, `settings`, `is_active`, `is_default`, `is_test_mode`, `order`, `created_at`, `updated_at`) VALUES
(1, 1, '2084933e-4e15-42dc-b866-f4e2612c8628', 'Stripe', 'stripe', NULL, NULL, NULL, NULL, 'pk_live_51M55cgB3qif0YNB7kZ4vD2EO0vgWbPQHT4qQNyjVZ9L9mrmccyrfUdP4oDNVm7Xhuq1a81vKtdbCbhhWBFI9zBfr00Aq9s863u', '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', NULL, NULL, NULL, 1, 0, 0, 0, '2023-02-28 09:43:38', '2023-02-28 09:43:38'),
(2, 1, '75d17775-3bd3-4e86-83d8-50abcb3db83c', 'PayPal', 'paypal', NULL, NULL, NULL, NULL, 'AXOtBzmWFo7uiwKZmmqj1VD8IiG5_c1NCt31eYCqHMGXbJyZDRyJGadHAtcQaWEIikGsebRJw_Ba-GdW', 'EOZ5bCjYGDZDiBD0RaG_ThqSn7ZNBE41Cf59Vnx2TZZw-WNb4NyFGpfG6nQrbFjC3plVpAq8WuzTgeg2', NULL, NULL, NULL, 1, 0, 0, 0, '2023-02-28 09:45:05', '2023-02-28 09:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interval_count` int UNSIGNED NOT NULL DEFAULT '0',
  `storage_space` int UNSIGNED NOT NULL DEFAULT '0',
  `users` int UNSIGNED NOT NULL DEFAULT '0',
  `contacts` int UNSIGNED NOT NULL DEFAULT '0',
  `modules` text COLLATE utf8mb4_unicode_ci,
  `features` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_free` tinyint(1) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `paypal_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int UNSIGNED NOT NULL DEFAULT '0',
  `collection_id` int UNSIGNED NOT NULL DEFAULT '0',
  `single_category_id` int UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `lead_text` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_tag` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `markdown` longtext COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `head` longtext COLLATE utf8mb4_unicode_ci,
  `js` longtext COLLATE utf8mb4_unicode_ci,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vimeo_video_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canonical_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reading_time` int UNSIGNED NOT NULL DEFAULT '0',
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `is_home_page` tinyint(1) NOT NULL DEFAULT '0',
  `is_system_page` tinyint(1) NOT NULL DEFAULT '0',
  `is_pinned` tinyint(1) NOT NULL DEFAULT '0',
  `show_date` tinyint(1) NOT NULL DEFAULT '1',
  `allow_comment` tinyint(1) NOT NULL DEFAULT '0',
  `is_page` tinyint(1) NOT NULL DEFAULT '0',
  `author_id` int UNSIGNED NOT NULL DEFAULT '0',
  `sort_order` int UNSIGNED NOT NULL DEFAULT '0',
  `item_id` int UNSIGNED NOT NULL DEFAULT '0',
  `is_cached` tinyint(1) NOT NULL DEFAULT '0',
  `seo_index` tinyint(1) NOT NULL DEFAULT '1',
  `settings` json DEFAULT NULL,
  `og_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `og_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uuid`, `workspace_id`, `user_id`, `parent_id`, `collection_id`, `single_category_id`, `type`, `template`, `header_type`, `api_name`, `slug`, `name`, `title`, `seo_title`, `excerpt`, `lead_text`, `keywords`, `meta_tag`, `meta_description`, `meta_keywords`, `markdown`, `content`, `head`, `js`, `featured_image`, `featured_video`, `youtube_video_id`, `vimeo_video_id`, `canonical_url`, `reading_time`, `is_published`, `is_home_page`, `is_system_page`, `is_pinned`, `show_date`, `allow_comment`, `is_page`, `author_id`, `sort_order`, `item_id`, `is_cached`, `seo_index`, `settings`, `og_title`, `og_description`, `og_image`, `twitter_card`, `twitter_title`, `twitter_description`, `twitter_image`, `created_at`, `updated_at`) VALUES
(1, '7a4ed30b-69e3-42df-9c8a-04c8ea3fda61', 1, 0, 0, 0, 0, 'page', NULL, NULL, NULL, 'welcome-to-mailbux-office-suite', NULL, 'Welcome to Mailbux Office Suite', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, '{\"hero_image\": null, \"hero_title\": \"The Office Suite on the Cloud\", \"faq_answers\": [\"The monthly plan is billed monthly and the yearly plan is billed yearly. The yearly plan is 10% off the monthly price.\", \"You can cancel your subscription at any time. If you cancel your subscription, you will continue to have access to your account until the end of your current billing period.\", \"If you cancel your subscription, you will continue to have access to your account until the end of your current billing period. You will not be billed again after your current billing period ends.\", \"You can start a trial by clicking the \\\"Get Started\\\" or the \\\"Sign Up\\\" button on the pricing page. You do not need a credit card to start a trial.\"], \"signup_title\": \"Get Started with a Free Trial\", \"testimonials\": [\"It works well and has all the functions I need. I would recommend it to anyone who needs a simple and easy to use document editor.\", \"I love this product! This is efficient and productive. I can create documents and share them with my colleagues. I can also export them as PDF.\", \"I use this product to share assignments with my students. It is very easy to use and I can see the logs who accessed them.\"], \"faq_questions\": [\"What is the difference between the monthly and yearly plans?\", \"How do I cancel my subscription?\", \"What happens if I cancel my subscription?\", \"How do I start a trial?\"], \"hero_subtitle\": \"A powerful office suite on the cloud featuring writer, spreadsheet, images, business email accounts, file sharing, and more. No software to install. Get started for free now.\", \"signup_reasons\": [\"Works everywhere, whether on a PC, tablet, or mobile device.\", \"Share with a unique access URL with access log data, and No signup is required to access the shared documents.\", \"Cloud Image Editor to crop, resize, and add text to images.\", \"No software to install. No updates to install. No hassle.\", \"No credit card required. No commitment. Cancel anytime.\", \"Create Unlimited Business Email Accounts\"], \"hero_button_url\": \"#signup\", \"signup_subtitle\": \"Get Started with Mailbux for Free\", \"faq_section_name\": \"FAQ\", \"hero_button_text\": \"Get Started\", \"faq_section_title\": \"Frequently Asked Questions\", \"hero_section_name\": \"Hero Section\", \"about_section_name\": \"About\", \"about_section_image\": null, \"about_section_title\": \"More than just Office Suite\", \"signup_section_name\": \"Sign Up\", \"testimonials_author\": [\"Emil S\", \"Oliver K\", \"William H\"], \"faq_section_subtitle\": \"Your questions answered\", \"pricing_section_name\": \"Pricing\", \"pricing_section_title\": \"Pricing\", \"about_section_subtitle\": \"Mailbux is a simple, lightweight office suite on the Cloud. Create, Edit, and Share to improve your work efficiency: Business Email Accounts, share files, texts, links, and more with access logs. Know who is viewing and from which device and IP. Export to PDF and more.\", \"feature_highlight_title\": \"Mailbux is made with you in mind!\", \"pricing_section_subtitle\": \"Choose which suite is right for you\", \"testimonials_author_title\": [\"Student, UT\", \"Content Writer, Ray Media\", \"Teacher, UT\"], \"testimonials_section_name\": \"Testimonials\", \"feature_highlight_subtitle\": \"Works everywhere, whether on a PC, tablet, or mobile device.\", \"testimonials_section_title\": \"Testimonials\", \"testimonials_section_subtitle\": \"What our customers say\", \"feature_highlight_section_name\": \"Why Mailbux?\", \"feature_highlight_feature_1_icon\": \"<svg xmlns=\\\"http://www.w3.org/2000/svg\\\" fill=\\\"none\\\" viewBox=\\\"0 0 24 24\\\" stroke-width=\\\"1.5\\\" stroke=\\\"currentColor\\\" class=\\\"w-6 h-6\\\">\\r\\n  <path stroke-linecap=\\\"round\\\" stroke-linejoin=\\\"round\\\" d=\\\"M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5\\\" />\\r\\n</svg>\", \"feature_highlight_feature_2_icon\": \"<svg xmlns=\\\"http://www.w3.org/2000/svg\\\" fill=\\\"none\\\" viewBox=\\\"0 0 24 24\\\" stroke-width=\\\"1.5\\\" stroke=\\\"currentColor\\\" class=\\\"w-6 h-6\\\">\\r\\n  <path stroke-linecap=\\\"round\\\" stroke-linejoin=\\\"round\\\" d=\\\"M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6\\\" />\\r\\n</svg>\", \"feature_highlight_feature_3_icon\": \"<svg xmlns=\\\"http://www.w3.org/2000/svg\\\" fill=\\\"none\\\" viewBox=\\\"0 0 24 24\\\" stroke-width=\\\"1.5\\\" stroke=\\\"currentColor\\\" class=\\\"w-6 h-6\\\">\\r\\n  <path stroke-linecap=\\\"round\\\" stroke-linejoin=\\\"round\\\" d=\\\"M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z\\\" />\\r\\n</svg>\", \"feature_highlight_feature_4_icon\": \"<svg xmlns=\\\"http://www.w3.org/2000/svg\\\" fill=\\\"none\\\" viewBox=\\\"0 0 24 24\\\" stroke-width=\\\"1.5\\\" stroke=\\\"currentColor\\\" class=\\\"w-6 h-6\\\">\\r\\n  <path stroke-linecap=\\\"round\\\" stroke-linejoin=\\\"round\\\" d=\\\"M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z\\\" />\\r\\n</svg>\", \"feature_highlight_feature_1_title\": \"Student\", \"feature_highlight_feature_2_title\": \"Teacher\", \"feature_highlight_feature_3_title\": \"Personal\", \"feature_highlight_feature_4_title\": \"Business\", \"footer_business_short_description\": \"Mailbux, Inc. improves individual and business productivity. It lets you create and share files, texts, spreadsheets, Business Emails and more. \\r\\nSupport email: support@mailbux.com | Sales: sales@mailbux.com\", \"feature_highlight_feature_1_subtitle\": \"Take study notes. Share with classmates. Export as PDF.\", \"feature_highlight_feature_2_subtitle\": \"Create documents. Share with colleagues. Export as PDF.\", \"feature_highlight_feature_3_subtitle\": \"Create documents. Share with colleagues. Export as PDF.\", \"feature_highlight_feature_4_subtitle\": \"Create documents. Create Business Email Accounts. Share with colleagues. Export as PDF.\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 09:28:39', '2023-02-28 15:41:27'),
(2, '5dfe8f09-ba75-4e1d-824a-eb302a3a7887', 1, 0, 0, 0, 0, 'page', NULL, NULL, 'privacy_policy', 'privacy-policy', NULL, 'Privacy Policy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<h2 style=\"text-align:center;\"><strong>PRIVACY NOTICE</strong></h2><p><br><strong>Last updated February 11, 2023</strong></p><p>This privacy notice for Mailbux (\"Company,\" \"we,\" \"us,\" or \"our\"), describes how and why we might collect, store, use, and/or share (\"process\") your information when you use our services (\"Services\"), such as when you:&nbsp;<br>Visit our website at <a href=\"https://www.mailbux.com\">https://www.mailbux.com</a>, or any website of ours that links to this privacy notice</p><p>Engage with us in other related ways, including any sales, marketing, or events&nbsp;<br>Questions or concerns?&nbsp;Reading this privacy notice will help you understand your privacy rights and choices. If you do not agree with our policies and practices, please do not use our Services. If you still have any questions or concerns, please contact us at __________.</p><p>&nbsp;</p><p><br>SUMMARY OF KEY POINTS</p><p><br>This summary provides key points from our privacy notice, but you can find out more details about any of these topics by clicking the link following each key point or by using our table of contents below to find the section you are looking for. You can also click&nbsp;here&nbsp;to go directly to our table of contents.</p><p><br>What personal information do we process? When you visit, use, or navigate our Services, we may process personal information depending on how you interact with Mailbux and the Services, the choices you make, and the products and features you use. Click&nbsp;here&nbsp;to learn more.</p><p><br>Do we process any sensitive personal information? We do not process sensitive personal information.</p><p><br>Do we receive any information from third parties? We do not receive any information from third parties.</p><p><br>How do we process your information? We process your information to provide, improve, and administer our Services, communicate with you, for security and fraud prevention, and to comply with law. We may also process your information for other purposes with your consent. We process your information only when we have a valid legal reason to do so. Click&nbsp;here&nbsp;to learn more.</p><p><br>In what situations and with which parties do we share personal information? We may share information in specific situations and with specific third parties. Click&nbsp;here&nbsp;to learn more.</p><p><br>What are your rights? Depending on where you are located geographically, the applicable privacy law may mean you have certain rights regarding your personal information. Click&nbsp;here&nbsp;to learn more.</p><p><br>How do you exercise your rights? The easiest way to exercise your rights is by filling out our data subject request form available here, or by contacting us. We will consider and act upon any request in accordance with applicable data protection laws.</p><p><br>Want to learn more about what Mailbux does with any information we collect? Click&nbsp;here&nbsp;to review the notice in full.</p><p><br>1. WHAT INFORMATION DO WE COLLECT?</p><p><br>Personal information you disclose to us</p><p><br>In Short:&nbsp;We collect personal information that you provide to us.</p><p><br>We collect personal information that you voluntarily provide to us when you register on the Services,&nbsp;express an interest in obtaining information about us or our products and Services, when you participate in activities on the Services, or otherwise when you contact us.</p><p>&nbsp;</p><p>Personal Information Provided by You. The personal information that we collect depends on the context of your interactions with us and the Services, the choices you make, and the products and features you use. The personal information we collect may include the following:&nbsp;<br>names</p><p>phone numbers</p><p>email addresses</p><p>usernames</p><p>passwords</p><p>Sensitive Information. We do not process sensitive information.</p><p>&nbsp;</p><p>Payment Data. We may collect data necessary to process your payment if you make purchases, such as your payment instrument number, and the security code associated with your payment instrument. All payment data is stored by __________. You may find their privacy notice link(s) here: __________.</p><p>&nbsp;</p><p>All personal information that you provide to us must be true, complete, and accurate, and you must notify us of any changes to such personal information.</p><p>&nbsp;</p><p>2. HOW DO WE PROCESS YOUR INFORMATION?</p><p><br>In Short:&nbsp;We process your information to provide, improve, and administer our Services, communicate with you, for security and fraud prevention, and to comply with law. We may also process your information for other purposes with your consent.</p><p><br>We process your personal information for a variety of reasons, depending on how you interact with our Services, including:&nbsp;<br>To facilitate account creation and authentication and otherwise manage user accounts.&nbsp;We may process your information so you can create and log in to your account, as well as keep your account in working order.</p><p><br>To save or protect an individual\'s vital interest. We may process your information when necessary to save or protect an individual’s vital interest, such as to prevent harm.</p><p>&nbsp;</p><p>3. WHAT LEGAL BASES DO WE RELY ON TO PROCESS YOUR INFORMATION?</p><p><br>In Short:&nbsp;We only process your personal information when we believe it is necessary and we have a valid legal reason (i.e., legal basis) to do so under applicable law, like with your consent, to comply with laws, to provide you with services to enter into or fulfill our contractual obligations, to protect your rights, or to fulfill our legitimate business interests.</p><p><br>If you are located in the EU or UK, this section applies to you.</p><p><br>The General Data Protection Regulation (GDPR) and UK GDPR require us to explain the valid legal bases we rely on in order to process your personal information. As such, we may rely on the following legal bases to process your personal information:&nbsp;<br>Consent.&nbsp;We may process your information if you have given us permission (i.e., consent) to use your personal information for a specific purpose. You can withdraw your consent at any time. Click&nbsp;here&nbsp;to learn more.</p><p>Legal Obligations. We may process your information where we believe it is necessary for compliance with our legal obligations, such as to cooperate with a law enforcement body or regulatory agency, exercise or defend our legal rights, or disclose your information as evidence in litigation in which we are involved.</p><p><br>Vital Interests. We may process your information where we believe it is necessary to protect your vital interests or the vital interests of a third party, such as situations involving potential threats to the safety of any person.</p><p>&nbsp;</p><p>If you are located in Canada, this section applies to you.</p><p><br>We may process your information if you have given us specific permission (i.e., express consent) to use your personal information for a specific purpose, or in situations where your permission can be inferred (i.e., implied consent). You can withdraw your consent at any time. Click&nbsp;here&nbsp;to learn more.</p><p><br>In some exceptional cases, we may be legally permitted under applicable law to process your information without your consent, including, for example:&nbsp;<br>If collection is clearly in the interests of an individual and consent cannot be obtained in a timely way</p><p>For investigations and fraud detection and prevention</p><p>For business transactions provided certain conditions are met</p><p>If it is contained in a witness statement and the collection is necessary to assess, process, or settle an insurance claim</p><p>For identifying injured, ill, or deceased persons and communicating with next of kin</p><p>If we have reasonable grounds to believe an individual has been, is, or may be victim of financial abuse</p><p>If it is reasonable to expect collection and use with consent would compromise the availability or the accuracy of the information and the collection is reasonable for purposes related to investigating a breach of an agreement or a contravention of the laws of Canada or a province</p><p>If disclosure is required to comply with a subpoena, warrant, court order, or rules of the court relating to the production of records</p><p>If it was produced by an individual in the course of their employment, business, or profession and the collection is consistent with the purposes for which the information was produced</p><p>If the collection is solely for journalistic, artistic, or literary purposes</p><p>If the information is publicly available and is specified by the regulations</p><p>&nbsp;</p><p>4. WHEN AND WITH WHOM DO WE SHARE YOUR PERSONAL INFORMATION?</p><p><br>In Short:&nbsp;We may share information in specific situations described in this section and/or with the following third parties.</p><p>&nbsp;</p><p>We may need to share your personal information in the following situations:&nbsp;<br>Business Transfers. We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.</p><p>&nbsp;</p><p>5. DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES?</p><p><br>In Short:&nbsp;We may use cookies and other tracking technologies to collect and store your information.</p><p><br>We may use cookies and similar tracking technologies (like web beacons and pixels) to access or store information. Specific information about how we use such technologies and how you can refuse certain cookies is set out in our Cookie Notice.</p><p><br>6. IS YOUR INFORMATION TRANSFERRED INTERNATIONALLY?</p><p><br>In Short:&nbsp;We may transfer, store, and process your information in countries other than your own.</p><p><br>Our servers are located in. If you are accessing our Services from outside, please be aware that your information may be transferred to, stored, and processed by us in our facilities and by those third parties with whom we may share your personal information (see \"WHEN AND WITH WHOM DO WE SHARE YOUR PERSONAL INFORMATION?\" above), in &nbsp;and other countries.</p><p><br>If you are a resident in the European Economic Area (EEA) or United Kingdom (UK), then these countries may not necessarily have data protection laws or other similar laws as comprehensive as those in your country. However, we will take all necessary measures to protect your personal information in accordance with this privacy notice and applicable law.</p><p><br>7. HOW LONG DO WE KEEP YOUR INFORMATION?</p><p><br>In Short:&nbsp;We keep your information for as long as necessary to fulfill the purposes outlined in this privacy notice unless otherwise required by law.</p><p><br>We will only keep your personal information for as long as it is necessary for the purposes set out in this privacy notice, unless a longer retention period is required or permitted by law (such as tax, accounting, or other legal requirements). No purpose in this notice will require us keeping your personal information for longer than the period of time in which users have an account with us.</p><p><br>When we have no ongoing legitimate business need to process your personal information, we will either delete or anonymize such information, or, if this is not possible (for example, because your personal information has been stored in backup archives), then we will securely store your personal information and isolate it from any further processing until deletion is possible.</p><p><br>8. WHAT ARE YOUR PRIVACY RIGHTS?</p><p><br>In Short:&nbsp;In some regions, such as the European Economic Area (EEA), United Kingdom (UK), and Canada, you have rights that allow you greater access to and control over your personal information.&nbsp;You may review, change, or terminate your account at any time.</p><p><br>In some regions (like the EEA, UK, and Canada), you have certain rights under applicable data protection laws. These may include the right (i) to request access and obtain a copy of your personal information, (ii) to request rectification or erasure; (iii) to restrict the processing of your personal information; and (iv) if applicable, to data portability. In certain circumstances, you may also have the right to object to the processing of your personal information. You can make such a request by contacting us by using the contact details provided in the section \"HOW CAN YOU CONTACT US ABOUT THIS NOTICE?\" below.</p><p><br>We will consider and act upon any request in accordance with applicable data protection laws.&nbsp;<br>&nbsp;&nbsp;<br>If you are located in the EEA or UK and you believe we are unlawfully processing your personal information, you also have the right to complain to your local data protection supervisory authority. You can find their contact details here: https://ec.europa.eu/justice/data-protection/bodies/authorities/index_en.htm.</p><p><br>If you are located in Switzerland, the contact details for the data protection authorities are available here: https://www.edoeb.admin.ch/edoeb/en/home.html.</p><p><br>Withdrawing your consent: If we are relying on your consent to process your personal information, which may be express and/or implied consent depending on the applicable law, you have the right to withdraw your consent at any time. You can withdraw your consent at any time by contacting us by using the contact details provided in the section \"HOW CAN YOU CONTACT US ABOUT THIS NOTICE?\" below.</p><p><br>However, please note that this will not affect the lawfulness of the processing before its withdrawal nor, when applicable law allows, will it affect the processing of your personal information conducted in reliance on lawful processing grounds other than consent.</p><p><br>Opting out of marketing and promotional communications:&nbsp;You can unsubscribe from our marketing and promotional communications at any time by clicking on the unsubscribe link in the emails that we send, or by contacting us using the details provided in the section \"HOW CAN YOU CONTACT US ABOUT THIS NOTICE?\" below. You will then be removed from the marketing lists. However, we may still communicate with you — for example, to send you service-related messages that are necessary for the administration and use of your account, to respond to service requests, or for other non-marketing purposes.</p><p><br>Account Information</p><p><br>If you would at any time like to review or change the information in your account or terminate your account, you can:&nbsp;<br>Log in to your account settings and update your user account.</p><p>Upon your request to terminate your account, we will deactivate or delete your account and information from our active databases. However, we may retain some information in our files to prevent fraud, troubleshoot problems, assist with any investigations, enforce our legal terms and/or comply with applicable legal requirements.</p><p><br>9. CONTROLS FOR DO-NOT-TRACK FEATURES</p><p><br>Most web browsers and some mobile operating systems and mobile applications include a Do-Not-Track (\"DNT\") feature or setting you can activate to signal your privacy preference not to have data about your online browsing activities monitored and collected. At this stage no uniform technology standard for recognizing and implementing DNT signals has been finalized. As such, we do not currently respond to DNT browser signals or any other mechanism that automatically communicates your choice not to be tracked online. If a standard for online tracking is adopted that we must follow in the future, we will inform you about that practice in a revised version of this privacy notice.</p><p><br>10. DO CALIFORNIA RESIDENTS HAVE SPECIFIC PRIVACY RIGHTS?</p><p><br>In Short:&nbsp;Yes, if you are a resident of California, you are granted specific rights regarding access to your personal information.</p><p><br>California Civil Code Section 1798.83, also known as the \"Shine The Light\" law, permits our users who are California residents to request and obtain from us, once a year and free of charge, information about categories of personal information (if any) we disclosed to third parties for direct marketing purposes and the names and addresses of all third parties with which we shared personal information in the immediately preceding calendar year. If you are a California resident and would like to make such a request, please submit your request in writing to us using the contact information provided below.</p><p><br>If you are under 18 years of age, reside in California, and have a registered account with Services, you have the right to request removal of unwanted data that you publicly post on the Services. To request removal of such data, please contact us using the contact information provided below and include the email address associated with your account and a statement that you reside in California. We will make sure the data is not publicly displayed on the Services, but please be aware that the data may not be completely or comprehensively removed from all our systems (e.g., backups, etc.).</p><p><br>CCPA Privacy Notice</p><p><br>The California Code of Regulations defines a \"resident\" as:</p><p><br>(1) every individual who is in the State of California for other than a temporary or transitory purpose and&nbsp;<br>(2) every individual who is domiciled in the State of California who is outside the State of California for a temporary or transitory purpose</p><p><br>All other individuals are defined as \"non-residents.\"</p><p><br>If this definition of \"resident\" applies to you, we must adhere to certain rights and obligations regarding your personal information.</p><p><br>What categories of personal information do we collect?</p><p><br>We have collected the following categories of personal information in the past twelve (12) months:</p><p>&nbsp;</p><p>We may also collect other personal information outside of these categories through instances where you interact with us in person, online, or by phone or mail in the context of:&nbsp;<br>Receiving help through our customer support channels;</p><p>Participation in customer surveys or contests; and</p><p>Facilitation in the delivery of our Services and to respond to your inquiries.&nbsp;<br>How do we use and share your personal information?</p><p><br>More information about our data collection and sharing practices can be found in this privacy notice.</p><p><br>You may contact us or by referring to the contact details at the bottom of this document.</p><p><br>If you are using an authorized agent to exercise your right to opt out we may deny a request if the authorized agent does not submit proof that they have been validly authorized to act on your behalf.</p><p><br>Will your information be shared with anyone else?</p><p><br>We may disclose your personal information with our service providers pursuant to a written contract between us and each service provider. Each service provider is a for-profit entity that processes the information on our behalf, following the same strict privacy protection obligations mandated by the CCPA.</p><p><br>We may use your personal information for our own business purposes, such as for undertaking internal research for technological development and demonstration. This is not considered to be \"selling\" of your personal information.</p><p><br>Your rights with respect to your personal data</p><p><br>Right to request deletion of the data — Request to delete</p><p><br>You can ask for the deletion of your personal information. If you ask us to delete your personal information, we will respect your request and delete your personal information, subject to certain exceptions provided by law, such as (but not limited to) the exercise by another consumer of his or her right to free speech, our compliance requirements resulting from a legal obligation, or any processing that may be required to protect against illegal activities.</p><p><br>Right to be informed — Request to know</p><p><br>Depending on the circumstances, you have a right to know:&nbsp;<br>whether we collect and use your personal information;</p><p>the categories of personal information that we collect;</p><p>the purposes for which the collected personal information is used;</p><p>whether we sell or share personal information to third parties;</p><p>the categories of personal information that we sold, shared, or disclosed for a business purpose;</p><p>the categories of third parties to whom the personal information was sold, shared, or disclosed for a business purpose;</p><p>the business or commercial purpose for collecting, selling, or sharing personal information; and</p><p>the specific pieces of personal information we collected about you.&nbsp;<br>In accordance with applicable law, we are not obligated to provide or delete consumer information that is de-identified in response to a consumer request or to re-identify individual data to verify a consumer request.</p><p><br>Right to Non-Discrimination for the Exercise of a Consumer’s Privacy Rights</p><p><br>We will not discriminate against you if you exercise your privacy rights.</p><p><br>Right to Limit Use and Disclosure of Sensitive Personal Information</p><p>&nbsp;</p><p>We do not process consumer\'s sensitive personal information.</p><p>&nbsp;</p><p>Verification process</p><p><br>Upon receiving your request, we will need to verify your identity to determine you are the same person about whom we have the information in our system. These verification efforts require us to ask you to provide information so that we can match it with information you have previously provided us. For instance, depending on the type of request you submit, we may ask you to provide certain information so that we can match the information you provide with the information we already have on file, or we may contact you through a communication method (e.g., phone or email) that you have previously provided to us. We may also use other verification methods as the circumstances dictate.</p><p><br>We will only use personal information provided in your request to verify your identity or authority to make the request. To the extent possible, we will avoid requesting additional information from you for the purposes of verification. However, if we cannot verify your identity from the information already maintained by us, we may request that you provide additional information for the purposes of verifying your identity and for security or fraud-prevention purposes. We will delete such additionally provided information as soon as we finish verifying you.</p><p><br>Other privacy rights</p><p>You may object to the processing of your personal information.</p><p>You may request correction of your personal data if it is incorrect or no longer relevant, or ask to restrict the processing of the information.</p><p>You can designate an authorized agent to make a request under the CCPA on your behalf. We may deny a request from an authorized agent that does not submit proof that they have been validly authorized to act on your behalf in accordance with the CCPA.&nbsp;<br>To exercise these rights, you can contact us&nbsp;or by referring to the contact details at the bottom of this document. If you have a complaint about how we handle your data, we would like to hear from you.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 09:28:39', '2023-02-28 10:49:51'),
(3, '7029394a-a668-4bcb-906b-5ef946153e6d', 1, 0, 0, 0, 0, 'page', NULL, NULL, 'terms_of_service', 'terms-of-service', NULL, 'Terms of Service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<h2><strong>Terms and Conditions</strong></h2><p>Welcome to&nbsp;Mailbux!</p><p>These terms and conditions outline the rules and regulations for the use of&nbsp;Mailbux\'s Website, located at <a href=\"https://www.mailbux.com\">www.mailbux.com</a>.</p><p>By accessing this website we assume you accept these terms and conditions. Do not continue to use&nbsp;Mailbux&nbsp;if you do not agree to take all of the terms and conditions stated on this page.</p><p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: “Client”, “You” and “Your” refers to you, the person log on this website and compliant to the Company\'s terms and conditions. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client\'s needs in respect of provision of the Company\'s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p><h3><strong>Cookies</strong></h3><p>We employ the use of cookies. By accessing&nbsp;Mailbux, you agreed to use cookies in agreement with the&nbsp;Mailbux Privacy Policy.</p><p>Most interactive websites use cookies to let us retrieve the user\'s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p><h3><strong>License</strong></h3><p>Unless otherwise stated,&nbsp;Mailbux and/or its licensors own the intellectual property rights for all material on&nbsp;Mailbux. All intellectual property rights are reserved. You may access this from&nbsp;Mailbux for your own personal use subject to restrictions set in these terms and conditions.</p><p>You must not:</p><ul><li>Republish material from&nbsp;Mailbux</li><li>Sell, rent or sub-license material from&nbsp;Mailbux</li><li>Reproduce, duplicate or copy material from&nbsp;Mailbux</li><li>Redistribute content from&nbsp;Mailbux</li></ul><p>This Agreement shall begin on the date hereof.</p><p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website.&nbsp;Mailbux does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of&nbsp;Mailbux, its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws,&nbsp;CloudOnex&nbsp;shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p><p>Mailbux reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p><p>You warrant and represent that:</p><ul><li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li><li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li><li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li><li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li></ul><p>You hereby grant&nbsp;Mailbux a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p><h3><strong>Hyperlinking to our Content</strong></h3><p>The following organizations may link to our Website without prior written approval:</p><ul><li>Government agencies;</li><li>Search engines;</li><li>News organizations;</li><li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li><li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li></ul><p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party\'s site.</p><p>We may consider and approve other link requests from the following types of organizations:</p><ul><li>commonly-known consumer and/or business information sources;</li><li>dot.com community sites;</li><li>associations or other groups representing charities;</li><li>online directory distributors;</li><li>internet portals;</li><li>accounting, law and consulting firms; and</li><li>educational institutions and trade associations.</li></ul><p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of&nbsp;Mailbux; and (d) the link is in the context of general resource information.</p><p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party\'s site.</p><p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to&nbsp;Mailbux. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p><p>Approved organizations may hyperlink to our Website as follows:</p><ul><li>By use of our corporate name; or</li><li>By use of the uniform resource locator being linked to; or</li><li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party\'s site.</li></ul><p>No use of&nbsp;Mailbux\'s logo or other artwork will be allowed for linking absent a trademark license agreement.</p><h3><strong>iFrames</strong></h3><p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p><h3><strong>Content Liability</strong></h3><p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p><h3><strong>Reservation of Rights</strong></h3><p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it\'s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p><h3><strong>Removal of links from our website</strong></h3><p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p><p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p><h3><strong>Disclaimer</strong></h3><p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p><ul><li>limit or exclude our or your liability for death or personal injury;</li><li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li><li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li><li>exclude any of our or your liabilities that may not be excluded under applicable law.</li></ul><p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p><p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-28 09:28:39', '2023-02-28 10:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `quick_shares`
--

CREATE TABLE `quick_shares` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `contact_id` int UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int UNSIGNED NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `view_count` int UNSIGNED NOT NULL DEFAULT '0',
  `download_count` int UNSIGNED NOT NULL DEFAULT '0',
  `access_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_url_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quick_share_access_logs`
--

CREATE TABLE `quick_share_access_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `quick_share_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `contact_id` int UNSIGNED NOT NULL DEFAULT '0',
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_bot` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `workspace_id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'workspace_name', 'Mailbux', '2023-02-28 09:28:39', '2023-02-28 09:31:48'),
(2, 1, 'logo', 'logo/j6jJl7Xaj7JvZseNGVM42gvxL9CbB9ZlpJcP9hRF.png', '2023-02-28 09:28:39', '2023-02-28 09:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_plan_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_monthly` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price_yearly` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price_two_years` decimal(8,2) UNSIGNED DEFAULT NULL,
  `price_three_years` decimal(8,2) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `features` text COLLATE utf8mb4_unicode_ci,
  `modules` text COLLATE utf8mb4_unicode_ci,
  `maximum_allowed_users` int UNSIGNED NOT NULL DEFAULT '0',
  `has_modules` tinyint(1) NOT NULL DEFAULT '0',
  `is_free` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `per_user_pricing` tinyint(1) NOT NULL DEFAULT '0',
  `users_limit` int UNSIGNED NOT NULL DEFAULT '0',
  `max_file_upload_size` int UNSIGNED NOT NULL DEFAULT '0',
  `file_space_limit` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `workspace_id`, `uuid`, `name`, `slug`, `paypal_plan_id`, `stripe_plan_id`, `price_monthly`, `price_yearly`, `price_two_years`, `price_three_years`, `description`, `features`, `modules`, `maximum_allowed_users`, `has_modules`, `is_free`, `is_active`, `is_featured`, `per_user_pricing`, `users_limit`, `max_file_upload_size`, `file_space_limit`, `created_at`, `updated_at`) VALUES
(1, 1, '89d43ecd-3ad3-439e-a3f6-99886b5fadbb', 'Basic', NULL, NULL, NULL, '4.99', '49.99', NULL, NULL, NULL, '[\"Single User\",\"1GB Storage\",\"Create & Share Documents\",\"Create & Share Spreadsheets\",\"Quick Share\",\"Image Editor\",\"Digital Asset Management\",\"Calendar\",\"Address Book\",\"Business Email Accounts\",\"Basic Support\"]', '[\"documents\",\"spreadsheets\",\"quick_shares\",\"images\",\"digital_assets\",\"calendar\",\"address_book\"]', 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-02-28 09:28:39', '2023-02-28 09:41:03'),
(2, 1, 'e24e4703-86ab-4e4e-a359-437f54aff788', 'Standard', NULL, NULL, NULL, '9.99', '99.99', NULL, NULL, NULL, '[\"2 Users\",\"5GB Storage\",\"Create & Share Documents\",\"Create & Share Spreadsheets\",\"Quick Share\",\"Image Editor\",\"Digital Asset Management\",\"Calendar\",\"Address Book\",\"Business Email Accounts\",\"Standard Support\"]', '[\"documents\",\"spreadsheets\",\"quick_shares\",\"images\",\"digital_assets\",\"calendar\",\"address_book\"]', 0, 0, 0, 1, 1, 0, 0, 0, 0, '2023-02-28 09:28:39', '2023-02-28 09:40:44'),
(3, 1, '211d4eff-a923-48d6-9a11-50b8ed9ed5be', 'Premium', NULL, NULL, NULL, '19.99', '199.99', NULL, NULL, NULL, '[\"Unlimited Users\",\"10GB Storage\",\"Create & Share Documents\",\"Create & Share Spreadsheets\",\"Quick Share\",\"Image Editor\",\"Digital Asset Management\",\"Calendar\",\"Address Book\",\"Business Email Accounts\",\"Premium Support\"]', '[\"documents\",\"spreadsheets\",\"quick_shares\",\"images\",\"digital_assets\",\"calendar\",\"address_book\"]', 0, 0, 0, 1, 0, 0, 0, 0, 0, '2023-02-28 09:28:39', '2023-02-28 09:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `gateway_id` int UNSIGNED NOT NULL DEFAULT '0',
  `plan_id` int UNSIGNED NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `workspace_id` int UNSIGNED NOT NULL DEFAULT '0',
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int UNSIGNED NOT NULL DEFAULT '0',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `access_key` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `workspace_id`, `uuid`, `role_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `city`, `state`, `country`, `zip`, `avatar`, `timezone`, `is_super_admin`, `access_key`, `password_reset_token`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 1, '939fc667-b9d2-46a8-bf5a-0c838818247f', 0, 'Raviv', 'Golov', 'raviv@mailbux.com', '$2y$10$EABCroZT7XPJSZhxaebps.y3YY6Z65ZgtIn0DXJG/sVz281C3WoZO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 'mT012qzV20YWPIR0uUjJP2vEZLRgNVM2', '2023-03-14 07:31:15', '2023-02-28 09:28:39', '2023-03-14 07:31:15'),
(2, 1, '706ef232-59e0-40fa-8748-d6486850d749', 0, 'dev', 'dev', 'dev@mailbux.com', '$2y$10$2or2/USxNzp4PKSFhJ7CYuILrtTe1AOXquwMCH2gcdiDzmC89uP/e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2023-03-14 10:25:34', '2023-02-28 10:45:30', '2023-03-14 10:25:34'),
(3, 2, 'd06c17f5-bf1d-40a4-a79a-6e93146591b6', 0, 'dev', 'dev', 'dev1@mailbux.com', '$2y$10$geEl4S6Z44HylJgmjH5hV.vJ44xNzrJLVA91zRohHd4c9MlC4HEiG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2023-03-10 08:41:34', '2023-02-28 10:46:22', '2023-03-10 08:41:34'),
(4, 3, 'e84a9568-2d05-4b71-8411-a4bb280bb726', 0, 'libewoubsAX', 'libewoubsAX', 'andrewjohnson@reg.pw', '$2y$10$8r45Bx0jAar7mzXSiAugdu2hBLpWGZv25xLLwfxRku4Sr4p1laOqa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-02-28 11:43:14', '2023-02-28 11:43:14'),
(5, 4, 'e109e952-bd44-4f57-9742-91393d8d8c5a', 0, 'carina', 'CIAZ', 'carinadiazisme@gmail.com', '$2y$10$59cF3g78wEMxVHtHMWHJCeZAPKQ2vsi7CJ0PNsIR1vO3KlhZpHEay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-02-28 14:17:50', '2023-02-28 14:17:50'),
(6, 5, 'ab3eec28-628b-4b62-9d74-8d83e86da351', 0, 'Demo', 'User', 'kristopherpawellbmc80@gmail.com', '$2y$10$YI9NOPN3xgyF8hpjFKNpnen7.Anx0I1u1rEnSS5jH0A1FE7onYVO2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-02-28 15:26:25', '2023-02-28 15:26:25'),
(7, 6, '32321c54-3819-41af-9043-a4454c7b3fbb', 0, 'test', 'test', 'dev2@gmail.com', '$2y$10$PWb/zjrWicR/0Lh3moASDeSYFTADHmKyQgv4ScX3iJrgrgX9Okpx2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-02-28 15:35:11', '2023-02-28 15:35:11'),
(8, 7, '0929140d-7aa4-45e8-8bc0-c60a201fe82e', 0, 'XmeluncSZ', 'XmeluncSZ', 'swarada@yandex.com', '$2y$10$wajclloKmkbcPGZun1kGUOs0tzljQbzgVxkrJp2er4O5OXLpLicYC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-01 05:17:23', '2023-03-01 05:17:23'),
(9, 8, '6ca71b62-60b7-4258-b7e0-1257a9f6d606', 0, 'XmlialaLR', 'XmlialaLR', 'alisnovosib@yandex.com', '$2y$10$ZmNl46tuO0IoK2n4wE9NXuMTCrMDZaVMn/INfaGFzxDr/rnvgmrca', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-01 09:54:19', '2023-03-01 09:54:19'),
(10, 9, '73fe0f29-dae5-42b1-8f17-f87d398883b0', 0, 'bydwxgrvejpBS', 'lvczzdxistbBS', 'rlxnptpxdop@hotmails.com', '$2y$10$Ci4Y6x9OM.lgUcXDf.XmrOJc0clZsNJvMYeGEewNhak9lP7csTWLi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-01 21:57:26', '2023-03-01 21:57:26'),
(11, 10, '78f01729-e636-46f6-9481-0cdb0a12c8e1', 0, 'dxzyybyrarrBS', 'fyuwyetbcuoBS', 'outurwbxidz@hotmails.com', '$2y$10$jqt7NEcL.UliT8MMjmzFceLCYfIEE2lkW.l0/.fAvw0ueMqkAp..C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-01 22:07:54', '2023-03-01 22:07:54'),
(12, 11, '37ba4d2a-04db-454c-bd5c-1dec93af997d', 0, 'GeorgiababJN', 'GeorgiababJN', 'agnessavolkova@seobomba.com', '$2y$10$x04L5kOw430pKfLJuRPS8OsHcpBWMWuqnVY2wxKGNWFqT3ifbI2vK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-02 03:24:29', '2023-03-02 03:24:29'),
(13, 12, 'faf26a73-b14a-4d9f-aa9c-8f661ed9dd62', 0, 'Pianino.XMC.PLXA', 'Pianino.XMC.PLXA', 'xpianofuture@xmc.pl', '$2y$10$8faRLjnWoBs2fZGBOrmCm.0RQGHSweHc/q4gXA5melHuysMbEShG.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-02 04:59:44', '2023-03-02 04:59:44'),
(14, 13, '8b4b5ebf-9882-4191-96dc-5df0cebf8405', 0, 'SQkrDYZj', 'NUwGYvPH', 'vladimirh3c1s@outlook.com', '$2y$10$Az7ihUlOY8UUrIqad6pIo.3dcmRZP.ZcpBARqQmAogD8EQ2JRNGm6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-02 06:24:38', '2023-03-02 06:24:38'),
(15, 14, 'b4f6be2c-5028-40af-8de3-27eb456237b4', 0, 'BillysporpPS', 'BillysporpPS', 'bablydesuza@gmail.com', '$2y$10$FjVc7/D1eu0aJsdAqeBB6uBxYeE8ZimhLupWQAj7oq85iYEGpKE0q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-03 09:38:52', '2023-03-03 09:38:52'),
(16, 15, '445a4489-efb3-462a-be4c-856eeedeb903', 0, 'normanjy16', 'normanjy16', 'ia4@takumi7310.michio35.excitemail.fun', '$2y$10$wsrfv.mhmYcCRrU8nwDGQeZ6PZRLmUBtH6uvJl1owWIU1NEdrzzeq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-05 00:43:40', '2023-03-05 00:43:40'),
(17, 16, '3987f637-e1de-445f-ab02-3c3d5ae87b08', 0, 'RobertValGX', 'RobertValGX', 'simpsonalex2025@outlook.com', '$2y$10$YZSiEvgWcXB7G8kPZm3/De4rz/Lh3F6hI/AMXTX2rxs2I4c3zOivy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-05 02:35:47', '2023-03-05 02:35:47'),
(18, 17, '92bafa29-ef52-4de2-a3e7-25f2b473eab6', 0, 'Anna_Nor', 'Anna_Nor', 'petrivaaanov@yandex.ru', '$2y$10$A5RUAUmyTO/4mrdhCa/GTOSAqP4jScSPHrV0Gdc/QbRdTKyeSFcK6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-06 20:16:24', '2023-03-06 20:16:24'),
(19, 18, 'cdb6f93e-cbe6-4f27-a8d3-ce5b5ecc3f57', 0, 'GvDEkerq', 'nTcUtbdAVYRlkMBy', 'georgiynt6zg@outlook.com', '$2y$10$Hi7RxPqV3I.I8ptVE08pVOk2dnt3j.teeGcU16m4nAAfHLpyN3Bwu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-07 10:34:19', '2023-03-07 10:34:19'),
(20, 19, '6891a45f-56cf-48ef-a0e7-025af6c0cdb3', 0, 'Mefijwdihwdjwsjdhwjqsqodkwfk fjebfhjhdjwshfewifejqwwqfewjfewhgewu kfwejfwefhewgeuwh:jfefehfejfjehfie//NJjdshdjwfhwu оаипруафравгпшцурафцоварквшпругвыовапцушгысвыарршрпшц jcsafsafhawfjewoifhe ufhdfwjdhewifgewiufhjadwfewi mailbux.com', 'Mefijwdihwdjwsjdhwjqsqodkwfk fjebfhjhdjwshfewifejqwwqfewjfewhgewu kfwejfwefhewgeuwh:jfefehfejfjehfie//NJjdshdjwfhwu оаипруафравгпшцурафцоварквшпругвыовапцушгысвыарршрпшц jcsafsafhawfjewoifhe ufhdfwjdhewifgewiufhjadwfewi mailbux.com', 'a.lbe.r.t.han.shin49@gmail.com', '$2y$10$ZR.ydWY48dKbNYDOhTvZJeeNV40TObfoFiPQURYDetr/DBAqY9qq6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-07 16:24:30', '2023-03-07 16:24:30'),
(21, 20, 'c4082c21-c766-4b50-bcac-e52b221ee893', 0, 'ColleenMorRV', 'ColleenMorRV', 'xrum1777@outlook.com', '$2y$10$xY5Q3wFB2gmnSiJAxaVzVeRJ.rMXyMs2KxkgByhI8xzE/NeK0TTwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-09 23:47:12', '2023-03-09 23:47:12'),
(22, 21, '249d14cf-fe40-46d2-80fd-dccfbfb5c304', 0, 'Masha_dabYV', 'Masha_dabYV', 'serpetrov11111@yandex.ru', '$2y$10$DjbTUykfGUCwx86pP5mF4u.t6dFiWuMpBVpjZgDxF8HI5CjVtmpf6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-10 07:48:58', '2023-03-10 07:48:58'),
(23, 22, 'fd8e3d38-4629-4298-afa0-c1b010e1caf4', 0, 'JEMQjSTZUwhXD', 'ygoqpXYJhw', 'kirillegorovq1@outlook.com', '$2y$10$yHcaZz6osdMHG2JUoi/jXusowVDPS9R4P2LbW9KJnYIQYRZeqLzEW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-11 16:35:01', '2023-03-11 16:35:01'),
(24, 23, '584fbc91-8f8b-47fc-a6b3-6745f3806d98', 0, 'NathanAmemaDQ', 'NathanAmemaDQ', 'menhos7@rambler.ru', '$2y$10$GC0Xfc3GV56ZyLjevhS7M.gMfPGRQjXyzTUe7IYdM9zzQ2Dr6J.iK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-12 04:14:10', '2023-03-12 04:14:10'),
(25, 24, '62ed778c-ef23-43fc-9e57-e31b9c7da4de', 0, 'EscortForceYI', 'EscortForceYI', 'jamesmorris@reg.pw', '$2y$10$VhDnCdRhLmKaQsvyhtzDvelZ23Fbm8xNSJ1NIRWdJGhE.UPzFh54y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-13 01:11:24', '2023-03-13 01:11:24'),
(26, 25, '071783e3-53a4-492f-bb5e-d6e7c02f00b3', 0, 'LucilleHooftTC', 'LucilleHooftTC', 'sigitszorin@yandex.ru', '$2y$10$w5Hwd8DrN21wNHsdEaWhneAnxHR9WjJGdBPlh9xMugdpqW.pEh2UC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-13 09:33:28', '2023-03-13 09:33:28'),
(27, 26, '81b6005f-e57a-4b18-8a61-13cc217e6278', 0, 'EddiedweryPE', 'EddiedweryPE', 'WszgaHk3vV7I@softdisc.site', '$2y$10$HkFuJTmZD/Sx3RdB7imIW.IHlwz0mnN9mzQ/xIFeWXqiomDqaa/AC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '2023-03-14 08:05:12', '2023-03-14 08:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `workspaces`
--

CREATE TABLE `workspaces` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `is_on_free_trial` tinyint(1) NOT NULL DEFAULT '0',
  `free_trial_days` int UNSIGNED NOT NULL DEFAULT '0',
  `free_trial_ends_at` date DEFAULT NULL,
  `plan_id` int UNSIGNED NOT NULL DEFAULT '0',
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_start_date` date DEFAULT NULL,
  `next_renewal_date` date DEFAULT NULL,
  `plan_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `plan_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_interval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_interval_count` int UNSIGNED NOT NULL DEFAULT '0',
  `plan_storage_space` int UNSIGNED NOT NULL DEFAULT '0',
  `plan_users` int UNSIGNED NOT NULL DEFAULT '0',
  `plan_contacts` int UNSIGNED NOT NULL DEFAULT '0',
  `is_on_grace_period` tinyint(1) NOT NULL DEFAULT '0',
  `grace_period_days` int UNSIGNED NOT NULL DEFAULT '0',
  `grace_period_ends_at` date DEFAULT NULL,
  `modules` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workspaces`
--

INSERT INTO `workspaces` (`id`, `uuid`, `owner_id`, `name`, `is_active`, `is_subscribed`, `is_on_free_trial`, `free_trial_days`, `free_trial_ends_at`, `plan_id`, `plan_name`, `plan_type`, `term`, `subscription_start_date`, `next_renewal_date`, `plan_amount`, `plan_currency`, `plan_interval`, `plan_interval_count`, `plan_storage_space`, `plan_users`, `plan_contacts`, `is_on_grace_period`, `grace_period_days`, `grace_period_ends_at`, `modules`, `created_at`, `updated_at`) VALUES
(1, '52ed04f0-aeb9-43fa-98ea-0d9d99e44233', 1, 'Admin Workspace', 1, 0, 0, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-02-28 09:28:39', '2023-02-28 09:28:39'),
(2, 'c5f947d9-2582-4f22-a44b-47e2ed0ed9f3', 0, 'dev\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-02-28 10:46:22', '2023-02-28 10:46:22'),
(3, '3fc9d8bc-b7ce-4f54-b984-9ff454a95f00', 0, 'libewoubsAX\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-02-28 11:43:14', '2023-02-28 11:43:14'),
(4, '288c3601-bfe4-4c71-84df-6f4ba0eb9b0f', 0, 'carina\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-02-28 14:17:50', '2023-02-28 14:17:50'),
(5, '735c8df2-5db5-401b-8e6b-d82afc69aa77', 0, 'Demo\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-02-28 15:26:25', '2023-02-28 15:26:25'),
(6, '8f970e2f-60a1-40d2-9976-49d071ad5628', 0, 'test\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-02-28 15:35:10', '2023-02-28 15:35:10'),
(7, '05f2ea45-dcbc-461c-bf0f-6aa075096fd2', 0, 'XmeluncSZ\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-01 05:17:23', '2023-03-01 05:17:23'),
(8, 'bcdd1df1-2847-42ef-94a5-e9e5017aeabd', 0, 'XmlialaLR\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-01 09:54:19', '2023-03-01 09:54:19'),
(9, 'e070c425-5f90-43c3-b233-39868743a6e6', 0, 'bydwxgrvejpBS\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-01 21:57:26', '2023-03-01 21:57:26'),
(10, 'bcf91aa0-2b1e-4c5e-98a2-2058ea42884d', 0, 'dxzyybyrarrBS\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-01 22:07:54', '2023-03-01 22:07:54'),
(11, '112ca4fb-6230-4485-b3da-bca4ea6195d8', 0, 'GeorgiababJN\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-02 03:24:29', '2023-03-02 03:24:29'),
(12, 'e6039ed3-16bf-41f0-b7fd-f4ac97ea50ac', 0, 'Pianino.XMC.PLXA\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-02 04:59:44', '2023-03-02 04:59:44'),
(13, '89d5f054-6c05-45df-abe1-f34a47be61a5', 0, 'SQkrDYZj\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-02 06:24:38', '2023-03-02 06:24:38'),
(14, 'a0dc194b-8288-4404-8a04-06787e06f1a9', 0, 'BillysporpPS\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-03 09:38:52', '2023-03-03 09:38:52'),
(15, '46008403-0f4d-4f3c-ad53-85043047f347', 0, 'normanjy16\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-05 00:43:40', '2023-03-05 00:43:40'),
(16, 'a6d105fc-ac4e-4b3a-8768-9ef9c9be2206', 0, 'RobertValGX\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-05 02:35:47', '2023-03-05 02:35:47'),
(17, 'dc964a78-6383-4e37-947c-d6db07ff096d', 0, 'Anna_Nor\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-06 20:16:24', '2023-03-06 20:16:24'),
(18, '1e575127-e372-4b89-858f-fbc34fdb9426', 0, 'GvDEkerq\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-07 10:34:19', '2023-03-07 10:34:19'),
(19, 'd3103306-a4ba-4947-bc8e-790994e91205', 0, 'Mefijwdihwdjwsjdhwjqsqodkwfk fjebfhjhdjwshfewifejqwwqfewjfewhgewu kfwejfwefhewgeuwh:jfefehfejfjehfie//NJjdshdjwfhwu оаипруафравгпшцурафцоварквшпругвыовапцушгысвыарршрпшц jcsafsafhawfjewoifhe ufhdfwjdhewifgewiufhjadwfewi mailbux.com\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-07 16:24:30', '2023-03-07 16:24:30'),
(20, '7dbb3bb5-423a-4d40-b6d4-23f6d4100af7', 0, 'ColleenMorRV\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-09 23:47:12', '2023-03-09 23:47:12'),
(21, 'bd09e706-0d26-4a3d-a87d-36d44033f1a2', 0, 'Masha_dabYV\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-10 07:48:58', '2023-03-10 07:48:58'),
(22, '26b12a2c-1eae-4931-a8b6-8e6f276f3ed3', 0, 'JEMQjSTZUwhXD\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-11 16:35:01', '2023-03-11 16:35:01'),
(23, '8e0f8a1c-1d79-40cc-99bb-470e7b751a72', 0, 'NathanAmemaDQ\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-12 04:14:10', '2023-03-12 04:14:10'),
(24, 'c44c70c5-a475-400c-92cc-e8cdd5c22168', 0, 'EscortForceYI\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-13 01:11:24', '2023-03-13 01:11:24'),
(25, 'ee87d749-d5ac-482a-8be6-dfab3e279649', 0, 'LucilleHooftTC\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-13 09:33:28', '2023-03-13 09:33:28'),
(26, 'b6a40f22-098c-4acb-afa5-fabf87a42c64', 0, 'EddiedweryPE\'s workspace', 1, 0, 1, 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, '0.00', NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, NULL, '2023-03-14 08:05:12', '2023-03-14 08:05:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_events`
--
ALTER TABLE `calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_shares`
--
ALTER TABLE `quick_shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_share_access_logs`
--
ALTER TABLE `quick_share_access_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workspaces`
--
ALTER TABLE `workspaces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calendar_events`
--
ALTER TABLE `calendar_events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quick_shares`
--
ALTER TABLE `quick_shares`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quick_share_access_logs`
--
ALTER TABLE `quick_share_access_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `workspaces`
--
ALTER TABLE `workspaces`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
