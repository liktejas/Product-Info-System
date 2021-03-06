-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 03, 2020 at 07:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `category2`
--

CREATE TABLE `category2` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category2`
--

INSERT INTO `category2` (`cat_id`, `cat_name`) VALUES
(1, 'smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `comp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `cat_id`, `comp_name`) VALUES
(1, 1, 'Xiaomi'),
(2, 1, 'Realme'),
(3, 1, 'Motorola'),
(4, 1, 'Apple'),
(5, 1, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `company2`
--

CREATE TABLE `company2` (
  `comp_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `comp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company2`
--

INSERT INTO `company2` (`comp_id`, `cat_id`, `comp_name`) VALUES
(1, 1, 'Realme'),
(2, 1, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `comp_id`, `item_name`) VALUES
(1, 1, 'Xiaomi Redmi 10X Pro 5G'),
(2, 1, 'Xiaomi Redmi 10x 5g'),
(3, 2, 'Realme 6 Pro'),
(4, 3, 'Motorola Moto G Pro'),
(5, 3, 'Motorola Edge+'),
(6, 3, 'Motorola Edge'),
(7, 4, 'Apple iPhone SE'),
(8, 5, 'Samsung Galaxy A21s');

-- --------------------------------------------------------

--
-- Table structure for table `items2`
--

CREATE TABLE `items2` (
  `item_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items2`
--

INSERT INTO `items2` (`item_id`, `comp_id`, `item_name`) VALUES
(1, 1, 'Realme 6 Pro'),
(2, 2, 'Oppo F5'),
(3, 1, 'Realme 5 Pro');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `battery` varchar(100) NOT NULL,
  `display` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `fcamera` varchar(100) NOT NULL,
  `rcamera` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `video` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prod_id`, `name`, `company`, `img`, `processor`, `battery`, `display`, `ram`, `fcamera`, `rcamera`, `os`, `storage`, `video`, `created_at`, `updated_at`) VALUES
(1, 1, 'Xiaomi Redmi 10X Pro 5G', 'Xiaomi', 'https://fdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-10x-pro-5g.jpg', 'MediaTek MT6875 Dimensity 820 5G (7 nm)', '4520 mAh', '6.57 inches', '8GB RAM', '20 MP', '48 MP + 8 MP + 8 MP + 5 MP', 'Android 10, MIUI 11', '128GB, 256GB', 'https://www.youtube.com/embed/c0zBPq0y73w', '2020-05-28 13:23:38', '2020-05-31 17:23:33'),
(2, 2, 'Xiaomi Redmi 10x 5g', 'Xiaomi', 'https://fdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-10x-5g.jpg', 'MediaTek MT6875 Dimensity 820 5G (7 nm)', '4520 mAh', '6.57 inches', '6GB RAM, 8GB RAM', '16 MP', '48 MP + 8 MP + 2 MP', 'Android 10, MIUI 11', '64GB, 128GB, 256GB', 'https://www.youtube.com/embed/5__N8zzkzn8', '2020-05-29 05:45:54', '2020-05-31 17:25:48'),
(4, 3, 'Realme 6 Pro', 'Realme', 'https://fdn2.gsmarena.com/vv/bigpic/realme-6-pro.jpg', 'Qualcomm SM7125 Snapdragon 720G (8 nm)', '4300 mAh', '6.6 inches', '6GB RAM, 8GB RAM', '16 MP + 8 MP', '64 MP + 12 MP + 8 MP + 2 MP', 'Android 10, Realme UI', '64GB, 128GB', 'https://www.youtube.com/embed/XJrCaB4NM7w', '2020-05-29 17:11:25', '2020-05-31 17:26:01'),
(5, 4, 'Motorola Moto G Pro', 'Motorola', 'https://fdn2.gsmarena.com/vv/bigpic/motorola-moto-g-stylus-.jpg', 'Qualcomm SDM665 Snapdragon 665 (11 nm)', '4000 mAh', '6.4 inches', '4GB RAM', '16 MP', '48 MP + 16 MP + 2 MP', 'Android 10, Android One', '128GB', 'https://www.youtube.com/embed/6juhrQvijJ8', '2020-05-31 14:13:09', '2020-05-31 17:26:17'),
(6, 5, 'Motorola Edge+', 'Motorola', 'https://fdn2.gsmarena.com/vv/bigpic/motorola-edge-plus.jpg', 'Qualcomm SM8250 Snapdragon 865 (7 nm+)', '5000 mAh', '6.7 inches', '12GB RAM', '25 MP', '108 MP + 8 MP + 16 MP', 'Android 10', '256 GB', 'https://www.youtube.com/embed/3u5hzdw7vhc', '2020-05-31 14:16:48', '2020-05-31 17:26:35'),
(7, 6, 'Motorola Edge', 'Motorola', 'https://fdn2.gsmarena.com/vv/bigpic/motorola-edge-midnight-magenta.jpg', 'Qualcomm SDM765 Snapdragon 765G (7 nm)', '4500 mAh', '6.7 inches', '4GB RAM, 6GB RAM', '25 MP', '64 MP + 8 MP + 16 MP', 'Android 10', '128GB', 'https://www.youtube.com/embed/-T9U7o2NBYg', '2020-05-31 14:22:01', '2020-05-31 17:26:49'),
(8, 7, 'Apple iPhone SE', 'Apple', 'https://fdn2.gsmarena.com/vv/bigpic/apple-iphone-se-2020.jpg', 'Apple A13 Bionic (7 nm+)', '1821 mAh', '4.7 inches', '3GB RAM', '7 MP', '12 MP', 'iOS 13', '64GB, 128GB, 256GB', 'https://www.youtube.com/embed/2QS742LvM_I', '2020-05-31 14:25:38', '2020-05-31 17:27:03'),
(9, 8, 'Samsung Galaxy A21s', 'Samsung', 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-a21s-.jpg', 'Exynos 850', '5000 mAh', '6.5 inches', '3GB RAM, 4GB RAM, 6GB RAM', '13 MP', '48 MP + 8 MP + 2 MP + 2 MP', 'Android 10, One UI 2.0', '32GB, 64GB', 'https://www.youtube.com/embed/C21WGOM_6r0', '2020-05-31 14:32:01', '2020-05-31 17:27:20');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Tejas', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `category2`
--
ALTER TABLE `category2`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `company2`
--
ALTER TABLE `company2`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items2`
--
ALTER TABLE `items2`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category2`
--
ALTER TABLE `category2`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company2`
--
ALTER TABLE `company2`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items2`
--
ALTER TABLE `items2`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
