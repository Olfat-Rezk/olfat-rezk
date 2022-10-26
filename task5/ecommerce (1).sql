-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 03:52 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `street` varchar(32) NOT NULL,
  `bulding` int(5) NOT NULL,
  `floor` int(2) NOT NULL,
  `flat` int(6) NOT NULL,
  `type` varchar(20) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `verification_code` int(6) DEFAULT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_ar`, `name_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '', 'apple', 'apple.png', 1, '2022-10-19 10:41:42', '2022-10-22 09:01:37'),
(2, '', 'samsung ', 'samsung.png', 1, '2022-10-19 11:03:32', '2022-10-22 09:02:05'),
(3, '', 'asusc', 'asus.png', 1, '2022-10-19 11:03:32', '2022-10-22 09:20:41'),
(4, '', 'dell', 'dell.png', 1, '2022-10-22 09:23:08', NULL),
(5, '', 'hp', 'hp.png', 0, '2022-10-22 09:23:08', NULL),
(6, '', 'lenovo', 'lenovo.jpg', 1, '2022-10-22 09:42:18', NULL),
(7, '', 'food', 'default.jpg', 1, '2022-10-23 04:50:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_ar`, `name_en`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, '', 'Electronics', 1, 'default.jpg', '2022-10-22 09:31:13', NULL),
(2, '', 'foods', 1, 'default.jpg', '2022-10-22 09:31:33', NULL),
(3, '', 'healthy', 1, 'default.jpg', '2022-10-22 09:31:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `dicount` float NOT NULL,
  `discount_type` tinyint(1) NOT NULL,
  `max-usage_count` int(11) NOT NULL,
  `max_usage_count_per_user` int(11) NOT NULL,
  `min_order_price` float NOT NULL,
  `max_discount_price` float NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `start_at`, `end_at`, `dicount`, `discount_type`, `max-usage_count`, `max_usage_count_per_user`, `min_order_price`, `max_discount_price`, `status`, `created_at`, `updated_at`) VALUES
(0, '123', '2022-10-22 12:03:31', '2022-11-22 12:03:31', 100, 1, 10, 2, 500, 100, 1, '2022-10-22 10:04:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favours`
--

CREATE TABLE `favours` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_ar` varchar(64) NOT NULL,
  `title_en` varchar(64) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `discount` float NOT NULL,
  `discount_typy` tinyint(1) NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `deliverd_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `total_price` float NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `coupon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `number`, `deliverd_at`, `status`, `total_price`, `notes`, `created_at`, `updated_at`, `coupon_id`) VALUES
(0, 1, '2022-10-22 12:04:46', 1, 5000, NULL, '2022-10-22 10:05:23', NULL, 0),
(1, 22, '2022-10-22 12:24:40', 1, 10000, NULL, '2022-10-22 10:25:00', NULL, 0),
(2, 2, '2022-10-22 12:25:06', 1, 2000, NULL, '2022-10-22 10:25:35', '2022-10-22 10:25:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `details_ar` longtext NOT NULL,
  `details_en` longtext NOT NULL,
  `status` double NOT NULL,
  `quantity` float NOT NULL,
  `price` float NOT NULL,
  `image` varchar(64) DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `brand_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ar`, `name_en`, `details_ar`, `details_en`, `status`, `quantity`, `price`, `image`, `created_at`, `updated_at`, `brand_id`, `subcategory_id`) VALUES
(6, '', 'Samsung A13 4GB Ram, 64GB - Blac', '', 'About this item\r\nsamsung Galaxy\r\nLTE\r\nRAM: 4GB\r\ncolor: Black\r\nDual SIM', 1, 5, 5000, 'Samsung A13.jpg', '2022-10-19 10:44:38', '2022-10-19 10:56:21', 1, 1),
(7, '', 'aple mobile', '', '', 1, 5, 8000, 'apple.jpg', '2022-10-19 11:06:29', '2022-10-19 11:31:15', 2, 1),
(10, '', 'lenovo', '', '', 1, 3, 50000, 'lenovo.jpg', '2022-10-22 09:42:38', '2022-10-22 09:42:52', 6, 1),
(14, '', 'chepsi', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dumm', 1, 24, 5, 'chepsi.jpg', '2022-10-23 04:54:05', NULL, 7, 11),
(19, '', 'feta', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dumm', 1, 24, 50, 'feta.png', '2022-10-23 04:58:57', NULL, 4, 11);

-- --------------------------------------------------------

--
-- Table structure for table `products_offers`
--

CREATE TABLE `products_offers` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_orders`
--

CREATE TABLE `products_orders` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_orders`
--

INSERT INTO `products_orders` (`product_id`, `order_id`, `price`, `quantity`) VALUES
(6, 0, 1000, 3),
(7, 0, 2000, 4),
(7, 1, 50000, 4),
(7, 2, 3000, 2),
(10, 2, 5000, 5),
(14, 1, 4000, 6),
(14, 2, 8000, 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product_details`
-- (See below for the actual view)
--
CREATE TABLE `product_details` (
`id` int(10) unsigned
,`name_ar` varchar(32)
,`name_en` varchar(32)
,`details_ar` longtext
,`details_en` longtext
,`status` double
,`quantity` float
,`price` float
,`image` varchar(64)
,`created_at` timestamp
,`updated_at` timestamp
,`brand_id` int(10) unsigned
,`subcategory_id` int(10) unsigned
,`subcategory_name_en` varchar(32)
,`brand_name_en` varchar(32)
,`category_id` int(10)
,`category_name_en` varchar(32)
);

-- --------------------------------------------------------

--
-- Table structure for table `product_specs`
--

CREATE TABLE `product_specs` (
  `spec_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `value_ar` varchar(32) NOT NULL,
  `value_en` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `rate` tinyint(1) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `rate`, `comment`, `created_at`, `updated_at`) VALUES
(1, 6, 4, 'It\'s good', '2022-10-22 09:39:39', NULL),
(1, 10, 5, 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut\r\n                                labore et dolore', '2022-10-22 19:38:02', NULL),
(2, 7, 5, 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut\r\n                                labore et dolore', '2022-10-22 19:37:48', NULL),
(9, 7, 5, 'very beautiful', '2022-10-22 09:39:39', NULL),
(9, 10, 3, 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut\r\n                                labore et dolore', '2022-10-22 19:38:17', NULL),
(13, 6, 3, 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut\r\n                                labore et dolore', '2022-10-22 19:38:32', NULL),
(14, 10, 5, 'very ver good', '2022-10-22 09:43:25', NULL),
(15, 6, 3, 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut\r\n                                labore et dolore', '2022-10-22 19:39:34', NULL),
(15, 7, 5, 'Lorem ipsum dolor sit amet, consectetur adipisici elit, sed do eius tempor incididunt ut\r\n                                labore et dolore', '2022-10-22 19:40:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` int(32) NOT NULL,
  `value_ar` varchar(32) NOT NULL,
  `value_en` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(32) NOT NULL,
  `name_en` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_ar`, `name_en`, `status`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(3, '', 'mobile', 1, 'default.jpg', '2022-10-22 09:32:09', NULL, 1),
(10, '', 'phones', 1, 'default.jpg', '2022-10-22 09:34:21', NULL, 1),
(11, '', 'chepsi', 1, 'default.jpg', '2022-10-22 09:34:42', NULL, 2),
(12, '', 'cheese', 1, 'default.jpg', '2022-10-22 09:35:26', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` enum('1','0') NOT NULL,
  `status` tinyint(1) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(64) NOT NULL DEFAULT 'default.jpg',
  `verification_code` int(10) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `gender`, `status`, `email`, `phone`, `image`, `verification_code`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'olfat', 'rezk', '12345M', '', 1, 'olfat@gmail.com', '01283131803', '', NULL, NULL, '2022-10-18 19:14:26', '2022-10-20 03:08:07'),
(2, 'mrmr', 'rezk', '01283131803', '', 1, 'mrmr@gmail.com', 'mrmr@gmail.', '', 124567, '2022-10-20 02:43:44', '2022-10-20 02:43:44', '2022-10-20 03:08:53'),
(9, 'smsm', 'mina', '12345678S', '', 0, 'smsm@gmail.com', '01234567892', '', 65482, '2022-10-20 02:54:11', '2022-10-20 02:54:11', '2022-10-20 03:09:21'),
(13, 'mina', 'mina', '12345678M', '', 0, 'mina@gmail.com', '01234567893', '', 10722, NULL, '2022-10-20 02:59:05', NULL),
(14, 'messo', 'mina', '123M456m789@', '', 0, 'messo@gmail.com', '01234567891', '', 51847, '2022-10-23 04:24:31', '2022-10-22 07:24:22', '2022-10-23 04:24:31'),
(15, 'olfat', 'saad', '$2y$10$zS9qT0s3/Vk1hFsyXOBx4uxhH', '', 0, 'olfatsaad@gmail.com', '01145687912', '', 55033, '2022-10-22 07:59:55', '2022-10-22 07:57:31', '2022-10-22 07:59:55'),
(16, 'mmm', 'mmm', '$2y$10$tsWhUbdNe6J8KXGPJ84vJeSDq', '', 0, 'mmm@gmail.com', '01236549873', '', 69390, '2022-10-22 20:02:11', '2022-10-22 19:54:18', '2022-10-22 20:02:11'),
(17, 'ooo', 'mmm', '$2y$10$JihHruE2ag20kql8s7qSyOWiN', '1', 0, 'ooo@gmail.com', '01012365478', 'default.jpg', 72448, '2022-10-23 04:18:26', '2022-10-23 04:17:29', '2022-10-23 04:18:26');

-- --------------------------------------------------------

--
-- Structure for view `product_details`
--
DROP TABLE IF EXISTS `product_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_details`  AS SELECT `products`.`id` AS `id`, `products`.`name_ar` AS `name_ar`, `products`.`name_en` AS `name_en`, `products`.`details_ar` AS `details_ar`, `products`.`details_en` AS `details_en`, `products`.`status` AS `status`, `products`.`quantity` AS `quantity`, `products`.`price` AS `price`, `products`.`image` AS `image`, `products`.`created_at` AS `created_at`, `products`.`updated_at` AS `updated_at`, `products`.`brand_id` AS `brand_id`, `products`.`subcategory_id` AS `subcategory_id`, `subcategories`.`name_en` AS `subcategory_name_en`, `brands`.`name_en` AS `brand_name_en`, `categories`.`id` AS `category_id`, `categories`.`name_en` AS `category_name_en` FROM (((`products` left join `brands` on(`brands`.`id` = `products`.`brand_id`)) left join `subcategories` on(`subcategories`.`id` = `products`.`subcategory_id`)) left join `categories` on(`categories`.`id` = `subcategories`.`category_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `addresses_ibfk_3` (`city_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favours`
--
ALTER TABLE `favours`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `products_offers`
--
ALTER TABLE `products_offers`
  ADD PRIMARY KEY (`product_id`,`offer_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD PRIMARY KEY (`product_id`,`order_id`) USING BTREE,
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product_specs`
--
ALTER TABLE `product_specs`
  ADD PRIMARY KEY (`spec_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favours`
--
ALTER TABLE `favours`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `addresses_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `favours`
--
ALTER TABLE `favours`
  ADD CONSTRAINT `favours_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favours_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `products_offers`
--
ALTER TABLE `products_offers`
  ADD CONSTRAINT `products_offers_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_offers_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`);

--
-- Constraints for table `products_orders`
--
ALTER TABLE `products_orders`
  ADD CONSTRAINT `products_orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_orders_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_specs`
--
ALTER TABLE `product_specs`
  ADD CONSTRAINT `product_specs_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_specs_ibfk_2` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`id`);

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
