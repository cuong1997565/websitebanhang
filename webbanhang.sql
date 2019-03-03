-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 02:17 PM
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
-- Database: `webbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_slug`, `created_at`, `updated_at`) VALUES
(1, 'iPhone', 'iphone', NULL, NULL),
(2, 'Samsung', 'samsung', NULL, NULL),
(4, 'PG', 'pg', '2019-03-01 02:53:36', '2019-03-01 05:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `name`, `content`, `com_product`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'iPhone', 'ưqe', 6, '2019-03-01 20:20:10', '2019-03-01 20:20:10'),
(2, 'cuongxuan.97@gmail.com', 'nguyễn xuân cương', 'giá đắt', 6, '2019-03-01 20:37:39', '2019-03-01 20:37:39'),
(3, 'admin@gmail.com', 'nguyễn xuân cương', 'sản phẩm rất đẹp', 4, '2019-03-02 00:44:11', '2019-03-02 00:44:11');

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_03_01_084518_create_categories_table', 2),
(7, '2019_03_01_132259_create_products_table', 3),
(8, '2019_03_02_024811_create_comments_table', 4);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accessories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `img`, `warranty`, `accessories`, `promotion`, `condition`, `status`, `description`, `featured`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Samsung	Glaxy', 'samsungglaxy', 200000, 'product-3.png', 'qưe', 'ưqe', 'qưe', 'qưe', 0, '<p>qưe</p>', 0, 1, '2019-03-01 08:20:36', '2019-03-01 08:39:23'),
(3, 'qưe', 'que', 323, 'product-1.png', 'ưqe', 'ưqe', 'qew', 'qưe', 1, '<p>ưe</p>', 1, 2, '2019-03-01 08:23:21', '2019-03-01 08:39:15'),
(4, 'iPhone 8 plug', 'iphone-8-plug', 20000, 'product-3.png', '12 tháng', '100%', 'vô thời hạn', 'còn mới', 1, '<p>sản phẩm đẹp</p>', 1, 4, '2019-03-01 08:40:14', '2019-03-01 08:40:14'),
(5, 'iPhone 6 plus', 'iphone-6-plus', 200000, 'product-3.png', '12 tháng', 'tai nghe', 'qưe', 'còn mới', 1, '<p>ưq</p>', 1, 1, '2019-03-01 08:41:14', '2019-03-01 08:41:14'),
(6, 'iPhone 12', 'iphone-12', 213, 'product-4.png', '12 tháng', 'tai nghe', 'vô thời hạn', 'mới 100%', 1, '<p>ưq</p>', 1, 1, '2019-03-01 08:41:44', '2019-03-01 08:41:44'),
(7, 'Samsung	 23', 'samsung-23', 213, 'product-3.png', '12 tháng', 'tai nghe', 'vô thời hạn', 'mới 100%', 1, '<p>eq</p>', 1, 1, '2019-03-01 08:42:33', '2019-03-01 08:42:33'),
(8, 'iPhone glaxy', 'iphone-glaxy', 20000, 'product-3.png', '12 tháng', 'tai nghe', 'ưe', 'ưe', 1, '<p>qưe</p>', 0, 4, '2019-03-01 08:42:58', '2019-03-01 08:42:58'),
(9, 'ưqe', 'uqe', 213, 'product-4.png', 'qưe', 'tai nghe', 'e', 'ưqe', 1, '<p>ưqe</p>', 0, 2, '2019-03-01 08:43:17', '2019-03-01 08:43:17'),
(10, 'qe23', 'qe23', 23, 'product-3.png', 'qe', 'e', 'qưe', 'qe', 1, '<p>ewqe</p>', 0, 4, '2019-03-01 08:43:36', '2019-03-01 08:43:36'),
(11, 'san sung', 'san-sung', 200000, 'product-3.png', 'ưqe', 'ưqe', 'qưe', 'qưe', 1, '<p>ưqe</p>', 0, 2, '2019-03-01 08:43:59', '2019-03-01 08:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$BkFZHpwBeHx2.A6stfOgyOtNi/muFqXo0fh6QD3/BTfVeBxDnQLCm', 1, 'OefTawUeptejXyN7u6LNKRxXh6L7Eb2gphixNaGYoNwHe9Tje3yCc58DrIGn', NULL, NULL),
(2, 'vietpro', 'vietpro@gmail.com', '$2y$10$bwOlu6mEYfr.9Awa6upeVeSwvH1xCGKEaQqZ0VyiVJLyiVsYg3ETW', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_com_product_foreign` (`com_product`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_com_product_foreign` FOREIGN KEY (`com_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
