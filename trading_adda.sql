-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 08:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trading_adda`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL DEFAULT 'This product has no description.',
  `product_image` varchar(100) NOT NULL,
  `upload_date` datetime NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `product_image`, `upload_date`, `category`, `price`, `user_email`) VALUES
(0, 'Car', 'This product has no description.', 'car.jpg', '2019-10-23 08:09:20', 'Vehicles', 50000, 'ksuthar2016@gmail.com'),
(1, 'Ball', 'Whoever is intrested.', 'ball.jpg', '2019-10-25 01:52:31', 'Sports', 200, 'dksuthar2017@hotmail.com'),
(2, 'Chair', 'This product has no description.', 'chair.jpg', '2019-10-08 06:08:50', 'Home Appliance', 250, 'tiwariaditya1579@gmail.com'),
(3, 'Iphone', 'Available in cheap price.', 'iphone.jpg', '2019-10-16 05:12:41', 'Electronics', 15000, 'vsuthar2017@gmail.com'),
(4, 'Laptop', 'Available for limited time.', 'laptop.jpg', '2019-10-15 01:09:17', 'Electronics', 25000, 'ksuthar2016@gmail.com'),
(5, 'Shoes', 'Adidas Shoes size - 9', 'shoes.jpg', '2019-10-08 16:24:36', 'Fashion', 400, 'vsuthar2017@gmail.com'),
(6, 'Camera', 'This product has no description.', 'camera.jpg', '2019-10-02 00:00:00', 'Electronics', 4000, 'tiwariaditya1579@gmail.com'),
(7, 'Keychain', 'This product has no description.', 'keychain.jpg', '2019-11-13 06:09:07', 'Other', 100, 'ksuthar2016@gmail.com'),
(8, 'Book', 'Books for Readers!', 'lib.jpeg', '0000-00-00 00:00:00', 'Books', 250, 'ksuthar2016@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) NOT NULL COMMENT 'Contains name of users',
  `dob` date NOT NULL COMMENT 'Containes date of birth of users',
  `email` varchar(50) NOT NULL COMMENT 'Contains valid email of users',
  `password` varchar(20) NOT NULL COMMENT 'Contains encrypted password of users'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `dob`, `email`, `password`) VALUES
('Dilip Suthar', '1993-10-02', 'dksuthar2017@hotmail.com', 'dksuth'),
('Kiran Suthar', '1998-07-21', 'ksuthar2016@gmail.com', 'ksuthar'),
('Aditya Tiwari', '1999-06-30', 'tiwariaditya1579@gmail.com', 'adi123'),
('Varsha Suthar', '2001-11-04', 'vsuthar2017@gmail.com', 'vsuth123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
