-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Category`
--

DROP TABLE IF EXISTS `Category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `descriptions` text,
  `icon` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Category`
--

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;
INSERT INTO `Category` VALUES (1,'Alimentaire','Produit consomable, Riz, Boisson, Café, Sucre, Fruit etc...','<i class=\"bi bi-egg-fried\"></i>'),(2,'Ordinateur &amp; Accessoire','Ordinateur portable, Ordinateur de bureu, Composant éléctronique, Clé USB, Clavier, Souris etc...','<i class=\"bi bi-laptop\"></i>'),(3,'Téléphone &amp; Accessoire','Téléphone portable, Téléphone fixe, Accéssoire...','<i class=\"bi bi-phone\"></i>'),(4,'Electro Ménager','Climatiseurs, Frigo, Micro-onde etc...','<i class=\"bi bi-building\"></i>'),(5,'Cosmétique','Créme pour la peau, Parfum etc...','<i class=\"bi bi-heart\"></i>'),(6,'Mode','Mode vetements chaussure et accessoire...','<i class=\"bi bi-heart\"></i>');
/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Commande`
--

DROP TABLE IF EXISTS `Commande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `User_id` int DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `chipedAt` datetime DEFAULT NULL,
  `status` enum('En cours','En attente','Livré') DEFAULT NULL,
  `montant` float DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `User_id` (`User_id`),
  CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Commande`
--

