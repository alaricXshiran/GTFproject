-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 10:26 AM
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
-- Database: `gtf`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminx`
--

CREATE TABLE `adminx` (
  `username` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminx`
--

INSERT INTO `adminx` (`username`, `name`, `password`) VALUES
('admin', 'Alaric Shiran', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` text NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `dess` varchar(900) NOT NULL,
  `redflag` tinyint(1) NOT NULL,
  `spot` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_url`, `latitude`, `longitude`, `email`, `phonenumber`, `rating`, `dess`, `redflag`, `spot`) VALUES
(4, 'IMG-645940576459d6.62409985.jpg', '7.2220673', '79.8956608', 'a@gmail.com', '1234567890', '3', '                   descriptionqcwdcwdcwdcwdcwdcwdcwdcwdcwdcwdcwdcwdcwdcwdcwdcwdcwdc\r\n                ', 1, 0),
(6, 'IMG-645a18a0ae9e46.00948362.jpg', '7.225344', '79.8916608', 'x@gmail.com', '10000000', '4', '                   descriptionwwfv\r\n                ', 0, 0),
(8, 'IMG-645a4b13b93546.26855262.jpg', '7.226344', '79.8516609', 'admin', '', '', '        test admin        ', 0, 1),
(10, 'IMG-645a98f5bf24c3.68118805.jpg', '7.226', '79.892', 'admin', '', '', '        test night', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`firstname`, `lastname`, `email`, `phonenumber`, `password`, `role`) VALUES
('Alaric', 'Shiran', 'aa@gmail.com', '1234567891', '123', 'captains'),
('Alaricx', 'Shiranx', 'aaa@gmail.com', '1234567891', '123', 'staff'),
('working', 'collector', 'c@gmail.com', '0000000000', '123', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `email`, `phonenumber`, `password`) VALUES
('Alaric', 'Shiran', 'a@gmail.com', '1234567890', '123'),
('Alaric', 'Shiran', 'x@gmail.com', '10000000', '123');

-- --------------------------------------------------------

--
-- Table structure for table `xfile`
--

CREATE TABLE `xfile` (
  `id` int(11) NOT NULL,
  `namex` varchar(100) NOT NULL,
  `filex` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `xfile`
--

INSERT INTO `xfile` (`id`, `namex`, `filex`) VALUES
(7, 'Project document', 'IMG-645b4efdd110a0.86969604.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `xfile`
--
ALTER TABLE `xfile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `xfile`
--
ALTER TABLE `xfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
