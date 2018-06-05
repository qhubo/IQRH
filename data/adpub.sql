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
-- Table structure for table `bitacora_campana`
--

DROP TABLE IF EXISTS `bitacora_campana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_campana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `campana_id` int(11) DEFAULT NULL,
  `observaciones` varchar(350) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `revisado` tinyint(1) DEFAULT '0',
  `usuario_notifica` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bitacora_campana_FI_1` (`usuario_id`),
  KEY `bitacora_campana_FI_2` (`campana_id`),
  KEY `bitacora_campana_I_1` (`usuario_notifica`),
  CONSTRAINT `bitacora_campana_FK_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  CONSTRAINT `bitacora_campana_FK_2` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`),
  CONSTRAINT `bitacora_campana_FK_3` FOREIGN KEY (`usuario_notifica`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_campana`
--

LOCK TABLES `bitacora_campana` WRITE;
/*!40000 ALTER TABLE `bitacora_campana` DISABLE KEYS */;
INSERT INTO `bitacora_campana` VALUES (1,5,'2018-03-30 06:46:57',1,'','Aprobado',1,5),(2,5,'2018-03-30 06:47:15',4,'','Aprobado',0,5),(3,5,'2018-03-30 06:47:34',3,'','Rechazo',1,5),(4,5,'2018-03-30 07:05:23',5,'','Aprobado',1,5),(5,5,'2018-03-31 00:13:24',5,'Campaña Camp0005 Cancelada por el usuario','Cancelado',1,5),(6,5,'2018-03-31 04:13:32',4,'Campaña Camp0004 Cancelada por el moderador','Cancelado',0,5),(7,5,'2018-04-03 18:24:32',2,'aprobada','Aprobado',0,5),(8,5,'2018-04-03 18:24:44',6,'aprov','Aprobado',0,5);
/*!40000 ALTER TABLE `bitacora_campana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campana`
--

DROP TABLE IF EXISTS `campana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `autorizado` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `estado` varchar(50) DEFAULT NULL,
  `fecha_aprobo` datetime DEFAULT NULL,
  `usuario_aprobo` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `tipo_campana_id` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `presupuesto_maximo` double DEFAULT '0',
  `presupuesto_abonado` double DEFAULT '0',
  `presupuesto_utilizado` double DEFAULT '0',
  `banner_horizontal` varchar(250) DEFAULT NULL,
  `link_horizontal` varchar(250) DEFAULT NULL,
  `banner_vertical` varchar(250) DEFAULT NULL,
  `link_vertical` varchar(250) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campana_I_1` (`usuario_aprobo`),
  KEY `campana_FI_1` (`usuario_id`),
  KEY `campana_FI_3` (`tipo_campana_id`),
  CONSTRAINT `campana_FK_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`),
  CONSTRAINT `campana_FK_2` FOREIGN KEY (`usuario_aprobo`) REFERENCES `usuario` (`id`),
  CONSTRAINT `campana_FK_3` FOREIGN KEY (`tipo_campana_id`) REFERENCES `tipo_campana` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campana`
--

LOCK TABLES `campana` WRITE;
/*!40000 ALTER TABLE `campana` DISABLE KEYS */;
INSERT INTO `campana` VALUES (1,5,'2018-03-28 08:09:34',1,1,'Activo','2018-03-30 00:00:00',5,'Mundial',1,'2018-03-03','2018-04-30',100155,0,90055,'V1_crackchapinlogopng180328080935.png','4444444444',NULL,'44444444','Camp0001'),(2,5,'2018-03-30 02:56:56',1,1,'Activo','2018-04-03 00:00:00',5,'Campana Dos',1,'2018-03-30','2018-04-30',5000,0,1000,'V2_5d7afef32269c23adb952fb411007769jpg180330025656.jpg','',NULL,'','Camp0002'),(3,5,'2018-03-30 02:57:55',2,1,'Rechazado','2018-03-30 00:00:00',5,'Publi RCN',1,'2018-03-30','2018-04-30',554544,0,554289,'V3_43f074cc3354ac165d685893f6fe983fpng180330025755.png','',NULL,'','Camp0003'),(4,5,'2018-03-30 03:25:36',1,1,'Cancelado','2018-03-30 00:00:00',5,'Campeonato',1,'2018-03-30','2018-04-30',5000,0,500,'V4_8d479f216fdf985c35eecce62330ef43jpg180330032536.jpg','fff',NULL,'httt','Camp0004'),(5,5,'2018-03-30 04:02:09',1,1,'Cancelado','2018-03-30 00:00:00',5,'prueba cuatro',1,'2018-03-30','2018-04-30',1000,0,0,'V5_arcoirisjpg180330040209.jpg','',NULL,'','Camp0005'),(6,5,'2018-04-03 17:38:40',1,1,'Activo','2018-04-03 00:00:00',5,'digital carro',1,'2018-04-05','2018-04-30',5000,0,0,'H6_2jpg180403053840.jpg','#','V6_publicidad1gif180403053840.gif','#','Camp0006');
/*!40000 ALTER TABLE `campana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campana_click`
--

DROP TABLE IF EXISTS `campana_click`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campana_click` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campana_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campana_click_FI_1` (`campana_id`),
  CONSTRAINT `campana_click_FK_1` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campana_click`
--

LOCK TABLES `campana_click` WRITE;
/*!40000 ALTER TABLE `campana_click` DISABLE KEYS */;
INSERT INTO `campana_click` VALUES (1,1,'2018-04-03',6);
/*!40000 ALTER TABLE `campana_click` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campana_impresion`
--

DROP TABLE IF EXISTS `campana_impresion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campana_impresion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campana_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campana_impresion_FI_1` (`campana_id`),
  CONSTRAINT `campana_impresion_FK_1` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campana_impresion`
--

LOCK TABLES `campana_impresion` WRITE;
/*!40000 ALTER TABLE `campana_impresion` DISABLE KEYS */;
INSERT INTO `campana_impresion` VALUES (1,1,'2018-04-03',3);
/*!40000 ALTER TABLE `campana_impresion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campana_segmentacion`
--

DROP TABLE IF EXISTS `campana_segmentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campana_segmentacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campana_id` int(11) DEFAULT NULL,
  `ubicacion_pagina_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campana_segmentacion_FI_1` (`campana_id`),
  KEY `campana_segmentacion_FI_2` (`ubicacion_pagina_id`),
  CONSTRAINT `campana_segmentacion_FK_1` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`),
  CONSTRAINT `campana_segmentacion_FK_2` FOREIGN KEY (`ubicacion_pagina_id`) REFERENCES `ubicacion_pagina` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campana_segmentacion`
--

LOCK TABLES `campana_segmentacion` WRITE;
/*!40000 ALTER TABLE `campana_segmentacion` DISABLE KEYS */;
INSERT INTO `campana_segmentacion` VALUES (3,3,4),(4,4,3),(5,5,4),(6,4,4),(7,4,5),(8,1,5),(9,1,3),(10,1,4),(11,2,5),(12,2,3),(13,2,4),(14,6,3);
/*!40000 ALTER TABLE `campana_segmentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campana_ubicacion`
--

DROP TABLE IF EXISTS `campana_ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campana_ubicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campana_id` int(11) DEFAULT NULL,
  `segmentacion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `campana_ubicacion_FI_1` (`campana_id`),
  KEY `campana_ubicacion_FI_2` (`segmentacion_id`),
  CONSTRAINT `campana_ubicacion_FK_1` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`),
  CONSTRAINT `campana_ubicacion_FK_2` FOREIGN KEY (`segmentacion_id`) REFERENCES `segmentacion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campana_ubicacion`
--

LOCK TABLES `campana_ubicacion` WRITE;
/*!40000 ALTER TABLE `campana_ubicacion` DISABLE KEYS */;
INSERT INTO `campana_ubicacion` VALUES (3,3,1),(4,4,1),(5,5,1),(6,3,2),(7,4,2),(8,1,2),(9,1,1),(10,2,1),(11,6,1);
/*!40000 ALTER TABLE `campana_ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correlativo_codigo`
--

DROP TABLE IF EXISTS `correlativo_codigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `correlativo_codigo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_asginar` int(11) DEFAULT NULL,
  `prefijo` varchar(50) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correlativo_codigo`
--

LOCK TABLES `correlativo_codigo` WRITE;
/*!40000 ALTER TABLE `correlativo_codigo` DISABLE KEYS */;
INSERT INTO `correlativo_codigo` VALUES (1,4,'US','Usuario'),(2,3,'SEG','Segmento'),(3,3,'CAM','Campana'),(4,4,'UB','Ubicacion'),(5,2,'PAM','Parametro'),(6,7,'Camp','Camp');
/*!40000 ALTER TABLE `correlativo_codigo` ENABLE KEYS */;
UNLOCK TABLES;

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
  `icono` varchar(50) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `superior` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_seguridad`
--

LOCK TABLES `menu_seguridad` WRITE;
/*!40000 ALTER TABLE `menu_seguridad` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametro`
--

DROP TABLE IF EXISTS `parametro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `slogan` text,
  `logo` varchar(150) DEFAULT NULL,
  `precio_click` double DEFAULT NULL,
  `precio_impresion` double DEFAULT NULL,
  `precio_mil_impresion` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametro`
--

LOCK TABLES `parametro` WRITE;
/*!40000 ALTER TABLE `parametro` DISABLE KEYS */;
INSERT INTO `parametro` VALUES (1,'PAM01','','d4108cf87a9157e883dfa19e7ce815ac2b9b5c58.jpg',2.5,2.5,200);
/*!40000 ALTER TABLE `parametro` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propel_migration`
--

DROP TABLE IF EXISTS `propel_migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propel_migration` (
  `version` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propel_migration`
--

LOCK TABLES `propel_migration` WRITE;
/*!40000 ALTER TABLE `propel_migration` DISABLE KEYS */;
INSERT INTO `propel_migration` VALUES (1522775992);
/*!40000 ALTER TABLE `propel_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `segmentacion`
--

DROP TABLE IF EXISTS `segmentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `segmentacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT '',
  `logo` varchar(50) DEFAULT NULL,
  `observaciones` text,
  `rango_edad_uno` varchar(50) DEFAULT NULL,
  `rango_edad_dos` varchar(50) DEFAULT NULL,
  `rango_edad_tres` varchar(50) DEFAULT NULL,
  `porcentaje_rango_uno` int(11) DEFAULT NULL,
  `porcentaje_rango_dos` int(11) DEFAULT NULL,
  `porcentaje_rango_tres` int(11) DEFAULT NULL,
  `grupo_femenino` int(11) DEFAULT NULL,
  `grupo_masculino` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `segmentacion`
--

LOCK TABLES `segmentacion` WRITE;
/*!40000 ALTER TABLE `segmentacion` DISABLE KEYS */;
INSERT INTO `segmentacion` VALUES (1,'SEG01','Radio Mia','e761b685aba328b3b7a17898b487a067fbde3481.png','','13-19','20-34','35-100',10,70,20,80,20,1),(2,'SEG02','Crack Chapin','899efb57cf8dc44853c4b54d441da2bcefa336d9.png','','','','',NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `segmentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_campana`
--

DROP TABLE IF EXISTS `tipo_campana`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_campana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT '',
  `activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_campana`
--

LOCK TABLES `tipo_campana` WRITE;
/*!40000 ALTER TABLE `tipo_campana` DISABLE KEYS */;
INSERT INTO `tipo_campana` VALUES (1,'CAM01','Página web',1),(2,'CAM02','Redes sociales ',1);
/*!40000 ALTER TABLE `tipo_campana` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion_pagina`
--

DROP TABLE IF EXISTS `ubicacion_pagina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion_pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT '',
  `observaciones` text,
  `tipo_imagen` varchar(50) DEFAULT NULL,
  `medida_imagen` varchar(50) DEFAULT NULL,
  `banner_imagen` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `tipo_campana_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ubicacion_pagina_FI_1` (`tipo_campana_id`),
  CONSTRAINT `ubicacion_pagina_FK_1` FOREIGN KEY (`tipo_campana_id`) REFERENCES `tipo_campana` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion_pagina`
--

LOCK TABLES `ubicacion_pagina` WRITE;
/*!40000 ALTER TABLE `ubicacion_pagina` DISABLE KEYS */;
INSERT INTO `ubicacion_pagina` VALUES (3,'UB01','Encabezado','','Horizontal','100  x 200','a54f528445780d70a021d6becb6544bd255a74a2.jpg',1,1),(4,'UB02','Pie Pagina','','Horizontal','100  x 200','e18f4f6a10ea5406438056457791a0ebebaca3ba.jpg',1,1),(5,'UB03','Articulo','','Vertical','200 x 100','56775b497d2c0a7f54b848c3f82d605aa6885159.png',1,1);
/*!40000 ALTER TABLE `ubicacion_pagina` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `usuario_perfil`
--

DROP TABLE IF EXISTS `usuario_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_perfil_FI_1` (`perfil_id`),
  KEY `usuario_perfil_FI_2` (`usuario_id`),
  CONSTRAINT `usuario_perfil_FK_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  CONSTRAINT `usuario_perfil_FK_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_perfil`
--

LOCK TABLES `usuario_perfil` WRITE;
/*!40000 ALTER TABLE `usuario_perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_perfil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-06 21:50:28
