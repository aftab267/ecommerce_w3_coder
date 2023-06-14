-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2023 at 12:53 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$cZGzonCWFRRzx0tpkX8y4uIlL6qmTR9jlz.XcCPMMKCTODHUtjhqC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Hitachi', 1, '2023-05-11 10:13:28', NULL),
(3, 'Polo', 1, '2023-05-11 10:14:01', NULL),
(4, 'Samgsung', 1, '2023-05-11 10:14:51', '2023-05-11 10:17:15'),
(5, 'lenevo', 1, '2023-05-20 07:50:38', NULL),
(6, 'Food Item', 1, '2023-06-08 10:11:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `user_ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `qty`, `price`, `user_ip`, `created_at`, `updated_at`) VALUES
(15, 11, 1, 40000, '127.0.0.1', NULL, NULL),
(16, 9, 1, 2000, '127.0.0.1', NULL, NULL),
(17, 12, 1, 120, '127.0.0.1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 1, '2023-05-10 07:42:21', NULL),
(2, 'Smartphone', 1, '2023-05-10 07:44:04', '2023-05-11 07:18:47'),
(3, 'Toys for Baby', 1, '2023-05-10 07:44:29', '2023-05-20 07:38:48'),
(7, 'Headphone', 1, '2023-05-20 07:45:08', NULL),
(8, 'Laptop', 1, '2023-05-20 07:50:14', NULL),
(9, 'Fish', 1, '2023-06-08 07:36:10', '2023-06-08 10:04:48'),
(10, 'Fresh Meat', 1, '2023-06-08 10:06:17', NULL),
(11, 'Vegetables', 1, '2023-06-08 10:06:35', NULL),
(12, 'Fruit & Nut Gifts', 1, '2023-06-08 10:06:47', NULL),
(13, 'Fresh Berries', 1, '2023-06-08 10:07:20', NULL),
(14, 'Ocean Foods', 1, '2023-06-08 10:07:31', NULL),
(15, 'Butter & Eggs', 1, '2023-06-08 10:07:41', NULL),
(16, 'Fastfood', 1, '2023-06-08 10:07:51', NULL),
(17, 'Fresh Onion', 1, '2023-06-08 10:08:03', NULL),
(18, 'Papayaya & Crisps', 1, '2023-06-08 10:08:19', NULL),
(19, 'Fresh Bananas', 1, '2023-06-08 10:08:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NEWYEAR', 10, 1, '2023-05-19 08:33:07', '2023-05-20 05:48:11'),
(3, '2020K', 20, 0, '2023-05-20 05:53:35', '2023-05-20 05:56:07'),
(4, '2022K', 5, 1, '2023-05-24 05:22:28', '2023-05-24 05:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_07_145007_create_admins_table', 1),
(5, '2023_05_10_121141_create_categories_table', 2),
(6, '2023_05_11_133933_create_brands_table', 3),
(7, '2023_05_11_163934_create_products_table', 4),
(8, '2023_05_18_135115_create_coupons_table', 5),
(9, '2023_05_22_120653_create_carts_table', 6),
(10, '2023_05_27_105440_create_wishlists_table', 7),
(14, '2023_06_02_161842_create_orders_table', 8),
(15, '2023_06_02_161932_create_order_items_table', 8),
(16, '2023_06_02_162016_create_shippings_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `invoice_no`, `payment_type`, `total`, `subtotal`, `coupon_discount`, `created_at`, `updated_at`) VALUES
(1, 2, '77813797', 'handcash', '28810.4', '36013', 20, '2023-06-05 07:21:26', NULL),
(2, 2, '54288676', 'handcash', '46400', '58000', 20, '2023-06-05 10:17:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 7, '2023-06-05 07:21:26', NULL),
(2, 1, 9, 1, '2023-06-05 07:21:26', NULL),
(3, 1, 6, 1, '2023-06-05 07:21:26', NULL),
(4, 2, 8, 2, '2023-06-05 10:17:57', NULL),
(5, 2, 10, 1, '2023-06-05 10:17:57', NULL);

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
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_slug`, `product_code`, `product_quantity`, `short_description`, `long_description`, `price`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 3, 'bd Burger13', 'bd-burger13', 'b444413', '8', '<p>asfasdfaf<br></p>', '<p>asdfasfd<br></p>', 20013, 'frontend/img/product/upload/1766236727857289.jpg', 'frontend/img/product/upload/1766236727882193.jpg', 'frontend/img/product/upload/1766236727907898.jpg', 1, '2023-05-18 06:56:44', '2023-05-18 07:20:20'),
(7, 3, 4, 'bd Burger1', 'bd-burger1', 'b44441', '6', '<p>dfgdfg<br></p>', '<p>dfgdfg<br></p>', 2001, 'frontend/img/product/upload/1766236798363012.jpg', 'frontend/img/product/upload/1766236798390730.jpg', 'frontend/img/product/upload/1766236798413482.jpg', 1, '2023-05-18 06:57:51', '2023-05-18 08:18:30'),
(8, 2, 4, 'Samgsung M30s', 'samgsung-m30s', 'm30s_000', '20', '<p>Samgsung M30s Is a good Phone<br></p>', '<p>Samgsung M30s Is a good Phone<br></p>', 28000, 'frontend/img/product/upload/1766420758801614.jpg', 'frontend/img/product/upload/1766420759236287.jpg', 'frontend/img/product/upload/1766420759263842.jpg', 1, '2023-05-20 07:41:50', NULL),
(9, 7, 4, 'Headphone', 'headphone', 'head343', '20', '<p>This headphone is a very nice.<br></p>', '<p>This headphone is a very nice.<br></p>', 2000, 'frontend/img/product/upload/1766421057022807.jpg', 'frontend/img/product/upload/1766421057057242.jpg', 'frontend/img/product/upload/1766421057082854.jpg', 1, '2023-05-20 07:46:34', NULL),
(10, 7, 4, 'Headphone', 'headphone', 'b44441', '12', '<p>This is a good phone.<br></p>', '<p>This is a good phone.<br></p>', 2000, 'frontend/img/product/upload/1766421204725139.jpg', 'frontend/img/product/upload/1766421204761920.jpg', 'frontend/img/product/upload/1766421204840045.jpg', 1, '2023-05-20 07:48:55', '2023-05-23 09:50:17'),
(11, 8, 5, 'Laptop', 'laptop', 'Lap8787', '20', '<p>Laptop<br></p>', '<p>Laptop<br></p>', 40000, 'frontend/img/product/upload/1766421389812631.jpg', 'frontend/img/product/upload/1766421389847002.jpg', 'frontend/img/product/upload/1766421389872735.jpg', 1, '2023-05-20 07:51:51', NULL),
(12, 19, 5, 'Banana', 'banana', 'B012458', '20', '<p>This is Banana.<br></p>', '<p>This is Banana.<br></p>', 120, 'frontend/img/product/upload/1768151476249319.jpg', 'frontend/img/product/upload/1768151476678373.jpg', 'frontend/img/product/upload/1768151476692600.jpg', 1, '2023-06-08 10:10:50', NULL),
(13, 10, 6, 'Fresh Meat', 'fresh-meat', 'm125478', '20', '<p>This is Meat.<br></p>', '<p>This is Meat.<br></p>', 800, 'frontend/img/product/upload/1768151620845772.jpg', 'frontend/img/product/upload/1768151620873041.jpg', 'frontend/img/product/upload/1768151620894560.jpg', 1, '2023-06-08 10:13:08', NULL),
(14, 16, 6, 'Burger', 'burger', 'B012545', '10', '<p>This is burger.<br></p>', '<p>This is burger.<br></p>', 500, 'frontend/img/product/upload/1768151890425097.jpg', 'frontend/img/product/upload/1768151890450255.jpg', 'frontend/img/product/upload/1768151890471386.jpg', 1, '2023-06-08 10:17:25', NULL),
(15, 12, 6, 'Apple', 'apple', 'A1457', '10', '<p>This is Apple.<br></p>', '<p>This is Apple.<br></p>', 200, 'frontend/img/product/upload/1768152024556347.jpg', 'frontend/img/product/upload/1768152024587438.jpg', 'frontend/img/product/upload/1768152024608957.jpg', 1, '2023-06-08 10:19:33', '2023-06-08 10:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `shipping_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone`, `address`, `state`, `post_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'aftab', 'palak', 'aftab267@gmail.com', '01711241125', '26 mohammadpur', 'Bangladesh', 1207, '2023-06-05 07:21:26', NULL),
(2, 2, 'aftab', 'rahman', 'aftab267@gmail.com', '01711241125', '26 mohammadpur', 'Bangladesh', 1207, '2023-06-05 10:17:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'kazi aftabur rahman', 'aftab267@gmail.com', NULL, '$2y$10$cZGzonCWFRRzx0tpkX8y4uIlL6qmTR9jlz.XcCPMMKCTODHUtjhqC', NULL, '2023-05-08 20:24:10', '2023-05-08 20:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(7, 2, 10, NULL, NULL),
(8, 2, 12, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
