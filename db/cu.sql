-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2025 at 10:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cu`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `username`, `firstname`, `lastname`, `action`, `description`, `created_at`, `timestamp`, `status`) VALUES
(1, 25, 'Ryan Jhon Henor', 'Ryan Jhon', 'Henor', 'Create', 'Reservations: Created new reservation CU-ML6KAO for Gymnasium on 2025-10-24', 1759844216, '2025-10-07 21:36:56', 'active'),
(2, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759851486, '2025-10-07 23:38:06', 'active'),
(3, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759883975, '2025-10-08 08:39:35', 'active'),
(4, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-ML6KAO status to confirmed', 1759883995, '2025-10-08 08:39:55', 'active'),
(5, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-ML6KAO status to completed', 1759884015, '2025-10-08 08:40:15', 'active'),
(6, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759884167, '2025-10-08 08:42:47', 'active'),
(7, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759884440, '2025-10-08 08:47:20', 'active'),
(8, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759906768, '2025-10-08 14:59:28', 'active'),
(9, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Users: Updated permissions for user ID 25', 1759906799, '2025-10-08 14:59:59', 'active'),
(10, 25, 'Ryan Jhon Henor', NULL, NULL, 'Login', 'Auth: User logged in: Ryan Jhon Henor', 1759906880, '2025-10-08 15:01:20', 'active'),
(11, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Users: Updated permissions for user ID 25', 1759906894, '2025-10-08 15:01:34', 'active'),
(12, 25, 'Ryan Jhon Henor', 'Ryan Jhon', 'Henor', 'Create', 'Reservations: Created new reservation CU-27Y1HG for Gymnasium on 2025-10-15', 1759906921, '2025-10-08 15:02:01', 'active'),
(13, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Users: Updated permissions for user ID 25', 1759906936, '2025-10-08 15:02:16', 'active'),
(14, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Users: Updated permissions for user ID 25', 1759906939, '2025-10-08 15:02:19', 'active'),
(15, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Users: Updated permissions for user ID 25', 1759906943, '2025-10-08 15:02:23', 'active'),
(16, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Users: Updated permissions for user ID 25', 1759906972, '2025-10-08 15:02:52', 'active'),
(17, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759907118, '2025-10-08 15:05:18', 'active'),
(18, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-2FWEJP', 1759907148, '2025-10-08 15:05:48', 'active'),
(19, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-2FWEJP', 1759907191, '2025-10-08 15:06:31', 'active'),
(20, 25, 'Ryan Jhon Henor', 'Ryan Jhon', 'Henor', 'Restore', 'Reservations: Restored reservation CU-2FWEJP', 1759907212, '2025-10-08 15:06:52', 'active'),
(21, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-2FWEJP', 1759907242, '2025-10-08 15:07:22', 'active'),
(22, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1759907599, '2025-10-08 15:13:19', 'active'),
(23, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759907938, '2025-10-08 15:18:58', 'active'),
(24, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-7NKNT5', 1759907977, '2025-10-08 15:19:37', 'active'),
(25, 25, 'Ryan Jhon Henor', NULL, NULL, 'Logout', 'Auth: User logged out: Ryan Jhon Henor', 1759908087, '2025-10-08 15:21:27', 'active'),
(26, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759908094, '2025-10-08 15:21:34', 'active'),
(27, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Users: Created new user:  (mmmuu@gmail.com)', 1759908143, '2025-10-08 15:22:23', 'active'),
(28, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1759908789, '2025-10-08 15:33:09', 'active'),
(29, 25, 'Ryan Jhon Henor', NULL, NULL, 'Login', 'Auth: User logged in: Ryan Jhon Henor', 1759908810, '2025-10-08 15:33:30', 'active'),
(30, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759930705, '2025-10-08 21:38:25', 'active'),
(31, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759986100, '2025-10-09 13:01:40', 'active'),
(32, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1759986145, '2025-10-09 13:02:25', 'active'),
(33, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759986769, '2025-10-09 13:12:49', 'active'),
(34, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1759986938, '2025-10-09 13:15:38', 'active'),
(35, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1759987065, '2025-10-09 13:17:45', 'active'),
(36, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760000995, '2025-10-09 17:09:55', 'active'),
(37, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760005196, '2025-10-09 18:19:56', 'active'),
(38, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760059700, '2025-10-10 09:28:20', 'active'),
(39, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1760059931, '2025-10-10 09:32:11', 'active'),
(40, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760059985, '2025-10-10 09:33:05', 'active'),
(41, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760060441, '2025-10-10 09:40:41', 'active'),
(42, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created new reservation CU-P5YLWS for Gymnasium on 2025-10-11', 1760060552, '2025-10-10 09:42:32', 'active'),
(43, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1760060642, '2025-10-10 09:44:02', 'active'),
(44, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760064303, '2025-10-10 10:45:03', 'active'),
(45, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1760065364, '2025-10-10 11:02:44', 'active'),
(46, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760065394, '2025-10-10 11:03:14', 'active'),
(47, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created new reservation CU-HTSCOK for Multi-Purpose Hall on 2025-10-16', 1760065514, '2025-10-10 11:05:14', 'active'),
(48, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-7NKNT5', 1760066944, '2025-10-10 11:29:04', 'active'),
(49, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760085059, '2025-10-10 16:30:59', 'active'),
(50, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760104790, '2025-10-10 21:59:50', 'active'),
(51, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1760108239, '2025-10-10 22:57:19', 'active'),
(52, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760108628, '2025-10-10 23:03:48', 'active'),
(53, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760188933, '2025-10-11 21:22:13', 'active'),
(54, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760189111, '2025-10-11 21:25:11', 'active'),
(55, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760196461, '2025-10-11 23:27:41', 'active'),
(56, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760196574, '2025-10-11 23:29:34', 'active'),
(57, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1760197080, '2025-10-11 23:38:00', 'active'),
(58, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760197088, '2025-10-11 23:38:08', 'active'),
(59, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760243615, '2025-10-12 12:33:35', 'active'),
(60, 1, '', 'Manuel', 'Galleros', 'Endorsed', 'Reservation CU-7NKNT5 was endorsed', 1760252571, '2025-10-12 15:02:51', 'active'),
(61, 1, '', 'Manuel', 'Galleros', 'Rejected', 'Reservation CU-OL2FI1 was rejected. Reason: Time conflcit2', 1760252899, '2025-10-12 15:08:19', 'active'),
(62, 1, '', 'Manuel', 'Galleros', 'Endorsed', 'Reservation CU-KJAI7G was endorsed', 1760253803, '2025-10-12 15:23:23', 'active'),
(63, 1, '', 'Manuel', 'Galleros', 'Endorsed', 'Reservation CU-O3YMVI was endorsed', 1760254002, '2025-10-12 15:26:42', 'active'),
(64, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created new reservation CU-X1IA33 for Gymnasium on 2025-10-15', 1760254642, '2025-10-12 15:37:22', 'active'),
(65, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760273666, '2025-10-12 20:54:26', 'active'),
(66, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1760273685, '2025-10-12 20:54:45', 'active'),
(67, 27, 'Ryan Jhon Henor', NULL, NULL, 'Register', 'Auth: New user registered: Ryan Jhon Henor', 1760273805, '2025-10-12 20:56:45', 'active'),
(68, 27, 'Ryan Jhon Henor', NULL, NULL, 'Login', 'Auth: User logged in: Ryan Jhon Henor', 1760273831, '2025-10-12 20:57:11', 'active'),
(69, 27, 'Ryan Jhon Henor', NULL, NULL, 'Logout', 'Auth: User logged out: Ryan Jhon Henor', 1760274689, '2025-10-12 21:11:29', 'active'),
(70, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: ppfmo@admin.com', 1760274705, '2025-10-12 21:11:45', 'active'),
(71, 28, 'PPFMO Admin', NULL, NULL, 'Register', 'Auth: New user registered: PPFMO Admin', 1760274956, '2025-10-12 21:15:56', 'active'),
(72, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760274992, '2025-10-12 21:16:32', 'active'),
(73, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760275071, '2025-10-12 21:17:51', 'active'),
(74, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: Failed login attempt - Non-PPFMO affiliation: Manuel Galleros (Affiliation: Super Admin)', 1760275352, '2025-10-12 21:22:32', 'active'),
(75, 27, 'Ryan Jhon Henor', NULL, NULL, 'Login', 'Auth: Failed login attempt - Non-PPFMO affiliation: Ryan Jhon Henor (Affiliation: Administrative Member)', 1760275369, '2025-10-12 21:22:49', 'active'),
(76, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760275379, '2025-10-12 21:22:59', 'active'),
(77, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760275393, '2025-10-12 21:23:13', 'active'),
(78, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760275401, '2025-10-12 21:23:21', 'active'),
(79, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1760275408, '2025-10-12 21:23:28', 'active'),
(80, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: Failed login attempt - Non-PPFMO affiliation: Manuel Galleros (Affiliation: Super Admin)', 1760275665, '2025-10-12 21:27:45', 'active'),
(81, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760275672, '2025-10-12 21:27:52', 'active'),
(82, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760275679, '2025-10-12 21:27:59', 'active'),
(83, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760275685, '2025-10-12 21:28:05', 'active'),
(84, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760275690, '2025-10-12 21:28:10', 'active'),
(85, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760275704, '2025-10-12 21:28:24', 'active'),
(86, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760275715, '2025-10-12 21:28:35', 'active'),
(87, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760275837, '2025-10-12 21:30:37', 'active'),
(88, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760276163, '2025-10-12 21:36:03', 'active'),
(89, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760276170, '2025-10-12 21:36:10', 'active'),
(90, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760276206, '2025-10-12 21:36:46', 'active'),
(91, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760276239, '2025-10-12 21:37:19', 'active'),
(92, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760276266, '2025-10-12 21:37:46', 'active'),
(93, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760276288, '2025-10-12 21:38:08', 'active'),
(94, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760276306, '2025-10-12 21:38:26', 'active'),
(95, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: Failed login attempt - Non-PPFMO affiliation: Manuel Galleros (Affiliation: Super Admin)', 1760276843, '2025-10-12 21:47:23', 'active'),
(96, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760276850, '2025-10-12 21:47:30', 'active'),
(97, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: ppfmo@example.com', 1760277324, '2025-10-12 21:55:24', 'active'),
(98, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: admin@admin.com', 1760277330, '2025-10-12 21:55:30', 'active'),
(99, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: admin@admin.com', 1760277337, '2025-10-12 21:55:37', 'active'),
(100, 2, 'PPFMO Admin', NULL, NULL, 'Logout', 'Auth: User logged out: PPFMO Admin', 1760277344, '2025-10-12 21:55:44', 'active'),
(101, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: Failed login attempt - Non-PPFMO affiliation: Manuel Galleros (Affiliation: Super Admin)', 1760277349, '2025-10-12 21:55:49', 'active'),
(102, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: admin@admin.com', 1760277372, '2025-10-12 21:56:12', 'active'),
(103, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: admin@admin.com', 1760277563, '2025-10-12 21:59:23', 'active'),
(104, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760277583, '2025-10-12 21:59:43', 'active'),
(105, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User auto-logged in via remember me: Manuel Galleros', 1760334829, '2025-10-13 13:53:49', 'active'),
(106, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760334831, '2025-10-13 13:53:51', 'active'),
(107, 2, '', 'PPFMO', 'Admin', 'Rejected', 'Reservation CU-X1IA33 was rejected. Reason: MAMMA', 1760334895, '2025-10-13 13:54:55', 'active'),
(108, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created new reservation CU-FOCZNW for University Ground on 2025-10-15', 1760335591, '2025-10-13 14:06:31', 'active'),
(109, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User auto-logged in via remember me: Manuel Galleros', 1760346506, '2025-10-13 17:08:26', 'active'),
(110, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User auto-logged in via remember me: Manuel Galleros', 1760511089, '2025-10-15 14:51:29', 'active'),
(111, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: Failed login attempt - Non-PPFMO affiliation: Manuel Galleros (Affiliation: Admin)', 1760511171, '2025-10-15 14:52:51', 'active'),
(112, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760511185, '2025-10-15 14:53:05', 'active'),
(113, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760511198, '2025-10-15 14:53:18', 'active'),
(114, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: Failed login attempt - Non-PPFMO affiliation: Manuel Galleros (Affiliation: Admin)', 1760511460, '2025-10-15 14:57:40', 'active'),
(115, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760511679, '2025-10-15 15:01:19', 'active'),
(116, 1, 'Manuel Galleros', NULL, NULL, 'Logout', 'Auth: User logged out: Manuel Galleros', 1760512077, '2025-10-15 15:07:57', 'active'),
(117, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760512194, '2025-10-15 15:09:54', 'active'),
(118, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760513344, '2025-10-15 15:29:04', 'active'),
(119, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-FOCZNW was endorsed', 1760513349, '2025-10-15 15:29:09', 'active'),
(120, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User auto-logged in (Remember Me): PPFMO Admin', 1760513971, '2025-10-15 15:39:31', 'active'),
(121, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760531690, '2025-10-15 20:34:50', 'active'),
(122, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760531885, '2025-10-15 20:38:05', 'active'),
(123, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760532563, '2025-10-15 20:49:23', 'active'),
(124, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760532863, '2025-10-15 20:54:23', 'active'),
(125, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760533340, '2025-10-15 21:02:20', 'active'),
(126, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760540710, '2025-10-15 23:05:10', 'active'),
(127, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760540803, '2025-10-15 23:06:43', 'active'),
(128, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created reservation CU-R67IAY for Gymnasium on 2025-10-19 (08:00 AM - 09:00 AM)', 1760545584, '2025-10-16 00:26:24', 'active'),
(129, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created reservation CU-VHU188 for Gymnasium on 2025-10-20 (12:00 PM - 01:00 PM)', 1760545584, '2025-10-16 00:26:24', 'active'),
(130, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: ppfmo@example.com', 1760549006, '2025-10-16 01:23:26', 'active'),
(131, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760549033, '2025-10-16 01:23:53', 'active'),
(132, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created new reservation CU-HQ8WI7 for Multi-Purpose Hall on 2025-10-16', 1760549541, '2025-10-16 01:32:21', 'active'),
(133, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760573609, '2025-10-16 08:13:29', 'active'),
(134, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760573738, '2025-10-16 08:15:38', 'active'),
(135, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760573846, '2025-10-16 08:17:26', 'active'),
(136, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-HQ8WI7 was endorsed', 1760573925, '2025-10-16 08:18:45', 'active'),
(137, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-R67IAY was endorsed', 1760575101, '2025-10-16 08:38:21', 'active'),
(138, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-VHU188 was endorsed', 1760575128, '2025-10-16 08:38:48', 'active'),
(139, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to pending', 1760575180, '2025-10-16 08:39:40', 'active'),
(140, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-R67IAY status to pending', 1760575383, '2025-10-16 08:43:03', 'active'),
(141, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-VHU188 status to pending', 1760575393, '2025-10-16 08:43:13', 'active'),
(142, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to confirmed', 1760575782, '2025-10-16 08:49:42', 'active'),
(143, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to pending', 1760575795, '2025-10-16 08:49:55', 'active'),
(144, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-HQ8WI7 was endorsed', 1760575805, '2025-10-16 08:50:05', 'active'),
(145, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-R67IAY was endorsed', 1760575948, '2025-10-16 08:52:28', 'active'),
(146, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to pending', 1760575981, '2025-10-16 08:53:01', 'active'),
(147, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-R67IAY status to pending', 1760575995, '2025-10-16 08:53:15', 'active'),
(148, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-HQ8WI7 was endorsed', 1760576283, '2025-10-16 08:58:03', 'active'),
(149, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-R67IAY was endorsed', 1760576283, '2025-10-16 08:58:03', 'active'),
(150, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-VHU188 was endorsed', 1760576291, '2025-10-16 08:58:11', 'active'),
(151, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to pending', 1760576306, '2025-10-16 08:58:26', 'active'),
(152, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-R67IAY status to pending', 1760576316, '2025-10-16 08:58:36', 'active'),
(153, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-VHU188 status to pending', 1760576324, '2025-10-16 08:58:44', 'active'),
(154, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-HQ8WI7 was endorsed', 1760576340, '2025-10-16 08:59:00', 'active'),
(155, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to pending', 1760576439, '2025-10-16 09:00:39', 'active'),
(156, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-HQ8WI7 was endorsed', 1760576449, '2025-10-16 09:00:49', 'active'),
(157, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to pending', 1760576682, '2025-10-16 09:04:42', 'active'),
(158, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-HQ8WI7 was endorsed', 1760576696, '2025-10-16 09:04:56', 'active'),
(159, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-HQ8WI7', 1760576751, '2025-10-16 09:05:51', 'active'),
(160, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-HQ8WI7', 1760576991, '2025-10-16 09:09:51', 'active'),
(161, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-HQ8WI7', 1760576999, '2025-10-16 09:09:59', 'active'),
(162, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-HQ8WI7', 1760577005, '2025-10-16 09:10:05', 'active'),
(163, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-HQ8WI7', 1760577228, '2025-10-16 09:13:48', 'active'),
(164, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-R67IAY', 1760577228, '2025-10-16 09:13:48', 'active'),
(165, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-HQ8WI7', 1760577234, '2025-10-16 09:13:54', 'active'),
(166, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-R67IAY', 1760577234, '2025-10-16 09:13:54', 'active'),
(167, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-HQ8WI7', 1760577273, '2025-10-16 09:14:33', 'active'),
(168, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-R67IAY', 1760577273, '2025-10-16 09:14:33', 'active'),
(169, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Archive', 'Reservations: Archived reservation CU-VHU188', 1760577273, '2025-10-16 09:14:33', 'active'),
(170, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-HQ8WI7', 1760577278, '2025-10-16 09:14:38', 'active'),
(171, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-R67IAY', 1760577278, '2025-10-16 09:14:38', 'active'),
(172, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Restore', 'Reservations: Restored reservation CU-VHU188', 1760577278, '2025-10-16 09:14:38', 'active'),
(173, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-R67IAY status to confirmed', 1760581095, '2025-10-16 10:18:15', 'active'),
(174, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-R67IAY status to pending', 1760581116, '2025-10-16 10:18:36', 'active'),
(175, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to completed', 1760581181, '2025-10-16 10:19:41', 'active'),
(176, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to confirmed', 1760581293, '2025-10-16 10:21:33', 'active'),
(177, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-R67IAY status to confirmed', 1760581306, '2025-10-16 10:21:46', 'active'),
(178, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760583642, '2025-10-16 11:00:42', 'active'),
(179, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User auto-logged in (Remember Me): PPFMO Admin', 1760583954, '2025-10-16 11:05:54', 'active'),
(180, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-VHU188 was endorsed', 1760583958, '2025-10-16 11:05:58', 'active'),
(181, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-VHU188 status to pending', 1760586133, '2025-10-16 11:42:13', 'active'),
(182, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-VHU188 status to confirmed', 1760586156, '2025-10-16 11:42:36', 'active'),
(183, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-VHU188 status to completed', 1760586193, '2025-10-16 11:43:13', 'active'),
(184, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to cancelled', 1760586222, '2025-10-16 11:43:42', 'active'),
(185, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-HQ8WI7 status to pending', 1760586236, '2025-10-16 11:43:56', 'active'),
(186, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760589133, '2025-10-16 12:32:13', 'active'),
(187, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created new reservation CU-I4486B for University Ground on 2025-10-31', 1760590443, '2025-10-16 12:54:03', 'active'),
(188, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created new reservation CU-2GJGK2 for Gymnasium on 2025-10-16', 1760591082, '2025-10-16 13:04:42', 'active'),
(189, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-R67IAY status to pending', 1760591343, '2025-10-16 13:09:03', 'active'),
(190, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-2GJGK2 status to confirmed', 1760591388, '2025-10-16 13:09:48', 'active'),
(191, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-I4486B status to confirmed', 1760591412, '2025-10-16 13:10:12', 'active'),
(192, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760621582, '2025-10-16 21:33:02', 'active'),
(193, 29, 'Mel Dita', NULL, NULL, 'Register', 'Auth: New user registered: Mel Dita', 1760621765, '2025-10-16 21:36:05', 'active'),
(194, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: melodyvbaclayo@gmail.com', 1760621786, '2025-10-16 21:36:26', 'active'),
(195, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: melodyvbaclayo@gmail.com', 1760621800, '2025-10-16 21:36:40', 'active'),
(196, 30, 'Mel Dita', NULL, NULL, 'Register', 'Auth: New user registered: Mel Dita', 1760621959, '2025-10-16 21:39:19', 'active'),
(197, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: baclayo.melody@g.cu.edu.ph', 1760621978, '2025-10-16 21:39:38', 'active'),
(198, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: baclayo.melody@g.cu.edu.ph', 1760622001, '2025-10-16 21:40:01', 'active'),
(199, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760622159, '2025-10-16 21:42:39', 'active'),
(200, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760622224, '2025-10-16 21:43:44', 'active'),
(201, 1, 'Manuel Galleros', NULL, NULL, 'Login', 'Auth: User logged in: Manuel Galleros', 1760622361, '2025-10-16 21:46:01', 'active'),
(202, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created reservation CU-UUM7Q4 for Classrooms on 2025-10-17 (04:00 PM - 05:00 PM)', 1760623565, '2025-10-16 22:06:05', 'active'),
(203, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Create', 'Reservations: Created reservation CU-GY4P3S for Classrooms on 2025-10-18 (04:00 PM - 05:00 PM)', 1760623565, '2025-10-16 22:06:05', 'active'),
(204, 0, 'Unknown', NULL, NULL, 'Login', 'Auth: Failed login attempt for email: ppfmo@example.com', 1760624728, '2025-10-16 22:25:28', 'active'),
(205, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760624750, '2025-10-16 22:25:50', 'active'),
(206, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-GY4P3S was endorsed', 1760624777, '2025-10-16 22:26:17', 'active'),
(207, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-UUM7Q4 was endorsed', 1760624798, '2025-10-16 22:26:38', 'active'),
(208, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-HQ8WI7 was endorsed', 1760624798, '2025-10-16 22:26:38', 'active'),
(209, 2, '', 'PPFMO', 'Admin', 'Endorsed', 'Reservation CU-R67IAY was endorsed', 1760624798, '2025-10-16 22:26:38', 'active'),
(210, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760625445, '2025-10-16 22:37:25', 'active'),
(211, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-GY4P3S status to pending', 1760625498, '2025-10-16 22:38:18', 'active'),
(212, 1, 'Manuel Galleros', 'Manuel', 'Galleros', 'Update', 'Reservations: Updated reservation CU-UUM7Q4 status to pending', 1760625550, '2025-10-16 22:39:10', 'active'),
(213, 2, 'PPFMO Admin', NULL, NULL, 'Login', 'Auth: User logged in: PPFMO Admin', 1760625819, '2025-10-16 22:43:39', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'Administrator', 'a:41:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:11:\"createStore\";i:17;s:11:\"updateStore\";i:18;s:9:\"viewStore\";i:19;s:11:\"deleteStore\";i:20;s:15:\"createAttribute\";i:21;s:15:\"updateAttribute\";i:22;s:13:\"viewAttribute\";i:23;s:15:\"deleteAttribute\";i:24;s:13:\"createProduct\";i:25;s:13:\"updateProduct\";i:26;s:11:\"viewProduct\";i:27;s:13:\"deleteProduct\";i:28;s:15:\"createPurchases\";i:29;s:15:\"updatePurchases\";i:30;s:13:\"viewPurchases\";i:31;s:15:\"deletePurchases\";i:32;s:11:\"createOrder\";i:33;s:11:\"updateOrder\";i:34;s:9:\"viewOrder\";i:35;s:11:\"deleteOrder\";i:36;s:11:\"viewReports\";i:37;s:13:\"updateCompany\";i:38;s:11:\"viewProfile\";i:39;s:13:\"updateSetting\";i:40;s:7:\"viewLog\";}'),
(2, 'Admin', 'a:28:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:11:\"createGroup\";i:5;s:11:\"updateGroup\";i:6;s:9:\"viewGroup\";i:7;s:11:\"deleteGroup\";i:8;s:11:\"createBrand\";i:9;s:11:\"updateBrand\";i:10;s:9:\"viewBrand\";i:11;s:11:\"deleteBrand\";i:12;s:14:\"createCategory\";i:13;s:14:\"updateCategory\";i:14;s:12:\"viewCategory\";i:15;s:14:\"deleteCategory\";i:16;s:13:\"createProduct\";i:17;s:13:\"updateProduct\";i:18;s:11:\"viewProduct\";i:19;s:13:\"deleteProduct\";i:20;s:11:\"createOrder\";i:21;s:11:\"updateOrder\";i:22;s:9:\"viewOrder\";i:23;s:11:\"deleteOrder\";i:24;s:11:\"viewReports\";i:25;s:11:\"viewProfile\";i:26;s:7:\"viewLog\";i:27;s:13:\"updateSetting\";}'),
(3, 'Cashier', 'a:6:{i:0;s:11:\"viewProduct\";i:1;s:11:\"createOrder\";i:2;s:11:\"updateOrder\";i:3;s:9:\"viewOrder\";i:4;s:11:\"deleteOrder\";i:5;s:11:\"viewProfile\";}'),
(26, 'Manager', 'a:10:{i:0;s:13:\"createProduct\";i:1;s:13:\"updateProduct\";i:2;s:11:\"viewProduct\";i:3;s:13:\"deleteProduct\";i:4;s:11:\"createOrder\";i:5;s:11:\"updateOrder\";i:6;s:9:\"viewOrder\";i:7;s:11:\"deleteOrder\";i:8;s:11:\"viewReports\";i:9;s:11:\"viewProfile\";}'),
(33, 'Custom-25', 'a:1:{i:0;s:7:\"approve\";}');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` varchar(20) NOT NULL,
  `facility_name` varchar(100) NOT NULL,
  `facility_capacity` int(11) NOT NULL,
  `facility_rate` decimal(10,2) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` varchar(50) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `duration` int(11) NOT NULL DEFAULT 1,
  `contact_name` varchar(100) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `event_purpose` text NOT NULL,
  `expected_attendees` int(11) DEFAULT NULL,
  `special_requirements` text DEFAULT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','endorsed','rejected','cancelled','completed','archived') NOT NULL DEFAULT 'pending',
  `rejection_reason` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `facility_name`, `facility_capacity`, `facility_rate`, `reservation_date`, `reservation_time`, `time_start`, `time_end`, `duration`, `contact_name`, `contact_phone`, `contact_email`, `organization`, `event_purpose`, `expected_attendees`, `special_requirements`, `total_cost`, `status`, `rejection_reason`, `created_by`, `created_at`, `updated_at`) VALUES
('CU-2GJGK2', 'Gymnasium', 500, 6830.00, '2025-10-16', '08:00 AM - 09:00 AM', '08:00:00', '09:00:00', 1, 'Wel Mann', '09182903782', 'manuelgalleros@gmail.com', 'CS', 'General Orientation', 250, '', 6830.00, 'confirmed', NULL, 1, '2025-10-16 05:04:42', '2025-10-16 05:09:48'),
('CU-GY4P3S', 'Classrooms', 50, 60.00, '2025-10-18', '04:00 PM - 05:00 PM', '16:00:00', '17:00:00', 1, 'MelDita', '09754803848', 'baclayo.melody@g.cu.edu.ph', 'CU-COHS', 'General Assembly', 1000, 'LED Wall, Submeter for Photobooth', 60.00, 'pending', NULL, 1, '2025-10-16 14:06:05', '2025-10-16 14:38:18'),
('CU-HQ8WI7', 'Multi-Purpose Hall', 200, 4500.00, '2025-10-16', '08:00 AM - 09:00 AM', '08:00:00', '09:00:00', 1, 'Renz Castan', '09182904893', 'renzcastan@sent.com', 'CAS', 'For meeting', 50, '', 4500.00, 'endorsed', NULL, 1, '2025-10-15 17:32:21', '2025-10-16 14:26:38'),
('CU-I4486B', 'University Ground', 350, 500.00, '2025-10-31', '03:00 PM - 04:00 PM', '15:00:00', '16:00:00', 1, 'Josh Galleros', '09162839043', 'joshgalleros@icloud.com', 'COHS', 'For event', 100, '', 500.00, 'confirmed', NULL, 1, '2025-10-16 04:54:03', '2025-10-16 05:10:12'),
('CU-R67IAY', 'Gymnasium', 500, 6830.00, '2025-10-19', '08:00 AM - 09:00 AM', '08:00:00', '09:00:00', 1, 'Ryan Jhon Henor', '09182948392', 'ryanjhonhenor@mailas.com', 'College of Computer Studies', 'For seminar', 100, 'Projector, microphone', 6830.00, 'endorsed', NULL, 1, '2025-10-15 16:26:24', '2025-10-16 14:26:38'),
('CU-UUM7Q4', 'Classrooms', 50, 60.00, '2025-10-17', '04:00 PM - 05:00 PM', '16:00:00', '17:00:00', 1, 'MelDita', '09754803848', 'baclayo.melody@g.cu.edu.ph', 'CU-COHS', 'General Assembly', 1000, 'LED Wall, Submeter for Photobooth', 60.00, 'pending', NULL, 1, '2025-10-16 14:06:05', '2025-10-16 14:39:10'),
('CU-VHU188', 'Gymnasium', 500, 6830.00, '2025-10-20', '12:00 PM - 01:00 PM', '12:00:00', '13:00:00', 1, 'Ryan Jhon Henor', '09182948392', 'ryanjhonhenor@mailas.com', 'College of Computer Studies', 'For seminar', 100, 'Projector, microphone', 6830.00, 'completed', NULL, 1, '2025-10-15 16:26:24', '2025-10-16 03:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `remember_token_expiry` datetime DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `affiliation` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `remember_token`, `remember_token_expiry`, `email`, `firstname`, `lastname`, `mobile_number`, `affiliation`, `profile_image`) VALUES
(1, '$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK', '1a8c02ad82ffef79ffeda5ab23678a2fb7f52acfaa393460528d8811a1847600', '2025-11-15 21:46:01', 'admin@admin.com', 'Manuel', 'Galleros', '3429038493', 'Admin', 'default.jpg'),
(2, '$2y$10$ctG7L0HrmHIwJiP/vf7w1OsapVi/OVEMHBM/P06dasNHR5EJBb.vK', NULL, NULL, 'ppfmo@example.com', 'PPFMO', 'Admin', '9764189724', 'PPFMO', 'default.jpg'),
(27, '$2y$10$u8unhLTGLD0bkJ74taGmC.xd.SZZLnoxZ4./b6sQUWjSsuO2NmSG.', NULL, NULL, 'ryanjhonhenor@mailas.com', 'Ryan Jhon', 'Henor', '3436740974', 'Administrative Member', 'default.jpg'),
(29, '$2y$10$66PlWhjEB0tnflU8/jUGhuenjk18GLfnn004dszPYEXOhtSKArmWm', NULL, NULL, 'melodyvbaclayo@gmail.com', 'Mel', 'Dita', '9754803848', 'Administrative Member', 'default.jpg'),
(30, '$2y$10$uyGdSxollgTT0cw.ve2EiOlkcxZPHXJQA7/a7WJbvbfbGIVa34wCK', NULL, NULL, 'baclayo.melody@g.cu.edu.ph', 'Mel', 'Dita', '9754803848', 'Administrative Member', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_names` (`firstname`,`lastname`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facility_name` (`facility_name`),
  ADD KEY `reservation_date` (`reservation_date`),
  ADD KEY `status` (`status`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_remember_token` (`remember_token`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_group_user` (`user_id`),
  ADD KEY `fk_user_group_group` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `fk_reservations_created_by` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `fk_user_group_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_group_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
