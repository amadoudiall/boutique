DROP DATABASE IF EXISTS `ecommerce`;
-- C(CREATE) Créer les bases de donnée et ces tables
CREATE DATABASE IF NOT EXISTS `ecommerce`;
USE `ecommerce`;

-- Creation de la table User
CREATE TABLE `User`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `nom` VARCHAR(100),
    `prenom` VARCHAR(100),
    `age` INT(2),
    `adresse` VARCHAR(255),
    `tel` VARCHAR(50) UNIQUE,
    `roles` ENUM('admin', 'boutiquier', 'client'),
    `email` VARCHAR(50) UNIQUE,
    `pwd` VARCHAR(255),
    `created_at` DATETIME,
    `is_active` INT
);

-- Creation de la table category
CREATE TABLE `Category`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `category` VARCHAR(255),
    `descriptions` TEXT
);

-- Creation de la table product
CREATE TABLE `Product`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `nom` VARCHAR(255),
    `price` FLOAT,
    `Category_id` INT,
    `img` VARCHAR(100),
    `descr` TEXT,
    `stock_actuel` INT(11),
    `stock_min` INT(11),
    `date_expiration` DATE NULL,
    `is_promo` INT(11) NULL,
    `promo` INT(11) NULL,
    `updated_at` DATETIME,
    `created_at` DATETIME,
    `User_id` INT(11),
    CONSTRAINT FOREIGN KEY (`Category_id`) REFERENCES `Category`(`id`),
    CONSTRAINT FOREIGN KEY (`User_id`) REFERENCES `User`(`id`)
);

-- Panier product
CREATE TABLE `Panier`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `User_id` INT,
    `Product_id` INT,
    `session_id` VARCHAR(100),
    `quantity` INT,
    `montant` FLOAT,
    CONSTRAINT FOREIGN KEY (`User_id`) REFERENCES `User`(`id`)
);

CREATE TABLE `Commande`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `User_id` INT,
    `createdAt` DATE,
    CONSTRAINT FOREIGN KEY (`User_id`) REFERENCES `User`(`id`)
);

CREATE TABLE `Commande_product`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `Commande_id` INT,
    `Product_id`INT,
    `quantity` INT,
    `montant` FLOAT,
    CONSTRAINT FOREIGN KEY (`Commande_id`) REFERENCES `Commande`(`id`),
    CONSTRAINT FOREIGN KEY (`Product_id`) REFERENCES `Product`(`id`)
);