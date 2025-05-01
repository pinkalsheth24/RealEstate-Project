-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 10:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestatephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(13, 'Welcome to EstateEase', 'Welcome to EstateEase your one-stop destination for all your real estate needs. Whether you are looking to buy, sell, or rent properties, we are here to make your journey seamless and hassle-free.\r\n\r\nAt EstateEase, we understand the importance of finding the perfect place to call home or the ideal location to grow your business. That’s why we bring together a comprehensive range of listings, from luxurious homes to budget-friendly apartments and commercial spaces.\r\n\r\nOur Mission\r\nOur mission is to simplify real estate transactions by providing an easy-to-use platform that connects buyers, sellers, and renters. We aim to create a transparent, reliable, and efficient marketplace where users can explore opportunities, compare options, and make informed decisions.\r\n\r\nWhat We Offer\r\nFor Buyers and Renters: Browse through an extensive range of properties, filter by your preferences, and find your dream home or office space.\r\nFor Sellers and Agents: Showcase your listings to a wide audience, manage inquiries, and close deals faster with our platform.\r\nFor Builders: Highlight your latest projects and attract the right audience with detailed listings and promotions.\r\nWhy Choose Us?\r\nUser-Friendly Interface: Navigate easily through a well-designed platform that prioritizes your needs.\r\nVerified Listings: We ensure that every property listed on our platform is thoroughly vetted for accuracy and authenticity.\r\nDedicated Support: Our team is here to assist you at every step, ensuring a smooth experience.', 'about us.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `adob`, `aphone`) VALUES
(13, 'Riddhi', 'riddhi001@gmail.com', 'b3c0730cf3f50613e40561e67c871fdb92820cf9', '2002-12-29', '9645698713');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `sid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(10, 'pinkal sheth', 'shethpinkal24@gmail.com', '9313625782', 'House Sale', 'Consider installing smart home systems such as automated lighting, smart locks, or a voice-controlled assistant to make the property tech-savvy.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_requests`
--

CREATE TABLE `contact_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(12, 54, '\"Overall, it’s a great property in a prime location. With a few minor improvements, it would be absolutely perfect!\"', 0, '2024-11-10 23:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `bhk` varchar(50) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `pimage4` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `totalfloor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `bhk`, `stype`, `bedroom`, `bathroom`, `kitchen`, `price`, `location`, `city`, `state`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `uid`, `status`, `totalfloor`) VALUES
(43, 'Santinivas', 'Additional Details:\r\n\r\nParking: Covered parking space for 2 vehicles.\r\nStorage: Extra storage room for added convenience.\r\nCommunity Amenities: Access to a clubhouse, children’s play area, and jogging track.\r\nLocation: Situated in a peaceful residential neighborhood with easy access to schools, supermarkets, and healthcare facilities.', 'house', '3 BHK', 'sale', 0, 4, 1, 10000000, 'Vaniya seri near by bank baroda,Pandoli', 'Anand', 'Gujarat', 'badrooms (2).jpg', 'badrooms (1).jpg', 'hall (3).jpg', 'kitchen.jpg', 'house (2).jpg', 50, 'available', '2'),
(52, ' Matruchaya', 'DGHHHHHHHH', 'apartment', '3 BHK', 'sale', 0, 3, 1, 20000000, 'Ajawa road,sadarestate,vagodiya', 'Vadodara', 'Gujarat', 'hall (1).jpg', 'house (1).jpg', 'house (2).jpg', 'kitchen.jpg', 'kitchen.jpg', 51, 'available', '2'),
(53, ' Matruchaya5', 'hgjgjgjjg', 'flat', '2 BHK', 'rent', 4, 3, 1, 20000000, 'Ajawa road,sadarestate,vagodiya', 'Vadodara', 'Gujarat', 'house (2).jpg', 'kitchen (1).jpg', 'kitchen.jpg', 'boyprofile.jpg', 'kitchen (2).jpg', 51, 'available', '2');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(50) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `sname`) VALUES
(0, 'Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`) VALUES
(50, 'Pinkal Sheth', 'shethpinkal24@gmail.com', '9313625782', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 'girlprofile1.png'),
(51, 'Riddhi', 'riddhi001@gmail.com', '9645698713', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'agent', 'girlprofile1.png'),
(52, 'palak', 'palak001@gmail.com', '968574145', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', 'girlprofile2.jpg'),
(54, 'swapnil', 'swapnil001@gmai.com', '963214578', 'b3c0730cf3f50613e40561e67c871fdb92820cf9', 'agent', 'boyprofile1.jpg'),
(55, 'Dhruv Sheth', 'dhruv001@gmail.com', '789654123', 'b3c0730cf3f50613e40561e67c871fdb92820cf9', 'agent', 'boyprofile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact_requests`
--
ALTER TABLE `contact_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_requests`
--
ALTER TABLE `contact_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
