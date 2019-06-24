-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2018 at 07:31 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`cat_id`, `cat_title`) VALUES
(2, 'Rent'),
(3, 'Will be available'),
(4, 'Buy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_house_id` int(11) NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_house_id`, `comment_status`, `comment_author`, `comment_email`, `date`, `comment_content`) VALUES
(17, 2, 'approved', 'dfdsfds', 'dfdsfsd', '2018-08-30', 'fdfdsfds'),
(18, 2, 'approved', 'bbbbbb', 'fhdsfkjdhsfdhsfl', '2018-08-30', 'Gorgeous......'),
(19, 2, 'approved', 'fdsfdsfdsdfdsfds', 'bbbbbbbbbbbbbbdsfds', '2018-08-30', 'Galjjlkdjflkdfdsffdsf'),
(20, 3, 'approved', 'fdsfdsfds', 'fsdfsdfds', '2018-08-30', 'dfdsfdsfdsfds'),
(21, 3, 'approved', 'gggsd', 'qwrqwqr', '2018-08-31', 'sdwrewgds');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_id` int(11) NOT NULL,
  `house_cat_id` int(11) NOT NULL,
  `house_name` varchar(255) NOT NULL,
  `house_img` text NOT NULL,
  `house_rent` varchar(255) NOT NULL,
  `advance` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `ra_name` varchar(255) NOT NULL,
  `house_tags` varchar(255) NOT NULL,
  `house_comment_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `house_cat_id`, `house_name`, `house_img`, `house_rent`, `advance`, `date`, `ra_name`, `house_tags`, `house_comment_count`) VALUES
(2, 2, 'Bricklane', 'pexels-photo-731082.jpeg', '111111', '2222222', '2018-08-27', 'Chandgaon B-block', 'chandgaon,b-block', 4),
(3, 2, 'Vasss', 'banner04411.png', '10000', '200000', '2018-08-29', 'Chandgaon', 'chandgaon', 2),
(4, 3, 'Black Tower', '6.jpg', '22222', '2222222', '2018-08-29', 'Chandgaon', 'chandgaon,b-block', 0),
(5, 3, 'Hasan Villa', '1.jpg', '10000', '200000', '2018-08-29', 'Chandgaon', 'chandgaon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `userstatus` varchar(255) NOT NULL,
  `userimg` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `useremail`, `userpassword`, `fname`, `lname`, `userstatus`, `userimg`, `type`) VALUES
(6, 'Rohan', 'rh@gmail.com', '12345', 'rohan', 'gavaskar', 'Admin', 'customer-1.jpg', 'Admin'),
(7, 'Fateh', 'ace.ctg@gmail.com', '123444', 'Fateh', 'Kawsar', 'Admin', 'customer-3.jpg', 'Subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
