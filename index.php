<?php 

include_once('classes/Login.php');

// Instanciates Login and creates global variable to be used in view login component
$login = new Login;

if(Login::userIsLoggedIn()){
  // User is logged in
  include_once('views/home.php');
}else {
  // User is not logged in, shows login form.
  include_once('views/login.php');
}