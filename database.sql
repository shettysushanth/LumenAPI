-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 24, 2019 at 04:52 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_19_180910_create_users_table', 1),
(2, '2019_07_21_202435_create_products_table', 2),
(3, '2019_07_22_004019_create_usersproducts_table', 3),
(4, '2019_07_22_122637_create_users_products_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, 'battery-4', 'Battery 4', 15, 'Battery 4', NULL, NULL),
(2, 'guitar-rig-5', 'Guitar Rig 5', 95, 'Guitar Rig 5', NULL, NULL),
(3, 'komplete-12', 'Komplete 12', 75, 'Komplete 12', NULL, NULL),
(4, 'komplete-audio-2', 'Komplete Audio 2', 55, 'Komplete Audio 2', NULL, NULL),
(5, 'komplete-kontrol-m32', 'Komplete Kontrol M32', 15, 'Komplete Kontrol M32', NULL, NULL),
(6, 'komplete-kontrol-s49-black', 'Komplete Kontrol S49 Black', 25, 'Komplete Kontrol S49 Black', NULL, NULL),
(7, 'komplete-kontrol-s61', 'Komplete Kontrol S61', 15, 'Komplete Kontrol S61', NULL, NULL),
(8, 'kontakt-6', 'Kontakt 6', 15, 'Kontakt 6', NULL, NULL),
(9, 'lone-forest', 'Lone Forest', 65, 'Lone Forest', NULL, NULL),
(10, 'maschine', 'Maschine', 25, 'Maschine', NULL, NULL),
(11, 'maschine-jam', 'Maschine JAM', 55, 'Maschine JAM', NULL, NULL),
(12, 'massive', 'Massive', 25, 'Massive', NULL, NULL),
(13, 'reaktor-6', 'Reaktor 6', 25, 'Reaktor 6', NULL, NULL),
(14, 'traktor-kontrol-s4', 'Traktor Kontrol S4', 21, 'Traktor Kontrol S4', NULL, NULL),
(15, 'traktor-kontrol-s8', 'Traktor Kontrol S8', 35, 'Traktor Kontrol S8', NULL, NULL),
(16, 'traktor-kontrol-z2', 'Traktor Kontrol Z2', 27, 'Traktor Kontrol Z2', NULL, NULL),
(17, 'traktor-pro-3', 'Traktor PRO 3', 25, 'Traktor PRO 3', NULL, NULL),
(18, 'una-corda', 'Una Corda', 45, 'Una Corda', NULL, NULL),
(19, 'iPhone-X-128GB', 'iPhone X 128GB Mobile Phone', 500, 'iPhone X 128GB Mobile Phone', '2019-07-22 17:48:08', '2019-07-22 17:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'AlbertoBoyleI', 'Dr. Alberto Boyle I', 'clark32@yahoo.com', 'secret', '', NULL, NULL, NULL, NULL),
(3, 'CandelarioKassulke', 'Candelario Kassulke', 'roselyn62@gmail.com', 'secret', '', NULL, NULL, NULL, NULL),
(4, 'AbnerMueller', 'Abner Mueller', 'kabbott@yahoo.com', 'secret', '', NULL, NULL, NULL, NULL),
(5, 'OdieMiller', 'Mrs. Odie Miller Jr.', 'boyer.kallie@hotmail.com', 'secret', '', NULL, NULL, NULL, NULL),
(6, 'westonratke', 'Weston Ratke', 'mac94@moen.com', '$2y$10$Klf3A3SNOesjGiL1AblkHeK4CPsAuQJhHoGqI2BWgEY4Vuu3lxelm', 'c7ffa363d46ef5b7a034b7309aca5bff28e1d712', NULL, '2019-07-22 13:03:11', '2019-07-23 11:27:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_products`
--

INSERT INTO `users_products` (`id`, `user_id`, `sku`, `created_at`, `updated_at`) VALUES
(1, '6', 'battery-4', NULL, NULL),
(2, '6', 'una-corda', NULL, NULL),
(3, '6', 'komplete-12', NULL, NULL),
(4, '2', 'battery-4', NULL, NULL),
(5, '2', 'komplete-kontrol-m32', NULL, NULL),
(6, '2', 'kontakt-6', NULL, NULL),
(7, '3', 'massive', NULL, NULL),
(8, '3', 'komplete-audio-2', NULL, NULL),
(9, '3', 'reaktor-6', NULL, NULL),
(10, '4', 'massive', NULL, NULL),
(11, '4', 'komplete-audio-2', NULL, NULL),
(12, '4', 'reaktor-6', NULL, NULL),
(13, '5', 'komplete-kontrol-s49-black', NULL, NULL),
(14, '5', 'komplete-audio-2', NULL, NULL),
(15, '5', 'komplete-12', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_products`
--
ALTER TABLE `users_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
