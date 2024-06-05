CREATE DATABASE job_application;

USE job_application;

CREATE TABLE applications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(255) NOT NULL,
  gender VARCHAR(50) NOT NULL,
  position VARCHAR(255) NOT NULL,
  work_experience VARCHAR(50) NOT NULL,
  job_type VARCHAR(50) NOT NULL,
  cover_letter TEXT NOT NULL,
  resume VARCHAR(255) NOT NULL,
  terms_accepted TINYINT(1) NOT NULL
);
