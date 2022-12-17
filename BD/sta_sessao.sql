-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sta
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `sessao`
--

DROP TABLE IF EXISTS `sessao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessao` (
  `id_sessao` bigint unsigned NOT NULL AUTO_INCREMENT,
  `statusSessao` varchar(200) DEFAULT NULL,
  `fk_id_profissional` bigint unsigned NOT NULL,
  `fk_id_paciente` bigint unsigned NOT NULL,
  `dataSessao` datetime DEFAULT NULL,
  `codSessao` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id_sessao`),
  UNIQUE KEY `codSessao` (`codSessao`),
  KEY `fk_id_profissional` (`fk_id_profissional`),
  KEY `fk_id_paciente` (`fk_id_paciente`),
  CONSTRAINT `sessao_ibfk_1` FOREIGN KEY (`fk_id_profissional`) REFERENCES `profissional` (`id_profissional`),
  CONSTRAINT `sessao_ibfk_2` FOREIGN KEY (`fk_id_paciente`) REFERENCES `paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessao`
--

LOCK TABLES `sessao` WRITE;
/*!40000 ALTER TABLE `sessao` DISABLE KEYS */;
INSERT INTO `sessao` VALUES (13,'Fechada',9,12,'2021-07-06 00:00:00','6acd3a2b'),(14,'Disponível',4,13,'2021-07-07 00:00:00','6acd85cc'),(18,'Disponível',3,13,'2003-01-13 00:00:00','6b72d1b0'),(19,'Disponível',4,12,'2003-01-13 00:00:00','73a7f90e'),(20,'Fechada',12,4,'2021-09-13 00:00:00','a30f5565'),(24,'Fechada',12,4,'2021-01-23 00:00:00','ce0c2f8a'),(25,'Disponível',13,13,'2021-10-29 11:30:00','575debf2'),(26,'Disponível',4,4,'2021-10-29 15:39:00','4af65cec'),(27,'Fechada',12,18,'2021-10-29 15:20:00','63db97cf'),(28,'Fechada',12,18,'2021-10-29 22:18:00','5c179dbe'),(30,'Disponível',12,18,'2021-10-30 11:58:00','114290dd'),(31,'Disponível',12,4,'2021-11-01 11:45:00','ef2f9e7d'),(32,'Disponível',13,12,'2021-11-01 10:59:00','55797c6e'),(33,'Disponível',13,13,'2021-11-01 11:05:00','143b8a96'),(34,'Disponível',13,11,'2021-11-01 14:16:00','f2bd3716'),(35,'teste',13,17,'2021-11-01 20:15:00','37f3885e'),(36,'Disponível',4,24,'2021-11-01 17:45:00','6c9fd8c9'),(37,'Disponível',9,25,'2021-11-05 14:23:00','ebd91ea3'),(38,'Disponível',9,25,'2021-11-27 08:17:00','f7d38d78'),(39,'Disponível',12,25,'2021-11-05 19:18:00','20b1c170'),(40,'Disponível',6,20,'2021-11-07 20:49:00','28d54b38'),(41,'Disponível',12,27,'2021-11-09 21:21:00','0785013d'),(42,'Disponível',12,23,'2021-11-10 16:15:00','1a6a4916'),(43,'Disponível',12,12,'2021-11-10 15:16:00','2186646e'),(44,'Disponível',12,12,'2021-11-10 15:57:00','9372be8f'),(45,'Disponível',12,28,'2021-11-11 18:24:00','af7150d1'),(46,'Disponível',12,12,'2021-11-11 16:25:00','b4eb9ae3'),(48,'Fechada',15,29,'2021-11-12 12:11:00','dd7bf128'),(50,'Fechada',15,29,'2021-11-12 16:08:00','fdd785ee'),(51,'Fechada',15,29,'2021-11-12 16:44:00','013674c5'),(52,'Fechada',15,29,'2021-11-13 09:19:00','1c80f86e'),(55,'Fechada',15,29,'2021-11-24 09:39:00','babd7be6'),(56,'Fechada',15,30,'2021-11-13 12:55:00','14a677cb'),(57,'Fechada',15,30,'2021-11-18 09:56:00','22a0b18c'),(63,'Fechada',15,21,'2021-12-05 21:56:00','99fc7492'),(68,'Fechada',15,20,'2021-12-05 22:11:00','6c6d1a76'),(71,'Disponível',10,22,'2021-12-06 15:11:00','196ccad0'),(72,'Disponível',15,4,'2021-12-06 12:12:00','203b46ab'),(74,'Fechada',15,31,'2021-12-06 10:29:00','927164df'),(75,'Fechada',15,29,'2021-12-06 11:32:00','033fa8b2'),(76,'Fechada',15,25,'2021-12-06 14:04:00','6f4edaa2'),(77,'Fechada',15,32,'2021-12-07 14:11:00','90ae93d4'),(78,'Disponível',15,12,'2021-12-07 14:10:00','966ff3d1');
/*!40000 ALTER TABLE `sessao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-10 11:33:33
