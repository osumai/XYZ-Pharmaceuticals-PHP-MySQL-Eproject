-- show the MariaDB/MySql version
select version();

-- Create the Employee Database
Create database if not exists XYZ_Pharmacy;
-- Display the existing databases in the server
show databases;

-- Switch to the employee database
use XYZ_Pharmacy;

-- Create the admin table-- Table structure for table 'candidates'
CREATE TABLE IF NOT EXISTS candidates (
    id INT(5) NOT NULL AUTO_INCREMENT COMMENT 'The ID that identifies each candidate',
    email VARCHAR(255) NOT NULL COMMENT 'Candidate\'s email',
    password VARCHAR(255) NOT NULL COMMENT 'Candidate\'s password',
    fullname VARCHAR(255) NOT NULL COMMENT 'Candidate\'s full name',
    PRIMARY KEY (id)
) ENGINE=InnoDB COMMENT 'Table that stores candidate information';

-- Add columns for additional candidate details
ALTER TABLE CANDIDATES
    ADD ADDRESS VARCHAR(20) COMMENT 'Candidate\'s address',
    ADD UNIVERSITY VARCHAR(25) COMMENT 'University attended by the candidate',
    ADD DEGREE VARCHAR(25) COMMENT 'Degree obtained by the candidate',
    ADD RESUME VARCHAR(255) COMMENT 'File path or name of the uploaded resume';

-- View the candidates table
 describe CANDIDATES;
 
 -- Table structure for job_listings
CREATE TABLE job_listings (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  location VARCHAR(100) NOT NULL
);
-- View the listings table
 describe job_listings;

-- Table structure for table 'admin_details'
CREATE TABLE IF NOT EXISTS admin_details (
    id INT(5) NOT NULL AUTO_INCREMENT COMMENT 'The ID that identifies each admin',
    username VARCHAR(255) NOT NULL COMMENT 'Admin\'s username',
    email VARCHAR(255) NOT NULL COMMENT 'Admin\'s email',
    password VARCHAR(255) NOT NULL COMMENT 'Admin\'s password',
    fullname VARCHAR(255) NOT NULL COMMENT 'Admin\'s full name',
    PRIMARY KEY (id)
) ENGINE=InnoDB COMMENT 'Table that stores admin information';

-- View the admin details table
 describe ADMIN_DETAILS;

-- Create the site details table
CREATE TABLE IF NOT EXISTS SITE_DETAILS (
    SITE_ID INT(3) NOT NULL AUTO_INCREMENT,
    COMPANY_NAME VARCHAR(50) NOT NULL,
    DESCRIPTION TEXT,
    ADDRESS VARCHAR(100),
    CONTACT_EMAIL VARCHAR(50),
    CONTACT_PHONE VARCHAR(20),
    PRIMARY KEY (SITE_ID)
) ENGINE=InnoDB;

-- View the site details table
 describe SITE_DETAILS;
 
 -- Create the job seeker table
 CREATE TABLE IF NOT EXISTS JOB_SEEKER_DETAILS (
    CANDIDATE_ID INT(5) NOT NULL AUTO_INCREMENT,
    FULL_NAME VARCHAR(50) NOT NULL,
    COMPANY_NAME VARCHAR(50),
    ADDRESS VARCHAR(100),
    CITY VARCHAR(50),
    STATE VARCHAR(50),
    POSTAL_CODE VARCHAR(20),
    COUNTRY VARCHAR(50),
    EMAIL VARCHAR(50) NOT NULL,
    PHONE VARCHAR(20),
    COMMENTS TEXT,
    PRIMARY KEY (CANDIDATE_ID)
) ENGINE=InnoDB;
-- View the job seeker details table
 describe JOB_SEEKER_DETAILS;


-- Create the quote requests table
CREATE TABLE IF NOT EXISTS quote_requests (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    company_name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    postal_code VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    comments TEXT
) ENGINE=InnoDB;

-- View the quote requests table
 describe quote_requests;


