-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 01:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `@todolist#1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(150) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `endDate` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL,
  `price` int(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `companyName`, `image`, `endDate`, `form`, `price`, `status`) VALUES
(1, 'KFC', 'banner.jfif', '2022-02-21', 'In Stock', 12, 1),
(2, 'dell', 'area51m3.png', '2022-02-23', 'landscape', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(150) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `projectDescription` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL,
  `dueDate` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `projectName`, `projectDescription`, `date`, `updateDate`, `dueDate`, `status`) VALUES
(1, 'titan gamers', '                              e-commerce website for gaming products with admin panel                  ', '2022-02-12 20:19:47', '15-02-2022 06:28:29 PM', '2022-02-28', 1),
(2, 'to do list ', '     a helpful to do list with admin panel   ', '2022-02-12 20:20:21', '14-02-2022 04:30:14 PM', '2022-02-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(150) NOT NULL,
  `projectID` int(150) NOT NULL,
  `tasks` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `projectID`, `tasks`, `status`, `date`, `updateDate`) VALUES
(1, 2, 'side navbar in admin', 'Completed', '2022-02-12 20:37:31', ''),
(5, 2, 'add login to admin panel', 'Pending', '2022-02-14 17:47:42', ''),
(8, 2, 'check functionality for login user in users page', 'Completed', '2022-02-14 17:52:49', ''),
(9, 2, 'make a usertable in db', 'Completed', '2022-02-14 17:53:37', ''),
(10, 2, 'fix the banner in users', 'Pending', '2022-02-14 21:01:40', ''),
(12, 1, 'make the views count for products', 'Pending', '2022-02-15 17:05:31', ''),
(13, 1, 'change the design of product details', 'Pending', '2022-02-15 17:05:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userStatus` int(11) NOT NULL,
  `status` text NOT NULL,
  `code` mediumint(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `userStatus`, `status`, `code`, `RegDate`, `updationDate`) VALUES
(2, 'georges', 'boutros.georges513@gmail.com', '$2y$10$GSh8ZhWPqQSH7MMlqn5JrO/ECdPBzTbbASKMEGxLpn1/YnRBzglz6', 1, 'verified', 0, '2022-02-14 18:08:28', '16-02-2022 10:03:53 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
