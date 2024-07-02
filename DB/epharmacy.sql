-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 12:49 PM
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
-- Database: `epharmacy`
--
CREATE DATABASE IF NOT EXISTS `epharmacy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `epharmacy`;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `city` enum('Abyan','Aden','Amran','Al-Bayda','Dhamar','Hadramaut','Hajjah','Al-Hudaydah','Ibb','Al-Jawf','Lahij','Mrib','Al-Mahrah','Al-Mahwit','Raymah','Sadah','Shabwah','Sanaa','Taiz') NOT NULL,
  `address_link` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alternative_products`
--

CREATE TABLE `alternative_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `alternativ_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Medicines - أدوية', 'منتجات طبية تستخدم لعلاج الأمراض وتخفيف الأعراض والوقاية من الحالات الصحية المختلفة. تشمل هذه الفئة مجموعة متنوعة من المنتجات مثل الحبوب، الشراب، الحقن، والكريمات. تهدف الأدوية إلى تحسين الصحة العامة والشفاء من الأمراض، وتتنوع لتلبية احتياجات مختلف الحالات الصحية، بما في ذلك الأمراض المزمنة والالتهابات والحالات الحادة.', NULL, 1, '2024-07-02 07:11:53', '2024-07-02 07:11:53'),
(2, 'General Medicines - أدوية عامة', 'أدوية عامة بدون وصفة طبية', 1, 1, '2024-07-02 07:18:02', '2024-07-02 07:18:02'),
(3, 'Special Medications - أدوية خاصة', 'أدوية خاصة بالحالات المزمنة تصرف بوصفة طبية', 1, 1, '2024-07-02 07:23:51', '2024-07-02 07:23:51'),
(4, 'Medical Supplies - مستلزمات طبية', 'مجموعة واسعة من الأدوات والأجهزة التي تستخدم في التشخيص والعلاج والعناية بالمرضى. تُستخدم هذه المستلزمات في البيئات الطبية المختلفة مثل المستشفيات، والعيادات، والمنازل.', NULL, 1, '2024-07-02 07:25:34', '2024-07-02 07:25:34'),
(5, 'First aid kits - أدوات الإسعافات الأولية', 'مجموعة متنوعة من المستلزمات الطبية الأساسية التي تستخدم لتقديم الرعاية الفورية في حالات الطوارئ والإصابات.', 4, 1, '2024-07-02 07:32:36', '2024-07-02 07:32:36'),
(6, 'Cosmetics - مستحضرات تجميل', 'منتجات تهتم بالجمال والعناية الشخصية.', NULL, 1, '2024-07-02 07:38:06', '2024-07-02 07:39:20'),
(7, 'Makeup - مكياج', 'منتجات تجميل', 6, 1, '2024-07-02 07:41:31', '2024-07-02 07:41:31'),
(8, 'Personal Care Products - منتجات العناية الشخصية', 'مجموعة متنوعة من المستحضرات التي تهتم بصحة ونظافة الجسم والبشرة.', NULL, 1, '2024-07-02 07:43:10', '2024-07-02 07:43:10'),
(9, 'Pain Killers - مسكنات الألم', 'انواع مختلفة من مسكنات الألم', 2, 1, '2024-07-02 07:45:09', '2024-07-02 07:49:18'),
(10, 'Antibiotics - مضادات الحيوية', 'انواع مختلفة من المضادات الحيوية', 3, 1, '2024-07-02 07:47:35', '2024-07-02 07:47:35');

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
-- Table structure for table `measruing_units`
--

