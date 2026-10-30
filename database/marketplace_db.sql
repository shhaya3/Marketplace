-- phpMyAdmin SQL Dump
-- version 5.2.3-2.fc44
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 23, 2026 at 11:49 AM
-- Server version: 11.8.8-MariaDB
-- PHP Version: 8.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `description`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Hospital', 'hospital', '🏥', NULL, 1, 1, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(2, 'School', 'school', '🏫', NULL, 1, 2, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(3, 'Restaurant', 'restaurant', '🍽️', NULL, 1, 3, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(4, 'Hotel', 'hotel', '🏨', NULL, 1, 4, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(5, 'Real Estate', 'real-estate', '🏠', NULL, 1, 5, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(6, 'Chartered Accountant', 'ca', '📊', NULL, 1, 6, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(7, 'Lawyer', 'lawyer', '⚖️', NULL, 1, 7, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(8, 'Manufacturer', 'manufacturer', '🏭', NULL, 1, 8, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(9, 'Temple', 'temple', '🛕', NULL, 1, 9, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(10, 'Coaching Institute', 'coaching', '📚', NULL, 1, 10, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(11, 'Ecommerce', 'ecommerce', '🛒', NULL, 1, 11, '2026-10-23 06:17:39', '2026-10-23 06:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` bigint(20) UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `business_category` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_11_082958_create_categories_table', 1),
(5, '2026_07_11_082959_create_templates_table', 1),
(6, '2026_07_11_083000_create_template_features_table', 1),
(7, '2026_07_11_083001_create_template_pages_table', 1),
(8, '2026_07_11_083002_create_template_screenshots_table', 1),
(9, '2026_07_11_083003_create_enquiries_table', 1),
(10, '2026_07_11_083004_create_activity_logs_table', 1),
(11, '2026_07_11_083005_create_settings_table', 1),
(12, '2026_10_13_065746_add_role_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `group` varchar(255) NOT NULL DEFAULT 'general',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `preview_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `view_count` int(11) NOT NULL DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `category_id`, `name`, `slug`, `short_description`, `long_description`, `thumbnail`, `preview_url`, `status`, `view_count`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 1, 'CarePoint Hospital', 'carepoint-hospital', 'Complete hospital site with appointment booking, department directory, and doctor profiles.', NULL, NULL, NULL, 'active', 161, 'CarePoint Hospital Website Template', 'Professional hospital website template with appointments, departments, and doctor listings.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(2, 2, 'Sunrise Public School', 'sunrise-public-school', 'School site with admission forms, academic calendar, faculty profiles, and event gallery.', NULL, NULL, NULL, 'active', 153, 'Sunrise Public School Website Template', 'Professional school website template with admissions, academics, and faculty pages.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(3, 3, 'Spice Garden', 'spice-garden-restaurant', 'Warm restaurant site with digital menu, table reservation system, and photo gallery.', NULL, NULL, NULL, 'active', 68, 'Spice Garden Restaurant Website Template', 'Restaurant website template with menu, reservations, and gallery.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(4, 4, 'Grand Stay Hotel', 'grand-stay-hotel', 'Luxury hotel site with room showcase, amenities, online booking flow, and guest reviews.', NULL, NULL, NULL, 'active', 24, 'Grand Stay Hotel Website Template', 'Hotel website template with room booking, amenities, and guest reviews.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(5, 5, 'ProProperty', 'proproperty-real-estate', 'Property listings site with advanced search filters, agent profiles, and enquiry forms.', NULL, NULL, NULL, 'active', 38, 'ProProperty Real Estate Website Template', 'Real estate website template with property listings, search, and agent profiles.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(6, 6, 'TrustLedger CA', 'trustledger-ca-firm', 'Professional accounting firm site with services, team bios, and appointment booking.', NULL, NULL, NULL, 'active', 43, 'TrustLedger CA Firm Website Template', 'Chartered accountant website template with services, team, and appointments.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(7, 7, 'Lexis Law Firm', 'lexis-law-firm', 'Law firm site with practice areas, attorney profiles, case studies, and consultation form.', NULL, NULL, NULL, 'active', 107, 'Lexis Law Firm Website Template', 'Law firm website template with practice areas, attorneys, and case studies.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(8, 8, 'IndusTech', 'industech-manufacturer', 'B2B manufacturer site with product catalogue, certifications, capabilities, and enquiry form.', NULL, NULL, NULL, 'active', 33, 'IndusTech Manufacturer Website Template', 'Manufacturer website template with products, certifications, and B2B enquiry.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(9, 9, 'Shree Mandir', 'shree-mandir-temple', 'Temple site with event calendar, daily schedule, online donation, and photo gallery.', NULL, NULL, NULL, 'active', 39, 'Shree Mandir Temple Website Template', 'Temple website template with events, schedule, donations, and gallery.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(10, 10, 'EduReach Institute', 'edureach-coaching-institute', 'Coaching site with course listing, results board, fee structure, and online enrolment form.', NULL, NULL, NULL, 'active', 22, 'EduReach Coaching Institute Website Template', 'Coaching institute website template with courses, results, and enrolment.', '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(11, 11, 'ShopEase', 'shopease-ecommerce', 'Full ecommerce site with product catalogue, cart, checkout, and order tracking pages.', NULL, NULL, NULL, 'active', 163, 'ShopEase Ecommerce Website Template', 'Ecommerce website template with shop, cart, checkout, and order tracking.', '2026-10-23 06:17:39', '2026-10-23 06:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `template_features`
--

CREATE TABLE `template_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` bigint(20) UNSIGNED NOT NULL,
  `feature` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template_pages`
--

CREATE TABLE `template_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `template_screenshots`
--

CREATE TABLE `template_screenshots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@bizmarket.in', 'user', NULL, '$2y$12$aox8v7GObY6qmqdRyO8Qtewf2gi/M/Q3Qw5nbzdg2cqCenB/TOrUC', NULL, '2026-10-23 06:17:39', '2026-10-23 06:17:39'),
(2, 'Test User', 'test@example.com', 'user', '2026-10-23 06:17:39', '$2y$12$CSWD.s1oiYsmMw86jkdtJe6dM1BFHg59OwWm4fM5CPS3MOockZEX2', 'RVPNf3n5qU', '2026-10-23 06:17:39', '2026-10-23 06:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enquiries_template_id_foreign` (`template_id`),
  ADD KEY `enquiries_status_index` (`status`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `templates_slug_unique` (`slug`),
  ADD KEY `templates_category_id_status_index` (`category_id`,`status`);

--
-- Indexes for table `template_features`
--
ALTER TABLE `template_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_features_template_id_foreign` (`template_id`);

--
-- Indexes for table `template_pages`
--
ALTER TABLE `template_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_pages_template_id_foreign` (`template_id`);

--
-- Indexes for table `template_screenshots`
--
ALTER TABLE `template_screenshots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_screenshots_template_id_foreign` (`template_id`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `template_features`
--
ALTER TABLE `template_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template_pages`
--
ALTER TABLE `template_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `template_screenshots`
--
ALTER TABLE `template_screenshots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD CONSTRAINT `enquiries_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `templates_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `template_features`
--
ALTER TABLE `template_features`
  ADD CONSTRAINT `template_features_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `template_pages`
--
ALTER TABLE `template_pages`
  ADD CONSTRAINT `template_pages_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `template_screenshots`
--
ALTER TABLE `template_screenshots`
  ADD CONSTRAINT `template_screenshots_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
