-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: bdfarmawill
-- ------------------------------------------------------
-- Server version	9.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `twl_categorias`
--

DROP TABLE IF EXISTS `twl_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_categorias` (
  `c_idcategoria` int NOT NULL AUTO_INCREMENT,
  `c_desc` varchar(50) DEFAULT NULL,
  `c_tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`c_idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_categorias`
--

LOCK TABLES `twl_categorias` WRITE;
/*!40000 ALTER TABLE `twl_categorias` DISABLE KEYS */;
INSERT INTO `twl_categorias` VALUES (1,'categoría 1','SIN RECETA'),(2,'categoría 2','PEDIR RECETA'),(3,'categoría 13','PEDIR RECETA');
/*!40000 ALTER TABLE `twl_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_cierrecaja`
--

DROP TABLE IF EXISTS `twl_cierrecaja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_cierrecaja` (
  `c_ID_Cierre` int NOT NULL AUTO_INCREMENT,
  `c_fechacierre` datetime DEFAULT NULL,
  `c_idusuariocierre` int DEFAULT NULL,
  `c_Total_Final` float DEFAULT NULL,
  `c_Comentarios` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`c_ID_Cierre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_cierrecaja`
--

LOCK TABLES `twl_cierrecaja` WRITE;
/*!40000 ALTER TABLE `twl_cierrecaja` DISABLE KEYS */;
INSERT INTO `twl_cierrecaja` VALUES (1,'2025-03-04 22:02:45',1,0,'Primera apertura automática'),(2,'2025-03-05 00:39:21',1,80.5,'apertura caja'),(3,'2025-03-05 21:27:38',1,161,'apertura caja'),(4,'2025-03-06 22:20:25',1,116.5,'apertura caja'),(5,'2025-03-06 22:41:36',1,26,'apertura caja'),(6,'2025-03-06 22:48:41',1,23,'apertura caja'),(7,NULL,NULL,230,'apertura caja');
/*!40000 ALTER TABLE `twl_cierrecaja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_clientes`
--

DROP TABLE IF EXISTS `twl_clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_clientes` (
  `c_idcliente` int NOT NULL AUTO_INCREMENT,
  `c_iddni` varchar(20) DEFAULT NULL,
  `c_nombres` varchar(100) DEFAULT NULL,
  `c_direccion` varchar(100) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`c_idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_clientes`
--

LOCK TABLES `twl_clientes` WRITE;
/*!40000 ALTER TABLE `twl_clientes` DISABLE KEYS */;
INSERT INTO `twl_clientes` VALUES (1,NULL,'cliente general',NULL,NULL,NULL),(2,NULL,'Cliente 2',NULL,NULL,NULL),(4,NULL,'pepito general',NULL,NULL,NULL),(5,NULL,'prueba cliente',NULL,NULL,NULL),(6,NULL,'prueba cliente',NULL,NULL,NULL),(7,NULL,'probando cliente 2',NULL,NULL,NULL),(8,NULL,'12312312',NULL,NULL,NULL);
/*!40000 ALTER TABLE `twl_clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_doctor`
--

DROP TABLE IF EXISTS `twl_doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_doctor` (
  `c_iddoctor` int NOT NULL AUTO_INCREMENT,
  `c_cmp` varchar(20) DEFAULT NULL,
  `c_nombres` varchar(100) DEFAULT NULL,
  `c_especialidad` varchar(50) DEFAULT NULL,
  `c_direccion` varchar(50) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`c_iddoctor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_doctor`
--

LOCK TABLES `twl_doctor` WRITE;
/*!40000 ALTER TABLE `twl_doctor` DISABLE KEYS */;
INSERT INTO `twl_doctor` VALUES (1,NULL,'Doctor1','medicina general',NULL,NULL,NULL),(2,NULL,'doctor2','medicina general 2',NULL,NULL,NULL),(3,NULL,'doctor 1','medico',NULL,NULL,NULL),(4,NULL,'doctor prueba','medicina',NULL,NULL,NULL),(5,NULL,'doctor_pre','medicina general',NULL,NULL,NULL);
/*!40000 ALTER TABLE `twl_doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_laboratorio`
--

DROP TABLE IF EXISTS `twl_laboratorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_laboratorio` (
  `c_idlaboratorio` int NOT NULL AUTO_INCREMENT,
  `c_desc` varchar(50) DEFAULT NULL,
  `c_tipo` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`c_idlaboratorio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_laboratorio`
--

LOCK TABLES `twl_laboratorio` WRITE;
/*!40000 ALTER TABLE `twl_laboratorio` DISABLE KEYS */;
INSERT INTO `twl_laboratorio` VALUES (1,'laboratorio 1','COMERCIAL'),(2,'laboratorio 2','COMERCIAL'),(3,'laboratorio 3','COMERCIAL');
/*!40000 ALTER TABLE `twl_laboratorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_permisos`
--

DROP TABLE IF EXISTS `twl_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_permisos` (
  `c_idpermiso` int NOT NULL AUTO_INCREMENT,
  `c_nombre` varchar(100) DEFAULT NULL,
  `c_categoria` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`c_idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_permisos`
--

LOCK TABLES `twl_permisos` WRITE;
/*!40000 ALTER TABLE `twl_permisos` DISABLE KEYS */;
INSERT INTO `twl_permisos` VALUES (1,'inicio','General'),(2,'caja','General'),(3,'vender','General'),(4,'productos','General'),(5,'categorias','Catalogos'),(6,'laboratorios','Catalogos'),(7,'clientes','Catalogos'),(8,'doctores','Catalogos'),(9,'proveedores','Catalogos'),(10,'inventario','Almacen'),(11,'reabastecimiento','Almacen'),(12,'pedidos','Almacen'),(13,'guia_remision','Almacen'),(14,'reporte_venta','Reportes'),(15,'reporte_cliente','Reportes'),(16,'reporte_doctor','Reportes'),(17,'reporte_usuario','Reportes'),(18,'admin_roles','Administracion');
/*!40000 ALTER TABLE `twl_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_presentacion`
--

DROP TABLE IF EXISTS `twl_presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_presentacion` (
  `id_presentacion` int NOT NULL AUTO_INCREMENT,
  `c_idunidadmedida` int DEFAULT NULL,
  `c_idproducto` int DEFAULT NULL,
  `c_preciocompra` float DEFAULT NULL,
  `c_gananciaunidad` float DEFAULT NULL,
  `c_cantidadunidad` float DEFAULT NULL,
  `c_preciounidad` float DEFAULT NULL,
  `c_comisionunidad` float DEFAULT NULL,
  PRIMARY KEY (`id_presentacion`),
  KEY `c_idunidadmedida` (`c_idunidadmedida`),
  KEY `c_idproducto` (`c_idproducto`),
  CONSTRAINT `twl_presentacion_ibfk_1` FOREIGN KEY (`c_idunidadmedida`) REFERENCES `twl_unidadmedida` (`c_idunidadmedida`),
  CONSTRAINT `twl_presentacion_ibfk_2` FOREIGN KEY (`c_idproducto`) REFERENCES `twl_productos` (`c_idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_presentacion`
--

LOCK TABLES `twl_presentacion` WRITE;
/*!40000 ALTER TABLE `twl_presentacion` DISABLE KEYS */;
INSERT INTO `twl_presentacion` VALUES (20,2,5,50,15,NULL,57.5,NULL),(21,3,6,0.5,20,NULL,0.6,NULL),(22,9,6,NULL,NULL,50,15,20),(23,4,6,NULL,NULL,30,10,5),(24,4,5,NULL,NULL,50,15,20),(25,13,7,20,15,NULL,23,NULL),(26,1,8,20,15,NULL,23,NULL),(27,1,9,50,15,NULL,57.5,NULL);
/*!40000 ALTER TABLE `twl_presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_productos`
--

DROP TABLE IF EXISTS `twl_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_productos` (
  `c_idproducto` int NOT NULL AUTO_INCREMENT,
  `c_codigobarras` varchar(30) DEFAULT NULL,
  `c_nombre` varchar(30) DEFAULT NULL,
  `c_idcategoria` int DEFAULT NULL,
  `c_idlaboratorio` int DEFAULT NULL,
  `c_idproveedor` int DEFAULT NULL,
  `c_principal` varchar(100) DEFAULT NULL,
  `c_presentacion` varchar(100) DEFAULT NULL,
  `c_registrosanitario` varchar(50) DEFAULT NULL,
  `c_ubicacion` varchar(30) DEFAULT NULL,
  `c_lote` varchar(30) DEFAULT NULL,
  `c_fechavenc` datetime DEFAULT NULL,
  `c_minimaeninv` float DEFAULT NULL,
  `c_inventarioini` float DEFAULT NULL,
  `c_imagen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`c_idproducto`),
  KEY `c_idcategoria` (`c_idcategoria`),
  KEY `c_idlaboratorio` (`c_idlaboratorio`),
  KEY `c_idproveedor` (`c_idproveedor`),
  CONSTRAINT `twl_productos_ibfk_1` FOREIGN KEY (`c_idcategoria`) REFERENCES `twl_categorias` (`c_idcategoria`),
  CONSTRAINT `twl_productos_ibfk_2` FOREIGN KEY (`c_idlaboratorio`) REFERENCES `twl_laboratorio` (`c_idlaboratorio`),
  CONSTRAINT `twl_productos_ibfk_3` FOREIGN KEY (`c_idproveedor`) REFERENCES `twl_proveedor` (`c_idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_productos`
--

LOCK TABLES `twl_productos` WRITE;
/*!40000 ALTER TABLE `twl_productos` DISABLE KEYS */;
INSERT INTO `twl_productos` VALUES (5,NULL,'ibuprofeno',1,1,1,NULL,NULL,'Registro Sanitario','almacen',NULL,'2025-02-26 00:00:00',NULL,15,NULL),(6,NULL,'producto 2',1,1,1,NULL,NULL,NULL,NULL,NULL,'2025-02-25 00:00:00',NULL,80,NULL),(7,NULL,'ibuprofeno 2',1,1,1,NULL,NULL,NULL,NULL,NULL,'2025-02-28 00:00:00',NULL,41,NULL),(8,'789456','producto prueba 1',1,1,1,NULL,'Presentación','Registro Sanitario','caja 1','lote 1','2025-03-10 00:00:00',NULL,5,'1741296824_favicon.png'),(9,NULL,'producto prueba 5',1,1,1,NULL,NULL,NULL,NULL,NULL,'2026-01-13 00:00:00',NULL,146,NULL);
/*!40000 ALTER TABLE `twl_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_proveedor`
--

DROP TABLE IF EXISTS `twl_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_proveedor` (
  `c_idproveedor` int NOT NULL AUTO_INCREMENT,
  `c_ruc` varchar(20) DEFAULT NULL,
  `c_desc` varchar(100) DEFAULT NULL,
  `c_direccion` varchar(50) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`c_idproveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_proveedor`
--

LOCK TABLES `twl_proveedor` WRITE;
/*!40000 ALTER TABLE `twl_proveedor` DISABLE KEYS */;
INSERT INTO `twl_proveedor` VALUES (1,NULL,'Proveedor 1',NULL,NULL,NULL),(2,NULL,'proveedor prueba',NULL,NULL,NULL),(4,NULL,'proveedor prueba 2',NULL,NULL,NULL);
/*!40000 ALTER TABLE `twl_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_rol_permisos`
--

DROP TABLE IF EXISTS `twl_rol_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_rol_permisos` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_idrol` int DEFAULT NULL,
  `c_idpermiso` int DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  KEY `c_idrol` (`c_idrol`),
  KEY `c_idpermiso` (`c_idpermiso`),
  CONSTRAINT `twl_rol_permisos_ibfk_1` FOREIGN KEY (`c_idrol`) REFERENCES `twl_roles` (`c_idrol`) ON DELETE CASCADE,
  CONSTRAINT `twl_rol_permisos_ibfk_2` FOREIGN KEY (`c_idpermiso`) REFERENCES `twl_permisos` (`c_idpermiso`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_rol_permisos`
--

LOCK TABLES `twl_rol_permisos` WRITE;
/*!40000 ALTER TABLE `twl_rol_permisos` DISABLE KEYS */;
INSERT INTO `twl_rol_permisos` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(7,1,7),(8,1,8),(9,1,9),(10,1,10),(11,1,11),(12,1,12),(13,1,13),(14,1,14),(15,1,15),(16,1,16),(17,1,17),(18,1,18),(32,2,2);
/*!40000 ALTER TABLE `twl_rol_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_roles`
--

DROP TABLE IF EXISTS `twl_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_roles` (
  `c_idrol` int NOT NULL AUTO_INCREMENT,
  `c_descr` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`c_idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_roles`
--

LOCK TABLES `twl_roles` WRITE;
/*!40000 ALTER TABLE `twl_roles` DISABLE KEYS */;
INSERT INTO `twl_roles` VALUES (1,'Administrador'),(2,'cajero');
/*!40000 ALTER TABLE `twl_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_tipodocumento`
--

DROP TABLE IF EXISTS `twl_tipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_tipodocumento` (
  `c_tipodoc` int NOT NULL AUTO_INCREMENT,
  `c_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`c_tipodoc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_tipodocumento`
--

LOCK TABLES `twl_tipodocumento` WRITE;
/*!40000 ALTER TABLE `twl_tipodocumento` DISABLE KEYS */;
INSERT INTO `twl_tipodocumento` VALUES (1,'Nota de venta'),(2,'Factura'),(3,'Boleta');
/*!40000 ALTER TABLE `twl_tipodocumento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_tipopago`
--

DROP TABLE IF EXISTS `twl_tipopago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_tipopago` (
  `c_tipopago` int NOT NULL AUTO_INCREMENT,
  `c_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`c_tipopago`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_tipopago`
--

LOCK TABLES `twl_tipopago` WRITE;
/*!40000 ALTER TABLE `twl_tipopago` DISABLE KEYS */;
INSERT INTO `twl_tipopago` VALUES (1,'Efectivo'),(2,'Crédito'),(3,'Tarjeta'),(4,'Yape'),(5,'Plin'),(6,'Mixto');
/*!40000 ALTER TABLE `twl_tipopago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_unidadmedida`
--

DROP TABLE IF EXISTS `twl_unidadmedida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_unidadmedida` (
  `c_idunidadmedida` int NOT NULL AUTO_INCREMENT,
  `c_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`c_idunidadmedida`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_unidadmedida`
--

LOCK TABLES `twl_unidadmedida` WRITE;
/*!40000 ALTER TABLE `twl_unidadmedida` DISABLE KEYS */;
INSERT INTO `twl_unidadmedida` VALUES (1,'UNIDAD'),(2,'AMPOLLA'),(3,'BLISTER'),(4,'CAJA'),(5,'CAPSULA'),(6,'COMPRIMIDO'),(7,'FRASCO'),(8,'LATA'),(9,'PACK'),(10,'PAQUETE'),(11,'POTE'),(12,'SACHET'),(13,'SOBRE'),(14,'TABLETA'),(15,'TUBO');
/*!40000 ALTER TABLE `twl_unidadmedida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_usuario_roles`
--

DROP TABLE IF EXISTS `twl_usuario_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_usuario_roles` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_idusuario` int DEFAULT NULL,
  `c_idrol` int DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  KEY `c_idusuario` (`c_idusuario`),
  KEY `c_idrol` (`c_idrol`),
  CONSTRAINT `twl_usuario_roles_ibfk_1` FOREIGN KEY (`c_idusuario`) REFERENCES `twl_usuarios` (`c_idusuario`) ON DELETE CASCADE,
  CONSTRAINT `twl_usuario_roles_ibfk_2` FOREIGN KEY (`c_idrol`) REFERENCES `twl_roles` (`c_idrol`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_usuario_roles`
--

LOCK TABLES `twl_usuario_roles` WRITE;
/*!40000 ALTER TABLE `twl_usuario_roles` DISABLE KEYS */;
INSERT INTO `twl_usuario_roles` VALUES (1,1,1),(2,2,2);
/*!40000 ALTER TABLE `twl_usuario_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_usuarios`
--

DROP TABLE IF EXISTS `twl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_usuarios` (
  `c_idusuario` int NOT NULL AUTO_INCREMENT,
  `c_nombre` varchar(30) DEFAULT NULL,
  `c_apellidos` varchar(100) DEFAULT NULL,
  `c_login` varchar(30) DEFAULT NULL,
  `c_pass` varchar(30) DEFAULT NULL,
  `c_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`c_idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_usuarios`
--

LOCK TABLES `twl_usuarios` WRITE;
/*!40000 ALTER TABLE `twl_usuarios` DISABLE KEYS */;
INSERT INTO `twl_usuarios` VALUES (1,'Admin','Administrador','admin','admin',1),(2,'cajero prueba',NULL,'cajero','cajero123',1);
/*!40000 ALTER TABLE `twl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_venta`
--

DROP TABLE IF EXISTS `twl_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_venta` (
  `c_idventa` int NOT NULL AUTO_INCREMENT,
  `c_iddoctor` int DEFAULT NULL,
  `c_idcliente` int DEFAULT NULL,
  `c_tipodoc` int DEFAULT NULL,
  `c_descuentoADI` float DEFAULT NULL,
  `c_tipopago` int DEFAULT NULL,
  `c_subtotal` float DEFAULT NULL,
  `c_descuento` float DEFAULT NULL,
  `c_igv` float DEFAULT NULL,
  `c_total` float DEFAULT NULL,
  `c_idusuario` int DEFAULT NULL,
  `c_fecharegistro` datetime DEFAULT NULL,
  `c_detalle` varchar(250) DEFAULT NULL,
  `c_ID_Cierre` int DEFAULT NULL,
  PRIMARY KEY (`c_idventa`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_venta`
--

LOCK TABLES `twl_venta` WRITE;
/*!40000 ALTER TABLE `twl_venta` DISABLE KEYS */;
INSERT INTO `twl_venta` VALUES (1,1,1,1,0,1,57.5,0,0,57.5,1,'2025-03-03 22:34:08',NULL,1),(2,1,1,1,0,1,80.5,0,0,80.5,1,'2025-03-03 22:37:50',NULL,1),(3,1,1,1,20,1,195.5,20,0,175.5,1,'2025-03-04 22:05:25',NULL,2),(4,1,1,1,0,1,80.5,0,0,80.5,1,'2025-03-05 00:33:45',NULL,2),(5,1,1,1,0,1,57.5,0,0,57.5,1,'2025-03-05 00:42:40',NULL,3),(6,1,1,1,0,1,103.5,0,0,103.5,1,'2025-03-05 00:44:57',NULL,3),(7,1,1,1,10,1,80.5,10,0,70.5,1,'2025-03-05 21:34:36',NULL,4),(8,1,1,1,10,1,46,10,0,36,1,'2025-03-06 21:37:55',NULL,4),(9,1,1,1,0,1,23,0,0,23,1,'2025-03-06 22:39:34',NULL,5),(10,1,1,1,20,1,23,20,0,3,1,'2025-03-06 22:40:07',NULL,5),(11,1,1,1,0,1,23,0,0,23,1,'2025-03-06 22:46:52',NULL,6),(12,1,1,1,0,1,115,0,0,115,1,'2025-03-11 22:45:08',NULL,7),(13,1,1,1,0,1,57.5,0,0,57.5,1,'2025-03-12 05:21:54',NULL,7),(14,1,1,1,0,1,57.5,0,0,57.5,1,'2025-03-13 12:54:36',NULL,7);
/*!40000 ALTER TABLE `twl_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `twl_ventadet`
--

DROP TABLE IF EXISTS `twl_ventadet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `twl_ventadet` (
  `c_idventadet` int NOT NULL AUTO_INCREMENT,
  `c_idventa` int DEFAULT NULL,
  `c_cantidad` float DEFAULT NULL,
  `c_idunidadmedida` int DEFAULT NULL,
  `c_ididproducto` int DEFAULT NULL,
  `c_Preciounitario` float DEFAULT NULL,
  `c_preciototal` float DEFAULT NULL,
  `c_Desc` float DEFAULT NULL,
  PRIMARY KEY (`c_idventadet`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `twl_ventadet`
--

LOCK TABLES `twl_ventadet` WRITE;
/*!40000 ALTER TABLE `twl_ventadet` DISABLE KEYS */;
INSERT INTO `twl_ventadet` VALUES (1,1,1,2,5,57.5,57.5,0),(2,2,1,2,5,57.5,57.5,0),(3,2,1,13,7,23,23,0),(4,3,3,2,5,57.5,172.5,0),(5,3,1,13,7,23,23,0),(6,4,1,13,7,23,23,0),(7,4,1,2,5,57.5,57.5,0),(8,5,1,2,5,57.5,57.5,0),(9,6,2,13,7,23,46,0),(10,6,1,2,5,57.5,57.5,0),(11,7,1,2,5,57.5,57.5,0),(12,7,1,13,7,23,23,0),(13,8,2,1,8,23,46,0),(14,9,1,1,8,23,23,0),(15,10,1,1,8,23,23,0),(16,11,1,1,8,23,23,0),(17,12,2,1,9,57.5,115,0),(18,13,1,1,9,57.5,57.5,0),(19,14,1,1,9,57.5,57.5,0);
/*!40000 ALTER TABLE `twl_ventadet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-21 16:30:37
