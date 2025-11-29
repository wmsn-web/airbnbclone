-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2025 at 07:03 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

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
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('superadmin','admin','editor') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'admin',
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `username`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin@booking.com', '$2y$10$JQclgbiSLUdfVpk1aRv2x.wwii0ccyM6pi2qSgrvZZODcgHq2Pmj6', 'superadmin', NULL, '2025-11-16 18:14:27', '2025-11-28 00:17:24'),
(2, 'Admin', 'admin2', 'admin@admin.com', '$2y$10$OC1jPf/EFqOFSmXBW3tIjuEaUtgpi2h2V07dsy.MZAFFUfumOXIDG', 'admin', NULL, '2025-11-16 18:14:27', '2025-11-26 12:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

DROP TABLE IF EXISTS `amenities`;
CREATE TABLE IF NOT EXISTS `amenities` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `am_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cat_slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `am_slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `rating` int NOT NULL DEFAULT '5',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chain_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `property_name`, `description`, `rating`, `email`, `phone`, `chain_name`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Taj Palace Hotel', 'A luxury 5-star hotel located in the heart of New Delhi.', 5, 'contact@tajpalacedelhi.com', '+91 11 23456789', 'Taj Hotels', 'taj.webp', NULL, NULL),
(2, 'The Oberoi Mumbai', 'Premium sea-facing hotel located at Marine Drive.', 5, 'reservations@oberoimumbai.com', '+91 22 66326060', 'Oberoi Hotels', 'oberoi.webp', NULL, NULL),
(3, 'Bengaluru Grand Residency', 'Business friendly hotel near MG Road.', 4, 'info@grandblr.com', '+91 80 22446688', 'Grand Hotels', 'blr.webp', NULL, NULL),
(4, 'Hyderabad Pearl Inn', 'Mid-range hotel near Hitech City.', 4, 'contact@pearlhyderabad.com', '+91 40 22551199', 'Pearl Group', 'hyd.webp', NULL, NULL),
(5, 'Chennai Seaside Resort', 'Beachside property with calm ambience.', 4, 'info@chennairest.com', '+91 44 33445566', 'Seaside Group', 'che.webp', NULL, NULL),
(6, 'Kolkata Heritage Suites', 'Colonial style lodging near Park Street.', 3, 'contact@kolheritage.com', '+91 33 22118855', 'Heritage Hotels', 'kol.webp', NULL, NULL),
(7, 'Pune Urban Stay', 'Modern hotel near Koregaon Park.', 4, 'support@punestay.com', '+91 20 24241122', 'Urban Hotels', 'pune.webp', NULL, NULL),
(8, 'Jaipur Royal Inn', 'Traditional Rajasthani themed property.', 4, 'info@jaipurroyal.com', '+91 141 2323232', 'Royal Group', 'jai.webp', NULL, NULL),
(9, 'Ahmedabad Comfort Hotel', 'Family-friendly hotel near SG Highway.', 3, 'contact@ahdcomfort.com', '+91 79 44556677', 'Comfort Hotels', 'amd.webp', NULL, NULL),
(10, 'Goa Beach Paradise', 'Resort located on Calangute Beach.', 4, 'contact@goaparadise.com', '+91 832 2244556', 'Paradise Resorts', 'goa.webp', NULL, NULL),
(11, 'Hilton Times Square', 'Hotel located in Times Square, New York.', 5, 'contact@hiltontimessq.com', '+1 212-555-7812', 'Hilton Hotels', 'nyc.webp', NULL, NULL),
(12, 'Los Angeles Grand Suites', 'Elegantly designed suites near Hollywood.', 4, 'info@lagrandsuites.com', '+1 310-555-2299', 'Grand Suites', 'la.webp', NULL, NULL),
(13, 'Chicago Lakeview Hotel', '4-star hotel with stunning lake views.', 4, 'support@lakeviewchicago.com', '+1 312-555-4477', 'Lakeview Hotels', 'chi.webp', NULL, NULL),
(14, 'Miami Beach Resort', 'Beachfront resort with pool and spa.', 5, 'contact@miamiresort.com', '+1 305-555-8844', 'Beach Resorts', 'miami.webp', NULL, NULL),
(15, 'Las Vegas Strip Hotel', 'Casino hotel located directly on Las Vegas Strip.', 4, 'info@vegasstrip.com', '+1 702-555-9911', 'Strip Hotels', 'lv.webp', NULL, NULL),
(16, 'Houston Comfort Stay', 'Comfortable family hotel in uptown Houston.', 3, 'support@houstoncomfort.com', '+1 713-555-6611', 'Comfort Chain', 'hou.webp', NULL, NULL),
(17, 'San Francisco Bayview Hotel', 'Hotel offering panoramic views of the bay.', 5, 'info@sf-bayview.com', '+1 415-555-2334', 'Bayview Hotels', 'sf.webp', NULL, NULL),
(18, 'Seattle Skyview Inn', 'Comfortable rooms near Space Needle.', 4, 'contact@seattleskyinn.com', '+1 206-555-8821', 'Skyview Hotels', 'sea.webp', NULL, NULL),
(19, 'Boston Harbor Hotel', 'Classic waterfront luxury property.', 5, 'reservations@bostonharbor.com', '+1 617-555-1220', 'Harbor Group', 'bos.webp', NULL, NULL),
(20, 'Denver Mountain Retreat', 'Nature-themed retreat near the Rockies.', 4, 'info@denverretreat.com', '+1 720-555-3390', 'Retreat Hotels', 'den.webp', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, 10, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(11, 11, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(12, 12, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(13, 13, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(14, 14, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(15, 15, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(16, 16, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(17, 17, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(18, 18, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(19, 19, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL),
(20, 20, '{\"wifi\": {\"type\": \"free\"}, \"parking\": {\"type\": \"paid\"}, \"breakfast\": {\"type\": \"paid\"}}', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, 10, 1, 1, 1, NULL, NULL),
(11, 11, 1, 1, 1, NULL, NULL),
(12, 12, 1, 1, 1, NULL, NULL),
(13, 13, 1, 1, 1, NULL, NULL),
(14, 14, 1, 1, 1, NULL, NULL),
(15, 15, 1, 1, 1, NULL, NULL),
(16, 16, 1, 1, 1, NULL, NULL),
(17, 17, 1, 1, 1, NULL, NULL),
(18, 18, 1, 1, 1, NULL, NULL),
(19, 19, 1, 1, 1, NULL, NULL),
(20, 20, 1, 1, 1, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_gallery`
--

INSERT INTO `hotel_gallery` (`id`, `hotel_id`, `photos`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"hotel1_1.jpg\", \"hotel1_2.jpg\", \"hotel1_3.jpg\"]', NULL, NULL),
(2, 2, '[\"hotel2_1.jpg\", \"hotel2_2.jpg\", \"hotel2_3.jpg\"]', NULL, NULL),
(3, 3, '[\"hotel3_1.jpg\", \"hotel3_2.jpg\", \"hotel3_3.jpg\"]', NULL, NULL),
(4, 4, '[\"hotel4_1.jpg\", \"hotel4_2.jpg\", \"hotel4_3.jpg\"]', NULL, NULL),
(5, 5, '[\"hotel5_1.jpg\", \"hotel5_2.jpg\", \"hotel5_3.jpg\"]', NULL, NULL),
(6, 6, '[\"hotel6_1.jpg\", \"hotel6_2.jpg\", \"hotel6_3.jpg\"]', NULL, NULL),
(7, 7, '[\"hotel7_1.jpg\", \"hotel7_2.jpg\", \"hotel7_3.jpg\"]', NULL, NULL),
(8, 8, '[\"hotel8_1.jpg\", \"hotel8_2.jpg\", \"hotel8_3.jpg\"]', NULL, NULL),
(9, 9, '[\"hotel9_1.jpg\", \"hotel9_2.jpg\", \"hotel9_3.jpg\"]', NULL, NULL),
(10, 10, '[\"hotel10_1.jpg\", \"hotel10_2.jpg\", \"hotel10_3.jpg\"]', NULL, NULL),
(11, 11, '[\"hotel11_1.jpg\", \"hotel11_2.jpg\", \"hotel11_3.jpg\"]', NULL, NULL),
(12, 12, '[\"hotel12_1.jpg\", \"hotel12_2.jpg\", \"hotel12_3.jpg\"]', NULL, NULL),
(13, 13, '[\"hotel13_1.jpg\", \"hotel13_2.jpg\", \"hotel13_3.jpg\"]', NULL, NULL),
(14, 14, '[\"hotel14_1.jpg\", \"hotel14_2.jpg\", \"hotel14_3.jpg\"]', NULL, NULL),
(15, 15, '[\"hotel15_1.jpg\", \"hotel15_2.jpg\", \"hotel15_3.jpg\"]', NULL, NULL),
(16, 16, '[\"hotel16_1.jpg\", \"hotel16_2.jpg\", \"hotel16_3.jpg\"]', NULL, NULL),
(17, 17, '[\"hotel17_1.jpg\", \"hotel17_2.jpg\", \"hotel17_3.jpg\"]', NULL, NULL),
(18, 18, '[\"hotel18_1.jpg\", \"hotel18_2.jpg\", \"hotel18_3.jpg\"]', NULL, NULL),
(19, 19, '[\"hotel19_1.jpg\", \"hotel19_2.jpg\", \"hotel19_3.jpg\"]', NULL, NULL),
(20, 20, '[\"hotel20_1.jpg\", \"hotel20_2.jpg\", \"hotel20_3.jpg\"]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_locations`
--

DROP TABLE IF EXISTS `hotel_locations`;
CREATE TABLE IF NOT EXISTS `hotel_locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hotel_id` int NOT NULL,
  `street_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `zip_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `country_or_region` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_locations_hotel_id_foreign` (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, 10, 'Calangute Beach Road', 'Calangute', 'Goa', '403516', 'India', 15.5439000, 73.7553000, NULL, NULL),
(11, 11, '7th Avenue', 'New York', 'NY', '10036', 'USA', 40.7580000, -73.9855000, NULL, NULL),
(12, 12, 'Hollywood Blvd', 'Los Angeles', 'CA', '90028', 'USA', 34.1015000, -118.3269000, NULL, NULL),
(13, 13, 'Lake Shore Drive', 'Chicago', 'IL', '60611', 'USA', 41.8924000, -87.6130000, NULL, NULL),
(14, 14, 'Collins Ave', 'Miami', 'FL', '33139', 'USA', 25.7907000, -80.1300000, NULL, NULL),
(15, 15, 'Las Vegas Blvd', 'Las Vegas', 'NV', '89109', 'USA', 36.1147000, -115.1728000, NULL, NULL),
(16, 16, 'Post Oak Blvd', 'Houston', 'TX', '77056', 'USA', 29.7485000, -95.4613000, NULL, NULL),
(17, 17, 'Embarcadero', 'San Francisco', 'CA', '94111', 'USA', 37.7993000, -122.3977000, NULL, NULL),
(18, 18, 'Broad Street', 'Seattle', 'WA', '98109', 'USA', 47.6205000, -122.3493000, NULL, NULL),
(19, 19, 'Rowes Wharf', 'Boston', 'MA', '02110', 'USA', 42.3565000, -71.0491000, NULL, NULL),
(20, 20, 'Rocky Road', 'Denver', 'CO', '80202', 'USA', 39.7486000, -104.9956000, NULL, NULL);

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
  `flexible_co_condition` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  `vat_condition` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gst_included` tinyint(1) NOT NULL DEFAULT '0',
  `gst_radio` tinyint(1) NOT NULL DEFAULT '0',
  `gst_condition` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hotel_tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `hotel_tax_radio` tinyint(1) NOT NULL DEFAULT '0',
  `hotel_tax_condition` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city_dist_tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `regional_location_tax_radio` tinyint(1) NOT NULL DEFAULT '0',
  `cdt_condition` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tourist_tax_included` tinyint(1) NOT NULL DEFAULT '0',
  `tourist_tax_radio` tinyint(1) NOT NULL DEFAULT '0',
  `tourist_tax_condition` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `property_registration_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `business_registration_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `taxpayer_identification_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hotel_id` (`hotel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_policies`
--

INSERT INTO `hotel_policies` (`id`, `hotel_id`, `ci_type`, `ci_start_time`, `ci_end_time`, `late_ci`, `age_restriction`, `deposit_at_ci`, `doc_at_ci`, `co_before`, `flexible_co_status`, `flexible_co_type`, `flexible_co_condition`, `refund_policy_type`, `full_refund_allowed`, `partial_refund_allowed`, `pet_policy_type`, `pet_restricted_zones`, `pet_additional_charges`, `age_segments`, `child_doc_requirement`, `vat_included`, `vat_radio`, `vat_condition`, `gst_included`, `gst_radio`, `gst_condition`, `hotel_tax_included`, `hotel_tax_radio`, `hotel_tax_condition`, `city_dist_tax_included`, `regional_location_tax_radio`, `cdt_condition`, `tourist_tax_included`, `tourist_tax_radio`, `tourist_tax_condition`, `property_registration_no`, `business_registration_no`, `taxpayer_identification_no`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP98330', 'BUSS89151', 'TAX18876', NULL, NULL),
(2, 2, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP28195', 'BUSS60531', 'TAX22270', NULL, NULL),
(3, 3, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP93908', 'BUSS23848', 'TAX14782', NULL, NULL),
(4, 4, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP32137', 'BUSS86259', 'TAX84029', NULL, NULL),
(5, 5, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP95315', 'BUSS14203', 'TAX95819', NULL, NULL),
(6, 6, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP68257', 'BUSS42778', 'TAX63938', NULL, NULL),
(7, 7, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP49270', 'BUSS59133', 'TAX97070', NULL, NULL),
(8, 8, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP92322', 'BUSS17300', 'TAX89449', NULL, NULL),
(9, 9, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP41253', 'BUSS91404', 'TAX15373', NULL, NULL),
(10, 10, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP65728', 'BUSS54588', 'TAX57773', NULL, NULL),
(11, 11, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP83744', 'BUSS46777', 'TAX90286', NULL, NULL),
(12, 12, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP34951', 'BUSS14330', 'TAX67403', NULL, NULL),
(13, 13, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP73966', 'BUSS27654', 'TAX62211', NULL, NULL),
(14, 14, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP89552', 'BUSS35569', 'TAX35245', NULL, NULL),
(15, 15, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP61883', 'BUSS60579', 'TAX32393', NULL, NULL),
(16, 16, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP30754', 'BUSS50137', 'TAX12033', NULL, NULL),
(17, 17, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP76654', 'BUSS66104', 'TAX71531', NULL, NULL),
(18, 18, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP80192', 'BUSS45130', 'TAX78048', NULL, NULL),
(19, 19, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP28570', 'BUSS77169', 'TAX35511', NULL, NULL),
(20, 20, 1, '12:00:00', '14:00:00', 0, 0, 0, 1, '11:00:00', 1, 1, '0', 1, 1, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half\"}]', 0, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 'PROP92497', 'BUSS96975', 'TAX60416', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-05-12-173149', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1763296767, 1),
(2, '2025-05-12-195708', 'App\\Database\\Migrations\\CreateAdminsTable', 'default', 'App', 1763296767, 1),
(3, '2025-05-23-175323', 'App\\Database\\Migrations\\CreateHotelsTable', 'default', 'App', 1763296767, 1),
(4, '2025-05-29-193413', 'App\\Database\\Migrations\\CreateHotelsLocationTable', 'default', 'App', 1763296767, 1),
(5, '2025-05-31-192232', 'App\\Database\\Migrations\\CreateAmenitiesTable', 'default', 'App', 1763296767, 1),
(6, '2025-06-03-073005', 'App\\Database\\Migrations\\CreateHotelAmenitiesTable', 'default', 'App', 1763296767, 1),
(7, '2025-06-05-171422', 'App\\Database\\Migrations\\CreateHotelGalleyTable', 'default', 'App', 1763296767, 1),
(8, '2025-06-09-162122', 'App\\Database\\Migrations\\CreateHotelFinanceTable', 'default', 'App', 1763296767, 1),
(9, '2025-06-10-161901', 'App\\Database\\Migrations\\CreateHotelPoliciesTable', 'default', 'App', 1763296767, 1),
(10, '2025-11-06-103912', 'App\\Database\\Migrations\\CreateUserEmailVerificationsTable', 'default', 'App', 1763296767, 1),
(11, '2025-11-25-170223', 'App\\Database\\Migrations\\CreateRoomsTable', 'default', 'App', 1764092222, 2),
(12, '2025-11-27-081428', 'App\\Database\\Migrations\\CreateRoomsCatagoryTable', 'default', 'App', 1764233271, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `room_slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `hotel_id` int NOT NULL,
  `amenities` json DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_hotel_id_foreign` (`hotel_id`),
  KEY `room_slug` (`room_slug`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_slug`, `price`, `hotel_id`, `amenities`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Standard Room', 'standard-room-h1', 5861, 1, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(2, 'Deluxe Room', 'deluxe-room-h1', 6549, 1, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(3, 'Standard Room', 'standard-room-h2', 4812, 2, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(4, 'Deluxe Room', 'deluxe-room-h2', 8230, 2, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(5, 'Standard Room', 'standard-room-h3', 3749, 3, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(6, 'Deluxe Room', 'deluxe-room-h3', 7340, 3, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(7, 'Standard Room', 'standard-room-h4', 3599, 4, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(8, 'Deluxe Room', 'deluxe-room-h4', 9518, 4, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(9, 'Standard Room', 'standard-room-h5', 4931, 5, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(10, 'Deluxe Room', 'deluxe-room-h5', 11585, 5, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(11, 'Standard Room', 'standard-room-h6', 5539, 6, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(12, 'Deluxe Room', 'deluxe-room-h6', 11548, 6, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(13, 'Standard Room', 'standard-room-h7', 4760, 7, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(14, 'Deluxe Room', 'deluxe-room-h7', 7510, 7, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(15, 'Standard Room', 'standard-room-h8', 5607, 8, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(16, 'Deluxe Room', 'deluxe-room-h8', 5835, 8, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(17, 'Standard Room', 'standard-room-h9', 4791, 9, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(18, 'Deluxe Room', 'deluxe-room-h9', 9633, 9, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(19, 'Standard Room', 'standard-room-h10', 4129, 10, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(20, 'Deluxe Room', 'deluxe-room-h10', 7277, 10, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(21, 'Standard Room', 'standard-room-h11', 4433, 11, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(22, 'Deluxe Room', 'deluxe-room-h11', 6190, 11, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(23, 'Standard Room', 'standard-room-h12', 4025, 12, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(24, 'Deluxe Room', 'deluxe-room-h12', 7877, 12, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(25, 'Standard Room', 'standard-room-h13', 3627, 13, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(26, 'Deluxe Room', 'deluxe-room-h13', 11370, 13, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(27, 'Standard Room', 'standard-room-h14', 3683, 14, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(28, 'Deluxe Room', 'deluxe-room-h14', 9666, 14, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(29, 'Standard Room', 'standard-room-h15', 4157, 15, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(30, 'Deluxe Room', 'deluxe-room-h15', 8837, 15, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(31, 'Standard Room', 'standard-room-h16', 3366, 16, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(32, 'Deluxe Room', 'deluxe-room-h16', 11948, 16, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(33, 'Standard Room', 'standard-room-h17', 4601, 17, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(34, 'Deluxe Room', 'deluxe-room-h17', 8155, 17, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(35, 'Standard Room', 'standard-room-h18', 4224, 18, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(36, 'Deluxe Room', 'deluxe-room-h18', 10475, 18, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(37, 'Standard Room', 'standard-room-h19', 3515, 19, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(38, 'Deluxe Room', 'deluxe-room-h19', 10260, 19, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(39, 'Standard Room', 'standard-room-h20', 3904, 20, '[\"Air Conditioning\", \"Free Wi-Fi\", \"Television\", \"Work Desk\"]', 'A comfortable standard room with essential amenities.', '2025-11-29 00:30:12', '2025-11-29 00:30:12'),
(40, 'Deluxe Room', 'deluxe-room-h20', 7610, 20, '[\"Mini Bar\", \"Room Heater\", \"Premium Bedding\", \"City View\"]', 'Spacious deluxe room with premium features.', '2025-11-29 00:30:12', '2025-11-29 00:30:12');

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_email_verifications`
--

DROP TABLE IF EXISTS `user_email_verifications`;
CREATE TABLE IF NOT EXISTS `user_email_verifications` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `otp_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `type` enum('otp','magic_link','mix') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_email_verifications_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_email_verifications`
--

INSERT INTO `user_email_verifications` (`id`, `user_id`, `token`, `otp_code`, `expires_at`, `type`, `created_at`, `updated_at`) VALUES
(2, 2, '390ab060a67141c9a0613b47368f2e2222d3b23e9093165a84e84732437c2dd5', '287748', '2025-11-27 01:09:56', 'mix', '2025-11-27 01:04:56', '2025-11-27 01:04:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
