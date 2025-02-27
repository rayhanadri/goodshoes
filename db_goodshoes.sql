-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 09:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `goodshoes`
--
-- --------------------------------------------------------
CREATE SCHEMA IF NOT EXISTS goodshoes DEFAULT CHARACTER SET utf8;

USE goodshoes;

--
-- Table structure for table `gallery`
--
CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `gallery`
--
INSERT INTO
  `gallery` (`id`, `image`)
VALUES
  (1, './img/gallery/gallery_1.jfif'),
  (2, './img/gallery/gallery_2.jfif'),
  (3, './img/gallery/gallery_3.jfif'),
  (4, './img/gallery/gallery_4.jfif');

-- --------------------------------------------------------
--
-- Table structure for table `message`
--
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `message`
--
INSERT INTO
  `message` (
    `id`,
    `first_name`,
    `last_name`,
    `email`,
    `phone`,
    `subject`,
    `message`,
    `timestamp`
  )
VALUES
  (
    1,
    'Jhon',
    'Smith',
    'jhonsmith@gmail.com',
    '08123213',
    'Good Products',
    'Thank you for good products!',
    '2025-02-27 15:56:43'
  ),
  (
    11,
    'Jane',
    'Doe',
    'janedoe@gmail.com',
    '08123123',
    'Damaged products',
    'I request for change because product I received was damaged.',
    '2025-02-27 16:01:01'
  );

