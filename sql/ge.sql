DROP DATABASE IF EXISTS `gestionEvents2`;
-- C(CREATE) Créer les bases de donnée et ces tables
CREATE DATABASE IF NOT EXISTS `gestionEvents2`;
USE `gestionEvents2`;

-- Creation de la table user
CREATE TABLE `user`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `nom` VARCHAR(100),
    `prenom` VARCHAR(100),
    `age` INT(2),
    `adresse` VARCHAR(255),
    `tel` VARCHAR(50) UNIQUE,
    `email` VARCHAR(50) UNIQUE,
    `role` JSON NULL,
    `pwd` VARCHAR(255),
    `created_at` DATETIME
);

-- Creation de la table category
CREATE TABLE `category`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `nom` VARCHAR(255),
    `description` TEXT
);

-- Creation de la table product
CREATE TABLE `product`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `nom` VARCHAR(255),
    `price` FLOAT,
    `category_id` INT,
    `img` VARCHAR(100),
    `description` TEXT,
    `stock_actuel` INT(11),
    `stock_min` INT(11),
    `date_expiration` DATE,
    `lot_numero` INT(11),
    `code` INT(11) UNIQUE,
    `updated_at` DATETIME,
    `created_at` DATETIME,
    `user_id` INT
);

-- insertion d'un utilisateur dans user
INSERT INTO `user` VALUE(
    null,
    "Diallo",
    "Amadou",
    "22",
    "Grand-Mabo",
    "783841245",
    "am@gmail.com",
    null,
    "bente",
    CURRENT_TIMESTAMP
);

-- insertion d'un utilisateur dans user
INSERT INTO `user` VALUE(
    null,
    "Balde",
    "Mamadou",
    "20",
    "Peti-Mabo",
    "776696347",
    "madou@gmail.com",
    null,
    "baillo",
    CURRENT_TIMESTAMP
);

-- Insertion des catégories dans category
INSERT INTO `category` VALUE(
    null,
    "Alimentaire",
    "Produit consomable"
);

-- Insertion des catégories dans category
INSERT INTO `category` VALUE(
    null,
    "Bureautique",
    "Fourniture scolaire et bureautique"
);

-- Insertion des catégories dans category
INSERT INTO `category` VALUE(
    null,
    "Electronique",
    "Composant et materiel electronique"
);

-- Insertion d'un produit dans product
INSERT INTO `product` VALUE(
    null,
    "Bombon",
    "100",
    "1",
    "https://via.placeholder.com/150",
    "Bombon sucre au chocolat",
    "20",
    "5",
    CURRENT_TIMESTAMP,
    "3",
    "025",
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    "2"
);

-- Insertion d'un produit dans product
INSERT INTO `product` VALUE(
    null,
    "Stylo",
    "1500",
    "2",
    "https://via.placeholder.com/150",
    "Un stylo pas comme les autres",
    "40",
    "10",
    CURRENT_TIMESTAMP,
    "5",
    "123",
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    "1"
);

-- Insertion d'un produit dans product
INSERT INTO `product` VALUE(
    null,
    "Rame de 8Go",
    "40000",
    "3",
    "https://via.placeholder.com/150",
    "Pour rendre votre machine plus rapide",
    "10",
    "4",
    CURRENT_TIMESTAMP,
    "6",
    "221",
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    "2"
);

-- Insertion d'un produit dans product
INSERT INTO `product` VALUE(
    null,
    "Huil d'arachide",
    "5000",
    "1",
    "https://via.placeholder.com/150",
    "Huil sans colesterole",
    "24",
    "8",
    CURRENT_TIMESTAMP,
    "7",
    "210",
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    "1"
);

-- Insertion d'un produit dans product
INSERT INTO `product` VALUE(
    null,
    "Riz parfumé",
    "16000",
    "1",
    "https://via.placeholder.com/150",
    "Riz de haut qualité",
    "12",
    "6",
    CURRENT_TIMESTAMP,
    "9",
    "215",
    CURRENT_TIMESTAMP,
    CURRENT_TIMESTAMP,
    "1"
);

-- R (READ)::SELLECTIONNER ET LIRE DES DONNEE
SELECT * FROM `user`;
SELECT `nom`, `prenom` FROM `user`;
-- R(READ SOMME DATA)
SELECT * FROM `user` WHERE `id`=1;
SELECT * FROM `user` WHERE `tel`='783841245';
SELECT * FROM `user` WHERE `prenom`='Amadou' AND `nom`='Diallo';
SELECT * FROM `user` WHERE `email`='am@gmail.com' AND `password`='bente';
SELECT * FROM `user` WHERE `prenom` LIKE 'Amadou' OR `prenom` LIKE 'Mamadou';

-- U(UPDATE)
UPDATE `user` SET `nom` = 'Balde' WHERE "id"=1;
UPDATE 'user' SET `nom` = `Diouf`, `prenom` = `Modou` WHERE `id` = 1;
