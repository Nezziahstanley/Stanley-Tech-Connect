-- ========================================
-- STANLEY TECH CONNECT - DATABASE
-- Complete with Profile Fields & Default Users
-- ========================================

DROP DATABASE IF EXISTS stc_db;
CREATE DATABASE stc_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE stc_db;

-- ========================================
-- USERS TABLE (with profile fields)
-- ========================================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    avatar VARCHAR(255) DEFAULT NULL,
    phone VARCHAR(20) NOT NULL,
    bio TEXT DEFAULT NULL,
    location VARCHAR(100) DEFAULT NULL,
    website VARCHAR(255) DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ========================================
-- COURSES TABLE
-- ========================================
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    level ENUM('Beginner', 'Intermediate', 'Advanced') DEFAULT 'Beginner',
    duration VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) DEFAULT 0.00,
    icon VARCHAR(50) DEFAULT '📚',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ========================================
-- ENROLLMENTS TABLE
-- ========================================
CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE,
    UNIQUE KEY unique_enrollment (user_id, course_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ========================================
-- MESSAGES TABLE
-- ========================================
CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ========================================
-- DEFAULT USERS
-- admin@stc.com  → admin123
-- user@stc.com   → user123
-- ========================================
INSERT INTO users (name, email, phone, password, role, bio, location) VALUES
('Stanley Admin', 'admin@stc.com', '07041145338', '$2y$10$eNLQOvfLdkq4pPyPz9.TCeWL.BXXm8rnxkb5o8mP72Y7n9/hru/lW', 'admin', 'Founder & Lead Instructor at Stanley Tech Connect.', 'Lagos, Nigeria'),
('Test User', 'user@stc.com', '08012345678', '$2y$10$BNcFp7YX40QiKXdAE0BaaOEYKdipBjMCdT2PNwlWWGEz6f.bvo2pi', 'user', 'Aspiring full-stack developer.', 'Abuja, Nigeria');

-- ========================================
-- COURSES DATA
-- ========================================
INSERT INTO courses (title, description, level, duration, icon) VALUES
('30-Day Website Building', 'Complete guide to building websites with HTML, CSS, JavaScript, PHP, and MySQL.', 'Beginner', '30 Days', '📚'),
('JavaScript Mastery', 'Deep dive into JavaScript for building interactive web applications.', 'Intermediate', '20 Days', '⚡'),
('PHP & MySQL', 'Build dynamic websites with server-side programming and databases.', 'Intermediate', '25 Days', '🗄️'),
('Full-Stack Development', 'Complete full-stack development with modern frameworks and best practices.', 'Advanced', '40 Days', '⚛️'),
('React.js Development', 'Build modern user interfaces with React.js and its ecosystem.', 'Intermediate', '30 Days', '🔄'),
('Introduction to Programming', 'Learn programming fundamentals and logical thinking for beginners.', 'Beginner', '15 Days', '🐍');