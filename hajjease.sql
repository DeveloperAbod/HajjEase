-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 سبتمبر 2024 الساعة 15:45
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hajjease`
--

-- --------------------------------------------------------

--
-- بنية الجدول `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pilgrim_id` bigint(20) UNSIGNED DEFAULT NULL,
  `trip_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `bookings`
--

INSERT INTO `bookings` (`id`, `pilgrim_id`, `trip_id`, `created_by`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-09-29', 1, '2024-09-28 21:04:54', '2024-09-28 22:48:43'),
(2, 2, 2, 1, '2024-10-02', 1, '2024-09-28 22:54:03', '2024-09-28 23:02:38');

-- --------------------------------------------------------

--
-- بنية الجدول `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:33:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:27:\"عرض المستخدمين\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:23:\"اضافة مستخدم\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:23:\"تعديل مستخدم\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:19:\"حذف مستخدم\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:25:\"عرض الصلاحيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:23:\"اضافة صلاحية\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:23:\"تعديل صلاحية\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:19:\"حذف صلاحية\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:21:\"عرض الرحلات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:19:\"اضافة رحلة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:19:\"تعديل رحلة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:15:\"حذف رحلة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:32:\"عرض حجوزات الرحلة\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:19:\"عرض الحجاج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:17:\"اضافة حاج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"تعديل حاج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:13:\"حذف حاج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:30:\"عرض حجوزات الحاج\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:21:\"عرض المكاتب\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:19:\"اضافة مكتب\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:19:\"تعديل مكتب\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:15:\"حذف مكتب\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:23:\"عرض الحجوزات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:17:\"اضافة حجز\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:17:\"تعديل حجز\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:13:\"حذف حجز\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:24:\"قبول ورفض حجز\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:32:\"عرض مدفوعات الحجز\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:25:\"عرض المدفوعات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:17:\"اضافة دفع\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:17:\"تعديل دفع\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:13:\"حذف دفع\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:27:\"عرض الاحصائيات\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:2:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:21:\"مدير النظام\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:3:\"ali\";s:1:\"c\";s:3:\"web\";}}}', 1727660696);

-- --------------------------------------------------------

--
-- بنية الجدول `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
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
-- بنية الجدول `jobs`
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
-- بنية الجدول `job_batches`
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
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_25_070806_create_permission_tables', 1),
(5, '2024_09_25_205333_create_trips_table', 1),
(6, '2024_09_25_205909_create_pilgrims_table', 1),
(7, '2024_09_26_224348_create_offices_table', 1),
(8, '2024_09_27_131809_create_bookings_table', 1),
(9, '2024_09_27_212556_create_payments_table', 1);

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `map_url` text DEFAULT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `offices`
--

INSERT INTO `offices` (`id`, `name`, `location`, `map_url`, `phone`, `contact_person`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'مكتب الرباط', 'شارع الرباط', NULL, 774370569, 'عبدالرحمن', 1, '2024-09-28 21:12:51', '2024-09-28 21:12:51'),
(2, 'مكتب الامتياز', 'صنعاء - شارع 24', NULL, 773232323, 'لا يوجد', 1, '2024-09-28 22:52:13', '2024-09-28 22:52:13');

-- --------------------------------------------------------

--
-- بنية الجدول `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount_paid` decimal(10,0) NOT NULL,
  `receipt_number` decimal(10,0) NOT NULL,
  `receipt_date` date NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `amount_paid`, `receipt_number`, `receipt_date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, 29123123, '2024-09-29', 1, '2024-09-28 21:17:12', '2024-09-28 22:55:31'),
(2, 2, 80000, 291231231, '2024-09-30', 1, '2024-09-28 22:56:19', '2024-09-28 22:56:19'),
(3, 2, 10000, 123123123, '2024-09-29', 1, '2024-09-28 22:56:58', '2024-09-28 23:02:14');

-- --------------------------------------------------------

--
-- بنية الجدول `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'عرض المستخدمين', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(2, 'اضافة مستخدم', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(3, 'تعديل مستخدم', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(4, 'حذف مستخدم', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(5, 'عرض الصلاحيات', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(6, 'اضافة صلاحية', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(7, 'تعديل صلاحية', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(8, 'حذف صلاحية', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(9, 'عرض الرحلات', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(10, 'اضافة رحلة', 'web', '2024-09-28 21:01:59', '2024-09-28 21:01:59'),
(11, 'تعديل رحلة', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(12, 'حذف رحلة', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(13, 'عرض حجوزات الرحلة', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(14, 'عرض الحجاج', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(15, 'اضافة حاج', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(16, 'تعديل حاج', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(17, 'حذف حاج', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(18, 'عرض حجوزات الحاج', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(19, 'عرض المكاتب', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(20, 'اضافة مكتب', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(21, 'تعديل مكتب', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(22, 'حذف مكتب', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(23, 'عرض الحجوزات', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(24, 'اضافة حجز', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(25, 'تعديل حجز', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(26, 'حذف حجز', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(27, 'قبول ورفض حجز', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(28, 'عرض مدفوعات الحجز', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(29, 'عرض المدفوعات', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(30, 'اضافة دفع', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(31, 'تعديل دفع', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(32, 'حذف دفع', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00'),
(33, 'عرض الاحصائيات', 'web', '2024-09-28 21:02:00', '2024-09-28 21:02:00');

-- --------------------------------------------------------

--
-- بنية الجدول `pilgrims`
--

CREATE TABLE `pilgrims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `identity_number` bigint(20) UNSIGNED NOT NULL,
  `identity_type` enum('national_id','passport') NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `health_status` varchar(50) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `pilgrims`
--

INSERT INTO `pilgrims` (`id`, `name`, `identity_number`, `identity_type`, `phone`, `health_status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'عبدالرحمن عبدالله فارع عباس', 100021323, 'national_id', 774370569, 'جيدة', 1, '2024-09-28 21:04:33', '2024-09-28 21:04:33'),
(2, 'سليمان نور', 21323123, 'national_id', 712312321, 'جيدة', 1, '2024-09-28 22:50:20', '2024-09-28 22:50:46');

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'مدير النظام', 'web', '2024-09-28 21:02:18', '2024-09-28 21:02:18');

-- --------------------------------------------------------

--
-- بنية الجدول `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `sessions`
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
-- إرجاع أو استيراد بيانات الجدول `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('O3l0LBz9FwQgWjO1Cxc8fbJkvfUoglZePwzjhLOA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibVEyYzR0Ujl3UW5EcWJxRkxXRnYxcHJYb0o1Qjdncng2b25sanlCQiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Mjc1NzAxOTQ7fX0=', 1727570225),
('QEQn72pWKZnX7anuJL2bhnO4jdU3mgGGdmAUXLkk', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUm5VRDNwbWhGUTVLaGYwWEJuZE96N1VsdkZYNXJMM2VubVFBNDIyayI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcyNzU2ODE1MTt9fQ==', 1727575364);

-- --------------------------------------------------------

--
-- بنية الجدول `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `available_seats` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `trips`
--

INSERT INTO `trips` (`id`, `name`, `date`, `price`, `available_seats`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'رحلة الى سقطرى', '2024-09-29', 10000, 50, 1, '2024-09-28 21:03:50', '2024-09-28 22:48:26'),
(2, 'رحلة الى مكة', '2024-10-09', 90000, 50, 1, '2024-09-28 22:46:19', '2024-09-28 22:46:19');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `roles_name` text NOT NULL,
  `avatar` varchar(255) DEFAULT 'defaultUserImage.png',
  `phone` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles_name`, `avatar`, `phone`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'مدير الموقع', 'admin@admin.com', NULL, '$2y$12$eMeYX52.v.YVBlLWDFG/6OO/tJELkmVd9xzZ9lLANYu.QEkJkKgti', '[\"\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u0646\\u0638\\u0627\\u0645\"]', 'defaultUserImage.png', 774370569, 1, NULL, '2024-09-28 21:02:18', '2024-09-28 21:02:18'),
(2, 'محمد علي', 'mali@gmial.com', NULL, '$2y$12$v.C5jK6emlwoW9VsHBpwEOhmrkim4/bm2okVB0e.forvRk2mHfj/2', '[\"ali\",\"\\u0645\\u062f\\u064a\\u0631 \\u0627\\u0644\\u0646\\u0638\\u0627\\u0645\"]', 'defaultUserImage.png', 774370561, 0, NULL, '2024-09-28 21:36:04', '2024-09-28 22:45:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_pilgrim_id_foreign` (`pilgrim_id`),
  ADD KEY `bookings_trip_id_foreign` (`trip_id`),
  ADD KEY `bookings_created_by_foreign` (`created_by`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offices_phone_unique` (`phone`),
  ADD KEY `offices_created_by_foreign` (`created_by`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_receipt_number_unique` (`receipt_number`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`),
  ADD KEY `payments_created_by_foreign` (`created_by`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `pilgrims`
--
ALTER TABLE `pilgrims`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pilgrims_phone_unique` (`phone`),
  ADD KEY `pilgrims_created_by_foreign` (`created_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_created_by_foreign` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pilgrims`
--
ALTER TABLE `pilgrims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- قيود الجداول المُلقاة.
--

--
-- قيود الجداول `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bookings_pilgrim_id_foreign` FOREIGN KEY (`pilgrim_id`) REFERENCES `pilgrims` (`id`),
  ADD CONSTRAINT `bookings_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`);

--
-- قيود الجداول `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- قيود الجداول `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- قيود الجداول `pilgrims`
--
ALTER TABLE `pilgrims`
  ADD CONSTRAINT `pilgrims_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- قيود الجداول `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- قيود الجداول `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