LOCK TABLES `Commande` WRITE;
/*!40000 ALTER TABLE `Commande` DISABLE KEYS */;
INSERT INTO `Commande` VALUES (9,7,'2022-04-13 23:40:05',NULL,'En attente',505500,'Adrese du client 2'),(10,8,'2022-04-14 00:19:05',NULL,'En attente',466500,'Adresse du client 3'),(11,6,'2022-04-14 12:27:06',NULL,'En attente',2134000,'Adresse du client A1'),(12,6,'2022-05-03 15:27:27',NULL,'En attente',280000,'Adresse du client A1');
/*!40000 ALTER TABLE `Commande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Commande_product`
--

DROP TABLE IF EXISTS `Commande_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Commande_product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Commande_id` int DEFAULT NULL,
  `Product_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `priceU` float DEFAULT NULL,
  `priceT` float DEFAULT NULL,
  `etat` enum('En cours','En attente','Livré','Validé','Décliné') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Commande_id` (`Commande_id`),
  KEY `Product_id` (`Product_id`),
  CONSTRAINT `Commande_product_ibfk_1` FOREIGN KEY (`Commande_id`) REFERENCES `Commande` (`id`),
  CONSTRAINT `Commande_product_ibfk_2` FOREIGN KEY (`Product_id`) REFERENCES `Product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Commande_product`
--

LOCK TABLES `Commande_product` WRITE;
/*!40000 ALTER TABLE `Commande_product` DISABLE KEYS */;
INSERT INTO `Commande_product` VALUES (24,9,1,1,1500,1500,'Décliné'),(25,9,4,1,200000,200000,'Validé'),(26,9,5,1,304000,304000,'Validé'),(27,10,2,1,220000,220000,'Décliné'),(28,10,3,1,185000,185000,'Validé'),(29,10,6,1,60000,60000,'Validé'),(30,10,1,1,1500,1500,'Décliné'),(31,11,1,2,1500,3000,'En attente'),(32,11,3,3,185000,555000,'Validé'),(33,11,5,4,304000,1216000,'Validé'),(34,11,6,6,60000,360000,'En attente'),(35,12,2,1,220000,220000,'En attente'),(36,12,6,1,60000,60000,'En attente');
/*!40000 ALTER TABLE `Commande_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Panier`
--

DROP TABLE IF EXISTS `Panier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `User_id` int DEFAULT NULL,
  `Product_id` int DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `detaille_options` text,
  `montant` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `User_id` (`User_id`),
  CONSTRAINT `Panier_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Panier`
--

LOCK TABLES `Panier` WRITE;
/*!40000 ALTER TABLE `Panier` DISABLE KEYS */;
/*!40000 ALTER TABLE `Panier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product`
--

DROP TABLE IF EXISTS `Product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `price_by` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `price_sell` float DEFAULT NULL,
  `Category_id` int DEFAULT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `descr` text,
  `stock_actuel` int DEFAULT NULL,
  `stock_min` int DEFAULT NULL,
  `date_expiration` date DEFAULT NULL,
  `is_promo` int DEFAULT NULL,
  `promo` int DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `pointure` varchar(255) DEFAULT NULL,
  `dimensions` varchar(255) DEFAULT NULL,
  `User_id` int DEFAULT NULL,
  `ventes` int DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Category_id` (`Category_id`),
  KEY `User_id` (`User_id`),
  CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `Category` (`id`),
  CONSTRAINT `Product_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product`
--

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;
INSERT INTO `Product` VALUES (1,'Chargeur téléphone android',0,1500,0,3,'6m2o36mdMfQHmisBViJotJ4N633nKSChargeur-telephone-portable.png','fgdfghhhfhfjhjghjghgjg',-4,5,'2022-04-22',0,0,'2022-04-10 23:43:13','2022-04-10 23:43:13',NULL,NULL,NULL,NULL,3,19,0),(2,'Samsung 4K Haut qualité',0,220000,0,4,'wNQ3sZ993vdHM49BRc6UIuSAgvUCkk0003227_samsung-48-full-hd-flat-smart-tv-j5300-series-5_1000.jpeg','fgdfghhhfhfjhjghjghgjgsdfdgdgfgfgdfgdfgfdgd',10,5,'1970-01-01',0,0,'2022-04-10 23:50:16','2022-04-10 23:50:16',NULL,NULL,NULL,NULL,3,1,0),(3,'Téléphone Huawei p210',0,185000,148000,3,'cKIjlbrogOVGU7n53RQ8tVjqTqiGdCMSMVA8Udy725gUa6529-oppo-cep-telefonu-a31-64-gb-100-20-00087-jpg-100-20-00087.jpg','sdfhjfgsdhfgsdhffggefeefetftfshfsghfgdfhgsfhdgfteftwtjtyjwtyjetyjtryjetrwyjtrwyjtwyetweytrwer',4,5,'1970-01-01',0,20,'2022-05-05 11:07:53','2022-04-11 10:53:03','auccun','auccun','auccun','auccun',4,4,0),(4,'Ecran PC Dell 4K led ultra fine',0,200000,0,2,'EMQ613GRBTDh05Px2wPLJLzvA8dbP5ecran_27es.png','sdfhjfgsdhfgsdhffggefeefetftfshfsghfgdfhgsfhdgfteftwtjtyjwtyjetyjtryjetrwyjtrwyjtwyetweytrwer',4,5,'1970-01-01',0,0,'2022-04-11 10:56:37','2022-04-11 10:56:37',NULL,NULL,NULL,NULL,4,2,0),(5,'Caméra reflex 4k Ultra HD Canon',0,304000,0,2,'Wea1xiuC6w1FBQyi025Ga7qeCqwUPgeos_range_tcm79-1266213.png','dshfgsdhfgsjhgfdhgfshgfsjhgshghdgjhsgfjhfgjhgfsjhgfsfs',5,5,'1970-01-01',0,0,'2022-04-11 11:01:37','2022-04-11 11:01:37',NULL,NULL,NULL,NULL,5,4,0),(6,'Woofer Stéreo ',0,60000,0,1,'krOFu5G5lvShyXlGC2h6ekPEFZrAYyJamo_D600_LCR_g.jpg','dshfgsdhfgsjhgfdhgfshgfsjhgshghdgjhsgfjhfgjhgfsjhgfsfs',3,5,'1970-01-01',0,0,'2022-04-11 11:04:05','2022-04-11 11:04:05',NULL,NULL,NULL,NULL,5,1,0),(7,'Vetement pour homme',0,12500,0,5,'19PVYOwkrGGWa3D0000_Calque-7-Boubou-Élégant-Chemise-Longue-Pantalon-Pour-Homme-Motif-Africain-Noir-et-Beige-TSU00186.jpg','dfhsdghfdshfsdgfgsdhsfghsg vetement 03',15,5,'1970-01-01',0,0,'2022-05-03 20:20:12','2022-05-03 20:20:12','|rouge|bleu|violet|gris|argent|or|rose','|xs|m|xl|xxxl','aucun','auccun',3,0,0),(8,'Vetement traditionnel africain',0,20000,0,6,'QUhvu3yQrF9NGsg0005_Calque-2.jpg','vetement traditionnelle 04 b2',15,5,'1970-01-01',0,0,'2022-05-04 20:08:28','2022-05-04 20:08:28','|rouge|jaune|turquoise','|s|m|xxl','auccun','auccun',4,0,0),(9,'Chaussure ferme trés origineaux',0,15000,13350,6,'0GcUwyRPLjqlxvc5a41ddf7bd5f504c2fab519.desktop-gallery-large.jpg','Chaussure ferme 04 b2',20,5,'1970-01-01',0,11,'2022-05-04 22:50:12','2022-05-04 20:13:33','auccun','auccun','auccun','auccun',4,0,0),(10,'Chaussure Godzass top pour courrire',15000,20000,20000,6,'IuOjYnr4BQEU4OM17133abfcf5f59d770927de.desktop-gallery-large.jpg','Chaussure Godzass top pour courrire jhgfgsdhfgsdhfgsdhfgdhg 04 B2',11,5,'1970-01-01',NULL,0,'2022-05-04 22:46:32','2022-05-04 22:46:32','|rouge|or|orange','auccun','auccun','auccun',4,0,0),(11,'Chaussure chic originale',13000,18000,18000,6,'BdPtRg1cEwp7tf0a98nsq007t.jpg','jdfhjhjsdfhdjfhdjhdsjfhsjhsjfhjfhsdjfsfhj orinale 04 b3',20,5,'1970-01-01',NULL,0,'2022-05-04 23:07:27','2022-05-04 22:56:47','|vert|turquoise|violet|noir','auccun','|36|39|42|54|44','auccun',5,0,0),(12,'Table de bureau',42000,55000,55000,4,'eL5mLxRKvMi4282index.jpeg','La table sjkdhjfhsjfhsjfhsjfsfhsjdfhsjdfhsdjfsdjhsjdh 04 b3',7,2,'1970-01-01',NULL,0,'2022-05-04 23:20:18','2022-05-04 23:15:16','|rouge|noir|gris','auccun','auccun','Longeur: 1 m, Largeur: 1 m, Hauteur: 90 cm',5,0,0);
/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Product_comment`
--

DROP TABLE IF EXISTS `Product_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Product_comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comment` text,
  `rating` int DEFAULT NULL,
  `Product_id` int DEFAULT NULL,
  `User_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Product_id` (`Product_id`),
  KEY `User_id` (`User_id`),
  CONSTRAINT `Product_comment_ibfk_1` FOREIGN KEY (`Product_id`) REFERENCES `Product` (`id`),
  CONSTRAINT `Product_comment_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Product_comment`
--

LOCK TABLES `Product_comment` WRITE;
/*!40000 ALTER TABLE `Product_comment` DISABLE KEYS */;
INSERT INTO `Product_comment` VALUES (1,'Je donne 4',4,3,7,'2022-04-19 02:46:43',NULL),(2,'fsdfsdfsdfdfsdfsdsdfsdf 5',5,3,7,'2022-04-19 02:47:02',NULL),(3,'fsdfsdfsdfdfsdfsdsdfsdf 5',5,3,7,'2022-04-19 02:50:19',NULL),(4,'Je donne rien',0,3,7,'2022-04-19 02:55:11',NULL),(5,'je donne encore rien',0,3,7,'2022-04-19 02:55:32',NULL),(6,'Je donne 2',2,3,7,'2022-04-19 02:55:56',NULL),(7,'Je donne 2',2,3,7,'2022-04-19 02:56:23',NULL),(8,'je donne 3',3,3,6,'2022-04-19 10:44:59',NULL),(9,'Je donne 3',3,1,6,'2022-04-19 10:46:00',NULL),(10,'Je donne 4',4,1,6,'2022-04-20 03:07:41',NULL),(11,'Je donne 4',4,1,6,'2022-04-20 03:07:58',NULL),(12,'Je donne 5',5,1,6,'2022-04-20 03:08:27',NULL),(13,'Je donne 2',2,1,6,'2022-04-20 03:08:54',NULL),(14,'je donne 5',5,1,6,'2022-04-20 03:28:17',NULL),(15,'4 ncore',4,1,6,'2022-04-20 03:28:37',NULL),(16,'5 maintnant',5,1,6,'2022-04-20 03:28:55',NULL),(17,'Je revien & 4',4,1,6,'2022-04-20 03:33:55',NULL),(18,'Encore 3',3,1,6,'2022-04-20 03:34:15',NULL),(19,'gfgfgsdfgsf 3',3,3,6,'2022-04-20 03:54:11',NULL),(20,'3nvdjhjhjhfjdfd',3,3,6,'2022-04-20 03:54:27',NULL),(21,'3fgfdgdgdgdfgdfgdf',3,3,6,'2022-04-20 03:54:48',NULL),(22,'5fgfgdfgdgd',3,3,6,'2022-04-20 03:55:08',NULL),(23,'5fgdfgdfdgdfgdfgd',5,3,6,'2022-04-20 03:55:26',NULL),(24,'4dhdghdgfsdhgfshdgfshfgsd',4,3,6,'2022-04-20 03:55:48',NULL),(25,'vdfdgdfgdgdgdgdgdd5 tele',5,4,6,'2022-04-20 03:59:08',NULL),(26,'Tele 4',4,4,6,'2022-04-20 03:59:21',NULL),(27,'Ecran tres beau',4,2,7,'2022-04-20 14:58:22',NULL),(28,'4 pour ce woofer',4,6,6,'2022-04-20 22:05:10',NULL),(29,'3 maintenant pour le woofer',3,6,6,'2022-04-20 22:05:37',NULL),(30,'4 pour ce telephone',4,3,6,'2022-04-20 22:06:37',NULL),(31,'1 telephone',1,3,6,'2022-04-20 22:06:54',NULL),(32,'4 pour ctte cam',4,5,6,'2022-04-20 22:07:55',NULL),(33,'J\'ai taper une bonne note pour cette tv samsung 4K',4,2,6,'2022-04-21 03:06:19',NULL),(34,'une note de 3 cv ?',3,2,6,'2022-05-03 15:22:45',NULL);
/*!40000 ALTER TABLE `Product_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `User` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `roles` enum('admin','boutiquier','client') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tel` (`tel`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'Diallo','Amadou',NULL,'Grand Mbao Etension','783841245','admin',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 19:14:36',2),(2,'Ba','Mariam',NULL,'Keur Massar','771051360','client',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 19:23:15',2),(3,'B1','Boutiquier 1',NULL,'Dakar Sandaga','787777777','boutiquier',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 20:29:18',2),(4,'B2','Boutiquier 2',NULL,'Grand Mbao','787777778','boutiquier',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 20:30:03',2),(5,'B3','Boutiquier 3',NULL,'Pikine','787777779','boutiquier',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 20:31:44',2),(6,'C1','Client 1',NULL,'Adresse du client A1','777777777','client',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 20:32:30',2),(7,'C2','Client 2',NULL,'Adrese du client 2','777777778','client',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 20:33:19',2),(8,'C3','Client 3',NULL,'Adresse du client 3','777777779','client',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 20:37:33',2),(9,'C4','Client 4',NULL,'Adresse du client 4','777777770','client',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 20:38:33',2),(10,'C5','Client 5',NULL,'Adresse du client 5','777777771','client',NULL,'f34a737148135a172e2ad45f05e346a4dcb7c6c5','2022-04-10 20:39:33',1);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-07 20:31:47
