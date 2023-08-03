-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2023 at 08:52 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trigers`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `name_category` varchar(120) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `created`, `updated`) VALUES
(1, 'test satu', '2023-08-03 13:52:19', NULL),
(2, 'test dua', '2023-08-03 14:35:02', NULL),
(3, 'test tiga', '2023-08-03 14:35:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_product`
--

CREATE TABLE `log_product` (
  `id_log_product` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `old_price` int DEFAULT NULL,
  `new_price` int DEFAULT NULL,
  `date_change` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_product`
--

INSERT INTO `log_product` (`id_log_product`, `name`, `old_price`, `new_price`, `date_change`) VALUES
(6, 'prd tes satu', NULL, 1000, '2023-08-03 14:12:40'),
(7, 'prd tes dua', NULL, 5000, '2023-08-03 14:12:43'),
(8, 'asas', 0, 3000, '2023-08-03 15:51:47'),
(9, 'asas', 3000, 3000, '2023-08-03 15:51:56'),
(10, 'asas', 3000, 3000, '2023-08-03 15:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `id_category` int NOT NULL,
  `price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `id_category`, `price`) VALUES
(1, 'prd tes satu', 1, 1000),
(2, 'prd tes dua', 1, 5000),
(4, 'asas', 3, 3000),
(5, 'asas', 2, 200);

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `before_produk_update` BEFORE UPDATE ON `product` FOR EACH ROW BEGIN
    INSERT INTO log_product
    set name = OLD.name,
    new_price=new.price,
    old_price=old.price,
    date_change = NOW(); 
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `log_product`
--
ALTER TABLE `log_product`
  ADD PRIMARY KEY (`id_log_product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_product`
--
ALTER TABLE `log_product`
  MODIFY `id_log_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
