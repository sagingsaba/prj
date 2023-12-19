-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 01:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_trail`
--

CREATE TABLE `audit_trail` (
  `id` int(11) UNSIGNED NOT NULL,
  `action` varchar(45) NOT NULL,
  `user` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `audit_trail`
--

INSERT INTO `audit_trail` (`id`, `action`, `user`, `timestamp`) VALUES
(54, 'User logged in', 'nexuminc123@gmail.com', '2023-12-17 03:37:17'),
(55, 'User logged in', 'nexuminc123@gmail.com', '2023-12-17 09:14:47'),
(56, 'User logged in', 'nexuminc123@gmail.com', '2023-12-17 09:37:00'),
(57, 'User logged in', 'nexuminc123@gmail.com', '2023-12-17 09:37:00'),
(58, 'User logged in', 'nexuminc123@gmail.com', '2023-12-17 09:44:34'),
(59, 'User logged in', 'nexuminc123@gmail.com', '2023-12-17 09:44:34'),
(60, 'User logged in', 'nexuminc123@gmail.com', '2023-12-17 09:44:42'),
(61, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-17 09:47:55'),
(62, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-17 09:49:33'),
(63, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-17 12:07:03'),
(64, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-17 12:07:08'),
(65, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-17 12:07:12'),
(66, 'User logged in', 'a@a.com', '2023-12-17 12:15:20'),
(67, 'User logged in', 'a@a.com', '2023-12-17 12:16:28'),
(68, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-17 12:17:34'),
(69, 'User logged in', 'a@a.com', '2023-12-17 12:22:49'),
(70, 'User logged in', 'a@a.com', '2023-12-17 12:23:22'),
(71, 'User logged in', 'a@a.com', '2023-12-17 12:23:25'),
(72, 'User logged in', 'a@a.com', '2023-12-17 12:23:48'),
(73, 'User logged in', 'a@a.com', '2023-12-17 12:25:10'),
(74, 'User logged in', 'a@a.com', '2023-12-17 12:27:52'),
(75, 'User logged in', 'a@a.com', '2023-12-17 12:28:38'),
(76, 'User logged in', 'a@a.com', '2023-12-17 12:28:41'),
(77, 'User logged in', 'a@a.com', '2023-12-17 12:29:02'),
(78, 'User logged in', 'a@a.com', '2023-12-17 12:29:08'),
(79, 'User logged in', 'a@a.com', '2023-12-17 13:20:20'),
(80, 'User logged in', 'a@a.com', '2023-12-17 13:23:48'),
(81, 'User logged in', 'a@a.com', '2023-12-17 13:24:05'),
(82, 'User logged in', 'a@a.com', '2023-12-17 13:56:54'),
(83, 'User logged in', 'a@a.com', '2023-12-17 13:57:01'),
(84, 'User logged in', 'a@a.com', '2023-12-17 13:59:24'),
(85, 'User logged in', 'a@a.com', '2023-12-17 14:09:53'),
(86, 'User logged in', 'a@a.com', '2023-12-17 14:16:20'),
(87, 'User logged in', 'a@a.com', '2023-12-17 14:16:59'),
(88, 'User logged in', 'a@a.com', '2023-12-17 14:17:19'),
(89, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-17 14:37:45'),
(90, 'User logged in', 'a@a.com', '2023-12-17 14:42:15'),
(91, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-17 14:46:58'),
(92, 'User logged in', 'a@a.com', '2023-12-18 07:51:16'),
(93, 'User logged in', 'a@a.com', '2023-12-18 07:52:28'),
(94, 'User logged in', 'a@a.com', '2023-12-18 07:58:34'),
(95, 'User logged in', 'a@a.com', '2023-12-18 07:58:38'),
(96, 'User logged in', 'nexuminc123@gmail.com', '2023-12-18 08:03:42'),
(97, 'User logged in', 'nexuminc123@gmail.com', '2023-12-18 08:06:08'),
(98, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 08:07:20'),
(99, 'User logged in', 'a@a.com', '2023-12-18 09:00:51'),
(100, 'User logged in', 'a@a.com', '2023-12-18 09:00:57'),
(101, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 12:56:52'),
(102, 'User logged in', 'a@a.com', '2023-12-18 13:20:14'),
(103, 'User logged in', 'a@a.com', '2023-12-18 13:24:09'),
(104, 'User logged in', 'a@a.com', '2023-12-18 13:26:00'),
(105, 'User logged in', 'a@a.com', '2023-12-18 13:32:14'),
(106, 'User logged in', 'a@a.com', '2023-12-18 13:57:25'),
(107, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 13:58:40'),
(108, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 13:59:12'),
(109, 'User logged in', 'a@a.com', '2023-12-18 14:05:26'),
(110, 'User logged in', 'a@a.com', '2023-12-18 15:07:21'),
(111, 'User logged in', 'a@a.com', '2023-12-18 15:09:14'),
(112, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 15:37:43'),
(113, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 15:39:26'),
(114, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 15:39:30'),
(115, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 15:39:39'),
(116, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 15:39:59'),
(117, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 15:40:30'),
(118, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 16:24:07'),
(119, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-18 16:53:35'),
(120, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-19 01:36:27'),
(121, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-19 02:25:27'),
(122, 'User logged in', 'lapuzneilalfred@gmail.com', '2023-12-19 02:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `middlename`, `lastname`, `email`, `password`) VALUES
(1, 'test', 'na', 'lang', 'a@a.com', 'a'),
(82, 'fptest', 'm', 'wag mo delete', 'nexuminc123@gmail.com', '$2y$10$7VJ1GigvB5jJi2YT3fjaYOBAUld9pKasFZtntUYvm2Y18iH4NMyRy'),
(105, 'hotdog', 'na', 'malungkot', 'lapuzneilalfred@gmail.com', '$2y$10$5gsGVslFPqpaRhLgGgMZ/OcBiU2LzmGV7DL6lONRnMgPD/0E11y4y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_trail`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_trail`
--
ALTER TABLE `audit_trail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
