-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 09:29 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abbrothers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_menu`
--

CREATE TABLE `category_menu` (
  `menu_id` int(255) NOT NULL,
  `category_name` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_menu`
--

INSERT INTO `category_menu` (`menu_id`, `category_name`, `status`) VALUES
(1, 'Pani Puri', 'active'),
(3, 'Coffee', 'active'),
(4, 'misad Pav', 'active'),
(5, 'Ice Cream', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_review`
--

CREATE TABLE `customer_review` (
  `menu_id` int(255) NOT NULL,
  `menu_name` varchar(300) NOT NULL,
  `menu_price` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_review`
--

INSERT INTO `customer_review` (`menu_id`, `menu_name`, `menu_price`, `image`, `status`) VALUES
(1, 'shital', 'First time in (RN) and YOU have to go! It’s the cutest little spot with amazing food. The (FN) is to die for. IT WAS FIRE!! The service we received was so amazing and we will definitely be back again. They made us feel welcomed and gave us an amazing experience.', 'avt-img_25102021031237.jpg', 'active'),
(2, 'shital', 'First time in (RN) and YOU have to go! It’s the cutest little spot with amazing food. The (FN) is to die for. IT WAS FIRE!! The service we received was so amazing and we will definitely be back again. They made us feel welcomed and gave us an amazing experience.', 'avt-img_25102021031527.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `franchise_from`
--

CREATE TABLE `franchise_from` (
  `franchise_id` int(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mob_no` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `added_on` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `franchise_from`
--

INSERT INTO `franchise_from` (`franchise_id`, `name`, `email`, `mob_no`, `address`, `added_on`) VALUES
(2, 'shital Motghare', 'subadmin@gmail.com', '7798234562', 'htderabad', '2021-10-25 13:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `image`, `status`) VALUES
(1, 'gallery-img-01_25102021015136.jpg', 'active'),
(2, 'gallery-img-05_25102021015136.jpg', 'active'),
(3, 'img-08_25102021015136.jpg', 'active'),
(4, 'img-09_25102021015136.jpg', 'active'),
(5, 'blog-img-09_25102021015810.jpg', 'active'),
(6, 'gallery-img-01_25102021015810.jpg', 'active'),
(7, 'gallery-img-04_25102021015810.jpg', 'active'),
(8, 'gallery-img-05_25102021015810.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `login_id` int(255) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`login_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu_details`
--

CREATE TABLE `menu_details` (
  `menu_details_id` int(255) NOT NULL,
  `category_id` varchar(300) NOT NULL,
  `menu_name` varchar(300) NOT NULL,
  `prize` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_details`
--

INSERT INTO `menu_details` (`menu_details_id`, `category_id`, `menu_name`, `prize`, `image`, `status`) VALUES
(1, '4', 'Special Misal Pav', '25', 'marathi-snacks-misal-pav-misal-pav-buns-smeared-butter-served-spicy-sprouts-curry-trail-mixture-chopped-onions-219474589 (1)_25102021043147.jpg', 'active'),
(2, '4', 'Special Misal Pav', '28', 'f64673_fffd3749eb6c4848b9e794d24358da43_mv2_25102021050531.jpg', 'active'),
(3, '5', 'Special Ice Cream', '25', 'heather-barnes-XlBkpiB2nRw-unsplash_25102021045934.jpg', 'active'),
(4, '3', 'Special Coffee', '25', 'menu_26102021113758.jpg', 'active'),
(5, '1', 'Special Pani Puri', '12', 'menu_26102021113840.jpg', 'active'),
(6, '1', 'Special Pani Puri', '25', 'menu_26102021041850.png', 'active'),
(7, '1', 'Special Pani Puri', '12', 'menu_26102021041912.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `team_member_details`
--

CREATE TABLE `team_member_details` (
  `member_id` int(255) NOT NULL,
  `member_name` varchar(300) NOT NULL,
  `position` varchar(300) NOT NULL,
  `education` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_member_details`
--

INSERT INTO `team_member_details` (`member_id`, `member_name`, `position`, `education`, `image`, `status`) VALUES
(1, 'YUJVENDRA SALAME', 'CO-FOUNDER, A.B BROTHER\'S', 'MBA', 'yuj_25102021121825.jpg', 'active'),
(2, 'ABHINEK MOHURLE', 'CO-FOUNDER, A.B BROTHER\'S', 'M.Tech', 'WhatsApp Image 2021-10-14 at 11_25102021051252.jpeg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_menu`
--
ALTER TABLE `category_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `customer_review`
--
ALTER TABLE `customer_review`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `franchise_from`
--
ALTER TABLE `franchise_from`
  ADD PRIMARY KEY (`franchise_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `menu_details`
--
ALTER TABLE `menu_details`
  ADD PRIMARY KEY (`menu_details_id`);

--
-- Indexes for table `team_member_details`
--
ALTER TABLE `team_member_details`
  ADD PRIMARY KEY (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_menu`
--
ALTER TABLE `category_menu`
  MODIFY `menu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_review`
--
ALTER TABLE `customer_review`
  MODIFY `menu_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `franchise_from`
--
ALTER TABLE `franchise_from`
  MODIFY `franchise_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `login_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_details`
--
ALTER TABLE `menu_details`
  MODIFY `menu_details_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `team_member_details`
--
ALTER TABLE `team_member_details`
  MODIFY `member_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
