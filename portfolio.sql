-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2026 at 02:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-portfolio_context', 's:1668:\"You are Ibrahim Remili (virtual AI version), a Full Stack Developer. You speak in first person as Ibrahim. Be friendly, professional, and enthusiastic about technology.\n\nABOUT ME:\nfrom algeria (alger) birkhadem im 23yo , i specialise in laravel and reactmy favorite language is php and laravel as a framework want to learn nativephp so i can build mobile apps \n\nMY SKILLS:\n- Javascript [language]\n- PHP [language]\n- react [framework]\n- laravel [framework]\n- livewire [framework]\n- bootstrap [library]\n- tailwind [library]\n- Mysql [database]\n- arch linux [tool]\n- git [tool]\n- krita  [other]\n- pc building [other]\n- html [language]\n- css [language]\n\nMY PROJECTS:\n- Metrowise ecommerce website: A fully customizable e-commerce web application built with Laravel, Blade, Livewire, and Tailwind. Featuring a clean UI and powerful admin dashboard t\n\nMY WORK EXPERIENCE:\n-  at Uprize (2025-12-01 00:00:00 - Present)\n\nMY EDUCATION:\n- geology at usthb (2020-11-01 00:00:00 - 2025-02-01 00:00:00)\n\nMY CERTIFICATIONS:\n- Javascript by codecacademy \n- PHP by codecacademy\n\nLANGUAGES I SPEAK:\n- English\n- Arabic\n- Francais\n\n\nINSTRUCTIONS:\n- Always respond in first person as Ibrahim Remili\n- Be enthusiastic and passionate about technology\n- When asked about skills, projects, or experience, reference the specific details above\n- Keep responses concise but informative (2-4 sentences)\n- If asked about something not in your knowledge, be honest and direct them to contact me\n- Use emojis occasionally to be friendly 😊\n- If someone asks to hire or contact me, encourage them to use the contact form on the website or phone me 0556264762 or email me mohmamadremili500@gmail.com \n\";', 1772886910);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `issuer` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `profile_id`, `name`, `issuer`, `year`, `url`, `pdf_path`, `created_at`, `updated_at`, `is_active`, `order`) VALUES
(1, 1, 'Javascript', 'codecacademy ', '2025', 'https://127.0.0.1', 'certifications/1SNRwju3Y8N6vtmmhLHFXAPrEFZC4vY0kyUsZ7wz.pdf', '2026-01-27 18:30:40', '2026-02-05 17:09:52', 1, 0),
(2, 1, 'PHP', 'codecacademy', '2025', 'https://127.0.0.1', 'certifications/RVn9q3dFMgmCD7dBT2uBxR0Vrb7kZYbMc6V5A0zy.pdf', '2026-02-05 17:32:04', '2026-02-05 17:32:04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chat_conversations`
--

CREATE TABLE `chat_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_conversations`
--

INSERT INTO `chat_conversations` (`id`, `session_id`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, '5M0dYfrMXFNmzcgOk5poYbIDYsCX55GwtBfFtgLS', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', '2026-02-10 15:13:29', '2026-02-10 15:13:29'),
(2, '5M0dYfrMXFNmzcgOk5poYbIDYsCX55GwtBfFtgLS', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', '2026-02-10 16:09:36', '2026-02-10 16:09:36'),
(3, '5M0dYfrMXFNmzcgOk5poYbIDYsCX55GwtBfFtgLS', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', '2026-02-10 16:09:40', '2026-02-10 16:09:40'),
(4, '5M0dYfrMXFNmzcgOk5poYbIDYsCX55GwtBfFtgLS', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', '2026-02-10 16:31:02', '2026-02-10 16:31:02'),
(5, '5M0dYfrMXFNmzcgOk5poYbIDYsCX55GwtBfFtgLS', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', '2026-02-10 16:37:15', '2026-02-10 16:37:15'),
(6, '5M0dYfrMXFNmzcgOk5poYbIDYsCX55GwtBfFtgLS', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', '2026-02-10 16:42:33', '2026-02-10 16:42:33'),
(7, '5M0dYfrMXFNmzcgOk5poYbIDYsCX55GwtBfFtgLS', '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', '2026-02-10 16:49:24', '2026-02-10 16:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('user','assistant') NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `conversation_id`, `role`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 'assistant', 'Hi there! 👋 I\'m the digital assistant for this portfolio. Feel free to ask me about my projects, skills, experience, or anything tech-related!', '2026-02-10 15:13:29', '2026-02-10 15:13:29'),
(2, 1, 'user', 'What are your main skills?', '2026-02-10 16:09:27', '2026-02-10 16:09:27'),
(3, 2, 'assistant', 'Fresh start! 🎉 What would you like to know?', '2026-02-10 16:09:36', '2026-02-10 16:09:36'),
(4, 2, 'user', 'hi', '2026-02-10 16:09:38', '2026-02-10 16:09:38'),
(5, 3, 'assistant', 'Fresh start! 🎉 What would you like to know?', '2026-02-10 16:09:40', '2026-02-10 16:09:40'),
(6, 3, 'user', 'What is your experience?', '2026-02-10 16:11:03', '2026-02-10 16:11:03'),
(7, 3, 'user', 'hi', '2026-02-10 16:12:29', '2026-02-10 16:12:29'),
(8, 4, 'assistant', 'Fresh start! 🎉 What would you like to know?', '2026-02-10 16:31:02', '2026-02-10 16:31:02'),
(9, 4, 'user', 'What are your main skills?', '2026-02-10 16:31:04', '2026-02-10 16:31:04'),
(10, 4, 'assistant', 'I\'m having trouble processing that right now. Feel free to reach out via the contact form for a direct response!', '2026-02-10 16:31:05', '2026-02-10 16:31:05'),
(11, 5, 'assistant', 'Fresh start! 🎉 What would you like to know?', '2026-02-10 16:37:15', '2026-02-10 16:37:15'),
(12, 5, 'user', 'What are your main skills?', '2026-02-10 16:37:18', '2026-02-10 16:37:18'),
(13, 5, 'assistant', 'I\'m having trouble processing that right now. Feel free to reach out via the contact form for a direct response!', '2026-02-10 16:37:18', '2026-02-10 16:37:18'),
(14, 6, 'assistant', 'Fresh start! 🎉 What would you like to know?', '2026-02-10 16:42:33', '2026-02-10 16:42:33'),
(15, 6, 'user', 'What are your main skills?', '2026-02-10 16:42:38', '2026-02-10 16:42:38'),
(16, 6, 'assistant', 'I\'m having trouble processing that right now. Feel free to reach out via the contact form for a direct response!', '2026-02-10 16:42:38', '2026-02-10 16:42:38'),
(17, 7, 'assistant', 'Fresh start! 🎉 What would you like to know?', '2026-02-10 16:49:24', '2026-02-10 16:49:24'),
(18, 7, 'user', 'hi', '2026-02-10 16:49:31', '2026-02-10 16:49:31'),
(19, 7, 'assistant', 'Hmm, something went wrong on my end. Mind rephrasing your question?', '2026-02-10 16:49:31', '2026-02-10 16:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `profile_id`, `degree`, `institution`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`, `is_active`, `order`) VALUES
(1, 1, 'geology', 'usthb', '2020-11-01', '2025-02-01', 'licence en geologie  ', '2026-01-27 18:51:46', '2026-02-05 17:05:06', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `profile_id`, `role`, `company_logo`, `company`, `location`, `start_date`, `end_date`, `description`, `created_at`, `updated_at`, `is_active`, `order`) VALUES
(3, 1, 'Full stack developer', 'experiences/VCcDZHXSdsyZzWpOZujUY9qT4rUANQblJ5V2PiVk.png', 'Uprize', 'Remote', '2025-12-01', NULL, '', '2026-02-05 17:30:12', '2026-02-05 17:30:12', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
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
  `attempts` tinyint(3) UNSIGNED NOT NULL,
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
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `profile_id`, `name`, `created_at`, `updated_at`, `is_active`, `order`) VALUES
(1, 1, 'English', '2026-01-27 18:52:31', '2026-01-27 18:52:31', 1, 0),
(2, 1, 'Arabic', '2026-01-27 18:52:42', '2026-01-27 18:52:42', 1, 0),
(3, 1, 'Francais', '2026-01-27 18:52:46', '2026-01-27 18:52:46', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'hig', 'bookspizza31@gmail.com', 'i want ghhghghgh', '2026-02-05 18:18:02', '2026-02-05 18:18:02');

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
(19, '0001_01_01_000000_create_users_table', 1),
(20, '0001_01_01_000001_create_cache_table', 1),
(21, '0001_01_01_000002_create_jobs_table', 1),
(22, '2026_01_23_020531_create_profiles_table', 1),
(23, '2026_01_23_020625_create_projects_table', 1),
(24, '2026_01_23_020640_create_skills_table', 1),
(25, '2026_01_23_020709_create_messages_table', 1),
(26, '2026_01_24_194710_add_category_to_skills_table', 1),
(27, '2026_01_25_000000_add_project_categories', 1),
(28, '2026_01_25_134957_add_show_level_to_skills_table', 1),
(29, '2026_01_27_000000_create_exeperiences_table', 1),
(30, '2026_01_27_000001_create_education_table', 1),
(31, '2026_01_27_000002_create_certifications_table', 1),
(32, '2026_01_27_000003_create_languages_table', 1),
(33, '2026_01_27_172915_add_is_active_and_order_to_career_tables', 1),
(35, '2026_02_10_151702_create_chat_conversations_table', 2),
(36, '2026_02_10_171619_add_missing_columns_to_skills_table', 3),
(37, '2026_02_10_172425_add_missing_columns_to_projects_table', 4);

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
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `github` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `image`, `title`, `bio`, `email`, `github`, `linkedin`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'ibrahim remili', 'profile/MYxA7VyjvKyAubqskshDwHvVPhJcrmjFiEIoc4jp.jpg', 'Full stack developer', 'from algeria (alger) birkhadem im 23yo , i specialise in laravel and react', 'mohamedremili500@gmail.com', 'https://github.com/ibra01001', 'https://fr.linkedin.com/', NULL, '2026-01-27 18:30:08', '2026-02-10 13:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `technologies` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `demo_link` varchar(255) DEFAULT NULL,
  `github_link` varchar(255) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `category` varchar(255) NOT NULL DEFAULT 'other',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `technologies`, `image`, `demo_link`, `github_link`, `featured`, `is_active`, `order`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Metrowise ecommerce website', 'A fully customizable e-commerce web application built with Laravel, Blade, Livewire, and Tailwind. Featuring a clean UI and powerful admin dashboard to manage orders, products, stock, revenue, categories, discounts, coupons, delivery prices, and more. The admin can personalize every aspect of the site, including themes, colors, and logos, offering complete control over the shopping experience.', NULL, 'projects/nSFOKtVbwx8hXMwHpwVtnZ5QqVs2UCqJzV58biIi.png', 'https://metrowisedz.com/', 'https://metrowisedz.com/', 1, 1, 0, 'real life project', '2026-01-29 16:05:17', '2026-01-29 16:05:42');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HvormMMkp9S6IBaDELHdw0mrkm9sbETRE9HbWcsf', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia1Q4M1JrU0pGaGowQWoxaHE4TXNpN1piT29nMm1KWGFLaTVhaDl2SyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dCI7czo1OiJyb3V0ZSI7czo1OiJhYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1771537394),
('Kla84Qk5yUcmCGztyLFHeDE4C0MChObqoqi89IG6', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNFhZaFVxUEFxUWw0b1Y2RWRaUEVNbjZ3eWs2enJBVDJFVU1yUDV6dSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dCI7czo1OiJyb3V0ZSI7czo1OiJhYm91dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fX0=', 1772883437),
('lyUGp3uLadYyD5tilotXewk2WMgUcwyaDYIGnnKQ', 2, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiS0ZWdG5xdEFsNDQ0OHd3MWVTbmt6TllQeTl2Z0k1eFhGWTVETldnciI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY29udGFjdCI7czo1OiJyb3V0ZSI7czo3OiJjb250YWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1772124182);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `show_level` tinyint(1) NOT NULL DEFAULT 1,
  `category` varchar(255) NOT NULL DEFAULT 'other',
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `image`, `description`, `level`, `is_active`, `show_level`, `category`, `order`, `created_at`, `updated_at`) VALUES
(3, 'Javascript', 'skills/0Gq3HFQ2iFyHxfSlv4SLGBFW0gJKSrr2H33PzOAM.png', 'i have worked with js for a year , in personal projects and real world project ', NULL, 1, 0, 'language', 0, '2026-01-27 20:14:22', '2026-01-27 20:23:34'),
(4, 'PHP', 'skills/zRBs7SRlFupSlN4G5mrNiDF05HEb5kfNbvVKU8Md.png', 'php ,my favorite language and i use it a lot in my projects ', NULL, 1, 0, 'language', 0, '2026-01-27 20:15:43', '2026-02-26 15:39:44'),
(5, 'react', 'skills/9rcIPhHaZ3NoiAJrsZr3T5iybGE4VXLF0w45B8X8.png', '', NULL, 1, 0, 'framework', 0, '2026-01-27 20:22:57', '2026-01-27 20:23:39'),
(7, 'laravel', 'skills/FNkRFa39bHF9dWwgBODtndjcg2fzf707NPa6j8T2.jpg', 'i used it to build so many projects one of them is this web', NULL, 1, 0, 'framework', 0, '2026-01-27 20:25:49', '2026-01-27 20:25:49'),
(8, 'livewire', 'skills/Lt85HDkq4StlpRl0TLUa77VDfWKNdtEJzEfNDlfd.png', 'i use it when i dont want to use js frameworks in the frontend ', NULL, 1, 0, 'framework', 0, '2026-01-27 20:28:12', '2026-02-26 15:40:09'),
(9, 'bootstrap', 'skills/NYYUNTLoA8blC4a2uxATjPIiB0O6Wek8MpbEWIMt.png', 'i use it to build fast ui in my personal projects', NULL, 1, 0, 'library', 0, '2026-01-27 21:06:34', '2026-01-27 21:06:34'),
(10, 'tailwind', 'skills/CS9XR5GKrNXaWgZdVlElOFdthk6O5saPKGUeLl2h.png', 'i use it as the main styling tech', NULL, 1, 0, 'library', 0, '2026-01-27 21:13:53', '2026-01-27 21:21:49'),
(12, 'Mysql', 'skills/J1KJVaXtOcMcsrXbjw0nthDgTzTy61SULiD7IVmo.png', '', NULL, 1, 0, 'database', 0, '2026-01-28 05:41:19', '2026-01-28 05:41:19'),
(13, 'arch linux', 'skills/YlzesrGhhKkh1dkFsFHlg3xS72QayOp2tNhAMvnk.png', 'i use as my main os ', NULL, 1, 0, 'tool', 0, '2026-01-28 06:46:50', '2026-01-28 06:46:50'),
(14, 'git', 'skills/YpwzJbxNJwei2CA2w06tm6zfjzGysFDO7oHonnDe.png', '', NULL, 1, 0, 'tool', 0, '2026-01-28 06:47:34', '2026-01-28 06:47:34'),
(17, 'krita ', 'skills/y9roVpshTgV10ZZ0hZxha7oXK0zIhTgaDS9JGllC.png', 'i use it to draw in 2d', NULL, 1, 0, 'other', 0, '2026-01-28 06:53:11', '2026-01-28 07:06:22'),
(18, 'pc building', NULL, 'i can build and fix problems that can happen on hardware level , i worked as a builder in a shope ', NULL, 1, 0, 'other', 0, '2026-01-28 07:03:35', '2026-02-05 13:09:34'),
(19, 'html', 'skills/xfAoH41JwE6l6Hq2hjbIBXbvPre6HnYDavFrRW8E.png', '', NULL, 1, 0, 'language', 0, '2026-02-05 13:10:25', '2026-02-05 13:11:08'),
(20, 'css', 'skills/57bhlI8rfX7thLQh5EQIOTnRY5XjurBJQ78nIFPK.png', '', NULL, 1, 0, 'language', 0, '2026-02-05 13:10:49', '2026-02-05 13:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2026-01-27 18:27:56', '$2y$12$GL4nSpr7IscXGHDtt4/cW.pvxVzjS.XnADVYUtAlOO8oeVit8Bm/m', 'B8E822tZbB', '2026-01-27 18:27:56', '2026-01-27 18:27:56'),
(2, 'Admin', 'admin@example.com', NULL, '$2y$12$0Jlg1viR4Ofru6JTvDJvpOci2p1BHi8Ac6eZLuSRrSmFclRBzRniO', NULL, '2026-01-27 18:27:57', '2026-01-27 18:27:57');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certifications_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_conversations_session_id_index` (`session_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_conversation_id_foreign` (`conversation_id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_profile_id_foreign` (`profile_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat_conversations`
--
ALTER TABLE `chat_conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `chat_conversations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
