-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	5.5.48-log

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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `usuario` varchar(32) NOT NULL,
  `clave` varchar(60) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `estado` varchar(32) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `administrador` tinyint(1) DEFAULT '0',
  `validado` tinyint(1) DEFAULT '1',
  `ultimo_ingreso` date DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `frase` varchar(255) DEFAULT NULL,
  `genero` varchar(30) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `nombre_completo` varchar(320) DEFAULT NULL,
  `empresa` varchar(320) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `tipo_usuario` varchar(320) DEFAULT NULL,
  `observaciones` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `llave` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (4,'US01','demou','89e495e7941cf9e40e6980d14a16bf023ccd4c91','abrantar@hotmail.com',NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,'Jose Antoniox ','',NULL,1,'Publico',''),(5,'US02','demo','89e495e7941cf9e40e6980d14a16bf023ccd4c91','demo@correo.comx',NULL,'5_imagesjpg.jpg',0,1,NULL,NULL,NULL,NULL,NULL,'usuario unox','','5_imagesjpg.jpg',1,'Publico','');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-16  9:11:51
