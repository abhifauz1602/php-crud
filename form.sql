-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 03:53 PM
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
-- Database: `cwcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `stu_image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `con_pass` varchar(100) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `caste` varchar(10) NOT NULL,
  `language` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `first_name`, `last_name`, `stu_image`, `password`, `con_pass`, `gender`, `email`, `phone`, `caste`, `language`, `address`) VALUES
(8, 'Ashish ', 'Mittal', '', 'sddddddd', 'dddd', 'male', 'asjmjs@gmail.com', '78907643', 'OBC', 'French,Hinglish', 'Sector 3 bharatpur'),
(9, 'Abhishant', 'Kumar', 'images/picture054.jpg', 'Abhi2003@', 'Abhi2003@', 'male', 'abhishantkumar1602@gmail.com', '9929321602', 'OBC', 'Hindi,English', 'C-93, Subhash Nagar, Bharatpur'),
(10, 'Varsha ', 'Dagur', 'images/picture046.jpg', 'admin', 'jjjjj', 'female', 'admin@example.com', '7898786756', 'OBC', 'French,Hinglish', 'nnnnn,,nnnnn'),
(11, 'Beenu', 'Fauzdar', 'images/Screenshot 2023-09-09 162036.png', 'beenu', 'beenu', 'female', 'beenu@gmail.com', '1234567890', 'OBC', 'Hindi,Hinglish', 'Astawan, Kadim, Deeg-Bharatpur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
