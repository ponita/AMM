-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2017 at 10:31 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unhls_mgt_support`
--
DROP DATABASE `unhls_mgt_support`;
CREATE DATABASE IF NOT EXISTS `unhls_mgt_support` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `unhls_mgt_support`;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`id`, `user_id`, `role_id`) VALUES(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barcode_settings`
--

CREATE TABLE `barcode_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `encoding_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `barcode_width` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `barcode_height` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barcode_settings`
--

INSERT INTO `barcode_settings` (`id`, `encoding_format`, `barcode_width`, `barcode_height`, `text_size`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'code39', '2', '30', '11', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `commodities`
--

CREATE TABLE `commodities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `metric_id` int(10) UNSIGNED NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `item_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `storage_req` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `min_level` int(11) NOT NULL,
  `max_level` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commodities`
--

INSERT INTO `commodities` (`id`, `name`, `description`, `metric_id`, `unit_price`, `item_code`, `storage_req`, `min_level`, `max_level`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'Ampicillin', 'Capsule 250mg', 1, '500.00', 'no clue', 'no clue', 100000, 400000, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `control_measure_ranges`
--

CREATE TABLE `control_measure_ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `upper_range` decimal(6,2) DEFAULT NULL,
  `lower_range` decimal(6,2) DEFAULT NULL,
  `alphanumeric` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `control_measure_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `control_measure_ranges`
--

INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, '2.63', '7.19', NULL, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, '11.65', '15.43', NULL, 2, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, '12.13', '19.11', NULL, 3, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, '15.73', '25.01', NULL, 4, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, '17.63', '20.12', NULL, 5, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, '6.50', '7.50', NULL, 6, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, '4.36', '5.78', NULL, 7, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, '13.80', '17.30', NULL, 8, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, '81.00', '95.00', NULL, 9, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, '1.99', '2.63', NULL, 10, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, '27.60', '33.00', NULL, 11, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, '32.80', '36.40', NULL, 12, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measure_ranges` (`id`, `upper_range`, `lower_range`, `alphanumeric`, `control_measure_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, '141.00', '320.00', NULL, 13, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `control_measures`
--

CREATE TABLE `control_measures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `control_id` int(10) UNSIGNED NOT NULL,
  `control_measure_type_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `control_measures`
--

INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'ca', 'mmol', 1, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 'pi', 'mmol', 1, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 'mg', 'mmol', 1, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 'na', 'mmol', 1, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 'K', 'mmol', 1, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 'WBC', 'x 103/uL', 2, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 'RBC', 'x 106/uL', 2, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 'HGB', 'g/dl', 2, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 'HCT', '%', 2, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 'MCV', 'fl', 2, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 'MCH', 'pg', 2, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 'MCHC', 'g/dl', 2, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `control_measures` (`id`, `name`, `unit`, `control_id`, `control_measure_type_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, 'PLT', 'x 103/uL', 2, 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `control_results`
--

CREATE TABLE `control_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `results` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `control_measure_id` int(10) UNSIGNED NOT NULL,
  `control_test_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `control_results`
--

INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(1, '2.78', 1, 1, '2017-01-14 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(2, '13.56', 2, 1, '2017-01-14 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(3, '14.77', 3, 1, '2017-01-14 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(4, '25.92', 4, 1, '2017-01-14 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(5, '18.87', 5, 1, '2017-01-14 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(6, '6.78', 1, 2, '2017-01-15 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(7, '15.56', 2, 2, '2017-01-15 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(8, '18.77', 3, 2, '2017-01-15 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(9, '30.92', 4, 2, '2017-01-15 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(10, '17.87', 5, 2, '2017-01-15 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(11, '8.78', 1, 3, '2017-01-16 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(12, '17.56', 2, 3, '2017-01-16 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(13, '21.77', 3, 3, '2017-01-16 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(14, '27.92', 4, 3, '2017-01-16 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(15, '22.87', 5, 3, '2017-01-16 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(16, '6.78', 1, 4, '2017-01-17 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(17, '18.56', 2, 4, '2017-01-17 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(18, '19.77', 3, 4, '2017-01-17 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(19, '12.92', 4, 4, '2017-01-17 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(20, '22.87', 5, 4, '2017-01-17 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(21, '3.78', 1, 5, '2017-01-18 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(22, '16.56', 2, 5, '2017-01-18 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(23, '17.77', 3, 5, '2017-01-18 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(24, '28.92', 4, 5, '2017-01-18 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(25, '19.87', 5, 5, '2017-01-18 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(26, '5.78', 1, 6, '2017-01-19 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(27, '15.56', 2, 6, '2017-01-19 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(28, '11.77', 3, 6, '2017-01-19 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(29, '29.92', 4, 6, '2017-01-19 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(30, '14.87', 5, 6, '2017-01-19 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(31, '9.78', 1, 7, '2017-01-20 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(32, '11.56', 2, 7, '2017-01-20 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(33, '19.77', 3, 7, '2017-01-20 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(34, '32.92', 4, 7, '2017-01-20 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(35, '29.87', 5, 7, '2017-01-20 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(36, '5.45', 6, 8, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(37, '5.01', 7, 8, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(38, '12.3', 8, 8, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(39, '89.7', 9, 8, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(40, '2.15', 10, 8, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(41, '34.0', 11, 8, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(42, '37.2', 12, 8, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(43, '141.5', 13, 8, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(44, '7.45', 6, 9, '2017-01-22 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(45, '9.01', 7, 9, '2017-01-22 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(46, '9.3', 8, 9, '2017-01-22 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(47, '94.7', 9, 9, '2017-01-22 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(48, '12.15', 10, 9, '2017-01-22 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(49, '37.0', 11, 9, '2017-01-22 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(50, '30.2', 12, 9, '2017-01-22 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_results` (`id`, `results`, `control_measure_id`, `control_test_id`, `created_at`, `updated_at`) VALUES(51, '121.5', 13, 9, '2017-01-22 21:00:00', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `control_tests`
--

CREATE TABLE `control_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `entered_by` int(10) UNSIGNED NOT NULL,
  `control_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `control_tests`
--

INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(1, 1, 1, '2017-01-14 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(2, 1, 1, '2017-01-15 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(3, 1, 1, '2017-01-16 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(4, 1, 1, '2017-01-17 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(5, 1, 1, '2017-01-18 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(6, 1, 1, '2017-01-19 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(7, 1, 1, '2017-01-20 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(8, 1, 2, '2017-01-21 21:00:00', '2017-01-25 07:11:53');
INSERT INTO `control_tests` (`id`, `entered_by`, `control_id`, `created_at`, `updated_at`) VALUES(9, 1, 2, '2017-01-22 21:00:00', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `controls`
--

CREATE TABLE `controls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lot_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `controls`
--

INSERT INTO `controls` (`id`, `name`, `description`, `lot_id`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 'Humatrol P', 'HUMATROL P control serum has been designed to provide a suitable basis for the quality control (imprecision, inracy) in the clinical chemical laboratory.', 1, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `controls` (`id`, `name`, `description`, `lot_id`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 'Full Blood Count', 'Né pas touchér', 1, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `culture_durations`
--

CREATE TABLE `culture_durations` (
  `id` int(10) UNSIGNED NOT NULL,
  `duration` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `culture_durations`
--

INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, '12 hours', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, '24 hours', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, '36 hours', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, '48 hours', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, '60 hours', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, '72 hours', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, '4 days', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, '5 days', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, '6 days', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_durations` (`id`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, '7 days', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `culture_observations`
--

CREATE TABLE `culture_observations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `culture_id` int(10) UNSIGNED NOT NULL,
  `culture_duration_id` int(10) UNSIGNED NOT NULL,
  `observation` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `culture_observations`
--

INSERT INTO `culture_observations` (`id`, `user_id`, `culture_id`, `culture_duration_id`, `observation`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 1, 1, 4, 'NBG', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_observations` (`id`, `user_id`, `culture_id`, `culture_duration_id`, `observation`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 1, 1, 8, 'NSG', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `culture_observations` (`id`, `user_id`, `culture_id`, `culture_duration_id`, `observation`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 1, 1, 10, 'SG', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `cultures`
--

CREATE TABLE `cultures` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cultures`
--

INSERT INTO `cultures` (`id`, `user_id`, `test_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 1, 37, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `cultures` (`id`, `user_id`, `test_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 1, 41, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `cultures` (`id`, `user_id`, `test_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 1, 45, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`) VALUES(1, 'Malaria');
INSERT INTO `diseases` (`id`, `name`) VALUES(2, 'Typhoid');
INSERT INTO `diseases` (`id`, `name`) VALUES(3, 'Shigella Dysentry');

-- --------------------------------------------------------

--
-- Table structure for table `drug_susceptibility`
--

CREATE TABLE `drug_susceptibility` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `drug_id` int(10) UNSIGNED NOT NULL,
  `isolated_organism_id` int(10) UNSIGNED NOT NULL,
  `drug_susceptibility_measure_id` int(10) UNSIGNED NOT NULL,
  `zone` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drug_susceptibility`
--

INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 1, 8, 1, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 1, 3, 1, 1, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 1, 23, 1, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 1, 4, 1, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 1, 28, 1, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 1, 29, 3, 2, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 1, 2, 3, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 1, 30, 3, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 1, 14, 3, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 1, 31, 3, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 1, 13, 3, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 1, 8, 3, 1, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, 1, 5, 3, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(14, 1, 32, 3, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(15, 1, 10, 3, 3, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(16, 1, 33, 3, 1, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(17, 1, 34, 3, 2, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drug_susceptibility` (`id`, `user_id`, `drug_id`, `isolated_organism_id`, `drug_susceptibility_measure_id`, `zone`, `deleted_at`, `created_at`, `updated_at`) VALUES(18, 1, 35, 3, 2, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `drug_susceptibility_measures`
--

CREATE TABLE `drug_susceptibility_measures` (
  `id` int(10) UNSIGNED NOT NULL,
  `symbol` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `interpretation` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drug_susceptibility_measures`
--

INSERT INTO `drug_susceptibility_measures` (`id`, `symbol`, `interpretation`) VALUES(1, 'S', 'Sensitive');
INSERT INTO `drug_susceptibility_measures` (`id`, `symbol`, `interpretation`) VALUES(2, 'I', 'Intermediate');
INSERT INTO `drug_susceptibility_measures` (`id`, `symbol`, `interpretation`) VALUES(3, 'R', 'Resistant');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'PENICILLIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 'AMPICILLIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 'CLINDAMYCIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 'TETRACYCLINE', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 'CIPROFLOXACIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 'TRIMETHOPRIM/SULFA', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 'NITROFURANTOIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 'CHLORAMPHENICOL', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 'CEFAZOLIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 'GENTAMICIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 'AMOXICILLIN-CLAV', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 'CEPHALOTHIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, 'CEFUROXIME', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(14, 'CEFOTAXIME', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(15, 'PIPERACILLIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(16, 'CEFIXIME', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(17, 'CEFTAZIDIME', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(18, 'CEFRIAXONE', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(19, 'LEVOFLOXACIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(20, 'MERODENEM', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(21, 'IMEDENEM', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(22, 'OXACILLIN (CEFOXITIN)', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(23, 'ERYTHROMYCIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(24, 'VANCOMYCIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(25, 'CEFOXITIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(26, 'TOBRAMYCIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(27, 'AMPICILLIN-SULBACTAM', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(28, 'TRIMETHOPRIM', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(29, 'AMIKACIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(30, 'AUGMENTIN', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(31, 'CEFTRIAXIONE', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(32, 'CO-TRIMOXAZOLE', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(33, 'IMIPENEM', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(34, 'MEROPENEM', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `drugs` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(35, 'PIPERACILLIN/TAZO', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `equip_config`
--

CREATE TABLE `equip_config` (
  `id` int(10) UNSIGNED NOT NULL,
  `equip_id` int(10) UNSIGNED NOT NULL,
  `prop_id` int(10) UNSIGNED NOT NULL,
  `prop_value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `equip_config`
--

INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 1, 1, '5150', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 1, 2, 'client', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 1, 3, 'chameleon', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 1, 4, 'yes', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 3, 5, '10', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 3, 6, '9600', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 3, 7, 'None', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 3, 8, '1', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 3, 9, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 3, 10, '8', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 3, 11, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 2, 12, 'create ODBC datasource to the equipment db and put', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, 2, 13, '0', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(14, 4, 5, '10', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(15, 4, 6, '9600', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(16, 4, 7, 'None', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(17, 4, 8, '1', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(18, 4, 9, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(19, 4, 10, '8', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(20, 4, 11, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(21, 5, 1, '5150', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(22, 5, 2, 'server', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(23, 5, 3, 'no', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(24, 5, 4, 'set the Analyzer PC IP address here', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(25, 6, 14, '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(26, 6, 15, '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(27, 6, 16, '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(28, 6, 17, '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(29, 6, 18, '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(30, 6, 19, '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(31, 7, 5, '10', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(32, 7, 6, '9600', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(33, 7, 7, 'None', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(34, 7, 8, '1', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(35, 7, 9, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(36, 7, 10, '8', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(37, 7, 11, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(38, 8, 5, '10', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(39, 8, 6, '9600', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(40, 8, 7, 'None', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(41, 8, 8, '1', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(42, 8, 9, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(43, 8, 10, '8', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(44, 8, 11, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(45, 9, 1, '5150', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(46, 9, 2, 'server', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(47, 9, 3, 'no', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(48, 9, 4, 'set the Analyzer PC IP address here', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(49, 10, 5, '10', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(50, 10, 6, '9600', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(51, 10, 7, 'None', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(52, 10, 8, '1', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(53, 10, 9, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(54, 10, 10, '8', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(55, 10, 11, 'No', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(56, 11, 1, '5150', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(57, 11, 2, 'server', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(58, 11, 3, 'no', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(59, 11, 4, 'set the Analyzer PC IP address here', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(60, 12, 1, '5150', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(61, 12, 2, 'server', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(62, 12, 3, 'no', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `equip_config` (`id`, `equip_id`, `prop_id`, `prop_value`, `deleted_at`, `created_at`, `updated_at`) VALUES(63, 12, 4, 'set the Analyzer PC IP address here', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `external_dump`
--

CREATE TABLE `external_dump` (
  `id` int(10) UNSIGNED NOT NULL,
  `lab_no` int(11) NOT NULL,
  `parent_lab_no` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `requesting_clinician` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `investigation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provisional_diagnosis` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `request_date` timestamp NULL DEFAULT NULL,
  `order_stage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `result` text COLLATE utf8_unicode_ci,
  `result_returned` int(11) DEFAULT NULL,
  `patient_visit_number` int(11) DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `waiver_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `system_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `external_dump`
--

INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(1, 596699, 0, 16, 'frankenstein Dr', 'Urinalysis', '', '2014-10-14 07:20:35', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(2, 596700, 596699, NULL, 'frankenstein Dr', 'Urine microscopy', '', '2014-10-14 07:20:35', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(3, 596701, 596700, NULL, 'frankenstein Dr', 'Pus cells', '', '2014-10-14 07:20:35', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(4, 596702, 596700, NULL, 'frankenstein Dr', 'S. haematobium', '', '2014-10-14 07:20:35', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(5, 596703, 596700, NULL, 'frankenstein Dr', 'T. vaginalis', '', '2014-10-14 07:20:35', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(6, 596704, 596700, NULL, 'frankenstein Dr', 'Yeast cells', '', '2014-10-14 07:20:35', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(7, 596705, 596700, NULL, 'frankenstein Dr', 'Red blood cells', '', '2014-10-14 07:20:35', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(8, 596706, 596700, NULL, 'frankenstein Dr', 'Bacteria', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(9, 596707, 596700, NULL, 'frankenstein Dr', 'Spermatozoa', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(10, 596708, 596700, NULL, 'frankenstein Dr', 'Epithelial cells', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(11, 596709, 596700, NULL, 'frankenstein Dr', 'ph', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(12, 596710, 596699, NULL, 'frankenstein Dr', 'Urine chemistry', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(13, 596711, 596710, NULL, 'frankenstein Dr', 'Glucose', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(14, 596712, 596710, NULL, 'frankenstein Dr', 'Ketones', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(15, 596713, 596710, NULL, 'frankenstein Dr', 'Proteins', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(16, 596714, 596710, NULL, 'frankenstein Dr', 'Blood', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(17, 596715, 596710, NULL, 'frankenstein Dr', 'Bilirubin', '', '2014-10-14 07:20:36', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(18, 596716, 596710, NULL, 'frankenstein Dr', 'Urobilinogen Phenlpyruvic acid', '', '2014-10-14 07:20:37', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `external_dump` (`id`, `lab_no`, `parent_lab_no`, `test_id`, `requesting_clinician`, `investigation`, `provisional_diagnosis`, `request_date`, `order_stage`, `result`, `result_returned`, `patient_visit_number`, `patient_id`, `full_name`, `dob`, `gender`, `address`, `postal_code`, `phone_number`, `city`, `cost`, `receipt_number`, `receipt_type`, `waiver_no`, `system_id`, `created_at`, `updated_at`) VALUES(19, 596717, 596710, NULL, 'frankenstein Dr', 'pH', '', '2014-10-14 07:20:37', 'ip', NULL, NULL, 643660, 326983, 'Macau Macau', '1996-10-09 00:00:00', 'Female', NULL, '', '', NULL, NULL, NULL, NULL, '', 'sanitas', '2017-01-25 07:11:52', '2017-01-25 07:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `external_users`
--

CREATE TABLE `external_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `internal_user_id` int(10) UNSIGNED NOT NULL,
  `external_user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ii_quickcodes`
--

CREATE TABLE `ii_quickcodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `feed_source` tinyint(4) NOT NULL,
  `config_prop` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ii_quickcodes`
--

INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 1, 'PORT', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 1, 'MODE', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 1, 'CLIENT_RECONNECT', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 1, 'EQUIPMENT_IP', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 0, 'COMPORT', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 0, 'BAUD_RATE', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 0, 'PARITY', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 0, 'STOP_BITS', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 0, 'APPEND_NEWLINE', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 0, 'DATA_BITS', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 0, 'APPEND_CARRIAGE_RETURN', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 2, 'DATASOURCE', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, 2, 'DAYS', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(14, 4, 'BASE_DIRECTORY', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(15, 4, 'USE_SUB_DIRECTORIES', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(16, 4, 'SUB_DIRECTORY_FORMAT', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(17, 4, 'FILE_NAME_FORMAT', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(18, 4, 'FILE_EXTENSION', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `ii_quickcodes` (`id`, `feed_source`, `config_prop`, `deleted_at`, `created_at`, `updated_at`) VALUES(19, 4, 'FILE_SEPERATOR', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `instrument_testtypes`
--

CREATE TABLE `instrument_testtypes` (
  `instrument_id` int(10) UNSIGNED NOT NULL,
  `test_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `instrument_testtypes`
--

INSERT INTO `instrument_testtypes` (`instrument_id`, `test_type_id`) VALUES(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `instruments`
--

CREATE TABLE `instruments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hostname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `instruments`
--

INSERT INTO `instruments` (`id`, `name`, `ip`, `hostname`, `description`, `driver_name`, `created_at`, `updated_at`) VALUES(1, 'Celltac F Mek 8222', '192.168.1.12', 'HEMASERVER', 'Automatic analyzer with 22 parameters and WBC 5 part diff Hematology Analyzer', 'KBLIS\\Plugins\\CelltacFMachine', '2017-01-25 07:11:52', '2017-01-25 07:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `interfaced_equipment`
--

CREATE TABLE `interfaced_equipment` (
  `id` int(10) UNSIGNED NOT NULL,
  `equipment_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `comm_type` tinyint(4) NOT NULL,
  `equipment_version` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lab_section` int(10) UNSIGNED NOT NULL,
  `feed_source` tinyint(4) NOT NULL,
  `config_file` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interfaced_equipment`
--

INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'Mindray BS-200E', 2, '01.00.07', 1, 1, '\\BLISInterfaceClient\\configs\\BT3000Plus\\bt3000pluschameleon.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 'ABX Pentra 60 C+', 2, '', 1, 2, '\\BLISInterfaceClient\\configs\\pentra\\pentra60cplus.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 'ABX MACROS 60', 1, '', 1, 0, '\\BLISInterfaceClient\\configs\\micros60\\abxmicros60.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 'BT 3000 Plus', 1, '', 1, 0, '\\BLISInterfaceClient\\configs\\BT3000Plus\\bt3000plus.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 'Sysmex SX 500i', 1, '', 1, 1, '\\BLISInterfaceClient\\configs\\SYSMEX\\SYSMEXXS500i.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 'BD FACSCalibur', 1, '', 1, 4, '\\BLISInterfaceClient\\configs\\BDFACSCalibur\\bdfacscalibur.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 'Mindray BC 3600', 1, '', 1, 0, '\\BLISInterfaceClient\\configs\\mindray\\mindraybc3600.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 'Selectra Junior', 1, '', 1, 0, '\\BLISInterfaceClient\\configs\\selectrajunior\\selectrajunior.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 'GeneXpert', 2, '', 1, 1, '\\BLISInterfaceClient\\configs\\geneXpert\\genexpert.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 'ABX Pentra 80', 2, '', 1, 0, '\\BLISInterfaceClient\\configs\\pentra80\\abxpentra80.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 'Sysmex XT 2000i', 1, '', 1, 1, '\\BLISInterfaceClient\\configs\\SYSMEX\\SYSMEXXT2000i.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `interfaced_equipment` (`id`, `equipment_name`, `comm_type`, `equipment_version`, `lab_section`, `feed_source`, `config_file`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 'Vitalex Flexor', 1, '', 1, 1, '\\BLISInterfaceClient\\configs\\flexorE\\flexore.xml', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `isolated_organisms`
--

CREATE TABLE `isolated_organisms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `culture_id` int(10) UNSIGNED NOT NULL,
  `organism_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `isolated_organisms`
--

INSERT INTO `isolated_organisms` (`id`, `user_id`, `culture_id`, `organism_id`, `created_at`, `updated_at`) VALUES(1, 1, 1, 5, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `isolated_organisms` (`id`, `user_id`, `culture_id`, `organism_id`, `created_at`, `updated_at`) VALUES(2, 1, 3, 15, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `isolated_organisms` (`id`, `user_id`, `culture_id`, `organism_id`, `created_at`, `updated_at`) VALUES(3, 1, 2, 14, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `receipt_id` int(10) UNSIGNED NOT NULL,
  `topup_request_id` int(10) UNSIGNED NOT NULL,
  `quantity_issued` int(11) NOT NULL,
  `issued_to` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `remarks` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`id`, `receipt_id`, `topup_request_id`, `quantity_issued`, `issued_to`, `user_id`, `remarks`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 1, 1, 1700, 1, 1, '-', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `lots`
--

CREATE TABLE `lots` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expiry` date NOT NULL,
  `instrument_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lots`
--

INSERT INTO `lots` (`id`, `number`, `description`, `expiry`, `instrument_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, '0001', 'First lot', '2017-07-25', 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `lots` (`id`, `number`, `description`, `expiry`, `instrument_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, '0002', 'Second lot', '2017-08-25', 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `measure_ranges`
--

CREATE TABLE `measure_ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `measure_id` int(10) UNSIGNED NOT NULL,
  `age_min` int(10) UNSIGNED DEFAULT NULL,
  `age_max` int(10) UNSIGNED DEFAULT NULL,
  `gender` tinyint(3) UNSIGNED DEFAULT NULL,
  `range_lower` decimal(7,3) DEFAULT NULL,
  `range_upper` decimal(7,3) DEFAULT NULL,
  `alphanumeric` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interpretation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `measure_ranges`
--

INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(1, 1, NULL, NULL, NULL, NULL, NULL, 'No mps seen', 'Negative', NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(2, 1, NULL, NULL, NULL, NULL, NULL, '+', 'Positive', NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(3, 1, NULL, NULL, NULL, NULL, NULL, '++', 'Positive', NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(4, 1, NULL, NULL, NULL, NULL, NULL, '+++', 'Positive', NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(5, 2, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(6, 2, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(7, 3, NULL, NULL, NULL, NULL, NULL, 'Low', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(8, 3, NULL, NULL, NULL, NULL, NULL, 'High', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(9, 3, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(10, 4, NULL, NULL, NULL, NULL, NULL, 'High', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(11, 4, NULL, NULL, NULL, NULL, NULL, 'Low', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(12, 4, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(13, 5, NULL, NULL, NULL, NULL, NULL, 'High', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(14, 5, NULL, NULL, NULL, NULL, NULL, 'Low', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(15, 5, NULL, NULL, NULL, NULL, NULL, 'Normal', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(16, 6, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(17, 6, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(18, 7, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(19, 7, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(20, 8, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(21, 8, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(22, 26, NULL, NULL, NULL, NULL, NULL, 'O-', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(23, 26, NULL, NULL, NULL, NULL, NULL, 'O+', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(24, 26, NULL, NULL, NULL, NULL, NULL, 'A-', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(25, 26, NULL, NULL, NULL, NULL, NULL, 'A+', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(26, 26, NULL, NULL, NULL, NULL, NULL, 'B-', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(27, 26, NULL, NULL, NULL, NULL, NULL, 'B+', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(28, 26, NULL, NULL, NULL, NULL, NULL, 'AB-', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(29, 26, NULL, NULL, NULL, NULL, NULL, 'AB+', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(30, 46, 0, 100, 2, '4.000', '11.000', NULL, NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(31, 47, 0, 100, 2, '1.500', '4.000', NULL, NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(32, 48, 0, 100, 2, '0.100', '9.000', NULL, NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(33, 49, 0, 100, 2, '2.500', '7.000', NULL, NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(34, 50, 0, 100, 2, '0.000', '6.000', NULL, NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(35, 51, 0, 100, 2, '0.000', '2.000', NULL, NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(36, 52, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(37, 52, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(38, 53, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(39, 53, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(40, 54, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(41, 54, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(42, 55, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(43, 55, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(44, 56, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(45, 56, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(46, 57, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(47, 57, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(48, 58, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(49, 58, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(50, 59, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(51, 59, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(52, 60, NULL, NULL, NULL, NULL, NULL, 'Positive', NULL, NULL);
INSERT INTO `measure_ranges` (`id`, `measure_id`, `age_min`, `age_max`, `gender`, `range_lower`, `range_upper`, `alphanumeric`, `interpretation`, `deleted_at`) VALUES(53, 60, NULL, NULL, NULL, NULL, NULL, 'Negative', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `measure_types`
--

CREATE TABLE `measure_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `measure_types`
--

INSERT INTO `measure_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'Numeric Range', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `measure_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 'Alphanumeric Values', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `measure_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 'Autocomplete', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `measure_types` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 'Free Text', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `measures`
--

CREATE TABLE `measures` (
  `id` int(10) UNSIGNED NOT NULL,
  `measure_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `measures`
--

INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 2, 'BS for mps', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 2, 'Grams stain', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(3, 2, 'SERUM AMYLASE', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(4, 2, 'calcium', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(5, 2, 'SGOT', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(6, 2, 'Indirect COOMBS test', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(7, 2, 'Direct COOMBS test', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(8, 2, 'Du test', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(9, 1, 'URIC ACID', 'mg/dl', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(10, 4, 'CSF for biochemistry', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(11, 4, 'PSA', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(12, 1, 'Total', 'mg/dl', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(13, 1, 'Alkaline Phosphate', 'u/l', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(14, 1, 'Direct', 'mg/dl', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(15, 1, 'Total Proteins', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(16, 4, 'LFTS', 'NULL', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(17, 1, 'Chloride', 'mmol/l', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(18, 1, 'Potassium', 'mmol/l', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(19, 1, 'Sodium', 'mmol/l', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(20, 4, 'Electrolytes', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(21, 1, 'Creatinine', 'mg/dl', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(22, 1, 'Urea', 'mg/dl', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(23, 4, 'RFTS', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(24, 4, 'TFT', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(25, 4, 'GXM', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(26, 2, 'Blood Grouping', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(27, 1, 'HB', 'g/dL', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(28, 4, 'Urine microscopy', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(29, 4, 'Pus cells', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(30, 4, 'S. haematobium', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(31, 4, 'T. vaginalis', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(32, 4, 'Yeast cells', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(33, 4, 'Red blood cells', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(34, 4, 'Bacteria', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(35, 4, 'Spermatozoa', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(36, 4, 'Epithelial cells', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(37, 4, 'ph', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(38, 4, 'Urine chemistry', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(39, 4, 'Glucose', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(40, 4, 'Ketones', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(41, 4, 'Proteins', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(42, 4, 'Blood', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(43, 4, 'Bilirubin', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(44, 4, 'Urobilinogen Phenlpyruvic acid', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(45, 4, 'pH', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(46, 1, 'WBC', 'x10³/µL', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(47, 1, 'Lym', 'L', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(48, 1, 'Mon', '*', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(49, 1, 'Neu', '*', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(50, 1, 'Eos', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(51, 1, 'Baso', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(52, 2, 'Salmonella Antigen Test', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(53, 2, 'Direct COOMBS Test', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(54, 2, 'Du Test', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(55, 2, 'Sickling Test', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(56, 2, 'Borrelia', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(57, 2, 'VDRL', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(58, 2, 'Pregnancy Test', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(59, 2, 'Brucella', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(60, 2, 'H. Pylori', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(61, 4, 'Appearance', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(62, 4, 'Gram stain', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(63, 4, 'ZN stain', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(64, 4, 'Modified ZN', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(65, 4, 'Wet Saline Iodine Prep', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);
INSERT INTO `measures` (`id`, `measure_type_id`, `name`, `unit`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES(66, 4, 'AST', '', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `metrics`
--

CREATE TABLE `metrics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `metrics`
--

INSERT INTO `metrics` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'mg', 'milligram', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `microbiology_test_types`
--

CREATE TABLE `microbiology_test_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_type_id` int(10) UNSIGNED NOT NULL,
  `worksheet_required` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `microbiology_test_types`
--

INSERT INTO `microbiology_test_types` (`id`, `test_type_id`, `worksheet_required`) VALUES(1, 17, 0);
INSERT INTO `microbiology_test_types` (`id`, `test_type_id`, `worksheet_required`) VALUES(2, 18, 0);
INSERT INTO `microbiology_test_types` (`id`, `test_type_id`, `worksheet_required`) VALUES(3, 19, 0);
INSERT INTO `microbiology_test_types` (`id`, `test_type_id`, `worksheet_required`) VALUES(4, 20, 0);
INSERT INTO `microbiology_test_types` (`id`, `test_type_id`, `worksheet_required`) VALUES(5, 21, 0);
INSERT INTO `microbiology_test_types` (`id`, `test_type_id`, `worksheet_required`) VALUES(6, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES('2014_07_24_082711_CreatekBLIStables', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2014_09_02_114206_entrust_setup_tables', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2014_10_09_162222_externaldumptable', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2015_02_04_004704_add_index_to_parentlabno', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2015_02_11_112608_remove_unique_constraint_on_patient_number', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2015_02_17_104134_qc_tables', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2015_02_23_112018_create_microbiology_tables', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2015_02_27_084341_createInventoryTables', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2015_03_16_155558_create_surveillance', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2015_06_24_145526_update_test_types_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2015_06_24_154426_FreeTestsColumn', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_03_30_145749_lab_config_settings', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_07_26_093733_create_unhls_districts_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_07_26_095236_create_unhls_facilities_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_07_26_095319_create_unhls_financial_years_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_07_26_095409_create_unhls_drugs_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_08_17_181955_create_rejection_reasons', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_08_31_135348_create_unhls_stockcard', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_08_31_135420_create_unhls_stockrequisition', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_09_28_091952_create_unhls_warehouse', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_09_28_095327_create_unhls_staff', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_03_220056_create_bbincidences_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_03_220511_create_bbactions_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_03_220622_create_bbcauses_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_03_220702_create_bbnatures_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_03_220852_create_bbincidences_action_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_03_220959_create_bbincidences_cause_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_03_221055_create_bbincidences_nature_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_13_170615_create_unhls_equipment_suppliers_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_19_115152_create_referral_reasons', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_20_143351_create_levels_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_20_143415_create_ownership_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_20_143713_update_unhls_facility_table', 1);
INSERT INTO `migrations` (`migration`, `batch`) VALUES('2016_10_20_145112_update_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organisms`
--

CREATE TABLE `organisms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organisms`
--

INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'Staphylococci species', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 'Gram negative cocci', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 'Pseudomonas aeruginosa', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 'Enterococcus species', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 'Streptococcus pneumoniae', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 'Streptococcus species viridans group', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 'Beta-haemolytic streptococci', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 'Haemophilus influenzae', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 'Naisseria menengitidis', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 'Salmonella species', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 'Shigella', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 'Vibrio cholerae', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, 'Gram positive cocci', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(14, 'E.coli', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `organisms` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(15, 'Oral-pharyngeal flora', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `external_patient_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_number`, `name`, `dob`, `gender`, `email`, `address`, `phone_number`, `external_patient_number`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, '1002', 'Jam Felicia', '2000-01-01', 1, 'fj@x.com', NULL, NULL, NULL, 2, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `patients` (`id`, `patient_number`, `name`, `dob`, `gender`, `email`, `address`, `phone_number`, `external_patient_number`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, '1003', 'Emma Wallace', '1990-03-01', 1, 'emma@snd.com', NULL, NULL, NULL, 2, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `patients` (`id`, `patient_number`, `name`, `dob`, `gender`, `email`, `address`, `phone_number`, `external_patient_number`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, '1004', 'Jack Tee', '1999-12-18', 0, 'info@jt.co.ke', NULL, NULL, NULL, 1, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `patients` (`id`, `patient_number`, `name`, `dob`, `gender`, `email`, `address`, `phone_number`, `external_patient_number`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, '1005', 'Hu Jintao', '1956-10-28', 0, 'hu@.un.org', NULL, NULL, NULL, 2, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `patients` (`id`, `patient_number`, `name`, `dob`, `gender`, `email`, `address`, `phone_number`, `external_patient_number`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, '2150', 'Lance Opiyo', '2012-01-01', 0, 'lance@x.com', NULL, NULL, NULL, 1, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(1, 1, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(2, 2, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(3, 3, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(4, 4, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(5, 5, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(6, 6, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(7, 7, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(8, 8, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(9, 9, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(10, 10, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(11, 11, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(12, 12, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(13, 13, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(14, 14, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(15, 15, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(16, 16, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(17, 17, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(18, 18, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(19, 19, 1);
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES(20, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(1, 'view_names', 'Can view patient names', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(2, 'manage_patients', 'Can add patients', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(3, 'receive_external_test', 'Can receive test requests', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(4, 'request_test', 'Can request new test', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(5, 'accept_test_specimen', 'Can accept test specimen', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(6, 'reject_test_specimen', 'Can reject test specimen', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(7, 'change_test_specimen', 'Can change test specimen', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(8, 'start_test', 'Can start tests', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(9, 'enter_test_results', 'Can enter tests results', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(10, 'edit_test_results', 'Can edit test results', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(11, 'verify_test_results', 'Can verify test results', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(12, 'send_results_to_external_system', 'Can send test results to external systems', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(13, 'refer_specimens', 'Can refer specimens', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(14, 'manage_users', 'Can manage users', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(15, 'manage_test_catalog', 'Can manage test catalog', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(16, 'manage_lab_configurations', 'Can manage lab configurations', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(17, 'view_reports', 'Can view reports', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(18, 'manage_inventory', 'Can manage inventory', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(19, 'request_topup', 'Can request top-up', '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES(20, 'manage_qc', 'Can manage Quality Control', '2017-01-25 07:11:52', '2017-01-25 07:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `commodity_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `batch_no` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `commodity_id`, `supplier_id`, `quantity`, `batch_no`, `expiry_date`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 1, 1, 130000, '002720', '2018-10-14', 1, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `referral_reasons`
--

CREATE TABLE `referral_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `facility_id` int(10) UNSIGNED NOT NULL,
  `person` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contacts` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rejection_reasons`
--

CREATE TABLE `rejection_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rejection_reasons`
--

INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(1, 'Poorly labelled');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(2, 'Over saturation');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(3, 'Insufficient Sample');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(4, 'Scattered');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(5, 'Clotted Blood');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(6, 'Two layered spots');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(7, 'Serum rings');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(8, 'Scratched');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(9, 'Haemolysis');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(10, 'Spots that cannot elute');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(11, 'Leaking');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(12, 'Broken Sample Container');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(13, 'Mismatched sample and form labelling');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(14, 'Missing Labels on container and tracking form');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(15, 'Empty Container');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(16, 'Samples without tracking forms');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(17, 'Poor transport');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(18, 'Lipaemic');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(19, 'Wrong container/Anticoagulant');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(20, 'Request form without samples');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(21, 'Missing collection date on specimen / request form.');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(22, 'Name and signature of requester missing');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(23, 'Mismatched information on request form and specimen container.');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(24, 'Request form contaminated with specimen');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(25, 'Duplicate specimen received');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(26, 'Delay between specimen collection and arrival in the laboratory');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(27, 'Inappropriate specimen packing');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(28, 'Inappropriate specimen for the test');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(29, 'Inappropriate test for the clinical condition');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(30, 'No Label');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(31, 'Leaking');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(32, 'No Sample in the Container');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(33, 'No Request Form');
INSERT INTO `rejection_reasons` (`id`, `reason`) VALUES(34, 'Missing Information Required');

-- --------------------------------------------------------

--
-- Table structure for table `report_diseases`
--

CREATE TABLE `report_diseases` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_type_id` int(10) UNSIGNED NOT NULL,
  `disease_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `report_diseases`
--

INSERT INTO `report_diseases` (`id`, `test_type_id`, `disease_id`) VALUES(1, 1, 1);
INSERT INTO `report_diseases` (`id`, `test_type_id`, `disease_id`) VALUES(2, 7, 2);
INSERT INTO `report_diseases` (`id`, `test_type_id`, `disease_id`) VALUES(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(1, 'Superadmin', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(2, 'Technologist', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES(3, 'Receptionist', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `specimen_statuses`
--

CREATE TABLE `specimen_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specimen_statuses`
--

INSERT INTO `specimen_statuses` (`id`, `name`) VALUES(1, 'specimen-not-collected');
INSERT INTO `specimen_statuses` (`id`, `name`) VALUES(2, 'specimen-accepted');
INSERT INTO `specimen_statuses` (`id`, `name`) VALUES(3, 'specimen-rejected');

-- --------------------------------------------------------

--
-- Table structure for table `specimen_types`
--

CREATE TABLE `specimen_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specimen_types`
--

INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'Ascitic Tap', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 'Aspirate', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 'CSF', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 'Dried Blood Spot', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 'High Vaginal Swab', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 'Nasal Swab', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 'Plasma', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 'Plasma EDTA', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 'Pleural Tap', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 'Pus Swab', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 'Rectal Swab', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 'Semen', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, 'Serum', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(14, 'Skin', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(15, 'Vomitus', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(16, 'Stool', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(17, 'Synovial Fluid', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(18, 'Throat Swab', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(19, 'Urethral Smear', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(20, 'Urine', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(21, 'Vaginal Smear', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(22, 'Water', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(23, 'Whole Blood', NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `specimen_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(24, 'Sputum', NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `specimens`
--

CREATE TABLE `specimens` (
  `id` int(10) UNSIGNED NOT NULL,
  `specimen_type_id` int(10) UNSIGNED NOT NULL,
  `specimen_status_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `accepted_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `rejected_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `rejection_reason_id` int(10) UNSIGNED DEFAULT NULL,
  `reject_explained_to` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referral_id` int(10) UNSIGNED DEFAULT NULL,
  `time_accepted` timestamp NULL DEFAULT NULL,
  `time_rejected` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specimens`
--

INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(1, 23, 1, 0, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(2, 23, 1, 0, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(3, 23, 1, 0, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(4, 23, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:52', NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(5, 23, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:52', NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(6, 23, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:52', NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(7, 23, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:52', NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(8, 23, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:52', NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(9, 23, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:52', NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(10, 23, 3, 0, 1, 16, NULL, NULL, NULL, '2017-01-25 07:11:52');
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(11, 23, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:52', NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(12, 23, 3, 0, 1, 6, NULL, NULL, NULL, '2017-01-25 07:11:52');
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(13, 23, 3, 0, 1, 12, NULL, NULL, NULL, '2017-01-25 07:11:52');
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(14, 23, 1, 0, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(15, 23, 1, 0, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(16, 23, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:52', NULL);
INSERT INTO `specimens` (`id`, `specimen_type_id`, `specimen_status_id`, `accepted_by`, `rejected_by`, `rejection_reason_id`, `reject_explained_to`, `referral_id`, `time_accepted`, `time_rejected`) VALUES(17, 24, 2, 1, 0, NULL, NULL, NULL, '2017-01-25 07:11:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `physical_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone_no`, `email`, `physical_address`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'UNICEF', '0775112233', 'uni@unice.org', 'un-hqtr', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `test_categories`
--

CREATE TABLE `test_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_categories`
--

INSERT INTO `test_categories` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'PARASITOLOGY', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_categories` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 'MICROBIOLOGY', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_categories` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 'HEMATOLOGY', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_categories` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 'SEROLOGY', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_categories` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 'BLOOD TRANSFUSION', '', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `test_phases`
--

CREATE TABLE `test_phases` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_phases`
--

INSERT INTO `test_phases` (`id`, `name`) VALUES(1, 'Pre-Analytical');
INSERT INTO `test_phases` (`id`, `name`) VALUES(2, 'Analytical');
INSERT INTO `test_phases` (`id`, `name`) VALUES(3, 'Post-Analytical');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `measure_id` int(10) UNSIGNED NOT NULL,
  `result` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(1, 9, 1, '+++', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(2, 8, 1, '++', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(3, 5, 25, 'COMPATIBLE WITH 061832914 B/G A POS.EXPIRY19/8/14', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(4, 5, 26, 'A+', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(5, 6, 27, '13.7', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(6, 13, 1, 'No mps seen', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(7, 16, 28, '050', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(8, 16, 29, '150', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(9, 16, 30, '250', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(10, 16, 31, '350', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(11, 16, 32, '450', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(12, 16, 33, '550', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(13, 16, 34, '650', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(14, 16, 35, '750', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(15, 16, 36, '850', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(16, 16, 37, '950', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(17, 16, 38, '1050', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(18, 16, 39, '1150', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(19, 16, 40, '1250', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(20, 16, 41, '1350', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(21, 16, 42, '1450', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(22, 16, 43, '1550', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(23, 16, 44, '1650', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(24, 16, 45, '1750', '2017-01-25 07:11:52');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(25, 17, 52, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(26, 18, 53, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(27, 19, 54, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(28, 20, 55, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(29, 21, 56, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(30, 22, 57, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(31, 23, 58, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(32, 24, 59, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(33, 25, 60, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(34, 26, 52, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(35, 27, 53, 'Negative', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(36, 28, 54, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(37, 29, 55, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(38, 30, 56, 'Negative', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(39, 31, 57, 'Negative', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(40, 32, 58, 'Negative', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(41, 33, 59, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(42, 34, 60, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(43, 35, 58, 'Negative', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(44, 36, 58, 'Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(45, 38, 61, 'Muco-Salivary', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(46, 39, 62, '3+ Gram positive diplococci,1+ Gram negative cocci,<5 pmns and 5-10 epithelial cells seen.', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(47, 40, 63, 'No AFB seen', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(48, 41, 66, '-', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(49, 42, 61, 'Formed', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(50, 43, 64, 'No Oocysts seen.', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(51, 44, 65, 'No Ova/cysts seen.', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(52, 45, 66, 'ESBL Positive', '2017-01-25 07:11:53');
INSERT INTO `test_results` (`id`, `test_id`, `measure_id`, `result`, `time_entered`) VALUES(53, 37, 66, 'General Comment', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `test_statuses`
--

CREATE TABLE `test_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `test_phase_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_statuses`
--

INSERT INTO `test_statuses` (`id`, `name`, `test_phase_id`) VALUES(1, 'not-received', 1);
INSERT INTO `test_statuses` (`id`, `name`, `test_phase_id`) VALUES(2, 'pending', 1);
INSERT INTO `test_statuses` (`id`, `name`, `test_phase_id`) VALUES(3, 'started', 2);
INSERT INTO `test_statuses` (`id`, `name`, `test_phase_id`) VALUES(4, 'completed', 3);
INSERT INTO `test_statuses` (`id`, `name`, `test_phase_id`) VALUES(5, 'verified', 3);

-- --------------------------------------------------------

--
-- Table structure for table `test_types`
--

CREATE TABLE `test_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `test_category_id` int(10) UNSIGNED NOT NULL,
  `targetTAT` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `orderable_test` int(11) DEFAULT NULL,
  `prevalence_threshold` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accredited` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test_types`
--

INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 'BS for mps', NULL, 1, NULL, 1, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(2, 'Stool for C/S', NULL, 2, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(3, 'GXM', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(4, 'HB', NULL, 1, NULL, 1, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(5, 'Urinalysis', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(6, 'WBC', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(7, 'Salmonella Antigen Test', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(8, 'Direct COOMBS Test', NULL, 5, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(9, 'DU Test', NULL, 5, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(10, 'Sickling Test', NULL, 3, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(11, 'Borrelia', NULL, 1, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(12, 'VDRL', NULL, 4, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(13, 'Pregnancy Test', NULL, 4, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(14, 'Brucella', NULL, 4, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(15, 'H. Pylori', NULL, 4, NULL, NULL, NULL, NULL, NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(16, 'AST', NULL, 2, NULL, 1, NULL, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(17, 'Appearance', NULL, 2, NULL, 1, NULL, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(18, 'Gram stain', NULL, 2, NULL, 1, NULL, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(19, 'ZN stain', NULL, 2, NULL, 1, NULL, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(20, 'Modified ZN', NULL, 2, NULL, 1, NULL, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');
INSERT INTO `test_types` (`id`, `name`, `description`, `test_category_id`, `targetTAT`, `orderable_test`, `prevalence_threshold`, `accredited`, `deleted_at`, `created_at`, `updated_at`) VALUES(21, 'Wet Saline Iodine Prep', NULL, 2, NULL, 1, NULL, NULL, NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `visit_id` bigint(20) UNSIGNED NOT NULL,
  `test_type_id` int(10) UNSIGNED NOT NULL,
  `specimen_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `interpretation` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `test_status_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_by` int(10) UNSIGNED NOT NULL,
  `tested_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `verified_by` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `requested_by` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `time_started` timestamp NULL DEFAULT NULL,
  `time_completed` timestamp NULL DEFAULT NULL,
  `time_verified` timestamp NULL DEFAULT NULL,
  `time_sent` timestamp NULL DEFAULT NULL,
  `external_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(1, 1, 1, 1, '', 1, 1, 0, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(2, 6, 4, 2, '', 2, 1, 0, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(3, 3, 3, 3, '', 2, 1, 0, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(4, 6, 1, 4, '', 2, 1, 0, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(5, 7, 3, 5, 'Perfect match.', 4, 1, 1, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '2017-01-25 07:24:00', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(6, 7, 4, 6, 'Do nothing!', 4, 1, 1, 0, 'Genghiz Khan', '2017-01-25 07:11:52', '2017-01-25 07:24:00', '2017-01-25 07:29:23', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(7, 2, 3, 7, '', 3, 1, 0, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', '2017-01-25 07:29:23', NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(8, 6, 1, 8, 'Positive', 4, 1, 1, 0, 'Ariel Smith', '2017-01-25 07:11:52', '2017-01-25 07:29:23', '2017-01-25 07:36:57', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(9, 5, 1, 9, 'Very high concentration of parasites.', 5, 1, 1, 1, 'Genghiz Khan', '2017-01-25 07:11:52', '2017-01-25 09:34:47', '2017-01-25 07:42:14', '2017-01-25 09:34:47', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(10, 3, 1, 10, '', 2, 1, 0, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', '2017-01-25 09:34:47', NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(11, 6, 6, 11, '', 2, 1, 0, 0, 'Fred Astaire', '2017-01-25 07:11:52', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(12, 7, 1, 12, '', 3, 1, 0, 0, 'Bony Em', '2017-01-25 07:11:52', '2017-01-25 09:34:47', NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(13, 7, 1, 13, 'Budda Boss', 4, 1, 1, 0, 'Ed Buttler', '2017-01-25 07:11:52', '2017-01-25 09:34:47', '2017-01-25 10:04:51', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(14, 4, 5, 14, '', 2, 1, 0, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(15, 6, 6, 15, '', 2, 1, 0, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(16, 3, 5, 16, 'Whats this !!!! ###%%% ^ *() /', 4, 1, 1, 0, 'Dr. Abou Meyang', '2017-01-25 07:11:52', '2017-01-25 10:04:51', '2017-01-25 10:16:59', NULL, NULL, 596699);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(17, 1, 7, 4, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-07-23 12:16:15', '2014-07-23 13:07:15', '2014-07-23 13:17:19', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(18, 2, 8, 3, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-07-26 07:16:15', '2014-07-26 10:27:15', '2014-07-26 10:57:01', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(19, 3, 9, 2, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-08-13 06:16:15', '2014-08-13 07:07:15', '2014-08-13 07:18:11', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(20, 4, 10, 1, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-08-16 06:06:53', '2014-08-16 06:09:15', '2014-08-16 06:23:37', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(21, 5, 11, 1, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-08-23 07:16:15', '2014-08-23 08:54:39', '2014-08-23 09:07:18', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(22, 6, 12, 2, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-09-07 04:23:15', '2014-09-07 05:07:20', '2014-09-07 05:41:13', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(23, 7, 13, 3, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-10-03 08:52:15', '2014-10-03 09:31:04', '2014-10-03 09:45:18', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(24, 1, 14, 4, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-10-15 14:01:15', '2014-10-15 14:05:24', '2014-10-15 15:07:15', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(25, 2, 15, 4, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-10-23 13:06:15', '2014-10-23 13:07:15', '2014-10-23 13:39:02', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(26, 4, 7, 3, 'Budda Boss', 4, 2, 3, 0, 'Ariel Smith', '2014-10-21 16:16:15', '2014-10-21 16:17:15', '2014-10-21 16:52:40', NULL, NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(27, 3, 8, 2, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-07-21 16:16:15', '2014-07-21 16:17:15', '2014-07-21 16:52:40', '2014-07-21 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(28, 2, 9, 1, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-08-21 16:16:15', '2014-08-21 16:17:15', '2014-08-21 16:52:40', '2014-08-21 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(29, 3, 10, 4, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-08-26 16:16:15', '2014-08-26 16:17:15', '2014-08-26 16:52:40', '2014-08-26 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(30, 4, 11, 2, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-09-21 16:16:15', '2014-09-21 16:17:15', '2014-09-21 16:52:40', '2014-09-21 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(31, 1, 12, 3, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-09-22 16:16:15', '2014-09-22 16:17:15', '2014-09-22 16:52:40', '2014-09-22 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(32, 1, 13, 4, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-09-23 16:16:15', '2014-09-23 16:17:15', '2014-09-23 16:52:40', '2014-09-23 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(33, 1, 14, 2, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-09-27 16:16:15', '2014-09-27 16:17:15', '2014-09-27 16:52:40', '2014-09-27 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(34, 3, 15, 4, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-22 16:16:15', '2014-10-22 16:17:15', '2014-10-22 16:52:40', '2014-10-22 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(35, 4, 13, 3, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(36, 2, 13, 1, 'Budda Boss', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-02 16:16:15', '2014-10-02 16:17:15', '2014-10-02 16:52:40', '2014-10-02 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(37, 8, 16, 17, 'Format being deliberated', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(38, 8, 17, 17, '', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(39, 8, 18, 17, '', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(40, 8, 19, 17, '', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(41, 8, 16, 1, '', 2, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(42, 8, 17, 17, '', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(43, 8, 20, 17, '', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(44, 8, 21, 17, '', 5, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);
INSERT INTO `tests` (`id`, `visit_id`, `test_type_id`, `specimen_id`, `interpretation`, `test_status_id`, `created_by`, `tested_by`, `verified_by`, `requested_by`, `time_created`, `time_started`, `time_completed`, `time_verified`, `time_sent`, `external_id`) VALUES(45, 8, 16, 2, '', 2, 3, 2, 3, 'Genghiz Khan', '2014-10-17 16:16:15', '2014-10-17 16:17:15', '2014-10-17 16:52:40', '2014-10-17 16:53:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testtype_measures`
--

CREATE TABLE `testtype_measures` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_type_id` int(10) UNSIGNED NOT NULL,
  `measure_id` int(10) UNSIGNED NOT NULL,
  `ordering` tinyint(4) DEFAULT NULL,
  `nesting` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testtype_measures`
--

INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(1, 1, 1, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(2, 3, 25, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(3, 3, 26, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(4, 4, 27, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(5, 5, 28, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(6, 5, 29, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(7, 5, 30, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(8, 5, 31, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(9, 5, 32, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(10, 5, 33, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(11, 5, 34, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(12, 5, 35, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(13, 5, 36, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(14, 5, 37, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(15, 5, 38, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(16, 5, 39, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(17, 5, 40, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(18, 5, 41, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(19, 5, 42, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(20, 5, 43, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(21, 5, 44, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(22, 5, 45, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(23, 6, 46, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(24, 6, 47, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(25, 6, 48, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(26, 6, 49, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(27, 6, 50, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(28, 6, 51, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(29, 7, 52, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(30, 8, 53, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(31, 9, 54, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(32, 10, 55, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(33, 11, 56, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(34, 12, 57, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(35, 13, 58, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(36, 14, 59, NULL, NULL);
INSERT INTO `testtype_measures` (`id`, `test_type_id`, `measure_id`, `ordering`, `nesting`) VALUES(37, 15, 60, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testtype_specimentypes`
--

CREATE TABLE `testtype_specimentypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `test_type_id` int(10) UNSIGNED NOT NULL,
  `specimen_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testtype_specimentypes`
--

INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(1, 1, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(2, 3, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(3, 4, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(4, 4, 7);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(5, 4, 8);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(6, 4, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(7, 5, 20);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(8, 5, 21);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(9, 6, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(10, 7, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(11, 8, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(12, 9, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(13, 10, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(14, 11, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(15, 12, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(16, 13, 20);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(17, 14, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(18, 15, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(19, 2, 16);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(20, 16, 1);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(21, 16, 2);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(22, 16, 3);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(23, 16, 4);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(24, 16, 5);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(25, 16, 6);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(26, 16, 7);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(27, 16, 8);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(28, 16, 9);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(29, 16, 10);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(30, 16, 11);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(31, 16, 12);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(32, 16, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(33, 16, 14);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(34, 16, 15);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(35, 16, 16);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(36, 16, 17);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(37, 16, 18);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(38, 16, 19);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(39, 16, 20);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(40, 16, 21);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(41, 16, 22);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(42, 16, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(43, 17, 1);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(44, 17, 2);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(45, 17, 3);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(46, 17, 4);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(47, 17, 5);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(48, 17, 6);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(49, 17, 7);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(50, 17, 8);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(51, 17, 9);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(52, 17, 10);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(53, 17, 11);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(54, 17, 12);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(55, 17, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(56, 17, 14);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(57, 17, 15);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(58, 17, 16);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(59, 17, 17);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(60, 17, 18);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(61, 17, 19);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(62, 17, 20);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(63, 17, 21);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(64, 17, 22);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(65, 17, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(66, 18, 1);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(67, 18, 2);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(68, 18, 3);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(69, 18, 4);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(70, 18, 5);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(71, 18, 6);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(72, 18, 7);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(73, 18, 8);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(74, 18, 9);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(75, 18, 10);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(76, 18, 11);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(77, 18, 12);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(78, 18, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(79, 18, 14);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(80, 18, 15);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(81, 18, 16);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(82, 18, 17);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(83, 18, 18);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(84, 18, 19);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(85, 18, 20);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(86, 18, 21);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(87, 18, 22);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(88, 18, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(89, 19, 1);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(90, 19, 2);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(91, 19, 3);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(92, 19, 4);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(93, 19, 5);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(94, 19, 6);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(95, 19, 7);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(96, 19, 8);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(97, 19, 9);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(98, 19, 10);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(99, 19, 11);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(100, 19, 12);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(101, 19, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(102, 19, 14);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(103, 19, 15);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(104, 19, 16);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(105, 19, 17);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(106, 19, 18);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(107, 19, 19);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(108, 19, 20);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(109, 19, 21);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(110, 19, 22);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(111, 19, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(112, 20, 1);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(113, 20, 2);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(114, 20, 3);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(115, 20, 4);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(116, 20, 5);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(117, 20, 6);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(118, 20, 7);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(119, 20, 8);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(120, 20, 9);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(121, 20, 10);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(122, 20, 11);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(123, 20, 12);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(124, 20, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(125, 20, 14);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(126, 20, 15);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(127, 20, 16);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(128, 20, 17);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(129, 20, 18);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(130, 20, 19);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(131, 20, 20);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(132, 20, 21);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(133, 20, 22);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(134, 20, 23);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(135, 21, 1);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(136, 21, 2);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(137, 21, 3);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(138, 21, 4);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(139, 21, 5);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(140, 21, 6);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(141, 21, 7);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(142, 21, 8);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(143, 21, 9);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(144, 21, 10);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(145, 21, 11);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(146, 21, 12);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(147, 21, 13);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(148, 21, 14);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(149, 21, 15);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(150, 21, 16);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(151, 21, 17);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(152, 21, 18);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(153, 21, 19);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(154, 21, 20);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(155, 21, 21);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(156, 21, 22);
INSERT INTO `testtype_specimentypes` (`id`, `test_type_id`, `specimen_type_id`) VALUES(157, 21, 23);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topup_requests`
--

CREATE TABLE `topup_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `commodity_id` int(10) UNSIGNED NOT NULL,
  `test_category_id` int(10) UNSIGNED NOT NULL,
  `order_quantity` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `remarks` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topup_requests`
--

INSERT INTO `topup_requests` (`id`, `commodity_id`, `test_category_id`, `order_quantity`, `user_id`, `remarks`, `deleted_at`, `created_at`, `updated_at`) VALUES(1, 1, 1, 1500, 1, '-', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_bbactions`
--

CREATE TABLE `unhls_bbactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `actionname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unhls_bbactions`
--

INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 'Reported to administration for further action', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 'Referred to mental department', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(3, 'Gave first aid (e.g. arrested bleeding)', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(4, 'Referred to clinician for further management', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(5, 'Conducted risk assessment', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(6, 'Intervened to interrupt/arrest progress of incident (e.g. Used neutralizing agent, stopping a fight)', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(7, 'Disposed off broken container to designated waste bin/sharps', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(8, 'Patient sample taken & referred to testing lab Isolated suspected patient', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(9, 'Reported to or engaged national level BRM for intervention', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(10, 'Victim counseled', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(11, 'Contacted Police', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(12, 'Used spill kit', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(13, 'Administered PEP', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(14, 'Referred to disciplinary committee', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(15, 'Contained the spillage', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(16, 'Disinfected the place', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(17, 'Switched off the Electricity Mains', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(18, 'Washed punctured area', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbactions` (`id`, `actionname`, `created_at`, `updated_at`, `deleted_at`) VALUES(19, 'Others', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_bbcauses`
--

CREATE TABLE `unhls_bbcauses` (
  `id` int(10) UNSIGNED NOT NULL,
  `causename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unhls_bbcauses`
--

INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 'Defective Equipment', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 'Hazardous Chemicals', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(3, 'Unsafe Procedure', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(4, 'Psychological causes (e.g. emotional condition, depression, mental confusion)', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(5, 'Unsafe storage of laboratory chemicals', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(6, 'Lack of Skill or Knowledge', '2017-01-25 07:11:51', '2017-01-25 07:11:51', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(7, 'Lack of Personal Protective Equipment', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(8, 'Unsafe Working Environment', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(9, 'Lack of Adequate Physical Security', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(10, 'Unsafe location of laboratory equipment', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbcauses` (`id`, `causename`, `created_at`, `updated_at`, `deleted_at`) VALUES(11, 'Other', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_bbincidences`
--

CREATE TABLE `unhls_bbincidences` (
  `id` int(10) UNSIGNED NOT NULL,
  `facility_id` int(10) UNSIGNED NOT NULL,
  `serial_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `occurrence_date` date NOT NULL,
  `occurrence_time` time NOT NULL,
  `personnel_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_othername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_dob` date NOT NULL,
  `personnel_age` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `personnel_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nok_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nok_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nok_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lab_section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `occurrence` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ulin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equip_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equip_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `officer_fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `officer_lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `officer_cadre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `officer_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstaid` text COLLATE utf8_unicode_ci NOT NULL,
  `intervention` text COLLATE utf8_unicode_ci NOT NULL,
  `intervention_date` date NOT NULL,
  `intervention_time` time NOT NULL,
  `intervention_followup` text COLLATE utf8_unicode_ci NOT NULL,
  `mo_fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mo_lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mo_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mo_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cause` text COLLATE utf8_unicode_ci NOT NULL,
  `corrective_action` text COLLATE utf8_unicode_ci NOT NULL,
  `referral_status` text COLLATE utf8_unicode_ci NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `analysis_date` date NOT NULL,
  `analysis_time` time NOT NULL,
  `bo_fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bo_lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bo_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bo_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `findings` text COLLATE utf8_unicode_ci NOT NULL,
  `improvement_plan` text COLLATE utf8_unicode_ci NOT NULL,
  `response_date` date NOT NULL,
  `response_time` time NOT NULL,
  `brm_fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brm_lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brm_designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brm_telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdby` int(10) UNSIGNED DEFAULT NULL,
  `updatedby` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_bbincidences_action`
--

CREATE TABLE `unhls_bbincidences_action` (
  `id` int(10) UNSIGNED NOT NULL,
  `bbincidence_id` int(10) UNSIGNED NOT NULL,
  `action_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_bbincidences_cause`
--

CREATE TABLE `unhls_bbincidences_cause` (
  `id` int(10) UNSIGNED NOT NULL,
  `bbincidence_id` int(10) UNSIGNED NOT NULL,
  `cause_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_bbincidences_nature`
--

CREATE TABLE `unhls_bbincidences_nature` (
  `id` int(10) UNSIGNED NOT NULL,
  `bbincidence_id` int(10) UNSIGNED NOT NULL,
  `nature_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_bbnatures`
--

CREATE TABLE `unhls_bbnatures` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unhls_bbnatures`
--

INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 'Assault/Fight among staff', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 'Fainting', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(3, 'Roof leakages', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(4, 'Machine cuts/bruises', 'Mechanical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(5, 'Electric shock/burn', 'Mechanical', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(6, 'Death within lab', 'Ergonometric and Medical', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(7, 'Slip or fall', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(8, 'Unnecessary destruction of lab material', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(9, 'Theft of laboratory consumables', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(10, 'Breakage of sample container', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(11, 'Prick/cut by unused sharps', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(12, 'Injury caused by laboratory objects', 'Physical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(13, 'Chemical burn', 'Chemical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(14, 'Theft of chemical', 'Chemical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(15, 'Chemical spillage', 'Chemical', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(16, 'Theft of equipment', 'Physical', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(17, 'Attack on the Lab', 'Physical', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(18, 'Collapsing building', 'Physical', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(19, 'Bike rider accident', 'Physical', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(20, 'Fire', 'Physical', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(21, 'Needle prick or cuts by used sharps', 'Biological', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(22, 'Sample spillage', 'Biological', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(23, 'Theft of samples', 'Biological', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(24, 'Contact with VHF suspect', 'Biological', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(25, 'Contact with radiological materials', 'Radiological', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(26, 'Theft of radiological materials', 'Radiological', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(27, 'Poor disposal of radiological materials', 'Radiological', 'Major', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(28, 'Poor vision from inadequate light', 'Ergonometric and Medical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(29, 'Back pain from posture effects', 'Ergonometric and Medical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(30, 'Other occupational hazard', 'Ergonometric and Medical', 'Minor', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');
INSERT INTO `unhls_bbnatures` (`id`, `name`, `class`, `priority`, `created_at`, `updated_at`, `deleted_at`) VALUES(31, 'Other', 'Other', 'Other', '2017-01-25 07:11:52', '2017-01-25 07:11:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_departments`
--

CREATE TABLE `unhls_departments` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unhls_departments`
--

INSERT INTO `unhls_departments` (`id`, `name`) VALUES(1, 'LIMS');
INSERT INTO `unhls_departments` (`id`, `name`) VALUES(2, 'Lab');
INSERT INTO `unhls_departments` (`id`, `name`) VALUES(3, 'Disease Outbreak and Investigations');
INSERT INTO `unhls_departments` (`id`, `name`) VALUES(4, 'Operations');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_districts`
--

CREATE TABLE `unhls_districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unhls_districts`
--

INSERT INTO `unhls_districts` (`id`, `name`, `created_at`, `updated_at`) VALUES(1, 'Kampala', '2017-01-25 07:11:51', '2017-01-25 07:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_drugs`
--

CREATE TABLE `unhls_drugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formulation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strength` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pack_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_of_issue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `max_stock_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_stock_level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_equipment_suppliers`
--

CREATE TABLE `unhls_equipment_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_events`
--

CREATE TABLE `unhls_events` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `department` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `approval_status` varchar(255) NOT NULL,
  `approvedby` varchar(255) NOT NULL,
  `approvedon` timestamp NOT NULL,
  `location` varchar(255) NOT NULL,
  `premise` varchar(255) NOT NULL,
  `district_id` int(10) DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `audience` varchar(255) NOT NULL,
  `participants_no` int(10) NOT NULL,
  `organiser` varchar(255) NOT NULL,
  `report_filename` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unhls_events`
--

INSERT INTO `unhls_events` (`id`, `serial_no`, `name`, `description`, `department`, `type`, `start_date`, `end_date`, `approval_status`, `approvedby`, `approvedon`, `location`, `premise`, `district_id`, `region`, `sponsor`, `audience`, `participants_no`, `organiser`, `report_filename`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, '', 'LQMS Training', '', 'Quality', 'CPHL Staff', '2016-11-22', '2016-11-27', '', '', '0000-00-00 00:00:00', 'Field Activity', 'Pope Paul Hotel', 2, 'Central', 'CDC', 'All CPHL Staff', 100, 'Quality Officer', 'Report1_NEW structure of UNHLS eservices -LIMS unit.pdf', 1, '2016-11-25 05:22:31', '2016-11-25 05:22:31', '2016-11-25 05:22:31');
INSERT INTO `unhls_events` (`id`, `serial_no`, `name`, `description`, `department`, `type`, `start_date`, `end_date`, `approval_status`, `approvedby`, `approvedon`, `location`, `premise`, `district_id`, `region`, `sponsor`, `audience`, `participants_no`, `organiser`, `report_filename`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, '', 'Official opening of UNHLS Building in Butabika', '', 'Administration', 'National', '2016-11-17', '2016-11-23', '', '', '0000-00-00 00:00:00', '', '', 0, '', '', '', 0, '', '', 1, '2016-11-25 05:06:40', '2016-11-25 05:06:40', '2016-11-25 05:06:40');
INSERT INTO `unhls_events` (`id`, `serial_no`, `name`, `description`, `department`, `type`, `start_date`, `end_date`, `approval_status`, `approvedby`, `approvedon`, `location`, `premise`, `district_id`, `region`, `sponsor`, `audience`, `participants_no`, `organiser`, `report_filename`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES(9, '', 'GIS Training', '', 'M&E', 'CPHL Staff', '2016-11-07', '2016-11-11', '', '', '0000-00-00 00:00:00', '', '', 0, '', '', '', 0, '', '', 2, '2017-01-23 04:57:56', '2017-01-23 04:57:56', '2017-01-23 04:57:56');
INSERT INTO `unhls_events` (`id`, `serial_no`, `name`, `description`, `department`, `type`, `start_date`, `end_date`, `approval_status`, `approvedby`, `approvedon`, `location`, `premise`, `district_id`, `region`, `sponsor`, `audience`, `participants_no`, `organiser`, `report_filename`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES(10, '', 'HMIS Tools Training', '', 'LIMS', 'Health Managers', '2016-11-28', '2016-12-02', 'Approved', 'Justus Ashaba', '2017-01-23 10:40:14', 'Field Activity', 'Ridar Hotel', 2, 'Mukono', 'ASLM', 'Selected members from LIS Pilot Labs', 30, 'Kasule Dan', 'Report10_UBLIS.pdf', 1, '2017-01-23 10:40:14', '2017-01-23 10:40:14', '2017-01-23 10:40:14');
INSERT INTO `unhls_events` (`id`, `serial_no`, `name`, `description`, `department`, `type`, `start_date`, `end_date`, `approval_status`, `approvedby`, `approvedon`, `location`, `premise`, `district_id`, `region`, `sponsor`, `audience`, `participants_no`, `organiser`, `report_filename`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES(11, '', 'HLIMS QA Tools Validation', '', 'LIMS', 'National stakeholders meeting', '2016-12-19', '2016-12-23', '', '', '0000-00-00 00:00:00', 'CPHL', '', 1, '', 'ASLM', 'Laboratory Quality Officers from 12 HLIMS pilot sites and selected personnel from CPHL', 18, 'Dan Kasule', '', 2, '2017-01-23 10:49:54', '2017-01-23 10:49:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_events_actions`
--

CREATE TABLE `unhls_events_actions` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unhls_events_actions`
--

INSERT INTO `unhls_events_actions` (`id`, `event_id`, `action`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 1, 'The quality officer will draft a letter to SANAS indicating competence of new staff', '2016-11-21 13:59:48', '2016-11-21 13:59:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_events_lessons`
--

CREATE TABLE `unhls_events_lessons` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `lesson` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unhls_events_lessons`
--

INSERT INTO `unhls_events_lessons` (`id`, `event_id`, `lesson`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 1, 'Members got aware of the accreditation process', '2016-11-21 09:20:08', '2016-11-21 09:20:08', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_lessons` (`id`, `event_id`, `lesson`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 1, 'Members got aware of the accreditation process', '2016-11-21 09:20:57', '2016-11-21 09:20:57', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_lessons` (`id`, `event_id`, `lesson`, `created_at`, `updated_at`, `deleted_at`) VALUES(3, 1, 'Staff discovered that they were not doing things right', '2016-11-21 09:23:54', '2016-11-21 09:23:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_events_objectives`
--

CREATE TABLE `unhls_events_objectives` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unhls_events_objectives`
--

INSERT INTO `unhls_events_objectives` (`id`, `event_id`, `objective`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 1, 'To equip staff with knowledge about ISO 159', '2016-11-21 05:42:26', '2016-11-21 05:42:26', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_objectives` (`id`, `event_id`, `objective`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 1, 'To prepare for SANA accreditation', '2016-11-21 05:48:33', '2016-11-21 05:48:33', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_objectives` (`id`, `event_id`, `objective`, `created_at`, `updated_at`, `deleted_at`) VALUES(4, 1, 'To build local capacity for laboratory mentors', '2016-11-21 05:54:31', '2016-11-21 05:54:31', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_objectives` (`id`, `event_id`, `objective`, `created_at`, `updated_at`, `deleted_at`) VALUES(10, 1, 'To build local capacity for laboratory mentors', '2016-11-21 08:54:45', '2016-11-21 08:54:45', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_objectives` (`id`, `event_id`, `objective`, `created_at`, `updated_at`, `deleted_at`) VALUES(9, 2, 'To officially open UNHLS Complex in Butabika', '2016-11-21 06:58:32', '2016-11-21 06:58:32', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_objectives` (`id`, `event_id`, `objective`, `created_at`, `updated_at`, `deleted_at`) VALUES(12, 10, 'To train lab staff on how to use the LIMS paper tools', '2016-11-24 10:48:07', '2016-11-24 10:48:07', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_objectives` (`id`, `event_id`, `objective`, `created_at`, `updated_at`, `deleted_at`) VALUES(14, 1, 'To obtain .....', '2017-01-17 03:50:52', '2017-01-17 03:50:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_events_recommendations`
--

CREATE TABLE `unhls_events_recommendations` (
  `id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `recommendation` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unhls_events_recommendations`
--

INSERT INTO `unhls_events_recommendations` (`id`, `event_id`, `recommendation`, `created_at`, `updated_at`, `deleted_at`) VALUES(1, 1, 'There should annual refresher trainings about LQMS', '2016-11-21 13:47:19', '2016-11-21 13:47:19', '0000-00-00 00:00:00');
INSERT INTO `unhls_events_recommendations` (`id`, `event_id`, `recommendation`, `created_at`, `updated_at`, `deleted_at`) VALUES(2, 1, 'Management should consider a full time position of a Quality Officer', '2016-11-21 13:48:40', '2016-11-21 13:48:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_facilities`
--

CREATE TABLE `unhls_facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `ownership_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unhls_facilities`
--

INSERT INTO `unhls_facilities` (`id`, `name`, `district_id`, `created_at`, `updated_at`, `code`, `level_id`, `ownership_id`) VALUES(1, 'Lab Kampala 1', 1, '2017-01-25 07:11:51', '2017-01-25 07:11:51', 'LBK1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unhls_facility_level`
--

CREATE TABLE `unhls_facility_level` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unhls_facility_level`
--

INSERT INTO `unhls_facility_level` (`id`, `level`, `created_at`, `updated_at`) VALUES(1, 'Public NRH', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_level` (`id`, `level`, `created_at`, `updated_at`) VALUES(2, 'Public RRH', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_level` (`id`, `level`, `created_at`, `updated_at`) VALUES(3, 'Public GH', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_level` (`id`, `level`, `created_at`, `updated_at`) VALUES(4, 'Public HCIV', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_level` (`id`, `level`, `created_at`, `updated_at`) VALUES(5, 'Public HCIII', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_level` (`id`, `level`, `created_at`, `updated_at`) VALUES(6, 'Private Level 3', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_level` (`id`, `level`, `created_at`, `updated_at`) VALUES(7, 'Private Level 2', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_level` (`id`, `level`, `created_at`, `updated_at`) VALUES(8, 'Private Level 1', '2017-01-25 07:11:51', '2017-01-25 07:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_facility_ownership`
--

CREATE TABLE `unhls_facility_ownership` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unhls_facility_ownership`
--

INSERT INTO `unhls_facility_ownership` (`id`, `owner`, `created_at`, `updated_at`) VALUES(1, 'Public', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_ownership` (`id`, `owner`, `created_at`, `updated_at`) VALUES(2, 'PFP', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_ownership` (`id`, `owner`, `created_at`, `updated_at`) VALUES(3, 'PNFP', '2017-01-25 07:11:51', '2017-01-25 07:11:51');
INSERT INTO `unhls_facility_ownership` (`id`, `owner`, `created_at`, `updated_at`) VALUES(4, 'Other', '2017-01-25 07:11:51', '2017-01-25 07:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `unhls_financial_years`
--

CREATE TABLE `unhls_financial_years` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_rejection_reasons`
--

CREATE TABLE `unhls_rejection_reasons` (
  `id` int(10) UNSIGNED NOT NULL,
  `reason` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_staff`
--

CREATE TABLE `unhls_staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `facility_id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_stockcard`
--

CREATE TABLE `unhls_stockcard` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `facility_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `commodity_id` int(10) UNSIGNED NOT NULL,
  `to_from` int(11) NOT NULL,
  `to_from_type` int(11) NOT NULL,
  `voucher_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `initials` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_stockrequisition`
--

CREATE TABLE `unhls_stockrequisition` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `facility_id` int(10) UNSIGNED NOT NULL,
  `year_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `issued_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voucher_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity_required` int(11) NOT NULL,
  `quantity_issued` int(11) NOT NULL,
  `issue_date` datetime NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unhls_warehouse`
--

CREATE TABLE `unhls_warehouse` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `designation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `facility_id` int(10) UNSIGNED NOT NULL







--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `gender`, `designation`, `image`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `facility_id`) VALUES(1, 'administrator', '$2y$10$1vtYE0/icNCEX34PtY8b8u1tF1Wsqvplf6NPsj6u9HGvxW5GtzMPC', '', 'Administrator', 0, 'Programmer', NULL, '32dDsODStuvJjCluX4jWDPbGQCRrMMFhMHMQWh8gsZxkT7ffxAUoy3D8yMFp', NULL, '2017-01-25 07:11:51', '2017-01-25 07:19:11', 1);
INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `gender`, `designation`, `image`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `facility_id`) VALUES(2, 'jashaba', '$2y$10$uF0xLigPP.xzY7FQjZSFTuiiTC3hXsDMFURlS9DDDXs0OY2ip5sFS', 'j@j.com', 'Justus Ashaba', 0, '', NULL, NULL, NULL, '2017-01-25 07:26:04', '2017-01-25 07:26:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `visit_type` varchar(12) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Out-patient',
  `visit_number` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `patient_id`, `visit_type`, `visit_number`, `created_at`, `updated_at`) VALUES(1, 2, 'Out-patient', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `visits` (`id`, `patient_id`, `visit_type`, `visit_number`, `created_at`, `updated_at`) VALUES(2, 3, 'Out-patient', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `visits` (`id`, `patient_id`, `visit_type`, `visit_number`, `created_at`, `updated_at`) VALUES(3, 5, 'Out-patient', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `visits` (`id`, `patient_id`, `visit_type`, `visit_number`, `created_at`, `updated_at`) VALUES(4, 2, 'Out-patient', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `visits` (`id`, `patient_id`, `visit_type`, `visit_number`, `created_at`, `updated_at`) VALUES(5, 3, 'Out-patient', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `visits` (`id`, `patient_id`, `visit_type`, `visit_number`, `created_at`, `updated_at`) VALUES(6, 5, 'Out-patient', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `visits` (`id`, `patient_id`, `visit_type`, `visit_number`, `created_at`, `updated_at`) VALUES(7, 5, 'Out-patient', NULL, '2017-01-25 07:11:52', '2017-01-25 07:11:52');
INSERT INTO `visits` (`id`, `patient_id`, `visit_type`, `visit_number`, `created_at`, `updated_at`) VALUES(8, 1, 'Out-patient', NULL, '2017-01-25 07:11:53', '2017-01-25 07:11:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned_roles_user_id_foreign` (`user_id`),
  ADD KEY `assigned_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `barcode_settings`
--
ALTER TABLE `barcode_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commodities`
--
ALTER TABLE `commodities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commodities_metric_id_foreign` (`metric_id`);

--
-- Indexes for table `control_measure_ranges`
--
ALTER TABLE `control_measure_ranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_measure_ranges_control_measure_id_foreign` (`control_measure_id`);

--
-- Indexes for table `control_measures`
--
ALTER TABLE `control_measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_measures_control_measure_type_id_foreign` (`control_measure_type_id`),
  ADD KEY `control_measures_control_id_foreign` (`control_id`);

--
-- Indexes for table `control_results`
--
ALTER TABLE `control_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_results_control_test_id_foreign` (`control_test_id`),
  ADD KEY `control_results_control_measure_id_foreign` (`control_measure_id`);

--
-- Indexes for table `control_tests`
--
ALTER TABLE `control_tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_tests_control_id_foreign` (`control_id`),
  ADD KEY `control_tests_entered_by_foreign` (`entered_by`);

--
-- Indexes for table `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `controls_name_unique` (`name`),
  ADD KEY `controls_lot_id_foreign` (`lot_id`);

--
-- Indexes for table `culture_durations`
--
ALTER TABLE `culture_durations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `culture_observations`
--
ALTER TABLE `culture_observations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `culture_observations_user_id_foreign` (`user_id`),
  ADD KEY `culture_observations_culture_id_foreign` (`culture_id`),
  ADD KEY `culture_observations_culture_duration_id_foreign` (`culture_duration_id`);

--
-- Indexes for table `cultures`
--
ALTER TABLE `cultures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cultures_user_id_foreign` (`user_id`),
  ADD KEY `cultures_test_id_foreign` (`test_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_susceptibility`
--
ALTER TABLE `drug_susceptibility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drug_susceptibility_user_id_foreign` (`user_id`),
  ADD KEY `drug_susceptibility_drug_id_foreign` (`drug_id`),
  ADD KEY `drug_susceptibility_isolated_organism_id_foreign` (`isolated_organism_id`),
  ADD KEY `drug_susceptibility_drug_susceptibility_measure_id_foreign` (`drug_susceptibility_measure_id`);

--
-- Indexes for table `drug_susceptibility_measures`
--
ALTER TABLE `drug_susceptibility_measures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drugs_name_unique` (`name`);

--
-- Indexes for table `equip_config`
--
ALTER TABLE `equip_config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equip_config_equip_id_foreign` (`equip_id`),
  ADD KEY `equip_config_prop_id_foreign` (`prop_id`);

--
-- Indexes for table `external_dump`
--
ALTER TABLE `external_dump`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `external_dump_lab_no_unique` (`lab_no`),
  ADD KEY `external_dump_parent_lab_no_index` (`parent_lab_no`);

--
-- Indexes for table `external_users`
--
ALTER TABLE `external_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `external_users_internal_user_id_unique` (`internal_user_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ii_quickcodes`
--
ALTER TABLE `ii_quickcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instrument_testtypes`
--
ALTER TABLE `instrument_testtypes`
  ADD UNIQUE KEY `instrument_testtypes_instrument_id_test_type_id_unique` (`instrument_id`,`test_type_id`),
  ADD KEY `instrument_testtypes_test_type_id_foreign` (`test_type_id`);

--
-- Indexes for table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interfaced_equipment`
--
ALTER TABLE `interfaced_equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interfaced_equipment_lab_section_foreign` (`lab_section`);

--
-- Indexes for table `isolated_organisms`
--
ALTER TABLE `isolated_organisms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `isolated_organisms_user_id_foreign` (`user_id`),
  ADD KEY `isolated_organisms_culture_id_foreign` (`culture_id`),
  ADD KEY `isolated_organisms_organism_id_foreign` (`organism_id`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issues_topup_request_id_foreign` (`topup_request_id`),
  ADD KEY `issues_receipt_id_foreign` (`receipt_id`),
  ADD KEY `issues_issued_to_foreign` (`issued_to`),
  ADD KEY `issues_user_id_foreign` (`user_id`);

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lots_number_unique` (`number`),
  ADD KEY `lots_instrument_id_foreign` (`instrument_id`);

--
-- Indexes for table `measure_ranges`
--
ALTER TABLE `measure_ranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measure_ranges_alphanumeric_index` (`alphanumeric`),
  ADD KEY `measure_ranges_measure_id_foreign` (`measure_id`);

--
-- Indexes for table `measure_types`
--
ALTER TABLE `measure_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `measure_types_name_unique` (`name`);

--
-- Indexes for table `measures`
--
ALTER TABLE `measures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measures_measure_type_id_foreign` (`measure_type_id`);

--
-- Indexes for table `metrics`
--
ALTER TABLE `metrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `microbiology_test_types`
--
ALTER TABLE `microbiology_test_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `microbiology_test_types_test_type_id_foreign` (`test_type_id`);

--
-- Indexes for table `organisms`
--
ALTER TABLE `organisms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organisms_name_unique` (`name`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_external_patient_number_index` (`external_patient_number`),
  ADD KEY `patients_created_by_index` (`created_by`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_commodity_id_foreign` (`commodity_id`),
  ADD KEY `receipts_supplier_id_foreign` (`supplier_id`),
  ADD KEY `receipts_user_id_foreign` (`user_id`);

--
-- Indexes for table `referral_reasons`
--
ALTER TABLE `referral_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referrals_user_id_foreign` (`user_id`),
  ADD KEY `referrals_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `rejection_reasons`
--
ALTER TABLE `rejection_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_diseases`
--
ALTER TABLE `report_diseases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `report_diseases_test_type_id_disease_id_unique` (`test_type_id`,`disease_id`),
  ADD KEY `report_diseases_disease_id_foreign` (`disease_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `specimen_statuses`
--
ALTER TABLE `specimen_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specimen_types`
--
ALTER TABLE `specimen_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specimens`
--
ALTER TABLE `specimens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specimens_accepted_by_index` (`accepted_by`),
  ADD KEY `specimens_rejected_by_index` (`rejected_by`),
  ADD KEY `specimens_specimen_type_id_foreign` (`specimen_type_id`),
  ADD KEY `specimens_specimen_status_id_foreign` (`specimen_status_id`),
  ADD KEY `specimens_rejection_reason_id_foreign` (`rejection_reason_id`),
  ADD KEY `specimens_referral_id_foreign` (`referral_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_categories`
--
ALTER TABLE `test_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_categories_name_unique` (`name`);

--
-- Indexes for table `test_phases`
--
ALTER TABLE `test_phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_results_test_id_measure_id_unique` (`test_id`,`measure_id`),
  ADD KEY `test_results_measure_id_foreign` (`measure_id`);

--
-- Indexes for table `test_statuses`
--
ALTER TABLE `test_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_statuses_test_phase_id_foreign` (`test_phase_id`);

--
-- Indexes for table `test_types`
--
ALTER TABLE `test_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_types_test_category_id_foreign` (`test_category_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_created_by_index` (`created_by`),
  ADD KEY `tests_tested_by_index` (`tested_by`),
  ADD KEY `tests_verified_by_index` (`verified_by`),
  ADD KEY `tests_visit_id_foreign` (`visit_id`),
  ADD KEY `tests_test_type_id_foreign` (`test_type_id`),
  ADD KEY `tests_specimen_id_foreign` (`specimen_id`),
  ADD KEY `tests_test_status_id_foreign` (`test_status_id`);

--
-- Indexes for table `testtype_measures`
--
ALTER TABLE `testtype_measures`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testtype_measures_test_type_id_measure_id_unique` (`test_type_id`,`measure_id`),
  ADD KEY `testtype_measures_measure_id_foreign` (`measure_id`);

--
-- Indexes for table `testtype_specimentypes`
--
ALTER TABLE `testtype_specimentypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testtype_specimentypes_test_type_id_specimen_type_id_unique` (`test_type_id`,`specimen_type_id`),
  ADD KEY `testtype_specimentypes_specimen_type_id_foreign` (`specimen_type_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD KEY `tokens_email_index` (`email`),
  ADD KEY `tokens_token_index` (`token`);

--
-- Indexes for table `topup_requests`
--
ALTER TABLE `topup_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topup_requests_test_category_id_foreign` (`test_category_id`),
  ADD KEY `topup_requests_commodity_id_foreign` (`commodity_id`),
  ADD KEY `topup_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `unhls_bbactions`
--
ALTER TABLE `unhls_bbactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_bbcauses`
--
ALTER TABLE `unhls_bbcauses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_bbincidences`
--
ALTER TABLE `unhls_bbincidences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unhls_bbincidences_facility_id_foreign` (`facility_id`),
  ADD KEY `unhls_bbincidences_createdby_foreign` (`createdby`);

--
-- Indexes for table `unhls_bbincidences_action`
--
ALTER TABLE `unhls_bbincidences_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unhls_bbincidences_action_bbincidence_id_foreign` (`bbincidence_id`),
  ADD KEY `unhls_bbincidences_action_action_id_foreign` (`action_id`);

--
-- Indexes for table `unhls_bbincidences_cause`
--
ALTER TABLE `unhls_bbincidences_cause`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unhls_bbincidences_cause_bbincidence_id_foreign` (`bbincidence_id`),
  ADD KEY `unhls_bbincidences_cause_cause_id_foreign` (`cause_id`);

--
-- Indexes for table `unhls_bbincidences_nature`
--
ALTER TABLE `unhls_bbincidences_nature`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unhls_bbincidences_nature_bbincidence_id_foreign` (`bbincidence_id`),
  ADD KEY `unhls_bbincidences_nature_nature_id_foreign` (`nature_id`);

--
-- Indexes for table `unhls_bbnatures`
--
ALTER TABLE `unhls_bbnatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_districts`
--
ALTER TABLE `unhls_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_drugs`
--
ALTER TABLE `unhls_drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_equipment_suppliers`
--
ALTER TABLE `unhls_equipment_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_facilities`
--
ALTER TABLE `unhls_facilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unhls_facilities_district_id_foreign` (`district_id`),
  ADD KEY `unhls_facilities_level_id_foreign` (`level_id`),
  ADD KEY `unhls_facilities_ownership_id_foreign` (`ownership_id`);

--
-- Indexes for table `unhls_facility_level`
--
ALTER TABLE `unhls_facility_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_facility_ownership`
--
ALTER TABLE `unhls_facility_ownership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_financial_years`
--
ALTER TABLE `unhls_financial_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_rejection_reasons`
--
ALTER TABLE `unhls_rejection_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unhls_staff`
--
ALTER TABLE `unhls_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unhls_staff_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `unhls_stockcard`
--
ALTER TABLE `unhls_stockcard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unhls_stockcard_district_id_foreign` (`district_id`),
  ADD KEY `unhls_stockcard_facility_id_foreign` (`facility_id`),
  ADD KEY `unhls_stockcard_year_id_foreign` (`year_id`),
  ADD KEY `unhls_stockcard_commodity_id_foreign` (`commodity_id`);

--
-- Indexes for table `unhls_stockrequisition`
--
ALTER TABLE `unhls_stockrequisition`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unhls_stockrequisition_district_id_foreign` (`district_id`),
  ADD KEY `unhls_stockrequisition_facility_id_foreign` (`facility_id`),
  ADD KEY `unhls_stockrequisition_year_id_foreign` (`year_id`),
  ADD KEY `unhls_stockrequisition_item_id_foreign` (`item_id`);

--
-- Indexes for table `unhls_warehouse`
--
ALTER TABLE `unhls_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_facility_id_foreign` (`facility_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_visit_number_index` (`visit_number`),
  ADD KEY `visits_patient_id_foreign` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `barcode_settings`
--
ALTER TABLE `barcode_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `commodities`
--
ALTER TABLE `commodities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `control_measure_ranges`
--
ALTER TABLE `control_measure_ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `control_measures`
--
ALTER TABLE `control_measures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `control_results`
--
ALTER TABLE `control_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `control_tests`
--
ALTER TABLE `control_tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `controls`
--
ALTER TABLE `controls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `culture_durations`
--
ALTER TABLE `culture_durations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `culture_observations`
--
ALTER TABLE `culture_observations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cultures`
--
ALTER TABLE `cultures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drug_susceptibility`
--
ALTER TABLE `drug_susceptibility`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `drug_susceptibility_measures`
--
ALTER TABLE `drug_susceptibility_measures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `equip_config`
--
ALTER TABLE `equip_config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `external_dump`
--
ALTER TABLE `external_dump`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `external_users`
--
ALTER TABLE `external_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ii_quickcodes`
--
ALTER TABLE `ii_quickcodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `interfaced_equipment`
--
ALTER TABLE `interfaced_equipment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `isolated_organisms`
--
ALTER TABLE `isolated_organisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `measure_ranges`
--
ALTER TABLE `measure_ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `measures`
--
ALTER TABLE `measures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `metrics`
--
ALTER TABLE `metrics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `microbiology_test_types`
--
ALTER TABLE `microbiology_test_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `organisms`
--
ALTER TABLE `organisms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `referral_reasons`
--
ALTER TABLE `referral_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rejection_reasons`
--
ALTER TABLE `rejection_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `report_diseases`
--
ALTER TABLE `report_diseases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `specimen_types`
--
ALTER TABLE `specimen_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `specimens`
--
ALTER TABLE `specimens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test_categories`
--
ALTER TABLE `test_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `test_types`
--
ALTER TABLE `test_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `testtype_measures`
--
ALTER TABLE `testtype_measures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `testtype_specimentypes`
--
ALTER TABLE `testtype_specimentypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `topup_requests`
--
ALTER TABLE `topup_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unhls_bbactions`
--
ALTER TABLE `unhls_bbactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `unhls_bbcauses`
--
ALTER TABLE `unhls_bbcauses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `unhls_bbincidences`
--
ALTER TABLE `unhls_bbincidences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_bbincidences_action`
--
ALTER TABLE `unhls_bbincidences_action`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_bbincidences_cause`
--
ALTER TABLE `unhls_bbincidences_cause`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_bbincidences_nature`
--
ALTER TABLE `unhls_bbincidences_nature`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_bbnatures`
--
ALTER TABLE `unhls_bbnatures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `unhls_districts`
--
ALTER TABLE `unhls_districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unhls_drugs`
--
ALTER TABLE `unhls_drugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_equipment_suppliers`
--
ALTER TABLE `unhls_equipment_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_facilities`
--
ALTER TABLE `unhls_facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unhls_facility_level`
--
ALTER TABLE `unhls_facility_level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `unhls_facility_ownership`
--
ALTER TABLE `unhls_facility_ownership`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `unhls_financial_years`
--
ALTER TABLE `unhls_financial_years`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_rejection_reasons`
--
ALTER TABLE `unhls_rejection_reasons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_staff`
--
ALTER TABLE `unhls_staff`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_stockcard`
--
ALTER TABLE `unhls_stockcard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_stockrequisition`
--
ALTER TABLE `unhls_stockrequisition`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unhls_warehouse`
--
ALTER TABLE `unhls_warehouse`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
