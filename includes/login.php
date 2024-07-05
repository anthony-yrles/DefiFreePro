<?php
/**
 * Login script
 * 
 * This script will handle the login process
 * 
 * @category Scripts
 * @package  Login_Script
 */

session_start();

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Include the autoloader
    require 'autoLoader.php';
    
    // Get the form data and store it in variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    $view = new View("localhost", "root", "", "testfreepro"); // Create a new Controller object
    $user = $view->getDataAndCreateUser($email, $password); // Get the user data and create a User object
    $view->userOrAdmin($user); // Check if the user is an admin or a user

    $_SESSION['nameFirstname'] = $user->getName() . " " . $user->getSurname(); // Store the user's name and surname in a session variable
    
    exit;

} else {
    // If someone tries to access this script directly, redirect them to the login page
    header('Location: ../index.php');
    exit;
}