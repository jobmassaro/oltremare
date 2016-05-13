CREATE DATABASE  IF NOT EXISTS `oltremare` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `oltremare`;
-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: oltremare
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cv_membership_items`
--

DROP TABLE IF EXISTS `cv_membership_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_membership_items` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `plan_id` int(15) NOT NULL,
  `order_id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_membership_items`
--

LOCK TABLES `cv_membership_items` WRITE;
/*!40000 ALTER TABLE `cv_membership_items` DISABLE KEYS */;
INSERT INTO `cv_membership_items` VALUES (2,1,1,'1 GB Bandwidth'),(3,1,4,'Free Support!'),(4,1,2,'500MB Disc Space'),(5,1,3,'5 Users'),(6,1,5,'Free Setup'),(7,3,1,'5GB Bandwidth'),(8,3,2,'1GB Data Storage'),(9,3,3,'Another Cool Feature'),(10,3,4,'Free Setup!'),(11,3,5,'Awesome Support'),(12,6,1,'10 GB Bandwidth'),(13,6,2,'10 GB Data Storage'),(14,6,3,'10X Faster Speeds!'),(15,6,4,'Advanced Stuff'),(16,6,5,'Free Setup'),(17,5,1,'Unlimited Bandwidth'),(18,5,2,'Unlimited Storage'),(19,5,3,'Unlimited Everything!'),(20,5,4,'Super Fast 100X Faster'),(21,5,5,'Free Setup');
/*!40000 ALTER TABLE `cv_membership_items` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-06 17:06:29
