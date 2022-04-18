-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: dmitrii_db
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `currency_rates`
--

DROP TABLE IF EXISTS `currency_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currency_rates` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `currency_code` varchar(20) NOT NULL,
  `exchange_rate` decimal(10,4) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency_rates`
--

LOCK TABLES `currency_rates` WRITE;
/*!40000 ALTER TABLE `currency_rates` DISABLE KEYS */;
INSERT INTO `currency_rates` VALUES (1,'EUR',1.0000),(2,'USD',1.0969);
/*!40000 ALTER TABLE `currency_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturer`
--

DROP TABLE IF EXISTS `manufacturer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manufacturer` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturer`
--

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;
INSERT INTO `manufacturer` VALUES (1,'Crucial'),(2,'Lenovo'),(3,'Hewlett-Packard'),(4,'Seagate'),(5,'ASUS'),(6,'IBM'),(7,'Nothing Inc.');
/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `manufacturer_code` int(11) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `manufacturer_code` (`manufacturer_code`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`manufacturer_code`) REFERENCES `manufacturer` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Notebook',1094.62,1),(2,'HDD',221.51,1),(3,'DDR5',126.88,1),(4,'Desktop',864.52,1),(5,'Monitor',559.14,1),(6,'Mouse',7.53,1),(7,'Keyboard',58.06,1),(8,'SVGA_card',549.46,1),(9,'Cable_HDMI',10.75,1),(10,'xDSL_Modem',32.26,1),(11,'MO_Disc',17.20,1),(12,'Notebook',1090.32,2),(13,'HDD',224.73,2),(14,'DDR5',117.20,2),(15,'Desktop',864.52,2),(16,'Monitor',551.61,2),(17,'Mouse',7.53,2),(18,'Keyboard',62.37,2),(19,'SVGA_card',540.86,2),(20,'Cable_HDMI',23.66,2),(21,'xDSL_Modem',23.66,2),(22,'MO_Disc',20.43,2),(23,'Notebook',1089.25,3),(24,'HDD',234.41,3),(25,'DDR5',117.20,3),(26,'Desktop',867.74,3),(27,'Monitor',554.84,3),(28,'Mouse',16.13,3),(29,'Keyboard',56.99,3),(30,'SVGA_card',545.16,3),(31,'Cable_HDMI',22.58,3),(32,'xDSL_Modem',22.58,3),(33,'MO_Disc',20.43,3),(34,'HDD',226.88,4),(35,'MO_Disc',16.13,4),(36,'Notebook',1090.32,5),(37,'HDD',227.96,5),(38,'DDR5',124.73,5),(39,'Desktop',867.74,5),(40,'Monitor',552.69,5),(41,'Mouse',21.51,5),(42,'Keyboard',61.29,5),(43,'SVGA_card',556.99,5),(44,'Cable_HDMI',15.05,5),(45,'xDSL_Modem',30.11,5),(46,'MO_Disc',11.83,5),(47,'Notebook',1078.49,6),(48,'HDD',223.66,6),(49,'DDR5',127.96,6),(50,'Desktop',862.37,6),(51,'Monitor',555.91,6),(52,'Mouse',10.75,6),(53,'Keyboard',63.44,6),(54,'SVGA_card',555.91,6),(55,'Cable_HDMI',16.13,6),(56,'xDSL_Modem',12.90,6),(57,'MO_Disc',16.13,6);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-18  0:52:25
