-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2024 at 05:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustok`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket_items`
--

CREATE TABLE `basket_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `count` int(10) UNSIGNED NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `long_desc` varchar(255) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_images`
--

CREATE TABLE `book_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `discount_percent` double NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `discount_percent`, `is_active`, `created_at`, `created_by_user_id`, `updated_at`, `updated_by_user_id`, `deleted_at`, `deleted_by_user_id`, `is_deleted`) VALUES
(1, '{\"az\":\"Yeni il endiriml\\u0259ri\",\"en\":\"New year discounts\",\"ru\":\"\\u041d\\u043e\\u0432\\u043e\\u0433\\u043e\\u0434\\u043d\\u0438\\u0435 \\u0441\\u043a\\u0438\\u0434\\u043a\\u0438\"}', 40, 1, '2024-01-01 15:19:44', 1, '2024-01-01 15:19:44', 0, NULL, 0, 0),
(2, '{\"az\":\"Pay\\u0131z endiriml\\u0259ri\",\"en\":\"Autumn discounts\",\"ru\":\"\\u041e\\u0441\\u0435\\u043d\\u043d\\u0438\\u0435 \\u0441\\u043a\\u0438\\u0434\\u043a\\u0438\"}', 30, 1, '2024-01-01 15:21:03', 1, '2024-01-01 15:21:03', 0, NULL, 0, 0),
(3, '{\"az\":\"8 Mart endiriml\\u0259ri\",\"en\":\"March 8 discounts\",\"ru\":\"8 \\u043c\\u0430\\u0440\\u0442\\u0430 \\u0441\\u043a\\u0438\\u0434\\u043a\\u0438\"}', 50, 1, '2024-01-01 15:21:54', 1, '2024-01-01 15:21:54', 0, NULL, 0, 0),
(4, '{\"az\":\"endirim_1\",\"en\":\"discount_1\",\"ru\":\"\\u0441\\u043a\\u0438\\u0434\\u043aa_1\"}', 0, 0, '2024-01-01 15:22:35', 1, '2024-01-02 05:54:24', 1, '2024-01-02 05:54:24', 1, 1),
(11, '{\"az\":\"endirim_2\",\"en\":\"discount_2\",\"ru\":\"\\u0441\\u043a\\u0438\\u0434\\u043aa_2\"}', 65, 1, '2024-01-02 20:32:58', 1, '2024-01-03 05:27:58', 1, NULL, 0, 0),
(12, '{\"az\":\"endirim_3\",\"en\":\"discount_3\",\"ru\":\"\\u0441\\u043a\\u0438\\u0434\\u043aa_3\"}', 76, 1, '2024-01-03 05:27:53', 1, '2024-01-03 05:30:00', 1, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `parent_id`, `image`, `is_active`, `created_at`, `created_by_user_id`, `updated_at`, `updated_by_user_id`, `deleted_at`, `deleted_by_user_id`, `is_deleted`) VALUES
(1, '{\"az\":\"Janrlar\\u0131na g\\u00f6r\\u0259 kitablar\\u200e\",\"en\":\"Books by genre\\u200e\",\"ru\":\"\\u041a\\u043d\\u0438\\u0433\\u0438 \\u043f\\u043e \\u0436\\u0430\\u043d\\u0440\\u0430\\u043c\"}', '{\"az\":\"janrlarina-gore-kitablar\",\"en\":\"books-by-genre\",\"ru\":\"knigi-po-zanram\"}', 0, NULL, 1, '2023-12-18 03:34:49', 1, '2024-01-08 07:36:08', 1, NULL, 0, 0),
(2, '{\"az\":\"Roman\",\"en\":\"Romance\",\"ru\":\"\\u0420\\u043e\\u043c\\u0430\\u043d\\u0441\"}', '{\"az\":\"roman\",\"en\":\"romance\",\"ru\":\"romans\"}', 1, NULL, 1, '2023-12-18 03:43:15', 1, '2024-01-08 07:36:13', 1, NULL, 0, 0),
(3, '{\"az\":\"Fantastika\",\"en\":\"Fantasy\",\"ru\":\"\\u0424\\u0430\\u043d\\u0442\\u0430\\u0441\\u0442\\u0438\\u043a\\u0430\"}', '{\"az\":\"fantastika\",\"en\":\"fantasy\",\"ru\":\"fantastika\"}', 1, NULL, 1, '2023-12-18 03:44:41', 1, '2024-01-08 07:36:14', 1, NULL, 0, 0),
(4, '{\"az\":\"Tarixi\",\"en\":\"Historical\",\"ru\":\"\\u0418\\u0441\\u0442\\u043e\\u0440\\u0438\\u0447\\u0435\\u0441\\u043a\\u0438\\u0439\"}', '{\"az\":\"tarixi\",\"en\":\"historical\",\"ru\":\"istoriceskii\"}', 1, NULL, 1, '2023-12-18 03:51:13', 1, '2024-01-08 07:36:15', 1, NULL, 0, 0),
(5, '{\"az\":\"M\\u00f6vzular\\u0131na g\\u00f6r\\u0259 kitablar\",\"en\":\"Books by subject\",\"ru\":\"\\u041a\\u043d\\u0438\\u0433\\u0438 \\u043f\\u043e \\u0442\\u0435\\u043c\\u0430\\u043c\"}', '{\"az\":\"movzularina-gore-kitablar\",\"en\":\"books-by-subject\",\"ru\":\"knigi-po-temam\"}', 0, NULL, 1, '2023-12-18 03:53:02', 1, '2024-01-08 07:36:16', 0, NULL, 0, 0),
(6, '{\"az\":\"F\\u0259ls\\u0259fi kitablar\\u200e\",\"en\":\"Philosophical books\",\"ru\":\"\\u0424\\u0438\\u043b\\u043e\\u0441\\u043e\\u0444\\u0441\\u043a\\u0438\\u0435 \\u043a\\u043d\\u0438\\u0433\\u0438\"}', '{\"az\":\"felsefi-kitablar\",\"en\":\"philosophical-books\",\"ru\":\"filosofskie-knigi\"}', 5, NULL, 1, '2023-12-18 03:53:59', 1, '2024-01-08 07:36:20', 1, NULL, 0, 0),
(7, '{\"az\":\"\\u0130qtisadiyyata aid kitablar\\u200e\",\"en\":\"Books on economics\",\"ru\":\"\\u041a\\u043d\\u0438\\u0433\\u0438 \\u043f\\u043e \\u044d\\u043a\\u043e\\u043d\\u043e\\u043c\\u0438\\u043a\\u0435\"}', '{\"az\":\"iqtisadiyyata-aid-kitablar\",\"en\":\"books-on-economics\",\"ru\":\"knigi-po-ekonomike\"}', 5, NULL, 1, '2023-12-18 03:54:43', 1, '2024-01-08 07:36:22', 1, NULL, 0, 0),
(8, '{\"az\":\"Dini kitablar\\u200e\",\"en\":\"Religious books\",\"ru\":\"\\u0420\\u0435\\u043b\\u0438\\u0433\\u0438\\u043e\\u0437\\u043d\\u044b\\u0435 \\u043a\\u043d\\u0438\\u0433\\u0438\"}', '{\"az\":\"dini-kitablar\",\"en\":\"religious-books\",\"ru\":\"religioznye-knigi\"}', 5, NULL, 1, '2023-12-18 03:56:19', 1, '2024-01-08 07:36:23', 1, NULL, 0, 0),
(9, '{\"az\":\"M\\u00fc\\u0259llifl\\u0259rin\\u0259 g\\u00f6r\\u0259 kitablar\\u200e\",\"en\":\"Books by their authors\",\"ru\":\"\\u041a\\u043d\\u0438\\u0433\\u0438 \\u0438\\u0445 \\u0430\\u0432\\u0442\\u043e\\u0440\\u043e\\u0432\"}', '{\"az\":\"muelliflerine-gore-kitablar\",\"en\":\"books-by-their-authors\",\"ru\":\"knigi-ix-avtorov\"}', 0, NULL, 1, '2023-12-18 03:57:21', 1, '2023-12-31 18:22:56', 0, NULL, 0, 0),
(12, '{\"az\":\"category_1-az\",\"en\":\"category_1-en\",\"ru\":\"category_1-ru\"}', '{\"az\":\"category-1-az\",\"en\":\"category-1-en\",\"ru\":\"category-1-ru\"}', 9, '/storage/uploads/admin/categories/category_1702980366605.webp', 0, '2023-12-19 06:06:06', 1, '2023-12-31 18:22:55', 1, '2023-12-20 14:03:48', 1, 1),
(13, '{\"az\":\"parent_1-az\",\"en\":\"parent_1-en\",\"ru\":\"parent_1-ru\"}', '{\"az\":\"parent-1-az\",\"en\":\"parent-1-en\",\"ru\":\"parent-1-ru\"}', 0, '/storage/uploads/admin/categories/category_parent_1703662551186.jpg', 1, '2023-12-20 04:11:49', 1, '2024-01-08 07:36:24', 1, NULL, 0, 0),
(14, '{\"az\":\"child_1-az\",\"en\":\"child_1-en\",\"ru\":\"child_1-ru\"}', '{\"az\":\"child-1-az\",\"en\":\"child-1-en\",\"ru\":\"child-1-ru\"}', 13, '/storage/uploads/admin/categories/category_1703059963115.jpg', 1, '2023-12-20 04:12:43', 1, '2024-01-08 07:36:30', 1, NULL, 0, 0),
(15, '{\"az\":\"child_2-az\",\"en\":\"child_2-en\",\"ru\":\"child_2-ru\"}', '{\"az\":\"child-2-az\",\"en\":\"child-2-en\",\"ru\":\"child-2-ru\"}', 13, '/storage/uploads/admin/categories/category_1703059999841.jpg', 1, '2023-12-20 04:13:19', 1, '2024-01-08 07:36:31', 1, NULL, 0, 0),
(16, '{\"az\":\"category_2-az\",\"en\":\"category_2-en\",\"ru\":\"category_2-ru\"}', '{\"az\":\"category-2-az\",\"en\":\"category-2-en\",\"ru\":\"category-2-ru\"}', 13, NULL, 0, '2023-12-28 06:24:11', 1, '2024-01-03 05:34:56', 1, '2023-12-28 06:25:33', 1, 1),
(17, '{\"az\":\"parent_2-az\",\"en\":\"parent_2-en\",\"ru\":\"parent_2-ru\",\"tr\":\"parent_2-tr\"}', '{\"az\":\"parent-2-az\",\"en\":\"parent-2-en\",\"ru\":\"parent-2-ru\",\"tr\":\"parent-2-tr\"}', 0, NULL, 0, '2023-12-29 11:35:39', 1, '2024-01-02 06:01:20', 0, '2024-01-02 06:01:20', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `hero_sliders`
--

CREATE TABLE `hero_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `text_content` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_tabs`
--

CREATE TABLE `home_tabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `tab_text_id` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `code` varchar(3) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`id`, `country`, `code`, `image`, `is_active`, `created_at`, `created_by_user_id`, `updated_at`, `updated_by_user_id`, `deleted_at`, `deleted_by_user_id`, `is_deleted`) VALUES
(1, 'Azərbaycan', 'az', '/storage/uploads/admin/langs/lang_az_1703664379585.svg', 1, '2023-12-17 18:15:48', 1, '2023-12-28 13:22:27', 1, NULL, 0, 0),
(2, 'English', 'en', '/storage/uploads/admin/langs/lang_en_1703664398304.svg', 1, '2023-12-17 18:16:20', 1, '2023-12-28 11:12:10', 1, NULL, 0, 0),
(4, 'Русский', 'ru', '/storage/uploads/admin/langs/lang_ru_1703664413111.svg', 1, '2023-12-17 19:10:45', 1, '2023-12-27 08:06:53', 1, NULL, 0, 0),
(5, 'Türkiye', 'tr', '/storage/uploads/admin/langs/lang_tr_1703664460017.svg', 0, '2023-12-24 03:22:23', 1, '2024-01-02 06:00:21', 1, '2024-01-02 06:00:21', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `language_lines`
--

CREATE TABLE `language_lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`text`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `language_lines`
--

INSERT INTO `language_lines` (`id`, `group`, `key`, `text`, `is_active`, `created_at`, `created_by_user_id`, `updated_at`, `updated_by_user_id`, `deleted_at`, `deleted_by_user_id`, `is_deleted`) VALUES
(1, 'menu', 'home', '{\"az\":\"Ana S\\u0259hif\\u0259\",\"en\":\"Home\",\"ru\":\"\\u0413\\u043b\\u0430\\u0432\\u043d\\u0430\\u044f\"}', 1, '2023-12-20 14:45:23', 1, '2023-12-24 07:03:24', 1, NULL, 0, 0),
(2, 'validation', 'required', '{\"az\":\"M\\u00fctl\\u0259q yaz\\u0131lmal\\u0131d\\u0131r!\",\"en\":\"Required!\",\"ru\":\"\\u0422\\u0440\\u0435\\u0431\\u0443\\u0435\\u0442\\u0441\\u044f!\"}', 1, '2023-12-22 10:36:51', 1, '2023-12-24 07:00:04', 1, NULL, 0, 0),
(3, 'validation', 'unique', '{\"az\":\"unikal olmal\\u0131d\\u0131r!\",\"en\":\"must be unique!\",\"ru\":\"\\u0434\\u043e\\u043b\\u0436\\u0435\\u043d \\u0431\\u044b\\u0442\\u044c \\u0443\\u043d\\u0438\\u043a\\u0430\\u043b\\u044c\\u043d\\u044b\\u043c!\"}', 1, '2023-12-24 02:08:56', 1, '2023-12-24 02:08:56', 0, NULL, 0, 0),
(4, 'validation', 'image', '{\"az\":\"Fayl jpg, png, gif, jpeg format\\u0131nda olmal\\u0131d\\u0131r!\",\"en\":\"File must be in jpg, png, gif, jpeg image format!\",\"ru\":\"\\u0424\\u0430\\u0439\\u043b \\u0434\\u043e\\u043b\\u0436\\u0435\\u043d \\u0431\\u044b\\u0442\\u044c \\u0432 \\u0444\\u043e\\u0440\\u043c\\u0430\\u0442\\u0435 jpg, png, gif, jpeg!\"}', 1, '2023-12-24 02:30:18', 1, '2023-12-24 07:39:35', 1, NULL, 0, 0),
(5, 'validation', 'uploaded', '{\"az\":\"Fayl\\u0131n \\u00f6l\\u00e7\\u00fcs\\u00fc maksimum:\",\"en\":\"Maximum file size:\",\"ru\":\"\\u041c\\u0430\\u043a\\u0441\\u0438\\u043c\\u0430\\u043b\\u044c\\u043d\\u044b\\u0439 \\u0440\\u0430\\u0437\\u043c\\u0435\\u0440 \\u0444\\u0430\\u0439\\u043b\\u0430:\"}', 1, '2023-12-24 07:42:59', 1, '2023-12-24 07:42:59', 0, NULL, 0, 0),
(8, 'test_g', 'test_k', '{\"az\":\"test_text_az\",\"en\":\"test_text_en\",\"ru\":\"test_text_ru\"}', 1, '2023-12-27 10:20:34', 1, '2024-01-03 05:22:03', 1, NULL, 0, 0),
(9, 'validation', 'numeric', '{\"az\":\"Yaln\\u0131z r\\u0259q\\u0259ml\\u0259r ola bil\\u0259r!\",\"en\":\"Can only be numbers!\",\"ru\":\"\\u041c\\u043e\\u0433\\u0443\\u0442 \\u0431\\u044b\\u0442\\u044c \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0446\\u0438\\u0444\\u0440\\u044b!\"}', 1, '2024-01-01 15:15:45', 1, '2024-01-01 15:15:45', 0, NULL, 0, 0),
(10, 'test_g_2', 'test_k', '{\"az\":\"text_az\",\"en\":\"test_text_en\",\"ru\":\"test_text_ru\"}', 1, '2024-01-03 05:23:30', 1, '2024-01-03 05:23:56', 1, NULL, 0, 0),
(11, 'validation', 'same', '{\"az\":\"eyni olmal\\u0131d\\u0131r!\",\"en\":\"must be same!\",\"ru\":\"\\u0434\\u043e\\u043b\\u0436\\u043d\\u043e \\u0431\\u044b\\u0442\\u044c \\u0442\\u043e \\u0436\\u0435 \\u0441\\u0430\\u043c\\u043e\\u0435!\"}', 1, '2024-01-06 18:39:27', 1, '2024-01-06 18:40:27', 1, NULL, 0, 0),
(12, 'validation', 'phone', '{\"az\":\"D\\u00fczg\\u00fcn telefon n\\u00f6mr\\u0259si qeyd edin!\",\"en\":\"Enter the correct phone number!\",\"ru\":\"\\u0412\\u0432\\u0435\\u0434\\u0438\\u0442\\u0435 \\u043f\\u0440\\u0430\\u0432\\u0438\\u043b\\u044c\\u043d\\u044b\\u0439 \\u043d\\u043e\\u043c\\u0435\\u0440 \\u0442\\u0435\\u043b\\u0435\\u0444\\u043e\\u043d\\u0430!\"}', 1, '2024-01-06 19:04:38', 1, '2024-01-06 19:04:38', 0, NULL, 0, 0),
(13, 'validation', 'alpha', '{\"az\":\"Yaln\\u0131z h\\u0259rfl\\u0259rd\\u0259n istifad\\u0259 edin!\",\"en\":\"Use only letters!\",\"ru\":\"\\u0418\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u0443\\u0439\\u0442\\u0435 \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u0431\\u0443\\u043a\\u0432\\u044b!\"}', 1, '2024-01-06 19:34:04', 1, '2024-01-06 19:34:04', 0, NULL, 0, 0),
(14, 'validation', 'min_string', '{\"az\":\"Minimum xarakter say\\u0131\",\"en\":\"Minimum character count\",\"ru\":\"\\u041c\\u0438\\u043d\\u0438\\u043c\\u0430\\u043b\\u044c\\u043d\\u043e\\u0435 \\u043a\\u043e\\u043b\\u0438\\u0447\\u0435\\u0441\\u0442\\u0432\\u043e \\u0441\\u0438\\u043c\\u0432\\u043e\\u043b\\u043e\\u0432\"}', 1, '2024-01-06 19:39:22', 1, '2024-01-06 19:40:27', 1, NULL, 0, 0);

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
(467, '2014_10_12_000000_create_users_table', 1),
(468, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(469, '2019_08_19_000000_create_failed_jobs_table', 1),
(470, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(471, '2023_11_25_092343_create_categories_table', 1),
(474, '2023_12_02_060235_create_book_images_table', 1),
(475, '2023_12_02_060504_create_basket_items_table', 1),
(476, '2023_12_02_060612_create_orders_table', 1),
(477, '2023_12_02_065232_create_order_items_table', 1),
(478, '2023_12_02_065354_create_hero_sliders_table', 1),
(479, '2023_12_02_065455_create_contact_messages_table', 1),
(480, '2023_12_02_065839_create_subscribes_table', 1),
(481, '2023_12_02_070121_create_home_tabs_table', 1),
(482, '2023_12_02_070212_create_brands_table', 1),
(483, '2023_12_02_070420_create_setting_table', 1),
(484, '2023_12_03_071149_create_transable_layouts_table', 1),
(485, '2023_12_03_071407_create_transable_shop_pages_table', 1),
(486, '2023_12_03_072005_create_transable_book_details_table', 1),
(487, '2023_12_03_072235_create_transable_cart_wishlists_table', 1),
(488, '2023_12_03_073915_create_transable_checkout_orders_table', 1),
(489, '2023_12_11_084232_create_langs_table', 1),
(490, '2023_12_14_162037_create_language_lines_table', 1),
(491, '2023_12_02_055525_create_campaigns_table', 2),
(492, '2023_12_02_055736_create_books_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_count` int(10) UNSIGNED NOT NULL,
  `shipping_cost` double NOT NULL DEFAULT 0,
  `total_price` double NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `order_number` bigint(20) UNSIGNED NOT NULL,
  `order_notes` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `count` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_image` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `arrdess` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `footer_title` varchar(255) NOT NULL,
  `copy` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `location_title` varchar(255) NOT NULL,
  `location_desc` varchar(255) NOT NULL,
  `send_us` varchar(255) NOT NULL,
  `shipping_percent` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `accepted_at` timestamp NULL DEFAULT NULL,
  `accepted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transable_book_details`
--

CREATE TABLE `transable_book_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_details` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `in_stock` varchar(255) NOT NULL,
  `reviews` varchar(255) NOT NULL,
  `write_review` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `add_to_cart` varchar(255) NOT NULL,
  `add_to_wishlist` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `review_for` varchar(255) NOT NULL,
  `add_a_review` varchar(255) NOT NULL,
  `your_rating` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `post_comment` varchar(255) NOT NULL,
  `related_products` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transable_cart_wishlists`
--

CREATE TABLE `transable_cart_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `update_cart` varchar(255) NOT NULL,
  `interested_in` varchar(255) NOT NULL,
  `cart_summary` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `shipping_cost` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `wishlist` varchar(255) NOT NULL,
  `remove` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transable_checkout_orders`
--

CREATE TABLE `transable_checkout_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkout` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `order_notes` varchar(255) NOT NULL,
  `order_notes_placeholder` varchar(255) NOT NULL,
  `your_order` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `shipping_fee` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `place_order` varchar(255) NOT NULL,
  `order_complete` varchar(255) NOT NULL,
  `thank_you` varchar(255) NOT NULL,
  `received_message` varchar(255) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `order_details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transable_layouts`
--

CREATE TABLE `transable_layouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `search_placeholder` varchar(255) NOT NULL,
  `search` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `or` varchar(255) NOT NULL,
  `register` varchar(255) NOT NULL,
  `logout` varchar(255) NOT NULL,
  `shopping_cart` varchar(255) NOT NULL,
  `view_cart` varchar(255) NOT NULL,
  `browse_categories` varchar(255) NOT NULL,
  `free_support` varchar(255) NOT NULL,
  `home` varchar(255) NOT NULL,
  `shop` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address_text` varchar(255) NOT NULL,
  `phone_text` varchar(255) NOT NULL,
  `email_text` varchar(255) NOT NULL,
  `information` varchar(255) NOT NULL,
  `subscribe_title` varchar(255) NOT NULL,
  `subscribe` varchar(255) NOT NULL,
  `subscribe_placeholder` varchar(255) NOT NULL,
  `stay_connected` varchar(255) NOT NULL,
  `home_left_side_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transable_shop_pages`
--

CREATE TABLE `transable_shop_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `showing_text` varchar(255) NOT NULL,
  `all` varchar(255) NOT NULL,
  `pages` varchar(255) NOT NULL,
  `sort_by` varchar(255) NOT NULL,
  `default_sorting` varchar(255) NOT NULL,
  `name_a_z` varchar(255) NOT NULL,
  `name_z_a` varchar(255) NOT NULL,
  `price_low_high` varchar(255) NOT NULL,
  `price_high_low` varchar(255) NOT NULL,
  `rating_highest` varchar(255) NOT NULL,
  `rating_lowest` varchar(255) NOT NULL,
  `model_a_z` varchar(255) NOT NULL,
  `model_z_a` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `image`, `password`, `email_verified_at`, `is_admin`, `remember_token`, `is_active`, `created_at`, `created_by_user_id`, `updated_at`, `updated_by_user_id`, `deleted_at`, `deleted_by_user_id`, `is_deleted`) VALUES
(1, 'Qabil', 'Qurbanov', 'qabil@adas.az', NULL, '/storage/uploads/admin/accounts/account_profil_1702879686783.jpg', '$2y$12$8kSB64wXZzBX3QDC671Nle3oy6WqOzqVX30ES8qR2AK9cxh6HZM36', NULL, 1, NULL, 1, '2023-12-17 18:12:29', 0, '2023-12-18 02:08:06', 0, NULL, 0, 0),
(2, 'Test', 'Testli', 'test@adas.az', NULL, NULL, '$2y$12$cKmGGMzfun4e.2k81HiRM.IzUQviTo7DfVzgdzmS/DiL0eupzqdfC', NULL, 1, NULL, 1, '2023-12-18 03:04:31', 0, '2023-12-18 03:04:31', 0, NULL, 0, 0),
(3, 'Michael', 'Delacruz', 'test2@g.g', NULL, NULL, '$2y$12$BYx7ykktRKQ6hF4nU4t8me/XU85SUXT8TIYYCYXGnKUjBY94YcJYe', NULL, 1, NULL, 1, '2023-12-18 03:16:18', 0, '2024-01-07 18:41:12', 0, '2024-01-07 18:41:12', 1, 1),
(4, 'Michael', 'Delacruz', 'test3@g.g', NULL, '/storage/uploads/admin/users/user__1704653210894.jpg', '$2y$12$Z8h71YFldTMRlaigiEnT5udRnKz/rcaarv/HOJ281Y8V.wxiCv0ZW', NULL, 1, NULL, 1, '2023-12-18 03:16:56', 0, '2024-01-07 18:46:57', 1, '2024-01-07 18:46:57', 1, 1),
(6, 'Muhammed', 'Mustafa', 'client@codes.az', NULL, NULL, '$2y$12$fdbobuphKoKGhs6av9PtE.6g/tfRylkUf6MVLtNy91skV3MYpvDO2', NULL, 0, 'pdhiP1PDuNxXBNEkuB4Ynw4nQTYY3hVYllRF3mn3ssg9s1B9ouWUxHPThu1e', 1, '2023-12-23 02:54:53', 0, '2023-12-23 02:54:53', 0, NULL, 0, 0),
(7, 'Test', 'Testov', 'test@gmail.com', '0123456789', '/storage/uploads/admin/users/user__1704570897683.jpg', '$2y$12$iOwKWGDceOcWivu0JqU55OV/WhUYt4lfM2brl5zjkbXc.4FlBOqZ.', NULL, 1, NULL, 1, '2024-01-06 19:54:57', 1, '2024-01-07 18:21:50', 1, NULL, 0, 0),
(8, 'Testiki', 'Testoviki', 'test@test.com', NULL, '/storage/uploads/admin/users/user__1704650950662.jpg', '$2y$12$IsNUpr9OTkSZuBX.pPFvP.DcmzcyXKe.HWM3OsCmvY8ZphL3MxE3K', NULL, 1, NULL, 1, '2024-01-07 18:02:55', 1, '2024-01-07 18:30:35', 1, NULL, 0, 0),
(9, 'Qabil', 'Qurbanov', 'gabilgg@mail.ru', NULL, NULL, '$2y$12$4V1aI66fNPmRca3u7dob5eOGwU.GPp.CKH73I.q88wA6yQxdNnb6u', NULL, 0, 'jVvEN8Civdt7sIbnZdHtYjStLDgIOODqaDdShIMgMtr6SMF6sLqFYXl2EYeE', 1, '2024-01-08 13:13:26', 0, '2024-01-08 13:13:26', 0, NULL, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket_items`
--
ALTER TABLE `basket_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_images`
--
ALTER TABLE `book_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero_sliders`
--
ALTER TABLE `hero_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_tabs`
--
ALTER TABLE `home_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_lines`
--
ALTER TABLE `language_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_lines_group_index` (`group`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transable_book_details`
--
ALTER TABLE `transable_book_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transable_cart_wishlists`
--
ALTER TABLE `transable_cart_wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transable_checkout_orders`
--
ALTER TABLE `transable_checkout_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transable_layouts`
--
ALTER TABLE `transable_layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transable_shop_pages`
--
ALTER TABLE `transable_shop_pages`
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
-- AUTO_INCREMENT for table `basket_items`
--
ALTER TABLE `basket_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_images`
--
ALTER TABLE `book_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_sliders`
--
ALTER TABLE `hero_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_tabs`
--
ALTER TABLE `home_tabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `language_lines`
--
ALTER TABLE `language_lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transable_book_details`
--
ALTER TABLE `transable_book_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transable_cart_wishlists`
--
ALTER TABLE `transable_cart_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transable_checkout_orders`
--
ALTER TABLE `transable_checkout_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transable_layouts`
--
ALTER TABLE `transable_layouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transable_shop_pages`
--
ALTER TABLE `transable_shop_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
