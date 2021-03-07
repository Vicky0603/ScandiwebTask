-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 26, 2021 at 01:13 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `bookId` int(11) NOT NULL,
  `weight` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`bookId`, `weight`) VALUES
(38, 2),
(43, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `catName` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`catName`) VALUES
('Book'),
('Dvd'),
('Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `Dvd`
--

CREATE TABLE `Dvd` (
  `dvdId` int(11) NOT NULL,
  `size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Dvd`
--

INSERT INTO `Dvd` (`dvdId`, `size`) VALUES
(48, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Furniture`
--

CREATE TABLE `Furniture` (
  `furnitureId` int(11) NOT NULL,
  `height` float NOT NULL,
  `length` float NOT NULL,
  `width` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Furniture`
--

INSERT INTO `Furniture` (`furnitureId`, `height`, `length`, `width`) VALUES
(49, 12, 57.9, 34);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `productId` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`name`, `price`, `productId`, `category`, `sku`) VALUES
('Othello', 12, 38, 'Book', '12ew'),
('Star Wars Special Edition', 2, 41, 'Dvd', '56weh'),
('Da Vinci code', 12, 43, 'Book', '123gh'),
('Top Gun', 3, 46, 'Dvd', '1234yj'),
('Hamlet', 12, 47, 'Book', '13efg'),
('Star Wars Special Edition', 12, 48, 'Dvd', '123eff'),
('table', 12, 49, 'Furniture', '1weeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD KEY `fk_foreign_key_Book` (`bookId`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD UNIQUE KEY `catName` (`catName`);

--
-- Indexes for table `Dvd`
--
ALTER TABLE `Dvd`
  ADD KEY `fk_foreign_key_dvd` (`dvdId`);

--
-- Indexes for table `Furniture`
--
ALTER TABLE `Furniture`
  ADD KEY `fk_foreign_key_furniture` (`furnitureId`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `fk_foreign_key_Prod` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Book`
--
ALTER TABLE `Book`
  ADD CONSTRAINT `fk_foreign_key_Book` FOREIGN KEY (`bookId`) REFERENCES `Product` (`productId`) ON DELETE CASCADE;

--
-- Constraints for table `Dvd`
--
ALTER TABLE `Dvd`
  ADD CONSTRAINT `fk_foreign_key_dvd` FOREIGN KEY (`dvdId`) REFERENCES `Product` (`productId`);

--
-- Constraints for table `Furniture`
--
ALTER TABLE `Furniture`
  ADD CONSTRAINT `fk_foreign_key_furniture` FOREIGN KEY (`furnitureId`) REFERENCES `Product` (`productId`) ON DELETE CASCADE;

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `fk_foreign_key_Prod` FOREIGN KEY (`category`) REFERENCES `Category` (`catName`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
