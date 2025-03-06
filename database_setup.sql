-- Database creation
CREATE DATABASE competition_db;

-- Use the newly created database
USE competition_db;

-- Table for event participants
CREATE TABLE participants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15),
    event VARCHAR(100) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample data insertion
INSERT INTO participants (name, email, phone, event) VALUES
('John Doe', 'john.doe@example.com', '1234567890', 'Coding Contest'),
('Jane Smith', 'jane.smith@example.com', '0987654321', 'Hackathon');
