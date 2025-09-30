-- Rate Limiting Setup for Production
-- Run this SQL directly on your production database

-- First, check if the contact_attempts table exists, if not create it
CREATE TABLE IF NOT EXISTS `contact_attempts` (
    `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Add rate limiting columns if they don't exist
ALTER TABLE `contact_attempts` 
ADD COLUMN IF NOT EXISTS `ip_address` varchar(255) DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `email` varchar(255) DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `user_agent` text DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `last_attempt_at` timestamp NULL DEFAULT NULL,
ADD COLUMN IF NOT EXISTS `attempt_count` int(11) NOT NULL DEFAULT 0,
ADD COLUMN IF NOT EXISTS `blocked_until` timestamp NULL DEFAULT NULL;

-- Add indexes for better performance
CREATE INDEX IF NOT EXISTS `idx_contact_attempts_ip_address` ON `contact_attempts` (`ip_address`);
CREATE INDEX IF NOT EXISTS `idx_contact_attempts_blocked_until` ON `contact_attempts` (`blocked_until`);
CREATE INDEX IF NOT EXISTS `idx_contact_attempts_last_attempt` ON `contact_attempts` (`last_attempt_at`);