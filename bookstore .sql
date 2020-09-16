-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2017 at 10:21 PM
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
(5, 'subhajit@gmail.com', 'subhajit bhattacharya', '5b912f61ac2099fa8a21cfb824069250623563b9'),
(6, 'soumita@gmail.com', 'soumita', '37919b7a6f955db4d244236c3fc298309afdd340'),
(7, 'aritra@gmail.com', 'aritra', '298b724d4671e9a550f706543070be166e9b90db'),
(8, 'subhajit_d@gmail.com', 'subhajit dey', '9b3a28b679816b2b7e7ecb8657d191479bc07778');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `summ` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
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

INSERT INTO `book` (`book_id`, `book_name`, `book_author`, `summ`, `category_name`, `price`, `cover_pic`, `s_pdf`, `f_pdf`, `num_book`, `u_date`, `admin_name`) VALUES
(36, 'C++', 'Tutorials point', 'About C++ from scratch', 'Programming Hub', 246, 'C++.png', 'C++.pdf', 'C++.pdf', 4, '2017-10-27', 'soumita'),
(37, 'C programming', 'Dennis Ritchie', 'From Tutorials point,all about c programming', 'Programming Hub', 350, 'C programming.png', 'C programming.pdf', 'C programming.pdf', 4, '2017-10-28', 'soumita'),
(39, 'Java', 'Ken arnold', 'Java details from Tutorials point', 'Programming Hub', 180, 'Java.png', 'Java.pdf', 'Java.pdf', 5, '2017-10-28', 'soumita'),
(40, 'Html', 'Mary Gillen', 'Html with example and tags result', 'Programming Hub', 150, 'Html.png', 'Html.pdf', 'Html.pdf', 4, '2017-10-31', 'soumita'),
(41, 'Mysql', 'Dr. Jason gilmore', 'With php examples included', 'Programming Hub', 200, 'Mysql.png', 'Mysql.pdf', 'Mysql.pdf', 3, '2017-10-31', 'soumita'),
(42, 'Python', 'Zed A Shaw', 'Python language details', 'Programming Hub', 240, 'Python.png', 'Python.pdf', 'Python.pdf', 7, '2017-10-31', 'soumita'),
(43, 'Php', ' Matt Zandstra', 'PHP Objects, Patterns, and Practice (Paperback)', 'Programming Hub', 400, 'Php.png', 'Php.pdf', 'Php.pdf', 9, '2017-10-31', 'soumita'),
(44, 'CSS', 'Dr. kar', 'web design using css', 'Programming Hub', 150, 'CSS.png', 'CSS.pdf', 'CSS.pdf', 3, '2017-10-31', 'soumita'),
(45, 'Ruby', 'Tutorials point', 'Ruby programming structures with basic ', 'Programming Hub', 420, 'Ruby.png', 'Ruby.pdf', 'Ruby.pdf', 4, '2017-11-03', 'soumita');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `original_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `pathh` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `original_id`, `book_name`, `book_author`, `summary`, `price`, `cover`, `pathh`, `user_mail`) VALUES
(11, 41, 'Mysql', 'Dr. Jason gilmore', 'With php examples included', '200', 'Mysql.png', '../book/full/Mysql.pdf', 'soumita@gmail.com'),
(12, 45, 'Ruby', 'Tutorials point', 'Ruby programming structures with basic ', '420', 'Ruby.png', '../book/full/Ruby.pdf', 'soumita@gmail.com'),
(13, 44, 'CSS', 'Dr. kar', 'web design using css', '150', 'CSS.png', '../book/full/CSS.pdf', 'soumita@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_name`) VALUES
('Bengali story'),
('Fiction'),
('History'),
('Novels'),
('Politics'),
('Programming Hub'),
('Science and Mathematics'),
('Sociology And psychology');

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
(95, 'soumita', '59d8528ca3638b9c5d6b7d9ebdb5effcbeb2158b', 'soumita@gmail.com', 'verified', 0, 0x35613037326331636134653236312e35353032303131352e6a7067, 1, 'soumita sarkar', '1996-04-10', 'Female', 'Behala,sen palli', 'kolkata', 'West Bengal', 700087),
(96, 'Aritra', '59d8528ca3638b9c5d6b7d9ebdb5effcbeb2158b', 'aritra@gmail.com', 'verified', 0, 0x35613039653762353036646664372e33383632393030352e6a7067, 1, 'Aritra Banerjee', '1996-12-12', 'Male', 'kamalgazi', 'kolkata', 'West Bengal', 700147);

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
(7, 'Java', 'Java.png', 'Ken arnold', '../book/full/Java.pdf', 'soumita@gmail.com'),
(8, 'Mysql', 'Mysql.png', 'Dr. Jason gilmore', '../book/full/Mysql.pdf', 'subhajit_d@gmail.com'),
(9, 'Java', 'Java.png', 'Ken arnold', '../book/full/Java.pdf', 'subhajit_d@gmail.com'),
(10, 'Python', 'Python.png', 'Zed A Shaw', '../book/full/Python.pdf', 'subhajit_d@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `requested_user` varchar(255) NOT NULL,
  `requested_name` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `requested_user`, `requested_name`, `user_message`) VALUES
(1, 'soumita@gmail.com', 'soumita', 'java cookbook');

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
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `category_name` (`category_name`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_name`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cutomer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
