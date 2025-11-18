-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 16, 2025 at 12:44 PM
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
(1, 'Super Admin', 'admin', 'admin@booking.com', '$2y$10$OC1jPf/EFqOFSmXBW3tIjuEaUtgpi2h2V07dsy.MZAFFUfumOXIDG', 'superadmin', NULL, '2025-11-16 18:14:27', '2025-11-16 18:14:27'),
(2, 'Admin', 'admin2', 'admin@admin.com', '$2y$10$OC1jPf/EFqOFSmXBW3tIjuEaUtgpi2h2V07dsy.MZAFFUfumOXIDG', 'admin', NULL, '2025-11-16 18:14:27', '2025-11-16 18:14:27');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `property_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `rating` int NOT NULL DEFAULT '5',
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `chain_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `property_name`, `description`, `rating`, `email`, `phone`, `chain_name`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Buckridge-Cassin', 'Et cumque est consequatur ratione tenetur perferendis in et. Magnam velit qui qui eos. Quae blanditiis qui vitae in. Quo non voluptatem pariatur cum eum fugit.', 5, 'jillian33@hauck.net', '(541) 518-2869', 'Schiller, Haley and Hyatt', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(2, 'Hirthe-Williamson', 'Ducimus mollitia perspiciatis voluptate aperiam. Perferendis accusamus commodi nisi eligendi nihil. Itaque ut et voluptas at nisi maiores porro. Vitae dolore sed et incidunt.', 2, 'collins.zaria@kuhic.com', '+1-862-415-6745', 'Abshire PLC', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(3, 'Rolfson, Oberbrunner and Kassulke', 'Eos quibusdam id nihil doloremque blanditiis est nostrum. Facere aperiam omnis non qui sit qui iste sint.', 3, 'rowe.athena@kutch.info', '1-910-764-3944', 'Prosacco, Rohan and Powlowski', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(4, 'Stamm, Mohr and Erdman', 'Tenetur perferendis amet qui velit eaque similique. Quis dignissimos repudiandae repellendus enim officia ut. Aut deserunt ipsa ullam provident dignissimos sed.', 3, 'howell.mattie@huels.org', '307.961.7063', 'Steuber-Hagenes', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(5, 'Goyette Ltd', 'Voluptatem quisquam veritatis consequuntur dolore aut ipsam eum. Inventore sint dolore est eum voluptate fuga earum. Similique repellendus molestiae possimus et. Unde officiis voluptates ut sapiente vero porro.', 5, 'morgan.daugherty@dickens.com', '432-636-4628', 'Larkin-Reynolds', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(6, 'Welch PLC', 'Et ea distinctio aut eos ea. Illum omnis atque natus at quo explicabo. Unde a sint sunt ducimus quos. Deleniti fuga provident optio at a laborum architecto. Aut unde perferendis cumque maxime velit quia quas.', 1, 'al.hickle@waters.com', '+17733597379', 'Dickens-Brown', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(7, 'Wolff, Orn and Hermann', 'Porro illum neque enim unde doloribus. Ea impedit nobis sit explicabo ut quisquam. Voluptatem magnam beatae incidunt consequatur soluta eos et. Sint ea autem quasi sapiente quisquam natus.', 4, 'ymcclure@white.biz', '(737) 719-8684', 'Gaylord, Crooks and Wisoky', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(8, 'Runte-Legros', 'Nam ipsam quasi est aperiam dolorum autem sit. Saepe sunt occaecati dolores laudantium alias sunt. Impedit expedita rerum qui natus quia tempora nostrum.', 5, 'cmiller@kuhic.com', '+1.973.307.8310', 'Kertzmann, Paucek and Jakubowski', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(9, 'Yundt Inc', 'Quibusdam autem dicta culpa veniam sed quas dolorum. Est quaerat minima quasi error modi non. Quas provident officia nulla. Incidunt sed qui et et.', 5, 'mparisian@schaefer.com', '769.783.7029', 'Waters, Schmeler and Trantow', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL),
(10, 'Kuvalis, Schimmel and Marquardt', 'Eos quo aut laboriosam mollitia dolores ab molestias. Doloremque reiciendis adipisci accusamus voluptatum excepturi nulla sequi. Quae officia ut quia sequi.', 3, 'rheathcote@blick.biz', '1-860-682-0253', 'Marquardt, Klein and Blanda', '1750796732_dc54ddddd48843787be1.webp', NULL, NULL);

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
(1, 1, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(2, 2, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(3, 3, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(4, 4, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(5, 5, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(6, 6, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(7, 7, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(8, 8, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(9, 9, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL),
(10, 10, '{\"wifi\": {\"type\": \"free\", \"condition\": \"\"}, \"parking\": {\"type\": \"free\", \"condition\": \"limited slots\"}, \"breakfast\": {\"type\": \"paid\", \"condition\": \"included with deluxe rooms\"}}', NULL, NULL);

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
(1, 1, 0, 0, 0, NULL, NULL),
(2, 2, 1, 0, 1, NULL, NULL),
(3, 3, 0, 1, 0, NULL, NULL),
(4, 4, 0, 0, 0, NULL, NULL),
(5, 5, 0, 1, 1, NULL, NULL),
(6, 6, 0, 0, 0, NULL, NULL),
(7, 7, 0, 1, 1, NULL, NULL),
(8, 8, 0, 1, 1, NULL, NULL),
(9, 9, 0, 0, 1, NULL, NULL),
(10, 10, 0, 1, 0, NULL, NULL);

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
(1, 1, '[false, false, false, false, false]', NULL, NULL),
(2, 2, '[false, false, false, false, false]', NULL, NULL),
(3, 3, '[false, false, false, false, false]', NULL, NULL),
(4, 4, '[false, false, false, false, false]', NULL, NULL),
(5, 5, '[false, false, false, false, false]', NULL, NULL),
(6, 6, '[false, false, false, false, false]', NULL, NULL),
(7, 7, '[false, false, false, false, false]', NULL, NULL),
(8, 8, '[false, false, false, false, false]', NULL, NULL),
(9, 9, '[false, false, false, false, false]', NULL, NULL),
(10, 10, '[false, false, false, false, false]', NULL, NULL);

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
(1, 1, '497 Alyson Extensions', 'West Florence', 'Nevada', '19066-7706', 'Saint Vincent and the Grenadines', -29.5660490, 115.0135270, NULL, NULL),
(2, 2, '4756 Conroy Green', 'Lake Hortense', 'Oregon', '01774', 'Reunion', 19.9384080, 173.2701270, NULL, NULL),
(3, 3, '82576 Lizeth Union Suite 256', 'Watersside', 'Oklahoma', '80523', 'Finland', -60.8067740, -68.0348250, NULL, NULL),
(4, 4, '413 Howard Brooks Suite 144', 'Ubaldotown', 'Kentucky', '97119', 'Brazil', -45.9628140, -124.7609080, NULL, NULL),
(5, 5, '1117 Trantow Valleys Apt. 806', 'Predovicfort', 'Missouri', '73742', 'Eritrea', -45.6982800, 101.8757400, NULL, NULL),
(6, 6, '44715 Klein Inlet', 'Luciousborough', 'South Dakota', '32021-4954', 'Ecuador', 81.6512540, 76.4089660, NULL, NULL),
(7, 7, '3990 Koelpin Pine', 'East Madaline', 'Oklahoma', '28725', 'Solomon Islands', 84.1162820, 157.4932960, NULL, NULL),
(8, 8, '13837 Anjali Mount Apt. 633', 'Chelseaport', 'Colorado', '46271-5235', 'Brunei Darussalam', 4.7135390, -10.6911530, NULL, NULL),
(9, 9, '2567 Martina Circle Apt. 663', 'Blandaview', 'Nebraska', '12646', 'United States Virgin Islands', 47.4481220, 93.2955310, NULL, NULL),
(10, 10, '525 Paucek Plains Suite 420', 'South Eulaliaburgh', 'Minnesota', '63795-3807', 'Nigeria', 86.1102030, 178.4315700, NULL, NULL);

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
(1, 1, 0, '18:52:00', '21:06:00', 0, 0, 1, 1, '20:56:00', 1, 0, '1', 1, 0, 0, 1, 1, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 0, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 1, 0, NULL, 1, 0, NULL, 'PROP13793', 'BUSS15836', 'TAX13301', NULL, NULL),
(2, 2, 0, '14:09:00', '03:58:00', 0, 1, 0, 0, '11:27:00', 0, 0, '1', 0, 1, 1, 1, 0, 1, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 1, 0, 0, NULL, 1, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 'PROP60966', 'BUSS78943', 'TAX24385', NULL, NULL),
(3, 3, 0, '09:15:00', '07:25:00', 1, 0, 0, 1, '13:30:00', 0, 0, '1', 0, 1, 1, 0, 1, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 1, 1, 0, NULL, 0, 0, NULL, 1, 0, NULL, 0, 0, NULL, 1, 0, NULL, 'PROP47405', 'BUSS88094', 'TAX34225', NULL, NULL),
(4, 4, 1, '23:39:00', '15:23:00', 1, 1, 1, 0, '15:41:00', 0, 1, '0', 0, 0, 0, 1, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 0, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 1, 0, NULL, 1, 0, NULL, 'PROP21720', 'BUSS50144', 'TAX65763', NULL, NULL),
(5, 5, 1, '15:13:00', '11:22:00', 0, 0, 1, 1, '01:52:00', 1, 1, '1', 1, 0, 1, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 0, 1, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 'PROP03650', 'BUSS86199', 'TAX79369', NULL, NULL),
(6, 6, 0, '05:17:00', '07:10:00', 1, 1, 1, 0, '23:53:00', 0, 0, '1', 0, 0, 0, 0, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 0, 0, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 'PROP95283', 'BUSS30191', 'TAX23514', NULL, NULL),
(7, 7, 0, '13:29:00', '02:46:00', 1, 0, 0, 1, '22:16:00', 0, 1, '0', 1, 1, 0, 1, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 1, 1, 0, NULL, 0, 0, NULL, 1, 0, NULL, 0, 0, NULL, 0, 0, NULL, 'PROP54462', 'BUSS37028', 'TAX42300', NULL, NULL),
(8, 8, 1, '06:23:00', '17:40:00', 1, 1, 0, 0, '05:12:00', 0, 1, '1', 0, 1, 1, 1, 1, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 0, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 1, 0, NULL, 'PROP78952', 'BUSS13661', 'TAX30746', NULL, NULL),
(9, 9, 1, '17:09:00', '19:37:00', 1, 0, 0, 0, '15:00:00', 0, 0, '1', 0, 1, 1, 1, 1, 1, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 0, 1, 0, NULL, 1, 0, NULL, 0, 0, NULL, 0, 0, NULL, 0, 0, NULL, 'PROP76287', 'BUSS08922', 'TAX97877', NULL, NULL),
(10, 10, 0, '15:46:00', '08:19:00', 1, 0, 0, 0, '19:25:00', 0, 0, '1', 0, 0, 0, 1, 0, 0, '[{\"to\": 5, \"from\": 0, \"policy\": \"free\"}, {\"to\": 12, \"from\": 6, \"policy\": \"half-price\"}]', 1, 0, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 1, 0, NULL, 'PROP28790', 'BUSS06909', 'TAX30080', NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, '2025-11-06-103912', 'App\\Database\\Migrations\\CreateUserEmailVerificationsTable', 'default', 'App', 1763296767, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
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
(1, 'admin@test.com', 'admin', '$2y$10$CG1EcYzF6UIdiX3L39ssE.5fs0vRvNEpxwkRgIgBP1iE//tFHk4hq', NULL, 1, NULL, NULL);

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
