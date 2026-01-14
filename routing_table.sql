CREATE DATABASE fog_security;
USE fog_security;

CREATE TABLE ant_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    node_mac VARCHAR(255) NOT NULL,
    mac_hash VARCHAR(255) NOT NULL,
    status ENUM('Trusted','Banned','Pending') DEFAULT 'Pending'
);

CREATE TABLE routing_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255) NOT NULL,
    session_state JSON,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
