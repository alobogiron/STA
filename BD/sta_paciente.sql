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
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paciente` (
  `id_paciente` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomePaciente` varchar(200) DEFAULT NULL,
  `cpf` varchar(200) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(200) DEFAULT NULL,
  `celular` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `nomePai` varchar(200) DEFAULT NULL,
  `nomeMae` varchar(200) DEFAULT NULL,
  `contatoPai` varchar(200) DEFAULT NULL,
  `contatoMae` varchar(200) DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `estado` varchar(200) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `rua` varchar(200) DEFAULT NULL,
  `bairro` varchar(200) DEFAULT NULL,
  `numero` varchar(200) DEFAULT NULL,
  `cep` varchar(200) DEFAULT NULL,
  `complemento` varchar(200) DEFAULT NULL,
  `dtPrimeiroCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusPaciente` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (4,'Alice Godoi2','1111','1220-02-05','','11111','alice@gmail.com','Alice Godoi','Alice Godoi','Alice Godoi','Alice Godoi',NULL,NULL,'Argentina','Alice Godoi','Alice Godoi','111','1111','Alice Godoi','2021-05-26 13:47:01','Ativo'),(11,'Leticia1','Leticia','2003-01-13','Leticia','Leticia','Leticia@gmail.com','Leticia','Leticia','Leticia','Leticia','Leticia','Leticia','Leticia','Leticia','Leticia','Leticia1','Leticia','Leticia','2021-05-31 13:08:52','Ativo'),(12,'Dirce','Dirce','2003-01-13','Dirce','Dirce','Dirce@gmail.com','Dirce','Dirce','Dirce','Dirce','Dirce','Dirce','Dirce','Dirce','Dirce','Dirce','Dirce','Dirce','2021-06-02 22:38:04','Ativo'),(13,'Estevan1','Estevan','2003-01-13','Estevan','Estevan','Estevan@gmail.com','Estevan','Estevan','Estevan','Estevan','Estevan','Estevan','Estevan','Estevan','Estevan','Estevan','Estevan','Estevan','2021-06-22 13:47:15','Ativo'),(17,'Héber',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-09-23 08:47:40','Ativo'),(18,'Ademilson12','1111','2002-01-13','','1111','asdsadas@gmail.com','Ademilson','Ademilson','Ademilson','Ademilson',NULL,NULL,'Barein','Ademilson','Ademilson','247','86420000','Ademilson','2021-10-29 13:24:01','Ativo'),(20,'Milene1','212321321321321','2021-11-19','8888888888888888','99999999','milene@gmail.com','55555555555555','Mae Milene','5555555555555555','Cel MileneMae','...','...','...','Rua Milene','Bairro Milene','888','2312132132','Casa Milene','2021-11-02 20:58:25','Ativo'),(21,'Noemia Cesarião','2222222','2021-11-26','99999999999999','99999999','noemicesario02@gmail.com','Noemi Pai','Noemi Mae','Cel NoemiPai','CelNoemiMae','...','...','...','Rua Noemi','Bairro Noemi','111','23232323','Casa Noemi','2021-11-02 21:02:06','Ativo'),(22,'Lafael Poc','21321312','2003-01-13','','21321321','lafael@gmail.com','','','','','...','...','...','Rua Rafael','Bairro rafael','222','2321312','Casa rafael','2021-11-02 21:05:16','Ativo'),(23,'Kamila','9999999','1990-01-05','9999999999','99999999999','kamila@gmail','Kamila Pai','Kamila Mãe','Cel KamilaPai','Cel KamilaMae','...','...','...','Rua Kamila','Bairro Kamila','999','8666666','Casa Kamila','2021-11-03 11:35:37','Ativo'),(24,'Zé1','99999','2555-05-15','','5555555','','','','','',NULL,NULL,'Bélgica','213213','213213','213213','86','213123','2021-11-03 18:59:36','Ativo'),(25,'May','999999','2003-01-13','','999999','may@gmail.com','','','','',NULL,NULL,'Bélgica','Rua May','Bairro May','289','554594654','Casa May','2021-11-04 12:10:53','Ativo'),(26,'Giron','91676470972','2003-01-13','','999999','giron@gmail.com','','José de Alencar','','','Carlópolis','Paraná','Brasil','Jacaranda Mimoso','Jardim Vista Alegre','247','86420000','Casa','2021-11-04 12:11:59','Ativo'),(27,'Herick','21321312','1000-02-01','9999','999999','dsadas@gmail','','','','',NULL,NULL,'Bangladesh','asddasdass','sadasd','845454','86420000','asdasdasdas','2021-11-09 21:21:15','Ativo'),(28,'dasdasdas','21312321','2021-11-18','','23121312','','','','','','Bezerros','Pernambuco','Brasil','saddasdas','asdasdasd','213123','785456456','sdadsadas','2021-11-11 18:24:29','Ativo'),(29,'Luiz Gabriel Santin','999999','2003-08-12','4335661964','43998484845','luiz@gmail.com','Pai Santin','Mãe Santin','9999999','9999999','Abatiá','Paraná','Brasil','Rua Santin','Bairro santin','8999','86460000','Casa santin','2021-11-12 14:58:12','Ativo'),(30,'Pedro Cardoso Arantes','999999','2002-10-29','4335661274','43998293020','pedro@gmail.com','Pai batata','Mae batata','9999999','999999999','Santo Antônio da Platina','Paraná','Brasil','Rua Batata','Bairro Batata','999','86430000','Casa Batata','2021-11-12 15:01:23','Ativo'),(31,'caue','9999999','2003-01-13','999999999999','999999999999','agl-clps@hotmail.com','Caue pai','caue mae','999999999','9999999999','Jacarezinho','Paraná','Brasil','Rua caue','Bairro caue','999','8640000','casa','2021-12-06 13:29:32','Ativo'),(32,'Maria Laura','13550854978','2003-01-13','99999999999','9999999999999','marialaura@gmail.com','Marilau pai','Marilau mae','999999999999','99999999999999','Jacarezinho','Paraná','Brasil','Rua Marilau','Bairro Marilau','9999','8640000','Casa Marilau','2021-12-07 11:27:44','Ativo');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
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
