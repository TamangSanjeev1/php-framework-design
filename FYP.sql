-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2017 at 03:55 अपराह्न
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
(7, 'Vendor', 'thamel', '91872489', 'New_York_Jets2.jpg', 44),
(8, 'checking', 'testing', 'testing', 'er.png', 45);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_quantity` varchar(20) NOT NULL,
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
(28, 'adidas', '1341', '124897', 'lkasdflkj', 'sadf', 39, 2),
(30, 'Tee', 'lkjsfl', 'kjl', 'kj', 'lkj', 41, 2),
(31, 'Rujal products', 'afsd', 'lkj', 'lk', 'jk', 41, 1),
(33, 'nEw', 'gj', 'hg', 'jhg', 'jh', 39, 1),
(35, 'kjhlkj', 'hkjh', 'lkj', 'hl', 'kjh', 39, 1),
(45, 'Blue T-shirt', '20', '600', 'This is original', 'Made in China', 39, 3),
(46, 'Not A Tshirt', '25', '400', 'Not A tshirt brands', 'Check Brand', 39, 3),
(47, 'Bat Man', '15', '1200', 'Not Bat Man T Shirt', 'BatMan', 39, 3),
(48, 'Blue T-SHirt Two', '9', '300', 'Blue T shirt Two', 'T shirt one', 39, 2),
(49, 'Joke T Shirt', '60', '600', 'This is Joke', 'Joke', 39, 3),
(50, 'One of the best productsdf', '15', '1200', 'Shanta One', 'Shanta', 39, 3),
(51, 'Green Jeans', '12', '1200', 'This is jeans', 'Chinese', 41, 1),
(52, 'Dark Green', '10', '1200', 'Green Jeans', 'Checked', 41, 1);

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
(14, 'a0e2e4995155ec66eda2651b81bc413c.jpg', 49),
(15, '200712_chopshop_tshirt.jpg', 50),
(16, 'download.jpg', 51),
(17, '0117_3836_896_f.jpg', 52);

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
(42, 'Rujal', '98d34c1758b15b5a359b69c2b08c5767', 'rujal@gmail.com', '897129837', 'Bhaktapur', '2016-Nov-14', 2),
(43, 'Jigmeeasdf', '98d34c1758b15b5a359b69c2b08c5767', 'jigmee@gmail.com', 'hasd', 'hkj', '2017-Feb-04', 2),
(44, 'Mirak', '98d34c1758b15b5a359b69c2b08c5767', 'mirke@gmail.com', '980328888', 'dhumbarahi', '2017-Feb-20', 2),
(45, 'umesh', '98d34c1758b15b5a359b69c2b08c5767', 'umes@gmail.com', 'sanjeev', 'sanjeev', '2017-Feb-26', 2);

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
-- Indexes for table `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`featured_id`),
  ADD KEY `Product ID` (`product_id`),
  ADD KEY `User ID` (`user_id`);

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
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `featured_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
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
  ADD CONSTRAINT `cat_deletion` FOREIGN KEY (`product_cat_id`) REFERENCES `product_category` (`product_cat_id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `ProductDeleteonImage` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_auth` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
