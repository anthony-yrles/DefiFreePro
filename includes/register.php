<?php

/**
 * Register script
 * 
 * This script will handle the registration process
 * 
 * @category Scripts
 * @package  Register_Script
 */

 // Check if the form was submitted
if (isset($_POST['submit'])) {
  // Include the autoloader
  require 'autoLoader.php';

  // Get the form data and store it in variables
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $controller = new Controller(); // Create a new Controller object
  $controller->createUser($name, $surname, $email, $password); // Call the createUser method that will save the user in the database

} else {
  // If someone tries to access this script directly, redirect them to the login page
  header('Location: ../index.php');
}