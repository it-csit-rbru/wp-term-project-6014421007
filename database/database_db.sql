-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2019 at 02:04 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `foodshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `food_id` int(10) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_image` text NOT NULL,
  `food_price` float NOT NULL,
  `food_type` varchar(30) NOT NULL,
  `food_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`food_id`, `food_name`, `food_image`, `food_price`, `food_type`, `food_date`) VALUES
(3, 'ข้าวผัด', 'images/upload_foodmenu/maxresdefault.jpg', 40, 'Cooked', '2019-05-12 13:27:20'),
(4, 'ผัดผักรวม', 'images/upload_foodmenu/ttt.jpg', 50, 'Vegetable', '2019-05-12 12:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `foods_type`
--

CREATE TABLE `foods_type` (
  `food_type_id` int(10) NOT NULL,
  `food_type_name` varchar(100) NOT NULL,
  `food_type_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foods_type`
--

INSERT INTO `foods_type` (`food_type_id`, `food_type_name`, `food_type_image`) VALUES
(1, 'Cooked', 'images/2.png'),
(2, 'Vegetable', 'images/3.png'),
(3, 'Boil', 'images/4.png'),
(4, 'Dessert', 'images/5.png'),
(5, 'Beverage', 'images/6.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `table_id` int(10) NOT NULL,
  `order_list` varchar(200) NOT NULL,
  `order_price` float NOT NULL,
  `order_status` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(10) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `status_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `status_type`) VALUES
(1, 'รอชำระเงิน', 'order'),
(2, 'ชำระเงินเรียบร้อย', 'order'),
(3, 'ออเดอร์ถูกยกเลิก', 'order'),
(4, 'รอรับออเดอร์', 'order'),
(5, 'กำลังทำออเดร์', 'order');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(10) NOT NULL,
  `table_number` int(10) NOT NULL,
  `table_customer_num` int(10) NOT NULL,
  `table_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `foods_type`
--
ALTER TABLE `foods_type`
  ADD PRIMARY KEY (`food_type_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `food_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `foods_type`
--
ALTER TABLE `foods_type`
  MODIFY `food_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(10) NOT NULL AUTO_INCREMENT;
