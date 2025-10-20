-- Create deleted_reservations table to store permanently deleted reservations
-- This table mirrors the structure of the reservations table with additional deletion metadata

CREATE TABLE IF NOT EXISTS `deleted_reservations` (
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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  INDEX `idx_deleted_by` (`deleted_by`),
  INDEX `idx_deleted_at` (`deleted_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

