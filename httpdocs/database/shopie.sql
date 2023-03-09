-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 09:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopie`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Tata'),
(2, 'Realme 7i'),
(4, 'Amul'),
(5, 'chocolate products');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(10) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `quentity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Fruits'),
(2, 'Vegetables'),
(3, 'Books'),
(4, 'Dresses'),
(5, 'Snacks'),
(6, 'Jewels'),
(8, 'Milk Products');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products_list`
--

CREATE TABLE `ordered_products_list` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered_products_list`
--

INSERT INTO `ordered_products_list` (`order_id`, `user_id`, `product_id`, `quantity`, `sub_amount`) VALUES
(1, 1, 9, 1, '50.48'),
(1, 1, 9, 1, '50.48'),
(1, 1, 8, 5, '202.50'),
(2, 1, 9, 6, '302.88'),
(3, 1, 9, 3, '195.00'),
(3, 1, 8, 4, '162.00'),
(4, 1, 8, 3, '121.50'),
(4, 1, 18, 3, '150.00'),
(4, 1, 11, 2, '100.00'),
(5, 3, 18, 1, '50.00'),
(5, 3, 8, 2, '81.00'),
(5, 3, 11, 1, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `Invoice_no` int(11) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `ordered_products` int(10) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `Invoice_no`, `amount_due`, `order_date`, `ordered_products`, `order_status`) VALUES
(1, 1, 70456264, '252.98', '2023-02-25', 2, ' penting'),
(2, 1, 1918771133, '302.88', '2023-02-25', 1, ' penting'),
(3, 1, 448022280, '357.00', '2023-02-26', 2, ' Conformed payment'),
(4, 1, 1531452735, '371.50', '2023-02-26', 3, ' Conformed payment'),
(5, 3, 1609195585, '181.00', '2023-02-27', 3, ' penting payment');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_details` text NOT NULL,
  `prod_keywords` varchar(200) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `image1` varchar(100) NOT NULL,
  `image2` varchar(100) NOT NULL,
  `image3` varchar(100) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_details`, `prod_keywords`, `cat_id`, `brand_id`, `image1`, `image2`, `image3`, `prod_price`) VALUES
(8, 'Tomato', 'The tomato is the edible berry of the plant solanum lycopersicum, commonly known as a tomato plant. The species originated in western south america and central america.', 'tomato,fruits,vegetables', 1, 1, 'tomato.jpg', 'tamato1.jpg', 'tomato2.jpg', '40.50'),
(11, 'Butter', 'With our expertise and trustworthiness, we are engaged in offering an optimum quality range of Yellow Butter.', 'butter, cooking cheese, cheese', 8, 4, 'butter.jpeg', 'butter2.jpeg', '', '60.00'),
(18, 'Dairy milk', 'Package available in $5, $10.', 'milk products Chocolate, chocolate products, snacks', 5, 4, 'dairy.jpeg', 'dairy2.jpeg', 'dairy3.jpeg', '55.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` text NOT NULL,
  `pass` text NOT NULL,
  `user_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `pass`, `user_status`) VALUES
(1, 'Arun Kumar', 'prasath@gmail.com', 'sspl', 'Admin'),
(9, 'sspl', 'sspl@gmail.com', 'sspl', 'Guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
