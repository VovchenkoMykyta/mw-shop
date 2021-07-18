-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 18, 2021 at 07:06 PM
-- Server version: 8.0.24
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mw-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `img_url` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `img_url`, `name`) VALUES
(1, NULL, 'Джинсы');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `full_name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `amount` smallint NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `user_id`, `phone_number`) VALUES
(1, 1, '+380665754516'),
(2, 6, '+380445566281'),
(4, 8, '+380933261455'),
(5, 12, '+380665754516'),
(6, 15, '+380445566289'),
(7, 15, '+380445566281'),
(8, 12, '+380665754516'),
(9, 1, '+380994455663'),
(10, 16, '+380665754516'),
(11, 16, '+380665754516'),
(12, 17, '+380665754518'),
(13, 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `describtion` text NOT NULL,
  `characters` text NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `delete_character` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `describtion`, `characters`, `category_id`, `price`, `manufacturer`, `delete_character`) VALUES
(1, 'Эластичные джинсы', 'Эластичные джинсы', 'Машинная стирка.\r\n79% хлопок, 20% переработанный хлопок, 1% эластан.', 1, '664', 'no name', NULL),
(2, 'Джинсы из жесткого хлопкового материала', 'Джинсы из жесткого хлопкового материала', 'Машинная стирка.\r\n100% хлопок.', 1, '532', 'no name', NULL),
(3, 'Эластичные джинсы', 'Эластичные джинсы', 'Машинная стирка.\r\n98% хлопок, 2% эластан.', 1, '664', 'no name', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `img_url` text NOT NULL,
  `char` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img_url`, `char`) VALUES
(1, 1, '/images/mens_jeans001.jpg', 'main'),
(2, 1, '/images/mens_jeans002.jpg', NULL),
(3, 1, '/images/mens_jeans003.jpg', NULL),
(4, 1, '/images/mens_jeans004.jpg', NULL),
(5, 2, '/images/mans_jeans005.jpg', 'main'),
(6, 2, '/images/mans_jeans006.jpg', NULL),
(7, 2, '/images/mans_jeans007.jpg', NULL),
(8, 2, '/images/mans_jeans008.jpg', NULL),
(9, 3, '/images/mans_jeans009.jpg', 'main'),
(10, 3, '/images/mans_jeans010.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `creation_date` datetime NOT NULL,
  `delete_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `creation_date`, `delete_date`) VALUES
(1, 'admin', '$2y$10$E4AwXOZNu.C4x2a9nQ7OPud4mRUJLyK1bLDlPeFh60MR6fI6IfCRK', 'barbos689@gmail.com', '2021-07-09 17:38:15', NULL),
(6, 'user_1_t', '$2y$10$R5CWjBTPr4NPRv4nlD0/dupuq/LxMy5cdrVr.UKjdg5f40JRs0.wW', 'user_1@gmail.com', '2021-07-12 17:38:36', '2021-07-12 17:51:48'),
(8, 'userOne', '$2y$10$VvDzv8fJibSN8qH4GwJsZ.SOTcv3NrIN.c/.UNBNolZjhgEIYiSOi', 'user@mail.ru', '2021-07-12 22:43:07', '2021-07-12 22:44:40'),
(12, 'nikita', '$2y$10$dlsylbMTlSgmctB3VrcDtehMrp6WdDQC39dF4SA54pbHvUbw7pRv.', 'nikita123@gmail.com', '2021-07-13 14:22:35', NULL),
(15, 'mykyta', '$2y$10$mw4MBfrOW3N.hd/lXusFAetBxU3Lpa6taXgpI6kqtfsGean6NDMsq', 'mykyta456@gmail.com', '2021-07-13 14:31:38', NULL),
(16, 'user4', '$2y$10$gQAfuuliOcWFusD2qJK3Pu1zbeOAMeBrgBTI0C5rVrNi0rfC66ZXu', 'user67@gmail.com', '2021-07-13 15:35:41', NULL),
(17, 'vovchenko_1659', '$2y$10$AhJJrMs3CpgIUkv.fQEtbe4znPgzPq1KumD3OFiDuDo7HjfTYMrTa', 'some@gmail.com', '2021-07-16 15:55:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delete_date` (`delete_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
