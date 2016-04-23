-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: UOLTRE
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.10.1

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
-- Table structure for table `cv_abilitazioni`
--

DROP TABLE IF EXISTS `cv_abilitazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_abilitazioni` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_utente` int(3) DEFAULT NULL,
  `abilitazione` varchar(250) DEFAULT NULL,
  `scuola` varchar(250) DEFAULT NULL,
  `mese` varchar(10) DEFAULT NULL,
  `anno` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_abilitazioni`
--

LOCK TABLES `cv_abilitazioni` WRITE;
/*!40000 ALTER TABLE `cv_abilitazioni` DISABLE KEYS */;
INSERT INTO `cv_abilitazioni` VALUES (1,1024,'Esperto Velista LNI','Lega Navale Italiana','9','2009'),(2,439,'Istruttore di circolo','Oltremare SSD','5','2015'),(3,560,'Moniteur Habitable Cotier FFV','F?deration France de Voile','8','2013'),(4,137,'Istruttore','Centro Velico Caprera','5','2010'),(5,3156,'Istruttore Vela FIV I Livello','XI Zona ','-1','2001'),(6,174,'ISAF Safety&Survival','Oltremare','3','2013'),(7,3071,'Certificato  di Operatore SRC - GMDSS','MISE - Roma','11','2014'),(8,3071,'Certificato Limitato RTF per navi < Ton. 150 - power max 60W','MISE - Venezia','12','2010'),(9,3071,'Operatore di Stazione Radiomatoriale - HAREC Level A CEPT TR 61-02','MISE - Venezia','4','2008'),(10,3128,'Corso ormeggi ','oltremare ','7','2015'),(11,842,'CAPOBARCA AL TRAFFIICO','CIRCOMARE PORTO GARIBALDI','5','2011'),(12,842,'MARINAIO MOTORISTA','CIRCOMARE PORTOGARIBALDI','12','2013'),(13,842,'ALLIEVO MARINAIO ACQUE INTERNE','MOTORIZZAZIONE FERRARA','10','2013'),(14,842,'NATIONAL POWERBOAT CERTIFICATE LEVEL2','RYA UK (VdV - Venice);','1','2014'),(15,2196,'RYA Day Skipper practical sailing course','TECNOMAR','11','2015'),(16,2196,'RYA Day Skipper Shorebased course','TECNOMAR','11','2015'),(17,116,'Istruttore','FIV','-1','2002'),(18,2804,'Istruttore di Vela','Federazione Italiana Vela','1','1990'),(19,2804,'Esperto Velista','Federazione Italiana Vela','1','2012'),(20,2696,'yachtmaster offshore ','rya','2','2010'),(21,2696,'gmdss',NULL,'-1','2014'),(22,2696,'yachtmaster costal','rya','-1','2010'),(23,219,'Abilitazione alla Deriva','Circolo Velico Casanova','9','2013'),(24,2966,'Istruttore','Velamare club','6','2000'),(25,2966,'Ted UISP','Oltremare FE','9','2013'),(26,1619,'Primo soccorso e BLSD','Safety World','4','2015'),(27,1619,'ISAF Regulations 6.0 Safety Emergency and Survival','Oltremare Padova','3','2013'),(28,4753,'istruttore ','glenans','8','2013'),(29,2863,'Corso ormeggi','Oltremare','11','2013'),(30,2863,'Corso Altura','Andora MR','11','2014'),(31,2863,'Corso Altura','Oltremare','6','2015'),(32,382,'yachtmaster offshore','Miceli Vela','5','2015'),(33,775,'Brevetto Sub','PADI','9','2010'),(34,775,'Assistente di Regata e Posaboe','Riva del Garda','4','2013'),(35,1024,'Corso ISAF','Safety World','3','2013'),(36,1024,'Short Range Certificate','Ministero Comunicazioni','2','2015'),(37,1024,'Corso BLS-D','Salvamento Accademy','3','2014'),(38,2965,'TED','Uisp - Oltremare','2','2013'),(39,2696,'master 200gt','mca','-1','2014'),(40,1490,'3 livello crociera','Centro Velico di Caprera','9','2012'),(41,2501,'istruttore','Centro Velico Caprera','6','1997');
/*!40000 ALTER TABLE `cv_abilitazioni` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-18 18:23:04
