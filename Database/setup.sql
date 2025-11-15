-- Complete Database Setup for Coming Soon Page
-- Run this file to create all necessary tables

-- Create countdown table
CREATE TABLE IF NOT EXISTS countdown (
    id INT AUTO_INCREMENT PRIMARY KEY,
    end_time BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create subscribers table for email notifications
CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notified BOOLEAN DEFAULT FALSE,
    INDEX idx_email (email),
    INDEX idx_subscribed_at (subscribed_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional: Insert initial countdown data (60 hours from now in milliseconds)
-- You can uncomment the line below or let the application set it automatically
-- INSERT INTO countdown (id, end_time) VALUES (1, UNIX_TIMESTAMP() * 1000 + (60 * 60 * 60 * 1000)) ON DUPLICATE KEY UPDATE end_time = VALUES(end_time);

-- Display tables
SHOW TABLES;
