CREATE DATABASE  IF NOT EXISTS `[nome_banco_dados]` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `[nome_banco_dados]`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: us-cdbr-iron-east-05.cleardb.net    Database: [nome_banco_dados]
-- ------------------------------------------------------
-- Server version	5.6.36-log

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (11,'Festival',NULL,'2017-11-22 20:51:50','2017-11-22 21:22:41',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,'Casa do Gustavo','Aguas Claras','61999922222','70999222','Brasilia','Distrito Federal','Brasil','A','2017-05-17 13:40:26','2017-05-17 13:40:26','2017-05-17 13:40:26'),(2,'Invalidos','Rua dos inválidos','21980625453','21060090','Rio de Janeiro','RJ','Brasil','1','2017-05-19 16:54:25','2017-06-16 21:42:39',NULL),(3,'Morro da Urca','Urca','222','222','Rio de Janeiro','RJ','Brasil','2','2017-08-12 01:18:32','2017-08-12 01:18:32',NULL),(11,'Campo Grande','Rua Campo Grande','21988136716','23033-280','RIO DE JANEIRO','Rio de Janeiro','10','2','2017-11-22 20:47:47','2017-11-22 20:48:33',NULL);
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_user_signature`
--

DROP TABLE IF EXISTS `log_user_signature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_user_signature` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_accession_pagseguro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_accession_pagseguro` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_tickets_redeemed` int(11) NOT NULL DEFAULT '0',
  `next_payment_date_pagseguro` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=632 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_user_signature`
--

