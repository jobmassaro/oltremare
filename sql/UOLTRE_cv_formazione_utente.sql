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
-- Table structure for table `cv_formazione_utente`
--

DROP TABLE IF EXISTS `cv_formazione_utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_formazione_utente` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_utente` int(3) DEFAULT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `cognome` varchar(200) DEFAULT NULL,
  `attivita` varchar(200) DEFAULT NULL,
  `scuola` varchar(200) DEFAULT NULL,
  `sede` varchar(200) DEFAULT NULL,
  `mese` varchar(200) DEFAULT NULL,
  `anno` varchar(200) DEFAULT NULL,
  `abilitazione` varchar(200) DEFAULT NULL,
  `presso_scuola` varchar(200) DEFAULT NULL,
  `nellanno` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_formazione_utente`
--

LOCK TABLES `cv_formazione_utente` WRITE;
/*!40000 ALTER TABLE `cv_formazione_utente` DISABLE KEYS */;
INSERT INTO `cv_formazione_utente` VALUES (1,137,'Alberto','Bini','Corso 1C','CENTRO VELICO CAPRERA','Caprera','6','2005','Istruttore','Centro Velico Caprera','2010'),(2,137,'Alberto','Bini','Corso 2A','CENTRO VELICO CAPRERA','Caprera','8','2006','Istruttore','Centro Velico Caprera','2010'),(3,137,'Alberto','Bini','Corso 2B','CENTRO VELICO CAPRERA','Caprera','8','2007','Istruttore','Centro Velico Caprera','2010'),(4,137,'Alberto','Bini','Corso 2A','CENTRO VELICO CAPRERA','Caprera','8','2008','Istruttore','Centro Velico Caprera','2010'),(5,137,'Alberto','Bini','Corso 2I','CENTRO VELICO CAPRERA','Caprera','8','2009','Istruttore','Centro Velico Caprera','2010'),(6,137,'Alberto','Bini','Corso Istruttori CB2 Stanziale','CENTRO VELICO CAPRERA','Caprera','4','2010','Istruttore','Centro Velico Caprera','2010'),(7,137,'Alberto','Bini','Corsto Istruttori C2 Itinerante','CENTRO VELICO CAPRERA','Caprera','10','2010','Istruttore','Centro Velico Caprera','2010'),(8,137,'Alberto','Bini','Corso Manovre Cabinati','CENTRO VELICO CAPRERA','Lerici','9','2010','Istruttore','Centro Velico Caprera','2010'),(9,174,'Giovanni','Borri','corso base cabinati','Utopia','Portovenere','-1','1994','ISAF Safety&Survival','Oltremare','2013'),(10,174,'Giovanni','Borri','corso avanzato derive','Utopia','Cavo dell\'Elba','8','1995','ISAF Safety&Survival','Oltremare','2013'),(11,219,'FEDERICO','Caon','corsi di vela','CENTRO VELICO CAPRERA',NULL,'4','2003','Abilitazione alla Deriva','Circolo Velico Casanova','2013'),(12,219,'FEDERICO','Caon','corso cabinati','CENTRO VELICO CAPRERA',NULL,'5','2009','Abilitazione alla Deriva','Circolo Velico Casanova','2013'),(13,219,'FEDERICO','Caon','Day Skipper RYA practical and shorebased course','TECNOMAR.NET','Fiumicino','11','2015','Abilitazione alla Deriva','Circolo Velico Casanova','2013'),(14,382,'FABRIZIO','DI CARLO','yachtmaster offshore','ROYAL YACHTING ASSOCIATION',NULL,'-1','2014','yachtmaster offshore','Miceli Vela','2015'),(15,382,'FABRIZIO','DI CARLO','patente nautica senza limiti','LEGA NAVALE ITALIANA','rimini','-1','2011','yachtmaster offshore','Miceli Vela','2015'),(16,382,'FABRIZIO','DI CARLO','tecnico elettrico del diporto','ISMEF','Minturno (LT)','-1','2013','yachtmaster offshore','Miceli Vela','2015'),(17,382,'FABRIZIO','DI CARLO','navigazione mini650','Michele Zambelli','rimini','-1','2015','yachtmaster offshore','Miceli Vela','2015'),(18,382,'FABRIZIO','DI CARLO','deriva - laser avanzato','circolo nautico cervia','cervia','7','2011','yachtmaster offshore','Miceli Vela','2015'),(19,382,'FABRIZIO','DI CARLO','corso vela','CENTRO VELICO CAPRERA','caprera','7','1991','yachtmaster offshore','Miceli Vela','2015'),(20,382,'FABRIZIO','DI CARLO','corso vela','CENTRO VELICO CAPRERA','caprera','7','1992','yachtmaster offshore','Miceli Vela','2015'),(21,439,'MATTIA','FIORENTINI','Corso 1Q','CENTRO VELICO CAPRERA','Caprera','6','1997','Istruttore di circolo','Oltremare SSD','2015'),(22,439,'MATTIA','FIORENTINI','Corso 2D','CENTRO VELICO CAPRERA','Caprera','6','1998','Istruttore di circolo','Oltremare SSD','2015'),(23,560,'Francesco','Guid_utenteetti','Corso Deriva avanzato','CENTRO VELICO CAPRERA','Isola di Caprera','9','1996','Moniteur Habitable Cotier FFV','F?deration France de Voile','2013'),(24,560,'Francesco','Guid_utenteetti','Corso Crociera Costiera','CENTRO VELICO CAPRERA','Isola di caprera','7','1994','Moniteur Habitable Cotier FFV','F?deration France de Voile','2013'),(25,560,'Francesco','Guid_utenteetti','Corso Altura','CENTRO VELICO CAPRERA','Giro di Corsica e Sardegna','8','2000','Moniteur Habitable Cotier FFV','F?deration France de Voile','2013'),(26,560,'Francesco','Guid_utenteetti','Corso 4 Vele','LES GLENANS','Paimpol','7','2010','Moniteur Habitable Cotier FFV','F?deration France de Voile','2013'),(27,560,'Francesco','Guid_utenteetti','Corso A2C1','LES GLENANS','Bonifacio','8','2011','Moniteur Habitable Cotier FFV','F?deration France de Voile','2013'),(28,560,'Francesco','Guid_utenteetti','Corso Pedagogico','LES GLENANS','Paimpol','5','2012','Moniteur Habitable Cotier FFV','F?deration France de Voile','2013'),(29,560,'Francesco','Guid_utenteetti','Tirocinio','LES GLENANS','Bonifacio','8','2013','Moniteur Habitable Cotier FFV','F?deration France de Voile','2013'),(30,28,'Renzo','Andreotti',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,9,'Norberto','Agretti',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,4761,'mario','rossi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `cv_formazione_utente` ENABLE KEYS */;
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
