-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 03:54 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `houserental`
--

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `Id` int(11) NOT NULL,
  `state` text NOT NULL,
  `size` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `address` text NOT NULL,
  `contact` text NOT NULL,
  `sold` int(11) NOT NULL DEFAULT 0,
  `added_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`Id`, `state`, `size`, `price`, `address`, `contact`, `sold`, `added_by`) VALUES
(1, 'Punjab', '2BHK', '200000', '', '123456789', 0, ''),
(4, 'Jammu', '3BHK', '300000', '', '12487381921', 0, ''),
(5, 'Jammu', '3BHK', '300000', '', '12487381921', 0, ''),
(6, 'Himachal Pardesh', '3BHK', '2000000', 'hilll topp jnj222 dwdh iwd hwiudgijdhvyd heiduh ijheguhdihf hdofihdfdfdf', '12837302', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'user1', 'user1', '12345678'),
(3, 'user2', 'user2', '12345'),
(4, 'user1', 'user3', '12345'),
(5, 'test', 'test', '12345'),
(6, 'fdfd', '12345', '12345'),
(7, '122', '12', '12'),
(8, 'grr', 'dgfg', 'dgggsddf'),
(9, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
