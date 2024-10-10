-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: movie-app
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin@gmail.com','$2y$10$your_hashed_password','2024-10-10 14:29:38','2024-10-10 14:29:38');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `movie_cards_id` bigint unsigned NOT NULL,
  `theater_id` bigint unsigned NOT NULL,
  `geo_location_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `seats` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookings_movie_cards_id_foreign` (`movie_cards_id`),
  KEY `bookings_theater_id_foreign` (`theater_id`),
  KEY `bookings_geo_location_id_foreign` (`geo_location_id`),
  KEY `bookings_user_id_foreign` (`user_id`),
  CONSTRAINT `bookings_geo_location_id_foreign` FOREIGN KEY (`geo_location_id`) REFERENCES `geo_locations` (`id`),
  CONSTRAINT `bookings_movie_cards_id_foreign` FOREIGN KEY (`movie_cards_id`) REFERENCES `movie_cards` (`id`),
  CONSTRAINT `bookings_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`),
  CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (4,'mushtaq husaain','03472364853',22,9,6,'2024-09-13','06:53:00',2,'2024-09-29 20:50:28','2024-09-29 20:50:28',1);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `geo_locations`
--

DROP TABLE IF EXISTS `geo_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `geo_locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geo_locations`
--

LOCK TABLES `geo_locations` WRITE;
/*!40000 ALTER TABLE `geo_locations` DISABLE KEYS */;
INSERT INTO `geo_locations` VALUES (1,'Gulshan Karachi',NULL,NULL),(2,'Malir Karachi',NULL,NULL),(3,'Bharia Town Karachi',NULL,NULL),(4,'Johar Karachi',NULL,NULL),(5,'DHA Karachi',NULL,NULL),(6,'Clifton Karachi',NULL,NULL);
/*!40000 ALTER TABLE `geo_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2024_09_26_172737_create_users_table',1),(2,'2024_09_26_174020_create_sessions_table',2),(3,'2024_09_27_170519_create_movies_table',3),(4,'2024_09_27_174805_rename_movies_to_movie_card_and_add_fields',4),(6,'2024_09_27_175220_create_movie_cards_table',5),(7,'2024_09_29_105032_create_theaters_table',6),(8,'2024_09_29_105114_create_geo_locations_table',6),(9,'2024_09_29_105138_create_bookings_table',6),(10,'2024_09_29_135659_add_user_id_to_bookings_table',7),(11,'2024_10_10_140731_create_admins_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_card`
--

DROP TABLE IF EXISTS `movie_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_card` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `vote_average` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_card`
--

