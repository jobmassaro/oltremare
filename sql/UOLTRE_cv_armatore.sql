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
-- Table structure for table `cv_armatore`
--

DROP TABLE IF EXISTS `cv_armatore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cv_armatore` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_utente` int(3) DEFAULT '0',
  `nome` varchar(150) DEFAULT NULL,
  `cognome` varchar(150) DEFAULT NULL,
  `armatore` varchar(150) DEFAULT NULL,
  `tipo` varchar(150) DEFAULT NULL,
  `cantiere` varchar(150) DEFAULT NULL,
  `modello` varchar(150) DEFAULT NULL,
  `metri` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8263 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cv_armatore`
--

LOCK TABLES `cv_armatore` WRITE;
/*!40000 ALTER TABLE `cv_armatore` DISABLE KEYS */;
INSERT INTO `cv_armatore` VALUES (8192,1,'Piero','Boato',NULL,'2','xxx','yyy','10'),(8193,174,'Giovanni','Borri',NULL,'1','Beneteau','First 36.7','36'),(8194,187,'SERGIO','BOZZOLA',NULL,'2','Yacht&Co','Holiday 19','19'),(8195,311,'Paolo','Contin',NULL,'2','Sessa marine','Key largo 27','27'),(8196,364,'Paolo','Dar?',NULL,'2','Novurania','Poseidon III','4'),(8197,449,'ROBERTO','Forlani',NULL,'1','Bihor? Marine','Vaurien','12'),(8198,468,'Paolo','Frugoni',NULL,'2','Ilver','daycruiser','21'),(8199,534,'Angelo','Giuliani',NULL,'1','jeanneau','sun2000','20'),(8200,543,'Francesco','Grappeggia',NULL,'1','Marieholm','MS 20','6'),(8201,560,'Francesco','Guid_utenteetti',NULL,'1','Crack Boats','Twister MIni 6.50','650'),(8202,590,'Vanes','Linguerri',NULL,'1','Laser','Laser 2','13'),(8203,639,'Clorindo','Manzato',NULL,'1','MARIVER','Pierrot','31'),(8204,682,'Corrado','Massari',NULL,'1','non ricordo','Zef','4'),(8205,682,'Corrado','Massari',NULL,'1','COMAR','8,50','9'),(8206,682,'Corrado','Massari',NULL,'1','COMAR','MILLECINQUANTA','11'),(8207,751,'Andrea','Naletto',NULL,'2','sessa','key largo 16','16'),(8208,775,'Leonardo','Omezzolli',NULL,'1','NordEst','Optimist','2'),(8209,775,'Leonardo','Omezzolli',NULL,'1','nautivela','420','4'),(8210,775,'Leonardo','Omezzolli',NULL,'1','nautivela','470','4'),(8211,842,'RAFFAELE','PICCOLI',NULL,'2','BENETEAU ','ANTARES','6'),(8212,842,'RAFFAELE','PICCOLI',NULL,'2','JEANNEAU','MERRY FISHER','7'),(8213,842,'RAFFAELE','PICCOLI',NULL,'2','BENETEAU','ANTARES','8'),(8214,1197,'Renato','Vian',NULL,'1','Beneteau','First 211','21'),(8215,1197,'Renato','Vian',NULL,'1','Janneau','Sun Fast 20','20'),(8216,1024,'Alessandro','Suardi',NULL,'1','Beneteau','Figaro','9'),(8217,1366,'stefano','mosconi',NULL,'1','salona','vela sailer','37'),(8218,1409,'ADOLFO','FARRONATO',NULL,'1','CONRAD','Conrad 25 RT','25'),(8219,1543,'Marco','Mari',NULL,'1','Dufour','4800','34'),(8220,1543,'Marco','Mari',NULL,'1','Moody','425','42'),(8221,1619,'UBALDO','SQUARCIA',NULL,'1','Elan','Elan 310','31'),(8222,1656,'Giorgio','Caselli',NULL,'1','Jullien','Micro Challenger','18'),(8223,1744,'MARIO','ROTA GELPI',NULL,'1','ETAP','24I','8'),(8224,1796,'sergio','gallerani',NULL,'1','TECNOMAR','ALLEGRO','22'),(8225,1796,'sergio','gallerani',NULL,'1','MULL','RANGER ','29'),(8226,1817,'Ermanno','Bena\'',NULL,'1','Benetau','First C 8','8'),(8227,1903,'maurizio','pasqualini',NULL,'1','x-yocht','imx 38','38'),(8228,1744,'MARIO','ROTA GELPI',NULL,'1','ETAP','24I','8'),(8229,1796,'sergio','gallerani',NULL,'1','TECNOMAR','ALLEGRO','22'),(8230,1796,'sergio','gallerani',NULL,'1','MULL','RANGER ','29'),(8231,1817,'Ermanno','Bena\'',NULL,'1','Benetau','First C 8','8'),(8232,1903,'maurizio','pasqualini',NULL,'1','x-yocht','imx 38','38'),(8233,2141,'roberto','gesuato',NULL,'1','Bavaria','37 cruiser','11'),(8234,2196,'david_utentee','bolognesi',NULL,'1','prototipo scozzese','E-Boat 22','22'),(8235,2198,'VALTER','MERIGHI',NULL,'1','bavaria','42 cruiser','13'),(8236,2429,'Mauro','Rigoni',NULL,'1','Comar','Comet 910 Plus','30'),(8237,2443,'riccardo','tettamanti',NULL,'2','mistral boats','gommone','5'),(8238,2459,'luigi','ramajoli',NULL,'1','AB','COGNAC','26'),(8239,2696,'marco alejandro','buonanni',NULL,'1','Jonghert','19s','21'),(8240,2696,'marco alejandro','buonanni',NULL,'1','sangermani','cutter','18'),(8241,2696,'marco alejandro','buonanni',NULL,'1','Hallber Rassy','HR 54','18'),(8242,2696,'marco alejandro','buonanni',NULL,'1','Swan','swan 77','24'),(8243,2764,'Matteo','Sassi',NULL,'1','Nautivela','420','12'),(8244,2820,'Massimiliano','Zampini',NULL,'2','Mochi Craft','Dominator','10'),(8245,2872,'Pierluigi','Mondati',NULL,'1','Doufour','38','11'),(8246,2966,'Giuseppe','Boniolo',NULL,'1','Rivetto','one designe','25'),(8247,3046,'Gianluca','Romagnoli',NULL,'1','Comar','Comet 12','40'),(8248,3062,'Carlo','Dall\'Aglio',NULL,'2','Sessa','Ocean 650 Tim','21'),(8249,3074,'David_utentee','Domenicali',NULL,'1','Benateau','Ferst','21'),(8250,3074,'David_utentee','Domenicali',NULL,'1','Jannau','Sun','25'),(8251,3074,'David_utentee','Domenicali',NULL,'1','Benateau','Oceanis Clipper','31'),(8252,3074,'David_utentee','Domenicali',NULL,'2','Ranieri','Rio','19'),(8253,3144,'Renato','Medici',NULL,'1','Beneteau','43','12'),(8254,3144,'Renato','Medici',NULL,'1','Beneteau','21.7','6'),(8255,3162,'Stefano','Vallin',NULL,'1','beneteau','Oceanis 311 clipper','31'),(8256,3220,'Andrea','Zanolini',NULL,'1','Laser','Laser 2 Regatta','450'),(8257,3728,'GIACOMO','FERRI',NULL,'1','Nautivela','470','470'),(8258,4297,'NICOLA','ZAMORANI',NULL,'1','Comar','Comet 383','12'),(8259,4448,'ROBERTO','TENAN',NULL,'1','DEL PARDO','GRAN SOLEIL 34','10'),(8260,4721,'Angelo','Rabbi',NULL,'1','ALPA','ALPA 21','21'),(8261,4734,'valerio','antifora',NULL,'2','tecnomariner','stealth mythos','6'),(8262,4745,'Alessandro','Fabbri',NULL,'1','Beneteau','Beneteau 50','15');
/*!40000 ALTER TABLE `cv_armatore` ENABLE KEYS */;
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
