-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2022 at 06:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppmis_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit_trail`
--

CREATE TABLE `tbl_audit_trail` (
  `id` int(11) NOT NULL,
  `module` varchar(45) DEFAULT NULL,
  `created_date` varchar(45) DEFAULT 'current_timestamp()',
  `user_id` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_audit_trail`
--

INSERT INTO `tbl_audit_trail` (`id`, `module`, `created_date`, `user_id`, `remarks`) VALUES
(1, 'LoggedOut UserID#', 'current_timestamp()', 1, 'SYSTEM'),
(2, 'LoggedIn UserID#', 'current_timestamp()', 1, 'SYSTEM'),
(3, 'LoggedOut UserID#1', 'current_timestamp()', 1, 'SYSTEM'),
(4, 'LoggedIn UserID#1', 'current_timestamp()', 1, 'SYSTEM'),
(5, 'Log In', 'current_timestamp()', 1, 'SYSTEM'),
(6, 'Project Added #10', 'current_timestamp()', 1, 'PROJECT'),
(7, 'Stage Added #44', 'current_timestamp()', 1, 'STAGE'),
(8, 'Stage Added #45', 'current_timestamp()', 1, 'STAGE'),
(9, 'Stage Added #46', 'current_timestamp()', 1, 'STAGE'),
(10, 'Stage Added #47', 'current_timestamp()', 1, 'STAGE'),
(11, 'Stage Added #48', 'current_timestamp()', 1, 'STAGE'),
(12, 'Stage Added #49', 'current_timestamp()', 1, 'STAGE'),
(13, 'Stage Added #50', 'current_timestamp()', 1, 'STAGE'),
(14, 'Stage Added #51', 'current_timestamp()', 1, 'STAGE'),
(15, 'Stage Added #52', 'current_timestamp()', 1, 'STAGE'),
(16, 'Stage Added #53', 'current_timestamp()', 1, 'STAGE'),
(17, 'SYSTEM', 'current_timestamp()', 1, 'Log out'),
(18, 'SYSTEM', 'current_timestamp()', 1, 'Log In'),
(19, 'PROJECT', 'current_timestamp()', 1, 'Project Added #11'),
(20, 'STAGE', 'current_timestamp()', 1, 'Stage Added #54'),
(21, 'STAGE', 'current_timestamp()', 1, 'Stage Added #55'),
(22, 'STAGE', 'current_timestamp()', 1, 'Stage Added #56'),
(23, 'STAGE', 'current_timestamp()', 1, 'Stage Added #57'),
(24, 'STAGE', 'current_timestamp()', 1, 'Stage Added #58'),
(25, 'STAGE', 'current_timestamp()', 1, 'Stage Added #59'),
(26, 'STAGE', 'current_timestamp()', 1, 'Stage Added #60'),
(27, 'STAGE', 'current_timestamp()', 1, 'Stage Added #61'),
(28, 'STAGE', 'current_timestamp()', 1, 'Stage Added #62'),
(29, 'STAGE', 'current_timestamp()', 1, 'Stage Added #63'),
(30, 'PROJECT', 'current_timestamp()', 1, 'Updated ProjectID#11 name from Test Projectto Test Projectz'),
(31, 'PROJECT', 'current_timestamp()', 1, 'Updated ProjectID#11 remarks from testto tests'),
(32, 'PROJECT', 'current_timestamp()', 1, 'Updated ProjectID#11 supplier from Supplier 3to Supplier 5'),
(33, 'PROJECT', 'current_timestamp()', 1, 'Updated ProjectID#11 target start date from 2022-02-17to 2022-02-03'),
(34, 'PROJECT', 'current_timestamp()', 1, 'Updated ProjectID#11 target complete date from 2022-02-08to 2022-02-16'),
(35, 'PROJECT', 'current_timestamp()', 1, 'Updated ProjectID#11 actual start date from 2022-02-18to 2022-02-03'),
(36, 'PROJECT', 'current_timestamp()', 1, 'Updated ProjectID#11 actual complete date from 2022-02-10to 2022-02-16'),
(37, 'PROJECT', 'current_timestamp()', 1, 'Updated ProjectID#11 status from Pendingto In-Progress'),
(38, 'SYSTEM', 'current_timestamp()', 1, 'Log In'),
(39, 'PROJECT', 'current_timestamp()', 1, 'Viewed Project#11'),
(40, 'PROJECT', 'current_timestamp()', 1, 'Viewed ProjectID#3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `deleted_flag`, `created_date`) VALUES
(1, 'category 1', 0, '2022-02-02 11:28:40'),
(2, 'category 2', 0, '2022-02-02 11:28:40'),
(3, 'category 3', 0, '2022-02-02 12:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fields`
--

CREATE TABLE `tbl_fields` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` varchar(45) DEFAULT 'current_timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_fields`
--

INSERT INTO `tbl_fields` (`id`, `name`, `deleted_flag`, `created_date`) VALUES
(1, 'Name', 0, 'current_timestamp'),
(2, 'Category', 0, 'current_timestamp'),
(3, 'Subcategory', 0, 'current_timestamp'),
(4, 'Price', 0, 'current_timestamp'),
(5, 'Quantity', 0, 'current_timestamp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `item_qty` varchar(255) DEFAULT '0',
  `item_price` varchar(255) DEFAULT '0',
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`id`, `item_name`, `category_id`, `sub_category_id`, `item_qty`, `item_price`, `deleted_flag`, `created_date`) VALUES
(1, 'Product Item 1', 1, 1, '5', '100', 1, '2022-02-02 11:27:11'),
(2, 'Product Item 2', 1, 1, '20', '101', 0, '2022-02-02 11:32:29'),
(3, 'Product Item 1', 3, 8, '5', '50', 0, '2022-02-02 12:43:50'),
(4, 'Product Item 3', 1, 1, '5', '50', 0, '2022-02-02 12:44:00'),
(5, 'Product Item 4', 1, 2, '123', '400', 0, '2022-02-02 12:45:42'),
(6, 'Product Item 5', 2, 5, '7', '200', 0, '2022-02-02 12:45:57'),
(7, 'Product Item 6', 3, 8, '11', '150', 0, '2022-02-02 12:46:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory_history`
--

CREATE TABLE `tbl_inventory_history` (
  `id` int(11) NOT NULL,
  `inventory_id` varchar(45) DEFAULT NULL,
  `column_id` int(11) DEFAULT NULL,
  `from` varchar(45) DEFAULT NULL,
  `to` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_inventory_history`
--

INSERT INTO `tbl_inventory_history` (`id`, `inventory_id`, `column_id`, `from`, `to`, `created_date`) VALUES
(1, '2', 1, 'Product Item 1', 'Product Item 2', '2022-02-02 12:16:59'),
(2, '2', 2, '1', '2', '2022-02-02 12:16:59'),
(3, '2', 3, '1', '2', '2022-02-02 12:16:59'),
(4, '2', 4, '0', '101', '2022-02-02 12:16:59'),
(5, '2', 5, '0', '20', '2022-02-02 12:16:59'),
(6, '2', 4, '0', '101', '2022-02-02 12:17:27'),
(7, '2', 5, '0', '20', '2022-02-02 12:17:27'),
(8, '3', 2, '1', '3', '2022-02-02 12:44:23'),
(9, '3', 3, '1', '8', '2022-02-02 12:44:23'),
(10, '2', 2, '2', '1', '2022-02-02 13:05:19'),
(11, '2', 3, '2', '1', '2022-02-02 13:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL,
  `t_start_date` date DEFAULT NULL,
  `t_complete_date` date DEFAULT NULL,
  `a_start_date` date DEFAULT NULL,
  `a_complete_date` date DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`id`, `name`, `remarks`, `status_id`, `supplier`, `t_start_date`, `t_complete_date`, `a_start_date`, `a_complete_date`, `deleted_flag`, `created_date`, `user_id`) VALUES
(1, 'Project 1', '', 1, 'Supplier 1', NULL, NULL, NULL, NULL, 0, '2022-02-14 13:53:44', NULL),
(2, 'Project 2', 'test', 1, 'Supplier 2', '2022-02-08', '2022-02-23', '2022-02-10', '2022-02-01', 0, '2022-02-14 13:55:08', NULL),
(3, 'Project 3', '', 1, 'Supplier 3', '2022-02-03', '2022-03-03', '2022-03-03', '2022-02-24', 0, '2022-02-14 14:36:28', NULL),
(4, 'Project 4', '', 1, 'Supplier 1', '2022-02-02', '2022-02-23', '2022-03-16', '2022-03-16', 0, '2022-02-15 05:24:31', 1),
(5, 'Project 5', '', 1, 'Supplier 1', '2022-02-02', '2022-02-23', '2022-03-16', '2022-03-16', 0, '2022-02-15 06:21:46', 1),
(6, 'Project 13', 'test', 1, 'Supplier 2', '2022-02-17', '2022-02-09', '2022-02-02', '2022-02-02', 0, '2022-02-16 19:37:44', 1),
(9, 'NEW PROJECTS', 'testing', 2, 'Supplier 1', '2022-02-23', '2022-02-14', '2022-02-21', '2022-02-28', 0, '2022-02-20 14:07:29', 1),
(10, 'Project Test', 'test', 1, 'Supplier 1', '2022-02-01', '2022-02-01', '2022-02-08', '2022-02-02', 0, '2022-02-21 12:40:27', 1),
(11, 'Test Projectz', 'tests', 2, 'Supplier 5', '2022-02-03', '2022-02-16', '2022-02-25', '2022-02-25', 0, '2022-02-21 12:42:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_audit`
--

CREATE TABLE `tbl_project_audit` (
  `id` int(11) NOT NULL,
  `from` text DEFAULT NULL,
  `to` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `column_name` varchar(45) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_project_audit`
--

INSERT INTO `tbl_project_audit` (`id`, `from`, `to`, `created_date`, `project_id`, `user_id`, `column_name`, `remarks`) VALUES
(1, NULL, NULL, '2022-02-20 14:07:29', 9, 1, NULL, 'Project Created'),
(2, 'admin admin admin', 'NEW PROJECTS', '2022-02-20 14:32:18', 9, 1, 'name', 'name changed'),
(3, 'test', 'testing', '2022-02-20 14:32:18', 9, 1, 'remarks', 'remarks changed'),
(4, '2022-02-17', '2022-02-23', '2022-02-20 14:32:18', 9, 1, 't_start_date', 'target start date changed'),
(5, '2022-02-02', '2022-02-14', '2022-02-20 14:32:18', 9, 1, 't_complete_date', 'target complete date changed'),
(6, '2022-02-17', '2022-02-21', '2022-02-20 14:32:18', 9, 1, 'a_start_date', 'actual start date changed'),
(7, '2022-02-02', '2022-02-28', '2022-02-20 14:32:18', 9, 1, 'a_complete_date', 'actual start date changed'),
(8, '1', '2', '2022-02-20 14:32:18', 9, 1, 'status', 'status changed'),
(9, NULL, NULL, '2022-02-21 12:40:27', 10, 1, NULL, 'Project Created'),
(10, NULL, NULL, '2022-02-21 12:42:44', 11, 1, NULL, 'Project Created'),
(11, 'Test Project', 'Test Projectz', '2022-02-21 12:44:09', 11, 1, 'name', 'name changed'),
(12, 'test', 'tests', '2022-02-21 12:44:09', 11, 1, 'remarks', 'remarks changed'),
(13, 'Supplier 3', 'Supplier 5', '2022-02-21 12:44:09', 11, 1, 'supplier', 'supplier changed'),
(14, '2022-02-17', '2022-02-03', '2022-02-21 12:44:09', 11, 1, 't_start_date', 'target start date changed'),
(15, '2022-02-08', '2022-02-16', '2022-02-21 12:44:09', 11, 1, 't_complete_date', 'target complete date changed'),
(16, '2022-02-17', '2022-02-25', '2022-02-21 12:44:09', 11, 1, 'a_start_date', 'actual start date changed'),
(17, '2022-02-08', '2022-02-25', '2022-02-21 12:44:09', 11, 1, 'a_complete_date', 'actual start date changed'),
(18, '1', '2', '2022-02-21 12:44:09', 11, 1, 'status', 'status changed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rank`
--

CREATE TABLE `tbl_rank` (
  `id` int(11) NOT NULL,
  `rank_name` varchar(45) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rank`
--

INSERT INTO `tbl_rank` (`id`, `rank_name`, `deleted_flag`, `created_date`) VALUES
(1, 'Rank 1', 0, '2022-02-19 12:44:48'),
(2, 'Rank 2', 0, '2022-02-19 12:44:48'),
(3, 'Rank 3', 0, '2022-02-19 12:44:48'),
(4, 'Rank 4', 0, '2022-02-19 14:54:03'),
(5, 'Rank 5', 0, '2022-02-19 16:07:34'),
(6, 'Rank 6', 0, '2022-02-19 16:07:34'),
(7, 'Rank 7', 0, '2022-02-19 16:07:34'),
(8, 'Rank 8', 0, '2022-02-19 16:07:34'),
(9, 'Rank 9', 0, '2022-02-19 16:07:34'),
(10, 'Rank 10', 0, '2022-02-19 16:07:34'),
(11, 'Rank 11', 0, '2022-02-19 16:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(45) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role_name`, `deleted_flag`) VALUES
(1, 'admin', 0),
(2, 'encoder', 0),
(3, 'authenticated', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stages`
--

CREATE TABLE `tbl_stages` (
  `id` int(11) NOT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp(),
  `assigned_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sub_status_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stages`
--

INSERT INTO `tbl_stages` (`id`, `deleted_flag`, `created_date`, `assigned_date`, `remarks`, `user_id`, `sub_status_id`, `project_id`, `details`, `sequence`) VALUES
(1, 0, '2022-02-14 15:03:39', NULL, NULL, 1, 1, 2, 'stage 1', NULL),
(2, 0, '2022-02-14 15:03:54', NULL, NULL, 1, 1, 2, 'stage 2', NULL),
(3, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 1', 1),
(4, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 2', 2),
(5, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 3', 3),
(6, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 4', 4),
(7, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 5', 5),
(8, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 6', 6),
(9, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 7', 7),
(10, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 8', 8),
(11, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 9', 9),
(12, 0, '2022-02-15 05:24:31', NULL, NULL, 1, 1, 4, 'Stage 10', 10),
(13, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 1', 1),
(14, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 2', 2),
(15, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 3', 3),
(16, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 4', 4),
(17, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 5', 5),
(18, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 6', 6),
(19, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 7', 7),
(20, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 8', 8),
(21, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 9', 9),
(22, 0, '2022-02-15 06:21:46', NULL, NULL, 1, 1, 5, 'Stage 10', 10),
(23, 0, '2022-02-16 19:37:44', '2022-02-08', 'test', 1, 3, 6, 'Stage 11', 1),
(24, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 2', 2),
(25, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 3', 3),
(26, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 4', 4),
(27, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 5', 5),
(28, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 6', 6),
(29, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 7', 7),
(30, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 8', 8),
(31, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 9', 9),
(32, 0, '2022-02-16 19:37:44', NULL, NULL, 1, 1, 6, 'Stage 10', 10),
(34, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 1', 1),
(35, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 2', 2),
(36, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 3', 3),
(37, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 4', 4),
(38, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 5', 5),
(39, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 6', 6),
(40, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 7', 7),
(41, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 8', 8),
(42, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 9', 9),
(43, 0, '2022-02-20 14:07:29', NULL, NULL, 1, 1, 9, 'Stage 10', 10),
(44, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 1', 1),
(45, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 2', 2),
(46, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 3', 3),
(47, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 4', 4),
(48, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 5', 5),
(49, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 6', 6),
(50, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 7', 7),
(51, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 8', 8),
(52, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 9', 9),
(53, 0, '2022-02-21 12:40:27', NULL, NULL, 1, 1, 10, 'Stage 10', 10),
(54, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 1', 1),
(55, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 2', 2),
(56, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 3', 3),
(57, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 4', 4),
(58, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 5', 5),
(59, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 6', 6),
(60, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 7', 7),
(61, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 8', 8),
(62, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 9', 9),
(63, 0, '2022-02-21 12:42:44', NULL, NULL, 1, 1, 11, 'Stage 10', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stage_audit`
--

CREATE TABLE `tbl_stage_audit` (
  `id` int(11) NOT NULL,
  `from` text DEFAULT NULL,
  `to` text DEFAULT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `column_name` varchar(45) DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stage_audit`
--

INSERT INTO `tbl_stage_audit` (`id`, `from`, `to`, `stage_id`, `created_date`, `user_id`, `column_name`, `remarks`) VALUES
(1, NULL, NULL, 34, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(2, NULL, NULL, 35, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(3, NULL, NULL, 36, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(4, NULL, NULL, 37, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(5, NULL, NULL, 38, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(6, NULL, NULL, 39, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(7, NULL, NULL, 40, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(8, NULL, NULL, 41, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(9, NULL, NULL, 42, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(10, NULL, NULL, 43, '2022-02-20 14:07:29', 1, NULL, 'Stage Created'),
(11, NULL, NULL, 44, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(12, NULL, NULL, 45, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(13, NULL, NULL, 46, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(14, NULL, NULL, 47, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(15, NULL, NULL, 48, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(16, NULL, NULL, 49, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(17, NULL, NULL, 50, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(18, NULL, NULL, 51, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(19, NULL, NULL, 52, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(20, NULL, NULL, 53, '2022-02-21 12:40:27', 1, NULL, 'Stage Created'),
(21, NULL, NULL, 54, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(22, NULL, NULL, 55, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(23, NULL, NULL, 56, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(24, NULL, NULL, 57, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(25, NULL, NULL, 58, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(26, NULL, NULL, 59, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(27, NULL, NULL, 60, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(28, NULL, NULL, 61, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(29, NULL, NULL, 62, '2022-02-21 12:42:44', 1, NULL, 'Stage Created'),
(30, NULL, NULL, 63, '2022-02-21 12:42:44', 1, NULL, 'Stage Created');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stage_thread`
--

CREATE TABLE `tbl_stage_thread` (
  `id` int(11) NOT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `deleted_flag` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stage_thread`
--

INSERT INTO `tbl_stage_thread` (`id`, `stage_id`, `message`, `created_date`, `deleted_flag`, `user_id`) VALUES
(1, 13, 'test', '2022-02-16 17:39:30', 0, 1),
(2, 13, 'test', '2022-02-16 17:39:30', 0, 1),
(3, 13, 'test', '2022-02-16 17:39:30', 0, 1),
(4, 0, 'test123', '2022-02-16 18:06:15', 0, 1),
(5, 0, '12321321', '2022-02-16 18:08:23', 0, 1),
(6, 13, '123213213', '2022-02-16 18:10:04', 0, 1),
(7, 13, '3333', '2022-02-16 18:10:09', 0, 1),
(8, 13, '111111', '2022-02-16 18:11:12', 0, 1),
(9, 13, 'test', '2022-02-16 18:30:40', 0, 1),
(10, 23, 'test', '2022-02-16 19:41:06', 0, 1),
(11, 23, 'test', '2022-02-16 19:49:57', 0, 1),
(12, 24, 'test', '2022-02-16 20:51:43', 0, 1),
(13, 24, 'test', '2022-02-16 20:51:46', 0, 1),
(14, 23, 'test', '2022-02-16 21:06:04', 0, 1),
(15, 24, 'asd', '2022-02-19 17:33:04', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(45) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status_name`, `deleted_flag`) VALUES
(1, 'Pending', 0),
(2, 'In-Progress', 0),
(3, 'Completed', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status_history`
--

CREATE TABLE `tbl_status_history` (
  `id` int(11) NOT NULL,
  `project_id` varchar(45) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status_history`
--

INSERT INTO `tbl_status_history` (`id`, `project_id`, `remarks`, `created_date`, `status_id`, `user_id`) VALUES
(1, '3', 'initial', '2022-02-14 14:36:28', 1, 1),
(2, '4', 'initial', '2022-02-15 05:24:31', 1, 1),
(3, '5', 'initial', '2022-02-15 06:21:46', 1, 1),
(4, '5', NULL, '2022-02-15 06:23:46', 3, 1),
(5, '6', 'initial', '2022-02-16 19:37:44', 1, 1),
(7, '9', 'initial', '2022-02-20 14:07:29', 1, 1),
(8, '9', NULL, '2022-02-20 14:32:18', 2, 1),
(9, '10', 'initial', '2022-02-21 12:40:27', 1, 1),
(10, '11', 'initial', '2022-02-21 12:42:44', 1, 1),
(11, '11', NULL, '2022-02-21 12:44:09', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`id`, `category_id`, `sub_category_name`, `deleted_flag`, `created_date`) VALUES
(1, 1, 'subcategory 1', 0, '2022-02-02 11:28:46'),
(2, 1, 'subcategory 2', 0, '2022-02-02 11:28:46'),
(3, 1, 'subcategory 3', 0, '2022-02-02 12:29:12'),
(4, 2, 'subcategory 4', 0, '2022-02-02 12:29:20'),
(5, 2, 'subcategory 5', 0, '2022-02-02 12:29:31'),
(6, 2, 'subcategory 6', 0, '2022-02-02 12:29:42'),
(7, 3, 'subcategory 7', 0, '2022-02-02 12:30:02'),
(8, 3, 'subcategory 8', 0, '2022-02-02 12:30:05'),
(9, 3, 'subcategory 9', 0, '2022-02-02 12:30:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_status`
--

CREATE TABLE `tbl_sub_status` (
  `id` int(11) NOT NULL,
  `sub_status_name` varchar(45) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_status`
--

INSERT INTO `tbl_sub_status` (`id`, `sub_status_name`, `deleted_flag`) VALUES
(1, 'Pending', 0),
(2, 'In-Progress', 0),
(3, 'Completed', 0),
(4, 'Returned', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_status_history`
--

CREATE TABLE `tbl_sub_status_history` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `sub_status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_status_history`
--

INSERT INTO `tbl_sub_status_history` (`id`, `project_id`, `stage_id`, `remarks`, `created_date`, `sub_status_id`, `user_id`) VALUES
(1, 2, 1, NULL, '2022-02-14 15:05:32', 1, NULL),
(2, 2, 2, NULL, '2022-02-14 15:05:32', 1, NULL),
(3, 4, 3, NULL, '2022-02-15 05:24:31', 1, NULL),
(4, 4, 4, NULL, '2022-02-15 05:24:31', 1, NULL),
(5, 4, 5, NULL, '2022-02-15 05:24:31', 1, NULL),
(6, 4, 6, NULL, '2022-02-15 05:24:31', 1, NULL),
(7, 4, 7, NULL, '2022-02-15 05:24:31', 1, NULL),
(8, 4, 8, NULL, '2022-02-15 05:24:31', 1, NULL),
(9, 4, 9, NULL, '2022-02-15 05:24:31', 1, NULL),
(10, 4, 10, NULL, '2022-02-15 05:24:31', 1, NULL),
(11, 4, 11, NULL, '2022-02-15 05:24:31', 1, NULL),
(12, 4, 12, NULL, '2022-02-15 05:24:31', 1, NULL),
(13, 5, 13, NULL, '2022-02-15 06:21:46', 1, NULL),
(14, 5, 14, NULL, '2022-02-15 06:21:46', 1, NULL),
(15, 5, 15, NULL, '2022-02-15 06:21:46', 1, NULL),
(16, 5, 16, NULL, '2022-02-15 06:21:46', 1, NULL),
(17, 5, 17, NULL, '2022-02-15 06:21:46', 1, NULL),
(18, 5, 18, NULL, '2022-02-15 06:21:46', 1, NULL),
(19, 5, 19, NULL, '2022-02-15 06:21:46', 1, NULL),
(20, 5, 20, NULL, '2022-02-15 06:21:46', 1, NULL),
(21, 5, 21, NULL, '2022-02-15 06:21:46', 1, NULL),
(22, 5, 22, NULL, '2022-02-15 06:21:46', 1, NULL),
(23, 6, 23, NULL, '2022-02-16 19:37:44', 1, 1),
(24, 6, 24, NULL, '2022-02-16 19:37:44', 1, 1),
(25, 6, 25, NULL, '2022-02-16 19:37:44', 1, 1),
(26, 6, 26, NULL, '2022-02-16 19:37:44', 1, 1),
(27, 6, 27, NULL, '2022-02-16 19:37:44', 1, 1),
(28, 6, 28, NULL, '2022-02-16 19:37:44', 1, 1),
(29, 6, 29, NULL, '2022-02-16 19:37:44', 1, 1),
(30, 6, 30, NULL, '2022-02-16 19:37:44', 1, 1),
(31, 6, 31, NULL, '2022-02-16 19:37:44', 1, 1),
(32, 6, 32, NULL, '2022-02-16 19:37:44', 1, 1),
(33, NULL, 23, NULL, '2022-02-16 19:57:18', 2, 1),
(34, NULL, 23, NULL, '2022-02-16 20:47:51', 3, 1),
(36, 9, 34, NULL, '2022-02-20 14:07:29', 1, 1),
(37, 9, 35, NULL, '2022-02-20 14:07:29', 1, 1),
(38, 9, 36, NULL, '2022-02-20 14:07:29', 1, 1),
(39, 9, 37, NULL, '2022-02-20 14:07:29', 1, 1),
(40, 9, 38, NULL, '2022-02-20 14:07:29', 1, 1),
(41, 9, 39, NULL, '2022-02-20 14:07:29', 1, 1),
(42, 9, 40, NULL, '2022-02-20 14:07:29', 1, 1),
(43, 9, 41, NULL, '2022-02-20 14:07:29', 1, 1),
(44, 9, 42, NULL, '2022-02-20 14:07:29', 1, 1),
(45, 9, 43, NULL, '2022-02-20 14:07:29', 1, 1),
(46, 10, 44, NULL, '2022-02-21 12:40:27', 1, 1),
(47, 10, 45, NULL, '2022-02-21 12:40:27', 1, 1),
(48, 10, 46, NULL, '2022-02-21 12:40:27', 1, 1),
(49, 10, 47, NULL, '2022-02-21 12:40:27', 1, 1),
(50, 10, 48, NULL, '2022-02-21 12:40:27', 1, 1),
(51, 10, 49, NULL, '2022-02-21 12:40:27', 1, 1),
(52, 10, 50, NULL, '2022-02-21 12:40:27', 1, 1),
(53, 10, 51, NULL, '2022-02-21 12:40:27', 1, 1),
(54, 10, 52, NULL, '2022-02-21 12:40:27', 1, 1),
(55, 10, 53, NULL, '2022-02-21 12:40:27', 1, 1),
(56, 11, 54, NULL, '2022-02-21 12:42:44', 1, 1),
(57, 11, 55, NULL, '2022-02-21 12:42:44', 1, 1),
(58, 11, 56, NULL, '2022-02-21 12:42:44', 1, 1),
(59, 11, 57, NULL, '2022-02-21 12:42:44', 1, 1),
(60, 11, 58, NULL, '2022-02-21 12:42:44', 1, 1),
(61, 11, 59, NULL, '2022-02-21 12:42:44', 1, 1),
(62, 11, 60, NULL, '2022-02-21 12:42:44', 1, 1),
(63, 11, 61, NULL, '2022-02-21 12:42:44', 1, 1),
(64, 11, 62, NULL, '2022-02-21 12:42:44', 1, 1),
(65, 11, 63, NULL, '2022-02-21 12:42:44', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `deleted_flag` int(11) DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `salt`, `role_id`, `deleted_flag`, `created_date`) VALUES
(1, 'admin', '$2y$10$YxId8WtgMzPbRWIVcdPOTuYZD.Y0pA5S8uWWwSRPF/PS6fVgKwvPe', 1, 0, '2022-02-13 13:51:51'),
(2, 'encoder', '$2y$10$n1.5X0bJH/788szatNEftec1YKi0n3DSGl/OePKOiR9sL//ZX3UcO', 2, 0, '2022-02-13 13:53:33'),
(6, 'user', '$2y$10$QV9qus5MqTN5T.DLXFvFvuJi8OzvO0CGWuZPKD9ZSXZFEkErfI0oC', 3, 0, '2022-02-20 13:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_info`
--

CREATE TABLE `tbl_users_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first` varchar(100) DEFAULT NULL,
  `middle` varchar(100) DEFAULT NULL,
  `last` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rank_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users_info`
--

INSERT INTO `tbl_users_info` (`id`, `user_id`, `first`, `middle`, `last`, `email`, `rank_id`) VALUES
(1, 1, 'admin', 'admin', 'admin', 'admin@gmail.com', 1),
(2, 2, 'encoder', 'encoder', 'encoder', 'encoder@gmail.com', 2),
(3, 3, 'firstname', 'middlename', 'lastname', 'user@gmail.com', 3),
(4, 6, 'user', 'user', 'user', 'user123@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_view_user`
--

CREATE TABLE `tbl_view_user` (
  `username` varchar(100) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `first` varchar(100) DEFAULT NULL,
  `middle` varchar(100) DEFAULT NULL,
  `last` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `rank_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_audit_trail`
--
ALTER TABLE `tbl_audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fields`
--
ALTER TABLE `tbl_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_inventory_history`
--
ALTER TABLE `tbl_inventory_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_project_audit`
--
ALTER TABLE `tbl_project_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stages`
--
ALTER TABLE `tbl_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stage_audit`
--
ALTER TABLE `tbl_stage_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stage_thread`
--
ALTER TABLE `tbl_stage_thread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status_history`
--
ALTER TABLE `tbl_status_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_status`
--
ALTER TABLE `tbl_sub_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_status_history`
--
ALTER TABLE `tbl_sub_status_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_info`
--
ALTER TABLE `tbl_users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_audit_trail`
--
ALTER TABLE `tbl_audit_trail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_fields`
--
ALTER TABLE `tbl_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_inventory_history`
--
ALTER TABLE `tbl_inventory_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_project_audit`
--
ALTER TABLE `tbl_project_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_rank`
--
ALTER TABLE `tbl_rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_stages`
--
ALTER TABLE `tbl_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_stage_audit`
--
ALTER TABLE `tbl_stage_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_stage_thread`
--
ALTER TABLE `tbl_stage_thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_status_history`
--
ALTER TABLE `tbl_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_sub_status`
--
ALTER TABLE `tbl_sub_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sub_status_history`
--
ALTER TABLE `tbl_sub_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_users_info`
--
ALTER TABLE `tbl_users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