LOCK TABLES `movie_card` WRITE;
/*!40000 ALTER TABLE `movie_card` DISABLE KEYS */;
INSERT INTO `movie_card` VALUES (1,'Day Movie 1','2023-07-15',8.5,'2024-09-28 00:29:54','2024-09-28 00:29:54',NULL,'imageone.jpg'),(2,'Day Movie 2','2023-07-16',7.9,'2024-09-28 00:29:54','2024-09-28 00:29:54',NULL,'imagetwo.jpg'),(3,'Day Movie 3','2023-07-17',9,'2024-09-28 00:29:54','2024-09-28 00:29:54',NULL,NULL),(4,'Week Movie 1','2023-07-20',8.7,'2024-09-28 00:29:54','2024-09-28 00:29:54',NULL,NULL),(5,'Week Movie 2','2023-07-21',7.8,'2024-09-28 00:29:54','2024-09-28 00:29:54',NULL,NULL);
/*!40000 ALTER TABLE `movie_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_cards`
--

DROP TABLE IF EXISTS `movie_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movie_cards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `release_date` date NOT NULL,
  `vote_average` float NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_cards`
--

LOCK TABLES `movie_cards` WRITE;
/*!40000 ALTER TABLE `movie_cards` DISABLE KEYS */;
INSERT INTO `movie_cards` VALUES (16,'wolfs','2010-07-16',8.8,'Science Fiction',NULL,'https://image.tmdb.org/t/p/original/vOX1Zng472PC2KnS0B9nRfM8aaZ.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(17,'Apartment 7A','1972-03-24',9.2,'Crime',NULL,'https://image.tmdb.org/t/p/original/oyjEPno8omeDYVNqUZS2RiEpuRC.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(18,'Rez Ball','2008-07-18',9,'Action',NULL,'https://image.tmdb.org/t/p/original/5MKpjuiCTk8nYnsUf5QegiPKEDh.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(19,'The God Father','1994-10-14',8.9,'Drama',NULL,'https://image.tmdb.org/t/p/original/3bhkrj58Vtu7enYsRolD1fZdja1.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(20,'The True Gentleman','1994-09-23',9.3,'Drama',NULL,'https://image.tmdb.org/t/p/original/AqSMaOxqXX3Q9raBSkQSVMPP6oK.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(21,'Schindler List','1994-07-06',8.8,'Drama',NULL,'https://image.tmdb.org/t/p/original/sF1U4EUQS8YHUYjNl3pMGNIQyr0.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(22,'12 Angry Men','1999-10-15',8.8,'Drama',NULL,'https://image.tmdb.org/t/p/original/ow3wq89wM8qd5X7hWKxiRfsFf9C.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(23,'Spritual Away','1999-03-31',8.7,'Science Fiction',NULL,'https://image.tmdb.org/t/p/original/39wmItIWsg5sZMyRUHLkWBcuVCM.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(24,'The Dark Knight','2000-05-05',8.5,'Action',NULL,'https://image.tmdb.org/t/p/original/qJ2tW6WMUDux911r6m7haRef0WH.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(25,'Parasite','1991-02-14',8.6,'Thriller',NULL,'https://image.tmdb.org/t/p/original/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg','2024-09-28 16:02:52','2024-09-28 16:02:52'),(26,'Joker: Folie à Deux (2024)','2010-07-16',8.8,'Science Fiction',NULL,'https://image.tmdb.org/t/p/original/4zMTQcQOEygyqtBuRn2zgVgGrY7.jpg','2024-09-28 16:08:00','2024-09-28 16:08:00'),(29,'Speak No Evil (2024)','2024-10-11',9.8,'Day','https://youtu.be/JNFFz0wXZSw?si=GEzkZyEwL1DQBbeO','https://image.tmdb.org/t/p/original/fDtkrO2OAF8LKQTdzYmu1Y7lCLB.jpg','2024-10-07 21:18:48','2024-10-07 21:18:48');
/*!40000 ALTER TABLE `movie_cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0lFA8Te06sGvTOYiO08NYv2DxIrfRc3z2LnspaYm',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMnJ4WWFpZFA1VmxLdXBMbkJzVnpPM3BBaDkwOVVtdE5NdUhjY1g3TyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9',1728576211);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `theaters`
--

DROP TABLE IF EXISTS `theaters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `theaters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `theater_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `theaters`
--

LOCK TABLES `theaters` WRITE;
/*!40000 ALTER TABLE `theaters` DISABLE KEYS */;
INSERT INTO `theaters` VALUES (1,'The Apollo Theater',NULL,NULL),(2,'The Royal Opera House',NULL,NULL),(3,'The Sydney Opera House',NULL,NULL),(4,'The Globe Theatre',NULL,NULL),(5,'The Lyceum Theatre',NULL,NULL),(6,'The Old Vic',NULL,NULL),(7,'Teatro alla Scala',NULL,NULL),(8,'The West End',NULL,NULL),(9,'The Bolshoi Theatre',NULL,NULL),(10,'The National Theatre',NULL,NULL);
/*!40000 ALTER TABLE `theaters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Muhammad Zahid','summiasummia098@gmail.com',NULL,'$2y$12$0nFN86rwE89PrYKDbefbaeQZht6Wr9Eb//cK0DcZOXuI.qfqBqSIe',NULL,'2024-09-27 00:56:19','2024-09-29 13:28:17'),(4,'Muhammad Hassaan','ayeshamushtaq1334@gmail.com',NULL,'$2y$12$0pc494K.S4Fc0p9fEQJ1g.CHEWKo.frzYbnI5PbBk3LSvjjNe569u',NULL,'2024-10-10 13:34:27','2024-10-10 13:34:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'movie-app'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-10 11:45:14