CREATE TABLE `measruing_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_09_110302_create_sessions_table', 1),
(7, '2024_03_09_182245_create_categories_table', 1),
(8, '2024_03_09_183518_create_products_table', 1),
(9, '2024_03_09_210729_create_alternative_products_table', 1),
(10, '2024_05_06_084852_create_articles_table', 1),
(11, '2024_05_06_085003_create_addresses_table', 1),
(12, '2024_05_06_085223_create_measruing_units_table', 1),
(13, '2024_05_06_085412_create_product_measurement_units_table', 1),
(14, '2024_05_06_085618_create_orders_table', 1),
(15, '2024_05_11_093810_create_vehicle_details_table', 1),
(16, '2024_05_11_200112_laratrust_setup_tables', 1),
(17, '2024_06_14_141016_create_order_items_table', 1),
(18, '2024_07_02_100232_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('New','Processing','Shipped','Delivered','Cancelled') NOT NULL DEFAULT 'New',
  `payment_method` enum('Paiement when recieving','Payment via wallet') NOT NULL DEFAULT 'Paiement when recieving',
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `note` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(10,2) NOT NULL DEFAULT 1.00,
  `measurement_units_id` bigint(20) UNSIGNED NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `total_product_price` decimal(10,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(2, 'view_any_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(3, 'create_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(4, 'update_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(5, 'restore_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(6, 'restore_any_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(7, 'replicate_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(8, 'reorder_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(9, 'delete_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(10, 'delete_any_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(11, 'force_delete_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(12, 'force_delete_any_address', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(13, 'view_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(14, 'view_any_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(15, 'create_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(16, 'update_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(17, 'restore_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(18, 'restore_any_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(19, 'replicate_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(20, 'reorder_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(21, 'delete_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(22, 'delete_any_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(23, 'force_delete_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(24, 'force_delete_any_alternative::product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(25, 'view_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(26, 'view_any_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(27, 'create_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(28, 'update_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(29, 'restore_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(30, 'restore_any_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(31, 'replicate_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(32, 'reorder_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(33, 'delete_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(34, 'delete_any_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(35, 'force_delete_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(36, 'force_delete_any_article', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(37, 'view_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(38, 'view_any_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(39, 'create_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(40, 'update_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(41, 'restore_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(42, 'restore_any_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(43, 'replicate_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(44, 'reorder_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(45, 'delete_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(46, 'delete_any_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(47, 'force_delete_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(48, 'force_delete_any_category', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(49, 'view_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(50, 'view_any_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(51, 'create_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(52, 'update_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(53, 'restore_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(54, 'restore_any_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(55, 'replicate_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(56, 'reorder_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(57, 'delete_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(58, 'delete_any_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(59, 'force_delete_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(60, 'force_delete_any_measruing::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(61, 'view_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(62, 'view_any_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(63, 'create_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(64, 'update_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(65, 'restore_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(66, 'restore_any_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(67, 'replicate_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(68, 'reorder_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(69, 'delete_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(70, 'delete_any_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(71, 'force_delete_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(72, 'force_delete_any_order', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(73, 'view_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(74, 'view_any_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(75, 'create_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(76, 'update_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(77, 'restore_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(78, 'restore_any_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(79, 'replicate_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(80, 'reorder_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(81, 'delete_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(82, 'delete_any_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(83, 'force_delete_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(84, 'force_delete_any_product', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(85, 'view_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(86, 'view_any_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(87, 'create_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(88, 'update_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(89, 'restore_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(90, 'restore_any_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(91, 'replicate_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(92, 'reorder_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(93, 'delete_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(94, 'delete_any_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(95, 'force_delete_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(96, 'force_delete_any_product::measurement::unit', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(97, 'view_role', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(98, 'view_any_role', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(99, 'create_role', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(100, 'update_role', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(101, 'delete_role', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(102, 'delete_any_role', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(103, 'view_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(104, 'view_any_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(105, 'create_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(106, 'update_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(107, 'restore_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(108, 'restore_any_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(109, 'replicate_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(110, 'reorder_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(111, 'delete_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(112, 'delete_any_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(113, 'force_delete_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(114, 'force_delete_any_user', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(115, 'view_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(116, 'view_any_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(117, 'create_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(118, 'update_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(119, 'restore_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(120, 'restore_any_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(121, 'replicate_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(122, 'reorder_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(123, 'delete_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(124, 'delete_any_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(125, 'force_delete_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(126, 'force_delete_any_vehicle::detail', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(127, 'widget_StatsOverview', 'web', '2024-07-02 07:02:42', '2024-07-02 07:02:42'),
(128, 'widget_LatestOrders', 'web', '2024-07-02 07:02:42', '2024-07-02 07:02:42'),
(129, 'widget_OrderChart', 'web', '2024-07-02 07:02:42', '2024-07-02 07:02:42'),
(130, 'widget_OrderCountChart', 'web', '2024-07-02 07:02:42', '2024-07-02 07:02:42'),
(131, 'widget_StatsOverview2', 'web', '2024-07-02 07:02:42', '2024-07-02 07:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `made_in` enum('afghanistan','albania','algeria','andorra','angola','antigua_and_barbuda','argentina','armenia','australia','austria','azerbaijan','bahamas','bahrain','bangladesh','barbados','belarus','belgium','belize','benin','bhutan','bolivia','bosnia_and_herzegovina','botswana','brazil','brunei','bulgaria','burkina_faso','burundi','cabo_verde','cambodia','cameroon','canada','central_african_republic','chad','chile','china','colombia','comoros','congo','costa_rica','cote_divoire','croatia','cuba','cyprus','czech_republic','democratic_republic_of_the_congo','denmark','djibouti','dominica','dominican_republic','east_timor','ecuador','egypt','el_salvador','equatorial_guinea','eritrea','estonia','eswatini','ethiopia','fiji','finland','france','gabon','gambia','georgia','germany','ghana','greece','grenada','guatemala','guinea','guinea_bissau','guyana','haiti','honduras','hungary','iceland','india','indonesia','iran','iraq','ireland','israel','italy','jamaica','japan','jordan','kazakhstan','kenya','kiribati','kosovo','kuwait','kyrgyzstan','laos','latvia','lebanon','lesotho','liberia','libya','liechtenstein','lithuania','luxembourg','madagascar','malawi','malaysia','maldives','mali','malta','marshall_islands','mauritania','mauritius','mexico','micronesia','moldova','monaco','mongolia','montenegro','morocco','mozambique','myanmar','namibia','nauru','nepal','netherlands','new_zealand','nicaragua','niger','nigeria','north_korea','north_macedonia','norway','oman','pakistan','palau','palestine','panama','papua_new_guinea','paraguay','peru','philippines','poland','portugal','qatar','romania','russia','rwanda','saint_kitts_and_nevis','saint_lucia','saint_vincent_and_the_grenadines','samoa','san_marino','sao_tome_and_principe','saudi_arabia','senegal','serbia','seychelles','sierra_leone','singapore','slovakia','slovenia','solomon_islands','somalia','south_africa','south_korea','south_sudan','spain','sri_lanka','sudan','suriname','sweden','switzerland','syria','taiwan','tajikistan','tanzania','thailand','togo','tonga','trinidad_and_tobago','tunisia','turkey','turkmenistan','tuvalu','uganda','ukraine','united_arab_emirates','united_kingdom','united_states','uruguay','uzbekistan','vanuatu','vatican_city','venezuela','vietnam','yemen','zambia','zimbabwe') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `manufacture_company` text NOT NULL,
  `type` text DEFAULT NULL,
  `effective_material` text DEFAULT NULL,
  `indications` text DEFAULT NULL,
  `dosage` text DEFAULT NULL,
  `side_effects` text DEFAULT NULL,
  `contraindications` text DEFAULT NULL,
  `packaging` text DEFAULT NULL,
  `storage` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_measurement_units`
