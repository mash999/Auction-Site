-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 05:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auctions`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `mail`, `password`) VALUES
(1, 'mashbu111@gmail.com', 'my_pass123'),
(2, 'mahadi@gmail.com', 'my_pass123'),
(3, 'tamanna@gmail.com', 'my_pass123');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `favorites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `birthday` text NOT NULL,
  `gender` text NOT NULL,
  `about` text NOT NULL,
  `phone` text NOT NULL,
  `mail` text NOT NULL,
  `interests` text NOT NULL,
  `living_area` text NOT NULL,
  `area_preference` text NOT NULL,
  `favorites` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `image`, `birthday`, `gender`, `about`, `phone`, `mail`, `interests`, `living_area`, `area_preference`, `favorites`) VALUES
(1, 'Ruhul Mashbu', '../images/dp/5a1c415e0dbd610682345_858080164203148_8379826281122627107_o.jpg', '08 - 10 - 1993', 'Male', 'I believe myself as a collector and usually prefer the rare products. I have had dealings with other collectors before. I am particularly interested in vintage products and prepared to pay reasonable amount for it.  ', '+8801706314572', 'mashbu111@gmail.com', 'Antiques, Watches, Maps', 'Dhaka', 'Agargaon, Sher-e-bangla nagar, shymoli', '6,9,10,'),
(2, 'Mahadi Hossain', '../images/dp/5a2feeb30808912670214_885182144913725_3477694413677219518_n.jpg', '18 - 09 - 1993', 'Male', 'I believe myself as a collector and usually prefer the rare products. I have had dealings with other collectors before. I am particularly interested in vintage products and prepared to pay reasonable amount for it.  ', '+8801653827361', 'mahadi@gmail.com', 'bike,old cars', 'Dhaka', 'Mohammadpur, Adabor, Shymoli, Asad gate', ''),
(3, 'Nusrat Jahan Tamanna', '../images/dp/5a2fe892da60959f87dc44e060599881d7b752620842253_674226342783662_7382423659846021295_n.jpg', '01 - 06 - 1993', 'Female', 'Trust worthy, keeps her promises', '+8801798352683', 'tamanna@gmail.com', 'Coins, Antiques, Vintage items', 'Dhaka', 'Bashundhara, Notun bazar, Jamuna future park, 300 feet', '');

-- --------------------------------------------------------

--
-- Table structure for table `sell_posts`
--

