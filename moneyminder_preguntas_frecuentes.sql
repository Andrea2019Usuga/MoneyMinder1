-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: moneyminder
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `preguntas_frecuentes`
--

DROP TABLE IF EXISTS `preguntas_frecuentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preguntas_frecuentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) NOT NULL,
  `respuesta` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas_frecuentes`
--

LOCK TABLES `preguntas_frecuentes` WRITE;
/*!40000 ALTER TABLE `preguntas_frecuentes` DISABLE KEYS */;
INSERT INTO `preguntas_frecuentes` VALUES (1,'¿Cómo funciona esta aplicación para ayudarme a ahorrar dinero?','Esta aplicación web funciona como una agenda de ahorro personal. Te permite agregar tus ingresos y gastos, establecer metas de ahorro específicas y te proporciona consejos útiles sobre cómo mejorar tus hábitos financieros. Al llevar un registro detallado de tus finanzas, puedes identificar áreas donde puedes reducir gastos y ahorrar más eficazmente.\r\n\r\n.'),(2,'¿Cómo puedo realizar un seguimiento de mis ingresos?','Puedes realizar un seguimiento de tus ingresos ingresándolos manualmente en la sección de ingresos de la aplicación. Además, la aplicación te permite categorizar tus ingresos para que puedas tener un mejor control y visión de tus fuentes de dinero, facilitando así el cumplimiento de tus metas de ahorro.'),(3,'¿Qué debo hacer si tengo problemas técnicos?','Si experimentas problemas técnicos, primero revisa la sección de Soporte y Ayuda en la aplicación, donde encontrarás respuestas a preguntas frecuentes y guías para resolver problemas comunes.'),(4,'¿Cómo se asegura la aplicación sobre la protección de mis datos?','La aplicación utiliza encriptación de datos y almacenamiento seguro para proteger tu información financiera. Además, cumple con estrictas políticas de privacidad para garantizar que tus datos personales no sean compartidos con terceros sin tu consentimiento. Estas medidas aseguran que tu información esté segura mientras utilizas la aplicación para gestionar tu ahorro personal.');
/*!40000 ALTER TABLE `preguntas_frecuentes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-18 17:07:11
