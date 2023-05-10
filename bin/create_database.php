<?php

/**
 * Change configuration in config/config.php then execute this file from the command line top build the database and tables
 */

include_once(__DIR__ . '/../config/config.php');

// Create connection
$conn = new mysqli(APP_DB_HOST, APP_DB_USER, APP_DB_PASS);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE " . APP_DB_NAME;
if ($conn->query($sql) === FALSE) {
  die("Error creating database: " . $conn->error) ;
}


// Create table user
$sql = "CREATE TABLE ".APP_DB_NAME.".user (
  id INT PRIMARY KEY AUTO_INCREMENT ,
  username VARCHAR(200) UNIQUE NOT NULL,
  password VARCHAR(100) NOT NULL,
  updatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );";
  
if ($conn->query($sql) === TRUE) {
  echo "Table  " . APP_DB_NAME . " created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();