-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2019 at 09:39 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barisal_geek`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `page_content`, `image`, `created_at`, `updated_at`) VALUES
(1, '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham</p>', 'BarisalGeek-About-Me.png', NULL, '2019-04-12 00:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super-Admin' COMMENT 'Super Admin|Author|Editor',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Inactive|1=Active|2=Blocked',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `image`, `password`, `phone`, `role`, `status`, `slug`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Al Imran', 'Al-Imran', 'imu0722@gmail.com', NULL, 'neershop-Noman.png', '$2y$10$htgf6zxtTz.M1pIuYdrq1.k24LtYQE2r.kUbh0rUo3hEEsCqp51VS', '01716584396', 'Super-Admin', 1, 'noman141', 'Pifc7GjiWytkcstVjtPs4OjVfCgU8uGDkhjbtVhMXeZlhTubCjV70cts9cD7', '2019-03-26 11:40:09', '2019-03-26 13:55:01'),
(13, 'Noman', 'Noman', 'al.a.noman1416@gmail.com', NULL, 'neershop-adminNoman.png', '$2y$10$HdBG31hf.K3.HTXgyPlXKef3.VB9MSOggpgX2wA7YQRpGgQ4PatkO', '01683615582', 'Editor', 1, 'noman', 'Ln7b1rYuId20Hd8AipdIB5KRssNko4Ldh6BXo92PHS1SB7m3Zo', '2019-04-10 01:14:58', '2019-04-13 07:06:37'),
(16, 'Abdullah AL Noman', 'Noman141', 'nmnaba14@gmail.com', NULL, 'neershop-adminAbdullah AL Noman.jpg', '$2y$10$7MCLjx0CVkKO5MYEpzPqzuFePnBttbFAWNRHnJrbhMFgTYQvLdWwC', '01750603409', 'Super-Admin', 1, 'noman141', 'SS1LJ48ufA9UMx3WEmr4zidhSUE4jn2pRH1VcMMdgojj1UVjgi', '2019-04-13 12:00:52', '2019-04-13 12:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `admin_id`, `sub_title`, `image`, `button_text`, `button_link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Lorem Ipsum', 1, 'Lorem Ipsum is simply dummy text', 'BarisalGeek-Banner-1554843399.jpg', 'read more', 'http://localhost/barisalgeek.com/public/', NULL, '2019-03-29 23:28:01', '2019-04-09 14:56:39'),
(3, 'Lorem Ipsum', 1, 'Lorem Ipsum is simply dummy text', 'BarisalGeek-Banner-1553924513.jpg', 'read more', 'http://localhost/barisalgeek.com/public/', NULL, '2019-03-29 23:29:48', '2019-03-29 23:41:56'),
(4, 'Lorem Ipsum', 1, 'Lorem Ipsum is simply dummy text', 'BarisalGeek-Banner-1554840597.jpg', 'read more', 'http://localhost/barisalgeek.com/public/', NULL, '2019-03-29 23:42:41', '2019-04-09 14:09:57');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(3) UNSIGNED NOT NULL,
  `total_students` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `type`, `total_students`, `image`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Batch-2', 1, 10, 'BarisalGeek-Student-batch-2.jpg', NULL, 'batch-2', '2019-04-06 01:44:36', '2019-04-07 08:36:15'),