--

CREATE TABLE `product_measurement_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `measurement_units_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2024-07-02 07:02:41', '2024-07-02 07:02:41'),
(2, 'panel_user', 'web', '2024-07-02 07:02:42', '2024-07-02 07:02:42'),
(3, 'delivery', 'web', '2024-07-02 07:06:15', '2024-07-02 07:06:15'),
(4, 'content_manager', 'web', '2024-07-02 07:06:54', '2024-07-02 07:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 4),
(6, 1),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 4),
(9, 1),
(9, 4),
(10, 1),
(10, 4),
(11, 1),
(11, 4),
(12, 1),
(12, 4),
(13, 1),
(13, 4),
(14, 1),
(14, 4),
(15, 1),
(15, 4),
(16, 1),
(16, 4),
(17, 1),
(17, 4),
(18, 1),
(18, 4),
(19, 1),
(19, 4),
(20, 1),
(20, 4),
(21, 1),
(21, 4),
(22, 1),
(22, 4),
(23, 1),
(23, 4),
(24, 1),
(24, 4),
(25, 1),
(25, 4),
(26, 1),
(26, 4),
(27, 1),
(27, 4),
(28, 1),
(28, 4),
(29, 1),
(29, 4),
(30, 1),
(30, 4),
(31, 1),
(31, 4),
(32, 1),
(32, 4),
(33, 1),
(33, 4),
(34, 1),
(34, 4),
(35, 1),
(35, 4),
(36, 1),
(36, 4),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(61, 3),
(61, 4),
(62, 1),
(62, 4),
(63, 1),
(63, 4),
(64, 1),
(64, 4),
(65, 1),
(65, 4),
(66, 1),
(66, 4),
(67, 1),
(67, 4),
(68, 1),
(68, 4),
(69, 1),
(69, 4),
(70, 1),
(70, 4),
(71, 1),
(71, 4),
(72, 1),
(72, 4),
(73, 1),
(73, 4),
(74, 1),
(74, 4),
(75, 1),
(75, 4),
(76, 1),
(76, 4),
(77, 1),
(77, 4),
(78, 1),
(78, 4),
(79, 1),
(79, 4),
(80, 1),
(80, 4),
(81, 1),
(81, 4),
(82, 1),
(82, 4),
(83, 1),
(83, 4),
(84, 1),
(84, 4),
(85, 1),
(85, 4),
(86, 1),
(86, 4),
(87, 1),
(87, 4),
(88, 1),
(88, 4),
(89, 1),
(89, 4),
(90, 1),
(90, 4),
(91, 1),
(91, 4),
(92, 1),
(92, 4),
(93, 1),
(93, 4),
(94, 1),
(94, 4),
(95, 1),
(95, 4),
(96, 1),
(96, 4),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(127, 4),
(128, 1),
(128, 4),
(129, 1),
(129, 4),
(130, 1),
(130, 4),
(131, 1),
(131, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QPEW5EZ7aE9BxzPLsyD9lh1wmfX1lU18ORDGcx2V', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiczVZaW9wRlU3UkZQR0cwVlIwNnhFNFVRN1NMekVhRWJEbnlMbndnQiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU2OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW5fZGFzaGJvYXJkL2NhdGVnb3JpZXMvMTAvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRieWkueHJaTlllYjNBUG14ZHF2Z0wuc3duQmtsTUNpNEdWZ2dmbmd6eUdQNmcxSjJjWHFXTyI7czo4OiJmaWxhbWVudCI7YTowOnt9czo2OiJ0YWJsZXMiO2E6MTp7czozMDoiTGlzdENhdGVnb3JpZXNfdG9nZ2xlZF9jb2x1bW5zIjthOjE6e3M6MTE6ImRlc2NyaXB0aW9uIjtiOjA7fX19', 1719917368);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `mobile`, `gender`, `status`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Mutaz Asem', 'AL-Shahedi', 'mu@gmail.com', 774743134, 'Male', 1, '2024-07-02 07:00:43', '$2y$12$byi.xrZNYeb3APmxdqvgL.swnBklMCi4GVggfngzyGP6g1J2cXqWO', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-02 07:00:24', '2024-07-02 07:07:56'),
(2, 'Wael', 'Youssef', 'wael@gmail.com', 778386677, 'Male', 1, NULL, '$2y$12$BdZPQH2WfMp8iFrs75zoIuXW/30KXLlJg4jPWjI5NUdsQ9D9wM4Aa', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-02 07:09:19', '2024-07-02 07:09:19'),
(3, 'Mohammed Taher', 'AL-Sofi', 'mohammed@gmail.com', 771114216, 'Male', 1, NULL, '$2y$12$hOGm91DaurC83wS66nRV5.XiLXP2Uex6NRg4YO2Ya0Ycb6wgmXfz2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-02 07:10:23', '2024-07-02 07:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `vehicle_type` enum('Car','Truck','Bus','Taxi','Bicycle','Motorcycle') NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `alternative_products`
--
ALTER TABLE `alternative_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternative_products_product_id_foreign` (`product_id`),
  ADD KEY `alternative_products_alternativ_product_id_foreign` (`alternativ_product_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `measruing_units`
--
ALTER TABLE `measruing_units`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_delivery_id_foreign` (`delivery_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_measurement_units_id_foreign` (`measurement_units_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_measurement_units`
--
ALTER TABLE `product_measurement_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_measurement_units_measurement_units_id_foreign` (`measurement_units_id`),
  ADD KEY `product_measurement_units_product_id_foreign` (`product_id`);

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
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_details_delivery_id_foreign` (`delivery_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alternative_products`
--
ALTER TABLE `alternative_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `measruing_units`
--
ALTER TABLE `measruing_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_measurement_units`
--
ALTER TABLE `product_measurement_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `alternative_products`
--
ALTER TABLE `alternative_products`
  ADD CONSTRAINT `alternative_products_alternativ_product_id_foreign` FOREIGN KEY (`alternativ_product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `alternative_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_measurement_units_id_foreign` FOREIGN KEY (`measurement_units_id`) REFERENCES `measruing_units` (`id`),
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_measurement_units`
--
ALTER TABLE `product_measurement_units`
  ADD CONSTRAINT `product_measurement_units_measurement_units_id_foreign` FOREIGN KEY (`measurement_units_id`) REFERENCES `measruing_units` (`id`),
  ADD CONSTRAINT `product_measurement_units_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD CONSTRAINT `vehicle_details_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
