-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2021 at 05:50 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_product`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(15) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_price` varchar(100) NOT NULL,
  `p_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_price`, `p_img`) VALUES
(1, 'Kurkure', '100', 'https://source.unsplash.com/1600x900/?nature,water'),
(2, 'Lays', '110', 'https://source.unsplash.com/1600x900/?nature,water'),
(3, 'Shirt', '400', 'https://source.unsplash.com/1600x900/?nature,water'),
(4, 'Pant', '600', 'https://source.unsplash.com/1600x900/?nature,water'),
(5, 'Jeans', '700', 'https://source.unsplash.com/1600x900/?nature,water'),
(6, 'Laptop', '45000', 'https://source.unsplash.com/1600x900/?nature,water'),
(7, 'Mobile', '12000', 'https://source.unsplash.com/1600x900/?nature,water'),
(8, 'Pen', '10', 'https://source.unsplash.com/1600x900/?nature,water'),
(9, 'Watch', '300', 'https://source.unsplash.com/1600x900/?nature,water'),
(10, 'Chair', '200', 'https://source.unsplash.com/1600x900/?nature,water');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
