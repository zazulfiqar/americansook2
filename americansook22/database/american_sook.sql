/*
SQLyog Community
MySQL - 10.4.17-MariaDB : Database - advance_ecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`american_sook` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `american_sook`;

/*Table structure for table `banners` */

CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banners_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `banners` */

insert  into `banners`(`id`,`title`,`slug`,`photo`,`description`,`status`,`created_at`,`updated_at`) values
(1,'Lorem Ipsum is','lorem-ipsum-is','/storage/photos/1/Banner/banner-01.jpg','<h2><span style=\"font-weight: bold; color: rgb(99, 99, 99);\">Up to 10%</span></h2>','active','2020-08-14 06:47:38','2020-08-14 06:48:21'),
(2,'Lorem Ipsum','lorem-ipsum','/storage/photos/1/Banner/banner-07.jpg','<p>Up to 90%</p>','active','2020-08-14 06:50:23','2020-08-14 06:50:23'),
(4,'Banner','banner','/storage/photos/1/Banner/banner-06.jpg','<h2><span style=\"color: rgb(156, 0, 255); font-size: 2rem; font-weight: bold;\">Up to 40%</span><br></h2><h2><span style=\"color: rgb(156, 0, 255);\"></span></h2>','active','2020-08-18 01:46:59','2020-08-18 01:46:59');

/*Table structure for table `brands` */

CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `brands` */

insert  into `brands`(`id`,`title`,`slug`,`status`,`created_at`,`updated_at`) values
(7,'Toyota',NULL,'active','2021-01-28 12:14:59','2021-01-28 12:14:59'),
(8,'Honda',NULL,'active','2021-01-28 12:15:08','2021-01-28 12:15:08'),
(9,'Kia',NULL,'active','2021-01-28 12:15:15','2021-01-28 12:15:37');

/*Table structure for table `carts` */

CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` enum('new','progress','delivered','cancel') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `quantity` int(11) DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_vendor_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `carts` */

insert  into `carts`(`id`,`product_id`,`order_id`,`user_id`,`price`,`status`,`quantity`,`amount`,`created_at`,`updated_at`,`admin_vendor_id`) values
(1,28,NULL,1,0.00,'new',1,0.00,'2021-02-11 14:47:05','2021-02-11 14:47:05',NULL);

/*Table structure for table `categories` */

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) DEFAULT 1,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  KEY `categories_added_by_foreign` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`title`,`slug`,`summary`,`photo`,`is_parent`,`parent_id`,`added_by`,`status`,`created_at`,`updated_at`,`deleted_at`) values
(5,'BRAND','brand','this is a brand','backend/product/KPKJemkv3cFRUPVLES42Nujr3nNod1eQdPN0Os2d.jpeg',0,NULL,NULL,'active','2021-02-11 10:32:15','2021-02-11 10:32:15',NULL),
(6,'Parts','parts','asdfasdf','backend/product/V4nGDXvCzk9ljDhkLyQO0NyJdCAbupw9hVt8WMfA.jpeg',0,NULL,NULL,'active','2021-02-11 10:38:24','2021-02-11 10:38:24',NULL),
(7,'Jeeps','jeeps','asdfasdf','backend/product/EeNY1GHz5WcUFninDph35K9fbPEXpMCHzwcwV7eQ.jpeg',0,NULL,NULL,'active','2021-02-11 10:38:38','2021-02-11 10:38:38',NULL),
(8,'Accessories','accessories','Accessories','backend/product/KQpXW8xGOUzZIPw9jNGpAFUdcuCj1VQUx8Vy2UCa.jpeg',0,NULL,NULL,'active','2021-02-11 10:39:20','2021-02-11 10:39:20',NULL),
(9,'Salvage','salvage','salvage','backend/product/2Ik3cXfNL0SSeHeJMEMhH90yN6fqSoM9WkV3X45L.jpeg',0,NULL,NULL,'active','2021-02-11 10:39:35','2021-02-11 10:39:35',NULL);

/*Table structure for table `coupons` */

CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `value` decimal(20,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `coupons` */

insert  into `coupons`(`id`,`code`,`type`,`value`,`status`,`created_at`,`updated_at`) values
(1,'abc123','fixed',300.00,'active',NULL,NULL),
(2,'111111','percent',10.00,'active',NULL,NULL),
(5,'abcd','fixed',250.00,'active','2020-08-18 01:54:58','2020-08-18 01:54:58');

/*Table structure for table `failed_jobs` */

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `features` */

CREATE TABLE `features` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `admin_vendor_id` int(11) DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mileage` double DEFAULT NULL,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel_type` tinyint(4) DEFAULT NULL,
  `fuel_economy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registered_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `steering` tinyint(4) DEFAULT NULL,
  `condition` tinyint(4) DEFAULT NULL,
  `no_of_seats` tinyint(4) DEFAULT NULL,
  `drive_train` tinyint(4) DEFAULT NULL,
  `product_engine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exterior_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interior_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `front_ac_status` tinyint(4) DEFAULT NULL,
  `power_steering_status` tinyint(4) DEFAULT NULL,
  `air_bags_status` tinyint(4) DEFAULT NULL,
  `abs_status` tinyint(4) DEFAULT NULL,
  `air_conditioner_status` tinyint(4) DEFAULT NULL,
  `leather_seats_status` tinyint(4) DEFAULT NULL,
  `fog_light_status` tinyint(4) DEFAULT NULL,
  `cd_dvd_player_status` tinyint(4) DEFAULT NULL,
  `sound_system_status` tinyint(4) DEFAULT NULL,
  `am_fm_status` tinyint(4) DEFAULT NULL,
  `safety_belts_status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `features` */

