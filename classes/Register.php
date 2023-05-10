<?php

class Register{
  public $errors = [];

  public function __construct(){
    if(!empty($_POST)) $this->register();
  }

  private function register(){

    require_once('config/DBConnection.php');
    // gets datbase connection
    $newConnection = new DBConnection;
    $conn = $newConnection->conn;
    // gets data
    $username = strip_tags($_POST['username'], ENT_QUOTES);
    $password = password_hash(strip_tags($_POST['password'], ENT_QUOTES), PASSWORD_BCRYPT);
    
    $query = "INSERT INTO user(username, password) VALUES( ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    // checks if prepare statement was successfull
    if($stmt)
    {
      // binds variables to statement
      mysqli_stmt_bind_param($stmt, 'ss', $username, $password);

      // executes statement
      if(mysqli_stmt_execute($stmt)){

        header('Location: /?regsuccess');
   
      }else {
        // handles execution error
        error_log($stmt->error);
        if($stmt->errno === 1062)
        {
          $this->errors[] = "That username already exists";
        } else {
          $this->errors[] = "An error occurred, please try again later";  
        }
        
      }

    } else {    
      // handles prepare statement error
      error_log($conn->error);
      $this->errors[] = "An error occurred, please try again later";
    }
    
    // closes connections
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
 
  }
}