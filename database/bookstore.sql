-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 11:19 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_mail` varchar(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_mail`, `admin_name`, `password`) VALUES
(2, 'soumita@gmail.com', 'soumita', '8017163588'),
(3, 'aritra@gmail.com', 'aritra banerjee', '789'),
(4, 'subhajitdey@gmail.com', 'subhajit dey', '74123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `summ` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `cover_pic` varchar(255) NOT NULL,
  `s_pdf` varchar(255) NOT NULL,
  `f_pdf` varchar(255) NOT NULL,
  `num_book` int(11) NOT NULL,
  `u_date` date NOT NULL,
  `admin_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_author`, `summ`, `stream`, `price`, `cover_pic`, `s_pdf`, `f_pdf`, `num_book`, `u_date`, `admin_name`) VALUES
(36, 'C++', 'Tutorials point', 'About C++ from scratch', 'Programming Hub', 246, 'C++.png', 'C++.pdf', 'C++.pdf', 4, '2017-10-27', 'soumita'),
(37, 'C programming', 'Dennis Ritchie', 'From Tutorials point,all about c programming', 'Programming Hub', 350, 'C programming.png', 'C programming.pdf', 'C programming.pdf', 4, '2017-10-28', 'soumita'),
(39, 'Java', 'Ken arnold', 'Java details from Tutorials point', 'Programming Hub', 180, 'Java.png', 'Java.pdf', 'Java.pdf', 5, '2017-10-28', 'soumita'),
(40, 'Html', 'Mary Gillen', 'Html with example and tags result', 'Programming Hub', 150, 'Html.png', 'Html.pdf', 'Html.pdf', 4, '2017-10-31', 'soumita'),
(41, 'Mysql', 'Dr. Jason gilmore', 'With php examples included', 'Programming Hub', 200, 'Mysql.png', 'Mysql.pdf', 'Mysql.pdf', 3, '2017-10-31', 'soumita'),
(42, 'Python', 'Zed A Shaw', 'Python language details', 'Programming Hub', 240, 'Python.png', 'Python.pdf', 'Python.pdf', 7, '2017-10-31', 'soumita'),
(43, 'Php', ' Matt Zandstra', 'PHP Objects, Patterns, and Practice (Paperback)', 'Programming Hub', 400, 'Php.png', 'Php.pdf', 'Php.pdf', 9, '2017-10-31', 'soumita'),
(44, 'CSS', 'Dr. kar', 'web design using css', 'Programming Hub', 150, 'CSS.png', 'CSS.pdf', 'CSS.pdf', 3, '2017-10-31', 'soumita');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `pathh` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'History'),
(2, 'Science and Mathematics'),
(3, 'Sociology And psychology'),
(4, 'Programming Hub'),
(5, 'Politics');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cutomer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `cus_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirmed` varchar(255) NOT NULL,
  `confirm_code` int(11) NOT NULL,
  `profile_picture` longblob,
  `status` int(100) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pin_code` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cutomer_id`, `customer_name`, `cus_password`, `email`, `confirmed`, `confirm_code`, `profile_picture`, `status`, `full_name`, `date_of_birth`, `gender`, `address`, `city`, `state`, `pin_code`) VALUES
(86, 'subhajit', '789', 'subhajit@gmail.com', 'verified', 0, 0x35396432393566653439666366382e38353931393733312e6a7067, 1, 'subhajit bhattacharya', '1996-09-09', '', 'santoshpur', 'kolkata', 'West Bengal', 700075),
(87, 'soumita', '741', 'soumita@gmail.com', 'verified', 0, 0x35396432393735366238616461332e32333333393334322e6a7067, 1, 'soumita sarkar', '1996-04-10', '', 'behala', 'kolkata', 'West Bengal', 700074),
(88, 'aritra', '753', 'aritra@gmail.com', 'verified', 0, 0x35396432393932633365613163372e30383433343139312e6a7067, 1, 'aritra banerjee', '1997-06-06', '', 'kamalgazi', 'kolkata', 'West Bengal', 700148),
(90, 'subhajit dey', '951', 'subhajit_d@gmail.com', 'verified', 0, 0x35396432396130366532316537392e34313533373237302e6a7067, 1, 'subhajit dey', '1998-01-07', '', 'jadabpur', 'kolkata', 'West Bengal', 700075),
(91, 'srijit', '75386', 'srijit@gmail.com', 'verified', 0, 0x35396538633564326163376163322e30393239383936332e6a7067, 1, 'srijit kar', '2000-01-04', 'Male', 'desopriyo', 'kolkata', 'West Bengal', 700015),
(92, 'amit', '789', 'amit@gmail.com', 'verified', 0, 0x35396634373665373839343039362e39353435303130372e6a7067, 1, 'amit ghosh', '2017-10-03', 'Male', 'jadabpur', 'kolkata', 'West Bengal', 700075);

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `download_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `download_link` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`download_id`, `book_name`, `cover`, `book_author`, `download_link`, `user`) VALUES
(4, 'C++', 'C++.png', 'Tutorials point', '../book/full/C++.pdf', 'soumita@gmail.com'),
(5, 'C++', 'C++.png', 'Tutorials point', '../book/full/C++.pdf', 'aritra@gmail.com'),
(6, 'C++', 'C++.png', 'Tutorials point', '../book/full/C++.pdf', 'amit@gmail.com'),
(7, 'Java', 'Java.png', 'Ken arnold', '../book/full/Java.pdf', 'soumita@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `requested_user` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `requested_user`, `user_message`) VALUES
(1, 'aritra@gmail.com', 'the book'),
(2, 'aritra@gmail.com', 'new book'),
(3, 'soumita@gmail.com', 'this book');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cutomer_id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`download_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cutomer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
