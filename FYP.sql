-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2017 at 07:34 पूर्वाह्न
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `FYP`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(35) NOT NULL,
  `company_address` varchar(35) NOT NULL,
  `company_phone` varchar(20) NOT NULL,
  `company_image` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_address`, `company_phone`, `company_image`, `user_id`) VALUES
(1, 'Lee Brand Comps', 'Durbar Marg', '09128384', 'color.png', 39),
(4, 'jhg1', 'jhgjhg', 'jhgjh', 'color.png', 1),
(5, 'ADIDAS', 'jhaskdf', '98273', 'lee.png', 41),
(6, 'jigmee', 'lkj', 'lkj', '1.png', 43),
(7, 'Vendor', 'thamel', '91872489', 'New_York_Jets2.jpg', 44);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `bank_acc` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `email`, `phone`, `address`, `city`, `postal_code`, `password`, `bank_acc`) VALUES
(75, 'tester@gmail.com', 'sanjeev', 'sanjeev', 'testing', 'klasfdj', 'lkjasdf', NULL, NULL),
(76, 'tester2@gmail.com', 'sanjeev', 'tesadfj', 'hkj', 'hk', 'jh', NULL, NULL),
(77, 'tester3@gmail.com', 'kjh', 'k', 'hkj', 'h', 'kjh', NULL, NULL),
(78, 'sanjeev', 'sanjeev@gmail.com', NULL, 'boudha', NULL, NULL, '98d34c1758b15b5a359b69c2b08c57', '123986tad'),
(79, 'kj', 'fortest@gmail.com', 'hkj', 'hkj', 'h', 'kjh', NULL, NULL),
(80, 'jkh', 'panttest@gmail.com', 'kj', 'hkj', 'hk', 'jh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_product`
--

CREATE TABLE `customer_product` (
  `cust_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_quantity` varchar(30) NOT NULL,
  `req_date` date NOT NULL,
  `delivery_time_limit` date NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `delivered_date` date NOT NULL,
  `order_type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_product`
--

INSERT INTO `customer_product` (`cust_product_id`, `product_id`, `customer_id`, `product_quantity`, `req_date`, `delivery_time_limit`, `status`, `delivered_date`, `order_type`) VALUES
(156, 50, 75, '3', '2017-04-10', '2017-04-17', 'delivered', '2017-04-10', NULL),
(157, 48, 76, '3', '2017-04-10', '2017-04-17', 'delivered', '2017-04-14', NULL),
(158, 51, 77, '1', '2017-04-10', '2017-04-17', 'delivered', '2017-04-10', NULL),
(159, 48, 78, '2', '2017-04-15', '2017-04-22', 'delivered', '2017-04-15', 'cashdelivery'),
(160, 48, 78, '2', '2017-04-15', '2017-04-22', 'delivered', '2017-04-15', 'cashdelivery'),
(161, 47, 78, '2', '2017-04-15', '2017-04-22', 'delivered', '2017-04-15', 'cashdelivery'),
(162, 48, 79, '2', '2017-04-15', '2017-04-22', 'delivered', '2017-04-15', NULL),
(163, 51, 80, '1', '2017-04-15', '2017-04-22', NULL, '0000-00-00', NULL),
(164, 50, 78, '1', '2017-04-16', '2017-04-23', NULL, '0000-00-00', 'cashdelivery');

-- --------------------------------------------------------

--
-- Table structure for table `featured_products`
--

CREATE TABLE `featured_products` (
  `featured_id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured_products`
--

INSERT INTO `featured_products` (`featured_id`, `product_id`, `user_id`) VALUES
(35, 46, 39),
(37, 45, 39),
(39, 47, 39),
(40, 48, 39),
(41, 50, 39);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `payed_amt` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `transaction_id`, `payed_amt`, `user_id`) VALUES
(1, '58f19f9f4252b', 600, 78),
(2, '58f1a0d16c695', 3000, 78),
(3, '<br />\r\n<b>Notice</b>:  Undefined index: t_id in <', 1200, 78),
(4, '<br />\r\n<b>Notice</b>:  Undefined index: t_id in <', 1200, 78);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_quantity` int(20) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_details` varchar(200) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_quantity`, `product_price`, `product_details`, `product_brand`, `user_id`, `product_cat_id`) VALUES
(28, 'adidas', 1341, '124897', 'lkasdflkj', 'sadf', 39, 2),
(30, 'Tee', 12, 'kjl', 'kj', 'lkj', 41, 2),
(31, 'Rujal products', 12, 'lkj', 'lk', 'jk', 41, 1),
(33, 'nEw', 53, 'hg', 'jhg', 'jh', 39, 1),
(35, 'kjhlkj', 89, 'lkj', 'hl', 'kjh', 39, 1),
(45, 'Blue T-shirt', 120, '600', 'This is original', 'Made in China', 39, 3),
(46, 'Not A Tshirt', 1, '400', 'Not A tshirt brands', 'Check Brand', 39, 3),
(47, 'Bat Man', 15, '1200', 'Not Bat Man T Shirt', 'BatMan', 39, 3),
(48, 'Blue T-SHirt Two', 12, '300', 'Blue T shirt Two', 'T shirt one', 39, 3),
(50, 'One of the best productsdf', 15, '1200', 'Shanta One', 'Shanta', 39, 3),
(51, 'Green Jeans', 1, '1200', 'This is jeans', 'Chinese', 41, 1),
(54, 'kjasdhf', 9234, '0', 'fyasdfjh', 'kjshdf', 39, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_cat_id` int(11) NOT NULL,
  `product_cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_cat_id`, `product_cat_name`) VALUES
