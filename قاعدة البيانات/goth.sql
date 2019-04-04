-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 06:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goth`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cat` int(11) DEFAULT '0',
  `num_personal` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `img`, `id_cat`, `num_personal`, `created_at`, `updated_at`) VALUES
(1, 'قسم التعليم', 'قسم يضم النشاطات التعليمية للمنظمة', NULL, 0, 1500, '2019-02-14 07:33:21', '2019-03-07 05:23:25'),
(3, 'المعاهد الشرعية', 'معاهد لتخريج حفظة القرآن', NULL, 0, 700, '2019-02-19 09:07:23', '2019-03-07 05:23:42'),
(8, 'الأيتام', 'مشروع كفالات الأيتام وتعليمهم', NULL, 0, 800, '2019-03-07 06:16:25', '2019-03-07 06:16:25'),
(9, 'الأفران', 'أفران خبز لدعم المهجرين بمادة الخبز الأساسية', NULL, 0, 2000, '2019-03-07 06:17:02', '2019-03-07 06:17:02'),
(10, 'الألبسة', 'نقدم الألبسة للأسر المهجرة', NULL, 0, 500, '2019-03-07 06:23:27', '2019-03-07 06:23:27'),
(11, 'مدرسة الأمل', 'الأمل للتعليم', '_cats1551975620.jpg', 1, 200, '2019-03-07 13:20:20', '2019-03-07 13:20:20');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_09_170530_category', 1),
(5, '2019_02_14_100033_post', 2),
(6, '2019_02_18_072309_settings', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`, `url`, `excerpt`, `img1`, `img2`, `img3`, `img4`, `id_cat`, `created_at`, `updated_at`) VALUES
(1, 'تكريم المتفوقين', '<h3>تم تكريم الطلاب المتفوقين في الصف الثاني&nbsp;</h3>\r\n<p>وقد كانت النتائج كما يلي</p>\r\n<ol>\r\n<li>محمد الأحمد</li>\r\n<li>خالد المحمد</li>\r\n<li>محمود الخالد</li>\r\n</ol>', NULL, 'تكريم طلاب الصف الثاني', '_post15519763001713487.jpg', '_post15519763014536286.png', '_post15519763023019043.png', NULL, 11, '2019-03-07 13:31:44', '2019-03-07 13:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slug`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'name', 'اسم الموقع', 'text', 'غوث', '2019-02-17 22:00:00', '2019-03-07 14:08:00'),
(2, 'discription', 'وصف الموقع', 'textarea', 'منظمة إغاثية تعليمية', '2019-02-18 02:26:20', '2019-03-07 14:08:00'),
(3, 'keywords', 'كلمات مفتاحية', 'text', 'منظمة,إغاثة,تنمية,تعليم,منظمة غوث,غوث', '2019-02-18 03:25:20', '2019-03-07 14:08:00'),
(4, 'email', 'البريد الإلكتروني', 'email', 'example@gmail.com', '2019-02-18 01:10:00', '2019-03-07 14:08:00'),
(5, 'bank', 'رقم الحساب البنكي', 'text', '000000000000000', '2019-02-18 05:11:00', '2019-03-07 14:08:00'),
(6, 'phone', 'رقم الهاتف', 'text', '009635789', '2019-02-18 07:18:00', '2019-03-07 14:08:00'),
(7, 'address', 'العنوان', 'text', 'تركيا - الريحانية - شارع السلطان', '2019-02-18 02:00:00', '2019-03-07 14:08:00'),
(8, 'contact', 'نص إتصل بنا', 'textarea', 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص\r\nإتصل بنا', NULL, '2019-03-07 14:08:00'),
(9, 'map', 'رابط الخريطة', 'text', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25654.867316078908!2d36.88108883698101!3d36.50927971459369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152f93f987fca169%3A0xedd9b3393ae9421b!2z2LnZgdix2YrZhtiMINiz2YjYsdmK2Kc!5e0!3m2!1sar!2str!4v1550478991869\" width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', NULL, '2019-03-07 14:08:00'),
(10, 'face', 'رابط صفحة فيس بوك', 'text', 'https://facebook.com/smartsolution', NULL, '2019-02-20 16:58:31'),
(11, 'twit', 'رابط صفحة تويتر', 'text', 'http://twitter.com/smartsolution', NULL, '2019-02-20 16:58:32'),
(12, 'google', 'رابط صفحة google +', 'text', 'http://plus.google.com/smartsolution', NULL, '2019-02-20 16:58:32'),
(13, 'lenk', '', 'text', NULL, NULL, '2019-02-20 16:58:32'),
(14, 'youtube', 'رابط قناة يوتيوب', 'text', 'http://youtube.com/smartsolution', NULL, '2019-02-20 16:58:32'),
(15, 'img', 'صورة الصفحة الرئيسية', 'img', '_settings1550688929.jpg', NULL, '2019-02-20 16:55:29'),
(16, 'title_header', 'العنوان الرئيسي', 'text', 'نقدم مشاريع لدعم المجتمع السوري', NULL, '2019-02-20 16:55:29'),
(17, 'description_header', 'الوصف في رأس الموقع', 'text', 'عدد المستفيدين من مشاريعنا تجاوز 2 مليون شخص بين نازح ومهجر وأيتام وأرامل', NULL, '2019-02-20 16:55:29'),
(22, 'imgpro', 'صورة الخلفية', 'text', '_settings1551947508.png', NULL, '2019-03-07 05:31:48'),
(23, 'logo', 'شعار الموقع', 'text', '_settings1551891959.png', NULL, '2019-03-06 14:05:59'),
(24, 'telegram', 'قناة تلغرام', 'text', 'dsfsdsfsdf', NULL, NULL),
(25, 'whats', 'مجموعة واتس آب', 'text', 'fdsfsdfsfsdf', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `img`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', NULL, '$2y$10$4zYVSNYuDrC2Q5jWQZPl2epWNI2siSkEXqzaZqUZOWO7EjGusYnAe', NULL, 'Z2DuIFJnbpBcYCnaOyBbDycf1YKUKmdZYpmGXrTZQpm7MqKWmRbJ3cpgopjY', '2019-02-14 07:12:01', '2019-02-14 07:12:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