(3, 'Batch-1', 2, 10, 'BarisalGeek-Student-batch-1.jpg', NULL, 'batch-1', '2019-04-07 08:26:18', '2019-04-07 08:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `bg_images`
--

CREATE TABLE `bg_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_bg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bg_images`
--

INSERT INTO `bg_images` (`id`, `portfolio_bg`, `subscribe_bg`, `about_bg`, `created_at`, `updated_at`) VALUES
(1, 'BarisalGeek-Bg-Portfolio-Background.png', 'BarisalGeek-Bg-Subscribe-Background.jpg', 'BarisalGeek-Bg-About-Background.jpg', NULL, '2019-04-10 23:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Logo Design', 'logo-design', '2019-03-27 22:28:53', '2019-03-27 22:28:53'),
(2, 'Banner Design', 'banner-design', '2019-03-28 11:20:45', '2019-03-28 11:20:45'),
(3, 'T Shirt Design', 't-shirt-design', '2019-04-03 22:47:27', '2019-04-03 22:47:27'),
(4, 'Ui/Ux Design', 'uiux-design', '2019-04-03 22:47:45', '2019-04-03 22:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `common_banners`
--

CREATE TABLE `common_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_banners`
--

INSERT INTO `common_banners` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'BarisalGeek-Common-Banner.jpg', NULL, '2019-04-04 23:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `page_content`, `created_at`, `updated_at`) VALUES
(1, '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', NULL, '2019-04-02 14:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci,
  `replied_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin email who replied this message',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=unseen|1=seen',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `reply`, `replied_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Noman', 'al.a.noman1416@gmail.com', 'Test', 'Hello Test', NULL, NULL, 1, '2019-04-02 03:06:41', '2019-04-11 11:06:19'),
(2, 'Shamsia Pia', 'al.a.noman1416@gmail.com', 'Test', 'Hello Test', NULL, NULL, 1, '2019-04-02 03:22:32', '2019-04-02 04:37:39'),
(3, 'Shamsia Pia', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-02 03:38:16', '2019-04-11 11:06:15'),
(4, 'Shamsia Pia', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-02 03:43:19', '2019-04-02 04:14:40'),
(5, 'Noman', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-02 03:44:37', '2019-04-11 11:06:17'),
(6, 'Noman', 'al.a.noman1416@gmail.com', 'Test', 'hello', NULL, NULL, 1, '2019-04-02 03:45:49', '2019-04-07 06:51:24'),
(7, 'Abdullah Al Noman', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-02 03:53:47', '2019-04-07 06:42:10'),
(8, 'Abdullah Al Noman', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-02 03:57:34', '2019-04-06 12:18:02'),
(9, 'Abdullah Al Noman', 'al.a.noman1416@gmail.com', 'Test', 'Hello', '<p>Hei</p>', 'Noman141', 1, '2019-04-02 03:59:28', '2019-04-05 15:10:51'),
(10, 'Abdullah Al Noman', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-02 04:00:21', '2019-04-02 04:26:53'),
(11, 'Nayeem Rahman', 'al.a.noman1416@gmail.com', 'Test', 'Hello', 'Hello', 'Noman141', 1, '2019-04-02 04:00:45', '2019-04-02 04:13:46'),
(12, 'Lorem Ipsum', 'shariasanto@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-09 14:26:54', '2019-04-11 11:06:11'),
(13, 'Lorem Ipsum', 'demo@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-10 01:17:21', '2019-04-11 11:06:13'),
(14, 'Lorem Ipsum', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-10 02:06:28', '2019-04-11 11:06:09'),
(15, 'Lorem Ipsum', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 1, '2019-04-10 02:07:22', '2019-04-11 11:06:06'),
(16, 'Lorem Ipsum', 'al.a.noman1416@gmail.com', 'Test', 'What is Lorem Ipsum?\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, 1, '2019-04-10 02:13:23', '2019-04-10 02:20:14'),
(17, 'Lorem Ipsum', 'al.a.noman1416@gmail.com', 'Test', 'Hello', '<p>Hei</p>', 'Noman141', 1, '2019-04-10 02:15:27', '2019-04-11 10:49:13'),
(19, 'Noman', 'al.a.noman1416@gmail.com', 'Test', 'Hello', NULL, NULL, 0, '2019-04-11 11:20:34', '2019-04-11 11:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `contact_infos`
--

CREATE TABLE `contact_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_infos`
--

INSERT INTO `contact_infos` (`id`, `email`, `phone`, `street_address`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'barisalgeek@gmail.com', '01716548396', 'Sador Road', 'Barisal', 'Bangladesh', NULL, '2019-04-13 11:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outline` text COLLATE utf8mb4_unicode_ci,
  `class_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `seats` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_starts` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_ends` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `course_topic`, `outline`, `class_number`, `duration`, `image`, `price`, `offer_price`, `class_day`, `class_time`, `class_duration`, `description`, `seats`, `class_starts`, `class_ends`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Lorem Ipsum', 'Graphic Design', '<ol>\r\n	<li>Hello</li>\r\n	<li>hei</li>\r\n</ol>', '12', '30', 'BarisalGeekCourse-lorem-ipsum.png', '12000', NULL, 'sunday,monday & friday', '11 am - 1pm', '2', '<ul>\r\n	<li>Hello</li>\r\n	<li>hei</li>\r\n</ul>', '10', '2019-04-01', '2019-04-30', 'lorem-ipsum', '0', '2019-04-06 09:38:16', '2019-04-07 07:29:57'),
(3, 'Lorem Ipsum simply', 'Graphic Design', '<p>Lorem Ipsum simply</p>', '15', '40', 'BarisalGeekCourse-lorem-ipsum-simply.png', '15000', '10000', 'Saturday,Thursday,Wednesday', '2pm - 5pm', '2', '<p>Graphic Design</p>', '10', '2019-04-10', '2019-06-10', 'lorem-ipsum-simply', '0', '2019-04-07 07:15:44', '2019-04-07 07:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `f_f_q_s`
--

CREATE TABLE `f_f_q_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `f_f_q_s`
--

INSERT INTO `f_f_q_s` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing <em><strong>Lorem Ipsum passages</strong></em>, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2019-04-02 13:00:42', '2019-04-02 13:17:07'),
(2, 'Where does it come from?', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', '2019-04-02 13:17:54', '2019-04-02 13:17:54'),
(3, 'Where can I get some?', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', '2019-04-02 13:18:15', '2019-04-02 13:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `caption`, `created_at`, `updated_at`) VALUES
(1, 'BarisalGeekgallery-image-1554406524.jpg', 'Lorem Ipsum has been', '2019-04-04 13:21:20', '2019-04-04 13:35:25'),
(3, 'BarisalGeekgallery-image-1554406673.jpg', 'Lorem Ipsum is simply', '2019-04-04 13:37:56', '2019-04-04 13:37:56'),
(4, 'BarisalGeekgallery-image-1554406698.jpg', 'Lorem Ipsum', '2019-04-04 13:38:21', '2019-04-04 13:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'BarisalGeek-Logo.png', NULL, '2019-03-30 01:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_03_26_170958_create_admins_table', 1),
(7, '2014_10_12_000000_create_users_table', 2),
(8, '2019_03_27_075143_create_categories_table', 2),
(9, '2019_03_27_092102_create_services_table', 2),
(11, '2019_03_28_043807_create_portfolios_table', 3),
(12, '2019_03_28_045819_create_portfolio_images_table', 4),
(15, '2019_03_29_183132_create_testimonials_table', 6),
(16, '2019_03_29_192110_create_testimonial_images_table', 7),
(19, '2019_03_30_040731_create_banners_table', 8),
(22, '2019_03_30_054653_create_logos_table', 9),
(25, '2019_03_30_093105_create_socal_links_table', 10),
(26, '2019_04_01_072034_create_subscribers_table', 11),
(27, '2019_04_02_081817_create_contacts_table', 12),
(28, '2019_04_02_165803_create_f_f_q_s_table', 13),
(29, '2019_04_02_192938_create_privacies_table', 14),
(30, '2019_04_02_195215_create_conditions_table', 15),
(31, '2019_04_03_164107_create_abouts_table', 16),
(32, '2019_04_03_164125_create_teams_table', 16),
(33, '2019_04_04_171533_create_galleries_table', 17),
(34, '2019_04_05_045735_create_common_banners_table', 18),
(37, '2019_04_06_070156_create_batches_table', 20),
(41, '2019_04_06_130549_create_students_table', 21),
(42, '2019_04_06_061404_create_courses_table', 22),
(44, '2019_04_07_141239_create_successes_table', 23),
(45, '2019_04_08_060105_create_register_students_table', 24),
(47, '2019_04_11_043326_create_bg_images_table', 25),
(48, '2019_04_11_053335_create_contact_infos_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('al.a.noman1416@gmail.com', '$2y$10$3eb9zGs1KOLXRruemQcBJeGrQZVs4l2am7/OXK3QPYAG30h/tTQ.G', '2019-04-10 03:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `rating` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `completed` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `category_id`, `admin_id`, `title`, `description`, `rating`, `website`, `project_type`, `status`, `slug`, `tags`, `completed`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Lorem Ipsum is simply', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing <a href=\"http://localhost/barisalgeek.com/public/\">Lorem Ipsum</a> passages, and more recently with desktop publishing software like Aldus PageMaker <strong><em>including versions of Lorem Ipsum</em></strong></p>', 5, 'upwork', 'Client Project', 1, 'banner-design', 'banner,design', '2019-03-27', '2019-03-28 11:27:12', '2019-03-28 13:47:07'),
(3, 1, 1, 'Lorem Ipsum', '<p>However, if some of the rows are hidden and not displayed, this can break up the pattern, causing multiple adjacent rows to have the same background color. Assuming that rows are hidden with the [hidden] attribute in HTML, the following CSS would zebra-stripe the table rows robustly, maintaining a proper alternating background regardless of which rows are hidden:</p>', 5, 'Fiverr', 'Contest Project', 0, 'logo-design', 'ui,ux,psd', '2019-04-02', '2019-04-03 22:56:33', '2019-04-09 13:25:14'),
(4, 3, 1, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris interdum purus at sem ornare sodales. Morbi leo nulla, pharetra vel felis nec, ullamcorper condimentum quam.</p>', 4, 'Upwork', 'My own project', 1, 't-shirt-design', 'tshirt,design', '2019-04-27', '2019-04-04 22:40:09', '2019-04-05 12:27:01'),
(5, 1, 1, 'Lorem Ipsum', NULL, 4, 'Fiverr', 'Personal', 1, 'logo-design', 'logo', '2019-04-25', '2019-04-09 13:26:50', '2019-04-09 13:26:50'),
(6, 4, 1, 'Lorem Ipsum', NULL, 5, 'Fiverr', 'Personal', 1, 'uiux-design', '', '2019-04-16', '2019-04-09 13:27:36', '2019-04-09 13:27:36'),
(7, 3, 1, 'First Product for test', NULL, 5, 'Upwork', 'Client Project', 1, 't-shirt-design', '', '2019-04-11', '2019-04-09 13:34:10', '2019-04-09 13:34:10'),
(8, 3, 1, 'ever since the 1500s,', NULL, 5, 'Upwork', 'Client Project', 1, 't-shirt-design', '', '2019-04-19', '2019-04-09 13:35:33', '2019-04-09 13:35:33'),
(9, 2, 1, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, 5, 'Upwork', 'Client Project', 1, 'banner-design', '', '2019-04-02', '2019-04-09 13:36:28', '2019-04-09 13:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

CREATE TABLE `portfolio_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `portfolio_id` int(10) UNSIGNED NOT NULL COMMENT 'portfolio table id',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `portfolio_id`, `image`, `created_at`, `updated_at`) VALUES
(23, 2, 'BarisalGeek-portfolio-2-image-1.png', '2019-03-28 13:45:07', '2019-03-28 13:45:07'),
(24, 2, 'BarisalGeek-portfolio-2-image-2.png', '2019-03-28 13:45:07', '2019-03-28 13:45:07'),
(26, 4, 'BarisalGeek-Portfolio-image-1.jpg', '2019-04-04 22:40:10', '2019-04-04 22:40:10'),
(30, 5, 'BarisalGeek-portfolio-5-image-1.png', '2019-04-09 13:32:29', '2019-04-09 13:32:29'),
(31, 3, 'BarisalGeek-portfolio-3-image-1.png', '2019-04-09 13:32:46', '2019-04-09 13:32:46'),
(32, 6, 'BarisalGeek-portfolio-6-image-1.png', '2019-04-09 13:33:03', '2019-04-09 13:33:03'),
(33, 7, 'BarisalGeek-Portfolio-image-1-7.png', '2019-04-09 13:34:10', '2019-04-09 13:34:10'),
(34, 8, 'BarisalGeek-Portfolio-image-1-8.png', '2019-04-09 13:35:33', '2019-04-09 13:35:33'),
(35, 9, 'BarisalGeek-Portfolio-image-1-9.png', '2019-04-09 13:36:28', '2019-04-09 13:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `privacies`
--

CREATE TABLE `privacies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacies`
--

INSERT INTO `privacies` (`id`, `page_content`, `created_at`, `updated_at`) VALUES
(1, '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>', NULL, '2019-04-02 13:45:03');

-- --------------------------------------------------------

--
-- Table structure for table `register_students`
--

CREATE TABLE `register_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_students`
--

INSERT INTO `register_students` (`id`, `course_id`, `name`, `email`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(23, 2, 'Noman', 'nmnaba14@gmail.com', '01683615582', 0, '2019-04-11 11:09:45', '2019-04-11 11:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=not-available|1=available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `icon`, `description`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum', 'BarisalGeek-icon1555059660.png', '<p>Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem IpsumLorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>\r\n\r\n<p>Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem IpsumLorem Ipsum Lorem IpsumLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum</p>', 'lorem-ipsum', '1', '2019-03-27 22:27:44', '2019-04-12 03:01:00'),
(2, 'Lorem Ipsum is simply', 'BarisalGeek-icon1555059648.png', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'lorem-ipsum-is-simply', '1', '2019-03-27 22:28:30', '2019-04-12 03:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribbble_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behance_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook_link`, `twitter_link`, `linkedin_link`, `dribbble_link`, `instagram_link`, `behance_link`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'http://localhost/barisalgeek.com/public/', 'http://localhost/barisalgeek.com/public/', 'http://localhost/barisalgeek.com/public/', 'http://localhost/barisalgeek.com/public/', 'http://localhost/barisalgeek.com/public/', NULL, '2019-03-30 04:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL COMMENT 'courses table ID',
  `batch_id` int(10) UNSIGNED NOT NULL COMMENT 'batches table ID',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `course_id`, `batch_id`, `first_name`, `last_name`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, '123ed11', 2, 2, 'Abdullah Al', 'Noman', 'Abdullah Al Noman', 'BarisalGeek-Students-image-1554581307.png', 0, '2019-04-06 13:51:53', '2019-04-12 07:21:38'),
(3, '123ed1', 3, 3, 'Abdullah Al', 'Aman', 'Abdullah Al Aman', 'BarisalGeek-Students-image-1554581202.png', 0, '2019-04-06 13:57:15', '2019-04-14 13:21:04'),
(4, 'Graphic-001', 2, 3, 'Al', 'Imran', 'Al Imran', 'BarisalGeek-Students-image-1555269523.png', 0, '2019-04-14 13:18:43', '2019-04-14 13:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(13, 'nmnaba14@gmail.com', 0, '2019-04-11 09:59:26', '2019-04-11 11:06:00'),
(15, 'nayeem@gmail.com', 1, '2019-04-11 10:11:49', '2019-04-11 10:58:02'),
(16, 'demo3@gmail.com', 0, '2019-04-13 07:47:18', '2019-04-13 07:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `successes`
--

CREATE TABLE `successes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `successes`
--

INSERT INTO `successes` (`id`, `student_id`, `batch_id`, `course_id`, `image`, `created_at`, `updated_at`) VALUES
(2, '3', 3, 3, 'BarisalGeek-Students-Success-image-1554663278.PNG', '2019-04-07 12:54:38', '2019-04-07 12:54:38'),
(3, '2', 2, 3, 'BarisalGeek-Students-Success-image-1554823047.PNG', '2019-04-09 09:17:27', '2019-04-09 09:17:27'),
(4, '2', 3, 2, 'BarisalGeek-Students-Success-image-1554823143.PNG', '2019-04-09 09:19:03', '2019-04-09 09:19:03'),
(5, '3', 2, 3, 'BarisalGeek-Students-Success-image-1554823164.PNG', '2019-04-09 09:19:24', '2019-04-09 09:19:24'),
(6, '2', 2, 2, 'BarisalGeek-Students-Success-image-1554823338.PNG', '2019-04-09 09:22:18', '2019-04-09 09:22:18');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Abdullah Al Noman', 'Web Designer', 'BarisalGeek-team-member-Abdullah Al Noman.png', '2019-04-03 13:37:05', '2019-04-03 13:37:05'),
(3, 'Noman', 'Web Developer', 'BarisalGeek-team-member-Noman.png', '2019-04-03 13:40:54', '2019-04-03 13:40:54'),
(4, 'Al Imran', 'Graphic Designer', 'BarisalGeek-team-member-Al Imran.png', '2019-04-03 14:02:04', '2019-04-03 14:02:04'),
(5, 'Nayeem Rahman', 'SEO ,Specilist', 'BarisalGeek-team-member-Nayeem Rahman.jpg', '2019-04-03 14:02:48', '2019-04-12 07:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `done_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `admin_id`, `category_id`, `picture`, `site_logo`, `status`, `details`, `done_at`, `created_at`, `updated_at`) VALUES
(12, 16, 1, 'BarisalGeek-1555079799.PNG', 'BarisalGeek-1555079799.png', 1, NULL, '2019-04-10', '2019-04-12 08:36:39', '2019-04-14 13:25:22'),
(13, 13, 1, 'BarisalGeek-review-1555080037.PNG', 'BarisalGeek-1555080037.png', 1, NULL, '2019-04-02', '2019-04-12 08:40:37', '2019-04-12 08:40:37'),
(14, 16, 2, 'BarisalGeek-1555270138.jpg', 'BarisalGeek-1555080254.png', 1, '<p>lorem ipsum</p>', '2019-04-10', '2019-04-12 08:44:14', '2019-04-14 13:28:58'),
(15, 16, 3, 'BarisalGeek-1555270113.png', 'BarisalGeek-1555270044.png', 1, '<p>Hello</p>', '2019-04-09', '2019-04-14 13:26:41', '2019-04-14 13:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_images`
--

CREATE TABLE `testimonial_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testimonial_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_images`
--

INSERT INTO `testimonial_images` (`id`, `testimonial_id`, `image`, `created_at`, `updated_at`) VALUES
(15, 12, 'BarisalGeek-Portfolio-image-1-1555079799.jpg', '2019-04-12 08:36:39', '2019-04-12 08:36:39'),
(16, 13, 'BarisalGeek-Portfolio-image-1-1555080037.jpg', '2019-04-12 08:40:38', '2019-04-12 08:40:38'),
(19, 14, 'BarisalGeek-Portfolio-image-1-1555080710.jpg', '2019-04-12 08:51:51', '2019-04-12 08:51:51'),
(20, 14, 'BarisalGeek-Portfolio-image-2-1555080711.jpg', '2019-04-12 08:51:54', '2019-04-12 08:51:54'),
(21, 15, 'BarisalGeek-Portfolio-image-1-1555270001.jpg', '2019-04-14 13:26:41', '2019-04-14 13:26:41'),
(22, 15, 'BarisalGeek-Portfolio-image-2-1555270001.jpg', '2019-04-14 13:26:41', '2019-04-14 13:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` text COLLATE utf8mb4_unicode_ci,
  `division_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Division Table Id',
  `district_id` bigint(20) UNSIGNED NOT NULL COMMENT 'District Table Id ',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Inactive|1=active|2=banned',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_user_name_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `batches_name_unique` (`name`);

--
-- Indexes for table `bg_images`
--
ALTER TABLE `bg_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `common_banners`
--
ALTER TABLE `common_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_infos`
--
ALTER TABLE `contact_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `courses_name_unique` (`name`);

--
-- Indexes for table `f_f_q_s`
--
ALTER TABLE `f_f_q_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
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
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacies`
--
ALTER TABLE `privacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_students`
--
ALTER TABLE `register_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_title_unique` (`title`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `successes`
--
ALTER TABLE `successes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_images`
--
ALTER TABLE `testimonial_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bg_images`
--
ALTER TABLE `bg_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `common_banners`
--
ALTER TABLE `common_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_infos`
--
ALTER TABLE `contact_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `f_f_q_s`
--
ALTER TABLE `f_f_q_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `portfolio_images`
--
ALTER TABLE `portfolio_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `privacies`
--
ALTER TABLE `privacies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register_students`
--
ALTER TABLE `register_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `successes`
--
ALTER TABLE `successes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `testimonial_images`
--
ALTER TABLE `testimonial_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
