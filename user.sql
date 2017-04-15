-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2017 at 07:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ansat`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `name` text NOT NULL,
  `balance` int(128) NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `name`, `balance`, `avatar`) VALUES
(1, 'sprakash.sharma2014@vit.ac.in', 'demo', 'saurabhass638@gmail.com', 'Saurabh Sharma', 0, 'style/images/users/user.png'),
(2, 'athuofficial', 'password', 'athu@gmail.com', 'Atharva', 0, 'style/images/users/user.jpg'),
(3, 'anubhav', '1234', 'anubhav@gmail.com', 'Anubhav', 0, 'style/images/users/user.png'),
(4, 'saurabh638', 'Sharma638??', 'sharmasp2207@gmail.com', 'Saurabh', 200, 'style/images/users/user.png'),
(5, 'harshada', 'zargar', 'harshadazargar@gmail.com', 'Harshada Zargar', 60, 'style/images/users/hz10.jpeg'),
(6, 'Chirag', 'Arora', 'chirag@tagclub.in', 'Chirag Arora', 0, ''),
(8, 'Testing', 'test', 'test@tagclub.in', 'Test', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
