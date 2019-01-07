-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: iqrh
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

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
-- Table structure for table `menu_seguridad`
--

DROP TABLE IF EXISTS `menu_seguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_seguridad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT '',
  `credencial` varchar(100) DEFAULT NULL,
  `modulo` varchar(100) DEFAULT NULL,
  `icono` varchar(250) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `superior` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_seguridad`
--

LOCK TABLES `menu_seguridad` WRITE;
/*!40000 ALTER TABLE `menu_seguridad` DISABLE KEYS */;
INSERT INTO `menu_seguridad` VALUES (1,'Administración',NULL,'','<i class=\"icon-wrench font-green-turquoise\"></i>  ',NULL,NULL,1),(2,'Solicitudes',NULL,'','<i class=\"fa fa-rocket font-grey-cararra\"></i> ',NULL,NULL,2),(3,'Consultas',NULL,'','<i class=\"icon-magnifier font-blue\"></i>',NULL,NULL,3),(4,'Reportes',NULL,'','<i class=\"fa fa-print font-yellow-casablanca\"></i>',NULL,NULL,4),(5,'Configuración',NULL,'',' <i class=\"icon-settings font-grey-steel \"></i> ',NULL,NULL,6),(6,'Editar Usuario',NULL,'edita_usuario','',NULL,1,1),(7,'Supervisores',NULL,'asigna_jefe','',NULL,1,3),(8,'Catálogo Solicitud',NULL,'catalogo_solicitud','catalogo_solicitud',NULL,1,3),(9,'Catálogo Ausencias',NULL,'tipo_ausencia','',NULL,1,4),(10,'Horario',NULL,'empresa_horario','',NULL,1,6),(11,'Dias Feriado',NULL,'dia_feriado','',NULL,1,7),(12,'Horario Empleado',NULL,'usuario_horario','',NULL,1,8),(13,'Vacaciones',NULL,'vacaciones','',NULL,2,2),(14,'Permiso Ausencia',NULL,'ausencia','',NULL,2,3),(15,'Solicitud',NULL,'crea_solicitud','',NULL,2,4),(16,'Mis Vacaciones',NULL,'consulta_vaca','',NULL,3,1),(17,'Mis Ausencias',NULL,'consulta_ausencia','',NULL,3,2),(18,'Finiquitos',NULL,'consulta_finiquito','',NULL,3,3),(19,'Asistencia',NULL,'reporte_asistencia','',NULL,4,1),(20,'Recibos',NULL,'reporte_recibo','',NULL,4,2),(21,'Aumentos',NULL,'reporte_aumento','',NULL,4,3),(22,'Traslados',NULL,'reporte_traslado','',NULL,4,6),(23,'Parametros',NULL,'parametro','',NULL,5,1),(24,'Menú',NULL,'menu_seguridad','',NULL,5,2),(25,'Perfil',NULL,'perfil','',NULL,5,2);
/*!40000 ALTER TABLE `menu_seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT '',
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'Administrador',NULL,1),(2,'Supervisor',NULL,1),(3,'Empleado',NULL,1);
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-06 21:18:09
