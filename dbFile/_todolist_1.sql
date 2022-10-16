-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 02:32 PM
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
  `userToken` varchar(255) NOT NULL,
  `projectToken` varchar(255) NOT NULL,
  `projectName` varchar(255) NOT NULL,
  `projectDescription` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL,
  `dueDate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `userToken`, `projectToken`, `projectName`, `projectDescription`, `date`, `updateDate`, `dueDate`, `status`) VALUES
(1, '009a461fbd0919ce81ed1012dbafb0f293ce0d19', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'titan gamers', '                              e-commerce website for gaming products with admin panel                  ', '2022-02-12 20:19:47', '15-02-2022 06:28:29 PM', '2022-02-28', 'active'),
(2, '009a461fbd0919ce81ed1012dbafb0f293ce0d19', '7a45e05a5979082c405f81fbecbd04c9f3cdf62b', 'to do list ', '     a helpful to do list with admin panel   ', '2022-02-12 20:20:21', '14-02-2022 04:30:14 PM', '2022-02-28', 'active'),
(3, '009a461fbd0919ce81ed1012dbafb0f293ce0d19', 'd67c4990e20bfc0804f6f8b90a487bfea8a4aec3', 'Y76 PHP Version', 'A company that I am applying to, This is the first assignment to do, and this is the pHP version', '2022-05-02 06:07:39', '', '2022-05-02', 'active'),
(8, '009a461fbd0919ce81ed1012dbafb0f293ce0d19', '19230c56587ecba4ac16572a6b039ad393ece965', 'Standalone Default (SIMAH)', 'Working with Maaloomatiia on developing an existing Folder called Standalone', '2022-08-19 09:49:06', '', '2022-09-02', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `task_id` int(150) NOT NULL,
  `taskToken` varchar(255) NOT NULL,
  `projectToken` varchar(255) NOT NULL,
  `tasks` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`task_id`, `taskToken`, `projectToken`, `tasks`, `status`, `date`, `updateDate`) VALUES
(14, '3b07dc45a29cdc3d8dfdb810df357023a7cc44b9', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'add components db', 'Completed', '2022-06-17 07:17:42', ''),
(15, '467035dff7d2c1ec6cc434720226e78b4cd2497a', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'make image field in subcomponents', 'Completed', '2022-06-17 08:49:54', ''),
(16, '4a4e3bb12ee3be2712f30e25a19f2aed6c290fb0', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'make the code to insert an image into a folder for the subcomponents', 'Completed', '2022-06-17 08:50:19', ''),
(19, '8a68196450b69308f9dd7d1cfe044db93c0244c2', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'fix subcomponents image error', 'Pending', '2022-06-17 10:57:53', ''),
(20, '8d4f0d51b12a020abf0fa9d60cc4734e0fe7cc52', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'fix the login problem with admin and user ', 'Completed', '2022-06-30 07:22:34', ''),
(21, '70754c67274d76efe9e29d8d04ddfe11ad4bc49f', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'fix update order.php', 'Completed', '2022-06-30 07:24:08', ''),
(22, 'b231a122d6baa4e6c1a36f7e9ff56862324dfbdf', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'fix the back arrow for the subcategory ', 'Completed', '2022-07-05 10:52:19', ''),
(23, '1ccb19782f68ad2f3d592450c7b2178ee2258835', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'fix the order id to be token in admin ', 'Completed', '2022-07-05 10:52:55', ''),
(25, '843b74fcded5b6cd7f99f0aad7bb9444b729d0ca', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'fix the add to cart to add only 1 product ', 'Pending', '2022-07-05 10:53:48', ''),
(26, '0b9e2583f828dac15d976e6680df9e9c8f7bfb60', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'second, get all the orders for the user', 'Pending', '2022-07-05 10:54:05', ''),
(27, '0d212bfbe1851c2efd618b308d5315fbec95db16', 'f5237dc690bb34ed052acd99c66e1900e95aaa27', 'let the user decide which product he wants to be delivered in order', 'Pending', '2022-07-05 10:54:21', ''),
(28, 'e24c2982bc79a2c0ab558775e2e3662b5bb0ea09', '19230c56587ecba4ac16572a6b039ad393ece965', 'need to check folder CONSUMER  and compare it with the WORD document ', 'Pending', '2022-08-19 09:49:51', ''),
(29, '2bca94bea9d2cfa882dcc12e356395bf7c98f2c9', '19230c56587ecba4ac16572a6b039ad393ece965', 'I do not have to make any mapping or WF from scartch ', 'Pending', '2022-08-19 09:50:40', ''),
(30, 'd026444d40c8083de080d31c9948f91e16f30a28', '19230c56587ecba4ac16572a6b039ad393ece965', 'everything is found in the CONSUMER FOLDER and need to be updated only ', 'Pending', '2022-08-19 09:50:54', ''),
(31, 'd627f62f0690af1891969f4721eafbca102ff343', '19230c56587ecba4ac16572a6b039ad393ece965', 'first we have 2 mappings to check if the file is an xML or not ', 'Pending', '2022-08-19 14:40:35', ''),
(32, '256b9dfe24350a45e406596ae016c576c0734759', '19230c56587ecba4ac16572a6b039ad393ece965', 'inside the XML mapping we have an expression (exp_get_Data_from_queue)', 'Pending', '2022-08-19 14:41:31', ''),
(33, 'bb34985405a720151e26b8fd0af266cbb5ade2bd', '19230c56587ecba4ac16572a6b039ad393ece965', 'this expression has a port called (o_interface_type) is generated from the parameter file ', 'Pending', '2022-08-19 14:42:03', ''),
(34, 'a6f95acea2ddbbc2374dad6d93c9396429811347', '19230c56587ecba4ac16572a6b039ad393ece965', 'then the value of this param file is generated to the mapplet mplt_interface_dispatcher', 'Pending', '2022-08-19 14:43:46', ''),
(35, 'b9fbadd223feb8d4a89d139ffb96c2948d83242b', '19230c56587ecba4ac16572a6b039ad393ece965', 'Then, after the mapplet, the value will be tested against the config tables (TBL_REF_INTERFACE_MASTER and TBL_REF_INTERFACE_DISPATCHER). ', 'Pending', '2022-08-19 14:45:31', ''),
(36, 'c3dc252da0ec4193aa5a516763f7f75c01bb8bac', '19230c56587ecba4ac16572a6b039ad393ece965', 'then a pmcmd startworkflow is being prepared to be sent to a JAVA transformation', 'Pending', '2022-08-19 14:46:08', ''),
(37, '0098b24a4a62c20104f3dc5f983d1cb14098d605', '19230c56587ecba4ac16572a6b039ad393ece965', 'the path of the param file is set as mapplet variable', 'Pending', '2022-08-22 07:56:11', ''),
(38, '24ec73be498b1d3148a7f336590b9ffe6b6765fd', '19230c56587ecba4ac16572a6b039ad393ece965', 'wf_dispatcher inside the workflowDispatch fodler will be responsibleto trigger the right WF ', 'Pending', '2022-08-22 07:57:11', ''),
(39, '7c38790567a676df2cc0a0912dcc421c7192fbea', '19230c56587ecba4ac16572a6b039ad393ece965', 'according to the min and max file size from the config table in DB ', 'Pending', '2022-08-22 07:58:18', ''),
(40, 'a42cb14c511115edf22521eb5b5ad31a5afce371', '19230c56587ecba4ac16572a6b039ad393ece965', 'after the mapping identify_WF_START to check either XML or Non-XML.', 'Pending', '2022-08-22 07:59:05', ''),
(41, '4adbf54528a32b5c429ced29912f18fdf606a611', '19230c56587ecba4ac16572a6b039ad393ece965', 'schema path will be responsible to validate the schema of thefile from the path', 'Pending', '2022-08-22 07:59:48', ''),
(42, 'ca4be90a5a83c08164cdade4eb9c6fe819ea4af6', '19230c56587ecba4ac16572a6b039ad393ece965', 'split interval will be used in large xML files ', 'Pending', '2022-08-22 08:00:08', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `userToken` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userStatus` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `code` mediumint(50) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `userToken`, `name`, `email`, `password`, `userStatus`, `status`, `code`, `RegDate`, `updateDate`) VALUES
(1, '009a461fbd0919ce81ed1012dbafb0f293ce0d19', 'georges', 'boutros.georges513@gmail.com', '$2y$10$sm0fUHI0WdCmPgOWPRa8lulAD5KHGm4KmFcY51zE0WuSsnB443DVG', 'active', 'verified', 0, '2022-06-15 13:28:56', '');

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
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
