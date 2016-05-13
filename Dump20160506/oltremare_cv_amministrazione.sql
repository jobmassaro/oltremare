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
-- Table structure for table `cv_amministrazione`
--

DROP TABLE IF EXISTS `cv_amministrazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_amministrazione` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_utente` int(3) DEFAULT NULL,
  `banca` varchar(200) DEFAULT NULL,
  `abi` varchar(100) DEFAULT NULL,
  `cab` varchar(100) DEFAULT NULL,
  `cin` varchar(15) DEFAULT NULL,
  `cc` varchar(100) DEFAULT NULL,
  `iban` varchar(50) DEFAULT NULL,
  `carta_credito` varchar(20) DEFAULT NULL,
  `data_scadenza` varchar(15) DEFAULT NULL,
  `ccv` varchar(10) DEFAULT NULL,
  `servizio` varchar(100) DEFAULT NULL,
  `data_acquisto` varchar(100) DEFAULT NULL,
  `anticipo` varchar(10) DEFAULT NULL,
  `saldo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_amministrazione`
--

LOCK TABLES `cv_amministrazione` WRITE;
/*!40000 ALTER TABLE `cv_amministrazione` DISABLE KEYS */;
INSERT INTO `cv_amministrazione` VALUES (1,50005,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cv_amministrazione` ENABLE KEYS */;
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