insert  into `features`(`id`,`product_id`,`admin_vendor_id`,`images`,`mileage`,`transmission`,`fuel_type`,`fuel_economy`,`registered_city`,`steering`,`condition`,`no_of_seats`,`drive_train`,`product_engine`,`exterior_color`,`interior_color`,`front_ac_status`,`power_steering_status`,`air_bags_status`,`abs_status`,`air_conditioner_status`,`leather_seats_status`,`fog_light_status`,`cd_dvd_player_status`,`sound_system_status`,`am_fm_status`,`safety_belts_status`,`created_at`,`updated_at`,`status`,`description`) values
(9,3,2,'backend/product/zATgFCbYrA15xgHB227mmFT8DwTQrmgELWQNNz40.jpeg',12,'Any transmission',2,'10','New York',2,2,2,1,'300','Red','Yellow',1,1,1,1,1,1,0,1,1,1,0,'2021-02-10 14:58:27','2021-02-10 15:01:07','inactive',NULL);

/*Table structure for table `messages` */

CREATE TABLE `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `messages` */

insert  into `messages`(`id`,`name`,`subject`,`email`,`photo`,`phone`,`message`,`read_at`,`created_at`,`updated_at`) values
(1,'Prajwal Rai','About price','prajwal.iar@gmail.com',NULL,'9807009999','Hello sir i am from kathmandu nepal.','2020-08-14 13:25:46','2020-08-14 13:00:01','2020-08-14 13:25:46'),
(2,'Prajwal Rai','About Price','prajwal.iar@gmail.com',NULL,'9800099000','Hello i am Prajwal Rai','2020-08-18 08:04:15','2020-08-15 12:52:39','2020-08-18 08:04:16'),
(3,'Prajwal Rai','lorem ipsum','prajwal.iar@gmail.com',NULL,'1200990009','hello sir sdfdfd dfdjf ;dfjd fd ldkfd','2021-02-01 10:43:04','2020-08-18 02:15:12','2021-02-01 10:43:04');

/*Table structure for table `migrations` */

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2020_07_10_021010_create_brands_table',1),
(5,'2020_07_10_025334_create_banners_table',1),
(6,'2020_07_10_112147_create_categories_table',1),
(7,'2020_07_11_063857_create_products_table',1),
(8,'2020_07_12_073132_create_post_categories_table',1),
(9,'2020_07_12_073701_create_post_tags_table',1),
(10,'2020_07_12_083638_create_posts_table',1),
(11,'2020_07_13_151329_create_messages_table',1),
(12,'2020_07_14_023748_create_shippings_table',1),
(13,'2020_07_15_054356_create_orders_table',1),
(14,'2020_07_15_102626_create_carts_table',1),
(15,'2020_07_16_041623_create_notifications_table',1),
(16,'2020_07_16_053240_create_coupons_table',1),
(17,'2020_07_23_143757_create_wishlists_table',1),
(18,'2020_07_24_074930_create_product_reviews_table',1),
(19,'2020_07_24_131727_create_post_comments_table',1),
(20,'2020_08_01_143408_create_settings_table',1);

/*Table structure for table `notifications` */

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notifications` */

