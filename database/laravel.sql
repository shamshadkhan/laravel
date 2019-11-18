-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- হোষ্ট: 127.0.0.1
-- তৈরী করতে ব্যবহৃত সময়: নভে 15, 2019 at 05:29 PM
-- সার্ভার সংস্করন: 10.4.8-MariaDB
-- পিএইছপির সংস্করন: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `laravel`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `cuisines`
--

CREATE TABLE `cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `cuisines`
--

INSERT INTO `cuisines` (`id`, `title`, `price`, `discount_amount`, `discount`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Japanese GaijinPot', 850, 12, 1, 'menu1.jpg', '2019-11-13 01:21:14', '2019-11-13 01:21:14'),
(2, 'American Bowls with Wild Alaskan Salmon', 950, 10, 1, 'menu2.jpg', '2019-11-13 01:21:49', '2019-11-13 01:21:49'),
(3, 'Shrim Ceviche', 1020, 0, 0, 'menu3.jpg', '2019-11-13 01:25:08', '2019-11-13 01:25:08'),
(4, 'Chicken Bun Kebab', 300, 0, 0, 'menu4.jpg', '2019-11-13 01:27:15', '2019-11-13 01:27:15'),
(5, 'Meditteranian Salmon', 350, 5, 1, 'menu5.jpg', '2019-11-13 01:28:24', '2019-11-13 01:28:24'),
(6, 'Phillipine Rib-tip sandwich', 350, 3, 1, 'menu6.jpg', '2019-11-13 01:29:06', '2019-11-13 01:29:06'),
(7, 'Pakistani Samaa Digital', 450, 0, 0, 'menu7.jpg', '2019-11-13 01:29:33', '2019-11-13 01:29:33'),
(8, 'Innovate Turkey', 100, 0, 0, 'menu8.jpg', '2019-11-13 01:31:49', '2019-11-13 01:31:59'),
(9, 'Cooking Light', 150, 3, 1, 'menu9.jpg', '2019-11-13 01:32:27', '2019-11-13 01:32:27');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `events`
--

INSERT INTO `events` (`id`, `venue`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '20.07. Sed perspiciatis', 'Unde omnis iste natus error volu accusantium doloremque.', 'page1_img4.jpg', '2019-11-12 03:51:02', '2019-11-12 03:51:02'),
(2, '11.07. Laudaum totam', 'Unde omnis iste natus error volu accusantium doloremque.', 'page1_img5.jpg', '2019-11-12 03:51:30', '2019-11-12 03:51:30'),
(3, '18.07. Quasi architecto', 'Unde omnis iste natus error volu accusantium doloremque.', 'page1_img6.jpg', '2019-11-12 03:51:58', '2019-11-12 03:51:58'),
(4, '09.07. Volups asrnatur', 'Unde omnis iste natus error volu accusantium doloremque.', 'page1_img7.jpg', '2019-11-12 03:52:17', '2019-11-12 03:52:17'),
(5, '09.08. Volups asrnatur', 'Unde omnis iste natus error volu accusantium doloremque.', 'our-wine-event-images.jpg', '2019-11-12 03:53:12', '2019-11-12 03:53:12');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_11_11_104903_create_sliders_table', 1),
(12, '2019_11_12_111010_create_services_table', 2),
(13, '2019_11_12_113714_create_events_table', 3),
(14, '2019_11_12_113727_create_testimonials_table', 3),
(19, '2019_11_13_083026_create_cuisines_table', 4),
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_11_11_104903_create_sliders_table', 1),
(24, '2019_11_12_111010_create_services_table', 1),
(25, '2019_11_12_113714_create_events_table', 1),
(26, '2019_11_12_113727_create_testimonials_table', 1),
(27, '2019_11_13_083026_create_cuisines_table', 1),
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2019_08_19_000000_create_failed_jobs_table', 1),
(31, '2019_11_11_104903_create_sliders_table', 1),
(32, '2019_11_12_111010_create_services_table', 1),
(33, '2019_11_12_113714_create_events_table', 1),
(34, '2019_11_12_113727_create_testimonials_table', 1),
(35, '2019_11_13_083026_create_cuisines_table', 1),
(36, '2014_10_12_000000_create_users_table', 1),
(37, '2014_10_12_100000_create_password_resets_table', 1),
(38, '2019_08_19_000000_create_failed_jobs_table', 1),
(39, '2019_11_11_104903_create_sliders_table', 1),
(40, '2019_11_12_111010_create_services_table', 1),
(41, '2019_11_12_113714_create_events_table', 1),
(42, '2019_11_12_113727_create_testimonials_table', 1),
(43, '2019_11_13_083026_create_cuisines_table', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to Us!', 'Lorem ipsum dolamet consectetur adipisicing elit, sed do eiusmod tempor aliqua enim ad minim veniam, quis nosinci- didunt ut labore et dolore.', 'page1_img1.jpg', '2019-11-12 03:23:43', '2019-11-12 03:23:43'),
(2, 'About Us', 'Lorem ipsum dolamet consectetur adipisicing elit, sed do eiusmod tempor aliqua enim ad minim veniam, quis nosinci- didunt ut labore et dolore.', 'page1_img2.jpg', '2019-11-12 03:24:22', '2019-11-12 03:24:22'),
(3, 'Our Services', 'Lorem ipsum dolamet consectetur adipisicing elit, sed do eiusmod tempor aliqua enim ad minim veniam, quis nosinci- didunt ut labore et dolore.', 'page1_img3.jpg', '2019-11-12 03:24:47', '2019-11-12 03:24:47'),
(4, 'Restaurant Service', 'Lorem ipsum dolamet consectetur adipisicing elit, sed do eiusmod tempor aliqua enim ad minim veniam, quis nosinci- didunt ut labore et dolore.', 'restaurant-service.jpg', '2019-11-12 03:32:17', '2019-11-12 03:32:17');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Indian Dishes', 'Dish of the day', 'Lorem ipsum dolamet consectetur adipisicing elit, sed do eiusmod tempor aliqua enim ad minim veniam, quis nosinci- didunt ut labore et dolore.', 'images.jpg', '2019-11-11 04:18:03', '2019-11-11 04:32:10'),
(2, 'ITALIAN FETTUCCINE', 'DISH OF THE DAY', 'Lorem ipsum dolamet consectetur adipisicing elit, sed do eiusmod tempor aliqua enim ad minim veniam, quis nosinci- didunt ut labore et dolore.', 'img1.jpg', '2019-11-11 04:35:56', '2019-11-11 04:35:56'),
(3, 'SUCCULENT MEAT', 'DISH OF THE DAY', 'Lorem ipsum dolamet consectetur adipisicing elit, sed do eiusmod tempor aliqua enim ad minim veniam, quis nosinci- didunt ut labore et dolore.', 'img2.jpg', '2019-11-11 04:36:39', '2019-11-11 04:36:39'),
(4, 'FRENCH-STYLE TARTLET', 'DISH OF THE DAY', 'Lorem ipsum dolamet consectetur adipisicing elit, sed do eiusmod tempor aliqua enim ad minim veniam, quis nosinci- didunt ut labore et dolore.', 'img3.jpg', '2019-11-11 04:37:14', '2019-11-11 04:37:14');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `testimonials`
--

INSERT INTO `testimonials` (`id`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '“Remperam eaquepsa quae abillo inventore vertatis.”', 'signature1.jpg', '2019-11-12 04:00:04', '2019-11-12 04:01:53'),
(2, '“Quasi arctecto beatae vitae dicta sunt explicabo.”', 'signature2.jpg', '2019-11-12 04:02:21', '2019-11-12 04:02:21'),
(3, '“Nemo enim ipsam volupta tem quia voluptas.”', 'signature3.jpg', '2019-11-12 04:02:44', '2019-11-12 04:02:44'),
(4, '“Unde omnis iste natus error volu accusantium doloremque.”', 'signature4.png\r\n', '2019-11-12 04:04:01', '2019-11-12 04:04:01');

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- টেবিলের ইনডেক্সসমুহ `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
