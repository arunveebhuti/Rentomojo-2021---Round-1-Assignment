-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 09:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one`
--

-- --------------------------------------------------------

--
-- Table structure for table `phno`
--

CREATE TABLE `phno` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phnum` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phno`
--

INSERT INTO `phno` (`id`, `name`, `phnum`, `email`, `dob`) VALUES
(2, 'arun', '9866554477', 'arunveebhuti77@gmail.com', '2020-05-07'),
(10, 'Saumya Mishra', '434344', 'arunveebhuti77@gmail.com', '2020-05-03'),
(11, 'ast', '22222', 'asds@gmail.com', '2020-05-07'),
(12, 'jonh', '2344333', 'kaal@gmail.com', '2020-05-03'),
(13, 'mrpa', '433344443', 'mrp@gmail.com', '2020-05-14'),
(14, 'gurka', '987654323', 'asdfgh@gmail.com', '2020-05-02'),
(15, 'tghjk', '841236852', 'trfghjbk@gmail.com', '2020-05-03'),
(16, 'plm', '741269852', 'fghjk@gmail.com', '2020-05-30'),
(17, 'askjdhweyf', '86757341896', 'asdf@gmail.com', '2020-05-17'),
(18, 'sjhasjd', '987654321', 'asdsff@gmail.com', '2020-05-17'),
(19, 'Pratishtha Mishra', '22222', 'arunveebhuti77@gmail.com', '2020-05-16'),
(20, 'pista', '456456', 'asdf@gmail.com', '2020-05-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phno`
--
ALTER TABLE `phno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phno`
--
ALTER TABLE `phno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
