-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 10:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorder`
--
CREATE DATABASE IF NOT EXISTS `foodorder` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `foodorder`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', 'Admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`) VALUES
(1, 'Burger', 'Burger.jpg'),
(2, 'Pizza', 'Pizza.jpg'),
(3, 'Pasta', 'Pasta.jpg'),
(4, 'Sandwishes', 'Sandwishes.jpg'),
(5, 'Lebanese Cuisine', 'cuisine.jpg'),
(6, 'Desserts', 'desserts.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`) VALUES
(1, 'Hamburger', 'Meat burger, tomato and lots of fries and Cheese', '4.00', 'hamburger.jpeg', 1),
(2, 'Pepperoni Pizza', 'Without mushrooms and with extra cheese', '9.00', 'pepperoni.jpeg', 2),
(3, 'Chickenburger', 'chicken breast, avocado, lettuce and tomato', '5.00', 'chickenburger.jpg', 1),
(4, 'Grilled Cheese Sandwich', 'cheese filling, often cheddar or American between two slices of bread', '3.00', 'GrilledCheese.jpg', 4),
(5, 'twister', 'Crispy flour tortilla with juicy chicken, bacon, lettuce, avocado and cheese drizzled', '7.00', 'twister.jpg', 4),
(6, 'Chicken Fettuccini', 'heavy cream, butter, cheese, chicken breast, and touch of garlic', '12.00', 'ChickenFettuccini.jpg', 3),
(7, 'Cheesecake', 'Fresh cheese, eggs, and sugar. A crust of cookies, graham crackers, pastry.', '10.00', 'Cheesecake.jpeg', 6),
(8, 'Kibbeh b Laban', 'Fine bulgur, wheat short grain, rice lean, ground beef, sumac and olive oil', '9.50', 'Kebbe.jpg', 5),
(9, 'Shawarma ', 'Meat or Chicken with vegetables', '5.00', 'shawarma.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `statuses` varchar(50) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `customer_contact` varchar(20) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `food`, `price`, `qty`, `total`, `statuses`, `customer_name`, `customer_contact`, `customer_address`) VALUES
(1, 'Hamburger', '4.00', 4, '16.00', 'Delivered', 'Jad Mahmoud', '7896547800', '101 Maameltein, Jounieh'),
(2, 'Chickenburger with no tomato', '5.00', 1, '5.00', 'Delivered', 'Layla Saad', '7410001450', '34 Badaro, Beirut'),
(3, 'Grilled Cheese Sandwich with extra cheese', '3.00', 2, '6.00', 'Cancelled', 'Lea Saad', '7458965550', 'Jnah - Summerland Hotel, Beirut'),
(4, 'Chicken Fettuccini with extra cheese and black pepper', '12.00', 3, '36.00', 'Ordered', 'Sara T.', '7451114400', '22 Mazraa, Beirut'),
(7, 'Chickenburger', '5.00', 2, '10.00', 'Ordered', 'Mohammed Haydar', '76410801', 'Hamra, Beirut, Lebanon'),
(8, 'Pepperoni Pizza', '9.00', 2, '18.00', 'Ordered', 'Ali', '03030344', 'Saida, South Lebanon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foodCat` (`category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `foodCat` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
