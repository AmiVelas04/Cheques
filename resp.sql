-- MariaDB dump 10.17  Distrib 10.4.15-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: chequesbd
-- ------------------------------------------------------
-- Server version	10.4.15-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
  `ID_BANCO` int(10) NOT NULL,
  `NOMBRE` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIRECCION` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_BANCO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco`
--

LOCK TABLES `banco` WRITE;
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
INSERT INTO `banco` VALUES (1,'BAC','');
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banco_cuenta`
--

DROP TABLE IF EXISTS `banco_cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banco_cuenta` (
  `ID_CUENTA` int(11) NOT NULL,
  `ID_BANCO` int(10) NOT NULL,
  PRIMARY KEY (`ID_CUENTA`,`ID_BANCO`),
  KEY `FK_REFERENCE_12` (`ID_BANCO`),
  CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_CUENTA`) REFERENCES `cuenta` (`ID_CUENTA`),
  CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`ID_BANCO`) REFERENCES `banco` (`ID_BANCO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco_cuenta`
--

LOCK TABLES `banco_cuenta` WRITE;
/*!40000 ALTER TABLE `banco_cuenta` DISABLE KEYS */;
INSERT INTO `banco_cuenta` VALUES (1,1);
/*!40000 ALTER TABLE `banco_cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `ID_BITACORA` int(11) NOT NULL,
  `FECHA` datetime DEFAULT NULL,
  `DETALLE` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_BITACORA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cheque`
--

DROP TABLE IF EXISTS `cheque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cheque` (
  `ID_CHEQUE` int(11) NOT NULL,
  `FECHA` datetime DEFAULT NULL,
  `MONTO` decimal(10,2) DEFAULT NULL,
  `BENEFICIARIO` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTADO` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `LIBERO` varchar(100) COLLATE utf8_spanish_ci DEFAULT '"Sin liberacion"',
  PRIMARY KEY (`ID_CHEQUE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cheque`
--

LOCK TABLES `cheque` WRITE;
/*!40000 ALTER TABLE `cheque` DISABLE KEYS */;
INSERT INTO `cheque` VALUES (1,'2021-05-17 00:00:00',75000.00,'Estadio','Pendiente','yo'),(2,'2021-05-27 00:00:00',75000.00,'Estadio','Pendiente',''),(3,'2021-05-17 00:00:00',5000.00,'internet','Pendiente',''),(4,'2021-05-17 00:00:00',75000.00,'Jhonny','Pendiente',''),(5,'2021-05-17 00:00:00',300.00,'Lenovo','Pendiente',''),(6,'2021-05-17 00:00:00',3000.00,'Jhonny','Pendiente',''),(7,'2021-05-17 00:00:00',3000.00,'Estadio','Generado','Admin'),(8,'2021-05-17 00:00:00',300.00,'Lenovo','Generado','Admin');
/*!40000 ALTER TABLE `cheque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cheque_cheq`
--

DROP TABLE IF EXISTS `cheque_cheq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cheque_cheq` (
  `ID_CHEQUERA` int(11) NOT NULL,
  `ID_CHEQUE` int(11) NOT NULL,
  PRIMARY KEY (`ID_CHEQUERA`,`ID_CHEQUE`),
  KEY `FK_REFERENCE_8` (`ID_CHEQUE`),
  CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_CHEQUERA`) REFERENCES `chequera` (`ID_CHEQUERA`),
  CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_CHEQUE`) REFERENCES `cheque` (`ID_CHEQUE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cheque_cheq`
--

LOCK TABLES `cheque_cheq` WRITE;
/*!40000 ALTER TABLE `cheque_cheq` DISABLE KEYS */;
INSERT INTO `cheque_cheq` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8);
/*!40000 ALTER TABLE `cheque_cheq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chequera`
--

DROP TABLE IF EXISTS `chequera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chequera` (
  `ID_CHEQUERA` int(11) NOT NULL,
  `ESTADO` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANTIDAD` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID_CHEQUERA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chequera`
--

LOCK TABLES `chequera` WRITE;
/*!40000 ALTER TABLE `chequera` DISABLE KEYS */;
INSERT INTO `chequera` VALUES (1,'Activo',159);
/*!40000 ALTER TABLE `chequera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `NOMBRE` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIRECCION` varchar(175) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DPI` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta` (
  `ID_CUENTA` int(11) NOT NULL,
  `NUM_CUENTA` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `SALDO` decimal(15,2) DEFAULT NULL,
  `TIPO` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTADO` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_CUENTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES (1,'0101010102',75000.22,'Bancaria','Activa');
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_chequ`
--

DROP TABLE IF EXISTS `cuenta_chequ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta_chequ` (
  `ID_CUENTA` int(11) NOT NULL,
  `ID_CHEQUERA` int(11) NOT NULL,
  PRIMARY KEY (`ID_CUENTA`,`ID_CHEQUERA`),
  KEY `FK_REFERENCE_6` (`ID_CHEQUERA`),
  CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_CUENTA`) REFERENCES `cuenta` (`ID_CUENTA`),
  CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`ID_CHEQUERA`) REFERENCES `chequera` (`ID_CHEQUERA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_chequ`
--

LOCK TABLES `cuenta_chequ` WRITE;
/*!40000 ALTER TABLE `cuenta_chequ` DISABLE KEYS */;
INSERT INTO `cuenta_chequ` VALUES (1,1);
/*!40000 ALTER TABLE `cuenta_chequ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_cli`
--

DROP TABLE IF EXISTS `cuenta_cli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta_cli` (
  `ID_CLIENTE` int(11) NOT NULL,
  `ID_CUENTA` int(11) NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`,`ID_CUENTA`),
  KEY `FK_REFERENCE_10` (`ID_CUENTA`),
  CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`ID_CUENTA`) REFERENCES `cuenta` (`ID_CUENTA`),
  CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_CLIENTE`) REFERENCES `cliente` (`ID_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_cli`
--

LOCK TABLES `cuenta_cli` WRITE;
/*!40000 ALTER TABLE `cuenta_cli` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuenta_cli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nivel`
--

DROP TABLE IF EXISTS `nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nivel` (
  `ID_NIVEL` int(11) NOT NULL,
  `NIVEL` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DETALLE` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`ID_NIVEL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nivel`
--

LOCK TABLES `nivel` WRITE;
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usu_bita`
--

DROP TABLE IF EXISTS `usu_bita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_bita` (
  `ID_USU` int(11) NOT NULL,
  `ID_BITACORA` int(11) NOT NULL,
  PRIMARY KEY (`ID_USU`,`ID_BITACORA`),
  KEY `FK_REFERENCE_4` (`ID_BITACORA`),
  KEY `ID_USU` (`ID_USU`),
  CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_USU`) REFERENCES `usuario` (`ID_USU`),
  CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_BITACORA`) REFERENCES `bitacora` (`ID_BITACORA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_bita`
--

LOCK TABLES `usu_bita` WRITE;
/*!40000 ALTER TABLE `usu_bita` DISABLE KEYS */;
/*!40000 ALTER TABLE `usu_bita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usu_nivel`
--

DROP TABLE IF EXISTS `usu_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usu_nivel` (
  `ID_USU` int(11) NOT NULL,
  `ID_NIVEL` int(11) NOT NULL,
  PRIMARY KEY (`ID_USU`,`ID_NIVEL`),
  KEY `FK_REFERENCE_2` (`ID_NIVEL`),
  CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_USU`) REFERENCES `usuario` (`ID_USU`),
  CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_NIVEL`) REFERENCES `nivel` (`ID_NIVEL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usu_nivel`
--

LOCK TABLES `usu_nivel` WRITE;
/*!40000 ALTER TABLE `usu_nivel` DISABLE KEYS */;
/*!40000 ALTER TABLE `usu_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID_USU` int(11) NOT NULL,
  `NOMBRE` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `USUARIO` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PASS` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MONTO` decimal(12,2) DEFAULT NULL,
  `NIVEL` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Admin','Admin','0000',4500.00,1),(2,'Mio','LOL','12345678',75000.00,3),(3,'Personal','Persona','12345678',31578.00,2),(4,'Antonio','AntCheques','Cheques100',7000.00,2);
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

-- Dump completed on 2021-05-17 15:51:09
