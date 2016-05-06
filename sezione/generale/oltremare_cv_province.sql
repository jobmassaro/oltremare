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
-- Table structure for table `cv_province`
--

DROP TABLE IF EXISTS `cv_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_province` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(5) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_province`
--

LOCK TABLES `cv_province` WRITE;
/*!40000 ALTER TABLE `cv_province` DISABLE KEYS */;
INSERT INTO `cv_province` VALUES (1,'AG','Agrigento'),(2,'AL','Alessandria'),(3,'A','Ancona'),(4,'AO','Aosta'),(5,'AP','Ascoli Piceno'),(6,'AQ','L\'Aquila'),(7,'AR','Arezzo'),(8,'AT','Asti'),(9,'AV','Avellino'),(10,'BA','Bari'),(11,'BG','Bergamo'),(12,'BI','Biella'),(13,'BL','Belluno'),(14,'B','Benevento'),(15,'BO','Bologna'),(16,'BR','Brindisi'),(17,'BS','Brescia'),(18,'BT','Barletta-Andria-Trani'),(19,'BZ','Bolzano'),(20,'CA','Cagliari'),(21,'CB','Campobasso'),(22,'CE','Caserta'),(23,'CH','Chieti'),(24,'CI','Carbonia-Iglesias'),(25,'CL','Caltanissetta'),(26,'C','Cuneo'),(27,'CO','Como'),(28,'CR','Cremona'),(29,'CS','Cosenza'),(30,'CT','Catania'),(31,'CZ','Catanzaro'),(32,'E','Enna'),(33,'FC','Forlì-Cesena'),(34,'FE','Ferrara'),(35,'FG','Foggia'),(36,'FI','Firenze'),(37,'FM','Fermo'),(38,'FR','Frosinone'),(39,'GE','Genova'),(40,'GO','Gorizia'),(41,'GR','Grosseto'),(42,'IM','Imperia'),(43,'IS','Isernia'),(44,'KR','Crotone'),(45,'LC','Lecco'),(46,'LE','Lecce'),(47,'LI','Livorno'),(48,'LO','Lodi'),(49,'LT','Latina'),(50,'LU','Lucca'),(51,'MB','Monza e della Brianza'),(52,'MC','Macerata'),(53,'ME','Messina'),(54,'MI','Milano'),(55,'M','Mantova'),(56,'MO','Modena'),(57,'MS','Massa-Carrara'),(58,'MT','Matera'),(59,'NA','Napoli'),(60,'NO','Novara'),(61,'NU','Nuoro'),(62,'OG','Ogliastra'),(63,'OR','Oristano'),(64,'OT','Olbia-Tempio'),(65,'PA','Palermo'),(66,'PC','Piacenza'),(67,'PD','Padova'),(68,'PE','Pescara'),(69,'PG','Perugia'),(70,'PI','Pisa'),(71,'P','Pordenone'),(72,'PO','Prato'),(73,'PR','Parma'),(74,'PT','Pistoia'),(75,'PU','Pesaro e Urbino'),(76,'PV','Pavia'),(77,'PZ','Potenza'),(78,'RA','Ravenna'),(79,'RC','Reggio Calabria'),(80,'RE','Reggio Emilia'),(81,'RG','Ragusa'),(82,'RI','Rieti'),(83,'RM','Roma'),(84,'R','Rimini'),(85,'RO','Rovigo'),(86,'SA','Salerno'),(87,'SI','Siena'),(88,'SO','Sondrio'),(89,'SP','La Spezia'),(90,'SR','Siracusa'),(91,'SS','Sassari'),(92,'SV','Savona'),(93,'TA','Taranto'),(94,'TE','Teramo'),(95,'T','Trento'),(96,'TO','Torino'),(97,'TP','Trapani'),(98,'TR','Terni'),(99,'TS','Trieste'),(100,'TV','Treviso'),(101,'UD','Udine'),(102,'VA','Varese'),(103,'VB','Verbano-Cusio-Ossola'),(104,'VC','Vercelli'),(105,'VE','Venezia'),(106,'VI','Vicenza'),(107,'VR','Verona'),(108,'VS','Medio Campidano'),(109,'VT','Viterbo'),(110,'VV','Vibo Valentia');
/*!40000 ALTER TABLE `cv_province` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-04 21:23:32
