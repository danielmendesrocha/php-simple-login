<?php

/**
 * Creates a new connection to the database
 */
class DBConnection{

  public $conn;

  function __construct(){

    include_once('config.php');

    // Disable displaying warnings to the users. Enable in production
    // ini_set('display_errors', '0');
    
    // new db connection
    $this->conn = new mysqli(APP_DB_HOST, APP_DB_USER, APP_DB_PASS, APP_DB_NAME);

    // Handle the error
    if ($this->conn->connect_errno) {
      // log error
      error_log("errono: " . $this->conn->connect_errno . " " . $this->conn->connect_error);
      die("An error occurred while connecting to the database. Please try again later.");
    }

  }
}



