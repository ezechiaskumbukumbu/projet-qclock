-- images/db/init/01_schema.sql
CREATE DATABASE IF NOT EXISTS qclock_db;
USE qclock_db;

CREATE TABLE IF NOT EXISTS access_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    access_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    action_type VARCHAR(50),
    status ENUM('SUCCESS', 'FAILED') DEFAULT 'SUCCESS'
);

-- Données pour Donald MBASSA
INSERT INTO access_logs (username, action_type, status) 
VALUES ('dmbassa', 'DASHBOARD_VIEW', 'SUCCESS'),
       ('ekumbu', 'SYSTEM_INIT', 'SUCCESS');