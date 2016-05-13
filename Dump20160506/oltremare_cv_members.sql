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
-- Table structure for table `cv_members`
--

DROP TABLE IF EXISTS `cv_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_members` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_utente` int(15) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_pin` varchar(255) NOT NULL DEFAULT '0.0.0.0',
  `forgot_key` varchar(60) NOT NULL DEFAULT '0.0.0.0',
  `email_key` varchar(255) NOT NULL,
  `email_confirmed` int(1) NOT NULL DEFAULT '0',
  `terms` int(1) NOT NULL,
  `browser` varchar(255) NOT NULL DEFAULT 'null',
  `user_level` int(10) NOT NULL DEFAULT '2',
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(50) NOT NULL,
  `plan_id` int(15) DEFAULT '0',
  `cod_fiscale` varchar(255) DEFAULT '000',
  `cod_piva` varchar(255) DEFAULT '123456789',
  `data_nascita` varchar(255) DEFAULT '0000-00-00 00:00:00',
  `numtelefono` int(16) DEFAULT NULL,
  `mobile` int(16) DEFAULT NULL,
  `certificatomedico` int(1) NOT NULL,
  `profilo_pic` varchar(255) DEFAULT NULL,
  `certificato_pic` varchar(255) DEFAULT NULL,
  `via` varchar(255) DEFAULT NULL,
  `civico` varchar(255) DEFAULT NULL,
  `cap` varchar(255) DEFAULT NULL,
  `comune` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `sesso` varchar(255) DEFAULT NULL,
  `sposato` varchar(255) DEFAULT NULL,
  `figli` varchar(255) DEFAULT NULL,
  `professione` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `cellulare` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `patente` varchar(255) DEFAULT NULL,
  `patente_tipo` varchar(255) DEFAULT NULL,
  `data_scadenza_patente` datetime DEFAULT '0000-00-00 00:00:00',
  `uisp` varchar(255) DEFAULT NULL,
  `uisp_numero` varchar(255) DEFAULT NULL,
  `uisp_datarilascio` varchar(255) DEFAULT '0000-00-00 00:00:00',
  `certificato` varchar(255) DEFAULT NULL,
  `armatore` varchar(255) DEFAULT NULL,
  `miglia` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `cantiere` varchar(255) DEFAULT NULL,
  `modello` varchar(255) DEFAULT NULL,
  `piedi` varchar(255) DEFAULT NULL,
  `fiv` varchar(255) DEFAULT NULL,
  `fiv_scadenza` datetime DEFAULT '0000-00-00 00:00:00',
  `fiv_certificato` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_members`
--

LOCK TABLES `cv_members` WRITE;
/*!40000 ALTER TABLE `cv_members` DISABLE KEYS */;
INSERT INTO `cv_members` VALUES (1,NULL,'admin','Amministratore','Admin','demos@jdwebdesigner.com','$2y$10$BZv2fyJrLPj1EWfapQf99.q3GPu3ngq1bx/FDsOOAZ5Ya0RBQQBxS','','','',1,1,'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:44.0) Gecko/20100101 Firefox/44.0',1,'2016-01-01 00:00:00','2016-05-06 14:27:21','active',0,'','','',0,0,0,'','','','','','','','','','','','','','','','','','','','0000-00-00 00:00:00','','','','','','','','','','','','0000-00-00 00:00:00',''),(14,NULL,'regular','Regular','Regular','demo2@jdwebdesigner.com','$2y$10$Pg4xWwfQNyjrKiHnDDtqpOS9DPnbYm0yYImRBRcYlWyNxMuM6j5KC','','','0',0,1,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.111 Safari/537.36',2,'2016-01-18 18:26:16','0000-00-00 00:00:00','active',0,'','','',0,0,0,'','','','','','','','','','','','','','','','','','','','0000-00-00 00:00:00','','','','','','','','','','','','0000-00-00 00:00:00',''),(28,50000,'alex','alex','ruffini','alexruffini78@gmail.com','$2y$10$zFWLhlxEZF0ky2yBz1JvG.N6PegcJMPL6hb6/unM0T/7qtZ4VzTsu','0.0.0.0','0.0.0.0','Gnc9yf2zcm0bLypQMMYsJ9hS4te3YosELFOkUQU6dUhYtHPftNHcXZ51sj5qHy5tdTO7KIdXDvW6cLlGy3Tv3YxviCW0a2toWivG',1,1,'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:44.0) Gecko/20100101 Firefox/44.0',3,'2016-05-03 19:57:46','2016-05-05 20:19:29','active',0,'000','123456789','0000-00-00 00:00:00',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(29,50005,'jobmassaro','sasa','sasa','jobmassaro@gmail.com','$2y$10$/YpMggxsAAGVGG2JraY3o.KX6vZOzwUt8tiDGmiSKumBoYmOW0Ud.','0.0.0.0','0.0.0.0','OOc6M8A26I4KExb309Y8suiR8iyqn8HcXTiJ2TM8BRTgo5joeiwGMPxV86lvf2HcW0WZUI8vz1MX75mloT2bIA6QHrmWu49q55qZ',1,1,'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:44.0) Gecko/20100101 Firefox/44.0',2,'2016-05-03 20:10:44','2016-05-06 14:24:33','active',0,'000','123456789','0000-00-00 00:00:00',NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `cv_members` ENABLE KEYS */;
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