(1, 'pants'),
(2, 'shirt'),
(3, 't-shirt');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`image_id`, `image_name`, `product_id`) VALUES
(10, 'tshirt-men-2-col.jpg', 45),
(11, 'not-a-shirt.jpg', 46),
(12, 'Mens_Red_Batman_Graffiti_Logo_T_Shirt_hi_res.jpg', 47),
(13, 'Blue_Tshirt.jpg', 48),
(15, '200712_chopshop_tshirt.jpg', 50),
(16, 'download.jpg', 51),
(19, 'random.jpg', 54);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `date_added` varchar(15) NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `email`, `phone_number`, `address`, `date_added`, `type_id`) VALUES
(1, 'sanjeev', '98d34c1758b15b5a359b69c2b08c5767', 'sanjeev@gmail.com', '09809', 'asdfjkh', 'kjshf', 1),
(39, 'Lee', '98d34c1758b15b5a359b69c2b08c5767', 'lee@gmail.com', '988271624', 'boudha', '2016-Oct-28', 2),
(41, 'Adidas', '98d34c1758b15b5a359b69c2b08c5767', 'adidas@gmail.com', 'check', 'check', '2016-Oct-28', 2),
(43, 'Jigmeeasdf', '98d34c1758b15b5a359b69c2b08c5767', 'jigmee@gmail.com', 'hasd', 'hkj', '2017-Feb-04', 2),
(44, 'Mirak', '98d34c1758b15b5a359b69c2b08c5767', 'mirke@gmail.com', '980328888', 'dhumbarahi', '2017-Feb-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`type_id`, `type_name`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_company` (`user_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_product`
--
ALTER TABLE `customer_product`
  ADD PRIMARY KEY (`cust_product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`featured_id`),
  ADD KEY `Product ID` (`product_id`),
  ADD KEY `User ID` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `Users_id` (`user_id`),
  ADD KEY `category` (`product_cat_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `productID` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `type` (`type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `customer_product`
--
ALTER TABLE `customer_product`
  MODIFY `cust_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `featured_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `Company_User` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_product`
--
ALTER TABLE `customer_product`
  ADD CONSTRAINT `customer_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `customer_product_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD CONSTRAINT `Users_Product_Feature` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `check_the_cons` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `User_deletion` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_deletion` FOREIGN KEY (`product_cat_id`) REFERENCES `product_category` (`product_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `ProductDeleteonImage` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_auth` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
