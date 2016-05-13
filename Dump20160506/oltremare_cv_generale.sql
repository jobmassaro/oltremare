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
-- Table structure for table `cv_generale`
--

DROP TABLE IF EXISTS `cv_generale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_generale` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_utente` int(3) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `data_nascita` varchar(15) DEFAULT NULL,
  `via` varchar(200) DEFAULT NULL,
  `civico` varchar(15) DEFAULT NULL,
  `cap` varchar(15) DEFAULT NULL,
  `comune` varchar(200) DEFAULT NULL,
  `provincia` varchar(200) DEFAULT NULL,
  `cod_fiscale` varchar(50) DEFAULT NULL,
  `cod_piva` varchar(50) DEFAULT NULL,
  `sesso` varchar(50) DEFAULT NULL,
  `sposato` varchar(50) DEFAULT NULL,
  `figli` varchar(50) DEFAULT NULL,
  `professione` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8194 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_generale`
--

LOCK TABLES `cv_generale` WRITE;
/*!40000 ALTER TABLE `cv_generale` DISABLE KEYS */;
INSERT INTO `cv_generale` VALUES (8192,50005,'sasa','sasa','jobmassaro','05/10/2016','via bbabbba','11','154545','milano','Milano','yuiyewqiuyqiwuyeqwiuyeqwiueyq','eweqweqqweqweqeqeqwe','uomo','si','si','barista'),(8193,50000,'alex','ruffini','alex',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cv_generale` ENABLE KEYS */;
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
