/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.16-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_ef
-- ------------------------------------------------------
-- Server version	10.11.16-MariaDB-ubu2204

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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `estado` tinyint(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES
(1,'Botines con Punta de Acero','Calzado de Seguridad',350.00,'Botines de cuero vacuno con puntera de acero reforzada, suela antideslizante y dieléctrica.',20,1,'2026-04-06 23:03:19','2026-04-06 23:03:19'),
(2,'Casco de Seguridad ABS','Protección Craneal',85.00,'Casco de alta resistencia con suspensión de 6 puntos. Ajuste de trinquete. Color amarillo.',10,1,'2026-04-06 23:04:31','2026-04-06 23:04:31'),
(3,'Overol Térmico Impermeable','Ropa de Trabajo',420.00,'Overol azul industrial con cintas reflectantes de 2\", forro térmico para bajas temperaturas.',30,1,'2026-04-06 23:05:14','2026-04-06 23:05:14'),
(4,'Guantes de Nitrilo High-Grip','Protección Manual',45.00,'Guantes resistentes a químicos y aceites, excelente agarre en superficies mojadas. Talla L.',50,1,'2026-04-06 23:06:03','2026-04-06 23:06:03'),
(5,'Chaleco Reflectivo Clase 2','Alta Visibilidad',60.00,'Chaleco de malla naranja con bandas reflectantes tipo H. Ideal para construcción y vialidad.',60,1,'2026-04-06 23:06:38','2026-04-06 23:06:38');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `language` varchar(10) DEFAULT 'es',
  `rol` varchar(20) DEFAULT 'cliente',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Carlos','Jaure','carlos@gmail.com','70917437','$2y$12$zxBgjxNLFz4PCOGYY.N9oONBdkbIdMkyQqMUxVvPqzsuN3u1y6MM.','es','cliente','2026-04-06 22:59:19','2026-04-06 22:59:19'),
(2,'Daniel','Admin','daniel@gmail.com','12345678','$2y$12$zxBgjxNLFz4PCOGYY.N9oONBdkbIdMkyQqMUxVvPqzsuN3u1y6MM.','es','admin','2026-04-07 08:30:00','2026-04-07 08:30:00'),
(3,'juan','lijeron','juan@gmail.com','70042464','$2y$12$HWUC1ud2648zwvUxM42FeOzSKCX2d91aaLkk.nvGitwx9uema4JrK','es','admin','2026-04-07 12:38:31','2026-04-07 12:38:31'),
(4,'jefe','supremo','jefe@gmail.com','90909090','$2y$12$6ISy0r8v4qJbqKjY86/Uf.1TRj69qF.VMSJf64iSvoxgnNHFaLhAG','es','admin','2026-04-07 12:44:21','2026-04-07 12:44:21'),
(5,'invitado','humilde','invitado@gmail.com','404040','$2y$12$aohfKG1k6PjSE.loZSxSq.SYrdn6Q7jiiu36l9rey5VgJY6PjWgui','es','cliente','2026-04-07 12:59:32','2026-04-07 12:59:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-07 13:33:32
