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
-- Table structure for table `banco`
--

DROP TABLE IF EXISTS `banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(260) NOT NULL DEFAULT '',
  `nombre_cuenta` varchar(100) DEFAULT NULL,
  `no_cuenta` varchar(100) DEFAULT NULL,
  `tipo_cuenta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco`
--

LOCK TABLES `banco` WRITE;
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
INSERT INTO `banco` VALUES (1,'Banco Ahorro','Ahorro','10115015445','Ahorro'),(2,'Banco Monetario','Monetario','444555455','Monetario');
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_cuenta`
--

DROP TABLE IF EXISTS `catalogo_cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(60) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_cuenta`
--

LOCK TABLES `catalogo_cuenta` WRITE;
/*!40000 ALTER TABLE `catalogo_cuenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(60) DEFAULT NULL,
  `nombre_completo` varchar(260) NOT NULL DEFAULT '',
  `direccion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'38233455','Hugo Jimenez Vasquez','Guatemala'),(2,'888000-9','Leonel Vasquez Ramirez','Ciudad'),(3,'CF','Antonio Contreras','Guastatoya'),(4,'544888','Amilcar Rafa ',''),(5,'544888','Amilcar Rafa ',''),(6,'544888','Amilcar Rafa ','');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor_id` int(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `nit` varchar(100) DEFAULT NULL,
  `direccion` varchar(350) NOT NULL DEFAULT '',
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  `valor_total` double DEFAULT NULL,
  `estatus` varchar(300) DEFAULT NULL,
  `dia_credito` int(11) DEFAULT NULL,
  `valor_pagado` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compra_FI_1` (`proveedor_id`),
  CONSTRAINT `compra_FK_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,5,'Escape Play','2017-10-15 04:10:01','66788997-5','',NULL,1,2081.4,'Operado',30,200),(2,1,'Distribuidora Mec','2017-10-15 05:39:51','4912345-5','',NULL,1,100,'Operado',30,NULL);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_detalle`
--

DROP TABLE IF EXISTS `compra_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `compra_id` int(11) DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `valor_unitario` double DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compra_detalle_FI_3` (`servicio_id`),
  KEY `compra_detalle_FI_1` (`producto_id`),
  KEY `compra_detalle_FI_2` (`compra_id`),
  CONSTRAINT `compra_detalle_FK_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `compra_detalle_FK_2` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_detalle`
--

LOCK TABLES `compra_detalle` WRITE;
/*!40000 ALTER TABLE `compra_detalle` DISABLE KEYS */;
INSERT INTO `compra_detalle` VALUES (2,6,2,1,NULL,1040.7,2081.4),(3,2,1,2,NULL,100,100);
/*!40000 ALTER TABLE `compra_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_pago`
--

DROP TABLE IF EXISTS `compra_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `compra_id` int(11) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL,
  `referencia` varchar(32) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compra_pago_FI_2` (`banco_id`),
  KEY `compra_pago_FI_1` (`compra_id`),
  CONSTRAINT `compra_pago_FK_1` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_pago`
--

LOCK TABLES `compra_pago` WRITE;
/*!40000 ALTER TABLE `compra_pago` DISABLE KEYS */;
INSERT INTO `compra_pago` VALUES (1,1,'2017-10-15 00:00:00',NULL,1,NULL,200);
/*!40000 ALTER TABLE `compra_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operacion`
--

DROP TABLE IF EXISTS `operacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `nit` varchar(100) DEFAULT NULL,
  `direccion` varchar(350) NOT NULL DEFAULT '',
  `observaciones` text,
  `activo` tinyint(1) DEFAULT '1',
  `valor_total` double DEFAULT NULL,
  `estatus` varchar(300) DEFAULT NULL,
  `dia_credito` int(11) DEFAULT NULL,
  `valor_pagado` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operacion_FI_1` (`cliente_id`),
  CONSTRAINT `operacion_FK_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operacion`
--

LOCK TABLES `operacion` WRITE;
/*!40000 ALTER TABLE `operacion` DISABLE KEYS */;
INSERT INTO `operacion` VALUES (1,4,'Amilcar Rafa ','2017-10-13 21:26:26','544888','',NULL,1,160,'Pagado',30,160),(2,5,'Amilcar Rafa ','2017-10-14 01:24:36','544888','',NULL,1,25.5,'Operado',30,NULL),(3,6,'Amilcar Rafa ','2017-10-15 05:21:53','544888','',NULL,1,116558.4,'Operado',30,NULL);
/*!40000 ALTER TABLE `operacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operacion_detalle`
--

DROP TABLE IF EXISTS `operacion_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operacion_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `operacion_id` int(11) DEFAULT NULL,
  `servicio_id` int(11) DEFAULT NULL,
  `valor_unitario` double DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operacion_detalle_FI_1` (`producto_id`),
  KEY `operacion_detalle_FI_2` (`operacion_id`),
  KEY `operacion_detalle_FI_3` (`servicio_id`),
  CONSTRAINT `operacion_detalle_FK_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `operacion_detalle_FK_2` FOREIGN KEY (`operacion_id`) REFERENCES `operacion` (`id`),
  CONSTRAINT `operacion_detalle_FK_3` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operacion_detalle`
--

LOCK TABLES `operacion_detalle` WRITE;
/*!40000 ALTER TABLE `operacion_detalle` DISABLE KEYS */;
INSERT INTO `operacion_detalle` VALUES (3,2,1,1,NULL,100,100),(4,NULL,3,1,2,20,60),(6,4,1,2,NULL,5.5,5.5),(7,NULL,1,2,2,20,20),(8,6,112,3,NULL,1040.7,116558.4);
/*!40000 ALTER TABLE `operacion_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `operacion_pago`
--

DROP TABLE IF EXISTS `operacion_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operacion_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operacion_id` int(11) DEFAULT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `banco_id` int(11) DEFAULT NULL,
  `referencia` varchar(32) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operacion_pago_FI_1` (`operacion_id`),
  KEY `operacion_pago_FI_2` (`banco_id`),
  CONSTRAINT `operacion_pago_FK_1` FOREIGN KEY (`operacion_id`) REFERENCES `operacion` (`id`),
  CONSTRAINT `operacion_pago_FK_2` FOREIGN KEY (`banco_id`) REFERENCES `banco` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operacion_pago`
--

LOCK TABLES `operacion_pago` WRITE;
/*!40000 ALTER TABLE `operacion_pago` DISABLE KEYS */;
INSERT INTO `operacion_pago` VALUES (1,1,'2017-10-14 00:00:00',NULL,1,NULL,100),(2,1,'2017-10-14 00:00:00',NULL,1,NULL,10),(3,1,'2017-10-14 00:00:00',NULL,2,NULL,20),(4,1,'2017-10-14 00:00:00',NULL,2,NULL,30);
/*!40000 ALTER TABLE `operacion_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partida`
--

DROP TABLE IF EXISTS `partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `tipo` varchar(32) DEFAULT NULL,
  `identificador` int(11) DEFAULT NULL,
  `comentario` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partida`
--

LOCK TABLES `partida` WRITE;
/*!40000 ALTER TABLE `partida` DISABLE KEYS */;
INSERT INTO `partida` VALUES (1,'2017-10-15 00:00:00','Operacion',3,'Venta 3'),(2,'2017-10-15 00:00:00','Compra',2,'Compra 2');
/*!40000 ALTER TABLE `partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partida_detalle`
--

DROP TABLE IF EXISTS `partida_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partida_detalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partida_id` int(11) DEFAULT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `cuenta` varchar(50) DEFAULT NULL,
  `debito` double DEFAULT NULL,
  `credito` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `partida_detalle_FI_1` (`partida_id`),
  CONSTRAINT `partida_detalle_FK_1` FOREIGN KEY (`partida_id`) REFERENCES `partida` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partida_detalle`
--

LOCK TABLES `partida_detalle` WRITE;
/*!40000 ALTER TABLE `partida_detalle` DISABLE KEYS */;
INSERT INTO `partida_detalle` VALUES (1,1,'CLiente','',116558.4,0),(2,1,'Iva Credito','',0,13987.008),(3,1,'Ventas','',0,102571.392),(4,2,'Proveedores Locales','',0,100),(5,2,'Iva Por Cobrar','',12,0),(6,2,'Mobiliario Equipo','',88,0);
/*!40000 ALTER TABLE `partida_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(60) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL DEFAULT '',
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'01','Tornillo',10,1000),(2,'01','Desarmador',100,30),(3,'03','Poliducto',199,19),(4,'04','Metro Cable',5.5,300),(5,'05','Piso Metro',199,19999),(6,'19','Bomba Agua',1040.7,1000);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
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
INSERT INTO `propel_migration` VALUES (1508033853);
/*!40000 ALTER TABLE `propel_migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nit` varchar(60) DEFAULT NULL,
  `nombre_completo` varchar(260) NOT NULL DEFAULT '',
  `direccion` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'4912345-5','Distribuidora Mec','San Cristobal'),(2,'5548886-45','Qhubo Materia','Casa Hogar'),(3,'66788997-5','Escape Play','Calle de Arco'),(4,'66788997-5','Escape Play',''),(5,'66788997-5','Escape Play','');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(60) DEFAULT NULL,
  `nombre` varchar(260) NOT NULL DEFAULT '',
  `precio` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (1,'01','Entrega',100),(2,'Li','Limpieza',20);
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  `nombre_completo` varchar(320) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `llave` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'demo','89e495e7941cf9e40e6980d14a16bf023ccd4c91',NULL,NULL,NULL,0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2017-10-17 17:29:02
