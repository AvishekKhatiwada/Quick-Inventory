-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 11:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quickinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pcategory` varchar(50) NOT NULL,
  `ptag` varchar(50) NOT NULL,
  `pbrand` varchar(50) DEFAULT NULL,
  `plength` varchar(20) DEFAULT NULL,
  `pweight` varchar(20) DEFAULT NULL,
  `pcolor` varchar(20) DEFAULT NULL,
  `psize` varchar(20) DEFAULT NULL,
  `soldper` varchar(10) DEFAULT NULL COMMENT 'kg; lt; pc;	',
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `pcategory`, `ptag`, `pbrand`, `plength`, `pweight`, `pcolor`, `psize`, `soldper`, `image`) VALUES
(1, 'Pen', 'Stationery', 'Red Pen', 'Natraj', NULL, NULL, 'Red', NULL, 'Piece', 'images/products/product_Pen_20220605084412.jpg'),
(4, 'First Aid', 'medical', 'Box', NULL, NULL, NULL, NULL, 'md', 'box', 'images/products/product_FirstAid_20220629094317.jpg'),
(5, 'DSA', 'stationery', 'Book', 'Asmita', NULL, NULL, NULL, NULL, 'piece', 'images/products/product_DSA_20220629094556.jpg'),
(6, 'Cashew', 'Food', 'Dry fruit', NULL, NULL, NULL, NULL, NULL, 'packet', 'images/products/product_Cashew_20220629094854.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `sellingprice` varchar(10) NOT NULL,
  `costprice` varchar(10) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `salesdate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `pid`, `quantity`, `sellingprice`, `costprice`, `remarks`, `salesdate`) VALUES
(1, 1, '8', '100', '80', 'sold to temp', '20220605'),
(2, 5, '2', '2500', '2100', 'sold to test data', '20220605'),
(3, 1, '24', '250', '240', 'Sold to test', '20220605'),
(6, 1, '500', '6000', '5000', 'sold to test person', '20220606'),
(7, 1, '8', '100', '80', 'sold to temp', '20220606'),
(11, 4, '2', '4200', '4000', 'sold to temp', '20220607'),
(13, 1, '70', '1000', '700', 'sold to hero', '20220608'),
(15, 4, '5', '12000', '10000', 'Sold to test', '20220629'),
(16, 5, '3', '3250', '3150', 'Test Data', '20220629'),
(17, 6, '10', '3500', '3000', 'Test data', '20220629'),
(18, 4, '6', '13000', '12000', 'Sold first aid to person', '20220608'),
(19, 5, '3', '3550', '3150', 'Test Dsa data', '20220627'),
(20, 6, '10', '4500', '3000', 'Test cashew', '20220626'),
(21, 4, '12', '25000', '24000', 'sold to sir', '20220629');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `lot` varchar(10) DEFAULT NULL,
  `quantity` varchar(10) NOT NULL,
  `warningquantity` varchar(10) NOT NULL,
  `costprice` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `pid`, `lot`, `quantity`, `warningquantity`, `costprice`) VALUES
(1, 1, 'test', '50', '20', '20'),
(4, 1, 'Lot_Jun05', '50', '10', '10'),
(5, 4, 'sunday', '3', '5', '2000'),
(6, 5, 'friday', '50', '10', '1050'),
(7, 6, 'friday', '50', '5', '200'),
(8, 6, 'Lot_Jun29', '90', '10', '300'),
(9, 4, 'hello', '10', '5', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `sname` varchar(25) NOT NULL,
  `semail` varchar(20) NOT NULL,
  `sphone` varchar(10) NOT NULL,
  `saddress` varchar(30) NOT NULL,
  `simage` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `sname`, `semail`, `sphone`, `saddress`, `simage`) VALUES
(10, 'ABC', 'abc@gmail.com', '1234567890', 'Mechinagar', 'images/suppliers/supplier_Dipesh_20220604160731.jpg'),
(13, 'Dipesh', 'dipesh@gmail.com', '9861234567', 'Mechinagar', 'images/suppliers/supplier__20220605184538.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `uemail` varchar(30) NOT NULL,
  `upassword` varchar(100) NOT NULL,
  `uphone` varchar(13) NOT NULL,
  `uaddress` varchar(30) NOT NULL,
  `uimage` varchar(500) NOT NULL,
  `uhashcheck` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `uemail`, `upassword`, `uphone`, `uaddress`, `uimage`, `uhashcheck`) VALUES
(1, 'Dipesh Gupta', 'dipeshgupta@gmail.com', '$2y$10$5WgR8GMBiDh8i86nbPIocO8AcvUkVAIcgOgVjqLHdS0xMRqHPJdAm', '12345678', 'Dhulabari', 'images/user/user_dipeshgupta@gmail.com.png', '$2y$10$u/yCqRSwZEYaXlqx8eFiFO4.SclwTHagqXDH9vuHyF7oPVu/iirQ.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uemail` (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`id`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
