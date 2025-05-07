-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2025 at 06:37 AM
-- Server version: 8.4.5
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_Id` int NOT NULL,
  `product_id` int NOT NULL,
  `count` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `comment` text NOT NULL,
  `creation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `title`, `comment`, `creation_date`, `username`) VALUES
(6, 'tets', 'test', '2025-05-07 02:35:07', 'test'),
(7, 'test', 'test', '2025-05-07 04:47:56', 'admin'),
(8, 'test', 'testets', '2025-05-07 04:48:06', 'admin'),
(9, 'The styling is awful, but I dont have time', 'Sorry.', '2025-05-07 05:04:35', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL,
  `jobTitle` varchar(80) NOT NULL,
  `favoriteColor` varchar(80) NOT NULL,
  `image` varchar(255) NOT NULL,
  `hobby` varchar(80) NOT NULL,
  `favoritebook` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `firstName`, `lastName`, `jobTitle`, `favoriteColor`, `image`, `hobby`, `favoritebook`) VALUES
(1, 'John', 'Doe', 'Web Developer', 'Blue', 'John-Doe.jpg', 'Running', 'test'),
(28, 'test', 'test', 'test', 'test', 'testtest20539Robot.webp', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `price` float NOT NULL,
  `timeRequired` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `timeRequired`, `image`) VALUES
(1, 'Simple Website', 'A simple website', 300, 6, 'Simple Website.webp'),
(2, 'Complex Website', 'A complex website', 7003, 12, 'Complex Website42730200.webp'),
(3, 'Simple API', 'A simple API', 500, 4, 'Simple API.png'),
(4, 'Complex API', 'A complex API', 700, 7, 'Complex API.webp'),
(5, 'Stickers', 'A sticker set', 1, 2, 'Stickers.webp'),
(6, 'UML Diagrams', 'A UML set', 100, 2, 'Complex API.webp'),
(7, 'Bible', 'A bible', 10, 2, 'BibleBook.webp'),
(8, 'Bible App', 'A bible App', 100, 1, 'Bible.webp'),
(9, 'Spoon Full of Sugar (SOS)', 'A robot that does your chores', 1000000, 1, 'Robot.webp'),
(10, 'A Relic', 'A Relic', 1000000, 1000, 'relic.webp'),
(12, 'test5', 'test', 32, 23, 'test56824200.webp'),
(13, 'test', 'test', 2342, 234, 'test51935giphy.gif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL,
  `emailAddress` varchar(80) NOT NULL,
  `lastLoginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstName`, `lastName`, `emailAddress`, `lastLoginTime`, `role`) VALUES
(2, 'publisher', '$2y$10$WJkVyNztj29HGGiO37ep6e7/ULZ8BHCu28xb2wkXE1NM6JOe/994S', 'publisher', 'publisher', 'publisher@test.com', '2025-05-07 00:39:12', 'publisher'),
(3, 'customer', '$2y$10$AmnrCcf8nT7ELlFgcb53nezBaIiVh1ZWwEc/tLzWdV1C/DrbOHYw2', 'customer', 'customer', 'customer@test.com', '2025-05-07 00:40:30', 'customer'),
(4, 'admin', '$2y$10$ZvepmSiNWqoI/Fh1zv4H5ecsX.Wg6GGhd29AkdNQGQVQhKp6cGxV.', 'admin', 'admin', 'admin@test.com', '2025-05-07 00:41:03', 'admin'),
(5, 'test', '$2y$10$7F48km7sFxeZmKGp.CEbvuY3ElvTMruT1S3MALMsbdZEYwIkHQyG2', 'tets', 'tets', 'test@tets.com', '2025-05-07 03:05:54', 'customer'),
(6, 'testtest', '$2y$10$/fwkOermIPqVubp8FlKzIOpT2W5FakGXFjKaxciRgE7aJWyvLkLze', 'test', 'test', 'test22@testest.com', '2025-05-07 06:25:43', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`username`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
