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
-- Table structure for table `cv_formazione`
--

DROP TABLE IF EXISTS `cv_formazione`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_formazione` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome_corso` varchar(250) DEFAULT NULL,
  `attivo` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_formazione`
--

LOCK TABLES `cv_formazione` WRITE;
/*!40000 ALTER TABLE `cv_formazione` DISABLE KEYS */;
INSERT INTO `cv_formazione` VALUES (1,'Patente Entro 12 Miglia','True'),(2,'Patente Senza Limiti','True'),(3,'Estensione Patente Senza Limiti','True'),(4,'Locazione Mini Cabinato','True'),(5,'Locazione Grande Cabinato','True'),(6,'Crociera (vacanza)','True'),(7,'Campus','True'),(8,'Formazione Aziendale in barca a vela','True'),(9,'Corso Marineria','False'),(10,'Corso Base 1','False'),(11,'Corso Base 2','False'),(12,'Corso Autonomia','False'),(13,'Corsi Crociera Grandi Cabinati','False'),(14,'Corso Crociera Costiera','False'),(15,'Corso Altura','False'),(16,'Corso Skipper','False'),(17,'Corsi di approfondimento','True'),(18,'Lezioni private di vela','True'),(19,'Corso Ormeggi','True'),(20,'Equipaggio ridotto','False'),(21,'Corso Navigazione sportiva senza scalo','False'),(22,'Corso Manovre sportive in solitario','False'),(23,'Corsi di vela sportiva','False'),(24,'Corso Spi','True'),(25,'Corso Regata','False'),(26,'Corso Regata in Regata','True'),(27,'Regate e trofei sociali','True'),(28,'Formazione Istruttori','True'),(29,'Corso Formazione Istruttori Nazionale UISP','True'),(30,'Formazione Istruttori di Circolo','True'),(31,'Corso di vela per ragazzi','False'),(32,'Corso Navigazione Astronomica','True'),(33,'Corso ISAF','True'),(34,'Corso BLSD','True'),(35,'Corso SRC','True'),(36,'Corso Gennaker','True'),(37,'Corso Manutezione - Motore Diesel Entrobordo','True'),(38,'Corso Impiombature','True'),(39,'2016_NEW -1- Corso Base','True'),(40,'2016_NEW -2- Perfezionamento','True'),(41,'2016_NEW -3- Corso Avviamento Crociera','True'),(42,'2016_NEW -4- Corso Crociera','True'),(43,'Corso Meteo','True');
/*!40000 ALTER TABLE `cv_formazione` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-06 17:06:28
