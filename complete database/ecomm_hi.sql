-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2021 at 09:54 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm_hi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `gender`, `password`, `confirm_password`) VALUES
(1, 'hi', 'hi@dsa.com', 'male', 'QFBha2lzdGFuMTIz', 'QFBha2lzdGFuMTIz');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `product_price`) VALUES
(10, 2, 1, '1000'),
(17, 2, 1, '5000');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approve` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `address`, `status`, `payment_status`, `payment_method`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'dasdf', 'pending', 'pending', 'cash on delivery', NULL, NULL),
(3, 1, 1, 'Lahore', 'pending', 'pending', 'cash', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `gallery`, `gallery2`, `gallery3`, `description`, `short_description`) VALUES
(1, 'Skechers Men\'s Classic Fit-Delson-Camden Sneaker', '2000', 'Shoes', '1Delson.png', '2Delson.png', '3Delson.png', ' Imported\r\n,Synthetic sole\r\n,Shaft measures approximately not_applicable from arch\r\n,Air Cooled Memory Foam\r\n,Bungee Lace\r\n,Adjustable', '100% Textile and Synthetic'),
(2, 'Skechers Women\'s Go Walk Joy Walking Shoe', '1000', 'Shoes', '1Joy.png', '2Joy.png', '3Joy.png', 'Textile\r\n,Imported\r\n,Synthetic sole\r\n,Shaft measures approximately low-top from arch\r\n,Lightweight and flexible\r\n,Responsive 5Gen cushioning', 'Skechers Goga Max high rebound insole'),
(3, 'Dockers Men\'s Newpage Sandal', '3000', 'Shoes', '1Dockers.png', '2Dockers.png', '3Dockers.png', '100% Synthetic\r\n,Imported\r\n,Rubber sole\r\n,Memory foam insole shapes to foot for instant comfort and a fusion footbed adds an extra layer of cushion\r\n,Velcro closures and generous fit offer a relaxed and more personal fit\r\n,Flexible construction with a durable rubber outsole\r\n,Whole sizes only', 'Distressed, tumbled man-made uppers'),
(4, 'Clarks Women\'s Breeze Sea', '1000', 'Shoes', '1Clarks.png', '2Clarks.png', '3Clarks.png', '100% Synthetic\r\n,Made in the USA or Imported\r\n,Synthetic Rubber sole\r\n,Comfort Features: Ortholite Footbed, EVA Outsole, Soft Textile Lining\r\n,Ultra-Lightweight', 'Clarks Cloudsteppers'),
(5, 'Merrell Men\'s Moab 2 Vent Hiking Shoe', '2000', 'Shoes', '1Hiking.png', '2Hiking.png', '3Hiking.png', 'Imported\r\n,Synthetic sole\r\n,Performance suede leather and mesh upper\r\n,Bellows, closed-cell foam tongue keeps moisture and debris out\r\n,Protective rubber toe cap\r\n,Breathable mesh lining. 5mm lug depth\r\n,Vibram TC5+ sole', 'suede leather, mesh'),
(6, 'Rockport Men\'s Eureka Walking Shoe', '500', 'Shoes', '1Rockport.png', '2Rockport.png', '3Rockport.png', 'Imported\r\n,Rubber sole\r\n,GENUINE LEATHER: Leather upper is easy to clean and maintain, so these walking shoes for men look and feel even better with time\r\n,FATIGUE-FIGHTING FOOTBED: Latex foam footbed generously cushions the foot to help reduce foot fatigue as you stand and walk', 'San crispino'),
(7, 'Venum Elite Boxing Shoes', '1500', 'Shoes', '1Venum.png', '2Venum.png', '3Venum.png', 'Rubber outsole: increased grip, durability and stability.\r\n,Optimized comfort with anatomical designed insole.\r\n,Bonded insole to prevent slipping.\r\n,IMPORTANT: fit will be a half size larger than standard US sizing. If you are normally a US size 10, you should order a size 9.5', 'Glossy PU Patent, PU Flex, Mesh Honeycomb.'),
(8, 'Men\'s Lite Racer Adapt 4.0 Running Shoe', '1000', 'Shoes', '1adidas.png', '2adidas.png', '3adidas.png', 'Imported\r\n,Rubber sole\r\n,Men\'s cushioned slip-on shoes with the look of runners, made with recycled materials\r\n,Slip-on construction with elastic strap\r\n,Mesh upper with a sock-like feel\r\n,This product is made with Primegreen, a series of high-performance recycled materials.', '100% Synthetic Textile');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `gender`, `confirm_password`) VALUES
(1, 'dsa', 'dsa@dsa.com', 'QFBha2lzdGFuMTIz', 'male', 'QFBha2lzdGFuMTIz'),
(2, 'sd', 'fds@dsa.com', 'QFBha2lzdGFuMTIz', 'male', 'QFBha2lzdGFuMTIz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
