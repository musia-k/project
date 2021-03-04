-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: db
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Skoda'),(2,'Hyundai'),(3,'Suzuki'),(4,'Citroen'),(5,'Toyota'),(6,'Kia'),(7,'Audi'),(8,'Ford'),(9,'Volkswagen'),(10,'Mitsubishi'),(11,'Chery'),(12,'Nissan'),(13,'Mini'),(14,'Honda');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=5461;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Econom'),(2,'SUV'),(3,'Convertible'),(4,'Business');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `dt_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `details`
--

DROP TABLE IF EXISTS `details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `details` (
  `order_id` int NOT NULL,
  `good_id` int NOT NULL,
  `good` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `count` int NOT NULL,
  PRIMARY KEY (`order_id`,`good_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=3276;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `details`
--

LOCK TABLES `details` WRITE;
/*!40000 ALTER TABLE `details` DISABLE KEYS */;
INSERT INTO `details` VALUES (7,1,'Skoda Fabia',18,1),(8,1,'Skoda%20Fabia',18,1),(9,1,'Skoda Fabia',18,1);
/*!40000 ALTER TABLE `details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goods` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `good` varchar(255) NOT NULL,
  `category_id` int unsigned NOT NULL,
  `brand_id` int unsigned NOT NULL,
  `price` int unsigned NOT NULL,
  `rating` int unsigned NOT NULL DEFAULT '0',
  `photo` varchar(255) NOT NULL,
  `feature` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_goods_brands_id` (`brand_id`),
  KEY `FK_goods_categories_id` (`category_id`),
  CONSTRAINT `FK_goods_brands_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_goods_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1170;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'Skoda Fabia',1,1,18,0,'skoda-fabia.jpg','Picture1.png'),(2,'Hyundai Accent',1,2,22,0,'hyundai-accent.jpg','Picture2.png'),(3,'Suzuki Vitara',2,3,18,0,'grand-vitara.jpg','Picture3.png'),(4,'Citroen C-Elysee',1,4,24,0,'citroen-elyssee.jpg','Picture4.png'),(5,'Hyundai Elantra 2019',1,2,24,0,'2019-hyundai-elantra.jpg','Picture5.png'),(6,'Toyota RAV 4',2,5,57,0,'Toyota RAV 4.jpg','Picture6.png'),(7,'Kia Sportage',2,6,89,0,'2016-kia-sportage.jpeg','Picture7.png'),(8,'Audi TT Cabrio',3,7,90,0,'Audi TT Cabrio.jpg','Picture8.png'),(9,'Hyundai Solaris',1,2,27,0,'hyundai_solaris_1.jpg','Picture9.png'),(10,'Ford Fiesta Sedan',1,8,27,0,'Ford Fiesta Sedan.jpg','Picture10.png'),(11,'Volkswagen Polo',1,9,29,0,'Volkswagen Polo.jpg','Picture11.png'),(12,'Toyota Corolla E17',1,5,35,0,'toyota corolla 2019.jpg','Picture12.png'),(13,'Hyundai Tucson',1,2,57,0,'Hyundai Tucson.jpg','Picture13.png'),(14,'Mitsubishi Outlander',2,10,57,0,'Mitsubishi Outlander.jpg','Picture14.png'),(15,'Toyota Camry 70',4,5,60,0,'Toyota Camry 70.jpg','Picture15.png'),(16,'Chery Tiggo 2',2,11,31,0,'Chery Tiggo 2.jpg','Picture16.png'),(17,'Nissan Rogue',2,12,31,0,'Nissan Rogue.jpg','Picture17.png'),(18,'Mini Countryman',2,13,57,0,'Mini Countryman.jpg','Picture18.png'),(19,'Honda CRV',2,14,57,0,'Honda CRV.jpg','Picture19.png'),(20,'Volkswagen Passat 8',4,9,60,0,'Volkswagen Passat 8.jpg','Picture20.png');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods_props`
--

DROP TABLE IF EXISTS `goods_props`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goods_props` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int unsigned NOT NULL,
  `prop` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=1170;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods_props`
--

LOCK TABLES `goods_props` WRITE;
/*!40000 ALTER TABLE `goods_props` DISABLE KEYS */;
INSERT INTO `goods_props` VALUES (1,1,' ','1.4 / Gasoline / Mechanic'),(2,2,' ','1.4 / Gasoline / Auto'),(3,3,' ','1.4 / Gasoline / Auto'),(4,4,' ','1.6 / Gasoline / Auto'),(5,5,' ','1.6 / Gasoline / Auto');
/*!40000 ALTER TABLE `goods_props` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int unsigned NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `dt_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AVG_ROW_LENGTH=2730;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webadmin`
--

DROP TABLE IF EXISTS `webadmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `webadmin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webadmin`
--

LOCK TABLES `webadmin` WRITE;
/*!40000 ALTER TABLE `webadmin` DISABLE KEYS */;
INSERT INTO `webadmin` VALUES (1,'rama','p','2021-02-11 10:54:45'),(2,'maryna','p','2021-02-12 17:22:18');
/*!40000 ALTER TABLE `webadmin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-03 10:25:11
