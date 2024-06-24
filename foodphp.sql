-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 03:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(8, 'demo', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `total` varchar(255) NOT NULL,
  `food_desc` varchar(250) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `special_instruction` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `title`, `price`, `qty`, `total`, `food_desc`, `image_name`, `special_instruction`) VALUES
(40, 'Drinks', '40', '0', '', 'freshly made', 'Food-Menu-4146.jpg', ''),
(50, 'special burger', '66', '0', '', ' special  burger', 'Food-Menu-3346.jpg', ''),
(51, 'last', '88', '0', '', 'last hoja', 'Food-Name-316.png', ''),
(52, 'nuggets', '52', '0', '', 'freshly made', 'Food-Menu-8323.png', ''),
(53, 'nuggets', '52', '0', '', 'freshly made', 'Food-Menu-8323.png', ''),
(54, 'nuggets', '52', '0', '', 'freshly made', 'Food-Menu-8323.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(33, 'Burger', 'Food_category_269.jpg', 'yes', 'yes'),
(34, 'Pizza', 'Food_category_102.jpg', 'yes', 'yes'),
(35, 'MOMO', 'Food_category_693.jpg', 'yes', 'yes'),
(40, 'Drinks', 'Food_category_899.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `special` varchar(100) NOT NULL,
  `popular` varchar(100) NOT NULL,
  `trending` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `special`, `popular`, `trending`, `featured`, `active`) VALUES
(3, 'Pasta', 'Made using italian sauces..', '55', 'Food-Menu-4947.png', 33, 'Yes', 'No', 'No', 'Yes', 'Yes'),
(4, 'nuggets', 'freshly made', '52', 'Food-Menu-8323.png', 34, 'Yes', 'No', 'No', 'Yes', 'Yes'),
(5, 'chicken caremal', 'Made with love', '55', 'Food-Menu-2028.png', 35, 'Yes', 'No', 'No', 'Yes', 'Yes'),
(6, 'special burger', ' special  burger', '66', 'Food-Menu-3346.jpg', 33, 'No', 'Yes', 'No', 'Yes', 'Yes'),
(7, 'Beacon burger', 'suses beacon', '40', 'Food-Menu-36.jpg', 33, 'No', 'Yes', 'No', 'Yes', 'Yes'),
(8, 'Drinks', 'freshly made', '40', 'Food-Menu-4146.jpg', 34, 'No', 'Yes', 'No', 'Yes', 'Yes'),
(13, 'hamburger', 'Like homemade', '40', 'Food-Menu-7050.png', 33, 'No', 'Yes', 'No', 'Yes', 'Yes'),
(14, 'Choco ice cream', 'lChoclate ', '44', 'Food-Menu-7921.png', 33, 'No', 'Yes', 'No', 'Yes', 'Yes'),
(22, 'last', 'last hoja', '88', 'Food-Name-316.png', 33, 'No', 'Yes', 'No', 'Yes', 'Yes'),
(23, 'trending 1', 'delicious', '44', 'Food-Name-9837.jpg', 33, 'No', 'No', 'Yes', 'Yes', 'Yes'),
(24, 'Menu 2', 'VV Delicious', '33', 'Food-Name-3895.jpg', 33, 'No', 'No', 'Yes', 'Yes', 'Yes'),
(25, 'Menu 3', 'tasty ', '77', 'Food-Name-4834.jpg', 33, 'No', 'No', 'Yes', 'Yes', 'Yes'),
(26, 'Menu 4', 'Delicious', '111', 'Food-Name-6825.jpg', 33, 'No', 'No', 'Yes', 'Yes', 'Yes'),
(27, 'Menu 5', 'Delicious', '44', 'Food-Name-8741.jpg', 33, 'No', 'No', 'Yes', 'Yes', 'Yes'),
(28, 'Menu 6', 'Delicious', '77', 'Food-Name-128.jpg', 33, 'No', 'No', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `special_instruction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_address`, `special_instruction`) VALUES
(12, 'burger', '22', '2', '55', '0000-00-00 00:00:00', 'ordered', 'Raju Bhattarai', '11111111111', 'newroad', 'Need after 1pm'),
(13, '', '', '0', '50', '0000-00-00 00:00:00', 'ordered', 'Raju Bhattarai', '22222222222', 'Basundhara', 'before 4pm'),
(14, '', '', '0', '0', '0000-00-00 00:00:00', 'ordered', 'Raju Bhattarai', '9874561236', 'Budhanilkantha', 'Need fast'),
(15, '', '', '0', '0', '0000-00-00 00:00:00', 'ordered', 'Raju Bhattarai', '9803326751', 'Putalisadak,ktm', 'Extra spoons'),
(16, '', '', '0', '0', '2022-03-04 06:02:27', '', 'Kamal Baraili', '', 'Basundhara,ktm', 'Need food at 1pm'),
(17, '', '', '0', '0', '2022-03-04 06:09:03', '', 'Kamal Baraili', '', '180 Genesee St.', ''),
(21, '', '', '0', '0', '2022-03-04 06:36:35', '', 'Subash belbase', '9845789945', 'Satungal,ktm', 'Fast '),
(22, '', '', '0', '0', '2022-03-04 06:38:07', '', 'Subash belbase', '1234567891', '180 Genesee St.', 'fast');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `username`, `password`, `email`, `contact`) VALUES
(3, 'Raju Bhattarai', 'Alem', '81dc9bdb52d04dc20036dbd8313ed055', 'rbhattarai525@gmail.com', 1234567891),
(4, 'Raju Bhattarai', 'Alem', '202cb962ac59075b964b07152d234b70', 'rajubhattarai@kcc.edu.np', 1234567891);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
