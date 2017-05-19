-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: chatika
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB-

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
-- Table structure for table `admin_user`
--

DROP TABLE IF EXISTS `admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_user`
--

LOCK TABLES `admin_user` WRITE;
/*!40000 ALTER TABLE `admin_user` DISABLE KEYS */;
INSERT INTO `admin_user` VALUES (1,'daniel','5035fb0e3b7f7ca7cfc2177c7cfeae3ed34ed31e');
/*!40000 ALTER TABLE `admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Men',0),(2,'Women',0),(3,'Boys',0),(4,'Girls',0),(5,'Top',1),(6,'Pantalones',1),(7,'Zapatos',1),(8,'Accesorios',1),(9,'Top',2),(10,'Pantalones',2),(11,'Zapatos',2),(12,'Vestidos',2),(13,'Top',3),(14,'Pantalones',3),(15,'Vestidos',4),(16,'Zapatos',4),(17,'Accesorios',2);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_cat` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_desc` text,
  `product_image` text,
  `product_keywords` text,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'Men','Accesorios','Reloj de Pulso',60000.00,'Un reloj muy bonito para toda ocacion','acc-6-back.jpg','reloj, hombre, negro, bonito'),(3,'Women','Zapatos','Tacones Rojos',90000.00,'Tacones rojos para toda ocacion','acc-14-front.jpg','Tacones, Rojo, Mujer'),(4,'Men','Top','Chaqueta Jean',70000.00,'Chaqueta de jean muy bonita','4-back.jpg','Chaqueta, Jean, Hombre'),(6,'Men','Top','Chaqueta Negra',50000.00,'Chaqueta negra de Hombre','17-front.jpg','Chaqueta, Negra, Hombre'),(8,'Women','Top','Chaqueta de Cuero',23000.00,'La chaqueta es muy bonita comprala mientras puedas','12-front.jpg','Chaqueta, Cuero, Mujer'),(9,'Men','Top','Hoddie',22000.00,'El hoddie es muy bonito compralo mientras puedas','8-front.jpg','Hoddie, Bonito, Negro'),(10,'Men','Top','Buso',20000.00,'El buso es muy bonito compralo mientras puedas','3-front.jpg','Buso, Blanco, Hombre'),(11,'Men','Accesorios','Gafas',50000.00,'Las gafas son muy bonitas compralas mientras puedas','acc-1-back.jpg','Gafas, Bonitas, Negras, Hombre'),(12,'Men','Top','Chaqueta de Frio',90000.00,'Chaqueta de frio ultra resistente de color azul','s1.jpg','Chaqueta, Azul, Hombre, Frio'),(13,'Men','Pantalones','Pantalones Jean',60000.00,'Unos jeanes muy bonitos para cualquier ocasion','14-back.jpg','Pantalones, Jean, Azul'),(14,'Men','Zapatos','Zapatos de Cuero',70000.00,'Zapatos negros para hombre en diferentes tamanos','acc-8-back.jpg','Zapatos, Hombre, Cuero, Negros'),(15,'Women','Pantalones','Pantalones Azules',50000.00,'Pantalones de pana para mujer de color azul','15-front.jpg','Pantalones, Azul, Pana'),(16,'Women','Vestido','Vestido Aguamarina',60000.00,'Vestido aguamarina para mujer muy bonito','dress-test.jpg','Vestido, Aguamarina, Mujer, Bonito'),(17,'Women','Top','Chaqueta de Cuero Negra',50000.00,'Una chaquetq muy bonita','s11.jpg','Chaqueta, Cuero, Mujer, Negra'),(18,'Men','Accesorios','Corbata Negra',100000.00,'Una corbata muy bonita para hombre','acc-9-front.jpg','Corbata, Negra, Hombre, Accesorios'),(19,'Men','Top','Chaqueta Azul Clara',60000.00,'Una chaqueta de frio muy bonita azul clara','product-1.jpg','Chaqueta, Azul, Hombre, Frio'),(20,'Women','Top','Chaqueta de Cuero Roja',80000.00,'Una chaqueta roja muy bonita','product-11.jpg','Chaqueta, Cuero, Mujer, Roja'),(21,'Men','Top','Chaqueta Blanca',60000.00,'Una chaqueta blanca muy bonita','product-2.jpg','Chaqueta, Blanca, Hombre');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order`
--

LOCK TABLES `tbl_order` WRITE;
/*!40000 ALTER TABLE `tbl_order` DISABLE KEYS */;
INSERT INTO `tbl_order` VALUES (11,21,'2017-05-18','pending'),(12,21,'2017-05-18','pending'),(13,21,'2017-05-18','pending'),(14,21,'2017-05-18','pending'),(15,21,'2017-05-18','pending'),(16,21,'2017-05-18','pending'),(17,21,'2017-05-18','pending'),(18,21,'2017-05-18','pending'),(19,21,'2017-05-18','pending'),(20,21,'2017-05-18','pending'),(21,21,'2017-05-18','pending'),(22,21,'2017-05-18','pending'),(23,21,'2017-05-18','pending'),(24,21,'2017-05-18','pending');
/*!40000 ALTER TABLE `tbl_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order_details`
--

LOCK TABLES `tbl_order_details` WRITE;
/*!40000 ALTER TABLE `tbl_order_details` DISABLE KEYS */;
INSERT INTO `tbl_order_details` VALUES (4,11,'Reloj de Pulso',60000.00,2),(5,13,'Chaqueta Blanca',60000.00,1),(6,14,'Reloj de Pulso',60000.00,1),(7,15,'Gafas',50000.00,1),(8,19,'Chaqueta Jean',70000.00,1),(9,20,'Hoddie',22000.00,1),(10,21,'Gafas',50000.00,1),(11,22,'Chaqueta Azul Clara',60000.00,1),(12,23,'Reloj de Pulso',60000.00,6),(13,24,'Chaqueta de Frio',90000.00,2);
/*!40000 ALTER TABLE `tbl_order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (19,'daniel','daniel@daniel.com',NULL,NULL,NULL,NULL,'$2y$10$mEPuwfGZvE6rDPV9KUuqiuUfWHmoS4d6.nyrctTPFLtOKVL6Phqq6'),(20,'madre','madre@madre.com',NULL,NULL,NULL,NULL,'$2y$10$1Pvi/OvCzCrmGgqy6JsCFu3TnzPpXX1iLn.TtDKSPkVFZUp8p5mBG'),(21,'mabel','chatik91@gmail.com',NULL,NULL,NULL,NULL,'$2y$10$mf/0/RZAskadlvJ6eiUaROPFZF7jPbjSI.VXiUpcPGsJDlcVagyVe'),(22,'leonardo','leonardo@leonardo.com',NULL,NULL,NULL,NULL,'$2y$10$BnApQYCLwble3YrUBW.a1.tIFN4CCAnoqNM/p9FSY3g4kj7ETRCwy'),(25,'andres','andres@andres.com',NULL,NULL,NULL,NULL,'$2y$10$OrJxRp2vBo.x2WcKhkTRNON9o.eZHo6YLRvmfXp3zHzTacvKTXgoO'),(33,'felipe','dfap1991@gmail.com',NULL,NULL,NULL,NULL,'$2y$10$JnASKJifpbfbSWj9/qsftO7gsxJl/ZS4q/LaZvejOGrIs7KjAtSIK'),(34,'marinita','marinita@marinita.com',NULL,NULL,NULL,NULL,'$2y$10$sZ1EQ.w7HgMxrp1u7QEINO2smRcajIIUI9x42fn3iKcNgNI9SZCXO'),(36,'hpta','hpta@hpta.com',NULL,NULL,NULL,NULL,'$2y$10$90siNIbUi08b1b1OvRQku.HjgCBweEWbGkIJo17ijFS38ngjnh.2y'),(37,'sebastian','sebastian@sebastian.com',NULL,NULL,NULL,NULL,'$2y$10$9J/YjYeQNIwIxCMJ1HnW4uF7RNGXF8xlLrxyhEqxgf/2bp/f9vL5.'),(38,'sutanita','mabelyolanda@hotmail.com',NULL,NULL,NULL,NULL,'$2y$10$vXy5GhJix5877XQYB5LosO6LIx1zCnSvi3CX5V3D4eqeJbLGV2q7e'),(39,'chatika','chatika@chatika.com',NULL,NULL,NULL,NULL,'$2y$10$uFKNl0J7DnqI2RudNaUPT.k/eZhzjqDaWfkTlUqnLbrr8.ZujHqxy'),(41,'daniel','daniel@daniel.com',NULL,NULL,NULL,NULL,'$2y$10$9BaTWqQSK59Dd8anrgOz3.h6Bfll7PvaMhTvZfItD69Wu6nQOwqyG'),(43,'pochot','pochot@pochot.net',NULL,NULL,NULL,NULL,'$2y$10$M0w/VCaOLW8ethcWBPHKMueGO/rBTXL7uZSt6uIfH9QVg.rhVLn7q'),(44,'bob','bob@bob.com',NULL,NULL,NULL,NULL,'$2y$10$rzmeESE17EGj1.fT9CEEY.9.nlBpcVQmgPamEUqgALDgnCSulSUtu'),(46,'pip','pip@pip.com',NULL,NULL,NULL,NULL,'$2y$10$x.HhWcsxEGd8w3DWBaFzNerSMY2nFo39HpZ9O1R51d.d5fXA.nNG2'),(47,'pochot_mama','pochot_mama@pochot.net',NULL,NULL,NULL,NULL,'$2y$10$F7V3qtmItkJ4MllEwkRnsu/3tk.DcroaFf3UfYh03YeeduAhFcfna'),(48,'uuu','uuu@uu.com',NULL,NULL,NULL,NULL,'$2y$10$ntaeFWByYRFP8OUGmLk02.nhQlEBh4/TQQaeM9u3rbEnPdKVtWGTS'),(49,'daniel','hello@hello.com',NULL,NULL,NULL,NULL,'$2y$10$Mlm25AFSCKC1DZA.ZmFP/O4gZwRqgIHV8.velAT13F8LInc86jDGy'),(50,'dan','hello@dd.com',NULL,NULL,NULL,NULL,'$2y$10$/xiKCiRhPemOTP3IQKWKluqab1RCKA1WS/O4SRNygLJfFgdrV/EEq'),(51,'jose','jose@jose.com',NULL,NULL,NULL,NULL,'$2y$10$qlqu7YeJFyqkCaZeg6hAa.QoiVr0R2l40HSaBxMIwmLhtZ5f1glEC'),(53,'jose','jose@hotmail',NULL,NULL,NULL,NULL,'$2y$10$yB2cMyJKorx13NW79yXDDu4BL4Je8TV5LsQM93jjNlENg.ECD28q6'),(54,'felipito','hh@hh.com',NULL,NULL,NULL,NULL,'$2y$10$DhaMYZ0niYdZxGkwBrmnMOspAqwy7GY8yedOeFqUfJXLPb1fNQaMC'),(55,'sergio','sergio@sergio.com',NULL,NULL,NULL,NULL,'$2y$10$Aj.37LUBx/AJKAGD9o19qe9bDFkeRq8eUDPpQeYcL9qPtWtGNoqAq'),(56,'profe','profe@ecci.edu.co',NULL,NULL,NULL,NULL,'$2y$10$9vaxBwp.kCt/U4vJ4IO6WeAfrHevi6WVzNkbFGdGnWm7EfNlO6Rx6');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-18 22:12:39
