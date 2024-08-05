-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for real_estate_db
CREATE DATABASE IF NOT EXISTS `real_estate_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `real_estate_db`;

-- Dumping structure for table real_estate_db.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table real_estate_db.customer: ~2 rows (approximately)
REPLACE INTO `customer` (`id`, `property_id`, `name`, `email`, `contact_no`, `status`, `created_at`, `deleted_at`, `updated_at`) VALUES
	(1, NULL, 'Danrick tekiko', 'dcode0516@gmail.com', '09199533529', NULL, '2024-08-05 06:39:05', NULL, '2024-08-05 06:39:05'),
	(2, NULL, 'Necolo Tekiko', 'dcode0516@gmail.com', '09199533529', NULL, '2024-08-05 06:47:25', NULL, '2024-08-05 06:47:25');

-- Dumping structure for table real_estate_db.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table real_estate_db.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table real_estate_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table real_estate_db.migrations: ~5 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2014_10_12_000000_create_users_table', 1),
	(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(7, '2019_08_19_000000_create_failed_jobs_table', 1),
	(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(10, '2024_05_12_020310_create_property_table', 2);

-- Dumping structure for table real_estate_db.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table real_estate_db.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table real_estate_db.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table real_estate_db.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table real_estate_db.property
CREATE TABLE IF NOT EXISTS `property` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `square_meter` decimal(8,2) NOT NULL,
  `bedrooms` int DEFAULT NULL,
  `toilet` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table real_estate_db.property: ~3 rows (approximately)
REPLACE INTO `property` (`id`, `property_name`, `property_address`, `square_meter`, `bedrooms`, `toilet`, `price`, `status`, `quality`, `monthly_rate`, `property_type_id`, `image1`, `image2`, `image3`, `image4`, `property_no`, `created_at`, `updated_at`, `deleted_at`, `type`) VALUES
	(1, 'DANRICK TEKIKO PROPERTY', 'TIBUNGCO RELOCATION DAVAO CITY', 12.50, 10, 2, 6000.00, 'Available', 'DASDA', NULL, '1', '2024-IMAGE1.DANRICK_TEKIKO_PROPERTY.PN-202400005.jpg', NULL, NULL, NULL, 'PN-202400005', '2024-05-11 23:44:21', '2024-06-12 00:31:41', NULL, 'For Sale'),
	(2, 'DEBRA TEKIKO PROPERTY', 'BUHANGIN DAVAO CITY', 10.20, 10, 2, 1000.00, 'Available', 'DASDA', NULL, '1', '2024-IMAGE1.DEBRA_TEKIKO_PROPERTY.PN-202400005.jpg', NULL, NULL, NULL, 'PN-202400005', '2024-05-11 23:50:00', '2024-06-12 00:29:51', NULL, 'For Sale'),
	(6, 'AMAD PROPERTY', 'SASA DAVAO CITY', 10.20, 15, 20, 10000.00, 'Available', 'GOOD  LOOKING VERY NICE', NULL, '1', '2024-IMAGE1.AMAD_PROPERTY.PN-202400005.jpg', '2024-IMAGE2.DANRICK_TEKIKO_PROPERTY.PN-202400003.jpg', '2024-IMAGE3.DANRICK_TEKIKO_PROPERTY.PN-202400003.jpg', '2024-IMAGE4.DANRICK_TEKIKO_PROPERTY.PN-202400003.png', 'PN-202400005', '2024-05-12 03:34:53', '2024-06-12 00:25:21', NULL, 'For Sale'),
	(7, 'CHRISTIAN PROPERTY', 'BUNAWAN ADAVAO CITY', 312.00, 312, 312, 312.00, 'Available', 'GOOD  LOOKING VERY NICE', NULL, '1', '2024-IMAGE1.CHRISTIAN_PROPERTY.PN-202400005.jpg', '2024-IMAGE2.dasdas.PN-202400004.jpg', '2024-IMAGE3.dasdas.PN-202400004.jpg', '2024-IMAGE4.dasdas.PN-202400004.jpg', 'PN-202400005', '2024-06-11 23:34:17', '2024-06-12 00:30:05', NULL, 'For Sale'),
	(8, 'dsads', 'dsadas', 3.00, 4, 12, 5999.00, 'Available', '2', NULL, '3', '2024-IMAGE1.dsads.PN-202400005.png', '2024-IMAGE2.dsads.PN-202400005.png', '2024-IMAGE3.dsads.PN-202400005.jpg', '2024-IMAGE4.dsads.PN-202400005.jpg', 'PN-202400005', '2024-08-05 06:13:45', '2024-08-05 06:13:45', NULL, 'For Sale'),
	(9, 'LADISLAWA', 'DASDASD', 12.00, 2, 4, 2.00, 'Available', 'GOOD  LOOKING VERY NICE', NULL, '1', '2024-IMAGE1.LADISLAWA.PN-202400006.png', '2024-IMAGE2.LADISLAWA.PN-202400006.png', '2024-IMAGE3.LADISLAWA.PN-202400006.png', '2024-IMAGE4.LADISLAWA.PN-202400006.png', 'PN-202400006', '2024-08-05 06:43:29', '2024-08-05 06:43:29', NULL, 'For Rent');

-- Dumping structure for table real_estate_db.property_type
CREATE TABLE IF NOT EXISTS `property_type` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `property_type_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table real_estate_db.property_type: ~5 rows (approximately)
REPLACE INTO `property_type` (`id`, `property_type_name`, `created_at`, `updated_at`) VALUES
	(1, 'CONDOMINIUM', '2024-05-11 19:13:22', '2024-05-11 19:13:22'),
	(2, 'PROPERTY LOT', '2024-05-11 19:13:37', '2024-05-11 19:13:37'),
	(3, 'HOUSE FOR SALE', '2024-05-11 19:14:06', '2024-05-11 19:14:06'),
	(4, 'HOUSE FOR RENT', '2024-05-11 19:14:18', '2024-05-11 19:14:18'),
	(5, 'AMAZING SUPER POOL', '2024-05-11 19:20:05', '2024-05-11 19:34:53');

-- Dumping structure for table real_estate_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table real_estate_db.users: ~0 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
	(1, 'Necolo Tekiko', 'necolo@gmail.com', NULL, '$2y$10$PLNooSl760B7fNy81Nhifu4dOg2rG/2FEC3l0H4lJGy4pxpkjpL8W', NULL, NULL, NULL, 'Administrator');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