-- --------------------------------------------------------
--
-- Table structure for table `products`
--
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `merk` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kode_produk` varchar(45) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `products`
--
INSERT INTO
  `products` (
    `id`,
    `type`,
    `merk`,
    `nama`,
    `kode_produk`,
    `price`,
    `image`
  )
VALUES
  (
    1,
    'Sepatu Bola',
    'Nike',
    'Nike Zoom Vapor',
    'NSB1',
    1000000,
    './img/products/bola_nike_zoom_vapor.png'
  ),
  (
    2,
    'Sepatu Futsal',
    'Nike',
    'Nike Tiempo Legend',
    'NSF1',
    1000000,
    './img/products/futsal_nike_tiempo.jpg'
  ),
  (
    3,
    'Running',
    'Nike',
    'Nike Downshifter 13',
    'NR1',
    800000,
    './img/products/running_nike_downshifter_13.jpg'
  ),
  (
    4,
    'Running',
    'Ortuseight',
    'Ortuseight Hyperblast 2.0',
    'OR1',
    650000,
    './img/products/running_ortuseight_hyperblast_2_0.jpg'
  ),
  (
    5,
    'Running',
    'Adidas',
    'Adidas Runfalcon',
    'AR1',
    750000,
    './img/products/running_adidas_runfalcon.jpg'
  ),
  (
    6,
    'Sneakers',
    'Nike',
    'Nike Court Vision',
    'NS1',
    700000,
    './img/products/sneakers_nike_court_vision.jpg'
  ),
  (
    7,
    'Sneakers',
    'Adidas',
    'Adidas Galaxy',
    'AS1',
    300000,
    './img/products/sneakers_adidas_galaxy.jpg'
  ),
  (
    8,
    'Sneakers',
    'Ortuseight',
    'Ortuseight Omega',
    'OS1',
    300000,
    './img/products/sneakers_ortuseight_omega.jpg'
  ),
  (
    27,
    'Sepatu Bola',
    'Nike',
    'Nike qqxxxx',
    'NKABC',
    1000000,
    './img/products/20250227215326.png'
  );

-- --------------------------------------------------------
--
-- Table structure for table `products_variants`
--
CREATE TABLE `products_variants` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `warna` varchar(100) NOT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `products_variants`
--
INSERT INTO
  `products_variants` (`id`, `id_product`, `size`, `warna`, `stock`)
VALUES
  (4, 2, 40, 'LIGHT BLUE', 4),
  (5, 2, 41, 'LIGHT BLUE', 2),
  (6, 2, 42, 'LIGHT BLUE', 4),
  (7, 3, 40, 'LIGHT BLUE', 4),
  (8, 3, 41, 'LIGHT BLUE', 4),
  (9, 3, 42, 'LIGHT BLUE', 4),
  (10, 4, 40, 'TEAL', 4),
  (11, 4, 41, 'TEAL', 4),
  (12, 4, 42, 'TEAL', 4),
  (13, 5, 40, 'BLACK', 4),
  (14, 5, 41, 'BLACK', 4),
  (15, 5, 42, 'BLACK', 4),
  (16, 6, 40, 'WHITE', 4),
  (17, 6, 41, 'WHITE', 4),
  (18, 6, 42, 'WHITE', 4),
  (19, 7, 40, 'BLACK', 4),
  (20, 7, 41, 'BLACK', 4),
  (21, 7, 42, 'BLACK', 4),
  (22, 8, 40, 'BLACK', 4),
  (23, 8, 41, 'BLACK', 4),
  (24, 8, 42, 'BLACK', 4),
  (25, 1, 40, 'LIGHT BLUE', 4),
  (26, 1, 41, 'LIGHT BLUE', 4),
  (27, 1, 42, 'LIGHT BLUE', 4);

-- --------------------------------------------------------
--
-- Table structure for table `transaction`
--
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `timestamp` timestamp NULL DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Dumping data for table `users`
--
INSERT INTO
  `users` (`id`, `name`, `email`, `type`, `password`)
VALUES
  (
    1,
    'Admin 1',
    'admin@gmail.com',
    'admin',
    '$2y$10$D4.wAqTKE1BcWnD/I9CA2eHBhZUOBgZmBBJ.Aw27SLmtOQkyFmT.y'
  ),
  (
    2,
    'Admin 2',
    'admin2@gmail.com',
    'admin',
    '$2y$10$nGbU02xNcIGZ1G2yhr8Iiekt2wJdGNtQ1ZiRr3FuLv6FnHZQsaSHG'
  ),
  (
    3,
    'Admin 3',
    'admin3@gmail.com',
    'admin',
    '$2y$10$uiiEgEfCm15sU0adE7YG6eEBHsVyWxP7X3Mk381W.WQPthbeJ9sM6'
  ),
  (
    4,
    'Admin 4',
    'admin4@gmail.com',
    'admin',
    '$2y$10$n7SDakOR2Ok6ivBydtAwnu9lXlJmeB0dofXK4EP93TqBt2qtryIde'
  ),
  (
    10,
    'user1',
    'user1@gmail.com',
    'user',
    '$2y$10$5lXlGjjsVvmlZVaETzvojuDhy2YNWattQyhe84/Kc4hRWc7EDh2x2'
  ),
  (
    11,
    'Admin 5',
    'admin5@gmail.com',
    'user',
    '$2y$10$8DGu.z0EzcmcN/C6NHccPOWrF8YMB9KNgKZV3Beo8FW5htyBP9IaC'
  ),
  (
    14,
    'Admin 6',
    'admin6@gmail.com',
    'user',
    '$2y$10$ZO.pufJza8CQ.T1sV3prq.gEHItrlHAXXXRkUdalJh325kXI9nCi2'
  );

-- --------------------------------------------------------
--
-- Table structure for table `user_transaction_detail`
--
CREATE TABLE `user_transaction_detail` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_general_ci;

--
-- Indexes for dumped tables
--
--
-- Indexes for table `gallery`
--
ALTER TABLE
  `gallery`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE
  `message`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE
  `products`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `products_variants`
--
ALTER TABLE
  `products_variants`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `fk_products_variants_products1_idx` (`id_product`);

--
-- Indexes for table `transaction`
--
ALTER TABLE
  `transaction`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `fk_transaction_users1_idx` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `user_transaction_detail`
--
ALTER TABLE
  `user_transaction_detail`
ADD
  PRIMARY KEY (`id`),
ADD
  KEY `fk_user_transaction_detail_users_transaction_idx` (`id_transaction`),
ADD
  KEY `fk_user_transaction_detail_products1_idx` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE
  `gallery`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE
  `message`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE
  `products`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 28;

--
-- AUTO_INCREMENT for table `products_variants`
--
ALTER TABLE
  `products_variants`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 28;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE
  `transaction`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 15;

--
-- AUTO_INCREMENT for table `user_transaction_detail`
--
ALTER TABLE
  `user_transaction_detail`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--
--
-- Constraints for table `products_variants`
--
ALTER TABLE
  `products_variants`
ADD
  CONSTRAINT `fk_products_variants_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE
  `transaction`
ADD
  CONSTRAINT `fk_transaction_users1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_transaction_detail`
--
ALTER TABLE
  `user_transaction_detail`
ADD
  CONSTRAINT `fk_user_transaction_detail_products1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD
  CONSTRAINT `fk_user_transaction_detail_users_transaction` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;