LOCK TABLES `log_user_signature` WRITE;
/*!40000 ALTER TABLE `log_user_signature` DISABLE KEYS */;
INSERT INTO `log_user_signature` VALUES (441,11,1191,'ACTIVE','9EE4E0CDD7D7BAD6646DEFB6DB3EB8DB',0,'2018-02-23 11:25:52','2018-02-21 11:28:07','2018-02-21 11:28:07',NULL),(451,11,1191,'ACTIVE','9EE4E0CDD7D7BAD6646DEFB6DB3EB8DB',1,'2018-02-23 11:25:52','2018-02-21 11:28:16',NULL,NULL),(461,11,1191,'ACTIVE','9EE4E0CDD7D7BAD6646DEFB6DB3EB8DB',2,'2018-02-23 11:25:52','2018-02-21 11:29:00',NULL,NULL),(471,5,1191,'ACTIVE','97907224C0C0376FF40A6F9F61C8A401',0,'2018-03-24 11:48:46','2018-02-21 11:50:29','2018-02-21 11:50:29',NULL),(481,5,1191,'ACTIVE','97907224C0C0376FF40A6F9F61C8A401',0,'2018-03-24 11:48:46','2018-02-21 11:50:32','2018-02-21 11:50:32',NULL),(491,5,1191,'ACTIVE','6C1B4E077C7C09A884622FAA8F89D605',0,'2018-03-24 11:50:46','2018-02-21 11:52:40','2018-02-21 11:52:40',NULL),(492,11,1192,'ACTIVE','6E1DB49FB7B708799405FFA5969FBDAB',0,'2018-02-24 13:42:53','2018-02-22 13:46:50','2018-02-22 13:46:50',NULL),(502,11,1192,'ACTIVE','6E1DB49FB7B708799405FFA5969FBDAB',1,'2018-02-24 13:42:53','2018-02-22 23:46:33',NULL,NULL),(511,11,1201,'ACTIVE','608632AF5757FBA334945FAEE8BEC5BF',0,'2018-03-03 20:17:40','2018-03-01 20:19:08','2018-03-01 20:19:08',NULL),(521,11,1,'ACTIVE','CBC3B85861615ED2245ACF8C6CF1C3F7',0,'2018-03-03 21:38:57','2018-03-01 21:41:02','2018-03-01 21:41:02',NULL),(531,11,1,'ACTIVE','CBC3B85861615ED2245ACF8C6CF1C3F7',1,'2018-03-03 21:38:57','2018-03-01 21:41:35',NULL,NULL),(541,5,1,'ACTIVE','3F2B90FC383878BDD4445FA47525DD75',0,'2018-03-03 21:36:10','2018-03-01 21:51:07','2018-03-01 21:51:07',NULL),(551,6,1,'ACTIVE','E3001578A2A249E994940FA9838FCB74',0,'2018-03-03 21:23:46','2018-03-01 21:53:55','2018-03-01 21:53:55',NULL),(561,6,1211,'ACTIVE','C5871F7F8888979DD41D2FA65EA14949',0,'2018-03-03 21:58:35','2018-03-01 22:00:58','2018-03-01 22:00:58',NULL),(571,6,1211,'ACTIVE','C5871F7F8888979DD41D2FA65EA14949',1,'2018-03-03 21:58:35','2018-03-01 22:01:32',NULL,NULL),(581,6,1211,'ACTIVE','C5871F7F8888979DD41D2FA65EA14949',2,'2018-03-03 21:58:35','2018-03-01 22:12:00',NULL,NULL),(591,11,1201,'ACTIVE','608632AF5757FBA334945FAEE8BEC5BF',1,'2018-03-03 20:17:40','2018-03-03 10:06:08',NULL,NULL),(601,11,1201,'ACTIVE','608632AF5757FBA334945FAEE8BEC5BF',2,'2018-03-03 20:17:40','2018-03-03 10:08:09',NULL,NULL),(611,11,1201,'ACTIVE','608632AF5757FBA334945FAEE8BEC5BF',0,'2018-03-10 22:17:40','2018-03-05 13:59:57','2018-03-05 13:59:57',NULL),(621,11,1201,'ACTIVE','608632AF5757FBA334945FAEE8BEC5BF',1,'2018-03-10 22:17:40','2018-03-05 13:59:57',NULL,NULL),(631,11,1201,'ACTIVE','608632AF5757FBA334945FAEE8BEC5BF',2,'2018-03-10 22:17:40','2018-03-05 14:00:25',NULL,NULL);
/*!40000 ALTER TABLE `log_user_signature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_13_100000_create_category_table',1),(4,'2015_03_12_210941_create_products_table',1),(5,'2015_09_24_210941_create_orders_table',1),(10,'2015_09_26_210941_create_local_table',4),(11,'2017_05_16_212110_alter_product_table',4),(12,'2017_05_17_160942_create_subscription_table',5),(13,'2017_05_17_160945_create_user_subscription_table',5),(14,'2015_09_24_210941_create_type_assign_table',6),(15,'2015_09_24_210942_create_assign_table',6),(16,'2015_09_25_210942_create_user_assign_table',6),(17,'2017_05_18_172434_add_collumns_product_table',6),(18,'2017_05_18_180008_add_collumns_product_table',7),(19,'2017_06_28_174835_alter_subscription_table',8),(20,'2017_07_03_204453_create_product_redeem_table',8),(25,'2017_08_04_124352_inclui_facebook_id',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_transaction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_foreign_idx` (`user_id`),
  KEY `subscription_id_foreign_idx` (`subscription_id`),
  CONSTRAINT `subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_detail`
--

DROP TABLE IF EXISTS `payment_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recurrence_id` int(10) unsigned NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recurrence_id_foreign_idx` (`recurrence_id`),
  CONSTRAINT `recurrence_id_foreign` FOREIGN KEY (`recurrence_id`) REFERENCES `recurrence` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_detail`
--

LOCK TABLES `payment_detail` WRITE;
/*!40000 ALTER TABLE `payment_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `pic_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (12,24,'/upload_pics/2.jpg','2017-08-22 14:58:21',NULL,NULL),(13,17,'/upload_pics/7.jpg','2017-08-22 14:59:25',NULL,NULL),(14,5,'/upload_pics/6.jpg','2017-08-22 15:01:45',NULL,NULL),(18,26,'/upload_pics/5.jpg','2017-08-23 01:19:47',NULL,NULL),(21,51,'/upload_pics/1.jpg','2017-11-22 21:13:34',NULL,NULL),(31,61,'/upload_pics/2.jpg','2017-11-22 21:14:01',NULL,NULL),(41,71,'/upload_pics/3.jpg','2017-11-22 21:14:23',NULL,NULL),(51,81,'/upload_pics/1.jpg','2017-11-22 21:15:15',NULL,NULL),(61,91,'/upload_pics/3.jpg','2017-11-22 21:15:40',NULL,NULL),(71,101,'/upload_pics/1.jpg','2017-11-22 21:15:57',NULL,NULL),(81,111,'/upload_pics/2.jpg','2017-11-22 21:16:20',NULL,NULL),(91,31,'/upload_pics/2.jpg','2017-11-22 21:16:20',NULL,NULL),(101,3,'/upload_pics/2.jpg','2017-11-23 00:00:00',NULL,NULL),(111,16,'/upload_pics/7.jpg','2018-02-03 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_redeem`
--

DROP TABLE IF EXISTS `product_redeem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_redeem` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `qtd` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id_idx` (`product_id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=582 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_redeem`
--

LOCK TABLES `product_redeem` WRITE;
/*!40000 ALTER TABLE `product_redeem` DISABLE KEYS */;
INSERT INTO `product_redeem` VALUES (501,101,1191,1,'2018-02-21 11:28:16',NULL,NULL),(511,111,1191,1,'2018-02-21 11:29:00',NULL,NULL),(512,5,1192,1,'2018-02-22 23:46:33',NULL,NULL),(531,17,1211,1,'2018-03-01 22:01:32',NULL,NULL),(541,71,1211,1,'2018-03-01 22:12:00',NULL,NULL),(551,101,1201,1,'2018-03-03 10:06:08',NULL,NULL),(561,71,1201,1,'2018-03-03 10:08:09',NULL,NULL),(571,111,1201,1,'2018-03-05 13:59:57',NULL,NULL),(581,16,1201,1,'2018-03-05 14:00:25',NULL,NULL);
/*!40000 ALTER TABLE `product_redeem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `event_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stock` int(11) NOT NULL,
  `low_stock` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `local_id` int(10) unsigned NOT NULL,
  `pic_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `priority` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_local_id_foreign` (`local_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_local_id_foreign` FOREIGN KEY (`local_id`) REFERENCES `local` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,11,1,'CHURRAS IURI','Churrasco na casa do Iuri','2018-02-03 20:37:38',2,2,'2017-05-22 22:25:41',NULL,NULL,2,'/upload_pics/2.jpg',1),(5,11,1,'CHURRAS MARCIA','Churrasco na casa da Marcia','2018-05-03 20:24:31',50,5,'2017-05-22 22:25:41',NULL,NULL,2,'/upload_pics/4.jpg',1),(16,11,1,'Espeto dos Amigos','O espeto dos amigos, direto da casa do Gustavo!','2018-09-03 20:24:31',50,0,'2017-05-23 23:58:10',NULL,NULL,2,'/upload_pics/2.jpg',1),(17,11,1,'Oh essa festa aí bicho!','OLOCO! Tá pegando fogo!','2018-04-03 20:24:32',30,0,'2017-05-24 00:01:12',NULL,NULL,2,'/upload_pics/4.jpg',1),(24,11,1,'Prime : Morro da Urca : 02SET : Premium Open Bar','<p><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">As vendas estão um FE-NÔ-ME-NO! Mais de 60% dos convites vendidos!</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Estamos preparando tudo com muito carinho pra vocês!</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">VEM AÍ MAIS UMA PRIME QUE VOCÊS VÃO AMAR!</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Nossa edição no Castelo de Itaipava, sem falsa modéstia, foi MUITO FODA!</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Quem foi pode confirmar que energia fantástica foi curtir a Prime bombando até o último segundo. Não rolou nenhuma fila nos bares, tiveram muitas ações e experiências durante a festa e nosso time de djs tirou muita onda!</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Depois dessa edição queríamos trazer ainda mais novidades. Fazemos a Prime com muito carinho e o que mais poderíamos criar para surpreender vocês?</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Pois é: foram muuuuuitas horas, dias, semanas para criar nossa edição comemorativa de 9 anos.</span><span class=\"text_exposed_show\" style=\"display: inline; font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(75, 79, 86); letter-spacing: -0.12px;\"><br><br>Queremos convidá-los para curtir o melhor open bar do Brasil com a vista mais bonita do mundo. Sim, vamos valorizar o Rio, ele tem a vista mais foda do mundo.<br><br>Como sempre nosso time vai pirar, inovar e levar muitas ideias iradas pra vocês.<br><br>O melhor open bar, grandes atrações, duas pistas, a vista mais foda do mundo, muitas ações rolando durante a festa. Aguardem!<br><br><br>NOVIDADES:<br>► Local inédito: Morro da Urca!&nbsp;<br>► Lançamento do PRIME DJS CREW<br>► Novidades no Open Bar!</span></p>','2018-08-13 20:25:51',50,30,'2017-08-12 01:33:29',NULL,NULL,3,'/upload_pics/4.jpg',3),(26,11,1,'Happy Single Life :: 9 Atrações + 2 Pistas','<p><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">A última edição da Happy Single Life no Jockey foi SENSACIONAL!</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Foram 9 horas ininterruptas, transformando a festa em um FESTIVAL da celebração a vida de solteiro no Rio de Janeiro. Saca só o nosso aftermovie e veja um pouco do que aprontamos ;)</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(75, 79, 86); letter-spacing: -0.12px;\">htps://www.facebook.com/</span><wbr style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span class=\"word_break\" style=\"display: inline-block; font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(75, 79, 86); letter-spacing: -0.12px;\"></span><span style=\"font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(75, 79, 86); letter-spacing: -0.12px;\">festahappysinglelife/</span><wbr style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span class=\"word_break\" style=\"display: inline-block; font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(75, 79, 86); letter-spacing: -0.12px;\"></span><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">videos/1045670935568128/</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Anote aí: a zuera vai ser sem limites! Estamos montando uma estrutura incrível pra receber vocês: 2 pistas, 9 atrações, nossas ações irreverentes ...vai ser louco!</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Vamos divulgar os detalhes aos poucos!! Já aciona os contatinhos no Whatsapp que a sua vida de solteiro não será mais a mesma!!</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Bota na agenda: sábado, dia 23/09 bora pra Happy Single Life!&nbsp;</span><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><br style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\"><span style=\"color: rgb(75, 79, 86); font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; letter-spacing: -0.12px;\">Prézinha Open Bar de catuaba e drinks de vod</span><span class=\"text_exposed_show\" style=\"display: inline; font-family: &quot;SF Optimized&quot;, system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(75, 79, 86); letter-spacing: -0.12px;\">ka até 23h.<br><br>VENDAS ABERTAS!<br><br>Data: 23 de setembro, 22h<br>Local: SulAmérica – Rio de Janeiro – RJ&nbsp;<br><br>::: ATRAÇÕES :::<br><br>PISTA SINGLE LIFE<br>Mc Maneirinho<br>Primeiro Amor<br>DJ Tubarão<br>Mellow<br>Marcelinho da Lua<br><br>PISTA BASEMENT COM OPALÃ0 76 CREW<br>Tucho<br>Pachu<br>Saddam<br>Juan<br><br>::: ANIVERSÁRIOS :::<br><span style=\"font-family: inherit;\">Para comemorar seu aniversário com a gente envie um inbox pra página ou envie e-mail para atendimento@mostardaproduc</span><wbr><span class=\"word_break\" style=\"display: inline-block; font-family: inherit;\"></span>oes.com.br que te passaremos todos os detalhes ;)<br><br>::: CONVITES :::<br>1º Lote Limitado!<br>Masculino – R$ 50,00 | Feminino – R$ 50,00<br><br>::: VENDAS ONLINE :::<br>- Bilheteria Digital<br><a href=\"https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.bilheteriadigital.com%2Fhappy-single-23-de-setembro&amp;h=ATMr-w23-KQ2Aq9JR1oHhTI0Fqto5yPHo0LvP166JaYcb0Jv2BdVuBrF9jgqeSk8X2z_rxsCXTvbE7eq7EVFOc2x96f5HMU76i6A6rk8HC0CpHyy0zSJlm-sNyrsYQvfjm2p4IBJzuOPE5n5F0mIebHLXpQl49A&amp;enc=AZP4r23WjiPInZVBrcc69I3Se8DJ6H8SD1jYGQ8wO4KVn1bromXkl_fNf_ogFsSMTCE&amp;s=1\" rel=\"nofollow nofollow\" target=\"_blank\" style=\"color: rgb(54, 88, 153); cursor: pointer; font-family: inherit;\"><span style=\"font-family: inherit;\">https://</span><wbr><span class=\"word_break\" style=\"display: inline-block; font-family: inherit;\"></span><span style=\"font-family: inherit;\">www.bilheteriadigital.com/</span><wbr><span class=\"word_break\" style=\"display: inline-block; font-family: inherit;\"></span>happy-single-23-de-setembro</a><br><br>- Ingresso Certo<br><a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fwww.ingressocerto.com%2Fhappy-single-life-23-09-p183240&amp;h=ATPcfo1YDxn9kfzw5cf52_yPVr0t-HsJW0W5XxVXfuQQ8ME7U_PW-E8bGmVupSLyp5XKM6-5Z6Nw9ZKArfOcAgaIOl4tj1g0f66aObYxSBMzyT9cFC0Udek143yNj1NpFIqlLFYNJfCboOtdwvbUlV5b_kF8IjE&amp;enc=AZN5ZVH-jfkpYnxT5FAsQG5KXiJsbk1Qdqf1pTW60Enw-sXlygwrqcX-_1LfnCI_dhs&amp;s=1\" rel=\"nofollow nofollow\" target=\"_blank\" style=\"color: rgb(54, 88, 153); cursor: pointer; font-family: inherit;\"><span style=\"font-family: inherit;\">http://</span><wbr><span class=\"word_break\" style=\"display: inline-block; font-family: inherit;\"></span><span style=\"font-family: inherit;\">www.ingressocerto.com/</span><wbr><span class=\"word_break\" style=\"display: inline-block; font-family: inherit;\"></span><span style=\"font-family: inherit;\">happy-single-life-23-09-p18</span><wbr><span class=\"word_break\" style=\"display: inline-block; font-family: inherit;\"></span>3240</a><br><br>::: PONTOS DE VENDA :::<br><br>South&nbsp;<br>Barra Shopping / Centro / Norteshopping / Nova América / Shopping Tijuca / Via parque<br>021 Turismo Av. Rio Branco, nº 181 - Sala 702 - Centro<br>H Tattoo - Av. Ataulfo de Paiva, 1079 - Leblon<br>Mustache Club Barbearia - Rua Lopo Saraiva, 179 Loja G - Jacarepaguá&nbsp;<br><br>Postos de Gasolina<br>Posto Br Piraquê<br>Posto Br Parque das Rosas<br>Posto BR Bounganville<br><br>PDVS com taxa de conveniência R$ 5,00<br>South - Ilha Plaza<br>South - Niteroi Plaza Shopping<br>South - Niteroi Centro, Rua da Conceição, 46<br><br><br>:: IMPORTANTE ::<br>- Proibido para menores de 18 anos.&nbsp;<br>Entrada mediante apresentação de documento original com foto.<br><br>- Seja responsável, se beber, NUNCA dirija em hipótese nenhuma!!!<br><br>. Beba SEMPRE com moderação. A festa tem uma prezinha Open Bar para o seu conforto, não é para você beber em excesso, isso é cafona, sem graça e não apoiamos. Respeite seus limites!<br><br>- Os valor mencionados acima são referentes à meia-entrada para estudantes e idosos conforme legislação em vigor. Oferecemos o mesmo benefício de meia-entrada a todos que comprarem via lojas e site do<a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2FIngressoCerto.com%2F&amp;h=ATO-yTet4sm_A5cEZgLARSFpqYJ9Zk8zNUsRBKgJgdO-AieRBnVol-B0yzxDS1__oPGS9okMZzFZy4xJ6Dtwwbmx7z3MnjjBKZImT5KuOFYiBZ91rf_6Ey3ebUHSs1TvwLbO79KOYMrforGTgSkUd6G0zc3Ihy0&amp;enc=AZN9aAlgtm3n0u6KL_IUICNvGLIDXQyKZRQGzrFUQcircCup5A-9txcmRrhVNcVwYjM&amp;s=1\" rel=\"nofollow nofollow\" target=\"_blank\" style=\"color: rgb(54, 88, 153); cursor: pointer; font-family: inherit;\">IngressoCerto.com</a>&nbsp;(Ou seja, todos tem direito à meia-entrada!)<br><br>- Atenção: ao comprar o convite você está aceitando que cede os direitos de imagem para fotografias e filmagens oficiais realizadas durante o evento<br><br><br><a class=\"_58cn\" href=\"https://www.facebook.com/hashtag/happysinglelife\" data-ft=\"{&quot;tn&quot;:&quot;*N&quot;,&quot;type&quot;:104}\" style=\"color: rgb(54, 88, 153); cursor: pointer; font-family: inherit;\">#HappySingleLife</a></span><br></p>','2018-10-03 20:25:51',50,10,'2017-08-15 23:39:50',NULL,NULL,2,'/upload_pics/1.jpg',1),(31,11,1,'Evento de teste','<p><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Lorem ipsum fringilla nunc quis sagittis at curabitur est tincidunt, cursus malesuada libero magna nibh sapien varius donec, lacus aliquet morbi porttitor platea euismod vehicula posuere. eu mattis praesent sodales pretium tellus laoreet tempus euismod hac sodales viverra nulla sem turpis, cursus odio lacinia magna elit mollis orci ultrices ligula metus ullamcorper etiam sodales. nibh ultrices sollicitudin posuere neque lectus vivamus semper, morbi lobortis ante iaculis inceptos integer fames sed, varius condimentum et litora tristique enim. dictum cubilia lectus aptent ac neque litora arcu nullam quam venenatis ante, diam accumsan himenaeos rutrum ultricies duis quisque amet aliquam neque, sollicitudin metus eros rutrum vivamus nisi egestas praesent ipsum at. </p><p><br></p><p><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Faucibus congue diam fringilla laoreet tristique vel varius curabitur, sagittis lobortis facilisis curae habitant molestie varius nostra, hac augue eget aenean vel dui diam. varius adipiscing interdum netus commodo vulputate dapibus, tristique magna pulvinar accumsan dapibus vitae nullam, erat curabitur condimentum lacinia nec. cubilia nullam quisque phasellus faucibus ut feugiat massa dictum commodo, tincidunt potenti bibendum tempus habitant nunc eros curae varius massa, urna semper fusce varius sit dui inceptos id. nunc mollis feugiat congue maecenas himenaeos molestie cubilia venenatis rhoncus, lorem scelerisque auctor neque netus sodales diam fermentum tristique, neque potenti sociosqu blandit lorem vulputate diam vestibulum. </p><p><br></p><p><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Tempus senectus consectetur id litora sem sit vitae scelerisque diam per quisque, eget id donec ligula tempor mi vehicula pretium at risus. mattis justo metus imperdiet litora neque et ac fames malesuada sed congue, dolor libero habitant ut fames massa nulla lacinia porta. etiam varius eu proin dictum aliquet aliquam cursus, curabitur pharetra tempor eget iaculis platea conubia semper, vel curae mi pulvinar ad pulvinar. elit luctus taciti nunc scelerisque class amet mollis proin tristique nisi, imperdiet lobortis hac sociosqu ipsum ante vulputate ultricies aliquam elementum, fusce fermentum facilisis ligula condimentum orci volutpat orci interdum. </p><p><br></p><p><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Vel justo urna accumsan mattis nibh curae pulvinar lorem morbi, etiam magna mollis consequat nisl nostra nisl laoreet lacinia himenaeos, quisque ultricies duis faucibus maecenas suscipit nibh scelerisque. ultrices vel ultrices fringilla tortor phasellus fermentum fringilla, iaculis primis pellentesque eros placerat sagittis fermentum, fusce orci posuere quisque nisi quisque. fringilla eget risus tincidunt dictum justo commodo eu, pretium diam quam in sem nostra quisque massa, ut nullam interdum dictumst est nulla. turpis pellentesque neque nisl eleifend malesuada hendrerit curabitur habitasse orci sodales, donec sapien odio curabitur dictum habitasse risus sollicitudin. </p><p><br></p><p><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Curabitur fermentum mattis mollis et ac, scelerisque sodales vulputate duis condimentum himenaeos, scelerisque inceptos consequat dapibus. convallis himenaeos nisl proin in etiam donec duis enim dui turpis habitasse curabitur, ad neque sed mollis dictum purus ullamcorper pretium nunc accumsan. vel habitasse nibh rhoncus commodo tellus curabitur dui gravida arcu quam conubia vivamus, imperdiet elementum vel vivamus ac egestas aenean tincidunt sollicitudin metus. mi inceptos pharetra hac lorem ullamcorper vehicula ipsum purus in gravida, felis porta euismod hac libero bibendum nec mollis curabitur ipsum massa, ultricies ante laoreet donec aliquam lectus donec consectetur sociosqu. </p><p><br></p><p><span class=\"Apple-tab-span\" style=\"white-space:pre\">	</span>Lacus luctus pharetra feugiat habitasse fusce etiam aptent iaculis, pharetra neque dui purus est maecenas dui. </p>','2018-11-03 20:25:54',10,1,'2017-11-22 20:45:28',NULL,NULL,11,'/upload_pics/2.jpg',3),(51,11,1,'Festival Xpto 1','Descrição do Festival Xpto 1','2018-07-01 15:00:00',50,2,'2017-11-21 00:00:00',NULL,NULL,11,'/upload_pics/1.jpg',1),(61,11,1,'Festival Xpto 2','Descrição do Festival Xpto 2','2018-12-01 16:00:00',60,2,'2017-11-21 00:00:00',NULL,NULL,11,'/upload_pics/2.jpg',1),(71,11,1,'Festival Xpto 3','Descrição do Festival Xpto 3','2018-07-01 09:00:00',60,2,'2017-11-21 00:00:00',NULL,NULL,11,'/upload_pics/3.jpg',1),(81,11,1,'Festival Xpto 4','Descrição do Festival Xpto 4','2018-08-31 10:00:00',60,2,'2017-11-21 00:00:00',NULL,NULL,11,'/upload_pics/1.jpg',1),(91,11,1,'Festival Xpto 3','Descrição do Festival Xpto 3','2018-05-15 12:30:00',60,2,'2017-11-21 00:00:00',NULL,NULL,11,'/upload_pics/3.jpg',1),(101,11,1,'Festival Xpto 4','Descrição do Festival Xpto 4','2018-03-20 14:10:00',60,2,'2017-11-21 00:00:00',NULL,NULL,11,'/upload_pics/1.jpg',1),(111,11,1,'Festival Xpto 5','Descrição do Festival Xpto 5','2018-06-01 18:50:00',60,2,'2017-11-21 00:00:00',NULL,NULL,11,'/upload_pics/2.jpg',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recurrence`
--

DROP TABLE IF EXISTS `recurrence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recurrence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `subscription_id` int(10) unsigned NOT NULL,
  `code_subscription_pagseguro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderscol` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_subscription_id_foreign` (`subscription_id`),
  CONSTRAINT `orders_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recurrence`
--

LOCK TABLES `recurrence` WRITE;
/*!40000 ALTER TABLE `recurrence` DISABLE KEYS */;
/*!40000 ALTER TABLE `recurrence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `pic_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(10) unsigned NOT NULL,
  `token_pagseguro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_pagseguro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
INSERT INTO `subscription` VALUES (5,'Smart Pass','1 acompanhante por convite',1.02,5,NULL,'/upload_pics/casual-pass_disco-ball@2x.png',2,'916F89F5BDBDFF6DD4F74FA8E2634D52','PP_TRIAL_PLAN_TEST_SMART',NULL,NULL),(6,'VIP Pass','2 acompanhantes por convite',1.03,999,NULL,'/upload_pics/vip-pass_champagne@2x.png',3,'898DC89E5858E570041FEFB8603DD831','PP_TRIAL_PLAN_TEST_VIP',NULL,NULL),(11,'Casual Pass','Teste de integração',1.01,2,NULL,'/upload_pics/social-pass_confetti@2x.png',1,'3810ECFC8D8DF51CC461BFBCE828122D','PP_TRIAL_PLAN_TEST',NULL,NULL);
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_perks`
--

DROP TABLE IF EXISTS `subscription_perks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription_perks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` int(10) unsigned NOT NULL,
  `description` varchar(191) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id_idx` (`subscription_id`),
  CONSTRAINT `subscription_id` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_perks`
--

LOCK TABLES `subscription_perks` WRITE;
/*!40000 ALTER TABLE `subscription_perks` DISABLE KEYS */;
INSERT INTO `subscription_perks` VALUES (1,11,'2 ingressos por mês',1),(21,11,'1 ingresso por evento',1),(31,5,'5 ingressos por mês',1),(41,5,'1 ingresso por evento',1),(51,5,'Concorra a prêmios e promoções exclusivas',0),(61,6,'Ingressos ilimitados',1),(71,6,'Até 4 ingressos por evento',1),(81,6,'Concorra a prêmios e promoções exclusivas',1),(91,11,'Concorra a prêmios e promoções exclusivas',0);
/*!40000 ALTER TABLE `subscription_perks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_subscription`
--

DROP TABLE IF EXISTS `user_subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_subscription` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status_pagseguro` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_accession_pagseguro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_payment_date_pagseguro` timestamp NULL DEFAULT NULL,
  `number_tickets_redeemed` int(10) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_subscription_subscription_id_foreign` (`subscription_id`),
  KEY `user_subscription_user_id_foreign` (`user_id`),
  CONSTRAINT `user_subscription_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`id`),
  CONSTRAINT `user_subscription_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=602 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_subscription`
--

LOCK TABLES `user_subscription` WRITE;
/*!40000 ALTER TABLE `user_subscription` DISABLE KEYS */;
INSERT INTO `user_subscription` VALUES (521,11,1191,'ACTIVE','9EE4E0CDD7D7BAD6646DEFB6DB3EB8DB','2018-03-03 20:17:40',2,'2018-02-21 11:28:07','2018-02-21 11:29:00',NULL),(531,5,1191,'ACTIVE','97907224C0C0376FF40A6F9F61C8A401','2018-03-24 11:48:46',0,'2018-02-21 11:50:29','2018-02-21 11:50:29',NULL),(541,5,1191,'ACTIVE','97907224C0C0376FF40A6F9F61C8A401','2018-03-24 11:48:46',0,'2018-02-21 11:50:32','2018-02-21 11:50:32',NULL),(551,5,1191,'ACTIVE','6C1B4E077C7C09A884622FAA8F89D605','2018-03-24 11:50:46',0,'2018-02-21 11:52:40','2018-02-21 11:52:40',NULL),(552,11,1192,'ACTIVE','6E1DB49FB7B708799405FFA5969FBDAB','2018-02-24 13:42:53',1,'2018-02-22 13:46:50','2018-02-22 23:46:33',NULL),(561,11,1201,'ACTIVE','608632AF5757FBA334945FAEE8BEC5BF','2018-03-10 22:17:40',2,'2018-03-01 20:19:08','2018-03-05 14:00:25',NULL),(571,11,1,'ACTIVE','CBC3B85861615ED2245ACF8C6CF1C3F7','2018-03-03 21:38:57',0,'2018-03-01 21:41:02','2018-03-01 21:41:35',NULL),(581,5,1,'ACTIVE','3F2B90FC383878BDD4445FA47525DD75','2018-03-03 21:36:10',0,'2018-03-01 21:51:07','2018-03-01 21:51:07',NULL),(591,6,1,'ACTIVE','E3001578A2A249E994940FA9838FCB74','2018-03-03 21:23:46',0,'2018-03-01 21:53:54','2018-03-01 21:53:54',NULL),(601,6,1211,'ACTIVE','C5871F7F8888979DD41D2FA65EA14949','2018-03-03 21:58:35',2,'2018-03-01 22:00:58','2018-03-01 22:12:00',NULL);
/*!40000 ALTER TABLE `user_subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `mobile_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_facebook_id_unique` (`facebook_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1262 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Carlos Alexandre',NULL,'carlos_alexandrerosa@hotmail.com','$2y$10$vnWvobmY5bXHzN1Cm5QoBe3fqT99d6rEdhWgdaELWJ7g.dSYfrOMy',NULL,'en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','a5TAVlfWS0YG4Eau6Jsm0hR5XsAe9jVuO7pEmbAlJjKOhRpcGsfeSdjmA68m','2017-12-02 11:46:51',NULL,NULL,NULL),(1181,'Caio Barreto',NULL,'caiobvenancio@hotmail.com','$2y$10$W2sBc9kqqNc6PGWU5LjYFOii9uGu3SxhNOeilJ0XKK8EL9T38gZM.',NULL,'en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','KXPWlVeg4JoAAIE3ozPAgjqQyvW5Ko1MwY0L9K7kFK5lc1XaBKIlayYXNOy1','2018-02-18 22:23:17','2018-02-18 22:30:09',NULL,NULL),(1191,'CAIO B V VIANNA',NULL,'barreto@mostardaproducoes.com.br','$2y$10$9WZUg84L.07yeqsaCTflN.N7zxaUGRc0vMSkkuwPm3R/CAEE.dFc.',NULL,'en','21980510333',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','mbH4a7wysS1FY4vdUXew4vo1P32RBPkDPvojA9huowM6keURVpG05pinRzLF','2018-02-21 11:28:06','2018-02-21 11:32:35',NULL,NULL),(1192,'Linda Rojas',NULL,'lindarojas.solis@gmail.com','$2y$10$lfpw9AzTyBFYlACDAgPrzOTz/Odzme6wVliQ.MY3Ibesc4biz.TSi',NULL,'en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'2018-02-22 13:42:06','2018-02-22 13:42:06',NULL,NULL),(1201,'Luis Fernandez',NULL,'luis82fernandez@gmail.com','$2y$10$sXVOBvrDrYSWnQKTOBVkZ.nJ6V5SQDpQlNf4fcE2AK7yxquazDqLy',NULL,'en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','vhus783ht6dKsYh1gpghlGDrvA54SCTUPDIfymczJJ9j2bB4GZnQCbfbrTM5','2018-03-01 20:14:35','2018-03-01 20:16:58',NULL,NULL),(1211,'CArlos Rosa',NULL,'carlosalexandre3107@gmail.com','$2y$10$uE52HjIgmASmUDM4CQpg.OpyR/IK4afiCGCwf7bqeqtFqBgh7UUDe',NULL,'en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','Wlt3n6HKsExDLcvW1VBu1O5y66TlUxfgTT4RVrBT1IutR54NTWr54elbcKu2','2018-03-01 21:58:19','2018-03-01 21:58:19',NULL,NULL),(1221,'Hermes Fernandez',NULL,'hermesfls@hotmail.com','$2y$10$aknyF4m22LDPIjxi84xmp.jGEjhsf6hPX4.irRxUpoW91WjsWp81i',NULL,'en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'2018-03-10 15:56:59','2018-03-10 15:56:59',NULL,NULL),(1231,'Tatiane V. P. do Nascimento',NULL,'tatiane.prevato@gmail.com','$2y$10$YjLo7bhK50UUesFAwqXFvOSuvEMDF.r.Fz5OE9MIZlxC6m42nQlrK',NULL,'en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'2018-03-12 19:07:50','2018-03-12 19:07:50',NULL,NULL),(1261,'João das neves',NULL,'joaodasneves@neve.com','$2y$10$pvKy2nPa/smSEFNqmRaWCOamYXuwACU0SFQgfAN4Q6KldKu3.cqZm',NULL,'en',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'2018-03-18 15:24:53','2018-03-18 15:24:53',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database '[nome_banco_dados]'
--

--
-- Dumping routines for database '[nome_banco_dados]'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-29  9:16:53
