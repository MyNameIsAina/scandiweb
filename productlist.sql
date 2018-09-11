-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 04:00 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `sku`, `name`, `price`, `type`, `option`) VALUES
(62, 'aaaaaaaaa', 'lala', 'baba', 'furniture', '11x33x99'),
(63, 'aassssssssssssssss', 'test', 'test', 'dvd', 'gg'),
(64, 'aa', 'test', 'test', 'dvd', 'gg'),
(65, 'aaaaaa', 'test', 'test', 'dvd', 'gg'),
(66, 'ahaha', 'test', 'test', 'dvd', 'gg'),
(67, 'ahahaaaaa', 'test', 'test', 'dvd', 'gg'),
(68, 'ahahaaaaadrrr', 'test', 'test', 'dvd', 'gg'),
(69, 'ggggg', 'test', 'test', 'dvd', ''),
(72, 'bubub', 'test', 'test', 'dvd', 'gg2222'),
(73, 'dadadam', 'test', 'test', 'dvd', 'gg'),
(74, 'mamama', 'test', 'test', 'dvd', 'gg2222'),
(75, 'aadadada', 'test', '1', 'furniture', '11x11x11'),
(76, 'abababa', 'test', 'test', 'dvd', 'gg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
