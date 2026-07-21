-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2026 at 06:54 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firebnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('superadmin','admin','editor') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `username`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin@booking.com', '$2y$10$dFcWFFgIU8UZKSbhy0qmH.PJ.RauR.uz9jLkg/wHzEmJHTm17QbgG', 'superadmin', NULL, '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(2, 'Admin', 'admin2', 'admin@admin.com', '$2y$10$dFcWFFgIU8UZKSbhy0qmH.PJ.RauR.uz9jLkg/wHzEmJHTm17QbgG', 'admin', NULL, '2025-12-29 23:53:18', '2025-12-29 23:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `am_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cat_slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `am_slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `cat`, `am_name`, `cat_slug`, `am_slug`, `created_at`, `updated_at`) VALUES
(1, 'Popular amenities', 'Wifi', 'popular-amenities', 'wifi', '2025-06-04 07:27:11', '2025-06-04 07:27:11'),
(2, 'Popular amenities', 'Breakfast', 'popular-amenities', 'breakfast', '2025-06-04 07:28:12', '2025-06-04 07:28:12'),
(3, 'Popular amenities', 'Gym', 'popular-amenities', 'gym', '2025-06-04 07:28:22', '2025-06-04 07:28:22'),
(4, 'Popular amenities', 'Swimming pool', 'popular-amenities', 'swimming-pool', '2025-06-04 07:28:34', '2025-06-04 07:28:34'),
(5, 'Popular amenities', 'In-room coffee/tea', 'popular-amenities', 'in-room-coffee-tea', '2025-06-04 07:28:47', '2025-06-04 07:28:47'),
(6, 'Popular amenities', 'Daily housekeeping', 'popular-amenities', 'daily-housekeeping', '2025-06-04 07:28:55', '2025-06-04 07:28:55'),
(7, 'Popular amenities', 'Bar / Lounge', 'popular-amenities', 'bar-lounge', '2025-06-04 07:29:02', '2025-06-04 07:29:02'),
(8, 'Popular amenities', 'Laundry', 'popular-amenities', 'laundry', '2025-06-04 07:29:12', '2025-06-04 07:29:12'),
(9, 'Popular amenities', 'Newspaper', 'popular-amenities', 'newspaper', '2025-06-04 07:29:21', '2025-06-04 07:29:21'),
(10, 'Popular amenities', 'Bicycle', 'popular-amenities', 'bicycle', '2025-06-04 07:29:30', '2025-06-04 07:29:30'),
(11, 'Popular amenities', 'Air conditioning', 'popular-amenities', 'air-conditioning', '2025-06-04 07:29:45', '2025-06-04 07:29:45'),
(12, 'Popular amenities', 'Games room', 'popular-amenities', 'games-room', '2025-06-04 07:29:56', '2025-06-04 07:29:56'),
(13, 'Popular amenities', 'Beach view', 'popular-amenities', 'beach-view', '2025-06-04 07:30:05', '2025-06-04 07:30:05'),
(14, 'Food & Drink', 'Restaurants', 'food-drink', 'restaurants', '2025-06-04 07:39:06', '2025-06-04 07:39:06'),
(15, 'Food & Drink', 'Bars', 'food-drink', 'bars', '2025-06-04 07:39:15', '2025-06-04 07:39:15'),
(16, 'Food & Drink', 'In-Room Dining', 'food-drink', 'in-room-dining', '2025-06-04 07:39:25', '2025-06-04 07:39:25'),
(17, 'Food & Drink', 'Family-Friendly Dining', 'food-drink', 'family-friendly-dining', '2025-06-04 07:39:34', '2025-06-04 07:39:34'),
(18, 'Food & Drink', 'Breakfast Buffet', 'food-drink', 'breakfast-buffet', '2025-06-04 07:39:41', '2025-06-04 07:39:41'),
(19, 'Outdoor & View', 'Garden or Courtyard', 'outdoor-view', 'garden-or-courtyard', '2025-06-04 07:40:09', '2025-06-04 07:40:09'),
(20, 'Outdoor & View', 'Scenic Views', 'outdoor-view', 'scenic-views', '2025-06-04 07:40:14', '2025-06-04 07:40:14'),
(21, 'Outdoor & View', 'Sunbathing Areas', 'outdoor-view', 'sunbathing-areas', '2025-06-04 07:40:34', '2025-06-04 07:40:34'),
(22, 'Outdoor & View', 'Outdoor Lounge Areas', 'outdoor-view', 'outdoor-lounge-areas', '2025-06-04 07:40:43', '2025-06-04 07:40:43'),
(23, 'Entertainment & Family Services', 'Game Room', 'entertainment-family-services', 'game-room', '2025-06-04 07:41:33', '2025-06-04 07:41:33'),
(24, 'Entertainment & Family Services', 'Children\'s Play Area', 'entertainment-family-services', 'children-s-play-area', '2025-06-04 07:41:41', '2025-06-04 07:41:41'),
(25, 'Entertainment & Family Services', 'Sports Facilities', 'entertainment-family-services', 'sports-facilities', '2025-06-04 07:41:49', '2025-06-04 07:41:49'),
(26, 'Entertainment & Family Services', 'Babysitting Services', 'entertainment-family-services', 'babysitting-services', '2025-06-04 07:41:55', '2025-06-04 07:41:55'),
(27, 'Media & Technology', 'High-Speed Internet', 'media-technology', 'high-speed-internet', '2025-06-04 07:42:12', '2025-06-04 07:42:12'),
(28, 'Media & Technology', 'Business Center', 'media-technology', 'business-center', '2025-06-04 07:42:23', '2025-06-04 07:42:23'),
(29, 'Media & Technology', 'Video Conferencing Facilities', 'media-technology', 'video-conferencing-facilities', '2025-06-04 07:42:31', '2025-06-04 07:42:31'),
(30, 'Media & Technology', 'Virtual Reality (VR) Experiences', 'media-technology', 'virtual-reality-vr-experiences', '2025-06-04 07:42:39', '2025-06-04 07:42:39'),
(31, 'Accessibility', 'Accessible Common Areas', 'accessibility', 'accessible-common-areas', '2025-06-04 07:42:48', '2025-06-04 07:42:48'),
(32, 'Accessibility', 'Accessible Parking Spaces', 'accessibility', 'accessible-parking-spaces', '2025-06-04 07:42:55', '2025-06-04 07:42:55'),
(33, 'Accessibility', 'Accessible Fitness Center', 'accessibility', 'accessible-fitness-center', '2025-06-04 07:43:03', '2025-06-04 07:43:03'),
(34, 'Accessibility', 'Accessible Swimming Pool', 'accessibility', 'accessible-swimming-pool', '2025-06-04 07:43:10', '2025-06-04 07:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `pnr_no` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `hotel_id` int UNSIGNED NOT NULL,
  `rooms` json NOT NULL COMMENT 'Rooms with guests snapshot',
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int NOT NULL DEFAULT '1',
  `children` int NOT NULL DEFAULT '0',
  `infants` int NOT NULL DEFAULT '0',
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(5) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'INR',
  `payment_status` enum('pending','paid','failed','refunded') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `booking_status` enum('pending','confirmed','cancelled','completed') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pnr_no` (`pnr_no`),
  KEY `user_id` (`user_id`),
  KEY `payment_id` (`payment_id`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `property_name_slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `rating` int NOT NULL DEFAULT '5',
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `chain_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `property_name_slug` (`property_name_slug`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `property_name`, `property_name_slug`, `description`, `rating`, `email`, `phone`, `chain_name`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Taj Palace Hotel', 'taj-Palace-Hotel', 'A luxury 5-star hotel located in the heart of New Delhi.', 5, 'contact@tajpalacedelhi.com', '+91 11 23456789', 'Taj Hotels', '84.jpg', NULL, NULL),
(2, 'The Oberoi Mumbai', 'the-oberoi-mumbai', 'Premium sea-facing hotel located at Marine Drive.', 5, 'reservations@oberoimumbai.com', '+91 22 66326060', 'Oberoi Hotels', '84.jpg', NULL, NULL),
(3, 'Bengaluru Grand Residency', 'bengaluru-grand-residency', 'Business friendly hotel near MG Road.', 4, 'info@grandblr.com', '+91 80 22446688', 'Grand Hotels', '84.jpg', NULL, NULL),
(4, 'Hyderabad Pearl Inn', 'hyderabad-pearl-inn', 'Mid-range hotel near Hitech City.', 4, 'contact@pearlhyderabad.com', '+91 40 22551199', 'Pearl Group', '84.jpg', NULL, NULL),
(5, 'Chennai Seaside Resort', 'chennai-seaside-resort', 'Beachside property with calm ambience.', 4, 'info@chennairest.com', '+91 44 33445566', 'Seaside Group', '84.jpg', NULL, NULL),
(6, 'Kolkata Heritage Suites', 'kolkata-heritage-suites', 'Colonial style lodging near Park Street.', 3, 'contact@kolheritage.com', '+91 33 22118855', 'Heritage Hotels', '84.jpg', NULL, NULL),
(7, 'Pune Urban Stay', 'pune-urban-stay', 'Modern hotel near Koregaon Park.', 4, 'support@punestay.com', '+91 20 24241122', 'Urban Hotels', '84.jpg', NULL, NULL),
(8, 'Jaipur Royal Inn', 'jaipur-royal-inn', 'Traditional Rajasthani themed property.', 4, 'info@jaipurroyal.com', '+91 141 2323232', 'Royal Group', '84.jpg', NULL, NULL),
(9, 'Ahmedabad Comfort Hotel', 'ahmedabad-comfort-hotel', 'Family-friendly hotel near SG Highway.', 3, 'contact@ahdcomfort.com', '+91 79 44556677', 'Comfort Hotels', '84.jpg', NULL, NULL),
(10, 'Goa Beach Paradise', 'goa-beach-paradise', 'Resort located on Calangute Beach.', 4, 'contact@goaparadise.com', '+91 832 2244556', 'Paradise Resorts', '84.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_amenities`
--

DROP TABLE IF EXISTS `hotel_amenities`;
CREATE TABLE IF NOT EXISTS `hotel_amenities` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `hotel_id` int NOT NULL,
  `amenities` json DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_amenities_hotel_id_foreign` (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_amenities`
--

INSERT INTO `hotel_amenities` (`id`, `hotel_id`, `amenities`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(2, 2, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(3, 3, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(4, 4, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(5, 5, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(6, 6, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(7, 7, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(8, 8, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(9, 9, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(10, 10, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_finance`
--

DROP TABLE IF EXISTS `hotel_finance`;
CREATE TABLE IF NOT EXISTS `hotel_finance` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `hotel_id` int NOT NULL,
  `cash_payment` tinyint(1) NOT NULL DEFAULT '0',
  `card_payment` tinyint(1) NOT NULL DEFAULT '0',
  `online_payment` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_finance_hotel_id_foreign` (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_finance`
--

INSERT INTO `hotel_finance` (`id`, `hotel_id`, `cash_payment`, `card_payment`, `online_payment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL),
(2, 2, 1, 1, 1, NULL, NULL),
(3, 3, 1, 1, 1, NULL, NULL),
(4, 4, 1, 1, 1, NULL, NULL),
(5, 5, 1, 1, 1, NULL, NULL),
(6, 6, 1, 1, 1, NULL, NULL),
(7, 7, 1, 1, 1, NULL, NULL),
(8, 8, 1, 1, 1, NULL, NULL),
(9, 9, 1, 1, 1, NULL, NULL),
(10, 10, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_gallery`
--

DROP TABLE IF EXISTS `hotel_gallery`;
CREATE TABLE IF NOT EXISTS `hotel_gallery` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `hotel_id` int NOT NULL,
  `photos` json DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_gallery_hotel_id_foreign` (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_gallery`
--

INSERT INTO `hotel_gallery` (`id`, `hotel_id`, `photos`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(2, 2, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(3, 3, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(4, 4, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(5, 5, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(6, 6, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(7, 7, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(8, 8, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(9, 9, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL),
(10, 10, '[\"40.png\", \"51.png\", \"52.png\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_locations`
--

DROP TABLE IF EXISTS `hotel_locations`;
CREATE TABLE IF NOT EXISTS `hotel_locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hotel_id` int NOT NULL,
  `street_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `zip_code` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `country_or_region` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_locations_hotel_id_foreign` (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_locations`
--

INSERT INTO `hotel_locations` (`id`, `hotel_id`, `street_name`, `city`, `state`, `zip_code`, `country_or_region`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sardar Patel Marg', 'New Delhi', 'Delhi', '110021', 'India', 28.5962000, 77.1735000, NULL, NULL),
(2, 2, 'Marine Drive', 'Mumbai', 'Maharashtra', '400020', 'India', 18.9353000, 72.8259000, NULL, NULL),
(3, 3, 'MG Road', 'Bengaluru', 'Karnataka', '560001', 'India', 12.9755000, 77.6030000, NULL, NULL),
(4, 4, 'Hitech City Road', 'Hyderabad', 'Telangana', '500081', 'India', 17.4483000, 78.3908000, NULL, NULL),
(5, 5, 'ECR Road', 'Chennai', 'Tamil Nadu', '600041', 'India', 12.9121000, 80.2274000, NULL, NULL),
(6, 6, 'Park Street', 'Kolkata', 'West Bengal', '700016', 'India', 22.5524000, 88.3535000, NULL, NULL),
(7, 7, 'Koregaon Park', 'Pune', 'Maharashtra', '411001', 'India', 18.5362000, 73.8938000, NULL, NULL),
(8, 8, 'MI Road', 'Jaipur', 'Rajasthan', '302001', 'India', 26.9124000, 75.7873000, NULL, NULL),
(9, 9, 'SG Highway', 'Ahmedabad', 'Gujarat', '380054', 'India', 23.0225000, 72.5714000, NULL, NULL),
(10, 10, 'Calangute Beach Road', 'Calangute', 'Goa', '403516', 'India', 15.5439000, 73.7553000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_policies`
--

DROP TABLE IF EXISTS `hotel_policies`;
CREATE TABLE IF NOT EXISTS `hotel_policies` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `hotel_id` int NOT NULL,
  `ci_type` tinyint(1) NOT NULL DEFAULT '0',
  `ci_start_time` time DEFAULT NULL,
  `ci_end_time` time DEFAULT NULL,
  `late_ci` tinyint(1) NOT NULL DEFAULT '0',
  `age_restriction` tinyint(1) NOT NULL DEFAULT '0',
  `deposit_at_ci` tinyint(1) NOT NULL DEFAULT '0',
  `doc_at_ci` tinyint(1) NOT NULL DEFAULT '0',
  `co_before` time DEFAULT NULL,
  `flexible_co_status` tinyint(1) NOT NULL DEFAULT '0',
  `flexible_co_type` tinyint(1) NOT NULL DEFAULT '0',
  `flexible_co_condition` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `refund_policy_type` tinyint(1) NOT NULL DEFAULT '0',
  `full_refund_allowed` tinyint(1) NOT NULL DEFAULT '0',
  `partial_refund_allowed` tinyint(1) NOT NULL DEFAULT '0',
  `pet_policy_type` tinyint(1) NOT NULL DEFAULT '0',
  `pet_restricted_zones` tinyint(1) NOT NULL DEFAULT '0',
  `pet_additional_charges` tinyint(1) NOT NULL DEFAULT '0',
  `age_segments` json DEFAULT NULL,
  `child_doc_requirement` tinyint(1) NOT NULL DEFAULT '0',
  `vat_included` tinyint(1) NOT NULL DEFAULT '0',
  `vat_radio` tinyint(1) NOT NULL DEFAULT '0',
  `vat_condition` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gst_included` tinyint(1) NOT NULL DEFAULT '0',
  `gst_radio` tinyint(1) NOT NULL DEFAULT '0',
  `gst_condition` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hotel_tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `hotel_tax_radio` tinyint(1) NOT NULL DEFAULT '0',
  `hotel_tax_condition` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city_dist_tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `regional_location_tax_radio` tinyint(1) NOT NULL DEFAULT '0',
  `cdt_condition` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tourist_tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `tourist_tax_radio` tinyint(1) NOT NULL DEFAULT '0',
  `tourist_tax_condition` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `property_registration_no` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `business_registration_no` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `taxpayer_identification_no` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotel_id` (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_policies`
--

INSERT INTO `hotel_policies` (`id`, `hotel_id`, `ci_type`, `ci_start_time`, `ci_end_time`, `late_ci`, `age_restriction`, `deposit_at_ci`, `doc_at_ci`, `co_before`, `flexible_co_status`, `flexible_co_type`, `flexible_co_condition`, `refund_policy_type`, `full_refund_allowed`, `partial_refund_allowed`, `pet_policy_type`, `pet_restricted_zones`, `pet_additional_charges`, `age_segments`, `child_doc_requirement`, `vat_included`, `vat_radio`, `vat_condition`, `gst_included`, `gst_radio`, `gst_condition`, `hotel_tax_included`, `hotel_tax_radio`, `hotel_tax_condition`, `city_dist_tax_included`, `regional_location_tax_radio`, `cdt_condition`, `tourist_tax_included`, `tourist_tax_radio`, `tourist_tax_condition`, `property_registration_no`, `business_registration_no`, `taxpayer_identification_no`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP51476', 'BUSS87536', 'TAX24532', NULL, NULL),
(2, 2, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP35834', 'BUSS38490', 'TAX22895', NULL, NULL),
(3, 3, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP51346', 'BUSS26631', 'TAX37276', NULL, NULL),
(4, 4, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP26730', 'BUSS40728', 'TAX64988', NULL, NULL),
(5, 5, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP70797', 'BUSS91308', 'TAX91813', NULL, NULL),
(6, 6, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP76539', 'BUSS32801', 'TAX70557', NULL, NULL),
(7, 7, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP86431', 'BUSS86119', 'TAX75636', NULL, NULL),
(8, 8, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP27902', 'BUSS17180', 'TAX10832', NULL, NULL),
(9, 9, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP41882', 'BUSS95645', 'TAX57053', NULL, NULL),
(10, 10, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP50425', 'BUSS51075', 'TAX74963', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-05-12-173149', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1767032570, 1),
(2, '2025-05-12-195708', 'App\\Database\\Migrations\\CreateAdminsTable', 'default', 'App', 1767032570, 1),
(3, '2025-05-23-175323', 'App\\Database\\Migrations\\CreateHotelsTable', 'default', 'App', 1767032570, 1),
(4, '2025-05-29-193413', 'App\\Database\\Migrations\\CreateHotelsLocationTable', 'default', 'App', 1767032570, 1),
(5, '2025-05-31-192232', 'App\\Database\\Migrations\\CreateAmenitiesTable', 'default', 'App', 1767032570, 1),
(6, '2025-06-03-073005', 'App\\Database\\Migrations\\CreateHotelAmenitiesTable', 'default', 'App', 1767032571, 1),
(7, '2025-06-05-171422', 'App\\Database\\Migrations\\CreateHotelGalleyTable', 'default', 'App', 1767032571, 1),
(8, '2025-06-09-162122', 'App\\Database\\Migrations\\CreateHotelFinanceTable', 'default', 'App', 1767032571, 1),
(9, '2025-06-10-161901', 'App\\Database\\Migrations\\CreateHotelPoliciesTable', 'default', 'App', 1767032571, 1),
(10, '2025-11-06-103912', 'App\\Database\\Migrations\\CreateUserEmailVerificationsTable', 'default', 'App', 1767032571, 1),
(11, '2025-11-25-170223', 'App\\Database\\Migrations\\CreateRoomsTable', 'default', 'App', 1767032571, 1),
(12, '2025-11-27-081428', 'App\\Database\\Migrations\\CreateRoomsCatagoryTable', 'default', 'App', 1767032571, 1),
(13, '2025-12-06-174622', 'App\\Database\\Migrations\\CreateBookingsTable', 'default', 'App', 1767032571, 1),
(14, '2025-12-13-171501', 'App\\Database\\Migrations\\CreateSiteSettingsTable', 'default', 'App', 1767032571, 1),
(16, '2025-12-29-172148', 'App\\Database\\Migrations\\CreateTravellersTable', 'default', 'App', 1767266359, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `room_slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Per night cost for allowed guest.',
  `hotel_id` int UNSIGNED NOT NULL,
  `amenities` json DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `min_adult` int UNSIGNED NOT NULL DEFAULT '1' COMMENT 'Minimum allowed adult.',
  `max_adult` int UNSIGNED DEFAULT NULL COMMENT 'Maximum allowed adult.',
  `min_infants` int UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Minimum allowed infants.',
  `max_infants` int UNSIGNED DEFAULT NULL COMMENT 'Maximum allowed infants.',
  `min_children` int UNSIGNED NOT NULL DEFAULT '0' COMMENT 'Minimum allowed children.',
  `max_children` int UNSIGNED DEFAULT NULL COMMENT 'Maximum allowed children.',
  `max_occupancy` int UNSIGNED DEFAULT NULL COMMENT 'Total max guests allowed',
  `status` enum('active','inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotel_id_room_slug` (`hotel_id`,`room_slug`),
  KEY `hotel_id` (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_slug`, `price`, `hotel_id`, `amenities`, `description`, `min_adult`, `max_adult`, `min_infants`, `max_infants`, `min_children`, `max_children`, `max_occupancy`, `status`, `created_at`, `updated_at`) VALUES
(1, 'King room', 'king-room', 4946.00, 1, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(2, 'Twin room', 'twin-room', 6556.00, 1, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(3, 'King room', 'king-room', 3784.00, 2, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(4, 'Twin room', 'twin-room', 10440.00, 2, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(5, 'King room', 'king-room', 5295.00, 3, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(6, 'Twin room', 'twin-room', 10170.00, 3, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(7, 'King room', 'king-room', 4147.00, 4, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(8, 'Twin room', 'twin-room', 9089.00, 4, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(9, 'King room', 'king-room', 4215.00, 5, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(10, 'Twin room', 'twin-room', 10141.00, 5, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(11, 'King room', 'king-room', 3782.00, 6, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(12, 'Twin room', 'twin-room', 5576.00, 6, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(13, 'King room', 'king-room', 4403.00, 7, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(14, 'Twin room', 'twin-room', 9282.00, 7, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(15, 'King room', 'king-room', 3811.00, 8, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(16, 'Twin room', 'twin-room', 11167.00, 8, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(17, 'King room', 'king-room', 2616.00, 9, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(18, 'Twin room', 'twin-room', 5209.00, 9, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(19, 'King room', 'king-room', 2570.00, 10, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18'),
(20, 'Twin room', 'twin-room', 10647.00, 10, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', 1, NULL, 0, NULL, 0, NULL, NULL, 'active', '2025-12-29 23:53:18', '2025-12-29 23:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_catagory`
--

DROP TABLE IF EXISTS `rooms_catagory`;
CREATE TABLE IF NOT EXISTS `rooms_catagory` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `room_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cat_slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `room_slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(150) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Setting identifier (ex: site_name)',
  `value` text COLLATE utf8mb4_general_ci,
  `type` enum('string','text','number','boolean','json') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'string',
  `setting_group` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'general',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `setting_key`, `value`, `type`, `setting_group`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'FireBnB', 'string', 'general', NULL, NULL),
(2, 'site_version', '2.5.0', 'string', 'general', NULL, NULL),
(3, 'site_email', 'support@firebnb.com', 'string', 'email', NULL, NULL),
(4, 'site_phone', '+1234567890', 'string', 'phone', NULL, NULL),
(5, 'site_whatsapp', '+1234567890', 'string', 'whatsapp', NULL, NULL),
(6, 'currency_method', '{\"currency\":\"usd\",\"symbol\":\"$\"}', 'json', 'payment', NULL, NULL),
(7, 'stripe_keys', '{\"key\":\"key\",\"secret\":\"secret\"}', 'json', 'payment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `travellers`
--

DROP TABLE IF EXISTS `travellers`;
CREATE TABLE IF NOT EXISTS `travellers` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED DEFAULT NULL,
  `full_name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `age` tinyint UNSIGNED DEFAULT NULL COMMENT 'Age in years (0–100)',
  `type` enum('adult','child','infant') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id_full_name_type` (`user_id`,`full_name`,`type`),
  KEY `user_id_type` (`user_id`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travellers`
--

INSERT INTO `travellers` (`id`, `user_id`, `full_name`, `age`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'lipika halder', 24, 'adult', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password_hash`, `remember_token`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'admin@test.com', 'admin', '$2y$10$9lwK0HlSNO.puMECc9CKMObnyQ2BhDGEmf/jJ2dfp.tPYtuNCTiia', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_email_verifications`
--

DROP TABLE IF EXISTS `user_email_verifications`;
CREATE TABLE IF NOT EXISTS `user_email_verifications` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `otp_code` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `type` enum('otp','magic_link','mix') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_email_verifications_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