insert  into `notifications`(`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) values
('2145a8e3-687d-444a-8873-b3b2fb77a342','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/e-shop.loc\\/blog-detail\\/where-can-i-get-some\",\"fas\":\"fas fa-comment\"}',NULL,'2020-08-15 12:31:21','2020-08-15 12:31:21'),
('3af39f84-cab4-4152-9202-d448435c67de','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/localhost:8000\\/admin\\/order\\/4\",\"fas\":\"fa-file-alt\"}',NULL,'2020-08-15 12:54:52','2020-08-15 12:54:52'),
('4a0afdb0-71ad-4ce6-bc70-c92ef491a525','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/localhost:8000\\/blog-detail\\/the-standard-lorem-ipsum-passage-used-since-the-1500s\",\"fas\":\"fas fa-comment\"}',NULL,'2020-08-18 02:13:51','2020-08-18 02:13:51'),
('540ca3e9-0ff9-4e2e-9db3-6b5abc823422','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/e-shop.loc\\/blog-detail\\/where-can-i-get-some\",\"fas\":\"fas fa-comment\"}','2020-08-15 12:30:44','2020-08-14 12:12:28','2020-08-15 12:30:44'),
('5da09dd1-3ffc-43b0-aba2-a4260ba4cc76','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/localhost:8000\\/blog-detail\\/the-standard-lorem-ipsum-passage\",\"fas\":\"fas fa-comment\"}',NULL,'2020-08-15 12:51:02','2020-08-15 12:51:02'),
('5e91e603-024e-45c5-b22f-36931fef0d90','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Product Rating!\",\"actionURL\":\"http:\\/\\/localhost:8000\\/product-detail\\/white-sports-casual-t\",\"fas\":\"fa-star\"}',NULL,'2020-08-15 12:44:07','2020-08-15 12:44:07'),
('73a3b51a-416a-4e7d-8ca2-53b216d9ad8e','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/e-shop.loc\\/blog-detail\\/where-can-i-get-some\",\"fas\":\"fas fa-comment\"}',NULL,'2020-08-14 12:11:03','2020-08-14 12:11:03'),
('8605db5d-1462-496e-8b5f-8b923d88912c','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/e-shop.loc\\/admin\\/order\\/1\",\"fas\":\"fa-file-alt\"}',NULL,'2020-08-14 12:20:44','2020-08-14 12:20:44'),
('a6ec5643-748c-4128-92e2-9a9f293f53b5','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/localhost:8000\\/admin\\/order\\/5\",\"fas\":\"fa-file-alt\"}',NULL,'2020-08-18 02:17:03','2020-08-18 02:17:03'),
('b186a883-42f2-4a05-8fc5-f0d3e10309ff','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/e-shop.loc\\/admin\\/order\\/2\",\"fas\":\"fa-file-alt\"}','2020-08-15 09:17:24','2020-08-15 03:14:55','2020-08-15 09:17:24'),
('d2fd7c33-b0fe-47d6-8bc6-f377d404080d','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/e-shop.loc\\/blog-detail\\/where-can-i-get-some\",\"fas\":\"fas fa-comment\"}',NULL,'2020-08-14 12:08:50','2020-08-14 12:08:50'),
('dff78b90-85c8-42ee-a5b1-de8ad0b21be4','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New order created\",\"actionURL\":\"http:\\/\\/e-shop.loc\\/admin\\/order\\/3\",\"fas\":\"fa-file-alt\"}',NULL,'2020-08-15 11:40:54','2020-08-15 11:40:54'),
('e28b0a73-4819-4016-b915-0e525d4148f5','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Product Rating!\",\"actionURL\":\"http:\\/\\/localhost:8000\\/product-detail\\/lorem-ipsum-is-simply\",\"fas\":\"fa-star\"}',NULL,'2020-08-18 02:08:16','2020-08-18 02:08:16'),
('ffffa177-c54e-4dfe-ba43-27c466ff1f4b','App\\Notifications\\StatusNotification','App\\User',1,'{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/localhost:8000\\/blog-detail\\/the-standard-lorem-ipsum-passage-used-since-the-1500s\",\"fas\":\"fas fa-comment\"}',NULL,'2020-08-18 02:13:29','2020-08-18 02:13:29');

/*Table structure for table `orders` */

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `sub_total` double(8,2) DEFAULT NULL,
  `shipping_id` bigint(20) unsigned DEFAULT NULL,
  `coupon` double(8,2) DEFAULT NULL,
  `total_amount` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `payment_method` enum('cod','paypal') COLLATE utf8mb4_unicode_ci DEFAULT 'cod',
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci DEFAULT 'unpaid',
  `status` enum('new','process','delivered','cancel') COLLATE utf8mb4_unicode_ci DEFAULT 'new',
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_shipping_id_foreign` (`shipping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPRESSED;

/*Data for the table `orders` */

insert  into `orders`(`id`,`order_number`,`user_id`,`sub_total`,`shipping_id`,`coupon`,`total_amount`,`quantity`,`payment_method`,`payment_status`,`status`,`first_name`,`last_name`,`email`,`phone`,`country`,`post_code`,`address1`,`address2`,`created_at`,`updated_at`) values
(1,'ORD-PMIQF5MYPK',3,14399.00,1,573.90,13925.10,6,'cod','unpaid','delivered','Prajwal','Rai','prajwal.iar@gmail.com','9800887778','NP','44600','Koteshwor','Kathmandu','2020-08-14 12:20:44','2020-08-14 14:37:37'),
(2,'ORD-YFF8BF0YBK',2,1939.03,1,NULL,2039.03,1,'cod','unpaid','delivered','Sandhya','Rai','user@gmail.com','90000000990','NP',NULL,'Lalitpur',NULL,'2020-08-15 03:14:49','2020-08-15 03:15:19');

/*Table structure for table `password_resets` */

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `post_categories` */

CREATE TABLE `post_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_categories` */

insert  into `post_categories`(`id`,`title`,`slug`,`status`,`created_at`,`updated_at`) values
(1,'Travel','contrary','active','2020-08-14 06:51:03','2020-08-14 06:51:39'),
(2,'Electronics','richard','active','2020-08-14 06:51:22','2020-08-14 06:52:00'),
(3,'Cloths','cloths','active','2020-08-14 06:52:22','2020-08-14 06:52:22'),
(4,'enjoy','enjoy','active','2020-08-14 08:16:10','2020-08-14 08:16:10'),
(5,'Post Category','post-category','active','2020-08-15 11:59:04','2020-08-15 11:59:04');

/*Table structure for table `post_comments` */

CREATE TABLE `post_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `post_id` bigint(20) unsigned DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `replied_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_user_id_foreign` (`user_id`),
  KEY `post_comments_post_id_foreign` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_comments` */

insert  into `post_comments`(`id`,`user_id`,`post_id`,`comment`,`status`,`replied_comment`,`parent_id`,`created_at`,`updated_at`) values
(1,1,2,'Testing comment edited','active',NULL,NULL,'2020-08-14 12:08:42','2020-08-15 11:59:58'),
(2,3,2,'testing 2','active',NULL,1,'2020-08-14 12:11:03','2020-08-14 12:11:03'),
(3,2,2,'That\'s cool','active',NULL,2,'2020-08-14 12:12:27','2020-08-14 12:12:27'),
(4,1,2,'nice','active',NULL,NULL,'2020-08-15 12:31:19','2020-08-15 12:31:19'),
(5,3,5,'nice blog','active',NULL,NULL,'2020-08-15 12:51:01','2020-08-15 12:51:01'),
(6,2,3,'nice','active',NULL,NULL,'2020-08-18 02:13:29','2020-08-18 02:13:29'),
(7,2,3,'really','active',NULL,6,'2020-08-18 02:13:51','2020-08-18 02:13:51');

/*Table structure for table `post_tags` */

CREATE TABLE `post_tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_tags_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_tags` */

insert  into `post_tags`(`id`,`title`,`slug`,`status`,`created_at`,`updated_at`) values
(1,'Enjoy','enjoy','active','2020-08-14 06:53:52','2020-08-14 06:53:52'),
(2,'2020','2020','active','2020-08-14 06:54:09','2020-08-14 06:54:09'),
(3,'Visit nepal 2020','visit-nepal-2020','active','2020-08-14 06:54:33','2020-08-14 06:54:33'),
(4,'Tag','tag','active','2020-08-15 11:59:31','2020-08-15 11:59:31');

/*Table structure for table `posts` */

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quote` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_cat_id` bigint(20) unsigned DEFAULT NULL,
  `post_tag_id` bigint(20) unsigned DEFAULT NULL,
  `added_by` bigint(20) unsigned DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  KEY `posts_added_by_foreign` (`added_by`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`title`,`slug`,`summary`,`description`,`quote`,`photo`,`tags`,`post_cat_id`,`post_tag_id`,`added_by`,`status`,`created_at`,`updated_at`) values
(1,'Where does it come from?','where-does-it-come-from','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Contrary to popular belief, Lorem Ipsum is not simply random text.&nbsp;</span><br></p>','<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</span><br></p>','/storage/photos/1/Blog/blog1.jpg','2020,Visit nepal 2020',1,NULL,2,'active','2020-08-14 06:55:55','2020-08-14 09:29:56'),
(2,'Where can I get some?','where-can-i-get-some','<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">It is a long established fact that a reader</span><br></h2>','<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 24px; font-size: 24px; padding: 0px; font-family: DauphinPlain;\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 24px; font-size: 24px; padding: 0px; font-family: DauphinPlain;\">Why do we use it?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>',NULL,'/storage/photos/1/Blog/blog2.jpg','Enjoy',2,NULL,1,'active','2020-08-14 06:58:52','2020-08-14 12:08:14'),
(3,'The standard Lorem Ipsum passage, used since the 1500s','the-standard-lorem-ipsum-passage-used-since-the-1500s','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit,</span><br></p>','<h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">1914 translation by H. Rackham</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">1914 translation by H. Rackham</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>',NULL,'/storage/photos/1/Blog/blog3.jpg','',3,NULL,3,'active','2020-08-14 07:59:33','2020-08-14 09:29:44'),
(5,'The standard Lorem Ipsum passage,','the-standard-lorem-ipsum-passage','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span><br></p>','<h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">The standard Lorem Ipsum passage, used since the 1500s</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\"</p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"</p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">1914 translation by H. Rackham</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Section 1.10.33 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"</p><h3 style=\"margin: 15px 0px; padding: 0px; font-weight: 700; font-size: 14px; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">1914 translation by H. Rackham</h3><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\">\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</span><br></p>','/storage/photos/1/Blog/blog2.jpg',',Enjoy,2020,Visit nepal 2020',1,NULL,1,'active','2020-08-15 11:58:45','2020-08-15 11:58:45'),
(6,'Lorem Ipsum is simply','lorem-ipsum-is-simply','<p><strong style=\"margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry.</span><br></p>','<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and</p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and</p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and</p><hr><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and</p><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and</p>',NULL,'/storage/photos/1/Blog/blog3.jpg','Enjoy,2020',2,NULL,1,'active','2020-08-18 01:54:19','2020-08-18 01:54:19');

/*Table structure for table `product_reviews` */

CREATE TABLE `product_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `rate` tinyint(4) DEFAULT 0,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_user_id_foreign` (`user_id`),
  KEY `product_reviews_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_reviews` */

insert  into `product_reviews`(`id`,`user_id`,`product_id`,`rate`,`review`,`status`,`created_at`,`updated_at`) values
(1,3,2,5,'nice product','active','2020-08-15 12:44:05','2020-08-15 12:44:05'),
(2,2,9,5,'nice','active','2020-08-18 02:08:14','2020-08-18 02:18:31');

/*Table structure for table `product_types` */

CREATE TABLE `product_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `product_types` */

insert  into `product_types`(`id`,`title`,`status`) values
(1,'After Make','1'),
(2,'OEM','1'),
(3,'Salvage','1');

/*Table structure for table `products` */

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_vendor_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` bigint(20) DEFAULT 1,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'M',
  `condition` enum('default','new','hot') COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `price` double(20,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT NULL,
  `cat_id` bigint(20) unsigned DEFAULT NULL,
  `child_cat_id` bigint(20) unsigned DEFAULT NULL,
  `brand_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_new` tinyint(4) DEFAULT NULL,
  `is_approved` tinyint(4) DEFAULT 0,
  `type` tinyint(4) DEFAULT NULL,
  `product_type` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_cat_id_foreign` (`cat_id`),
  KEY `products_child_cat_id_foreign` (`child_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`admin_vendor_id`,`title`,`slug`,`summary`,`description`,`photo`,`stock`,`size`,`condition`,`status`,`price`,`discount`,`is_featured`,`cat_id`,`child_cat_id`,`brand_id`,`created_at`,`updated_at`,`year`,`old_new`,`is_approved`,`type`,`product_type`) values
(1,1,'Jeep','jeep','we',NULL,'backend/product/sequayLsg2wj7sEJr52tQZFn85DCGBNXdMP1gQWU.jpeg',2,'M','default','active',300000.00,NULL,1,5,NULL,7,'2021-02-08 07:37:57','2021-02-10 09:19:22','2020',2,2,1,1),
(2,3,'Car','car',NULL,NULL,'backend/product/ASlyLDcfc5noW8FAlC5dmSJXlOiLWqnlOLc3wUtk.jpeg',10,'M','default','active',435000.00,NULL,1,5,NULL,9,'2021-02-08 11:29:01','2021-02-10 09:19:20','2015',1,1,1,2),
(3,2,'Sports Car','sports-car','Sports Car','hello this is a car','backend/product/HkilqPXWTkDjjnMToli7WgSHIxQBudI0lpgyNa2D.jpeg',10,'M','default','active',900000.00,NULL,1,5,NULL,8,'2021-02-08 13:12:29','2021-02-10 08:42:57','2019',1,2,1,1),
(4,1,'Jeep Renegade','jeep-renegade','23r',NULL,'backend/product/AeiXrMkdvLEPb69Lxlj1LUK1KgUh0EDsqYJgwwcq.jpeg',234,'M','default','active',234.00,NULL,1,5,NULL,8,'2021-02-08 14:14:18','2021-02-08 14:14:18','345',1,0,1,2),
(5,1,'aaaa','aaaa','qeWER',NULL,'backend/product/F1rvyzhs1P1zUmo6VYsuDUmb3dxnZH5LH7sjkLwR.jpeg',212,'M','default','active',1111222333.00,NULL,1,7,NULL,9,'2021-02-08 14:17:55','2021-02-10 08:42:55','111',2,0,4,3),
(6,1,'Jeep','jeep-2102111418-274','123',NULL,NULL,21,'M','default','active',300000.00,NULL,1,5,NULL,8,'2021-02-11 19:14:18','2021-02-11 19:14:18','21',1,0,2,1),
(7,1,'J.W. SPEAKER','J.W. SPEAKER',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,1,NULL,7,'2021-02-11 19:14:18','2021-02-23 17:11:11',NULL,2,1,1,1),
(8,1,'K&N','K&N',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,6,NULL,7,'2021-02-11 19:14:18','2021-02-26 17:11:18',NULL,2,1,1,1),
(9,1,'KC HILITES','KC HILITES',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,1,NULL,7,'2021-02-24 17:10:52','2021-02-24 17:11:25',NULL,2,1,1,1),
(10,1,'CROWN AUTOMOTIVE','CROWN AUTOMOTIVE',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,7,NULL,7,'2021-02-05 17:10:59','2021-02-10 17:11:28',NULL,2,1,1,1),
(11,1,'POISON SPYDER','POISON SPYDER',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,5,NULL,7,'2021-02-11 19:14:18','2021-02-20 17:11:31',NULL,2,1,1,1),
(12,1,'PRO COMP','PRO COMP',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,7,NULL,7,'2021-02-11 19:14:18','2021-02-20 17:11:36',NULL,2,1,1,1),
(13,1,'RUBICON EXPRESS','RUBICON EXPRESS',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,1,NULL,7,'2021-02-11 19:14:18','2021-02-23 17:11:33',NULL,2,1,1,1),
(14,1,'TERAFLEX','TERAFLEX',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,5,NULL,7,'2021-02-11 19:14:18','2021-02-14 17:11:43',NULL,2,1,1,1),
(15,1,'AEV','AEV',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,1,NULL,7,NULL,NULL,NULL,2,1,1,2),
(16,1,'ALLOY USA','ALLOY USA',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,7,NULL,7,NULL,NULL,NULL,2,1,1,1),
(17,1,'ALPINE','ALPINE',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,1,NULL,7,NULL,NULL,NULL,2,1,1,2),
(18,1,'ABR','ABR',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,5,NULL,7,NULL,NULL,NULL,2,1,1,1),
(19,1,'OMIX-ADA','OMIX-ADA',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,1,NULL,7,NULL,NULL,NULL,2,1,1,2),
(20,1,'BESTOP','BESTOP',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,7,NULL,7,NULL,NULL,NULL,2,1,1,1),
(21,1,'FOX RACING SHOX','FOX RACING SHOX',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,2,NULL,7,NULL,NULL,NULL,2,1,1,2),
(22,1,'G2 AXLE & GEAR','G2 AXLE & GEAR',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,5,NULL,7,NULL,NULL,NULL,2,1,1,1),
(23,1,'WRANGLER','WRANGLER',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,8,NULL,7,NULL,NULL,NULL,2,1,1,2),
(24,1,'WHEEL','WHEEL',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,8,NULL,7,NULL,NULL,NULL,2,1,1,3),
(25,1,'HMMWV','HMMWV',NULL,'hello this is a car . ',NULL,1,'M','default','active',NULL,NULL,1,8,NULL,7,NULL,NULL,NULL,2,1,1,2),
(26,1,'JEEP GLADIATOR','JEEP GLADIATOR',NULL,NULL,NULL,1,'M','default','active',NULL,NULL,1,8,NULL,7,NULL,'2021-02-11 12:06:24',NULL,2,1,1,2),
(27,1,'JEEP WRANGLER','JEEP WRANGLER',NULL,'The Jeep Wrangler is a series of compact and mid-size (2-door Wrangler, and a longer wheelbase / 4-door Wrangler Unlimited) four-wheel drive off-road SUVs, manufactured by Jeep since 1986, and currently in its fourth generation',NULL,1,'M','default','active',NULL,NULL,1,8,NULL,7,NULL,'2021-02-11 12:06:23',NULL,2,1,1,1),
(28,1,'QUADRATEC jeep','QUADRATEC',NULL,'this is a car . ',NULL,1,'M','default','active',245.00,NULL,1,8,NULL,7,NULL,'2021-02-11 12:06:21',NULL,2,1,1,3),
(29,NULL,NULL,NULL,NULL,NULL,NULL,1,'M','default','active',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL);

/*Table structure for table `settings` */

CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `settings` */

insert  into `settings`(`id`,`description`,`short_des`,`logo`,`photo`,`address`,`phone`,`email`,`created_at`,`updated_at`) values
(1,'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis unde sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis unde omnis iste natus error sit voluptatem Excepteu\r\n\r\n                            sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspiciatis Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspi deserunt mollit anim id est laborum. sed ut perspi.','Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.','/storage/photos/1/logo.png','/storage/photos/1/blog3.jpg','NO. 342 - London Oxford Street, 012 United Kingdom','+060 (800) 801-582','eshop@gmail.com',NULL,'2020-08-14 06:49:09');

/*Table structure for table `shippings` */

CREATE TABLE `shippings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shippings` */

insert  into `shippings`(`id`,`type`,`price`,`status`,`created_at`,`updated_at`) values
(1,'Kahtmandu',100.00,'active','2020-08-14 09:22:17','2020-08-14 09:22:17'),
(2,'Out of valley',300.00,'active','2020-08-14 09:22:41','2020-08-14 09:22:41'),
(3,'Pokhara',400.00,'active','2020-08-15 11:54:04','2020-08-15 11:54:04'),
(4,'Dharan',400.00,'active','2020-08-18 01:50:48','2020-08-18 01:50:48');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user','vendor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_vendor` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`photo`,`role`,`provider`,`provider_id`,`status`,`remember_token`,`created_at`,`updated_at`,`is_vendor`) values
(1,'admin','admin@gmail.com',NULL,'$2y$12$14su0XXKy65oBdssPFeFOeAOFJ0OSkEmtmX03LrUj3D46/NSU.H6.',NULL,'admin',NULL,NULL,'active',NULL,NULL,NULL,0),
(2,'vendor','vendor@gmail.com',NULL,'$2y$12$GicK1WreZ9mLdP7HNoxLdekCrtW94uNtqs2Defm1NmhsNv.8api8y',NULL,'vendor',NULL,NULL,'active',NULL,'2021-02-03 15:20:51','2021-02-08 07:29:15',2),
(3,'user','user@gmail.com',NULL,'$2y$10$cQ0bHXyb10vx/HNutEE6dOTV5QrpFiHNGVNVgcDUWng7Kpe4zHpsK',NULL,'user',NULL,NULL,'active',NULL,'2021-02-08 08:22:09','2021-02-08 11:27:20',0),
(29,'Ali@gmail.com','Ali@gmail.com',NULL,'$2y$10$6pTv3TU7T84ojFlaZKtS2ObPFPO9WFXwELBnK6lCE6ufInmp3ssCy',NULL,'vendor',NULL,NULL,'active',NULL,'2021-02-09 15:14:30','2021-02-09 15:14:30',2);

/*Table structure for table `wishlists` */

CREATE TABLE `wishlists` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `cart_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_cart_id_foreign` (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `wishlists` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
