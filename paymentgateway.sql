-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2017 at 07:35 पूर्वाह्न
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paymentgateway`
--

-- --------------------------------------------------------

--
-- Table structure for table `fund_transfer`
--

CREATE TABLE `fund_transfer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transferred_to` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `fund_date` date NOT NULL,
  `transaction_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund_transfer`
--

INSERT INTO `fund_transfer` (`id`, `user_id`, `transferred_to`, `amount`, `fund_date`, `transaction_id`) VALUES
(58, 1, 'Flip Shop', 6000, '2017-04-14', '58f0f9a9ceacc'),
(59, 1, 'Flip Shop', 6000, '2017-04-14', '58f0fb879a494'),
(60, 1, 'Flip Shop', 6000, '2017-04-14', '58f0fc2bb605c'),
(61, 1, 'Flip Shop', 6000, '2017-04-14', '58f0fca37b334'),
(62, 1, 'Flip Shop', 600, '2017-04-15', '58f19f4b79432'),
(63, 1, 'Flip Shop', 600, '2017-04-15', '58f19f7b25aea'),
(64, 1, 'Flip Shop', 600, '2017-04-15', '58f19f9f4252b'),
(65, 1, 'Flip Shop', 600, '2017-04-15', '58f1a0d16c695'),
(66, 1, 'Flip Shop', 3000, '2017-04-15', '58f1a1e996cef'),
(67, 1, 'Flip Shop', 1200, '2017-04-16', '58f2d67b954ba');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_address` varchar(40) NOT NULL,
  `bank_accno` varchar(50) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_address`, `bank_accno`, `balance`) VALUES
(1, 'sanjeev', 'sanjeev@gmail.com', '98d34c1758b15b5a359b69c2b08c5767', 'boudha', '123986tad', 962812);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fund_transfer`
--
ALTER TABLE `fund_transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fund_transfer`
--
ALTER TABLE `fund_transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
