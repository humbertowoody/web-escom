-- MySQL dump 10.13  Distrib 8.0.27, for macos12.0 (arm64)
--
-- Host: localhost    Database: proyecto_web
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `proyecto_web`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `proyecto_web` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `proyecto_web`;

--
-- Table structure for table `bloques`
--

DROP TABLE IF EXISTS `bloques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bloques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_grupo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bloques`
--

LOCK TABLES `bloques` WRITE;
/*!40000 ALTER TABLE `bloques` DISABLE KEYS */;
INSERT INTO `bloques` VALUES (1,'Historia de ADOO','En este bloque se visualiza la historia del ADOO',2),(2,'Semiología del ADOO','En este bloque se visualiza la semiología del ADOO',2),(4,'Bloque de Prueba','holaaaaa',4),(5,'CSS','Explicar CSS y que se entienda',1);
/*!40000 ALTER TABLE `bloques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dudas`
--

DROP TABLE IF EXISTS `dudas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dudas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `resuelta` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dudas`
--

LOCK TABLES `dudas` WRITE;
/*!40000 ALTER TABLE `dudas` DISABLE KEYS */;
INSERT INTO `dudas` VALUES (1,'humberto','humberto@gmail.com','prueba1','es una prueba',1),(2,'gerardo','gerardo@gmail.com','test','lolaklsdfjñalsdkfj',0),(3,'lulu','lulu@gmail.com','testalsj','alñksdfj ',1),(4,'batman','batman@gmail.co','alsdkfj','alksdjflkasdfjklasdjfk',0),(5,'juan','juan@gmail.com','testing','lol',1),(6,'Popó','popo@gmail.com','popooooo','Quiero aprender a hacer popó.',1),(7,'HumberAlumno ortegaaa alcocinar','alumno@gmail.com','Duda con Wikipedia [1]','Mi pregunta es...',1),(8,'HumberAlumno ortegaaa alcocinar','alumno@gmail.com','Duda con YouTube [2]','Mi pregunta es... asñldkfj',0);
/*!40000 ALTER TABLE `dudas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupos`
--

DROP TABLE IF EXISTS `grupos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupos`
--

LOCK TABLES `grupos` WRITE;
/*!40000 ALTER TABLE `grupos` DISABLE KEYS */;
INSERT INTO `grupos` VALUES (1,'Tecnologías para la Web 2.0'),(2,'ADOO v3'),(4,'Temas Selectos de Animé'),(6,' añlsdfkjasTemas de matebrúticas');
/*!40000 ALTER TABLE `grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiales`
--

DROP TABLE IF EXISTS `materiales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materiales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) NOT NULL DEFAULT 'URL',
  `url` text NOT NULL,
  `id_subtema` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiales`
--

LOCK TABLES `materiales` WRITE;
/*!40000 ALTER TABLE `materiales` DISABLE KEYS */;
INSERT INTO `materiales` VALUES (1,'Wikipedia','link de wikipedia cool','URL','https://wikipedia.com',6),(2,'YouTube','link de youtube','VIDEO','https://www.youtube.com/embed/ySDX02WD0og',6),(3,'PDF E-Book','un libro en pdf','PDF','https://students.iusb.edu/academic-success-programs/academic-centers-for-excellence/docs/Basic%20Math%20Review%20Card.pdf',6);
/*!40000 ALTER TABLE `materiales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progresos`
--

DROP TABLE IF EXISTS `progresos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `progresos` (
  `id_usuario` int NOT NULL,
  `id_material` int NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progresos`
--

LOCK TABLES `progresos` WRITE;
/*!40000 ALTER TABLE `progresos` DISABLE KEYS */;
INSERT INTO `progresos` VALUES (1,1,'2022-01-04 00:13:22'),(1,2,'2022-01-04 00:13:22'),(1,3,'2022-01-04 00:13:22'),(7,1,'2022-01-04 01:55:58'),(7,1,'2022-01-04 02:32:16');
/*!40000 ALTER TABLE `progresos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subtemas`
--

DROP TABLE IF EXISTS `subtemas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subtemas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_tema` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subtemas`
--

LOCK TABLES `subtemas` WRITE;
/*!40000 ALTER TABLE `subtemas` DISABLE KEYS */;
INSERT INTO `subtemas` VALUES (1,'subtema1t1','prueba',1),(2,'subtema2t1','pruebaaaa',1),(3,'subtema1t2','probando',2),(4,'subtema1t3','probandoooo',6),(6,'subtema1t6','csssss',6),(7,'subtema1t4','otro añlsdfjk',4),(8,'SubTema para CSS','este subtema está para probar',6);
/*!40000 ALTER TABLE `subtemas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temas`
--

DROP TABLE IF EXISTS `temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_bloque` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temas`
--

LOCK TABLES `temas` WRITE;
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
INSERT INTO `temas` VALUES (1,'Tema 1','Bloque 1',1),(2,'Tema 2','Bloque 1',1),(3,'Tema 3','Bloque 1',1),(4,'Tema 4','Este es otro tema',1),(6,'CSS básico 1','El alumno verá funcionalidades básicas de CSS',5);
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ap_pat` varchar(100) DEFAULT NULL,
  `ap_mat` varchar(100) DEFAULT NULL,
  `correo_principal` varchar(100) NOT NULL,
  `correo_secundario` varchar(100) DEFAULT NULL,
  `tipo_usuario` varchar(100) NOT NULL DEFAULT 'ALUMNO',
  `numero_identificador` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `id_grupo` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Humberto Alejandro','Ortega','Alcocer','humbertoalejandroortegalcocer@gmail.com','humbertowoody@gmail.com','ADMINISTRADOR','2016630495jj','12345678',2),(6,'HumberProfe','Profeee','Alcocer','profe@gmail.com','profe2@hotmail.com','PROFESOR','12341234','12341234',2),(7,'HumberAlumno','ortegaaa','alcocinar','alumno@gmail.com','alumno2@hotmail.com','ALUMNO','12341234','12341234',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-04 16:32:09
