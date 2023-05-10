<?php

class Login{

  public $errors = [];

  public $messages = [];

  function __construct(){
    session_start();

    // login if exists POST variables
    if(!empty($_POST)) $this->login();

    // logouts if logout query param is set  
    if(isset($_GET['logout'])) $this->logout();

    // show success message after creating a user
    if(isset($_GET['regsuccess'])) $this->messages[] = "Your account has been created successfully";
     
  }

  // check if user is looged in
  public static function userIsLoggedIn(){
    if(isset($_SESSION['user_login']) && $_SESSION['user_login'] === 1){
      return true;
    }else {
      return false;
    }
  }

  // logouts user
  private function logout(){
    session_unset();
  }
  
  // login user
  private function login(){
    // connects to database
    require_once('config/DBConnection.php');
    $newConnection = new DBConnection;
    $conn = $newConnection->conn;
    
    // gets user form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT password from user WHERE username = ?";

    try {
      // prepares, binds variables to the query and executes it.
      $stmt = mysqli_prepare($conn, $query); 
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      
    } catch (mysqli_sql_exception $e) {
      error_log($e->getMessage());
      $this->errors[] = "Ups wsomething went wrong please try again later";
      exit();
    }

    // get results
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if($row) $hash = $row['password'];

    // closes connections
    $stmt->close();
    $conn->close();
    
    // compares hash value with users password
    if(isset($hash) && password_verify($password, $hash)){
      $_SESSION['user_login'] = 1;
    } else {
      $this->errors[] = "Password invalid";
    }

  }
}




