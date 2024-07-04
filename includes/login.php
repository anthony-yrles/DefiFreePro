<?php
/**
 * Login script
 * 
 * This script will handle the login process
 * 
 * @category Scripts
 * @package  Login_Script
 */

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Include the autoloader
    require 'autoLoader.php';
    
    // Get the form data and store it in variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    $controller = new Controller(); // Create a new Controller object
    $user = $controller->getUser($email, $password); // Call the getUser method that will get the user from the database
    header('Location: ../userAccount.php'); // Redirect the user to the user account page

} else {
    // If someone tries to access this script directly, redirect them to the login page
    header('Location: ../index.php');
}