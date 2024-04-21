-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2024 at 03:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_wd203`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int NOT NULL,
  `id_pro` int NOT NULL,
  `img_pro` varchar(200) NOT NULL,
  `name_pro` varchar(200) NOT NULL,
  `price_pro` int NOT NULL,
  `qt_pro` int NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `id_pro`, `img_pro`, `name_pro`, `price_pro`, `qt_pro`, `user`) VALUES
(4, 11, '4864508_AA2D7397-45BA-4309-8880-DB924AE03C0A.jpeg', 'abc', 6, 12, 'admin'),
(10, 11, '4864508_AA2D7397-45BA-4309-8880-DB924AE03C0A.jpeg', 'abc', 6, 3, 'long');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cate` int NOT NULL,
  `name_cate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cate`, `name_cate`) VALUES
(1, 'laptop'),
(2, 'dienthoai'),
(3, 'rerach');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_pro` int NOT NULL,
  `name_pro` varchar(200) NOT NULL,
  `price_pro` float NOT NULL,
  `qt_pro` int NOT NULL,
  `dcrp_pro` text NOT NULL,
  `img_pro` varchar(200) NOT NULL,
  `id_cate` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_pro`, `name_pro`, `price_pro`, `qt_pro`, `dcrp_pro`, `img_pro`, `id_cate`) VALUES
(10, 'abc', 10000, 7, 'asdasdasdasd', '353060471_256784143704006_9011415127031823510_n.jpg', 3),
(11, 'abc', 6, 87, 'adasdasd', '4864508_AA2D7397-45BA-4309-8880-DB924AE03C0A.jpeg', 1),
(12, 'abc', 10000, 13, 'asdasdasdasd', 'pngtree-answer-the-phone-call-to-call-the-phone-icon-image_1148160.jpg', 2),
(13, 'abc', 10000, 7, 'asdasdasdasd', 'pngtree-answer-the-phone-call-to-call-the-phone-icon-image_1148160.jpg', 2),
(15, 'acfdfd', 122, 12, 'vfagfd', '4864508_AA2D7397-45BA-4309-8880-DB924AE03C0A.jpeg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'faha', 'cuongdz', 'admin'),
(4, 'long', 'longrach', 'rerach');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cate`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `lk_cate` (`id_cate`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cate` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_pro` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `lk_cate` FOREIGN KEY (`id_cate`) REFERENCES `categories` (`id_cate`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
