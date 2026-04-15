CREATE DATABASE IF NOT EXISTS school;
USE school;

CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    account_type ENUM('admin', 'staff', 'teacher', 'student') NOT NULL DEFAULT 'student',
    created_on DATETIME NOT NULL,
    created_by INT NULL,
    updated_on DATETIME NULL,
    updated_by INT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS subject (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL,
    title VARCHAR(200) NOT NULL,
    unit INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS program (
    program_id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20) NOT NULL,
    title VARCHAR(200) NOT NULL,
    years INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user (id, username, password, account_type, created_on, created_by) VALUES
(1, 'gab', '$2y$10$.JIqLkFJNIbFggBNd8y9JeN4uwhwEFPMlMWPKUgRhAXB5m/C1x892', 'admin', NOW(), 1);

INSERT INTO subject (code, title, unit) VALUES
('CS101', 'Introduction to Programming', 3),
('MATH101', 'College Algebra', 3),
('ENG101', 'English Communication', 3);

INSERT INTO program (code, title, years) VALUES
('BSCS', 'Bachelor of Science in Computer Science', 4),
('BSIT', 'Bachelor of Science in Information Technology', 4),
('BSA', 'Bachelor of Science in Accountancy', 4);