CREATE TABLE `sell_posts` (
  `product_code` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `post_date` text NOT NULL,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `starting_price` text NOT NULL,
  `bid_interval` int(11) NOT NULL,
  `image` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `approval` int(11) NOT NULL,
  `posted_on` text NOT NULL,
  `updated_on` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sell_posts`
--

INSERT INTO `sell_posts` (`product_code`, `title`, `description`, `post_date`, `start_time`, `end_time`, `starting_price`, `bid_interval`, `image`, `seller_id`, `approval`, `posted_on`, `updated_on`, `category`) VALUES
(6, 'Antique Clock', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12-Dec-2017 , 09:06 PM', '1513238400', '1513411200', '150', 50, '../images/products/5a2ff089d89a8clock.JPG{}{{}}}../images/products/5a2ff089d92beclock2.JPG{}{{}}}../images/products/5a2ff089d98f0clock4.JPG{}{{}}}../images/products/5a2ff089d9f4fclock3.JPG', 3, 0, '12-Dec-2017 , 09:06 PM', '12-Dec-2017 , 09:06 PM', ''),
(7, 'Guitar for sell', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12-Dec-2017 , 09:11 PM', '1513119600', '1513215000', '100', 50, '../images/products/5a2ff1a93fbe83.JPG{}{{}}}../images/products/5a2ff1a9404d14.JPG{}{{}}}../images/products/5a2ff1a940bdf2.JPG{}{{}}}../images/products/5a2ff1a9413d71.JPG', 3, 0, '12-Dec-2017 , 09:11 PM', '12-Dec-2017 , 09:11 PM', ''),
(8, 'Brushes Used By Painters', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12-Dec-2017 , 09:18 PM', '1513296000', '1513391400', '500', 100, '../images/products/5a2ff33f7e2b01.JPG{}{{}}}../images/products/5a2ff33f7ec222.JPG{}{{}}}../images/products/5a2ff33f7f5f84.JPG{}{{}}}../images/products/5a2ff33f7fed13.JPG', 3, 0, '12-Dec-2017 , 09:18 PM', '12-Dec-2017 , 09:18 PM', ''),
(9, 'Art Work', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12-Dec-2017 , 09:22 PM', '1513123200', '1513209600', '300', 100, '../images/products/5a2ff42dc4cc22.JPG{}{{}}}../images/products/5a2ff42dc5ad03.JPG{}{{}}}../images/products/5a2ff42dc63c11.JPG{}{{}}}../images/products/5a2ff42dc6ab34.JPG', 3, 0, '12-Dec-2017 , 09:22 PM', '12-Dec-2017 , 09:22 PM', ''),
(10, 'England made flower Vases', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12-Dec-2017 , 09:27 PM', '1513069200', '1513213200', '50', 50, '../images/products/5a2ff57ab70262.JPG{}{{}}}../images/products/5a2ff57ab79b41.JPG{}{{}}}../images/products/5a2ff57ab7f7a3.JPG{}{{}}}../images/products/5a2ff57ab86134.JPG', 3, 0, '12-Dec-2017 , 09:27 PM', '12-Dec-2017 , 09:27 PM', ''),
(11, '18th century sailors map', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.', '12-Dec-2017 , 09:35 PM', '1513152000', '1513290600', '150', 50, '../images/products/5a2ff7535cf801.JPG{}{{}}}../images/products/5a2ff7535da643.JPG{}{{}}}../images/products/5a2ff7535e2164.JPG{}{{}}}../images/products/5a2ff7535eb202.JPG', 1, 0, '12-Dec-2017 , 09:35 PM', '12-Dec-2017 , 09:35 PM', ''),
(12, '1959 Chevrolet Corvette', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12-Dec-2017 , 09:40 PM', '1513551600', '1514674800', '20000', 500, '../images/products/5a2ff87e45f7f1.JPG{}{{}}}../images/products/5a2ff87e4695e2.JPG{}{{}}}../images/products/5a2ff87e473183.JPG{}{{}}}../images/products/5a2ff87e47c624.JPG', 1, 0, '12-Dec-2017 , 09:40 PM', '12-Dec-2017 , 09:40 PM', ''),
(13, 'Antique Bicycle', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '12-Dec-2017 , 09:45 PM', '1513557000', '1513737000', '1000', 200, '../images/products/5a2ff9b46debe1.JPG{}{{}}}../images/products/5a2ff9b46e7c63.JPG{}{{}}}../images/products/5a2ff9b46ed762.JPG{}{{}}}../images/products/5a2ff9b46f3814.JPG', 1, 0, '12-Dec-2017 , 09:45 PM', '12-Dec-2017 , 09:45 PM', ''),
(14, 'Old Coins', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', '12-Dec-2017 , 09:50 PM', '1513384200', '1513650600', '150/coin', 50, '../images/products/5a2ffad10ac434.JPG{}{{}}}../images/products/5a2ffad10b6563.JPG{}{{}}}../images/products/5a2ffad10f2441.JPG{}{{}}}../images/products/5a2ffad10fae42.JPG', 1, 0, '12-Dec-2017 , 09:50 PM', '12-Dec-2017 , 09:50 PM', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_posts`
--
ALTER TABLE `sell_posts`
  ADD PRIMARY KEY (`product_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sell_posts`
--
ALTER TABLE `sell_posts`
  MODIFY `product_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
