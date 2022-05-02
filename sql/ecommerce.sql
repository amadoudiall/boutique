-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2022 at 09:50 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3
DROP DATABASE IF EXISTS `ecommerce`;
-- C(CREATE) Créer les bases de donnée et ces tables
CREATE DATABASE IF NOT EXISTS `ecommerce`;
USE `ecommerce`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `id` int NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `descriptions` text,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`id`, `category`, `descriptions`, `icon`) VALUES
(1, 'Alimentaire', 'Produit consomable, Riz, Boisson, Café, Sucre, Fruit etc...', '<i class=\"bi bi-egg-fried\"></i>'),
(2, 'Ordinateur &amp; Accessoire', 'Ordinateur portable, Ordinateur de bureu, Composant éléctronique, Clé USB, Clavier, Souris etc...', '<i class=\"bi bi-laptop\"></i>'),
(3, 'Téléphone &amp; Accessoire', 'Téléphone portable, Téléphone fixe, Accéssoire...', '<i class=\"bi bi-phone\"></i>'),
(4, 'Electro Ménager', 'Climatiseurs, Frigo, Micro-onde etc...', '<i class=\"bi bi-building\"></i>'),
(5, 'Cosmétique', 'Créme pour la peau, Parfum etc...', '<i class=\"bi bi-heart\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `Commande`
--

CREATE TABLE `Commande` (
  `id` int NOT NULL,
  `User_id` int DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `chipedAt` datetime DEFAULT NULL,
  `status` enum('En cours','En attente','Livré') DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Commande`
--

INSERT INTO `Commande` (`id`, `User_id`, `createdAt`, `chipedAt`, `status`, `montant`, `adresse`) VALUES
(9, 7, '2022-04-13 23:40:05', NULL, 'En attente', 505500, 'Adrese du client 2'),
(10, 8, '2022-04-14 00:19:05', NULL, 'En attente', 466500, 'Adresse du client 3'),
(11, 6, '2022-04-14 12:27:06', NULL, 'En attente', 2134000, 'Adresse du client A1');

-- --------------------------------------------------------

--
-- Table structure for table `Commande_product`
--

CREATE TABLE `Commande_product` (
  `id` int NOT NULL,
  `Commande_id` int DEFAULT NULL,
  `Product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `priceU` float DEFAULT NULL,
  `priceT` float DEFAULT NULL,
  `etat` enum('En cours','En attente','Livré','Validé','Décliné') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Commande_product`
--

INSERT INTO `Commande_product` (`id`, `Commande_id`, `Product_id`, `quantity`, `priceU`, `priceT`, `etat`) VALUES
(24, 9, 1, 1, 1500, 1500, 'Décliné'),
(25, 9, 4, 1, 200000, 200000, 'Décliné'),
(26, 9, 5, 1, 304000, 304000, 'Validé'),
(27, 10, 2, 1, 220000, 220000, 'Validé'),
(28, 10, 3, 1, 185000, 185000, 'Validé'),
(29, 10, 6, 1, 60000, 60000, 'Validé'),
(30, 10, 1, 1, 1500, 1500, 'Décliné'),
(31, 11, 1, 2, 1500, 3000, 'En attente'),
(32, 11, 3, 3, 185000, 555000, 'Validé'),
(33, 11, 5, 4, 304000, 1216000, 'Validé'),
(34, 11, 6, 6, 60000, 360000, 'En attente');

-- --------------------------------------------------------

--
-- Table structure for table `Panier`
--

CREATE TABLE `Panier` (
  `id` int NOT NULL,
  `User_id` int DEFAULT NULL,
  `Product_id` int DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `montant` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Panier`
--

INSERT INTO `Panier` (`id`, `User_id`, `Product_id`, `session_id`, `quantity`, `montant`) VALUES
(1, NULL, 1, NULL, 1, 1500),
(38, 6, 2, '127.0.0.1', 1, 220000);

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `id` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `Category_id` int DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `descr` text,
  `stock_actuel` int DEFAULT NULL,
  `stock_min` int DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `is_promo` int DEFAULT NULL,
  `promo` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `color` VARCHAR(255) NULL,
  `size` VARCHAR(255) NULL,
  `pointure` VARCHAR(255) NULL,
  `dimensions` VARCHAR(255) NULL,
  `User_id` int DEFAULT NULL,
  `ventes` int DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  CONSTRAINT FOREIGN KEY (`Category_id`) REFERENCES `Category`(`id`),
  CONSTRAINT FOREIGN KEY (`User_id`) REFERENCES `User`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`id`, `nom`, `price`, `Category_id`, `img`, `descr`, `stock_actuel`, `stock_min`, `date_expiration`, `is_promo`, `promo`, `updated_at`, `created_at`, `User_id`, `ventes`, `is_active`) VALUES
(1, 'Chargeur téléphone android', 1500, 3, '6m2o36mdMfQHmisBViJotJ4N633nKSChargeur-telephone-portable.png', 'fgdfghhhfhfjhjghjghgjg', -4, 5, '2022-04-22', 0, 0, '2022-04-10 23:43:13', '2022-04-10 23:43:13', 3, 19, 0),
(2, 'Samsung 4K Haut qualité', 220000, 4, 'wNQ3sZ993vdHM49BRc6UIuSAgvUCkk0003227_samsung-48-full-hd-flat-smart-tv-j5300-series-5_1000.jpeg', 'fgdfghhhfhfjhjghjghgjgsdfdgdgfgfgdfgdfgfdgd', 10, 5, '1970-01-01', 0, 0, '2022-04-10 23:50:16', '2022-04-10 23:50:16', 3, 1, 0),
(3, 'Téléphone Huawei p210', 185000, 3, '53RQ8tVjqTqiGdCMSMVA8Udy725gUa6529-oppo-cep-telefonu-a31-64-gb-100-20-00087-jpg-100-20-00087.jpg', 'sdfhjfgsdhfgsdhffggefeefetftfshfsghfgdfhgsfhdgfteftwtjtyjwtyjetyjtryjetrwyjtrwyjtwyetweytrwer', 4, 5, '1970-01-01', 0, 0, '2022-04-11 10:53:03', '2022-04-11 10:53:03', 4, 4, 0),
(4, 'Ecran PC Dell 4K led ultra fine', 200000, 2, 'EMQ613GRBTDh05Px2wPLJLzvA8dbP5ecran_27es.png', 'sdfhjfgsdhfgsdhffggefeefetftfshfsghfgdfhgsfhdgfteftwtjtyjwtyjetyjtryjetrwyjtrwyjtwyetweytrwer', 5, 5, '1970-01-01', 0, 0, '2022-04-11 10:56:37', '2022-04-11 10:56:37', 4, 1, 0),
(5, 'Caméra reflex 4k Ultra HD Canon', 304000, 2, 'Wea1xiuC6w1FBQyi025Ga7qeCqwUPgeos_range_tcm79-1266213.png', 'dshfgsdhfgsjhgfdhgfshgfsjhgshghdgjhsgfjhfgjhgfsjhgfsfs', 5, 5, '1970-01-01', 0, 0, '2022-04-11 11:01:37', '2022-04-11 11:01:37', 5, 4, 0),
(6, 'Woofer Stéreo ', 60000, 1, 'krOFu5G5lvShyXlGC2h6ekPEFZrAYyJamo_D600_LCR_g.jpg', 'dshfgsdhfgsjhgfdhgfshgfsjhgshghdgjhsgfjhfgjhgfsjhgfsfs', 3, 5, '1970-01-01', 0, 0, '2022-04-11 11:04:05', '2022-04-11 11:04:05', 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Product_comment`
--

CREATE TABLE `Product_comment` (
  `id` int NOT NULL,
  `comment` text,
  `rating` int DEFAULT NULL,
  `Product_id` int DEFAULT NULL,
  `User_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Product_comment`
--

INSERT INTO `Product_comment` (`id`, `comment`, `rating`, `Product_id`, `User_id`, `created_at`) VALUES
(1, 'Je donne 4', 4, 3, 7, '2022-04-19 02:46:43'),
(2, 'fsdfsdfsdfdfsdfsdsdfsdf 5', 5, 3, 7, '2022-04-19 02:47:02'),
(3, 'fsdfsdfsdfdfsdfsdsdfsdf 5', 5, 3, 7, '2022-04-19 02:50:19'),
(4, 'Je donne rien', 0, 3, 7, '2022-04-19 02:55:11'),
(5, 'je donne encore rien', 0, 3, 7, '2022-04-19 02:55:32'),
(6, 'Je donne 2', 2, 3, 7, '2022-04-19 02:55:56'),
(7, 'Je donne 2', 2, 3, 7, '2022-04-19 02:56:23'),
(8, 'je donne 3', 3, 3, 6, '2022-04-19 10:44:59'),
(9, 'Je donne 3', 3, 1, 6, '2022-04-19 10:46:00'),
(10, 'Je donne 4', 4, 1, 6, '2022-04-20 03:07:41'),
(11, 'Je donne 4', 4, 1, 6, '2022-04-20 03:07:58'),
(12, 'Je donne 5', 5, 1, 6, '2022-04-20 03:08:27'),
(13, 'Je donne 2', 2, 1, 6, '2022-04-20 03:08:54'),
(14, 'je donne 5', 5, 1, 6, '2022-04-20 03:28:17'),
(15, '4 ncore', 4, 1, 6, '2022-04-20 03:28:37'),
(16, '5 maintnant', 5, 1, 6, '2022-04-20 03:28:55'),
(17, 'Je revien & 4', 4, 1, 6, '2022-04-20 03:33:55'),
(18, 'Encore 3', 3, 1, 6, '2022-04-20 03:34:15'),
(19, 'gfgfgsdfgsf 3', 3, 3, 6, '2022-04-20 03:54:11'),
(20, '3nvdjhjhjhfjdfd', 3, 3, 6, '2022-04-20 03:54:27'),
(21, '3fgfdgdgdgdfgdfgdf', 3, 3, 6, '2022-04-20 03:54:48'),
(22, '5fgfgdfgdgd', 3, 3, 6, '2022-04-20 03:55:08'),
(23, '5fgdfgdfdgdfgdfgd', 5, 3, 6, '2022-04-20 03:55:26'),
(24, '4dhdghdgfsdhgfshdgfshfgsd', 4, 3, 6, '2022-04-20 03:55:48'),
(25, 'vdfdgdfgdgdgdgdgdd5 tele', 5, 4, 6, '2022-04-20 03:59:08'),
(26, 'Tele 4', 4, 4, 6, '2022-04-20 03:59:21'),
(27, 'Ecran tres beau', 4, 2, 7, '2022-04-20 14:58:22'),
(28, '4 pour ce woofer', 4, 6, 6, '2022-04-20 22:05:10'),
(29, '3 maintenant pour le woofer', 3, 6, 6, '2022-04-20 22:05:37'),
(30, '4 pour ce telephone', 4, 3, 6, '2022-04-20 22:06:37'),
(31, '1 telephone', 1, 3, 6, '2022-04-20 22:06:54'),
(32, '4 pour ctte cam', 4, 5, 6, '2022-04-20 22:07:55'),
(33, 'J\'ai taper une bonne note pour cette tv samsung 4K', 4, 2, 6, '2022-04-21 03:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `roles` enum('admin','boutiquier','client') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `nom`, `prenom`, `age`, `adresse`, `tel`, `roles`, `email`, `pwd`, `created_at`, `is_active`) VALUES
(1, 'Diallo', 'Amadou', NULL, 'Grand Mbao Etension', '783841245', 'admin', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 19:14:36', 2),
(2, 'Ba', 'Mariam', NULL, 'Keur Massar', '771051360', 'client', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 19:23:15', 2),
(3, 'B1', 'Boutiquier 1', NULL, 'Dakar Sandaga', '787777777', 'boutiquier', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 20:29:18', 2),
(4, 'B2', 'Boutiquier 2', NULL, 'Grand Mbao', '787777778', 'boutiquier', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 20:30:03', 2),
(5, 'B3', 'Boutiquier 3', NULL, 'Pikine', '787777779', 'boutiquier', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 20:31:44', 2),
(6, 'C1', 'Client 1', NULL, 'Adresse du client A1', '777777777', 'client', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 20:32:30', 2),
(7, 'C2', 'Client 2', NULL, 'Adrese du client 2', '777777778', 'client', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 20:33:19', 2),
(8, 'C3', 'Client 3', NULL, 'Adresse du client 3', '777777779', 'client', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 20:37:33', 2),
(9, 'C4', 'Client 4', NULL, 'Adresse du client 4', '777777770', 'client', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 20:38:33', 2),
(10, 'C5', 'Client 5', NULL, 'Adresse du client 5', '777777771', 'client', NULL, 'f34a737148135a172e2ad45f05e346a4dcb7c6c5', '2022-04-10 20:39:33', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `Commande_product`
--
ALTER TABLE `Commande_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Commande_id` (`Commande_id`),
  ADD KEY `Product_id` (`Product_id`);

--
-- Indexes for table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Category_id` (`Category_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `Product_comment`
--
ALTER TABLE `Product_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product_id` (`Product_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel` (`tel`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Commande_product`
--
ALTER TABLE `Commande_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Product_comment`
--
ALTER TABLE `Product_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Commande_product`
--
ALTER TABLE `Commande_product`
  ADD CONSTRAINT `Commande_product_ibfk_1` FOREIGN KEY (`Commande_id`) REFERENCES `Commande` (`id`),
  ADD CONSTRAINT `Commande_product_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `Product` (`id`);

--
-- Constraints for table `Panier`
--
ALTER TABLE `Panier`
  ADD CONSTRAINT `Panier_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `Category` (`id`),
  ADD CONSTRAINT `Product_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Product_comment`
--
ALTER TABLE `Product_comment`
  ADD CONSTRAINT `Product_comment_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `Product` (`id`),
  ADD CONSTRAINT `Product_comment_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
