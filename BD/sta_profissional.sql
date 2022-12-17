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
-- Table structure for table `profissional`
--

DROP TABLE IF EXISTS `profissional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profissional` (
  `id_profissional` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomeProfissional` varchar(200) DEFAULT NULL,
  `rg` varchar(200) DEFAULT NULL,
  `cpf` varchar(200) DEFAULT NULL,
  `numcrefito` varchar(200) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `celular` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `rua` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `numero` varchar(200) DEFAULT NULL,
  `cep` varchar(200) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_profissional`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissional`
--

LOCK TABLES `profissional` WRITE;
/*!40000 ALTER TABLE `profissional` DISABLE KEYS */;
INSERT INTO `profissional` VALUES (3,'Potatinha Gado1','Potatinha Gado','Potatinha Gado','Potatinha Gado\'','2003-05-23','Potatinha Gado','Potatinha Gado','potatinha@gmail.com','Potatinha Gado','Potatinha Gado','Potatinha Gado','Potatinha Gado','Potatinha Gado','Potatinha Gado','Potatinha Gado','Potatinha Gado','Potatinha Gado'),(4,'Lorena Roberts','Lorena Roberts','Lorena Roberts','Lorena Roberts','2002-08-05','Lorena Roberts','Lorena Roberts','lorwenis@gmail.com','Lorena Roberts','Lorena Roberts','Lorena Roberts','Lorena Roberts','Lorena Roberts','Lorena Roberts','Lorena Roberts','Lorena Roberts','Lorena Roberts'),(6,'Valdeci','Valdeci','Valdeci','Valdeci','2003-01-13','Valdeci','Valdeci','valdeci@gmail.com','Valdeci','Valdeci','Valdeci','Valdeci','Valdeci','Valdeci','Valdeci','Valdeci','Valdeci'),(9,'Caue1','Caue','Caue','Caue','2003-01-13','Caue','Caue','Caue@gmail.com','Caue','Caue','Caue','Caue','Caue','Caue','Caue','Caue','Caue'),(10,'Vania Rodrigues1','666666661','666666661','RB666666661','2003-01-13','989898981','989898981','hitman32@gmail.com1','23232311','Carlópolis1','paraná1','Brasil1','Sla21','Sla31','Sla51','86420-0001','Casa1'),(12,'Logar121','9999991','99999999','Logar','3220-01-13','','9999999999999999','logar@gmail.com','logar',NULL,NULL,'Logar','Logar','Logar','999999999999','9999999999','Logar'),(13,'José de Alencar','76799585055','76799585055','TO-86419','1990-01-13','35661964','43988429509','jose@gmail.com','jose','Carlópolis','Paraná','Brasil','Jacaranda Mimoso','Jardim Vista Alegre','247','86420000','Casa'),(14,'André Giron','150658985','13550854978','2020','2003-01-13','35661964','988429509','agl-clps@hotmail.com','2020','Carlópolis','Paraná','Brasil','Jacaranda Mimoso','Jardim Vista Alegre','247','8642000','casa'),(15,'Lorena Roberta Fogaça','99999999999','99999999999','PR - 99999','2002-05-02','4335661964','43991502477','lorena@gmail.com','lorena','Maringá','Paraná','Brasil','Rua Lorena','Bairro Lorena','999','87065200','Ap. da Lorena'),(17,'Elismar Reis','9999999999','9999999999','PR-8080','2003-01-13','9999999','9999999','elismar@gmail.com','elismar','Jacarezinho','Paraná','Brasil','Rua Elismar','Bairro Elismar','999','8640000','Casa Elismar');
/*!40000 ALTER TABLE `profissional` ENABLE KEYS */;
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
