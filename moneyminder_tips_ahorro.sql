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
-- Table structure for table `tips_ahorro`
--

DROP TABLE IF EXISTS `tips_ahorro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tips_ahorro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `imagen_url` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tips_ahorro`
--

LOCK TABLES `tips_ahorro` WRITE;
/*!40000 ALTER TABLE `tips_ahorro` DISABLE KEYS */;
INSERT INTO `tips_ahorro` VALUES (1,'Consejo 1','\"img/tip de ahorro 1.jpeg\"','Crear un presupuesto mensual es una de las mejores formas de mantener tus finanzas bajo control. Comienza por listar todos tus ingresos y gastos, y asigna un límite de gasto para cada categoría. Asegúrate de incluir un apartado para el ahorro, idealmente al menos el 10% de tus ingresos. Revisar y ajustar tu presupuesto regularmente te ayudará a identificar áreas donde puedes reducir gastos y aumentar tu ahorro.'),(2,'Consejo 2','\"img/tip de ahorro 2.jpeg\"','Reduce Gastos en Comestibles.Planifica tus comidas con anticipación y haz una lista de compras antes de ir al supermercado. Evita comprar por impulso y opta por productos de marca propia que suelen ser más económicos. Comprar a granel y aprovechar las ofertas y cupones también puede generar un ahorro significativo. Además, cocinar en casa en lugar de comer fuera puede reducir considerablemente tus gastos en alimentación.'),(3,'Consejo 3','\"img/tip de ahorro 3.jpeg\"','Minimiza el Uso de Tarjetas de Crédito.Las tarjetas de crédito pueden ser útiles, pero también pueden llevar a gastos innecesarios y deudas. Intenta usar efectivo para tus compras diarias para ser más consciente de cuánto estás gastando. Si usas una tarjeta de crédito, paga el saldo completo cada mes para evitar cargos por intereses. Considera tener solo una tarjeta de crédito para emergencias y reducir la tentación de gastar más de lo necesario.'),(4,'Consejo 4','\"img/tip de ahorro 4.jpeg\"','Aprovecha los Programas de Fidelidad y Descuentos.Muchos comercios y servicios ofrecen programas de fidelidad que recompensan tus compras con descuentos, puntos o recompensas. Inscríbete en estos programas y utilízalos cada vez que compres. Además, busca descuentos y promociones antes de hacer una compra significativa. Utilizar aplicaciones de comparación de precios puede ayudarte a encontrar las mejores ofertas y ahorrar una cantidad considerable de dinero a largo plazo.');
/*!40000 ALTER TABLE `tips_ahorro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-18 17:07:12
