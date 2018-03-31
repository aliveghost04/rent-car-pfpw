-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: dbproyecto
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cargo`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Administrador','Persona que administra el Web Site'),(2,'Manejador','Personal Encargado de gestionar los vehiculos');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `cedula` char(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(150) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` char(10) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (8,'Cliente','Usuario','00102020004','cliente@localhost','cliente','e10adc3949ba59abbe56e057f20f883e','asd','M','8091233214'),(9,'Juan','Martinez','01010101010','jm@localhost','jm','e10adc3949ba59abbe56e057f20f883e','asd','M','8091234567');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_factura` (
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`,`id_producto`),
  CONSTRAINT `fk_detallefactura_idfactura` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  CONSTRAINT `fk_detallefactura_idproducto` FOREIGN KEY (`id_factura`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_factura`
--

LOCK TABLES `detalle_factura` WRITE;
/*!40000 ALTER TABLE `detalle_factura` DISABLE KEYS */;
INSERT INTO `detalle_factura` VALUES (25,15),(27,15),(28,29),(29,24),(30,10);
/*!40000 ALTER TABLE `detalle_factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrega` date NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `cantidad_dias` int(11) NOT NULL,
  `precio_total` decimal(13,2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_factura_idcliente` (`id_cliente`),
  CONSTRAINT `fk_factura_idcliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (4,'0000-00-00','0000-00-00',0,0.00,8),(5,'0000-00-00','0000-00-00',0,0.00,8),(6,'0000-00-00','0000-00-00',0,0.00,8),(7,'0000-00-00','0000-00-00',3,0.00,8),(8,'0000-00-00','0000-00-00',0,0.00,8),(9,'2014-04-06','0000-00-00',2,44.00,8),(10,'2014-04-12','2014-04-12',6,132.00,8),(11,'2014-04-16','2014-04-16',3,66.00,8),(12,'2014-04-13','0000-00-00',6,420.00,8),(13,'2014-04-19','2014-04-19',6,420.00,8),(14,'2014-04-14','2014-04-14',7,490.00,8),(15,'2014-04-08','2014-04-08',2,120.00,8),(16,'2014-04-13','2014-04-18',5,375.00,8),(17,'2014-04-13','2014-04-15',2,160.00,8),(18,'2014-04-14','2014-04-18',4,240.00,8),(19,'2014-04-14','2014-04-18',4,240.00,8),(20,'2014-04-13','2014-04-16',3,180.00,8),(21,'2014-04-13','2014-04-16',3,180.00,8),(22,'2014-04-13','2014-04-16',3,180.00,8),(24,'0000-00-00','0000-00-00',0,0.00,8),(25,'2014-04-13','2014-04-14',1,60.00,8),(26,'2014-04-13','2014-04-13',0,0.00,8),(27,'2014-04-13','2014-04-15',2,120.00,8),(28,'2014-04-06','2014-04-09',3,270.00,8),(29,'2014-04-16','2014-04-20',4,180.00,9),(30,'2014-11-15','2014-11-25',10,220.00,8),(31,'2014-02-27','2014-03-04',5,0.00,8);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(60) NOT NULL,
  `modelo` varchar(60) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  `descripcion` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `modelo` (`modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (9,'Kia','Sorento-2010','images/coches/imag1.jpg',70.00,1,'Transmision:AutomaticaTraccion:TraseraCombustible:OtrosCilindros:4Puertas:5'),(10,'Toyota','Camry 88','images/coches/88camry.jpg',22.00,0,'Toyota Camry del 88, Automatico, Gasolina'),(16,'Honda','CR-V-2008','images/coches/imag3.jpg',50.00,1,'Transmision:AutomaticaTraccion:DelanteraCombustible:GasolinaCilindros:4Puertas:5'),(17,'Kia','Optima-2011','images/coches/imag4.jpg',75.00,1,'Puertas:4Cilindros:4Transmision:AutomaticaTraccion:DelanteraCombustible:Otros'),(18,'Mercedes Benz','S500-2007','images/coches/imag5.jpg',50.00,1,'Puertas:4Cilindros:6Transmision:AutomaticaTraccion:DelanteraCombustible:Gasolina'),(19,'Toyota','Hilux-2014','images/coches/imag6.jpg',80.00,0,'HiluxPuertas:4Cilindros:4Transmision:AutomaticaTraccion:4x4Combustible:Diesel'),(20,'Kia','Sportage-2011','images/coches/imag7.jpg',80.00,1,'Puertas:5Cilindros:4Transmision:AutomaticaTraccion:4x4Combustible:Gasolina'),(21,'Ford','Escape-2009','images/coches/imag8.jpg',65.00,1,'Cilindros:6Puertas:5Transmision:AutomaticaTraccion:4x4Combustible:Gasolina'),(22,'Hyundai','Tucson-2012','images/coches/imag9.jpg',85.00,1,'Cilindros:4\r\nPuertas:5\r\nTransmisión:Automatica\r\nTraccion:Delantera\r\nCombustible:Gasolina\r\n'),(23,'Jeep','Laredo-2011','images/coches/imag10.jpg',55.00,1,'Cilindros:6\r\nPuertas:5\r\nTransmisión:Automatica\r\nTraccion:4x4\r\nCombustible:Gasolina\r\n'),(24,'Toyota','Matrix-2005','images/coches/imag11.jpg',45.00,0,'Cilindros:4\r\nPuertas:4\r\nTransmisión:Automatica\r\nTraccion:Delantera\r\nCombustible:Gasolina\r\n'),(25,'Hyundai','Sonata-2008','images/coches/imag12.jpg',45.00,1,'Cilindros:4\r\nPuertas:4\r\nTransmisión:Automatica\r\nTraccion:Delantera\r\nCombustible:Otros\r\n'),(27,'Kia','Sportage-2012','images/coches/imag13.jpg',80.00,1,'Cilindros:6\r\nPuertas:5\r\nTransmisión:Automatica\r\nTraccion:4x4\r\nCombustible:Gasolina\r\n'),(28,'Hyundai','Santa Fe-2010','images/coches/imag14.jpg',70.00,1,'Cilindros:6\r\nPuertas:5\r\nTransmisión:Automatica\r\nTraccion:4x4\r\nCombustible:Diesel\r\n'),(29,'Lexus','GX-470-2011','images/coches/imag15.jpg',90.00,0,'Cilindros:8\r\nPuertas:5\r\nTransmisión:Automatica\r\nTraccion:4x4\r\nCombustible:Gasolina\r\n'),(30,'Toyota','Land-Cruiser-2011','images/coches/imag16.jpg',65.00,1,'Cilindros:8\r\nPuertas:5\r\nTransmisión:Automatica\r\nTraccion:4x4\r\nCombustible:Diesel\r\n'),(32,'Lexus','GX-470-2010','images/coches/imag17.jpg',80.00,1,'Cilindros:8\r\nPuertas:5\r\nTransmisión:Automatica\r\nTraccion:4x4\r\nCombustible:Gasolina\r\n'),(33,'Lexus',':is250-2010','images/coches/imag18.jpg',65.00,1,'Cilindros:6\r\nPuertas:2\r\nTransmisión:Automatica\r\nTraccion:Delantera\r\nCombustible:Gasolina\r\n'),(34,'Honda','Accord-2009','images/coches/imag19.jpg',55.00,1,'Transmisión:Automatica\r\nCilindros:6\r\nPuertas:2\r\nTraccion:Delantera\r\nCombustible:Gasolina\r\n');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `telefono` char(10) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `cedula` char(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(150) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `foto` varchar(250) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `cedula` (`cedula`,`correo`,`usuario`),
  UNIQUE KEY `cedula_2` (`cedula`),
  KEY `fk_usuarios_idcargo` (`id_cargo`),
  CONSTRAINT `fk_usuarios_idcargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Admin','User','8091231234','c/ Av 27 #16','00101010004','admin@localhost','M','admin','e10adc3949ba59abbe56e057f20f883e',1,'images/usuarios/528261_753827797977794_915565906_n.jpg');
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

-- Dump completed on 2018-03-31  2:46:25
