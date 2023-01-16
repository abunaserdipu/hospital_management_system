-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 10:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` tinyint(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `type` tinyint(3) NOT NULL,
  `fees` int(4) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `photo`, `email`, `password`, `contact_no`, `type`, `fees`, `join_date`) VALUES
(2, 'Solaiman', 'assets/images/doctor1.jpg', 'solaiman@gmail.com', 'e99a18c428cb38d5f260853678922e03', '01521327682', 1, 300, '2022-09-16 10:12:20'),
(3, 'Najmus Sakib', 'assets/images/doctor2.jpg', 'sakib@gmail.com', 'e99a18c428cb38d5f260853678922e03', '01521327682', 2, 500, '2022-09-16 10:13:37'),
(4, 'Mahmud Hasan', 'assets/images/doctro3.jpg', 'mahmud@gmail.com', 'e99a18c428cb38d5f260853678922e03', '01521327682', 3, 700, '2022-09-16 10:14:25'),
(5, 'Abdullah', 'assets/images/doctor4.jpg', 'abdullah@gmail.com', 'e99a18c428cb38d5f260853678922e03', '01521327682', 1, 0, '2022-09-17 09:01:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
